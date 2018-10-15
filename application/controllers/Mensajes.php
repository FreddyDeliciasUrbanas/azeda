<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
		$this->load->model('Mensajes_model');
	}

	public function leer_mensajes_android(){
		//cargar el modelo
		$this->load->model('Mensajes_model');
		//guardar los mensajes en una variable
		$mensajes = $this->Mensajes_model->leer_mensajes();

		if (count($mensajes->result()) > 0){
			$counter = 0;
			$mensajes_array  = array();
			foreach($mensajes->result() as $mensaje){
				$data = array(
					'id_mensaje' => $mensaje->id_mensaje,
					'nombre_mensaje' => $mensaje->nombre_mensaje,
					'email_mensaje' => $mensaje->email_mensaje,
					'telefono_mensaje' => $mensaje->telefono_mensaje,
					'direccion_mensaje' => $mensaje->direccion_mensaje,
					'hora_mensaje' => $mensaje->hora_mensaje,
					'fecha_mensaje' => $mensaje->fecha_mensaje,
					'texto_mensaje' => $mensaje->texto_mensaje);
				$mensajes_array[$counter] = $data;
				$counter++;
			}
			echo json_encode(array('mensajes' => $mensajes_array));
		}else{
			echo json_encode(array('mensajes' => 'error'));
		}


	}

	public function enviar_mensaje(){
		$this->form_validation->set_rules('nombre','err','required|trim');
		$this->form_validation->set_rules('email','err','required|trim|valid_email');
		$this->form_validation->set_rules('telefono','err','required|trim');
		$this->form_validation->set_rules('direccion', 'err', 'required|trim');
		$this->form_validation->set_rules('mensaje[]','err','required|trim');

		$this->form_validation->set_message('required','%s1');
		$this->form_validation->set_message('valid_email','%s2');
		$this->form_validation->set_message('max_length','%s3');

		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_nombre' => form_error('nombre'),
				'err_email' => form_error('email'),
				'err_telefono' => form_error('telefono'),
				'err_direccion' => form_error('direccion'),
				'err_mensaje' => form_error('mensaje[]')
				);
			echo json_encode($error);
			exit();
		}

		//variables del mensaje
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$mensaje = $this->input->post('mensaje[]');

		/*=====================================
					RECAPTCHA
		=========================================*/
		$captcha_response = $this->input->post('recaptcha');
		define('RECAPTCHA_SECRET', '6LeT4HQUAAAAAKj6D7p1Dpxi0SQ9R6IfBkjvUo0y');

		$captcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_SECRET . "&response=" . $captcha_response . "&remoteip=" . $_SERVER['REMOTE_ADDR']));
		if($captcha->success == false)
		{          
		    echo json_encode(array('status_captcha' => 'error', 'message' => 'No valid Captcha'));
		    exit();
		}
		/*=======FIN RECAPTCHA===============*/


		/**===================================
						MENSAJE
		=====================================*/
		$mensaje_final = '';
		
		$counter = 0;
		foreach ($mensaje as $pedido)
		{
			if($pedido > 0){
				$producto = $this->Productos_model->leer_producto($counter);
				$mensaje_final .= $producto->nombre_producto.': '.$pedido ."\n" ; 
			}
			$counter++;
		}

		$enviando_mensaje = $this->Mensajes_model->enviar_mensaje($nombre, $email, $direccion, $telefono, $mensaje_final);
		if($enviando_mensaje){
		//
		/*=================FIN MENSAJE=============*/


		/*=====================================
					NOTIFICACION
	============================================*/
			//recopilar tokens
			$tokens = $this->Mensajes_model->leer_tokens_firebase();
			$i = 0;
			$registrationIds = array();
			foreach($tokens->result() as $token){
				$registrationIds[] = $token->string_token;
			}

			
			//redactar el mensaje
			$titulo = 'Pedido de ' . $nombre;
			$mensaje = 'Dir: '. $direccion;


			define( 'API_ACCESS_KEY','AAAAJ2ROS3Y:APA91bHwRsJToBSID60tm8Pt83_gskBrNTbgn1kmgUOaIr8iwKC_LKdFN9vdmcnw1_EZPKIAUZ2i-wBqhA2RQ8QpdDUequNJglEkMfyoDxDBoX6OwCrQyB-9_q8KUOpCUI47C6NLS2Hk');

			$msg = [
			    'title'         => $titulo,
				'body'          => $mensaje,
				'sound'         => 'default'
			];

			$fields = [
			    'registration_ids'  => $registrationIds,
			    'notification'              => $msg
			];

			$headers = [
			    'Authorization: key=' . API_ACCESS_KEY,
			    'Content-Type: application/json'
			];
			$fields = json_encode( $fields );

			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, $fields );
			$result = curl_exec($ch );
			curl_close( $ch );

			echo json_encode(array('valid' => 'ok', 'notificacion' => $result));
		/*============FIN NOTIFICACION================*/
		}
	}

	public function guardar_token(){
		$this->form_validation->set_rules('token','','required|trim');
		if($this->form_validation->run()){
			$token = $this->input->post('token');
			if ($this->Mensajes_model->guardar_token_firebase($token)){
				echo json_encode(array('status' => 'ok'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}
		
	}

	public function comprobar_token(){
		$this->form_validation->set_rules('token','','required|trim');
		if($this->form_validation->run()){
			$token = $this->input->post('token');
			if ($this->Mensajes_model->comprobar_token_firebase($token)){
				echo json_encode(array('status' => 'ok'));
			}else{
				echo json_encode(array('status' => 'error'));
			}
		}else{
			echo json_encode(array('status' => 'empty'));
		}
	}
}
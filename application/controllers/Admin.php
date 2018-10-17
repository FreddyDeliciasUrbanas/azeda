<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {



	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
		$this->load->model('Admin_model');
		$this->load->model('Mensajes_model');
		
	}
	
	public function index(){
		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '1'){
			$data = $this->leer_carruseles();
			$data_footer['js_file'] = 'carruseles.js';
			//Variables por defecto
			$data['carrusel_active'] = 'active';
			$data['presentacion_active'] = '';
			$data['catalogo_active'] = '';
			$data['contacto_active'] = '';
			$data['admin_var'] = $this->load->view('admin/carruseles', $data, true);

			$this->load->view('templates/header');
			$this->load->view('admin', $data);
			$this->load->view('templates/footer', $data_footer);
		}else{
			redirect(base_url().'login');
		}
		
	}

	public function presentacion()
	{
		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '1'){
		$data = $this->leer_presentacion();
		$data_footer['js_file'] = 'presentacion.js';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = 'active';
		$data['catalogo_active'] = '';
		$data['contacto_active'] = '';
		$data['admin_var'] = $this->load->view('admin/presentacion', $data, true);

		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
		}else{
			redirect(base_url().'login');
		}
	}

	public function catalogo(){
		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '1'){
		setlocale(LC_ALL, "ES_es");
		$data_footer['js_file'] = 'catalogo.js';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = '';
		$data['catalogo_active'] = 'active';
		$data['contacto_active'] = '';
		$data['filas_producto_admin'] = $this->leer_catalogo();
		$data['modal_agregar'] = $this->load->view('modals/agregar-producto-modal','', true);
		$data['modals_eliminar'] = $this->leer_modals_eliminar_productos();
		$data['modals_modificar'] = $this->leer_modals_modificar_producto();
		$data['admin_var'] = $this->load->view('admin/catalogo', $data, true);
		


		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
		}else{
			redirect(base_url().'login');
		}
	}

	public function contacto(){
		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '1'){
		$data = $this->leer_ajustes_contacto();
		$data_footer['js_file'] = 'contacto.js';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = '';
		$data['catalogo_active'] = '';
		$data['contacto_active'] = 'active';
		$data['cards_mensajes'] = $this->leer_cards_mensajes();
		$data['admin_var'] = $this->load->view('admin/contacto', $data, true);

		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
		}else{
			redirect(base_url().'login');
		}
	}

	function leer_cards_mensajes(){
		$html = '';
		$mensajes = $this->Mensajes_model->leer_mensajes();
		foreach($mensajes->result() as $mensaje){
			$data['id_mensaje'] = $mensaje->id_mensaje;
			$data['nombre_mensaje'] = $mensaje->nombre_mensaje;
			$data['direccion_mensaje'] =$mensaje->direccion_mensaje;
			$data['email_mensaje'] = $mensaje->email_mensaje;
			$data['telefono_mensaje'] = $mensaje->telefono_mensaje;
			$data['hora_mensaje'] = $mensaje->hora_mensaje;
			$data['fecha_mensaje'] = $mensaje->fecha_mensaje;
			$data['texto_mensaje'] = $mensaje->texto_mensaje;
			$html .= $this->load->view('cards/card-admin-mensaje', $data, true);
		}
		return $html;
	}

	function leer_ajustes_contacto(){
		$data = array();
		$aj = $this->Mensajes_model->leer_ajustes_contacto();
		$data['reparto_contacto'] = $aj->reparto_contacto;
		$data['email_contacto'] = $aj->email_contacto;
		$data['telefono_contacto'] = $aj->telefono_contacto;
		$data['facebook_contacto'] = $aj->facebook_contacto;
		$data['twitter_contacto'] = $aj->twitter_contacto;
		$data['instagram_contacto'] =$aj->instagram_contacto;
		return $data;

	}

	public function modificar_ajustes_contacto(){
		$this->form_validation->set_rules('reparto' , 'err', 'required|trim');
		$this->form_validation->set_rules('email' , 'err', 'required|trim');
		$this->form_validation->set_rules('telefono' , 'err', 'required|trim');
		$this->form_validation->set_rules('facebook' , 'err', 'required|trim');
		$this->form_validation->set_rules('twitter' , 'err', 'required|trim');
		$this->form_validation->set_rules('instagram' , 'err', 'required|trim');

		$this->form_validation->set_message('required', '%s1');
		$this->form_validation->set_message('valid_email', '%s2');
		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_reparto' => form_error('reparto'),
				'err_email' => form_error('email'),
				'err_telefono' => form_error('telefono'),
				'err_facebook' => form_error('facebook'),
				'err_twitter' => form_error('twitter'),
				'err_instagram' => form_error('instagram')
				);
				echo json_encode($error);
				exit();
		}

		$reparto = $this->input->post('reparto');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$instagram = $this->input->post('instagram');

		if($this->Mensajes_model->modificar_ajustes_contacto($reparto, $email, $telefono, $facebook, $twitter, $instagram)){
			echo json_encode(array('status' => 'ok'));
		}else{
			echo json_encode(array('status' => 'error'));
		}
	}

	function leer_carruseles(){
		$carrusel1 = $this->Admin_model->cargar_carrusel(1);
		$carrusel2 = $this->Admin_model->cargar_carrusel(2);
		$carrusel3 = $this->Admin_model->cargar_carrusel(3);

		$data = array();
		$data['titulo_carrusel_1'] = $carrusel1->titulo_carrusel;
		$data['titulo_carrusel_2'] = $carrusel2->titulo_carrusel;
		$data['titulo_carrusel_3'] = $carrusel3->titulo_carrusel;

		$data['subtitulo_carrusel_1'] = $carrusel1->subtitulo_carrusel;
		$data['subtitulo_carrusel_2'] = $carrusel2->subtitulo_carrusel;
		$data['subtitulo_carrusel_3'] = $carrusel3->subtitulo_carrusel;

		$data['img_carrusel_1'] = $carrusel1->img_carrusel;
		$data['img_carrusel_2'] = $carrusel2->img_carrusel;
		$data['img_carrusel_3'] = $carrusel3->img_carrusel;

		return $data;
	}

	public function modificar_carrusel($id){

		$this->form_validation->set_rules('titulo_carrusel' , 'err', 'trim');
		$this->form_validation->set_rules('subtitulo_carrusel' , 'err', 'trim');
		$this->form_validation->set_message('required', '%s1');
		$this->form_validation->set_message('valid_email', '%s2');
		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_titulo_carrusel' => form_error('titulo_carrusel'),
				'err_subtitulo_carrusel' => form_error('subtitulo_carrusel')
				);
				echo json_encode($error);
				exit();
		}

		 
        $config['upload_path'] = './assets/img/upload/';  
        $config['allowed_types'] = 'jpg|jpeg|png|gif';  
        $this->load->library('upload', $config);  
        if(!$this->upload->do_upload('img_carrusel'))  
        {  
        	$titulo = $this->input->post('titulo_carrusel');
            $subtitulo = $this->input->post('subtitulo_carrusel');
            if($this->Admin_model->modificar_carrusel_sin_img($id, $titulo, $subtitulo)){
            	echo json_encode(array('status' => 'ok'));
            }else{
            	echo json_encode(array('status' => 'error'));
            }
        }  
        else  
        {  
            $img_source = $this->upload->data();  
            $titulo = $this->input->post('titulo_carrusel');
            $subtitulo = $this->input->post('subtitulo_carrusel');
           
            $img_final = 'upload/' . $img_source['file_name'];
            if($this->Admin_model->modificar_carrusel($id, $titulo, $subtitulo, $img_final)){
            	echo json_encode(array('status' => 'ok'));
            }else{
            	echo json_encode(array('status' => 'error'));
            }  
        }  
	}

	function leer_presentacion(){
		$presentacion = $this->Admin_model->leer_presentacion();
		$data = array();
		$data['titulo_presentacion'] = $presentacion->titulo_presentacion;
		$data['subtitulo_presentacion'] = $presentacion->subtitulo_presentacion;
		$data['img_presentacion'] = $presentacion->img_presentacion;
		$data['img_fondo_presentacion'] = $presentacion->img_fondo_presentacion;
		return $data;
	}

	public function modificar_presentacion(){
		$this->form_validation->set_rules('titulo' , 'err', 'required|trim');
		$this->form_validation->set_rules('subtitulo' , 'err', 'required|trim');
		$this->form_validation->set_message('required', '%s1');
		$this->form_validation->set_message('valid_email', '%s2');
		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_titulo' => form_error('titulo'),
				'err_subtitulo' => form_error('subtitulo')
				);
				echo json_encode($error);
				exit();
		}

		$config['upload_path'] = './assets/img/upload/';  
        $config['allowed_types'] = 'jpg|jpeg|png|gif';  
        $this->load->library('upload', $config);  
        if(!$this->upload->do_upload('img'))  
        {  
        	$titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            if($this->Admin_model->modificar_presentacion_sin_img($titulo, $subtitulo)){
            	echo json_encode(array('status' => 'ok'));
            }else{
            	echo json_encode(array('status' => 'error'));
            }
        }  
        else  
        {  
            $img_source = $this->upload->data();  
            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
           
            $img_final = 'upload/' . $img_source['file_name'];
            if($this->Admin_model->modificar_presentacion($titulo, $subtitulo, $img_final)){
            	echo json_encode(array('status' => 'ok'));
            }else{
            	echo json_encode(array('status' => 'error'));
            }  
        } 


	}


	function leer_catalogo(){
		$html = '';
		$productos = $this->Productos_model->leer_productos();
		foreach($productos->result() as $prod){
			$data['id_producto'] = $prod->id_producto;
			$data['nombre_producto'] = $prod->nombre_producto;
			$data['descripcion_producto'] = $prod->descripcion_producto;
			$data['precio_producto'] = $prod->precio_producto;
			$html .= $this->load->view('filas/fila-producto-admin', $data, true);
		}
		return $html;
	}

	function leer_imgs_producto($id){
		$imgs = $this->Productos_model->leer_imgs_producto($id);
		$html = '';
		foreach($imgs->result() as $img){
			$html .= '<tr>
        				<td>'.$img->id_img_producto.'</td>
        				<td>'.$img->url_img_producto.'</td>
        				<td><button type="button" class="close btn-eliminar-img" data-id-img-producto="'.$img->id_img_producto.'" data-id-producto="'.$img->id_producto.'">&times;</button></td>
        			</tr>';
		}

		return $html;
	}

	function leer_modals_eliminar_productos(){
		$html = '';
		$productos = $this->Productos_model->leer_productos();
		foreach($productos->result() as $prod){
			$data['id_producto'] = $prod->id_producto;
			$html .= $this->load->view('modals/eliminar-producto-modal', $data, true);
		}
		return $html;
	}

	function leer_modals_modificar_producto(){
		$html = '';
		$productos = $this->Productos_model->leer_productos();
		foreach($productos->result() as $producto){
			$data['id_producto'] = $producto->id_producto;
			$data['nombre_producto'] = $producto->nombre_producto;
			$data['descripcion_producto'] = $producto->descripcion_producto;
			$data['precio_producto'] = $producto->precio_producto;
			$data['imgs_producto'] = $this->leer_imgs_producto($producto->id_producto);
			$html .= $this->load->view('modals/modificar-producto-modal', $data, true);
		}

		return $html;
	}


}
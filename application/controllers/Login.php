<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		session_start();
		if (!isset($_SESSION['nivel'])){
			$data['token'] = $this->token();
			$data['title'] = 'Iniciar Sesion';
			$data_footer['js_file'] = 'login.js';
			$this->load->view('templates/header');
			$this->load->view('login', $data);
			$this->load->view('templates/footer', $data_footer);			
		}

		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '1'){
			redirect(base_url().'admin');
		}
		
		if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '2'){
			redirect(base_url().'cliente');
		}
		
		
	}

	public function login_user(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
			if($this->input->post('token') && $this->input->post('token') == $_SESSION['token']){
				
				$this->form_validation->set_rules('user_email','err','required|trim');
				$this->form_validation->set_rules('user_password', 'err', 'required|trim');

				$this->form_validation->set_message('required', '%s1');
				$this->form_validation->set_message('valid_email', '%s2');
				$this->form_validation->set_error_delimiters('','');

				if($this->form_validation->run() == false){
					$error = array(
						'err_user_email' => form_error('user_email'),
						'err_user_password' => form_error('user_password')
						);
						echo json_encode($error);
						exit();
				}

				$username = $this->input->post('user_email');
				$password = $this->input->post('user_password');

				//$username = 'freddy.perez.trabajos@gmail.com';
				//$password = 'ale65043210';

				$this->load->model('Login_model');

				$valid_admin = $this->Login_model->validate_user($username, $password);
				if($valid_admin == 'valid'){
					session_start();
					$user = $this->Login_model->get_user($username);

					$this->session->set_userdata('name', $user->nombre_usuario);
					/*$_SESSION['name'] = $user->nombre_usuario;
					$_SESSION['email'] = $user->email_usuario;
					$_SESSION['nivel'] = $user->nivel_usuario;
					$_SESSION['is_logued_in'] = true;*/
				}
				//print_r($_SESSION) ;
				//echo $_SESSION['is_logued_in'];

				echo json_encode(array('response' => $valid_admin));
			}
		}
		
		//if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
			//sleep(1);

			
			
	//	}else{
	//		show_404();
	//	}
	}

	public function token(){
 		$token = md5(uniqid(rand(),true));
 		$_SESSION['token'] = $token;
 		return $token;
 	}

	public function logout_user(){
		session_start();
		session_destroy();
		session_unset();
		redirect(base_url(), 'refresh');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function validate_user($user, $pass){
		$this->db->where('email_usuario', $user);
		$usuario_validado = $this->db->get('usuarios');
		$usuario_validado = $usuario_validado->row();
		if($usuario_validado == null){
			return 'err_user';
		}else{
			if($usuario_validado->password_usuario == $pass){
				return 'valid';
			}else{
				return 'err_pass';
			}
		}
	}

	function get_user($email){
		$this->db->where('email_usuario', $email);
		$user = $this->db->get('usuarios');
		return $user->row();
	}
}
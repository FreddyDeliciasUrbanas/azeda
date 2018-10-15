<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function leer_mensaje($id){
		$this->db->where('id_mensaje', $id);
		$mensaje = $this->db->get('mensajes');
		return $mensaje->row();
	}

	function leer_mensajes(){
		$this->db->order_by('fecha_mensaje', 'desc');
		return $this->db->get('mensajes');
	}

	function enviar_mensaje($nombre, $email, $direccion, $telefono, $texto){
		date_default_timezone_set('America/Santiago');
		$hora = date('H:i:s');
		$fecha = date('Y-m-d');

		$data = array(
			'nombre_mensaje' => $nombre,
			'email_mensaje' => $email,
			'direccion_mensaje' => $direccion,
			'telefono_mensaje' => $telefono,
			'hora_mensaje' => $hora,
			'fecha_mensaje' => $fecha,
			'texto_mensaje' => $texto);
		return $this->db->insert('mensajes', $data);
	}

	function leer_tokens_firebase(){
		return $this->db->get('tokens_firebase');
	}

	function guardar_token_firebase($token){
		$data = array(
			'string_token' => $token
		);
		return $this->db->insert('tokens_firebase', $data);
	}

	function comprobar_token_firebase($token){
		$this->db->where('string_token', $token);
		$token = $this->db->get('tokens_firebase');
		if(count($token->result()) > 0){
			return true;
		}else{
			return false;
		}
	}

	function leer_ajustes_contacto (){
		$ajustes = $this->db->get('contacto');
		return $ajustes->row();
	}

	function modificar_ajustes_contacto($reparto, $email, $tel, $face, $twitter, $insta){
		$this->db->where('id_contacto', 1);
		$data = array(
			'reparto_contacto' => $reparto,
			'email_contacto' => $email,
			'telefono_contacto' => $tel,
			'facebook_contacto' => $face,
			'twitter_contacto' => $twitter,
			'instagram_contacto' => $insta);
		return $this->db->update('contacto', $data);
	}
}
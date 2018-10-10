<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*============================
				CARRUSEL
	================================*/
	function cargar_carrusel($id){
		$this->db->where('id_carrusel', $id);
		$carrusel = $this->db->get('carruseles');
		return $carrusel->row();
	}

	function modificar_carrusel($id, $titulo, $subtitulo, $img){
		$this->db->where('id_carrusel', $id);
		$data = array(
			'titulo_carrusel' => $titulo,
			'subtitulo_carrusel' => $subtitulo,
			'img_carrusel' => $img
		);
		return $this->db->update('carruseles', $data);
	}

	function modificar_carrusel_sin_img($id, $titulo, $subtitulo){
		$this->db->where('id_carrusel', $id);
		$data = array(
			'titulo_carrusel' => $titulo,
			'subtitulo_carrusel' => $subtitulo
		);
		return $this->db->update('carruseles', $data);
	}/**==========FIN CARRUSEL====================*/

	/*============================
				PRESENTACION
	================================*/

	function leer_presentacion()
	{
		$this->db->where('id_presentacion', 1);
		$data = $this->db->get('presentacion');
		return $data->row();
	}

	function modificar_presentacion($titulo, $subtitulo, $img){
		$this->db->where('id_presentacion', 1);
		$data = array(
			'titulo_presentacion' => $titulo,
			'subtitulo_presentacion' => $subtitulo,
			'img_presentacion' => $img
			);
		return $this->db->update('presentacion', $data);
	}

	function modificar_presentacion_sin_img($titulo, $subtitulo){
		$this->db->where('id_presentacion', 1);
		$data = array(
			'titulo_presentacion' => $titulo,
			'subtitulo_presentacion' => $subtitulo
		);
		return $this->db->update('presentacion', $data);
	}
}
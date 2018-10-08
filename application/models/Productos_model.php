<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function leer_producto($id_producto){
		$this->db->where('id_producto', $id_producto);
		$producto = $this->db->get('productos');
		return $producto->row();
	}

	function leer_img_producto($id_producto){
		$this->db->where('id_producto', $id_producto);
		$img = $this->db->get('img_producto');
		return $img->row();
	}

	function leer_productos(){
		return $this->db->get('productos');
	}

	function leer_imgs_producto($id_producto){
		$this->db->where('id_producto', $id_producto);
		return $this->db->get('img_producto');
	}

	function guardar_producto($id, $nombre, $descripcion, $precio){
		$data = array(
			'id_producto' => $id,
			'nombre_producto' => $nombre,
			'descripcion_producto' => $descripcion,
			'precio_producto' => $precio);
		return $this->db->insert('productos', $data);
			
	}

	function eliminar_producto($id){
		$this->db->where('id_producto', $id);
		return $this->db->delete('productos');
	}
}
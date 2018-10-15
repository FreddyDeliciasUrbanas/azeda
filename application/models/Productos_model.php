<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function leer_producto($id_producto){
		
		$producto = $this->db->get('productos');
		return $producto->row($id_producto);
	}

	function leer_img_producto($id_producto){
		$this->db->where('id_producto', $id_producto);
		$img = $this->db->get('img_producto');
		return $img->row();
	}

	function leer_img_producto_by_id($id_img){
		$this->db->where('id_img_producto', $id_img);
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

	function guardar_producto($nombre, $descripcion, $precio){
		$data = array(
			'nombre_producto' => $nombre,
			'descripcion_producto' => $descripcion,
			'precio_producto' => $precio);
		return $this->db->insert('productos', $data);
			
	}

	function guardar_img_producto($id_producto, $img_producto){
		$data = array(
			'id_producto' => $id_producto,
			'url_img_producto' => $img_producto);
		return $this->db->insert('img_producto', $data);
	}

	function modificar_producto($id, $nombre, $descripcion, $precio){
		$this->db->where('id_producto', $id);
		$data = array(
			'nombre_producto' => $nombre,
			'descripcion_producto' => $descripcion,
			'precio_producto' => $precio);
		return $this->db->update('productos', $data);
	}

	function eliminar_producto($id){
		$this->db->where('id_producto', $id);
		if($this->db->delete('productos')){
			$this->db->where('id_producto', $id);
			if($this->db->delete('img_producto')){
				return true;
			}
			else{
				return false;
			}
		}else{
			 return false;
		}
		
	}

	function eliminar_img_producto($id){
		$this->db->where('id_img_producto');
		return $this->db->delete('img_producto');
	}
}
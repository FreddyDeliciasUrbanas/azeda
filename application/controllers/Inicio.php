<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
		$this->load->model('Admin_model');
	}
	
	public function index()
	{
		$data = $this->leer_carruseles();

		$data['cards_productos'] = $this->leer_cards_productos();
		$data_footer['js_file'] = 'grayscale.js';
		$this->load->view('templates/header');
		$this->load->view('inicio', $data);
		$this->load->view('templates/footer', $data_footer);
	}

	function leer_cards_productos(){
		$html = '';

		$productos = $this->Productos_model->leer_productos();
		foreach ($productos->result() as $prod){
			$data['id_producto'] = $prod->id_producto;
			$data['nombre_producto'] = $prod->nombre_producto;
			$data['descripcion_producto'] = $prod->descripcion_producto;
			$data['precio_producto'] = $prod->precio_producto;
			$html .= $this->load->view('templates/card_producto', $data, true);
		}
		return $html;
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


}

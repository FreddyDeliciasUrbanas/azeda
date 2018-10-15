<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
		$this->load->model('Admin_model');
		$this->load->model('Contacto_model');
	}
	
	public function index()
	{
		$data = $this->leer_backend();

		$data['cards_productos'] = $this->leer_cards_productos();
		$data['modals_productos'] = $this->leer_modals_productos();
		$data['modals_mensajes'] = $this->leer_modals_mensajes();
		$data['cards_pedidos_productos'] = $this->leer_cards_pedidos_productos();
		$data['nro_productos'] = $this->leer_nro_productos();
		$data_footer['js_file'] = 'grayscale.js';
		$this->load->view('templates/header');
		$this->load->view('inicio', $data);
		$this->load->view('templates/footer', $data_footer);
	}

	function leer_cards_productos(){
		$html = '';

		$productos = $this->Productos_model->leer_productos();
		if($productos->num_rows() > 0){
			foreach ($productos->result() as $prod){
				$data['id_producto'] = $prod->id_producto;
				$data['nombre_producto'] = $prod->nombre_producto;
				$data['descripcion_producto'] = $prod->descripcion_producto;
				$data['precio_producto'] = $prod->precio_producto;
				$data['img_inicial_producto'] = $this->leer_img_producto($prod->id_producto);
				$html .= $this->load->view('templates/card_producto', $data, true);
			}
		}
		
		return $html;
	}

	function leer_modals_productos(){
		$html = '';

		$productos = $this->Productos_model->leer_productos();
		if($productos->num_rows() > 0){
			foreach ($productos->result() as $prod){
				$data['id_producto'] = $prod->id_producto;
				$data['nombre_producto'] = $prod->nombre_producto;
				$data['descripcion_producto'] = $prod->descripcion_producto;
				$data['precio_producto'] = $prod->precio_producto;
				$data['img_array'] = $this->leer_imgs_producto($prod->id_producto);
				$html .= $this->load->view('modals/modal-producto', $data, true);
			}
		}
		
		return $html;
	}

	function leer_modals_mensajes(){
		$html = '';
		$html .= $this->load->view('modals/modal-enviando','',true);
		$html .= $this->load->view('modals/modal-no-producto','',true);
		$html .= $this->load->view('modals/modal-mensaje-ok','',true);
		return $html;
	}

	function leer_imgs_producto($id_producto){
		$imgs = $this->Productos_model->leer_imgs_producto($id_producto);
		$data = [];
		$img_array = [];
		$counter = 0;
		if($imgs->num_rows() > 0){
			foreach($imgs->result() as $img)
			{
				$data['id_img_producto'] = $img->id_img_producto;
				$data['url_img_producto'] = $img->url_img_producto;
				$img_array[$counter] = $data;
				$counter++;
			}
		}

		return $img_array;
	}

	function leer_img_producto($id_producto){
		$img = $this->Productos_model->leer_img_producto($id_producto);
		$data = '';
		if($img != null){
			
			$data = $img->url_img_producto;
		}
		return $data;
	}

	function leer_cards_pedidos_productos(){
		$html = '';

		$productos = $this->Productos_model->leer_productos();
		if($productos->num_rows() > 0){
			$cont = 0;
			foreach ($productos->result() as $prod){
				$data['id_producto'] = $prod->id_producto;
				$data['posicion_producto'] = $cont;
				$data['nombre_producto'] = $prod->nombre_producto;
				$data['descripcion_producto'] = $prod->descripcion_producto;
				$data['precio_producto'] = $prod->precio_producto;
				$data['img_inicial_producto'] = $this->leer_img_producto($prod->id_producto);
				$html .= $this->load->view('cards/card-pedido-producto', $data, true);
				$cont++;
			}
		}
		
		return $html;
	}

	function leer_nro_productos(){
		$productos = $this->Productos_model->leer_productos();
		return $productos->num_rows();
	}

	function leer_backend(){
		$data = [];
		$carrusel1 = $this->Admin_model->cargar_carrusel(1);
		$carrusel2 = $this->Admin_model->cargar_carrusel(2);
		$carrusel3 = $this->Admin_model->cargar_carrusel(3);

		$presentacion = $this->Admin_model->leer_presentacion();

		$contacto = $this->Contacto_model->leer_contacto();

		if($presentacion != null && $carrusel1 != null && $carrusel2 != null && $carrusel3 != null && $contacto != null){
			$data['titulo_carrusel_1'] = $carrusel1->titulo_carrusel;
			$data['titulo_carrusel_2'] = $carrusel2->titulo_carrusel;
			$data['titulo_carrusel_3'] = $carrusel3->titulo_carrusel;

			$data['subtitulo_carrusel_1'] = $carrusel1->subtitulo_carrusel;
			$data['subtitulo_carrusel_2'] = $carrusel2->subtitulo_carrusel;
			$data['subtitulo_carrusel_3'] = $carrusel3->subtitulo_carrusel;

			$data['img_carrusel_1'] = $carrusel1->img_carrusel;
			$data['img_carrusel_2'] = $carrusel2->img_carrusel;
			$data['img_carrusel_3'] = $carrusel3->img_carrusel;

			$data['titulo_presentacion'] = $presentacion->titulo_presentacion;
			$data['subtitulo_presentacion'] = $presentacion->subtitulo_presentacion;
			$data['img_presentacion'] = $presentacion->img_presentacion;
			$data['img_fondo_presentacion'] = $presentacion->img_fondo_presentacion;

			$data['reparto_contacto'] = $contacto->reparto_contacto;
			$data['email_contacto'] = $contacto->email_contacto;
			$data['telefono_contacto'] = $contacto->telefono_contacto;
			$data['facebook_contacto'] = $contacto->facebook_contacto;
			$data['twitter_contacto'] = $contacto->twitter_contacto;
			$data['instagram_contacto'] = $contacto->instagram_contacto;
		}

		

		return $data;
	}

	


}

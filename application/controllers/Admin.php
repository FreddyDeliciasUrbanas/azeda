<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('Productos_model');
		$this->load->model('Admin_model');
	}
	
	public function index(){
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
	}

	public function presentacion()
	{
		$data_footer['js_file'] = '';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = 'active';
		$data['catalogo_active'] = '';
		$data['contacto_active'] = '';
		$data['admin_var'] = $this->load->view('admin/presentacion', '', true);

		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
	}

	public function catalogo(){
		$data_footer['js_file'] = '';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = '';
		$data['catalogo_active'] = 'active';
		$data['contacto_active'] = '';
		$data['admin_var'] = $this->load->view('admin/catalogo', '', true);

		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
	}

	public function contacto(){
		$data_footer['js_file'] = '';
		//Variables por defecto
		$data['carrusel_active'] = '';
		$data['presentacion_active'] = '';
		$data['catalogo_active'] = '';
		$data['contacto_active'] = 'active';
		$data['admin_var'] = $this->load->view('admin/contacto', '', true);

		$this->load->view('templates/header');
		$this->load->view('admin', $data);
		$this->load->view('templates/footer', $data_footer);
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

		$this->form_validation->set_rules('titulo_carrusel' , 'err', 'required|trim');
		$this->form_validation->set_rules('subtitulo_carrusel' , 'err', 'required|trim');
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
}
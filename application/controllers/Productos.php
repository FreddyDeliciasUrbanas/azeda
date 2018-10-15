<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
	}
	
	public function index()
	{
		
	}

	public function agregar_producto_catalogo(){
		$this->form_validation->set_rules('nombre' , 'err', 'required|trim');
		$this->form_validation->set_rules('descripcion' , 'err', 'required|trim');
		$this->form_validation->set_rules('precio' , 'err', 'required|trim');


		$this->form_validation->set_message('required', '%s1');
		$this->form_validation->set_message('valid_email', '%s2');
		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_nombre' => form_error('nombre'),
				'err_descripcion' => form_error('descripcion'),
				'err_precio' => form_error('precio')
				);
				echo json_encode($error);
				exit();
		}

		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');

		if($this->Productos_model->guardar_producto($nombre, $descripcion, $precio)){
			echo json_encode(array('status' => 'ok'));
		}else{
			echo json_encode(array('status' => 'error'));
		}
	}

	public function agregar_img_producto(){
		
		$config['upload_path'] = './assets/img/upload/';  
        $config['allowed_types'] = 'jpg|jpeg|png|gif';  
        $this->load->library('upload', $config);  
        if(!$this->upload->do_upload('img_producto'))  
        {  
        	echo json_encode(array('status' => 'no-image'));
        }  
        else  
        {  
            $img_source = $this->upload->data();  
            $id_producto = $this->input->post('id_producto');
           
            $img_final = 'upload/' . $img_source['file_name'];
            if($this->Productos_model->guardar_img_producto($id_producto, $img_final)){
            	echo json_encode(array('status' => 'ok'));
            }else{
            	echo json_encode(array('status' => 'error'));
            }  
        }  

		
	}

	public function modificar_producto_catalogo($id){
		$this->form_validation->set_rules('nombre' , 'err', 'required|trim');
		$this->form_validation->set_rules('descripcion' , 'err', 'required|trim');
		$this->form_validation->set_rules('precio' , 'err', 'required|trim');


		$this->form_validation->set_message('required', '%s1');
		$this->form_validation->set_message('valid_email', '%s2');
		$this->form_validation->set_error_delimiters('','');

		if($this->form_validation->run() == false){
			$error = array(
				'err_nombre' => form_error('nombre'),
				'err_descripcion' => form_error('descripcion'),
				'err_precio' => form_error('precio')
				);
				echo json_encode($error);
				exit();
		}

		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');

		if($this->Productos_model->modificar_producto($id, $nombre, $descripcion, $precio)){
			echo json_encode(array('status' => 'ok'));
		}else{
			echo json_encode(array('status' => 'error'));
		}
	}

	public function eliminar_producto_catalogo($id){
		if($this->Productos_model->eliminar_producto($id)){
			echo json_encode(array('status' => 'ok'));
		}else{
			echo json_encode(array('status' => 'error'));
		}
	}

	public function eliminar_img_producto($id){
		$img = $this->Productos_model->leer_img_producto_by_id($id);
		$nombre_img = $img->url_img_producto;
		
		if($this->Productos_model->eliminar_img_producto($id)){
			$imagen = __DIR__ . "assets/img/". $nombre_img;
			unlink($imagen);
			echo 'ok';
		}else{
			echo 'error';
		}
	}
}

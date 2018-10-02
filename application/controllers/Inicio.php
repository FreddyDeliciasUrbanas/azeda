<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	
	public function index()
	{
		$data_footer['js_file'] = '';
		$this->load->view('templates/header');
		$this->load->view('inicio');
		$this->load->view('templates/footer', $data_footer);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Construccion extends CI_Controller {

	
	public function index()
	{
		$data_footer['js_file'] = 'construccion.js';
		$this->load->view('templates/header');
		$this->load->view('construccion');
		$this->load->view('templates/footer', $data_footer);
	}
}

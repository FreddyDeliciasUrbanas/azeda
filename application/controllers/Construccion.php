<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Construccion extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('construccion');
		$this->load->view('templates/footer');
	}
}

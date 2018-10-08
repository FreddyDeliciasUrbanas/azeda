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
}

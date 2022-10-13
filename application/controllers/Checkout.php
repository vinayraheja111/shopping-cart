<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class Checkout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//Load Model

		$this->load->model('product');
	}

	public function index()
	{
		if($this->cart->total_items() <= 0)
		{
			redirect ('Products/');
		}
	}
}



?>
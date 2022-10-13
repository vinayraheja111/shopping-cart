<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Products extends CI_Controller
{
	function __construct(){
	   parent::__construct();

	   //Load Cart Liabrary
	   $this->load->library('cart');

	   // Load product model
	   $this->load->model('product');
	}

	public function index()
	{
		$data['pro'] = $this->product->getrows();
          // echo "<pre>";
		//print_r($data);
		//die;
		$this->load->view('Welcome',$data);
	}

	public function addtocart($id)
	{

	
		$product = $this->product->find($id);

		//print_r($product);

		//die;

		   // Add product to the cart
        $data = array(
            'id'    => $product->id,
            'qty'    => 1,
            'price'    => $product->price,
            'name'    => $product->name,
            'image' => $product->image
        );

		//print_r($data);

		//die;

		$this->cart->insert($data);

		//Redirect to cart page

		 redirect('Cart/');
	}
}



	?>
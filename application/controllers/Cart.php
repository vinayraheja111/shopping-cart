<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');


class Cart extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		//load cart liabrary

		$this->load->library('cart');

		//Load product model

		$this->load->model('product');
	}

	public function index()
	{
		$data  = array();

		//Reterive cart data from session

		$data['cartitem'] = $this->cart->contents();

		//echo "<pre>";

		//print_r($data);

		$this->load->view('cart/index',$data);
	}
	//update in cart list
	   function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }

    //Remove cart item

    public function removeItem($rowid)
    {
    	$remove = $this->cart->remove($rowid);

    	redirect('Cart/');
    }
}



?>
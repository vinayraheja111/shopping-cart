<?php
defined('BASEPATH') OR exit('No direct script access allowed ');

class Product extends CI_Model
{
	public function getrows()
	{
		$q =  $this->db->get('products');
        
         return $q->result();
	}

	public function find($id)
	{
		return $this->db->where('id',$id)->get('products')->row();
	}
}


?>
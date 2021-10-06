<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Categories_model","Categories");
		$this->load->model("home/Home_model","Home_Model");
		// if(!empty($this->session->userdata('logged_in_customer'))){
	 //    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	 //    }	
	 /* ========FOR CATEGORY=========== */
		$this->fld_cateid="cate_id"; 
		$this->table_category="tbl_category"; 		
    }
  
    public function index()
	{ 		
		 $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
		$content['subview']='categories/categories_list';
		$this->load->view('layout', $content);
	}

	public function badrequest()
	{ 		
		//$content['subview']='categories/badrequest';
		$this->load->view('categories/badrequest');
	}




	 
}

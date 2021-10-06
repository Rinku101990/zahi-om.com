<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Blog_model",'Blog');
	    if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		/* ========FOR Blog =========== */
		$this->blg_id="blg_id"; 
		$this->table_blogs="tbl_blogs";
    }

  public function index()
	{ 
	    $content['blog'] = $this->Blog->get_blog_list($this->table_blogs);	
	   // $content['subview']='blog/blog';
		$this->load->view('blog/blog', $content);
	}

  public function detail()
	{ 
		$blog_id=decode($this->uri->segment(2));
	    $content['blog'] = $this->Blog->blog_list($blog_id,$this->table_blogs);	 
	     $content['blog_list']=$this->Blog->blog($blog_id,$this->table_blogs);
	     $content['recent_blog']=$this->Blog->recent_blog($this->table_blogs);
	   
	    //$content['subview']='blog/blog_details';
		$this->load->view('blog/blog_details', $content);
	}


   

	
	
	 
	 
}

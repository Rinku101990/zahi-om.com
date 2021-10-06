<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{	

	function __construct() 
	{
		parent::__construct();
		$this->_hmvc_fixes();
		date_default_timezone_set("Asia/Calcutta");  
		$this->load->model("MY_Model");
		/* ========FOR WEBSITE =========== */
		$this->fld_wid="web_id";	 			
		$this->table_website="tbl_website_info";		
		
		$Websitedata=$this->MY_Model->get_website($this->fld_wid,$this->table_website);
	    $this->website=$Websitedata; 
       // $data['get_category_list']=$this->MY_Model->get_list($this->fld_cid,$this->table_categories);         
	    $AllData=array(
		  // 'category_list'=>$data['get_category_list'],	  
		  );    
		$this->AllProduct= $AllData; 
	    
		 
		 
	}
	
	function _hmvc_fixes()
	{		
		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		
	}
	
	 

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
            $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Report_model",'report');                     			
           /* ========FOR VENDOR TABEL========= */ 			
            $this->fld_email="vnd_email";	
            $this->fld_password="vnd_password";	
            $this->table_vendor="tbl_vendor";
            /* ========FOR PRODUCT SETTING===== */
			$this->fld_p_id="p_id";	 			
		    $this->table_product="tbl_product";			   
		    /* ========FOR Order Table===== */
			$this->fld_ord_id="ord_id";	 			
		    $this->table_order="tbl_orders";	
		        /* ========FOR Order Product Table===== */
			$this->fld_op_id="op_id";
			$this->fld_vendor="ord_vendors";
		    $this->table_order_product="tbl_orders_product";	

		         /* ========FOR Cancel Request Table===== */
			$this->fld_c_id="c_id";
			$this->fld_c_vendor="c_ven_id";
		    $this->table_cancel_item="tbl_cancel_item";		
		   		
    }
 

	 function index() {  
         $content['spage']='1';       
         $vnd_id=$this->vendor->vnd_id;
		 $content['sales'] = $this->report->sales_report($this->fld_vendor,$vnd_id,$this->table_order_product);
		  $content['subview']="report-odrer";
		  $this->load->view('layout', $content);
         
	}	

 function performance() {  
         $content['spage']='2'; 
          $vnd_id=$this->vendor->vnd_id;
		 $content['product_performance'] = $this->report->product_performance($this->fld_vendor,$vnd_id,$this->table_order_product);		
		  $content['subview']="product_performance";
		  $this->load->view('layout', $content);
         
	}	

	 function inventory() {  
         $content['spage']='3'; 
          $vnd_id=$this->vendor->vnd_id;
		 $content['product_inventory'] = $this->report->product_inventory($this->fld_vendor,$vnd_id,$this->table_order_product);
		 $content['subview']="product_inventory";
		  $this->load->view('layout', $content);
         
	}	

	 function inventory_status() {  
         $content['spage']='4'; 
          $vnd_id=$this->vendor->vnd_id;
		 $content['inventory_status'] = $this->report->inventory_status($vnd_id,$this->table_product);
		 echo"<pre>";
		 print_r( $content['inventory_status']);
		 die();
		  $content['subview']="inventory_status";
		  $this->load->view('layout', $content);
         
	}	
	 function comment_reviews() {  
         $content['spage']='5'; 
          $vnd_id=$this->vendor->vnd_id;
		 $content['comment_reviews'] = $this->report->comment_reviews($vnd_id,$this->table_product);
		
		  $content['subview']="comment_reviews";
		  $this->load->view('layout', $content);
         
	}	

	

	
	
	
}

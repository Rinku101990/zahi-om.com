<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
            $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Order_model",'order');                     			
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
		 $content['order'] = $this->order->order_list($this->fld_vendor,$vnd_id,$this->table_order_product);				   	
		  $content['subview']="odrer-list";
		  $this->load->view('layout', $content);
         
	}	

 function invoice($id) {  
         $content['spage']='1';         
         $vnd_id=$this->vendor->vnd_id;
		 $content['order'] = $this->order->order_detail($this->fld_op_id,$id,$this->table_order_product);
		 // echo"<pre>";
		 // print_r( $content['odrer']);
		 // die();
		  $content['subview']="order-detail";
		  $this->load->view('layout', $content);
         
	}	

	function cancel() {  
         $content['spage']='2';       
         $vnd_id=$this->vendor->vnd_id;
		 $content['cancel_request'] = $this->order->cancel_list($this->fld_c_vendor,$vnd_id,$this->table_cancel_item);				   	
		  $content['subview']="cancel-requests";
		  $this->load->view('layout', $content);
         
	}	


	
	
	
}

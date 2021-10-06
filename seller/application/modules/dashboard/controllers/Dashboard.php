<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
             $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Dashboard_Model",'dashboard');	
           /* ========FOR VENDOR TABEL=========== */ 			
            $this->fld_email="vnd_email";	
            $this->fld_password="vnd_password";	
            $this->table_vendor="tbl_vendor";	 
            /* ========FOR ORDER PRODUCT =========== */
			$this->fld_op_id="op_id";	 			
			$this->table_order_product="tbl_orders_product";
			 /* ========FOR WALLET =========== */
			$this->fld_wlt_id="wlt_id";	 			
			$this->table_wallet="tbl_wallet";
			 /* ========FOR REFUND AMOUNT =========== */
			$this->fld_rfd_id="rfd_id";	 			
			$this->table_refund_amount="tbl_refund_amount";
			 /* ========FOR PRODUCT =========== */	 			
			$this->table_product="tbl_product";		
    }
 
    function index() {      
          $content['product_complete'] = $this->dashboard->product_complete($this->login->vnd_id,$this->table_order_product);
          $content['product_proccess'] = $this->dashboard->product_proccess($this->login->vnd_id,$this->table_order_product);	
          $content['credit_today'] = $this->dashboard->credit_today($this->login->vnd_id,$this->table_wallet);
          $content['product_order'] = $this->dashboard->product_order($this->login->vnd_id,$this->table_order_product);
          $content['product_pending'] = $this->dashboard->product_pending($this->login->vnd_id,$this->table_order_product);
           $content['product_shipped'] = $this->dashboard->product_shipped($this->login->vnd_id,$this->table_order_product);
          $content['refunt_product'] = $this->dashboard->refunt_product($this->login->vnd_id,$this->table_refund_amount);
          $content['product_total'] = $this->dashboard->product_total($this->login->vnd_id,$this->table_product);
          $content['hot_total'] = $this->dashboard->hot_total($this->login->vnd_id,$this->table_product);
          $content['featured_total']=$this->dashboard->featured_total($this->login->vnd_id,$this->table_product);
          $content['trending_total']=$this->dashboard->trending_total($this->login->vnd_id,$this->table_product);	     
		  $content['subview']="dashboard";
		  $this->load->view('layout', $content);
         
	}	
	
	
	public function badrequest() { 	
		$content['subview']="dashboard/badrequest";
		$this->load->view('layout', $content);

	}
			
	
}

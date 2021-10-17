<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Checkout_model",'Checkout');
		$this->load->model("account/Account_model",'Account');
	    if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		/* ========FOR Customer =========== */
		$this->cust_id="cust_id"; 
		$this->fld_email="cust_email"; 	
        $this->fld_password="cust_password";	
		$this->table_customer="tbl_customer";

		/* ========FOR Product =========== */
		$this->p_id="p_id"; 		
		$this->table_product="tbl_product";
		/* ========FOR Tax =========== */
		$this->txt_id="txt_id"; 		
		$this->table_tax="tbl_tax";
		 /* ========FOR COUNTRY SETTING===== */
		$this->fld_cnt_id="cnt_id";	 			
	    $this->table_country="tbl_country";
        /* ========FOR STATE SETTING===== */
		/*  ==== FOR STATE ====  */
		$this->fld_ctyid="cnt_id";
		$this->table_states="tbl_state";
		/*  ==== FOR STATE ====  */
		$this->table_city="tbl_city";
		$this->table_zipcode="tbl_zipcode";
		/*  ========FOR SHIPPING ADDRESS=========== */
		$this->fld_shid="fld_id";	 		 	 			
		$this->table_shipping="tbl_shipping_address";
    }


  	public function index()
	{ 	
		if(empty($this->cart->contents())){
			redirect('/');
		}else{
		   	if(!empty($this->session->userdata('logged_in_customer'))){
				$login =$this->customer;
				$content['get_shippingAddress']=$this->Checkout->get_shippingAddress($this->cust_id,$login->cust_id ,$this->table_shipping); 
				$content['shippingAddress1']=$this->Checkout->shippingAddress($this->cust_id,$login->cust_id ,$this->table_shipping);  
				// echo"<pre>";
				// print_r($content['get_shippingAddress']);
				// die;
				$cust_id = $login->cust_id;		
		    	$content['profile']=$this->customer;
			}else{

			}
		    $content['country'] = $this->Checkout->location_list('cnt_name','cnt_status',$this->table_country);
		    $content['tax'] = $this->Checkout->tax_list($this->table_tax);
		    //$content['subview']='checkout/viewCheckout';
			$this->load->view('checkout/viewCheckout', $content);
		}
	}


/* ===== SHIPPING ADDRESS ===== */
	
	public function address(){
			 
		//print_r($_POST);die;
		$login = $this->customer;
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
				$createdDate = date('Y-m-d H:i:s');		
				$addressDefault=$this->input->post('addressDefault');
				if($addressDefault=="yes"){
					$shipping=$this->Checkout->get_defaultaddress($addressDefault,$this->cust_id,$login->cust_id,$this->table_shipping); 
					//print_r($shipping);die;
					$id=$shipping->fld_id;
					$data=array(	 
					"addressDefault"=>null,  
					); 
					$this->Checkout->update_shippingAddress($this->cust_id,$login->cust_id,$this->fld_shid,$id,$data,$this->table_shipping);
				}		
				$data=array(	 
					"shippingFirstName"=>$this->input->post('shippingFirstName'),
					"cust_id"=>$login->cust_id,
					"shippingLastName"=>$this->input->post('shippingLastName'),
					"shippingNumber"=>$this->input->post('shippingNumber'),
					"shippingEmail"=>$this->input->post('shippingEmail'),
					"shippingCountry"=>$this->input->post('shippingCountry'), 
					"shippingState"=>$this->input->post('shippingState'), 
					"shippingCity"=>$this->input->post('shippingCity'), 
					"shippingPincode"=>$this->input->post('shippingPincode'), 
					"shippingAddress"=>$this->input->post('shippingAddress'), 
					"addressType"=>$this->input->post('addressType'),   
					"addressDefault"=>$this->input->post('addressDefault'),   
					'shippingCreated' => date('Y-m-d H:i:s')
				); 
				$savedata=$this->Checkout->saveShippingAddress($data,$this->table_shipping);
				if($savedata){					
					$data=array("type"=>"success","message"=>('<div class="alert alert-success" ><strong>Ok ..</strong> Your shipping address is save </div>'));
					echo json_encode($data);
				}else{
					$data=array("type"=>"error","message"=>('<div class="alert alert-danger" ><strong>Oops! ..</strong> Some error occurred. Try again. </div>'));
					echo json_encode($data);
				} 
			}else{
			
				// $content['get_shippingAddress']=$this->Account_Model->get_shippingAddress($this->cust_id,$login->cust_id ,$this->table_shipping);  
				// $content['get_country']=$this->Account_Model->getCountry(); 
				// $content['subview']="account/viewShippingAddress"; 
				// $this->load->view('layout', $content);
			}
				
		}


		public function shipping_edit(){
			$fld_id=$this->input->post('SID');
			$shipping=$this->Checkout->get_shippingAddress($this->fld_shid,$fld_id,$this->table_shipping);
			$content['shipping']=$shipping[0];
			 $content['country'] = $this->Checkout->location_list('cnt_name','cnt_status',$this->table_country);
			 $content['state'] = $this->Checkout->location_list('st_name','st_status',$this->table_states);
			 $content['city'] = $this->Checkout->location_list('ct_name','ct_status',$this->table_city);
			  $content['zip'] = $this->Checkout->location_list('zc_zipcode','zc_status',$this->table_zipcode);
			 echo json_encode($content);
		}


	public function shipping_update(){
			 
		//print_r($_POST);die;
		$login = $this->customer;
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){				
				$cureent_url=$this->input->post('get_current');
				$fldid=$this->input->post('fldid');
				$addressDefault=$this->input->post('addressDefault');
				if($addressDefault=="yes"){
					$shipping=$this->Checkout->get_defaultaddress($addressDefault,$this->cust_id,$login->usr_id,$this->table_shipping); 
					//print_r($shipping);die;
					$id=$shipping->fld_id;
					$data1=array(	 
					"addressDefault"=>null,  
					); 
					$this->Checkout->update_shippingAddress($this->cust_id,$login->cust_id,$this->fld_shid,$id,$data1,$this->table_shipping);
				}		
				$data=array(	 
					"shippingFirstName"=>$this->input->post('shippingFirstName'),
					"shippingLastName"=>$this->input->post('shippingLastName'),
					"shippingNumber"=>$this->input->post('shippingNumber'),
					"shippingEmail"=>$this->input->post('shippingEmail'),
					"shippingCountry"=>$this->input->post('shippingCountry'), 
					"shippingState"=>$this->input->post('shippingState'), 
					"shippingCity"=>$this->input->post('shippingCity'), 
					"shippingPincode"=>$this->input->post('shippingPincode'), 
					"shippingAddress"=>$this->input->post('shippingAddress'), 
					"addressType"=>$this->input->post('addressType'),   
					"addressDefault"=>$this->input->post('addressDefault')  
					
				); 
				$updatedata=$this->Checkout->update_shippingAddress($this->cust_id,$login->cust_id,$this->fld_shid,$fldid,$data,$this->table_shipping);
				if($updatedata){
					$this->session->set_flashdata('msg',array('message' => 'Your shipping address is update','class' => 'success','type'=>'Ok!'));
					redirect($cureent_url);
				}else{
					$this->session->set_flashdata('msg',array('message' => 'Unable to Remove.Some error occurred.','class' => 'danger','type'=>'Oops!'));
					redirect($cureent_url);
				}
				
			}else{
			
				// $content['get_shippingAddress']=$this->Account_Model->get_shippingAddress($this->cust_id,$login->cust_id ,$this->table_shipping);  
				// $content['get_country']=$this->Account_Model->getCountry(); 
				// $content['subview']="account/viewShippingAddress"; 
				// $this->load->view('layout', $content);
			}
				
		}

	/* ===== REMOVE SHIPPING ADDRESS ===== */
	public function removeShipping($id=null){ 
	
		if($id!==NULL) { 
		
			$result= $this->Checkout->delete_single($this->fld_shid,$id,$this->table_shipping);
			if($result){
				//$this->session->set_flashdata('msg',array('message' => 'Shipping address has been successfully remove','class' => 'success','type'=>'Ok!'));
				redirect('checkout');
			}else{
				//$this->session->set_flashdata('msg',array('message' => 'Unable to Remove.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('checkout');
			}
		} else {
			//$this->session->set_flashdata('msg',array('message' => 'Row cannot Remove!','class' => 'danger','type'=>'Oops!'));
			redirect('checkout');
		}	    
	}
	
	
	
	 
	 
}

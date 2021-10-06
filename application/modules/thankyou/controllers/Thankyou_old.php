<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		//$this->load->model('Checkout_Model','Checkout_Model');
		$this->load->model('home/Home_model','Home_Model');
		$this->load->model('thankyou/Order_Model','Order_Model');
		$this->load->helper('Common');
		/* ========FOR BANEERS=========== */
		$this->fld_bnrsid="bnrs_id"; 
		$this->table_banners="tbl_banners"; 
		/* ========FOR CATEGORY=========== */
		$this->fld_cateid="cate_id"; 
		$this->table_category="tbl_categories"; 
		/* ========FOR LOGIN =========== */
		$this->cust_id="cust_id"; 
		$this->table_customer="tbl_customers";
		/* ========FOR PRODUCTS =========== */
		$this->fld_proid="pro_id";
		$this->table_products="tbl_products"; 
		/* ========FOR ORDERS =========== */
		$this->fld_ordid="ord_id";
		$this->fld_refid="ord_reference_no";
		$this->table_orders="tbl_orders";
    }
    
    
  
  	public function index()
	{
		$login = $this->session->userdata('Logged_User');
		if(empty($login)){
			redirect('/');
		}
		$cust_email = $login->cust_email;
		
		$ordid = $this->session->flashdata('orderid');
		//print_r($ordid);die;
		if(!empty($ordid))
		{
			$content['order_detail']=$this->Order_Model->get_order_detail($ordid,$this->fld_ordid,$this->table_orders);
			//print_r($content['order_detail']);die;
			$content['cate']=$this->Home_Model->getCategory($this->fld_cateid,$this->table_category);
			$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);
			
			$data['cmpt_ord_detail']=$this->Order_Model->get_complete_list($ordid);
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_order_product_list($ordid);

			/*====================Start email send===========*/ 
			
			$emailsubject='Order Detail from Weldkart.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/emailOrder',$data,true);
			$mailsend=email_send($toemail,$emailsubject,$emailmsg);	 
			/*====================End email send ===========*/
			
			$this->cart->destroy();
			$content['subview']='thankyou/viewMyOrder';
			$this->load->view('layout', $content);

		}else{

			$workingKey='64A51B3B4A3A127BC9A6948E52B543AC';		//Working Key should be provided here.
			if(isset($_POST["encResp"])){
				
				$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
				
				
			
				$rcvdString=SELF::decrypt($encResponse,$workingKey);
				
				$decryptValues=explode('&', $rcvdString);
				//echo "<pre>";
				//print_r($decryptValues);die;		
				$order_id="";
				$order_status="";
				$dataSize=sizeof($decryptValues);
								 
				for($i = 0; $i < $dataSize; $i++) 
				{
					$information=explode('=',$decryptValues[$i]);
					if($i==0)$order_id=$information[1];
					if($i==3)$order_status=$information[1];
					if($i==26)$merchant_param1=$information[1]; 
				}
			
				if($order_status==="Success")
				{
					$order_status="Success";
				}
				else if($order_status==="Aborted")
				{
					$order_status="Aborted";
				}
				else if($order_status==="Failure")
				{	
					$order_status="Failure";	 
				}
				else
				{
					$order_status="Cancel";
				} 
			
				$this->cart->destroy();
				$orderUpdate = array(
					'ord_txt_id' => $order_id,
					'ord_txt_status' => $order_status,
				);
				
				$this->Order_Model->UpdateOrderInformation($orderUpdate, $merchant_param1,$this->fld_refid,$this->table_orders);
			}

			$content['cate']=$this->Home_Model->getCategory($this->fld_cateid,$this->table_category);
			$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);

			$data['cmpt_ord_detail']=$this->Order_Model->get_complete_list_for_online($merchant_param1);
			$ord_id = $data['cmpt_ord_detail']->ord_id;
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_order_product_list_for_online($ord_id);
			
			/*====================Start email send===========*/ 
			
			$emailsubject='Order Detail from Weldkart.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/emailOrder',$data,true);
			$mailsend=email_send($toemail,$emailsubject,$emailmsg);	 
			$content['subview']='thankyou/viewMyOrder';
			$this->load->view('layout', $content);

		}
	}

	function decrypt($encryptedText,$key){

            $encryptionMethod     = "AES-128-CBC";
            $secretKey         = SELF::hextobin(md5($key));
            $initVector         =  pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
            $encryptedText      = SELF::hextobin($encryptedText);
            $decryptedText         =  openssl_decrypt($encryptedText, $encryptionMethod, $secretKey, OPENSSL_RAW_DATA, $initVector);
            return $decryptedText;
    	}
	
	function hextobin($hexString){

            $length = strlen($hexString); 
            $binString="";   
            $count=0; 
           while($count<$length){
                  
            $subString =substr($hexString,$count,2);           
            $packedString = pack("H*",$subString); 
            if ($count==0){
                $binString=$packedString;
            }else{
                $binString.=$packedString;
            }  
            $count+=2; 
        } 
        return $binString; 
      }
	
	public function badRequest()
	{    
		$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);  
		$content['subview']="home/home"; 
		$this->load->view('layout', $content);
	}
}

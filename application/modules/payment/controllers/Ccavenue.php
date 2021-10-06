<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccavenue extends MY_Controller {


    public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");
		//$this->load->model('Home/Dashboard_model', 'hdm');
		//$this->load->helper('common');
	}
	// CALL CCAVENUE REQUEST HANDELER //
	public function ccavRequestHandler()
	{
	   $this->load->view('payment/ccavRequestHandler');
	}
	
	// GET RESPONSE FROM CCAVENUE GATEWAYS //
	public function response()
	{  
	    
	    $reference = $this->session->userdata('logged_in_customers');		
		if(empty($reference)){
			redirect('','refresh');
		}
			
		$cust_id = $reference['cust_id'];	
		$data['cust_name'] = $this->hdm->fetch_cust_info_by_id($cust_id);
			
		$data['title'] = "CarServices.com :: Service Status";
		$data['services'] = $this->hdm->fetch_all_services();
		$data['main_services'] = $this->hdm->fetch_all_home_services();
		$workingKey='451232C9E5D58C5BA7EC446C7C65C92D';		//Working Key should be provided here.
		if(isset($_POST["encResp"])){
			
			$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		
			$rcvdString=SELF::decrypt($encResponse,$workingKey);
			$decryptValues=explode('&', $rcvdString);		
			$order_id="";
			$order_status="";
			$dataSize=sizeof($decryptValues);
			 
			for($i = 0; $i < $dataSize; $i++) 
			{
				$information=explode('=',$decryptValues[$i]);
				if($i==0)$order_id=$information[1];
				if($i==3)$order_status=$information[1];
				if($i==29)$merchant_param4=$information[1]; 
			}
		
			if($order_status==="Success")
			{
				$status="Success";
				 
				
			}
			else if($order_status==="Aborted")
			{
				$status="Aborted";
				 
			
			}
			else if($order_status==="Failure")
			{	
				$status="Failure";
				 
			}
			else
			{
				$status="Cancel";
		 
			
			} 
		
		
			 $data3 = array(
					'txn_id' => $order_id,
					'txn_status' => $status,
			);
			$this->hdm->UpdateBuyStatus($data3, $merchant_param4);
		}
		 
		$this->load->view('home_include/header',$data);
		$this->load->view('home_include/top_header');
		$this->load->view('ccavResponseHandler');
		$this->load->view('home_include/footer');	
			
	}
    function decrypt($encryptedText,$key)
    {
        $encryptionMethod     = "AES-128-CBC";
        $secretKey         = SELF::hextobin(md5($key));
        $initVector         =  pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText      = SELF::hextobin($encryptedText);
        $decryptedText         =  openssl_decrypt($encryptedText, $encryptionMethod, $secretKey, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }
	
	function hextobin($hexString) 
    { 
        $length = strlen($hexString); 
        $binString="";   
        $count=0; 
        while($count<$length) 
        {       
            $subString =substr($hexString,$count,2);           
            $packedString = pack("H*",$subString); 
            if ($count==0)
            {
                $binString=$packedString;
            } 
                
            else 
            {
                $binString.=$packedString;
            } 
                
            $count+=2; 
        } 
        return $binString; 
    }

}
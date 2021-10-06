<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		//$this->load->model('Checkout_Model','Checkout_Model');
		$this->load->model('home/Home_model','Home_Model');
		$this->load->model('Payment_model','Payment_Model');
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
		/* ========FOR PRODUCTS =========== */
		$this->fld_shpid="fld_id";
		$this->table_shipping="tbl_shipping_address";
		/* ========FOR ORDERS =========== */
		$this->fld_ordid="ord_id";
		$this->table_orders="tbl_orders";
		/* ========FOR ORDER PRODUCTS =========== */
		$this->fld_opid="pord_id";
		$this->table_order_products="tbl_orders_product";
		
		/* ========FOR Coupon =========== */
		$this->fld_couid="cou_id";
		$this->table_coupon="tbl_coupon";
		
    }
  
  public function index()
	{
		if(!empty($this->cart->contents())){
			$content['cate']=$this->Home_Model->getCategory($this->fld_cateid,$this->table_category);
			$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);
			
			$gcateid = 26;
			$content['get_gates_product_list']=$this->Home_Model->get_product_list($this->fld_proid,$this->fld_cateid,$gcateid,$this->table_products);
			$grcateid = 31;
			$content['get_grills_product_list']=$this->Home_Model->get_product_list($this->fld_proid,$this->fld_cateid,$grcateid,$this->table_products);
			$stcateid = 32;
			$content['get_stair_product_list']=$this->Home_Model->get_product_list($this->fld_proid,$this->fld_cateid,$stcateid,$this->table_products);
			$dscateid = 33;
			$content['get_designer_product_list']=$this->Home_Model->get_product_list($this->fld_proid,$this->fld_cateid,$dscateid,$this->table_products);
			
			$content['getMixed_product_list']=$this->Home_Model->getMixed_product_list($this->fld_proid,$this->fld_cateid,$this->table_products);
			$shipId=$this->session->userdata('Shipping');
			$content['Address']=$this->Payment_Model->get_shipping_address($this->fld_shpid,$shipId);

			$content['subview']='payment/viewMakePayment';
			$this->load->view('layout', $content);
		}
		else{
			redirect('/');
		}
	}

	/* ==== CREATE SHIPPING ADDRESS IN SESSION FOR PAYMENT ==== */
	public function setShippigSession(){
		$shippingId = $this->input->post('spId');
		if(!empty($shippingId)){
			$this->session->set_userdata('Shipping',$shippingId);
			echo "set";
		}else{
			echo "unset";
		}
	}

	/* ==== CREATE SHIPPING ADDRESS IN SESSION FOR PAYMENT ==== */
	public function check_coupon(){
		$cou_code = $this->input->post('cou_code');
		$check=$this->Payment_Model->check_coupon($cou_code,$this->table_coupon);
		if($check != false){
			echo $check->cou_value;
		}else{
			echo "False";
		}
	}


	/* ==== PLACE ORDER ==== */
	public function placeOrder(){

		$login = $this->session->userdata('Logged_User');
		if(empty($login)){
			redirect('/');
		}
		$login->cust_id;
		
		$custid = $login->cust_id;		// LOGIN CUSTOMER ID //
		
		$shipId=$this->session->userdata('Shipping'); // SHIPPING ADDREES ID //

		$payMethod=$this->input->post('payMode');
		
		$cou_code=$this->input->post('cou_code');
		$check=$this->Payment_Model->check_coupon($cou_code,$this->table_coupon);
		if(!empty($check->cou_value)){$checkRs=$check->cou_value;}else{$checkRs=$check;}
		
		
		if($payMethod=='ONLINE'){
			$paymentMethod='ONLINE';
		}else{
			$paymentMethod='COD';
		}
		
		
		if(!empty($login))
		{
			$ord_adj_amount = $this->cart->total() - $checkRs;
			
			// GET ORDERS REFERENCE ID //
			$year = date('y');
			$month = date('m');
			$random = rand(1000, 9999);
			$orderReferenceID = $year.$month.$random;
			//$OrderAddress = $this->session->userdata('caddress').",".$this->session->userdata('ccity').",".$this->session->userdata('cstate').",".$this->session->userdata('ccountry');
			$orderArray = array(
				'ord_reference_no' => $orderReferenceID,
				'cust_id' => $custid,
				'ord_total_amounts' => $this->cart->total(),
				'ord_coupon_code' => $cou_code,
				'ord_coupon_amount' => $checkRs,
				'ord_adj_amount' => $ord_adj_amount,
				'ord_delivery_address' => $shipId,
				'ord_pay_mode'	=> $paymentMethod,
				'ord_txt_id' => NULL,
				'ord_txt_status' => NULL,
				'ord_created_date' => date('Y:m-d H:i:s')
			);
			// echo "<pre>";
			// print_r($orderArray);die;
			$ordid=$this->Payment_Model->SaveOrderInformation($orderArray,$this->table_orders);
			if($ordid){
				$orderProducts = array();
				foreach($this->cart->contents() as $data)
				{
					$orderProducts[] = array(
						'ord_id' => $ordid,
						'pro_id' => $data['id'],
						'pro_attr_id' => $data['options']['pro_attr_id'],
						'pord_price' => $data['price'],
						'pord_qty' => $data['qty']
					);
				}
				$check = $this->Payment_Model->SaveOrderProduct($orderProducts,$this->table_order_products);
				if($check)
				{
					if($paymentMethod=='ONLINE'){
						echo $orderReferenceID;
					}else{
						//$this->cart->destroy();
						//$this->session->unset_userdata('Shipping');
						$this->session->set_flashdata('orderid',$ordid);
						//redirect('thankyou');
						echo $orderReferenceID;
					}
					
				}
				else
				{
					echo "failed";
				}
			}
			
		}
	}

	/* ==== MAKE PAYMENT CONFIRM ==== */
	public function confirm($refid){

		$login = $this->session->userdata('Logged_User');
		if(empty($login)){
			redirect('/');
		}
		
		if(!empty($this->cart->contents())){
			$content['cate']=$this->Home_Model->getCategory($this->fld_cateid,$this->table_category);
			$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);
			
			$content['get_order_details']=$this->Payment_Model->get_order_details($refid,$this->table_orders);
			// die; 
			$login->cust_id;
			$custid = $login->cust_id;	
			$shipId=$this->session->userdata('Shipping');
			$content['Address']=$this->Payment_Model->get_shipping_address($this->fld_shpid,$shipId);

			$customer_name=$login->cust_fname;
			$customer_emial=$login->cust_email;
			$customer_mobile=$login->cust_phone_no;
			$customer_address=$content['Address']->shippingAddress;
			$product_info=$refid;
			$amount=$content['get_order_details']->ord_adj_amount;

			// Payment Integration //
			$MERCHANT_KEY = "hDkYGPQe"; //change  merchant with yours
			$SALT = "yIEkykqEH3";  //change salt with yours 

			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			//optional udf values 
			$udf1 = '';
			$udf2 = '';
			$udf3 = '';
			$udf4 = '';
			$udf5 = '';
			
			$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
			$hash = strtolower(hash('sha512', $hashstring));

			$success = base_url() . 'thankyou';  
			$fail = base_url() . 'thankyou';
			$cancel = base_url() . 'thankyou';
			
			$content['info'] = array(
				'mkey' => $MERCHANT_KEY,
				'tid' => $txnid,
				'hash' => $hash,
				'amount' => $amount,           
				'name' => $customer_name,
				'productinfo' => $product_info,
				'mailid' => $customer_emial,
				'phoneno' => $customer_mobile,
				'address' => $customer_address,
				'action' => "https://test.payu.in", //for live change action  https://secure.payu.in
				'sucess' => $success,
				'failure' => $fail,
				'cancel' => $cancel            
			);

			$content['subview']='payment/viewPaymentConfirm';
			$this->load->view('layout', $content);
		}
		else{
			redirect('/');
		}

	}

	public function badRequest()
	{    
		$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);  
		$content['subview']="home/home"; 
		$this->load->view('layout', $content);
	}
}

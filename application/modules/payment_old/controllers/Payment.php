<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model('Payment_model','Payment_Model');
		$this->load->model("checkout/Checkout_model",'Checkout');
		 if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		// $this->load->model('home/Home_model','Home_Model');
		// $this->load->model('account/Account_model','Account_Model');
	   /* ========FOR CATEGORY=========== */
		$this->cate_id="cate_id"; 
		$this->table_categories="tbl_categories"; 	
        /* ========FOR SUB CATEGORY=========== */
		$this->scate_id="scate_id"; 
		$this->table_sub_category="tbl_sub_category"; 
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
			/* ========FOR Tax =========== */
		$this->txt_id="txt_id"; 		
		$this->table_tax="tbl_tax";
		/* ========FOR Notification =========== */		
		$this->table_notification="tbl_notification";
		
    }
  
  public function index()
	{
		if(!empty($this->cart->contents())){
			$login = $this->session->userdata('logged_in_customer');
			$cust_id = $login->cust_id;		
		    $content['profile']=$this->customer;
	   
			$shipId=$this->session->userdata('Shipping');
			
			$content['Address']=$this->Payment_Model->get_shipping_address($this->fld_shpid,$shipId);	
			  $content['tax'] = $this->Checkout->tax_list($this->table_tax);	
		  
			// $this->load->view('include/header', $content);
			// $this->load->view('payment/viewMakePayment');
			// $this->load->view('include/footer');
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
		$amount = $this->input->post('amount');
		$check=$this->Payment_Model->check_coupon($cou_code,$this->table_coupon);
		if($check != false){
			if($check->cup_min_order <= $amount){
			//$discount = $check->cup_discount*$amount/100;
			echo $check->cup_discount;
			}else{
			echo'min_order';
		   }
		}else{
			echo "False";
		}
	}

	public function ccavRequestHandler()
	{
	   $this->load->view('payment/ccavRequestHandler');
	}


	/* ==== PLACE ORDER ==== */
	public function placeOrder(){

		$login = $this->session->userdata('logged_in_customer');
		if(empty($login)){
			redirect('/');
		}
		$login->cust_id;
		$name=$login->cust_fname.' '.$login->cust_lname;
		$cust_email=$this->customer->cust_email;
		$cust_phone='+'.phone_code($this->customer->cust_phone_code).''.$this->customer->cust_phone;
		
		$custid = $login->cust_id;		// LOGIN CUSTOMER ID //
		
		$shipId=$this->session->userdata('Shipping'); // SHIPPING ADDREES ID //
		$ship_Address=$this->Payment_Model->get_shipping_address($this->fld_shpid,$shipId);	

		$payMethod=$this->input->post('payMode');
		
		$cou_code=$this->input->post('cou_code');
		$check=$this->Payment_Model->check_coupon($cou_code,$this->table_coupon);
		if(!empty($check->cup_discount)){$checkRs=$check->cup_discount;}else{$checkRs=$check;}

		
		if($payMethod=='ONLINE'){
			$paymentMethod='ONLINE';
		}else{
			$paymentMethod='COD';
		}
		
		//print_r($this->cart->contents());
		
		if(!empty($login))
		{ 
			
			// GET ORDERS REFERENCE ID //
			$year = date('y');
			$month = date('m');
			$random = rand(1000, 9999);
			$orderReferenceID = $year.$month.$random;				
			$total=0;
				// Start Tax			
				$tax = $this->Checkout->tax_list($this->table_tax);	
				$gst=0;
				foreach($tax as $tx_value){			
				$gst +=$tx_value->txt_per*$this->cart->total()/100;	
				}
				// End Tax 
				//Start dl_charge
				// if(delivery()->min_value >=$this->cart->total()){
				// 	$dl_charges=delivery()->value;
				// }else{$dl_charges='0';}	
				if(delivery_st_charge($ship_Address->st_id)->min_amount >=$this->cart->total()){
					$dl_charges=delivery_st_charge($ship_Address->st_id)->amount;
				}else if(delivery_ct_charge($ship_Address->cnt_id)->min_amount >=$this->cart->total()){
					$dl_charges=delivery_ct_charge($ship_Address->cnt_id)->amount;
				}else{$dl_charges='0';}	
				//End dl_charge		
				$gst_with_total=$this->cart->total()+$gst+$dl_charges;	
			 $get_checkRs= $checkRs;			  
			 $ord_adj_amount =$gst_with_total- $get_checkRs;
			$orderArray = array(
				'ord_reference_no' => $orderReferenceID,
				'cust_id' => $custid,
				'ord_total_amounts' =>$ord_adj_amount,
				'ord_adj_amount' =>$ord_adj_amount,
				'ord_coupon_code' => $cou_code,
				'ord_coupon_amount' => $get_checkRs,
				'ord_gst_sum' => $gst,
				'ord_deliver_charge' => $dl_charges,
				'ord_delivery_address' => $shipId,
				'ord_pay_mode'	=> $paymentMethod,
				'ord_txt_id' => NULL,
				'ord_txt_status' => NULL,
				'ord_created_date' => date('Y:m-d H:i:s')
			);
			

			//  echo "<pre>";
			// print_r($orderArray);die;
			if(empty($this->session->userdata('sleeve'))){
			$ordid=$this->Payment_Model->SaveOrderInformation($orderArray,$this->table_orders);
			
			if($ordid){				
				$orderProducts = array();
				$getorderProducts = array();
				$notification_data = array();
				foreach($this->cart->contents() as $data)
				{ $vnd=$data['vnd'];
					if($data['size']=='Select Size'){$size='';}else{$size=$data['size'];}
					$orderProducts[] = array(
						'ord_id' => $ordid,
						'pro_id' => $data['id'],						
						'pro_name' => decode($data['name']),
						'pro_selling_price' => $data['selling_price'],
						'pro_special_price' => $data['special_price'],
						'pro_price' => $data['price'],
						'pro_size' => $size,
						'pro_color' => $data['color'],
						'pro_serialize' => $data['serialize'],
						'pro_qty' => $data['qty'],
						'ord_img' => $data['img'],	
						'ord_vendors' => $data['vnd'],						
						'ord_url' => $data['product_url']
					);
					$getorderProducts[] = array(
						'name' => decode($data['name']),						
						'unit_amount' => $data['price']*1000,						
						'quantity' => $data['qty']
						
					);

						$notification_data[]= array('notification_sender_id' => $custid,
						  	'notification_receiver_id' =>$vnd,
							'notification_noti_id' =>$ordid,
							'notification_text' => 'New Order',
							'notification_read' => 'No',
							'notification_type' => 'Order',
							'notification_create' => date('Y-m-d H:i:s')
				       );
				}
				$notification_save=$this->Payment_Model->SaveOrderProduct($notification_data,$this->table_notification);	
				$check = $this->Payment_Model->SaveOrderProduct($orderProducts,$this->table_order_products);
				if($check)
				{
					if($paymentMethod=='ONLINE'){
                              //echo $orderReferenceID;
						//start thawani Payment Getway
						$dl_charges_array = $gst_array = $coupon_array = array();
						if(!empty($gst)){
				$gst_array[]= array('name' =>'VAT' ,'unit_amount' =>$gst*1000,'quantity' =>1);
		   }
		   if(!empty($get_checkRs)){
				$coupon_array[]= array('name' =>'Coupon' ,'unit_amount' =>$get_checkRs*1000,'quantity' =>1);
		   }
		   if(!empty($dl_charges)){
				$dl_charges_array[]= array('name' =>'Shipping Charge' ,'unit_amount' =>$dl_charges*1000,'quantity' =>1);
		   }
						$getorderProducts_array=array_merge($getorderProducts, $dl_charges_array,$gst_array,$coupon_array);
						// echo"<pre>";
						// print_r($getorderProducts_array);
						// die;
					$this->thawani_pay($orderReferenceID,$getorderProducts_array,$name,$cust_email,$cust_phone,$ordid);
 						//end thawani Payment Getway

						
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
		}else{
			$ordid=$this->Payment_Model->SaveOrderInformation($orderArray,'tbl_make_orders');
			
			if($ordid){
				$orderProducts = array();
				$notification_data = array();
				foreach($this->cart->contents() as $data)
				{ 
					$orderProducts[] = array(
						'ord_id' => $ordid,
						'sl_id' => $data['id'],						
						'sl_name' => decode($data['name']),						
						'sl_price' => $data['price'],
						'sl_img' => $data['img'],						
						'qty' => $data['qty'],
						'fb_id' => $data['fb_id'],	
						'fb_name' => decode($data['fb_name']),
						'fb_img' => $data['fb_img'],
						'cl_id' => $data['cl_id'],	
						'cl_name' => decode($data['cl_name']),
						'cl_img' => $data['cl_img'],
						'shoulder' => $data['sz_shoulder'],
						'bust' => $data['sz_bust'],
						'waist' => $data['sz_waist'],
						'hips' => $data['sz_hips'],
						'length' => $data['sz_length'],
						'sz_img' => $data['sz_img'],
						'vendors' => '0'
					);
				$notification_data[]= array('notification_sender_id' => $custid,
						  	'notification_receiver_id' =>'0',
							'notification_noti_id' =>$ordid,
							'notification_text' => 'New Order',
							'notification_read' => 'No',
							'notification_type' => 'Design Order',
							'notification_create' => date('Y-m-d H:i:s')
				       );
				}
				$notification_save=$this->Payment_Model->SaveOrderProduct($notification_data,$this->table_notification);	
				$check = $this->Payment_Model->SaveOrderProduct($orderProducts,'tbl_make_orders_product');
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
	}


 function thawani_pay($orderReferenceID,$getorderProducts_array,$name,$cust_email,$cust_phone,$ordid){

// echo"<pre>";
// print_r($getorderProducts);die;
 		$arr['client_reference_id'] = $orderReferenceID;
                        $arr['customer_id'] = '';
                        $arr['products']=$getorderProducts_array;
                        $arr['success_url']=base_url('thankyou/success');
                        $arr['cancel_url']=base_url('thankyou/cancel');
                        $arr['metadata'] = array(
						     "customer"=>$name,
						     "email"=>$cust_email,
						     "phone"=>$cust_phone,
						     "order_id"=>$ordid);
                 $myCustomPostData = json_encode($arr); // CUSTOM POST DATA ARRAY //

                         $curl = curl_init();
						    curl_setopt_array($curl, [
						      CURLOPT_URL => "https://uatcheckout.thawani.om/api/v1/checkout/session",
						      CURLOPT_RETURNTRANSFER => true,
						      CURLOPT_ENCODING => "",
						      CURLOPT_MAXREDIRS => 10,
						      CURLOPT_TIMEOUT => 30,
						      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						      CURLOPT_CUSTOMREQUEST => "POST",
						      CURLOPT_POSTFIELDS => $myCustomPostData,
						      CURLOPT_HTTPHEADER => [
						        "Content-Type: application/json",
						        "thawani-api-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et"
						      ],
						    ]);
						    $response = curl_exec($curl);
						    $err = curl_error($curl);
						    curl_close($curl);
						    if ($err) {
						    	echo "failed" ;
						    } else {
						    	$myResponse = json_decode($response);
						    	// echo "<pre>";
						    	// print_r($myResponse);
						    	// die;
						    	//session_start();
						    	$sessionID = $myResponse->data->session_id;
						    $this->session->set_userdata('session_id',$sessionID);
						        //$_SESSION['session_id'] = $sessionID;
						    	//print("<pre>".print_r($myResponse->data->session_id,true)."</pre>");
						    	if($myResponse->success=1){
						    		// $url='https://uatcheckout.thawani.om/pay/'.$sessionID.'?key=HGvTMLDssJghr9tlN9gr4DVYt0qyBy';
						    		//redirect('payment/thawani'); 
						        echo $sessionID ;
						    	   // header("location:http://uatcheckout.thawani.om/pay/$sessionID?key=HGvTMLDssJghr9tlN9gr4DVYt0qyBy");
						    	}else{
						    		echo "failed";
						    		//redirect('home');
						    	    //header("Location:index.php");
						    	}
						    }
 }
	/* ==== MAKE PAYMENT CONFIRM ==== */
	public function confirm($refid){
  		$content['tax'] = $this->Checkout->tax_list($this->table_tax);	
		$login = $this->session->userdata('logged_in_customer');
		if(empty($login)){
			redirect('/');
		}
		
		if(!empty($this->cart->contents())){

			$cust_id = $login->cust_id;		
		    $content['profile']=$this->customer;
	        $content['get_order_details']=$this->Payment_Model->get_order_details($refid,$this->table_orders);
			
			$login->cust_id;
			$custid = $login->cust_id;	
			$shipId=$this->session->userdata('Shipping');
           $content['Address']=$this->Payment_Model->get_shipping_address($this->fld_shpid,$shipId);

			// $customer_name=$login->cust_fname;
			// $customer_emial=$login->cust_email;
			// $customer_mobile=$login->cust_phone_no;

			$customer_name=$content['Address']->shippingFirstName.' '.$content['Address']->shippingLastName;
			$customer_emial=$content['Address']->shippingEmail;
			$customer_mobile=$content['Address']->shippingNumber;

			$customer_address=$content['Address']->shippingAddress;
			$customer_country=$content['Address']->Country;
			$customer_state=$content['Address']->State;
			$customer_city=$content['Address']->City;
			$customer_pincode=$content['Address']->Zip;

			$product_info=$refid;
			$amount=$content['get_order_details']->ord_total_amounts;

			// PayU Money Payment Integration //
			
			$MERCHANT_KEY = "hDkYGPQe"; //change  merchant with yours
			$SALT = "yIEkykqEH3";  //change salt with yours 

			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			//optional udf values 
			$udf1 = '';
			$udf2 = '';
			$udf3 = '';
			$udf4 = '';
			$udf5 = '';
			
			$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $content['get_order_details']->ord_reference_no . '|' . $content['profile']->cust_fname . '|' . $content['profile']->cust_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
			$hash = strtolower(hash('sha512', $hashstring));
			$success = base_url() . 'thankyou/status';  
			$fail = base_url() . 'thankyou/status';
			$cancel = base_url() . 'thankyou/status';
			$content['order'] = array(
				'mkey' => $MERCHANT_KEY,
				'tid' => $txnid,
				'hash' => $hash,
				'amount' => $amount,           
				'name' => $content['profile']->cust_fname,
				'productinfo' => $content['get_order_details']->ord_reference_no,
				'mailid' => $content['profile']->cust_email,
				'phoneno' => $content['profile']->cust_phone,
				'address' => $content['profile']->cust_address,
				'action' => "https://test.payu.in", //for live change action  https://secure.payu.in
				'success' => $success,
				'failure' => $fail,
				'cancel' => $cancel            
			);
			/*--- END of Payu Money Gateway*/ 
			
			$content['info'] = array(
				'amount' => $amount,           
				'name' =>  $content['profile']->cust_fname.''. $content['profile']->cust_lname,
				'productinfo' => $product_info,
				'mailid' => $customer_emial,
				'phoneno' => $customer_mobile,
				'address' => $customer_address,
				'country' => $customer_country,
				'state' => $customer_state,
				'city' => $customer_city,
				'pincode' => $customer_pincode            
			);

			//$content['subview']='payment/viewPaymentConfirm';
			$content['subview']="payment/viewPaymentConfirm"; 
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

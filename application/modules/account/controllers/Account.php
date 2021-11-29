<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Account_model",'Account');		
		$this->load->model("checkout/Checkout_model",'Checkout');	
		$this->load->library("security");	
		 if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
	    $this->load->library('twilio');
		/* ========FOR LOGIN =========== */
		$this->cust_id="cust_id"; 
		$this->fld_email="cust_email"; 	
        $this->fld_password="cust_password";	
		$this->table_customer="tbl_customer";
		 /* ========FOR COUNTRY SETTING===== */
		$this->fld_cnt_id="cnt_id";	 			
	    $this->table_country="tbl_country";
	    /* ========FOR CATEGORY =========== */
		$this->cate_id="cate_id"; 
		$this->cate_slug="cate_slug"; 
		$this->table_category="tbl_category";
        /* ========FOR STATE SETTING===== */
		$this->fld_st_id="st_id";	 			
		$this->table_state="tbl_state";	
        /* ========FOR CITY SETTING===== */
		$this->fld_ct_id="ct_id";	 			
		$this->table_city="tbl_city";
         /* ========FOR ZIPCODE SETTING===== */
	    $this->fld_zc_id="zc_id";	 			
		$this->table_zipcode="tbl_zipcode";	
		/* ========FOR ORDERS =========== */
			/*  ========FOR SHIPPING ADDRESS=========== */
		$this->fld_shid="fld_id";	 		 	 			
		$this->table_shipping="tbl_shipping_address";
		$this->fld_ordid="ord_id";
		$this->fld_refid="ord_reference_no";
		$this->table_orders="tbl_orders";
		 /* ========FOR subscribe===== */			
		$this->table_subscribe="tbl_subscribe";

         /* ========FOR Comments Reviews===== */			
		$this->table_cmnts_reviews="tbl_cmnts_reviews";
		  /* ========FOR order_cancel_reasons===== */			
		$this->table_order_cancel_reasons="tbl_order_cancel_reasons";
			  /* ========FOR cancel_item===== */			
		$this->table_cancel_item="tbl_cancel_item";
		/* ========FOR Notification =========== */		
		$this->table_notification="tbl_notification"; 
    }


 	public function dashboard()
	{
		$this->load->view('account/dashboard');
	}

	public function wishlist()
	{
		if(empty($this->session->userdata('logged_in_customer'))){
			  redirect('/');
		}
		$content['page']='8';
		$content['wishlist'] = $this->Account->get_wishlist($this->customer->cust_id, 'tbl_wishlist');
		$this->load->view('account/wishlist', $content);
	}

	public function wish_delete()
	{
		$id=$this->uri->segment(3);		
		$delete = $this->Account->delete('id',$id,'tbl_wishlist');
		redirect('account/wishlist');
	}

   	public function my_profile()
	{   
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
		$content['page']='2';
		$content['category_list']=$this->Account->get_category_list($this->table_category);
		$content['country'] = $this->Account->location_list('cnt_name','cnt_status',$this->table_country);
		$content['state'] = $this->Account->location_list('st_name','st_status',$this->table_state);
		$content['city'] = $this->Account->location_list('ct_name','ct_status',$this->table_city);
		$content['zipcode'] = $this->Account->location_list('zc_zipcode','zc_status',$this->table_zipcode);
		if($RequestMethod == "POST") { 			
		   	$data=array(
              'cust_fname'=>$this->input->post('cust_fname'),
              'cust_lname'=>$this->input->post('cust_lname'),
		 	   'cust_phone'=>$this->input->post('cust_phone'),
		 	   'cust_phone_code'=>$this->input->post('cust_phone_code'),
         	   'cust_gender'=>$this->input->post('cust_gender'),			  
        	   'cust_dob'=>$this->input->post('cust_dob'),
		 	   'cust_country'=>$this->input->post('cust_country'),
		 	   'cust_state'=>$this->input->post('cust_state'),
		 	   'cust_city'=>$this->input->post('cust_city'),
		 	   'cust_pincode'=>$this->input->post('cust_pincode'),
		 	   'cust_address'=>$this->input->post('cust_address'),
		 	   'cust_updated'=>date('Y-m-d H:i:s') 
		    );  
		    $result = $this->Account->update($this->cust_id,$this->customer->cust_id,$data,$this->table_customer);
            if($result){
		 	   $this->session->set_flashdata('msg',array('message' => 'Profile has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
		 	   redirect('account/my-profile'); 
		    }else{
		 	   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		 	     redirect('account/my-profile'); 
		    }
		 }
		//$content['subview']='account/edit-profile';
		$this->load->view('account/edit-profile', $content);
	    }  
	}



	function profile_image()
	{ 
		$RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {  		
		  
			  $path=FCPATH . 'uploads/customers';
				$image_name='cust_profile';
				$img_files= $path.'/'.$this->customer->cust_profile;  
				if (!unlink($img_files)) {} else { }
				$image_data=$this->Account->images_upload($image_name,$path);
			
		   	$data=array(			  
			   'cust_profile'=>$image_data,			 
			   'cust_updated'=>date('Y-m-d H:i:s') 
		   	); 
		     
		   $result = $this->Account->update($this->cust_id,$this->customer->cust_id,$data,$this->table_customer);
		   redirect('account/my-profile'); 
		 
		    
		}				
	}

	public function shipping_address()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
		$content['page']='5';		
		$content['get_shippingAddress']=$this->Checkout->get_shippingAddress($this->cust_id,$this->customer->cust_id,$this->table_shipping);  
		 $content['country'] = $this->Checkout->location_list('cnt_name','cnt_status',$this->table_country);
		//$content['subview']='account/shipping-address';
		$this->load->view('account/shipping-address', $content);
	    }  
	}

	public function my_order()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
		$content['page']='3';
		$content['order']= $this->Account->get_order_detail($this->customer->cust_id,$this->table_orders);	
		$content['make_order']= $this->Account->get_order_detail($this->customer->cust_id,'tbl_make_orders');	
		//$content['subview']='account/order';
		$this->load->view('account/order', $content);
	    }  
	}

	public function order_details()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
			$ord_id=decode($this->uri->segment(3));
			$content['page']='3';
			$content['order']= $this->Account->get_order_details($ord_id,$this->customer->cust_id,$this->table_orders);	
			$content['OrderDetails']= $this->Account->get_order_product_details($ord_id,$this->customer->cust_id,$this->table_orders);
			$content['returnList'] = $this->Account->getReturnItemList($ord_id,$this->table_cancel_item);
			$content['cancel'] = $this->Account->cancel_reason($this->table_order_cancel_reasons);
			$content['exchange'] = $this->Account->exchange_reason($this->table_order_cancel_reasons);	
			$this->load->view('account/order-details', $content);
	    }  
	}

	public function make_order_details()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
			$ord_id=decode($this->uri->segment(3));
		$content['page']='3';
		$content['order']= $this->Account->get_order_details($ord_id,$this->customer->cust_id,'tbl_make_orders');	
		$content['OrderDetails']= $this->Account->get_make_order_product_details($ord_id,$this->customer->cust_id,$this->table_orders);	

		//$content['subview']='account/make-order-details';
		$this->load->view('account/make-order-details', $content);
	    }  
	}

	public function transactions()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
		$content['page']='6';
		$content['order']= $this->Account->get_order_detail($this->customer->cust_id,$this->table_orders);	
	//	$content['subview']='account/transactions';
		$this->load->view('account/transactions', $content);
	    }  
	}

	public function track()
	{
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{			
		$content['page']='7';
		//$content['subview']='account/track_order';
		$this->load->view('account/track_order', $content);
	    }
	}


	public function change_password()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{			
		$content['page']='4';
		//$content['subview']='account/change_password';
		$this->load->view('account/change_password', $content);
	    }  
	}

	public function changepassword()
	{  
		$RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {
		   $cust_id=$this->customer->cust_id; 
		   $password=md5($this->input->post('old_password'));
		   $user_password=$this->Account->check_password($this->cust_id,$cust_id,$this->fld_password,$password,$this->table_customer);	

		   	if($user_password){
			   $data=array($this->fld_password=>md5($this->input->post('new_password'))); 
			   $result = $this->Account->update($this->cust_id,$cust_id,$data,$this->table_customer);
			    // start email
				if(!empty($this->customer->cust_email)){
					$template=template(3);
					if(!empty($template)){
						$company=company_detail();				
						$login_url=base_url();
						$name=$this->customer->cust_fname.' '.$this->customer->cust_lname;
						$token=array(
							'Company_Logo'=>$company['Company_Logo'],
							'website_url'=>$company['website_url'],
							'social_media_icons'=>$company['social_media_icons'],
							'website_name'=>$company['website_name'],
							'user_full_name'=>$name,
							'new_password'=>$this->input->post('new_password'),
							'login_link'=>$login_url,
							'contact_us_url'=>$company['website_url'],
							'contact_us_email'=>$company['contact_us_email']
						);
						$pattern = '{%s}';
						foreach($token as $key=>$val){
							$varMap[sprintf($pattern,$key)] = $val;
						}			
			            $get_msg=strtr($template->tp_body,$varMap);
					    $subject=strtr($template->tp_subject,$varMap);
			            $from_email = "zahi@mycvone.com";
					    $to_email = $this->customer->cust_email;
					    $this->load->library('email');
					    $config = array (
			              'mailtype' => 'html',
			              'charset'  => 'utf-8',
			              'priority' => '1'
			            );
			            $this->email->initialize($config);
					    $this->email->from($from_email, "ZAHI");
			            $this->email->to($to_email);
			            $this->email->subject($subject);
			            $this->email->message($get_msg);
			            $this->email->send();
					}
				}
				// end email 	
			   if($result){
				   echo'success';
			   }else{
				  echo "Failed";
			   }
		    }else{ 
		    	echo'NotMach';   
			} 
		}
	}

	public function forgot() {	   
			
	    $REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){	
  
		$useremail=$this->input->post('for_email'); 
		$email = $this->security->xss_clean($useremail);
		$check_email =$this->Account->check_email($this->fld_email,$email,$this->table_customer);
		if($check_email){
		$password=rand(10,1000000);
		$data=array($this->fld_password=>md5($password)); 
		$result = $this->Account->update($this->fld_email,$email,$data,$this->table_customer);
			
			   // start email
			if(!empty($email)){
			$template=template(4);
			if(!empty($template)){
			$company=company_detail();				
			$login_url=base_url();
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check_email->cust_fname.' '.$check_email->cust_lname,
				'new_password'=>$password,
				'login_link'=>$login_url,
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			$pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);
			 $from_email = "zahi@mycvone.com";
					    $to_email = $email;
					    $this->load->library('email');
					    $config = array (
			              'mailtype' => 'html',
			              'charset'  => 'utf-8',
			              'priority' => '1'
			            );
			            $this->email->initialize($config);
					    $this->email->from($from_email, "ZAHI");
			            $this->email->to($to_email);
			            $this->email->subject($subject);
			            $this->email->message($get_msg);
			            $this->email->send();
			}
			}
			
		// end email 	
			
			if($result){
			  echo'success';
			}else{
			   echo'Failed';
			}  	
				
			}else{
		    echo'Wrong';
			}
		}
	     
	   

	}
  
    public function singup()
	{ 	
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){			
		$cust_email=$this->input->post('email');
		$check =$this->Account->check_email($this->fld_email,$cust_email,$this->table_customer); 
			if(empty($check)){	
			// start otp msg 
			if(!empty($this->input->post('phone_code')) && !empty($this->input->post('phone'))  && empty($this->input->post('otp'))){
			 $otp=rand(10000,99999);	
		     $phone='+'.code($this->input->post('phone_code')).''.$this->input->post('phone');
             $smsmsg=''.$otp.' is your ZAHI OTP';
			 $this->load->library('twilio');
			 $this->session->set_userdata('otp',$otp);
			 $sms_from = '+447723561455';
			 $sms_to = $phone;
			 $smsresponse = $this->twilio->sms($sms_from, $sms_to, $smsmsg); 
			 echo"OTP"; 
			 }else if($this->session->userdata('otp')!=$this->input->post('otp')){ 
			 	echo'OTP_Failed';
			 }else{              		
			    $data=array(
				'cust_fname'=>$this->input->post('fname'),
				'cust_lname'=>$this->input->post('lname'),
				'cust_email'=>$cust_email,
				'cust_phone'=>$this->input->post('phone'),
				'cust_phone_code'=>$this->input->post('phone_code'),
				'cust_password'=>md5($this->input->post('password')),
				'cust_status'=>'0',
				'cust_EmailVerifiedStatus'=>'1',
				'cust_created'=>date('Y-m-d H:i:s')
				);
			$result =$this->Account->save($data, $this->table_customer); 
			$this->session->unset_userdata('otp');			
			// start email
			// if(!empty($cust_email)){
			// $template=template(1);
			// if(!empty($template)){
			// $company=company_detail();				
			// $url=base_url("account/verify/")."". encode($cust_email);
			// $name=$this->input->post('fname').' '.$this->input->post('lname');
			//  $token=array(
			// 	'Company_Logo'=>$company['Company_Logo'],
			// 	'website_url'=>$company['website_url'],
			// 	'social_media_icons'=>$company['social_media_icons'],
			// 	'website_name'=>$company['website_name'],
			// 	'user_full_name'=>$name,
			// 	'verification_url'=>$url,
			// 	'contact_us_url'=>$company['website_url']
			//  );
			//  $pattern = '{%s}';
			// foreach($token as $key=>$val){
			// 	$varMap[sprintf($pattern,$key)] = $val;
			// }			
   //          $get_msg=strtr($template->tp_body,$varMap);
		 //    $subject=strtr($template->tp_subject,$varMap);			           		
			//  $from_email = "zahi@mycvone.com";
			// 		    $to_email = $cust_email;
			// 		    $this->load->library('email');
			// 		    $config = array (
			//               'mailtype' => 'html',
			//               'charset'  => 'utf-8',
			//               'priority' => '1'
			//             );
			//             $this->email->initialize($config);
			// 		    $this->email->from($from_email, "ZAHI");
			//             $this->email->to($to_email);
			//             $this->email->subject($subject);
			//             $this->email->message($get_msg);
			//             $this->email->send();
			// }
			// }
			// end email 

			if($result){echo'Success';}else{ echo'Failed';}
		}
			}
			else{
			 echo'Used';
			}
		}
		
	}

	public function verify()
	{
		$cust_email=decode($this->uri->segment(3));

		$check =$this->Account->check_email($this->fld_email,$cust_email,$this->table_customer);	

		if(empty($check->cust_EmailVerifiedStatus)){	
		if(!empty($check)){	
		$data=array(
			'cust_EmailVerifiedStatus'=>'1',
			'cust_status'=>'0',
			'cust_updated'=>date('Y-m-d H:i:s')
		); 

      // start email
			if(!empty($cust_email)){
			$template=template(8);
			if(!empty($template)){
			$company=company_detail();		
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check->cust_fname.' '.$check->cust_lname,			
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			//$to=$cust_email;             		
			 $from_email = "zahi@mycvone.com";
					    $to_email = $cust_email;
					    $this->load->library('email');
					    $config = array (
			              'mailtype' => 'html',
			              'charset'  => 'utf-8',
			              'priority' => '1'
			            );
			            $this->email->initialize($config);
					    $this->email->from($from_email, "ZAHI");
			            $this->email->to($to_email);
			            $this->email->subject($subject);
			            $this->email->message($get_msg);
			            $this->email->send();
			}
			}
		// end email 		
		$result=$this->Account->update($this->fld_email,$cust_email,$data,$this->table_customer);
		
        if($result){
			   $this->session->set_flashdata('alert_msg',array('value' => '1'));
			   redirect('home'); 
			}else{
			 $this->session->set_flashdata('alert_msg',array('value' => '2'));
			   redirect('home');  
			} 
		}else{
		redirect('home'); 	
		} 
		}
        else{
	 $this->session->set_flashdata('alert_msg',array('value' => '3'));
			   redirect('home');  
		} 		
		
	}

	 public function thanks() {	
	 		//$content['subview']='account/thanks';
		$this->load->view('account/thanks');
			
	}



	public function check()
	{   
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){	
		
			$getotp=$this->input->post('otp');
			$useremail=$this->input->post('email');
			$userpassword=md5($this->input->post('password'));
		    $email = $this->security->xss_clean($useremail);	
		    $password = $this->security->xss_clean($userpassword);
		    $otp=rand(10000,99999);			
			if(empty($getotp)){
		     //	if(!empty($email) || !empty($password)){
	 			$result =$this->Account->login($email, $password,$this->table_customer); 
				if($result) {
				  if($result->cust_status=="0"){
				  	//otp msg 
				//   	 $phone='+'.code($result->cust_phone_code).''.$result->cust_phone;
    //                  if($result->otp_status=="1"){
    //                     $smsmsg=''.$otp.' is your ZAHI OTP';
				// 		$this->load->library('twilio');
				// 		$sms_from = '+447723561455';
				// 		$sms_to = $phone;
				// 		$smsresponse = $this->twilio->sms($sms_from, $sms_to, $smsmsg);
    //                  	$data= array('otp_msg' =>$otp);
    //                     $update=$this->Account->update('cust_email',$email,$data,$this->table_customer);
    //                     echo'OTP';
    //                 }else{
				  	$this->session->set_userdata('logged_in_customer',$result);
					echo'success';
				   // }
					} else {
					 echo'Active';
					}
				}else{
				   echo'Failed';
				}			
	
			}else{
			$result =$this->Account->otp_login($email, $password,$getotp,$this->table_customer); 
			if($result){
				$data= array('otp_status' =>'2');
                $update=$this->Account->update('cust_email',$email,$data,$this->table_customer);
                $this->session->set_userdata('logged_in_customer',$result);
				echo'success';
			}else{
                echo'OTP_Failed';
			}
			
			} 	
		}
		
	}
	
	
	
	public function logout()
	{  
	   $this->login = $this->session->userdata('logged_in_customer');
		$this->session->unset_userdata('logged_in_customer');
		    redirect('/');
		
	}

public function getSize()
	{
		$SID = $this->input->get('SID');
		$PID = $this->input->get('PID');
		$getcolor = $this->input->get('color');
		$getdata['size'] = $this->Account->get_size($SID,$PID,$getcolor,'tbl_inventory');
		$color = $this->Account->get_color(intid($PID,$SID));
		if(!empty(($color->sp_special_price))){
			$price=$color->sp_special_price;
		}else{$price=$color->int_selleing_price;}
		$getdata['color']= array('int_id' =>$color->int_id ,
			'int_selleing_price' =>$price,
			'int_available_qty' =>$color->int_available_qty  );
		echo json_encode($getdata);
	}

	public function getState()
	{
		$CID = $this->input->get('CID');
		$getdata['State'] = $this->Account->get_location('st_name','st_status',$this->fld_cnt_id,$CID,$this->table_state);
		echo json_encode($getdata['State']);
	}
	
	public function getCity()
	{
		$SID = $this->input->get('SID');
		$getdata['City'] = $this->Account->get_location('ct_name','ct_status',$this->fld_st_id,$SID,$this->table_city);
		echo json_encode($getdata['City']);
	}
	public function getZip()
	{
		$CID = $this->input->get('CID');
		$getdata['Zip'] = $this->Account->get_location('zc_zipcode','zc_status',$this->fld_ct_id,$CID,$this->table_zipcode);
		echo json_encode($getdata['Zip']);
	}
	
	/* ===== REMOVE SHIPPING ADDRESS ===== */
	public function removeShipping($id=null){ 
	
		if($id!==NULL) { 
		
			$result= $this->Checkout->delete_single($this->fld_shid,$id,$this->table_shipping);
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'Shipping address has been successfully remove','class' => 'success','type'=>'Ok!'));
				redirect('account/shipping-address');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Remove.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('account/shipping-address');
			}
		} else {
			$this->session->set_flashdata('msg',array('message' => 'Row cannot Remove!','class' => 'danger','type'=>'Oops!'));
			redirect('account/shipping-address');
		}	    
	}

	public function zipcode(){
		$pincode=$this->input->post('pincode');
		if(!empty($pincode)){
		$check= $this->Account->check_zipcode($pincode,$this->table_zipcode);
		if(!empty($check)){
		echo 'success';	}else{ echo 'Failed';}		
		}
		else{ echo 'Failed';}

	}

	public function subscribe()
	{   
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{	
		if($RequestMethod == "POST") { 	
		$check = $this->Account->check_email('subscribe_email',$this->input->post('email'),$this->table_subscribe);
			if(empty($check)){		
		   	$data=array(
               'subscribe_email'=>$this->input->post('email'),             
				'subscribe_create'=>date('Y-m-d H:i:s') 
		   	);  
		  $result = $this->Account->save($data,$this->table_subscribe);
		   if($result){
			   $this->session->set_flashdata('sub_msg',array('message' => 'Your Email has been subscribed.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			  redirect('/');
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			    redirect('/');
		   }
		}else{
		 $this->session->set_flashdata('sub_msg',array('message' => 'Already Email Id subscribed.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('/');	
		    
		}		
	    }  
		}
	}


 public function reviews_cmnt()
	{   
		$current_url=$this->input->post('current_url');
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{		
		if($RequestMethod == "POST") { 		
		if(empty($this->input->post('rating'))){
			$type='2';
			$notification_type="Comments";
			$notification_text='New Comments';
		}else{$type='1';$notification_text='New Reviews';$notification_type="Reviews";}
		   	$data=array(
               'cust_id'=>$this->customer->cust_id,
               'p_id'=>$this->input->post('pid'),
			   'type'=>$type,
			   'star'=>$this->input->post('rating'),			  
			   'message'=>$this->input->post('comment'),			   
				'created'=>date('Y-m-d H:i:s') 
		   	);  
		  $result = $this->Account->save($data,$this->table_cmnts_reviews);	
		  if($result ){
		  $notification_data= array('notification_sender_id' => $this->customer->cust_id,
		  	'notification_receiver_id' =>product_vendor($this->input->post('pid')),
			'notification_noti_id' =>$this->input->post('pid'),
			'notification_text' => $notification_text,
			'notification_read' => 'No',
			'notification_type' => $notification_type,
			'notification_create' => date('Y-m-d H:i:s')
		       );
			$notification_save=$this->Account->save($notification_data,$this->table_notification);		  
		  redirect($current_url); 
		}
		  
		    
		  }
		
	    }  
	}

	public function cancel_item()
	{   
		
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{		
		if($RequestMethod == "POST") { 	
			$cust_id=$this->customer->cust_id;
			$ordid=decode($this->input->post('cancel_ordid'));
			$vndid=decode($this->input->post('cancel_vndid'));
			$pid=decode($this->input->post('cancel_pid'));
			$type=$this->input->post('return_type');
			$status_type=$this->input->post('status_type');
			$year = date('y');
			$month = date('hm');
			$random = rand(1000, 9999);
			$orderReferenceID = $year.$month.$random;
			$check=$this->Account->check_request($cust_id,$ordid,$pid,$this->table_cancel_item);
		   	if(empty($check)){
		   	$data=array(
		   	   	'c_ref'=>$orderReferenceID,
               	'c_cust_id'=>$cust_id,
               	'c_order_id'=>$ordid,
			   	'c_ven_id'=>$vndid,
			   	'c_pro_id'=>$pid,			  
			   	'c_reason_id'=>$this->input->post('reason'),		
			    'c_comment'=>$this->input->post('comments'),
				'return_type'=>$type,
				'c_status_type'=>$status_type,
				'c_created'=>date('Y-m-d H:i:s') 
		   	); 
		  	$result = $this->Account->save($data,$this->table_cancel_item);	
			if($result){echo'Success';}else{echo'Failed';}
		 	}else{echo'Used';}
		  
		  }
	    }  
	}



    /*--- FACEBOOK JAVASCRIPT LOGIN METHOD / GOOGLE JAVASCRIPT LOGIN METHOD ---*/ 	 


    // FACEBOOK USER DATA SAVE FUNCTION //
    public function saveUserData() {
        // Decode json data and get user profile data
        //$postData = json_decode($_POST['userData']);
        
        // Preparing data for database insertion
        $userData['cust_oauth_provider']        = $_POST['oauth_provider'];
        $userData['cust_oauth_uid']             = $_POST['id'];
        $userData['cust_fname']                 = $_POST['first_name'];
        $userData['cust_lname']                 = $_POST['last_name'];
        $userData['cust_email']                 = $_POST['email'];
        $userData['cust_status']                = '0';
        $userData['cust_EmailVerifiedStatus']   = '1';
        // $userData['locale']           = $postData->locale;
        // $userData['cover']            = $postData->cover->source;
        // $userData['picture']          = $postData->picture->data->url;
        // $userData['link']             = $postData->link;
        // Insert or update user data
        $userID = $this->Account->checkFacebookUser($userData);
        // Set User Session
        $this->session->set_userdata('logged_in_customer',$userID);
        
        return true;
    }
    
    
    // GOOGLE USER DATA SAVE FUNCTION //
    public function saveGoogleUserData() {
        
        // Preparing data for database insertion
        /*--- String To Array ---*/ 
        $fullname  = $this->input->post('name');
        $name = explode(" ",$fullname);
        /*--- End Of String To Array ---*/ 
        $userData['cust_oauth_provider']        = 'Google';
        $userData['cust_oauth_uid']             = $this->input->post('googleIdTocken');
        $userData['cust_fname']                 = $name[0];
        $userData['cust_lname']                 = $name[1];
        $userData['cust_email']                 = $this->input->post('email');
        $userData['cust_status']                = '0';
        $userData['cust_EmailVerifiedStatus']   = '1';
        //print_r($userData);die;
        // Insert or update user data
        $userID = $this->Account->checkGoogleUser($userData);
        // Set User Session
        $this->session->set_userdata('logged_in_customer',$userID);
        
        return true;
    }


	
	
	 
	 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
            $this->load->library("security");			
            $this->load->helper("common");			
            $this->load->model("Login_Model");	
			/* ========FOR VENDOR TABEL=========== */ 			
            $this->fld_id="vnd_id";	
            $this->fld_email="vnd_email";	
            $this->fld_password="vnd_password";	
            $this->table_vendor="tbl_vendor"; 
            /* ========FOR Notification =========== */		
		$this->table_notification="tbl_notification";
		 /* ========FOR COUNTRY SETTING===== */
			$this->fld_cnt_id="cnt_id";	 			
		    $this->table_country="tbl_country";

		     /* ========FOR STATE SETTING===== */
			$this->fld_st_id="st_id";	 			
		    $this->table_state="tbl_state";	
            /* ========FOR CITY SETTING===== */
			$this->fld_ct_id="ct_id";	 			
		    $this->table_city="tbl_city";
            /* ========FOR ZIPCODE SETTING===== */
			$this->fld_zc_id="zc_id";	 			
		    $this->table_zipcode="tbl_zipcode";
		    /* ========FOR BRAND SETTING===== */
			$this->fld_br_id="brd_id";	 			
		    $this->table_brand="tbl_brand";
			
    }
  
    public function index() {	

	    if(($this->session->userdata('logged_in_seller')!==NULL)){
			  redirect('dashboard');
		}else{
			  $this->load->view('login');	

		}

	}
	public function register() {	

	    if(($this->session->userdata('logged_in_seller')!==NULL)){
			  redirect('dashboard');
		}else{
			
	    $content['country'] = $this->Login_Model->location_list('cnt_name','cnt_status',$this->table_country);
	    $content['brand'] = $this->Login_Model->location_list('brd_name','brd_status',$this->table_brand);
	    $REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){			
			$vnd_email=$this->input->post('vnd_email');
			$check =$this->Login_Model->check_email($this->fld_email,$vnd_email,$this->table_vendor); 
			if(empty($check)){	
            $path=APPPATH.'../uploads/profile/';
			$image_name='vnd_picture';				
			$image_data=$this->Login_Model->images_upload($image_name,$path);
			$resize_img=$this->Login_Model->resize_image_large($img,'150','100',$path,$path);

			$file_image=$this->Login_Model->file_images_upload(); 		
		    $data=array(
			'vnd_name'=>$this->input->post('vnd_name'),
			'vnd_email'=>$this->input->post('vnd_email'),
			'vnd_gst_no'=>$this->input->post('vnd_gst_no'),
			'vnd_cr_no'=>$this->input->post('vnd_cr_no'),
			'vnd_phone'=>$this->input->post('phone'),
			'vnd_phone_code'=>$this->input->post('phone_code'),			
			'vnd_category'=>$this->input->post('vnd_category'),
			'vnd_country'=>$this->input->post('vnd_country'),
			'vnd_state'=>$this->input->post('vnd_state'),
			'vnd_city'=>$this->input->post('vnd_city'),
			'vnd_zipcode'=>$this->input->post('vnd_zipcode'),
			'vnd_address'=>$this->input->post('vnd_address'),
			'vnd_bank_name'=>$this->input->post('vnd_bank_name'),
			'vnd_holder_name'=>$this->input->post('vnd_holder_name'),
			'vnd_account_no'=>$this->input->post('vnd_account_no'),
			'vnd_ifsc_code'=>$this->input->post('vnd_ifsc_code'),
			'vnd_bank_address'=>$this->input->post('vnd_bank_address'),
			'vnd_password'=>md5($this->input->post('vnd_password')),
			'vnd_product'=>$this->input->post('vnd_product'),
			//'vnd_brand'=>$this->input->post('vnd_brand'),
			'vnd_picture'=>$image_data,
			'vnd_file'=>$file_image,
			'vnd_status'=>'2',
			'vnd_VerifiedStatus'=>'0',
			'vnd_created'=>date('Y-m-d H:i:s')
			);
			$result =$this->Login_Model->save($data, $this->table_vendor); 

			$notification_data= array('notification_sender_id' => $result,
						  	'notification_receiver_id' =>'0',
							'notification_noti_id' =>$result,
							'notification_text' => 'New Seller',
							'notification_read' => 'No',
							'notification_type' => 'Seller',
							'notification_create' => date('Y-m-d H:i:s')
				       );
			
			$notification_save=$this->Login_Model->save($notification_data,$this->table_notification);
			
			// start email
			if(!empty($vnd_email)){
			$template=template(1);
			if(!empty($template)){
			$company=company_detail();				
			$url=base_url("login/seller_verify/")."". encode($vnd_email);
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$this->input->post('vnd_name'),
				'verification_url'=>$url,
				'contact_us_url'=>$company['website_url']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			$to_email=$vnd_email;             		
			$from_email = "zahi@mycvone.com";
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
			   $this->session->set_flashdata('msg',array('message' => 'Seller Account has been submitted successful. Please check you email.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('login/register'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Vendor  .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('login/register');  
			}  	
				
			}else{
			$this->session->set_flashdata('msg',array('message' => 'Already Vendor Email id used.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('login/register');	
			}
		}
	     
	    $this->load->view('register',$content);	
	
		}

	}
	
	public function seller_verify()
	{
		$vnd_email=decode($this->uri->segment(3));
		$check =$this->Login_Model->check_email($this->fld_email,$vnd_email,$this->table_vendor);	
		if(empty($check->vnd_VerifiedStatus)){	
		if(!empty($check)){	
		$data=array(
			//'vnd_status'=>'1',
			'vnd_VerifiedStatus'=>'1',
			'vnd_updated'=>date('Y-m-d H:i:s')
		); 

      // start email
			if(!empty($vnd_email)){
			$template=template(8);
			if(!empty($template)){
			$company=company_detail();				
			$url=base_url("login/seller_verify/")."". encode($vnd_email);
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check->vnd_name,				
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);				           		
			$to_email=$vnd_email;             		
			$from_email = "zahi@mycvone.com";
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
		$result=$this->Login_Model->update($this->fld_email,$vnd_email,$data,$this->table_vendor);

        if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Your Email Id is verified successfully .','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('login/register'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Vendor  .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('login/register');  
			} 
		}else{
		redirect('login'); 	
		} 
		}
          else{
			   $this->session->set_flashdata('msg',array('message' => "Already Email Id is verified .",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('login/register');  
			} 		
		
	}
	
	
public function verify()
	{
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){
			
			$useremail=$this->input->post('email');
			$userpassword=md5($this->input->post('password'));
		    $email = $this->security->xss_clean($useremail);	
		    $password = $this->security->xss_clean($userpassword);	
			
			if(!empty($email) || !empty($password)){
				$result =$this->Login_Model->login($email, $password,$this->table_vendor); 
				if($result) {
				  if($result->vnd_status=="1"){
				  	 if($result->vnd_VerifiedStatus=="1"){

				   /* ==================MANAGE LAST LOGIN DATE TIME =================== */ 
				    $data=array('vnd_lastLogin'=>date('Y-m-d H:i:s'));  
					$this->Login_Model->update($this->fld_email,$result->vnd_email,$data,$this->table_vendor);   
				   /* ================END OF THE LAST LOGIN DATE TIME=================== */ 
					
					$this->session->set_userdata('logged_in_seller',$result);
					$this->session->set_flashdata('msg', array('message' => 'you have successfully logged in.','class' => 'success','type'=>'Congratulation !','icon'=>'thumbs-up'));
					redirect('dashboard');
					} else {
					   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode. Your email not verified.','class' => 'warning','type'=>'Oops!','icon'=>'slash'));
					   redirect('login');
					}
					} else {
					   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode.Contact administrator.','class' => 'warning','type'=>'Oops!','icon'=>'slash'));
					   redirect('login');
					}
				}else{
				    $this->session->set_flashdata('msg', array('message' => 'Please Enter Valid Email and Password.','class' => 'danger','type'=>'Oops!','icon'=>'slash')); 
					   redirect('login');
				}			
	
			}else{
                $this->session->set_flashdata('msg',array('message' => 'Please enter Email and Password.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('login');
			} 
		} 
		$this->load->view('login');
	}
	
	public function forgot() {	

	    if(($this->session->userdata('logged_in_seller')!==NULL)){
			  redirect('dashboard');
		}else{		
			
	    $REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){	
  
		$useremail=$this->input->post('email'); 
		$email = $this->security->xss_clean($useremail);
		$check_email =$this->Login_Model->check_email($this->fld_email,$email,$this->table_vendor);
		if($check_email){
		$password=rand(10,1000000);
		$data=array($this->fld_password=>md5($password)); 
		$result = $this->Login_Model->update($this->fld_email,$email,$data,$this->table_vendor);
			
			   // start email
			if(!empty($email)){
			$template=template(4);
			if(!empty($template)){
			$company=company_detail();				
			$login_url=base_url("login");
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check_email->vnd_name,
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
			//$to=$email;
			$to_email=$email;             		
			$from_email = "zahi@mycvone.com";
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
			   $this->session->set_flashdata('msg',array('message' => 'Your password has been successfully reset. Check Your Email Id.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('login/forgot'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Vendor  .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('login/forgot');  
			}  	
				
			}else{
			$this->session->set_flashdata('msg',array('message' => 'Email Id Invalid !','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('login/forgot');	
			}
		}
	     
	    $this->load->view('forgot_password');	
	
		}

	}
	function forgot1(){
		
		$useremail=$this->input->post('email'); 
		$email = $this->security->xss_clean($useremail);
		if(!empty($email)){
			$result =$this->Login_Model->check_email($this->fld_email,$email,$this->table_master);
			if($result) { 
			    if($result->vnd_status=="active"){ 
					 $result->password=rand(10,1000000);
					 $data['user_info']=$result;
					 $subject = "Password Recovery Mail";
				     $UserMail=$this->load->view('login/email/forgot_password',$data,true);
					 $to      = 'palsanjeev19@gmail.com';  
					 $headers  = 'MIME-Version: 1.0' . "\r\n";
					 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
					 $headers .= 'From: Forgot Password <noreplay@gmail.com>' . "\r\n"; 
					 mail($to, $subject, $UserMail, $headers); 
				     $data=array($this->fld_password=>md5($result->password)); 
				     $result = $this->Login_Model->update($this->fld_email,$email,$data,$this->table_master);						
					 $this->session->set_flashdata('msg', array('message' => 'Your password has been successfully reset. Check Your Email Id.','class' => 'success','type'=>'Congratulation !'));
					redirect('login');
				} else {
				   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode contact administrator.','class' => 'warning','type'=>'Oops!'));
				   redirect('login');
				}
			}else{
				$this->session->set_flashdata('msg', array('message' => 'You are not register with us.','class' => 'danger','type'=>'Oops!')); 
				   redirect('login');
			}			
	
		}else{
			$this->session->set_flashdata('msg',array('message' => 'Please Enter Your Email Id.','class' => 'danger','type'=>'Oops!'));
			redirect('login');
		}
	}
	
	public function logout()
	{  
	   $this->login = $this->session->userdata('logged_in_seller');	
        $data=array('vnd_lastLogout'=>date('Y-m-d H:i:s'));
	
		$this->session->unset_userdata('logged_in_seller');
		$result = $this->Login_Model->update($this->fld_email,$this->login->vnd_email,$data,$this->table_vendor); 
		 if($result){ 
			 $this->session->set_flashdata('msg', array('message' => 'You have successfully logout.','class' => 'success','type'=>'Ok !','icon'=>'thumbs-up'));
		     redirect('login');
		 }else{
			 $this->session->set_flashdata('msg',array('message' => 'Unable to sign out some error occurred ','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			redirect('login');
		 } 
		
	}
	  


	public function getState()
	{
		$CID = $this->input->get('CID');
		$getdata['State'] = $this->Login_Model->get_location('st_name','st_status',$this->fld_cnt_id,$CID,$this->table_state);
		echo json_encode($getdata['State']);
	}
	
	public function getCity()
	{
		$SID = $this->input->get('SID');
		$getdata['City'] = $this->Login_Model->get_location('ct_name','ct_status',$this->fld_st_id,$SID,$this->table_city);
		echo json_encode($getdata['City']);
	}
	public function getZip()
	{
		$CID = $this->input->get('CID');
		$getdata['Zip'] = $this->Login_Model->get_location('zc_zipcode','zc_status',$this->fld_ct_id,$CID,$this->table_zipcode);
		echo json_encode($getdata['Zip']);
	}
	
	 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
             $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Profile_model",'Profile_Model');	
           /* ========FOR VENDOR TABEL========= */ 			
            $this->fld_email="vnd_email";	
            $this->fld_password="vnd_password";	
            $this->table_vendor="tbl_vendor";
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
            /* ========FOR CATEGORY SETTING=== */
			$this->fld_cate_id="cate_id";
			$this->table_category="tbl_category";	
			$this->fld_cate_id="cate_id";
			$this->table_category="tbl_category";	
			  /* ========FOR Messsage Setting===== */
			$this->fld_msg_id="msg_id";	 			
		    $this->table_message="tbl_message";	
		      /* ========FOR Messsage Setting===== */
			$this->fld_noti_id="notification_id";	 			
		    $this->table_noti="tbl_notification";			
    }
 
    function index() {  
        
         $RequestMethod = $this->input->server('REQUEST_METHOD');
		$content['country'] = $this->Profile_Model->location_list('cnt_name','cnt_status',$this->table_country);
		$content['state'] = $this->Profile_Model->location_list('st_name','st_status',$this->table_state);
		$content['city'] = $this->Profile_Model->location_list('ct_name','ct_status',$this->table_city);
		$content['zipcode'] = $this->Profile_Model->location_list('zc_zipcode','zc_status',$this->table_zipcode);
		 $content['category'] = $this->Profile_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
	    if($RequestMethod == "POST") { 			
		   	$data=array(
               'vnd_name'=>$this->input->post('vnd_name'),
               'vnd_name_ar'=>$this->input->post('vnd_name_ar'),
			   'vnd_phone'=>$this->input->post('vnd_phone'),
			   'vnd_phone_code'=>$this->input->post('vnd_phone_code'),
			   'vnd_gendor'=>$this->input->post('vnd_gendor'),
			   'vnd_gst_no'=>$this->input->post('vnd_gst_no'),
			   'vnd_dob'=>$this->input->post('vnd_dob'),
			   'vnd_country'=>$this->input->post('vnd_country'),
			   'vnd_state'=>$this->input->post('vnd_state'),
				'vnd_city'=>$this->input->post('vnd_city'),
				'vnd_zipcode'=>$this->input->post('vnd_zipcode'),
				'vnd_address'=>$this->input->post('vnd_address'),
				'vnd_about'=>$this->input->post('vnd_about')
				,'vnd_updated'=>date('Y-m-d H:i:s') 
		   	);  
		   $result = $this->Profile_Model->update($this->fld_email,$this->login->vnd_email,$data,$this->table_vendor);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Profile has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('profile'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('profile');  
		   }
		    
		}			
		  $content['subview']="profile";
		  $this->load->view('layout', $content);
         
	}	

    function credit() {  
        
         $RequestMethod = $this->input->server('REQUEST_METHOD');
		$content['country'] = $this->Profile_Model->location_list('cnt_name','cnt_status',$this->table_country);
		$content['state'] = $this->Profile_Model->location_list('st_name','st_status',$this->table_state);
		$content['city'] = $this->Profile_Model->location_list('ct_name','ct_status',$this->table_city);
		$content['zipcode'] = $this->Profile_Model->location_list('zc_zipcode','zc_status',$this->table_zipcode);
		 $content['category'] = $this->Profile_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
	    if($RequestMethod == "POST") { 			
		   	$data=array(
               'vnd_name'=>$this->input->post('vnd_name'),
			   'vnd_phone'=>$this->input->post('vnd_phone'),
			   'vnd_gendor'=>$this->input->post('vnd_gendor'),
			   'vnd_gst_no'=>$this->input->post('vnd_gst_no'),
			   'vnd_dob'=>$this->input->post('vnd_dob'),
			   'vnd_country'=>$this->input->post('vnd_country'),
			   'vnd_state'=>$this->input->post('vnd_state'),
				'vnd_city'=>$this->input->post('vnd_city'),
				'vnd_zipcode'=>$this->input->post('vnd_zipcode'),
				'vnd_address'=>$this->input->post('vnd_address'),
				'vnd_about'=>$this->input->post('vnd_about')
				,'vnd_updated'=>date('Y-m-d H:i:s') 
		   	);  
		   $result = $this->Profile_Model->update($this->fld_email,$this->login->vnd_email,$data,$this->table_vendor);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Profile has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('profile'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('profile');  
		   }
		    
		}			
		  $content['subview']="profile";
		  $this->load->view('layout', $content);
         
	}

	 function messages() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
        $search=$this->input->get('search');
        if(!empty($search)){
        $content['message'] = $this->Profile_Model->get_serach_message($search,$this->login->vnd_id,$this->table_message);	
        }else{
		$content['message'] = $this->Profile_Model->get_message($this->login->vnd_id,$this->table_message);	
		}	
		$content['spage']='1';       
		  $content['subview']="message";
		  $this->load->view('layout', $content);
         
	}	
    

	function sent() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
         $search=$this->input->get('search');
        if(!empty($search)){
        $content['message'] = $this->Profile_Model->get_search_sent_message($search,$this->login->vnd_id,$this->table_message);	
        }else{
		$content['message'] = $this->Profile_Model->get_sent_message($this->login->vnd_id,$this->table_message);	
		}	
		// $content['message'] = $this->Profile_Model->get_sent_message($this->login->vnd_id,$this->table_message);		
		$content['spage']='2';       
		  $content['subview']="sent_message";
		  $this->load->view('layout', $content);
         
	}

	function starred() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
          $search=$this->input->get('search');
        if(!empty($search)){
        $content['message'] = $this->Profile_Model->get_search_starred_message($search,$this->login->vnd_id,$this->table_message);	
        }else{
		$content['message'] = $this->Profile_Model->get_starred_message($this->login->vnd_id,$this->table_message);	
		}					
		$content['spage']='3';       
		  $content['subview']="starred_message";
		  $this->load->view('layout', $content);
         
	}	

	function starred_change() {  
		$msg_id=decode($this->input->post('msg_id'));
		$msg_star=$this->input->post('msg_star');
		if($msg_star=='1'){
			$star='0';
			$message='<i class="fa fa-star"></i>';
		}else{
		$star='1';
		$message='<i class="fa fa-star inbox-started"></i>';
		
		}
		$data=array(
               'msg_star'=>$star,'msg_updated'=>date('Y-m-d H:i:s') 
		   	);  
		 $update = $this->Profile_Model->update($this->fld_msg_id,$msg_id,$data,$this->table_message);	
		$content['message'] = $message;	
		$content['star'] = $star;		
		echo json_encode($content);
        	
         
	}	


	 function compose() {          
       
		$content['spage']='1';       
	    $content['subview']="compose";
		$this->load->view('layout', $content);
         
	}	

	 function message_save() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
		    if($RequestMethod == "POST") { 			
		   	$data=array(
               'msg_sender'=>$this->login->vnd_id,
			   'msg_receiver'=>'0',
			   'msg_subject'=>$this->input->post('msg_subject',true),
			   'msg_message'=>$this->input->post('msg_message',true),
			   'msg_updated'=>date('Y-m-d H:i:s') ,			  
			   'msg_created'=>date('Y-m-d H:i:s') 
		   	);  
		   $result = $this->Profile_Model->save($data,$this->table_message);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Your mail has been sent.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('profile/sent'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('profile/compose');  
		   }
		    
		}
         
	}	

 function message_reply() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
		    if($RequestMethod == "POST") { 	
		    $reply_id=encode($this->input->post('reply_id'));		    		
		   	$data=array(
               'msg_sender'=>$this->login->vnd_id,
			   'msg_receiver'=>'0',
			   'msg_reply'=>$this->input->post('reply_id'),
			   'msg_subject'=>$this->input->post('msg_subject',true),
			   'msg_message'=>$this->input->post('msg_message',true),
			   'msg_updated'=>date('Y-m-d H:i:s') ,			  
			   'msg_created'=>date('Y-m-d H:i:s') 
		   	);  
		   $result = $this->Profile_Model->save($data,$this->table_message);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Your mail has been sent.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('profile/messsage_view/'.$reply_id); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('profile/messsage_view/'.$reply_id); 
		   }
		    
		}
         
	}	

	 function messsage_view($id) {  
	 	$msg_id=decode($id);  
	 	 	$data=array(
               'msg_type'=>'1','msg_updated'=>date('Y-m-d H:i:s') 
		   	);  
		   $update = $this->Profile_Model->update($this->fld_msg_id,$msg_id,$data,$this->table_message);		     
       $content['message'] = $this->Profile_Model->messsage_view($msg_id,$this->table_message);	       

		$content['spage']='1';       
		  $content['subview']="view_message";
		  $this->load->view('layout', $content);
         
	}	
	function message_read(){
		
           $msg_id=$this->input->post('msg_id');
           foreach ($msg_id as $id) {
            	$data=array(
               'msg_type'=>'1','msg_updated'=>date('Y-m-d H:i:s') 
		   	);  
            	$get_msg_id=decode($id);
		   $update = $this->Profile_Model->update($this->fld_msg_id,$get_msg_id,$data,$this->table_message);
           }
           echo"success";
       
	}




	function trash() {  
        
        $RequestMethod = $this->input->server('REQUEST_METHOD');
          $search=$this->input->get('search');
        if(!empty($search)){
        $content['message'] = $this->Profile_Model->get_search_trash_message($search,$this->login->vnd_id,$this->table_message);	
        }else{
		$content['message'] = $this->Profile_Model->get_trash_message($this->login->vnd_id,$this->table_message);	
		}
		$content['spage']='4';       
		  $content['subview']="trash_message";
		  $this->load->view('layout', $content);
         
	}	

	function message_trash(){
		
           $msg_id=$this->input->post('msg_id');
           foreach ($msg_id as $id) {
            	$data=array(
               'msg_status'=>'1','msg_updated'=>date('Y-m-d H:i:s') 
		   	);  
            	$get_msg_id=decode($id);
		   $update = $this->Profile_Model->update($this->fld_msg_id,$get_msg_id,$data,$this->table_message);
           }
           echo"success";
       
	}

	function message_delete(){
		
           $msg_id=$this->input->post('msg_id');
           foreach ($msg_id as $id) {
                    	$get_msg_id=decode($id);
		   $update = $this->Profile_Model->delete($this->fld_msg_id,$get_msg_id,$this->table_message);
           }
           echo"success";
       
	}


	function bank() { 
        		
		   	$data=array(
			   'vnd_bank_name'=>$this->input->post('vnd_bank_name'),
			   'vnd_holder_name'=>$this->input->post('vnd_holder_name'),
				'vnd_account_no'=>$this->input->post('vnd_account_no'),
				'vnd_ifsc_code'=>$this->input->post('vnd_ifsc_code'),
				'vnd_bank_address'=>$this->input->post('vnd_bank_address')
				,'vnd_updated'=>date('Y-m-d H:i:s') 
		   	);  
		   $result = $this->Profile_Model->update($this->fld_email,$this->login->vnd_email,$data,$this->table_vendor);
		   if($result){
			   $this->session->set_flashdata('bmsg',array('message' => 'Bank detail has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('profile'); 
		   }else{
			   $this->session->set_flashdata('bmsg',array('message' => "Unable to Bank detail .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('profile');  
		   }
		    
		
         
	}	
	
	function change_password() {
		
	   $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {
		   $email=$this->login->vnd_email; 
		   $password=md5($this->input->post('old_password'));
		   $user_password=$this->Profile_Model->check_password($this->fld_email,$this->fld_password,$email,$password,$this->table_vendor);
		   
		   if($user_password){
			
			   $data=array($this->fld_password=>md5($this->input->post('new_password'))); 
			   $result = $this->Profile_Model->update($this->fld_email,$email,$data,$this->table_vendor);
			    // start email
			if(!empty($this->vendor->vnd_email)){
			$template=template(3);
			if(!empty($template)){
			$company=company_detail();				
			$login_url=base_url("login");
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$this->vendor->vnd_name,
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
			$to=$this->vendor->vnd_email;
			email_send($to,$subject,$get_msg);
			}
			}
		// end email 	
			   
			   if($result){
				   $this->session->set_flashdata('msg',array('message' => 'Password has been successfully changed.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
				   redirect('login/logout'); 
			   }else{
				   $this->session->set_flashdata('msg',array('message' => "Unable to Change Password.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				   redirect('profile/change-passwordt');  
			   }
		    }else{
			   $this->session->set_flashdata('msg',array('message' => "Old Password doesn't match Password",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('profile/change-password');  
		    } 
		}
       $content['subview']="profile/change_password";
		  $this->load->view('layout', $content);		
		  
	}
	
	function profile_image(){ 
		$RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {  
		
			$profile_info=vendor_profile($this->login->vnd_email);  
		  
			  $path=FCPATH . 'uploads/profile';
				$image_name='vnd_picture';
				$img_files= $path.'/'.$profile_info->vnd_picture;  
				if (!unlink($img_files)) {} else { }
				$image_data=$this->Profile_Model->images_upload($image_name,$path);
				$resize_img=$this->Profile_Model->resize_image_large($img,'150','100',$path,$path);
			
		   	$data=array(			  
			   'vnd_picture'=>$image_data,			 
			   'vnd_updated'=>date('Y-m-d H:i:s') 
		   	); 
		     
		   $result = $this->Profile_Model->update($this->fld_email,$profile_info->vnd_email,$data,$this->table_vendor);
		   redirect('profile'); 
		 
		    
		}				
	}
	
   function remove_image(){ 
			$profile_info=vendor_profile($this->login->vnd_email); 
		    $path=FCPATH . 'uploads/profile';
				$img_files= $path.'/'.$profile_info->vnd_picture; 
				if (!unlink($img_files)) {} else { }
				$data=array(			  
			   'vnd_picture'=>'',			 
			   'vnd_updated'=>date('Y-m-d H:i:s') 
		   	); 
		     
		   $result = $this->Profile_Model->update($this->fld_email,$profile_info->vnd_email,$data,$this->table_vendor);
		   redirect('profile'); 
		 
		    
					
	}


   function notification($id) {  
		 $noti_id=decode($id);	
	    $notification = $this->Profile_Model->get_notification($this->fld_noti_id,$noti_id,$this->table_noti);
	    $product_name=slug(product($notification->notification_noti_id));
	    $product_id=encode($notification->notification_noti_id);
		
	    $data=array('notification_read'=>'Yes');  
		$update = $this->Profile_Model->update($this->fld_noti_id,$noti_id,$data,$this->table_noti);

		if($notification->notification_type=='Order'){
		 redirect('order'); 
		}else{
		 redirect('../product/'.$product_id."/".$product_name); 		
		}
		         
	}	

	public function getState()
	{
		$CID = $this->input->get('CID');
		$getdata['State'] = $this->Profile_Model->get_location('st_name','st_status',$this->fld_cnt_id,$CID,$this->table_state);
		echo json_encode($getdata['State']);
	}
	
	public function getCity()
	{
		$SID = $this->input->get('SID');
		$getdata['City'] = $this->Profile_Model->get_location('ct_name','ct_status',$this->fld_st_id,$SID,$this->table_city);
		echo json_encode($getdata['City']);
	}
	public function getZip()
	{
		$CID = $this->input->get('CID');
		$getdata['Zip'] = $this->Profile_Model->get_location('zc_zipcode','zc_status',$this->fld_ct_id,$CID,$this->table_zipcode);
		echo json_encode($getdata['Zip']);
	}
	
	
	public function badrequest() { 
	
		$content['subview']="dashboard/badrequest";
		$this->load->view('layout', $content);

	}
			
	
}

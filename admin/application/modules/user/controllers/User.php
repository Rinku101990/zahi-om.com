<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	 
	public function __construct()
	{
        parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		}  	
        $this->load->model("User_model",'User_Model');
        $this->load->library('twilio');
       	/* ========FOR MASTER TABEL=========== */ 			
        $this->fld_cid="cust_id";	
        $this->fld_csts="cust_status";	
        $this->customers="tbl_customer";
        /* ========FOR VENDORS TABEL=========== */ 			
        $this->fld_vid="vnd_id";	
        $this->fld_vsts="vnd_status";	
        $this->vendors="tbl_vendor";
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
        /*--- FOR VENDOR PRODUCTS LIST ---*/
        $this->fld_opid="op_id";
        $this->fld_oid="ord_id";
        $this->fld_pid="pro_id";	
        $this->fld_vndsts="ord_vendors";	
        $this->ordproducts="tbl_orders_product";
        /* ========FOR Messsage Setting===== */
			$this->fld_noti_id="notification_id";	 			
		    $this->table_noti="tbl_notification";	
    }
 
    public function index()
    {
    	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['customer_list_view'])){
        $content['admin']=admin_profile($this->login->mst_email);
        $content['customers'] = $this->User_Model->get_customer_list($this->fld_cid,$this->customers);	     
        
		$content['subview']="user";
		$this->load->view('layout', $content);   
		 }else{ redirect('dashboard'); 
         }
	}	
	
	public function export_customers()
	{
	     $filename = 'Customers'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		  $customers = $this->User_Model->get_customers($this->fld_cid,$this->customers);	  ;
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("NAME","EMAIL", "PHONE", "GENDER", "DOB","CITY","STATE","COUNTRY","ADDRESS","PINCODE","STATUS","CREATED DATE"); 
		   fputcsv($file, $header);
		   foreach ($customers as $key=>$line){ 		
		   if($line->cust_gender=='1'){ $gen='MALE';}else{$gen='FEMALE';} 
		   if($line->cust_status=='0'){ $status='Active';}else if($line->cust_status=='1'){ $status='In-Active';}else{$status='Block';}      	
		   	  $narray=array($line->cust_fname.' '.$line->cust_lname,$line->cust_email,$line->cust_phone,$gen,$line->cust_dob,$line->ct_name,$line->st_name,$line->cnt_name,$line->cust_address,$line->zc_zipcode,$status,date('j M Y, G:i A',strtotime($line->cust_created)));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
	}

	public function profile($id=null)
	{
		$content['profile'] = $this->User_Model->get_customer_profile($this->fld_cid,$id,$this->customers);
		if(!empty($content['profile'])){
			$content['admin']=admin_profile($this->login->mst_email);	 
			$content['subview']="customerProfile";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);	 
			$content['subview']="badrequest";
			$this->load->view('layout', $content);
		}	
	}

	public function custUpdate($custid=null,$custStatus=null)
	{
		if(isset($custid) && isset($custStatus)){
			$cstid = decode($custid);
			$cstSts = array(
				'cust_status'=>decode($custStatus)
			);
			$updateStatus = $this->User_Model->update_customer_account($this->fld_cid,$cstid,$cstSts,$this->customers);
			if($updateStatus){
				redirect('user/profile/'.$cstid);
			}else{
				redirect('user/profile/'.$cstid);
			}
		}else{
			redirect('user');
		}
	}

	public function profile_edit(){
		$content['admin']=admin_profile($this->login->mst_email);
        $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") { 			
		   	$data=array(
			   'mst_ref_id'=>$this->input->post('mst_ref_id'),			  
			   'mst_name'=>$this->input->post('mst_name'),
			   'mst_mobile_number'=>$this->input->post('mst_mobile_number'),
			   'mst_address'=>$this->input->post('mst_address'),
			   'mst_about'=>$this->input->post('mst_about'), 
			   'mst_updated'=>date('Y-m-d H:i:s') 
		   	);  
		     
		   $result = $this->Dashboard_Model->update($this->fld_email,$this->login->mst_email,$data,$this->table_master);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Profile has been successfully Update.','class' => 'success','type'=>'Ok!'));
			   redirect('dashboard/profile-edit'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Password.Some error occurred.",'class' => 'danger','type'=>'Oops!'));
			   redirect('dashboard/profile-edit');  
		   }
		    
		}			 
		$content['subview']="profile_edit";
		$this->load->view('layout', $content);
	}
	 
	public function change_password() {
		
	   $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {
		   $email=$this->login->mst_email; 
		   $password=md5($this->input->post('old_password'));
		   $user_password=$this->Dashboard_Model->check_password($this->fld_email,$this->fld_password,$email,$password,$this->table_master);
		   if($user_password){
			   
			   $data=array($this->fld_password=>md5($this->input->post('password'))); 
			   $result = $this->Dashboard_Model->update($this->fld_email,$email,$data,$this->table_master);
			   if($result){
				   $this->session->set_flashdata('p_msg',array('message' => 'Password has been successfully changed.','class' => 'success','type'=>'Ok!'));
				   redirect('dashboard/profile-edit'); 
			   }else{
				   $this->session->set_flashdata('p_msg',array('message' => "Unable to Change Password.Some error occurred.",'class' => 'danger','type'=>'Oops!'));
				   redirect('dashboard/profile-edit');  
			   }
		    }else{
			   $this->session->set_flashdata('p_msg',array('message' => "Old Password doesn't match Password",'class' => 'danger','type'=>'Oops!'));
				redirect('dashboard/profile-edit');  
		    } 
		}				  	  
	}
	
	public function profile_image(){ 
		$RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {  
		
			$profile_info=admin_profile($this->login->mst_email);  
		  
			  $path=FCPATH . 'uploads/profile';
				$image_name='mst_picture';
				$img_files= $path.'/'.$profile_info->mst_picture;  
				if (!unlink($img_files)) {} else { }
				$image_data=$this->Dashboard_Model->images_upload($image_name,$path);
			
		   	$data=array(			  
			   'mst_picture'=>$image_data,			 
			   'mst_updated'=>date('Y-m-d H:i:s') 
		   	); 
		     
		   $result = $this->Dashboard_Model->update($this->fld_email,$profile_info->mst_email,$data,$this->table_master);
		   redirect('dashboard/profile'); 
		 
		    
		}				
	}

	/*--- Vendors Activities ---*/
	public function vendors()
	{
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['vendor_list_view'])){
		$content['admin']=admin_profile($this->login->mst_email);
        $content['vendors'] = $this->User_Model->get_vendor_list($this->fld_vid,$this->vendors);	      
		$content['subview']="user/vendors_list";
		$this->load->view('layout', $content); 
	    }else{
		   redirect('dashboard'); 
	    }
	}

	public function export_vendors()
	{
	     $filename = 'Vendors'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		  $vendors = $this->User_Model->get_vendor($this->fld_vid,$this->vendors);	  ;
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("NAME","EMAIL", "PHONE", "GST", "GENDER", "DOB","CITY","STATE","COUNTRY","ADDRESS","PINCODE","STATUS","CREATED DATE"); 
		   fputcsv($file, $header);
		   foreach ($vendors as $key=>$line){ 		
		   if($line->vnd_gendor=='1'){ $gen='MALE';}else{$gen='FEMALE';} 
		   if($line->vnd_status=='1'){ $status='Active';}else if($line->cust_status=='2'){ $status='In-Active';}else{$status='Block';}      	
		   	  $narray=array($line->vnd_name,$line->vnd_email,$line->vnd_phone,$line->vnd_gst_no,$gen,$line->vnd_dob,$line->ct_name,$line->st_name,$line->cnt_name,$line->vnd_address,$line->zc_zipcode,$status,date('j M Y, G:i A',strtotime($line->vnd_created)));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
	}

	public function vendor_add() {
		$content['admin']=admin_profile($this->login->mst_email);
		
	   $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {	
		   $checkemail=$this->User_Model->checkemail('vnd_email',$this->input->post('vnd_email'),$this->vendors);
		   if(empty($checkemail)){
			   $path=APPPATH.'../../seller/uploads/profile/';
				$image_name='vnd_picture';				
				$image_data=$this->User_Model->images_upload($image_name,$path);
				$resize_img=$this->User_Model->resize_image_large($image_data,'150','100',$path,$path);
			
			 $file_image=$this->User_Model->file_images_upload(); 		
		    $data=array(
			'vnd_name'=>$this->input->post('vnd_name'),
			'vnd_name_ar'=>$this->input->post('vnd_name_ar'),
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
			'vnd_file'=>$file_image,
			'vnd_picture'=>$image_data,
			'vnd_status'=>'1',
			'vnd_VerifiedStatus'=>'1',
			'vnd_created'=>date('Y-m-d H:i:s')
			);
			   $result = $this->User_Model->save($data,$this->vendors);
			   if($result){
				   $this->session->set_flashdata('msg',array('message' => 'Vendor has been successfully saved.','class' => 'success','type'=>'Ok!'));
				   redirect('user/vendor-add'); 
			   }else{
				   $this->session->set_flashdata('msg',array('message' => "Unable to Change Password.Some error occurred.",'class' => 'danger','type'=>'Oops!'));
				   redirect('user/vendor-add');  
			   }
		    }else{
			   $this->session->set_flashdata('msg',array('message' => "vender email already used !.",'class' => 'danger','type'=>'Oops!'));
				redirect('user/vendor-add');  
		    } 
		}		
		else{
				 
			$content['subview']="vendor_add";
			$this->load->view('layout', $content);
		}			  	  
	}
	
	public function vendor_edit($vndid=null){
		$content['admin']=admin_profile($this->login->mst_email);
			$vndrid = decode($vndid);
		$content['vend_info'] = $this->User_Model->get_vendor_profile($this->fld_vid,$vndrid,$this->vendors);
		$content['state'] = $this->User_Model->get_location_list('st_name','cnt_id',$content['vend_info']->vnd_country,$this->table_state); 
		$content['city'] = $this->User_Model->get_location_list('ct_name','st_id',$content['vend_info']->vnd_state,$this->table_city);
		$content['zipcode'] = $this->User_Model->get_location_list('zc_id','ct_id',$content['vend_info']->vnd_city,$this->table_zipcode);
        $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") { 	
	        	if($_FILES['vnd_picture']['error']>0) {
					$image_data=$this->input->post('prev_img');
				} else{ 
	         $path=APPPATH.'../../seller/uploads/profile/';
				$image_name='vnd_picture';				
				$image_data=$this->User_Model->images_upload($image_name,$path);
				$resize_img=$this->User_Model->resize_image_large($image_data,'150','100',$path,$path);
				}
				if($_FILES['vnd_banner_img']['error']>0) {
					$vnd_image_data=$this->input->post('prev_banner_img');
				} else{ 
	       $path_banner=APPPATH.'../uploads/category/';
				$image_name1='vnd_banner_img';				
				$vnd_image_data=$this->User_Model->images_upload($image_name1,$path_banner);
				$resize1_img=$this->User_Model->resize_image_large($vnd_image_data,'873','254',$path_banner,$path_banner);
				}
		   	$data=array(
			'vnd_name'=>$this->input->post('vnd_name'),
				'vnd_name_ar'=>$this->input->post('vnd_name_ar'),
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
			//'vnd_password'=>md5($this->input->post('vnd_password')),
			'vnd_product'=>$this->input->post('vnd_product'),
			//'vnd_brand'=>$this->input->post('vnd_brand'),
		//	'vnd_file'=>$file_image,
			'vnd_picture'=>$image_data,
	     	'vnd_banner_img'=>$vnd_image_data,	
			'vnd_updated'=>date('Y-m-d H:i:s')
		   	);  
		     
		   $result = $this->User_Model->update($this->fld_vid,$vndrid,$data,$this->vendors);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Vendor has been successfully Update.','class' => 'success','type'=>'Ok!'));
			   redirect('user/vendor-edit/'.$vndid); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Password.Some error occurred.",'class' => 'danger','type'=>'Oops!'));
			   redirect('user/vendor-edit/'.$vndid);  
		   }
		    
		}			 
		$content['subview']="vendor_edit";
		$this->load->view('layout', $content);
	}
	 
	

	public function vndUpdate($vndid=null,$vndStatus=null)
	{
		if(isset($vndid) && isset($vndStatus)){
			$vndrid = decode($vndid);
			$vndrSts = array(
				'vnd_status'=>decode($vndStatus)
			);
			
			 /*====================Start sms send===========*/ 
			 if(decode($vndStatus)=='1'){
			$vendors = $this->User_Model->get_vendor_profile($this->fld_vid,$vndrid,$this->vendors);
// 			echo"<pre>";
		     $name=$vendors->vnd_name;
		     $phone='+'.code($vendors->vnd_phone_code).''.$vendors->vnd_phone;
			$smsmsg='Dear '.$name.', your account '.$vendors->vnd_email.' has been activated. You can now start using seller portal!';
			$this->load->library('twilio');
    		$sms_from = '+447723561455';
    		$sms_to = $phone;
    		$smsresponse = $this->twilio->sms($sms_from, $sms_to, $smsmsg);
    	//	die;
			 }
			/*====================End sms send ===========*/
			$updateStatus = $this->User_Model->update_vendor_account($this->fld_vid,$vndrid,$vndrSts,$this->vendors);
			if($updateStatus){
				redirect('user/vendors');
			}else{
				redirect('user/vendors');
			}
		}else{
			redirect('user/vendors');
		}
	}

	public function seller($vndrsid=null)
	{
		if(isset($vndrsid)){
			$vndrid = decode($vndrsid);
			$content['vender'] = $this->User_Model->get_vendor_profile($this->fld_vid,$vndrid,$this->vendors);
			$content['myOrders'] = $this->User_Model->get_ordered_products($this->fld_vndsts,$vndrid,$this->ordproducts); 	 
			if(!empty($content['vender'])){
				$content['admin']=admin_profile($this->login->mst_email);	 
				$content['subview']="user/vendorProfile";
				$this->load->view('layout', $content);
			}else{
				$content['admin']=admin_profile($this->login->mst_email);	 
				$content['subview']="badrequest";
				$this->load->view('layout', $content);
			}
		}else{
			$content['admin']=admin_profile($this->login->mst_email);	 
			$content['subview']="badrequest";
			$this->load->view('layout', $content);
		}	
	}

	public function myProductOrders()
	{   
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['my_product_order_list'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$vndrid = "0";
		$content['myOrders'] = $this->User_Model->get_ordered_products($this->fld_vndsts,$vndrid,$this->ordproducts); 	 
		$content['subview']="user/myProductOrders";
		$this->load->view('layout', $content);
		 }else{
		 	redirect('dashboard');
		 }
	}
	   function notification($id) {  
		 $noti_id=decode($id);	
	    $notification = $this->User_Model->get_notification($this->fld_noti_id,$noti_id,$this->table_noti);	    
	    $product_name=slug(product($notification->notification_noti_id));
	    $product_id=encode($notification->notification_noti_id);
		
	    $data=array('notification_read'=>'Yes');  
		$update = $this->User_Model->update($this->fld_noti_id,$noti_id,$data,$this->table_noti);


		if($notification->notification_type=='Order'){
		 redirect('orders/invoice/'.$notification->notification_noti_id); 
		}else if($notification->notification_type=='Design Order'){
		 redirect('orders/design_invoice/'.$notification->notification_noti_id); 
		}else if($notification->notification_type=='Seller'){
		 redirect('user/seller/'.encode($notification->notification_noti_id)); 
		}else{
		 redirect('../product/'.$product_id."/".$product_name); 		
		}
		         
	}	

	/*--- End Of the Vendors Activities ---*/ 
	
	public function badrequest()
	{ 
		$content['subview']="dashboard/badrequest";
		$this->load->view('layout', $content);
	}
			
	
}

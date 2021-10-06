<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_admin');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
            		
            $this->load->model("Dashboard_Model");	
           /* ========FOR MASTER TABEL=========== */ 			
            $this->fld_email="mst_email";	
            $this->fld_password="mst_password";	
            $this->table_master="tbl_master";	
            /*--- FOR SELLER REPORTS ---*/
				$this->slrs_id="vnd_id";
				$this->sellers="tbl_vendor"; 
    }
 
    function index() {
          $content['admin']=admin_profile($this->login->mst_email);	
          $content['sellerReports'] = $this->Dashboard_Model->get_seller_reports($this->sellers);	      
		  $content['subview']="dashboard";
		  $this->load->view('layout', $content);
         
	}	
	
	function profile(){
		 $content['admin']=admin_profile($this->login->mst_email);	 
		$content['subview']="profile";
		$this->load->view('layout', $content);
	}
	function profile_edit(){
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
	 
	
	function change_password() {
		
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
	
	function profile_image(){ 
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
	
	public function badrequest() { 
	
		$content['subview']="dashboard/badrequest";
		$this->load->view('layout', $content);

	}
			
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
            $this->load->library("security");			
            $this->load->helper("common");			
            $this->load->model("Login_Model");	
			/* ========FOR MASTER TABEL=========== */ 			
            $this->fld_email="mst_email";	
            $this->fld_password="mst_password";	
            $this->table_master="tbl_master"; 
			
    }
  
    public function index() {	

	    if(($this->session->userdata('logged_in_admin')!==NULL)){
			  redirect('dashboard');
		}else{
			  $this->load->view('login');	

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
				$result =$this->Login_Model->login($email, $password,$this->table_master); 
				if($result) {
				  if($result->mst_status=="active"){

				   /* ==================MANAGE LAST LOGIN DATE TIME =================== */ 
				    $data=array('mst_lastLogin'=>date('Y-m-d H:i:s'));  
					$this->Login_Model->update($this->fld_email,$result->mst_email,$data,$this->table_master);   
				   /* ================END OF THE LAST LOGIN DATE TIME=================== */ 
					
					$this->session->set_userdata('logged_in_admin',$result);
					$this->session->set_flashdata('msg', array('message' => 'you have successfully logged in.','class' => 'success','type'=>'Congratulation !'));
					redirect('dashboard');
					} else {
					   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode.Contact administrator.','class' => 'warning','type'=>'Oops!'));
					   redirect('login');
					}
				}else{
				    $this->session->set_flashdata('msg', array('message' => 'Please Enter Valid Email and Password.','class' => 'danger','type'=>'Oops!')); 
					   redirect('login');
				}			
	
			}else{
                $this->session->set_flashdata('msg',array('message' => 'Please enter Email and Password.','class' => 'danger','type'=>'Oops!'));
				redirect('login');
			} 
		} 
		$this->load->view('login');
	}
	 
	function forgot(){
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){
		$useremail=$this->input->post('email'); 
		$email = $this->security->xss_clean($useremail);
		if(!empty($email)){
			$result =$this->Login_Model->check_email($this->fld_email,$email,$this->table_master);
			if($result) { 
			    if($result->mst_status=="active"){ 
					 $result->password=rand(10,1000000);
					 $data['user_info']=$result;
					 $subject = "Password Recovery Mail";
				     $UserMail=$this->load->view('login/email/forgot_password',$data,true);			  
					 $to      = $email;  
					 $headers  = 'MIME-Version: 1.0' . "\r\n";
					 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
					 $headers .= 'From: Forgot Password <boltrucks@gmail.com>' . "\r\n"; 
					 mail($to, $subject, $UserMail, $headers); 
				     $data=array($this->fld_password=>md5($result->password)); 
				     $result = $this->Login_Model->update($this->fld_email,$email,$data,$this->table_master);						
					 $this->session->set_flashdata('msg', array('message' => 'Your password has been Sent successfully . Check Your Email Id.','class' => 'success','type'=>'Congratulation !'));
					redirect('login/forgot');
				} else {
				   $this->session->set_flashdata('msg', array('message' => 'Your accout in inactive mode contact administrator.','class' => 'warning','type'=>'Oops!'));
				   redirect('login/forgot');
				}
			}else{
				$this->session->set_flashdata('msg', array('message' => 'You are not register with us.','class' => 'danger','type'=>'Oops!')); 
				   redirect('login/forgot');
			}			
	
		}else{
			$this->session->set_flashdata('msg',array('message' => 'Please Enter Your Email Id.','class' => 'danger','type'=>'Oops!'));
			redirect('login/forgot');
		}
	}else{
		 $this->load->view('forgot');	
	}
	}
	
	public function logout()
	{  
	   $this->login = $this->session->userdata('logged_in_admin');	
        $data=array('mst_lastLogout'=>date('Y-m-d H:i:s'));
	
		$this->session->unset_userdata('logged_in_admin');
		$result = $this->Login_Model->update($this->fld_email,$this->login->mst_email,$data,$this->table_master); 
		 if($result){ 
			 $this->session->set_flashdata('msg', array('message' => 'You have successfully logout.','class' => 'success','type'=>'Ok !'));
		     redirect('login');
		 }else{
			 $this->session->set_flashdata('msg',array('message' => 'Unable to sign out some error occurred ','class' => 'danger','type'=>'Oops!'));
			redirect('login');
		 } 
		
	}
	  
	
	 
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Users_model",'Users');	
      /* ========FOR MASTER TABEL=========== */ 	
            $this->fld_mid='mst_id';		
            $this->fld_email="mst_email";	
            $this->fld_password="mst_password";	
            $this->table_master="tbl_master"; 
			
	}
	

	public function index()
	{
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['customer_list_view'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['users'] = $this->Users->get_all_user_list($this->fld_mid,$this->table_master);
		$content['subview']="users/users_list";
		$this->load->view('layout', $content);
		 }else{ redirect('dashboard'); 
         }
	}

	public function add()
	{	
	    $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['admin_users_add'])){
		$content['users']=$this->Users->single_list($this->table_master);		
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){ 		

			$check_email=$this->Users->check_email($this->fld_email,$this->input->post('mst_email'),$this->table_master);
			if(empty($check_email)){
			$data = array(
				'mst_ref_id' => $this->input->post('mst_ref_id'), 
				'mst_username' => $this->input->post('mst_username'), 
				'mst_email' => $this->input->post('mst_email'), 
				'mst_password' => md5($this->input->post('mst_password')),
				'mst_name' =>$this->input->post('mst_name'),
				'mst_mobile_number' => $this->input->post('mst_mobile_number'),
				'mst_role' => '1', 
				'mst_status' => $this->input->post('mst_status'),			
				'mst_updated' => date('Y-m-d H:i:s'),
				'mst_created' => date('Y-m-d H:i:s')
			);
			// echo "<pre>";
			// print_r($data);die;
			$result = $this->Users->save_user($data,$this->table_master);
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'User has been successfully added.','class' => 'success','type'=>'Ok!'));
				redirect('users/add');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('users/add');
			} 
		}else{
			$this->session->set_flashdata('msg',array('message' => 'Email Address Already Used .','class' => 'danger','type'=>'Oops!'));
				redirect('users/add');
		}
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="users/user_add";
		$this->load->view('layout', $content);
		}else{
	    	redirect('dashboard');
	    }
	}

	public function permission($id=null)
	{
		$content['users']=$this->Users->get_user_single_record($this->fld_mid,$id,$this->table_master);
			$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
			if($REQUESTMETHOD== "POST"){  
				$permission= serialize($_POST);
				$createdDate = date('Y-m-d H:i:s');	
				$data = array( 
					'mst_permission' => $permission,
					'mst_updated' => $createdDate
				); 
				
				$result = $this->Users->update_users($id,$data,$this->table_master);
				if($result){
					$this->session->set_flashdata('msg',array('message' => 'User has been successfully permission.','class' => 'success','type'=>'Ok!'));
					redirect('users/permission/'.$id);
				}else{
					$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
					redirect('users/permission/'.$id);
				}
				
			}  
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="users/user_permission";
			$this->load->view('layout', $content);
		
	}

	public function edit($id=null)
	{
		 $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['admin_users_edit'])){
	    $content['users']=$this->Users->get_user_single_record($this->fld_mid,$id,$this->table_master);
		if(!empty($content['users'])){
			$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
			if($REQUESTMETHOD== "POST"){  					
				$data = array(					
					'mst_username' => $this->input->post('mst_username'),
					'mst_password' => md5($this->input->post('mst_password')),
					'mst_name' =>$this->input->post('mst_name'),
					'mst_mobile_number' => $this->input->post('mst_mobile_number'),
					'mst_role' => '1', 
					'mst_status' => $this->input->post('mst_status'),			
					'mst_updated' => date('Y-m-d H:i:s')					
				);				
				$result=$this->Users->update_users($id,$data,$this->table_master);
				if($result){
					$this->session->set_flashdata('msg',array('message' => 'User has been successfully updated.','class' => 'success','type'=>'Ok!'));
					redirect('users/edit/'.$id);
				}else{
					$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
					redirect('users/edit/'.$id);
				}
				
			}  
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="users/user_edit";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="users/badrequest";
			$this->load->view('layout', $content);
		} 
		}else{
			redirect('dashboard');
		}	
	}

	public function remove($id=null)
	{   
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['admin_users_delete'])){
		if(!empty($id)){			
			$Action = $this->Users->delete_single($this->fld_mid,$id,$this->table_master);
			if($Action){
				$this->session->set_flashdata('msg',array('message' => 'User has been successfully deleted.','class' => 'success','type'=>'Ok!'));
				redirect('users');
			}else{
					$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('users');
			}
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
		    $content['subview']="users/badrequest";
		    $this->load->view('layout', $content);
		}
		}else{
			redirect('dashboard');
		}	
	}

	
}

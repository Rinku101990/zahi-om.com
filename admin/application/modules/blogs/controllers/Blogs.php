<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Blogs_model",'Blog_Model');
		/* ========FOR MASTER TABEL=========== */ 			
        $this->fld_bid="blg_id";	
        $this->fld_bsts="blg_status";	
        $this->table="tbl_blogs";	 
	}
	

	public function index()
	{
	    $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['blog_post'])){  	
		$content['permission']=$permission;
		$content['admin']=admin_profile($this->login->mst_email);
		$content['blogs'] = $this->Blog_Model->get_all_post_list($this->fld_bid,$this->table);
		$content['subview']="blogs/blog_posts";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function add()
	{	
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['blog_post_add'])){ 
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){   
			$blog_image=$this->Blog_Model->blog_images_upload(); 
			$createdDate = date('Y-m-d H:i:s');
			$settingArray = $this->input->post('setting');
			$setting = implode(',', $settingArray);

			$categoryArray = $this->input->post('categories');
			$categoris = implode(',', $categoryArray);

			$data = array(
				'blg_title' => $this->input->post('blg_title'), 
				'blg_title_slug' => $this->input->post('blg_title_slug'), 
				'blg_author_name' => $this->input->post('blg_author'), 
				'blg_pictures' => $blog_image,
				'blg_additionals' => $setting,
				'blg_descriptions' => $this->input->post('description'),
				'blg_categories' => $categoris, 
				'blg_status' => $this->input->post('status'),
				'blg_timestamps' => strtotime($createdDate),
				'blg_created' => date('Y-m-d H:i:s')
			);
			// echo "<pre>";
			// print_r($data);die;
			$result = $this->Blog_Model->save_blog($data,$this->table);
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'Blog has been successfully added.','class' => 'success','type'=>'Ok!'));
				redirect('blogs/add');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('blogs/add');
			} 
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="blogs/blog_add";
		$this->load->view('layout', $content);
	    }else{
			redirect('dashboard');
		}	
	}

	public function edit($id=null)
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['blog_post_edit'])){ 
		$content['blginfo']=$this->Blog_Model->get_single_blog($this->fld_bid,$id,$this->table);
		if(!empty($content['blginfo'])){
			$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
			if($REQUESTMETHOD== "POST"){  
					
				if($_FILES['blog_picture']['error']>0) {
					$blog_image=$this->input->post('prev_image');
				} else{ 
					$img_file=FCPATH . 'uploads/blog/'.$content['blginfo']->blg_pictures;
					if (!unlink($img_file)) {} else { }
					$blog_image=$this->Blog_Model->blog_images_upload();
				} 
				
				$createdDate = date('Y-m-d H:i:s');
				$settingArray = $this->input->post('setting');
				$setting = implode(',', $settingArray);

				$categoryArray = $this->input->post('categories');
				$categoris = implode(',', $categoryArray);
					
				$data = array(
					'blg_title' => $this->input->post('blg_title'), 
					'blg_title_slug' => $this->input->post('blg_title_slug'), 
					'blg_author_name' => $this->input->post('blg_author'), 
					'blg_pictures' => $blog_image,
					'blg_additionals' => $setting,
					'blg_descriptions' => $this->input->post('description'),
					'blg_categories' => $categoris, 
					'blg_status' => $this->input->post('status'),
					'blg_updated' => strtotime($createdDate)
				); 
				
				$result = $this->Blog_Model->update_blog($this->fld_bid,$id,$data,$this->table);
				if($result){
					redirect('blogs/edit/'.$id);
				}else{
					redirect('blogs/edit/'.$id);
				}
				
			}  
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="blogs/blog_edit";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="blogs/badrequest";
			$this->load->view('layout', $content);
		} 
	    }else{
			redirect('dashboard');
		}	
	}

	public function remove($id=null)
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['blog_post_delete'])){ 
		if(!empty($id)){
			$image_detais=$this->Blog_Model->get_single_blog($this->fld_bid,$id,$this->table); 
			$previous_picture=$image_detais->blg_pictures; 
			$img_file=FCPATH . '/uploads/blog/'.$previous_picture; 
			if (!unlink($img_file)) {} else { }
			$Action = $this->Blog_Model->delete_single_blog($this->fld_bid,$id,$this->table);
			if($Action){
				redirect('blogs');
			}else{
				redirect('blogs');
			}
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
		    $content['subview']="blogs/badrequest";
		    $this->load->view('layout', $content);
		}
			}else{
			redirect('dashboard');
		}	
	}

	public function comments()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['blog_comments'])){ 
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="blogs/blog_comments";
		$this->load->view('layout', $content);
			}else{
			redirect('dashboard');
		}	
	}
	
}

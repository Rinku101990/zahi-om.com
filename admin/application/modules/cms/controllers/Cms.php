<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_admin');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  } 
          
           		
            $this->load->model("Cms_model",'Cms_Model');
           /* ========FOR MASTER TABEL=========== */ 			
            $this->fld_email="mst_email";	
            $this->fld_password="mst_password";	
            $this->table_master="tbl_master";	 
            /* ========FOR PAGE TABEL=========== */ 			
            $this->fld_pg_id="pg_id";	
            $this->table_page="tbl_page";	
            /* ========FOR CATEGORY TABEL=========== */ 			
            $this->fld_cate_id="cate_id";	
            $this->table_category="tbl_category";
              /* ========FOR CATEGORY TABEL=========== */ 			
            $this->fld_mn_id="mn_id";	
            $this->table_navigation="tbl_navigation";
              /* ========FOR POLICY POINT TABEL=========== */ 			
            $this->fld_pp_id="pp_id";	
            $this->table_policy="tbl_policy";	 
              /* ========FOR Order Cancel Reasons TABEL=========== */ 			
            $this->fld_ocr_id="ocr_id";	
            $this->table_order_cancel="tbl_order_cancel_reasons";
              /* ========FOR table_testimonials TABEL=========== */ 			
            $this->fld_tm_id="tm_id";	
            $this->table_testimonials="tbl_testimonials";
               /* ========FOR Coupon TABEL=========== */ 			
            $this->fld_cup_id="cup_id";	
            $this->table_coupon="tbl_coupon";
              /* ========FOR BANNERS TABEL=========== */ 			
            $this->fld_slr_id="slr_id";	
            $this->table_banner="tbl_banner";
               /* ========FOR ENQUIRY  TABEL=========== */ 			
            $this->fld_en_id="id";	
            $this->table_enquiry="tbl_enquiry";	 

          

    }
 
    function content_page() { 
          $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['content_pages_view'])){   
		 $content['permission']= $permission;	
         $content['admin']=admin_profile($this->login->mst_email);	     
         $content['page']=  $this->Cms_Model->get_list('pg_id',$this->table_page);
		 $content['subview']="content-page";
		  $this->load->view('layout', $content);
		  }else{
		 	redirect('dashboard');
		 }
         
	}	

	function content_page_add() {   
	    $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['content_pages_add'])){   
         $content['admin']=admin_profile($this->login->mst_email);
		 $content['subview']="content-page-add";
		  $this->load->view('layout', $content);
		   }else{
		 	redirect('dashboard');
		 }
         
	}

	 function content_page_save (){

		$layout=$this->input->post('page_layout');
		$check = $this->Cms_Model->check('pg_title',$this->input->post('pg_title'),$this->table_page);
		if(empty($check)){
		$path=FCPATH . 'uploads/content-page';
			if($_FILES['pg_banner_img']['name']){			
			$image_name='pg_banner_img';		
		    $pg_banner_img=$this->Cms_Model->images_upload($image_name,$path);
		    }
		if($layout=='1'){		
			$img11='img1';		
		    $img1=$this->Cms_Model->images_upload($img11,$path);		    		
			$img21='img2';		
		    $img2=$this->Cms_Model->images_upload($img21,$path);
		  
		    $content1=$this->input->post('content1',true);
		    $content2=$this->input->post('content2',true);
		    $content3=$this->input->post('content3',true);
		    $content4=$this->input->post('content4',true);
		}elseif($layout=='2'){						
					
			$img3='img3';		
		     $img1=$this->Cms_Model->images_upload($img3,$path);		   		
			$img4='img4';		
		    $img2=$this->Cms_Model->images_upload($img4,$path);
		   
		    $content1=$this->input->post('content5',true);
		    $content2=$this->input->post('content6',true);
		    $content3=$this->input->post('content7',true);
		    $content4='';
		}
       
		    $data=array('pg_title' =>$this->input->post('pg_title'),
		                'pg_slug' =>slug($this->input->post('pg_title')),
		                'pg_title_ar' =>$this->input->post('pg_title_ar'),
		                'pg_banner_img' =>$pg_banner_img,
		                'page_layout' =>$layout,
		                'content1' =>$content1,
		                'content2' =>$content2,
		                'content3' =>$content3,
		                'content4' =>$content4,
		                'img1' =>$img1,
		                'img2' =>$img2,
		                'pg_status' =>'1',
		                'pg_created	' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_page);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Create Page has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/content-page-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/content-page-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Page saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/content-page-add');  
       }
		


	}

	function page_status(){

	     $pg_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('pg_status' => $status,'pg_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_pg_id,$pg_id,$data,$this->table_page);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Page Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/content-page');
	}

	function page_edit(){
		$permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['content_pages_edit'])){   
        $content['admin']=admin_profile($this->login->mst_email);	     
	     $pg_id=decode($this->uri->segment(3));	   
	    $content['page'] = $this->Cms_Model->single_record($this->fld_pg_id,$pg_id,$this->table_page);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 		
	 //    $layout=$this->input->post('page_layout');	
		//    	$path=FCPATH . 'uploads/content-page';	
		//     if($_FILES['pg_banner_img']['name']){	
		//     $pg_banner_img1= $path.'/'. $content['page']->pg_banner_img;  
		//      if (!unlink($pg_banner_img1)) {} else { }
		// 	$image_name='pg_banner_img';		
		//     $pg_banner_img=$this->Cms_Model->images_upload($image_name,$path);
		//     }else{
		//     $pg_banner_img=$this->input->post('banner_img');
		//     }
		// if($layout=='1'){	
  //          if($_FILES['img1']['name']){	
  //          	$img_1= $path.'/'. $content['page']->img1;  
		//      if (!unlink($img_1)) {} else { }
		// 	$img11='img1';		
		//     $img1=$this->Cms_Model->images_upload($img11,$path);
		//    }else{ $img1=$this->input->post('page_img1');}
		//    if($_FILES['img2']['name']){	   
		//    	$img_2= $path.'/'. $content['page']->img2;  
		//      if (!unlink($img_2)) {} else { } 		
		// 	$img21='img2';		
		//     $img2=$this->Cms_Model->images_upload($img21,$path);
		//     }else{ $img2=$this->input->post('page_img2');}
		//     $content1=$this->input->post('content1',true);
		//     $content2=$this->input->post('content2',true);
		//     $content3=$this->input->post('content3',true);
		//     $content4=$this->input->post('content4',true);
		// }elseif($layout=='2'){					
		// 	if($_FILES['img3']['name']){
		// 	 $img_1= $path.'/'. $content['page']->img1;  
		//      if (!unlink($img_1)) {} else { } 				
		// 	$img3='img3';		
		//      $img1=$this->Cms_Model->images_upload($img3,$path);
		//       }else{
		//     $img1=$this->input->post('page_img3');
		//     }
		//     if($_FILES['img4']['name']){	
		//    	$img_2= $path.'/'. $content['page']->img2;  
		//      if (!unlink($img_2)) {} else { } 					   		
		// 	$img4='img4';		
		//     $img2=$this->Cms_Model->images_upload($img4,$path);
		//     }else{
		//     $img1=$this->input->post('page_img4');
		//     }
		//     $content1=$this->input->post('content5',true);
		//     $content2=$this->input->post('content6',true);
		//     $content3=$this->input->post('content7',true);
		//     $content4='';
		// }
       
		    $data=array('pg_title' =>$this->input->post('pg_title'),
		                'pg_slug' =>slug($this->input->post('pg_title')),
		                'pg_title_ar' =>$this->input->post('pg_title_ar'),
		                // 'pg_banner_img' =>$pg_banner_img,
		                // 'page_layout' =>$layout,
		                'content1' =>$this->input->post('content1'),
		                'content2' =>$this->input->post('content2'),
		                // 'content3' =>$content3,
		                // 'content4' =>$content4,
		                // 'img1' =>$img1,
		                // 'img2' =>$img2,		              
		                'pg_updated	' =>date('Y-m-d H:i:s')
		                 );

	
			$result = $this->Cms_Model->update($this->fld_pg_id,$pg_id,$data,$this->table_page);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Shop has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/page-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/page-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="page-edit";
		  $this->load->view('layout', $content);
		}else{
		redirect('dashboard');  	
		}
		
	}


	public function page_delete() {  
       $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['content_pages_delete'])){ 
       $pg_id=$this->uri->segment(3);  
        $page = $this->Cms_Model->single_record($this->fld_pg_id,$pg_id,$this->table_page);
        $path=FCPATH . 'uploads/content-page';	
       	$pg_banner_img= $path.'/'.$page->pg_banner_img;  
		if (!unlink($pg_banner_img)) {} else { }
		$img1= $path.'/'.$page->img1;  
		if (!unlink($img1)) {} else { }
		$img2= $path.'/'.$page->img2;  
		if (!unlink($img2)) {} else { }
	   $result = $this->Cms_Model->delete($this->fld_pg_id,$pg_id,$this->table_page);
	   $this->session->set_flashdata('msg',array('message' => 'Page Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/content-page'); 
	   }else{
		redirect('dashboard');  	
		}
			
	}

	function navigation() {   
          $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['navigation_management_view'])){ 
         $content['permission']=$permission;	     
         $content['admin']=admin_profile($this->login->mst_email);	
         $content['navigation']=  $this->Cms_Model->get_navigation_list('mn_order',$this->table_navigation);    
		 $content['subview']="navigation";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard');  	
		}
         
	}	

	function navigation_add(){
		  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['navigation_management_add'])){ 
        $content['admin']=admin_profile($this->login->mst_email); 
	    $content['category'] = $this->Cms_Model->cotegory_list('cate_name',$this->table_category);	
	    $content['page'] = $this->Cms_Model->page_list('pg_title',$this->table_page);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 		
	    $layout=$this->input->post('mn_layout');
		$check = $this->Cms_Model->check('mn_name',$this->input->post('mn_name'),$this->table_navigation);
		if(empty($check)){
			$path=FCPATH . 'uploads/content-page';
			if($_FILES['mn_banner_img']['name']){			
			$image_name='mn_banner_img';		
		    $banner_img=$this->Cms_Model->images_upload($image_name,$path);
		    }else{$banner_img='';}
		    $data=array('mn_name' =>$this->input->post('mn_name',true),
		                'mn_slug' =>slug($this->input->post('mn_name',true)),
		                'mn_name' =>$this->input->post('mn_name',true),
		                'mn_name_ar' =>$this->input->post('mn_name_ar',true),
		                'mn_layout' =>$layout,
		                'mn_category_id' =>$this->input->post('mn_category_id'),
		                'mn_banner_img' =>$banner_img,
		                'mn_page_id' =>$this->input->post('mn_page_id'),		              
		                'mn_status' =>'1',
		                'mn_created	' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_navigation);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Menu Name has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/navigation-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/navigation-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Menu Name saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/navigation-add');  
       }
   }
	     $content['subview']="navigation-add";
		  $this->load->view('layout', $content);

		    }else{
		redirect('dashboard');  	
		}
		
	}


	function navigation_status(){

	     $mn_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('mn_status' => $status,'mn_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_mn_id,$mn_id,$data,$this->table_navigation);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Navigation Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/navigation');
	}

	function navigation_edit(){
		  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['navigation_management_edit'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	     
	     $mn_id=decode($this->uri->segment(3));	   
	      $content['category'] = $this->Cms_Model->cotegory_list('cate_name',$this->table_category);
	    $content['page'] = $this->Cms_Model->page_list('pg_title',$this->table_page);	
	    $content['navi'] = $this->Cms_Model->single_record($this->fld_mn_id,$mn_id,$this->table_navigation);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 
		   	$path=FCPATH . 'uploads/content-page';	
		    if($_FILES['mn_banner_img']['name']){	
		    $mn_banner_img1= $path.'/'. $content['navi']->mn_banner_img;  
		     if (!unlink($mn_banner_img1)) {} else { }
			$image_name='mn_banner_img';		
		    $banner_img=$this->Cms_Model->images_upload($image_name,$path);
		    }else{
		    $banner_img=$this->input->post('banner_img');
		    }
		
         $data=array('mn_name' =>$this->input->post('mn_name',true),
		                'mn_slug' =>slug($this->input->post('mn_name',true)),
		                'mn_name_ar' =>$this->input->post('mn_name_ar',true),
		                'mn_order' =>$this->input->post('mn_order',true),
		                'mn_layout' =>$this->input->post('mn_layout'),
		                'mn_category_id' =>$this->input->post('mn_category_id'),
		                'mn_banner_img' =>$banner_img,
		                'mn_page_id' =>$this->input->post('mn_page_id'),	
		                'mn_updated	' =>date('Y-m-d H:i:s')
		                 );
	
			$result = $this->Cms_Model->update($this->fld_mn_id,$mn_id,$data,$this->table_navigation);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Navigation has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/navigation-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/navigation-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="navigation-edit";
		  $this->load->view('layout', $content);
		}else{
			 redirect('dashboard');  
		}
		
	}


  public function navigation_delete() {  
  	  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['navigation_management_delete'])){ 
       $mn_id=$this->uri->segment(3);  
        $page = $this->Cms_Model->single_record($this->fld_mn_id,$mn_id,$this->table_navigation);
        $path=FCPATH . 'uploads/content-page';	
       	$mn_banner_img= $path.'/'.$page->mn_banner_img; 	
	   $result = $this->Cms_Model->delete($this->fld_mn_id,$mn_id,$this->table_navigation);
	   $this->session->set_flashdata('msg',array('message' => 'Navigation Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/navigation'); 
	   }else{
			 redirect('dashboard');  
		}
			
	}

	function policy() {    	
	  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['policy_ponits'])){ 
        $content['permission']=$permission;
        $content['admin']=admin_profile($this->login->mst_email);	     
        $content['policy']=  $this->Cms_Model->get_list('pp_id',$this->table_policy);
		$content['subview']="policy";
		$this->load->view('layout', $content);
		 }else{
			 redirect('dashboard');  
		}
	}	

	function policy_add(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['policy_ponits_add'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('pp_title',$this->input->post('pp_title'),$this->table_policy);
		if(empty($check)){			
		    $data=array('pp_title' =>$this->input->post('pp_title',true),
		                'pp_type' =>$this->input->post('pp_type'),
		                'pp_description' =>$this->input->post('pp_description',true),	
		                'pp_status' =>'1',
		                'pp_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_policy);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Policy Point has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/policy-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/policy-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Policy Point Title saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/policy-add');  
       }
   }
	     $content['subview']="policy-add";
		  $this->load->view('layout', $content);
		  }else{
			 redirect('dashboard');  
		}
		
	}


	function policy_status(){

	     $pp_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('pp_status' => $status,'pp_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_pp_id,$pp_id,$data,$this->table_policy);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Policy Point Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/policy');
	}

	function policy_edit(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['policy_ponits_edit'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $pp_id=decode($this->uri->segment(3));	   
	    $content['policy'] = $this->Cms_Model->single_record($this->fld_pp_id,$pp_id,$this->table_policy);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 
		   
         $data=array('pp_title' =>$this->input->post('pp_title',true),
		                'pp_type' =>$this->input->post('pp_type'),
		                'pp_description' =>$this->input->post('pp_description',true),	
		                'pp_updated' =>date('Y-m-d H:i:s')
		                 );
	
			$result = $this->Cms_Model->update($this->fld_pp_id,$pp_id,$data,$this->table_policy);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Policy Point has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/policy-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/policy-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="policy-edit";
		  $this->load->view('layout', $content);
		}else{
			redirect('dashboard');  
		}
		
	}


  public function policy_delete() {  
  	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['policy_ponits_delete'])){ 
       $pp_id=$this->uri->segment(3);  
       $result = $this->Cms_Model->delete($this->fld_pp_id,$pp_id,$this->table_policy);
	   $this->session->set_flashdata('msg',array('message' => 'Policy Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/policy'); 
	}else{
		redirect('dashboard'); 
	}
			
	}

	function order_cancel_reasons() {    
	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_cancel_reasons'])){ 	
        $content['permission']=$permission;
         $content['admin']=admin_profile($this->login->mst_email);	     
        $content['order_reason']=  $this->Cms_Model->get_list('ocr_id',$this->table_order_cancel);
		$content['subview']="order-cancel-reason";
		$this->load->view('layout', $content);
		}else{
		redirect('dashboard'); 
	  }
	}	

	function order_cancel_reason_add(){
			 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_cancel_reasons_add'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('ocr_title',$this->input->post('ocr_title'),$this->table_order_cancel);
		if(empty($check)){			
		    $data=array('ocr_title' =>$this->input->post('ocr_title',true),		             
		                'ocr_description' =>$this->input->post('ocr_description',true),	
		                'ocr_type' =>'1',
		                'ocr_status' =>'1',
		                'ocr_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_order_cancel);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Order Cancel Reason has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/order-cancel-reason-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/order-cancel-reason-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Reason Title saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/order-cancel-reason-add');  
       }
   }
	     $content['subview']="order-cancel-reason-add";
		  $this->load->view('layout', $content);
		  }else{
		redirect('dashboard'); 
	   }
		
	}


	function order_cancel_reason_status(){

	     $ocr_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('ocr_status' => $status,'ocr_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_ocr_id,$ocr_id,$data,$this->table_order_cancel);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Order Cancel Reason Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/order-cancel-reasons');
	}

	function order_cancel_reason_edit(){
			 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_cancel_reasons_edit'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $ocr_id=decode($this->uri->segment(3));	   
	    $content['order_canecl'] = $this->Cms_Model->single_record($this->fld_ocr_id,$ocr_id,$this->table_order_cancel);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 
		   
         $data=array('ocr_title' =>$this->input->post('ocr_title',true),
		                'ocr_description' =>$this->input->post('ocr_description',true),	
		                'ocr_updated' =>date('Y-m-d H:i:s')
		                 );
	
			$result = $this->Cms_Model->update($this->fld_ocr_id,$ocr_id,$data,$this->table_order_cancel);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Order Cancel Reason has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/order-cancel-reason-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/order-cancel-reason-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="order-cancel-reason-edit";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


  public function order_cancel_reason_delete() {  
  	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_cancel_reasons_delete'])){ 
       $ocr_id=$this->uri->segment(3);  
       $result = $this->Cms_Model->delete($this->fld_ocr_id,$ocr_id,$this->table_order_cancel);
	   $this->session->set_flashdata('msg',array('message' => 'Order Cancel Reason Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/order-cancel-reasons'); 
	    }else{
		redirect('dashboard'); 
	   }
			
	}


	function order_return_reasons() { 
	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_return_reasons'])){ 	
        $content['permission']=$permission;  	
        $content['admin']=admin_profile($this->login->mst_email);	     
        $content['order_reason']=  $this->Cms_Model->get_list('ocr_id',$this->table_order_cancel);
		$content['subview']="order-return-reason";
		$this->load->view('layout', $content);
		}else{
		redirect('dashboard'); 
	   }
	}	

	function order_return_reason_add(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_return_reasons_add'])){ 	
      
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('ocr_title',$this->input->post('ocr_title'),$this->table_order_cancel);
		if(empty($check)){			
		    $data=array('ocr_title' =>$this->input->post('ocr_title',true),		             
		                'ocr_description' =>$this->input->post('ocr_description',true),	
		                'ocr_type' =>'2',
		                'ocr_status' =>'1',
		                'ocr_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_order_cancel);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Order return Reason has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/order-return-reason-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/order-return-reason-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Reason Title saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/order-return-reason-add');  
       }
   }
	     $content['subview']="order-return-reason-add";
		  $this->load->view('layout', $content);
		  }else{
		redirect('dashboard'); 
	   }
		
	}


	function order_return_reason_status(){

	     $ocr_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('ocr_status' => $status,'ocr_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_ocr_id,$ocr_id,$data,$this->table_order_cancel);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Order return Reason Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/order-return-reasons');
	}

	function order_return_reason_edit(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_return_reasons_edit'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $ocr_id=decode($this->uri->segment(3));	   
	    $content['order_return'] = $this->Cms_Model->single_record($this->fld_ocr_id,$ocr_id,$this->table_order_cancel);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 
		   
         $data=array('ocr_title' =>$this->input->post('ocr_title',true),
		                'ocr_description' =>$this->input->post('ocr_description',true),	
		                'ocr_updated' =>date('Y-m-d H:i:s')
		                 );
	
			$result = $this->Cms_Model->update($this->fld_ocr_id,$ocr_id,$data,$this->table_order_cancel);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Order Return Reason has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/order-return-reason-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/order-return-reason-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="order-return-reason-edit";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


  public function order_return_reason_delete() {  
  	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['order_return_reasons_delete'])){ 
       $ocr_id=$this->uri->segment(3);  
       $result = $this->Cms_Model->delete($this->fld_ocr_id,$ocr_id,$this->table_order_cancel);
	   $this->session->set_flashdata('msg',array('message' => 'Order Return Reason Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/order-return-reasons'); 
	    }else{
		redirect('dashboard'); 
	   }
			
	}


	function testimonials() {    
	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['testimoninals'])){ 	
        $content['permission']=$permission;  		
        $content['admin']=admin_profile($this->login->mst_email);	     
        $content['testimonials']=  $this->Cms_Model->get_list('tm_id',$this->table_testimonials);
		$content['subview']="testimonials";
		$this->load->view('layout', $content);
		 }else{
		redirect('dashboard'); 
	   }

	}	

	function testimonials_add(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['testimoninals_add'])){ 	
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('tm_name',$this->input->post('tm_name'),$this->table_testimonials);
		if(empty($check)){	
		    $path=FCPATH . 'uploads/testimonials';
			if($_FILES['tm_img']['name']){			
			$image_name='tm_img';		
		    $img=$this->Cms_Model->images_upload($image_name,$path);
		    }else{$img='';}		
		    $data=array('tm_name' =>$this->input->post('tm_name',true),		             
		                'tm_designation' =>$this->input->post('tm_designation',true),
		                'tm_img' =>$img,
		                'tm_description' =>$this->input->post('tm_description',true),
		                'tm_status' =>'1',
		                'tm_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_testimonials);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Testimonials has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/testimonials-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/testimonials-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Testimonials Name saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/testimonials-add');  
       }
   }
	     $content['subview']="test-add";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


	function test_status(){

	     $tm_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('tm_status' => $status,'tm_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_tm_id,$tm_id,$data,$this->table_testimonials);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Testimonials Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/testimonials');
	}

	function testimonials_edit(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['testimoninals_edit'])){ 	
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $tm_id=decode($this->uri->segment(3));	   
	    $content['testimonial'] = $this->Cms_Model->single_record($this->fld_tm_id,$tm_id,$this->table_testimonials);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 
		   $path=FCPATH . 'uploads/testimonials';	
		    if($_FILES['tm_img']['name']){	
		    $tm_img1= $path.'/'. $content['testimonial']->tm_img;  
		     if (!unlink($tm_img1)) {} else { }
			$image_name='tm_img';		
		    $img=$this->Cms_Model->images_upload($image_name,$path);
		    }else{
		    $img=$this->input->post('img');
		    }
           $data=array('tm_name' =>$this->input->post('tm_name',true),		             
		                'tm_designation' =>$this->input->post('tm_designation',true),
		                'tm_img' =>$img,
		                'tm_description' =>$this->input->post('tm_description',true),
		                'tm_updated' =>date('Y-m-d H:i:s')
		                 );
	
			$result = $this->Cms_Model->update($this->fld_tm_id,$tm_id,$data,$this->table_testimonials);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Testimonials has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/testimonials_edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/testimonials_edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="test-edit";
		  $this->load->view('layout', $content);
		     }else{
		redirect('dashboard'); 
	   }
		
	}


  public function test_delete() {  
  	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['testimoninals_delete'])){ 	
       $tm_id=$this->uri->segment(3);  
       $testimonial = $this->Cms_Model->single_record($this->fld_tm_id,$tm_id,$this->table_testimonials);	
       $path=FCPATH . 'uploads/testimonials';	
	   $tm_img1= $path.'/'. $content['testimonial']->tm_img;  
		if (!unlink($tm_img1)) {} else { }
       $result = $this->Cms_Model->delete($this->fld_tm_id,$tm_id,$this->table_testimonials);
	   $this->session->set_flashdata('msg',array('message' => 'Testimonials Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/testimonials'); 
	      }else{
		redirect('dashboard'); 
	   }
			
	}


	function discount_coupons() {    
	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['discount_coupons'])){ 	
        $content['permission']=$permission;  			
       $content['admin']=admin_profile($this->login->mst_email);	     
       $content['disount_coupon']=  $this->Cms_Model->get_list('cup_id',$this->table_coupon);
	   $content['subview']="discount_coupons";
		$this->load->view('layout', $content);
		 }else{
		redirect('dashboard'); 
	   }
	}	

	function discount_coupons_add(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['discount_coupons_add'])){ 	
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('cup_code',$this->input->post('cup_code'),$this->table_coupon);
		if(empty($check)){				
		    $data=array('cup_name' =>$this->input->post('cup_name'),		             
		                'cup_code' =>$this->input->post('cup_code'),		             
		                'cup_discount' =>$this->input->post('cup_discount'),
		                'cup_min_order' =>$this->input->post('cup_min_order'),
		                'cup_start_date' =>$this->input->post('cup_start_date'),
		                'cup_end_date' =>$this->input->post('cup_end_date'),
		                'cup_status' =>'1',
		                'cup_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_coupon);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Coupon has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/discount-coupons-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/discount-coupons-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Coupon Code saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/discount-coupons-add');  
       }
   }
	     $content['subview']="coupon-add";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


	function discount_status(){

	     $cup_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('cup_status' => $status,'cup_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_cup_id,$cup_id,$data,$this->table_coupon);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Coupon Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/discount-coupons');
	}

	function discount_edit(){
		 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['discount_coupons_edit'])){ 	
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $cup_id=decode($this->uri->segment(3));	   
	    $content['coupon'] = $this->Cms_Model->single_record($this->fld_cup_id,$cup_id,$this->table_coupon);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 		  
        $data=array('cup_name' =>$this->input->post('cup_name'),		             
		                //'cup_code' =>$this->input->post('cup_code'),		             
		                'cup_discount' =>$this->input->post('cup_discount'),
		                'cup_min_order' =>$this->input->post('cup_min_order'),
		                'cup_start_date' =>$this->input->post('cup_start_date'),
		                'cup_end_date' =>$this->input->post('cup_end_date'),
		                'cup_updated' =>date('Y-m-d H:i:s')
		                 );
		 $result = $this->Cms_Model->update($this->fld_cup_id,$cup_id,$data,$this->table_coupon);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Coupon has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/discount-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/discount-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="coupon-edit";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


  public function discount_delete() {  
  	 $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['discount_coupons_delete'])){ 	
       $cup_id=$this->uri->segment(3);         
       $result = $this->Cms_Model->delete($this->fld_cup_id,$cup_id,$this->table_coupon);
	   $this->session->set_flashdata('msg',array('message' => 'Coupon Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/discount-coupons'); 
	    }else{
		redirect('dashboard'); 
	   }
			
	}


  function banners() {    
   $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['banners'])){ 	
        $content['permission']=$permission;  			
       $content['admin']=admin_profile($this->login->mst_email);	     
       $content['banners']=  $this->Cms_Model->get_list('slr_id',$this->table_banner);
	   $content['subview']="banners";
		$this->load->view('layout', $content);
		 }else{
		redirect('dashboard'); 
	   }
	}	

	function banner_add(){
		  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['banners_add'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
		$check = $this->Cms_Model->check('slr_name',$this->input->post('slr_name'),$this->table_banner);
		if(empty($check)){		
		    $path=FCPATH . 'uploads/banner';
			$image_name='slr_img';		
		    $img=$this->Cms_Model->images_upload($image_name,$path);		   	
		    $data=array('slr_name' =>$this->input->post('slr_name'),		             
		                'slr_cost' =>$this->input->post('slr_cost'),		             
		                'slr_order' =>$this->input->post('slr_order'),
		                 'slr_url' =>$this->input->post('slr_url'),
		                'slr_img' =>$img,		                
		                'slr_status' =>'1',
		                'slr_created' =>date('Y-m-d H:i:s')
		                 );
		    $result = $this->Cms_Model->save($data,$this->table_banner);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Banner Image has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/banner-add'); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/banner-add');  
		   }
       }else{
       	 $this->session->set_flashdata('msg',array('message' => "Already Banner Name saved.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			  redirect('cms/banner-add');  
       }
   }
	     $content['subview']="banner-add";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


	function banner_status(){

	     $slr_id=$this->uri->segment(3);
	     $status=$this->uri->segment(4);
			$data = array('slr_status' => $status,'slr_updated' => date('Y-m-d H:i:s'));
			$result = $this->Cms_Model->update($this->fld_slr_id,$slr_id,$data,$this->table_banner);
		if($result) $this->session->set_flashdata('msg',array('message' => 'Banner Status has been successfully Change.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			else $this->session->set_flashdata('msg',array('message' => 'Unable to change status. Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('cms/banners');
	}

	function banner_edit(){
		  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['banners_edit'])){ 
        $content['admin']=admin_profile($this->login->mst_email);	     
	    $slr_id=decode($this->uri->segment(3));	   
	    $content['banner'] = $this->Cms_Model->single_record($this->fld_slr_id,$slr_id,$this->table_banner);	
	     $RequestMethod = $this->input->server('REQUEST_METHOD'); 
	    if($RequestMethod == "POST") { 	
	     $path=FCPATH . 'uploads/banner';	
		    if($_FILES['slr_img']['name']){	
		    $slr_img= $path.'/'. $content['banner']->slr_img;  
		     if (!unlink($slr_img)) {} else { }
			$image_name='slr_img';		
		    $img=$this->Cms_Model->images_upload($image_name,$path);
		    }else{
		    $img=$this->input->post('img');
		    }		  
            $data=array('slr_name' =>$this->input->post('slr_name'),		             
		                'slr_cost' =>$this->input->post('slr_cost'),		             
		                'slr_order' =>$this->input->post('slr_order'),
		                  'slr_url' =>$this->input->post('slr_url'),
		                'slr_img' =>$img,
		                'slr_updated' =>date('Y-m-d H:i:s')
		                 );
		 $result = $this->Cms_Model->update($this->fld_slr_id,$slr_id,$data,$this->table_banner);
		   if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Banner has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			   redirect('cms/banner-edit/'.$this->uri->segment(3)); 
		   }else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Profile .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('cms/banner-edit/'.$this->uri->segment(3));  
		   }
		    
		   }
	     $content['subview']="banner-edit";
		  $this->load->view('layout', $content);
		   }else{
		redirect('dashboard'); 
	   }
		
	}


  public function banner_delete() {  
  	  $permission=unserialize($this->login->mst_permission);
		 if($this->login->mst_role=='0' || !empty($permission['banners_delete'])){ 
       $slr_id=$this->uri->segment(3);    
       $banner = $this->Cms_Model->single_record($this->fld_slr_id,$slr_id,$this->table_banner);
        $path=FCPATH . 'uploads/banner';	
        $slr_img= $path.'/'. $banner->slr_img;  
		if (!unlink($slr_img)) {} else { }	     
       $result = $this->Cms_Model->delete($this->fld_slr_id,$slr_id,$this->table_banner);
	   $this->session->set_flashdata('msg',array('message' => 'Banner Image has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/banners'); 
	    }else{
		redirect('dashboard'); 
	   }
			
	}

 public function enquiry() {     		
       $content['admin']=admin_profile($this->login->mst_email);	     
       $content['enquiry']=  $this->Cms_Model->get_list('id',$this->table_enquiry);
	   $content['subview']="enquiry";
		$this->load->view('layout', $content);		
	}	

 public function enquiry_delete() {    	
       $slr_id=$this->uri->segment(3); 
       $result = $this->Cms_Model->delete('id',$slr_id,$this->table_enquiry);
	   $this->session->set_flashdata('msg',array('message' => 'Enquiry has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
	   redirect('cms/enquiry'); 	  
			
	}

	
	
	
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
             $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Setting_Model");
            $this->load->model("profile/Profile_Model",'Profile_Model');			
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
			/* ========FOR SUB CATEGORY SETTING== */
			$this->fld_scate_id="scate_id";
		    $this->table_sub_category="tbl_sub_category";	
            /* ====FOR CHILD CATEGORY SETTING=== */
			$this->fld_child_id="child_id";
		    $this->table_child_category="tbl_child_category";		
            /* ========FOR BRAND SETTING===== */
			$this->fld_brd_id="brd_id";
		    $this->table_brand="tbl_brand";
            /* ========FOR TAX SETTING===== */
			$this->fld_txt_id="txt_id";
		    $this->table_tax="tbl_tax";
		    /* ========FOR OPTION SETTING===== */
			$this->fld_opt_id="opt_id";
		    $this->table_option="tbl_option";			
    }
 
 public function category_tax() {  
          $content['spage']='1';
		  $content['category_tax']= $this->Setting_Model->getlist('txt_name','txt_status',$this->table_tax);
		  /*echo"<pre>";
		  print_r($content['category_tax']);
		  exit();*/
		  $content['subview']="category-tax";
		  $this->load->view('layout', $content);
         
	}
	
public function category() {  
          $content['spage']='2';
		  $content['category']= $this->Setting_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
		   $content['SubCategory']= $this->Setting_Model->cate_list('scate_name','scate_remove','scate_status',$this->table_sub_category);
		  $content['sub_category']= $this->Setting_Model->scate_list('scate_name','scate_remove',$this->vendor->vnd_id,$this->table_sub_category);
		  $content['child_category']= $this->Setting_Model->scate_list('child_name','child_remove',$this->vendor->vnd_id,$this->table_child_category);
		   $RequestMethod = $this->input->server('REQUEST_METHOD');
	       if($RequestMethod == "POST") {
			 $Action=$this->input->post('Action');
			
	 if($Action=='add') {
		 
	$check=$this->Setting_Model->check_double_exist('scate_name',$this->input->post('scate_name'),'cate_id',$this->input->post('cate_id'),$this->table_sub_category);
	if(empty($check)){
     $data=array(
		'vnd_id'=>$this->vendor->vnd_id,
		'cate_id'=>$this->input->post('cate_id'),
		'scate_slug'=>slug($this->input->post('scate_name')),
		'scate_name'=>$this->input->post('scate_name'),
		'scate_status'=>$this->input->post('scate_status'),
		'scate_created'=>date('Y-m-d H:i:s')
			 );
	$result = $this->Setting_Model->save($data,$this->table_sub_category);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Sub Category Data has been successfully save.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Sub Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 
			}else{
		$this->session->set_flashdata('msg',array('message' => "Already Sub Category name Used.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('setting/category');  	
		}	
 }elseif($Action=='edit') {
	$scate_id=$this->input->post('scate_id');
     $data=array(	
		'cate_id'=>$this->input->post('cate_id'),
		'scate_slug'=>slug($this->input->post('scate_name')),
		'scate_name'=>$this->input->post('scate_name'),
		'scate_status'=>$this->input->post('scate_status'),
		'scate_updated'=>date('Y-m-d H:i:s')
			 );
	$result = $this->Setting_Model->update($this->fld_scate_id,$scate_id,$data,$this->table_sub_category);	
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Sub Category Data has been successfully update.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Sub Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 
			
		   }
}
		  $content['subview']="category";
		  $this->load->view('layout', $content);
         
	}
    public function sub_category_edit()
    {
    	$scate_id = $this->input->post('scate_id');
		$result['category']= $this->Setting_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
    	$result['sub_category'] = $this->Setting_Model->single_product($this->fld_scate_id,$scate_id,$this->table_sub_category);
    	echo json_encode($result);
    }
  public function sub_category_status() {  
       $scate_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'scate_status'=>$action,
		'scate_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_scate_id,$scate_id,$data,$this->table_sub_category);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Sub Category Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Sub Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 			
		  
         
	}	
	
	function sub_category_delete() {  
       $scate_id=$this->uri->segment(3);       
       $data=array(
		'scate_remove'=>'1',
		'scate_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_scate_id,$scate_id,$data,$this->table_sub_category);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Sub Category Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Sub Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 			
		  
         
	}


	public function child_category_save() {  
          $content['spage']='2';		 
		   $RequestMethod = $this->input->server('REQUEST_METHOD');
	       if($RequestMethod == "POST") {
			 $Action=$this->input->post('Action');			
	 if($Action=='add') {		 
	$check=$this->Setting_Model->check_double_exist('child_name',$this->input->post('child_name'),'scate_id',$this->input->post('scate_id'),$this->table_child_category);
	if(empty($check)){
     $data=array(
		'vnd_id'=>$this->vendor->vnd_id,
		'cate_id'=>cate_id($this->input->post('scate_id')),
		'scate_id'=>$this->input->post('scate_id'),
		'child_slug'=>slug($this->input->post('child_name')),
		'child_name'=>$this->input->post('child_name'),
		'child_status'=>$this->input->post('child_status'),
		'child_created'=>date('Y-m-d H:i:s')
			 );
	$result = $this->Setting_Model->save($data,$this->table_child_category);
	 if($result){
			   $this->session->set_flashdata('c_msg',array('message' => 'Child Category Data has been successfully save.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('c_msg',array('message' => "Unable to Change Child Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 
			}else{
		$this->session->set_flashdata('c_msg',array('message' => "Already Child Category name Used.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('setting/category');  	
		}	
 }elseif($Action=='edit') {
	$child_id=$this->input->post('child_id');
     $data=array(	
		'cate_id'=>cate_id($this->input->post('scate_id')),
		'scate_id'=>$this->input->post('scate_id'),
		'child_slug'=>slug($this->input->post('child_name')),
		'child_name'=>$this->input->post('child_name'),
		'child_status'=>$this->input->post('child_status'),
		'child_updated'=>date('Y-m-d H:i:s')
			 );
	$result = $this->Setting_Model->update($this->fld_child_id,$child_id,$data,$this->table_child_category);	
	 if($result){
			   $this->session->set_flashdata('c_msg',array('message' => 'Child Category Data has been successfully update.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('c_msg',array('message' => "Unable to Change Child Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 
			
		   }
         }
		
	}

    public function child_category_edit()
    {
    	$child_id = $this->input->post('child_id');
		$result['category']= $this->Setting_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
		$result['SubCategory']= $this->Setting_Model->cate_list('scate_name','scate_remove','scate_status',$this->table_sub_category);
    	$result['child_category'] = $this->Setting_Model->single_product($this->fld_child_id,$child_id,$this->table_child_category);
    	echo json_encode($result);
    }

  public function child_category_status() {  
       $child_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'child_status'=>$action,
		'child_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_child_id,$child_id,$data,$this->table_child_category);
	 if($result){
			   $this->session->set_flashdata('c_msg',array('message' => 'Child Category Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('c_msg',array('message' => "Unable to Change Child Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 			
		  
         
	}	
	
	function child_category_delete() {  
       $child_id=$this->uri->segment(3);       
       $data=array(
		'child_remove'=>'1',
		'child_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_child_id,$child_id,$data,$this->table_child_category);
	 if($result){
			   $this->session->set_flashdata('c_msg',array('message' => 'Child Category Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/category'); 
			}else{
			   $this->session->set_flashdata('c_msg',array('message' => "Unable to Change Child Category .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/category');  
			} 			
		  
         
	}
	
 public function brand() {  
   $content['spage']='3';		 
   $content['brand']= $this->Setting_Model->scate_list('brd_name','brd_remove',$this->vendor->vnd_id,$this->table_brand);
   $RequestMethod = $this->input->server('REQUEST_METHOD');
 if($RequestMethod == "POST") {
	$Action=$this->input->post('Action');
	 if($Action=='add'){
	$check=$this->Setting_Model->check_exist('brd_name',$this->input->post('brd_name'),$this->table_brand);
	if(empty($check)){
		  $path=FCPATH . '../admin/uploads/brand';
		   $image_name='brd_img';
		 $img=$this->Setting_Model->images_upload($image_name,$path);
     $data=array(
		'vnd_id'=>$this->vendor->vnd_id,		
		'brd_slug'=>slug($this->input->post('brd_name')),
		'brd_name'=>$this->input->post('brd_name'),
		'brd_img'=>$img,
		'brd_status'=>$this->input->post('brd_status'),
		'brd_created'=>date('Y-m-d H:i:s')
			 );
	$result = $this->Setting_Model->save($data,$this->table_brand);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Brand Data has been successfully save.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/brand'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Brand .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/brand');  
			} 
			}else{
		$this->session->set_flashdata('msg',array('message' => "Already Brand name Used.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
		redirect('setting/brand');  	
		}	
 }elseif($Action=='edit') {

 	$brd_id=$this->input->post('brd_id');
 		if(!empty($_FILES['brd_img']['name'])){	
	$brand=$this->Setting_Model->single_product($this->fld_brd_id,$brd_id,$this->table_brand);
 	  $path=FCPATH . '../admin/uploads/brand';
		   $image_name='brd_img';
		   $img_files= $path.'/'.$brand->brd_img;  
		 if (!unlink($img_files)) {} else { }
		 $img=$this->Setting_Model->images_upload($image_name,$path);
     $data=array(			
		'brd_slug'=>slug($this->input->post('brd_name')),
		'brd_name'=>$this->input->post('brd_name'),
		'brd_img'=>$img,
		'brd_status'=>$this->input->post('brd_status'),
		'brd_updated'=>date('Y-m-d H:i:s')
			 );
 }else{$data=array(			
		'brd_slug'=>slug($this->input->post('brd_name')),
		'brd_name'=>$this->input->post('brd_name'),	
		'brd_status'=>$this->input->post('brd_status'),
		'brd_updated'=>date('Y-m-d H:i:s')
			 );}
	$result = $this->Setting_Model->update($this->fld_brd_id,$brd_id,$data,$this->table_brand);	
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Brand Data has been successfully update.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/brand'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Brand .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/brand');  
			} 
			
		   }
}
		  $content['subview']="brand";
		  $this->load->view('layout', $content);
         
	}
    public function brand_edit()
    {
    	$brd_id = $this->input->post('brd_id');
    	$result['brand'] = $this->Setting_Model->single_product($this->fld_brd_id,$brd_id,$this->table_brand);
    	$result['brand_img'] = base_url('../admin/uploads/brand/').$result['brand']->brd_img;
    	echo json_encode($result);
    }
  public function brand_status() {  
       $brd_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'brd_status'=>$action,
		'brd_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_brd_id,$brd_id,$data,$this->table_brand);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Brand Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/brand'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Brand .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/brand');  
			} 			
		  
         
	}	
	
	function brand_delete() {  
       $brd_id=$this->uri->segment(3);       
       $data=array(
		'brd_remove'=>'1',
		'brd_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_brd_id,$brd_id,$data,$this->table_brand);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Brand Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/brand'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Brand .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/brand');  
			} 			
		  
         
	}	
	
	public function option()
	 {  
		   $content['spage']='4';		 
		   $content['option']= $this->Setting_Model->get('opt_name',$this->vendor->vnd_id,$this->table_option);
		   $RequestMethod = $this->input->server('REQUEST_METHOD');
		    if($RequestMethod == "POST") {
			$Action=$this->input->post('Action');
			 if($Action=='add'){
			$check=$this->Setting_Model->check_exist('opt_name',$this->input->post('opt_name'),$this->table_option);
			if(empty($check)){
		     $data=array(
				'vnd_id'=>$this->vendor->vnd_id,		
				'opt_slug'=>slug($this->input->post('opt_name')),
				'opt_name'=>$this->input->post('opt_name'),
				'opt_required'=>$this->input->post('opt_required'),
				'opt_display'=>$this->input->post('opt_display'),
				'opt_status'=>$this->input->post('opt_status'),
				'opt_created'=>date('Y-m-d H:i:s')
					 );
			$result = $this->Setting_Model->save($data,$this->table_option);
			 if($result){
					   $this->session->set_flashdata('msg',array('message' => 'Option Data has been successfully save.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
					   redirect('setting/option'); 
					}else{
					   $this->session->set_flashdata('msg',array('message' => "Unable to Change Option .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('setting/option');  
					} 
					}else{
				$this->session->set_flashdata('msg',array('message' => "Already Option name Used.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('setting/option');  	
				}	

		     }elseif($Action=='edit') {

			$opt_id=$this->input->post('opt_id');
		     $data=array(			
				'opt_slug'=>slug($this->input->post('opt_name')),
				'opt_name'=>$this->input->post('opt_name'),
				'opt_required'=>$this->input->post('opt_required'),
				'opt_display'=>$this->input->post('opt_display'),
				'opt_status'=>$this->input->post('opt_status'),
				'opt_updated'=>date('Y-m-d H:i:s')
					 );
			 $result = $this->Setting_Model->update($this->fld_opt_id,$opt_id,$data,$this->table_option);	
			 if($result){
					   $this->session->set_flashdata('msg',array('message' => 'Option Data has been successfully update.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
					   redirect('setting/option'); 
					}else{
					   $this->session->set_flashdata('msg',array('message' => "Unable to Change Option .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('setting/option');  
					} 
					
				   }
		        }
		  $content['subview']="option";
		  $this->load->view('layout', $content);
         
	}

public function option_edit()
    {
     $opt_id = $this->input->post('opt_id');
     $result['option'] = $this->Setting_Model->single_product($this->fld_opt_id,$opt_id,$this->table_option);
    	echo json_encode($result);
    }

public function option_status() {  
       $opt_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'opt_status'=>$action,
		'opt_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Setting_Model->update($this->fld_opt_id,$opt_id,$data,$this->table_option);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Option Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('setting/option'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Option .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('setting/option');  
			} 			
		  
         
	}	
	
	

	
}

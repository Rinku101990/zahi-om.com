<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
            $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Promotion_model");                     			
           /* ========FOR VENDOR TABEL========= */ 			
            $this->fld_email="vnd_email";	
            $this->fld_password="vnd_password";	
            $this->table_vendor="tbl_vendor";
            /* ========FOR PRODUCT SETTING===== */
			$this->fld_p_id="p_id";	 			
		    $this->table_product="tbl_product";	
		    /* ========FOR SPECIAL PRICE SETTING===== */
			$this->fld_sp_id="sp_id";	 			
		    $this->table_special_price="tbl_special_price";	
		     /* ========FOR Volume Discount  SETTING===== */
			$this->fld_vd_id="vd_id";	 			
		    $this->table_discount="tbl_volume_discount";		
		   		
    }
 

	 function special_price() {  
         $content['spage']='1';
         $dbselect='sp_id,sp_pid,sp_vnd_id,sp_special_price,sp_start_date,sp_end_date,sp_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['special_price'] = $this->Promotion_model->GetList($dbselect,'sp_id','sp_vnd_id',$vnd_id,$this->table_special_price);	
		 $pselect='p_id,p_vnd_id,p_name';        
		 $content['product'] = $this->Promotion_model->GetList($pselect,'p_id','p_vnd_id',$vnd_id,$this->table_product);		   	
		  $content['subview']="special-price";
		  $this->load->view('layout', $content);
         
	}	


	function special_price_save() 
	{      
		    $vnd_id=$this->vendor->vnd_id;
             if(!empty($this->input->post('sp_id'))){    		
		     $sp_id=$this->input->post('sp_id');		  
			 $data=array('sp_special_price'=>$this->input->post('special_price'),
			             'sp_start_date'=>$this->input->post('start_date'),
			             'sp_end_date'=>$this->input->post('end_date'),	
			             'sp_updated'=>date('Y-m-d H:i:s')
			      ); 
			  $result = $this->Promotion_model->update($this->fld_sp_id,$sp_id,$data,$this->table_special_price);		   
			   
			   if($result){
				   $this->session->set_flashdata('msg',array('message' => 'Special Price has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
				   redirect('promotion/special-price'); 
			   }else{
				   $this->session->set_flashdata('msg',array('message' => "Unable to Change Special Price.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				   redirect('promotion/special-price');  
			   }
			  }else{
               $sp_pid=$this->input->post('sp_pid');
               $check=$this->Promotion_model->check('sp_pid',$sp_pid,'sp_vnd_id',$vnd_id,$this->table_special_price);
               if(empty($check)){	
                $_POST['sp_vnd_id']=$vnd_id;
	              $_POST['sp_status']='1';
	              $_POST['sp_created']=date('Y-m-d H:i:s');
				  $data=$_POST; 
				  $result = $this->Promotion_model->save($data,$this->table_special_price);		   
				   
				   if($result){
					   $this->session->set_flashdata('msg',array('message' => 'Special Price has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
					   redirect('promotion/special-price'); 
				   }else{
					   $this->session->set_flashdata('msg',array('message' => "Unable to Change Special Price.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('promotion/special-price');  
				   }
				}else{
					 $this->session->set_flashdata('msg',array('message' => "Special Price For This Date Already Added.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('promotion/special-price');  
				}


			  }
	
         
	}	


  public function special_price_status() {  
       $sp_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'sp_status'=>$action,
		'sp_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Promotion_model->update($this->fld_sp_id,$sp_id,$data,$this->table_special_price);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Special Price Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('promotion/special-price'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Special Price .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('promotion/special-price');  
			} 
	}
	 public function special_price_edit()
    {
    	$sp_id = $this->input->post('sp_id');		
    	$result['special'] = $this->Promotion_model->single_product($this->fld_sp_id,$sp_id,$this->table_special_price);
    	$result['start_date'] = date('Y-m-d',strtotime($result['special']->sp_start_date));
    	$result['end_date'] = date('Y-m-d',strtotime($result['special']->sp_end_date));
    	$result['product'] = $this->Promotion_model->get_single('p_name','p_id',$result['special']->sp_pid,$this->table_product);
    	echo json_encode($result);
    }


     public function special_price_delete() {  
       $sp_id=$this->uri->segment(3);  
		$result = $this->Promotion_model->delete($this->fld_sp_id,$sp_id,$this->table_special_price);

			   $this->session->set_flashdata('msg',array('message' => 'Special Price Status Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('promotion/special-price'); 
			
	}
	

	 function volume_discount() {  
         $content['spage']='2';
         $dbselect='vd_id,vd_pid,vd_vnd_id,vd_min_purchase_qty,vd_discount,vd_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['volume_discount'] = $this->Promotion_model->GetList($dbselect,'vd_id','vd_vnd_id',$vnd_id,$this->table_discount);	
		 $pselect='p_id,p_vnd_id,p_name';        
		 $content['product'] = $this->Promotion_model->GetList($pselect,'p_id','p_vnd_id',$vnd_id,$this->table_product);		   	
		  $content['subview']="volume-discount";
		  $this->load->view('layout', $content);
         
	}	


	function volume_discount_save() 
	{      
		    $vnd_id=$this->vendor->vnd_id;
             if(!empty($this->input->post('vd_id'))){    		
		     $vd_id=$this->input->post('vd_id');		  
			 $data=array('vd_min_purchase_qty'=>$this->input->post('vd_min_purchase_qty'),
			             'vd_discount'=>$this->input->post('vd_discount'),
			             'vd_updated'=>date('Y-m-d H:i:s')
			      );
			
			  $result = $this->Promotion_model->update($this->fld_vd_id,$vd_id,$data,$this->table_discount);		   
			   
			   if($result){
				   $this->session->set_flashdata('msg',array('message' => 'Volume Discount has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
				   redirect('promotion/volume-discount'); 
			   }else{
				   $this->session->set_flashdata('msg',array('message' => "Unable to Change Volume Discount.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				   redirect('promotion/volume-discount');  
			   }
			  }else{
               $vd_pid=$this->input->post('vd_pid');
               $check=$this->Promotion_model->check('vd_pid',$vd_pid,'vd_vnd_id',$vnd_id,$this->table_discount);
               if(empty($check)){	
                $_POST['vd_vnd_id']=$vnd_id;
	              $_POST['vd_status']='1';
	              $_POST['vd_created']=date('Y-m-d H:i:s');
				  $data=$_POST; 
				  $result = $this->Promotion_model->save($data,$this->table_discount);		   
				   
				   if($result){
					   $this->session->set_flashdata('msg',array('message' => 'Volume Discount has been successfully Save.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
					   redirect('promotion/volume-discount'); 
				   }else{
					   $this->session->set_flashdata('msg',array('message' => "Unable to Change Volume Discount.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('promotion/volume-discount');  
				   }
				}else{
					 $this->session->set_flashdata('msg',array('message' => "Volume Discount For This discount Already Added.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
					   redirect('promotion/volume-discount');  
				}


			  }
	
         
	}	


  public function volume_discount_status() {  
       $vd_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'vd_status'=>$action,
		'vd_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Promotion_model->update($this->fld_vd_id,$vd_id,$data,$this->table_discount);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Volume Discount Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('promotion/volume-discount'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Volume Discount .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('promotion/volume-discount');  
			} 
	}
	 public function volume_discount_edit()
    {
    	$vd_id = $this->input->post('vd_id');		
    	$result['discount'] = $this->Promotion_model->single_product($this->fld_vd_id,$vd_id,$this->table_discount);    	
    	$result['product'] = $this->Promotion_model->get_single('p_name','p_id',$result['discount']->vd_pid,$this->table_product);
    	echo json_encode($result);
    }


     public function volume_discount_delete() {  
       $vd_id=$this->uri->segment(3);  
		$result = $this->Promotion_model->delete($this->fld_vd_id,$vd_id,$this->table_discount);
	
			   $this->session->set_flashdata('msg',array('message' => 'Volume Discount Status Data has been successfully Delete.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('promotion/volume-discount'); 
			
	}
	
	
	
}

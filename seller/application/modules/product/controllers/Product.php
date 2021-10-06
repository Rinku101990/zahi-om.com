<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	 
	public function __construct() {
            parent::__construct(); 
			$this->load->helper("common");	
			$this->login = $this->session->userdata('logged_in_seller');			
			  if(empty($this->login)){
				redirect('login','refresh');
			  }  
            $this->vendor=vendor_profile($this->login->vnd_email);	    		
            $this->load->model("Product_Model");
            $this->load->model("profile/Profile_model",'Profile_Model');           			
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
			$this->table_category="tbl_category";/* ========FOR SUB CATEGORY SETTING== */
			$this->fld_scate_id="scate_id";
		    $this->table_sub_category="tbl_sub_category";	
            /* ====FOR CHILD CATEGORY SETTING=== */
			$this->fld_child_id="child_id";
		    $this->table_child_category="tbl_child_category";		
            /* ========FOR BRAND SETTING===== */
			$this->fld_brd_id="brd_id";	 			
		    $this->table_brand="tbl_brand";			
		     /* ========FOR UNIT SETTING===== */
			$this->fld_ut_id="ut_id";	 			
		    $this->table_unit="tbl_unit";	
		    /* ========FOR PRODUCT SETTING===== */
			$this->fld_p_id="p_id";	 			
		    $this->table_product="tbl_product";	
		    /* ========FOR PRODUCT LINK SETTING===== */
			$this->fld_pl_id="id";	 			
		    $this->table_product_link="tbl_product_link";
              /* ========FOR OPTION GROUP SETTING===== */
			$this->fld_opt_id="opt_id";	 			
		    $this->table_option="tbl_option";	
		      /* ========FOR Inventory  SETTING===== */
			$this->fld_int_id="int_id";	 			
		    $this->table_inventory="tbl_inventory";
		    /* ========FOR Special Price  SETTING===== */
			$this->fld_sp_id="sp_id";	 			
		    $this->table_special_price="tbl_special_price";	
		     /* ========FOR Volume Discount  SETTING===== */
			$this->fld_vd_id="vd_id";	 			
		    $this->table_discount="tbl_volume_discount";		
		    /* ========FOR Product Image  SETTING===== */
			$this->fld_pg_id="pg_id";	 			
		    $this->table_product_img="tbl_product_img";		
		        /* ========FOR POLICY POINT TABEL=========== */ 			
            $this->fld_pp_id="pp_id";	
            $this->table_policy="tbl_policy";	 	
    }
 
    function index() {  
         $content['spage']='1';
         $dbselect='p_id,p_vnd_id,p_reference_no,p_name,p_model,p_brand,p_selling_price,p_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['product'] = $this->Product_Model->GetList($dbselect,'p_id','p_vnd_id',$vnd_id,$this->table_product);	
	   		
		  $content['subview']="product";
		  $this->load->view('layout', $content);
         
	}	
	 function hot_products() {  
	    $content['spage']='6';  	
       $dbselect='sp_id,sp_pid,sp_vnd_id,sp_special_price,sp_start_date,sp_end_date,sp_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['special_price'] = $this->Product_Model->GetList($dbselect,'sp_id','sp_vnd_id',$vnd_id,$this->table_special_price);	
		 $pselect='p_id,p_vnd_id,p_name';        
		 $content['product'] = $this->Product_Model->GetList($pselect,'p_id','p_vnd_id',$vnd_id,$this->table_product); 
		 $content['subview']="hot-product";
		  $this->load->view('layout', $content);
         
	}	

	 function featured() {  
         $content['spage']='4';
         $dbselect='p_id,p_vnd_id,p_reference_no,p_name,p_model,p_brand,p_selling_price,p_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['product'] = $this->Product_Model->GetList_featured($dbselect,'p_id','p_vnd_id',$vnd_id,$this->table_product);	
	   		
		  $content['subview']="featured_product";
		  $this->load->view('layout', $content);
         
	}	

	 function trending() {  
         $content['spage']='5';
         $dbselect='p_id,p_vnd_id,p_reference_no,p_name,p_model,p_brand,p_selling_price,p_status';
         $vnd_id=$this->vendor->vnd_id;
		 $content['product'] = $this->Product_Model->GetList_trending($dbselect,'p_id','p_vnd_id',$vnd_id,$this->table_product);	
	   		
		  $content['subview']="trending_product";
		  $this->load->view('layout', $content);
         
	}	
	
	function add()
	   {
	   	$content['spage']='1';
	    $content['category'] = $this->Product_Model->cate_list('cate_name','cate_remove','cate_status',$this->table_category);
	     $content['sub_category'] = $this->Product_Model->cate_list('scate_name','scate_remove','scate_status',$this->table_sub_category);
	      $content['child_category'] = $this->Product_Model->cate_list('child_name','child_remove','child_status',$this->table_child_category);
	    $content['unit'] = $this->Product_Model->unit_list($this->fld_ut_id,'ut_status',$this->table_unit);
	    $content['brand'] = $this->Product_Model->brd_list($this->vendor->vnd_id,$this->table_brand);
		$content['option'] = $this->Product_Model->option_list($this->vendor->vnd_id,$this->table_option);
		 $content['policy']=  $this->Product_Model->policy_list($this->table_policy);
	     $content['subview']="product_add";
		 $this->load->view('layout', $content);
     }	

     public function General_Product_save()
     {
     	if(empty($this->input->post('p_id'))){ 
     	$checkName = $this->Product_Model->check('p_name',$this->input->post('p_name'),$this->table_product); 
     	$reference = $this->Product_Model->check('p_reference_no',$this->input->post('p_reference_no'),$this->table_product); 
     	if(empty($checkName) && empty($reference)){
     	  $scate_id=scate($this->input->post('p_child'));
	      $_POST['p_vnd_id']=$this->vendor->vnd_id;
	      $_POST['p_cate']=cate($scate_id);
	      $_POST['p_scate']=$scate_id;
	      $_POST['p_status']='1';
	      $_POST['p_approval_status']='1';
	      $_POST['p_created']=date('Y-m-d H:i:s') ;
	      $data=$_POST;	
	      //Product save      
	      $result = $this->Product_Model->save($data,$this->table_product);
	      // Product Link
	      $data1= array('p_id' =>$result,'p_child'=>$this->input->post('p_child') );
	       $result_link = $this->Product_Model->save($data1,$this->table_product_link);
	      if($result){
			  $result1['response'] ='success';
			  $result1['pid'] =$result;
	      }else{ $result1['response'] ='Failed';}

	      }else{
	  	$result1['response'] ='Used';
	  }
	  	}else{  
		$p_id=$this->input->post('p_id');	     
	       $data=$_POST;	
		$result = $this->Product_Model->update('p_id',$p_id,$data,$this->table_product);
	      if($result){
			  $result1['response'] ='success';			
	      }else{ $result1['response'] ='Failed';}}
		  
		  echo json_encode($result1);
     }

     public function General_Product_Update()
     {
     	  $p_id=$this->input->post('p_id');
	      $_POST['p_updated']=date('Y-m-d H:i:s') ;
	      $data=$_POST;	
	        /* start inventory 1st row update*/
	      $get_int=get_int($p_id);
	      $data_int=array('int_selleing_price' => $this->input->post('p_selling_price'));
	      $update_int = $this->Product_Model->update('int_id',$get_int,$data_int,$this->table_inventory);
	       /* last inventory 1st row update*/
	      //Product update      
	     $result = $this->Profile_Model->update('p_id',$p_id,$data,$this->table_product);
	      if($result){
			  $result1['response'] ='success';			
	      }else{ $result1['response'] ='Failed';}
		  
		  echo json_encode($result1);
     }

     public function category_add()
     {
	      $CHID=$this->input->post('CHID');	 
	      $CID=$this->input->post('CID');
	      $pid=$this->input->post('pid');	
	      $category=$this->input->post('category');		  
		  $check = $this->Product_Model->check('p_id',$pid,$this->table_product_link);
		  if($check){
	      if($category=='child'){
             $getchild=explode(', ',$check->p_child);
             if(!in_array($CID, $getchild)){		 
	          $current_child=$CID.", ".$check->p_child;
	          $data1= array('p_child'=>$current_child );
	          $result = $this->Profile_Model->update('p_id',$pid,$data1,$this->table_product_link);	         
	           echo'<p><a href="javascript:void(0);" onclick="GetCateRemove(this);" id="'.$CID.'" category="child" class="btn btn-danger"><i class="fa fa-remove"></i></a> '.child_category_name($CID).' &nbsp;</p>';	
			 }			   
	      }elseif($category=='sub'){
              $getsub=explode(', ',$check->p_scate);
             if(!in_array($CID, $getsub)){			  
	      	  $current_sub=$CID.", ".$check->p_scate;
	          $data1= array('p_scate'=>$current_sub );
	          $result = $this->Profile_Model->update('p_id',$pid,$data1,$this->table_product_link);
	          	      
	           echo'<p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="'.$CID.'" category="sub"><i class="fa fa-remove"></i></a> '.sub_category_name($CID).' &nbsp;</p>';
			 }
	      }	    
	      elseif($category=='cate'){
             $getcate12=explode(', ',$check->p_cate);
             if(!in_array($CID, $getcate12)){			  
	          	$current_cate=$CID.", ".$check->p_cate;
	           $data1= array('p_cate'=>$current_cate );
	          $result = $this->Product_Model->update('p_id',$pid,$data1,$this->table_product_link);
	          
	          echo'<p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="'.$CID.'" category="cate"><i class="fa fa-remove"></i></a> '.category_name($CID).' &nbsp;</p>';
	      }}
		  }		  
	     
     }
	 
	public function category_remove()
     {
	      
	      $CID=$this->input->post('CID');
	      $pid=$this->input->post('pid');	
	      $category=$this->input->post('category');		  
		  $check = $this->Product_Model->check('p_id',$pid,$this->table_product_link);		
	      if($category=='child'){
             $getchild=', '.$CID;
			 $z_child=str_replace($getchild,"",$check->p_child);  
    	    if($check->p_child==$z_child) {	
			   $getchild2 = $CID.", ";    	
	    	  $kz_child=str_replace($getchild2,"",$check->p_child); 	    		    	
				if($check->p_child==$kz_child) {		    	    	
					$kk=str_replace($CID,"",$check->p_child); 
					$data= array('p_child' =>$kk); 
				}else{
					$data= array('p_child' =>$kz_child); 		
				}	
			}else{
				$data= array('p_child' =>$z_child); 
			}
			 			   
	      }elseif($category=='sub'){
				   $getchild=', '.$CID;
				 $z_child=str_replace($getchild,"",$check->p_scate);  
				if($check->p_scate==$z_child) {	
				   $getchild2 = $CID.", ";    	
				  $kz_child=str_replace($getchild2,"",$check->p_scate); 	    		    	
					if($check->p_scate==$kz_child) {		    	    	
						$kk=str_replace($CID,"",$check->p_scate); 
						$data= array('p_scate' =>$kk); 
					}else{
						$data= array('p_scate' =>$kz_child); 		
					}	
				}else{
					$data= array('p_scate' =>$z_child); 
				}            
	      }	    
	      elseif($category=='cate'){
			  				   $getchild=', '.$CID;
				 $z_child=str_replace($getchild,"",$check->p_cate);  
				if($check->p_cate==$z_child) {	
				   $getchild2 = $CID.", ";    	
				  $kz_child=str_replace($getchild2,"",$check->p_cate); 	    		    	
					if($check->p_cate==$kz_child) {		    	    	
						$kk=str_replace($CID,"",$check->p_cate); 
						$data= array('p_cate' =>$kk); 
					}else{
						$data= array('p_cate' =>$kz_child); 		
					}	
				}else{
					$data= array('p_cate' =>$z_child); 
				}            
            }
		  $result = $this->Profile_Model->update('p_id',$pid,$data,$this->table_product_link);
	          	      
	           echo'success';
		  	  
	     
     }


     public function Category_Product_save()
     {
	      $PID=$this->input->post('p_id');
             $p_tag=$this->input->post('p_tag');		  
	     $data= array('p_tag' =>$p_tag); 
	      $result = $this->Profile_Model->update('p_id',$PID,$data,$this->table_product_link);
	      if($result){
	      	echo'success';
	      }else{ echo'Failed';}
     }

      public function Category_Product_Update()
     {
	      $PID=$this->input->post('p_id');
          $p_tag=$this->input->post('p_tag');		  
	     $data= array('p_tag' =>$p_tag); 
	      $result = $this->Profile_Model->update('p_id',$PID,$data,$this->table_product_link);
	      if($result){
	      	echo'success';
	      }else{ echo'Failed';}
     }

     public function Option_Product_save()
     {
	     $PID=$this->input->post('p_id');
	     $vnd_id=$this->vendor->vnd_id;	   
         $p_option_group=implode(', ',$this->input->post('p_option_group'));
         $get_group=explode(', ',$p_option_group);		  
	     $data= array('p_option_group' =>$p_option_group); 
	      $result = $this->Profile_Model->update('p_id',$PID,$data,$this->table_product_link);
	      $option_result = $this->Product_Model->option_gorup_list($vnd_id);
		      
		      	$arr='';
		      	if($option_result){
		      	if(in_array('1',$get_group) || in_array('2',$get_group) || in_array('4',$get_group) || in_array('5',$get_group) || in_array('6',$get_group) || in_array('7',$get_group) || in_array('9',$get_group) || in_array('10',$get_group) || in_array('11',$get_group)){
	      		$arr.='<div class="col-sm-12 col-md-12"><a href="javascript:void(0);" class="btn btn-default add_size pull-right" onclick="add_size(this)" title="Add field" style="margin-bottom:20px"><i class="fa fa-plus"></i> Add</a></div>';
		      		
		      } 
		      	foreach ($option_result as $value) {
		      			if($value->opt_id=='2' || $value->opt_id=='4' || $value->opt_id=='5' || $value->opt_id=='6' || $value->opt_id=='7' || $value->opt_id=='9' || $value->opt_id=='11'){ $field_name="size[]";}elseif($value->opt_id=='1'){ $field_name="color[]";}else{ $field_name="option_grop[]"; }		
		      		if($value->opt_id!='3'){
		      		if(in_array($value->opt_id, $get_group)){			  
		      		if(empty($value->opt_value)){			  
		      		$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<input type="text" name="option_grop[]" class="form-control  option_grop" ></div>';
		      		}else{  if($value->opt_id=='5'){$abaya="''";}else{$abaya="";}
		      				$get_opt_value='';
		      			foreach (explode(', ', $value->opt_value) as $getvalue) {
		      				$get_opt_value.='<option value="'.$getvalue.'">'.$getvalue.''.$abaya.'</option>';
		      			}

		      //	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      //		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      //		<select name="'.$field_name.'" class="form-control  option_grop" >
		      //		<option value="">Select '.$value->opt_name.'</option>
		      //		'.$get_opt_value.'
		      //		</select></div>';
		      		
		      			if($value->opt_id!='10'){
		      	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<select name="'.$field_name.'" class="form-control  option_grop" >
		      		<option value="">Select '.$value->opt_name.'</option>
		      		'.$get_opt_value.'
		      		</select></div>';
          	}else{
          	    	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<select name="intsize[]" class="form-control  option_grop" >
		      		<option value="">Select '.$value->opt_name.'</option>
		      		'.$get_opt_value.'
		      		</select></div>';
          	}
		      		
		      	if($value->opt_id=='5' || $value->opt_id=='6'){
		      		$get_opt_value11='';
		      			foreach (explode(', ',option(2)->opt_value) as $getvalue) {
		      				$get_opt_value11.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>Size</label><select name="intsize[]" class="form-control" >
		      		<option value="">Select Size</option>
		      		'.$get_opt_value11.'
		      		</select></div>';
		      	}
		      		if($value->opt_id=='5' || $value->opt_id=='2' || $value->opt_id=='6' ){
	$arr.='<div class="col-sm-1 col-md-1"><label style="width:100%">Custom</label><input type="checkbox" name="int_custom[]" class="form-control int_custom" value="1" style="width:40px;height:35px">
</div>';
}
		      		}
		      		}
		      	}
		      	}
		      }else{$arr='';}

	      if($result){
			  $result1['response'] ='success';
			  $result1['option'] =$arr;
	      }else{ $result1['response'] ='Failed';}
	      echo json_encode($result1);
     }

     public function Option_Product_update()
     {
	     $PID=$this->input->post('p_id');
	     $vnd_id=$this->vendor->vnd_id;	   
         $p_option_group=implode(', ',$this->input->post('p_option_group'));
         $get_group=explode(', ',$p_option_group);		  
	     $data= array('p_option_group' =>$p_option_group); 
	     $result = $this->Profile_Model->update('p_id',$PID,$data,$this->table_product_link);
	     $option_result = $this->Product_Model->option_gorup_list($vnd_id);
		      	$arr='';
		      	if($option_result){
		      		if(in_array('1',$get_group) || in_array('2',$get_group) || in_array('4',$get_group) || in_array('5',$get_group) || in_array('6',$get_group) || in_array('7',$get_group) || in_array('9',$get_group) || in_array('10',$get_group) || in_array('11',$get_group)){
		      			$arr.='<div class="col-sm-12 col-md-12"><a href="javascript:void(0);" class="btn btn-default add_size pull-right" title="Add field" onclick="add_size(this)" style="margin-bottom:20px"><i class="fa fa-plus"></i> Add</a></div>';
		              } 
		      		
		      	foreach ($option_result as $value) {
		      			if($value->opt_id!='3'){
		      				if($value->opt_id=='2' || $value->opt_id=='4' || $value->opt_id=='5' || $value->opt_id=='6' || $value->opt_id=='7' || $value->opt_id=='9' || $value->opt_id=='11'){ $field_name="size[]";}elseif($value->opt_id=='1'){ $field_name="color[]";}else{ $field_name="option_grop[]"; }		
		      		if(in_array($value->opt_id, $get_group)){			  
		      		if(empty($value->opt_value)){			  
		      		$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<input type="text" name="option_grop[]" class="form-control option_grop" ></div>';
		      		}else{  if($value->opt_id=='5'){$abaya="''";}else{$abaya="";}	
		      				$get_opt_value='';
		      			foreach (explode(', ', $value->opt_value) as $getvalue) {
		      				$get_opt_value.='<option value="'.$getvalue.'">'.$getvalue.''.$abaya.'</option>';
		      			}

		      //	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      //		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      //		<select name="'.$field_name.'" class="form-control  option_grop" >
		      //		<option value="">Select '.$value->opt_name.'</option>
		      //		'.$get_opt_value.'
		      //		</select></div>';
		      		
		      			if($value->opt_id!='10'){
		      	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<select name="'.$field_name.'" class="form-control  option_grop" >
		      		<option value="">Select '.$value->opt_name.'</option>
		      		'.$get_opt_value.'
		      		</select></div>';
          	}else{
          	    	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>
		      		<input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="'.$value->opt_id.'" >
		      		<select name="intsize[]" class="form-control  option_grop" >
		      		<option value="">Select '.$value->opt_name.'</option>
		      		'.$get_opt_value.'
		      		</select></div>';
          	}

		      		if($value->opt_id=='5' || $value->opt_id=='6'){
		      		$get_opt_value11='';
		      			foreach (explode(', ',option(2)->opt_value) as $getvalue) {
		      				$get_opt_value11.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>Size</label><select name="intsize[]" class="form-control" >
		      		<option value="">Select Size</option>
		      		'.$get_opt_value11.'
		      		</select></div>';
		      	}

		      		if($value->opt_id=='5' || $value->opt_id=='2'  || $value->opt_id=='6' ){
	$arr.='<div class="col-sm-1 col-md-1"><label style="width:100%">Custom</label><input type="checkbox" name="int_custom[]" class="form-control int_custom" value="1" style="width:40px;height:35px" >
</div>';
}
		      		}
		      		}
		      	}
		      	}
		      }else{$arr='';}

	      if($result){
			  $result1['response'] ='success';
			  $result1['option'] =$arr;
	      }else{ $result1['response'] ='Failed';}
	      echo json_encode($result1);
     }


      public function inventry_size_filed()
     {  $vnd_id=$this->vendor->vnd_id;	 
     	$option_add=implode(', ',$this->input->post('p_option_group'));
	    $get_group=explode(', ',$option_add);	
	     
	      $option_result = $this->Product_Model->option_gorup_list($vnd_id);
		      
		      	$arr='';
		      	if($option_result){
		      	foreach ($option_result as $value) {
		      	if($value->opt_id=='2' && in_array(2, $get_group)  || $value->opt_id=='4' && in_array(4, $get_group)  || $value->opt_id=='5' && in_array(5, $get_group) || $value->opt_id=='6' && in_array(6, $get_group) || $value->opt_id=='7' && in_array(7, $get_group) || $value->opt_id=='9' && in_array(9, $get_group) || $value->opt_id=='11' && in_array(11, $get_group)){		      		
		      		if($value->opt_id=='5'){$abaya="''";}else{$abaya="";}
		      				$get_opt_value='';
		      			foreach (explode(', ', $value->opt_value) as $getvalue) {
		      				$get_opt_value.='<option value="'.$getvalue.'">'.$getvalue.''.$abaya.'</option>';
		      			}

		      			if(in_array(1, $get_group)){
		      		$get_opt_value1='';
		      			foreach (explode(', ', color()->opt_value) as $getvalue) {
		      				$get_opt_value1.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>'.color()->opt_name.' </label>		      		
		      		<select name="color[]" class="form-control  option_grop" >
		      		<option value="">Select '.color()->opt_name.'</option>
		      		'.$get_opt_value1.'
		      		</select></div>';
		      	}
// if($value->opt_id=='2' || $value->opt_id=='4' || $value->opt_id=='5' || $value->opt_id=='6'){
		      	$arr.='<div class="col-sm-3 col-md-3"><label>'.$value->opt_name.' </label>		      		
		      		<select name="size[]" class="form-control  option_grop" >
		      		<option value="">Select '.$value->opt_name.'</option>
		      		'.$get_opt_value.'
		      		</select></div>';
		      	//}
		      		// 		      		if($value->opt_id=='5'){
// 	$arr.='<td><label>Custom</label><input type="checkbox" name="int_custom[]" class="form-control int_custom" value="1" >
// </td>';
// }
		      if($value->opt_id=='5' || $value->opt_id=='6'){
		      		$get_opt_value11='';
		      			foreach (explode(', ',option(2)->opt_value) as $getvalue) {
		      				$get_opt_value11.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>Size</label><select name="intsize[]" class="form-control" >
		      		<option value="">Select Size</option>
		      		'.$get_opt_value11.'
		      		</select></div>';
		      	}
		      	if($value->opt_id=='9'){
		      		$get_opt_value11='';
		      			foreach (explode(', ',option(10)->opt_value) as $getvalue) {
		      				$get_opt_value11.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>Diffusers</label><select name="intsize[]" class="form-control" >
		      		<option value="">Select Diffusers</option>
		      		'.$get_opt_value11.'
		      		</select></div>';
		      	}
                $arr.='<div class="col-sm-3 col-md-3"><label>Selling Price OMR</label>		      		
		      		<input type="text" name="int_selleing_price[]" class="form-control int_selleing_price" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>Available Quantity</label>		<input type="text" name="int_available_qty[]"  value="1" onkeypress="return available(event);"  class="form-control int_available_qty" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>M. Stock Level</label>	<select data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock">
  <option value="1" >Yes</option>
  <option value="2">No</option>
</select></div>';
$arr.='<div class="col-sm-3 col-md-3"><label>Product Condition</label>	<select name="int_condition[]" class="form-control int_condition ">
  <option value="0" selected="">New</option>
  <option value="1">Used</option>
<option value="2">Refurbished</option>
</select></div>';

		      		
		      	}else if($value->opt_id=='1' && in_array(1, $get_group) && count($get_group)=='1'){
		      		//print_r($get_group);


		      		$get_opt_value1='';
		      			foreach (explode(', ', color()->opt_value) as $getvalue) {
		      				$get_opt_value1.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>'.color()->opt_name.' </label>		      		
		      		<select name="color[]" class="form-control  option_grop" >
		      		<option value="">Select '.color()->opt_name.'</option>
		      		'.$get_opt_value1.'
		      		</select></div>';
                $arr.='<div class="col-sm-3 col-md-3"><label>Selling Price OMR</label>		      		
		      		<input type="text" name="int_selleing_price[]" class="form-control int_selleing_price" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>Available Quantity</label>		<input type="text" name="int_available_qty[]"  value="1" onkeypress="return available(event);"  class="form-control int_available_qty" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>M. Stock Level</label>	<select data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock">
  <option value="1" >Yes</option>
  <option value="2">No</option>
</select></div>';
$arr.='<div class="col-sm-3 col-md-3"><label>Product Condition</label>	<select name="int_condition[]" class="form-control int_condition ">
  <option value="0" selected="">New</option>
  <option value="1">Used</option>
<option value="2">Refurbished</option>
</select></div>';

		      		
		      	}else if($value->opt_id=='1' && in_array(1, $get_group) && in_array(3, $get_group) ){
		      		
		      		$get_opt_value1='';
		      			foreach (explode(', ', color()->opt_value) as $getvalue) {
		      				$get_opt_value1.='<option value="'.$getvalue.'">'.$getvalue.'</option>';
		      			}
		      		$arr.='<div class="col-sm-3 col-md-3"><label>'.color()->opt_name.' </label>		      		
		      		<select name="color[]" class="form-control  option_grop" >
		      		<option value="">Select '.color()->opt_name.'</option>
		      		'.$get_opt_value1.'
		      		</select></div>';
                $arr.='<div class="col-sm-3 col-md-3"><label>Selling Price OMR</label>		      		
		      		<input type="text" name="int_selleing_price[]" class="form-control int_selleing_price" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>Available Quantity</label>		<input type="text" name="int_available_qty[]"  value="1" onkeypress="return available(event);"  class="form-control int_available_qty" ></div>';
		      	$arr.='<div class="col-sm-3 col-md-3"><label>M. Stock Level</label>	<select data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock">
  <option value="1" >Yes</option>
  <option value="2">No</option>
</select></div>';
$arr.='<div class="col-sm-3 col-md-3"><label>Product Condition</label>	<select name="int_condition[]" class="form-control int_condition ">
  <option value="0" selected="">New</option>
  <option value="1">Used</option>
<option value="2">Refurbished</option>
</select></div>';

		      		
		      	}
		      	
		      }
		      	
		      }else{$arr='';}

	      if($option_result){
			  $result1['response'] ='success';
			  $result1['option'] =$arr;
	      }else{ $result1['response'] ='Failed';}
	      echo json_encode($result1);
     }


      public function Inventory_Product_Save()
     {
	     $PID=$this->input->post('p_id');
	     $vnd_id=$this->vendor->vnd_id;	  
	      if(!empty($this->input->post('option_grop_add'))){ 
         $option_grop_add=implode(', ',$this->input->post('option_grop_add'));
          }else{$option_grop_add='';}
           if(!empty($this->input->post('size'))){
	    	$int_size=$this->input->post('size');
	    }else{$int_size='';}
	    if(!empty($this->input->post('color'))){
	    	$int_color=$this->input->post('color');
	    }else{$int_color='';}
	     if(!empty($this->input->post('int_custom'))){
	    	$int_custom=$this->input->post('int_custom');
	    }else{$int_custom='';}
	     if(!empty($this->input->post('intsize'))){
	    	$intsize=$this->input->post('intsize');
	    }else{$intsize='';}
     if(!empty($this->input->post('option_grop'))){
         $option_grop=implode(', ',$this->input->post('option_grop')).', ';  
          }else{ $option_grop='';}
          $get_option_grop=$option_grop.''.implode(', ',$int_size).', '.implode(', ',$int_color);  
         $data1= array('option_grop_add' =>$option_grop_add,'option_grop' =>$get_option_grop); 
	     $result_link = $this->Profile_Model->update('p_id',$PID,$data1,$this->table_product_link);  
	   $inventory= $this->Product_Model->single_product('int_pid',$PID,$this->table_inventory); 	    
	   if(empty($inventory->int_pid)){
	   	 $data=array();
	   $int_selleing_price_array=$this->input->post('int_selleing_price'); 
	   foreach ($int_selleing_price_array as $key => $value) {	   
	     $data[]= array('int_pid' =>$PID,
	     	        'int_vnd_id' =>vendor($PID),
	                'int_size' =>$int_size[$key],
	                 'size' =>$intsize[$key],
	                'int_color' =>$int_color[$key],
	                 'int_custom' =>$int_custom[$key],
	                'int_selleing_price' =>$value,
	                'int_available_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_total_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_min_purchase_qty'=>'1',
	                'int_stock' =>$this->input->post('int_stock')[$key],
	                'int_condition' =>$this->input->post('int_condition')[$key],
	                'int_created' =>date('Y-m-d H:i:s')
	               ); 
	           }
	      $result = $this->Product_Model->inventry_save($data,$this->table_inventory);
	   
	      }else{ 
	      $delete = $this->Product_Model->delete('int_pid',$PID,$this->table_inventory);
 $data=array();
	   $int_selleing_price_array=$this->input->post('int_selleing_price'); 
	   foreach ($int_selleing_price_array as $key => $value) {	   
	     $data[]= array('int_pid' =>$PID,
	     	        'int_vnd_id' =>vendor($PID),
	                'int_size' =>$int_size[$key],
	                 'size' =>$intsize[$key],
	                'int_color' =>$int_color[$key],
	                'int_custom' =>$int_custom[$key],
	                'int_selleing_price' =>$value,
	                'int_available_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_total_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_min_purchase_qty'=>'1',
	                'int_stock' =>$this->input->post('int_stock')[$key],
	                'int_condition' =>$this->input->post('int_condition')[$key],
	                'int_created' =>date('Y-m-d H:i:s')
	               ); 
	           }
	      $result = $this->Product_Model->inventry_save($data,$this->table_inventory);
	   }

	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }


    public function Inventory_Product_update()
     {
	     $PID=$this->input->post('p_id');
	     $vnd_id=$this->vendor->vnd_id; 
	      if(!empty($this->input->post('option_grop_add'))){
         $option_grop_add=implode(', ',$this->input->post('option_grop_add'));
          }else{$option_grop_add='';}
          if(!empty($this->input->post('size'))){
	    	$int_size=$this->input->post('size');
	    }else{$int_size='';}
	      if(!empty($this->input->post('color'))){
	    	$int_color=$this->input->post('color');
	    }else{$int_color='';}
	      if(!empty($this->input->post('int_custom'))){
	    	$int_custom=$this->input->post('int_custom');
	    }else{$int_custom='';}
	     if(!empty($this->input->post('intsize'))){
	    	$intsize=$this->input->post('intsize');
	    }else{$intsize='';}
  if(!empty($this->input->post('option_grop'))){
         $option_grop=implode(', ',$this->input->post('option_grop')).', '; 
         }else{$option_grop='';}   
         $get_option_grop=$option_grop.''.implode(', ',$int_size).', '.implode(', ',$int_color);  
         $data1= array('option_grop_add' =>$option_grop_add,'option_grop' =>$get_option_grop); 
	     $result_link= $this->Profile_Model->update('p_id',$PID,$data1,$this->table_product_link); 
	     $inventory= $this->Product_Model->single_product('int_pid',$PID,$this->table_inventory); 

	     if(!empty($inventory->int_pid)){
	     $delete = $this->Product_Model->delete('int_pid',$PID,$this->table_inventory);
	   	  $data=array();
	   $int_selleing_price_array=$this->input->post('int_selleing_price'); 
	   foreach ($int_selleing_price_array as $key => $value) {	   
	     $data[]= array('int_pid' =>$PID,
	     	        'int_vnd_id' =>vendor($PID),
	                 'int_size' =>$int_size[$key],
	                  'size' =>$intsize[$key],
	                  'int_custom' =>$int_custom[$key],
	                 'int_color' =>$int_color[$key],
	                'int_selleing_price' =>$value,
	                'int_available_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_total_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_min_purchase_qty'=>'1',
	                'int_stock' =>$this->input->post('int_stock')[$key],
	                'int_condition' =>$this->input->post('int_condition')[$key],
	                'int_created' =>date('Y-m-d H:i:s')
	               ); 
	           }
	      $result = $this->Product_Model->inventry_save($data,$this->table_inventory);
	    }else{
	     	   $data=array();
	   $int_selleing_price_array=$this->input->post('int_selleing_price'); 
	   foreach ($int_selleing_price_array as $key => $value) {	   
	     $data[]= array('int_pid' =>$PID,
	     	        'int_vnd_id' =>vendor($PID),
	                'int_size' =>$int_size[$key],
	                'size' =>$intsize[$key],
	                 'int_color' =>$int_color[$key],
	                 'int_custom' =>$int_custom[$key],
	                'int_selleing_price' =>$value,
	                'int_available_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_total_qty' =>$this->input->post('int_available_qty')[$key],
	                'int_min_purchase_qty'=>'1',
	                'int_stock' =>$this->input->post('int_stock')[$key],
	                'int_condition' =>$this->input->post('int_condition')[$key],
	                'int_created' =>date('Y-m-d H:i:s')
	               ); 
	           }
	      $result = $this->Product_Model->inventry_save($data,$this->table_inventory);
	     }
	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }

    public function warranty_product_Save()
     {
	      $PID=$this->input->post('p_id');	    
          $p_warranty_policy=implode(', ',$this->input->post('p_warranty_policy'));

	     $data= array('p_warranty_policy' =>$p_warranty_policy); 
	      $result = $this->Product_Model->update('p_id',$PID,$data,$this->table_product_link);
	      if($result){
	      	echo'success';
	      }else{ echo'Failed';}
     }

    public function return_product_Save()
     {
	      $PID=$this->input->post('p_id');
          $p_return_policy=implode(', ',$this->input->post('p_return_policy'));		  
	     $data= array('p_return_policy' =>$p_return_policy); 
	      $result = $this->Product_Model->update('p_id',$PID,$data,$this->table_product_link);
	      if($result){
	      	echo'success';
	      }else{ echo'Failed';}
     }


    public function Special_Price_Product_Save()
     {
	     $PID=$this->input->post('p_id');
	   $special= $this->Product_Model->single_product('sp_pid',$PID,$this->table_special_price); 
	     if(!empty($special->sp_pid)){
	      $data= array( 'sp_special_price' =>$this->input->post('special_price'),
	                   'sp_start_date' =>$this->input->post('start_date'),
	                   'sp_end_date' =>$this->input->post('end_date')
	               ); 
	      $result = $this->Product_Model->update('sp_pid',$PID,$data,$this->table_special_price);
	  }else{	  
	     $vnd_id=$this->vendor->vnd_id;	            
	     $data= array('sp_pid' =>$PID,
	     	           'sp_vnd_id' =>$vnd_id,
	                   'sp_special_price' =>$this->input->post('special_price'),
	                   'sp_start_date' =>$this->input->post('start_date'),
	                   'sp_end_date' =>$this->input->post('end_date'),
	                   'sp_status' =>'1',
	                   'sp_created' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->save($data,$this->table_special_price);
           }
	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }

     public function Special_Price_Product_update()
     {
	     $PID=$this->input->post('p_id');
	     $vnd_id=$this->vendor->vnd_id;	           
	     $special= $this->Product_Model->single_product('sp_pid',$PID,$this->table_special_price); 
	     if(!empty($special->sp_pid)){	         
	     $data= array( 'sp_special_price' =>$this->input->post('special_price'),
	                   'sp_start_date' =>$this->input->post('start_date'),
	                   'sp_end_date' =>$this->input->post('end_date'),
	                   'sp_updated' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->update('sp_pid',$PID,$data,$this->table_special_price);
	      }else{ $data= array('sp_pid' =>$PID,
	     	           'sp_vnd_id' =>$vnd_id,
	                   'sp_special_price' =>$this->input->post('special_price'),
	                   'sp_start_date' =>$this->input->post('start_date'),
	                   'sp_end_date' =>$this->input->post('end_date'),
	                   'sp_status' =>'1',
	                   'sp_created' =>date('Y-m-d H:i:s')
	         ); 
	      $result = $this->Product_Model->save($data,$this->table_special_price);}

	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }

     public function Discount_Product_Save()
     {
	     $PID=$this->input->post('p_id');  
	     $vnd_id=$this->vendor->vnd_id;	
	     $discount= $this->Product_Model->single_product('vd_pid',$PID,$this->table_discount);
	     if(!empty($discount->vd_pid)){	               
	     $data= array( 'vd_min_purchase_qty' =>$this->input->post('min_purchase_qty'),
	                   'vd_discount' =>$this->input->post('discount'),
	                   'vd_updated' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->update('vd_pid',$PID,$data,$this->table_discount);
          }else{               
	     $data= array('vd_pid' =>$PID,
	                   'vd_vnd_id' =>$vnd_id,
	                   'vd_min_purchase_qty' =>$this->input->post('min_purchase_qty'),
	                   'vd_discount' =>$this->input->post('discount'),
	                   'vd_status' =>'1',
	                   'vd_created' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->save($data,$this->table_discount);

	  }

	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }

     public function Discount_Product_update()
     {
	   $PID=$this->input->post('p_id'); 
	   $vnd_id=$this->vendor->vnd_id;	           
	   $discount= $this->Product_Model->single_product('vd_pid',$PID,$this->table_discount);
	     if(!empty($discount->vd_pid)){	               
	     $data= array( 'vd_min_purchase_qty' =>$this->input->post('min_purchase_qty'),
	                   'vd_discount' =>$this->input->post('discount'),
	                   'vd_updated' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->update('vd_pid',$PID,$data,$this->table_discount);
          }else{
          	 $data= array('vd_pid' =>$PID,
	                   'vd_vnd_id' =>$vnd_id,
	                   'vd_min_purchase_qty' =>$this->input->post('min_purchase_qty'),
	                   'vd_discount' =>$this->input->post('discount'),
	                   'vd_status' =>'1',
	                   'vd_created' =>date('Y-m-d H:i:s')
	               ); 
	      $result = $this->Product_Model->save($data,$this->table_discount);
          }
	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	     
     }

     public function Image_Product_Save()
     {
 $PID=$this->input->post('p_id');
        $product_img_check= $this->Product_Model->single_product('pg_pid',$PID,$this->table_product_img); 
	   if(empty($product_img_check->pg_pid)){  
	     $PID=$this->input->post('p_id');
	     $child_id=child_id($PID);
	     $cate_name=slug(category_name(cate(scate($child_id)))); 
	     $sub_cate_name=slug(sub_category_name(scate($child_id)));
	     $child_name=slug(child_category_name($child_id)); 
	     $directory = FCPATH . 'uploads/';
	     $directory2 = FCPATH . 'uploads/'. $cate_name;
	     $directory3 = FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name;
	      $directory4 = FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'.$child_name;
		 if (is_dir($directory)) { @mkdir($directory.'/'. $cate_name, 0777, TRUE);}
		 if (is_dir($directory2)) { @mkdir($directory2.'/'. $sub_cate_name, 0777, TRUE);}
		 if (is_dir($directory3)) { @mkdir($directory3.'/'. $child_name, 0777, TRUE);}
		 if (is_dir($directory4)) { @mkdir($directory4.'/zoom', 0777, TRUE);}
	     $path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
	     $new_path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name.'/zoom';
	     $main_image=$this->Product_Model->main_images_upload($path);
	     $data = array();
		     // Count total files
	       $countfiles = count($_FILES['images']['name']);
	 
	      // Looping all files
	      for($i=0;$i<$countfiles;$i++){
	 
	        if(!empty($_FILES['images']['name'][$i])){
	 
	          // Define new $_FILES array - $_FILES['file']
	          $_FILES['new_image']['name'] = $_FILES['images']['name'][$i];
	          $_FILES['new_image']['type'] = $_FILES['images']['type'][$i];
	          $_FILES['new_image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
	          $_FILES['new_image']['error'] = $_FILES['images']['error'][$i];
	          $_FILES['new_image']['size'] = $_FILES['images']['size'][$i];

	          // Set preference
	          $config['upload_path'] = $path; 
	          $config['allowed_types'] = 'jpg|jpeg|png|gif';
	          $config['max_size'] = '20000'; // max_size in kb
	          $config['file_name'] =strtotime(date('Y-m-d H:i:s'));
	 
	          //Load upload library
	          $this->load->library('upload',$config); 
	 
	          // File upload
	          if($this->upload->do_upload('new_image')){
	            // Get data about the file
	            $uploadData = $this->upload->data();
	            $filename = $uploadData['file_name'];
	             $this->Product_Model->resize_image_large($filename, '800', '1080', $path, $new_path);
	              //$this->Product_Model->watermark_image1($filename,$path);

	            // Initialize array
	            $data['filenames'][] = $filename;
	          }
	        }
	 
	      }
         $get_images=implode(',',$data['filenames']); 
	     $data_img= array('pg_pid' =>$PID,
	     	               'pg_img' =>$main_image,
	                   'pg_image' =>$get_images
	               ); 
	      $result = $this->Product_Model->save($data_img,$this->table_product_img);

	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}

	        }else{ echo 'Failed';}
	     
     }

     public function Image_Product_update()
     {


	     $PID=$this->input->post('p_id');
	      if(!empty($_FILES['images']['name'])){
	     $child_id=child_id($PID);
	     $cate_name=slug(category_name(cate(scate($child_id)))); 
	     $sub_cate_name=slug(sub_category_name(scate($child_id)));
	     $child_name=slug(child_category_name($child_id)); 
	     $directory = FCPATH . 'uploads/';
	     $directory2 = FCPATH . 'uploads/'. $cate_name;
	     $directory3 = FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name;
	     $directory4 = FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'.$child_name;
		 if (is_dir($directory)) { @mkdir($directory.'/'. $cate_name, 0777, TRUE);}
		 if (is_dir($directory2)) { @mkdir($directory2.'/'. $sub_cate_name, 0777, TRUE);}
		 if (is_dir($directory3)) { @mkdir($directory3.'/'. $child_name, 0777, TRUE);}
		 if (is_dir($directory4)) { @mkdir($directory4.'/zoom', 0777, TRUE);}
	     $path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
	     $new_path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name.'/zoom';
	     if(!empty($_FILES['img']['name'])){
	     $main_image=$this->Product_Model->main_images_upload($path);
     	 }else{
     	 	$main_image=$this->input->post('prev_img');
     	 }
	     $data = array();
		     // Count total files
	       $countfiles = count($_FILES['images']['name']);
	 
	      // Looping all files
	      for($i=0;$i<$countfiles;$i++){
	 
	        if(!empty($_FILES['images']['name'][$i])){
	 
	          // Define new $_FILES array - $_FILES['file']
	          $_FILES['new_image']['name'] = $_FILES['images']['name'][$i];
	          $_FILES['new_image']['type'] = $_FILES['images']['type'][$i];
	          $_FILES['new_image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
	          $_FILES['new_image']['error'] = $_FILES['images']['error'][$i];
	          $_FILES['new_image']['size'] = $_FILES['images']['size'][$i];

	          // Set preference
	          $config['upload_path'] = $path; 
	          $config['allowed_types'] = 'jpg|jpeg|png|gif';
	          $config['max_size'] = '20000'; // max_size in kb
	          $config['file_name'] =strtotime(date('Y-m-d H:i:s'));
	 
	          //Load upload library
	          $this->load->library('upload',$config); 
	 
	          // File upload
	          if($this->upload->do_upload('new_image')){
	            // Get data about the file
	            $uploadData = $this->upload->data();
	            $filename = $uploadData['file_name'];
	             $this->Product_Model->resize_image_large($filename, '800', '1080', $path, $new_path);
	              //$this->Product_Model->watermark_image1($filename,$path);

	            // Initialize array
	            $data['filenames'][] = $filename;
	          }
	        }
	 
	      }
         $get_images=implode(',',$data['filenames']); 
        $productimg1= $this->Product_Model->single_product('pg_pid',$PID,$this->table_product_img);
	     if(!empty($productimg1->pg_pid)){	  
	   	if(!empty($productimg1->pg_image)){	
	   	if(!empty($get_images)){
	     $get_image_list=$productimg1->pg_image.",".$get_images;
	     }else{$get_image_list=$productimg1->pg_image;}   		
	     //
	   		//$get_image_list=$productimg1->pg_image.",".$get_images;
	       }else{ $get_image_list=$get_images;
	     }
	     $data_img= array('pg_image' =>$get_image_list,'pg_img' =>$main_image
	               ); 
	      $result = $this->Product_Model->update('pg_pid',$PID,$data_img,$this->table_product_img);
	     }else{
	      $data_img= array('pg_pid' =>$PID,
	      	'pg_img' =>$main_image,
	                   'pg_image' =>$get_images
	               ); 
	      $result = $this->Product_Model->save($data_img,$this->table_product_img);
           }
	      if($result){
			 echo 'success';			
	      }else{  echo 'Failed';}
	  }else{ echo 'success';		}
	     
     }
	  

    public function product_status() {  
       $p_id=$this->uri->segment(3);
       $action=$this->uri->segment(4);
       $data=array(
		'p_status'=>$action,
		'p_updated'=>date('Y-m-d H:i:s')
			 );
		$result = $this->Product_Model->update($this->fld_p_id,$p_id,$data,$this->table_product);
	 if($result){
			   $this->session->set_flashdata('msg',array('message' => 'Product Status Data has been successfully change.','class' => 'success','type'=>'Success!','icon'=>'thumbs-up'));
			   redirect('product'); 
			}else{
			   $this->session->set_flashdata('msg',array('message' => "Unable to Change Product .Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
			   redirect('product');  
			} 			
		  
         
	}

	 public function ProductView()
    {
    	$pid = $this->input->post('pid');		
    	$result['product'] = $this->Product_Model->get_single_product($pid);
    	$product_img = $this->Product_Model->single_product('pg_pid',$pid,$this->table_product_img);
    	if($product_img){
    	$image=explode(',',$product_img->pg_image);
    	$path = base_url('uploads/') .slug($result['product']->cate_name).'/'.slug($result['product']->scate_name).'/'.slug($result['product']->child_name).'/';
    	$result['product_img']= $path.$image[0];  
       }else{
       	$path = base_url('uploads/default-image.png') ;
    	$result['product_img']= $path; }
    	echo json_encode($result);
    }

    function product_edit()
	   {
	   	$content['spage']='1';	
	   	$pid=decode($this->uri->segment(3)); 
	    $content['unit'] = $this->Product_Model->unit_list($this->fld_ut_id,'ut_status',$this->table_unit);
	    $content['brand'] = $this->Product_Model->brd_list($this->vendor->vnd_id,$this->table_brand);
		$content['option'] = $this->Product_Model->option_list($this->vendor->vnd_id,$this->table_option);
		$content['product'] = $this->Product_Model->single_product('p_id',$pid,$this->table_product);
		$content['product_link']= $this->Product_Model->single_product('p_id',$pid,$this->table_product_link);
		$content['inventory']= $this->Product_Model->get_inventry('int_pid',$pid,$this->table_inventory);
		$content['special_price']= $this->Product_Model->single_product('sp_pid',$pid,$this->table_special_price);
		$content['discount']= $this->Product_Model->single_product('vd_pid',$pid,$this->table_discount);
		$content['product_img']= $this->Product_Model->single_product('pg_pid',$pid,$this->table_product_img);
		 $content['policy']=  $this->Product_Model->policy_list($this->table_policy);
	     $content['subview']="product_edit";
		 $this->load->view('layout', $content);
     }	

      function import()
	  {

	   	$content['spage']='3';		  
	     $content['subview']="product_import";
		 $this->load->view('layout', $content);
     }

     public function export_category()
     { 
		   // file name 
		   $filename = 'Product_Category_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   $select='cate_id,cate_name';
		   $category= $this->Product_Model->cate_export_list($select,'cate_name','cate_remove','cate_status',$this->table_category);
		 		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Category Id","Category Name"); 
		   fputcsv($file, $header);
		   foreach ($category as $key=>$line){ 
		   	  $narray=array($line->cate_id,$line->cate_name);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

      public function export_sub_category()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Product_Sub_Category_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		    $select='scate_id,scate_name,cate_id';
	        $sub_category = $this->Product_Model->scate_export_list($select,$vnd_id,'scate_name','scate_remove','scate_status',$this->table_sub_category);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Sub Category Id","Sub Category Name","Category Name"); 
		   fputcsv($file, $header);
		   foreach ($sub_category as $key=>$line){ 
		   	  $narray=array($line->scate_id,$line->scate_name,category_name($line->cate_id));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

   public function export_child_category()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Product_Child_Category_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		    $select='child_id,cate_id,scate_id,child_name';
	        $child_category = $this->Product_Model->scate_export_list($select,$vnd_id,'child_name','child_remove','child_status',$this->table_child_category);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Child Category Id","Child Category Name","Sub Category Name","Category Name"); 
		   fputcsv($file, $header);
		   foreach ($child_category as $key=>$line){ 
		   	  $narray=array($line->scate_id,$line->child_name,sub_category_name($line->scate_id),category_name($line->cate_id));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

    public function export_brand()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Product_Brand_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		    $select='brd_id,brd_name';
	        $brand = $this->Product_Model->scate_export_list($select,$vnd_id,'brd_name','brd_remove','brd_status',$this->table_brand);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Brand Id","Brand Name"); 
		   fputcsv($file, $header);
		   foreach ($brand as $key=>$line){ 
		   	  $narray=array($line->brd_id,$line->brd_name);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

    public function export_products()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Products_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	        $Product = $this->Product_Model->Product_export_list($vnd_id,$this->table_product);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("No","Reference No.","Product Name","Category","Sub Category","Child Category","Model","Brand","Selling Price","Dimensions Unit","Length","Width","Height","Weight","Ean/upc Code","Short Decsription","Decsription","Updated","Created"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($Product as $key=>$line){ 
		    	$weight=$line->p_weight." ".unit($line->p_weigth_unit);
		    	$dimensions=dimensions($line->p_dimensions);
		    	$updated=date('d-M-Y h:i A',strtotime($line->p_updated));
		    	$created=date('d-M-Y h:i A',strtotime($line->p_created));
		   	  $narray=array($cnt,$line->p_reference_no,$line->p_name,category_name($line->p_cate),sub_category_name($line->p_scate),child_category_name($line->p_child),$line->p_model,brand($line->p_brand),$line->p_selling_price,$dimensions,$line->p_lenght,$line->p_width,$line->p_height,$weight,$line->p_barcode,$line->p_short_description,$line->p_description,$updated,$created);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }


    public function export_inventory()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Products_Inventory_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	        $inventory = $this->Product_Model->export_list('int_id','int_vnd_id',$vnd_id,$this->table_inventory);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("No","Product Name","Cost Price","Selling Price","Available Quantity","Minimum Purchase Quantity","Maintain Stock Levels"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($inventory as $key=>$line){ 		    	
		    	$product=product($line->int_pid);
		    	if($line->int_stock=='1'){$stock='Yes';}else{$stock='No';}	    	
		   	  $narray=array($cnt,$product,$line->int_cost_price,$line->int_selleing_price,$line->int_available_qty,$line->int_min_purchase_qty,$stock);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

     public function export_special()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Products_Special_Price_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	        $special = $this->Product_Model->export_list('sp_id','sp_vnd_id',$vnd_id,$this->table_special_price);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("No","Product Name","Special Price","Start Date","End Date","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($special as $key=>$line){ 		    	
		    	$product=product($line->sp_pid);
		    	if($line->sp_status=='1'){$status='Active';}else{$status='In-Active';}
		    	$start_date=date('d-M-Y',strtotime($line->sp_start_date));
		    	$end_date=date('d-M-Y',strtotime($line->sp_end_date));    	
		   	  $narray=array($cnt,$product,$line->sp_special_price,$start_date,$end_date,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

      public function export_discount()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Products_Discount_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	        $discount = $this->Product_Model->export_list('vd_id','vd_vnd_id',$vnd_id,$this->table_discount);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("No","Product Name","Minimum Purchase Quantity","Discount (%)","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($discount as $key=>$line){ 		    	
		    	$product=product($line->vd_pid);
		    	if($line->vd_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($cnt,$product,$line->vd_min_purchase_qty,$line->vd_discount,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

     public function export_country()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Countries_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	        $country = $this->Product_Model->get_location_list('cnt_id',$this->table_country);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Country Id","Country Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($country as $key=>$line){ 		    	
		    	   	if($line->cnt_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->cnt_id,$line->cnt_name,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

    public function export_state()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'States_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	       $States = $this->Product_Model->get_location_list('st_id',$this->table_state);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("State Id","State Name","Country Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($States as $key=>$line){ 	
		     $country=country($line->cnt_id);	    	
		     if($line->st_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->st_id,$line->st_name,$country,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }


    public function export_city()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Cities_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	       $Cities = $this->Product_Model->get_location_list('ct_id',$this->table_city);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("City Id","City Name","State Name","Country Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($Cities as $key=>$line){ 	
		     $country=country($line->cnt_id);	
		     $state=state($line->st_id);	    	
		     if($line->ct_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->ct_id,$line->ct_name,$state,$country,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

    public function export_zipcode()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Cities_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	       $zipcodes = $this->Product_Model->get_location_list('zc_id',$this->table_zipcode);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("Zip Code  Id","Zip Code","City Name","State Name","Country Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($zipcodes as $key=>$line){ 	
		     $country=country($line->cnt_id);	
		     $state=state($line->st_id);	
		     $city=city($line->ct_id);	    	
		     if($line->zc_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->zc_id,$line->zc_zipcode,$city,$state,$country,$status);
		   	  $cnt++;
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
    }

    public function export_dimension()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Dimension_Unit_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	       $unit=$this->Product_Model->get_location_list('ut_id',$this->table_unit);
		   // file creation 
		   $file=fopen('php://output', 'w');		 
		   $header = array("Dimension Id","Dimension Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($unit as $key=>$line){
		   if(empty($line->ut_weight_name)){ 			   	    	
		     if($line->ut_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->ut_id,$line->ut_dime_name,$status);
		   	  $cnt++;
            fputcsv($file, $narray);	
            }	   
		   }
		   fclose($file); 
		   exit; 
    }

   public function export_weight()
     { 
		   $vnd_id=$this->vendor->vnd_id;	  
		   // file name 
		   $filename = 'Weight_Unit_'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 		 
	       $unit=$this->Product_Model->get_location_list('ut_id',$this->table_unit);
		   // file creation 
		   $file=fopen('php://output', 'w');		 
		   $header = array("Weight Id","Weight Name","Status"); 
		   fputcsv($file, $header);
		     $cnt=1;
		   foreach ($unit as $key=>$line){
		   if(empty($line->ut_dime_name)){ 			   	    	
		     if($line->ut_status=='1'){$status='Active';}else{$status='In-Active';}
		   	  $narray=array($line->ut_id,$line->ut_weight_name,$status);
		   	  $cnt++;
            fputcsv($file, $narray);	
            }	   
		   }
		   fclose($file); 
		   exit; 
    }

     function import_products() {   
     	$vnd_id=$this->vendor->vnd_id;	 
	  $this->load->library('csvimport'); 
	  $type=$this->input->post('type');

        $data['error'] = '';    //initialize image upload error array to empty
        $config['upload_path'] = './uploads/csv/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '200000';
 
        $this->load->library('upload', $config);
 
 
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();          
           	redirect('product/import');
        } else {
        if($type=="1"){

            $file_data = $this->upload->data();
            $file_path =  FCPATH .'uploads/csv/'.$file_data['file_name'];
 
            if (!empty($this->csvimport->get_array($file_path))) {
                $csv_array = $this->csvimport->get_array($file_path);               
            foreach ($csv_array as $key=>$row) {
            $cate = $this->Product_Model->check('cate_name',$row['Category'],$this->table_category);
            $scate = $this->Product_Model->check('scate_name',$row['Sub_Category'],$this->table_sub_category);
            $child = $this->Product_Model->check('child_name',$row['Child_Category'],$this->table_child_category);
            $brand =$this->Product_Model->check('brd_name',$row['Brand'],$this->table_brand);
            $dimen_unit = $this->Product_Model->check('ut_dime_name',$row['Dimensions'],$this->table_unit);
            $weight_unit = $this->Product_Model->check('ut_weight_name',$row['Weight_Unit'],$this->table_unit);
            $Reference=strtotime(date('Y-m-d H:i:s')).$key;
            $check = $this->Product_Model->check('p_name',$row['Product_Title'],$this->table_product);
            $Referencecheck = $this->Product_Model->check('p_reference_no',$Reference,$this->table_product);
             if(isset($cate) && isset($scate) && isset($child) && !empty($child->child_id) && empty($check->p_name) && empty($Referencecheck->p_reference_no)){
                    $insert_data = array(
                        'p_vnd_id'=>$vnd_id,                       
                        'p_cate' =>$cate->cate_id,
						'p_scate' =>$scate->scate_id, 
						'p_child' =>$child->child_id, 
						'p_reference_no' =>$Reference, 
						'p_name' =>$row['Product_Title'],
						'p_model' =>$row['Model'],
						'p_brand' =>$brand->brd_id,
						'p_selling_price' =>$row['Selling_Price'],
						'p_dimensions' =>$dimen_unit->ut_id,
						'p_lenght' =>$row['Length'],
						'p_width' =>$row['Width'],
						'p_height' =>$row['Height'],
						'p_weigth_unit' =>$weight_unit->ut_id,
						'p_weight' =>$row['Weight'],
						'p_barcode' =>$row['Barcode'],
						'p_short_description' =>$row['Short_Description'],
						'p_description' =>$row['Long_description'],						 
						'p_status' => '1', 
						'p_approval_status' => '1', 						
						'p_created' => date('Y-m-d H:i:s') 
                    );
                    
                    
                   $insert_id=$this->Product_Model->save($insert_data,$this->table_product); $link_data = array(
                        'p_id'=>$insert_id,
						'p_child' =>$child->child_id, 
						'p_tag' =>$row['Product_Title']
                    ); 
                   $this->Product_Model->save($link_data,$this->table_product_link);
                    }                
                }
           $this->session->set_flashdata('msg',array('message' => 'Csv General Product Data Imported Succesfully.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			redirect('product/import');
              
              
            } else 
              	$this->session->set_flashdata('msg',array('message' => 'Unable to Delete.Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('product/import');
            }else if($type=="2"){

            $file_data = $this->upload->data();
            $file_path =  FCPATH .'uploads/csv/'.$file_data['file_name'];
 
            if (!empty($this->csvimport->get_array($file_path))) {
                $csv_array = $this->csvimport->get_array($file_path);               
            foreach ($csv_array as $row) {
            $product = $this->Product_Model->check('p_name',$row['Product_Title'],$this->table_product);   
             $check = $this->Product_Model->check('int_pid',$product->p_id,$this->table_inventory);
          if(!empty($product->p_id) && empty($check->int_pid)){           
                    $insert_data = array(
                        'int_pid'=>$product->p_id,                       
                        'int_vnd_id' =>$vnd_id,
						'int_cost_price' =>$row['Cost_Price'], 
						'int_selleing_price' =>$product->p_selling_price, 
						'int_available_qty' =>$row['Availavable_Quantity'], 
						'int_min_purchase_qty' =>$row['Min_Purchase_Qty'],
						'int_stock' => '1', 						
						'int_created' => date('Y-m-d H:i:s') 
                    );
                    
                    $this->Product_Model->save($insert_data,$this->table_inventory); 
                    }                
                }
           $this->session->set_flashdata('msg',array('message' => 'Csv Inventory Product Data Imported Succesfully.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			redirect('product/import');
              
              
            } else 
              	$this->session->set_flashdata('msg',array('message' => 'Unable to Delete.Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('product/import');
            }else if($type=="3"){

            $file_data = $this->upload->data();
            $file_path =  FCPATH .'uploads/csv/'.$file_data['file_name'];
 
            if (!empty($this->csvimport->get_array($file_path))) {
                $csv_array = $this->csvimport->get_array($file_path);               
            foreach ($csv_array as $row) {
            $product = $this->Product_Model->check('p_name',$row['Product_Title'],$this->table_product);            
             $check = $this->Product_Model->check('sp_pid',$product->p_id,$this->table_special_price);               
             if(!empty($product->p_id) && empty($check->sp_pid)){
                    $insert_data = array(
                        'sp_pid'=>$product->p_id,                       
                        'sp_vnd_id' =>$vnd_id,
						'sp_special_price' =>$row['Special_Price'], 
						'sp_start_date' =>$row['Price_Start_Date'], 
						'sp_end_date' =>$row['Price_End_Date'], 						
						'sp_status' => '1', 						
						'sp_created' => date('Y-m-d H:i:s') 
                    );
                    
                    $this->Product_Model->save($insert_data,$this->table_special_price); 
                    }                
                }
           $this->session->set_flashdata('msg',array('message' => 'Csv Special Price Product Data Imported Succesfully.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			redirect('product/import');
              
              
            } else 
              	$this->session->set_flashdata('msg',array('message' => 'Unable to Delete.Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('product/import');
            }else if($type=="4"){

            $file_data = $this->upload->data();
            $file_path =  FCPATH .'uploads/csv/'.$file_data['file_name'];
 
            if (!empty($this->csvimport->get_array($file_path))) {
                $csv_array = $this->csvimport->get_array($file_path);               
            foreach ($csv_array as $row) {
            $product = $this->Product_Model->check('p_name',$row['Product_Title'],$this->table_product);            
            $check = $this->Product_Model->check('vd_pid',$product->p_id,$this->table_discount);            
             if(!empty($product->p_id) && empty($check->vd_pid)){
                    $insert_data = array(
                        'vd_pid'=>$product->p_id,                       
                        'vd_vnd_id' =>$vnd_id,
						'vd_min_purchase_qty' =>$row['Min_Purchase_Quantity'],
						'vd_discount' =>$row['Discount'], 						
						'vd_status' => '1', 						
						'vd_created' => date('Y-m-d H:i:s') 
                    );
                    
                    $this->Product_Model->save($insert_data,$this->table_discount); 
                    }                
                }
           $this->session->set_flashdata('msg',array('message' => 'Csv Volume Discount Product Data Imported Succesfully.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
			redirect('product/import');
              
              
            } else 
              	$this->session->set_flashdata('msg',array('message' => 'Unable to Delete.Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				redirect('product/import');
            }else{
            		$this->session->set_flashdata('msg',array('message' => 'Unable to Delete.Some error occurred.','class' => 'danger','type'=>'Oops!','icon'=>'slash'));
            	redirect('product/import');
            }

        }
 
        } 

    function Image_Delete()
      {
      	$pid=$this->input->post('pid');
      	$img=$this->input->post('img');
      	$child_id=child_id($pid);
	    $cate_name=slug(category_name(cate(scate($child_id)))); 
	    $sub_cate_name=slug(sub_category_name(scate($child_id)));
	    $child_name=slug(child_category_name($child_id));
	    $path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
      	$product_img= $this->Product_Model->single_product('pg_pid',$pid,$this->table_product_img);
      	$img1= $path.'/'. $img;  
		     if (!unlink($img1)) {} else { }

		    $Image=explode(',',$product_img->pg_image);
		$TIMG=array_diff($Image, array($img));
		$data= array('pg_image' =>implode(',',$TIMG));  
	      
		  $result = $this->Profile_Model->update('pg_pid',$pid,$data,$this->table_product_img);
	          	      
	           echo'success';
      }

	 function product_delete() {         	
		 $p_id=$this->uri->segment(3);
		 $child_id=child_id($p_id);
	     $cate_name=slug(category_name(cate(scate($child_id)))); 
	     $sub_cate_name=slug(sub_category_name(scate($child_id)));
	     $child_name=slug(child_category_name($child_id));
	     $path=FCPATH . 'uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
	     $productimg= $this->Product_Model->single_product('pg_pid',$p_id,$this->table_product_img);
	     $image=explode(',',$productimg->pg_image);
	     foreach ($image as $list_value) {
	     	$img1= $path.'/'. $list_value;  
		     if (!unlink($img1)) {} else { }
	     }
		 $product=$this->Product_Model->delete($this->fld_p_id,$p_id,$this->table_product);	
		 $product_img=$this->Product_Model->delete('pg_pid',$p_id,$this->table_product_img);
		 $product_link=$this->Product_Model->delete('p_id',$p_id,$this->table_product_link);
		 $product_sprice=$this->Product_Model->delete('sp_pid',$p_id,$this->table_special_price);
		  $product_inventory=$this->Product_Model->delete('int_pid',$p_id,$this->table_inventory);
		 $product_discount=$this->Product_Model->delete('vd_pid',$p_id,$this->table_discount);		   
		$this->session->set_flashdata('msg',array('message' => 'Product Data has been successfully Delete.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
				   redirect('product');
			
	  }	

	 function inventory() {  
         $content['spage']='2';
         $dbselect='int_id,int_pid,int_vnd_id,int_size,int_color,int_selleing_price,int_available_qty,int_total_qty,int_min_purchase_qty,int_stock';
         $vnd_id=$this->vendor->vnd_id;
		 $content['inventory'] = $this->Product_Model->GetList($dbselect,'int_id','int_vnd_id',$vnd_id,$this->table_inventory);
		 //edit inventory
		 $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {		
		      $int_id=$this->input->post('int_id');		  
			 $data=array('int_size'=>$this->input->post('int_size'),
			 	         'int_color'=>$this->input->post('int_color'),
			 	         'int_selleing_price'=>$this->input->post('int_selleing_price'),
			 	           'int_available_qty'=>$this->input->post('int_available_qty'),
			             'int_total_qty'=>$this->input->post('int_total_qty'),
			             'int_min_purchase_qty'=>$this->input->post('int_min_purchase_qty'),
			             'int_stock'=>$this->input->post('int_stock'),			            
			             'int_updated'=>date('Y-m-d H:i:s')
			      ); 
			   $result = $this->Product_Model->update($this->fld_int_id,$int_id,$data,$this->table_inventory);			   
			   
			   if($result){
				   $this->session->set_flashdata('msg',array('message' => 'Inventory has been successfully Update.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
				   redirect('product/inventory'); 
			   }else{
				   $this->session->set_flashdata('msg',array('message' => "Unable to Change Inventory.Some error occurred.",'class' => 'danger','type'=>'Oops!','icon'=>'slash'));
				   redirect('product/inventory');  
			   }
		  
		}		   	
		  $content['subview']="inventory";
		  $this->load->view('layout', $content);
         
	}	
	 public function inventory_edit()
    {
    	$int_id = $this->input->post('int_id');	
    	$result['color'] = explode(', ',color()->opt_value);	
    	$result['inventory'] = $this->Product_Model->single_product($this->fld_int_id,$int_id,$this->table_inventory);
    	$result['product'] = $this->Product_Model->get_single('p_name','p_id',$result['inventory']->int_pid,$this->table_product);
    	echo json_encode($result);
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
				   redirect('profile/change-password'); 
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


	public function getSubCate()
	{
		$CID = $this->input->post('CID');
		$sub_category = $this->Product_Model->getCateList('cate_id',$CID,'scate_name','scate_remove','scate_status',$this->table_sub_category);
		echo $result = '';
			if(!empty($sub_category)){
			foreach($sub_category AS $scate_list){
		$name=$scate_list->scate_name;
		$id=$scate_list->scate_id;
		$count=scategory_count($id);
		$url="'".base_url()."'";
   if(!empty($count)){
	  echo $result='<li onClick="subcategory('.$id.','.$url.',this)" id="'.$id.'"><a href="javascript:void(0)" >'.$name.'('.$count.')</a></li>';
	   
	 }else{ echo $result='<li><a   href="javascript:void(0)">'.$name.'('.$count.')</a></li>';}
	 }
	    }else{ echo $result = '';}	
		 return $result;
	}
	
	public function getChildCate()
	{
		 $SID = $this->input->post('SID');
		$category = $this->Product_Model->getCateList('scate_id',$SID,'child_name','child_remove','child_status',$this->table_child_category);
		
		echo $result = '';
			if(!empty($category)){
			foreach($category AS $child_list){
		$name=$child_list->child_name;
		$id=$child_list->child_id;
        $url="'".base_url()."'";
         $getname="'".$name."'";		
	  echo $result='<li><a   href="javascript:void(0)"  onClick="childcategory('.$id.','.$getname.','.$url.',this)">'.$name.'</a></li>';
	   
			}
	    }else{ echo $result = '';}	
		 return $result;
	}

	public function category_search()
	{ 	
	   $search=$this->input->post('search');
	   $category = $this->Product_Model->get_Cate_filter('cate_name',$search,'cate_name','cate_remove','cate_status',$this->table_category);
	     $get_sub_category = $this->Product_Model->cate_list('scate_name','scate_remove','scate_status',$this->table_sub_category);
	      $get_child_category = $this->Product_Model->cate_list('child_name','child_remove','child_status',$this->table_child_category);
	  $sub_category = $this->Product_Model->get_Cate_filter('scate_name',$search,'scate_name','scate_remove','scate_status',$this->table_sub_category);
	    $child_category = $this->Product_Model->get_Cate_filter('child_name',$search,'child_name','child_remove','child_status',$this->table_child_category);
       $url=base_url();
	 if (!empty($category))
     {  
     	  echo '<ul class="booking-list"  style="background: #fff; border: 1px solid #E3E3E3;    margin-bottom: -16px;">';
          foreach ($category as $row):  
     	  $cateid=$row->cate_id;
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$cateid.'" category="cate" url="'.$url.'">'.$row->cate_name.' </a>
                     </li>   ';
         if (!empty($get_sub_category)){ 
         foreach ($get_sub_category as $srow):  
     	 $scateid=$srow->scate_id;
     	 if($srow->cate_id==$cateid){
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$scateid.'" category="sub" url="'.$url.'"> - '.$srow->scate_name.' </a>
                     </li> ';
             if (!empty($get_child_category)){ 
               foreach ($get_child_category as $crow):       	
     	 if($crow->scate_id==$scateid){
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$crow->child_id.'" category="child" url="'.$url.'"> -- '.$crow->child_name.' </a>
                     </li>     ';
     	 }
          endforeach;
     	 }
     	}
          endforeach;
         }
          endforeach;
          echo '</ul>';
		 
     }elseif (!empty($sub_category)){
     	echo '<ul class="booking-list"  style="background: #fff; border: 1px solid #E3E3E3;    margin-bottom: -16px;">';
     	 foreach ($sub_category as $srow):  
     	 $scateid=$srow->scate_id;
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$scateid.'" category="sub" url="'.$url.'" > '.category_name($srow->cate_id).' - '.$srow->scate_name.' </a>
                     </li> ';
             if (!empty($get_child_category)){ 
               foreach ($get_child_category as $crow):       	
     	 if($crow->scate_id==$scateid){
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$crow->child_id.'"  category="child" url="'.$url.'"> '.category_name($srow->cate_id).' - '.$srow->scate_name.' -- '.$crow->child_name.' </a>
                     </li>     ';
     	 }
          endforeach;
     	 }
     	
          endforeach;
          echo '</ul>';

     }elseif (!empty($child_category)){
     echo '<ul class="booking-list"  style="background: #fff; border: 1px solid #E3E3E3;    margin-bottom: -16px;">';     	 
               foreach ($get_child_category as $crow):      	
     	
             echo '<li><a class="booking-item " href="javascript:void(0);" onclick="getValue(this);" id="'.$crow->child_id.'" category="child" url="'.$url.'"> '.category_name($crow->cate_id).' - '.sub_category_name($crow->scate_id).' -- '.$crow->child_name.' </a>
                     </li>     ';
     	
          endforeach;
           echo '</ul>';
     	 

     }
	  
		
		
		
	}
	
}

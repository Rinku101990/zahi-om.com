<?php 
class Account_model extends MY_Model{
    
    function __construct() {
        $this->tableName = 'tbl_customer';
        $this->primaryKey = 'cust_id';
    }
	
	 function get_category_list($table){
		$this->db->select('cate_id,cate_name,cate_slug,cate_img,cate_icon');
		$this->db->order_by('cate_id',"asc");
		$this->db->where('cate_status','1');
		$this->db->where('cate_remove','0');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	 
	/* ============For Check Email Exist In Table============ */
	function check_email($fld_email,$mail,$tabel){	 
	
		$this->db->where($fld_email,$mail);		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1) {
			 return $query->row();
			} else {
			 return false;
			}
		
	}

	function get_wishlist($cust_id,$table){
		$date=date('Y-m-d');
		$this->db->select('wh.id,cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_vnd_id,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_selling_price,sp.sp_price_type,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_img');	
		$this->db->order_by('wh.id',"DESC");
		$this->db->join('tbl_product tp','tp.p_id=wh.pid','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');		
		$this->db->from($table.' wh');	
		$this->db->where('wh.user_id',$cust_id);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	/* ============For Order DEtail In Table============ */

	function get_order_detail($cust_id,$table){		
		
		$this->db->from($table);
		$this->db->order_by('ord_id','desc');
		$this->db->where('cust_id',$cust_id);
		$this->db->where('status','2');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}

	function get_order_details($ord_id,$cust_id,$table){
		$this->db->from($table );
		$this->db->where('cust_id',$cust_id);
		$this->db->where('ord_id',$ord_id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->row();
		}
	}
	function get_order_product_details($ord_id,$cust_id,$table){
		$this->db->from('tbl_orders_product');	
		$this->db->where('ord_id',$ord_id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}

function get_make_order_product_details($ord_id,$cust_id,$table){
		$this->db->from('tbl_make_orders_product');	
		$this->db->where('ord_id',$ord_id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}
	/* ============For Seller Login ============ */
	
	function login($mail,$password,$tabel){	 
    	$this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_phone,cust_phone_code,otp_status,cust_status');		
		$this->db->where('cust_email',$mail);		
		$this->db->where('cust_password',$password);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }
		
	}

	function otp_login($mail,$password,$otp,$tabel){	 
    	$this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status');		
		$this->db->where('cust_email',$mail);		
		$this->db->where('cust_password',$password);
		$this->db->where('otp_msg',$otp);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }
		
	}
	

	  /* ============For Update Data============ */
	public function update($fld_email,$email,$data,$table) {
        $this->db->where($fld_email, $email);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 

	public function updateReturnPolicy($ordid,$pid,$dataUpdate)
	{
		$this->db->where('ord_id', $ordid);
		$this->db->where('pro_id', $pid);
        $query=$this->db->update('tbl_orders_product', $dataUpdate);
        if($query){
			return true;
		}else{
			return false;
		}
	}

		/* ============For Insert Data============ */
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

    function images_upload($image_name,$path) {	
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'file_name' => date('YmdHms').'_'.rand(1,999999),
			'max_size' => 20000
		);		 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
		if($this->upload->do_upload($image_name))
			{
				$uploaded = $this->upload->data();
				$arr[$image_name] = $uploaded['file_name'];
			}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=$arr[$image_name]; 	    
        
	}

	function location_list($fld_name,$fld_status,$table){
		  $this->db->order_by($fld_name,"asc");
	      $this->db->where($fld_status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function get_location($fld_name,$fld_status,$fld_id,$id,$table){
		  $this->db->order_by($fld_name,"asc");
	      $this->db->where($fld_id,$id);		  
	      $this->db->where($fld_status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function get_size($sid,$pid,$getcolor,$table){
		 $this->db->select('int_id,size');
		  $this->db->order_by('size',"asc");
		  if(!empty($getcolor)){
		  	$this->db->where('int_color',$getcolor);	
		  }
	      $this->db->where('int_size',$sid);		  
	      $this->db->where('int_pid',$pid);
	       $this->db->where('size !=','');
	        $this->db->where('size !=',null);
		  $query=$this->db->get($table);
		// echo $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	public function get_color($intid){		
		$this->db->select('int.int_id,int.int_selleing_price,int.int_available_qty,sp.sp_special_price');	
		$this->db->join('tbl_special_price sp','sp.sp_pid=int.int_pid','LEFT');			
		$this->db->from('tbl_inventory int');	
		$this->db->where('int.int_id',$intid);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	function check_password($fld_email,$email,$fld_password,$password,$tabel){
	  
        $this->db->where($fld_email,$email);		
		$this->db->where($fld_password,$password);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  
		
	}

	public function check_zipcode($pincode,$table){	   	
		$this->db->where('zc_zipcode',$pincode);      		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  

	}

 /* ============For Insert Data============ */
	public function delete($fld_bid,$id,$table)
	{ 
	    $this->db->where($fld_bid,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	function cancel_reason($table){		
		
		$this->db->from($table);
		$this->db->order_by('ocr_id','desc');
		$this->db->where('ocr_status','1');
		$this->db->where('ocr_type','1');
		$query=$this->db->get();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}

	function exchange_reason($table){		
		
		$this->db->from($table);
		$this->db->order_by('ocr_id','desc');
		$this->db->where('ocr_status','1');
		$this->db->where('ocr_type','2');
		$query=$this->db->get();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}

	public function getReturnItemList($ordid,$table)
	{
		$this->db->where('c_order_id',$ordid);		
		$query=$this->db->get($table);	
		if($query->num_rows()== '')
	    {
			return '';
	    }
	    else
	    {
			return $query->result();
	    }	
	}

	function check_request($cust_id,$ordid,$pid,$tabel)
	{
	  
        $this->db->where('c_cust_id',$cust_id);		
		$this->db->where('c_order_id',$ordid);
		$this->db->where('c_pro_id',$pid);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  
		
	}
	
	// FACEBOOK LOGIN WITH JAVASCRIPT //
	
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkFacebookUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status');
            //$this->db->from($this->tableName);
            $this->db->where(array('cust_oauth_provider'=>$userData['cust_oauth_provider'], 'cust_oauth_uid'=>$userData['cust_oauth_uid']));
            //echo $this->db->last_query();
            $prevQuery = $this->db->get($this->tableName);
            
            if($prevQuery->num_rows() > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('cust_id'=>$prevResult['cust_id']));
                
                //get user ID
                $userID = $prevQuery->row();
            }else{
                //insert user data
                $userData['cust_created']  = date("Y-m-d H:i:s");
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName,$userData);
                
                //get user ID
                $userID = $prevQuery->row();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
    
    
    // GOOGLE LOGIN WITH JAVASCRIPT //
	
    
    /*
     * Insert / Update google profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkGoogleUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status');
            //$this->db->from($this->tableName);
            $this->db->where(array('cust_oauth_provider'=>$userData['cust_oauth_provider'], 'cust_oauth_uid'=>$userData['cust_oauth_uid']));
            //echo $this->db->last_query();
            $prevQuery = $this->db->get($this->tableName);
            
            if($prevQuery->num_rows() > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('cust_id'=>$prevResult['cust_id']));
                
                //get user ID
                $userID = $prevQuery->row();
            }else{
                //insert user data
                $userData['cust_created']  = date("Y-m-d H:i:s");
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName,$userData);
                
                //get user ID
                $userID = $prevQuery->row();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
	
	
}
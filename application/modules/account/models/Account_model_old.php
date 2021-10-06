<?php 
class Account_model extends MY_Model{
	
	 
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
	/* ============For Order DEtail In Table============ */

	function get_order_detail($cust_id,$table){		
		
		$this->db->from($table);
		$this->db->where('cust_id',$cust_id);
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

	/* ============For Seller Login ============ */
	
	function login($mail,$password,$tabel){	 
    	$this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status');		
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
	
	
}
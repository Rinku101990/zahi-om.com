<?php 
class Cms_model extends MY_Model{
	
	  
	 function get_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"ASC");
		  $query=$this->db->get($table);
		   $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

 function vendor_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"ASC");
		  $this->db->where('vnd_status','1');
		  $query=$this->db->get($table);
		  // $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}


	 function get_navigation_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"ASC");
		  $query=$this->db->get($table);
		   $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function cotegory_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"ASC");
		   $this->db->where('cate_status','1');
		    $this->db->where('cate_remove','0');	
		  $query=$this->db->get($table);		 
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

		function page_list($fld_id,$table){	
			
				  $this->db->order_by($fld_id,"ASC");
				   $this->db->where('pg_status','1');		   
				  $query=$this->db->get($table);				 
				   if($query->num_rows() ==''){
						return '';
						}else{
						return $query->result();
					}
				
			}


	function single_record($fld_id,$id,$tabel){
		 $this->db->order_by($fld_id,"desc");
		 $this->db->where($fld_id,$id);	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }
	function profiledata($fld_email,$email,$tabel){
		 
		 $this->db->where($fld_email,$email);	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }
	 
	function check_password($fld_email,$fld_password,$email,$password,$tabel){
	  
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

	function check($fld_name,$fld_id,$tabel){
	   //$this->db->where($fld_name1,$fld_id1);
        $this->db->where($fld_name,$fld_id);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);
	 $this->db->last_query($query);
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  
		
	}

	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

	 
	public function update($fld_email,$email,$data,$table) {
        $this->db->where($fld_email, $email);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 

     public function delete($fld_email,$email,$table) {
        $this->db->where($fld_email, $email);
        $this->db->delete($table);
    } 

	 
	function images_upload($image_name,$path) {	
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|webp',
			'upload_path' => $path,
			'file_name' => date('YmdHms').'_'.rand(1,999999),
			'max_size' => 200000
		);		 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
		if($this->upload->do_upload($image_name))
			{
				$uploaded = $this->upload->data();
				$arr[$image_name] = $uploaded['file_name'];
			}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=@$arr[$image_name]; 	    
        
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

	function single_product($fld,$id,$tabel)
	{
		 $this->db->where($fld,$id);
		$query=$this->db->get($tabel);
		$this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }

	function get_single_product($id)
	{

	$this->db->select('PD.p_id,PD.p_cate,PD.p_scate,PD.p_child,PD.p_reference_no,PD.p_name,PD.p_model,PD.p_brand,PD.p_selling_price,CT.cate_id,CT.cate_name AS cate_name,SCT.scate_id,SCT.scate_name AS scate_name,CHT.child_id,CHT.child_name AS child_name,BT.brd_id,BT.brd_name AS brand_name');
    $this->db->from('tbl_product AS PD');
    $this->db->where('PD.p_id', $id);
    $this->db->join('tbl_category AS CT', 'CT.cate_id = PD.p_cate', 'left');
    $this->db->join('tbl_sub_category AS SCT', 'SCT.scate_id = PD.p_scate', 'left');
    $this->db->join('tbl_child_category AS CHT', 'CHT.child_id = PD.p_child', 'left'); 
    $this->db->join('tbl_brand AS BT', 'BT.brd_id = PD.p_brand', 'left');    
    $query = $this->db->get();   
	 $this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }


	
	
}
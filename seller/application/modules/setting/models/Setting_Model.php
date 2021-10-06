<?php 
class Setting_Model extends MY_Model{
	
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
	function getlist($fld_name,$status,$tabel)
	{
		$this->db->order_by($fld_name,"asc");
		 $this->db->where($status,'1');
		$query=$this->db->get($tabel);
		//$this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->result();
			}
	 }	 
	
	function cate_list($fld_id,$remove,$status,$table){	
	
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}
 
    function get($fld_id,$vnd_id,$table){	
	        $array = array('0', $vnd_id);
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where_in('vnd_id',$array);			 		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function scate_list($fld_id,$remove,$vnd_id,$table){	
	      $array = array('0', $vnd_id);
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where_in('vnd_id',$array);	
		  $this->db->where($remove,'0');
		  //$this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}


	function getCateList($fld_id,$id,$name,$remove,$status,$table){	
	
		  $this->db->order_by($name,"asc");
		  $this->db->where($fld_id,$id);
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	public function check_exist($fld_name,$name,$table){	 
		$this->db->where($fld_name,$name);		
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return true;
		else return false;		
	}
	
	public function check_double_exist($fld_name,$name,$fld_name2,$name2,$table){	 
		$this->db->where($fld_name,$name);
		$this->db->where($fld_name2,$name2);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return true;
		else return false;		
	}
	
	
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }
	
	   public function update($fld_id,$id,$data,$table) {
        $this->db->where($fld_id, $id);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
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
	
	
	
}
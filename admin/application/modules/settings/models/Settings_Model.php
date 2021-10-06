<?php 
class Settings_Model extends MY_Model{
	 
	 
	function get_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"desc");
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function getlist($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"asc");
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_cate_list($fld_id,$remove,$table){	
	
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where($remove,'0');
		  $query=$this->db->get($table);
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
	
    
    function brand_single($b_id,$table){	
	      $this->db->select('brd_id,brd_name');	
		  $this->db->where('vnd_id',$b_id);		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function get_location_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"asc");		
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
	
	public function get($type,$table){	 
		$this->db->where('mailFor',$type);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;		
	}
	
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }
	
	function get_selected_record($fld_id,$id,$table)
	{
		$this->db->where($fld_id,$id);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	function delete($fld_id,$id,$table){
	    $this->db->where($fld_id,$id);
	    $query=$this->db->delete($table);
		if($query) return true;
		else return false;
	}
	
	function delete_single($fld_id,$id,$table){
	 
	    $this->db->where($fld_id,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
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
	
	 function resize_image_large($file_path,$width,$height,$old_path,$new_path){
    $this->load->library('image_lib');
    $configlarge['image_library'] = 'gd2';
    $configlarge['source_image'] = $old_path.'/'.$file_path;
    $configlarge['new_image'] = $new_path.'/'.$file_path;
    $configlarge['maintain_ratio'] = FALSE;
    $configlarge['width'] = $width;
    $configlarge['height'] = $height;
    $this->image_lib->clear();
    $this->image_lib->initialize($configlarge);
    $this->image_lib->resize();
}


	function icon_upload($image_name,$path) {		
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
				$this->resize_img(APPPATH.'../uploads/category/icon/'.$arr[$image_name],APPPATH.'../uploads/category/icon/'.$arr[$image_name],52,52); 
			}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=$arr[$image_name]; 	
	}

	public function resize_img($source,$destination,$width,$height){
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source;
		$config['new_image'] = $destination;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;

		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	function tax_list($table){	
	      $this->db->select('txt_id,txt_name');
		  $this->db->order_by('txt_name',"asc");
		  $this->db->where('cate_id','0');
		  $this->db->where('txt_status','1');
		  $query=$this->db->get($table);
		  //echo $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	
	 
	 
	
}
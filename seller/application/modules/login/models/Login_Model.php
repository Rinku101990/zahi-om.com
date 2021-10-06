<?php 
class Login_Model extends MY_Model{
	
	
	/* ============For Seller Login ============ */
	
	function login($mail,$password,$tabel){	 
	
		$this->db->where('vnd_email',$mail);		
		$this->db->where('vnd_password',$password);
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

	public function file_images_upload() {
		
		if(!empty($_FILES['file']['name'])){
			$this->load->library('upload');
			$config['upload_path'] = APPPATH.'../uploads/document/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|xlsx|xls|doc|docx|ppt|pptx|pdf';
			$config['file_name'] = date('YmdHms').'_'.rand(1,999999);
			$this->upload->initialize($config);
			if($this->upload->do_upload('file'))
			{
				$uploaded = $this->upload->data();
				$arr['file'] = $uploaded['file_name'];				
			}
			$createdDate = strtotime(date('Y-m-d H:i:s'));	 
			return $names=$arr['file']; 
		}else{
			return $names='';
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
	
	 
	
}
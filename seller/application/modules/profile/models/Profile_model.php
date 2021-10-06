<?php 
class Profile_model extends MY_Model{	 
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
	function get_notification($fld_name,$value,$tabel){
		 
		 $this->db->where($fld_name,$value);	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }
	 

	function get_message($vnd_id,$tabel){		 
		 $this->db->where('msg_receiver',$vnd_id);	
		 $this->db->where('msg_status','0');		
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }
	 function get_serach_message($search,$vnd_id,$tabel){		 
		 $this->db->where('msg_receiver',$vnd_id);	
		 $this->db->where('msg_status','0');
		  $this->db->where('msg_reply','0');
		  $this->db->like('msg_subject',$search);		
		 $query=$this->db->get($tabel);
		 // echo $this->db->last_query();
		 // die();
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }

	function get_sent_message($vnd_id,$tabel){		 
		 $this->db->where('msg_sender',$vnd_id);
		 $this->db->where('msg_status','0');	
		  $this->db->where('msg_reply','0');		
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }
	 function get_search_sent_message($search,$vnd_id,$tabel){		 
		 $this->db->where('msg_sender',$vnd_id);
		 $this->db->where('msg_status','0');
		  $this->db->where('msg_reply','0');
		  $this->db->like('msg_subject',$search);			
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }

	 function get_starred_message($vnd_id,$tabel){	

	 $this->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");	 
		 // $this->db->where('msg_sender',$vnd_id);
		 // $this->db->or_where('msg_receiver',$vnd_id);
		 $this->db->where('msg_status','0');
		  $this->db->where('msg_reply','0');
		  $this->db->where('msg_star','1');			
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }
   

	 function get_search_starred_message($search,$vnd_id,$tabel){	

	 $this->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");	
		 $this->db->where('msg_status','0');
		  $this->db->where('msg_star','1');
		   $this->db->where('msg_reply','0');	
		   $this->db->like('msg_subject',$search);				
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }

	  function get_trash_message($vnd_id,$tabel){		 
		 $this->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");	
		 $this->db->where('msg_status','1');
		  $this->db->where('msg_reply','0');		 		
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }

	 function get_search_trash_message($search,$vnd_id,$tabel){		 
		 $this->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");	
		 $this->db->where('msg_status','1');
		  $this->db->where('msg_reply','0');
		 $this->db->like('msg_subject',$search);		 		
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
		 
	 }

	  function messsage_view($msg_id,$tabel){		 
		 $this->db->where('msg_id',$msg_id);				 		
		 $query=$this->db->get($tabel);
		 if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
		 
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


	/* ============For Insert Data============ */
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }
 
 public function delete($fld_name,$fld_vale,$table) {
        $this->db->where($fld_name, $fld_vale);
        $this->db->delete($table);
    } 

	
	
}
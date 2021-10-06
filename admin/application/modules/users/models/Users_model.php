<?php 
class Users_Model extends MY_Model{

	function single_list($tabel){		
		$this->db->order_by('mst_id','DESC');		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);
		//echo $this->db->last_query($query)	 ;
		if($query->num_rows()== 1) {
			 return $query->row();
			} else {
			 return false;
			}
		}
	 
	public function get_all_user_list($fld_bid,$table)
	{
		$this->db->select('*');
		$this->db->order_by($fld_bid, 'DESC');
		$this->db->where('mst_role', '1');
		$query=$this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}
	}

	function get_user_single_record($fld_id,$id,$tabel){	 
	
		$this->db->where($fld_id,$id);		 
		$this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1) {
			 return $query->row();
			} else {
			 return false;
			}
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
		
	   
	public function blog_images_upload() {
		
		if(!empty($_FILES['blog_picture']['name'])){
			$this->load->library('upload');
			$config['upload_path'] = APPPATH.'../uploads/blog/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = date('YmdHms').'_'.rand(1,999999);
			$this->upload->initialize($config);
			if($this->upload->do_upload('blog_picture'))
			{
				$uploaded = $this->upload->data();
				$arr['blog_picture'] = $uploaded['file_name'];
				$this->createThumbnail(APPPATH.'../uploads/blog/'.$arr['blog_picture'],APPPATH.'../uploads/blog/thumbnail/'.$arr['blog_picture'],140,140); 
				$this->createThumbnail(APPPATH.'../uploads/blog/'.$arr['blog_picture'],APPPATH.'../uploads/blog/thumbnail/thumbs/'.$arr['blog_picture'],40,40); 
			}
			$createdDate = strtotime(date('Y-m-d H:i:s'));	 
			return $names=$arr['blog_picture']; 
		}else{
			return $names='';
		}
	}

	
	public function createThumbnail($source,$destination,$width,$height){

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

	// END OF THE UPLOADING RESIZE COMMENT ATTACHMENT //
	
    public function save_user($data,$table){
        $this->db->insert($table , $data);
        return $this->db->insert_id();
	}
	
	

    // GET BLOG COMMENTED INFO //
    public function get_single_blog_comments($fld_cbid,$blogid,$fld_rplyid,$table){
		$this->db->select('mbr.cust_fname,mbr.cust_lname,mbr.cust_profile,mbr.cust_gender,mbr.cust_role,cmt.*');
		$this->db->join('tbl_members mbr','cmt.cmnt_member_id=mbr.cust_id','LEFT');
    	$this->db->where('cmt.'.$fld_cbid,$blogid);
    	$this->db->where('cmt.'.$fld_rplyid,'0');
    	$this->db->order_by('cmt.'.$fld_cbid,'DESC');
		$query=$this->db->get($table.' cmt');
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}	
	}

	
    
    public function update_users($id,$data,$table){
        $this->db->where('mst_id', $id);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
	}
	
	


	
	// GET SINGLE BLOG DELETE //
	
	public function get_single_blog($fld_bid,$id,$table)
	{
		$this->db->where($fld_bid,$id);
		$query=$this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->row();
		}
	}
	
	public function delete_single($fld_bid,$id,$table)
	{ 
	    $this->db->where($fld_bid,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	
}
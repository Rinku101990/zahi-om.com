<?php 
class Notification_model extends MY_Model{
	
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

	public function save($data,$table){
        $this->db->insert($table , $data);
        return $this->db->insert_id();
	}
	
	function user_list($fld_id,$table)
	{	
	    $this->db->select('usr_email');
		$this->db->order_by($fld_id,"ASC");
		$this->db->where('usr_status',"0");
		$query=$this->db->get($table);
		//$this->db->last_query($query);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	
	
	function get_list($fld_id,$table)
	{	
		$this->db->order_by($fld_id,"desc");
		$query=$this->db->get($table);
		$this->db->last_query($query);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	
	public function single_template($fld,$id,$table)
	{
		$this->db->where($fld,$id);
		$query=$this->db->get($table);
        if($query->num_rows() ==''){
		     return '';
		}else{		
		     return $query->row();
		}
	 }
	
	public function remove_tmp($fld_id,$id,$table) {
        $this->db->where($fld_id, $id);
        $this->db->delete($table);
    } 
    
    public function check_device_token($devicetype,$table)
    {
        $this->db->select('cust_device_token_ios');
		$this->db->where('cust_device_type_ios',$devicetype);
		$this->db->where('cust_device_token_ios!=""');
		$query=$this->db->get($table);
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }
    
    
    
    public function check_device_token_android($deviceTypeAndroid,$table)
    {
        $this->db->select('cust_device_token_android');
		$this->db->where('cust_device_type_android',$deviceTypeAndroid);
		$this->db->where('cust_device_token_android!=""');
		$query=$this->db->get($table);
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }
    
    
    public function check_device_token_email($email,$devicetype,$table)
    {
        $this->db->select('usr_devicetoken');
        $this->db->where('usr_email',$email);
		$this->db->where('usr_devicetype',$devicetype);
		$this->db->where('usr_devicetoken!=""');
		$query=$this->db->get($table);
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }
    
    
    public function check_device_token_android_email($email,$deviceTypeAndroid,$table)
    {
        $this->db->select('usr_devicetoken_android');
        $this->db->where('usr_email',$email);
		$this->db->where('usr_devicetype_android',$deviceTypeAndroid);
		$this->db->where('usr_devicetoken_android!=""');
		$query=$this->db->get($table);
		if($query->num_rows() != 0){
			return $query->result();
		}else{
			return false;
		}
    }
	 	
}
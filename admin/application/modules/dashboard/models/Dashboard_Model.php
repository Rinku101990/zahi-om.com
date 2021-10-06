<?php 
class Dashboard_Model extends MY_Model{
	
	  
	 
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
	public function get_seller_reports($table)
	{
		$this->db->select('slrs.vnd_name, slrs.vnd_email,slrs.vnd_phone,COUNT(pord.op_id) AS Orders,sum(pord.pro_price) AS amount,slrs.vnd_created');
		$this->db->join('tbl_orders_product pord','slrs.vnd_id=pord.ord_vendors','LEFT');
		$this->db->join('tbl_orders ord','ord.ord_id=pord.ord_id','LEFT');
		// $this->db->where('ord.order_status !=','Waiting');
		$this->db->group_by('slrs.vnd_id', 'DESC');
		$query = $this->db->get($table.' slrs');
		// echo $this->db->last_query();
		// die;
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
 
	
	
}
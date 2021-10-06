<?php 
class Page_model extends MY_Model{		 

	public function get_list($id,$table){					   
	    $this->db->where('pg_id',$id);
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

		/* ============For Insert Data============ */
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

    public function total_wish($userid,$table){
		 $this->db->order_by('id',"asc");
		//$this->db->where('pid',$pid);
		$this->db->where('user_id',$userid);	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->num_rows();
		else return '0';
	}

	public function check_wishlist($pid,$userid,$table){
		 $this->db->order_by('id',"asc");
		$this->db->where('pid',$pid);
		$this->db->where('user_id',$userid);	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->num_rows();
		else return '';
	}
	
		function vendor_list($table){
     	$this->db->select('vnd_id,vnd_name,vnd_picture');
		$this->db->order_by('vnd_id',"DESC");
		$this->db->where('vnd_VerifiedStatus','1');	
		$this->db->where('vnd_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


    public function check_email($emailfld,$email,$table){	   	
		$this->db->where($emailfld,$email);      		
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
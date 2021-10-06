<?php 
class Login_Model extends MY_Model{
	
	
	/* ============For Admin Login ============ */
	
	function login($mail,$password,$tabel){	 
	
		$this->db->where('mst_email',$mail);		
		$this->db->where('mst_password',$password);
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
	 
	
}
<?php 
class Promotion_model extends MY_Model{	 

	function GetList($select,$fld_id,$vnd_fld_id,$vnd_id,$table){
	     $this->db->select($select);	       
		  $this->db->order_by($fld_id,"DESC");
		  $this->db->where($vnd_fld_id,$vnd_id);			 		
		  $query=$this->db->get($table);
		 // $this->db->last_query($query)	;
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
	 
	

	function check($fld_name1,$fld_id1,$fld_name,$fld_id,$tabel){
	   $this->db->where($fld_name1,$fld_id1);
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

 function get_single($select,$fld,$id,$tabel)
	{     $this->db->select($select);
		 $this->db->where($fld,$id);
		$query=$this->db->get($tabel);		
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }	 
	
	
}
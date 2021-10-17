<?php 
class Checkout_model extends MY_Model{
		 

    function get_shippingAddress($cust_id,$id,$table){
		 
		$this->db->where($cust_id,$id);
		$query=$this->db->get($table);
		 if($query->num_rows() ==''){
			  return '';
			  }else{
			  return $query->result();
		  }
	}

 function shippingAddress($cust_id,$id,$table){
    	$this->db->order_by('fld_id','DESC');
		 
		$this->db->where($cust_id,$id);
		$query=$this->db->get($table);
		 if($query->num_rows() ==''){
			  return '';
			  }else{
			  return $query->row();
		  }
	}


public function update_shippingAddress($fld_cust,$cust_id,$fld_ship,$id,$data,$table) {
		  
		$this->db->where($fld_ship,$id); 
		$this->db->where($fld_cust,$cust_id); 
		$query=$this->db->update($table,$data); 
		if($query){
			return true;
		}else{
		return false; 
		} 
	}

function get_defaultaddress($addressDefault,$cust_id,$id,$table){
		 
		$this->db->where($cust_id,$id);
		$this->db->where('addressDefault',$addressDefault);
		$query=$this->db->get($table);
		 if($query->num_rows() ==''){
			  return false;
			  }else{
			  return $query->row();
		  }
  	}
function saveShippingAddress($data,$table){
		 
		$query=$this->db->insert($table,$data);
		if($query){
			return true;
		}else{
		   return false; 
		} 
	}

 function price_symbol(){		
		$this->db->select('cr.symbol');
		$this->db->join('tbl_currency cr','cr.id=w.web_currency','LEFT');
		$this->db->from('tbl_website_info'.' w');
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row()->symbol;
		else return false;
	}
	function tax_list($table){		
		$this->db->select('txt_id,txt_name,txt_per');
	     $this->db->where('txt_status','1');
	     $this->db->where('cate_id','0');
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
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

	function delete_single($fld_id,$id,$table){
	 
	    $this->db->where($fld_id,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	

	
	
}
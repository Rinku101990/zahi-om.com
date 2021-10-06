<?php
class MY_Model extends CI_Model {	

	function get_website($fld_id,$tabel)
	{	
		$this->db->order_by($fld_id,"desc");
		$this->db->limit(1);	
		$query=$this->db->get($tabel);
		if($query->num_rows()== 1){
			return $query->row();
		}else{
			 return false;
		}	 
	}
	
	
	function get_list($fld_id,$table)
	{	
		$this->db->order_by($fld_id,"desc");
		//$this->db->limit(8);	
		$query=$this->db->get($table);
		if($query->num_rows() ==''){
			return '0';
		}else{
			return $query->num_rows();
		}
	}

	public function get_order_list($order_status,$table)
	{	
		$this->db->where('order_status',$order_status);	
		$query=$this->db->get($table);
	    //$this->db->last_query($query);
		if($query->num_rows() ==''){
			return 0;
		}else{
			return $query->num_rows();
		}
	}
    
    public function get_pending_order_list($table)
	{	$date=date('Y-m');
		$this->db->select("count(ord_id) AS revenue,DATE_FORMAT(ord_created_date,'%Y-%m-%d') AS date");
		$this->db->where('order_status','Waiting');
		$this->db->where("DATE_FORMAT(ord_created_date,'%Y-%m')",$date);
		$this->db->group_by('date','ASC');	
		$query=$this->db->get($table);
	   //  $this->db->last_query($query);	

		if($query->num_rows() ==''){
			return 0;
		}else{
			return $query->result();
		}
	}

	public function get_complete_order_list($table)
	{	$date=date('Y-m');
		$this->db->select("count(ord_id) AS revenue,DATE_FORMAT(ord_created_date,'%Y-%m-%d') AS date");
		$this->db->where('order_status','Delivered');
		$this->db->where("DATE_FORMAT(ord_created_date,'%Y-%m')",$date);
		$this->db->group_by('date','ASC');	
		$query=$this->db->get($table);
	    //$this->db->last_query($query);
		if($query->num_rows() ==''){
			return 0;
		}else{
			return $query->result();
		}
	}

	 public function get_date_order_list($table)
	{	$date=date('Y-m');
		$this->db->select("DATE_FORMAT(ord_created_date,'%Y-%m-%d') AS date");
		//$this->db->where('order_status','Waiting');
		$this->db->where("DATE_FORMAT(ord_created_date,'%Y-%m')",$date);		
		$this->db->group_by('date','ASC');	
		$query=$this->db->get($table);
	    //$this->db->last_query($query);
		if($query->num_rows() ==''){
			return 0;
		}else{
			return $query->result();
		}
	}



	public function get_revenue_list($table)
	{
		$this->db->select("SUM(ord_total_amounts) AS Revenue");
		$this->db->where("order_status !=",'Pending');
		$this->db->where("order_status !=",'Cancel');
		$query=$this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->row();
		}
	}

}	
<?php 
class Payment_Model extends MY_Model{
		
	function get_shipping_address($fld_shpid,$id){
		
		$this->db->select("cntry.cnt_id,cntry.cnt_name AS Country,sts.st_id,sts.st_name AS State,cty.ct_name AS City,zp.zc_zipcode AS Zip,shp.*");
		$this->db->from('`tbl_shipping_address` shp');
		$this->db->join('tbl_country cntry','shp.shippingCountry=cntry.cnt_id','LEFT');
		$this->db->join('tbl_state sts','shp.shippingState=sts.st_id','LEFT');
		$this->db->join('tbl_city cty','shp.shippingCity=cty.ct_id','LEFT');
		$this->db->join('tbl_zipcode zp','shp.shippingPincode=zp.zc_id','LEFT');
		$this->db->where($fld_shpid,$id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->row();
		}
	}

	function SaveOrderInformation($orderArray,$table){
		 
		$query=$this->db->insert($table,$orderArray);
		if($query) return $this->db->insert_id();
		else return false;
	}

	function SaveOrderProduct($orderProducts,$table){
		 
		$query=$this->db->insert_batch($table,$orderProducts);
		if($query){
			return true;
		}else{
		   return false; 
		} 
	}

	public function get_user_info($custid,$table){

		$this->db->select('cust_phone_no,cust_address');
		$this->db->where('cust_id',$custid);
		$query=$this->db->get($table);
		
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->row();
		}

	}
	
	public function get_order_details($refid,$table){
		$this->db->select('ord_total_amounts,ord_coupon_code,ord_coupon_amount,ord_reference_no,ord_adj_amount');
		$this->db->where('ord_reference_no',$refid);
		$query=$this->db->get($table);
		// echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	
	public function check_coupon($cou_code,$table){
		
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		
		$query = $this->db->query("SELECT `cup_discount`,`cup_min_order` FROM `tbl_coupon` WHERE `cup_code` = '$cou_code' AND  `cup_start_date` <= '$curr_date'  AND `cup_end_date` >= '$curr_date' ");		
		$this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return 0;
	}
	
	
}
<?php 
class Order_model extends MY_Model{
	
	function get_order_detail($ordid,$fld_ordid,$table){
		
		//$this->db->select("ord_reference_no,ord_pay_mode");
		$this->db->from($table);
		$this->db->where($fld_ordid,$ordid);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->row();
		}
	}

	/* ==== UPDATE ORDER TABLE ==== */
	public function UpdateOrderInformation($productinfo,$orderUpdate,$table){

		$this->db->where('ord_reference_no',$productinfo); 
		$query=$this->db->update($table,$orderUpdate);
		//echo $this->db->last_query(); 
		if($query){
			return true;
		}else{
			return false; 
		} 

	}
	
	//EMAIL FOR COD ORDER//
	function get_complete_list($ord_id){
		$this->db->select('tod.*,tc.cust_fname,tc.cust_lname,tc.cust_phone,tc.cust_phone_code,tsa.*,cntry.cnt_name AS Country,sts.st_name AS State,cty.ct_name AS City,zp.zc_zipcode AS Zip');
		$this->db->join('tbl_customer tc','tc.cust_id = tod.cust_id','LEFT');
		$this->db->join('tbl_shipping_address tsa','tsa.fld_id = tod.ord_delivery_address','LEFT');
	    $this->db->join('tbl_country cntry','tsa.shippingCountry=cntry.cnt_id','LEFT');
		$this->db->join('tbl_state sts','tsa.shippingState=sts.st_id','LEFT');
		$this->db->join('tbl_city cty','tsa.shippingCity=cty.ct_id','LEFT');
		$this->db->join('tbl_zipcode zp','tsa.shippingPincode=zp.zc_id','LEFT');
		
		$this->db->from('tbl_orders tod');
		$this->db->where('tod.ord_id='.$ord_id.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	function get_make_complete_list($ord_id){
		$this->db->select('tod.*,tc.cust_fname,tc.cust_lname,tsa.*,cntry.cnt_name AS Country,sts.st_name AS State,cty.ct_name AS City,zp.zc_zipcode AS Zip');
		$this->db->join('tbl_customer tc','tc.cust_id = tod.cust_id','LEFT');
		$this->db->join('tbl_shipping_address tsa','tsa.fld_id = tod.ord_delivery_address','LEFT');
	    $this->db->join('tbl_country cntry','tsa.shippingCountry=cntry.cnt_id','LEFT');
		$this->db->join('tbl_state sts','tsa.shippingState=sts.st_id','LEFT');
		$this->db->join('tbl_city cty','tsa.shippingCity=cty.ct_id','LEFT');
		$this->db->join('tbl_zipcode zp','tsa.shippingPincode=zp.zc_id','LEFT');
		
		$this->db->from('tbl_make_orders tod');
		$this->db->where('tod.ord_id='.$ord_id.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	function get_order_product_list($ord_id){
		
		$this->db->select('top.*,top.*');
		$this->db->from('tbl_orders_product top');
		$this->db->join('tbl_product pdn','pdn.p_id = top.pro_id','LEFT');
		//$this->db->join('tbl_product_attribute patr','patr.pro_attr_id=top.pro_attr_id','LEFT');
		$this->db->where('top.ord_id='.$ord_id.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_make_order_product_list($ord_id){
		
		$this->db->select('top.*');
		$this->db->from('tbl_make_orders_product top');
		//$this->db->join('tbl_product pdn','pdn.p_id = top.pro_id','LEFT');
		//$this->db->join('tbl_product_attribute patr','patr.pro_attr_id=top.pro_attr_id','LEFT');
		$this->db->where('top.ord_id='.$ord_id.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	
	//EMAIL FOR ONLINE ORDER//
	function get_complete_list_for_online($ord_id){
		$this->db->select('tod.*,tc.cust_fname,tc.cust_lname,tc.cust_gstno,tsa.*,tctry.name AS Country_Name, tst.name AS State_Name, tct.name AS City_Name');
		$this->db->join('tbl_customers tc','tc.cust_id = tod.cust_id','LEFT');
		$this->db->join('tbl_shipping_address tsa','tsa.fld_id = tod.ord_delivery_address','LEFT');
		$this->db->join('tbl_countries tctry','tctry.id = tsa.shippingCountry','LEFT');
		$this->db->join('tbl_states tst','tst.id = tsa.shippingState','LEFT');
		$this->db->join('tbl_cities tct','tct.id = tsa.shippingCity','LEFT');
		
		$this->db->from('tbl_orders tod');
		$this->db->where('tod.ord_reference_no='.$ord_id.'');
		$query=$this->db->get();
		//$this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	function get_order_product_list_for_online($ord_id){
		
		$this->db->select('top.*,pdn.pro_name,patr.pro_length,patr.pro_breadth,patr.pro_price');
		$this->db->from('tbl_orders_product top');
		$this->db->join('tbl_products pdn','pdn.pro_id = top.pro_id','LEFT');
		$this->db->join('tbl_product_attribute patr','patr.pro_attr_id=top.pro_attr_id','LEFT');
		$this->db->where('top.ord_id='.$ord_id.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
}
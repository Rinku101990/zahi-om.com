<?php 
class Reports_model extends MY_Model{
	
	// GET AND EXPORTS SALES REPORTS

	public function get_sales_reports($table)
	{
		$date=date('Y-m-d');
		$this->db->select('COUNT(ord_id) AS ORDERS, SUM(ord_total_amounts) AS NETAMNT,SUM(ord_adj_amount) AS ADJAMNT,SUM(ord_gst_sum) AS GST,SUM(ord_deliver_charge) AS SHIPPING, ord_created_date AS CREATED');
		$this->db->group_by('CREATED',$date);
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_buyer_reports($table)
	{
		$this->db->select('cust.cust_fname, cust.cust_lname,cust.cust_email,cust.cust_phone,COUNT(ord.cust_id) AS Orders,SUM(ord.ord_total_amounts) AS Amount,cust.cust_created');
		$this->db->join('tbl_orders ord','cust.cust_id=ord.cust_id','LEFT');
		$this->db->group_by('cust.cust_id', 'DESC');
		$query = $this->db->get($table.' cust');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_seller_reports($table)
	{
		$this->db->select('slrs.vnd_name, slrs.vnd_email,slrs.vnd_phone,COUNT(pord.op_id) AS Orders,slrs.vnd_created');
		$this->db->join('tbl_orders_product pord','slrs.vnd_id=pord.ord_vendors','LEFT');
		$this->db->join('tbl_orders ord','ord.ord_id=pord.ord_id','LEFT');
		//$this->db->where('ord.order_status','Delivered');
		$this->db->group_by('slrs.vnd_id', 'DESC');
		$query = $this->db->get($table.' slrs');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_sellers_list($table)
	{
		$this->db->select('vnd_id,vnd_name');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}	
	}

	public function get_seller_products($vnd_id,$vndId,$table)
	{
		$this->db->select('pro.p_id, pro.p_vnd_id, pro.p_reference_no, pro.p_name, pro.p_model,pro.p_selling_price,wgt.ut_weight_name,wgt.ut_dime_name,brd.brd_name,pro.p_selling_price,pro.p_lenght,pro.p_width,pro.p_height,pro.p_weigth_unit,pro.p_weight,pro.p_created');
		$this->db->join('tbl_brand brd','pro.p_brand=brd.brd_id','LEFT');
		$this->db->join('tbl_unit wgt','pro.p_weigth_unit=wgt.ut_id','LEFT');
		$this->db->where('pro.'.$vnd_id,$vndId);
		$query = $this->db->get($table.' pro');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_category_products($catid,$catId,$table)
	{
		$this->db->select('cat.cate_id,cat.cate_name,txt.txt_per,ord.ord_reference_no, ord.ord_deliver_charge, op.ord_id, op.pro_name, op.pro_selling_price, op.pro_special_price, op.pro_price, op.pro_gst, op.pro_coupon, op.pro_discount_per, op.pro_discount_value, op.pro_qty, op.ord_create');
		$this->db->join('tbl_product p','p.p_id=op.pro_id','LEFT');
		$this->db->join('tbl_category cat','p.p_cate=cat.cate_id','LEFT');
		$this->db->join('tbl_orders ord','op.ord_id=ord.ord_id','LEFT');
		$this->db->join('tbl_setting ship','ord.ord_delivery_address=ship.id','LEFT');
		$this->db->join('tbl_tax txt','p.p_cate=txt.cate_id','LEFT');
		$this->db->where('p.'.$catid,$catId);
		$query = $this->db->get($table.' op');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_top_products_list($table)
	{
		$this->db->select('pro.p_cate,opro.pro_id,cat.cate_name,opro.pro_name,opro.ord_create');
		$this->db->join('tbl_product pro','opro.pro_id=pro.p_id','LEFT');
		$this->db->join('tbl_category cat','pro.p_cate=cat.cate_id','LEFT');
		$this->db->group_by('opro.pro_id');
		$query = $this->db->get($table.' opro');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}	
	}

	// public function get_seller_products($ordVnId,$vndId,$table)
	// {
	// 	$this->db->select('op_id,ord_id,ord_vendors,pro_id,pro_name,pro_selling_price,pro_special_price,pro_discount_per,pro_discount_value,pro_qty,ord_create');
	// 	$this->db->where($ordVnId,$vndId);
	// 	$query = $this->db->get($table);
	// 	//echo $this->db->last_query();
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

	public function get_category_list($table)
	{
		$this->db->select('cate_id,cate_name');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}	
	}



	public function get_order_info($ordid,$incvid,$table)
	{
		$this->db->select('ship.shippingFirstName,ship.shippingLastName,ship.shippingNumber,ship.shippingEmail,ship.shippingAddress,ord.*');
		$this->db->join('tbl_shipping_address ship','ord.ord_delivery_address=ship.fld_id','LEFT');
		$this->db->where('ord.'.$ordid, $incvid);
		$this->db->order_by('ord.'.$ordid, 'DESC');
		$query = $this->db->get($table.' ord');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_order_product($ordid,$incvid,$table)
	{
		$this->db->select('*');
		$this->db->where($ordid, $incvid);
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function update_order_status($ordid, $uordid, $status, $table)
	{
		$this->db->where($ordid, $uordid);
        $query=$this->db->update($table, $status);
        if($query){
			return true;
		}else{
			return false;
		}
	}
	
}
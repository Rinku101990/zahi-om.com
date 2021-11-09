<?php 
class Orders_model extends MY_Model{
	
	public function get_all_orders($page,$start,$ordid,$filter,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,ord.*,orp.ord_vendors,orp.pro_name,orp.pro_qty,orp.pro_selling_price,orp.pro_special_price,orp.pro_size,orp.pro_color,orp.pro_serialize');
		$this->db->join('tbl_customer cust','ord.cust_id=cust.cust_id','LEFT');
		$this->db->join('tbl_orders_product orp','ord.ord_id=orp.ord_id','LEFT');
		$this->db->order_by('ord.'.$ordid, 'DESC');
		$this->db->where('ord.status', '2');
		if($filter != ''){
			$this->db->like('cust.cust_fname', $filter);
			$this->db->or_like('orp.pro_name', $filter);
		}	
		if(!empty($page))
  		{
			$this->db->limit($page, $start);
		}else{
			$limit = 10;
			$this->db->limit($page, $limit);
		}
		$query = $this->db->get($table.' ord');
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

	public function countAllOrdersList($ordid,$filter,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,ord.*,orp.ord_vendors,orp.pro_name,orp.pro_qty,orp.pro_selling_price,orp.pro_special_price,orp.pro_size,orp.pro_color,orp.pro_serialize');
		$this->db->join('tbl_customer cust','ord.cust_id=cust.cust_id','LEFT');
		$this->db->join('tbl_orders_product orp','ord.ord_id=orp.ord_id','LEFT');
		$this->db->order_by('ord.'.$ordid, 'DESC');
		$this->db->where('ord.status', '2');
		if($filter != ''){
			$this->db->like('cust.cust_fname', $filter);
			$this->db->or_like('orp.pro_name', $filter);
		}	
		$query = $this->db->get($table.' ord');
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}


	public function get_all_orders_where($page,$start,$ordid,$seller,$status,$from,$to,$filter,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,ord.*,orp.ord_vendors,orp.pro_name,orp.pro_qty,orp.pro_selling_price,orp.pro_special_price,orp.pro_size,orp.pro_color,orp.pro_serialize');
		$this->db->join('tbl_customer cust','ord.cust_id=cust.cust_id','LEFT');
		$this->db->join('tbl_orders_product orp','ord.ord_id=orp.ord_id','LEFT');
		if(!empty($status)){
		    $this->db->where('ord.order_status', $status);
		}
		if(!empty($seller)){
		    $this->db->where('orp.ord_vendors', $seller);
		}
		if(!empty($from) && !empty($to)){
    		$this->db->where('ord.ord_created_date >=', $from);
    		$this->db->where('ord.ord_created_date <=', $to);
	    }
		$this->db->where('ord.status', '2');
		if($filter != ''){
			$this->db->like('cust.cust_fname', $filter);
			$this->db->or_like('orp.pro_name', $filter);
		}
		if(!empty($page))
  		{
			$this->db->limit($page, $start);
		}else{
			$limit = 10;
			$this->db->limit($page, $limit);
		}
		$query = $this->db->get($table.' ord');
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

	public function countAllOrdersWhereList($ordid,$seller,$status,$from,$to,$filter,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,ord.*,orp.ord_vendors,orp.pro_name,orp.pro_qty,orp.pro_selling_price,orp.pro_special_price,orp.pro_size,orp.pro_color,orp.pro_serialize');
		$this->db->join('tbl_customer cust','ord.cust_id=cust.cust_id','LEFT');
		$this->db->join('tbl_orders_product orp','ord.ord_id=orp.ord_id','LEFT');
		if(!empty($status)){
		    $this->db->where('ord.order_status', $status);
		}
		if(!empty($seller)){
		    $this->db->where('orp.ord_vendors', $seller);
		}
		if(!empty($from) && !empty($to)){
    		$this->db->where('ord.ord_created_date >=', $from);
    		$this->db->where('ord.ord_created_date <=', $to);
	    }
		$this->db->where('ord.status', '2');	
		if($filter != ''){
			$this->db->like('cust.cust_fname', $filter);
			$this->db->or_like('orp.pro_name', $filter);
		}
		$query = $this->db->get($table.' ord');
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}


	public function get_all_vendor($ordid,$table)
	{
		$this->db->select('vnd_id,vnd_name');	
		$this->db->order_by('vnd_name', 'ASC');
		$this->db->where('vnd_status', '1');	
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
		$this->db->select('ship.shippingFirstName,ship.shippingLastName,ship.shippingCountry,ship.shippingNumber,ship.shippingEmail,ship.shippingAddress,cntry.cnt_name AS Country,sts.st_name AS State,ct.ct_name AS City,zip.zc_zipcode AS Zipcode,ord.*');
		$this->db->join('tbl_shipping_address ship','ord.ord_delivery_address=ship.fld_id','LEFT');
		$this->db->join('tbl_country cntry','ship.shippingCountry=cntry.cnt_id','LEFT');
		$this->db->join('tbl_state sts','ship.shippingState=sts.st_id','LEFT');
		$this->db->join('tbl_city ct','ship.shippingCity=ct.ct_id','LEFT');
		$this->db->join('tbl_zipcode zip','ship.shippingPincode=zip.zc_id','LEFT');
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
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getCancelExchangeInfo($incvid)
	{
		$this->db->select('c_id,c_order_id,c_pro_id,return_type,c_status,c_response');
		$this->db->where('c_order_id', $incvid);
		$query = $this->db->get('tbl_cancel_item');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function getCancelReseanList($table){		
		
		$this->db->from($table);
		$this->db->order_by('ocr_id','desc');
		$this->db->where('ocr_status','1');
		$this->db->where('ocr_type','1');
		$query=$this->db->get();
		if($query->num_rows() ==''){
			  return '';
		}else{
			  return $query->result();
		}
	}

	function checkCancellationRequest($cust_id,$ordid,$pid,$tabel)
	{
        $this->db->where('c_cust_id',$cust_id);		
		$this->db->where('c_order_id',$ordid);
		$this->db->where('c_pro_id',$pid);
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

	public function getCancelItem($returnid)
	{
		$this->db->select('itm.*,res.ocr_id,res.ocr_title');
		$this->db->join('tbl_order_cancel_reasons res','res.ocr_id=itm.c_reason_id','LEFT');
		$this->db->where('itm.c_id', $returnid);
		$query = $this->db->get('tbl_cancel_item itm');
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
	
	public function update($fld_vnd,$vnd,$data,$table) {
        $this->db->where($fld_vnd, $vnd);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 

	public function updateItemPolicy($cid,$data,$table){
        $this->db->where('c_id ', $cid);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 



    public function save($data,$table)
    {
    	//print_r($table);
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

	public function order_detail($ordid,$table)
	{
		$this->db->select('pd.ord_vendors as vnd_id,pd.pro_id as p_id,pd.op_id,cm.fees as commission,pd.pro_qty as qty,pd.pro_gst as tax,pd.pro_price as price,pd.pro_coupon as coupon,pd.pro_discount_value as discount,ord.ord_deliver_charge as deliver,rfd.rfd_id as rfd_qty,rfd.rfd_amount');
		$this->db->join('tbl_orders_product pd','pd.ord_id=ord.ord_id','LEFT');
		$this->db->join('tbl_refund_amount rfd','rfd.rfd_ord_id=pd.ord_id AND rfd.rfd_p_id=pd.pro_id ','LEFT');
		$this->db->join('tbl_product p','p.p_id=pd.pro_id','LEFT');
		$this->db->join('tbl_commission cm','(cm.cate_id=p.p_cate AND cm.vnd_id=p.p_vnd_id) OR (cm.cate_id=p.p_cate)','LEFT');
		$this->db->order_by('ord.ord_id', 'DESC');
		$this->db->where('ord.ord_id',$ordid);
		$query = $this->db->get($table.' ord');
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

	public function check_vendor($vnd_fld,$vnd_id,$table)
	{
		$this->db->where($vnd_fld,$vnd_id);
		$this->db->limit(1);
		$query = $this->db->get($table);
		// $this->db->last_query();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function belance_setting()
	{
		$this->db->select('min_value,value');	
		$this->db->where('name','Min_Wallet');
		$query = $this->db->get('tbl_setting');
		echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_cancel_product($id,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,vnd.vnd_name,ord.ord_reference_no,ord.order_status,orp.pro_name,orp.pro_price,ocr.ocr_title,ct.*');
		$this->db->join('tbl_customer cust','cust.cust_id=ct.c_cust_id','LEFT');	
		$this->db->join('tbl_vendor vnd','vnd.vnd_id=ct.c_ven_id','LEFT');
		$this->db->join('tbl_orders ord','ord.ord_id=ct.c_order_id','LEFT');
		$this->db->join('tbl_orders_product orp','orp.pro_id=ct.c_pro_id AND orp.ord_id=ct.c_order_id','LEFT');
		$this->db->join('tbl_order_cancel_reasons ocr','ocr.ocr_id=ct.c_reason_id','LEFT');
		$this->db->order_by('ct.c_id','ASC');
		$query = $this->db->get($table. ' ct');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
  public function get_refund_product($id,$table)
	{
		$this->db->select('cust.cust_fname,cust.cust_lname,vnd.vnd_name,ord.ord_reference_no,ord.order_status,orp.pro_name,orp.pro_price,ocr.ocr_title,ct.*');
		$this->db->join('tbl_customer cust','cust.cust_id=ct.c_cust_id','LEFT');	
		$this->db->join('tbl_vendor vnd','vnd.vnd_id=ct.c_ven_id','LEFT');
		$this->db->join('tbl_orders ord','ord.ord_id=rfd.rfd_ord_id','LEFT');
		$this->db->join('tbl_orders_product orp','orp.pro_id=rfd.rfd_p_id AND orp.ord_id=ord.rfd_ord_id','LEFT');		
		$this->db->order_by('rfd.rfd_id','ASC');
		$query = $this->db->get($table. ' rfd');
		// echo $this->db->last_query();
		// die;
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

}
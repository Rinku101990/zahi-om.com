<?php 
class Dashboard_Model extends MY_Model{
	
	  
	 
	public function product_complete($vnd_id,$tabel){
		
	     $this->db->select('sum((op.pro_price*op.pro_qty+op.pro_gst)-(op.pro_coupon+op.pro_discount_value)) AS amount');
		 $this->db->from($tabel.'  op');	
		 $this->db->join('tbl_orders  ord','ord.ord_id=op.ord_id','LEFT');
		 $this->db->where('op.ord_vendors',$vnd_id);	
		 $this->db->where('ord.order_status','Delivered');	
		 $this->db->limit(1);	
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row()->amount;
		 }else{
			 return false;
		 }
		 
	 }

	 public function product_proccess($vnd_id,$tabel){
		
	     $this->db->select('sum((op.pro_price*op.pro_qty+op.pro_gst)-(op.pro_coupon+op.pro_discount_value)) AS amount');
		 $this->db->from($tabel.'  op');	
		 $this->db->join('tbl_orders  ord','ord.ord_id=op.ord_id','LEFT');
		 $this->db->where('op.ord_vendors',$vnd_id);	
		 $this->db->where('ord.order_status','InProcess');	
		 $this->db->limit(1);	
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row()->amount;
		 }else{
			 return false;
		 }
		 
	 }


	  public function credit_today($vnd_id,$tabel){
		
	     $this->db->select('wlt_available_amount AS amount');
		 $this->db->where('wlt_vnd_id',$vnd_id);	
		  $this->db->order_by('wlt_id','DESC')	;	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		  // echo $this->db->last_query($query);
		  // die();
		 if($query->num_rows()== 1){
			return $query->row()->amount;
		 }else{
			 return false;
		 }
		 
	 }



	public function product_order($vnd_id,$tabel){
		
	     $this->db->select('count(op_id) AS count');
		 $this->db->from($tabel.'  op');	
		 $this->db->join('tbl_orders  ord','ord.ord_id=op.ord_id','LEFT');
		 $this->db->where('op.ord_vendors',$vnd_id);	
		 $this->db->where('ord.order_status','Delivered');
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row()->count;
		 }else{
			 return false;
		 }
		 
	 }

	 public function product_pending($vnd_id,$tabel){
		
	     $this->db->select('count(op_id) AS count');
		 $this->db->from($tabel.'  op');	
		 $this->db->join('tbl_orders  ord','ord.ord_id=op.ord_id','LEFT');
		 $this->db->where('op.ord_vendors',$vnd_id);	
		 $this->db->where('ord.order_status !=','Waiting');
		 $this->db->where('op.pro_starus','InProcess');			
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row()->count;
		 }else{
			 return false;
		 }
		 
	 }
	 public function product_shipped($vnd_id,$tabel){
		
	     $this->db->select('count(op_id) AS count');
		 $this->db->from($tabel.'  op');	
		 $this->db->join('tbl_orders  ord','ord.ord_id=op.ord_id','LEFT');
		 $this->db->where('op.ord_vendors',$vnd_id);	
		 $this->db->where('ord.order_status !=','Waiting');
		 $this->db->where('op.pro_starus','Shipped');			
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row()->count;
		 }else{
			 return false;
		 }
		 
	 }

	  public function refunt_product($vnd_id,$tabel){
		 $date=date('Y-m-d');
	     $this->db->select('count(rm.rfd_id) AS count,sum(rm.rfd_amount) AS amount');
		 $this->db->from($tabel.'  rm');	
		 $this->db->join('tbl_product  pro','pro.p_id=rm.rfd_p_id','LEFT');
		 $this->db->where('pro.p_vnd_id',$vnd_id);		
		 $this->db->where("DATE_FORMAT(rm.rfd_created,'%Y-%m')",$date);	
		 $this->db->limit(1);			
		 $query=$this->db->get();
		 // echo $this->db->last_query($query);
		 // die();
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }


	 public function product_total($vnd_id,$tabel){	
	     $this->db->select('count(p_id) AS count');
		 $this->db->from($tabel);			 
		 $this->db->where('p_vnd_id',$vnd_id);		
		 $this->db->limit(1);			
		 $query=$this->db->get();		
		 if($query->num_rows()== 1){
			return $query->row()->count;
		 }else{
			 return false;
		 }
		 
	 }
	

	public function hot_total($vnd_id,$tabel){	 
		$date=date('Y-m-d');
		$this->db->select('count(tp.p_id) AS count');
		$this->db->from($tabel.' tp');	
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');		
		$this->db->where('sp.sp_status','1');
		$this->db->where('sp.sp_start_date <=', $date);				
		$this->db->where('sp.sp_end_date >=', $date);
		 $this->db->where('tp.p_vnd_id',$vnd_id);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row()->count;
		else return false;
	}

	public function featured_total($vnd_id,$tabel){	 
		$date=date('Y-m-d');
		$this->db->select('count(tp.p_id) AS count');
		$this->db->from($tabel.' tp');
		$this->db->where('tp.p_feature','1');	
		$this->db->where('tp.p_vnd_id',$vnd_id);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row()->count;
		else return false;
	}

	public function trending_total($vnd_id,$tabel){	 
		$date=date('Y-m-d');
		$this->db->select('count(tp.p_id) AS count');
		$this->db->from($tabel.' tp');
		$this->db->where('tp.p_trending','1');	
		$this->db->where('tp.p_vnd_id',$vnd_id);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row()->count;
		else return false;
	}
	 
	
	
	
}
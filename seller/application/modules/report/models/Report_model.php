<?php 
class Report_model extends MY_Model{	 

	function sales_report($vnd_fld_id,$vnd_id,$table){

	     $this->db->select('DATE_FORMAT(pd.ord_create, "%Y-%m-%d") as date,pd.pro_qty as qty,pd.pro_gst as tax,pd.pro_price as price,pd.pro_coupon as coupon,pd.pro_discount_value as discount,ord.ord_deliver_charge as deliver,rfd.rfd_id as rfd_qty,rfd.rfd_amount');	       
		  $this->db->order_by('`pd`.`op_id`',"DESC");		
		  $this->db->from($table .' pd');
		  $this->db->join('tbl_orders ord','ord.ord_id=pd.ord_id','LEFT');
		   $this->db->join('tbl_refund_amount rfd','rfd.rfd_ord_id=pd.ord_id AND rfd.rfd_p_id=pd.pro_id ','LEFT');		
		   $this->db->where('`ord`.`order_status` !=',"Waiting");
		  $this->db->where(`pd`.$vnd_fld_id,$vnd_id);			 		
		  $query=$this->db->get();
		  //echo $this->db->last_query($query);
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}


   function product_performance($vnd_fld_id,$vnd_id,$table){

	     $this->db->select('p.p_name,brd.brd_name,p.p_model,count(pd.pro_id) as sold');
		  $this->db->order_by('sold',"DESC");		
		  $this->db->from($table .' pd');
		  $this->db->join('tbl_product p','p.p_id=pd.pro_id','LEFT');
		  $this->db->join('tbl_brand brd','brd.brd_id=p.p_brand','LEFT');	
		  $this->db->join('tbl_orders ord','ord.ord_id=pd.ord_id','LEFT');	
		  $this->db->where(`pd`.$vnd_fld_id,$vnd_id);	
		  $this->db->where('`ord`.`order_status` !=',"Waiting");		 		
		  $query=$this->db->get();
		//echo $this->db->last_query($query);
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function product_inventory($vnd_fld_id,$vnd_id,$table){

	     $this->db->select('p.p_name,brd.brd_name,p.p_model,int.int_available_qty as qty');
		  $this->db->order_by('pd.op_id',"DESC");
		  $this->db->group_by('pd.pro_id',"DESC");		
		  $this->db->from($table .' pd');
		  $this->db->join('tbl_product p','p.p_id=pd.pro_id','LEFT');
		  $this->db->join('tbl_brand brd','brd.brd_id=p.p_brand','LEFT');		
		  $this->db->join('tbl_inventory int','int.int_pid=p.p_id','LEFT');		
		  $this->db->where(`pd`.$vnd_fld_id,$vnd_id);			 		
		  $query=$this->db->get();
		//echo $this->db->last_query($query);
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function inventory_status($vnd_fld_id,$vnd_id,$table){

	     $this->db->select('p.p_name,brd.brd_name,p.p_model,int.int_available_qty as qty');
		  $this->db->order_by('pd.op_id',"DESC");
		  $this->db->group_by('pd.pro_id',"DESC");		
		  $this->db->from($table .' pd');
		  $this->db->join('tbl_product p','p.p_id=pd.pro_id','LEFT');
		  $this->db->join('tbl_brand brd','brd.brd_id=p.p_brand','LEFT');		
		  $this->db->join('tbl_inventory int','int.int_pid=p.p_id','LEFT');		
		  $this->db->where(`pd`.$vnd_fld_id,$vnd_id);			 		
		  $query=$this->db->get();
		//echo $this->db->last_query($query);
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function comment_reviews($vnd_id,$table){

	     $this->db->select('pd.p_id,pd.p_name,brd.brd_name,pd.p_model');
		  $this->db->order_by('pd.p_id',"DESC");
		  // $this->db->group_by('pd.p_id',"DESC");		
		  $this->db->from($table .' pd');		 
		  $this->db->join('tbl_brand brd','brd.brd_id=pd.p_brand','LEFT');		
		  // $this->db->join('tbl_cmnts_reviews cr','cr.p_id=pd.p_id','LEFT');	
		  // $this->db->join('tbl_cmnts_reviews cm','cm.p_id=pd.p_id','LEFT');		
		  $this->db->where('pd.p_vnd_id',$vnd_id);
		  // $this->db->where('cr.type','1');	
		  // $this->db->or_where('cm.type','2');			 		
		  $query=$this->db->get();
		//echo $this->db->last_query($query);
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}




	
	
}
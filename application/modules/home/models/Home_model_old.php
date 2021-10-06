<?php 
class Home_model extends MY_Model{
	
	 
	function get_list($fld_name,$table){
		$this->db->order_by($fld_name,"asc");
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_banner_list($table){
		$this->db->order_by('slr_order',"asc");
		$this->db->where('slr_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_page($id,$table){					   
	    $this->db->where('pg_id',$id);
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function cate_cate_name($id,$table){		
		$this->db->select('cate_name as category,cate_name_ar as category_ar,cate_name as scategory,cate_name_ar as scategory_ar,cate_name as mcategory,cate_name_ar as mcategory_ar');
		$this->db->from($table);		
		$this->db->where('cate_id',$id);			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function cate_brand_name($id,$table){		
		$this->db->select('brd_name as category,brd_name_ar as category_ar,brd_name as scategory,brd_name_ar as scategory_ar,brd_name as mcategory,brd_name_ar as mcategory_ar');
		$this->db->from($table);		
		$this->db->where('brd_id',$id);			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function cate_vendor_name($id,$table){		
		$this->db->select('vnd_name as category,vnd_name as category_ar,vnd_name as scategory,vnd_name as scategory_ar,vnd_name as mcategory,vnd_name as mcategory_ar');
		$this->db->from($table);		
		$this->db->where('vnd_id',$id);			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function cate_sub_name($id,$table){		
		$this->db->select('scate.scate_name as category,scate.scate_name_ar as category_ar,scate.scate_name as scategory,scate.scate_name_ar as scategory_ar,cate.cate_name as mcategory,cate.cate_name_ar as mcategory_ar');	
		$this->db->join('tbl_category cate','cate.cate_id=scate.cate_id','LEFT');			
		$this->db->from($table.' scate');		
		$this->db->where('scate.scate_id',$id);			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function cate_child_name($id,$table){		
		$this->db->select('cld.child_name as category,cld.child_name_ar as category_ar,scate.scate_name as scategory,scate.scate_name_ar as scategory_ar,cate.cate_name as mcategory,cate.cate_name_ar as mcategory_ar');	
		$this->db->join('tbl_category cate','cate.cate_id=cld.cate_id','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=cld.scate_id','LEFT');		
		$this->db->from($table.' cld');		
		$this->db->where('cld.child_id',$id);			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}


	function hot_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('sp.sp_status','1');
		$this->db->where('sp.sp_start_date <=', $date);				
		$this->db->where('sp.sp_end_date >=', $date);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$this->db->limit('6','0');		
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function recent_product_list($table){	
		$this->db->select('cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_start_date,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');	
		$this->db->limit('6','0');	
		$query=$this->db->get();	
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function featured_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_feature','1');			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');	
		$this->db->limit('6','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function trending_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_trending','1');			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$this->db->limit('15','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function supplier_product_list($id,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_vendor vnd','vnd.vnd_id=tp.p_vnd_id','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('vnd.vnd_category',$id);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$this->db->limit('15','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


function categories_product_list($fld_val,$table){
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,sp.sp_end_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('cate.cate_slug',$fld_val);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		//die();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


	function get_cate_product_list($fld_val,$table){
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,sp.sp_end_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_navigation nave','nave.mn_category_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('cate.cate_id',$fld_val);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


	function get_sub_cate_product_list($fld_val,$table){
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,sp.sp_end_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('scate.scate_id',$fld_val);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


	function get_child_cate_product_list($fld_val,$table){
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,sp.sp_end_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('child.child_id',$fld_val);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_hot_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		//$this->db->join('tbl_brand tb','tb.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');		
		$this->db->where('sp.sp_status','1');
		$this->db->where('sp.sp_start_date <=', $date);				
		$this->db->where('sp.sp_end_date >=', $date);		
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');			
		$query=$this->db->get();
		// echo $this->db->last_query($query);
		// die();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	function get_featured_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_feature','1');			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_trending_product_list($table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_trending','1');			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function get_brand_product_list($fld_val,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		//$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_vnd_id',$fld_val);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function product_detail($fld_val,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_vnd_id,tp.p_cate,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,tp.p_lenght,tp.p_width,tp.p_height,tp.p_weight,tp.p_barcode,tp.p_short_description,tp.p_description,tp.p_short_description_ar,tp.p_description_ar,pl.p_warranty_policy,pl.p_return_policy,ut.ut_dime_name,ut2.ut_weight_name,pl.p_option_group,pl.option_grop,pl.option_grop_add,pl.option_grop,int.int_stock,int.int_available_qty,int.int_min_purchase_qty,int.int_custom,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,brd.brd_name');	
		$this->db->order_by('tp.p_id',"DESC");
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_unit ut','ut.ut_id=tp.p_dimensions','LEFT');
		$this->db->join('tbl_unit ut2','ut2.ut_id=tp.p_weigth_unit','LEFT');
		$this->db->join('tbl_product_link pl','pl.p_id=tp.p_id','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_id',$fld_val);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	function related_product($fld_val,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,`sp`.`sp_end_date`,`sp`.`sp_start_date`,pimg.pg_image,brd.brd_name');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('child.child_slug',$fld_val);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');	
		$this->db->limit('15','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

    function color_list($table){
     	$this->db->select('opt_id,opt_name,opt_slug,opt_value');
		$this->db->order_by('opt_id',"ASC");
		$this->db->where('opt_status','1');	
		$this->db->where('opt_display','1');	
		$this->db->where('opt_id','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	 function size_list($table){
     	$this->db->select('opt_id,opt_name,opt_slug,opt_value');
		$this->db->order_by('opt_id',"ASC");
		$this->db->where('opt_status','1');	
		$this->db->where('opt_display','1');	
		$this->db->where('opt_id','2');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}



	function blog_list($table){
     	$this->db->select('blg_id,blg_title,blg_title_slug,blg_author_name,blg_pictures,blg_additionals,blg_categories,blg_descriptions,blg_created');
		$this->db->order_by('blg_id',"DESC");	
		$this->db->where('blg_status','0');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function vendor_list($table){
     	$this->db->select('vnd_id,vnd_name,vnd_picture');
		$this->db->order_by('vnd_id',"DESC");
		$this->db->where('vnd_VerifiedStatus','1');	
		$this->db->where('vnd_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function brand_list($table){
     	$this->db->select('brd_id,brd_name,brd_slug,brd_img');
		$this->db->order_by('brd_id',"DESC");
		$this->db->where('brd_status','1');	
		$this->db->where('brd_remove','0');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function price_symbol(){		
		$this->db->select('cr.symbol');
		$this->db->join('tbl_currency cr','cr.id=w.web_currency','LEFT');
		$this->db->from('tbl_website_info'.' w');
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row()->symbol;
		else return false;
	}

	function seller_list($table){
     	$this->db->select('vnd_id,vnd_name');
		$this->db->order_by('vnd_id',"ASC");
		$this->db->where('vnd_status','1');	
		$this->db->where('vnd_VerifiedStatus','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}


	function get_category_list($table){
		$this->db->select('cate_id,cate_name,cate_slug,cate_img,cate_icon');
		$this->db->order_by('cate_id',"asc");
		$this->db->where('cate_status','1');
		$this->db->where('cate_remove','0');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	


	function signle_lable($fld_name,$fld_val,$table){	
		$this->db->where($fld_name,$fld_val);	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}


function make_query($page,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$supplier,$newest_first)
 { 
  $date=date('Y-m-d'); 
  if(isset($condition))
	 {
  $query = "SELECT `tp`.`p_id`, `tp`.`p_cate`, `tp`.`p_scate`, `tp`.`p_child`, `tp`.`p_reference_no`, `tp`.`p_name`,`tp`.`p_name_ar`, `tp`.`p_model`, `tp`.`p_selling_price`, `tp`.`p_short_description`, `sp`.`sp_end_date`,`cate`.`cate_name`, `scate`.`scate_name`, `child`.`child_name`, `sp`.`sp_special_price`,`sp`.`sp_end_date`,`sp`.`sp_start_date`, `pimg`.`pg_image`,`brd`.`brd_name` as `vnd_name` FROM `tbl_product` `tp` LEFT JOIN `tbl_special_price` `sp` ON `sp`.`sp_pid`=`tp`.`p_id` LEFT JOIN `tbl_product_img` `pimg` ON `pimg`.`pg_pid`=`tp`.`p_id` LEFT JOIN `tbl_category` `cate` ON `cate`.`cate_id`=`tp`.`p_cate` LEFT JOIN `tbl_sub_category` `scate` ON `scate`.`scate_id`=`tp`.`p_scate` LEFT JOIN `tbl_child_category` `child` ON `child`.`child_id`=`tp`.`p_child` LEFT JOIN `tbl_product_link` `pl` ON `pl`.`p_id`=`tp`.`p_id` LEFT JOIN `tbl_inventory` `int` ON `int`.`int_pid`=`tp`.`p_id` LEFT JOIN `tbl_brand` `brd` ON `brd`.`brd_id`=`tp`.`p_brand` WHERE `tp`.`p_status` = '1' AND `tp`.`p_approval_status` = '0' 
    ";  
    //LEFT JOIN `tbl_vendor` `vnd` ON `vnd`.`vnd_category`=`tp`.`p_vnd_id`
}else{
	$query = "SELECT `tp`.`p_id`, `tp`.`p_cate`, `tp`.`p_scate`, `tp`.`p_child`, `tp`.`p_reference_no`, `tp`.`p_name`,`tp`.`p_name_ar`, `tp`.`p_model`, `tp`.`p_selling_price`, `tp`.`p_short_description`, `sp`.`sp_end_date`,`cate`.`cate_name`, `scate`.`scate_name`, `child`.`child_name`, `sp`.`sp_special_price`,`sp`.`sp_end_date`,`sp`.`sp_start_date`, `pimg`.`pg_image`,`brd`.`brd_name` as `vnd_name` FROM `tbl_product` `tp` LEFT JOIN `tbl_special_price` `sp` ON `sp`.`sp_pid`=`tp`.`p_id` LEFT JOIN `tbl_product_img` `pimg` ON `pimg`.`pg_pid`=`tp`.`p_id` LEFT JOIN `tbl_category` `cate` ON `cate`.`cate_id`=`tp`.`p_cate` LEFT JOIN `tbl_sub_category` `scate` ON `scate`.`scate_id`=`tp`.`p_scate` LEFT JOIN `tbl_child_category` `child` ON `child`.`child_id`=`tp`.`p_child` LEFT JOIN `tbl_product_link` `pl` ON `pl`.`p_id`=`tp`.`p_id` LEFT JOIN `tbl_brand` `brd` ON `brd`.`brd_id`=`tp`.`p_brand`  WHERE `tp`.`p_status` = '1' AND `tp`.`p_approval_status` = '0' 
    ";  
//LEFT JOIN `tbl_vendor` `vnd` ON `vnd`.`vnd_category`=`tp`.`p_vnd_id`
}

    if(!empty($supplier))
	  	{  
	  	 $query .= " AND `tp`.`p_vnd_id` = '".$supplier."'";
	  	}

      if($hot=='1')
	  	{  
	  	 $query .= " AND `sp`.`sp_status` = '1' AND `sp`.`sp_start_date` <= '".$date."' AND `sp`.`sp_end_date` >= '".$date."'";
	  	}

	  if(!empty($featured))
	  	{  
	  	 $query .= " AND `tp`.`p_feature` = '1' ";
	  	}	 

	  if(!empty($trending))
	  	{  
	  	 $query .= " AND `tp`.`p_trending` = '1' ";
	  	}	 

       if(!empty($color)){	
            $get_color='';				
			foreach ($color as $key => $value) {
				if($key=='0'){
					$get_color .="`pl`.`option_grop` LIKE '%".$value."%' ";
				}else{
					$get_color .=" OR `pl`.`option_grop` LIKE '%".$value."%' ";
				}
			}	
				
			$query .= "AND (".@$get_color.")";
		}

	 if(!empty($size)){	
	 $get_size='';		
			foreach ($size as $key => $value) {
				if($key=='0'){
					$get_size .="`pl`.`option_grop` LIKE '%".$value."%' ";
				}else{
					$get_size .=" OR `pl`.`option_grop` LIKE '%".$value."%' ";
				}
			}	
				
			$query .= "AND (".$get_size.")";
		}

		 // if(!empty($category))
		 //  {
		 //   $category_filter = implode("','", $category);
		 //   $query .= " AND `tp`.`p_cate` IN('".$category_filter."')";
		 //  }
  
   if(!empty($category))
	  {  
	   $query .= " AND `tp`.`p_cate` = '".$category."'";
	  }else{ $query .= " AND `pl`.`p_cate` LIKE '%".$category2."'"; }

   if(!empty($sub_category))
	{  
	   $query .= " AND `tp`.`p_scate` = '".$sub_category."'";
	}else{ $query .= " AND `pl`.`p_scate` LIKE '%".$sub_category."'"; }

	if(!empty($child_category))
	  {  
	   $query .= " AND `pl`.`p_child` LIKE '%".$child_category."%'";
	  }

	  if(!empty($price))
	  {   
		  $get_price=explode(' - ',$price);
		  $min_price=$get_price[0];
		  $max_price=$get_price[1];
		  $query .= "  AND `tp`.`p_selling_price` BETWEEN '".$min_price."' AND '".$max_price."'";
	  }
     
     if(!empty($brand))
		  {
		   $brand_filter = implode("','", $brand);
		    $query .= " AND `tp`.`p_vnd_id` IN('".$brand_filter."')";
		  // $query .= " AND `tp`.`p_brand` IN('".$brand_filter."')";
		  }


    if(isset($condition))
	 {
		 $condition_filter = implode("','", $condition);
		 $query .= " AND `int`.`int_condition` IN('".$condition_filter."')";
	  }
  
  if($newest_first=='1')
  {  
   $query .= "ORDER BY `tp`.`p_selling_price` ASC ";  
  }else if($newest_first=='2')
  {  
   $query .= "ORDER BY `tp`.`p_selling_price` DESC ";
  
  }
  else if($newest_first=='3')
  {  
   $query .= "ORDER BY `tp`.`p_name` ASC ";
  
  }
  else{$query .= "ORDER BY `tp`.`p_id` DESC ";}
 
  if(!empty($page))
  {  
  $product_limit=12;
  $start = ceil($page *  $product_limit);
   $query .= " LIMIT ".$start.", ".$product_limit; 
  }else  {$product_limit=12; $query .= " LIMIT 0, ".$product_limit; } 
  return $query;
 }

function product_data($page,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$supplier,$newest_first)
 {
    
 	$query = $this->make_query($page,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$supplier,$newest_first);
	  $data = $this->db->query($query);
	// echo $this->db->last_query($data);
	  $count = $data->num_rows();

	$output = '';
  if($data->num_rows() > 0)
  {
  	$date=date('Y-m-d');
  	$output .= '<div class="tab-pane fade show active" id="large" role="tabpanel">
                                    <div class="row cate_tab_product">';
	 foreach($data->result_array() as $row){
	
       if(!empty($row['pg_image'])){
        $img='<img src="'.base_url('seller/uploads/').slug($row['cate_name']).'/'.slug($row['scate_name']).'/'.slug($row['child_name']).'/'.explode(',',$row['pg_image'])[0].'" title="'.$row['p_name'].'" class="img-fit lazyloaded">';
         }else{
        $img='<img src="'.base_url('seller/uploads/default-image.png').'" title="'.$row['p_name'].'" class="hover-img1 img-fit lazyloaded">';
         }
        if(!empty($row['sp_special_price']) && $row['sp_start_date'] <= $date && $row['sp_end_date'] >= $date){
         $price=' <del class="old-product-price strong-400">'.$this->price_symbol().''.number_format($row['p_selling_price']).'</del><br/>
         <span class="product-price strong-600">'.$this->price_symbol().''.number_format($row['sp_special_price']).'</span>';
         
        }else{
        $price='<span class="product-price strong-600">'.$this->price_symbol().''.number_format($row['p_selling_price']).'</span>';
       }  
      $description = strlen($row['p_short_description']);
      if($description>230){
       $desc=substr($row['p_short_description'], '0', 230).'..';
       }else{
       $desc=$row['p_short_description'];
       }
       
      $count_user=get_star($row['p_id'])->count;
       $star_count=get_star($row['p_id'])->star_count;
    $website=$this->get_website('web_id','tbl_website_info');
         if($website->web_lang=='en'){
                        	$pname=$row['p_name'];
                        }else{$pname=$row['p_name_ar'];}
                       
     
	  	 $output .= ' <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                        <div class="product-box-2 bg-white alt-box my-md-2 mb-2">
                                            <div class="position-relative overflow-hidden">
                                                <a href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'" >'.$img.'
                                                </a>
                                            </div>
                                            <div class="" style="padding: 5px;background: #f3f3f3">
                                                <h2 class="product-title p-0 text-truncate">
                                                    <a href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'" class=" text-truncate">'.$pname.'</a>
                                                </h2>
                                                 <h2 class="product-title p-0 text-truncate">'.$row['vnd_name'].'
                        </h2>
                                              <!-- <div class="star-rating mb-1">';
        if($star_count){
        $output .= '  <ul>'.GetStar1(round($star_count/$count_user,1)).'</ul>';
        }else{
            $output .= '  <ul>'.GetStar1(0).'</ul>';
            
        }
       $output .= ' </div>-->
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                      '.$price.'
                                                    </div>
                                                    <div class="float-right">
                                 <button class=" btn" title="View Detail" style="
    background: #c19450;  padding: .175rem .35rem;">
                                <i class="la la-shopping-cart" style="
    color: #ffffff; font-size: 20px;"></i>
                                    </button>
                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class=" wishlist" style="    top: 8px;">
                                 <button type="button" onclick="btnwishlist(this)"  pid="'.$row['p_id'].'"  style="    border: none; padding: .175rem .35rem;background: transparent;" >
                                <i class="la la-heart-o" style="color: #c19450; font-size: 20px;"></i>  </button>
                                  </div>
                                    </div>
                                    ';

	  
	 }
	 
   }
  else
  {
   $output = '';
  }
  return $output; }
	
	
function Product_Search($search_fld,$search,$table)
 {
 	
 	$this->db->select('cate.cate_slug,cate.cate_name,scate.scate_slug,scate.scate_name,child.child_slug,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,pimg.pg_img,int.int_stock');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');		
		$this->db->where('tp.p_approval_status','0');
		$this->db->like('tp.'.$search_fld, $search, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
	 //echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
 }

 function Product_Brand_Search($search_fld,$search,$table)
 {
 	
 	$this->db->select('cate.cate_slug,cate.cate_name,scate.scate_slug,scate.scate_name,child.child_slug,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,pimg.pg_img,int.int_stock');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');		
		$this->db->where('tp.p_approval_status','0');
		$this->db->like('brd.brd_name', $search, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
	 //echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
 }

  function Product_Cate_Search($search_fld,$search,$table)
 {
 	
 	$this->db->select('cate.cate_slug,cate.cate_name,scate.scate_slug,scate.scate_name,child.child_slug,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,pimg.pg_img,int.int_stock');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');		
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');		
		$this->db->where('tp.p_approval_status','0');
		$this->db->like('cate.cate_name', $search, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
	 //echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
 }
 function Product_Scate_Search($search_fld,$search,$table)
 {
 	
 	$this->db->select('cate.cate_slug,cate.cate_name,scate.scate_slug,scate.scate_name,child.child_slug,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,pimg.pg_img,int.int_stock');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');		
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');		
		$this->db->where('tp.p_approval_status','0');
		$this->db->like('scate.scate_name', $search, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
	 //echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
 }
 function Product_Child_Search($search_fld,$search,$table)
 {
 	
 	$this->db->select('cate.cate_slug,cate.cate_name,scate.scate_slug,scate.scate_name,child.child_slug,child.child_name,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,pimg.pg_img,int.int_stock');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');		
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_inventory int','int.int_pid=tp.p_id','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');		
		$this->db->where('tp.p_approval_status','0');
		$this->db->like('child.child_name', $search, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
	 //echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
 }
	

	function reviews_cmnts($id,$table){
		$this->db->select('tp. *,cust.cust_fname,cust.cust_lname,cust.cust_profile');
		$this->db->order_by('tp.id',"desc");
		$this->db->join('tbl_customer cust','cust.cust_id=tp.cust_id','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('tp.p_id',$id);	
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
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

    public function get_website($fld_id,$tabel){
		
		 $this->db->order_by($fld_id,"desc");
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	}

	
	
}
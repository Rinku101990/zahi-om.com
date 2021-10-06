<?php 
class Vendor_model extends MY_Model{
	
	public function get_vendor_profile($vnd_id,$slrid,$table)
	{
		$this->db->select('vnd_id,vnd_name,vnd_email,vnd_picture,vnd_created');
		$this->db->where($vnd_id,$slrid);
		$query = $this->db->get($table);
		if($query->num_rows() != 0)
			return $query->row();
		else
			return false;
	}

	public function get_master_profile($mst_id,$slrid,$table)
	{
		$this->db->select('mst_id,mst_name,mst_email,mst_picture,mst_role,mst_created');
		$this->db->where($mst_id,$slrid);
		$query = $this->db->get($table);
		if($query->num_rows() != 0)
			return $query->row();
		else
			return false;
	}
	 
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

	function hot_product_list($table){
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
		$this->db->limit('15','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function recent_product_list($table){	
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,sp.sp_special_price,pimg.pg_image');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');	
		$this->db->limit('15','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function featured_product_list($table){
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
		$this->db->limit('15','0');	
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function trending_product_list($table){
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
		$this->db->where('nave.mn_slug',$fld_val);		
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
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	
		$this->db->where('brd.brd_slug',$fld_val);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function product_detail($fld_val,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_vnd_id,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_lenght,tp.p_width,tp.p_height,tp.p_weight,tp.p_barcode,tp.p_short_description,tp.p_description,pl.p_warranty_policy,pl.p_return_policy,ut.ut_dime_name,ut2.ut_weight_name,pl.p_option_group,pl.option_grop,pl.option_grop_add,pl.option_grop,int.int_stock,int.int_min_purchase_qty,sp.sp_special_price,pimg.pg_image,brd.brd_name');	
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
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_short_description,sp.sp_special_price,pimg.pg_image,brd.brd_name');	
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
		$this->db->select('cate_id,cate_name,cate_slug,cate_img');
		$this->db->order_by('cate_name',"asc");
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


function make_query($page,$brand,$color,$size,$price,$grade,$condition,$category,$sub_category,$child_category,$hot,$featured,$trending,$newest_first)
 { 
  $date=date('Y-m-d');   
  $query = "SELECT `tp`.`p_id`, `tp`.`p_cate`, `tp`.`p_scate`, `tp`.`p_child`, `tp`.`p_reference_no`, `tp`.`p_name`, `tp`.`p_model`, `tp`.`p_selling_price`, `tp`.`p_short_description`, `sp`.`sp_end_date`,`cate`.`cate_slug`, `scate`.`scate_slug`, `child`.`child_slug`, `sp`.`sp_special_price`, `pimg`.`pg_image` FROM `tbl_product` `tp` LEFT JOIN `tbl_special_price` `sp` ON `sp`.`sp_pid`=`tp`.`p_id` LEFT JOIN `tbl_product_img` `pimg` ON `pimg`.`pg_pid`=`tp`.`p_id` LEFT JOIN `tbl_category` `cate` ON `cate`.`cate_id`=`tp`.`p_cate` LEFT JOIN `tbl_sub_category` `scate` ON `scate`.`scate_id`=`tp`.`p_scate` LEFT JOIN `tbl_child_category` `child` ON `child`.`child_id`=`tp`.`p_child` LEFT JOIN `tbl_product_link` `pl` ON `pl`.`p_id`=`tp`.`p_id` LEFT JOIN `tbl_inventory` `int` ON `int`.`int_pid`=`tp`.`p_id` WHERE `tp`.`p_status` = '1' AND `tp`.`p_approval_status` = '0' 
    ";  

      if(!empty($hot))
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
  
   if(!empty($category))
	  {  
	   $query .= " AND `tp`.`p_cate` = '".$category."'";
	  }

   if(!empty($sub_category))
	{  
	   $query .= " AND `tp`.`p_scate` = '".$sub_category."'";
	}

	if(!empty($child_category))
	  {  
	   $query .= " AND `tp`.`p_child` = '".$child_category."'";
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
		   $query .= " AND `tp`.`p_brand` IN('".$brand_filter."')";
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

function product_data($page,$brand,$color,$size,$price,$grade,$condition,$category,$sub_category,$child_category,$hot,$featured,$trending,$newest_first)
 {
 	$query = $this->make_query($page,$brand,$color,$size,$price,$grade,$condition,$category,$sub_category,$child_category,$hot,$featured,$trending,$newest_first);
	  $data = $this->db->query($query);
	  //echo $this->db->last_query($data);
	  $count = $data->num_rows();

	$output = '';
  if($data->num_rows() > 0)
  {
  	$output .= '<div class="tab-pane fade show active" id="large" role="tabpanel">
                                    <div class="row cate_tab_product">';
	 foreach($data->result_array() as $row){
	
       if(!empty($row['pg_image'])){
        $img='<img src="'.base_url('seller/uploads/').$row['cate_slug'].'/'.$row['scate_slug'].'/'.$row['child_slug'].'/'.explode(',',$row['pg_image'])[0].'" title="'.$row['p_name'].'" class="hover-img">';
         }else{
        $img='<img src="'.base_url('seller/uploads/default-image.png').'" title="'.$row['p_name'].'" class="hover-img1">';
         }
        if(!empty($row['sp_special_price'])){
         $price='<span class="new_price">'.$this->price_symbol().''.number_format($row['sp_special_price']).'</span>
          <span class="old_price">'.$this->price_symbol().''.number_format($row['p_selling_price']).'</span>';
        }else{
        $price='<span class="new_price">'.$this->price_symbol().''.number_format($row['p_selling_price']).'</span>';
       }  
      $description = strlen($row['p_short_description']);
      if($description>230){
       $desc=substr($row['p_short_description'], '0', 230).'..';
       }else{
       $desc=$row['p_short_description'];
       }
         
	  if($grade=='1'){
	  	 $output .= ' <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="single_product categorie">
                     <div class="product_thumb">
                     <a href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'">'.$img.'</a>     
                                      </div>
                     <div class="product_content" style="text-align: center  !important">
                     <div class="small_product_name">
                     <a title="'.$row['p_name'].'" href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'" class="product_title">'.$row['p_name'].'</a>
                      </div>
                      <div class="samll_product_ratting">
                      <ul><li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                           </ul>
                      </div>
                      <div class="small_product_price">
                       '.$price.'
                       </div>
                      </div>
                       </div>
                    </div> 
                                    ';

	  }else{
	  	 $output .= '<div class="col-lg-6 col-md-12 col-sm-12">
                     <div class="single_product categorie">   
                      <div class="row cate_tab_product">
                      <div class="col-lg-5 col-md-6 col-sm-6">
                      <div class="product_thumb">
                      <a href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'">'.$img.'</a>     
                      </div></div>
                       <div class="col-lg-7 col-md-6 col-sm-6">
                     <div class="product_content" style="text-align: left !important">
                     <div class="small_product_name categorie_name">
                     <a title="'.$row['p_name'].'" href="'.base_url('product/').encode($row['p_id']).'/'.slug($row['p_name']).'" class="product_title">'.$row['p_name'].'</a>
                      </div>
                      <div class="samll_product_ratting">
                      <ul><li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                          <li><a href="#"><i class="fa fa-star"></i></a></li>
                           </ul>
                      </div>
                      <div class="small_product_price categorie_prie">
                       '.$price.'
                       </div>
                        <div class="single__product_drsc">
                      <p align="justify">'.$desc.'</p>
                                                    </div>
                      </div>
                       </div>
                    </div> 
                     </div> 
                                    </div>
                                    ';

	  }
	 }
	  $output .= '</div></div>';
   }
  else
  {
   $output = '';
  }
  return $output; }
	
	

	
	

	
	
	
	
	
	
	

	

 
	
	
}
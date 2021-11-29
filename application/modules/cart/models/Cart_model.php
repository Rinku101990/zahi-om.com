<?php 
class Cart_model extends MY_Model{
		 

	/* ============For Product Deatils ============ */
	
	function product_detail($fld_val,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_id,cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,scate.scate_name,child.child_name,tp.p_id,tp.p_vnd_id,tp.p_reference_no,tp.p_name,tp.p_model,tp.p_selling_price,tp.p_tax,tp.p_lenght,tp.p_width,tp.p_height,tp.p_weight,tp.p_barcode,tp.p_short_description,tp.p_description,pl.p_warranty_policy,pl.p_return_policy,ut.ut_dime_name,ut2.ut_weight_name,pl.p_option_group,pl.option_grop_add,pl.option_grop,int.int_stock,int.int_available_qty,int.int_min_purchase_qty,sp.sp_price_type,sp.sp_special_price,sp.sp_start_date,sp.sp_end_date,pimg.pg_image,brd.brd_name');	
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


	public function product_sleeve($sleeve){		
		$this->db->select('sl_id,sl_name,sl_img,sl_price');	
		$this->db->order_by('sl_id',"DESC");		
		$this->db->from('tbl_sleeve');	
		$this->db->where('sl_id',$sleeve);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function get_color($intid){		
		$this->db->select('int_pid,int_selleing_price,int_available_qty,int_color');			
		$this->db->from('tbl_inventory');	
		$this->db->where('int_id',$intid);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	public function get_color_special($intid){	
	    $date=date('Y-m-d');	
		$this->db->select('sp_price_type,sp_special_price');			
		$this->db->from('tbl_special_price');
		$this->db->where('sp_start_date <=', $date);				
		$this->db->where('sp_end_date >=', $date);	
		$this->db->where('sp_pid',$intid);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		// if($query->num_rows() != 0) return $query->row()->sp_special_price;
		if($query->num_rows() != 0) return $query->row();
		else return '0';
	}

	public function get_color_size($pid,$intid){	
	   
		$this->db->select('int_size');			
		$this->db->from('tbl_inventory');
		$this->db->where('int_color',$intid);
		$this->db->where('int_pid',$pid);
		$this->db->group_by('int_size'); 
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	public function product_fabric($fabric){		
		$this->db->select('fb_id,fb_name,fb_img');	
		$this->db->order_by('fb_id',"DESC");		
		$this->db->from('tbl_fabric');	
		$this->db->where('fb_id',$fabric);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	public function product_color($color){		
		$this->db->select('cl_id,cl_name,cl_img');	
		$this->db->order_by('cl_id',"DESC");		
		$this->db->from('tbl_color');	
		$this->db->where('cl_id',$color);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	public function product_size($size){		
		$this->db->select('sz_id,sz_shoulder,sz_bust,sz_waist,sz_hips,sz_length,sz_img');	
		$this->db->order_by('sz_id',"DESC");		
		$this->db->from('tbl_size');	
		$this->db->where('sz_id',$size);
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
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

		/* ============For Insert Data============ */
	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
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

	
	
}
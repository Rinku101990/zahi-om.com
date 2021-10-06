<?php 
class Api_model extends MY_Model{
    
    public function getBannersList($id,$table){
        $this->db->select('slr_id,slr_img');
		$this->db->order_by($id,"asc");
		$this->db->where('slr_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
    
    /*--- Country List ---*/ 
    public function getCountryList($cntryid,$table)
	{
		$this->db->select('cnt_id,cnt_name');
		$this->db->order_by($cntryid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	/*--- State List ---*/ 
    public function getStateList($cntryid,$countryid,$table)
	{
		$this->db->select('st_id,cnt_id,st_name');
		$this->db->where($cntryid,$countryid);
		$this->db->order_by($cntryid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	/*--- City List ---*/ 
    public function getCityList($stateid,$stsid,$table)
	{
		$this->db->select('ct_id,st_id,ct_name');
		$this->db->where($stateid,$stsid);
		$this->db->order_by($stateid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	/*--- Pincode List ---*/ 
    public function getPincodeByCityId($cityid,$ctyid,$table)
	{
		$this->db->select('ct_id,zc_id,zc_zipcode');
		$this->db->where($cityid,$ctyid);
		$this->db->order_by($cityid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	 public function getPincodeList($zpid,$table)
	{
		$this->db->select('ct_id,zc_id,zc_zipcode');
		$this->db->order_by($zpid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0){ 
		    $pincode = $query->result();
		    $i=0;
            foreach($pincode as $pin){
                $pincode[$i]=array(
                    'id'=>$pin->zc_id,
                    'pincode'=>$pin->zc_zipcode,
                );
                $i++;
            }
            return $pincode;
		}
	}
	
	public function getRelatedMultipleImage($pid)
	{
	    $this->db->select('pg_id,pg_image');
		$this->db->where('pg_pid',$pid);
		$query=$this->db->get('tbl_product_img');	 
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	
    public function get_product_link($pid)
	{	
	    $this->db->select('option_grop_add');
		$this->db->where('p_id',$pid);
		$query=$this->db->get('tbl_product_link');	 
		if($query->num_rows()== 1) {
			return $query->row()->option_grop_add;
		} else {
			return false;
		}
	}

	/*--- USER SIGNUP AND LOGIN API MODEL ---*/ 
	public function check_email($cemail,$mail,$table)
	{	
	    $this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status,cust_EmailVerifiedStatus');
		$this->db->where($cemail,$mail);		 
		$this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	public function check_user_info($uemail,$emailAddress,$table)
	{
	    $this->db->select('cust_id,cust_email');		
		$this->db->where($uemail,$emailAddress);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
	public function user_login($mail,$password,$table)
	{
		$this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_phone_code,cust_phone,cust_profile,cust_gender,cust_dob,cust_country,cust_state,cust_city,cust_address,cust_pincode,cust_status,cust_EmailVerifiedStatus,cust_device_type,cust_device_token');		
		$this->db->where('cust_email',$mail);		
		$this->db->where('cust_password',$password);
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}

	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
	}
	
	public function update_last_login($uemail,$email,$data,$table){
	    $this->db->where($uemail, $email);
        $query=$this->db->update($table, $data);
        if($query){
			true;
		}else{
			return false;
		}
	}
	
	public function update($fld_email,$email,$data,$table) {
        $this->db->where($fld_email, $email);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 
    
    public function checkShipping($checkid,$id,$table)
	{
	    $this->db->select('fld_id');		
		$this->db->where($checkid,$id);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
    /*--- Check Shipping Address for Order Place ---*/ 	
	public function checkShippingAddressByCustomerId($customerid,$cid,$addressid,$aid,$table)
	{
	    $this->db->select('fld_id');		
		$this->db->where($customerid,$cid);
		$this->db->where($addressid,$aid);
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		//echo $this->db->last_query();
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
    
    public function delete($fld_bid,$id,$table)
	{ 
	    $this->db->where($fld_bid,$id);
	    $query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}
    
    public function get_profile($email,$table)
	{
	    $this->db->select('cs.cust_id,cs.cust_fname,cs.cust_lname,cs.cust_email,cs.cust_profile,cs.cust_gender,cs.cust_phone_code,cs.cust_phone,cs.cust_status');
		$this->db->where('cs.cust_email',$email);
		$query=$this->db->get($table.' cs');
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
    /*--- Get Customer Order Record ---*/
    public function getOrderList($custid,$id,$table)
	{
		$this->db->select('ord_id,ord_reference_no,ord_total_amounts,ord_pay_mode,order_status,ord_created_date');
		$this->db->where($custid,$id);
		$this->db->order_by($custid,'ASC');
		$query=$this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	/*--- SPECIFIC ORDER INFORMATION ---*/
	public function getOrderDetail($custid,$cid,$ordid,$oid,$table)
	{
	    $this->db->where($custid,$cid);		
		$this->db->where($ordid,$oid);
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1){
		 	return $query->row();
	    }else{
		 	return false;
	    }
	}
	/*--- PURCHASED PRODUCT LIST ---*/
	public function getPurchasedProductList($ordid,$oid,$table)
	{
		$this->db->where($ordid,$oid);
		$this->db->order_by($ordid,'ASC');
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	/*--- SHIPPING ADDRESS ---*/
	function getAddressList($custid,$id,$table){
		$this->db->select('ship.fld_id,ship.cust_id,ship.shippingFirstName,ship.shippingLastName,ship.shippingNumber,ship.shippingEmail,,cntry.cnt_name AS shippingCountry,sts.st_name AS shippingState,cty.ct_name AS shippingCity,ship.shippingPincode,ship.shippingAddress,ship.addressDefault,ship.addressType,ship.shippingCreated');
		$this->db->join('tbl_country cntry','cntry.cnt_id=ship.shippingCountry','LEFT');
		$this->db->join('tbl_state sts','sts.st_id=ship.shippingState','LEFT');
		$this->db->join('tbl_city cty','cty.ct_id=ship.shippingCity','LEFT');
		$this->db->where('ship.'.$custid,$id);
		$query=$this->db->get($table.' ship');
		if($query->num_rows() ==''){
			 return '';
		}else{
			 return $query->result();
		}
	}
	
	public function check_password($fld_email,$email,$fld_password,$password,$tabel)
	{
	  
        $this->db->where($fld_email,$email);		
		$this->db->where($fld_password,$password);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1){
		 	return $query->row();
	    }else{
		 	return false;
	    }	  
	}
	
    /*-- Category Model --*/ 	
    public function getCategoryList($id,$table){ 
		$this->db->select('cate_id,cate_name,cate_name_ar,cate_slug');
		$this->db->order_by($id,'DESC');	
		$this->db->where('cate_status', '1');	
		$this->db->where('cate_remove', '0');		
        $query = $this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}
	} 
	
	public function getSubCategoryList($id,$table){ 	
		$this->db->order_by('scate_name', 'ASC');
		$this->db->where('scate_status', '1');
		$this->db->where('scate_remove', '0');
        $query = $this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}
	} 

	public function getChildCategoryList($id, $table){ 
		$this->db->order_by('child_name', 'ASC');
		$this->db->where('child_status', '1');
		$this->db->where('child_remove', '0');
        $query = $this->db->get($table);
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->result();
		}
	}
	
	public function getBrandList($id, $table){
     	$this->db->select('vnd_id,vnd_name,vnd_picture');
		$this->db->order_by($id,"ASC");
		$this->db->where('vnd_VerifiedStatus','1');	
		$this->db->where('vnd_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function getCouponCodeList($id, $table){
     	$this->db->select('cup_id,cup_code,cup_discount,cup_min_order,cup_start_date,cup_end_date');
		$this->db->order_by($id,"ASC");
		$this->db->where('cup_status','1');	
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function getWishList($uid,$id,$table)
	{
	    $date=date('Y-m-d');
		$this->db->select('wh.id,cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_vnd_id,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('wh.id',"DESC");
		$this->db->join('tbl_product tp','tp.p_id=wh.pid','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');		
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' wh');	
		$this->db->where('wh.'.$uid,$id);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function checkWishlist($checkid,$id,$table)
	{
	    $this->db->select('id');		
		$this->db->where($checkid,$id);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
	public function checkWishlistExistByUser($custid,$cid,$proid,$pid,$table)
	{
	    $this->db->select('id');		
		$this->db->where($custid,$cid);	
		$this->db->where($proid,$pid);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	
		//echo $this->db->last_query();
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
	/*--- Cart ---*/
	public function checkCartExistByUser($custid,$cid,$proid,$pid,$table)
	{
	    $this->db->select('cart_id,cust_id,pro_id');		
		$this->db->where($custid,$cid);	
		$this->db->where($proid,$pid);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	
		//echo $this->db->last_query();
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
	public function updateCart($customerid,$cid,$productid,$pid,$data,$table)
	{
	    $this->db->where($customerid,$cid); 
	    $this->db->where($productid,$pid); 
		$query=$this->db->update($table,$data);
		//echo $this->db->last_query(); 
		if($query){
			return true;
		}else{
			return false; 
		}   
	}
	
/*--- Cart Data For Order Place ---*/ 	
	public function getCartListForOrderplaceByCustomer($customerid,$cid,$table)
	{
	    $date=date('Y-m-d');
		$this->db->select('crt.cart_id, crt.cust_id, crt.pro_id, crt.pro_qty,cate.cate_name,scate.scate_name,child.child_name,tp.p_cate,tp.p_scate,tp.p_child, tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('crt.cart_id',"ASC");		
		$this->db->join('tbl_product tp','tp.p_id=crt.pro_id','LEFT');
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' crt');
		$this->db->where('crt.'.$customerid,$cid);
		$query=$this->db->get();
		if($query->num_rows() != 0){ 
		    $cartlist = $query->result();
		    $i=0;
            foreach($cartlist as $cvalue)
            {
                /*--- Wishlist ---*/ 
                if($cid!=0){
    		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$cid,'pid',$cvalue->pro_id,'tbl_wishlist');
    		    }
                if($cvalue->pro_id== @$wishlistByUser){
                    $favourite = '1';
                }else{
                    $favourite = '0';
                }
                
                $cartlist[$i]=array(
                    'cart_id'=>$cvalue->cart_id,
                    'cart_custid'=>$cvalue->cust_id,
                    'cart_proid'=>$cvalue->pro_id,
                    'cart_cate'=>$cvalue->cate_name,
                    'cart_subcate'=>$cvalue->scate_name,
                    'cart_child'=>$cvalue->child_name,
                    'cart_vendor'=>$cvalue->vnd_name,
                    'cart_name'=>$cvalue->p_name,
                    'cart_image'=>base_url('seller/uploads/').slug($cvalue->cate_name).'/'.slug($cvalue->scate_name).'/'.slug($cvalue->child_name).'/'.$cvalue->pg_img,
                    'cart_selling_price'=>$cvalue->p_selling_price,
                    'cart_offer_price'=>$cvalue->sp_special_price,
                    'cart_qty'=>$cvalue->pro_qty,
                    'cart_favourite'=>$favourite
                );
                $i++;
            }
            $newCartList = $cartlist;
            return $newCartList;
		}
	}
	
/*--- Cart List By Customer Id ---*/ 	
	public function getCartList($customerid,$cid,$table)
	{
	    $date=date('Y-m-d');
		$this->db->select('crt.cart_id, crt.cust_id, crt.pro_id, crt.pro_qty,cate.cate_name,scate.scate_name,child.child_name,tp.p_cate,tp.p_scate,tp.p_child, tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('crt.cart_id',"ASC");		
		$this->db->join('tbl_product tp','tp.p_id=crt.pro_id','LEFT');
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' crt');
		$this->db->where('crt.'.$customerid,$cid);
		$query=$this->db->get();
		if($query->num_rows() != 0){ 
		    $cartlist = $query->result();
		    $i=0;
            foreach($cartlist as $cvalue)
            {
                /*--- Wishlist ---*/ 
                if($cid!=0){
    		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$cid,'pid',$cvalue->pro_id,'tbl_wishlist');
    		    }
                if($cvalue->pro_id== @$wishlistByUser){
                    $favourite = '1';
                }else{
                    $favourite = '0';
                }
                
                $cartlist[$i]=array(
                    'cart_id'=>$cvalue->cart_id,
                    'cart_custid'=>$cvalue->cust_id,
                    'cart_proid'=>$cvalue->pro_id,
                    'cart_cate'=>$cvalue->cate_name,
                    'cart_subcate'=>$cvalue->scate_name,
                    'cart_child'=>$cvalue->child_name,
                    'cart_vendor'=>$cvalue->vnd_name,
                    'cart_name'=>$cvalue->p_name,
                    'cart_image'=>base_url('seller/uploads/').slug($cvalue->cate_name).'/'.slug($cvalue->scate_name).'/'.slug($cvalue->child_name).'/'.$cvalue->pg_img,
                    'cart_selling_price'=>$cvalue->p_selling_price,
                    'cart_offer_price'=>$cvalue->sp_special_price,
                    'cart_qty'=>$cvalue->pro_qty,
                    'cart_favourite'=>$favourite
                );
                $i++;
            }
            $newCartList = $cartlist;
            return $newCartList;
		}
	}
	
	public function checkCartlist($cartid,$crtid,$table)
	{
	    $this->db->select('cart_id');		
		$this->db->where($cartid,$crtid);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	return $query->row();
	    }
	    else
	    {
		 	return false;
	    }
	}
	
	public function getReviewList($custid,$cid,$proid,$pid,$table)
	{
	    $this->db->select('id,cust_id,p_id,star,message');
		$this->db->where($custid,$cid);
		$this->db->where($proid,$pid);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function getProductWishlistByUserByProduct($customerid,$cid,$productid,$pid,$table)
	{
	    $this->db->select('id,pid');
		$this->db->where($customerid,$cid);
		$this->db->where($productid,$pid);
		$query=$this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	public function getProductWishlistByCustByProduct($customerid,$cid,$productid,$pid,$table)
	{
	    $this->db->select('id,pid');
		$this->db->where($customerid,$cid);
		$this->db->where($productid,$pid);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return '0';
	}
	
	/*---- Notification ----*/
	public function getNotificationList($custid,$cid,$table)
	{
	    $this->db->select('notification_id,notification_receiver_id,notification_type,notification_text,notification_read,notification_create');
		$this->db->where($custid,$cid);
		$query=$this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function getCartProductByUser($customerid,$cid,$productid,$pid,$table)
	{
	    $this->db->select('cart_id,pro_id');
		$this->db->where($customerid,$cid);
		$this->db->where($productid,$pid);
		$query=$this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	public function getProductCartlistByCustomerByProduct($customerid,$cid,$productid,$pid,$table)
	{
	    $this->db->select('cart_id,pro_id');
		$this->db->where($customerid,$cid);
		$this->db->where($productid,$pid);
		$query=$this->db->get($table);
		if($query->num_rows() != 0) return $query->row();
		else return '0';
	}
	
	public function getNotificationCountByUser($customerid,$cid,$table)
	{
	    $this->db->where($customerid,$cid);
        $this->db->where('notification_read','no');
        $query = $this->db->get($table)->num_rows();
        $customNotificationArray = array('unread'=>$query);
        $notification = $query;
        //$notification = array_merge(array( "title" => "notification"),array('dataItems' => $customNotificationArray));
        return $notification;
	}
	
	public function getNewArrivalProductList($lang,$custid,$table){	
		$this->db->select('cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_start_date,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
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
		$this->db->limit('20','0');	
		$query=$this->db->get();
		if($query->num_rows() != 0){ 
		    $newarrival = $query->result();
		    $i=0;
		    
		    if($lang=='en'){
		  
                foreach($newarrival as $new)
                {
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$new->p_id,'tbl_wishlist');
        		    }
        		    
                    if($new->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$new->p_id,'tbl_cart');
        		    }
                    if($new->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $newarrival[$i]=array(
                        'p_id'=>$new->p_id,
                        'p_cate'=>$new->cate_name,
                        'p_subcate'=>$new->scate_name,
                        'p_childcate'=>$new->child_name,
                        'p_vendor'=>$new->vnd_name,
                        'p_name'=>$new->p_name,
                        'p_image'=>base_url('seller/uploads/').slug($new->cate_name).'/'.slug($new->scate_name).'/'.slug($new->child_name).'/'.$new->pg_img,
                        'p_selling_price'=>$new->p_selling_price,
                        'p_offer_price'=>$new->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		    }else if($lang=='ar'){
		        
		        foreach($newarrival as $new)
                {
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$new->p_id,'tbl_wishlist');
        		    }
        		    
                    if($new->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$new->p_id,'tbl_cart');
        		    }
                    if($new->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $newarrival[$i]=array(
                        'p_id'=>$new->p_id,
                        'p_cate'=>$new->cate_name_ar,
                        'p_subcate'=>$new->scate_name_ar,
                        'p_childcate'=>$new->child_name_ar,
                        'p_vendor'=>$new->vnd_name,
                        'p_name'=>$new->p_name_ar,
                        'p_image'=>base_url('seller/uploads/').slug($new->cate_name).'/'.slug($new->scate_name).'/'.slug($new->child_name).'/'.$new->pg_img,
                        'p_selling_price'=>$new->p_selling_price,
                        'p_offer_price'=>$new->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		    }
            
            $newArrivalUpdate = array_merge(array( "title" => "New Arrival"),array('dataItems' => $newarrival));
            return $newArrivalUpdate;
		}
	}
	
	public function getHotProductsProductList($lang,$custid,$table){	
		$date=date('Y-m-d');
		$this->db->select('cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
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
		$this->db->limit('20','0');		
		$query=$this->db->get();
		if($query->num_rows() != 0){ 
		    $hotproducts = $query->result();
		    $i=0;
		    if($lang=='en'){
		        
		        foreach($hotproducts as $hot){
                
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$hot->p_id,'tbl_wishlist');
        		    }
                    if($hot->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$hot->p_id,'tbl_cart');
        		    }
                    if($hot->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $hotproducts[$i]=array(
                        'p_id'=>$hot->p_id,
                        'p_cate'=>$hot->cate_name,
                        'p_subcate'=>$hot->scate_name,
                        'p_childcate'=>$hot->child_name,
                        'p_vendor'=>$hot->vnd_name,
                        'p_name'=>$hot->p_name,
                        'p_image'=>base_url('seller/uploads/').slug($hot->cate_name).'/'.slug($hot->scate_name).'/'.slug($hot->child_name).'/'.$hot->pg_img,
                        'p_selling_price'=>$hot->p_selling_price,
                        'p_offer_price'=>$hot->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
                
		    }else if($lang=='ar'){
		        
		        foreach($hotproducts as $hot){
                
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$hot->p_id,'tbl_wishlist');
        		    }
                    if($hot->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$hot->p_id,'tbl_cart');
        		    }
                    if($hot->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $hotproducts[$i]=array(
                        'p_id'=>$hot->p_id,
                        'p_cate'=>$hot->cate_name_ar,
                        'p_subcate'=>$hot->scate_name_ar,
                        'p_childcate'=>$hot->child_name_ar,
                        'p_vendor'=>$hot->vnd_name,
                        'p_name'=>$hot->p_name_ar,
                        'p_image'=>base_url('seller/uploads/').slug($hot->cate_name).'/'.slug($hot->scate_name).'/'.slug($hot->child_name).'/'.$hot->pg_img,
                        'p_selling_price'=>$hot->p_selling_price,
                        'p_offer_price'=>$hot->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		        
		    }
            
            
            $hotProductsUpdate = array_merge(array( "title" => "Hot Product"),array('dataItems' => $hotproducts));
            return $hotProductsUpdate;
		}
	}
	
	public function getFeatureProductsProductList($lang,$custid,$table){	
		$date=date('Y-m-d');
		$this->db->select('cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_img,brd.brd_name as vnd_name');	
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
		$this->db->limit('20','0');	
		$query=$this->db->get();
		if($query->num_rows() != 0){ 
		    $featureproducts = $query->result();
		    
		    $i=0;
		    
		    if($lang=='en'){
		        
		        foreach($featureproducts as $feature){
                    
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$feature->p_id,'tbl_wishlist');
        		    }
                    if($feature->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$feature->p_id,'tbl_cart');
        		    }
                    if($feature->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $featureproducts[$i]=array(
                        'p_id'=>$feature->p_id,
                        'p_cate'=>$feature->cate_name,
                        'p_subcate'=>$feature->scate_name,
                        'p_childcate'=>$feature->child_name,
                        'p_vendor'=>$feature->vnd_name,
                        'p_name'=>$feature->p_name,
                        'p_image'=>base_url('seller/uploads/').slug($feature->cate_name).'/'.slug($feature->scate_name).'/'.slug($feature->child_name).'/'.$feature->pg_img,
                        'p_selling_price'=>$feature->p_selling_price,
                        'p_offer_price'=>$feature->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		        
		    }else if($lang=='ar'){
		        
		        foreach($featureproducts as $feature){
                    
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$feature->p_id,'tbl_wishlist');
        		    }
                    if($feature->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$feature->p_id,'tbl_cart');
        		    }
                    if($feature->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $featureproducts[$i]=array(
                        'p_id'=>$feature->p_id,
                        'p_cate'=>$feature->cate_name_ar,
                        'p_subcate'=>$feature->scate_name_ar,
                        'p_childcate'=>$feature->child_name_ar,
                        'p_vendor'=>$feature->vnd_name,
                        'p_name'=>$feature->p_name_ar,
                        'p_image'=>base_url('seller/uploads/').slug($feature->cate_name).'/'.slug($feature->scate_name).'/'.slug($feature->child_name).'/'.$feature->pg_img,
                        'p_selling_price'=>$feature->p_selling_price,
                        'p_offer_price'=>$feature->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		        
		    }
            
            
            $featureProductsUpdate = array_merge(array( "title" => "Feature Product"),array('dataItems' => $featureproducts));
            return $featureProductsUpdate;
		}
	}
	
	public function getChildCategorProductsList($lang,$custid,$childid,$chid,$table){	
		$this->db->select('cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_cate,tp.p_scate,tp.p_child,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_selling_price,sp.sp_special_price,sp.sp_start_date,sp.sp_end_date,pimg.pg_img,brd.brd_name as vnd_name');	
		$this->db->order_by('tp.p_id',"DESC");		
		$this->db->join('tbl_special_price sp','sp.sp_pid=tp.p_id','LEFT');	
		$this->db->join('tbl_product_img pimg','pimg.pg_pid=tp.p_id','LEFT');
		$this->db->join('tbl_category cate','cate.cate_id=tp.p_cate','LEFT');
		$this->db->join('tbl_sub_category scate','scate.scate_id=tp.p_scate','LEFT');
		$this->db->join('tbl_child_category child','child.child_id=tp.p_child','LEFT');
		$this->db->join('tbl_brand brd','brd.brd_id=tp.p_brand','LEFT');
		$this->db->from($table.' tp');	  			
		$this->db->where('tp.'.$childid,$chid);
		$this->db->where('tp.p_status','1');
		$this->db->where('tp.p_approval_status','0');	
		$this->db->limit('20','0');	
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0){ 
		    $childCateProductsList = $query->result();
		    $i=0;
		    
		    if($lang=='en'){
		        
		        foreach($childCateProductsList as $childCatePro){
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$childCatePro->p_id,'tbl_wishlist');
        		    }
                    if($childCatePro->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$childCatePro->p_id,'tbl_cart');
        		    }
                    if($childCatePro->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $childCateProductsList[$i]=array(
                        'p_id'=>$childCatePro->p_id,
                        'p_cateid'=>$childCatePro->p_cate,
                        'p_scateid'=>$childCatePro->p_scate,
                        'p_childid'=>$childCatePro->p_child,
                        'p_cate'=>$childCatePro->cate_name,
                        'p_subcate'=>$childCatePro->scate_name,
                        'p_childcate'=>$childCatePro->child_name,
                        'p_vendor'=>$childCatePro->vnd_name,
                        'p_name'=>$childCatePro->p_name,
                        'p_image'=>base_url('seller/uploads/').slug($childCatePro->cate_name).'/'.slug($childCatePro->scate_name).'/'.slug($childCatePro->child_name).'/'.$childCatePro->pg_img,
                        'p_selling_price'=>$childCatePro->p_selling_price,
                        'p_offer_price'=>$childCatePro->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		        
		    }else if($lang=='ar'){
		        
		        foreach($childCateProductsList as $childCatePro){
                    /*--- Wishlist ---*/ 
                    if($custid!=0){
        		        $wishlistByUser = $this->getProductWishlistByCustByProduct('user_id',$custid,'pid',$childCatePro->p_id,'tbl_wishlist');
        		    }
                    if($childCatePro->p_id== @$wishlistByUser->pid){
                        $favourite = $wishlistByUser->id;
                    }else{
                        $favourite = '0';
                    }
                    /*--- Cart ---*/
                    if($custid!=0){
        		        $cartByUser = $this->getProductCartlistByCustomerByProduct('cust_id',$custid,'pro_id',$childCatePro->p_id,'tbl_cart');
        		    }
                    if($childCatePro->p_id== @$cartByUser->pro_id){
                        $cart = $cartByUser->cart_id;
                    }else{
                        $cart = '0';
                    }
                    
                    $childCateProductsList[$i]=array(
                        'p_id'=>$childCatePro->p_id,
                        'p_cateid'=>$childCatePro->p_cate,
                        'p_scateid'=>$childCatePro->p_scate,
                        'p_childid'=>$childCatePro->p_child,
                        'p_cate'=>$childCatePro->cate_name_ar,
                        'p_subcate'=>$childCatePro->scate_name_ar,
                        'p_childcate'=>$childCatePro->child_name_ar,
                        'p_vendor'=>$childCatePro->vnd_name,
                        'p_name'=>$childCatePro->p_name_ar,
                        'p_image'=>base_url('seller/uploads/').slug($childCatePro->cate_name).'/'.slug($childCatePro->scate_name).'/'.slug($childCatePro->child_name).'/'.$childCatePro->pg_img,
                        'p_selling_price'=>$childCatePro->p_selling_price,
                        'p_offer_price'=>$childCatePro->sp_special_price,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart
                    );
                    $i++;
                }
		        
		    }
            
            $childCategoryProductsUpdate = array_merge(array( "title" => "Child Category Products"),array('dataItems' => $childCateProductsList));
            return $childCategoryProductsUpdate;
		}
	}
	
    /*--- Child Category Filter & Sort ---*/ 	
	
	public function getChildCategoryFilterRelatedBrandList(){
     	$this->db->select('vnd_id,vnd_name');
		$this->db->order_by('vnd_id',"DESC");
		$this->db->where('vnd_VerifiedStatus','1');	
		$this->db->where('vnd_status','1');	
		$query=$this->db->get('tbl_vendor');
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
    /*--- Get data with english ---*/ 	
	public function getChildCategoryRelatedListEnglish($recordChild)
	{
	    $this->db->select('scate_id,scate_name');
	    $this->db->order_by('scate_name',"ASC");
        $this->db->where('cate_id', $recordChild);
        $child = $this->db->get('tbl_sub_category');
        $subcategories = $child->result();
        $i=0;
        foreach($subcategories as $scat){

            $subcategories[$i]->childcategory = $this->getSubCategoryRelatedChildListEnglish($scat->scate_id);
            $i++;
        }
        return $subcategories; 
	}
	/*--- Get data with arabic ---*/ 	
	public function getChildCategoryRelatedListArabic($recordChild)
	{
	    $this->db->select('scate_id,scate_name_ar AS scate_name');
	    $this->db->order_by('scate_name',"ASC");
        $this->db->where('cate_id', $recordChild);
        $child = $this->db->get('tbl_sub_category');
        $subcategories = $child->result();
        $i=0;
        foreach($subcategories as $scat){

            $subcategories[$i]->childcategory = $this->getSubCategoryRelatedChildListArabic($scat->scate_id);
            $i++;
        }
        return $subcategories; 
	}
	
	public function getSubCategoryRelatedChildListEnglish($childSubid)
	{
	    $this->db->select('child_id,child_name');
        $this->db->where('scate_id', $childSubid);
        $query = $this->db->get('tbl_child_category');
        return $query->result();
	}
	public function getSubCategoryRelatedChildListArabic($childSubid)
	{
	    $this->db->select('child_id,child_name_ar AS child_name');
        $this->db->where('scate_id', $childSubid);
        $query = $this->db->get('tbl_child_category');
        return $query->result();
	}
	
	public function getChildCategoryFilterList($lang,$childid,$cid,$table)
	{
	    $this->db->select('p_cate');		
		$this->db->where($childid,$cid);	
        $this->db->limit(1);		
		$query=$this->db->get($table);	 
		if($query->num_rows()== 1)
	    {
		 	$recordChild = $query->row()->p_cate;
	    }
	    else
	    {
		 	$recordChild='';
	    }
	    
	    if($lang=='en'){
	        $record['category'] = $this->getChildCategoryRelatedListEnglish($recordChild);
	    }else if($lang=='ar'){
	        $record['category'] = $this->getChildCategoryRelatedListArabic($recordChild);
	    }
	    
	    $record['price'] = array('Price Ranges' => array());
	    $getBrandRelatedList = $this->getChildCategoryFilterRelatedBrandList();
	    $record['brand'] = $getBrandRelatedList;
	    return $record;
	}
	
	public function getChildCategorySort()
	{
	    $myCustomSort = "Price low to high,Price high to low,Newest,Oldest";
	    $childCategorySort = explode(",",$myCustomSort);
	    $i=0;
        foreach($childCategorySort as $listSort)
        {
            $childCategorySort[$i]=array(
                'id'=>$i+1,
                'name'=>$listSort
            );
            $i++;
        }
	    return $childCategorySort;
	}
	
    /*--- End of the Child Category Filter & Sort ---*/
    
    
    /*--- Product Detail & Inventory ---*/ 
	public function getProductDetail($proid,$id,$table){
		$date=date('Y-m-d');
		$this->db->select('cate.cate_slug,scate.scate_slug,child.child_slug,cate.cate_name,cate.cate_name_ar,scate.scate_name,scate.scate_name_ar,child.child_name,child.child_name_ar,tp.p_id,tp.p_vnd_id,tp.p_cate,tp.p_reference_no,tp.p_name,tp.p_name_ar,tp.p_model,tp.p_model_ar,tp.p_model_ar,tp.p_selling_price,tp.p_lenght,tp.p_width,tp.p_height,tp.p_weight,tp.p_barcode,tp.p_short_description,tp.p_short_description_ar,tp.p_description,tp.p_description_ar,tp.p_description_ar,pl.p_warranty_policy,pl.p_return_policy,ut.ut_dime_name,ut2.ut_weight_name,pl.p_option_group,pl.option_grop,pl.option_grop_add,pl.option_grop,int.int_stock,int.int_available_qty,int.int_min_purchase_qty,int.int_custom,sp.sp_special_price,sp.sp_end_date,sp.sp_start_date,pimg.pg_image,brd.brd_name');	
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
		$this->db->where('tp.'.$proid,$id);			
		$this->db->where('tp.p_status','1');	
		$this->db->where('tp.p_approval_status','0');		
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	public function getinventoryDetail($proid,$id,$table){
		$this->db->select('int_size,size,int_color,int_custom,int_available_qty');	
		$this->db->order_by('int_id',"ASC");
		$this->db->from($table);	
		$this->db->where($proid,$id);
		$query=$this->db->get();
// 		echo $this->db->last_query($query);
// 		die;
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
    /*--- End Of the Product Detail & Inventor ---*/ 	
	
	
	/*--- Place Order Module ---*/ 	
	
	public function getSingleProduct($pid,$proid,$table)
	{
		$this->db->select('p_id,p_name,p_selling_price');
		$this->db->where($pid,$proid);
		$query=$this->db->get($table);
		//echo $this->db->last_query($query);
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	public function SaveOrderInformation($orderArray,$table){
		 
		$query=$this->db->insert($table,$orderArray);
		if($query) return $this->db->insert_id();
		else return false;
	}
	
	public function SaveOrderProduct($orderProducts,$table){
		 
		$query=$this->db->insert_batch($table,$orderProducts);
		if($query){
			return true;
		}else{
		   return false; 
		} 
	}
	
	/*-- End Of Order Update --*/ 	
    public function tax_list($table){		
		$this->db->select('txt_id,txt_name,txt_per');
	     $this->db->where('txt_status','1');
	     $this->db->order_by('txt_id','ASC');
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function getPageInfo($pgid,$id,$table){
	     $this->db->select('pg_id,pg_title,pg_title_ar,pg_banner_img,content1,content2');
		 $this->db->order_by($pgid,"desc");
		 $this->db->where($pgid,$id);	
		 $this->db->limit(1);	
		 $query=$this->db->get($table);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	}
	
    /*--- Order Update ---*/
	public function getOrderInfo($ordid)
	{
		$this->db->select('tod.*,tc.cust_fname,tc.cust_lname,tc.cust_phone,tc.cust_phone_code,tsa.*,cntry.cnt_name AS Country,sts.st_name AS State,cty.ct_name AS City,zp.zc_zipcode AS Zip');
		$this->db->join('tbl_customer tc','tc.cust_id = tod.cust_id','LEFT');
		$this->db->join('tbl_shipping_address tsa','tsa.fld_id = tod.ord_delivery_address','LEFT');
	    $this->db->join('tbl_country cntry','tsa.shippingCountry=cntry.cnt_id','LEFT');
		$this->db->join('tbl_state sts','tsa.shippingState=sts.st_id','LEFT');
		$this->db->join('tbl_city cty','tsa.shippingCity=cty.ct_id','LEFT');
		$this->db->join('tbl_zipcode zp','tsa.shippingPincode=zp.zc_id','LEFT');
		
		$this->db->from('tbl_orders tod');
		$this->db->where('tod.ord_reference_no='.$ordid.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}
	
	public function getOrderProductList($ordid)
	{
		$this->db->select('top.*,pdn.*');
		$this->db->from('tbl_orders_product top');
		$this->db->join('tbl_product pdn','pdn.p_id = top.pro_id','LEFT');
		//$this->db->join('tbl_product_attribute patr','patr.pro_attr_id=top.pro_attr_id','LEFT');
		$this->db->where('top.ord_id='.$ordid.'');
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	
	public function UpdateOrderInformation($ordRefId,$refId,$orderUpdate,$table)
	{
		$this->db->where($ordRefId,$refId); 
		$query=$this->db->update($table,$orderUpdate);
		//echo $this->db->last_query(); 
		if($query){
			return true;
		}else{
			return false; 
		} 

	}
	
	public function Update_inventory($data_invent,$id)
	{
		$this->db->where('int_id',$id); 
		$query=$this->db->update('tbl_inventory',$data_invent);
		//echo $this->db->last_query(); 
		if($query){
			return true;
		}else{
			return false; 
		} 
	}
	
    /*--- Search ---*/
    public function productKeywordSearch($search_fld,$keyword,$table)
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
		$this->db->like('tp.'.$search_fld, $keyword, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
		if($query->num_rows() != 0) return $query->result();
		else return false;
    }
    
    public function productBrandKeywordSearch($search_fld,$keyword,$table)
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
		$this->db->like('brd.brd_name', $keyword, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
		if($query->num_rows() != 0) return $query->result();
		else return false;
    }
    
    public function productCategoryKeywordSearch($search_fld,$keyword,$table)
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
		$this->db->like('cate.cate_name', $keyword, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
		if($query->num_rows() != 0) return $query->result();
		else return false;
    }
    
    public function productSubcategoryKeywordSearch($search_fld,$keyword,$table)
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
		$this->db->like('scate.scate_name', $keyword, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
		if($query->num_rows() != 0) return $query->result();
		else return false;
    }
    
    public function productChildKeywordSearch($search_fld,$keyword,$table)
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
		$this->db->like('child.child_name', $keyword, 'both');		
		$this->db->limit('10','0');	
		$query=$this->db->get();	
		if($query->num_rows() != 0) return $query->result();
		else return false;
     }
	
	
}
?>
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

	/*
		! Common Helper
		* ================
		* Common Helper application file for All Common function . 
		* This fileshould be included in all pages.  
		* @Author  :  Rinku Vishwakarma,Manish Kumar
		* @Created :  01 Nov 2019
	*/

	function date_formate($date)
	{

		return date_format(date_create($date) , 'd-M-Y ,h:i:s A');

	}

	function wishlist($userid)
	{
		$ci = get_instance();
		$ci
			->db
			->select('id');
		$ci
			->db
			->where('user_id', $userid);
		$query = $ci
			->db
			->get('tbl_wishlist');
		if ($query->num_rows() == '')
		{
			return '0';
		}
		else
		{
			return $query->num_rows();
		}
	}

	function currency($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('id', $id);
		$query = $ci
			->db
			->get('tbl_currency');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->symbol;
		}
	}

	function code($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cnt_code');
		$ci
			->db
			->where('cnt_id', $id);
		$query = $ci
			->db
			->get('tbl_country');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cnt_code;
		}
	}

	function vendor_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_name');
		$ci
			->db
			->where('vnd_id', $id);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vnd_name;
		}
	}
	function vndcountry($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_country');
		$ci
			->db
			->where('vnd_id', $id);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vnd_country;
		}
	}

	function seller()
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_id,vnd_name,vnd_name_ar');
		$ci
			->db
			->order_by('vnd_id', 'DESC');
		$ci
			->db
			->where('vnd_status', '1');
		$ci
			->db
			->where('vnd_VerifiedStatus', '1');
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function vendor_phone($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_id,vnd_name,vnd_phone,vnd_phone_code');
		$ci
			->db
			->where('vnd_id', $id);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function vendor_banner_img($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_banner_img');
		// $ci->db->order_by('vnd_id', 'DESC');
		// $ci->db->where('vnd_status', '1');
		$ci
			->db
			->where('vnd_id', $id);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vnd_banner_img;
		}
	}

	function category_img($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_img');
		$ci
			->db
			->where('cate_id', $id);
		$query = $ci
			->db
			->get('tbl_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_img;
		}
	}

	function cate_img($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('scate_img');
		$ci
			->db
			->order_by('scate_name', 'ASC');
		$ci
			->db
			->where('cate_id', $id);
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->scate_img;
		}
	}

	function scate_img($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('scate_img');
		$ci
			->db
			->order_by('scate_name', 'ASC');
		$ci
			->db
			->where('scate_id', $id);
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->scate_img;
		}
	}

	function child_img($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('child_banner_img');
		//$ci->db->order_by('scate_name', 'ASC');
		$ci
			->db
			->where('child_id', $id);
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->child_banner_img;
		}
	}

	function product_count($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('p_cate', $id);
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->num_rows();
		}
	}

	function product_vendor($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('p_vnd_id');
		$ci
			->db
			->where('p_id', $id);
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->p_vnd_id;
		}
	}

	function navigation()
	{
		$ci = get_instance();
		$ci
			->db
			->select('mn_id,mn_name,mn_slug,mn_name_ar,mn_category_id');
		$ci
			->db
			->order_by('mn_order', 'asc');
		$ci
			->db
			->where('mn_status', '1');
		//$ci->db->where('cate_remove', '0');
		$query = $ci
			->db
			->get('tbl_navigation');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function navigation_ar()
	{
		$ci = get_instance();
		$ci
			->db
			->select('mn_id,mn_name,mn_slug,mn_name_ar,mn_category_id');
		$ci
			->db
			->order_by('mn_order', 'DESC');
		$ci
			->db
			->where('mn_status', '1');
		//$ci->db->where('cate_remove', '0');
		$query = $ci
			->db
			->get('tbl_navigation');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function cate_slug($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_slug');
		$ci
			->db
			->where('cate_id', $id);
		$query = $ci
			->db
			->get('tbl_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_slug;
		}
	}

	function get_category()
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_id,cate_name,cate_name_ar,cate_slug,cate_img,cate_icon');
		$ci
			->db
			->order_by('cate_id', 'asc');
		$ci
			->db
			->where('cate_status', '1');
		$ci
			->db
			->where('cate_remove', '0');
		$query = $ci
			->db
			->get('tbl_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function sub_category($id)
	{
		$ci = get_instance();
		$ci
			->db
			->order_by('scate_name', 'ASC');
		$ci
			->db
			->where('cate_id', $id);
		$ci
			->db
			->where('scate_status', '1');
		$ci
			->db
			->where('scate_remove', '0');
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function child_category($id)
	{
		$ci = get_instance();
		$ci
			->db
			->order_by('child_name', 'ASC');
		$ci
			->db
			->where('scate_id', $id);
		$ci
			->db
			->where('child_status', '1');
		$ci
			->db
			->where('child_remove', '0');
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function category_list()
	{
		$ci = get_instance();
		$ci
			->db
			->order_by('cate_name', 'ASC');
		$ci
			->db
			->where('cate_status', '1');
		$ci
			->db
			->where('cate_remove', '0');
		$query = $ci
			->db
			->get('tbl_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function category_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('cate_id', $id);
		$query = $ci
			->db
			->get('tbl_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_name;
		}
	}
	function sub_category_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('scate_id', $id);
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->scate_name;
		}
	}
	function child_category_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('child_id', $id);
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->child_name;
		}
	}

	function cate_id($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_id');
		$ci
			->db
			->where('scate_id', $id);
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_id;
		}
	}

	function child_cate_id($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_id');
		$ci
			->db
			->where('child_id', $id);
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_id;
		}
	}

	function cate($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cate_id');
		$ci
			->db
			->where('scate_id', $id);
		$query = $ci
			->db
			->get('tbl_sub_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cate_id;
		}
	}

	function scate($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('scate_id');
		$ci
			->db
			->where('child_id', $id);
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->scate_id;
		}
	}
	function child_id($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('p_child');
		$ci
			->db
			->where('p_id', $id);
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->p_child;
		}
	}

	function product_id($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('p_id');
		$ci
			->db
			->where('p_child', $id);
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->p_id;
		}
	}
	function product($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('p_name');
		$ci
			->db
			->where('p_id', $id);
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->p_name;
		}
	}

	function max_price()
	{
		$ci = get_instance();
		$ci
			->db
			->select('p_selling_price');
		$ci
			->db
			->order_by('p_selling_price', 'DESC');
		$query = $ci
			->db
			->get('tbl_product');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->p_selling_price;
		}
	}

	function policy($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('pp_title,pp_description');
		$ci
			->db
			->where('pp_id', $id);
		$query = $ci
			->db
			->get('tbl_policy');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}
	function category_count($id, $vnd_id)
	{
		$array = array(
			'0',
			$vnd_id
		);
		$ci = get_instance();
		$ci
			->db
			->where('cate_id', $id);
		$ci
			->db
			->where_in('vnd_id', $array);
		$query = $ci
			->db
			->get('tbl_sub_category');
		$ci
			->db
			->last_query($query);
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->num_rows();
		}
	}
	function scategory_count($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('scate_id', $id);
		$query = $ci
			->db
			->get('tbl_child_category');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->num_rows();
		}
	}

	function brand($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('brd_name');
		$ci
			->db
			->where('brd_id', $id);
		$query = $ci
			->db
			->get('tbl_brand');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->brd_name;
		}
	}

	function get_brand()
	{
		$ci = get_instance();
		$ci
			->db
			->select('brd_id,brd_name');
		$ci
			->db
			->order_by('brd_name', 'ASC');
		$query = $ci
			->db
			->get('tbl_brand');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function dimensions($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('ut_dime_name');
		$ci
			->db
			->where('ut_id', $id);
		$query = $ci
			->db
			->get('tbl_unit');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->ut_dime_name;
		}
	}

	function unit($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('ut_weight_name');
		$ci
			->db
			->where('ut_id', $id);
		$query = $ci
			->db
			->get('tbl_unit');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->ut_weight_name;
		}
	}

	function vendor_profile($email)
	{
		$ci = get_instance();
		$ci
			->db
			->where('vnd_email', $email);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result() [0];
		}
	}
	function option($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('opt_id', $id);
		$ci
			->db
			->where('opt_status', '1');
		$query = $ci
			->db
			->get('tbl_option');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function intid($pid, $sid)
	{
		$ci = get_instance();
		$ci
			->db
			->select('int_id');
		$ci
			->db
			->where('int_size', $sid);
		$ci
			->db
			->where('int_pid', $pid);
		$query = $ci
			->db
			->get('tbl_inventory');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->int_id;
		}
	}

	function get_inventory($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('int_available_qty');
		$ci
			->db
			->where('int_id', $id);
		$query = $ci
			->db
			->get('tbl_inventory');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->int_available_qty;
		}
	}

	function inventory_size($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('int_id,int_size');
		$ci
			->db
			->where('int_pid', $id);
		$ci
			->db
			->group_by('int_size');
		//$ci->db->where('opt_status', '1');
		$query = $ci
			->db
			->get('tbl_inventory');
		// echo $ci->db->last_query($query);
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function inventory_color($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('int_id,int_color');
		$ci
			->db
			->group_by('int_color');
		$ci
			->db
			->where('int_pid', $id);
		//$ci->db->where('opt_status', '1');
		$query = $ci
			->db
			->get('tbl_inventory');
		// echo $ci->db->last_query($query);
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function pincode($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('zc_zipcode');
		$ci
			->db
			->where('zc_id', $id);
		$query = $ci
			->db
			->get('tbl_zipcode');
		if ($query->num_rows() == '')
		{
			return 'Admin';
		}
		else
		{
			return $query->row()->zc_zipcode;
		}
	}

	function tax($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('tx.txt_name,tx.txt_per');
		$ci
			->db
			->from('tbl_product tp');
		$ci
			->db
			->join('tbl_tax tx', 'tx.cate_id=tp.p_cate', 'LEFT');
		$ci
			->db
			->where('tp.p_id', $id);
		$ci
			->db
			->where('tx.txt_status', '1');
		$query = $ci
			->db
			->get();
		if ($query->num_rows() == '')
		{
			return 'Admin';
		}
		else
		{
			return $query->result();
		}
	}

	function tax_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('txt_name');
		$ci
			->db
			->where('txt_id', $id);
		$ci
			->db
			->where('txt_status', '1');
		$query = $ci
			->db
			->get('tbl_tax');
		if ($query->num_rows() == '')
		{
			return 'Admin';
		}
		else
		{
			return $query->row()->txt_name;
		}
	}

	function delivery()
	{
		$ci = get_instance();
		$ci
			->db
			->select('min_value,value');
		$ci
			->db
			->where('name', 'Delivery Charge');
		$query = $ci
			->db
			->get('tbl_setting');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function delivery_st_charge($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('min_amount,amount');
		$ci
			->db
			->where('st_id', $id);
		$query = $ci
			->db
			->get('tbl_state');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function delivery_ct_charge($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('min_amount,amount');
		$ci
			->db
			->where('cnt_id', $id);
		$query = $ci
			->db
			->get('tbl_country');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function Order_id($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('ord_id');
		$ci
			->db
			->where('ord_reference_no', $id);
		$query = $ci
			->db
			->get('tbl_orders');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->ord_id;
		}
	}

	function getVnd_Id($email)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vndId');
		$ci
			->db
			->where('vndEmail', $email);
		$query = $ci
			->db
			->get('tbl_vendors');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vndId;
		}
	}

	function getVnd_name($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vnd_name');
		$ci
			->db
			->where('vnd_id', $id);
		$query = $ci
			->db
			->get('tbl_vendor');
		if ($query->num_rows() == '')
		{
			return 'ZAHI';
		}
		else
		{
			return $query->row()->vnd_name;
		}
	}
	function getVnd_email($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vndEmail');
		$ci
			->db
			->where('vndId', $id);
		$query = $ci
			->db
			->get('tbl_vendors');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vndEmail;
		}
	}
	function getVnd_phone($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vndPhone');
		$ci
			->db
			->where('vndId', $id);
		$query = $ci
			->db
			->get('tbl_vendors');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vndPhone;
		}
	}

	function phone_code($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cnt_code');
		$ci
			->db
			->where('cnt_id', $id);
		$query = $ci
			->db
			->get('tbl_country');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cnt_code;
		}
	}

	function country($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('cnt_name');
		$ci
			->db
			->where('cnt_id', $id);
		$query = $ci
			->db
			->get('tbl_country');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->cnt_name;
		}
	}

	function country_code()
	{
		$ci = get_instance();
		$ci
			->db
			->select('cnt_id,cnt_name,cnt_code');
		$ci
			->db
			->order_by('cnt_name', 'ASC');
		$ci
			->db
			->where('cnt_status', '1');
		$query = $ci
			->db
			->get('tbl_country');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->result();
		}
	}

	function lang($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('name');
		$ci
			->db
			->where('id', $id);
		$query = $ci
			->db
			->get('tbl_settings');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->name;
		}
	}

	function lang_ar($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('name_ar');
		$ci
			->db
			->where('id', $id);
		$query = $ci
			->db
			->get('tbl_settings');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->name_ar;
		}
	}

	function state($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('st_name');
		$ci
			->db
			->where('st_id', $id);
		$query = $ci
			->db
			->get('tbl_state');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->st_name;
		}
	}

	function city($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('ct_name');
		$ci
			->db
			->where('ct_id', $id);
		$query = $ci
			->db
			->get('tbl_city');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->ct_name;
		}
	}

	function customer($id)
	{
		$ci = get_instance();
		$ci
			->db
			->where('cust_id', $id);
		$query = $ci
			->db
			->get('tbl_customer');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function category_banner($slug)
	{
		$ci = get_instance();
		$ci
			->db
			->where('mn_slug', $slug);
		$query = $ci
			->db
			->get('tbl_navigation');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function discount($id, $amount, $qty)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vd_min_purchase_qty,vd_discount');
		$ci
			->db
			->where('vd_pid', $id);
		$query = $ci
			->db
			->get('tbl_volume_discount');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			//return $query->row();
			if ($query->row()->vd_min_purchase_qty <= $qty)
			{
				$data = $query->row()->vd_discount * $amount / 100;
			}
			else
			{
				$data = '0';
			}
			return $data;
		}
	}
	function discount_per($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('vd_discount');
		$ci
			->db
			->where('vd_pid', $id);
		$query = $ci
			->db
			->get('tbl_volume_discount');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row()->vd_discount;
		}
	}

	function reviews($cust_id, $pid)
	{
		$ci = get_instance();
		$ci
			->db
			->where('cust_id', $cust_id);
		$ci
			->db
			->where('p_id', $pid);
		$ci
			->db
			->where('type', '1');
		$query = $ci
			->db
			->get('tbl_cmnts_reviews');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}
	function comments($cust_id, $pid)
	{
		$ci = get_instance();
		$ci
			->db
			->where('cust_id', $cust_id);
		$ci
			->db
			->where('p_id', $pid);
		$ci
			->db
			->where('type', '2');
		$query = $ci
			->db
			->get('tbl_cmnts_reviews');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function cancel_item($pid, $ordid)
	{
		$ci = get_instance();
		$ci
			->db
			->where('c_pro_id', $pid);
		$ci
			->db
			->where('c_order_id', $ordid);
		$query = $ci
			->db
			->get('tbl_cancel_item');
		// $ci->db->last_query($query);
		if ($query->num_rows() == 1)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}

	function get_star($pid)
	{
		$ci = get_instance();
		$ci
			->db
			->select('count(*) AS count,SUM(star) AS star_count');
		$ci
			->db
			->where('p_id', $pid);
		$ci
			->db
			->where('type', '1');
		$query = $ci
			->db
			->get('tbl_cmnts_reviews');
		// $ci->db->last_query($query);
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	function star($count)
	{
		$nubmer = 5 - $count;
		if (!empty($count))
		{
			for ($x = 1;$x <= $count;$x++)
			{
				echo '<li><i class="fa fa-star"></i></li>';
			}
		}
		if (!empty($nubmer))
		{
			for ($x = 1;$x <= $nubmer;$x++)
			{
				echo '<li><i class="fa fa-star-o"></i></li>';
			}
		}
	}

	function company_detail()
	{
		$ci = get_instance();
		$ci
			->db
			->limit(1);
		$query = $ci
			->db
			->get('tbl_website_info');
		if ($query->num_rows() == 1)
		{
			$website = $query->row();
		}
		$logo = '<img src="' . site_url('admin/uploads/website/logo/') . $website->web_company_logo . '" title="' . $website->web_company_name . '">';
		$url = base_url();
		$social_media_icons = '<img src="' . base_url() . 'seller/assets/img/facebook.png" title="Facebook" style="width:40px;">
		<img src="' . base_url() . 'seller/assets/img/twitter.png" title="Twitter" style="width:40px;">
		<img src="' . base_url() . 'seller/assets/img/google-pluse.png" title="Google Pluse" style="width:40px;">
		<img src="' . base_url() . 'seller/assets/img/youtube.png" title="Youtube" style="width:40px;">';

		$data = array(
			'Company_Logo' => $logo,
			'website_url' => $url,
			'social_media_icons' => $social_media_icons,
			'website_name' => $website->web_company_name,
			'contact_us_email' => $website->web_support_email

		);
		return $data;
	}

	function template($id)
	{
		$ci = get_instance();
		$ci
			->db
			->select('tp_name,tp_subject,tp_body');
		$ci
			->db
			->where('tp_id', $id);
		$ci
			->db
			->where('tp_status', '1');
		$query = $ci
			->db
			->get('tbl_template');
		if ($query->num_rows() == '')
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}

	/*------------ For Email Send Start -------------------------*/
	function email_send($to, $subject, $msg)
	{
		$ci = get_instance();
		// Load PHPMailer library
		$ci
			->load
			->library('phpmailer_lib');
		// PHPMailer object
		$mail = $ci
			->phpmailer_lib
			->load();
		$ci
			->db
			->limit(1);
		$query = $ci
			->db
			->get('tbl_website_info');
		if ($query->num_rows() == 1)
		{
			$website = $query->row();
		}

		$email_protocal = $website->web_email_protocal;
		if ($email_protocal == 'SMTP Email')
		{
			// SMTP configuration
			$mail->isSMTP();
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 0; /* Debug Mode */
			$mail->Host = $website->web_smtp_host_name; /* smtp.zoho.in OR smtp.gmail.com*/
			$mail->SMTPAuth = true;
			$mail->Username = $website->web_email_id;
			$mail->Password = $website->web_email_password;
			$mail->SMTPSecure = 'ssl'; /* SSL OR TLS */
			$mail->Port = $website->web_smtp_port; /* SMTP POST SSL-465 OR TLS-587 */

			$mail->setFrom($website->web_from_email_id, $website->web_company_name);
			$mail->addReplyTo($website->web_from_email_id, $website->web_company_name);
			// Add a recipient
			$mail->addAddress($to);
			// Email subject
			$mail->Subject = $subject;
			// Set email format to HTML
			$mail->isHTML(true);
			// Email body content
			$mailContent = $msg;
			$mail->Body = $mailContent;
			// Send email
			if (!$mail->send())
			{
				//return false;
				
			}
			else
			{
				//return true;
				
			}

		}
	}

	function slug($string)
	{
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}

	function encode($data)
	{
		return rtrim(strtr(base64_encode($data) , '+/', '-_') , '=');
	}

	function decode($data)
	{
		return base64_decode(str_pad(strtr($data, '-_', '+/') , strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

	function GetStar($getstar)
	{
		if ($getstar == '1')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '1' && $getstar < '1.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '1.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '1.5' && $getstar < '2')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '2' && $getstar < '2.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '2.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '2.5' && $getstar < '3')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '3' && $getstar < '3.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>		
			';
		}
		elseif ($getstar == '3.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '3.5' && $getstar < '4')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '4' && $getstar < '4.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>';
		}
		elseif ($getstar == '4.5')
		{
			echo $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}

		elseif ($getstar > '4.5' && $getstar <= '5')
		{
			echo $star = ' 
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>';
		}
		elseif ($getstar == NULL)
		{
			echo $star = '<li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li>';
		}
	}

	function GetStar2($getstar)
	{
		if ($getstar == '1')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '1' && $getstar < '1.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '1.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '1.5' && $getstar < '2')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '2' && $getstar < '2.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '2.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '2.5' && $getstar < '3')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '3' && $getstar < '3.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>		
			';
		}
		elseif ($getstar == '3.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '3.5' && $getstar < '4')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '4' && $getstar < '4.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>';
		}
		elseif ($getstar == '4.5')
		{
			$star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}

		elseif ($getstar > '4.5' && $getstar <= '5')
		{
			$star = ' 
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>';
		}
		elseif ($getstar == NULL)
		{
			echo $star = '<li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li>';
		}
	}

	function GetStar1($getstar)
	{
		if ($getstar == '1')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '1' && $getstar < '1.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '1.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '1.5' && $getstar < '2')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '2' && $getstar < '2.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar == '2.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '2.5' && $getstar < '3')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '3' && $getstar < '3.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>		
			';
		}
		elseif ($getstar == '3.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar > '3.5' && $getstar < '4')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}
		elseif ($getstar >= '4' && $getstar < '4.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>';
		}
		elseif ($getstar == '4.5')
		{
			return $star = '
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star-half-o"></i> </li>
			<li><i class="fa fa-star-o"></i> </li>
			';
		}

		elseif ($getstar > '4.5' && $getstar <= '5')
		{
			return $star = ' 
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>
			<li><i class="fa fa-star"></i> </li>';
		}
		elseif ($getstar == NULL)
		{
			return $star = '<li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li>';
		}
	}

?>

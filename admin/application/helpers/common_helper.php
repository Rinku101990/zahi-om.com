<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/*! Common Helper
	* ================
	* Common Helper application file for All Common function . 
	* This fileshould be included in all pages.  
	* @Author  :  Manish Kumar
	* @Created :  01 Nov 2019
	*/
	
	
	function date_formate($date){
		   
		 return date_format(date_create($date),'d-M-Y ,h:i:s A');
		 
	} 	
	 function currency($id){ 
		$ci=get_instance();		
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_currency');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->symbol;
			}
	} 
	function model($id){ 
		$ci=get_instance();
		$ci->db->select('p_model');		
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_model;
			}
	} 
	
	function get_int($pid){ 
		$ci=get_instance();
		$ci->db->select('int_id');		
		$ci->db->where('int_pid', $pid);
        $query = $ci->db->get('tbl_inventory');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->int_id;
			}
	} 
	
	function option($id){ 
		$ci=get_instance();	
		$ci->db->where('opt_id', $id);
		$ci->db->where('opt_status', '1');
        $query = $ci->db->get('tbl_option');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}

	 function color(){ 
		$ci=get_instance();	
		$ci->db->select('opt_id,opt_name,opt_value');
		$ci->db->where('opt_status','1');	
		$ci->db->where('opt_id','1');
        $query = $ci->db->get('tbl_option');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	} 

	function code($id){ 
		$ci=get_instance();		
		$ci->db->select('cnt_code');
		$ci->db->where('cnt_id', $id);
        $query = $ci->db->get('tbl_country');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cnt_code;
			}
	} 
	
	function country_code(){ 
		$ci=get_instance();	
		$ci->db->select('cnt_id,cnt_name,cnt_code');
		$ci->db->order_by('cnt_name','ASC');	
		$ci->db->where('cnt_status', '1');
        $query = $ci->db->get('tbl_country');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->result();
			}
	}

	function vendor($id){ 
		$ci=get_instance();	
		$ci->db->select('p_vnd_id');			
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->row()->p_vnd_id;
			}
	}

	

 
	
	 function tax($id){ 
		$ci=get_instance();		
		$ci->db->select('txt_name');
		$ci->db->where('txt_id', $id);
		$ci->db->where('txt_status','1');
        $query = $ci->db->get('tbl_tax');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->txt_name;
			}
	} 
	
	
	 function category_name($id){ 
		$ci=get_instance();		
		$ci->db->where('cate_id', $id);
        $query = $ci->db->get('tbl_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cate_name;
			}
	} 
	function sub_category_name($id){ 
		$ci=get_instance();		
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_sub_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->scate_name;
			}
	} 
	function child_category_name($id){ 
		$ci=get_instance();		
		$ci->db->where('child_id', $id);
        $query = $ci->db->get('tbl_child_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->child_name;
			}
	} 

	function child_slug($id){ 
		$ci=get_instance();		
		$ci->db->select('child_slug');
		$ci->db->where('child_id', $id);
        $query = $ci->db->get('tbl_child_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->child_slug;
			}
	} 

	function product_img($id){ 
		$ci=get_instance();		
		$ci->db->select('pg_img');
		$ci->db->where('pg_pid', $id);
        $query = $ci->db->get('tbl_product_img');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->pg_img;
			}
	} 

 function load_notification_count(){
		$ci=get_instance();			
		$ci->db->from('tbl_notification');				
		$ci->db->where('notification_read', 'No');		
	    $query = $ci->db->get();
	    // echo $ci->db->last_query();
	    // die();
		if($query->num_rows() ==''){
					return '0';
					}else{
				return $query->num_rows();
				}
			}


function load_notification(){
		$ci=get_instance();	
		$ci->db->from('tbl_notification');
		$ci->db->order_by('notification_id','DESC');		
		//$ci->db->where('notification_receiver_id', $vnd_id);	
		$ci->db->where('notification_read', 'No');		
	    $query = $ci->db->get();
	    // echo $ci->db->last_query();
	    // die();
		if($query->num_rows() ==''){
			return false;
			}else{
		  $row=$query->result();
		  $message='';
		  foreach ($row as $key => $value) {
          if($value->notification_type=='Comments'){
		  $icon='<div class="notifyimg bg-info-transparent text-info-shadow"><i class="fa fa-envelope-o fs-18 text-info" style="margin-right:0;"></i></div>';
		  }else if($value->notification_type=='Reviews'){
		  $icon='<div class="notifyimg bg-primary-transparent text-primary-shadow"><i class="fa fa-star-o fs-18 text-primary" style="margin-right:0;"></i></div>';
		  }else{
		  $icon='<div class="notifyimg bg-success-transparent text-success-shadow"><i class="fa fa-calendar fs-18 text-success" style="margin-right:0;"></i></div>';
		  }		  
		  $url=base_url('user/notification/').encode($value->notification_id);
		  $message .=' <a href="'.$url.'" class="dropdown-item d-flex pb-3 pl-4 pr-2 border-bottom">
                                    '.$icon.'
                                        <div style="text-align: left;"> <strong>'.$value->notification_text.'</strong>
                                            <div class="small fs-14 text-muted">'.nicetime($value->notification_create).'</div>
                                        </div>
                                    </a>';
		  }
		   
		  return $message;
		}
		
	}


	function load_message_count(){
		$ci=get_instance();	
		$ci->db->select('msg.*,mst.mst_name,mst.mst_picture');
		$ci->db->from('tbl_message msg');
		$ci->db->join('tbl_master mst','mst.mst_id=1','LEFT');
		$ci->db->where('msg.msg_receiver', '0');
		// $ci->db->where('msg.msg_sender', '0');
		$ci->db->where('msg.msg_reply', '0');
		$ci->db->where('msg.msg_type', '0');
		$ci->db->where('msg.msg_status', '0');
	    $query = $ci->db->get();
	    // echo $ci->db->last_query();
	    // die();
		if($query->num_rows() ==''){
					return '0';
					}else{
				return $query->num_rows();
				}
			}

	function load_message(){
		$ci=get_instance();	
		$ci->db->select('msg.*,vd.vnd_name AS mst_name,vd.vnd_picture AS mst_picture');
		$ci->db->from('tbl_message msg');
		$ci->db->join('tbl_vendor vd','vd.vnd_id=msg.msg_sender','LEFT');
		$ci->db->where('msg.msg_receiver', '0');
		// $ci->db->where('msg.msg_sender', '0');
		$ci->db->where('msg.msg_reply', '0');
		$ci->db->where('msg.msg_type', '0');
		$ci->db->where('msg.msg_status', '0');
	    $query = $ci->db->get();
	    // echo $ci->db->last_query();
	    // die();
		if($query->num_rows() ==''){
			return false;
			}else{
		  $row=$query->result();
		  $message='';
		  foreach ($row as $key => $value) {
		  	if(empty($value->mst_picture)){
		  		$img=base_url('../seller/uploads/profile/avatar.png');
		  	}else{
		  	$img=base_url('../seller/uploads/profile/').$value->mst_picture;	
		  	}

		  $message .='<a href="#" class="p-3 d-flex border-bottom"> 
		  <div class="avatar-md  mr-3 d-block brround cover-image default-shadow" > <img src="'.$img.'" class="brround" title="'.$value->mst_name.'" /> </div> <div class="w-80"> <div class="d-flex"> <h5 class="mb-2">'.$value->mst_name.'</h5>  </div> <p class="mb-1">'.$value->msg_subject.'</p><span class="font-weight-normal fs-13 text-muted">'.nicetime($value->msg_created).'</span> </div> </a>';
		  }
		    $message .='<a href="'.base_url('mails').'" class="dropdown-item text-center p-3">See all Messages</a>';
		  return $message;
		}
		
	}

 function product($id){ 
		$ci=get_instance();
		$ci->db->select('p_name');
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_name;
			}
	}
	function brand($id){ 
		$ci=get_instance();	
		$ci->db->select('brd_name');	
		$ci->db->where('brd_id', $id);
        $query = $ci->db->get('tbl_brand');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->row()->brd_name;
			}
	}

	function dimensions($id){ 
		$ci=get_instance();	
		$ci->db->select('ut_dime_name');	
		$ci->db->where('ut_id', $id);
        $query = $ci->db->get('tbl_unit');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->row()->ut_dime_name;
			}
	}
	
		function sender($sender_id){
		$ci=get_instance();	
	if(empty($sender_id)) { 				
			$ci->db->select('mst_name as name,mst_email as email,mst_picture as picture');
			$ci->db->where('mst_id', '1');
	        $query = $ci->db->get('tbl_master');
			if($query->num_rows() ==''){
					return false;
					}else{
				return $query->row();
				}
			}else{
            $ci->db->select('vnd_name as name,vnd_email as email,vnd_picture as picture');
			$ci->db->where('vnd_id', $sender_id);
	        $query = $ci->db->get('tbl_vendor');
			if($query->num_rows() ==''){
					return false;
					}else{
				return $query->row();
				}
			}
	}

	function unit($id){ 
		$ci=get_instance();	
		$ci->db->select('ut_weight_name');	
		$ci->db->where('ut_id', $id);
        $query = $ci->db->get('tbl_unit');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->row()->ut_weight_name;
			}
	}
    function admin_profile($email){ 
		$ci=get_instance();		
		$ci->db->where('mst_email', $email);
        $query = $ci->db->get('tbl_master');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result()[0];
			}
	}

	
	function cate_name($id){ 
		$ci=get_instance();
		$ci->db->select('cate_name');
		$ci->db->where('cate_id', $id);
        $query = $ci->db->get('tbl_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cate_name;
			}
	}

	function cate_slug($id){ 
		$ci=get_instance();
		$ci->db->select('cate_slug');
		$ci->db->where('cate_id', $id);
        $query = $ci->db->get('tbl_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cate_slug;
			}
	}

	function scate_name($id){ 
		$ci=get_instance();
		$ci->db->select('scate_name');
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_sub_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->scate_name;
			}
	}


    function scate_slug($id){ 
		$ci=get_instance();
		$ci->db->select('scate_slug');
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_sub_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->scate_slug;
			}
	}
	
	function page($id){ 
		$ci=get_instance();
		$ci->db->select('pg_title');
		$ci->db->where('pg_id', $id);
        $query = $ci->db->get('tbl_page');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->pg_title;
			}
	}

	function product_count($id){ 
		$ci=get_instance();
		$ci->db->where('p_vnd_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{					
				return $query->num_rows();
			}
	}
	
	function cate_id($id){ 
		$ci=get_instance();
		$ci->db->select('cate_id');
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_sub_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cate_id;
			}
	}
	function cate($id){ 
		$ci=get_instance();
		$ci->db->select('cate_id');
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_sub_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cate_id;
			}
	}

	function scate($id){ 
		$ci=get_instance();
		$ci->db->select('scate_id');
		$ci->db->where('child_id', $id);
        $query = $ci->db->get('tbl_child_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->scate_id;
			}
	}

	function child_id($id){ 
		$ci=get_instance();
		$ci->db->select('p_child');
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_child;
			}
	}

	  function category_count($id){      
		$ci=get_instance();		
		$ci->db->where('cate_id', $id);		
        $query = $ci->db->get('tbl_sub_category');
        $ci->db->last_query($query);
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->num_rows();
			}
	} 
	function scategory_count($id){ 
		$ci=get_instance();		
		$ci->db->where('scate_id', $id);
        $query = $ci->db->get('tbl_child_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->num_rows();
			}
	} 
	function country($id){ 
		$ci=get_instance();
		$ci->db->select('cnt_name');
		$ci->db->where('cnt_id', $id);
        $query = $ci->db->get('tbl_country');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cnt_name;
			}
	}
	function state($id){ 
		$ci=get_instance();
		$ci->db->select('st_name');
		$ci->db->where('st_id', $id);
        $query = $ci->db->get('tbl_state');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->st_name;
			}
	}
	function city($id){ 
		$ci=get_instance();
		$ci->db->select('ct_name');
		$ci->db->where('ct_id', $id);
        $query = $ci->db->get('tbl_city');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->ct_name;
			}
	}
	
	function getPro_price($id){ 
		$ci=get_instance();
		$ci->db->select('pro_price');
		$ci->db->where('pro_id', $id);
        $query = $ci->db->get('tbl_products');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->pro_price;
			}
	}
	
	function getCust_name($id){ 
		$ci=get_instance();
		$ci->db->select('custFname,custLname');
		$ci->db->where('custId', $id);
        $query = $ci->db->get('tbl_customers');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->custFname." ".$query->row()->custLname;
			}
	}	
	function getCust_email($id){ 
		$ci=get_instance();
		$ci->db->select('custEmail');
		$ci->db->where('custId', $id);
        $query = $ci->db->get('tbl_customers');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->custEmail;
			}
	}	
	function getCust_phone($id){ 
		$ci=get_instance();
		$ci->db->select('custPhoneNo');
		$ci->db->where('custId', $id);
        $query = $ci->db->get('tbl_customers');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->custPhoneNo;
			}
	}
   function getVnd_name($id){ 
		$ci=get_instance();
		$ci->db->select('vnd_name');
		$ci->db->where('vnd_id', $id);
        $query = $ci->db->get('tbl_vendor');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->vnd_name;
			}
	}
	function getVnd_email($id){ 
		$ci=get_instance();
		$ci->db->select('vndEmail');
		$ci->db->where('vndId', $id);
        $query = $ci->db->get('tbl_vendors');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->vndEmail;
			}
	}

	function phon_code($id){ 
		$ci=get_instance();
		$ci->db->select('cnt_code');
		$ci->db->where('cnt_id', $id);
        $query = $ci->db->get('tbl_country');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->cnt_code;
			}
	}
	function getVnd_phone($id){ 
		$ci=get_instance();
		$ci->db->select('vndPhone');
		$ci->db->where('vndId', $id);
        $query = $ci->db->get('tbl_vendors');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->vndPhone;
			}
	}	

	function getStatecountry_id($id){ 
		$ci=get_instance();
		$ci->db->select('country_id');
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_states');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}
	function getCityName($id){ 
		$ci=get_instance();
		$ci->db->select('name');
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_cities');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}
	
	function getStateName($id){ 
		$ci=get_instance();
		$ci->db->select('name');
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_states');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}
	
	function getCountryName($id){ 
		$ci=get_instance();
		$ci->db->select('name');
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_countries');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}
	
	
	function getProductName($id){ 
		$ci=get_instance();
		$ci->db->select('p_name');
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_name;
			}
	}
	/*------------ For Email Send Start -------------------------*/
	function email_send($to,$subject,$msg)
	{
	$ci = get_instance(); 
	$config = array();
	$config['useragent'] = "CodeIgniter";
	$config['mailpath'] = "/usr/sbin/sendmail"; 
	$config['protocol'] = "smtp";
	$config['smtp_host'] = "localhost";
	$config['smtp_port'] = "25";
	$config['mailtype'] = 'html';
	$config['charset']  = 'utf-8';
	$config['newline']  = "\r\n";
	$config['wordwrap'] = TRUE;
	$ci->load->library('email');
	$ci->email->initialize($config);
	$ci->email->from("Ordius It Solutions Pvt. Ltd.");
	$ci->email->to($to);
	//$ci->email->bcc($ci->website['data']->bcc_email_id);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	if ($ci->email->send()){		
	echo "mail send";
	} else {
		
	echo "mail  not send";
	}
		 
	}
	
	function slug($string){
      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
     return $slug;
     }
	 
	function encode($data) { 
	return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 

	function decode($data) { 
	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 
	

	function nicetime($date){
		if(empty($date)) {
			return "No date provided";
		}
		$periods         = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
		$lengths         = array("60","60","24","7","4.35","12","10");
		$now             = time();
		$unix_date         = strtotime($date);
		// check validity of date
		if(empty($unix_date)) {    
			return "Bad date";
		}
		// is it future date or past date
		if($now > $unix_date) {    
			$difference     = $now - $unix_date;
			$tense         = "ago";	
		} else {
			$difference     = $unix_date - $now;
			$tense         = "Just Now";
		}
		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}
		$difference = round($difference);
		if($difference != 1) {
			$periods[$j].= "s";
		}	
		return "$difference $periods[$j] {$tense}";
	}
	


	function star(){ 
			$ci=get_instance();	
			$ci->db->select('count(*) AS count,SUM(star) AS star_count');		
			$ci->db->where('type', '1');
	        $query = $ci->db->get('tbl_cmnts_reviews');
	       // $ci->db->last_query($query);	       
			if($query->num_rows() ==''){
				return false;
					}else{
			return	$query->row();
				}
	}

function GetStar($getstar){ 
    	 if($getstar=='1'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }elseif($getstar>='1' && $getstar<'1.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  elseif($getstar=='1.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-half-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
     elseif($getstar>'1.5' && $getstar<'2'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  elseif($getstar>='2' && $getstar<'2.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }
	   elseif($getstar=='2.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-half-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  elseif($getstar>'2.5' && $getstar<'3'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  elseif($getstar>='3' && $getstar<'3.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>		
		  ';
	  }	
	     elseif($getstar=='3.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-half-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	   elseif($getstar>'3.5' && $getstar<'4'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  elseif($getstar>='4' && $getstar<'4.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>';
	  }	
	  elseif($getstar=='4.5'){
		echo $star='
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star-half-o"></i> </li>
		  <li><i class="fa fa-star-o"></i> </li>
		  ';
	  }	
	  
	  elseif($getstar>'4.5' && $getstar<='5'){
		echo $star=' 
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>
		  <li><i class="fa fa-star"></i> </li>';
   }
   elseif($getstar==NULL)
   { echo $star='<li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li><li><i class="fa fa-star-o"></i> </li>';  
   }
   }
	
	
	  
?>
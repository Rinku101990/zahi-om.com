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

 function category_list(){ 
		$ci=get_instance();	
		$ci->db->order_by('cate_name', 'ASC');		
		$ci->db->where('cate_status', '1');
		$ci->db->where('cate_remove', '0');
        $query = $ci->db->get('tbl_category');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result();
			}
	} 

function lang($id){ 
		$ci=get_instance();	
		$ci->db->select('name');	
		$ci->db->where('id', $id);
        $query = $ci->db->get('tbl_settings');
		if($query->num_rows() ==''){
				return false;
				}else{
			return $query->row()->name;
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
	function delivery_count($id){ 
		$ci=get_instance();		
		$ci->db->where('ord_id', $id);
        $query = $ci->db->get('tbl_orders_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->num_rows();
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
	
	 function product_id($id){ 
		$ci=get_instance();
		$ci->db->select('p_id');
		$ci->db->where('p_child', $id);
        $query = $ci->db->get('tbl_product');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_id;
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
    function category_count($id,$vnd_id){ 
        $array = array('0', $vnd_id);
		$ci=get_instance();		
		$ci->db->where('cate_id', $id);
		$ci->db->where_in('vnd_id',$array);		
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
	
    function vendor_profile($email){ 
		$ci=get_instance();		
		$ci->db->where('vnd_email', $email);
        $query = $ci->db->get('tbl_vendor');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->result()[0];
			}
	}

	 function vendor($id){ 	 	
		$ci=get_instance();		
		$ci->db->select('p_id,p_vnd_id');
		$ci->db->where('p_id', $id);
        $query = $ci->db->get('tbl_product'); 
        // echo $ci->db->last_query($query);
        // die;       
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->p_vnd_id;
			}
	}
	
	
	function getVnd_Id($email){ 
		$ci=get_instance();
		$ci->db->select('vndId');
		$ci->db->where('vndEmail', $email);		
        $query = $ci->db->get('tbl_vendors');		
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->vndId;
			}
	}
	
   function getVnd_name($id){ 
		$ci=get_instance();
		$ci->db->select('vndName');
		$ci->db->where('vndId', $id);
        $query = $ci->db->get('tbl_vendors');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->vndName;
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

	function inbox($vnd_id){ 
			$ci=get_instance();		
			$ci->db->where('msg_receiver', $vnd_id);
			$ci->db->where('msg_type', '0');
				$ci->db->where('msg_status', '0');	
	        $query = $ci->db->get('tbl_message');
			if($query->num_rows() ==''){
					return false;
					}else{
				return '<span class="ml-auto badge-pill badge badge-success">'.$query->num_rows().'</span>';
				}
	}


	function sent($vnd_id){ 
			$ci=get_instance();		
			$ci->db->where('msg_sender', $vnd_id);
			$ci->db->where('msg_type', '0');
			$ci->db->where('msg_status', '0');	
			$ci->db->where('msg_reply','0');
	        $query = $ci->db->get('tbl_message');
			if($query->num_rows() ==''){
					return false;
					}else{
				return '<span class="ml-auto badge-pill badge badge-success">'.$query->num_rows().'</span>';
				}
	}
	function starred($vnd_id){ 
			$ci=get_instance();
			$ci->db->where('msg_type', '0');
			$ci->db->where('msg_status', '0');	
			$ci->db->where('msg_star', '1');
			$ci->db->where('msg_reply','0');
			$ci->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");		
	        $query = $ci->db->get('tbl_message');
	     
			if($query->num_rows() ==''){
					return false;
					}else{
				return '<span class="ml-auto badge-pill badge badge-success">'.$query->num_rows().'</span>';
				}
	}
	function trash($vnd_id){ 
			$ci=get_instance();	
			$ci->db->where("(msg_sender='$vnd_id' OR msg_receiver = '$vnd_id')");		
			$ci->db->where('msg_type', '0');
			$ci->db->where('msg_status', '1');	
			$ci->db->where('msg_reply','0');	
	        $query = $ci->db->get('tbl_message');
			if($query->num_rows() ==''){
					return false;
					}else{
				return '<span class="ml-auto badge-pill badge badge-success">'.$query->num_rows().'</span>';
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

	function reply_message($reply_id){
		$ci=get_instance();	
			$ci->db->where('msg_reply', $reply_id);
	        $query = $ci->db->get('tbl_message');
			if($query->num_rows() ==''){
					return false;
					}else{
				return $query->result();
				}
		
	}

    function load_notification_count($vnd_id){
		$ci=get_instance();			
		$ci->db->from('tbl_notification ');		
		$ci->db->where('notification_receiver_id', $vnd_id);	
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

	function load_notification($vnd_id){
		$ci=get_instance();	
		$ci->db->from('tbl_notification ');		
		$ci->db->where('notification_receiver_id', $vnd_id);	
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
		  $url=base_url('profile/notification/').encode($value->notification_id);
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

	function load_message_count($vnd_id){
		$ci=get_instance();	
		$ci->db->select('msg.*,mst.mst_name,mst.mst_picture');
		$ci->db->from('tbl_message msg');
		$ci->db->join('tbl_master mst','mst.mst_id=1','LEFT');
		$ci->db->where('msg.msg_receiver', $vnd_id);
		$ci->db->where('msg.msg_sender', '0');
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

	function load_message($vnd_id){
		$ci=get_instance();	
		$ci->db->select('msg.*,mst.mst_name,mst.mst_picture');
		$ci->db->from('tbl_message msg');
		$ci->db->join('tbl_master mst','mst.mst_id=1','LEFT');
		$ci->db->where('msg.msg_receiver', $vnd_id);
		$ci->db->where('msg.msg_sender', '0');
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
		  		$img=base_url('uploads/profile/avatar.png');
		  	}else{
		  	$img=base_url('../admin/uploads/profile/').$value->mst_picture;	
		  	}

		  $message .='<a href="#" class="p-3 d-flex border-bottom"> 
		  <div class="avatar-md  mr-3 d-block brround cover-image default-shadow" > <img src="'.$img.'" class="brround" title="'.$value->mst_name.'" /> </div> <div class="w-80"> <div class="d-flex"> <h5 class="mb-2">'.$value->mst_name.'</h5>  </div> <p class="mb-1">'.$value->msg_subject.'</p><span class="font-weight-normal fs-13 text-muted">'.nicetime($value->msg_created).'</span> </div> </a>';
		  }
		    $message .='<a href="'.base_url('profile/messages').'" class="dropdown-item text-center p-3">See all Messages</a>';
		  return $message;
		}
		
	}

	function company_detail(){
		$ci=get_instance();
        $ci->db->limit(1);
        $query=$ci->db->get('tbl_website_info');
		if($query->num_rows()== 1){
		$website= $query->row();
		}
     $logo='<img src="'.site_url('../admin/uploads/website/logo/').$website->web_company_logo.'" title="'.$website->web_company_name.'">';
	 $url=$website->web_site_url;
	 $social_media_icons='<img src="'.base_url().'assets/img/facebook.png" title="Facebook" style="width:40px;">
	 <img src="'.base_url().'assets/img/twitter.png" title="Twitter" style="width:40px;">
	 <img src="'.base_url().'assets/img/google-pluse.png" title="Google Pluse" style="width:40px;">
	 <img src="'.base_url().'assets/img/youtube.png" title="Youtube" style="width:40px;">';
	 
	$data=array('Company_Logo'=>$logo,
	            'website_url'=>$url,
	            'social_media_icons'=>$social_media_icons,
	            'website_name'=>$website->web_company_name,
	            'contact_us_email'=>$website->web_support_email
				
				);	
		 return $data;
	}	
	
	function template($id){ 
		$ci=get_instance();
		$ci->db->select('tp_name,tp_subject,tp_body');
		$ci->db->where('tp_id', $id);
		$ci->db->where('tp_status','1');
        $query = $ci->db->get('tbl_template');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}	

	function reviews($id){ 
		$ci=get_instance();
		$ci->db->select('count(p_id) as user,sum(star) as star');
		$ci->db->where('p_id', $id);
		$ci->db->where('type','1');
        $query = $ci->db->get('tbl_cmnts_reviews');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row();
			}
	}	
	function comments($id){ 
		$ci=get_instance();
		$ci->db->select('count(p_id) as user');
		$ci->db->where('p_id', $id);
		$ci->db->where('type','2');
        $query = $ci->db->get('tbl_cmnts_reviews');
		if($query->num_rows() ==''){
				return false;
				}else{
				return $query->row()->user;
			}
	}	

	
	/*------------ For Email Send Start -------------------------*/
	function email_send($to,$subject,$msg) { 
	     $ci = get_instance(); 
		// Load PHPMailer library
		$ci->load->library('phpmailer_lib');
		// PHPMailer object
		$mail = $ci->phpmailer_lib->load();
		$ci->db->limit(1);
        $query=$ci->db->get('tbl_website_info');
		if($query->num_rows()== 1){
		$website= $query->row();
		} 		
		
		$email_protocal=$website->web_email_protocal;
		if($email_protocal=='SMTP Email'){
			// SMTP configuration
			$mail->isSMTP();
			//Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 3; /* Debug Mode */
			$mail->Host     	= $website->web_smtp_host_name; /* smtp.zoho.in OR smtp.gmail.com*/
			 $mail->SMTPAuth 	= true;
			$mail->Username 	= $website->web_email_id;
			$mail->Password 	= $website->web_email_password;
			$mail->SMTPSecure 	= 'ssl'; /* SSL OR TLS */
			$mail->Port     	= $website->web_smtp_port; /* SMTP POST SSL-465 OR TLS-587 */
			
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
			if(!$mail->send()){				
				//return false;
			}else{				
				//return true;
			}
		 
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
		
		$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
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
	
	
	
	
	
	
	  
?>
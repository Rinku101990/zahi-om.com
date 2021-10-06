<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
	    $this->load->model('thankyou/Order_model','Order_Model');	
	     if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
	    $this->load->library('twilio');
		  /* ========FOR CATEGORY=========== */
		$this->cate_id="cate_id"; 
		$this->table_categories="tbl_categories"; 	
        /* ========FOR SUB CATEGORY=========== */
		$this->scate_id="scate_id"; 
		$this->table_sub_category="tbl_sub_category"; 
		/* ========FOR LOGIN =========== */
		$this->cust_id="cust_id"; 
		$this->table_customer="tbl_customer";
		/* ========FOR PRODUCTS =========== */
		$this->fld_proid="pro_id";
		$this->table_products="tbl_products"; 
		/* ========FOR ORDERS =========== */
		$this->fld_ordid="ord_id";
		$this->fld_refid="ord_reference_no";
		$this->table_orders="tbl_orders";
    }
  
  	public function index()
	{
		$login = $this->session->userdata('logged_in_customer');
		if(empty($login)){
			redirect('/');
		}

		$cust_email = $login->cust_email;
		$cust_id = $login->cust_id;		
		$content['profile']= $this->customer;
	
		$ordid = $this->session->flashdata('orderid');
		//$ordid = '9';
		
		if(!empty($ordid))
		{
		   if(empty($this->session->userdata('sleeve'))){	
			$content['order_detail']=$this->Order_Model->get_order_detail($ordid,$this->fld_ordid,$this->table_orders);		
		  
			$data['cmpt_ord_detail']=$this->Order_Model->get_complete_list($ordid);
		
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_order_product_list($ordid);

			$orderUpdate = array('ord_txt_status' => 'success');

		    $success = $this->Order_Model->UpdateOrderInformation($content['order_detail']->ord_reference_no,$orderUpdate,$this->table_orders);
		    
		  //  echo"<pre>";
		  //  print_r($data['cmpt_ord_detail']);
		    /*====================Start sms send===========*/ 
		  $name=$data['cmpt_ord_detail']->cust_fname.' '.$data['cmpt_ord_detail']->cust_lname;
		  
		    $phone='+'.code($data['cmpt_ord_detail']->cust_phone_code).''.$data['cmpt_ord_detail']->cust_phone;
			$smsmsg='Dear '.$name.' , We have received your order #'.$data['cmpt_ord_detail']->ord_reference_no.' & we will provide your tracking number once your order is shipped.';
			 $this->load->library('twilio');

		$sms_from = '+447723561455';
		$sms_to = $phone;
		$smsresponse = $this->twilio->sms($sms_from, $sms_to, $smsmsg);
		
			/*====================End sms send ===========*/

			/*====================Start email send===========*/ 
			$emailsubject='Order Detail from Zahi.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/emailOrder',$data,true);
			$from_email = "zahi@mycvone.com";
                $this->load->library('email');
                $config = array (
                'mailtype' => 'html',
                'charset'  => 'utf-8',
                'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from($from_email, "ZAHI");
                $this->email->to($toemail);
                $this->email->subject($emailsubject);
                $this->email->message($emailmsg);
                $this->email->send();	 
			/*====================End email send ===========*/

			/*====================Start email send to team===========*/ 
			$emailsubjectteam='New Order Received';
			$toteamemail='zahi@mycvone.com'; 
			$emailmsgteam=$this->load->view('thankyou/email_order/teamOrder',$data,true);
			$from_emailteam = "zahi@mycvone.com";
                $this->load->library('email');
                $config = array (
                'mailtype' => 'html',
                'charset'  => 'utf-8',
                'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from($from_emailteam, "ZAHI");
                $this->email->to($toteamemail);
                $this->email->subject($emailsubjectteam);
                $this->email->message($emailmsgteam);
                $this->email->send();	  
			/*====================End email send ===========*/
		}else{

			$content['order_detail']=$this->Order_Model->get_order_detail($ordid,$this->fld_ordid,'tbl_make_orders');		
		  
			$data['cmpt_ord_detail']=$this->Order_Model->get_make_complete_list($ordid);
		
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_make_order_product_list($ordid);

			$orderUpdate = array('ord_txt_status' => 'success');

		    $success = $this->Order_Model->UpdateOrderInformation($content['order_detail']->ord_reference_no,$orderUpdate,'tbl_make_orders');

			/*====================Start email send===========*/ 
			$emailsubject='Order Detail from Zahi.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/makeemailOrder',$data,true);
			$from_email = "zahi@mycvone.com";
                $this->load->library('email');
                $config = array (
                'mailtype' => 'html',
                'charset'  => 'utf-8',
                'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from($from_email, "ZAHI");
                $this->email->to($toemail);
                $this->email->subject($emailsubject);
                $this->email->message($emailmsg);
                $this->email->send();	 
			/*====================End email send ===========*/

			/*====================Start email send to team===========*/ 
			$emailsubjectteam='New Order Received';
			$toteamemail='zahi@mycvone.com'; 
			$emailmsgteam=$this->load->view('thankyou/email_order/maketeamOrder',$data,true);
			$from_emailteam = "zahi@mycvone.com";
                $this->load->library('email');
                $config = array (
                'mailtype' => 'html',
                'charset'  => 'utf-8',
                'priority' => '1'
                );
                $this->email->initialize($config);
                $this->email->from($from_emailteam, "ZAHI");
                $this->email->to($toteamemail);
                $this->email->subject($emailsubjectteam);
                $this->email->message($emailmsgteam);
                $this->email->send();	  
			/*====================End email send ===========*/
			$this->session->unset_userdata('sleeve');
		}
			
			$this->cart->destroy();
			$content['subview']="thankyou/viewMyOrder"; 
			$this->load->view('layout', $content);

		}else{
			redirect('/');
		}
	}
	 public function test()
	 {
	 	$content['subview']="thankyou/viewMyOrder"; 
		$this->load->view('layout', $content);
	 }
	
	public function status(){
		$login = $this->session->userdata('logged_in_customer');
		if(empty($login)){
			redirect('/');
		}
		$cust_id = $login->cust_id;		
		  $content['profile']=$this->customer;
	
		$cust_email = $login->cust_email;
		$status = $this->input->post('status');
		//Working Key should be provided here.
		$firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $salt = "yIEkykqEH3"; //  Your salt
        
        $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
		
		$content['hash'] = hash("sha512", $retHashSeq);
		$content['amount'] = $amount;
		$content['txnid'] = $txnid;
		$content['posted_hash'] = $posted_hash;
		$content['product_info'] = $productinfo;
		$content['status'] = $status;
		
		if($status == 'success'){
			$orderUpdate = array(
				'ord_txt_id' => $txnid,
				'ord_txt_status' => $status,
			);
			
			$refstatus = $this->Order_Model->UpdateOrderInformation($productinfo,$orderUpdate,$this->table_orders);
			$ordid=Order_id($productinfo);
			$content['order_detail']=$this->Order_Model->get_order_detail($ordid,$this->fld_ordid,$this->table_orders);
			$content['categories']=$this->home->get_list($this->cate_id,$this->table_categories);  
	        $content['sub_category']=$this->home->get_list($this->scate_id,$this->table_sub_category);  
		  
			$data['cmpt_ord_detail']=$this->Order_Model->get_complete_list($ordid);
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_order_product_list($ordid);
           /*====================Start email send===========*/ 
			$emailsubject='Order Detail from zahi.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/emailOrder',$data,true);
			$mailsend=email_send($toemail,$emailsubject,$emailmsg);	 
			/*====================End email send ===========*/

			/*====================Start email send to team===========*/ 
			$emailsubjectteam='New Order Received';
			$toteamemail='manish.sandlus@gmail.com'; 
			$emailmsgteam=$this->load->view('thankyou/email_order/teamOrder',$data,true);
			$mailsend=email_send($toteamemail,$emailsubjectteam,$emailmsgteam);	 
			/*====================End email send ===========*/

			$this->cart->destroy();
			$content['subview']="thankyou/viewMyOrder"; 
			$this->load->view('layout', $content);

		}else{
			
			$orderUpdate = array(
				'ord_txt_id' => $txnid,
				'ord_txt_status' => $status,
			);
			$refstatus = $this->Order_Model->UpdateOrderInformation($productinfo,$orderUpdate,$this->table_orders);
			// echo $refstatus;
    		$ordid=Order_id($productinfo);
			$content['order_detail']=$this->Order_Model->get_order_detail($ordid,$this->fld_ordid,$this->table_orders);			
		  
			$data['cmpt_ord_detail']=$this->Order_Model->get_complete_list($ordid);
			$data['cmpt_ord_pro_detail']=$this->Order_Model->get_order_product_list($ordid);
           /*====================Start email send===========*/ 
			$emailsubject='Order Detail from friendymart.com';
			$toemail=$cust_email; 
			$emailmsg=$this->load->view('thankyou/email_order/emailOrder',$data,true);
			$mailsend=email_send($toemail,$emailsubject,$emailmsg);	 
			/*====================End email send ===========*/

			/*====================Start email send to team===========*/ 
			$emailsubjectteam='New Order Received';
			$toteamemail='manish.sandlus@gmail.com'; 
			$emailmsgteam=$this->load->view('thankyou/email_order/teamOrder',$data,true);
			$mailsend=email_send($toteamemail,$emailsubjectteam,$emailmsgteam);	 
			/*====================End email send ===========*/

			$this->cart->destroy();
			$content['subview']="thankyou/viewMyOrder"; 
			$this->load->view('layout', $content);
		}		
	}
	
	
	public function badRequest()
	{    
		$content['get_banner_list']=$this->Home_Model->get_list($this->fld_bnrsid,$this->table_banners);  
		$content['subview']="home/home"; 
		$this->load->view('layout', $content);
	}
}

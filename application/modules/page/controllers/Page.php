<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Page_model",'Page');
	    if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		/* ========FOR Blog =========== */
		$this->pg_id="pg_id"; 
		$this->table_page="tbl_page";
			/* ========FOR VENDOR =========== */
		$this->vnd_id="vnd_id"; 
		$this->table_vendor="tbl_vendor";
		/* ========FOR subscribe =========== */
		$this->subscribe_id="subscribe_id"; 
		$this->table_subscribe="tbl_subscribe";
    }

  public function about()
	{ 
	    $content['about'] = $this->Page->get_list('1',$this->table_page);
	    //$content['subview']='page/about-us';
		$this->load->view('page/about-us', $content);
	}
	
	public function brands()
	{ 
	    $content['seller']=$this->Page->vendor_list($this->table_vendor);
	   // $content['subview']='page/brands';
		$this->load->view('page/brands', $content);
	}

  public function term()
	{ 
		$content['term'] = $this->Page->get_list('2',$this->table_page);
	    //$content['subview']='page/term-condiotion';
		$this->load->view('page/term-condiotion', $content);
	}
	public function return_policy()
	{ 
		$content['return'] = $this->Page->get_list('3',$this->table_page);
	   // $content['subview']='page/return-policy';
		$this->load->view('page/return-policy', $content);
	}
	public function privacy_policy()
	{ 
		$content['privacy'] = $this->Page->get_list('4',$this->table_page);
	   // $content['subview']='page/privacy-policy';
		$this->load->view('page/privacy-policy', $content);
	}

	public function secure()
	{ 
		$content['page'] = $this->Page->get_list('5',$this->table_page);
	   // $content['subview']='page/secure-shopping';
		$this->load->view('page/secure-shopping', $content);
	}

	function wishlist_save()
	{ 				
		$pid=$this->input->post('RefId');
		$check=$this->Page->check_wishlist($pid,$this->customer->cust_id,'tbl_wishlist');
		if(empty($check)&& !empty($this->customer->cust_id)){
		$data=array('user_id'=>$this->customer->cust_id,'pid'=>$pid);		
		$result=$this->Page->save($data,'tbl_wishlist');
		if($result){
            $getdata['count']=$this->Page->total_wish($this->customer->cust_id,'tbl_wishlist');
			$getdata['success']='success';
		 echo json_encode($getdata);
		}else{
			$getdata['Failed']='Failed';
		   echo json_encode($getdata);			
		}
	}else{
		$getdata['Failed']='Failed';
		   echo json_encode($getdata);
	}
		
	}

	public function delivery()
	{ 
		$content['page'] = $this->Page->get_list('6',$this->table_page);
	   // $content['subview']='page/delivery';
		$this->load->view('page/delivery', $content);
	}

	public function security()
	{ 
		$content['page'] = $this->Page->get_list('7',$this->table_page);
	    //$content['subview']='page/security';
		$this->load->view('page/security', $content);
	}
	public function tracking()
	{ 
		//$content['page'] = $this->Page->get_list('7',$this->table_page);
	  //  $content['subview']='page/tracking';
		$this->load->view('page/tracking');
	}

	public function contact()
	{ 
	
	   // $content['subview']='page/contact';
		$this->load->view('page/contact');
	}

	public function contract()
	{ 
	   $content['page'] = $this->Page->get_list('9',$this->table_page);
	   // $content['subview']='page/contract';
		$this->load->view('page/contract', $content);
	}

	public function faq()
	{ 
	   $content['page'] = $this->Page->get_list('10',$this->table_page);
	    //$content['subview']='page/faq';
		$this->load->view('page/faq', $content);
	}
	
	public function subscribers()
	{ 
	  $REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){			
		$cust_email=$this->input->post('email');
		$check =$this->Page->check_email('subscribe_email',$cust_email,$this->table_subscribe); 
			if(empty($check)){			
			    $data=array(
				'subscribe_email'=>$this->input->post('email'),				
				'subscribe_create'=>date('Y-m-d H:i:s')
				);
					if(!empty($cust_email)){	
		 $subject = 'Subscribe';
		 $message = "<h4>Subscribed email</h4>";		
		 $message.= "<b>Email :</b> ".$this->input->post('email');		
		 $to=$cust_email;
		 $email='info@zahi-om.com';
		 $headers  = 'MIME-Version: 1.0' . "\r\n";
		 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		 $headers .= 'To: ' .$to. "\r\n";
		 $headers .= 'From: ' .$email. "\r\n";
		 $retval = @mail($to, $subject, $message, $headers);
		}
			$result =$this->Page->save($data, $this->table_subscribe);
			if($result){
				$this->session->set_flashdata('sub_msg',array('message' => 'Your email  has been subscribed successfully','class' => 'success','type'=>'Ok!'));
				redirect('home');
			}else{ 
				$this->session->set_flashdata('sub_msg',array('message' => 'Unable to Remove.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('home');
			}
			}
			else{
			$this->session->set_flashdata('sub_msg',array('message' => 'Your email already subscribed','class' => 'danger','type'=>'Oops!'));
			redirect('home');
			}
		}
	   
	}
	
	
public function app()
	{ 
	    //$content['subview']='page/app';
		$this->load->view('page/app');
	}


   

	
	
	 
	 
}

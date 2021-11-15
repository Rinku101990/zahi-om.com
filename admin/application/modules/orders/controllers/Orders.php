<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Orders_model",'Orders');

		// TABLE ORDER TABLE //
		$this->ordid="ord_id";
		$this->ordcstid="cust_id";
		$this->orders="tbl_orders";
		// FOR ORDER PRODUCT TABLE 
		$this->ordProid="op_id";
		$this->ordProducts="tbl_orders_product";
			// FOR VEndor Earnings  TABLE //
		$this->eng_id="eng_id";
		$this->earning="tbl_vnd_earning";
		// FOR VEndor Wallet  TABLE //
		$this->wlt_id="wlt_id";
		$this->wlt_vnd_id="wlt_vnd_id";
		$this->wallet="tbl_wallet";
		// FOR CANCEL TABLE //
		$this->c_id="c_id";
		$this->c_ven_id	="c_ven_id	";
		$this->cancel="tbl_cancel_item";
		// FOR refund TABLE //
		$this->rfd_id="rfd_id";		
		$this->refund="tbl_refund_amount";
		// FOR VENDOR TABLE //
		$this->vnd_id="vnd_id";		
		$this->vendor="tbl_vendor";
		// Cancel Item Resean //
		$this->resean="tbl_order_cancel_reasons";
	}
	

	public function index()
	{
	    $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['orders'])){ 
			$content['admin']=admin_profile($this->login->mst_email);
			/*-- Filter Keyword --*/
			$filter = "";
			if($this->input->post('submit') != NULL ){
			  $filter = $this->input->post('keyword_filter');
			  $this->session->set_userdata(array("keyword_filter"=>$filter));
			}else{
			  if($this->session->userdata('keyword_filter') != NULL){
				$filter = $this->session->userdata('keyword_filter');
			  }
			} 
			/*-- Pagination --*/
			if(!empty($this->input->post('seller')) || !empty($this->input->post('status')) || !empty($this->input->post('from')) || !empty($this->input->post('to'))){		
				$totalOrders=$this->Orders->countAllOrdersWhereList($this->ordid,$this->input->post('seller'),$this->input->post('status'),$this->input->post('from'),$this->input->post('to'),$this->input->post('keyword_filter'),$this->orders);
			}else{
				$totalOrders=$this->Orders->countAllOrdersList($this->ordid,$this->input->post('keyword_filter'),$this->orders);
			}
			//print_r($totalOrders);die;
			$page=$this->uri->segment(3);
			//echo $page;die;
			sleep(1);
			$this->load->library('pagination');
			$config = array();
			$config['base_url'] = base_url('orders/index');;
			$config['total_rows'] = $totalOrders;
			$config['per_page'] = 10;
			$config['uri_segment'] =3;
			$config['use_page_numbers'] = TRUE;
			$config['first_tag_open'] = ' <li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = ' <li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = ' <li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = ' <li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '&nbsp;<li><a class="current">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = ' <li>';
			$config['num_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['num_links'] = 4;
			$this->pagination->initialize($config);
			// $page = $this->uri->segment(4);
			$start = ($page) * $config['per_page'];
			//end pagination
			//echo $pagination=$this->pagination->create_links();

			if(!empty($this->input->post('seller')) || !empty($this->input->post('status')) || !empty($this->input->post('from')) || !empty($this->input->post('to'))){		
				$content['ordlist'] = $this->Orders->get_all_orders_where($config['per_page'],$start,$this->ordid,$this->input->post('seller'),$this->input->post('status'),$this->input->post('from'),$this->input->post('to'),$this->input->post('keyword_filter'),$this->orders);
			}else{
				$content['ordlist'] = $this->Orders->get_all_orders($config['per_page'],$start,$this->ordid,$this->input->post('keyword_filter'),$this->orders);
			}
			$str_links = $this->pagination->create_links();
			$content["links"] = explode('&nbsp;',$str_links );
			//print("<pre>".print_r($content['ordlist'],true)."</pre>");die;
			$content['seller'] = $this->Orders->get_all_vendor($this->vnd_id,$this->vendor);
			$this->load->view('orders/orders_list', $content);
		}else{
			redirect('dashboard');
		}
	}


    public function design()
	{
	    $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['orders'])){ 
			$content['admin']=admin_profile($this->login->mst_email);
			$content['ordlist'] = $this->Orders->get_all_orders($this->ordid,'tbl_make_orders');
			$content['subview']="orders/make_orders_list";
			$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}
	}

	public function export_orders()
	{
	     $filename = 'order'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		  $ordlist = $this->Orders->get_all_orders($this->ordid,$this->orders);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("ORDER ID","CUSTOMER NAME", "COUPON", "GST", "DELIVER CHARGE","TOTAL AMOUNT","PAYMENT","STATUS","ORDER DATE"); 
		   fputcsv($file, $header);
		   foreach ($ordlist as $key=>$line){ 		      	
		   	  $narray=array($line->ord_reference_no,$line->cust_fname.' '.$line->cust_lname,$line->ord_coupon_amount,$line->ord_gst_sum,$line->ord_deliver_charge,$line->ord_total_amounts,$line->ord_pay_mode,$line->order_status,date('j M Y, G:i A',strtotime($line->ord_created_date)));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
	}

	public function invoice($incvid=null)
	{	
		$content['ordInfo'] = $this->Orders->get_order_info($this->ordid,$incvid,$this->orders);
		if(!empty($content['ordInfo'])){
			$content['admin']=admin_profile($this->login->mst_email);
			$content['ordPro'] = $this->Orders->get_order_product($this->ordid,$incvid,$this->ordProducts);
			//print("<pre>".print_r($content['ordPro'],true)."</pre>");die;
			$content['cancelExchange'] = $this->Orders->getCancelExchangeInfo($incvid);
			//$content['reasonList'] = $this->Orders->getCancelReseanList($this->resean);
			//print("<pre>".print_r($content['ordPro'],true)."</pre>");die;
			$content['subview']="orders/order_invoice";
			$this->load->view('layout', $content);
		}else{
			redirect('orders/badrequest');
		}
	}

	public function cancelUserItemByAdmin()
	{
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_admin')))
		{
			redirect('loin','refresh');
		}else{		
			if($RequestMethod == "POST") { 	
				$cust_id=$this->input->post('cancel_custid');
				$ordid=decode($this->input->post('cancel_ordid'));
				$vndid=decode($this->input->post('cancel_vndid'));
				$pid=decode($this->input->post('cancel_opid'));
				$type=$this->input->post('return_type');
				$status=$this->input->post('status_type');
				$year = date('y');
				$month = date('hm');
				$random = rand(1000, 9999);
				$orderReferenceID = $year.$month.$random;
				$check=$this->Orders->checkCancellationRequest($cust_id,$ordid,$pid,$this->cancel);
		   		if(empty($check))
				{
					$data=array(
						'c_ref'=>$orderReferenceID,
						'c_cust_id'=>$cust_id,
						'c_order_id'=>$ordid,
						'c_ven_id'=>$vndid,
						'c_pro_id'=>$pid,			  		
						'c_response'=>$this->input->post('comments'),
						'c_status'=>'Cancel',
						'return_type'=>$type,
						'c_status_type'=>$status,
						'c_created'=>date('Y-m-d H:i:s') 
					); 
					//print("<pre>".print_r($data,true)."</pre>");die;
				$result = $this->Orders->save($data,$this->cancel);	
				if($result){
					echo'Success';
				}else{
					echo'Failed';
				}
		 	}else{
				echo'Used';
			} 
		  }
	    }  
	}

	public function design_invoice($incvid=null)
	{	
		$content['ordInfo']=$this->Orders->get_order_info($this->ordid,$incvid,'tbl_make_orders');
		if(!empty($content['ordInfo'])){
			$content['admin']=admin_profile($this->login->mst_email);
			$content['ordPro'] = $this->Orders->get_order_product($this->ordid,$incvid,'tbl_make_orders_product');
			$content['subview']="orders/design_order_invoice";
			$this->load->view('layout', $content);
		}else{
			redirect('orders/badrequest');
		}
	}

	public function update($ordid=null,$action=null)
	{
		if(isset($ordid) && isset($action)){
			$uordid = $ordid;
			$status = array(
				'order_status'=>decode($action)
			);
			$updateStatus = $this->Orders->update_order_status($this->ordid, $uordid, $status, $this->orders);
			if(decode($action)=='Delivered'){
				  $order_detail=$this->Orders->order_detail($uordid, $this->orders);
				  $order=count($order_detail);				
				 foreach ($order_detail as $key => $value) {
				    if(empty($value->deliver)){$deliver=0;}
                    else{ $deliver=round($value->deliver/$order,2);}	
                    $tax=$value->tax;
                    $coupon=$value->coupon;
                    $discount=$value->discount;
                    $amount=$value->qty*$value->price;
                    $rfd_amount=$value->rfd_amount;
                    $commission=$value->commission;
                    $net_amount=($amount+$tax+$deliver)-($coupon+$discount);
                    $get_refund_amount= $net_amount-$rfd_amount;
                    $get_commission= round($commission*$get_refund_amount/100,2);
                    $eng_amount=$amount-($coupon+$discount);
                    $total_net_amount=$get_refund_amount-$get_commission;                  
					  $earning_data = array(
						'eng_vnd_id'=>$value->vnd_id,
						'eng_p_id'=>$value->p_id,
						'eng_ord_id'=>$uordid,
						'eng_p_ord_id'=>$value->op_id,
						'eng_qty'=>$value->qty,
						'eng_amount'=>$eng_amount,
						'eng_tax'=>$tax,
						'eng_shipping_charge'=>$deliver,
						'eng_rfd_qty'=>$value->rfd_qty,
						'eng_rfd_amount'=>$rfd_amount,
						'eng_commission'=>$get_commission,
						'eng_earning'=>$total_net_amount,
						'eng_created'=>date('Y-m-d H:i:s')
					);
			 $insert_earning=$this->Orders->save($earning_data, $this->earning);
			 $wallet=$this->Orders->check_vendor($this->wlt_vnd_id,$value->vnd_id,$this->wallet);
              $min_balance=$this->Orders->belance_setting()->min_value;
			 if($Wallet){
			 	$wallet_amount=$wallet->wlt_wallet_amount+$total_net_amount;
			 		if($wallet_amount>=$min_balance){
			 	$available_amount=($wallet->wlt_available_amount+$total_net_amount)-$min_balance;	
			 	}else{$available_amount=0;}		 	
			       $wallet_data = array(
						'wlt_available_amount'=>$available_amount,
						'wlt_wallet_amount'=>$wallet_amount,						
					);	
			   $updateStatus = $this->Orders->update_order_status($this->wlt_vnd_id, $value->vnd_id, $wallet_data, $this->wallet);		 	
			   }else{
			   	if($total_net_amount>=$min_balance){$get_min_balance=$total_net_amount-$min_balance;}
			   	else{$get_min_balance=0;}
			   	  $wallet_data = array(
			   	    	'wlt_vnd_id'=>$value->vnd_id,
						'wlt_available_amount'=>$get_min_balance,
						'wlt_wallet_amount'=>$total_net_amount,						
					);	
			   	  $insert_wallet=$this->Orders->save($wallet_data, $this->wallet);
				}
			}
		}
			if($updateStatus){
				redirect('orders/invoice/'.$ordid);	
			}else{
				redirect('orders/invoice/'.$ordid);
			}
		}else{
			redirect('orders/badrequest');
		}
	}

	public function design_update($ordid=null,$action=null)
	{
		if(isset($ordid) && isset($action)){
			$uordid = $ordid;
			$status = array(
				'order_status'=>decode($action)
			);
			$updateStatus = $this->Orders->update_order_status($this->ordid, $uordid, $status,'tbl_make_orders');
			if(decode($action)=='Delivered'){
				  $order_detail=$this->Orders->order_detail($uordid, $this->orders);
				  $order=count($order_detail);				
				 foreach ($order_detail as $key => $value) {
				    if(empty($value->deliver)){$deliver=0;}
                    else{ $deliver=round($value->deliver/$order,2);}	
                    $tax=$value->tax;
                    $coupon=$value->coupon;
                    $discount=$value->discount;
                    $amount=$value->qty*$value->price;
                    $rfd_amount=$value->rfd_amount;
                    $commission=$value->commission;
                    $net_amount=($amount+$tax+$deliver)-($coupon+$discount);
                    $get_refund_amount= $net_amount-$rfd_amount;
                    $get_commission= round($commission*$get_refund_amount/100,2);
                    $eng_amount=$amount-($coupon+$discount);
                    $total_net_amount=$get_refund_amount-$get_commission;                  
					  $earning_data = array(
						'eng_vnd_id'=>$value->vnd_id,
						'eng_p_id'=>$value->p_id,
						'eng_ord_id'=>$uordid,
						'eng_p_ord_id'=>$value->op_id,
						'eng_qty'=>$value->qty,
						'eng_amount'=>$eng_amount,
						'eng_tax'=>$tax,
						'eng_shipping_charge'=>$deliver,
						'eng_rfd_qty'=>$value->rfd_qty,
						'eng_rfd_amount'=>$rfd_amount,
						'eng_commission'=>$get_commission,
						'eng_earning'=>$total_net_amount,
						'eng_created'=>date('Y-m-d H:i:s')
					);
			 $insert_earning=$this->Orders->save($earning_data, $this->earning);
			 $wallet=$this->Orders->check_vendor($this->wlt_vnd_id,$value->vnd_id,$this->wallet);
              $min_balance=$this->Orders->belance_setting()->min_value;
			 if($Wallet){
			 	$wallet_amount=$wallet->wlt_wallet_amount+$total_net_amount;
			 		if($wallet_amount>=$min_balance){
			 	$available_amount=($wallet->wlt_available_amount+$total_net_amount)-$min_balance;	
			 	}else{$available_amount=0;}		 	
			       $wallet_data = array(
						'wlt_available_amount'=>$available_amount,
						'wlt_wallet_amount'=>$wallet_amount,						
					);	
			   $updateStatus = $this->Orders->update_order_status($this->wlt_vnd_id, $value->vnd_id, $wallet_data, $this->wallet);		 	
			   }else{
			   	if($total_net_amount>=$min_balance){$get_min_balance=$total_net_amount-$min_balance;}
			   	else{$get_min_balance=0;}
			   	  $wallet_data = array(
			   	    	'wlt_vnd_id'=>$value->vnd_id,
						'wlt_available_amount'=>$get_min_balance,
						'wlt_wallet_amount'=>$total_net_amount,						
					);	
			   	  $insert_wallet=$this->Orders->save($wallet_data, $this->wallet);
				}
			}
		}
			if($updateStatus){
				redirect('orders/design_invoice/'.$ordid);	
			}else{
				redirect('orders/design_invoice/'.$ordid);
			}
		}else{
			redirect('orders/badrequest');
		}
	}

	public function seller_orders()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="orders/seller_orders";
		$this->load->view('layout', $content);	
	}

	public function withdrawal()
	{
		 $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['withdrawal_requests'])){  	
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="orders/withdrawal_request";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function cancellation()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['cancellation_requests'])){  
		$content['admin']=admin_profile($this->login->mst_email);
		$content['cancel'] = $this->Orders->get_cancel_product($this->c_id,$this->cancel);
		//print("<pre>".print_r($content['cancel'],true)."</pre>");die;
		$content['subview']="orders/cancellation_requests";
		$this->load->view('layout', $content);	
		}else{
			redirect('dashboard');
		}	
	}

	public function getReturnItemInfo()
	{
		$returnid = $this->input->post('returnid');		
    	$result['item'] = $this->Orders->getCancelItem($returnid);
    	echo json_encode($result);
	}

	public function cancel_item_update()
	{
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if(empty($this->session->userdata('logged_in_admin'))){
			redirect('/');
		}else{		
			if($RequestMethod == "POST") { 	
				$cid=$this->input->post('cancel_pid');
				$message=$this->input->post('message');
				$action=$this->input->post('action');
				if($this->input->post('action')=='Approved'){
					$status_type='Approved';
					$return_type='1';
				}else if($this->input->post('action')=='Cancel'){
					$status_type='Cancelled';
					$return_type='3';
				}
				$data=array(		  
					'c_response'=>$this->input->post('message'),		
					'c_status'=>$this->input->post('action'),
					'c_status_type'=>$status_type,
					'return_type'=>$return_type,
					'c_updated'=>date('Y-m-d H:i:s') 
				); 
				$result = $this->Orders->updateItemPolicy($cid,$data,$this->cancel);	
				if($result==TRUE){echo'Success';}else{echo'Failed';}	 
			}
		}
	}

	public function returns()
	{
		 $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['return_requets'])){  
		$content['admin']=admin_profile($this->login->mst_email);
		//$content['refund'] = $this->Orders->get_refund_product($this->rfd_id,$this->refund);
		$content['subview']="orders/return_requests";
		$this->load->view('layout', $content);	
		}else{
			redirect('dashboard');
		}	
	}
	

	public function badrequest()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="orders/badrequest";
		$this->load->view('layout', $content);
	}
	
	
}

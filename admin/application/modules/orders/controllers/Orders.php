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
	}
	

	public function index()
	{
	    $permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['orders'])){ 
		$content['admin']=admin_profile($this->login->mst_email);
		if(!empty($this->input->post('seller')) || !empty($this->input->post('status')) || !empty($this->input->post('from')) || !empty($this->input->post('to'))){		
		    $content['ordlist'] = $this->Orders->get_all_orders_where($this->ordid,$this->input->post('seller'),$this->input->post('status'),$this->input->post('from'),$this->input->post('to'),$this->orders);
		}else{
		    $content['ordlist'] = $this->Orders->get_all_orders($this->ordid,$this->orders);
	    }
		$content['seller'] = $this->Orders->get_all_vendor($this->vnd_id,$this->vendor);
		//$content['subview']="orders/orders_list";
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
			$content['subview']="orders/order_invoice";
			$this->load->view('layout', $content);
		}else{
			redirect('orders/badrequest');
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
		$content['subview']="orders/cancellation_requests";
		$this->load->view('layout', $content);	
		}else{
			redirect('dashboard');
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

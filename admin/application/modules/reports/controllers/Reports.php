<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Reports_model",'Reports');
		//$this->load->library("excel"); // For Excel Generation //
		// TABLE ORDER TABLE //
		$this->ordid="ord_id";
		$this->ordcstid="cust_id";
		$this->reports="tbl_orders";
		// FOR ORDER PRODUCT TABLE //
		$this->ordProid="op_id";
		$this->ordVnId="ord_vendors";
		$this->ordProducts="tbl_orders_product";
		/*--- FOR BUYER REPORTS ---*/
		$this->cust_id="cust_id";
		$this->customers="tbl_customer";
		/*--- FOR SELLER REPORTS ---*/
		$this->slrs_id="vnd_id";
		$this->sellers="tbl_vendor";
		/*--- FOR SELLER PRODUCT REPORTS ---*/
		$this->vnd_id="p_vnd_id";
		$this->catid="p_cate";
		$this->products="tbl_product";
		/*--- FOR CATEGORY PRODUCT REPORTS ---*/
		$this->cate_id="cate_id";
		$this->category="tbl_category";
	}
	
	/*--- CUSTOMER ORDER LIST ---*/ 
	public function index()
	{
	    $permission=unserialize($this->login->mst_permission);	   
		if($this->login->mst_role=='0' || !empty($permission['sales_report'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['salesReports'] = $this->Reports->get_sales_reports($this->reports);
		$content['subview']="reports/reports_list";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function export_sales()
 	{   

 		 // file name 
		   $filename = 'sales_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		    $salesReport = $this->Reports->get_sales_reports($this->reports); 	
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("NO OF ORDERS", "NET AMOUNT", "ADJUST AMOUNT", "GST", "SHIPPING CHARGE", "DATE"); 
		   fputcsv($file, $header);
		   foreach ($salesReport as $key=>$line){ 
		   	  $narray=array($line->ORDERS,$line->NETAMNT,$line->ADJAMNT,$line->GST,$line->SHIPPING,$line->CREATED);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 		
  		
 	}

 	/*--- BUYERS  REPORTS ---*/ 
 	public function buyers()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['buyers_report'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['buyerReports'] = $this->Reports->get_buyer_reports($this->customers);
		$content['subview']="reports/buyers_list";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function export_buyers()
	{
		// file name 
		   $filename = 'buyers_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		   $buyerReport = $this->Reports->get_buyer_reports($this->customers); 	
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("NAME", "EMAIL ADDRESS", "CONTACT NO", "ORDER PLACED", "PURCHASE AMOUNT", "REGISTRATION DATE"); 
		   fputcsv($file, $header);
		   foreach ($buyerReport as $key=>$line){ 
		   	  $narray=array($line->cust_fname.' '.$line->cust_lname,$line->cust_email,$line->cust_phone,$line->Orders,$line->Amount,$line->cust_created);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
	    
	}


 	/*--- SELLRS REPORTS ---*/ 
	public function sellers()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['seller_report'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['sellerReports'] = $this->Reports->get_seller_reports($this->sellers);		
		$content['subview']="reports/sellers_list";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function export_sellers()
	{
       // file name 
		   $filename = 'sellers_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		   $sellerReport = $this->Reports->get_seller_reports($this->sellers);	
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("NAME", "EMAIL ADDRESS", "CONTACT NO", "ORDER PLACED", "REGISTRATION DATE"); 
		   fputcsv($file, $header);
		   foreach ($sellerReport as $key=>$line){ 
		   	  $narray=array($line->vnd_name,$line->vnd_email,$line->vnd_phone,$line->Orders,$line->vnd_created);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 

	}

	/*--- PRODUCT REPORTS ---*/ 

	public function products()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['product_seller_wise'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['getSellers'] = $this->Reports->get_sellers_list($this->sellers);
		$content['subview']="reports/sellerwise";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function sellerwise()
	{
		$vndid = $this->input->post('getSellerProducts');
		if(!empty($vndid)){
			$vndId = decode($vndid);
			$content['admin']=admin_profile($this->login->mst_email);
			$content['slrsProducts'] = $this->Reports->get_seller_products($this->vnd_id,$vndId,$this->products);
			$content['subview']="reports/productSellerWise";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="reports/badrequest";
			$this->load->view('layout', $content);
		}
	}

	public function export_productBySellers($vndrid=null)
	{
		if(!empty($vndrid)){
			$vndId = decode($vndrid);

		   $filename = 'products_by_seller_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		   $sellerReport = $this->Reports->get_seller_products($this->vnd_id,$vndId,$this->products);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("ID", "REFRENCE NO", "NAME", "MODEL", "BRAND", "SELLING PRICE", "LENGTH", "WIDTH", "HEIGHT","WEIGHT UNIT","WEIGHT", "DATE"); 
		   fputcsv($file, $header);
		   foreach ($sellerReport as $key=>$line){ 
		   	if( $line->ut_weight_name!=''){
			   	$ut_weight=$line->ut_weight_name;
			   }else{
			   	$ut_weight=$line->ut_dime_name;			   
			   }
		   	  $narray=array($line->p_id,$line->p_reference_no,$line->p_name,$line->p_model,$line->brd_name,$line->p_selling_price,$line->p_lenght,$line->p_width,$line->p_height,$ut_weight,$line->p_weight,$line->p_created);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="reports/badrequest";
			$this->load->view('layout', $content);
		}
	}

	/*--- CATEGORY PRODUCTS ---*/ 
	public function category()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['product_catallog_wise'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['getCategory'] = $this->Reports->get_category_list($this->category);
		$content['subview']="reports/categorywise";
		$this->load->view('layout', $content);
		}else{
			redirect('dashboard');
		}	
	}

	public function categorywise()
	{
		$catid = $this->input->post('getCategoryProducts');
		if(!empty($catid)){
			$catId = decode($catid);
			$content['admin']=admin_profile($this->login->mst_email);
			//$content['cateProducts'] = "Work in Progress";
			$content['cateProducts'] = $this->Reports->get_category_products($this->catid,$catId,$this->ordProducts);
			// echo "<pre>";
			// print_r($content['cateProducts']);die;
			$content['subview']="reports/productCategoryWise";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="reports/badrequest";
			$this->load->view('layout', $content);
		}
	}

	public function export_productByCategory($cateid=null)
	{
		if(!empty($cateid)){
			$catId = decode($cateid);
		   $filename = 'products_by_category_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		   $sellerReport = $this->Reports->get_category_products($this->catid,$catId,$this->ordProducts);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("CATE ID", "CATE NAME", "ORDER ID", "ORDER REFRENCE NO", "NAME", "SELLING PRICE", "SPECIAL PRICE", "QAUNTITY", "EFFECTIVE PRICE", "SHIPPING CHARGE", "GST", "TAX", "COUPON", "COUPON AMOUNT", "TOTAL", "COMMISSION", "ORDER DATE"); 
		   fputcsv($file, $header);
		   foreach ($sellerReport as $key=>$line){ 
		   /*--- TOTAL ---*/	
		    $total = ($line->pro_price*$line->pro_qty)+$line->ord_deliver_charge+$line->pro_gst;
		    /*-- COMMISSION --*/ 
			 $grandTotal = ($line->pro_price+$line->ord_deliver_charge+$line->pro_gst)/$line->txt_per;	   	
		   	  $narray=array($line->cate_id,$line->cate_name,$line->ord_id,$line->ord_reference_no,$line->pro_name,$line->pro_selling_price,$line->pro_special_price,$line->pro_qty,$line->pro_price,$line->ord_deliver_charge,$line->pro_gst,$line->txt_per,$line->pro_coupon,$line->pro_discount_value,$total,$grandTotal,$line->ord_create);
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 			
			 
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="reports/badrequest";
			$this->load->view('layout', $content);
		}
	}

	/*--- TOP PRODUCTS ---*/

	public function top_products()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['top_products'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['topProducts'] = $this->Reports->get_top_products_list($this->ordProducts);
		$content['subview']="reports/topProducts";
		$this->load->view('layout', $content);
	   }else{
	   	redirect('dashboard');
	   }
	}

	public function export_topProducts()
	{

		$filename = 'top_products_reports'.date('d-M-y').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; "); 	    
		   // get data 
		   $topProductsReport = $this->Reports->get_top_products_list($this->ordProducts);
		   // file creation 
		   $file = fopen('php://output', 'w');		 
		   $header = array("CATEGORY ID","CATEGORY NAME", "PRODUCT ID", "PRODUCTS NAME", "CREATED DATE"); 
		   fputcsv($file, $header);
		   foreach ($topProductsReport as $key=>$line){ 		      	
		   	  $narray=array($line->p_cate,$line->cate_name,$line->pro_id,$line->pro_name,date('j M Y, G:i A',strtotime($line->ord_create)));
            fputcsv($file, $narray);		   
		   }
		   fclose($file); 
		   exit; 
		
		  
	}
	/*--- COMMISSION REPORTS ---*/ 

	public function commission()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['commission'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="reports/badrequest";
		$this->load->view('layout', $content);
	   }else{
	   	redirect('dashboard');
	   }
	}
	
}

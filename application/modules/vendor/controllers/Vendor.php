<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Vendor_model","Vendor");
		if(!empty($this->session->userdata('logged_in_customer'))){
	    $this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		//$this->load->helper("common");
		/* ========FOR BANEERS=========== */
		$this->fld_bnrsid="slr_id"; 
		$this->table_banners="tbl_banner"; 
		/* ========FOR Navigation=========== */		
		$this->table_navigation="tbl_navigation"; 
		/* ========FOR CATEGORY=========== */
		$this->fld_cateid="cate_id"; 
		$this->table_category="tbl_categories"; 
		/* ========FOR SUB CATEGORY=========== */
		$this->fld_scateid="scate_id"; 
		$this->table_scategory="tbl_sub_category"; 
		/* ========FOR PRODUCTS =========== */
		$this->fld_proid="pro_id";
		$this->fld_cateid="cate_id";
		$this->table_products="tbl_product"; 
		/* ========FOR NEWS LETTER =========== */
		$this->table_newsletter="tbl_newsletter"; 
		
			
		/* ========FOR LOGIN =========== */
		$this->cust_id="custId"; 
		$this->table_customer="tbl_customers";
		/* ========FOR VENDOR =========== */
		$this->vnd_id="vnd_id"; 
		$this->table_vendor="tbl_vendor";
		/* ========FOR Master =========== */
		$this->mst_id="mst_role"; 
		$this->table_master="tbl_master";
			/* ========FOR CATEGORY =========== */
		$this->cate_id="cate_id"; 
		$this->cate_slug="cate_slug"; 
		$this->table_category="tbl_category";
		/* ========FOR BRAND =========== */
		$this->brd_id="brd_id"; 
		$this->table_brand="tbl_brand";
		/* ========FOR OPTION =========== */
		$this->opt_id="opt_id"; 
		$this->table_option="tbl_option";
		/* ========FOR OPTION =========== */
		$this->blg_id="blg_id"; 
		$this->table_blogs="tbl_blogs";
			
    }
  
    public function index()
	{ 		
	    $slrid=decode($this->uri->segment(2));
	    if($slrid!='0'){
	    	$content['vendorProfile'] = $this->Vendor->get_vendor_profile($this->vnd_id,$slrid,$this->table_vendor);
	    }else{
	    	$content['vendorProfile'] = $this->Vendor->get_master_profile($this->mst_id,$slrid,$this->table_master);
	    }
	    $content['brand_list']=$this->Vendor->brand_list($this->table_brand);
	    $content['color']=$this->Vendor->color_list($this->table_option);
	    $content['size']=$this->Vendor->size_list($this->table_option);
	    
	    
	    // echo "<pre>";
	    // print_r($content['vendorProfile']);
	    // die();
	    // $content['banner']=$this->Home_Model->get_banner_list($this->table_banners);
	    // $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	    // $content['hot_product']=$this->Home_Model->hot_product_list($this->table_products);
	    // $content['recent_product']=$this->Home_Model->recent_product_list($this->table_products);
	    // $content['featured_product']=$this->Home_Model->featured_product_list($this->table_products);
	    // $content['trending_product']=$this->Home_Model->trending_product_list($this->table_products);
	    // $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);
	    // $content['blog']=$this->Home_Model->blog_list($this->table_blogs);
		$content['subview']='vendor/vendorInfo';
		$this->load->view('layout', $content);
		
	}

	public function categories()
	{ 	  
       $url_slug=$this->uri->segment(2);	  
	   $content['products']=$this->Home_Model->categories_product_list($url_slug,$this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);
	   if(empty($content['products'][0]->p_cate)){
	   	$content['filter_categoty']='';}
	   	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       if(empty($content['products'][0]->p_scate)){
       	$content['filter_sub_categoty']='';}
       	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       $category=$this->Home_Model->signle_lable('cate_slug',$url_slug,$this->table_category);     
       $content['p_category'] =$category->cate_id;   
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}


 
    public function category()
	{ 	  
       $url_slug=$this->uri->segment(2);
	   $content['products']=$this->Home_Model->get_cate_product_list($url_slug,$this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);
	   if(empty($content['products'][0]->p_cate)){
	   	$content['filter_categoty']='';}
	   	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       if(empty($content['products'][0]->p_scate)){
       	$content['filter_sub_categoty']='';}
       	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       $category=$this->Home_Model->signle_lable('mn_slug',$url_slug,$this->table_navigation);      
       $content['p_category'] =$category->mn_category_id;         
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

    public function sub_category()
	{ 	  
       $id=decode($this->uri->segment(2));      
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_sub_cate_product_list($id,$this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);
	   if(empty($content['products'][0]->p_cate)){
	   	$content['filter_categoty']='';}
	   	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       if(empty($content['products'][0]->p_scate)){
       	$content['filter_sub_categoty']='';}
       	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       $content['p_scategory'] =$id;  	   	
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function child_category()
	{ 	  
       $id=decode($this->uri->segment(2));      
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_child_cate_product_list($id,$this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	
	   if(empty($content['products'][0]->p_cate)){
	   	$content['filter_categoty']='';}
	   	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       if(empty($content['products'][0]->p_scate)){
       	$content['filter_sub_categoty']='';}
       	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       $content['p_chcategory'] =$id;  	  
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function hot_products()
	{ 	  
      
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_hot_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['p_hot'] ='1';  	  
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function featured_products()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_featured_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	
	   $content['p_featured'] ='1';     	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function trending_products()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_trending_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['p_trending'] ='1';     	 	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function brand()
	{ 	  
       $url_slug=$this->uri->segment(2);      
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_brand_product_list($url_slug,$this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);
	   $brand=$this->Home_Model->signle_lable('brd_slug',$url_slug,$this->table_brand);
       $content['p_brand'] =$brand->brd_id;  	   
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function product()
	{ 	  
       $id=decode($this->uri->segment(2));      
	   $content['products']=$this->Home_Model->product_detail($id,$this->table_products);
	   $content['related_product']=$this->Home_Model->related_product($content['products']->child_slug,$this->table_products);	
	   //  echo"<pre>";
	   // print_r($content['products']);
	   // exit();
	   $content['subview']='home/product_deatils';
	   $this->load->view('layout', $content);
		
	}

	function product_data()
	 {

	         $page=$this->uri->segment(4);			 
			  sleep(1);			 
			  $brand = $this->input->post('brand');
			  $color = $this->input->post('color');
			  $size = $this->input->post('size');
			  $price =$this->input->post('price');
			  $grade = $this->input->post('grade');	
			  $condition = $this->input->post('condition');	
			  $category =$this->input->post('category');
			  $sub_category = $this->input->post('sub_category');	
			  $child_category = $this->input->post('child_category');
			  $hot =$this->input->post('hot');
			  $featured = $this->input->post('featured');	
			  $trending = $this->input->post('trending');	
			  $newest_first = $this->input->post('newest_first');	
		  echo $query = $this->Home_Model->product_data($page,$brand,$color,$size,$price,$grade,$condition,$category,$sub_category,$child_category,$hot,$featured,$trending,$newest_first);
			 
	 }
	
	
	 
	 
}

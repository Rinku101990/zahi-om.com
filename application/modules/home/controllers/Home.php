<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
// use Twilio\Rest\Client;

class Home extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Home_model","Home_Model");
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
		/* ========FOR CHILD CATEGORY=========== */
		$this->fld_childid="child_id"; 
		$this->table_child_category="tbl_child_category"; 
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
		 /* ========FOR Comments Reviews===== */			
		$this->table_cmnts_reviews="tbl_cmnts_reviews";
		  /* ========FOR SLEEVE  TABEL=========== */ 			
            $this->fld_sl_id="sl_id";	
            $this->table_sleeve="tbl_sleeve";
             /* ========FOR FABRIC  TABEL=========== */ 			
            $this->fld_fb_id="fb_id";	
            $this->table_fabric="tbl_fabric";
             /* ========FOR Color  TABEL=========== */ 			
            $this->fld_cl_id="cl_id";	
            $this->table_color="tbl_color";	
             /* ========FOR Color  TABEL=========== */ 			
            $this->fld_sz_id="sz_id";	
            $this->table_size="tbl_size";	 		
            /* ========FOR Blog =========== */
		$this->pg_id="pg_id"; 
		$this->table_page="tbl_page";
			
    }
  
    public function index()
	{ 		
	    $content['banners']=$this->Home_Model->get_banner_list($this->table_banners);
	    $content['seller']=$this->Home_Model->vendor_list($this->table_vendor);
	    $content['hot_product']=$this->Home_Model->hot_product_list($this->table_products);
	    $content['recent_product']=$this->Home_Model->recent_product_list($this->table_products);
	    $content['featured_product']=$this->Home_Model->featured_product_list($this->table_products);
		//print("<pre>".print_r($content['featured_product'],true)."</pre>");die;
		$this->load->view('home/home', $content);
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
		$content['banner_img'] =cate_img($category->cate_id);
	   	$content['subview']='home/products';
	   	$this->load->view('layout', $content);
		
	}
	
	
 	public function eid_collection()
	{ 	    
	   	$content['products']=$this->Home_Model->get_eid_product_list($this->table_products);
	   	$content['category']=$this->Home_Model->get_category_list($this->table_category);
	   	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   	$content['color']=$this->Home_Model->color_list($this->table_option);
	   	$content['size']=$this->Home_Model->size_list($this->table_option);
	    $content['p_eid']=1;
	   	$this->load->view('home/eid_collection', $content);
		
	}


 
    // public function category()
	// { 	  
    //    	$url_slug=decode($this->uri->segment(2));
	   	
    //   	$content['cate_name']=$this->Home_Model->cate_cate_name($url_slug,$this->table_category);  
	//    	$content['products']=$this->Home_Model->get_cate_product_list($url_slug,$this->table_products);
	//    	$content['category']=$this->Home_Model->get_category_list($this->table_category);
	//    	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	//    	$content['color']=$this->Home_Model->color_list($this->table_option);
	//    	$content['size']=$this->Home_Model->size_list($this->table_option);
	//     if($url_slug=='3'){
    //    		$content['p_hot'] ='1';  
    //    	}elseif(empty($content['products'][0]->p_cate)){
	//    		$content['filter_categoty']=$url_slug;}
	//    	else{  $content['p_category'] =$url_slug;  }
       	
	// 	if(empty($content['products'][0]->p_scate)){
    //    		$content['filter_sub_categoty']='';}
    //    	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        
	// 	if(empty($content['products'][0]->p_child)){
    //     	$content['filter_child_categoty']='';}
    //     else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       	
	// 	$category=$this->Home_Model->signle_lable('mn_slug',$url_slug,$this->table_navigation);      
    //    	$content['banner_img'] =category_img($url_slug); 
	// 	   $this->load->view('home/products', $content);
	// }
 
    public function category()
	{ 	  
       	$url_slug=decode($this->uri->segment(2)); /*--For Category--*/
		$url_slug_sub=''; /*--For Sub Category--*/
		$url_slug_child=''; /*--For Child Category--*/
		$url_slug_brand=''; /*--For Child Category--*/
      	$content['cate_name']=$this->Home_Model->cate_cate_name($url_slug,$this->table_category);  
	   	//$content['products']=$this->Home_Model->get_cate_product_list($url_slug,$this->table_products);
		//print("<pre>".print_r($content['products'],true)."</pre>");die;
	   	$content['category']=$this->Home_Model->get_category_list($this->table_category);
	   	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   	$content['color']=$this->Home_Model->color_list($this->table_option);
	   	$content['size']=$this->Home_Model->size_list($this->table_option);
	    if($url_slug=='3'){
       		$content['p_hot'] ='1';  
       	}elseif(empty($content['products'][0]->p_cate)){
	   		$content['filter_categoty']=$url_slug;}
	   	else{  $content['p_category'] =$url_slug;  }
       	
		if(empty($content['products'][0]->p_scate)){
       		$content['filter_sub_categoty']='';}
       	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        
		if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
       	
		$category=$this->Home_Model->signle_lable('mn_slug',$url_slug,$this->table_navigation);      
       	$content['banner_img'] =category_img($url_slug); 
	   
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
		$category2 =$this->input->post('category2');
		$sub_category2 = $this->input->post('sub_category2');	
		$child_category = $this->input->post('child_category');
		$hot =$this->input->post('hot');
		$featured = $this->input->post('featured');	
		$trending = $this->input->post('trending');
		$eid = $this->input->post('eid');
		$supplier = $this->input->post('supplier');	
		$newest_first = $this->input->post('newest_first');
		//pagination
		$total_product=$this->Home_Model->count_all($url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url('category/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
		$config['total_rows'] = $total_product;
		$config['per_page'] = 12;
		$config['uri_segment'] =4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="col-lg-12"><div class="aiz-pagination aiz-pagination-center mt-4" align="center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = ' <li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4;
		$this->pagination->initialize($config);
		// $page = $this->uri->segment(4);
		$start = ($page) * $config['per_page'];
		//echo$config['per_page'];
		//end pagination
		$content['filterProducts'] = $this->Home_Model->product_data($config['per_page'],$start,$url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		//print("<pre>".print_r($content['filterProducts'],true)."</pre>");die;
		//echo $pagination=$this->pagination->create_links();
	   	// $content['subview']='home/products';
	   	$this->load->view('home/products', $content);
		
	}

	// public function sub_category()
	// { 	  
    //    $id=decode($this->uri->segment(2));   
    //    $content['cate_name']=$this->Home_Model->cate_sub_name($id,$this->table_scategory);      
	//    $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	//    $content['products']=$this->Home_Model->get_sub_cate_product_list($id,$this->table_products);
	//    $content['category']=$this->Home_Model->get_category_list($this->table_category);

	//    $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	//    $content['color']=$this->Home_Model->color_list($this->table_option);
	//    $content['size']=$this->Home_Model->size_list($this->table_option);
	//    if(empty($content['products'][0]->p_cate)){
	//    	$content['filter_categoty']='';}
	//    	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
    //    if(empty($content['products'][0]->p_scate)){
    //    	$content['filter_sub_categoty']=$id;}
    //    	 else{  $content['p_scategory'] =$id; }
    //     if(empty($content['products'][0]->p_child)){
    //     	$content['filter_child_categoty']='';}
    //     	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}      
    //    $content['p_category'] =cate_id($id);   
    //     //$content['p_scategory'] =$id;   
    //     $content['banner_img'] =scate_img($id);
    //     // echo"<pre>";
    //     // print_r($content);
    //     // die; 
	//    //$content['subview']='home/products';
	//    $this->load->view('home/products', $content);
		
	// }

    public function sub_category()
	{ 	  
       	$id=decode($this->uri->segment(2)); 
		$url_slug=''; /*--For Category--*/
		$url_slug_sub=$id; /*--For Sub Category--*/
		$url_slug_child=''; /*--For Child Category--*/
		$url_slug_brand=''; /*--For Child Category--*/
       	$content['cate_name']=$this->Home_Model->cate_sub_name($id,$this->table_scategory);      
	   	$content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   	//$content['products']=$this->Home_Model->get_sub_cate_product_list($id,$this->table_products);
	   	$content['category']=$this->Home_Model->get_category_list($this->table_category);

	   	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   	$content['color']=$this->Home_Model->color_list($this->table_option);
	   	$content['size']=$this->Home_Model->size_list($this->table_option);
	   	if(empty($content['products'][0]->p_cate)){
	   		$content['filter_categoty']='';}
	   	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       	
		if(empty($content['products'][0]->p_scate)){
       		$content['filter_sub_categoty']=$id;}
       	else{  $content['p_scategory'] =$id; }
        
		if(empty($content['products'][0]->p_child)){
        	$content['filter_child_categoty']='';}
        else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}      
       	$content['p_category'] =cate_id($id);   
        //$content['p_scategory'] =$id;   
        $content['banner_img'] =scate_img($id);
			
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
		$category2 =$this->input->post('category2');
		$sub_category2 = $this->input->post('sub_category2');	
		$child_category = $this->input->post('child_category');
		$hot =$this->input->post('hot');
		$featured = $this->input->post('featured');	
		$trending = $this->input->post('trending');
		$eid = $this->input->post('eid');
		$supplier = $this->input->post('supplier');	
		$newest_first = $this->input->post('newest_first');
		//pagination
		$total_product=$this->Home_Model->count_all($url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url('sub-category/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
		$config['total_rows'] = $total_product;
		$config['per_page'] = 12;
		$config['uri_segment'] =4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="col-lg-12"><div class="aiz-pagination aiz-pagination-center mt-4" align="center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = ' <li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4;
		$this->pagination->initialize($config);
		// $page = $this->uri->segment(4);
		$start = ($page) * $config['per_page'];
		//echo$config['per_page'];
		//end pagination
		$content['filterProducts'] = $this->Home_Model->product_data($config['per_page'],$start,$url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);

	   $this->load->view('home/products', $content);
		
	}

	// public function child_category()
	// { 	  
    //    	$id=decode($this->uri->segment(2)); 
    //    	$content['cate_name']=$this->Home_Model->cate_child_name($id,$this->table_child_category);
	//    	$content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	//    	$content['products']=$this->Home_Model->get_child_cate_product_list($id,$this->table_products);
	//    	//print("<pre>".print_r($content['products'],true)."</pre>");die;
	//    	$content['category']=$this->Home_Model->get_category_list($this->table_category);
	//    	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	//    	$content['color']=$this->Home_Model->color_list($this->table_option);
	//    	$content['size']=$this->Home_Model->size_list($this->table_option);	

	//    	if(empty($content['products'][0]->p_cate)){
	//    		$content['filter_categoty']='';}
	//    	else{ $content['filter_categoty']=$content['products'][0]->p_cate;}
       	
	// 	if(empty($content['products'][0]->p_scate)){
    //    		$content['filter_sub_categoty']='';}
    //    	else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
        
	// 	if(empty($content['products'][0]->p_child)){
    //     	$content['filter_child_categoty']='';}
    // 	else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}
		
	// 	if(!empty(child_img($id))){
	// 		$img=child_img($id);
	// 	}else{$img=scate_img(scate($id));}
    //    	$content['p_chcategory'] =$id; 
    //    	$content['p_category'] =child_cate_id($id);  
    //     $content['p_scategory'] =scate($id); 	 
    //     $content['banner_img']=$img; 
	// 	// $content['subview']='home/products';
	//    	$this->load->view('home/products', $content);
	// }

	public function child_category()
	{ 	  
       	$id=decode($this->uri->segment(2)); 
		$url_slug=''; /*--For Category--*/
		$url_slug_sub=''; /*--For Sub Category--*/
		$url_slug_child=$id; /*--For Child Category--*/
		$url_slug_brand=''; /*--For Child Category--*/
       	$content['cate_name']=$this->Home_Model->cate_child_name($id,$this->table_child_category);
	   	$content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   	$content['products']=$this->Home_Model->get_child_cate_product_list($id,$this->table_products);
	   	//print("<pre>".print_r($content['products'],true)."</pre>");die;
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
		
		if(!empty(child_img($id))){
			$img=child_img($id);
		}else{$img=scate_img(scate($id));}
       	$content['p_chcategory'] =$id; 
       	$content['p_category'] =child_cate_id($id);  
        $content['p_scategory'] =scate($id); 	 
        $content['banner_img']=$img; 
		
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
		$category2 =$this->input->post('category2');
		$sub_category2 = $this->input->post('sub_category2');	
		$child_category = $this->input->post('child_category');
		$hot =$this->input->post('hot');
		$featured = $this->input->post('featured');	
		$trending = $this->input->post('trending');
		$eid = $this->input->post('eid');
		$supplier = $this->input->post('supplier');	
		$newest_first = $this->input->post('newest_first');
		//pagination
		$total_product=$this->Home_Model->count_all($url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url('child-category/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
		$config['total_rows'] = $total_product;
		$config['per_page'] = 12;
		$config['uri_segment'] =4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="col-lg-12"><div class="aiz-pagination aiz-pagination-center mt-4" align="center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = ' <li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4;
		$this->pagination->initialize($config);
		// $page = $this->uri->segment(4);
		$start = ($page) * $config['per_page'];
		//echo$config['per_page'];
		//end pagination
		$content['filterProducts'] = $this->Home_Model->product_data($config['per_page'],$start,$url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);

	   	$this->load->view('home/products', $content);
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

    public function supplier()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_trending_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['supplier'] ='1';     	 	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

    public function manufacture()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_trending_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['supplier'] ='2';     	 	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function wholesaler()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_trending_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['supplier'] ='3';     	 	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}


	public function retailer()
	{ 	
	   $content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   $content['products']=$this->Home_Model->get_trending_product_list($this->table_products);
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);	  
	   $content['supplier'] ='4';     	 	 
	   $content['subview']='home/products';
	   $this->load->view('layout', $content);
		
	}

	public function brand()
	{ 	  
       	$id=decode($this->uri->segment(2));  
		$url_slug=''; /*--For Category--*/
		$url_slug_sub=''; /*--For Sub Category--*/
		$url_slug_child=''; /*--For Child Category--*/
		$url_slug_brand=$id; /*--For Child Category--*/   
        $content['cate_name']=$this->Home_Model->cate_vendor_name($url_slug_brand,$this->table_vendor);  
	   	$content['category_list']=$this->Home_Model->get_category_list($this->table_category);
	   	//$content['products']=$this->Home_Model->get_brand_product_list($id,$this->table_products);
	   	$content['category']=$this->Home_Model->get_category_list($this->table_category);
	   	$content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   	$content['color']=$this->Home_Model->color_list($this->table_option);
	   	$content['size']=$this->Home_Model->size_list($this->table_option);
	   	$brand=$this->Home_Model->signle_lable('brd_id',$url_slug_brand,$this->table_brand);
       	$content['p_brand'] =$url_slug_brand;
       	$content['banner_img']=vendor_banner_img($url_slug_brand);
      	
		if($url_slug_brand=='3'){
				$content['p_hot'] ='1';  
			}elseif(empty($content['products'][0]->p_cate)){
				$content['filter_categoty']=$url_slug_brand;}
			else{  $content['p_category'] =$url_slug_brand;  }
			
		if(empty($content['products'][0]->p_scate)){
				$content['filter_sub_categoty']='';}
			else{ $content['filter_sub_categoty']=$content['products'][0]->p_scate;}
		
		if(empty($content['products'][0]->p_child)){
			$content['filter_child_categoty']='';}
		else{ $content['filter_child_categoty']=$content['products'][0]->p_child;}

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
		$category2 =$this->input->post('category2');
		$sub_category2 = $this->input->post('sub_category2');	
		$child_category = $this->input->post('child_category');
		$hot =$this->input->post('hot');
		$featured = $this->input->post('featured');	
		$trending = $this->input->post('trending');
		$eid = $this->input->post('eid');
		$supplier = $this->input->post('supplier');	
		$newest_first = $this->input->post('newest_first');
		//pagination
		$total_product=$this->Home_Model->count_all($url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = base_url('brand/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
		$config['total_rows'] = $total_product;
		$config['per_page'] = 12;
		$config['uri_segment'] =4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="col-lg-12"><div class="aiz-pagination aiz-pagination-center mt-4" align="center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = ' <li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 4;
		$this->pagination->initialize($config);
		// $page = $this->uri->segment(4);
		$start = ($page) * $config['per_page'];
		//echo$config['per_page'];
		//end pagination
		$content['filterProducts'] = $this->Home_Model->product_data($config['per_page'],$start,$url_slug,$url_slug_sub,$url_slug_child,$url_slug_brand,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);

	   	$this->load->view('home/products', $content);
		
	}

	public function make_design()
	{      
	   $content['sleeve']=$this->Home_Model->get_list($this->fld_sl_id,$this->table_sleeve);
	   $content['fabric']=$this->Home_Model->get_list($this->fld_fb_id,$this->table_fabric);
	   $content['color']=$this->Home_Model->get_list($this->fld_cl_id,$this->table_color); 
	   $content['size']=$this->Home_Model->get_list($this->fld_sz_id,$this->table_size);     
	   $content['subview']='home/make_design';
	   $this->load->view('layout', $content);
		
	}

	public function product()
	{ 	  
       $id=decode($this->uri->segment(2));      
	   $content['products']=$this->Home_Model->product_detail($id,$this->table_products);
	   $content['related_product']=$this->Home_Model->related_product($content['products']->child_slug,$this->table_products);	
	    $content['reviews_cmnts']=$this->Home_Model->reviews_cmnts($id,$this->table_cmnts_reviews);	
	   //  echo"<pre>";
	   // print_r($content['products']);
	   // exit();
	   // $content['detail']=1;
	   // $content['subview']='home/product_details';
	   $this->load->view('home/product_details', $content);
		
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
			  $category2 =$this->input->post('category2');
			  $sub_category2 = $this->input->post('sub_category2');	
			  $child_category = $this->input->post('child_category');
			  $hot =$this->input->post('hot');
			  $featured = $this->input->post('featured');	
			  $trending = $this->input->post('trending');
			  $eid = $this->input->post('eid');
			  $supplier = $this->input->post('supplier');	
			  $newest_first = $this->input->post('newest_first');
			  //pagination
			   $total_product=$this->Home_Model->count_all($brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
			   $this->load->library('pagination');
              $config = array();
              $config['base_url'] = '#';
              $config['total_rows'] = $total_product;
              $config['per_page'] = 12;
              $config['uri_segment'] =4;
              $config['use_page_numbers'] = TRUE;
              $config['full_tag_open'] = '<div class="col-lg-12"><div class="aiz-pagination aiz-pagination-center mt-4" align="center"><ul class="pagination">';
              $config['full_tag_close'] = '</ul>';
              $config['first_tag_open'] = ' <li class="page-item">';
              $config['first_tag_close'] = '</li>';
              $config['last_tag_open'] = ' <li class="page-item">';
              $config['last_tag_close'] = '</li>';
              $config['next_link'] = '&gt;';
              $config['next_tag_open'] = ' <li class="page-item">';
              $config['next_tag_close'] = '</li>';
              $config['prev_link'] = '&lt;';
              $config['prev_tag_open'] = ' <li class="page-item">';
              $config['prev_tag_close'] = '</li>';
              $config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
              $config['cur_tag_close'] = '</li>';
              $config['num_tag_open'] = ' <li class="page-item">';
              $config['num_tag_close'] = '</li>';
              $config['num_links'] = 4;
              $this->pagination->initialize($config);
             // $page = $this->uri->segment(4);
              $start = ($page - 1) * $config['per_page'];
              //echo$config['per_page'];
              //end pagination
		      echo $query = $this->Home_Model->product_data($config['per_page'],$start,$brand,$color,$size,$price,$grade,$condition,$category,$category2,$sub_category,$sub_category2,$child_category,$hot,$featured,$trending,$eid,$supplier,$newest_first);
		      echo $pagination=$this->pagination->create_links();
	}

    function search_data(){		
		$search = $this->input->post('search');	
		$p_name='p_name';
		$p_brand='p_brand';
		$p_cate='p_cate';
		$p_scate='p_scate';
		$p_child='p_child';
		$Product_Name=$this->Home_Model->Product_Search($p_name,$search,$this->table_products);
		$Product_Brand=$this->Home_Model->Product_Brand_Search($p_brand,$search,$this->table_products);
		$Product_Cate=$this->Home_Model->Product_Cate_Search($p_cate,$search,$this->table_products);
		$Product_Scate=$this->Home_Model->Product_Scate_Search($p_scate,$search,$this->table_products);
		$Product_child=$this->Home_Model->Product_Child_Search($p_child,$search,$this->table_products);
	
	 	if(!empty($Product_Name)){
		 	$product=$Product_Name;
	 	}elseif(!empty($Product_Brand)){	
     		$product=$Product_Brand;
	 	}elseif(!empty($Product_Cate)){	
     		$product=$Product_Cate;
	 	}elseif(!empty($Product_Scate)){
	 		$product=$Product_Scate;
	 	}else{
	 		$product=$Product_child;
	 	} 
	
	 	if(!empty($product))
     	{  
     		$date=date('Y-m-d');
     		echo'<div class="typed-search-box"><div id="search-content">
     				<div class="product">            
             	<ul> ';
          	foreach ($product as $row):   
       			if(!empty($row->pg_image)){
        			$img='<img src="'.base_url('seller/uploads/').slug($row->cate_name).'/'.slug($row->scate_name).'/'.slug($row->child_name).'/'.explode(',',$row->pg_image)[0].'" alt="'.$row->p_name.'" style="object-fit: contain;width:50px !important; height: 50px !important;">';
           		}else{
        			$img='<img src="'.base_url('seller/uploads/default-image.png').'" alt="'.$row->p_name.'" style="object-fit: contain;width:70px !important; height: 70px !important;">';
         		}
         		if(!empty($row->sp_special_price) && $row->sp_start_date <= $date && $row->sp_end_date >= $date){
         			$price='<del class="old-product-price strong-400">'.currency($this->website->web_currency).''.$row->p_selling_price.'</del>
             			<span class="product-price strong-600">'.currency($this->website->web_currency).''.$row->sp_special_price.'</span>';
        		}else{
        			$price='<span class="product-price strong-600">'.currency($this->website->web_currency).''.$row->p_selling_price.'</span>';
       			}  
       			$count_user=get_star($row->p_id)->count;
       			$star_count=get_star($row->p_id)->star_count;
         		if($star_count){
      				$GetStar=GetStar1(round($star_count/$count_user,1));
       			}else{$GetStar=GetStar1(0);}
         		
         		if($row->int_stock=='1'){
         			$stock='In stock';
         			$class='bg-green';
         		}else{
         			$stock='Out of stock';
         			$class='bg-red';
         		}
               
               echo '<li style=" border-bottom: 1px solid #eee !important;">
                    	<a href="'.base_url('product/').encode($row->p_id).'/'.slug($row->p_name).'">
                    	<div class="d-flex search-product align-items-center">
                            <div class="image">'.$img.'
                        </div>
                        <div class="w-100 overflow--hidden" style="margin-left:3%">
                            <div class="product-name text-truncate">
                                '.$row->p_name.'
                            </div>
                            <!--<div class="star-rating star-rating-sm mt-1" style="    margin-left: 20px;">
                                <ul>'.$GetStar.'</ul>
                                        </div>-->
                                <div class="clearfix">
                        	        <div class="price-box float-left">'.$price.'</div>
                                    	<div class="stock-box float-right">
                                    		<span class="badge badge-pill '.$class.'">'.$stock.'</span>
                                     	</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                	</li>';
          		endforeach;
           		echo' </ul></div></div></div>';
     		}else{
           		
           		echo '<div style="position: absolute;top: 100%;border: 1px solid #eceff1;box-shadow: 0 5px 25px 0 rgba(123,123,123,0.15);background: #fff;width: calc(55.7% - 48px);-webkit-transition: all 0.3s;z-index: 999999;height:45px">
           				<div id="search-content">
					        <p style="background:#fff;padding:10px;width: 100%;border: 1px solid #f1f3f6;""> <em> No Record found ... </em> </p>
					    </div>
					</div>';	    
				}		
	}

	function search()
	{ 	
	  $search = $this->input->get('search');	
	
	 $p_name='p_name';
	 $p_brand='p_brand';
	 $p_cate='p_cate';
	 $p_scate='p_scate';
	 $p_child='p_child';
	 $Product_Name=$this->Home_Model->Product_Search($p_name,$search,$this->table_products);
	 $Product_Brand=$this->Home_Model->Product_Brand_Search($p_brand,$search,$this->table_products);
	 $Product_Cate=$this->Home_Model->Product_Cate_Search($p_cate,$search,$this->table_products);
	 $Product_Scate=$this->Home_Model->Product_Scate_Search($p_scate,$search,$this->table_products);
	 $Product_child=$this->Home_Model->Product_Child_Search($p_child,$search,$this->table_products);
	
	 //p_name


       if(!empty($Product_Name)){
       	 $content['p_name'] = $search;
		$content['products']=$Product_Name;
	 }elseif(!empty($Product_Brand)){	
    $content['products']=$Product_Brand;
     @$content['p_brand'] = $Product_Brand->p_brand;
	 }
	 elseif(!empty($Product_Cate)){	
	 	$content['p_cate'] = $Product_Cate[0]->p_cate;
     $content['products']=$Product_Cate;
	 }elseif(!empty($Product_Scate)){
	 		 $content['p_scate'] = $Product_Scate->p_scate;
	 	$content['products']=$Product_Scate;
	 }elseif(!empty($Product_child)){
	 	 $content['p_child'] = $Product_child->p_child;
	 	$content['products']=$Product_child;
	 }else{$content['products']='0';
	  $content['p_name'] = $search;
	 } 
	 // echo"<pre>";
	 // print_r($content['products']);
	 // die;
    
       $content['category_list']=$this->Home_Model->get_category_list($this->table_category);	 
	   $content['category']=$this->Home_Model->get_category_list($this->table_category);
	   $content['brand_list']=$this->Home_Model->brand_list($this->table_brand);	
	   $content['color']=$this->Home_Model->color_list($this->table_option);
	   $content['size']=$this->Home_Model->size_list($this->table_option);
	   	 	 
	   // $content['subview']='home/search';
	   $this->load->view('home/search', $content);
		
	}

	
	public function detail()
	{ 	
	   	   $content['subview']='home/detail';
	   $this->load->view('layout', $content);
		
	}

	public function language()
	{ 	  
     
			$lang=$this->uri->segment(3);
			$data=array('web_lang' => $lang);
			 $update=$this->Home_Model->update('web_id','1',$data,'tbl_website_info');
			 redirect('home'); 
		
		
	}
	
    /*--- Twilio SMS Gateway Intergration ---*/
    public function sendSms()
    {
        $this->load->library('twilio');

		$from = '+447723561455';
	//	$to = '+96893993412';
			$to = '+917011407974';
		$message = 'This is a Testing Messge From Twilio Send by Sapphire Team';

		$response = $this->twilio->sms($from, $to, $message);

		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;
        
    }
	 
}

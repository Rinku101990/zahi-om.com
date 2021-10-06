<?php $page=$this->uri->segment(1);?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard :: Seller - <?php echo $this->website->web_meta_title; ?></title>
        <meta name="keywords" content="<?php echo $this->website->web_meta_keyword; ?>">
        <meta name="description" content="<?php echo $this->website->web_meta_description; ?>">
        <meta name="author" content="<?php echo $this->website->web_meta_title; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('../admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>">
		
		<!-- all css here -->
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
          <link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/select2/select2.min.css">
         <link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/multipleselect/multiple-select.css">
         <link href="<?=base_url();?>../admin/assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
         <link href="<?=base_url();?>../admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
         <link href="<?=base_url();?>../admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
         <link href="<?=base_url();?>../admin/assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bundle.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/plugins.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
		 <link rel="stylesheet" href="<?=base_url();?>assets/css/card.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.css">
        <script src="<?=base_url();?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		
   
		<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
    </head>
    <body onload="startTime()">
         
            
         <!--header area start-->
        <div class="header_area">
           
            <!--header top start-->
            <div class="header_top top_four">
                <div class="container1">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="top_left_sidebar left_sidebar_two">
 <div class="logo logo_four">
<a href="<?=base_url();?>">
	<img src="<?php echo site_url('uploads/website/logo/zahi-logo.png');?>" title="<?=$this->website->web_company_name;?>"></a>
                            </div>
                            </div>
                        </div>
						<div class="col-lg-3 datetime hidden" >
						 
                    <?=date('l d-M-Y');?> <span id="txt"></span>
							   </div>
							   
                        <div class="col-lg-6">

						
<div class="header_right_info right_info_two ">
 <ul>
          <li class="notification bell_notification"><a href="#" class="bell-icon" ><i class="fa fa-bell-o bell-animations" aria-hidden="true"></i></a>
            <span class="noti_quantity"><?php echo load_notification_count($this->vendor->vnd_id);?></span>
           <div class="mini_cart cart_left bell_notification_list" style="display: none;">
            <div class="dropdown-header p-4 mb-2 bg-header-image p-5 text-white">
                                    <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Notifications</h5>
                                    <p class="dropdown-title-text subtext mb-0 pb-0 fs-13">You have <?php echo load_notification_count($this->vendor->vnd_id);?> new notifications</p>
                                </div>
                                           
                                    <div class="drop-notify ps">
                                   <?php echo load_notification($this->vendor->vnd_id);?>
                                   
                                   
                                    
                                 
                                 
                                </div>      
                                          
                                         
                                        </div></li>       
                                             <li class="currency envelope_notification"><a href="#" class="bell-icon" ><i class="fa fa-envelope-o " aria-hidden="true"></i></a>
             <span class="noti_quantity" style="right: 3px;"><?php echo load_message_count($this->vendor->vnd_id);?></span>
           <div class="mini_cart cart_left envelope_notification_list" style="display: none;">
            <div class="dropdown-header bg-header-image text-white w-300 p-5 mb-2"> <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Messages</h5> <p class="dropdown-title-text subtext mb-0 pb-0 fs-13 ">You have <?php echo load_message_count($this->vendor->vnd_id);?> unread messages</p></div>

                                           
                               <div class="drop-scroll ps"> <?php echo load_message($this->vendor->vnd_id);?>
                                </div>
                              </div></li>                     

 <li class="languages">
 <a href="javascript:void(0);">
 <div style="display: flex;">
 <span class="vendor-name"> <?=$this->vendor->vnd_name;?><br>
 <p class="seller">(Seller)</p></span>

 <div class="seller-img">
 <?php if(empty($this->vendor->vnd_picture)){?>
 <img src="<?=base_url('uploads/profile/avatar.png');?>"  class="img-responsive profile-img"  />
 <?php }else{?>
 <img src="<?=base_url('uploads/profile/').$this->vendor->vnd_picture;?>" class="img-responsive profile-img" />
 <?php }?>
 </div>
 </div>
 
</a>
 <ul class="dropdown_languages">
 <li class="select"><a href="<?=base_url('profile');?>"><i class="fa fa-user" aria-hidden="true"></i> My Account</a></li>
 <li class="select"><a href="<?=base_url('profile/change-password');?>"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a></li>
  <li class="select"><a href="<?=base_url('login/logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out </a></li>

</ul>
                                        </li>
	
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel-->
            <div class="header_middle middle_four">
                <div class="container1">
                    <div class="row align-items-center">
                       
                        <div class="col-lg-12">
                            <div class="main_menu_inner menu_inner_four">
                                <div class="main_menu menu_four d-none d-lg-block">
                                    <nav>
      <ul>
     <li class="<?php if($page=='dashboard')echo'active';?>">
	 <a href="<?=base_url('dashboard');?>">
	 <i class="fa fa-dashboard"></i> Dashboard </a>
      </li>
	 <li class="dropdown_item <?php if($page=='product')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-th"></i> Products 
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('product');?>"><i class="fa fa-angle-right"></i>Manage Products</a>
	   </li>
     <li><a href="<?=base_url('product/hot-products');?>"><i class="fa fa-angle-right"></i>Hot Products</a>
   <li><a href="<?=base_url('product/featured');?>"><i class="fa fa-angle-right"></i>Featured  Products</a>
   </li>
     <li><a href="<?=base_url('product/trending');?>"><i class="fa fa-angle-right"></i>Trending Products</a>
     </li>
     <li><a href="<?=base_url('product/inventory');?>"><i class="fa fa-angle-right"></i>Manage Inventory </a>
	   </li>
	     <li><a href="<?=base_url('product/import');?>"><i class="fa fa-angle-right"></i>Import Export Products</a>
	   </li>
	   </ul>
     </li>
	 <li class="dropdown_item <?php if($page=='promotion')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-product-hunt"></i> Promotions
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('promotion/special-price');?>"><i class="fa fa-angle-right"></i>Special Price</a>
	   </li>
	     <li><a href="<?=base_url('promotion/volume-discount');?>"><i class="fa fa-angle-right"></i>Volume Discount </a>
	   </li>
	     
	   </ul>
     </li>
	  <li class="dropdown_item <?php if($page=='order')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-bar-chart"></i> Orders 
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('order');?>"><i class="fa fa-angle-right"></i>Orders</a>
	   </li>
	     <li><a href="<?=base_url('order/cancel');?>"><i class="fa fa-angle-right"></i>Cancellation Requests </a>
	   </li>
	   <!--  <li><a href="<?=base_url('order/return');?>"><i class="fa fa-angle-right"></i>Order Return Requests </a>
	   </li> -->
	     
	   </ul>
     </li>
	 <li class="dropdown_item <?php if($page=='report')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-line-chart"></i> Reports 
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('report');?>"><i class="fa fa-angle-right"></i>Sales Report</a>
	   </li>
	     <li><a href="<?=base_url('report/performance');?>"><i class="fa fa-angle-right"></i>Products Performance Report
 </a>
	   </li>
	    <li><a href="<?=base_url('report/inventory');?>"><i class="fa fa-angle-right"></i>Products Inventory  </a>
	   </li>

	  <!--   <li><a href="<?=base_url('report/inventory-status');?>"><i class="fa fa-angle-right"></i>Products Inventory Stock Status  </a>
	   </li> -->
       <li><a href="<?=base_url('report/comment-reviews');?>"><i class="fa fa-angle-right"></i>Products Comments & Reviews  </a>
     </li>
	     
	   </ul>
     </li>
	 <li class="dropdown_item <?php if($page=='setting')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-cog"></i> Settings 
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('setting/category-tax');?>"><i class="fa fa-angle-right"></i>Tax Category</a>
	   </li>
	   <li>
<a href="<?=base_url('setting/category');?>"><i class="fa fa-angle-right"></i>Category</a>
</li>
<!-- <li>
<a href="<?=base_url('setting/brand');?>"><i class="fa fa-angle-right"></i>Brand</a>
</li> -->
	     <li><a href="<?=base_url('setting/option');?>"><i class="fa fa-angle-right"></i>Options </a>
	   </li>
	   
	     
	   </ul>
     </li>
	 
	  
	  <li class="dropdown_item <?php if($page=='profile')echo'active';?>">
	 <a href="javascript:void(0);"><i class="fa fa-user"></i> Profile 
	 <i class="fa fa-angle-down"></i>
	 </a>
       <ul class="sub_menu"> 
	   <li><a href="<?=base_url('profile');?>"><i class="fa fa-angle-right"></i>My Account</a>
	   </li>
	     <li><a href="<?=base_url('profile/messages');?>"><i class="fa fa-angle-right"></i>My Messages
 </a>
	   </li>
	    <li><a href="<?=base_url('profile/credit');?>"><i class="fa fa-angle-right"></i>My Credits  </a>
	   </li>
	    <li><a href="<?=base_url('profile/change-password');?>"><i class="fa fa-angle-right"></i>Change Password  </a>
	   </li>
	     
	   </ul>
     </li>
	  <li>
	 <a href="<?=base_url('login/logout');?>">
	 <i class="fa fa-sign-out"></i> Log Out </a>
      </li>
	
	  
	   
                                            
                                        </ul>
                                    </nav>
                                </div>
                                
     <div class="mobile-menu mobile_menu_four d-lg-none">
         <nav>
   <ul>
  <li>
   <a href="<?=base_url('dashboard');?>">Dashboard</a>
 </li>
 <li><a href="javascript:void(0);">Products</a>
  <ul>
  <li><a href="<?=base_url('product');?>">Manage Products</a>
	   </li>
<li><a href="<?=base_url('product/inventory');?>">Inventory Update</a>
	   </li>
 <li><a href="<?=base_url('product/import');?>">Import Products</a>
	   </li>
                                                </ul>
 </li>
 <li><a href="javascript:void(0);">Promotions 
	 </a>
 <ul>
    <li>
	<a href="<?=base_url('promotion/special-price');?>">Special Price</a>
	</li>
	<li>
	<a href="<?=base_url('promotion/inventory');?>">Volume Discount </a>
	</li>                                                 
                                                </ul>
</li>
 <li><a href="javascript:void(0);">Orders</a>
 <ul>
    <li>
	<a href="<?=base_url('order');?>">Orders</a>
    </li>
	<li>
	<a href="<?=base_url('order/cancel');?>">Cancellation Requests </a>
	</li>
	<li><a href="<?=base_url('order/return');?>">Order Return Requests </a>
	   </li>
                                                </ul>
</li>
<li><a href="javascript:void(0);">Settings</a>
<ul>  
<li>
<a href="<?=base_url('setting/category-tax');?>">Tax Category</a>
</li>
<li>
<a href="<?=base_url('setting/category');?>">Category</a>
</li>
<li>
<a href="<?=base_url('setting/brand');?>">Brand</a>
</li>
<li>
<a href="<?=base_url('setting/option');?>">Options </a>
</li>
  
</ul>
 </li>
 <li><a href="javascript:void(0);">Reports</a>
<ul>  
   <li>
   <a href="<?=base_url('report/order');?>">Order Report</a>
   </li>
   <li>
   <a href="<?=base_url('report/performance');?>">Products Performance Report
   </a>
   </li>
   <li>
   <a href="<?=base_url('report/inventory');?>">Products Inventory  </a>
   </li>
   <li><a href="<?=base_url('report/inventory-status');?>">Products Inventory Stock Status  </a>
	   </li>

</ul>
 </li>
  <li><a href="javascript:void(0);">Profile</a>
<ul> 
<li>
<a href="<?=base_url('profile');?>">My Account</a>
</li>
<li>
<a href="<?=base_url('profile/messages');?>">My Messages
 </a>
</li>
<li><a href="<?=base_url('profile/credit');?>">My Credits  </a>
</li>
<li><a href="<?=base_url('profile/change-password');?>">Change Password  </a>
	   </li> 
   

</ul>
 </li>
 <li><a href="<?=base_url('login/logout');?>">logout</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
 
        </div>
         <!--header area end-->
          
       
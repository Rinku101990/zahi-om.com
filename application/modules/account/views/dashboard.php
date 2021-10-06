<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Dashboard Zahi">
      <meta name="description" content="Dashboard Zahi">
      <meta name="author" content="Dashboard Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
     
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Dashboard Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>





<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar sidebar--style-3 no-border stickyfill p-0">
                    <div class="widget mb-0">
                        <div class="widget-profile-box text-center p-3">
                            <div class="image" style="background-image:url('#public/uploads/users/Sig1AulqoyXBj05Xk5KZPEgtQhi3fb71NMKyvWcK.jpeg')"></div>
                            <div class="name">Mr. Demo Customer</div>
                        </div>
                        <div class="sidebar-widget-title py-3">
                            <span>Menu</span>
                        </div>
                        <div class="widget-profile-menu py-3">
                            <ul class="categories categories--style-3">
                                <li>
                                    <a href="#dashboard" class="active">
                                        <i class="la la-dashboard"></i>
                                        <span class="category-name">
                            Dashboard
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#purchase_history" class="">
                                        <i class="la la-file-text"></i>
                                        <span class="category-name">
                            Purchase History <span class="ml-2" style="color:green"><strong>(New Notifications)</strong></span> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#wishlists" class="">
                                        <i class="la la-heart-o"></i>
                                        <span class="category-name">
                            Wishlist
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#conversations" class="">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                Conversations
                                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#profile" class="">
                                        <i class="la la-user"></i>
                                        <span class="category-name">
                            Manage Profile
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#wallet" class="">
                                        <i class="la la-dollar"></i>
                                        <span class="category-name">
                                My Wallet
                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#support_ticket" class="">
                                        <i class="la la-support"></i>
                                        <span class="category-name">
                            Support Ticket                         </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-seller-btn pt-4">
                            <a href="#shops/create" class="btn btn-anim-primary w-100">Be A Seller</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Page title -->
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    Dashboard
                                </h2>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="float-md-right">
                                <ul class="breadcrumb">
                                    <li><a href="http://shop.activeitzone.com">Home</a></li>
                                    <li class="active"><a href="#dashboard">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- dashboard content -->
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="d-block title">0 Product</span>
                                    <span class="d-block sub-title">in your cart</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-heart"></i>
                                    <span class="d-block title">8 Product(s)</span>
                                    <span class="d-block sub-title">in your wishlist</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-building"></i>
                                    <span class="d-block title">22 Product(s)</span>
                                    <span class="d-block sub-title">you ordered</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2 clearfix ">
                                    Saved Shipping Info
                                    <div class="float-right">
                                        <a href="<?php echo site_url('account/my-profile');?>" class="btn btn-link btn-sm">Edit</a>
                                    </div>
                                </div>
                                <div class="form-box-content p-3">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Address:</td>
                                                <td class="p-2">House : 001, Street: 002, Section : 003, New York, United States.</td>
                                            </tr>
                                            <tr>
                                                <td>Country:</td>
                                                <td class="p-2">
                                                    United States
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City:</td>
                                                <td class="p-2">New York</td>
                                            </tr>
                                            <tr>
                                                <td>Postal Code:</td>
                                                <td class="p-2">1234</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="p-2">0123456789</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
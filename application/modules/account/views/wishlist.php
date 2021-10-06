<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Wishlist Zahi">
      <meta name="description" content="Wishlist Zahi">
      <meta name="author" content="Wishlist Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Wishlist Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>





<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Manage Wishlist</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Manage Wishlist</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
           <?php $this->load->view('account/sidebar.php');?>

            <div class="col-lg-9">
                <div class="main-content">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        Wishlist
                                    </h2>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Wishlist items -->

                    <div class="row shop-default-wrapper shop-cards-wrapper shop-tech-wrapper mt-4">
                        <?php  if($wishlist==TRUE){
                            foreach ($wishlist as $wishvalue) {?>
                        <div class="col-xl-4 col-6" id="wishlist_96">
                            <div class="card card-product mb-3 product-card-2">
                                <div class="card-body p-3">
                                    <div class="card-image">
                                       <a href="<?=base_url('product/').encode($wishvalue->p_id).'/'.slug($wishvalue->p_name);?>" class="d-block">
                           <?php  if(!empty($wishvalue->pg_img)){ ?>
                           <img src="<?=base_url('seller/uploads/').slug($wishvalue->cate_name).'/'.slug($wishvalue->scate_name).'/'.slug($wishvalue->child_name).'/'.$wishvalue->pg_img;?>" title="<?=$wishvalue->p_name;?>" class="hover-img" style="object-fit: cover;width:100%;    height: 259px;">
                           <?php }else{?>
                           <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$wishvalue->p_name;?>" class="hover-img1" style="object-fit: cover; width:100%;    height: 259px;">
                           <?php }?>
                        </a>
                                    </div>

                                    <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                                                    <a href="<?=base_url('product/').encode($wishvalue->p_id).'/'.slug($wishvalue->p_name);?>"><?php if($this->website->web_lang=='en'){echo $wishvalue->p_name;}else{ echo $wishvalue->p_name_ar;}?></a>
                                                </h2>
                                  
                                    <div class="mt-2">
                                        <div class="price-box">
                                            <?php if(!empty($wishvalue->sp_special_price)){?>
                         <div class="price-box ">
                           <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=number_format($wishvalue->p_selling_price);?></del><br/>
                                <span class="product-price strong-600">
                                                      <?=currency($this->website->web_currency);?><?=number_format($wishvalue->sp_special_price);?>
                                                    </span>
                               </div>
                                <?php }else{?>
                                 <div class="price-box " >                           
                                <span class="product-price strong-600">
                                  <?=currency($this->website->web_currency);?><?=number_format($wishvalue->p_selling_price);?>
                                                    </span><br/><del class="old-product-price strong-400">&nbsp;
                                                    </del>
                               </div>
                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-3">
                                    <div class="product-buttons">
                                        <div class="row align-items-center">
                                            <div class="col-2">
                                                <a href="<?=base_url('account/wish_delete/').$wishvalue->id;?>" class="link link--style-3" data-original-title="Remove from wishlist">
                                                    <i class="la la-close"></i>
                                                </a>
                                            </div>
                                            <div class="col-10">
                                                <a href="<?=base_url('product/').encode($wishvalue->p_id).'/'.slug($wishvalue->p_name);?>" class="btn btn-block btn-base-1 btn-circle btn-icon-left" >
                                                    <i class="la la-shopping-cart mr-2"></i>View Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                        
                      
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
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Blog Zahi">
      <meta name="description" content="Blog Zahi">
      <meta name="author" content="Blog Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Blog Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Our Blog</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Our Blog</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>


<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space ">
          

            <div class="col-12">
                <div class="main-content">
                     <h2 style="box-sizing: border-box; padding: 14px 0px 0px; margin: 0px 0px 16px; text-rendering: optimizelegibility; line-height: 1.2;"><span style="box-sizing: border-box; margin: 0px; outline: 0px; font-family: &quot;Times New Roman&quot;, Times, serif; font-size: 48px; color: rgb(0, 0, 0);">Our Blog</span></h2>
                    
                 

                    <div class="row shop-default-wrapper shop-cards-wrapper shop-tech-wrapper mt-4">
                       <?php if($blog== true){
                                        foreach ($blog as $blg_value) {?>
                        <div class="col-xl-3 col-6" id="wishlist_96">
                            <div class="card card-product mb-3 product-card-2">
                                <div class="card-body p-3">
                                    <div class="card-image">
                                        <a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>" class="d-block" >
                                            <?php if(!empty($blg_value->blg_pictures)){?>
                                                <img src="<?=base_url('admin/uploads/blog/thumbnail/').$blg_value->blg_pictures;?>" alt="<?=$blg_value->blg_title;?>" style="object-fit: fill;">
                                                 <?php }else{?>
                                         <img src="<?=base_url('uploads/noblog.png');?>" alt="<?=$blg_value->blg_title;?>" class="img-responsive" style="object-fit: fill;" >
                                         <?php }?>
                                        </a>
                                    </div>

                                    <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                                                    <a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>"><?=$blg_value->blg_title;?></a>
                                                </h2>
                                  
                                    <div class="mt-2">
                                        <div class="price-box">
                                            <?=date('F d, Y',strtotime($blg_value->blg_created));?>
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
</section>



            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
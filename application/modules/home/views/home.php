<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="<?php echo $this->website->web_meta_keyword; ?>">
      <meta name="description" content="<?php echo $this->website->web_meta_description; ?>">
      <meta name="author" content="<?php echo $this->website->web_meta_title; ?>">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com">
      <link rel="canonical" href="<?=base_url();?>" />
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title><?php echo $this->website->web_meta_title; ?></title>
      <?php $this->load->view('include/header');
         if($this->website->web_lang=='en'){
          $this->load->view('include/topbar');
         }else{
           $this->load->view('include/topbar_ar');
         }?>
      <?php $date=date('Y-m-d');?>
      <?php if($this->website->web_lang=='en'){$text='left';$floatl='left';;$floatr='right';
         $view_more=lang(14); $Arrivals=lang(13);$hotproduct=lang(71);$Featured=lang(15);
         }else{ $text='right';$floatl='right';$floatr='left';  $view_more=lang_ar(14); $Arrivals=lang_ar(13);$hotproduct=lang_ar(71);$Featured=lang_ar(15);}?>
      <?php if(!empty($this->session->userdata('logged_in_customer'))){ 
         $heart='btnwishlist';}else{ $heart='SignIn_Model';}
         ?>
      <style type="text/css">
         .product-title a {
         text-transform: uppercase;
         color: #111;
         display: block;
         font-weight: 700;
         padding-top: 5px;
         font-size: 14px; 
         }
      </style>
      <div class="modal fade" id="pop_up_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-zoom" role="document" style="max-width:500px;margin-top:8%;">
            <div class="modal-content">
               <div class="modal-body" style="padding: 0 1px;">
                  <div class="row" style="margin: -2px;">
                     <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0;/* margin: 20px 0; */">
                        <div class="modal_tab_img">
                           <a href="https://zahi-om.com/eid-collection"> <img src="<?=base_url('assets/img/Popop-1.jpg');?>" alt="Popup" class="img-responsive" style="    padding: 0;" /> </a>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
                              color: #111;
                              position: absolute;
                              border: 1px solid #111;
                              padding: 4px 10px;
                              margin-left: -7%;
                              ">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="home-banner-area mb-4 mt-10">
         <div class="container">
            <div class="row no-gutters position-relative">
               <div class="col-lg-12 order-1 order-lg-0">
                  <div class="home-slide">
                     <div class="home-slide">
                        <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                           <?php if(!empty($banners)){ foreach($banners as $bnrs){ ?>
                           <div class="" style="height:300px;">
                              <a href="<?=$bnrs->slr_url;?>">
                              <img class="d-block w-100 h-100 lazyload" src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('admin/uploads/banner/'.$bnrs->slr_img);?>" alt="<?php echo $bnrs->slr_name;?>">
                              </a>
                           </div>
                           <?php } }else{ ?>
                           <div class="" style="height:300px;">
                              <a href="">
                              <img class="d-block w-100 h-100 lazyload" src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/banner/no_images.jpeg');?>" alt="<?php echo $bnrs->slr_name;?>">
                              </a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mb-4">
         <div class="container">
            <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="section-title-1 section-title-2 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                           <span class="mr-4"><?=$Featured;?></span>
                        </h3>
                        <!-- <ul class="inline-links float-right">
                           <li><a href="<?php echo base_url('brand/NDE/Bymays');?>" class="active"><?=$view_more;?></a></li>
                           </ul> -->
                     </div>
                     <div class="row">
                        <?php if($featured_product==true){
                           foreach ($featured_product as $feat_list) {?>   
                        <div class="col-xl-2 col-lg-3 col-sm-4 col-6" >
                           <div class="card-body p-0 product-card mb-2">
                              <div class="card-image">
                                 <!--  <a href="<?=base_url('home/detail');?>" class="d-block"> -->
                                 <a href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>" class="d-block" > 
                                 <?php  if(!empty($feat_list->pg_img)){ ?>
                                 <img src="<?=base_url('seller/uploads/').slug($feat_list->cate_name).'/'.slug($feat_list->scate_name).'/'.slug($feat_list->child_name).'/'.$feat_list->pg_img;?>" alt="<?=$feat_list->p_name;?>" class="hover-img" style="object-fit: cover; width:100%;    height: 259px;">
                                 <?php }else{?>
                                 <img src="<?=base_url('seller/uploads/default-image.png');?>" alt="<?=$feat_list->p_name;?>" class="hover-img" style="object-fit: cover; width:100%;    height: 259px;">
                                 <?php }?>
                                 </a>
                              </div>
                              <div class="product-text" style="padding: 5px;background: #f3f3f3; text-align: <?=$text;?>" >
                                 <h2 class="product-title p-0 text-truncate-21 ">
                                    <a href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>" title="<?=$feat_list->p_name;?>" class=" text-truncate"> 
                                    <?php if($this->website->web_lang=='en'){echo $feat_list->p_name;}else{ if(!empty($feat_list->p_name_ar)){echo $feat_list->p_name_ar;}else{echo $feat_list->p_name;}}?>
                                    </a>
                                 </h2>
                                 <h2 class="product-title p-0 text-truncate">
                                    <?php echo $feat_list->vnd_name;?>                          
                                 </h2>
                                 <div class="clearfix">
                                    <?php if(!empty($feat_list->sp_special_price) && $feat_list->sp_start_date <= $date && $feat_list->sp_end_date >= $date){?>
                                    <div class="price-box float-<?=$floatl;?>">
                                       <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=$feat_list->p_selling_price;?></del><br/>
                                       <span class="product-price strong-600">
                                       <?php if($feat_list->sp_price_type=='0'){ $specialPrice = $feat_list->sp_special_price;?>
                                          <?=currency($this->website->web_currency);?><?=$specialPrice;?>
                                       <?php }else if($feat_list->sp_price_type=='1'){ $specialPriceAdjust = $feat_list->sp_special_price*$feat_list->p_selling_price/100;$specialPrice=$feat_list->p_selling_price-$specialPriceAdjust;?>
                                          <?=currency($this->website->web_currency);?><?=$this->cart->format_number($specialPrice);?>
                                       <?php } ?>
                                       </span>
                                    </div>
                                    <?php }else{?>
                                    <div class="price-box float-<?=$floatl;?>">                           
                                       <span class="product-price strong-600">
                                       <?=currency($this->website->web_currency);?><?=$feat_list->p_selling_price;?>
                                       <br/><del class="old-product-price strong-400">&nbsp;
                                       </del>
                                       </span>
                                    </div>
                                    <?php }?>
                                    <div class="float-<?=$floatr;?>">
                                       <button class="add-to-cart btn" title="Add to Cart"style="
                                          background: #c19450;  padding: .175rem .35rem;">
                                       <i class="la la-shopping-cart" style="
                                          color: #ffffff; font-size: 20px;"></i>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" wishlist">
                              <button type="button" class="<?=$heart;?>"  pid="<?=$feat_list->p_id;?>" id="wishlist<?=$feat_list->p_id;?>" style="     border: none;padding: .175rem .35rem;background: transparent;">
                              <i class="la la-heart-o" style="color: #c19450; font-size: 20px;"></i>  </button>
                           </div>
                        </div>
                        <?php }}?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mb-4">
         <div class="container">
            <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="section-title-1 clearfix ">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                           <span class="mr-4"><?=$hotproduct;?> </span>
                        </h3>
                        <!--  <ul class="inline-links float-right">
                           <li><a href="<?php echo base_url('category/Mw/Sale-');?>" class="active"><?=$view_more;?></a></li>
                           </ul> -->
                     </div>
                     <div class="row">
                        <?php if($hot_product==true){
                           foreach ($hot_product as $hot_list) {?>                                  
                        <div class="col-xl-2 col-lg-3 col-sm-4 col-6" >
                           <div class="card-body p-0 product-card mb-2">
                              <div class="card-image">
                                 <a href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>" class="d-block">
                                 <?php  if(!empty($hot_list->pg_img)){ ?>
                                 <img src="<?=base_url('seller/uploads/').slug($hot_list->cate_name).'/'.slug($hot_list->scate_name).'/'.slug($hot_list->child_name).'/'.$hot_list->pg_img;?>" alt="<?=$hot_list->p_name;?>" class="hover-img" style="object-fit: cover;  width:100%;   height: 259px;">
                                 <?php }else{?>
                                 <img src="<?=base_url('seller/uploads/default-image.png');?>" alt="<?=$hot_list->p_name;?>" class="hover-img1" style="object-fit: cover; width:100%;    height: 259px;">
                                 <?php }?>
                                 </a>
                              </div>
                              <div class="product-text" style="background: #f3f3f3;padding: 5px; text-align: <?=$text;?>" >
                                 <h2 class="product-title p-0">
                                    <a href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>" class=" text-truncate"> 
                                    <?php if($this->website->web_lang=='en'){echo $hot_list->p_name;}else{ if(!empty($hot_list->p_name_ar)){echo $hot_list->p_name_ar;}else{echo $hot_list->p_name;}}?>
                                    </a>
                                 </h2>
                                 <h2 class="product-title p-0 text-truncate">
                                    <?php echo $hot_list->vnd_name;?>                          
                                 </h2>
                                 <div class="clearfix">
                                    <?php if(!empty($hot_list->sp_special_price)){?>
                                    <div class="price-box float-<?=$floatl;?>">
                                       <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=$hot_list->p_selling_price;?></del><br/>
                                       <span class="product-price strong-600">
                                       <?php if($hot_list->sp_price_type=='0'){ $specialPrice = $hot_list->sp_special_price;?>
                                          <?=currency($this->website->web_currency);?><?=$specialPrice;?>
                                       <?php }else if($hot_list->sp_price_type=='1'){ $specialPriceAdjust = $hot_list->sp_special_price*$hot_list->p_selling_price/100;$specialPrice=$hot_list->p_selling_price-$specialPriceAdjust;?>
                                          <?=currency($this->website->web_currency);?><?=$this->cart->format_number($specialPrice);?>
                                       <?php } ?>
                                       </span>
                                    </div>
                                    <?php }else{?>
                                    <div class="price-box float-<?=$floatl;?>" >                           
                                       <span class="product-price strong-600">
                                       <?=currency($this->website->web_currency);?><?=$hot_list->p_selling_price;?>
                                       </span><br/><del class="old-product-price strong-400">&nbsp;
                                       </del>
                                    </div>
                                    <?php }?>
                                    <div class="float-<?=$floatr;?>">
                                       <button class="add-to-cart btn" title="Add to Cart"style="
                                          background: #c19450;  padding: .175rem .35rem;">
                                       <i class="la la-shopping-cart" style="
                                          color: #ffffff; font-size: 20px;"></i>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" wishlist">
                              <button type="button" class="<?=$heart;?>"  pid="<?=$hot_list->p_id;?>" id="wishlist<?=$hot_list->p_id;?>" style="    border: none; padding: .175rem .35rem;background: transparent;">
                              <i class="la la-heart-o" style="color: #c19450; font-size: 20px;"></i>  </button>
                           </div>
                        </div>
                        <?php }}?>                                                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mb-4">
         <div class="container">
            <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="section-title-1 clearfix ">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                           <span class="mr-4"><?=$Arrivals;?> </span>
                        </h3>
                     </div>
                     <div class="row">
                        <?php if($recent_product==true){
                           foreach ($recent_product as $hot_list) {?>                                  
                        <div class="col-xl-2 col-lg-3 col-sm-4 col-6" >
                           <div class="card-body p-0 product-card mb-2">
                              <div class="card-image">
                                 <a href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>" class="d-block">
                                 <?php  if(!empty($hot_list->pg_img)){ ?>
                                 <img src="<?=base_url('seller/uploads/').slug($hot_list->cate_name).'/'.slug($hot_list->scate_name).'/'.slug($hot_list->child_name).'/'.$hot_list->pg_img;?>" alt="<?=$hot_list->p_name;?>" class="hover-img" style="object-fit: cover;width:100%;    height: 259px;">
                                 <?php }else{?>
                                 <img src="<?=base_url('seller/uploads/default-image.png');?>" alt="<?=$hot_list->p_name;?>" class="hover-img1" style="object-fit: cover; width:100%;    height: 259px;">
                                 <?php }?>
                                 </a>
                              </div>
                              <div class="product-text" style="background: #f3f3f3;padding: 5px; text-align: <?=$text;?>" >
                                 <h2 class="product-title p-0">
                                    <a href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>" class=" text-truncate"> 
                                    <?php if($this->website->web_lang=='en'){echo $hot_list->p_name;}else{ if(!empty($hot_list->p_name_ar)){echo $hot_list->p_name_ar;}else{echo $hot_list->p_name;}}?>
                                    </a>
                                 </h2>
                                 <h2 class="product-title p-0 text-truncate">
                                    <?php echo $hot_list->vnd_name;?>                          
                                 </h2>
                                 <div class="clearfix">
                                    <?php if(!empty($hot_list->sp_special_price) && $hot_list->sp_start_date <= $date && $hot_list->sp_end_date >= $date){?>
                                    <div class="price-box float-<?=$floatl;?>">
                                       <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=$hot_list->p_selling_price;?></del><br/>
                                       <span class="product-price strong-600">
                                       <?php if($hot_list->sp_price_type=='0'){ $specialPrice = $hot_list->sp_special_price;?>
                                          <?=currency($this->website->web_currency);?><?=$specialPrice;?>
                                       <?php }else if($hot_list->sp_price_type=='1'){ $specialPriceAdjust = $hot_list->sp_special_price*$hot_list->p_selling_price/100;$specialPrice=$hot_list->p_selling_price-$specialPriceAdjust;?>
                                          <?=currency($this->website->web_currency);?><?=$this->cart->format_number($specialPrice);?>
                                       <?php } ?>
                                       </span>
                                    </div>
                                    <?php }else{?>
                                    <div class="price-box float-<?=$floatl;?>" >                           
                                       <span class="product-price strong-600">
                                       <?=currency($this->website->web_currency);?><?=$hot_list->p_selling_price;?>
                                       </span><br/><del class="old-product-price strong-400">&nbsp;
                                       </del>
                                    </div>
                                    <?php }?>
                                    <div class="float-<?=$floatr;?>">
                                       <button class="add-to-cart btn" title="Add to Cart"style="
                                          background: #c19450;  padding: .175rem .35rem;">
                                       <i class="la la-shopping-cart" style="
                                          color: #ffffff; font-size: 20px;"></i>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" wishlist">
                              <button type="button" class="<?=$heart;?>"  pid="<?=$hot_list->p_id;?>" id="wishlist<?=$hot_list->p_id;?>" style="     border: none;padding: .175rem .35rem;background: transparent;" >
                              <i class="la la-heart-o" style="color: #c19450; font-size: 20px;"></i>  </button>
                           </div>
                        </div>
                        <?php }}?>                                                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mb-4">
         <div class="container">
            <div class="row gutters-10">
               <div class="col-lg-3 bg-white">
                  <div class="media-banner mb-3 mb-lg-0 ">
                     <a href="<?=base_url('category/Ng/Clothing');?>" class="banner-container">
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-1.jpg" alt="Zahi Clothing" style="object-fit: contain;height:272px;width: 100%;" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 bg-white">
                  <div class="media-banner mb-3 mb-lg-0 ">
                     <a href="<?=base_url('sub-category/MTE/Shoes');?>" class="banner-container"> 
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-2.jpg" alt="Zahi Shoes" style="object-fit: contain;height:272px;width: 100%;" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="media-banner mb-3 mb-lg-0">
                     <a href="<?=base_url('category/Mg/Perfumes-Incense');?>" class="banner-container">
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-3.jpg" alt="zahi Perfumes-Incense" style="height:272px;width: 100%;" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="mb-4">
         <div class="container">
            <div class="row gutters-10">
               <div class="col-lg-4 col-md-4">
                  <div class="media-banner mb-3 mb-lg-0">
                     <a href="<?=base_url('brand/NDk/3anayed-Lashes');?>" class="banner-container">
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-4.jpg" alt="3anayed-Lashes" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="media-banner mb-3 mb-lg-0">
                     <a href="<?=base_url('sub-category/MTU/Bags');?>" class="banner-container">
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-5.jpg" alt="Zahi Bags" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="media-banner mb-3 mb-lg-0">
                     <a href="<?=base_url('category/NQ/Jewellery');?>" class="banner-container">
                     <img src="<?php echo site_url('assets/');?>images/placeholder-rect.jpg" data-src="<?php echo site_url('uploads/');?>banners/7-6.jpg" alt="zahi Jewellery" class="img-fluid lazyload">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div id="section_home_categories">
      <section class="mb-4">
         <div class="container">
            <div class="px-2 py-4 p-md-4">
               <div class=" clearfix " align="center" style="border-bottom:none;padding-bottom: 8px;margin-bottom: 20px">
                  <ul class="inline-links float-center">
                     <li><a href="<?php echo site_url('brands');?>" class="active" style="font-size: 13px;    background: #c19450;
                        color: #fff!important;    padding: 7px 40px; border-radius: 4px; border: 1px solid transparent;    box-shadow: 0 2px 4px rgba(0,0,0,0.2);">SHOP BY BRANDS</a></li>
                  </ul>
               </div>
               <div class="caorusel-box logo">
                  <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="6" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                     <?php if($seller==true){
                        foreach ($seller as $brd_val) {?>
                     <div class="card card-product m-2 shop-cards shop-tech "  >
                        <div class="card-body p-0">
                           <div class="card-image">     
                              <a href="<?=base_url('brand/').encode($brd_val->vnd_id).'/'.slug($brd_val->vnd_name);?>"> 
                              <?php if(!empty($brd_val->vnd_picture)){?>                    
                              <img src="<?=base_url('seller/uploads/profile/').$brd_val->vnd_picture;?>" alt="<?=$brd_val->vnd_name;?>" class="hover-img" style="margin: 0 auto;">
                              <?php }else{?>
                              <img src="<?=base_url('seller/uploads/profile/avatar.png');?>" alt="<?=$brd_val->vnd_name;?>" class="hover-img" style="margin: 0 auto;">
                              <?php }?>
                              </a>
                           </div>
                        </div>
                     </div>
                     <?php }}?>
                  </div>
               </div>
            </div>
      </section>
      </div>
      <!--<section class="mb-4">-->
      <!--   <div class="container">-->
      <!--      <?php if($this->website->web_lang=='en'){echo $page->content1;}else{ echo $page->content2;}?>-->
      <!--   </div>-->
      <!--</section>-->
      <?php if($this->website->web_lang=='en'){
         $this->load->view('include/footer');
         }else{
          $this->load->view('include/footer_ar');
         }?>
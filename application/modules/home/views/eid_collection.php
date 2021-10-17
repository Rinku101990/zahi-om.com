<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Best Selling Zahi">
      <meta name="description" content="Best Selling Collection Zahi">
      <meta name="author" content="Best Selling Collection Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
     
        <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Best Selling Collection Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>


 <?php if($this->website->web_lang=='en'){
  $floatl='left';$floatr='right';
  $direction='ltr';
   $right='0';
    //  $category=$cate_name->category;
    //  $scategory=$cate_name->scategory;
    // $mcategory=$cate_name->mcategory;
      $home=lang(46);
       $cate12=lang(62);
       $price=lang(63);
       $color=lang(64);
       $size=lang(65);
       $brand=lang(66);
       $search=lang(67);
       $sort=lang(68);
    
}else{ 
  $right='85%';
  $direction='rtl';
  $floatl='right';$floatr='left'; 
  //$category=$cate_name->category_ar;
   //  @$scategory=$cate_name->scategory_ar;
  // @$mcategory=$cate_name->mcategory_ar;
    $home=lang_ar(46);
     $cate12=lang_ar(62);
       $price=lang_ar(63);
       $color=lang_ar(64);
       $size=lang_ar(65);
       $brand=lang_ar(66);
       $search=lang_ar(67);
       $sort=lang_ar(68);
       ?>

 <style type="text/css">
    .product-title a {
    text-transform: uppercase;
    color: #111;
    display: block;
    font-weight: 700 !important;
        padding-top: 5px;
     font-size: 14px; 
}
.checkbox label {
    
    margin-left: 10px;
}</style>  
     <?php 
    }?>
<style type="text/css">
     .product-title a {
    text-transform: uppercase;
    color: #111;
    display: block;
    font-weight: 700 !important;
        padding-top: 5px;
     font-size: 14px; 
}
       /*Product not available*/
img.img-fit.lazyloaded {
    width: 100%;
    height: 293px;
    object-fit: cover;
}

#notfound {
  position: relative;
  height: 60vh;
  background-color: #fafbfd;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}


.notfound {
  max-width: 520px;
  width: 100%;
  text-align: center;
}

.notfound .notfound-bg {
  position: absolute;
  left: 0px;
  right: 0px;
  top: 50%;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  z-index: -1;
}

.notfound .notfound-bg > div {
  width: 100%;
  background: #fff;
  border-radius: 90px;
  height: 125px;
}

.notfound .notfound-bg > div:nth-child(1) {
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
}

.notfound .notfound-bg > div:nth-child(2) {
  -webkit-transform: scale(1.3);
      -ms-transform: scale(1.3);
          transform: scale(1.3);
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
  position: relative;
  z-index: 10;
}

.notfound .notfound-bg > div:nth-child(3) {
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
  position: relative;
  z-index: 90;
}

.notfound h1 {
  font-family: 'Quicksand', sans-serif;
  font-size: 86px;
  text-transform: uppercase;
  font-weight: 700;
  margin-top: 0;
  margin-bottom: 8px;
  color: #151515;
}

.notfound h2 {
  font-family: 'Quicksand', sans-serif;
  font-size: 26px;
  margin: 0;
  font-weight: 700;
  color: #151515;
}

.notfound a {
  font-family: 'Quicksand', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #18e06f;
  display: inline-block;
  padding: 15px 30px;
  border-radius: 5px;
  color: #fff;
  font-weight: 700;
  margin-top: 20px;
}

.notfound-social {
  margin-top: 20px;
}

.notfound-social>a {
  display: inline-block;
  height: 40px;
  line-height: 40px;
  width: 40px;
  font-size: 14px;
  color: #fff;
  background-color: #dedede;
  margin: 3px;
  padding: 0px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}
.notfound-social>a:hover {
  background-color: #18e06f;
}

.ca_search_filters input {
    padding-left: 2px;
    background: none;
    border: none;
    height: inherit;
    color: #666;
    font-size: 12px;
    width: 120px;
}
.ca_search_filters #slider-range {
    margin-bottom: 22px;
    background: #e5e5e5;
    border-radius: 0;
    border: none;
    height: 8px;
    margin-top: 12px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
    border-bottom-right-radius: 5px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
    border-bottom-left-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
    border-top-right-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
    border-top-left-radius: 5px;
}
.ui-widget-content {
    border: 1px solid #a6c9e2;
    color: #222222;
}
.ui-widget {
    font-family: Lucida Grande,Lucida Sans,Arial,sans-serif;
    font-size: 1.1em;
}
.ui-slider-horizontal {
    height: .8em;
}
.ui-slider {
    position: relative;
    text-align: left;
}
.ui-slider-horizontal .ui-slider-range {
    background: #c19450;
}
.ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
}
.ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0;
    background-position: 0 0;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
    border-bottom-right-radius: 5px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
    border-bottom-left-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
    border-top-right-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
    border-top-left-radius: 5px;
}

element.style {
    left: 0%;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #d32f2e;
    background: #d32f2e;
    font-weight: bold;
    color: #d32f2e;
    width: 16px;
    height: 16px;
    border-radius: 0;
    cursor: ew-resize;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #d32f2e;
    background: #d32f2e;
    font-weight: bold;
    color: #d32f2e;
    width: 16px;
    height: 16px;
    border-radius: 0;
    cursor: ew-resize;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #c5dbec;
   /* background: #dfeffc url(images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x;*/
    font-weight: bold;
    color: #2e6e9e;
}
.ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em;
}
.ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default;
    -ms-touch-action: none;
    touch-action: none;
}

@media only screen and (max-width: 767px) {
    .notfound .notfound-bg {
      width: 287px;
      margin: auto;
    }

    .notfound .notfound-bg > div {
      height: 85px;
  }
}

.categorie_filter ul li {
    margin-bottom: 10px;
    line-height: 18px;
    list-style: none;
}
a.cate_categorie.active, a.cate_categorie:hover, a.cate_categorie.active i.fa.fa-angle-down.pull-right, a.cate_categorie:hover i.fa.fa-angle-down.pull-right {
    color: #d32f2e;
}
a.cate_categorie.active, a.cate_categorie:hover, a.cate_categorie.active i.fa.fa-angle-down.pull-right, a.cate_categorie:hover i.fa.fa-angle-down.pull-right {
    color: #d32f2e;
}
.categorie_filter ul li a {
    color: #282d33;
    font-size: 14px;
    font-weight: 600;
}
a.scate_categorie.active {
    color: #c19450;
    
}

i.fa.fa-circle {
    font-size: 6px;
    vertical-align: middle;
}
a.child_categorie.active {
    color: #0049b6;
    font-weight: 600;
}
.categorie_filter i.fa.fa-angle-down.pull-right, .categorie_filter i.fa.fa-angle-right {
    font-size: 16px;
    font-weight: 600;
}
.fa.pull-right {
    margin-left: .3em;
}
a.scate_categorie.active i {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}
.overflow-auto {
    height: auto;
    overflow-y: scroll;
    max-height: 240px;
}
 </style>
 <input type="hidden" id="custid" value="<?php if(!empty($this->session->userdata('logged_in_customer'))){ echo '1';}else{echo'0';}?>">
<div class="breadcrumb-area mt-10" style="padding: 0px !important">
  <img src="<?=base_url('assets/img/best-selling.jpg');?>" class="img-responsive" style="padding: 0px;" />
       
    </div>
    <section class="gry-bg py-4">
        <div class="container">
            <div class="row" style="direction:<?=$direction;?>">

                <!--<div class="col-xl-3 col-md-4 d-xl-block">-->
                     <div class="col-xl-3 col-md-4 hidden">
<div class="bg-white sidebar-box mb-3">
                                    <div class="box-title text-left">
                                       <i class="fa fa-folder-open" ></i> <?=$cate12;?>
                                    </div>
                                    <div class="box-content overflow-auto">
                                    <div class="categorie_filter">
                                   
                                    
                                <ul style="padding: 10px 10px 0px 10px;margin-bottom: 12px;">
                                     <?php if(!empty($p_category)){
                                      if(sub_category($p_category)==true){
                                        foreach (sub_category($p_category) as $smenu_val){ ?>  
                                        <li><a href="javascript:void(0);" class="scate_categorie <?php if($smenu_val->scate_id==@$p_scategory)echo'active';?> " scate="<?=encode($smenu_val->scate_id);?>"><i class="fa fa-angle-right "></i> &nbsp;<?=$smenu_val->scate_name;?></a>
                                <ul id="child<?=encode($smenu_val->scate_id);?>" style="padding: 10px; display: <?php if($smenu_val->scate_id==@$p_scategory)echo'block';else echo'none';?>;">

                                          <?php if(child_category($smenu_val->scate_id)!=FALSE){
                        foreach (child_category($smenu_val->scate_id) as $ch_menuval) {?> 
                                        <li><a href="<?=base_url('child-category/').encode($ch_menuval->child_id).'/'.$ch_menuval->child_slug;?>" class="child_categorie <?php if($ch_menuval->child_id==@$p_chcategory)echo'active';?>"><i class="fa fa-circle"></i> &nbsp;<?=$ch_menuval->child_name;?> </a></li>
                                      <?php }}?>
                                       </ul>
                                        </li>
                                          <?php }}}?>

                                      
                                       
                                                                       </ul>
                                                                 
                                </div>
                                    
                                        <!-- Filter by others -->
                                      
                                    </div>
                                </div>
                   
                    <div class="bg-white sidebar-box mb-3">
                        <div class="box-title text-left">
                           <i class="fa fa-tag" ></i> <?=$price;?>
                                                 </div>
                        <div class="box-content">
                           <div class="categorie_filter">
                                    <div class="ca_search_filters">
                                       <label for="amount"> Range:</label>
                                       &nbsp;<span class="new_price">OMR</span><input type="text" name="text" id="amount" />  
                                        <div id="slider-range"></div>   
                                    </div>
                                </div>
                            <!--<div class="range-slider-wrapper mt-3">
                                <!-- Range slider container -->
                               <!--  <div id="input-slider-range" data-range-value-min="6" data-range-value-max="2700" class="noUi-target noUi-ltr noUi-horizontal noUi-background"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 0.148478%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 1.63326%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>

                                <!-- Range slider values -->
                                <!-- <div class="row">
                                    <div class="col-6">
                                        <span class="range-slider-value value-low" data-range-value-low="10" id="input-slider-range-value-low">10.00</span></div>

                                    <div class="col-6 text-right">
                                        <span class="range-slider-value value-high" data-range-value-high="50" id="input-slider-range-value-high">50.00</span></div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <?php if(@$p_category!='5'){?>
                    <!--<div class="bg-white sidebar-box mb-3 ">
                            <div class="box-title text-left">
                           <i class="fa fa-adjust" ></i>    <?=$color;?>
                            </div>
                            <div class="box-content overflow-auto " >
                               
                                <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                                                            <li>
                                            <input type="radio" id="color-0" name="color" value="Black" onchange="filter()" class="common_selector color">
                                            <label style="background: Black;" for="color-0" data-toggle="tooltip" data-original-title="Black"></label>
                                        </li>
                                          <li>
                                            <input type="radio" id="color-0" name="color" value="Red" onchange="filter()" class="common_selector color">
                                            <label style="background: Red;" for="color-0" data-toggle="tooltip" data-original-title="Red"></label>
                                        </li>
                                         <li>
                                            <input type="radio" id="color-0" name="color" value="White" onchange="filter()" class="common_selector color">
                                            <label style="background: White;" for="color-0" data-toggle="tooltip" data-original-title="White"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Brown" onchange="filter()" class="common_selector color">
                                            <label style="background: Brown;" for="color-0" data-toggle="tooltip" data-original-title="Brown"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Gold" onchange="filter()" class="common_selector color">
                                            <label style="background: Gold;" for="color-0" data-toggle="tooltip" data-original-title="Gold"></label>
                                        </li>
                                         <li>
                                            <input type="radio" id="color-0" name="color" value="Yellow" onchange="filter()" class="common_selector color">
                                            <label style="background: Yellow;" for="color-0" data-toggle="tooltip" data-original-title="Yellow"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Orange" onchange="filter()" class="common_selector color">
                                            <label style="background: Orange;" for="color-0" data-toggle="tooltip" data-original-title="Orange"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Purple" onchange="filter()" class="common_selector color">
                                            <label style="background: Purple;" for="color-0" data-toggle="tooltip" data-original-title="Purple"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Teal" onchange="filter()" class="common_selector color">
                                            <label style="background: Teal;" for="color-0" data-toggle="tooltip" data-original-title="Teal"></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="color-0" name="color" value="Lime" onchange="filter()" class="common_selector color">
                                            <label style="background: Lime;" for="color-0" data-toggle="tooltip" data-original-title="Lime"></label>
                                        </li>
 </ul>
                            </div>
                        </div>-->
                        <?php }?>
<!--
                        <div class="bg-white sidebar-box mb-3">
                                    <div class="box-title text-left">
                                       <i class="fa fa-cut" ></i> <?=$size;?>
                                    </div>
                                    <div class="box-content overflow-auto ">
                                      
                                        <div class="filter-checkbox">                           <div class="checkbox">
                                                        <input type="checkbox" id="attribute_1_value_34" name="attribute_1[]" class="common_selector size" value="X" onchange="filter()">
                                                        <label for="attribute_1_value_34">X</label>
                                                    </div> 
                                                     <div class="checkbox">
                                                        <input type="checkbox" id="attribute_1_value_ 36" class="common_selector size"  name="attribute_1[]" value="XL" onchange="filter()">
                                                        <label for="attribute_1_value_ 36"> XL</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value="M" class="common_selector size"  onchange="filter()">
                                                        <label for="attribute_1_value_ 38"> M</label>
                                                    </div>  
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="attribute_1_value_ 39" name="attribute_1[]" value="S" class="common_selector size"  onchange="filter()">
                                                        <label for="attribute_1_value_ 39">S</label>
                                                    </div>                                                                                                                                    </div>
                                    </div>
                                </div>-->
                                 <div class="bg-white sidebar-box mb-3">
                                    <div class="box-title text-left">
                                      <i class="fa fa-hand-paper-o" ></i> <?=$brand;?>
                                    </div>
                                    <div class="box-content overflow-auto ">
                                        <!-- Filter by others -->
                                        <div class="filter-checkbox"> 
                                          <?php foreach (seller() as $brd_value) {?>
                                                                  <div class="checkbox">
                                                        <input type="checkbox" class="common_selector brand" id="attribute_2_value_34" name="brand[]" value="<?=$brd_value->vnd_id;?>" onchange="filter()" <?php if(@$p_brand==$brd_value->vnd_id)echo'checked';?>>
                                                        <label for="attribute_2_value_34"><?=$brd_value->vnd_name;?></label>
                                                    </div> 
                                                  <?php }?>

                                                                                                                                                                                </div>
                                    </div>
                                </div>
<!--                                 <div class="bg-white sidebar-box mb-3">-->
<!--                                    <div class="box-title text-left">-->
<!--                                      <i class="fa fa-folder" ></i> CONDITION-->
<!--                                    </div>-->
<!--                                    <div class="box-content overflow-auto ">-->
                                        <!-- Filter by others -->
<!--                                        <div class="filter-checkbox"> -->
                                         
<!--                                                                  <div class="checkbox">-->
<!--                                                        <input type="checkbox" class="common_selector condition" id="attribute_2_value_34" name="condition[]" value="0" onchange="filter()">-->
<!--                                                        <label for="attribute_2_value_34">New</label>-->
<!--                                                    </div> -->
<!--                                                    <div class="checkbox">-->
<!--                                                        <input type="checkbox" class="common_selector condition" id="attribute_2_value_34" name="condition[]" value="1" onchange="filter()">-->
<!--                                                        <label for="attribute_2_value_34">Used</label>-->
<!--                                                    </div> -->
<!--                                                    <div class="checkbox">-->
<!--                                                        <input type="checkbox" class="common_selector condition" id="attribute_2_value_34" name="condition[]" value="2" onchange="filter()">-->
<!--                                                        <label for="attribute_2_value_34">Refurbished-->
<!--</label>-->
<!--                                                    </div> -->
                                                  
                                                  
<!--                                                                                                                                                                                </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                 <div class="bg-white sidebar-box mb-3">
                                         <div class="home-slide">
                  <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="FALSE" data-slick-autoplay="true">
                      <div class="" style="height:454px !important;">
                        <img src="<?php echo site_url('uploads/');?>banners/images_gif1.gif" alt="Orsa" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />
                     </div>
                     <!--  <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/offer-40.jpg" alt="Kawashi-Fashion" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--    <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/cloth.jpg" alt="cloth" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--    <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/perfume.jpg" alt="Perfume" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--  <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/jwellery_1.jpg" alt="Jwellery" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--   <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/bag.jpg" alt="Bag" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!-- <div class="" style="height:454px !important;">-->
                     <!--<img src="<?php echo site_url('uploads/');?>banners/253-by-454-footwears.jpg" alt="footwears" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!-- <div class="" style="height:454px !important;">-->
                     <!--<img src="<?php echo site_url('uploads/');?>banners/beauty.jpg" alt="beauty" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--                     <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/product-1.jpg" alt="zahi product" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--                     <div class="" style="height:454px !important;">-->
                     <!--   <img src="<?php echo site_url('uploads/');?>banners/product-2.jpg" alt="zahi product" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--                     <div class="" style="height:454px !important;">-->
                     <!--  <img src="<?php echo site_url('uploads/');?>banners/product-3.jpg" alt="zahi product" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!--                     <div class="" style="height:454px !important;">-->
                     <!--<img src="<?php echo site_url('uploads/');?>banners/product-4.jpg" class="img-responsive" style="width:100%;padding: 0" />-->
                     <!--</div>-->
                     <!--                     <div class="" style="height:454px !important;">-->
                     <!--    <img src="<?php echo site_url('uploads/');?>banners/product-5.jpg" alt="zahi product" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!-- <div class="" style="height:454px !important;">-->
                     <!--<img src="<?php echo site_url('uploads/');?>banners/253-by-454-footwears.jpg" alt="footwears" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                     <!-- <div class="" style="height:454px !important;">-->
                     <!--<img src="<?php echo site_url('uploads/');?>banners/253-by-454-footwears_1.jpg" alt="footwears" class="img-responsive" style="width:100%;object-fit: contain;padding: 0" />-->
                     <!--</div>-->
                                       </div>
               </div>
                              </div>
                </div>
                <div class="col-xl-9  col-md-8">
                    <!-- <div class="bg-white"> -->
                        <div class="brands-bar row no-gutters pb-3 bg-white p-1">
                            
                           
                        </div>

                        <form class="" id="search-form" action="" method="GET">
                                                            <input type="hidden" name="category" value="Women-Clothing-Fashion">
                                                                                    
                            <div class="sort-by-bar row no-gutters bg-white mb-3 px-3">
                                <!--   <div class="col-lg-12 mb-3">
                                <?php if(empty($banner_img)){?>
                             <img src="<?=base_url('assets/img/category_filetr.jpg');?>" alt="<?=$scategory;?>" class="img-responsive1" style="width:100%;">
                             <?php }else{?>
                              <img src="<?=base_url('admin/uploads/category/').$banner_img;?>" alt="<?=$scategory;?>" class="img-responsive1" style="width:100%;">
                             <?php }?>
                             </div> -->

                                <!--<div class="col-lg-4 col-md-5">-->
                                <!--    <div class="sort-by-box">-->
                                <!--        <div class="form-group">-->
                                         
                                <!--            <div class="search-widget">-->
                                <!--                <input class="form-control input-lg" type="text" name="q" placeholder="<?=$search;?>">-->
                                <!--                <button type="button" class="btn-inner">-->
                                <!--                    <i class="fa fa-search"></i>-->
                                <!--                </button>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-7 offset-lg-1">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="sort-by-box px-1">
                                                <div class="form-group">
                                                   <!--  <label>Sort by</label> -->
                                                    <select class="form-control newest_first sortSelect select2-hidden-accessible" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()" tabindex="-1" aria-hidden="true">
                                                      <option value=""><?=$sort;?></option>
                                                        <option value="3">Newest</option>
                                                        <option value="4">Oldest</option>
                                                        <option value="1">Price low to high</option>
                                                        <option value="2">Price high to low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="min_price" value="">
                            <input type="hidden" name="max_price" value="">
                        </form>
                        <!-- <hr class=""> -->
                        <div class="products-box-bar p-3 bg-white">
                              <style type="text/css">
                              .page-item{
                                color: #2b2b2c;
    background-color: #eceeef;
    border-color: #eceeef;padding: 0.625rem 0.875rem;
    font-family: "Open Sans", sans-serif;
    font-size: 0.7rem;
    color: #818a91;
    background-color: transparent;
    border: 1px solid #eceeef;
    text-align: center !important;
                              }
                              li.page-item.active {
    background: #c19450;
    color: #fff;
}
.pagination {
    justify-content: center;
    }
                            </style>
                           
                            
                            
                            <div class="row sm-no-gutters gutters-5 filter_data">
                                           <div id="loading1"></div>
                                       
                                                            </div>
                                                            <div id="more"></div>
                        </div>
                       

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    
<?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer_product');
}else{
  $this->load->view('include/footer_product_ar');
}?>
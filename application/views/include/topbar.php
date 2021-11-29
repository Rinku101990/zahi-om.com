<body>
   <!-- MAIN WRAPPER -->
   <div class="body-wrap shop-default shop-cards shop-tech gry-bg">
   <!-- Header -->
   <div class="header bg-white">
      <!-- mobile menu -->
      <div class="mobile-side-menu d-lg-none">
         <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
         <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
               <div class="side-menu-header ">
                  <div class="side-menu-close" onclick="sideMenuClose()">
                     <i class="la la-close"></i>
                  </div>
                  <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                     <?php if(!empty($this->session->userdata('logged_in_customer'))){
                        if(empty($this->customer->cust_profile)){?>
                     <div class="image " style="background-image:url('<?=base_url('uploads/customers/profile.png');?>')"></div>
                     <?php }else{?>
                     <div class="image " style="background-image:url('<?=base_url('uploads/customers/').$this->customer->cust_profile;?>')"></div>
                     <?php } }?>
                  </div>
                  <div class="side-login px-3 pb-3">
                     <?php if(empty($this->session->userdata('logged_in_customer'))){?>
                     <a href="javascript:void(0);" class="SignIn_Model"><?=lang(4);?></a>
                     <a href="javascript:void(0);" class="SignUp_Model"><?=lang(12);?></a>
                     <?php }else{?>
                     <a href="<?=base_url('account/logout');?>"><?=lang(5);?></a>
                     <?php }?>
                  </div>
               </div>
               <div class="side-menu-list px-3">
                  <?php if(!empty($this->session->userdata('logged_in_customer'))){?>
                  <ul class="side-user-menu">
                     <li>
                        <a href="<?=base_url('account/my-profile');?>">
                        <i class="la la-user"></i>
                        <span><?=lang(6);?></span>
                        </a>
                     </li>
                     <li>
                        <a href="<?=base_url('account/shipping-address');?>">
                        <i class="la la-truck"></i>
                        <span><?=lang(7);?></span>
                        </a>
                     </li>
                     <li>
                        <a href="<?=base_url('account/my-order');?>">
                        <i class="la la-shopping-cart"></i>
                        <span><?=lang(8);?></span>
                        </a>
                     </li>
                     <li>
                        <a href="<?=base_url('account/transactions');?>">
                        <i class="la la-money"></i>
                        <span><?=lang(9);?></span>
                        </a>
                     </li>
                     <li>
                        <a href="<?=base_url('account/change-password');?>">
                        <i class="la la-key"></i>
                        <span><?=lang(10);?></span>         
                        </a>
                     </li>
                  </ul>
                  <?php }?>
                  <br/>
                  <nav class="navbar navbar-expand-lg navbar-light" style="
                     margin-top: 5px;font-weight: 700;border-top:none">
                     <b><?=lang(11);?></b>
                     <div class="collapse navbar-collapse" id="mobile_nav" style="display: block;    margin-top: 0.5rem;">
                        <ul class="navbar-nav navbar-light">
                           <?php 
                              if(navigation()== true){
                                            foreach(navigation() AS $cate_value){
                                             if($cate_value->mn_category_id=='13'){?>
                           <li class="nav-item dropdown megamenu-li dmenu">
                              <a class="nav-link " href="<?=base_url('make-your-own-design');?>" id="dropdown01"><?=$cate_value->mn_name;?> </a>
                           </li>
                           <?php }else if($cate_value->mn_category_id!='13'){ ?>
                           <li class="nav-item dropdown megamenu-li dmenu">
                              <a class="nav-link dropdown-toggle" href="<?=base_url('category/').encode($cate_value->mn_category_id).'/'.cate_slug($cate_value->mn_category_id).'/1';;?>" id="dropdown01" ><?=$cate_value->mn_name;?> <i class="fa fa-angle-down"></i></a>
                              <?php if(sub_category($cate_value->mn_category_id)!=FALSE){ ?>
                              <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01" style="display: none;">
                                 <div class="row">
                                    <?php foreach (sub_category($cate_value->mn_category_id) as $smenu_list) {?>
                                    <div class="col-sm-6 col-lg-3 border-right mb-4">
                                       <h6><a href="<?=base_url('sub-category/').encode($smenu_list->scate_id).'/'.$smenu_list->scate_slug.'/1';?>"><?=$smenu_list->scate_name;?></a></h6>
                                       <?php if(child_category($smenu_list->scate_id)!=FALSE){
                                          foreach (child_category($smenu_list->scate_id) as $ch_menu_list) {?>
                                       <a class="dropdown-item" href="<?=base_url('child-category/').encode($ch_menu_list->child_id).'/'.$ch_menu_list->child_slug.'/1';?>"><?=$ch_menu_list->child_name;?></a>
                                       <?php }}?>
                                    </div>
                                    <?php }?>
                                 </div>
                              </div>
                              <?php }?>
                           </li>
                           <?php }}}?>
                           <li class="nav-item ">
                              <a class="nav-link " href="<?=base_url('hot-offers');?>" >Hot Offers!</a>
                           </li>
                           <li class="nav-item ">
                              <a class="nav-link " href="<?=base_url('brands');?>" >Brands </a>
                           </li>
                            <li class="nav-item ">
                               <a class="nav-link " href="<?=base_url('best-selling/1');?>" >Best Selling  </a>
                            </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!-- end mobile menu -->
      <div class="position-relative logo-bar-area">
         <div class="">
            <div class="container">
               <div class="row no-gutters align-items-center">
                  <div class="col-lg-12 col-12 lang_desk">
                     <ul class="inline-links d-lg-inline-block d-done d-flex justify-content-between  ">
                        <li class="dropdown" id="lang-change">
                           <a href="" class="dropdown-toggle lang-change top-bar-item" data-toggle="dropdown" aria-expanded="false">
                           <img src="<?php echo site_url('assets/');?>images/icons/flags/en.png" height="11"  class="flag lazyloaded" alt="English"><span class="language">English</span>
                           </a>
                           <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <li class="dropdown-item ">
                                 <a href="<?=base_url('home/language/en');?>" data-flag="en"><img src="<?php echo site_url('assets/');?>images/icons/flags/en.png"  alt="English" class="flag lazyloaded" height="11"><span class="language">English</span></a>
                              </li>
                              <!--<li class="dropdown-item ">-->
                              <!--    <a href="<?=base_url('home/language/ar');?>" data-flag="sa"><img src="<?php echo site_url('assets/');?>images/icons/flags/sa.png"  class="flag lazyloaded" alt="Arabic" height="11"><span class="language">Arabic</span></a>-->
                              <!--</li>-->
                           </ul>
                        </li>
                        <li class="dropdown" id="currency-change">
                           <a href="" class="top-bar-item" data-toggle="dropdown"><i class="fa fa-phone"></i>
                           <?=$this->website->web_support_contact;?>
                           </a>
                        </li>
                        <li class="dropdown" id="currency-change">
                           <a href="" class="top-bar-item" data-toggle="dropdown"><i class="fa fa-envelope"></i>
                           info@zahi-om.com
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-2 col-6">
                     <div class="d-flex">
                        <div class="d-block d-lg-none mobile-menu-icon-box">
                           <!-- Navbar toggler  -->
                           <a href="" onclick="sideMenuOpen(this)">
                              <div class="hamburger-icon">
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </div>
                           </a>
                        </div>
                        <!-- Brand/Logo -->
                        <a class="navbar-brand w-100" href="<?php echo site_url('');?>">
                        <img src="<?=base_url('admin/uploads/website/logo/').$this->website->web_company_logo;?>" title="<?=$this->website->web_company_name;?>" alt="<?=$this->website->web_company_name;?>" style="width: 105px;max-height: none;">
                        </a>
                        <!-- <div class="d-none d-xl-block category-menu-icon-box">
                           <div class="dropdown-toggle navbar-light category-menu-icon" id="category-menu-icon">
                               <span class="navbar-toggler-icon"></span>
                           </div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-lg-10 col-6 position-static">
                     <div class="d-flex w-100" >
                        <ul class="inline-links d-lg-inline-block d-done d-flex justify-content-between lang_mobile ">
                           <li class="dropdown" id="lang-change">
                              <a href="" class="dropdown-toggle lang-change top-bar-item" data-toggle="dropdown" aria-expanded="false">
                              <img src="<?php echo site_url('assets/');?>images/icons/flags/en.png" height="11"  class="flag lazyloaded" alt="English"><span class="language">English</span>
                              </a>
                              <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
                                 <li class="dropdown-item ">
                                    <a href="<?=base_url('home/language/en');?>" data-flag="en"><img src="<?php echo site_url('assets/');?>images/icons/flags/en.png"  alt="English" class="flag lazyloaded" height="11"><span class="language">English</span></a>
                                 </li>
                                 <!--<li class="dropdown-item ">-->
                                 <!--    <a href="<?=base_url('home/language/ar');?>" data-flag="sa"><img src="<?php echo site_url('assets/');?>images/icons/flags/sa.png"  class="flag lazyloaded" alt="Arabic" height="11"><span class="language">Arabic</span></a>-->
                                 <!--</li>-->
                              </ul>
                           </li>
                           <li class="dropdown" id="currency-change">
                              <a href="" class="top-bar-item" data-toggle="dropdown"><i class="fa fa-phone"></i>
                              <?=$this->website->web_support_contact;?>
                              </a>
                           </li>
                           <li class="dropdown" id="currency-change">
                              <a href="" class="top-bar-item" data-toggle="dropdown"><i class="fa fa-envelope"></i>
                              info@zahi-om.com
                              </a>
                           </li>
                        </ul>
                        <div class="search-box flex-grow-1 px-4">
                           <form action="<?=base_url('home/search');?>" method="GET">
                              <div class="d-flex position-relative">
                                 <div class="d-lg-none search-box-back">
                                    <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                 </div>
                                 <div class="w-100">
                                    <input type="text" aria-label="Search" placeholder="<?=lang(1);?>..." id="search_val" value="<?=@$_REQUEST['search'];?>"  name="search" onkeyup="ajaxSearch();" autocomplete="off" style="width:100%;" required>
                                 </div>
                                 <!-- <div class="form-group category-select d-none d-xl-block">
                                    <select class="form-control selectpicker" name="category">
                                        <option value="">All Categories</option>
                                        <?php if(get_category() == TRUE){
                                       foreach (get_category() as $category_value) {  ?>
                                    <option value="<?=$category_value->cate_id;?>"><?=$category_value->cate_name;?></option>
                                    <?php }}?>
                                      
                                    </select>
                                    </div> -->
                                 <button class="d-none d-lg-block" type="submit">
                                 <i class="la la-search la-flip-horizontal"></i>
                                 </button>
                              </div>
                           </form>
                           <div id="search_data" style="display: none">
                              <div id="autoSuggestionsList" ></div>
                           </div>
                        </div>
                        <div class="logo-bar-icons d-inline-block ml-auto">
                           <div class="d-inline-block d-lg-none search_mobile">
                              <div class="nav-search-box">
                                 <a href="#" class="nav-box-link">
                                 <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="d-lg-inline-block wishlist_mob">
                              <div class="nav-wishlist-box" id="wishlist">
                                 <?php if(empty($this->session->userdata('logged_in_customer'))){?>
                                 <a href="#" class="nav-box-link SignIn_Model">
                                 <i class="la la-user d-inline-block nav-box-icon"></i>
                                 <span class="nav-box-text d-none d-xl-inline-block" style="
                                    vertical-align: super;
                                    "><?=lang(2);?></span>
                                 </a>
                                 <?php }else{?>
                                 <a href="<?=base_url('account/my-profile');?>" class="nav-box-link"><i class="la la-user d-inline-block nav-box-icon"></i>  <span style=" vertical-align: super;"> <b>Hi,</b> <span class="nav-box-text d-none d-xl-inline-block" style="
                                    color: #c19450;font-weight: 700;
                                    "><?php $myNameLength=strlen($this->customer->cust_fname);if($myNameLength >=7){echo substr($this->customer->cust_fname,0,7).'';}else{echo substr($this->customer->cust_fname,0,7);}?>
                                 </span></span></a>
                                 <!-- <a href="<?=base_url('account/logout');?>" class="top-bar-item"><i class="fa fa-sign-out"></i> logout</a> -->
                                 <?php }?>
                              </div>
                           </div>
                           <div class="d-inline-block wishlist_mobile" >
                              <div class="nav-cart-box " >
                                 <span >
                                 <?php if(!empty($this->session->userdata('logged_in_customer'))){?>
                                 <a href="<?=base_url('account/wishlist');?>" class="nav-box-link">
                                 <i class="la la-heart-o d-inline-block nav-box-icon" style="    font-size: 28px;"></i>
                                 <span class="nav-box-text d-none d-xl-inline-block"><?=lang(72);?></span>
                                 <span class="nav-box-number" id="wishlist_count"><?=wishlist($this->customer->cust_id);?></span>
                                 </a>
                                 <?php }else{?>
                                 <a href="javascript:void(0);" class="nav-box-link">
                                 <i class="la la-heart-o d-inline-block nav-box-icon" style="    font-size: 28px;"></i>
                                 <span class="nav-box-text d-none d-xl-inline-block"><?=lang(72);?></span>
                                 <span class="nav-box-number" class="wishlist_count">0</span>
                                 </a>
                                 <?php }?>
                                 </span>
                              </div>
                           </div>
                           <div class="d-inline-block cart_mobile" data-hover="dropdown">
                              <div class="nav-cart-box dropdown" id="cart_items">
                                 <span id="show_cart">
                                    <a href="<?=base_url('cart');?>" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
                                    <span class="nav-box-text d-none d-xl-inline-block"><?=lang(3);?></span>
                                    <span class="nav-box-number" id="show_cart"><?php if(empty($this->cart->contents())){ echo'0';}else{ echo count($this->cart->contents());} ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right px-0" >
                                       <li>
                                          <div class="dropdown-cart px-0">
                                             <?php if($this->cart->contents()==true){ ?>
                                             <div class="dc-header">
                                                <h3 class="heading heading-6 strong-700">Cart Items</h3>
                                             </div>
                                             <?php foreach ($this->cart->contents() as $items) {?>
                                             <div class="dropdown-cart-items c-scrollbar">
                                                <div class="dc-item">
                                                   <div class="d-flex align-items-center">
                                                      <div class="dc-image">
                                                         <a href="<?=$items['product_url'];?>" target="_blank">
                                                         <img src="<?=$items['img'];?>" alt="<?=$items['name'];?>" data-src="<?=$items['img'];?>" class="img-fluid lazyload" alt="<?=decode($items['name']);?>" style="width:100%;object-fit:cover;height:61px">
                                                         </a>
                                                      </div>
                                                      <div class="dc-content">
                                                         <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                         <a href="<?=$items['product_url'];?>">
                                                         <?=decode($items['name']);?>
                                                         </a>
                                                         </span>
                                                         <span class="dc-quantity">x<?=$items['qty'];?></span>
                                                         <span class="dc-price"><?=currency($this->website->web_currency);?><?=$this->cart->format_number($items['price']);?></span>
                                                      </div>
                                                      <div class="dc-actions">
                                                         <button url="<?=base_url();?>"   onclick="remove_cart('<?=$items['rowid'];?>',this)">
                                                         <i class="la la-close"></i>
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php } ?>
                                             <div class="dc-item py-3">
                                                <span class="subtotal-text">Subtotal</span>
                                                <span class="subtotal-amount"><?=currency($this->website->web_currency);?><?php if(!empty($this->cart->contents())){echo $this->cart->format_number($this->cart->total());}?></span>
                                             </div>
                                             <div class="py-2 text-center dc-btn">
                                                <ul class="inline-links inline-links--style-3">
                                                   <li class="px-1">
                                                      <a href="<?=base_url('cart');?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                      <i class="la la-shopping-cart"></i> View cart
                                                      </a>
                                                   </li>
                                                   <li>
                                                      <a href="<?=base_url('checkout');?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                      <i class="la la-mail-forward"></i> Checkout
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                             <?php  }else{ ?>
                                             <div class="dc-header">
                                                <h3 class="heading heading-6 strong-700">Your Cart is empty</h3>
                                             </div>
                                             <?php } ?>
                                          </div>
                                       </li>
                                    </ul>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <nav class="navbar navbar-expand-lg navbar-light" style="
                        margin-top: 5px;">
                        <div class="collapse navbar-collapse" id="mobile_nav">
                           <ul class="navbar-nav navbar-light">
                              <?php if(navigation()== true){
                                 foreach(navigation() AS $cate_value){
                                   if($cate_value->mn_category_id=='13'){
                                 ?>
                              <li class="nav-item dmenu">
                                 <a class="nav-link d" href="<?=base_url('make-your-own-design');?>" id="dropdown01" ><?=$cate_value->mn_name;?> </a>
                              </li>
                              <?php }elseif($cate_value->mn_category_id!='13'){?>
                              <li class="nav-item dropdown megamenu-li dmenu">
                                 <a class="nav-link dropdown-toggle" href="<?=base_url('category/').encode($cate_value->mn_category_id).'/'.cate_slug($cate_value->mn_category_id).'/1';?>" id="dropdown01" ><?=$cate_value->mn_name;?> <i class="fa fa-angle-down"></i></a>
                                 <?php if(sub_category($cate_value->mn_category_id)!=FALSE){
                                    ?>
                                 <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01" style="display: none;">
                                    <div class="row">
                                       <?php foreach (sub_category($cate_value->mn_category_id) as $smenu_list) {
                                          if($smenu_list->scate_id=='22'){
                                                 $tab='col-sm-12 col-lg-12 overflow-auto';
                                                 $class="dropdown2";
                                             }else{$tab='col-sm-6 col-lg-3'; $class="";}?>
                                       <div class="<?=$tab;?> border-right mb-4">
                                          <h6><a href="<?=base_url('sub-category/').encode($smenu_list->scate_id).'/'.$smenu_list->scate_slug.'/1';?>"><?=$smenu_list->scate_name;?></a></h6>
                                          <?php if(child_category($smenu_list->scate_id)!=FALSE){
                                             foreach (child_category($smenu_list->scate_id) as $ch_menu_list) {?>
                                          <a class="dropdown-item <?=$class;?>" href="<?=base_url('child-category/').encode($ch_menu_list->child_id).'/'.$ch_menu_list->child_slug.'/1';?>"><?=$ch_menu_list->child_name;?></a>
                                          <?php }}?>
                                       </div>
                                       <?php }?>
                                    </div>
                                 </div>
                                 <?php }?>
                              </li>
                              <?php }}}?>
                              <li class="nav-item ">
                                 <a class="nav-link " href="<?=base_url('hot-offers/1');?>" >Hot Offers!</a>
                              </li>
                              <li class="nav-item ">
                                 <a class="nav-link " href="<?=base_url('brands');?>" >Brands </a>
                              </li>
                               <li class="nav-item ">
                               <a class="nav-link " href="<?=base_url('best-selling/1');?>" >Best Selling  </a>
                            </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <div class="hover-category-menu" id="hover-category-menu">
            <div class="container">
               <div class="row no-gutters position-relative">
                  <div class="col-lg-3 position-static">
                     <div class="category-sidebar" id="category-sidebar">
                        <div class="all-category">
                           <span>CATEGORIES</span>
                           <a href="<?php // base_url('categories');?>" class="d-inline-block">See All ></a>
                        </div>
                        <ul class="categories">
                           <?php if(get_category()== true){
                              foreach(get_category() AS $cate_value){
                               ?>
                           <li>
                              <a href="<?php //base_url('category/').$cate_value->cate_slug;?>">
                              <img class="cat-image lazyload" src="<?php echo site_url('assets/');?>images/placeholder.jpg" data-src="<?=base_url('admin/uploads/category/icon/').$cate_value->cate_icon;?>" width="30" alt="<?=$cate_value->cate_name;?>">
                              <span class="cat-name"><?=$cate_value->cate_name;?></span>
                              </a>
                              <?php if(sub_category($cate_value->cate_id)!=FALSE){ ?>
                              <div class="sub-cat-menu c-scrollbar">
                                 <div class="sub-cat-main row no-gutters">
                                    <div class="col-12">
                                       <div class="sub-cat-content">
                                          <div class="sub-cat-list">
                                             <div class="card-columns">
                                                <?php foreach (sub_category($cate_value->cate_id) as $smenu_list) {?>
                                                <div class="card">
                                                   <ul class="sub-cat-items">
                                                      <li class="sub-cat-name">  <a href="<?php //base_url('sub-category/').encode($smenu_list->scate_id).'/'.$smenu_list->scate_slug;?>"> <?=$smenu_list->scate_name;?></a></li>
                                                      <?php if(child_category($smenu_list->scate_id)!=FALSE){
                                                         foreach (child_category($smenu_list->scate_id) as $ch_menu_list) {?>
                                                      <li><a href="<?php //base_url('child-category/').encode($ch_menu_list->child_id).'/'.$ch_menu_list->child_slug;?>"><?=$ch_menu_list->child_name;?></a></li>
                                                      <?php }}?>
                                                   </ul>
                                                </div>
                                                <?php }?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php }?>
                           </li>
                           <?php }}?>                                      
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Navbar -->
      <!--  <div class="main-nav-area d-none d-lg-block">
         <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">
             <div class="container">
                 <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main"> -->
      <!-- Navbar links -->
      <!--  <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" href="#search?q=iphone%20xs%20max">iphone xs max</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#search?q=iphone">iphone</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#search?q=car">car</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#search?q=snow%20bike">snow bike</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#search?q=iphone%20case">iphone case</a>
         </li>
         </ul> -->
      <!--   </div>
         </div>
         </nav>
         </div> -->
   </div>
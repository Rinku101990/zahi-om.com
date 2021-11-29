<!-- Sidebar menu-->
<?php $page=$this->uri->segment(1);
     @$page2=$this->uri->segment(2);?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-tab-body p-0 border-0 resp-vtabs hor_1" id="sidemenu-Tab" style="display: block; width: 100%; margin: 0px;">
            <div class="first-sidemenu  ps--active-y">
                <div class="line-animations">
                    <ul class="resp-tabs-list hor_1" style="margin-top: 3px;">
                        <?php $permission=unserialize($this->login->mst_permission);                         
                        if($this->login->mst_role=='0' || !empty($permission['dashboard_view'])){?>
                        <li class="<?php if($page=='dashboard')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-0" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/homepage.svg" class="side_menu_img svg-1" alt="image"></li>
                        <?php }else if(empty($permission['dashboard_view']) && $page=='dashboard'){
                             redirect('dashboard'); }?>
                        <li class="<?php if($page=='catalog')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab"><span class="side-menu__icon"></span><i class="fa fa-list fs-20 side_menu_img svg-1"></i></li>
                        <li class="<?php if($page=='user')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-2" role="tab"><span class="side-menu__icon"></span><i class="ti-user fs-20 side_menu_img svg-1"></i></li>                     
                        <li class="<?php if($page=='cms')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-3" role="tab"><span class="side-menu__icon"></span><i class="fa fa-file fs-20 side_menu_img svg-1"></i></li>                        
                        <li class="<?php if($page=='orders')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-4" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/shopping-cart.svg" class="side_menu_img svg-1" alt="image"></li>
                         <li class="<?php if($page=='notifications')echo'resp-tab-active active ';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-3" role="tab"><span class="side-menu__icon"></span><i class="fa fa-bell fs-20 side_menu_img svg-1"></i></li>                       

                        <?php  if($this->login->mst_role=='0' || !empty($permission['blog_post'])){?>
                        <li class="<?php if($page=='blogs')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-5" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/writing.svg" class="side_menu_img svg-1" alt="image"></li>
                       <?php }else if(empty($permission['blog_post']) && $page=='blogs'){
                             redirect('dashboard'); }?>
                        <li class="<?php if($page=='reports')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-6" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/bars-graphic.svg" class="side_menu_img svg-1" alt="image"></li>
                        <?php  if($this->login->mst_role=='0' || !empty($permission['mail_services'])){?>
                        <li class="<?php if($page=='mails')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-7" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/email.svg" class="side_menu_img svg-1" alt="image"></li>
                    <?php }else if(empty($permission['mail_services']) && $page=='mails'){
                             redirect('dashboard'); }?>
                       <!--  <li class="<?php if($page=='')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-7" role="tab"><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/layers.svg" class="side_menu_img svg-1" alt="image"></li> -->
                         <?php  if($this->login->mst_role=='0' || !empty($permission['admin_userss'])){?>
                        <li class="<?php if($page=='users')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-8" role="tab"><span class="side-menu__icon"></span><i class="fa fa-user-o fs-20 side_menu_img svg-1"></i></li>
                    <?php }else if(empty($permission['admin_userss']) && $page=='users'){
                             redirect('dashboard');}?>
                        <li class="<?php if($page=='settings')echo'resp-tab-active active';?> resp-tab-item hor_1" aria-controls="hor_1_tab_item-10" role="tab"><span class="side-menu__icon"></span><i class="ti-panel fs-20 side_menu_img svg-1"></i></li>
                    </ul>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 789px; right: -2px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 606px;"></div>
                </div>
            </div>
            <div class="second-sidemenu ps ps--active-y">
                <div class="resp-tabs-container hor_1">
                  <?php if($this->login->mst_role=='0' || !empty($permission['dashboard_view'])){?>                  
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-0"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/homepage.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='dashboard')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0 active">
                                        <div class="tab-content">

                                            <div class="tab-pane active " id="side1">
                                                <h5 class="mt-2 fs-15 font-weight-semibold mb-3">CRM</h5>
                                                
                                                  <a class="slide-item active" href="<?=base_url('dashboard');?>">Dashboard</a> 
                                                  <h5 class="fs-15 font-weight-semibold mt-5 mb-4">Activites</h5>
                                                  <div class=" mt-5"> <div class="card menu-icons"> <div class="card-body p-3"> <div class="d-flex"> <div class="pr-4 mt-0"> <i class="fa fa-dollar bg-primary-transparent text-primary-shadow text-primary menu-icon"></i> </div> <div class=""> <span>Revenue</span> <h3 class="mb-0 fs-20"><?=currency($this->website->web_currency);?><br><?php if($this->AllProduct['revenue']->Revenue!=''){echo number_format($this->AllProduct['revenue']->Revenue,2);}else{echo "0";};?></h3> </div> </div> </div> </div> </div> 

                                                 <div class=" mt-5"> <div class="card menu-icons">  <div class="card-body p-3"> <div class="d-flex"> <div class="pr-4 mt-0"> <i class="fa fa-product-hunt bg-secondary-transparent text-secondary-shadow text-secondary menu-icon"></i> </div> <div class=""> <span>Products</span> <h3 class="mb-0 fs-20"><?php echo $this->AllProduct['product'];?></h3> </div> </div> </div>
                                               </div></div>
                                               <div class=" mt-4"> <div class="card menu-icons"> <div class="card-body p-3"> <div class="d-flex"> <div class="pr-4 mt-0"> <i class="fa fa-users  bg-info-transparent text-info-shadow text-info menu-icon"></i> </div> <div class=""> <span>Vendors</span> <h3 class="mb-0 fs-20"><?php echo $this->AllProduct['vendors'];?></h3> </div> </div> </div> </div> </div>

                                                <div class=" mt-4"> <div class="card menu-icons"> <div class="card-body p-3"> <div class="d-flex"> <div class="pr-4 mt-0"> <i class="fa fa-users  bg-success-transparent text-success-shadow text-success menu-icon"></i> </div> <div class=""> <span>Customers</span> <h3 class="mb-0 fs-20"><?php echo $this->AllProduct['customers'];?></h3> </div> </div> </div> </div> </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <?php }?>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-1"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/bitcoin-logo.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='catalog')echo'resp-tab-content-active';?>  resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side11">
                                            <h5 class="mt-3 mb-4">Manage Catalog</h5> 
                                    <?php 
                                    if($this->login->mst_role=='0' || !empty($permission['shops_view'])){?>
                                         <a href="<?=base_url('catalog/shop');?>" class="slide-item">Shops</a>
                                        <?php }else if(empty($permission['shops_view']) && $page2=='shop'){
                                               redirect('dashboard');
                                           }
                                    if($this->login->mst_role=='0' || !empty($permission['product_categories_view'])){?>
                                       <a href="<?=base_url('settings/category');?>" class="slide-item">Product Categories</a>
                                    <?php }else if(empty($permission['product_categories_view']) && $page2=='category'){
                                        redirect('dashboard');
                                    }
                                    if($this->login->mst_role=='0' || !empty($permission['products_view'])){?>
                                        <a href="<?=base_url('catalog/products');?>" class="slide-item">Products</a>
                                    <?php } else if(empty($permission['products_view']) && $page2=='products'){
                                        redirect('dashboard');
                                    }?>
                                         <div class="side-menu p-0">
                                                    <div class="slide submenu"> <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Make Your Own Design </span><i class="angle fa fa-angle-down"></i></a>
                                                        <ul class="slide-menu submenu-list">        
                                                            <li> <a href="<?=base_url('catalog/sleeve');?>" class="slide-item">Sleeve</a> </li>
                                                             <li> <a href="<?=base_url('catalog/fabric');?>" class="slide-item">Fabric </a > </li>
                                                              <li> <a href="<?=base_url('catalog/color');?>" class="slide-item">Color </a> </li>
                                                              <!--<li> <a href="<?=base_url('catalog/size');?>" class="slide-item">Size </a> </li>-->
                                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                    
                                    <?php if($this->login->mst_role=='0' || !empty($permission['featured_products_view'])){?>
                                     <a href="<?=base_url('catalog/featured ');?>" class="slide-item">Featured Products</a>
                                    <?php }else if(empty($permission['featured_products_view']) && $page2=='featured'){
                                        redirect('dashboard');
                                    }
                                     if($this->login->mst_role=='0' || !empty($permission['trending_products_view'])){?>
                                      <a href="<?=base_url('catalog/trending');?>" class="slide-item">Trending Products</a>
                                    <?php }else if(empty($permission['trending_products_view']) && $page2=='trending'){
                                        redirect('dashboard');
                                    }
                                     if($this->login->mst_role=='0' || !empty($permission['inventory_view'])){?>
                                        <a href="<?=base_url('catalog/inventory');?>" class="slide-item">Manage Inventory</a>
                                    <?php }else if(empty($permission['inventory_view']) && $page2=='inventory'){
                                        redirect('dashboard');
                                    }
                                     if($this->login->mst_role=='0' || !empty($permission['special_price_view'])){?>
                                      <a href="<?=base_url('catalog/special-price');?>" class="slide-item">Special Price</a>
                                        <?php }else if(empty($permission['special_price_view']) && $page2=='special-price'){
                                        redirect('dashboard');
                                         }
                                      if($this->login->mst_role=='0' || !empty($permission['volume_discount_view'])){?>
                                     <a href="<?=base_url('catalog/volume-discount');?>" class="slide-item">Volume Discount</a>
                                       <?php }else if(empty($permission['volume_discount_view']) && $page2=='volume-discount'){
                                        redirect('dashboard');
                                         }
                                        if($this->login->mst_role=='0' || !empty($permission['export_products'])){?>
                                     <a href="<?=base_url('catalog/export');?>" class="slide-item">Export Product</a>
                                     <?php }else if(empty($permission['export_products']) && $page2=='export'){
                                        redirect('dashboard');
                                         }
                                      if($this->login->mst_role=='0' || !empty($permission['import_products_view'])){?>
                                     <a href="<?=base_url('catalog/import');?>" class="slide-item">Import Product</a>
                                     <?php }else if(empty($permission['import_products_view']) && $page2=='import'){
                                        redirect('dashboard');
                                         }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-2"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/testing.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='user')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="side-1">
                                                <h5 class="mt-3 mb-4">Manage Users</h5>
                                             <?php if($this->login->mst_role=='0' || !empty($permission['customer_list_view'])){?>
                                                <a href="<?=base_url('user');?>" class="slide-item">Customers List</a>
                                             <?php }else if(empty($permission['customer_list_view']) && $page=='user'){
                                                redirect('dashboard');
                                                }
                                              if($this->login->mst_role=='0' || !empty($permission['vendor_list_view'])){?>
                                                <a href="<?=base_url('user/vendors');?>" class="slide-item">Vendors List</a>
                                                <?php }
                                                else if(empty($permission['vendor_list_view']) && $page2=='vendors'){
                                                    redirect('dashboard');
                                                     }
                                          if($this->login->mst_role=='0' || !empty($permission['my_product_order_list'])){?> 
                                                <a href="<?=base_url('user/myProductOrders');?>" class="slide-item">My Product Orders List</a>  
                                            <?php }else if(empty($permission['my_product_order_list']) && $page2=='myProductOrders'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-3"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/shopping-cart.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='cms')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side-11">
                                                <h5 class="mt-3 mb-4">CMS</h5>
                                                 <?php if($this->login->mst_role=='0' || !empty($permission['content_pages_view'])){?> 
                                                <a href="<?=base_url('cms/content-page');?>" class="slide-item">Content Pages</a>
                                            <?php }else if(empty($permission['content_pages_view']) && $page2=='content-page'){
                                                    redirect('dashboard');
                                                     }
                                             if($this->login->mst_role=='0' || !empty($permission['navigation_management_view'])){?> 
                                                <a href="<?=base_url('cms/navigation');?>" class="slide-item">Navigation Management</a>
                                            <?php }else if(empty($permission['navigation_management_view']) && $page2=='navigation'){
                                                    redirect('dashboard');
                                                     }
                                             if($this->login->mst_role=='0' || !empty($permission['policy_ponits'])){?>                      
                                                <a href="<?=base_url('cms/policy');?>" class="slide-item">Policy Points </a>    
                                                 <?php } 
                                                 else if(empty($permission['policy_ponits']) && $page2=='policy'){
                                                    redirect('dashboard');
                                                     }
                                                 if($this->login->mst_role=='0' || !empty($permission['order_cancel_reasons'])){?>         
                                                <a href="<?=base_url('cms/order-cancel-reasons');?>" class="slide-item">Order Cancel Reasons  </a>
                                                 <?php } else if(empty($permission['order_cancel_reasons']) && $page2=='order-cancel-reasons'){
                                                    redirect('dashboard');
                                                     }
                                                 if($this->login->mst_role=='0' || !empty($permission['order_return_reasons'])){?> 
                                                <a href="<?=base_url('cms/order-return-reasons');?>" class="slide-item">Order Return Reasons   </a>
                                                 <?php }else if(empty($permission['order_return_reasons']) && $page2=='order-return-reasons'){
                                                    redirect('dashboard');
                                                     }
                                                  if($this->login->mst_role=='0' || !empty($permission['testimoninals'])){?> 
                                                <a href="<?=base_url('cms/testimonials');?>" class="slide-item">Testimonials   </a>
                                                 <?php } else if(empty($permission['testimoninals']) && $page2=='testimonials'){
                                                    redirect('dashboard');
                                                     }
                                                 if($this->login->mst_role=='0' || !empty($permission['discount_coupons'])){?> 
                                                <a href="<?=base_url('cms/discount-coupons');?>" class="slide-item">Discount Coupons </a>
                                                 <?php }else if(empty($permission['discount_coupons']) && $page2=='discount-coupons'){
                                                    redirect('dashboard');
                                                     }
                                                  if($this->login->mst_role=='0' || !empty($permission['banners'])){?> 
                                                <a href="<?=base_url('cms/banners');?>" class="slide-item">Banners </a>
                                            <?php }else if(empty($permission['banners']) && $page2=='banners'){
                                                    redirect('dashboard');
                                                     }
                                            ?>
                                             <!-- <a href="<?=base_url('cms/enquiry');?>" class="slide-item">Enquiry  </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-4"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/search.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php if($page=='orders')echo'resp-tab-content-active';?> resp-tab-content hor_4" aria-labelledby="hor_1_tab_item-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="side-21">
                                                <h5 class="mt-3 mb-4">Management Order</h5> 
                                            <?php if($this->login->mst_role=='0' || !empty($permission['orders'])){?> 
                                            <a href="<?=base_url('orders');?>" class="slide-item"> Orders</a>
                                            <a href="<?=base_url('orders/design');?>" class="slide-item"> Make Design Orders</a> 
                                            <?php }else if(empty($permission['orders']) && $page=='orders'){
                                                    redirect('dashboard');
                                                     }
                                             if($this->login->mst_role=='0' || !empty($permission['cancellation_requests'])){?> 
                                            <!-- <a href="<?=base_url('orders/withdrawal');?>" class="slide-item">Withdrawal Requests </a>  -->
                                             <?php }else if(empty($permission['cancellation_requests']) && $page2=='withdrawal'){
                                                    redirect('dashboard');
                                                     }
                                              if($this->login->mst_role=='0' || !empty($permission['cancellation_requests'])){?>
                                            <!--<a href="<?=base_url('orders/cancellation');?>" class="slide-item">Cancellation Requests  </a> -->
                                             <?php } else if(empty($permission['cancellation_requests']) && $page2=='cancellation'){
                                                    redirect('dashboard');
                                                     }

                                             if($this->login->mst_role=='0' || !empty($permission['return_requets'])){?> 
                                           <!--  <a href="<?=base_url('orders/returns');?>" class="slide-item">Return/Refund Requests </a>  -->
                                           <?php }else if(empty($permission['return_requets']) && $page2=='return'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                      <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-7"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/layers.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='notifications')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side41">
                                                <h5 class="mt-3 mb-4">Push Notification</h5> 
                                                <a href="<?php echo base_url('notifications');?>" class="slide-item">Notification(IOS)</a>
                                                <a href="<?php echo base_url('notifications/android');?>" class="slide-item">Notification(Android)</a>
                                                <!--<a href="<?php echo base_url('notifications/email');?>" class="slide-item">Notification(Email)</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                         <?php  if($this->login->mst_role=='0' || !empty($permission['blog_post'])){?>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-5"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/writing.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php if($page=='blogs')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side21">
                                                <h5 class="mt-3 mb-4">Management Blog</h5> 
                                             <?php if($this->login->mst_role=='0' || !empty($permission['blog_post'])){?> 
                                                <a href="<?php echo site_url('blogs');?>" class="slide-item">Blog Post</a> 
                                                   <?php }else if(empty($permission['blog_post']) && $page=='blogs'){
                                                    redirect('dashboard');
                                                     }
                                                    if($this->login->mst_role=='0' || !empty($permission['blog_comments'])){?> 
                                                <a href="<?php echo site_url('blogs/comments');?>" class="slide-item">Blog Comments</a>
                                            <?php }else if(empty($permission['blog_comments']) && $page2=='comments'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-6"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/bars-graphic.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='reports')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side31">
                                                <h5 class="mt-3 mb-4">Management Report</h5> 
                                             <?php if($this->login->mst_role=='0' || !empty($permission['sales_report'])){?> 
                                                <a href="<?=base_url('reports');?>" class="slide-item">Sales Report</a> 
                                             <?php }else if(empty($permission['sales_report']) && $page=='reports'){
                                                    redirect('dashboard');
                                                     }
                                              if($this->login->mst_role=='0' || !empty($permission['buyers_report'])){?> 
                                                <a href="<?=base_url('reports/buyers');?>" class="slide-item">Buyers Report</a> 
                                             <?php }else if(empty($permission['buyers_report']) && $page2=='buyers'){
                                                    redirect('dashboard');
                                                     }                                                   
                                              if($this->login->mst_role=='0' || !empty($permission['seller_report'])){?>
                                                <a href="<?=base_url('reports/sellers');?>" class="slide-item">Sellers Report</a>
                                            <?php }else if(empty($permission['seller_report']) && $page2=='sellers'){
                                                    redirect('dashboard');
                                                     }
                                             if($this->login->mst_role=='0' || !empty($permission['product_seller_wise'])){?> 
                                                <a href="<?=base_url('reports/products');?>" class="slide-item">Products (Seller Wise)</a> 
                                            <?php }else if(empty($permission['product_seller_wise']) && $page2=='productss'){
                                                    redirect('dashboard');
                                                     }
                                            if($this->login->mst_role=='0' || !empty($permission['product_catallog_wise'])){?> 
                                                <a href="<?=base_url('reports/category');?>" class="slide-item">Products (Catalog Wise)</a> 
                                            <?php }else if(empty($permission['product_catallog_wise']) && $page2=='category'){
                                                    redirect('dashboard');
                                                     }
                                             if($this->login->mst_role=='0' || !empty($permission['top_products'])){?> 
                                                <a href="<?=base_url('reports/top_products');?>" class="slide-item">Top Products</a>
                                            <?php }else if(empty($permission['top_products']) && $page2=='top_products'){
                                                    redirect('dashboard');
                                                     }
                                            if($this->login->mst_role=='0' || !empty($permission['commission'])){?> 
                                               <!--  <a href="<?=base_url('reports/commission');?>" class="slide-item">Commission</a>  -->
                                            <?php }else if(empty($permission['commission']) && $page2=='commission'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php  if($this->login->mst_role=='0' || !empty($permission['mail_services'])){?> 
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-7"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/layers.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='mails')echo'resp-tab-content-active';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side41">
                                                <h5 class="mt-3 mb-4">Mails Management</h5> 
                                                  <?php  if($this->login->mst_role=='0' || !empty($permission['mail_services'])){?> 
                                                <a href="<?php echo base_url('mails');?>" class="slide-item">Mail Services</a>
                                          <?php }
                                          else if(empty($permission['mail_services']) && $page=='mails'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

                  <!--  <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-7"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/layers.svg" class="side_menu_img svg-1" alt="image"></h2>
                     <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side41">
                                                <h5 class="mt-3 mb-4">PPC Promotions Management</h5>
                                                <?php  if($this->login->mst_role=='0' || !empty($permission['ppc_promotions'])){?>
                                                 <a href="#" class="slide-item">PPC Promotions Management</a>
                                             <?php }else if(empty($permission['ppc_promotions']) && $page=='#'){
                                                    redirect('dashboard');
                                                     }?>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
 <?php  if($this->login->mst_role=='0' || !empty($permission['admin_users'])){?>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-8"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/calendar.svg" class="side_menu_img svg-1" alt="image"></h2>
                    <div class="<?php  if($page=='users')echo'resp-tab-content-active ';?> resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side51">
                                                <h5 class="mt-3 mb-4">Management Admin Users</h5>
                                                  <?php  if($this->login->mst_role=='0' || !empty($permission['admin_users'])){?>
                                                   <a href="<?=base_url('users');?>" class="slide-item"> Admin Users</a> 
                                               <?php }
                                               else if(empty($permission['admin_users']) && $page=='users'){
                                                    redirect('dashboard');
                                                     }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-9"><span class="resp-arrow"></span><span class="side-menu__icon"></span><img src="<?=base_url();?>assets/images/svgs/happy.svg" class="side_menu_img svg-1" alt="image"></h2>
                   
                    <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-10"><span class="resp-arrow"></span><span class="side-menu__icon"></span><i class="ti-panel fs-20 side_menu_img svg-1"></i></h2>
                    <div class="<?php  if($page=='settings')echo'resp-tab-content-active ';?>  resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="side62">
                                                <h5 class="mt-3 mb-4">Management Settings</h5>
                                                <?php  if($this->login->mst_role=='0' || !empty($permission['Manage_general'])){?>
                                                <a href="<?=base_url('settings/website');?>" class="slide-item">Manage General </a>
                                          <?php }else if(empty($permission['Manage_general']) && $page2=='website'){
                                               redirect('dashboard');
                                                }
                                             if($this->login->mst_role=='0' || !empty($permission['manage_currency'])){?>
                                                <a href="<?=base_url('settings/currency');?>" class="slide-item">Manage Currency </a>
                                            <?php } else if(empty($permission['manage_currency']) && $page2=='currency'){
                                                    redirect('dashboard');
                                                     }

                                            if($this->login->mst_role=='0' || !empty($permission['manage_commission'])){?>
                                                <a href="<?=base_url('settings/commission');?>" class="slide-item">Manage Commission </a>
                                            <?php }else if(empty($permission['manage_commission']) && $page2=='commission'){
                                                    redirect('dashboard');
                                                     }
                                              if($this->login->mst_role=='0' || !empty($permission['manage_brand'])){?>
                                                <a href="<?=base_url('settings/brand');?>" class="slide-item">Manage Brand </a>
                                            <?php }else if(empty($permission['manage_brand']) && $page2=='brand'){
                                               redirect('dashboard');
                                                    }?>
                                                <div class="side-menu p-0">
                                                    <div class="slide submenu"> <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Manage Category</span><i class="angle fa fa-angle-down"></i></a>
                                                        <ul class="slide-menu submenu-list">
                                                            <?php  if($this->login->mst_role=='0' || !empty($permission['manage_category'])){?>
                                                            <li> <a href="<?=base_url('settings/category');?>" class="slide-item">Category</a> </li>
                                                        <?php } else if(empty($permission['manage_category']) && $page2=='category'){
                                                            redirect('dashboard');
                                                             }
                                                   if($this->login->mst_role=='0' || !empty($permission['sub_category'])){?>
                                                            <li> <a href="<?=base_url('settings/sub-category');?>" class="slide-item">Sub Category</a> </li>
                                                        <?php }
                                                        else if(empty($permission['sub_category']) && $page2=='sub-category'){
                                                    redirect('dashboard');
                                                     }
                                                 if($this->login->mst_role=='0' || !empty($permission['child_category'])){?>
                                                            <li> <a href="<?=base_url('settings/child-category');?>" class="slide-item">Child Category</a> </li>
                                                        <?php } else if(empty($permission['child_category']) && $page2=='child-category'){
                                                    redirect('dashboard');
                                                     }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="side-menu p-0">
                                                    <div class="slide submenu"> <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Manage location</span><i class="angle fa fa-angle-down"></i></a>
                                                        <ul class="slide-menu submenu-list">
                                                            <?php if($this->login->mst_role=='0' || !empty($permission['country'])){?>
                                                            <li> <a href="<?=base_url('settings/country');?>" class="slide-item">Country</a> </li>
                                                            <?php }else if(empty($permission['country']) && $page2=='country'){
                                                                redirect('dashboard');
                                                                 }
                                                  if($this->login->mst_role=='0' || !empty($permission['state'])){?>
                                                  <li> <a href="<?=base_url('settings/state');?>" class="slide-item">State</a> </li>
                                                  <?php } else if(empty($permission['state']) && $page2=='state'){
                                                    redirect('dashboard');
                                                     }
                                                  if($this->login->mst_role=='0' || !empty($permission['city'])){?>
                                                            <li> <a href="<?=base_url('settings/city');?>" class="slide-item">City</a> </li>
                                                     <?php }
                                                     else if(empty($permission['city']) && $page2=='city'){
                                                    redirect('dashboard');
                                                     }
                                                  if($this->login->mst_role=='0' || !empty($permission['zipcode'])){?>
                                                            <li> <a href="<?=base_url('settings/zipcode');?>" class="slide-item">Zip Code</a> </li>
                                                        <?php } else if(empty($permission['zipcode']) && $page2=='zipcode'){
                                                    redirect('dashboard');
                                                     }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php  if($this->login->mst_role=='0' || !empty($permission['manage_option'])){?>
                                                <a href="<?=base_url('settings/option');?>" class="slide-item">Manage Option </a>
                                          <?php } else if(empty($permission['manage_option']) && $page2=='option'){
                                            redirect('dashboard');
                                            }?>
                                               <div class="side-menu p-0">
    <div class="slide submenu"> <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Manage Tax</span><i class="angle fa fa-angle-down"></i></a>
        <ul class="slide-menu submenu-list">
            <?php if($this->login->mst_role=='0' || !empty($permission['manage_tax'])){?>
               <li> <a href="<?=base_url('settings/tax');?>" class="slide-item"> Tax</a> </li>
               <?php }else if(empty($permission['manage_tax']) && $page2=='tax'){
                redirect('dashboard');
                  }
                if($this->login->mst_role=='0' || !empty($permission['category_tax'])){?>
            <li> <a href="<?=base_url('settings/category-tax');?>" class="slide-item">Category Tax</a> </li>
          
          <?php }else if(empty($permission['category_tax']) && $page2=='category-tax'){
                redirect('dashboard');
                  }
          ?>
            
        </ul>
    </div>
</div>
                                                <div class="side-menu p-0">
                                                    <div class="slide submenu"> <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Manage Unit</span><i class="angle fa fa-angle-down"></i></a>
                                                        <ul class="slide-menu submenu-list">
                                                            <?php if($this->login->mst_role=='0' || !empty($permission['dimensions'])){?>
                                                            <li> <a href="<?=base_url('settings/dimensions-unit');?>" class="slide-item">Dimensions Unit</a> </li>
                                                            <?php }else if(empty($permission['dimensions']) && $page2=='dimensions-unit'){
                                                            redirect('dashboard');
                                                              }
                                                             if($this->login->mst_role=='0' || !empty($permission['weight'])){?>
                                                            <li> <a href="<?=base_url('settings/weight-unit');?>" class="slide-item">Weight Unit</a> </li>
                                                        <?php }else if(empty($permission['weight']) && $page2=='weight'){
                                                            redirect('dashboard');
                                                              }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <a href="<?=base_url('settings');?>" class="slide-item">Settings </a> -->
                                                 <a href="<?=base_url('settings/translate');?>" class="slide-item">Translate </a>
                                                 <!-- <a href="<?=base_url('settings/other');?>" class="slide-item">Settings </a>-->
                                               <!-- <?php  if($this->login->mst_role=='0' || !empty($permission['template'])){?>
                                                <a href="<?=base_url('settings/templates');?>" class="slide-item">Manage Email Templates </a>
                                             <?php }else if(empty($permission['template']) && $page2=='weight'){
                                                    redirect('templates');
                                                  }?> -->                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 789px; right: -2px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 48px;"></div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Sidemenu closed -->
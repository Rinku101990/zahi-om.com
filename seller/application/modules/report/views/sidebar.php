<div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	 <div class="dashboard_tab_button">
     <ul  class="flex-column dashboard-list">
 <li>
 <a href="<?=base_url('report');?>" class="nav-link <?php if($spage=='1')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><i class="icn shop">
  <svg class="svg">
   <use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-sales-report" href="<?=base_url()?>assets/svg/sprite.svg#dash-sales-report"></use>
                                </svg>
                            </i>
 </i> Sales Report </a></li>
 <li> 
 <a href="<?=base_url('report/performance');?>" class="nav-link <?php if($spage=='2')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-product-performance" href="<?=base_url()?>assets/svg/sprite.svg#dash-product-performance"></use>
</svg>
 </i>Products Performance Report   </a>
 </li>
  <li> 
 <a href="<?=base_url('report/inventory');?>" class="nav-link <?php if($spage=='3')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-product-inventory" href="<?=base_url()?>assets/svg/sprite.svg#dash-product-inventory"></use>
</svg>
 </i>Products Inventory</a>
 </li>

 <!--   <li> 
 <a href="<?=base_url('report/inventory-status');?>" class="nav-link <?php if($spage=='4')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-product-inventory-stock" href="<?=base_url()?>assets/svg/sprite.svg#dash-product-inventory-stock"></use>
</svg>
 </i> Products Inventory Stock Status</a>
 </li> -->
  <li> 
 <a href="<?=base_url('report/comment-reviews');?>" class="nav-link <?php if($spage=='5')echo'active';?>"><i class="fa fa-comments-o" aria-hidden="true"></i>Products Comments & Reviews</a>
 </li>


<li><a href="<?=base_url('login/logout');?>" data-toggle="tab" class="nav-link">
<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
                                       
                                    </ul>
                                </div>    
	                        </div>
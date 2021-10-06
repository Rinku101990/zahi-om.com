<div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	 <div class="dashboard_tab_button">
     <ul  class="flex-column dashboard-list">
 <li>
 <a href="<?=base_url('product');?>" class="nav-link <?php if($spage=='1')echo'active';?>"><i class="fa fa-th" aria-hidden="true"></i> Manage Products</a></li>
 <li> 
 		<li>
 <a href="<?=base_url('product/hot-products');?>" class="nav-link <?php if($spage=='6')echo'active';?>"><i class="fa fa-wpforms" aria-hidden="true"></i> hot Products</a></li>
 <li> 
 	<li>
 <a href="<?=base_url('product/featured');?>" class="nav-link <?php if($spage=='4')echo'active';?>"><i class="fa fa-wpforms" aria-hidden="true"></i> Featured Products</a></li>
 <li> 
 	<li>
 <a href="<?=base_url('product/trending');?>" class="nav-link <?php if($spage=='5')echo'active';?>"><i class="fa fa-twitch" aria-hidden="true"></i> Trending Products</a></li>
 <li> 
 <a href="<?=base_url('product/inventory');?>" class="nav-link <?php if($spage=='2')echo'active';?>"><i class="icn shop"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-inventory-update" href="<?=base_url()?>assets/svg/sprite.svg#dash-inventory-update"></use>
</svg>
 </i> Manage Inventory</a>
 </li>
 <li>
 <a href="<?=base_url('product/import');?>" class="nav-link <?php if($spage=='3')echo'active';?>"><i class="icn shop"><svg class="svg">
  <use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-import-export" href="<?=base_url()?>assets/svg/sprite.svg#dash-import-export"></use>
  </svg></i> Import Export Products</a>
 </li>

<li><a href="<?=base_url('login/logout');?>" data-toggle="tab" class="nav-link">
<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
                                       
                                    </ul>
                                </div>    
	                        </div>
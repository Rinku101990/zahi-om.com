<div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	 <div class="dashboard_tab_button">
     <ul  class="flex-column dashboard-list">
 <li>
 <a href="<?=base_url('setting/category-tax');?>" class="nav-link <?php if($spage=='1')echo'active';?>"><i class="icn shop"><svg class="svg">
   <use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-tax-category" href="<?=base_url()?>assets/svg/sprite.svg#dash-tax-category"></use>
    </svg>
  </i> Tax Category</a></li>
 <li> 
 <a href="<?=base_url('setting/category');?>" class="nav-link <?php if($spage=='2')echo'active';?>"><i class="fa fa-list-alt">
 </i> Category</a>
 </li>
<!--  <li>
 <a href="<?=base_url('setting/brand');?>" class="nav-link <?php if($spage=='3')echo'active';?>"><i class="fa fa-yelp"></i> Brand</a>
 </li> -->
 <li>
 <a href="<?=base_url('setting/option');?>" class="nav-link <?php if($spage=='4')echo'active';?>"><i class="icn shop"><svg class="svg">
 <use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-options" href="<?=base_url()?>assets/svg/sprite.svg#dash-options"></use>
                                </svg>
                            </i> Options</a>
 </li>

<li><a href="<?=base_url('login/logout');?>" data-toggle="tab" class="nav-link">
<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
                                       
                                    </ul>
                                </div>    
	                        </div>
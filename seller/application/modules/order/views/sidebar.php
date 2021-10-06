<div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	 <div class="dashboard_tab_button">
     <ul  class="flex-column dashboard-list">
 <li>
 <a href="<?=base_url('order');?>" class="nav-link <?php if($spage=='1')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><i class="icn shop"><svg class="svg">
                                    <use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-sales" href="<?=base_url()?>assets/svg/sprite.svg#dash-sales"></use>
                                </svg>
                            </i>
 </i> Orders </a></li>
 <li> 
 <a href="<?=base_url('order/cancel');?>" class="nav-link <?php if($spage=='2')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-cancellation-request" href="<?=base_url()?>assets/svg/sprite.svg#dash-cancellation-request"></use>
</svg>
 </i> Cancellation Requests   </a>
 </li>
<!--   <li> 
 <a href="<?php base_url('order/reutn');?>" class="nav-link <?php if($spage=='3')echo'active';?>"><i class="icn shop" style="vertical-align: text-top;"><svg class="svg">
<use xlink:href="<?=base_url()?>assets/svg/sprite.svg#dash-return-request" href="<?=base_url()?>assets/svg/sprite.svg#dash-return-request"></use>
</svg>
 </i> Return Orders Requests  </a>
 </li> -->


<li><a href="<?=base_url('login/logout');?>" data-toggle="tab" class="nav-link">
<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
                                       
                                    </ul>
                                </div>    
	                        </div>
<div class="col-sm-12 col-md-3 col-lg-3">
	                            <!-- Nav tabs -->
	 <div class="dashboard_tab_button">
     <ul  class="flex-column dashboard-list">
 <li>
 <a href="<?=base_url('profile');?>" class="nav-link <?php if(empty($this->uri->segment(2)))echo'active';?>"><i class="fa fa-user" aria-hidden="true"></i> My Account</a></li>
 <li> 
 <a href="<?=base_url('profile/messages');?>" class="nav-link <?php if($this->uri->segment(2)=='messages')echo'active';?>"><i class="fa fa-envelope" aria-hidden="true"></i> My Messages</a>
 </li>
 <li>
 <a href="<?=base_url('profile/credit');?>" class="nav-link <?php if($this->uri->segment(2)=='credit')echo'active';?>"><i class="fa fa-user" aria-hidden="true"></i> My Credits</a>
 </li>
<li>
<a href="<?=base_url('profile/change-password');?>" class="nav-link <?php if($this->uri->segment(2)=='change-password')echo'active';?>"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
<li><a href="<?=base_url('login/logout');?>" data-toggle="tab" class="nav-link">
<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</li>
                                       
                                    </ul>
                                </div>    
	                        </div>
<style type="text/css">
    .btn--fileupload input {
        opacity: 0;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        cursor: pointer;
        height: auto !important;
    }
    input[type="file"] {
        height: auto;
        padding: 8px 10px;
    }
</style>
<div class="col-lg-3 col-md-4 d-lg-block">
    <div class="sidebar sidebar--style-3 no-border stickyfill p-0">
        <div class="widget mb-0">
            <div class="widget-profile-box text-center p-3">
                <?php if(empty($this->customer->cust_profile)){?>
                    <div class="image" style="background-image:url('<?=base_url('uploads/customers/profile.png');?>')"></div>
                <?php }else{?>
                    <div class="image" style="background-image:url('<?=base_url('uploads/customers/').$this->customer->cust_profile;?>')"></div>
                <?php }?>
                <div class="name">
                    <?=$this->customer->cust_fname;?>
                    <?=$this->customer->cust_lname;?>
                </div>
                <form name="frmProfile" method="post" enctype="multipart/form-data" action="<?=base_url('account/profile_image');?>">
                    <span class="btn btn-styled btn-base-1 btn--sm btn--fileupload mt-1">
                        <input accept="image/*" type="file" name="cust_profile" class="btn btn-anim-primary w-100" onchange="this.form.submit()">
                        Change Profile   
                    </span>
                </form>
            </div>
            <div class="sidebar-widget-title py-3">
                <span>Menu</span>
            </div>
            <div class="widget-profile-menu py-3">
                <ul class="categories categories--style-3">
                    <li>
                        <a href="<?=base_url('account/my-profile');?>" class="<?php if($page=='2')echo'active';?>">
                            <i class="la la-user"></i>
                            <span class="category-name">
                           Manage profile
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('account/shipping-address');?>" class="<?php if($page=='5')echo'active';?>">
                            <i class="la la-truck"></i>
                            <span class="category-name">
                           Shipping Address </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('account/my-order');?>" class="<?php if($page=='3')echo'active';?>">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                                Purchase History 
                                <span style="color:green;margin-left: .0rem!important;"><strong>(New)</strong></span> 
                            </span>
                        </a>
                    </li>
                    <li>
                    <a href="<?=base_url('account/wishlist');?>" class="<?php if($page=='8')echo'active';?>">
                                        <i class="la la-heart-o"></i>
                                        <span class="category-name">
                            Wishlist
                        </span>
                                    </a>
                                </li>
                    <li>
                        <a href="<?=base_url('account/transactions');?>" class="<?php if($page=='6')echo'active';?>">
                            <i class="la la-money"></i>
                            <span class="category-name">
                                Transactions 
                            </span>
                        </a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="<?=base_url('account/track');?>" class="<?php if($page=='7')echo'active';?>">-->
                    <!--        <i class="fa fa-clock-o"></i>-->
                    <!--        <span class="category-name">-->
                    <!--            Track Orders -->
                    <!--        </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a href="<?=base_url('account/change-password');?>" class="<?php if($page=='4')echo'active';?>">
                            <i class="la la-key"></i>
                            <span class="category-name">
                                Change Password
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('account/logout');?>">
                            <i class="la la-sign-out"></i>
                            <span class="category-name">
                               Logout
                            </span>
                        </a>
                    </li>
                    
                    <!--<li>-->
                    <!--    <a href="javascript:void()" class="" onclick="logout()">-->
                    <!--        <i class="la la-sign-out"></i>-->
                    <!--        <span class="category-name">-->
                    <!--           Logout-->
                    <!--        </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<footer id="footer" class="footer">
   <div class="footer-top">
      <div class="container">
         <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(62);?>
                  </h4>
                  <ul class="footer-links">
                     <?php if(array_chunk(get_category(),7)[0]==TRUE){
                        foreach( array_chunk(get_category(),7)[0] as $vmnal){
                            ?>
                     <li><a href="<?=base_url('category/').encode($vmnal->cate_id).'/'.$vmnal->cate_slug;?>" title="<?=$vmnal->cate_name;?>">
                        <i class="fa fa-angle-double-right"></i> <?=$vmnal->cate_name;?>   </a>
                     </li>
                     <?php }}?>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <ul class="footer-links">
                     <?php
                        if(@array_chunk(get_category(),7)[1]==TRUE){
                        foreach( @array_chunk(get_category(),7)[1] as $vmnal1){
                        if($vmnal1->cate_id=='13'){
                        ?>
                     <li><a href="<?=base_url('make-your-own-design');?>" title="<?=$vmnal1->cate_name;?>">
                        <i class="fa fa-angle-double-right"></i> <?=$vmnal1->cate_name;?>   </a>
                     </li>
                     <?php }else{?>
                     <li><a href="<?=base_url('category/').encode($vmnal1->cate_id).'/'.$vmnal1->cate_slug;?>" title="<?=$vmnal1->cate_name;?>">
                        <i class="fa fa-angle-double-right"></i> <?=$vmnal1->cate_name;?>   </a>
                     </li>
                     <?php }}}?>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(19);?> 
                  </h4>
                  <ul class="footer-links">
                     <li><a href="<?=base_url('about-us');?>" title="International Shipping">
                        <i class="fa fa-angle-double-right"></i> <?=lang(32);?> </a>
                     </li>
                     <li><a href="<?=base_url('sales-contract');?>" title="Sales Contract">
                        <i class="fa fa-angle-double-right"></i> <?=lang(31);?> </a>
                     </li>
                     <!-- <li><a href="#" title="Career">
                        <i class="fa fa-angle-double-right"></i> Career</a>
                        </li>
                     <li><a href="<?=base_url('tracking-order');?>" title="Tracking Order">
                        <i class="fa fa-angle-double-right"></i> <?=lang(33);?> </a>
                     </li> -->
                     <li><a href="<?=base_url('return-policy');?>" title="Privacy Policy">
                        <i class="fa fa-angle-double-right"></i> <?=lang(34);?> </a>
                     </li>
                     <li><a href="<?=base_url('privacy-policy');?>" title="Privacy Policy">
                        <i class="fa fa-angle-double-right"></i> <?=lang(35);?> </a>
                     </li>
                     <li><a href="<?=base_url('term-and-conditions');?>" title="Term of Use">
                        <i class="fa fa-angle-double-right"></i> <?=lang(36);?> </a>
                     </li>
                     <li><a href="<?=base_url('faq');?>" title="faq">
                        <i class="fa fa-angle-double-right"></i> <?=lang(69);?> </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(18);?>
                  </h4>
                  <ul class="footer-links">
                     <li><a href="<?=base_url('seller');?>" title="Vendor Registration ">
                        <i class="fa fa-angle-double-right"></i> <?=lang(70);?> </a>
                     </li>
                     <?php if(empty($this->session->userdata('logged_in_customer'))){?>
                     <li><a href="javascript:void(0);" class="SignUp_Model" title="Register New Account">
                        <i class="fa fa-angle-double-right"></i> <?=lang(37);?>  </a>
                     </li>
                     <?php }else{?>
                     <li><a href="javascript:void(0);" class="" title="Register New Account">
                        <i class="fa fa-angle-double-right"></i> <?=lang(37);?>  </a>
                     </li>
                     <?php }?>
                     <li><a href="<?=base_url('account/my-profile');?>" title="My Profile">
                        <i class="fa fa-angle-double-right"></i> <?=lang(38);?> </a>
                     </li>
                     <li><a href="<?=base_url('account/my-order');?>" title="My Order">
                        <i class="fa fa-angle-double-right"></i> <?=lang(39);?> </a>
                     </li>
                     <li><a href="<?=base_url('account/shipping-address');?>" title="Shipping Address">
                        <i class="fa fa-angle-double-right"></i> <?=lang(40);?> </a>
                     </li>
                     <li><a href="<?=base_url('account/change-password');?>" title="Change Password">
                        <i class="fa fa-angle-double-right"></i> <?=lang(10);?> </a>
                     </li>
                     <li><a href="<?=base_url('cart');?>" title="Update Cart">
                        <i class="fa fa-angle-double-right"></i> <?=lang(41);?></a>
                     </li>
                     <!--<li><a href="<?=base_url('account/logout');?>" title="Logout">-->
                     <!--   <i class="fa fa-angle-double-right"></i> <?=lang(42);?> </a>-->
                     <!--</li>-->
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(17);?> 
                  </h4>
                  <!--<p style="margin-bottom: 5px;"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></p>-->
                  <p style="margin-bottom: 5px;"><a href="https://instagram.com/zahi.fashion/" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></p>
               </div>
            </div>
            <div class="col-lg-2 col-md-4">
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(21);?>
                  </h4>
                    <ul class="footer-links">
                        <li>
                            <a href="<?php echo site_url('/');?>" target="blank">
                                <img src="<?=base_url('uploads/webstore.png');?>" style="width: 160px;border: 1px solid #c19450;border-radius: 5px;">
                            </a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/in/app/zahi/id1567058098" target="blank">
                                <img src="<?=base_url('uploads/app-store.png');?>" style="width: 160px">
                            </a>
                        </li>
                        <li>
                            <a href="https://play.google.com/store/apps/details?id=com.zahi" target="blank">
                                <img src="<?=base_url('uploads/google-play.png');?>" style="width: 160px">
                            </a>
                        </li>
                    </ul>
               </div>
               <br>
               <div class="text-center text-md-left">
                  <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                     <?=lang(16);?>    
                  </h4>
                  <ul class="footer-links">
                     <!--<li>-->
                     <!--   <img src="<?=base_url('uploads/Layer-10.png');?>" style="width: 160px">-->
                     <!--</li>-->
                     <li>
                        <img src="<?=base_url('uploads/Layer-11.png');?>" style="width: 160px;margin-top: 10px">
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-bottom sct-color-3" style="/*background: #c19450;*/background-image: url('<?=base_url();?>assets/img/Footer-Pallet-1.jpg'); padding: 30px 0;background-size: cover;">
      <div class="container">
         <ul class="footerulli" align="center">
            <li><a href="#"><i class="fa fa-phone"></i> Sales : <?=$this->website->web_support_contact;?> </a></li>
            <!--<li><a href="#"><i class="fa fa-skype"></i> skype.account</a></li>-->
            <li><a href="#"><i class="fa fa-wechat"></i> Online Chat</a></li>
            <li><a href="#"><i class="fa fa-mobile"></i> SMS: <?=$this->website->web_support_contact;?></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> Email: info@zahi-om.com</a></li>
         </ul>
         <div class="row">
            <div class="col-md-12">
               <p align="center" style="color: #fff;font-size: 15px;">GET OUR LATEST STYLE UPDATES</p>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
               <?php $sub_msg=$this->session->flashdata('sub_msg');if($sub_msg){  ?>
               <div class="alert alert-<?php echo $sub_msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--text"><strong><?php echo $sub_msg['type'] ?></strong> <?php echo $sub_msg['message']; ?></span>
                  <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <?php }?>
               <div class="d-inline-block d-md-block" style="background: #fff;
                  ">
                  <form class="form-inline" method="POST" action="<?=base_url('subscribers');?>">
                     <input type="hidden" name="_token" value="gcfynLziNSnN2sHsw7OplgigYM3gdDafgjzGgTL8">
                     <div class="form-group mb-0" style="width: 85.5%;">
                        <input type="email" class="form-control" placeholder="<?=lang(45);?>" name="email" required="" style="
                           width: 100%;border-right: none;">
                     </div>
                     <button type="submit" class="btn btn-base-1 btn-icon-left" style="border-radius: 35px;  padding: 4px 6px;">
                     <?=lang(44);?>
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   <div class="footer-bottom py-3 sct-color-3">
      <div class="container">
         <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
            <div class="col-md-12">
               <div class="copyright text-center text-md-center">
                  <ul class="copy-links no-margin" style="list-style: none;">
                     <li style="color: #fff">
                        <?php echo $this->website->web_copy_right;?>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
      <div class="modal-content position-relative">
         <div class="c-preloader">
            <i class="fa fa-spin fa-spinner"></i>
         </div>
         <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         <div id="addToCart-modal-body">
         </div>
      </div>
   </div>
</div>
</div>
<style type="text/css">
   .login_form.form_register .row {
   margin-bottom: 13px;
   }
   .login_form.form_register .form-control {
   margin-bottom: 0px;
   }
</style>
<!--  Sign Up modal area start --> 
<!-- Modal -->
<div class="modal fade" id="SignUp_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-zoom" role="document">
      <div class="modal-content">
         <!--  <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Your Registration</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div> -->
         <div class="modal-body" style="padding: 0 1px;">
            <div class="row" style="margin: -2px;">
               <div class="col-lg-5 col-md-5 col-sm-12 hidden" style="border-right: 1px solid #bd9961;">
                  <br/>
                  <div class="login_title" align="center">
                     <h2 style="color: #bd9961">Create Account</h2>
                     <p style="">Sign up with your simple details.  </p>
                  </div>
                  <div class="modal_tab_img">
                     <img src="<?=base_url('assets/img/Email-Block-1.jpg');?>" alt="signup" class="img-responsive" />  
                  </div>
                  <div class="social-auth-links text-center ">
                     <p>- OR -</p>
                     <a href="javascript:void(0);" onclick="fbLogin();" id="fbLink" class="btn btn-block btn-primary" style="margin-bottom:3px !important">
                        <i class="fa fa-facebook mr-2"></i>
                        Sign up using Facebook
                     </a>
                     <a href="javascript:void(0);" id="my-signin2">
                        <i class="fa fa-google-plus mr-2"></i>
                        Sign up using Google+
                     </a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12" style="margin: 20px 0;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
                     border: 1px solid #ded6d6;padding: 4px 10px;">
                  <span aria-hidden="true">×</span>
                  </button>
                  <div class="modal_right" >
                     <div class="login_title">
                        <h2>Sign Up</h2>
                     </div>
                     <div class="login_form form_register  ">
                        <div id="SignupResponse"></div>
                        <form id="SignupForm" class="form-default ">
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-6">                         
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" name="fname" class="form-control fname" placeholder="Enter First Name">
                                    <span id="fname"></span>
                                 </div>
                                 <div class="col-6">
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" name="lname" class="form-control lname" placeholder="Enter Last Name">
                                    <span id="lname"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email"  name="email" class="form-control email"  placeholder="Enter Email Address">
                                    <span id="email"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-6">
                                    <i class="fa fa-phone input-icon"></i>
                                    <select name="phone_code" class="form-control phone_code" style="    padding-left: 25px;" >
                                       <option value="">Country Code</option>
                                       <?php if(country_code() == TRUE){
                                          foreach (country_code() as $cncval) {?>
                                       <option value="<?=$cncval->cnt_id;?>"><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
                                       <?php 
                                          }
                                          }?>
                                    </select>
                                    <span id="phone_code"></span>
                                 </div>
                                 <div class="col-6">
                                    <i class="fa fa-phone input-icon"></i>
                                    <input type="text" name="phone" class="form-control phone" placeholder="Enter Contact No. "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">
                                    <span id="phone"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-key input-icon"></i>         
                                    <input type="password"  name="password" class="form-control password" placeholder="Enter Password">
                                    <span id="password"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12" >
                                    <i class="fa fa-key input-icon"></i>
                                    <input type="password" name="password2" class="form-control password2" placeholder="Enter Confirm Password" >
                                    <span id="password2"></span>
                                 </div>
                              </div>
                           </div>
                            <div class="login_input" id="otp_name" style="display: none;">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-phone input-icon"></i>  
                                    <input type="number" name="otp" class="form-control otp_name" placeholder="Enter OTP ">       
                                   
                                    <span id="otp"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="filter_checkbox">
                              <input type="checkbox" id="checkbox"  style="height: 16px;width: 16px;">
                              <span class="checkmark" style="height: 18px;width:18px;"></span>
                              <label for="checkbox" style="margin-top: -5px;   vertical-align: middle;font-weight: 600;">By signing up I agree to all terms and conditions.</label>
                           </div>
                           <div class="row">
                              <div class="col-3">
                                 <div class="login_submit">
                                    <button type="button" class="btn btn-styled btn-base-1 SignUp_btn" url="<?=base_url();?>">Sign Up</button>
                                 </div>
                              </div>
                              <div class="col-9" >
                                 <p style="margin-top: 9px;margin-left: 4%;">Already have an account? <a  href="javascript:void(0);" class="SignIn_Model" style="color: #bd9961;" ><b>Sign in <i class="fa fa-arrow-right"></i></b></a></p>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Sign Up modal area end --> 
<!--  Sign Up modal area start --> 
<div class="modal fade" id="SignIn_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-zoom" role="document">
      <div class="modal-content">
         <div class="modal-body" style="padding: 0 1px;">
            <div class="row" style="margin: -2px;">
               <div class="col-lg-5 col-md-5 col-sm-12 hidden" style="border-right: 1px solid #bd9961;">
                  <br/>
                  <div class="login_title" align="center">
                     <h2 style="color: #bd9961">Sign In</h2>
                     <p style="">Sign in with your email address and password.  </p>
                  </div>
                  <div class="modal_tab_img">
                     <img src="<?=base_url('assets/img/Email-Block-1.jpg');?>" alt="signup" class="img-responsive" />  
                     
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12" style="margin: 20px 0;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
                     border: 1px solid #ded6d6;padding: 4px 10px;">
                  <span aria-hidden="true">×</span>
                  </button>
                  <div class="modal_right">
                     <div class="login_title">
                        <h2>Sign In</h2>
                     </div>
                     <div class="login_form form_register ">
                        <div id="SigninResponse"></div>
                        <form id="SigninForm" class="form-default ">
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email"  name="email" class="form-control cust_email"  placeholder="Enter Email Address">
                                    <span id="cust_email"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-key input-icon"></i>         
                                    <input type="password"  name="password" class="form-control cust_password" placeholder="Enter Password">
                                    <span id="cust_password"></span>
                                 </div>
                              </div>
                           </div>
                          <!--   <div class="login_input" id="otp_name" style="display: none;">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-phone input-icon"></i>  
                                    <input type="number" name="otp" class="form-control otp_name" placeholder="Enter OTP ">       
                                   
                                    <span id="otp"></span>
                                 </div>
                              </div>
                           </div> -->
                           <div class="row">
                              <div class="col-6">
                                 <div class="filter_checkbox">
                                    <input type="checkbox" id="foo_checkbox" style="height: 16px;width: 16px;">
                                    <span class="checkmark" style="height: 18px;width:18px;"></span>
                                    <label for="checkbox" style="margin-top: -5px;   vertical-align: middle;font-weight: 600;">Remember Me</label>
                                 </div>
                              </div>
                              <div class="col-6" style="margin-top: 0px;right: 4px;text-align: right;">
                                 <a href="javascript:void(0);" class="forgotpassword">Forgot Password?</a>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="login_submit">
                                    <button type="button" class="btn btn-styled btn-base-1 SignIn_btn" url="<?=base_url();?>">Sign In</button>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <br/>
                                 <p style="margin-top: -5px;">Don't have account yet? <a  href="javascript:void(0);" class="SignUp_Model" style="color: #bd9961;" ><b>New Register <i class="fa fa-arrow-right"></i></b></a></p>
                                 
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>     
<!-- Sign In modal area end --> 
<!--  Forgot Password modal area start --> 
<div class="modal fade" id="forgot_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-zoom" role="document">
      <div class="modal-content">
         <div class="modal-body" style="padding: 0 1px;">
            <div class="row" style="margin: -2px;">
               <div class="col-lg-5 col-md-5 col-sm-12 hidden" style="border-right: 1px solid #bd9961;">
                  <br/>
                  <div class="login_title" align="center">
                     <h2 style="color: #bd9961">Forgot Password</h2>
                     <p style="">Your Reset password has been sent email address  </p>
                  </div>
                  <div class="modal_tab_img">
                     <img src="<?=base_url('assets/img/Email-Block-1.jpg');?>" alt="signup" class="img-responsive" /> 
                     <br/>&nbsp;
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12" style="margin: 20px 0;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
                     border: 1px solid #ded6d6;padding: 4px 10px;">
                  <span aria-hidden="true">×</span>
                  </button>
                  <div class="modal_right">
                     <div class="login_title">
                        <h2>Forgot Password</h2>
                     </div>
                     <div class="login_form form_register ">
                        <div id="ForgotResponse"></div>
                        <form id="ForgotForm">
                           <div class="login_input">
                              <div class="row">
                                 <div class="col-12">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email"  name="for_email" class="form-control for_email"  placeholder="Enter Email Address">
                                    <span id="for_email"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <div class="login_submit">
                                    <button type="button" class="btn btn-styled btn-base-1  Forgot_btn" url="<?=base_url();?>">Sent</button>
                                 </div>
                              </div>
                              <div class="col-12" >
                                 <p style="margin-top: 9px;">Already have an account? <a  href="javascript:void(0);" class="SignIn_Model" style="color: #bd9961;" ><b>Sign in <i class="fa fa-arrow-right"></i></b></a></p>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

</div>     
<!-- Forgot Password modal area end --> 
<input type="hidden" id="site_url" name="site_url" value="<?php echo site_url();?>">
<input type="hidden" id="current_url" name="current_url" value="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
<!-- END: body-wrap -->
<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>
<!-- Core -->
<!-- Facebook Pixel Code -->
<script>
   !function(f,b,e,v,n,t,s)
   {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
   n.callMethod.apply(n,arguments):n.queue.push(arguments)};
   if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
   n.queue=[];t=b.createElement(e);t.async=!0;
   t.src=v;s=b.getElementsByTagName(e)[0];
   s.parentNode.insertBefore(t,s)}(window, document,'script',
   'https://connect.facebook.net/en_US/fbevents.js');
   fbq('init', '1883597361797364');
   fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
   src="https://www.facebook.com/tr?id=1883597361797364&ev=PageView&noscript=1"
   /></noscript>
<!-- End Facebook Pixel Code -->
<script src="<?php echo site_url('assets/');?>js/vendor/popper.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/vendor/bootstrap.min.js"></script>
<!-- Plugins: Sorted A-Z -->
<script src="<?php echo site_url('assets/');?>js/jquery.countdown.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/select2.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/nouislider.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/sweetalert2.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/slick.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/jquery.share.js"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5a3a33010c3a12001239df61&product=inline-share-buttons' async='async'></script>
<script type="text/javascript">
   function showFrontendAlert(type, message) {
       if (type == 'danger') {
           type = 'error';
       }
       swal({
           position: 'top-end',
           type: type,
           title: message,
           showConfirmButton: false,
           timer: 1500
       });
   }
</script>
<script src="<?php echo site_url('assets/');?>js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/jodit.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/xzoom.min.js"></script>
<script src="<?php echo site_url('assets/');?>/js/plugins.js"></script>
<!-- App JS -->
<script src="<?php echo site_url('assets/');?>js/active-shop.js"></script>
<script src="<?php echo site_url('assets/');?>js/main.js"></script>
<!-- <script src="<?php echo site_url('assets/');?>js/myCustomCheckOut.js"></script> -->
<script src="<?php echo site_url('assets/');?>js/lazysizes.min.js" async=""></script>
<style>
   /*#loading*/
   /*{*/
   /*text-align:center; */
   /*background: url('<?=base_url('assets/img/loader.gif');?>') no-repeat center; */
   /*height: 150px;*/
   /*}*/
</style>
<script>
//   $(document).ready(function(){
       
//       var page = 1;
//       var cpage = 0;
//         filter_data(1,0);   
   
       
       
//       function filter_data(page,cpage)
//       {  
//           if(cpage=='0'){   
//           $('.filter_data').html('<div id="loading" style="" ></div>');
//           }else{      
//             $('#loading1').html('<div id="loading" style="" ></div>');
//           }
//           var get_page=1;
//           var getpage=parseInt(cpage)+parseInt(get_page);
//           var action = 'fetch_data';     
//           var brand  = get_filter('brand');
//           var color  = get_filter('color');
//           var size   = get_filter('size');
//           var price = $('#amount').val();
//           var grade = $('#grade_list').val();        
//           var condition   = get_filter('condition');
//           var category   = '<?=@$p_category;?>';
//           var category2   = '<?=@$filter_categoty;?>';
//           var sub_category = '<?=@$p_scategory;?>';
//           var sub_category2 = '<?=@$filter_sub_categoty;?>';
//           var child_category = '<?=@$p_chcategory;?>';
//           var hot = '<?=@$p_hot;?>';
//           // var hot = '';
//           var featured = '';
//           var trending = '';
//           var eid = '<?=@$p_eid;?>';
//           var supplier = '';
//           var p_name = '';
//           var p_brand = '';
//           var p_cate = ''; 
//           var p_scate = ''; 
//           var p_child = ''; 
//           var newest_first = $('.newest_first').val();
//           $("#more").html('');
//           $.ajax({
//               url:"<?=base_url('home/product_data/');?>"+page+"/"+cpage,
//               method:"POST",
//               //dataType:"JSON",
//               data:{brand:brand,color:color,size:size,price:price,grade:grade,condition:condition,category:category,category2:category2,sub_category:sub_category,sub_category2:sub_category2,child_category:child_category,hot:hot,featured:featured,trending:trending,eid:eid,supplier:supplier,newest_first:newest_first,p_name:p_name,p_brand:p_brand,p_cate:p_cate,p_scate:p_scate,p_child:p_child},
//               success:function(data)
//               { if(cpage=='0'){            
//                 $(".filter_data").html(data); 
//                 if(data){}else{
//                      $(".filter_data").html('<div class="col-md-12"><img src="<?=base_url('assets/img/not-available.gif');?>" style="width: 55%; margin: 10% 25%;"></div>');
//                 //$(".filter_data").html('<div class="col-md-12"><div id="notfound"><div class="notfound"><div class="notfound-bg"><div></div><div></div><div></div></div><h1>oops!</h1><h2>Product Not Available</h2><p></p><p>We`re sorry! this page is currently unavailable, please try again later.</p></div></div></div>'); 
//                 }
//                 }else{
//                  $(".filter_data").append(data);
//                  $('#loading1').html('');  
//                  }
//                 if(data){          
//               $("#more").html(' <input type="hidden" class="btn btn-primary clickmore" value="'+getpage+'" >');
//                 }              
//               }
//           })
//       }
   
//       function get_filter(class_name)
//       { 
//         var filter = [];
//           $('.'+class_name+':checked').each(function(){
//               filter.push($(this).val());         
//           });
//           return filter;
//       }
   
//       $('.common_selector').click(function(){     
//           filter_data(1,0);   
//       });
   
//       $('.grade_large').click(function(){ 
//          $(this).addClass('active');
//          $('.grade_list').removeClass('active');
//          $('#grade_list').val($(this).attr('large'));          
//           filter_data(1,0);   
//       });
   
//       $('.grade_list').click(function(){  
//          $(this).addClass('active');
//          $('.grade_large').removeClass('active');
//          $('#grade_list').val($(this).attr('large'));          
//           filter_data(1,0);   
//       });
//       $('.newest_first').change(function(){       
//           filter_data(1,0);   
//       });
//         $('.clickmore1').click(function(){
//           var cpage       = $(this).val();        
//           filter_data(1,cpage);   
//           $(this).val();
//       });
       
//   $( "#slider-range" ).slider({
//          range: true,
//          min: 1,
//          max: <?=max_price();?>,
//          values: [ 1, <?=max_price();?> ],
//          slide: function( event, ui ) {
//           $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
//          },     
//          stop: function( event, ui ) {
//           $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
//           filter_data(1,0);   
//          }
//       });
//       $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
//          " - " + $( "#slider-range" ).slider( "values", 1 ) );
       
//      $(window).scroll(function() {
//           if($('.filter_data').scrollTop() + $('.filter_data').height() >= $('.filter_data').height()) {
//               var cpage       =  $('.clickmore').val();           
//               if(cpage){          
//               filter_data(page,cpage);
//               // $('.clickmore').val();       
//           }}
//       });
   
//   });
   
</script>
<script>
   $(document).ready(function(){
   
       $(document).on('mouseenter', '.rating', function(){
           var index = $(this).data('index');
           var business_id = $(this).data('business_id');
           remove_background(business_id);
           for(var count = 1; count <= index; count++)
           {
               $('#'+business_id+'-'+count).css('color', '#ffcc00');
               $('#rating').val(index);
           }
       });
   
       function remove_background(business_id)
       {
           for(var count = 1; count <= 5; count++)
           {
               $('#'+business_id+'-'+count).css('color', '#ccc');
           }
       }
     
   
   
   });
</script>
<script>
   function getVariantPrice(){}
   
   $(document).ready(function () {
   $('.navbar-light .dmenu').hover(function () {
       $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
   }, function () {
       $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
   });
   }); 
   
   $(document).ready(function() {
   $(".megamenu").on("click", function(e) {
       e.stopPropagation();
   });
   });
   
   $(".apply_coupon").click(function(){
   $("#coupon").toggle();
   });
   
</script>
</body>
</html>
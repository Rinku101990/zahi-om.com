<style type="text/css">
	h4.heading.heading-xs.strong-700.text-uppercase.mb-3 {
    font-size: 16px;
    font-weight: 500;
    color: #c39b5d;
}
ul.footerulli li a {
    color: #fff;
}
ul.footerulli li {
    padding: 10px 15px;
    list-style: none;
    display: inline-block;
}
.footer-bottom {
    padding: 1.5rem 0;
    background: #282d33;
}
.footer .footer-links > li > a {
    display: inline-block;
    padding: 0.15rem 0;
    /*font-size: 0.8rem;*/
    font-weight: 400;
    color: rgb(67 67 67);
}
</style>
	 <!-- FOOTER -->
        <footer id="footer" class="footer" style=" padding-top: 40px;border-top: 1px solid #eee;">
            <div class="footer-top" style="margin-bottom: 40px;">
                <div class="container">
                    <div class="row cols-xs-space cols-sm-space cols-md-space">

                        <div class="col-lg-2 col-md-4">
                            <div class="text-center text-md-left">
                                <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                                 <?=lang(62);?>

                                </h4>
                                <ul class="footer-links">
                                    <?php if(array_chunk(category_list(),7)[0]==TRUE){
                                foreach( array_chunk(category_list(),7)[0] as $vmnal){
                                    ?>
                                   <li><a href="<?=base_url('../category/').encode($vmnal->cate_id).'/'.$vmnal->cate_slug;?>" title="<?=$vmnal->cate_name;?>" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=$vmnal->cate_name;?>   </a>
                                    </li>
                                <?php }}?>
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <div class="text-center text-md-left">
                                <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                                  <?=lang(62);?>
                                </h4>
                                <ul class="footer-links">
                                     <?php if(@array_chunk(category_list(),7)[1]==TRUE){
                                foreach(@array_chunk(category_list(),7)[1] as $vmnal1){
                                    if($vmnal1->cate_slug=='Make-Your-Own-Design'){
                                    ?>
                                   <li><a href="<?=base_url('../make-your-own-design');?>" title="<?=$vmnal1->cate_name;?>" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=$vmnal1->cate_name;?>   </a>
                                    </li>
                                <?php }else{?>
                                    <li><a href="<?=base_url('../category/').encode($vmnal1->cate_id).'/'.$vmnal1->cate_slug;?>" title="<?=$vmnal1->cate_name;?>" target="_blank">
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
                                  <li><a href="<?=base_url('../about-us');?>" title="International Shipping" target="_blank">
                                     <i class="fa fa-angle-double-right"></i> <?=lang(32);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../sales-contract');?>" title="Sales Contract" target="_blank">
                                      <i class="fa fa-angle-double-right"></i> <?=lang(31);?> </a>
                                    </li>
                                    
                                    <!-- <li><a href="#" title="Career">
                                    <i class="fa fa-angle-double-right"></i> Career</a>
                                    </li> -->
                                    <li><a href="<?=base_url('../tracking-order');?>" title="Tracking Order" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=lang(33);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../return-policy');?>" title="Privacy Policy" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=lang(34);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../privacy-policy');?>" title="Privacy Policy" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=lang(35);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../term-and-conditions');?>" title="Term of Use" target="_blank">
                                   <i class="fa fa-angle-double-right"></i> <?=lang(36);?> </a>
                                    </li>
                                     <li><a href="<?=base_url('../faq');?>" title="faq">
                                   <i class="fa fa-angle-double-right" target="_blank"></i> <?=lang(69);?> </a>
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
                                      <?php if(empty($this->session->userdata('logged_in_customer'))){?>
                                    <li><a href="javascript:void(0);" class="SignUp_Model" title="Register New Account">
                                     <i class="fa fa-angle-double-right"></i> <?=lang(37);?>  </a>
                                    </li>
                                
                                 <?php }else{?>
                                    <li><a href="javascript:void(0);" class="" title="Register New Account">
                                     <i class="fa fa-angle-double-right"></i> <?=lang(37);?>  </a>
                                    </li>
                                <?php }?>
                                    
                                    <li><a href="<?=base_url('../account/my-profile');?>" title="My Profile" target="_blank">
                                      <i class="fa fa-angle-double-right"></i> <?=lang(38);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../account/my-order');?>" title="My Order" target="_blank">
                                     <i class="fa fa-angle-double-right" ></i> <?=lang(39);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../account/shipping-address');?>" title="Shipping Address" target="_blank">
                                   <i class="fa fa-angle-double-right"></i> <?=lang(40);?> </a>
                                    </li>
                                    <li><a href="<?=base_url('../account/change-password');?>" title="Change Password" target="_blank">
                                      <i class="fa fa-angle-double-right"></i> <?=lang(10);?> </a>
                                    </li>
                                    
                                    <li><a href="<?=base_url('../cart');?>" title="Update Cart" target="_blank">
                                    <i class="fa fa-angle-double-right"></i> <?=lang(41);?></a>
                                    </li>
                                    <li><a href="<?=base_url('../account/logout');?>" title="Logout" target="_blank">
                                   <i class="fa fa-angle-double-right"></i> <?=lang(42);?> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <div class="col-lg-2 col-md-4">
                            <div class="text-center text-md-left">
                                <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                                    <?=lang(17);?> 
                                </h4>
                               

                               <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-facebook"></i> Facebook</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-linkedin"></i> Linkedin</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-twitter"></i> Twitter</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-google-plus"></i> Google+</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-youtube"></i> Youtube</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-vimeo"></i> Vimeo</a></p>
                                <p style="margin-bottom: 5px;"><a href="#" style="color:#c19450"><i class="fa fa-pinterest"></i> Pinterest</a></p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="text-center text-md-left">
                                <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                                 <?=lang(21);?>

                                </h4>
                                <ul class="footer-links">
                                    <li>
                                       <img src="<?=base_url('../uploads/app.png');?>" style="width: 160px">
                                    </li>
                                    
                                </ul>
                            </div>
                            <br>
                            <div class="text-center text-md-left">
                                <h4 class="heading heading-xs strong-700 text-uppercase mb-3">
                                  <?=lang(16);?>    
                                </h4>
                                <ul class="footer-links">
                                    <li>
                                       <img src="<?=base_url('../uploads/Layer-10.png');?>" style="width: 160px">
                                    </li>
                                    <li>
                                       <img src="<?=base_url('../uploads/Layer-11.png');?>" style="width: 160px;margin-top: 10px">
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>

                        

                     
                    </div>
                </div>
            </div>
            <div class="footer-bottom sct-color-3" style="background: #c19450; padding: 30px 0;">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <p align="center" style="color: #fff;font-size: 15px;"><?=lang(43);?></p>
                        </div>
                    </div>
                    <ul class="footerulli" align="center">
                        <li><a href="#"><i class="fa fa-phone"></i> Sales : <?=$this->website->web_support_contact;?> </a></li>

                       
                          <li><a href="#"><i class="fa fa-skype"></i> skype.account</a></li>
                          <li><a href="#"><i class="fa fa-wechat"></i> Online Chat</a></li>
                          <li><a href="#"><i class="fa fa-mobile"></i> SMS: <?=$this->website->web_support_contact;?></a></li>
                          <li><a href="#"><i class="fa fa-envelope"></i> Email: info@zahi-om.com</a></li>
                    </ul>
                     
                           
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

		<!--footer area end-->
		
		<input type="hidden" name="site_url" id="site_url" value="<?=base_url();?>">
		
		 <input type="hidden" id="current_url" name="current_url" value="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
		
		<!-- all js here -->
        <script src="<?=base_url();?>assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?=base_url();?>assets/js/popper.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/js/plugins.js"></script>
        <script src="<?=base_url();?>assets/js/main.js"></script>
	<script src="<?=base_url();?>../admin/assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
	<script src="<?=base_url();?>../admin/assets/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>../admin/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url();?>../admin/assets/plugins/datatable/datatable.js"></script>
<script src="<?=base_url();?>../admin/assets/plugins/jquery-nice-select/js/jquery.nice-select.js"></script>
<script src="<?=base_url();?>../admin/assets/plugins/jquery-nice-select/js/nice-select.js"></script>
	   <script src="<?=base_url();?>../admin/assets/plugins/select2/select2.full.min.js"></script>
   <script src="<?=base_url();?>../admin/assets/plugins/multipleselect/multiple-select.js"></script>
   <script src="<?=base_url();?>../admin/assets/plugins/multipleselect/multi-select.js"></script>
    <script src="<?=base_url();?>../admin/assets/plugins/jqvmap/jquery.vmap.js"></script>
	<script src="<?=base_url();?>assets/js/custom_query.js"></script>
	<script src="<?=base_url();?>assets/js/product.js"></script>
		<script src="<?=base_url();?>../admin/assets/plugins/summernote/summernote-bs4.js"></script><script src="<?=base_url();?>../admin/assets/plugins/summernote/summernote.js"></script>
		<script src="<?=base_url();?>../admin/assets/plugins/date-picker/bootstrap-datepicker.min.js"></script>
		<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="<?=base_url();?>assets/js/customvalidation.js"></script>
<script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
<script>
$(document).ready(function() {
$('.select2').select2({
placeholder: 'Select your Serach'
});
});
</script>
  
<script type='text/javascript'>
$(function(){
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true
});  
});
 function slug_url(get,id){
            var  data=$.trim(get);
            var string = data.replace(/[^A-Z0-9]/ig, '-')
                            .replace(/\s+/g, '-') // collapse whitespace and replace by -
                            .replace(/-+/g, '-'); // collapse dashes;
            var finalvalue=string.toLowerCase();
            document.getElementById(id).value=finalvalue;
        }
          function selling_price(get,id){
            var  data=$.trim(get);           
            document.getElementById(id).value=data;
        }

</script>
    


    </body>
</html>

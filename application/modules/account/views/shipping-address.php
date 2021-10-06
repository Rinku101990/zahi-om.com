<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Shipping Address Zahi">
      <meta name="description" content="Shipping Address Zahi">
      <meta name="author" content="Shipping Address Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Shipping Address Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>





<style type="text/css">
  .short-description {
    background: rgba(242, 244, 248, 0.49) none repeat scroll 0 0;
    border: 1px solid rgba(204, 204, 204, 0.41);
    border-radius: 8px;
    margin: 15px 0;
    padding: 12px 23px;
    box-shadow: 0 0 6px rgba(193, 193, 193, 0.62);
}
p {
    margin-bottom: 10px;
}
</style>

<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Shipping Address</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Shipping Address</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>

<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
                      <?php $this->load->view('account/sidebar.php');?>
                     <div class="col-lg-9 col-md-8">
                       <div class="main-content">
                       <!-- Page title -->
                    
                         <div class="form-box bg-white">
                            <div class="form-box-title px-3 py-2">
                                 Shipping Address
                            </div>
                            <div class="form-box-content p-3">
                              <?php $msg=$this->session->flashdata('msg');  
    if($msg){  ?>
     
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
    <?php }?>
   
                                 <div class="row">
                                   <?php if(!empty($get_shippingAddress)){ ?>
                          <?php foreach($get_shippingAddress as $key=>$shippingAddress){?>
                                                <div class="col-md-6">
                                                    <div class="short-description" style="height: 240px">
                                                        <h4>
                                                            <label class="custom-control custom-radio" style="    padding-left: 0px;">
                                                                <input id="radioStacked3" name="shippingAddress" <?php if($shippingAddress->addressDefault=="yes"){echo "checked"; }?>  onchange='changeShipping(<?php echo $shippingAddress->fld_id;?>);' type="radio" value="<?php echo $shippingAddress->fld_id;?>" style="width: 16px;vertical-align: bottom; height: 20px;">
                                                              
                                                                <span class="custom-control-description" style="font-size: 1.0rem;"><?php echo $shippingAddress->shippingFirstName.' '.$shippingAddress->shippingLastName;?></span>
                                                                <p class="pull-right">
                                                                    <span class="badge badge-success"><?php echo $shippingAddress->addressType;?></span>
                                                                </p>
                                                            </label>
                                                        </h4>
                                                        <p>
                                                    <?php echo $shippingAddress->shippingAddress;?>
                                                    </p>
                                                    <p><b>Email</b>-
                                                        <?php echo $shippingAddress->shippingEmail;?>
                                                    </p>
                                                    <p><b>Mobile</b>-
                                                        <?php echo $shippingAddress->shippingNumber;?>
                                                    </p>
                                                    <p><b>Postal code</b>-
                                                        <?php /*echo pincode($shippingAddress->shippingPincode);*/ echo ($shippingAddress->shippingPincode)?>
                                                    </p>
                                                        <hr style="margin: 15px 0;">

  <a onclick="confirm('Are you sure want to remove this address!.')" class="btn pull-right"  href="<?php echo site_url('account/removeShipping/');?><?php echo $shippingAddress->fld_id; ?>" style="color:#fff;font-size:16px; height:36px;background: #c19450;" ><i class="fa fa-trash-o"></i></a>

 <a class="btn pull-right shipping_edit"  shipping_edit="<?php echo $shippingAddress->fld_id; ?>" url="<?=base_url();?>" href="javascript:void(0);" style="background: #c19450;color:#fff;font-size:16px; height:36px; margin-right: 1%;" ><i class="fa fa-edit"></i></a>
                                                    </div>
                                                </div>
                                            <?php } } ?> 


                                               <div class="col-md-12">
                                           <br/>
                                                        <a class="btn btn-theme-round btn-lg order-payment" data-toggle="modal" data-target=".bd-example-modal-lg" style="width: 100%;color:#fff; margin-bottom:0px;background:#c19450;padding: 8px 1px;font-size: 12px;"><i class="fa fa-plus-circle"></i> Add Shipping</a>
                                                    
                                        </div>
                               
                                  
                                 </div>
                                 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


        <!-- Modal -->
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <!--  class="modal-dialog modal-lg modal-dialog-centered" -->
                                    <div class="modal-dialog modal-lg add-shipping" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Shipping Address</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 2px;
    margin-top: 0; margin-right: 0px;">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="user-message"></div>
                                                <form id="formShippingAddress" method="post">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name <span class="required">*</span></label>
                                                                <input type="hidden" name="url" id="url" value="<?php echo base_url();?>">
                                                                <input class="form-control border-form-control" name="shippingFirstName" id="shipper_name" placeholder="First Name" type="text">
                                                                <span id="msgname" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingLastName" id="shipper_lname" placeholder="Last Name" type="text">
                                                                <span id="msglname" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Email Address <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingEmail" id="shipper_email" placeholder="Enter email address" type="email">
                                                                <span id="msgemail" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingNumber" id="shipper_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" placeholder="Enter mobile no" type="text">
                                                                <span id="msgphone" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Country <span class="required">*</span></label>
                                                                <select class="form-control Country" name="shippingCountry" id="shipper_country" url="<?=base_url();?>">
                                                                <option value="">Select</option>

                                                            <?php if($country==true){
                                                            foreach ($country as $cnt_value) {?>
                                                          <option value="<?= $cnt_value->cnt_id;?>"><?=$cnt_value->cnt_name;?></option>
                                                      <?php }}?>

                                                                </select>
                                                                <span id="msgcountry"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">State <span class="required">*</span></label>
                                                                <?php //print("<pre>".print_r($get_states,true)."</pre>");?>
                                                        <select class="form-control State" name="shippingState" id="shipper_state1"  url="<?=base_url();?>">
   <option value="">Select</option>
                                                                </select>
                                                                <span id="msgstate"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">City <span class="required"></span></label>
                                                                <select class="form-control City" name="shippingCity" id="shipper_city" url="<?=base_url();?>">  
                                                                       <option value="">Select</option>
                                                                </select>
                                                                  <span id="citylist"></span>
                                                                <span id="msgcity"></span>
                                                            </div>
                                                        </div>
                                                          <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Postal Code <span class="required"></span></label>
                                                                <!--  <select class="form-control Zip" name="shippingPincode" id="shipper_pincode" >  -->
                                                                <!--       <option value="">Select</option>-->
                                                                <!--</select>-->
                                                                 <input type="number" class="form-control " name="shippingPincode" id="shipper_pincode" />
                                                          
                                                                <span id="msgpincode"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Shipping Address <span class="required"></span></label>
                                                                <textarea class="form-control" name="shippingAddress" id="shipper_address" placeholder="Shipping Address"></textarea>
                                                                <span id="msgaddress"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                      
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Type of Address <span class="required">*</span></label>
                                                            <label class="custom-control " style=" padding-left: 0px;vertical-align: text-top;"> 
                                                                <input type="checkbox" name="addressDefault" value="yes" style="width: 34px; height: 20px;vertical-align: inherit;">
                                                                <span class="custom-control-description">Make this my default address</span>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Type of Address <span class="required">*</span></label>
                                                            <label class="custom-control custom-radio" style="padding-left: 0px;vertical-align: text-top;">
                                                                <input id="radioStacked1" name="addressType" id="addressType" type="radio" value="Home" checked="checked" style="width: 16px;vertical-align: text-top; height: 20px;vertical-align: bottom;">
                                                               
                                                                <span class="custom-control-description">Home</span>
                                                                &nbsp;&nbsp;
                                                                <input id="radioStacked2" name="addressType" id="addressType" type="radio" value="Office" style="width: 16px;vertical-align: text-top; height: 20px;">
                                                               
                                                                <span class="custom-control-description">Office/Commercial</span>
                                                            </label>
                                                            <span id="msgAddressType"></span>
                                                        </div>
                                                    </div>

                                                    <span id="responseShipping"></span>
                                                    <div class="col-md-3 pull-right">
                                                        <button type="button" class="btn btn-theme-round order-payment btnShippingAddress" onclick="saveShippingAddress()" style="background:#c19450;padding: 8px 25px;font-size: 12px;color: #fff;font-weight: 600;" id="btnSaveShippingAddress">SAVE ADDRESS</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>  



  <!-- Edit Shopping  Modal -->
  <div class="Edit_Shopping_Model modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
                                    <div class="modal-dialog modal-lg add-shipping" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Shipping Address</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 2px;
    margin-top: 0; margin-right: 0px;">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="user-message"></div>
<form id="EditformShippingAddress" action="<?=base_url('checkout/shipping_update');?>" method="post">
     <input type="hidden" name="get_current" value="account/shipping-address">
                                <input type="hidden" name="fldid" id="fldid">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name <span class="required">*</span></label>
                                                                <input type="hidden" name="url" id="url" value="<?php echo base_url();?>">
                                                                <input class="form-control border-form-control" name="shippingFirstName" id="shipper_name" placeholder="First Name" type="text">
                                                                <span id="msgname" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingLastName" id="shipper_lname" placeholder="Last Name" type="text">
                                                                <span id="msglname" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Email Address <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingEmail" id="shipper_email" placeholder="Enter email address" type="email">
                                                                <span id="msgemail" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingNumber" id="shipper_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" placeholder="Enter mobile no" type="text">
                                                                <span id="msgphone" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Country <span class="required">*</span></label>
                                                                <select class="form-control Country" name="shippingCountry" id="shipper_country" url="<?=base_url();?>">
                                                               

                                                                </select>
                                                                <span id="msgcountry"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">State <span class="required">*</span></label>
                                                                <?php //print("<pre>".print_r($get_states,true)."</pre>");?>
                                                        <select class="form-control State" name="shippingState" id="shipper_state1"  url="<?=base_url();?>">
                           </select>
                                                                <span id="msgstate"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">City <span class="required"></span></label>
                                                                <select class="form-control City" name="shippingCity" id="shipper_city" url="<?=base_url();?>">  
                                                                       
                                                                </select>
                                                                  <span id="citylist"></span>
                                                                <span id="msgcity"></span>
                                                            </div>
                                                        </div>
                                                          <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Postal Code <span class="required"></span></label>
                                                                <!--  <select class="form-control Zip" name="shippingPincode" id="shipper_pincode" >  -->
                                                                     
                                                                <!--</select>-->
                                                                 <input type="number" class="form-control " name="shippingPincode" id="shipper_pincode" />
                                                          
                                                                <span id="msgpincode"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Shipping Address <span class="required"></span></label>
                                                                <textarea class="form-control" name="shippingAddress" id="shipper_address" placeholder="Shipping Address"></textarea>
                                                                <span id="msgaddress"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                      
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Type of Address <span class="required">*</span></label>
                                                            <label class="custom-control " style=" padding-left: 0px;vertical-align: text-top;"> 
                                                                <span id="addressDefault"></span>
                                                                <span class="custom-control-description">Make this my default address</span>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Type of Address <span class="required">*</span></label>
                                                            <label class="custom-control custom-radio" style="padding-left: 0px;vertical-align: text-top;">
                                                               <span id="Address_Type"></span>
                                                            </label>
                                                            <span id="msgAddressType"></span>
                                                        </div>
                                                    </div>

                                                    <span id="responseShipping"></span>
                                                    <div class="col-md-3 pull-right">
                                                        <button type="submit" class="btn btn-theme-round order-payment " style="background:#c19450;padding: 8px 25px;font-size: 12px;color: #fff;font-weight: 600;">UPDATE ADDRESS</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="CHECKOUT ZAHI">
      <meta name="description" content="CHECKOUT ZAHI">
      <meta name="author" content="CHECKOUT ZAHI">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>CHECKOUT ZAHI</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>




<div id="page-content ">
      <div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">CHECKOUT</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Checkout</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="slice-xs sct-color-2 border-bottom ">
        <div class="container container-sm">
            <div class="row cols-delimited justify-content-center">
                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-shopping-cart"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon mb-0 c-gray-light" style="color: #c19450 !important;">
                            <i class="la la-truck"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping Address</h3>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-credit-card"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 gry-bg">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-8">
                    <!-- <form class="form-default" data-toggle="validator"> -->
                        <div class="card">
                            <div class="card-body">
                                <?php $reference = $this->session->userdata('logged_in_customer'); if(empty($reference)){ ?>
                                    <div class="col-md-3 mx-auto">
                                        <button type="button" class="btn btn-styled btn-base-1 SignIn_Model"><i class="fa fa-lock"></i> Login & Continue</button>
                                    </div>
                                <?php } ?>
                                
                                <table class="table-cart border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="product-image" style="font-size:18px !important;">Delivery Address</th>
                                            <th class="product-remove text-right">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg" class="pl-4"><i class="fa fa-plus"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($get_shippingAddress)){ ?>
                                        <?php foreach($get_shippingAddress as $key=>$shippingAddress){?>
                                        <tr class="cart-item">
                                            <td class="product-name" style="font-weight: normal !important;">
                                                <span class="pr-4 d-block">
                                                <input type="radio" id="78-color-0" name="shippingAddress" <?php if($shippingAddress->addressDefault=="yes"){echo "checked"; }?> onchange='changeShipping(<?php echo $shippingAddress->fld_id;?>);' value="<?php echo $shippingAddress->fld_id;?>">
                                                <label for="78-color-0" data-toggle="tooltip"></label>
                                                    <p style="margin-left: 16px !important;margin-top: -20px !important"><?php echo $shippingAddress->shippingFirstName.' '.$shippingAddress->shippingLastName."<br>";?>
                                                    <?php echo $shippingAddress->shippingAddress."<br>";?>
                                                    <?php //echo pincode($shippingAddress->shippingPincode); 
                                                    echo $shippingAddress->shippingPincode?></p>
                                                </span>
                                            </td>
                                            <td class="product-remove">
                                                <a <?php if($shippingAddress->addressDefault=="yes"){?>  <?php echo "disabled"; }else{?> href="<?php echo site_url('checkout/removeShipping/');?><?php echo $shippingAddress->fld_id; ?>" onclick="confirm('Are you sure want to remove this address!.')" <?php }?>  class="text-right pl-4 item_remove">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                               
                                <span id="shippingSelectionResponse"></span>


                            </div>
                        </div>

                        <div class="row align-items-center pt-4">
                            <div class="col-md-6">
                                <a href="<?php echo site_url('/');?>" class="link link--style-3">
                                   <i class="la la-mail-reply"></i> Return to shop
                                </a>
                            </div>
                            <?php $reference = $this->session->userdata('logged_in_customer'); if(!empty($reference)){ ?>
                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-styled btn-base-1 order-payment" onclick="makePaymentProcess()">Proceed to payment</button>
                            </div>
                            <?php } ?>
                        </div>
                        
                </div>

                <div class="col-xl-4 ml-lg-auto">
                    <div class="card sticky-top">
                        <div class="card-title">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="heading heading-3 strong-400 mb-0">
                                        <span>Summary</span>
                                    </h3>
                                </div>

                                <div class="col-6 text-right">
                                    <span class="badge badge-md badge-success"><?php if(empty($this->cart->contents())){ echo'0';}else{ echo count($this->cart->contents());} ?> Items</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <?php $total=0; if(!empty($this->cart->contents())){ foreach($this->cart->contents() as $items){ ?>
                                <?php $item_tax=$items['tax']*$items['subtotal']/100;?>
                                <?php $item_subtotal=$this->cart->format_number($items['subtotal']+$item_tax); 
                                    $total+=$items['subtotal']+$item_tax;?>
                            <?php } } ?>
                            <table class="table-cart table-cart-review">

                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td class="text-right">
                                            <span class="strong-600">
                                                <?=currency($this->website->web_currency);?>
                                                <?php if(!empty($this->cart->contents())){ echo $this->cart->format_number($total);}?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr class="cart-shipping">
                                        <?php  $gst_total=0; if($tax== true){ foreach ($tax as $tax_value) {?>
                                        <th>VAT(<?=$tax_value->txt_name;?>-<?=$this->cart->format_number($tax_value->txt_per);?>%)</th>
                                        <td class="text-right">
                                            <span class="text-italic">
                                                <?=currency($this->website->web_currency);?>
                                                <?php echo $gst=$this->cart->format_number($tax_value->txt_per*$total/100); $gst_total +=$tax_value->txt_per*$total/100;?>
                                            </span>
                                        </td>
                                        <?php } } ?>
                                    </tr>

                                    <tr class="cart-total">
                                        <th><span class="strong-600">Total</span></th>
                                        <td class="text-right">
                                            <strong>
                                                <span>
                                                    <?=currency($this->website->web_currency);?>
                                                    <?php if(!empty($this->cart->contents())){echo $this->cart->format_number($total+$gst_total);}?>
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg add-shipping" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Shipping Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 2px;margin-top: 0; margin-right: 0px;">
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
                                <input type="hidden" name="url" id="url" value="<?php echo site_url();?>">
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
                                <select class="form-control Country" name="shippingCountry" id="shipper_country" url="<?php echo site_url();?>">
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
                                <select class="form-control State" name="shippingState" id="shipper_state1" url="<?php echo site_url();?>">
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
                                <select class="form-control City" name="shippingCity" id="shipper_city" url="<?php echo site_url();?>">
                                    <option value="">Select</option>
                                </select>
                                <span id="citylist"></span>
                                <span id="msgcity"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Postal Code <span class="required"></span></label>
                                <!--<select class="form-control Zip" name="shippingPincode" id="shipper_pincode">-->
                                <!--    <option value="">Select</option>-->
                                <!--</select>-->
                                <input type="number" class="form-control" name="shippingPincode" id="shipper_pincode" />

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
                                <input type="checkbox" name="addressDefault" value="yes" style="width: 34px; height: 20px;">
                                <span class="custom-control-description">Make this my default address</span>
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Type of Address <span class="required">*</span></label>
                            <label class="custom-control custom-radio" style="padding-left: 0px;vertical-align: text-top;">
                                <input id="radioStacked1" name="addressType" id="addressType" type="radio" value="Home" checked="checked" style="width: 16px;vertical-align: text-top; height: 20px;">

                                <span class="custom-control-description">Home</span> &nbsp;&nbsp;
                                <input id="radioStacked2" name="addressType" id="addressType" type="radio" value="Office" style="width: 16px;vertical-align: text-top; height: 20px;">

                                <span class="custom-control-description">Office/Commercial</span>
                            </label>
                            <span id="msgAddressType"></span>
                        </div>
                    </div>

                    <span id="responseShipping"></span>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-styled btn-base-1 btnShippingAddress" onclick="saveShippingAddress()"  id="btnSaveShippingAddress">SAVE ADDRESS</button>
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
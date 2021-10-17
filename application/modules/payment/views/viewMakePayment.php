<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Payment Zahi">
      <meta name="description" content="Payment Zahi">
      <meta name="author" content="Payment Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
       <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Payment Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>



<div id="page-content">
    <div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Payment</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Payment</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="slice-xs sct-color-2 border-bottom  ">
        <div class="container container-sm">
            <div class="row cols-delimited justify-content-center">
                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-shopping-cart"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>                            
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-truck"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon mb-0">
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

    <section class="py-3 gry-bg">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-8">
                    <form action="javascript:void(0)" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
                        <input type="hidden" name="_token" value="Fquog2gaHriwG7oHe1HGziNThBzKM7ODv9ni9EH3">
                        <div class="card">
                            <div class="card-title px-4 py-3">
                                <h3 class="heading heading-5 strong-500">
                                    Select a Payment Option
                                </h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-xxl-6 col-lg-8 col-md-10 mx-auto">
                                        <div class="text-center bg-gray py-4">
                                            <button type="button" class="btn btn-base-2" disabled><?php echo $Address->shippingFirstName.' '.$Address->shippingLastName;?></button><br>
                                            <i class="fa"></i>
                                            <div class="h5 mb-4">
                                                <p>
                                                    <?php echo $Address->shippingAddress;?><br>
                                                    <?php echo $Address->City.','.$Address->State.','.$Address->Country;?>, <?php  /*echo pincode($Address->shippingPincode);*/ echo ($Address->shippingPincode);?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="or or--1 mt-2">
                                    <span>OR</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="row">
                                            <div class="col-3">&nbsp;</div>
                                            <div class="col-6">
                                                <input type="hidden" name="url" id="url" value="<?php echo base_url();?>">
                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="Thawani" data-original-title="" title="">
                                                    <input type="radio" name="paymentType" class="radioType" value="ONLINE" checked="checked">
                                                    <span>
                                                        <img loading="lazy" src="<?php echo site_url('assets/');?>images/icons/cards/online.jpeg" class="img-fluid">
                                                    </span>
                                                </label>
                                            </div>
                                            
                                           <!--  <div class="col-6">
                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="Cash on Delivery" data-original-title="" title="">
                                                    <input type="radio" name="paymentType" class="radioType" value="COD" checked="checked">
                                                    <span>
                                                        <img loading="lazy" src="<?php echo site_url('assets/');?>images/icons/cards/cashOnDelivery.png" class="img-fluid">
                                                    </span>
                                                </label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center pt-4">
                            <div class="col-6">
                                <a href="<?php echo site_url('/');?>" class="link link--style-3">
                                    <i class="la la-mail-reply"></i> Return to shop
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" onclick="placeOrder()" class="btn btn-styled btn-base-1">PAY NOW</button>
                            </div>
                        </div>
                    </form>
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
                            <?php $total=0; $get_ship=0;
                            if(!empty($this->cart->contents())){ foreach($this->cart->contents() as $items){ 
                             if(vndcountry($items['vnd'])==$Address->cnt_id){
                                   $get_ship+=0;
                                  }else{ $get_ship+=1;}    ?>
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
                                    
                                    <?php $gttotal=$total+$gst_total;
                                     if(empty($get_ship)){
                                    ?>
                                    
                                    <tr class="cart-shipping">
                                       
                                        <th>Delivery Charge</th>
                                        <td class="text-right">
                                            <span class="text-italic">
                                                <?php if($this->website->web_local_free_shipping >= $gttotal){ ?>
                                                <?=currency($this->website->web_currency);?>
                                                <?php echo $dl_charges=$this->cart->format_number($this->website->web_local_shipping);
                                                
                                                }else{  $dl_charges=0; echo'FREE';}?>
                                                
                                            </span>
                                        </td>
                                        
                                    </tr>
                                <?php }else{
                                    ?>
                                     <tr class="cart-shipping">
                                       
                                        <th>Delivery Charge</th>
                                        <td class="text-right">
                                            <span class="text-italic">
                                                <?=currency($this->website->web_currency);?>
                                                <?php echo $dl_charges=$this->cart->format_number($this->website->web_national_shipping); ?>
                                                
                                            </span>
                                        </td>
                                        
                                    </tr>

                                    <?php }  ?>
                                   
                                <!--    <php -->
                                <!--    //if(!empty(delivery_st_charge($Address->st_id)->min_amount)){-->
                                <!--     //if(delivery_st_charge($Address->st_id)->min_amount >=$gttotal){ ?>-->
                                <!--    <tr class="cart-shipping">-->
                                       
                                <!--        <th>Delivery Charge</th>-->
                                <!--        <td class="text-right">-->
                                <!--            <span class="text-italic">-->
                                <!--                <=currency($this->website->web_currency);?>-->
                                <!--                <php //echo $dl_charges=$this->cart->format_number(delivery_st_charge($Address->st_id)->amount); ?>-->
                                                
                                <!--            </span>-->
                                <!--        </td>-->
                                        
                                <!--    </tr>-->
                                <!--<php //} -->
                                <!-- .//}else if(delivery_ct_charge($Address->cnt_id)->min_amount >=$gttotal){?>-->
                                <!--     <tr class="cart-shipping">-->
                                       
                                <!--        <th>Delivery Charge</th>-->
                                <!--        <td class="text-right">-->
                                <!--            <span class="text-italic">-->
                                <!--                <=currency($this->website->web_currency);?>-->
                                <!--                <php //echo $dl_charges=$this->cart->format_number(delivery_ct_charge($Address->cnt_id)->amount); ?>-->
                                                
                                <!--            </span>-->
                                <!--        </td>-->
                                        
                                <!--    </tr>-->

                                <!--    <php// } else{$dl_charges='0';}   ?>-->
                                    <tr><td colspan="2"><a href="javascript:void(0);" class="text-primary apply_coupon" style="font-weight: 700; text-align:center;"><u>Apply Coupon</u></a> <div class="ResponseCouponApply"></div>
                            <div  id="coupon" style="padding-top: 10px;display: none">
                        <form id="CouponForm" class="row">                        
                        <div class="col-md-9 col-xs-8">
                        <input type="text" name="coupon_code" class="form-control couponCodeForPayment" placeholder="Enter Coupon Code" required="">
                         <input type="hidden" name="couponValueAfterMatched" class="form-control couponValueAfterMatched" value="0">
                        </div>
                        <div class="col-md-3 col-xs-4">
                         <button type="button" class="btn btn-defualt CouponApplyForPayment" style="line-height: 20px;" disabled="" >Apply</button>
                               </div>
                           </form>
                            </div>
                        </td>
                        </tr>


                                    <tr class="cart-total">
                                        <th><span class="strong-600">Total</span></th>
                                        <td class="text-right">
                                            <strong>
                                                <span>
                                                    <?=currency($this->website->web_currency);?>
                                                    <span class="CartTotalAmount" total="<?=$total+$gst_total+$dl_charges;?>"><?php if(!empty($this->cart->contents())){echo $this->cart->format_number($total+$gst_total+$dl_charges);}?></span>
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


            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
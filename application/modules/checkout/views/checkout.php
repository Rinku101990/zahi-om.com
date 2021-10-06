<style>
    .checkout-step {
        display: inline-block;
        width: 100%;
    }
    span.custom-control-description {
    font-size: 13px;
}
td.cart_product {
    width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    float: left;
}
.nice-select.form-control {
    display: none;
}
    
    .checkout-step ul {
        display: table;
        margin: 0 auto 25px;
        text-align: center;
    }
    
    .checkout-step ul li .step {
        float: left;
        margin-bottom: 10px;
        position: relative;
    }
    
    .checkout-step ul li:first-child .step .line {
        border-radius: 3px 0 0 3px;
        width: 155px;
    }
    
    .checkout-step ul li .step .line {
        background: #007bff none repeat scroll 0 0;
        float: left;
        height: 7px;
        margin: 12px -1px 12px 0;
        width: 155px;
    }
    .custom-checkbox.custom-control, .custom-radio.custom-control {
    min-height: auto;
}
.custom-control {
    position: relative;
    display: block;
    min-height: 1.5rem;
    padding-left: 1.5rem;
}
    
    .checkout-step ul li .step .circle {
        background: #007bff none repeat scroll 0 0;
        border-radius: 50%;
        color: #ffffff;
        display: inline-block;
        font-size: 16px;
        font-weight: 500;
        height: 32px;
        left: 50%;
        padding: 3px 11px;
        position: absolute;
        text-align: left;
        transform: translateX(-50%);
        width: 32px;
    }
    
    .checkout-step ul li span {
        color: #007bff;
        display: block;
        line-height: 20px;
        padding: 6px 15px 6px 6px;
    }
    
    .checkout-step ul li.active {
        color: #ffee00;
    }
    
    .checkout-step ul li {
        color: #ffee00;
        cursor: pointer;
        display: inline-block;
        font-size: 15px;
        margin: 0 -2px;
        text-align: center;
    }
    
    .checkout-step .active span {
        color: #dc3545;
    }
    input {
    height: 38px;
}
    
    .checkout-step ul li span {
        color: #007bff;
        display: block;
        line-height: 20px;
        padding: 6px 15px 6px 6px;
    }
    
    .checkout-step ul li.active .step .circle,
    .checkout-step ul li.active .step .line {
        background: #dc3545 none repeat scroll 0 0;
    }
    
    .checkout-step li.active+li .circle,
    .checkout-step li.active+li+li .circle,
    .checkout-step li.active+li+li+li .circle,
    .checkout-step li.active+li .line,
    .checkout-step li.active+li+li .line,
    .checkout-step li.active+li+li+li .line {
        background: #28a745 none repeat scroll 0 0;
    }
    
    .checkout-step ul li:last-child .step .line {
        background: #28a745 none repeat scroll 0 0;
        border-radius: 0 3px 3px 0;
        width: 155px;
    }
    
    .widget {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 0 6px rgba(193, 193, 193, 0.62);
        display: inline-block;
        padding: 20px;
        position: relative;
        width: 100%;
    }
    
    .mx-auto {
        margin-right: auto!important;
        margin-left: auto!important;
    }
    
    .heading-design-center-h3 {
        font-size: 20px;
        font-weight: 600;
        margin: 0 0 30px;
        position: relative;
        text-transform: uppercase;
    }
    
    .heading-design-center-h3::after {
        background: rgba(0, 0, 0, 0) linear-gradient(to right, #007bff 0%, #005ec2 100%) repeat scroll 0 0;
        border-radius: 12px;
        content: "";
        height: 3px;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        bottom: -16px;
        width: 49px;
    }
    
    .btn {
        font-weight: 600;
        text-transform: uppercase;
        box-shadow: 0 0 10px rgba(69, 102, 173, 0.23);
        border-radius: 3px;
        font-size: 13px;
        transition: all 0.45s cubic-bezier(0.165, 0.84, 0.44, 1) 0s;
    }
    
    h3 {
        font-size: 18px;
        line-height: 24px;
    }
    
    .short-description {
        background: rgba(242, 244, 248, 0.49) none repeat scroll 0 0;
        border: 1px solid rgba(204, 204, 204, 0.41);
        border-radius: 8px;
        margin: 15px 0;
        padding: 12px 23px;
        box-shadow: 0 0 6px rgba(193, 193, 193, 0.62);
    }
    
    .badge {
        border-radius: 3px;
    }
    
    .badge-success {
        color: #fff;
        background-color: #28a745;
    }
    
    .short-description p {
        margin: 9px 0;
    }
    
    p {
        color: #7E7E7E;
        font-size: 12px;
        font-weight: 500;
        line-height: 12px;
    }
    
    .text-center {
        text-align: center!important;
    }
    
    ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
    
    a {
        transition: all 0.3s ease 0s;
        text-decoration: none;
        color: #4c4c4c;
    }
    
    .btn-theme-round:hover,
    .btn-theme-round:focus {
        background: #005ec2;
        background: -moz-linear-gradient(left, #005ec2 0%, #007bff 100%);
        background: -webkit-linear-gradient(left, #005ec2 0%, #007bff 100%);
        background: linear-gradient(to right, #005ec2 0%, #007bff 100%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#005ec2', endColorstr='#007bff', GradientType=1);
    }
    
    .btn-theme-round {
        background: #007bff;
        background: -moz-linear-gradient(left, #e40046 0%, #e40046 100%);
        background: -webkit-linear-gradient(left, #e40046 0%, #e40046 100%);
        background: linear-gradient(to right, #e40046 0%, #e40046 100%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#007bff', endColorstr='#005ec2', GradientType=1);
        border-radius: 3px;
        color: #fff!important;
        font-weight: 600;
        text-transform: uppercase;
        /* box-shadow: 0 0 23px rgba(69, 102, 173, 0.23); */
    }
    
    hr {
        border: 0;
        clear: both;
        display: block;
        width: 96%;
        background-color: #c5cce0;
        height: 1px;
    }
.order-payment  {
    background: #a0c03c;
    border: medium none;
    color: #ffffff;
    font-size: 17px;
    font-weight: 600;
    height: 40px;
    margin: 20px 0 0;
    padding: 0;
    text-transform: uppercase;
    transition: all 0.5s ease 0s;
    width: 100%;
}
</style>
<div class="breadcrumbs_area contact_bread">
        </div>
        
        <section class="main_content_area my_account white">
                <div class="container">
                    <div class="account_dashboard">
                        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="breadcrumb_content" style="margin-bottom:10px">
             <div class="breadcrumb_header">
      <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
       <span><i class="fa fa-angle-right"></i></span>
                                <span>Checkout </span>                                
                            </div>
                            <div class="breadcrumb_title">
                                <h2>Checkout</h2>
                            </div>
                         
                            
                        </div>
                        </div>
                   
                     <div class="col-12">


                               <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-space">
            <div class="main-container mb-50">
                <section class="shopping_cart_page">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="checkout-step mb-40">
                                    <ul>
                  <?php $reference = $this->session->userdata('logged_in_customer'); if(empty($reference)){ ?>
                                        <li class="active">
                                            <a href="javascript:void(0)">
                                                <div class="step">
                                                    <div class="line"></div>
                                                    <div class="circle">1</div>
                                                </div>
                                                <span>My Account</span>
                                            </a>
                                        </li>
                                        <?php }else{ ?>
                                        <li class="active">
                                            <a href="javascript:void(0)">
                                                <div class="step">
                                                    <div class="line"></div>
                                                    <div class="circle">1</div>
                                                </div>
                                                <span>Shipping Address</span>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="step">
                                                    <div class="line" style="background: #868e96"></div>
                                                    <div class="circle" style="background: #868e96">2</div>
                                                </div>
                                                <span style="color:#868e96;">Payment Method</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="step">
                                                    <div class="line" style="background: #868e96"></div>
                                                    <div class="circle" style="background: #868e96">3</div>
                                                </div>
                                                <span style="color:#868e96;">Order Complete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 mx-auto">
                                
                                <?php $reference = $this->session->userdata('logged_in_customer'); if(empty($reference)){ ?>
                                <div class="widget">
                                    <div class="section-header section-header-center text-center">
                                        <h3 class="heading-design-center-h3">
                                        Login to your account
                                        </h3>
                                    </div>
                                    <div class="col-lg-8 col-md-8 text-center col-md-offset-2">
                                            <div class="row">

                                 <div class="col-lg-11 col-md-11">
                                    <div class="col-md-4 pull-right">
                                         <a href="javascript:void(0);" class="btn btn-theme-round btn-lg order-payment SignIn_Model" style="color:#fff; margin-bottom:0px;background:#dc3545;padding: 3px 1px;font-size: 12px;"><i class="fa fa-user"></i> Sign In</a>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div> 
                                <?php }else{ ?>
                                <div class="widget">
                                    <div class="section-header section-header-center text-center">
                                        <h3 class="heading-design-center-h3">Shipping Address</h3>
                                        <span id="shippingSelectionResponse"></span>
                                    </div>
                                    <div class="shipping-message"></div>
                                    <form action="javascript:void(0)" method="post">
                                        <div class="col-md-12">
                                            <div class="row">
                                            <?php if(!empty($get_shippingAddress)){ ?>
                                            <?php foreach($get_shippingAddress as $key=>$shippingAddress){?>
                                                <div class="col-md-6">
                                                    <div class="short-description" style="height: 220px">
                                                        <h4>
                                                            <label class="custom-control custom-radio" style="padding-left: 0px;">
                                                                <input id="radioStacked3" name="shippingAddress" <?php if($shippingAddress->addressDefault=="yes"){echo "checked"; }?>  onchange='changeShipping(<?php echo $shippingAddress->fld_id;?>);' type="radio" value="<?php echo $shippingAddress->fld_id;?>" style="width: 16px;vertical-align: text-top; height: 20px;">
                                                                
                                             <span class="custom-control-description" style="padding-left: 10px;font-size: 15px;font-weight: 600;"><?php echo $shippingAddress->shippingFirstName.' '.$shippingAddress->shippingLastName;?></span>
                                                                <p class="pull-right" style=" margin: 5px 0;">
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
                                                    <p><b>Pincode</b>-
                                                        <?php echo pincode($shippingAddress->shippingPincode);?>
                                                    </p>
                                                        <hr style="margin: 20px 0;">
                                                        <a onclick="confirm('Are you sure want to remove this address!.')" class="btn pull-right" <?php if($shippingAddress->addressDefault=="yes"){?>  <?php echo "disabled"; }else{?> href="<?php echo site_url('checkout/removeShipping/');?><?php echo $shippingAddress->fld_id; ?>"<?php }?> style="color:#fff;font-size:16px"><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                </div>
                                            <?php } } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-theme-round btn-lg order-payment" data-toggle="modal" data-target=".bd-example-modal-lg" style="color:#fff; margin-bottom:0px;background:#007bff;padding: 3px 1px;font-size: 12px;"><i class="fa fa-plus-circle"></i> Add Shipping</a>
                                                    </div>
                                                </div>

                                                <?php if($get_shippingAddress > 1){ ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="col-md-6 pull-right">
                                                        <button type="button" class="btn btn-theme-round btn-lg order-payment" onclick="makePaymentProcess()" style="color:#fff; margin-bottom:0px;background:#e40046 !important;padding: 3px 1px;font-size: 12px;">Make Payment >> </button>
                                                    </div>
                                                </div>
                                                <?php }else{ ?>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <?php } ?>

                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md add-shipping" role="document">
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
                                                                <input class="form-control border-form-control" name="shippingFirstName" id="shipper_name" placeholder="Manish" type="text">
                                                                <span id="msgname" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name <span class="required">*</span></label>
                                                                <input class="form-control border-form-control" name="shippingLastName" id="shipper_lname" placeholder="Kumar" type="text">
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
                                                                <label class="control-label">City <span class="required">*</span></label>
                                                                <select class="form-control City" name="shippingCity" id="shipper_city" url="<?=base_url();?>">  
                                                                       <option value="">Select</option>
                                                                </select>
                                                                  <span id="citylist"></span>
                                                                <span id="msgcity"></span>
                                                            </div>
                                                        </div>
                                                          <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Pin Code <span class="required">*</span></label>
                                                                  <select class="form-control Zip" name="shippingPincode" id="shipper_pincode" >  
                                                                       <option value="">Select</option>
                                                                </select>
                                                          
                                                                <span id="msgpincode"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Shipping Address <span class="required">*</span></label>
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
                                                        <button type="button" class="btn btn-theme-round order-payment btnShippingAddress" onclick="saveShippingAddress()" style="background:#007bff;padding: 3px 1px;font-size: 12px;" onclick="SaveShippingAddress()" id="btnSaveShippingAddress">SAVE ADDRESS</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4 col-md-5">
                                <div class="widget">
                                    <div class="section-header">
                                        <h3 class="heading-design-h5"><b>Order Overview</b></h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table cart_summary">
                                            <thead style="background-color: rgba(102, 102, 102, 0.06);">
                                                <tr>
                                                    <th class="cart_product">Product</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $total=0;$gsttotal=0; if($this->cart->contents() != ""){ foreach($this->cart->contents() as $cart){ ?>
                                                <tr>
                                                    <td class="cart_product"><?=$cart['name']?></td>
                                                    <td class="qty"><?=$cart['qty']?></td> 
                                                    <td class="price new_price"><span><?=currency($this->website->web_currency);?> <?php $item_tax=$cart['subtotal']*$cart['tax']/100; echo $this->cart->format_number($item_tax+$cart['subtotal']); $total +=$item_tax+$cart['subtotal']; ?> </span></td>
                                                </tr>
                                            <?php } } ?>
                                            </tbody>
                                            <tfoot style="background-color: rgba(102, 102, 102, 0.06);">
                                                <tr>
                                                    <td colspan="2">Delivery Charges</td>
                                                    <td colspan="2" class="new_price"><?php if(delivery()->min_value >=$total){?><?=currency($this->website->web_currency);?> <?php  echo $this->cart->format_number(delivery()->min_value); $dl_charge=delivery()->min_value;}else{echo'Free'; $dl_charge='0';}?></td>
                                                </tr>
                                                <?php $gst=0; if($tax==TRUE){
                                                    foreach($tax as $tx_value){?>
                                                <tr>
                                                    <td colspan="2"><?php echo $tx_value->txt_name.' ('.number_format($tx_value->txt_per).'%)';?></td>
                                                    <td colspan="2" class="new_price"><?=currency($this->website->web_currency);?> <?php echo $this->cart->format_number($tx_value->txt_per*$total/100); $gst +=$tx_value->txt_per*$total/100;?></td>
                                                </tr>
                                                    <?php }}?>
                                                <tr>
                                                    <td colspan="2"><strong>Total(With:<?php echo $tax[0]->txt_name;?>)</strong></td>
                                                    <td colspan="2" class="new_price"><?=currency($this->website->web_currency);?> <strong><?=$this->cart->format_number($gst+$total+$dl_charge);?> </strong></td>
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
        </div>
        <!-- checkout main wrapper end -->
                          
                         </div>

                    
                    </div>
                        </div>
                    </div>
                </div>          
            </section>
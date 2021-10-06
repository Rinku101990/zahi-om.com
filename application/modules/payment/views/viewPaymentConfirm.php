<div id="page-content">

    <section class="slice-xs sct-color-2 border-bottom">
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
                    
                    <div class="card">
                        <div class="card-title px-4 py-3">
                            <h3 class="heading heading-5 strong-500">
                                Payment Confirmation
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
                                                <?php echo $Address->City.','.$Address->State.','.$Address->Country;?>, <?php echo pincode($Address->shippingPincode);?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="or or--1 mt-2">
                                <span>OR</span>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header"><b>Payable Amount</b></div>
                                                <div class="card-body">
                                                    <div class="card-text">
                                                        <strong style="float:left">Payable Amount</strong>
                                                        <p style="float:right"><i class="fa fa-rupee"></i>
                                                            <?php if($get_order_details->ord_coupon_code != NULL) echo $this->cart->format_number($get_order_details->ord_adj_amount); else echo $this->cart->format_number($get_order_details->ord_total_amounts); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ONLINE PAYMENT GATEWAY PARAMETER -->
                                            <form action="<?php echo $order['action']; ?>/_payment" method="post" id="payuForm" name="payuForm" >
                                                <input type="hidden" name="key" value="<?php echo $order['mkey']; ?>" />
                                                <input type="hidden" name="hash" value="<?php echo $order['hash']; ?>"/>
                                                <input type="hidden" name="txnid" value="<?php echo $order['tid']; ?>" />
                                                <input type="hidden" name="amount" value="<?php echo $order['amount']; ?>" />
                                                <input type="hidden" name="firstname" id="firstname" value="<?php echo $order['name']; ?>"/>
                                                <input type="hidden" name="email" id="email" value="<?php echo $order['mailid']; ?>"/>
                                                <input type="hidden" name="phone" value="<?php echo $order['phoneno']; ?>" />
                                                <input type="hidden" name="productinfo" value="<?php echo $order['productinfo']; ?>" />
                                                <input type="hidden" name="address1" value="<?php echo $order['address']; ?>">  
                                                <input name="surl" value="<?php echo $order['sucess']; ?>"  type="hidden" />
                                                <input name="furl" value="<?php echo $order['failure']; ?>"  type="hidden" />  
                                                <!--for test environment comment  service provider   -->
                                                <input type="hidden" name="service_provider" value="payu_paisa"  />
                                                <input name="curl" value="<?php echo $order['cancel']; ?> " type="hidden" />
                                                
                                            
                                            <!-- END OF THE ONLINE PAYMENT GATEWAYS PARAMERE -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center pt-4">
                        <div class="col-6">
                            <a href="<?php echo site_url('/');?>" class="link link--style-3">
                                <i class="ion-android-arrow-back"></i> Return to shop
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-styled btn-base-1 order-payment">PAYMENT CONFIRMATION</button>
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
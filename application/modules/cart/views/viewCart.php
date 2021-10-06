<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Cart">
      <meta name="description" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Cart, Buy Dresses, Shoes, Clothes, Bags, beauty products, perfumes & more">
      <meta name="author" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Cart">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
     <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Zahi Om: Online Shopping Portal in Oman for Women’s, Cart</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>



    <div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">SHOPPING CART</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Shopping Cart</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="slice-xs sct-color-2 border-bottom">
    <div class="container container-sm">
        <div class="row cols-delimited justify-content-center">
            <div class="col-4">
                <div class="icon-block icon-block--style-1-v5 text-center active">
                    <div class="block-icon mb-0">
                        <i class="la la-shopping-cart"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="icon-block icon-block--style-1-v5 text-center">
                    <div class="block-icon c-gray-light mb-0">
                        <i class="la la-truck"></i>
                    </div>
                    <div class="block-content d-none d-md-block">
                        <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>
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

<section class="py-4 gry-bg" id="cart-summary">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space" id="cart_details">
            
            <div class="col-xl-12">
                <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
                <div class="form-default bg-white p-4">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table-cart table border-bottom">
                                <thead>
                                    <tr>
                                        <th class="product-image"></th>
                                        <?php if(empty($this->session->userdata('sleeve'))){?>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Color</th>
                                        <th class="product-price">Size</th>
                                             
                                        <th class="product-price">Dimensions</th>
                                      
                                        <?php }else{?>
                                        <th class="product-name">Sleeve</th>
                                        <th class="product-price">Fabric</th>
                                        <th class="product-price">Color</th>
                                        <th class="product-price">Size</th>
                                        <?php }?>
                                        <th class="product-price d-lg-table-cell">Price</th>
                                        <th class="product-quanity d-md-table-cell">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; 
                                        if(!empty($this->cart->contents())){ 
                                            foreach ($this->cart->contents() as $items) { ?>
                                    <tr class="cart-item">
                                        <input type="hidden" class="rowid" value="<?=$items['rowid'];?>">
                                        <td class="product-image">
                                            <a href="<?=$items['product_url'];?>" target="_blank" class="mr-3">
                                                <img loading="lazy" src="<?=$items['img'];?>" alt="<?=decode($items['name']);?>" style="object-fit: cover;height: 77px;width:100%">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <span class="pr-4 d-block">
                                                <?=decode($items['name']);?>
                                                <!-- <?php $item_tax=$items['tax']*$items['subtotal']/100;?>
                                                <?php echo "Tax: ".currency($this->website->web_currency).''.$item_tax;?> -->
                                            </span>
                                        </td>

                                         <?php if(empty($this->session->userdata('sleeve'))){?>

                                        <td class="product-name1">
                                            <span class="pr-4 d-block">
                                                
                                                <?=$items['color'];?> 
                                               
                                            </span>
                                        </td>

                                        <td class="product-name1">
                                            <span class="pr-4 d-block">
                                                
                                                <?php if($items['size']!='Select Size'){ echo $items['size'];}?><br>
                                               
                                            </span>
                                        </td>
                                        
                                          <td class="product-image">
                                            
                                            <p style=" font-size: 12px;font-weight: 600;">
              <?php echo unserialize($items['serialize']);?>

                                       </p>
                                             
                                        </td>
                                   

                                        <td class="product-price d-lg-table-cell">
                                            <span class="pr-3 d-block">
                                                <?php if(!empty($items['special_price'])){?>
                                                    <?=currency($this->website->web_currency);?><?=$this->cart->format_number($items['special_price']);?>
                                                <?php }else{ ?>
                                                    <?=currency($this->website->web_currency);?>
                                                    <?=$this->cart->format_number($items['selling_price']);?>
                                                <?php } ?>
                                            </span>
                                        </td>
                                    <?php }else{?>
                                       
                                        <td class="product-image"><a > <img loading="lazy" src="<?=$items['fb_img'];?>" alt="<?=decode($items['fb_name']);?>" style="object-fit: cover;height: 77px;width:100%"></a>
                                            </td>
                                        <td class="product-image"> <a><img loading="lazy" src="<?=$items['cl_img'];?>" alt="<?=decode($items['cl_name']);?>" style="object-fit: cover;height: 77px;width:100%"></a>
                                        </td>
                                         <td class="product-image"><p style="
    font-size: 12px;font-weight: 600;">
                                         Shoulder :  <?=$items['sz_shoulder'];?> Inch<br/>
                                                  Bust :  <?=$items['sz_bust'];?> Inch<br/>
                                                  Waist :  <?=$items['sz_waist'];?> Inch<br/>
                                                  Hips :  <?=$items['sz_hips'];?> Inch<br/>
                                                  Length :  <?=$items['sz_length'];?> Inch</p>
                                        </td>
                                       
                                                  <td class="product-price d-lg-table-cell">
                                            <span class="pr-3 d-block">
                                               
                                                    <?=currency($this->website->web_currency);?>
                                                    <?=$this->cart->format_number($items['price']);?>
                                              
                                            </span>
                                        </td>

                                    <?php }?>

                                        <td class="product-quantity d-md-table-cell">
                                            <div class="input-group input-group--style-2 pr-4" style="width: 130px;">
                                                <input type="hidden" class="url" value="<?=base_url();?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number dec qtybtn" data-field="quantity" type="button" data-type="minus" <?php if($items['min_qty'] < $items['qty']){?>onclick="dec('<?=$items['rowid'];?>',this)" <?php }?> >
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-number  avail_qty<?=$items['rowid'];?>" placeholder="1"  value="<?=$items['qty'];?>" min="<?=$items['qty'];?>" max="<?=$items['max_qty'];?>" style="padding:5px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number inc qtybtn" type="button" data-type="plus" data-field="quantity"
                                                    <?php if($items['max_qty'] !=$items['qty']){?> onclick="inc('<?=$items['rowid'];?>',this)" <?php }?> >
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </td>

                                        <td class="product_total  small_product_price">
                                            <?php $item_tax=$items['tax']*$items['subtotal']/100;?>
                                            <span class="new_price"><?=currency($this->website->web_currency);?><?php echo $item_subtotal=$this->cart->format_number($items['subtotal']+$item_tax); $total+=$items['subtotal']+$item_tax;?></span>
                                        </td>

                                        <td class="product-remove">
                                            <a href="javascript:void(0)" onclick="remove_cart('<?=$items['rowid'];?>',this)" url="<?php echo site_url();?>" class="text-right pl-4 item_remove">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row align-items-center pt-4">
                        <div class="col-md-6">
                            <a href="<?php echo site_url('/');?>" class="link link--style-3">
                                <i class="la la-mail-reply"></i> Return to shop
                            </a>
                        </div>
                        
                    </div>
                </div>
                <!-- </form> -->
            </div>

 <div class="col-md-6 col-sm-6" style="margin-top:20px ">
                <div class="card sticky-top">
                    <div class="card-title">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="heading heading-3 strong-400 mb-0">
                                    <span>Estimated Delivery Time:</span>
                                </h3>
                            </div>

                           
                        </div>
                    </div>
                     <div class="card-body">
                        <p style=" font-size: 19px; color: #c19450; font-weight: 600;">
                            <?php echo $NewDate=Date('d F', strtotime('+5 days'));?> - <?php echo $NewDate=Date('d F', strtotime('+8 days'));?></p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-6" style="margin-top:20px ">
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
                                        <span class="text-italic"><?=currency($this->website->web_currency);?><?php echo $gst=$this->cart->format_number($tax_value->txt_per*$total/100);  $gst_total +=$tax_value->txt_per*$total/100;?></span>
                                    </td>
                                    <?php } } ?>
                                </tr>

                                <tr class="cart-total">
                                    <th><span class="strong-600">Total</span></th>
                                    <td class="text-right">
                                        <strong><span><?=currency($this->website->web_currency);?><?php if(!empty($this->cart->contents())){echo $this->cart->format_number($total+$gst_total);}?></span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <br/>
                        <div class="col-md-12 text-center" >
                            <a href="<?=base_url('checkout');?>" class="btn btn-styled btn-base-1">Proceed to Delivery Info</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
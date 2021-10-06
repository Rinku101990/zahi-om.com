<style>
.slick-slide{display:block;}
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
                                <span>My Cart</span>                                
                            </div>
                            <div class="breadcrumb_title">
                                <h2>My Cart</h2>
                            </div>
                         
                            
                        </div>
                        </div> 
                        <div id="cart_details">
                          <?php if(!empty($this->cart->contents())){?>
                   
                     <div class="col-12">
                         
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                   
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product</th>
                                                    <th class="product-price">Price</th>
                                                      <th class="product-price" style="
    min-width: 100px;
">Color</th>
                                                         <th class="product-price" style="
    min-width: 100px;
">Size</th>
                                                    <th class="product_quantity">Quantity</th>
                                                    <!-- <th class="product_total">Tax</th> -->
                                                    <th class="product_total">Total</th>
                                                    <th class="product_remove" >Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //print("<pre>".print_r($this->cart->contents(),true)."</pre>");?>
                                        <?php $total=0; if(!empty($this->cart->contents())){
                                            foreach ($this->cart->contents() as $items) { ?>
                                                <tr>
                                                  <input type="hidden" class="rowid" value="<?=$items['rowid'];?>" >
                                                    <td class="product_thumb"><a href="<?=$items['product_url'];?>" target="_blank"><img src="<?=$items['img'];?>" alt="<?=$items['name'];?>"></a></td>
                                                    <td class="product_name " align="center"><center>
                                                        <div class="small_product_name" style="float: left; width: 200px;"><a href="<?=$items['product_url'];?>" target="_blank"><?=$items['name'];?></a></div></center></td>
                                                 <td class="product-price small_product_price ">
                                                    <?php if(!empty($items['special_price'])){?>
                                                        <span class="new_price"><?=currency($this->website->web_currency);?><span><?=$this->cart->format_number($items['special_price']);?></span>
                                                    </span><br/>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?>
                                                    <?=$this->cart->format_number($items['selling_price']);?></span>
                                                <?php }else{?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><span><?=$this->cart->format_number($items['selling_price']);?></span>
                                                    </span>
                                                <?php }?>
                                                  </td>
                                                    <td class="product_size"><?=$items['color'];?></td>
                                                      </td>
                                                       <td class="product_size"><?php if($items['size']!='Select Size'){ echo $items['size'];}?></td>
                                                      </td>
                                                 
                                                </td>
                                                    <td class="product_quantity">  
                                                    <input type="hidden" class="url" value="<?=base_url();?>">        
                                                        <span class="dec qtybtn" data-proid="<?=$items['rowid'];?>">-</span>
                                                        <input type="text" value="<?=$items['qty'];?>" class="avail_qty<?=$items['rowid'];?>"  style="width: 35px;height: 30px;padding-left: 0;  text-align: center;;" disabled>    <span class="inc qtybtn" data-proid="<?=$items['rowid'];?>">+</span>
                                                        </td>
                                                        <?php $item_tax=$items['tax']*$items['subtotal']/100;?>
                                                    <td class="product_total  small_product_price "><span class="new_price"><?=currency($this->website->web_currency);?><span ><?php echo $item_subtotal=$this->cart->format_number($items['subtotal']+$item_tax); $total+=$items['subtotal']+$item_tax;?></span></span></td>
                                                    <td class="product_remove "><a href="javascrip:void(0);" class="item_remove" item_id="<?=$items['rowid'];?>" ><i class="fa fa-trash-o"></i></a></td>


                                                </tr>
                                            <?php }}?>


                                            </tbody>
                                        </table>  
                                    </div>  
                              
                            </div>

                         </div>

                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items"style="padding: 0 20px;">
                                    <h3>Cart Totals</h3>
                                    <div class="table-responsive">
                                        <table class="table" style="font-weight: 600;font-size:14px;">
                                            <tbody>
                                                 <tr class="total">
                                                <td>Sub Total</td>  <td class="total-amount new_price" style="text-align: right;" ><?=currency($this->website->web_currency);?> <?php if(!empty($this->cart->contents())){ echo $this->cart->format_number($total);}?></td>
                                                                                                
                                            </tr>
                                                <?php  $gst_total=0;
                                                if($tax== true){
                                                    foreach ($tax as $tax_value) {?> 
                                                <tr>
                                                <td><?=$tax_value->txt_name;?> (<?=$this->cart->format_number($tax_value->txt_per);?>%)</td>
                                                <td style="color:#CC2121;text-align: right" class="new_price"><?=currency($this->website->web_currency);?> <span class="gst"><?php echo $gst=$this->cart->format_number($tax_value->txt_per*$total/100);  $gst_total +=$tax_value->txt_per*$total/100;?></span></td>
                                            </tr>
                                        <?php }}?>
                                                <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount new_price" style="text-align: right;" ><?=currency($this->website->web_currency);?> <?php if(!empty($this->cart->contents())){echo $this->cart->format_number($total+$gst_total);}?></td>
                                                                                                
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </div>
                                <a href="<?=base_url('checkout');?>" class="btn btn__bg d-block">Proceed To Checkout</a>
                            </div>
                        </div>

                    <?php }?>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>          
            </section>
<?php $date=date('Y-m-d');?>
  <?php if($this->website->web_lang=='en'){
     $productName=$products->p_name;
      $home=lang(46);
     $cate=$products->cate_name;
     $scate=$products->scate_name;
     $child=$products->child_name;
     $short=$products->p_short_description;
      $long=$products->p_description;
       $Reference=lang(47);
        $Model=lang(48);
         $Brand=lang(49);
          $price=lang(50);
           $color=lang(51);
            $qty=lang(52);
             $delivery=lang(53);
              $delivery2=lang(54);
               $buy=lang(55);
               $cart=lang(56);
               $desc=lang(57);
               $Warranty=lang(58);
               $return=lang(59);
               $reviews=lang(60);
               $relative=lang(61);
}else{
     $home=lang_ar(46);
  $productName=$products->p_name_ar;
 $cate=$products->cate_name_ar;
 $scate=$products->scate_name_ar;
$child=$products->child_name_ar;
   $short=$products->p_short_description_ar;
 $long=$products->p_description_ar;
$Reference=lang_ar(47);
        $Model=lang_ar(48);
         $Brand=lang_ar(49);
          $price=lang_ar(50);
           $color=lang_ar(51);
            $qty=lang_ar(52);
             $delivery=lang_ar(53);
              $delivery2=lang_ar(54);
               $buy=lang_ar(55);
               $cart=lang_ar(56);
               $desc=lang_ar(57);
               $Warranty=lang_ar(58);
               $return=lang_ar(59);
               $reviews=lang_ar(60);
               $relative=lang_ar(61);}?>
    <style type="text/css">
        .checkbox-alphanumeric label {
            width: 2.5em;
            height: 2.5em;
            margin-right: 0.37EM;
            padding: 0.70rem 0px;
            line-height: 14px;
        }
    </style>
    <div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h4 class="text-uppercase"><?=$productName;?></h4>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>"><?=$home;?></a></li>
                        <li><a href="#"><?=$cate;?></a></li>
                        <li><a href="#"><?=$scate;?></a></li>
                         <li class="active"><a href="#"><?=$child;?></a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div> 
    <section class="product-details-area ">
        <div class="container">
            <div class="bg-white">
                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-6">
                        <div class="product-gal sticky-top d-flex flex-row-reverse">
                            <div class="product-gal-img">
                                <?php if(!empty(explode(',',$products->pg_image)[0])){$img=explode(',',$products->pg_image)[0];?>
                                <img src="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/zoom/'.$img;?>" class="xzoom img-fluid lazyloaded" data-src="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/zoom/'.$img;?>" xoriginal="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/zoom/'.$img;?>" style="width: 100%;height: 500px;object-fit: contain;">
                                <?php }else{?>
                                    <img src="<?=base_url('seller/uploads/default-image.png');?>" class="xzoom img-fluid lazyloaded" data-src="<?=base_url('seller/uploads/default-image.png');?>" xoriginal="<?=base_url('seller/uploads/default-image.png');?>" style="width: 100%;height: 500px;object-fit: contain;">
                                <?php }?>
                            </div>
                            <div class="product-gal-thumb">
                                <div class="xzoom-thumbs">
                                    <?php if(!empty($products->pg_image)){ foreach(explode(',',$products->pg_image) AS $key=>$pimg1){ ?>
                                    <a href="<?=base_url('seller/uploads/').$products->cate_slug.'/'.$products->scate_slug.'/'.$products->child_slug.'/zoom/'.$pimg1;?>">
                                        <img src="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/zoom/'.$pimg1;?>" class="xzoom-gallery lazyloaded <?php if($key==0)echo'xactive';?>" width="80" data-src="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/'.$pimg1;?>" <?php if($key==0){?>xpreview="<?=base_url('seller/uploads/').slug($products->cate_name).'/'.slug($products->scate_name).'/'.slug($products->child_name).'/zoom/'.$pimg1;?>" <?php }?>>
                                    </a>
                                    <?php } }else{?>
                                    <a href="<?=base_url('seller/uploads/default-image.png');?>">
                                        <img src="<?=base_url('seller/uploads/default-image.png');?>" class="xzoom-gallery lazyloaded <?php if($key==0)echo'xactive';?>" width="80" data-src="<?=base_url('seller/uploads/default-image.png');?>" xpreview="<?=base_url('seller/uploads/default-image.png');?>">
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h1 class="product-title"><?=$productName;?></h1>
                            <div class="row align-items-center my-1" style="height: 26px;">
                                <div class="col-6">
                                    <!-- Rating stars -->
                                    <div class="rating">
                                        <span class="star-rating">
                                        <ul>
                                        <?php 
                                            $count_user=get_star($products->p_id)->count; 
                                            $star_count=get_star($products->p_id)->star_count; 
                                            if($star_count){ 
                                                echo GetStar(round($star_count/$count_user,1));
                                            }else{  
                                                echo GetStar(0);
                                            }
                                        ?>
                                        </ul>
                                    </span>
                                        <span class="rating-count ml-1" style="top:0;">(<?=$count_user;?> customer reviews)</span>
                                    </div>
                                </div>
                                <div class="col-6 text-right" style="margin-top: -13px;">
                                    <ul class="inline-links inline-links--style-1">
                                        <li>
                                            <?php if($products->int_stock=='1'){?>
                                                <span class="badge badge-md badge-pill bg-green">In stock</span>
                                            <?php }else{?>
                                                <span class="badge badge-md badge-pill bg-red">Out of stock</span>
                                            <?php }?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label"><?=$Reference;?>:</div>
                                </div>
                                <div class="col-10">
                                    <span>#<?=$products->p_reference_no;?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label"><?=$Brand;?>:</div>
                                </div>
                                <div class="col-4">
                                    <span><?=$products->brd_name;?></span>
                                </div>
                                <div class="col-2">
                                    <div class="product-description-label"><?=$Model;?>:</div>
                                </div>
                                <div class="col-4">
                                    <span><?=$products->p_model;?></span>
                                </div>
                            </div>

                            <hr>

                            <!-- <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label">Sold by: </div>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="sold_by"><?=getVnd_name($products->p_vnd_id);?></a>
                                </div>
                            </div>

                            <hr> -->
                            <div class="row no-gutters mt-3">
                               
                                <div class="col-12">
                                   <p><?=substr($short,0,200);?></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label"><?=$price;?>:</div>
                                </div>
                                <div class="col-10">
                                    <?php if(!empty($products->sp_special_price)  && $products->sp_start_date <= $date && $products->sp_end_date >= $date){?>
                                    <div class="product-price">
                                        <strong><?=currency($this->website->web_currency);?><?=number_format($products->sp_special_price);?></strong>
                                    </div>
                                    <del> <?=currency($this->website->web_currency);?><?=number_format($products->p_selling_price);?></del>
                                    <?php }else{?>
                                    <div class="product-price">
                                        <strong><?=currency($this->website->web_currency);?><?=number_format($products->p_selling_price);?></strong>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>

                            <hr>

                            <?php if(!empty($products->p_option_group)){
                            foreach(explode(', ',$products->p_option_group) as $option_group){
                            if($option_group=='1' && option($option_group)->opt_display=='1'){?>
                                <input type="hidden" id="color_name" value="1">
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">
                                            <?=option($option_group)->opt_name;?>: 
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-color mb-1">
                                            <?php $get_option=explode(', ',option($option_group)->opt_value);
                                            $option_grop_value=explode(', ',$products->option_grop);
                                            foreach ($get_option as $key=>$opt_value){?>
                                            <li>
                                                <input type="radio" id="105-color-<?php echo $key;?>" name="color" value="<?=$opt_value;?>" <?php if(in_array($opt_value,$option_grop_value)){echo 'checked=""';}?>>
                                                <label style="background: <?=$opt_value;?>;" for="105-color-<?php echo $key;?>" data-toggle="tooltip" data-original-title="" title="<?=$opt_value;?>" class="<?php if(in_array($opt_value,$option_grop_value)){echo'product_color';}?>"></label>
                                            </li>
                                            <?php }?>
                                        </ul>
                                        <span id="colorError"></span>
                                    </div>
                                </div>
                                <?php }else if(option($option_group)->opt_display=='1'){?>
                                    <input type="hidden" id="size_name" value="1">
                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2 ">
                                                <?=option($option_group)->opt_name;?>:
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                                <?php $get_option=explode(',',option($option_group)->opt_value);foreach ($get_option as $opt_value){?>
                                                <li>
                                                    <input type="radio" id="choice-<?php echo $opt_value;?>" name="choice" value="<?=$opt_value;?>" class="product_size">
                                                    <label for="choice-<?php echo $opt_value;?>"><?=$opt_value;?></label>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            <span id="sizeError"></span>
                                        </div>
                                    </div>
                                    <?php } } }else{?>
                                        <input type="hidden" id="color_name" value="0">
                                        <input type="hidden" id="size_name" value="0">
                                    <?php }?>
                                    <hr>

                                    <!-- Quantity + Add to cart -->
                                    <!-- <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2">Quantity:</div>
                                        </div>
                                        <div class="col-10">
                                            <div class="product-quantity d-flex align-items-center">
                                                <div class="input-group input-group--style-2 pr-3" style="width: 160px;">

                                                    <input type="text" name="quantity" class="form-control input-number text-center avail_qty" placeholder="1" value="<?php if(empty($products->int_min_purchase_qty)){echo'1';}else{echo $products->int_min_purchase_qty;}?>"  readonly disabled>

                                                </div>

                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2"><?=$qty;?>:</div>
                                        </div>
                                        <div class="col-10">
                                            <div class="product-quantity d-flex align-items-center">
                                                <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                            <i class="la la-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity" class="form-control input-number text-center avail_qty" placeholder="1" value="<?php if(empty($products->int_min_purchase_qty)){echo'1';}else{echo $products->int_min_purchase_qty;}?>" readonly disabled>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                            <i class="la la-plus"></i>
                                                        </button>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <hr>

                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2"><?=$delivery;?>:</div>
                                        </div>
                                        <div class="col-5">
                                            <div class="product-quantity d-flex align-items-center">
                                                <div class="input-group input-group--style-2 pr-3">
                                                    <input type="hidden" name="zip_code" id="zip_code" value="0">
                                                    <input type="text" name="pincode" placeholder="<?=$delivery2;?>" class="pincode form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="    border: 1px solid #e5e5e5;" />
                                                </div>
                                            </div>
                                            <div id="checkResponse"></div>
                                        </div>
                                        <div class="col-4">
                                            <span class="check Check_Zipcode btn btn-link btn-icon-left strong-700">Check</span>
                                        </div>
                                        <!-- <div class="col-12">
                                            <div id="checkResponse">
                                            </div>
                                        </div> -->
                                    </div>
                                    <hr>

                                    <div class="d-table width-100 mt-3">
                                        <div class="d-table-cell">
                                            <!-- Buy Now button -->
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy_now <?php if($products->int_stock=='1'){echo'buy_now';}else{echo'BuyNow';}?>" RefId="<?=encode($products->p_id);?>" <?php if($products->int_stock!='1'){echo'disabled';}?>>
                                                <i class="fa fa-bolt" style="margin-right: 0rem !important"></i> <?=$buy;?>
                                            </button>
                                            <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add_to_cart <?php if($products->int_stock=='1'){echo'add_to_cart';}else{echo'add_cart';}?>" url="<?=base_url();?>" RefId="<?=encode($products->p_id);?>" <?php if($products->int_stock!='1'){echo'disabled';}?>>
                                                <i class="fa fa-shopping-basket" style="margin-right: 0rem !important"></i>
                                                <span class="d-md-inline-block"> <?=$cart;?></span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- <hr class="mt-4">
                                    <div class="row no-gutters mt-3">
                                        <div class="col-2">
                                            <div class="product-description-label alpha-6">Return Policy:</div>
                                        </div>
                                        <div class="col-10">
                                            Returns accepted if product not as described, buyer pays return shipping fee; or keep the product &amp; agree refund with seller. <a href="javascript:void(0)" class="ml-2">View details</a>
                                        </div>
                                    </div> -->
                              <!--       <div class="row no-gutters mt-3">
                                        <div class="col-2">
                                            <div class="product-description-label alpha-6">Payment:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="inline-links">
                                                <li>
                                                    <img src="<?php echo site_url('assets/');?>images/icons/cards/visa.png" data-src="<?php echo site_url('assets/');?>images/icons/cards/visa.png" width="30" class=" ls-is-cached lazyloaded">
                                                </li>
                                                <li>
                                                    <img src="<?php echo site_url('assets/');?>images/icons/cards/mastercard.png" data-src="<?php echo site_url('assets/');?>images/icons/cards/mastercard.png" width="30" class=" ls-is-cached lazyloaded">
                                                </li>
                                                <li>
                                                    <img src="<?php echo site_url('assets/');?>images/icons/cards/maestro.png" data-src="<?php echo site_url('assets/');?>images/icons/cards/maestro.png" width="30" class=" ls-is-cached lazyloaded">
                                                </li>
                                                <li>
                                                    <img src="<?php echo site_url('assets/');?>images/icons/cards/paypal.png" data-src="<?php echo site_url('assets/');?>images/icons/cards/paypal.png" width="30" class=" ls-is-cached lazyloaded">
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->

                                    <hr class="mt-4">
                                    <div class="row no-gutters mt-4">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2">Share:</div>
                                        </div>
                                        <div class="col-10">
                                            <div id="share">
                                                <a href="javascript:void(0)" title="Share this page on facebook" class="share-square-facebook" style="display: inline-block;"></a>
                                                <a href="javascript:void(0)" title="Share this page on twitter" class="share-square-twitter" style="display: inline-block;"></a>
                                                <a href="javascript:void(0)" title="Share this page on linkedin" class="share-square-linkedin" style="display: inline-block;"></a>
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="gry-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="product-desc-tab bg-white">
                                <div class="tabs tabs--style-2">
                                    <ul class="nav nav-tabs justify-content-left sticky-top bg-white" style="">
                                        <li class="nav-item">
                                            <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600 active show"><?=$desc;?></a>
                                        </li>
                                        <?php if(!empty($products->p_warranty_policy)){?>
                                        <li class="nav-item">
                                            <a href="#tab_default_2" data-toggle="tab" class="nav-link text-uppercase strong-600"><?=$Warranty;?></a>
                                        </li>
                                        <?php } if(!empty($products->p_return_policy)){?>
                                        <li class="nav-item">
                                            <a href="#tab_default_3" data-toggle="tab" class="nav-link text-uppercase strong-600"><?=$return;?></a>
                                        </li>
                                        <?php }?>
                                        <li class="nav-item">
                                            <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600"><?=$reviews;?></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pt-0">
                                        <div class="tab-pane active show" id="tab_default_1">
                                            <div class="py-2 px-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul class="product-property-list util-clearfix" style="box-sizing: border-box; margin: 0px; padding: 10px 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif, SimSun, 宋体; vertical-align: baseline; list-style: disc; zoom: 1; color: rgb(0, 0, 0); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
                                                            <li class="property-item" id="product-prop-19557" data-attr="200007124" data-title="1.33" style="box-sizing: border-box; margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 16px; font-family: inherit; vertical-align: baseline; display: list-item; position: relative; width: 479px; float: left; list-style: none;"><span class="propery-title" data-spm-anchor-id="2114.10010108.0.i6.68b25c6213p7wv" style="box-sizing: border-box; margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; color: rgb(153, 153, 153);">Length:</span><span class="propery-des" title="<?=$products->p_lenght;?> <?=$products->ut_dime_name;?>" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$products->p_lenght;?> <?=$products->ut_dime_name;?></span></li>
                                                            <li class="property-item" id="product-prop-351" data-attr="100009274" data-title="Chopper Bike" style="box-sizing: border-box; margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 16px; font-family: inherit; vertical-align: baseline; display: list-item; position: relative; width: 479px; float: left; list-style: none;"><span class="propery-title" style="box-sizing: border-box; margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; color: rgb(153, 153, 153);">Width:</span><span class="propery-des" title="Chopper Bike" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$products->p_width;?> <?=$products->ut_dime_name;?></span></li>
                                                            <li class="property-item" id="product-prop-200001556" data-attr="200011720" data-title="Spring Fork (Low Gear Non-damping)" style="box-sizing: border-box; margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 16px; font-family: inherit; vertical-align: baseline; display: list-item; position: relative; width: 479px; float: left; list-style: none;"><span class="propery-title" style="box-sizing: border-box; margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; color: rgb(153, 153, 153);">Height:</span><span class="propery-des" title="Spring Fork (Low Gear Non-damping)" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$products->p_height;?> <?=$products->ut_dime_name;?></span></li>
                                                            <li class="property-item" id="product-prop-200001175" data-attr="492" data-title="Children" style="box-sizing: border-box; margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 16px; font-family: inherit; vertical-align: baseline; display: list-item; position: relative; width: 479px; float: left; list-style: none;"><span class="propery-title" style="box-sizing: border-box; margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; color: rgb(153, 153, 153);">Weight:</span><span class="propery-des" title="Children" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$products->p_weight;?> <?=$products->ut_weight_name;?></span></li>
                                                            <li class="property-item" id="product-prop-1506" data-attr="480" data-title="Steel" style="box-sizing: border-box; margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 16px; font-family: inherit; vertical-align: baseline; display: list-item; position: relative; width: 479px; float: left; list-style: none;"><span class="propery-title" style="box-sizing: border-box; margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; color: rgb(153, 153, 153);">Ean/upc Code (Barcode):</span><span class="propery-des" title="Steel" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$products->p_barcode;?></span></li>
                                                        </ul>
                                                        <br/>
                                                    </div>
                                                    <br/>
                                                    <div class="col-12">
                                                        <?=$long;?>
                                                    </div>
                                                </div>
                                                <span class="space-md-md"></span>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab_default_2">
                                            <div class="">
                                                <!-- 16:9 aspect ratio -->
                                                <div class="py-2 px-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <?php if($products->p_warranty_policy==TRUE){?>
                                                        <div class="accordion_area">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div id="accordion" class="card__accordion">
                                                                            <?php foreach (explode(', ',$products->p_warranty_policy) as $key=>$wp_value){?>
                                                                            <div class="card card_dipult" style="margin-bottom: 10px;">
                                                                                <div class="card-header card_accor" id="headingOne" style="padding: 0">
                                                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$wp_value;?>" aria-expanded="<?php if($key=='0'){echo'true';}else{echo'false';}?>" aria-controls="collapseOne">
                                                                                        <b>  <?=policy($wp_value)->pp_title;?></b>
                                                                                    </button>
                                                                                </div>
                                                                                <div id="collapse<?=$wp_value;?>" class="collapse <?php if($key=='0'){echo'show';}?>" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                                                    <div class="card-body">
                                                                                        <?=policy($wp_value)->pp_description;?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php }?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_3">
                                        <div class="py-2 px-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php if($products->p_return_policy==TRUE){?>
                                                    <div class="accordion_area">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div id="accordion" class="card__accordion">
                                                                        <?php foreach (explode(', ',$products->p_return_policy) as $key1=>$rp_value){?>
                                                                        <div class="card card_dipult" style="margin-bottom: 10px;">
                                                                            <div class="card-header card_accor" id="headingOne" style="padding:0px">
                                                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseone<?=$rp_value;?>" aria-expanded="<?php if($key1=='0'){echo'true';}else{echo'false';}?>" aria-controls="collapseOne">
                                                                                    <b>  <?=policy($rp_value)->pp_title;?></b>
                                                                                </button>
                                                                            </div>
                                                                            <div id="collapseone<?=$rp_value;?>" class="collapse <?php if($key1=='0'){echo'show';}?>" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                                                <div class="card-body">
                                                                                    <?=policy($rp_value)->pp_description;?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <span class="space-md-md"></span>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_4">
                                        <div class="py-2 px-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                <?php if(!empty($reviews_cmnts)){ foreach($reviews_cmnts AS $rev_value){?>
                                                    <div class="product_d_tab_content_inner" style="padding: 0px">
                                                        <div class="product_d_tab_content_item">
                                                            <?php if(empty($rev_value->cust_profile)){?>
                                                            <img src="<?=base_url('uploads/customers/profile.png');?>" class="profile_img" style="width: 70px;height: 70px; object-fit: cover;" />
                                                            <?php }else{?>
                                                            <img src="<?=base_url('uploads/customers/').$rev_value->cust_profile;?>" class="profile_img" style="width: 70px;height: 70px; object-fit: cover;" />
                                                            <?php }?>
                                                        </div>
                                                        <div class="product_d_tab_content_item" style="margin-left: 2%;">
                                                            <p> <strong style=" display: inline-block;"><?=$rev_value->cust_fname.' '.$rev_value->cust_lname;?></strong>
                                                            <span style=" display: inline-block;    margin-left: 14px;"><?=$rev_value->created;?></span></p>
                                                            <?php if(!empty($rev_value->star)){?>
                                                            <div class="samll_product_ratting star-rating">
                                                                <ul style="    margin-bottom: 5px;">
                                                                    <?php star($rev_value->star); ?>
                                                                </ul>
                                                            </div>
                                                            <?php }?>
                                                            <p><?=$rev_value->message;?></p>
                                                        </div>
                                                    </div>
                                                    <?php } }?>
                                                    <br/>
                                                    <?php if(empty(@$this->customer)){?>
                                                    <button class="btn btn-styled btn-base-1 reviews_btn SignIn_Model">Review Product</button>
                                                    <?php }else{ $reviews=reviews($this->customer->cust_id,$products->p_id);?>
                                                    <div class="product_review_form">
                                                        <form action="<?=base_url('account/reviews_cmnt');?>" method="post">
                                                            <input type="hidden" id="current_url" name="current_url" value="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? " https " : "http ") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";?>">
                                                            <input type="hidden" name="rating" id="rating" value="<?php if(empty($reviews)){echo'1';}else{echo'0';}?>">
                                                            <input type="hidden" name="pid" value="<?=$products->p_id;?>">
                                                            <h2 style='font-family: "Times New Roman", Times, serif;font-size: 30px;font-weight: 600;'>Add a <?php if(!empty($reviews)){echo'Comment';}else{echo'Review';}?> </h2>
                                                            <?php if(empty($reviews)){?>
                                                            <div class="samll_product_ratting review_rating">
                                                                <span style='font-family: "Times New Roman", Times, serif;font-size: 20px;'>Your Rating</span>
                                                                <ul class="list-inline" data-rating="3.9951" title="Average Rating - 3.9951" style="display: flex;">
                                                                    <li title="1" id="6-1" data-index="1" data-business_id="6" data-rating="3.9951" class="rating" style="cursor: pointer; color: rgb(255, 204, 0); font-size: 24px;">★</li>
                                                                    <li title="2" id="6-2" data-index="2" data-business_id="6" data-rating="3.9951" class="rating" style="cursor: pointer; color: rgb(204, 204, 204); font-size: 24px;">★</li>
                                                                    <li title="3" id="6-3" data-index="3" data-business_id="6" data-rating="3.9951" class="rating" style="cursor: pointer; color: rgb(204, 204, 204); font-size: 24px;">★</li>
                                                                    <li title="4" id="6-4" data-index="4" data-business_id="6" data-rating="3.9951" class="rating" style="cursor: pointer; color: rgb(204, 204, 204); font-size: 24px;">★</li>
                                                                    <li title="5" id="6-5" data-index="5" data-business_id="6" data-rating="3.9951" class="rating" style="cursor: pointer; color: rgb(204, 204, 204); font-size: 24px;">★</li>
                                                                </ul>
                                                            </div>
                                                            <?php }?>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="review_form_comment">
                                                                        <label for="review_comment" style='font-family: "Times New Roman", Times, serif;font-size: 20px;'>Your
                                                                            <?php if(!empty($reviews)){echo'Comment';}else{echo'Review';}?>
                                                                        </label>
                                                                        <textarea name="comment" class="form-control" id="review_comment" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <button type="submit" class="btn btn-styled btn-base-1">Submit</button>
                                                        </form>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if($related_product==true){?>
                        <div id="section_featured">
                            <section class="mb-4">
                                <div class="container1">
                                    <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                                        <div class="section-title-1 clearfix">
                                            <h3 class="heading-5 strong-700 mb-0 float-left">
                                              <span class="mr-4"><?=$relative;?></span>
                                          </h3>
                                        </div>
                                        <div class="caorusel-box">
                                            <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4" data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                                                <?php foreach ($related_product as $rlp_list) {?>
                                                    <div class="product-card-2 card card-product m-2 shop-cards shop-tech">
                                                        <div class="card-body p-0">
                                                            <div class="card-image">
                                                                <a href="<?=base_url('product/').encode($rlp_list->p_id).'/'.slug($rlp_list->p_name);?>" class="d-block">
                                                                <?php  if(!empty($rlp_list->pg_image)){ ?>
                                                                    <img src="<?=base_url('seller/uploads/').slug($rlp_list->cate_name).'/'.slug($rlp_list->scate_name).'/'.slug($rlp_list->child_name).'/'.explode(',',$rlp_list->pg_image)[0];?>" title="<?=$rlp_list->p_name;?>" class="hover-img">
                                                                <?php }else{?>
                                                                    <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$rlp_list->p_name;?>" class="hover-img1">
                                                                <?php }?>
                                                                </a>
                                                            </div>
                                                            <div class="p-md-3 p-2" style="    background: #f3f3f3;">
                                                                <?php if(!empty($rlp_list->sp_special_price) && $rlp_list->sp_start_date <= $date && $rlp_list->sp_end_date >= $date){?>
                                                                <div class="price-box"> <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->p_selling_price);?></del> <span class="product-price strong-600"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->sp_special_price);?></span></div>
                                                                <?php }else{?>
                                                                <div class="price-box"> <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->p_selling_price);?></del></div>
                                                                <?php }?>
                                                                    <div class="star-rating star-rating-sm mt-1">
                                                                        <ul style="margin-bottom:0px">
                                                                            <?php $count_user=get_star($rlp_list->p_id)->count;
                                                                                $star_count=get_star($rlp_list->p_id)->star_count;
                                                                                  if($star_count){
                                                                                  echo GetStar(round($star_count/$count_user,1));
                                                                              } else{  echo GetStar(0);}
                                                                              ?>
                                                                        </ul>
                                                                    </div>
                                                                    <?php if($this->website->web_lang=='en'){?>
                                                                    <h2 class="product-title p-0">
                                                                        <a href="<?=base_url('product/').encode($rlp_list->p_id).'/'.slug($rlp_list->p_name);?>" class=" text-truncate">
                                                                            <?php echo $rlp_list->p_name;?></a>
                                                                    </h2>
                                                                    <?php }else{?>
                                                                        <h2 class="product-title p-0" >
                                                                        <a href="<?=base_url('product/').encode($rlp_list->p_id).'/'.slug($rlp_list->p_name);?>" class=" text-truncate">
                                                                            <?php  echo $rlp_list->p_name_ar;?></a>
                                                                    </h2>
                                                                    <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </section>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#share').share({
                            networks: ['facebook', 'twitter', 'linkedin', 'tumblr', 'in1', 'stumbleupon', 'digg'],
                            theme: 'square'
                        });
                        getVariantPrice();

                    });

                    function show_chat_modal() {
                        $('#chat_modal').modal('show');
                    }
                </script>

                <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
                        <div class="modal-content position-relative">
                            <div class="modal-header">
                                <h5 class="modal-title strong-600 heading-5">Any question about this product?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="" action="#/conversations" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="1VouZHF2joF6d5nuHQcwwDbarbdrRjvGfjc0IzhI">
                                <input type="hidden" name="product_id" value="105">
                                <div class="modal-body gry-bg px-3 pt-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" name="title" value="Snow Bike 20 inch 21 speed double disc mountain Fat Bicycles" placeholder="Product Name" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="8" name="message" required placeholder="Your Question">#/product/Snow-Bike-20-inch-21-speed-double-disc-mountain-Fat-Bicycles-X1whF</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-base-1 btn-styled">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
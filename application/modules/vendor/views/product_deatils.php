<!--breadcrumbs area start-->
<style type="text/css">
    .small_product_price {
    text-align: left; 
}
.delivery i.fa.fa-map-marker{
        position: absolute;
    width: 44px;
    height: 44px;
    line-height: 30px;
    /* display: block; */
    /* top: 0; */
    margin-top: 4px;
    margin-left: -2%;
    text-align: center;
    color: #2874f0;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    z-index: 2;
    font-size: 16px;
    display: inline-block;
}
span.check{
    cursor: pointer;
       padding-right: 9px;
    margin-left: 181px;
  
    margin-top: 7px;
    text-align: center;
    color: #2874f0;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    z-index: 2;
    font-size: 14px;
    display: inline-block;
    font-weight: 600;
}
input.pincode {  
height: 37px;
width: 170px;
    position: absolute;
    display: inline-block;
    border: none;
    background: no-repeat;
    padding-left: 20px;    
}
.delivery {
    width: 100;
    border-bottom: 2px solid #2874f0;
    margin-bottom: 10px;
}
</style>
	    <div class="breadcrumbs_area bread_about white" >
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="breadcrumb_content">
	                        <div class="breadcrumb_header">
	                            <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> <a href="javascript:void(0);"><?=$products->cate_name;?></a></span>
	                            
	                            <span><i class="fa fa-angle-right"></i></span>
                                <span> <a href="javascript:void(0);"><?=$products->scate_name;?></a></span>
                                
                                <span><i class="fa fa-angle-right"></i></span>
                                <span> <a href="javascript:void(0);"><?=$products->child_name;?></a></span>
                                
                                <span><i class="fa fa-angle-right"></i></span>
	                            <span> <?=$products->p_name;?></span>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		<!--breadcrumbs area end-->

        
        <!--product details start-->
        <div class="product_details white mb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product_d_tab fix"> 
                            <div class="product_d_tab_button">    
                                <ul class="nav product_navactive" role="tablist">
                                     <?php if(!empty($products->pg_image)){$k=1;
                                    foreach(explode(',',$products->pg_image) AS $key=>$pimg1){ 
                                        $k;$k++;?>
                                    <li >
                                        <a class="nav-link <?php if($k=='2')echo'active';?>" data-toggle="tab" href="#p_d_tab<?=$k;?>" role="tab" aria-controls="p_d_tab<?=$k;?>" aria-selected="false"><img src="<?=base_url('seller/uploads/').$products->cate_slug.'/'.$products->scate_slug.'/'.$products->child_slug.'/'.$pimg1;?>" alt="<?=$products->p_name;?>"></a>
                                    </li>
                                <?php }}else{?>
                                      <li >
                                        <a class="nav-link active" data-toggle="tab" href="#p_d_tab1" role="tab" aria-controls="p_d_tab1" aria-selected="false"><img src="<?=base_url('seller/uploads/default-image.png');?>" alt="<?=$products->p_name;?>"></a>
                                    </li>
                                <?php }?>
                                  
                                </ul>
                            </div> 
                            <div class="tab-content product_d_content">
                                <?php if(!empty($products->pg_image)){$i=1;
                                    foreach(explode(',',$products->pg_image) AS $key=>$pimg){ $i;$i++;?>
                                <div class="tab-pane fade <?php if($i=='2')echo'show active';?>" id="p_d_tab<?=$i;?>" role="tabpanel" >
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="<?=base_url('seller/uploads/').$products->cate_slug.'/'.$products->scate_slug.'/'.$products->child_slug.'/'.$pimg;?>" alt="<?=$products->p_name;?>"></a>
                                       
                                        <div class="view_img">
                                            <a class="view_large_img" href="<?=base_url('seller/uploads/').$products->cate_slug.'/'.$products->scate_slug.'/'.$products->child_slug.'/'.$pimg;?>">View larger <i class="fa fa-search-plus"></i></a>
                                        </div>    
                                    </div>
                                </div>
                            <?php }}else{?>
                                  <div class="tab-pane fade show active" id="p_d_tab1" role="tabpanel" >
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="<?=base_url('seller/uploads/default-image.png');?>" alt="<?=$products->p_name;?>"></a>
                                       
                                        <div class="view_img">
                                            <a class="view_large_img" href="<?=base_url('seller/uploads/default-image.png');?>">View larger <i class="fa fa-search-plus"></i></a>
                                        </div>    
                                    </div>
                                </div><?php }?>
                                
                            
                            </div>
                              
                        </div> 
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                            <h1><?=$products->p_name;?></h1>
                             <div class="samll_product_ratting mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a class="comment_form" href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a class="comment_form" href="#"> Write a review </a></li>
                                </ul>
                            </div>
                            <div class="product_reference">
                                <p style="margin-bottom: 0px">Reference: <span><?=$products->p_reference_no;?></span></p>

                            </div>
                            <div class="product_condition">
                                <p style="margin-bottom: 0px">Brand:  <span><?=$products->brd_name;?></span>  &nbsp; Model:  <span><?=$products->p_model;?></span></p>
                            </div>
                            <div class="product_short_desc">
                                <p><?php $description = strlen($products->p_short_description);
                                            if($description>130){
                                                echo substr($products->p_short_description, '0', 130).'..';
                                            }else{
                                                echo $products->p_short_description;
                                            }
                                        ?></p>
                            </div> 
                            <div class="product_in_stock">                            
                                <span> <?php if($products->int_stock=='1'){echo'<sapn class="text-success">In Stock</span>';}else{echo'<sapn class="text-danger">Out of Stock</span>';}?> </span>
                            </div>

                            <div class="small_product_price mb-15">
                                <?php if(!empty($products->sp_special_price)){?>
                              <sapn class="new_price" style="color: #008000;">Extra <?=currency($this->website->web_currency);?><?php echo number_format($offer=$products->p_selling_price-$products->sp_special_price);?> discount</sapn><br/>
                               <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($products->sp_special_price);?> </span>

                               <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($products->p_selling_price);?>  </span>
                                 <span class="old_price" style="color: #008000;text-decoration: blink;"><?php $get_offer=$offer*100/$products->p_selling_price;
                                   echo round($get_offer,2);?>% off </span>
                                <?php }else{?>
                               <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($products->p_selling_price);?> </span><?php }?>
                            </div>
                            <div class="product_d_quantity mb-10">
                                <form action="#">
                                    <label>Available Quantity</label>
                                    <input min="<?php if(empty($products->int_min_purchase_qty)){echo'1';}else{echo $products->int_min_purchase_qty;}?>" max="10" value="<?php if(empty($products->int_min_purchase_qty)){echo'1';}else{echo $products->int_min_purchase_qty;}?>" type="number" class="avail_qty">
                                </form> 
                                 <button type="submit" class="buy_now" <?php if($products->int_stock!='1'){echo'disabled';}?>><i class="fa fa-caret-square-o-right" ></i> Buy Now</button> 
                                <button  class="<?php if($products->int_stock=='1'){echo'add_to_cart';}else{echo'add_cart';}?>" url="<?=base_url();?>" RefId="<?=encode($products->p_id);?>" <?php if($products->int_stock!='1'){echo'disabled';}?> ><i class="fa fa-shopping-cart"></i> add to cart</button>    
                                    
                            </div>    
                            <?php if(!empty($products->p_option_group)){
                                foreach(explode(', ',$products->p_option_group) as $option_group){if($option_group=='1' && option($option_group)->opt_display=='1'){?>
                              <div class="product_d_color mb-10">
                               <label><?=option($option_group)->opt_name;?> </label>
                                <ul>
                            <?php $get_option=explode(', ',option($option_group)->opt_value);
                             $option_grop_value=explode(', ',$products->option_grop);
                                foreach ($get_option as $key=>$opt_value){?>
                                     
                                    <li>
                                       <a class="p_white <?php if(in_array($opt_value,$option_grop_value)){echo'product_color';}?>" href="javascript:void(0);" title="<?=$opt_value;?>" onclick="product_color(<?=$key;?>,this)" style="background: <?=$opt_value;?>"></a>
                                    </li>
                                <?php }?>                                  
                                </ul>
                            </div>
                           
                        <?php }else if(option($option_group)->opt_display=='1'){?>
                             <div class="product_d_size mb-10">
                                <label for="group_1"><?=option($option_group)->opt_name;?> </label>
                                <select name="size" id="group_1 product_size">
                                      <option value="">Select <?=option($option_group)->opt_name;?></option>
                             <?php $get_option=explode(',',option($option_group)->opt_value);
                                foreach ($get_option as $opt_value){?>
                                    <option value="<?=$opt_value;?>"><?=$opt_value;?></option>
                                <?php }?>                                   
                                </select>
                            </div>                          
                        <?php }}}?>
                             <div class="product_d_color ">
                               <label style="    padding-top: 6px;">Delivery  </label>
                         <div class="delivery">
                                <i class="fa fa-map-marker"></i>
                               <input type="text" name="pincode" placeholder="Enter Delivery Zipcode" class="pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
                               <span class="check Check_Zipcode">Check</span>
                           </div>
                      <div id="checkResponse" style="margin-top: 9px; margin-left: 9px;"></div>
                        

                            </div> 
                         

                            
                            <div class="product_d_social mb-10">
                                <ul><li><a href="#"> <i class="fa fa-facebook-f"></i>  Facebook  </a></li>
                                    <li><a href="#"> <i class="fa fa-twitter"></i> Tweet </a></li>
                                    
                                    <li><a href="#"> <i class="fa fa-google-plus" aria-hidden="true"></i> Google+ </a></li>
                                    <li><a href="#"> <i class="fa fa-pinterest"></i>  Pinterest </a></li>
                                </ul>
                            </div>
                            <div class="product_in_stock">
                               <p>Seller by <a href="<?=base_url('seller/').encode($products->p_vnd_id).'/'.getVnd_name($products->p_vnd_id).'-Store';?>" class="sold_by"><?=getVnd_name($products->p_vnd_id);?></a></p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->
        
        <!--product details tab-->
        <div class="product__details_tab mb-10 white">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="product_details_tab_inner"> 
                            <div class="product_details_tab_button">    
                                <ul class="nav" role="tablist">
                                    <li >
                                        <a class="nav-link active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                                    </li>
                                    <li>
                                         <a class="nav-link" data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                                    </li>
                                     <li>
                                         <a class="nav-link" data-toggle="tab" href="#warranty" role="tab" aria-controls="sheet" aria-selected="false">Warranty Policy</a>
                                    </li>
                                       <li>
                                         <a class="nav-link" data-toggle="tab" href="#return" role="tab" aria-controls="sheet" aria-selected="false">Return Policy</a>
                                    </li>
                                    <li>
                                       <a class="nav-link button_three" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                    </li>
                                </ul>
                            </div> 
                            <div class="tab-content product_details_content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                    <div class="product_d_tab_content">
                                      <?=$products->p_description;?>
                                    </div>    
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Length</td>
                                                    <td><?=$products->p_lenght;?> <?=$products->ut_dime_name;?></td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Width</td>
                                                    <td><?=$products->p_width;?> <?=$products->ut_dime_name;?></td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Height</td>
                                                    <td><?=$products->p_height;?> <?=$products->ut_dime_name;?></td>
                                                </tr>
                                                 <tr>
                                                    <td class="first_child">Weight</td>
                                                    <td><?=$products->p_weight;?> <?=$products->ut_weight_name;?></td>
                                                </tr>
                                                 <tr>
                                                    <td class="first_child">Ean/upc Code (Barcode) </td>
                                                    <td><?=$products->p_barcode;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>


                                <div class="tab-pane fade" id="warranty" role="tabpanel">
                                       <br/>
                                       <?php if($products->p_warranty_policy==TRUE){?>
                                    <div class="accordion_area">
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                        <div id="accordion" class="card__accordion">
                      <?php foreach (explode(', ',$products->p_warranty_policy) as $key=>$wp_value){?>
                          <div class="card card_dipult">
                            <div class="card-header card_accor" id="headingOne">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$wp_value;?>" aria-expanded="<?php if($key=='0'){echo'true';}else{echo'false';}?>" aria-controls="collapseOne">
                              <b>  <?=policy($wp_value)->pp_title;?></b>    

                                  <i class="fa fa-plus"></i>
                                  <i class="fa fa-minus"></i>

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

                                  <div class="tab-pane fade" id="return" role="tabpanel">
                                    <br/>
                                    <?php if($products->p_return_policy==TRUE){?>
                                    <div class="accordion_area">
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                        <div id="accordion" class="card__accordion">
                      <?php foreach (explode(', ',$products->p_return_policy) as $key1=>$rp_value){?>
                          <div class="card card_dipult">
                            <div class="card-header card_accor" id="headingOne">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseone<?=$rp_value;?>" aria-expanded="<?php if($key1=='0'){echo'true';}else{echo'false';}?>" aria-controls="collapseOne">
                              <b>  <?=policy($rp_value)->pp_title;?></b>    

                                  <i class="fa fa-plus"></i>
                                  <i class="fa fa-minus"></i>

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
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="product_d_tab_content">
                                        <p> <?=$products->p_short_description;?></p>
                                    </div>
                                    <div class="product_d_tab_content_inner">
                                        <div class="product_d_tab_content_item">
                                            <div class="samll_product_ratting">
                                            <ul>
                                               <li>Grade </li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a class="comment_form" href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                            </div>
                                             <strong>Posthemes</strong> 
                                             <p>09/07/2018</p>
                                        </div>
                                        <div class="product_d_tab_content_item">
                                            <strong>demo</strong>
                                            <p>That's OK!</p>
                                        </div>
                                    </div> 
                                    <div class="product_review_form">
                                        <form action="#">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                            <div class="samll_product_ratting review_rating">
                                               <span>Your rating</span>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="review_form_comment">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comment" id="review_comment" ></textarea>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="review_form_author">
                                                        <label for="author">Name</label>
                                                        <input id="author"  type="text">
                                                    </div>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="review_form_author">
                                                        <label for="email">Email </label>
                                                        <input id="email"  type="text">
                                                    </div>
                                                </div>  
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>   
                                    </div>   
                                       
                                </div>
                            </div>  

                        </div>
                    </div>   
                        
                </div>
            </div>
        </div>
        <!--product details tab end-->
        
        
       
        
        <!--Related_product start-->
        <div class="product_details_s_product mb-40 white">
            <div class="container">
                <div class="product_details_s_product_inner">
                    <div class="top_title p_details mb-10">
                            <h2>  Related Products</h2>
                        </div>
                    <div class="single_product__wrapper">

                        <div class="row">
                            <div class="details_s_product_active related_product owl-carousel">    <?php if($related_product==true){
                                   foreach ($related_product as $rlp_list) {?>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="single_product categorie">
                                        <div class="product_thumb">
                                        <a href="<?=base_url('product/').encode($rlp_list->p_id).'/'.slug($rlp_list->p_name);?>">
                                        <?php  if(!empty($rlp_list->pg_image)){ ?>
                                <img src="<?=base_url('seller/uploads/').$rlp_list->cate_slug.'/'.$rlp_list->scate_slug.'/'.$rlp_list->child_slug.'/'.explode(',',$rlp_list->pg_image)[0];?>" title="<?=$rlp_list->p_name;?>" class="hover-img">
                                            <?php }else{?>
                                         <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$rlp_list->p_name;?>" class="hover-img1">
                                     <?php }?>

                                            </a>
                                            
                                          

                                        </div>
                                        <div class="product_content">
                                            <div class="small_product_name" align="center">
                                  <a title="<?=$rlp_list->p_name;?>" href="<?=base_url('product/').encode($rlp_list->p_id).'/'.slug($rlp_list->p_name);?>" class="product_title"><?=$rlp_list->p_name;?></a>
                                                </div>
                                            <div class="samll_product_ratting" align="center">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                         <div class="small_product_price" style="text-align: center;">
                                                    <?php if(!empty($rlp_list->sp_special_price)){?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->sp_special_price);?> </span>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->p_selling_price);?>  </span>
                                                <?php }else{?>
                                                     <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($rlp_list->p_selling_price);?> </span><?php }?>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }}?>
                              
                                
                            </div>    
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <!--Related_product end
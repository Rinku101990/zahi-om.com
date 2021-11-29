<style type="text/css">
   span#select2-sp_pid-oc-container {
   line-height: 40px;
   }
   span.select2-selection.select2-selection--single {
   height: 40px;
   border: 1px solid #e8e7ea;
   border-radius: 4px !important;
   }
   .select2-container--default .select2-selection--single .select2-selection__rendered {
   color: #444;
   line-height: 35px;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow {
   height: 40px;
   position: absolute;
   top: 1px;
   right: 1px;
   width: 20px;
   }
   span.select2.select2-container.select2-container--default {
   width: 100% !important;
   height: 40px;
   }
   .input-group-addon {
   padding: .5rem .75rem;
   margin-bottom: 0;
   font-size: 1rem;
   font-weight: 400;
   line-height: 1.25;
   color: #b7bec5;
   text-align: center;
   border: 1px solid #e3ebf3;
   border-right: 1px solid #e3ebf3;
   border-radius: 0 .25rem .2rem 0; 
   }
   h3.card-title span {
   padding-bottom: 13px;
   color: #ff3a59;
   border-bottom: 1px solid red;
   }
   ul.category-list {
   border: 1px solid #d6d6d6;
   }
   ul.category-list li {
   display: block;
   margin: 0;
   padding: 10px;
   border-bottom: solid 1px #e8e7ea;
   font-size: 0.9em;
   }
   ul.category-list li a {
   color: #ea3a3c;
   font-weight: 500;
   font-size: 1rem;
   }
   .form-control {
   margin-bottom: 15px;   
   }
   span.red {
   color: #ff0000;
   }
   ul.booking-list li {
   padding: 4px 0;
   list-style: none;
   border-bottom: 1px solid #E3E3E3;
   }
   ul.booking-list li a {
   /* margin: 37px; */
   padding: 20px;
   color: #111;
   }
   ul.tab li {
   display: contents;
   }
   ul.tab li a {
   border-radius: 4px 4px 0 0;
   color: #353535;
   line-height: 45px;
   border: 1px solid #eee;
   padding: 10px 20px;
   background: #fff;
   }
   ul.tab li a.active, ul.tab li a:hover {
   background: #c59f64;
   color: #fff;
   }
</style>
<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap"> 
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
               <a href="<?=base_url('catalog/products');?>">
               <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Products </button>
               </a>   
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row product-tab"  style="display: block">
         <div class="col-xl-12 col-md-12 col-sm-12">
            <ul class="tab" style="margin-bottom: 9px;">
               <li>
                  <a href="javascript:void(0)" class="general-tab active">General</a>
               </li>
               <li>
                  <a href="javascript:void(0)" class="category-tab">Category Link</a>
               </li>
               <li style="<?php if($product->p_cate=='6')echo'display:none;';?>">
                  <a href="javascript:void(0)" class="option-tab">Option Groups </a>
               </li>
               <li>
                  <a href="javascript:void(0)"  class="inventory-tab">Inventory</a>
               </li>
               <li>
                  <a href="javascript:void(0)" class="warranty-tab">Warranty </a>
               </li>
               <li>
                  <a href="javascript:void(0)" class="return-tab">Return</a>
               </li>
               <li style="display:none">
                  <a href="javascript:void(0)"  class="special-tab">Special Price</a>
               </li>
               <li>
                  <a href="javascript:void(0)" class="discount-tab"> Discount</a>
               </li>
               <li>
                  <a href="javascript:void(0)" class="images-tab">Images</a>
               </li>
            </ul>
         </div>
      </div>
      <!-- General  -->
      <div class="row" id="general" style="display: block">
         <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="card-header" style="padding-bottom: 0px;">
                  <h3 class="card-title"><span>General Product</span></h3>
               </div>
               <div class="card-body">
                  <nav class="nav nav-tabs nav-justified" style="margin: 0 0 20px 0; background: #f2f3f8;">
                     <a class="nav-item nav-link active" data-toggle="tab" href="#English"><i class="fa fa-language"></i> English</a>
                     <a class="nav-item nav-link" data-toggle="tab" href="#Arabic"><i class="fa fa-language"></i> Arabic</a>
                  </nav>
                  <div class="account_login_form">
                     <div class="GeneralResponse"> </div>
                     <form id="GeneralProductForm" method="post" >
                        <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                        <div class="tab-content">
                           <div id="English" class="tab-pane active fade in">
                              <div class="row">
                                 <!-- <div class="col-sm-4 col-md-4">
                                    <label>Category <span class="red">*</span></label>
                                      <select name="p_cate" class="form-control p_cate">
                                       <option value="">-Select-</option>
                                       <?php if(!empty($category)){
                                       foreach ($category as $calist) {?>
                                         <option value="<?php echo $cateid=$calist->cate_id;?>" <?php if($product->p_cate==$cateid)echo'selected';?>><?=$calist->cate_name;?></option>
                                         <?php }
                                       }
                                       ?>
                                     </select>
                                     <span id="p_cate"></span>
                                     </div>
                                      <div class="col-sm-4 col-md-4">
                                    <label>Sub Category <span class="red">*</span></label>
                                      <select name="p_scate" class="form-control p_scate">
                                       <option value="">-Select-</option>
                                       <?php if(!empty($sub_category)){
                                       foreach ($sub_category as $scalist) {
                                         ?>
                                         <option value="<?php echo $scateid=$scalist->scate_id;?>" <?php if($product->p_scate==$scateid)echo'selected';?>><?=$scalist->scate_name;?></option>
                                         <?php }} ?>
                                     </select>
                                     <span id="p_scate"></span>
                                     </div>
                                    
                                    
                                      <div class="col-sm-4 col-md-4">
                                    <label>Child Category <span class="red">*</span></label>
                                      <select name="p_child" class="form-control p_child">
                                       <option value="">-Select-</option>
                                       <?php if(!empty($child_category)){
                                       foreach ($child_category as $chalist) {?>
                                         <option value="<?php echo $chateid=$chalist->child_id;?>" <?php if($product->p_child==$chateid)echo'selected';?>><?=$chalist->child_name;?></option>
                                         <?php }
                                       }
                                       ?>
                                     </select>
                                     <span id="p_child"></span>
                                     </div> -->
                                 <div class="col-sm-6 col-md-6">
                                    <label>Product Reference No. <span class="red">*</span></label>
                                    <input type="text" name="p_reference_no"  value="<?=$product->p_reference_no;?>" class="form-control pd_reference_no" readonly />
                                    <span id="reference_no"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Product Name <span class="red">*</span></label>
                                    <input type="text" name="p_name" class="form-control pd_name" value="<?=$product->p_name;?>">
                                    <span id="name"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Model <span class="red">*</span></label>
                                    <input type="text" name="p_model" class="form-control pd_model" value="<?=$product->p_model;?>">
                                    <span id="Model"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Seller <span class="red">*</span></label>
                                    <select name="p_vnd_id" class="form-control pd_brand Vendor">
                                       <option value="">-Select-</option>
                                       <?php if(!empty($seller)){
                                          foreach ($seller as $key => $b_list) {?>
                                       <option value="<?php echo $bid=$b_list->vnd_id;?>" <?php if($product->p_vnd_id==$bid)echo'selected';?>><?=$b_list->vnd_name;?></option>
                                       <?php }
                                          }
                                          ?>
                                    </select>
                                    <span id="Brand"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Brand <span class="red">*</span></label>
                                    <select name="p_brand" class="form-control p_brand ">
                                       <option value="">-Select- </option>
                                       <?php if(!empty($brand)){
                                          foreach ($brand as $bl_list) {
                                            if($bl_list->vnd_id==$product->p_vnd_id){
                                              ?>
                                       <option value="<?php echo $blid=$bl_list->brd_id;?>" <?php if($product->p_brand==$blid)echo'selected';?>><?=$bl_list->brd_name;?></option>
                                       <?php } }
                                          }
                                           ?>
                                    </select>
                                 </div>

                                 <div class="col-sm-6 col-md-6">
                                    <label class="form-label" style="margin-top: 21px !important">Price Type <span class="text-red">*</span></label>
                                    <div class="form-group">    
                                    <?php if(!empty($special_price)){?>    
                                      <input type="radio" class="form-control1" name="price_type" value="0"  <?php if($special_price->sp_price_type=='0'){echo 'checked';}else{echo "";}?>> Flat  &nbsp;
                                      <input type="radio" class="form-control1" name="price_type" value="1"  <?php if($special_price->sp_price_type=='1'){echo 'checked';}else{echo "";}?>> Percentage 
                                      <?php }else{ ?>
                                      <input type="radio" class="form-control1" name="price_type" value="0"  checked> Flat  &nbsp;
                                      <input type="radio" class="form-control1" name="price_type" value="1" > Percentage 
                                      <?php } ?>
                                    </div>
                                </div>

                                 <div class="col-sm-6 col-md-6">
                                    <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                    <input type="number" name="p_selling_price" onkeyup="selling_price(this.value,'int_selleing_price')" class="form-control pd_selling_price" value="<?=$product->p_selling_price;?>"  >
                                    <span id="pd_price"></span>
                                 </div>
                                 <!-- <div class="col-sm-6 col-md-6">
                                    <label>Special Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                    <input type="number" name="sp_special_price" placeholder="Special Price" value="<?=$special_price->sp_special_price;?>" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" class="form-control"  >
                                  </div> -->
                                  <div class="col-sm-6 col-md-6">
                                    <label>Sale Price [<?=currency($this->website->web_currency);?>] </label>
                                    <input type="number" name="p_sp_special_price1"  class="form-control pd_sp_special_price1" value="<?=@$special_price->sp_special_price;?>"  onkeypress="return special_price1(event);">
                                    <span id="special_price1"></span>
                                 </div>
                              </div>
                              <div class="row" style=" margin-top: 20px;">
                                 
                                 <div class="col-sm-6 col-md-6">
                                    <label>From Date </label>
                                    <div class="input-group date">
                                       <input type="text" name="p_from"  value="<?=@$special_price->sp_start_date;?>"  class="form-control pd_from" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>To Date</label>
                                    <div class="input-group date">
                                       <input type="text" name="p_to" value="<?=@$special_price->sp_end_date;?>"  class="form-control pd_to" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id='cloth-product' style="  <?php if($product->p_cate!='6')echo'display:none;';?>margin-top: 20px;">
                                 <div class="col-sm-6 col-md-6">
                                    <label>Fabric <span class="red"></span></label>
                                    <input type="text" name="p_fabric" value="<?=$product->p_fabric;?>" class="form-control pd_fabric"  />
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>&nbsp; <span class="red"></span></label><br/>
                                    Belt Include : <input type="checkbox" name="p_belt" value="1" <?php if($product->p_belt=='1')echo'checked';?> /><br>
                                    Scarf Include : <input type="checkbox" name="p_sarf" value="1" <?php if($product->p_sarf=='1')echo'checked';?> //>
                                 </div>
                              </div>
                              <div class="row" id='other-product' style=" <?php if($product->p_cate=='6')echo'display:none;';?> margin-top: 20px;">
                                 <div class="col-sm-6 col-md-6">
                                    <label>Dimensions Unit <span class="red"></span></label>
                                    <select name="p_dimensions" class="form-control pd_dimensions">
                                       <option value="">-Select-</option>
                                       <?php if(!empty($unit)){
                                          foreach ($unit as $key => $ud_list) {
                                          	 if(empty($ud_list->ut_weight_name)){?>
                                       <option value="<?php echo $uid=$ud_list->ut_id;?>"  <?php if($product->p_dimensions==$uid)echo'selected';?>><?=$ud_list->ut_dime_name;?></option>
                                       <?php }} }
                                          ?>
                                    </select>
                                    <span id="Dimensions"></span>
                                 </div>
                                 <!--   
                                    <div class="col-sm-6 col-md-6">
                                    <label>Shoulder <span class="red"></span></label>
                                    <input type="number" name="p_shoulder"  value="<?=$product->p_shoulder;?>" class="form-control pd_shoulder"  />
                                    <span id="p_shoulder"></span>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    <label>Wrist <span class="red"></span></label>
                                    <input type="number" name="p_wrist" value="<?=$product->p_wrist;?>" class="form-control pd_wrist"  />
                                    <span id="p_wrist"></span>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    <label>Waist <span class="red"></span></label>
                                    <input type="number" name="p_waist" value="<?=$product->p_waist;?>" class="form-control pd_waist"  />
                                    <span id="p_waist"></span>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    <label>Hips <span class="red"></span></label>
                                    <input type="number" name="p_hips" value="<?=$product->p_hips;?>" class="form-control pd_hips"  />
                                    <span id="p_hips"></span>
                                    </div> -->
                                 <div class="col-sm-6 col-md-6">
                                    <label>Length <span class="red"></span></label>
                                    <input type="text" name="p_lenght" class="form-control pd_lenght" value="<?=$product->p_lenght;?>" onkeypress="return pd_length(event);" />
                                    <span id="Length"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Width <span class="red"></span></label>
                                    <input type="text" name="p_width" class="form-control pd_width" value="<?=$product->p_width;?>" onkeypress="return getwidth(event);" />
                                    <span id="Width"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Height <span class="red"></span></label>
                                    <input type="text" name="p_height" class="form-control pd_height" value="<?=$product->p_height;?>" onkeypress="return getheight(event);" />
                                    <span id="Height"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Unit <span class="red"></span></label>
                                    <div class="row gutters-xs">
                                       <div class="col-8">
                                          <input type="text" name="p_weight" value="<?=$product->p_weight;?>" class="form-control pd_weight" onkeypress="return weight(event);" />
                                       </div>
                                       <div class="col-4">
                                          <select name="p_weigth_unit" class="form-control pd_weigth_unit">
                                             <!--   <option value="">-Select-</option> -->
                                             <?php if(!empty($unit)){
                                                foreach ($unit as $key => $ud_list) {
                                                   if(empty($ud_list->ut_dime_name)){?>
                                             <option value="<?php echo $getuid=$ud_list->ut_id;?>" <?php if($product->p_weigth_unit==$getuid)echo'selected';?>><?=$ud_list->ut_weight_name;?></option>
                                             <?php }} }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                    <span id="WeigthUnit"></span>
                                    <span id="Weight"></span>
                                 </div>
                                 <input type="hidden" name="p_cod" class="form-control" value="0" />
                                 <!--   <div class="col-sm-6 col-md-6">
                                    <label>Available for Cash on Delivery (COD)</label>
                                    <select name="p_cod"  class="form-control">
                                     <option value="1" <?php if($product->p_cod=='1')echo'selected';?>>Yes</option>
                                     <option value="0" <?php if($product->p_cod=='0')echo'selected';?>>No</option>
                                    </select> 
                                    </div> -->
                                 <div class="col-sm-6 col-md-6">
                                    <label>Ean/upc Code (Barcode) </label>
                                    <input type="text" name="p_barcode" class="form-control pd_barcode" value="<?=$product->p_barcode;?>"  />
                                 </div>
                              </div>
                              <div class="row"  style=" margin-top: 20px;">
                                 <div class="col-sm-4 col-md-4">
                                    <label>Featured Product</label><br/>
                                    <div class="custom-controls-stacked"> 
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_feature" value="0" <?php if($product->p_feature=='0')echo'checked';?>> <span class="custom-control-label">No</span> </label> &nbsp;
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_feature" value="1" <?php if($product->p_feature=='1')echo'checked';?>> <span class="custom-control-label">Yes</span> </label>
                                    </div>
                                    <span id="feature"></span>
                                 </div>
                                 <div class="col-sm-4 col-md-4">
                                    <label>Trending Product</label><br/>
                                    <div class="custom-controls-stacked"> 
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_trending" value="0" <?php if($product->p_trending=='0')echo'checked';?>> <span class="custom-control-label">No</span> </label> &nbsp;
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_trending" value="1" <?php if($product->p_trending=='1')echo'checked';?>> <span class="custom-control-label">Yes</span> </label>
                                    </div>
                                    <span id="trending"></span>
                                 </div>
                                 <div class="col-sm-4 col-md-4">
                                    <label>Best Selling </label><br/>
                                    <div class="custom-controls-stacked"> 
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_eid" value="0" <?php if($product->p_eid=='0')echo'checked';?>> <span class="custom-control-label">No</span> </label> &nbsp;
                                       <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_eid" value="1" <?php if($product->p_eid=='1')echo'checked';?>> <span class="custom-control-label">Yes</span> </label>
                                    </div>
                                    <span id="eid"></span>
                                 </div>
                                 <div class="col-sm-12 col-md-12">
                                    <label>Short Decsription <span class="red">*</span></label>
                                    <textarea name="p_short_description" class="form-control pd_short_description" style="height:100px"><?=$product->p_short_description;?></textarea>
                                    <span id="ShortDesc"></span>
                                 </div>
                                 <div class="col-sm-12 col-md-12">
                                    <label>Decsription <span class="red"></span></label>
                                    <textarea rows="5" name="p_description" class="form-control pd_description" id="summernote" style="height:100px"><?=$product->p_description;?></textarea>
                                    <span id="LongDesc"></span>
                                 </div>
                                 <div class="col-sm-12 col-md-12"><br>
                                    <label>Meta Title <span class="red">*</span></label>
                                    <textarea name="p_meta_title" class="form-control" ><?=$product->p_meta_title;?></textarea>
                                 </div>
                                 <div class="col-sm-12 col-md-12"><br>
                                    <label>Meta Keyword <span class="red">*</span></label>
                                    <textarea name="p_meta_keyword" class="form-control" ><?=$product->p_meta_keyword;?></textarea>
                                 </div>
                                 <div class="col-sm-12 col-md-12"><br>
                                    <label>Meta Description <span class="red">*</span></label>
                                    <textarea name="p_meta_description" class="form-control" ><?=$product->p_meta_description;?></textarea>
                                 </div>
                              </div>
                           </div>
                           <div id="Arabic" class="tab-pane fade">
                              <div class="row">
                                 <div class="col-sm-6 col-md-6">
                                    <label>Product Name <span class="red">*</span></label>
                                    <input type="text" name="p_name_ar" value="<?=$product->p_name_ar;?>" class="form-control pd_name_ar" style="text-align: right;
                                       direction:RTL;">
                                    <span id="name_ar"></span>
                                 </div>
                                 <div class="col-sm-6 col-md-6">
                                    <label>Model <span class="red">*</span></label>
                                    <input type="text" name="p_model_ar" value="<?=$product->p_model_ar;?>" class="form-control pd_model_ar" style="text-align: right;direction:RTL;">
                                    <span id="Model_ar"></span>
                                 </div>
                                 <div class="col-sm-12 col-md-12"><br>
                                    <label>Short Decsription <span class="red">*</span></label>
                                    <textarea name="p_short_description_ar" class="form-control pd_short_description_ar" style="height:100px;text-align: right;direction:RTL;"><?=$product->p_short_description_ar;?></textarea>
                                    <span id="ShortDesc_ar"></span>
                                 </div>
                                 <div class="col-sm-12 col-md-12">
                                    <label>Decsription <span class="red"></span></label>
                                    <textarea rows="5" name="p_description_ar" class="form-control pd_description_ar" id="summernote2" style="height:100px;text-align: right;direction:RTL;"><?=$product->p_description_ar;?></textarea>
                                    <span id="LongDesc_ar"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="save_button primary_btn default_button">
                           <button type="button" class="btn btn-primary btn2 GeneralProduct_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save </button>
                           <button type="button" class="btn btn-secondary btn2 product_next" > Next <i class="fa fa-angle-double-right"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Product Category  add -->
      <div class="row" id="product_category_link" style="display: none">
         <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="card-header" style="padding-bottom: 0px;">
                  <h3 class="card-title"><span>Product Category Link</span></h3>
               </div>
               <div class="card-body">
                  <div class="account_login_form">
                     <div class="CategoryResponse"> </div>
                     <form id="CategoryProductForm"  method="post" >
                        <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                        <input type="hidden" name="url" class="current_url" value="<?=base_url();?>">
                        <div class="row">
                           <div class="col-sm-6 col-md-6">
                              <label>Product Category <span class="red">*</span></label>
                              <input type="text" name="p_category_link" class="form-control p_category_link" url="<?=base_url();?>" onkeyup="categorylinkSearch();" >
                              <div id="CategorylinkList" class="col-md-12" style="position: absolute;top: 28%;z-index: 100;left: 0;right: auto; ">
                                 <div id="autoCategorylinkList"></div>
                              </div>
                              <span id="PCategorylink"></span>
                              <span id="Category_link">
                                 <?php  if($product_link->p_child){ 
                                    $getchild=explode(', ',$product_link->p_child);  
                                     foreach($getchild AS $c_list){
                                     	if(!empty($c_list)){?>
                                 <p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="<?=$c_list;?>" category="child"><i class="fa fa-remove"></i></a> <?=child_category_name($c_list);?> &nbsp;</p>
                                 <?php }}} if($product_link->p_scate){
                                    $getsub=explode(', ',$product_link->p_scate);
                                         foreach($getsub AS $s_list){
                                         	if(!empty($s_list)){?>
                                 <p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="<?=$s_list;?>" category="sub"><i class="fa fa-remove"></i></a> <?=sub_category_name($s_list);?> &nbsp;</p>
                                 <?php }}} if($product_link->p_cate){
                                    $getcate=explode(', ',$product_link->p_cate); 
                                        foreach($getcate AS $ct_list){
                                        	if(!empty($ct_list)){?>
                                 <p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="<?=$ct_list;?>" category="cate"><i class="fa fa-remove"></i></a> <?=category_name($ct_list);?> &nbsp;</p>
                                 <?php }}}?>
                              </span>
                           </div>
                           <div class="col-sm-6 col-md-6">
                              <label>Product Tag <span class="red">*</span></label>
                              <textarea name="p_tag" class="form-control p_tag" ><?=$product_link->p_tag;?></textarea>
                              <span id="PTag"></span>
                           </div>
                        </div>
                        <br>
                        <div class="save_button primary_btn default_button">
                           <button type="button" class="btn btn-primary btn2 <?php if($product->p_cate=='6'){echo'CategoryProduct_update1';}else{echo'CategoryProduct_update';}?> " url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                           <button type="button" class="btn btn-secondary btn2 product_link_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                           <button type="button" class="btn btn-secondary btn2 <?php if($product->p_cate=='6'){echo'product_link_next1';}else{echo'product_link_next';}?>" > Next <i class="fa fa-angle-double-right"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Product Option Groups Add -->
      <div class="row" id="option_add" style="display: none">
         <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="card-header" style="padding-bottom: 0px;">
                  <h3 class="card-title"><span>Product Option Groups Add</span></h3>
               </div>
               <div class="card-body">
                  <div class="account_login_form">
                     <div class="OptionGroupResponse"> </div>
                     <form id="OptionGroupProductForm"  method="post" >
                        <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                        <div class="row">
                           <div class="col-sm-6 col-md-6">
                              <label>Product Option Groups <span class="red"></span></label>
                              <select name="p_option_group[]" class="form-control select2 w-100 select2-hidden-accessible p_option" multiple="" data-placeholder="Select Option Groups" tabindex="-1" aria-hidden="true">
                                 <option value="">Select</option>
                                 <?php $getoptgroup=explode(', ',$product_link->p_option_group); 
                                    if(!empty($option1)){
                                     foreach($option1 as $opt_list1){?>    
                                 <option value="<?php echo $opt_list1['opt_id'];?>" <?php if(in_array($opt_list1['opt_id'],$getoptgroup)){echo "selected";}?>><?php echo $opt_list1['opt_name'];?></option>
                                 <?php } }?>
                              </select>
                              <span id="POption"></span>
                           </div>
                        </div>
                        <br>
                        <div class="save_button primary_btn default_button">
                           <button type="button" class="btn btn-primary btn2 OptionProduct_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                           <button type="button" class="btn btn-secondary btn2 product_option_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                           <button type="button" class="btn btn-secondary btn2 product_option_next" > Next <i class="fa fa-angle-double-right"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- inventory_setup  add -->
      <div class="row" id="inventory_setup" style="display: none;">
         <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="card-header" style="padding-bottom: 0px;">
                  <h3 class="card-title"><span>Product Inventory Setup</span></h3>
               </div>
               <div class="card-body">
                  <div class="account_login_form">
                     <div class="InventoryResponse"> </div>
                     <form id="InventoryProductForm"  method="post" >
                        <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                        <div class="row">
                           <span id="optiongroup_add" style="padding-right: 0;display: contents;">
                              <?php $getoptgroup=explode(', ',$product_link->p_option_group); 
                                 $option_grop_value=explode(', ',$product_link->option_grop);
                                 
                                 if(in_array('1',$getoptgroup) || in_array('2',$getoptgroup) || in_array('4',$getoptgroup) || in_array('5',$getoptgroup) || in_array('6',$getoptgroup) || in_array('7',$getoptgroup) || in_array('9',$getoptgroup) || in_array('10',$getoptgroup) || in_array('11',$getoptgroup)){?>
                              <div class="col-sm-12 col-md-12"><a href="javascript:void(0);" class="btn btn-default add_size pull-right" onclick="add_size(this)" title="Add field" style="margin-bottom:20px"><i class="fa fa-plus"></i> Add</a></div>
                              <?php  }
                                 foreach($option as $key=> $opt_list){
                                  
                                 
                                 
                                 if($opt_list->opt_id != '3'){
                                 if(in_array($opt_list->opt_id,$getoptgroup)){
                                 if($opt_list->opt_id=='2' || $opt_list->opt_id=='4' || $opt_list->opt_id=='5' || $opt_list->opt_id=='6' || $opt_list->opt_id=='7' || $opt_list->opt_id=='9' || $opt_list->opt_id=='11'){ $field_name="size[]"; $field_name1="int_size";}elseif($opt_list->opt_id=='1'){ $field_name="color[]"; $field_name1="int_color";}elseif($opt_list->opt_id=='10'){ $field_name="intsize[]"; $field_name1="size";}else{ $field_name="option_grop[]";  }
                                 ?>   
                              <div class="col-sm-3 col-md-3">
                                 <label><?php echo $opt_list->opt_name;?> </label>
                                 <input type="hidden" name="option_grop_add[]" class="form-control option_grop_add" value="<?=$opt_list->opt_id;?>">
                                 <?php if(empty($opt_list->opt_value)){ ?>
                                 <input type="text" name="option_grop[]" class="form-control option_grop" value="<?=@$option_grop_value[$key];?>" >
                                 <?php }else{?>
                                 <select name="<?=$field_name;?>" class="form-control option_grop">
                                    <option value="">Select <?php echo $opt_list->opt_name; ?></option>
                                    <?php 
                                       foreach(explode(', ',$opt_list->opt_value) as $opt_val){?>    
                                    <option value="<?php echo $getopt_val=$opt_val;?>" <?php if(@$inventory[0]->$field_name1==$getopt_val)echo'selected';?> ><?php echo $opt_val; if($opt_list->opt_id=='5')echo"''";?></option>
                                    <?php } ?>
                                 </select>
                                 <?php }?>
                              </div>
                              <?php  if($opt_list->opt_id=='5' || $opt_list->opt_id=='6'){?>
                              <div class="col-sm-3 col-md-3">
                                 <label>Size<span class="red"></span></label>
                                 <select name="intsize[]" class="form-control ">
                                    <option value="">Select Size</option>
                                    <?php $get_option1=explode(', ',option(2)->opt_value);
                                       foreach ($get_option1 as $opt_value){?>
                                    <option value="<?=$opt_value;?>" <?php if(@$inventory[0]->size==$opt_value)echo'selected';?> ><?=$opt_value;?></option>
                                    <?php }?>
                                 </select>
                              </div>
                              <?php }?>
                              <?php  if($opt_list->opt_id=='5' || $opt_list->opt_id=='2'  || $opt_list->opt_id=='6'){?>
                              <div class="col-sm-1 col-md-1"><label style="width:100%">Custom</label>
                                 <input type="checkbox" name="int_custom[]" class="form-control int_custom" value="1" <?php if(@$inventory[0]->int_custom=='1')echo'checked';?> style="width:40px">
                              </div>
                              <?php }?>
                              <?php }
                                 } 
                                 }
                                  ?>
                           </span>
                           <!--  <div class="col-sm-2 col-md-2">
                              <label>Cost Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                              <input type="text" name="int_cost_price" value="<?=@$inventory->int_cost_price;?>" class="form-control int_cost_price"  onkeypress="return cost(event);" >
                              <span id="cost_price"></span>
                              </div> -->
                           <div class="col-sm-3 col-md-3">
                              <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                              <input type="text" name="int_selleing_price[]" value="<?php if(empty($inventory[0]->int_selleing_price)){echo $product->p_selling_price;}else{ echo $inventory[0]->int_selleing_price;}?>"  class="form-control int_selleing_price" id="int_selleing_price" readonly="" >
                              <span id="selleing_price"></span>
                           </div>
                           <div class="col-sm-3 col-md-3">
                              <label>Available Quantity <span class="red">*</span></label>
                              <input type="text" name="int_available_qty[]"  value="<?=@$inventory[0]->int_available_qty;?>" onkeypress="return available(event);"  class="form-control int_available_qty" >
                              <span id="available_qty"></span>
                           </div>
                           <div class="col-sm-3 col-md-3">
                              <label>Maintain Stock Level<span class="red"></span></label>
                              <select data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock">
                                 <option value="1" <?php if(@$inventory[0]->int_stock=='1')echo'selected';?>>Yes</option>
                                 <option value="2" <?php if(@$inventory[0]->int_stock=='2')echo'selected';?>>No</option>
                              </select>
                              <span id="intstock"></span>
                           </div>
                           <div class="col-sm-3 col-md-3">
                              <label>Product Condition <span class="red"></span></label>
                              <select  name="int_condition[]" class="form-control int_condition ">
                                 <option value="0" <?php if(@$inventory[0]->int_condition=='0')echo'selected';?>>New</option>
                                 <option value="1" <?php if(@$inventory[0]->int_condition=='1')echo'selected';?>>Used</option>
                                 <option value="2" <?php if(@$inventory[0]->int_condition=='2')echo'selected';?>>Refurbished</option>
                              </select>
                              <span id="intcondition"></span>
                           </div>
                        </div>
                        <span id="size_field" style="padding-right: 0;display: contents;">
                           <?php @$count=count($inventory);
                              if(@$count >='2'){
                                foreach($inventory as $key=> $int_val){
                                  if(in_array('2',$getoptgroup)){ $fld_name="Size";$keys=1;}elseif(in_array('4',$getoptgroup)){ $fld_name="Shoes Sizes";$keys=3;}elseif(in_array('5',$getoptgroup)){ $fld_name="Abaya Size";$keys=4;}elseif(in_array('6',$getoptgroup)){ $fld_name="Jalabiya Size";$keys=5;}elseif(in_array('7',$getoptgroup)){ $fld_name="Ring Size";$keys=6;}elseif(in_array('9',$getoptgroup)){ $fld_name="Perfumes Size";$keys=7;}elseif(in_array('10',$getoptgroup)){ $fld_name="Diffusers";$keys=8;}
                              
                                    if($key !='0'){?>
                           <span id="sizefield<?=$key;?>" style="  width:100%;  display: inherit;">
                              <div class="row">
                                 <?php  if(in_array('1',$getoptgroup)){?>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Color </label>              
                                    <select name="color[]" class="form-control  option_grop">
                                       <option value="">Select color</option>
                                       <?php 
                                          foreach(explode(', ',$option[0]->opt_value) as $opt_val){?>    
                                       <option value="<?php echo $getopt_val=$opt_val;?>" <?php if($int_val->int_color==$getopt_val)echo'selected';?> ><?php echo $opt_val;?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <?php }else{?>
                                 <div class="col-sm-3 col-md-3">
                                    <label><?=$fld_name;?> </label>              
                                    <select name="size[]" class="form-control  option_grop">
                                       <option value="">Select <?=$fld_name;?></option>
                                       <?php 
                                          foreach(explode(', ',$option[$keys]->opt_value) as $opt_val){?>    
                                       <option value="<?php echo $getopt_val=$opt_val;?>" <?php if($int_val->int_size==$getopt_val)echo'selected';?> ><?php echo $opt_val; if($opt_list->opt_id=='5')echo"''";?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <?php } if(in_array('1',$getoptgroup) && in_array('2',$getoptgroup) || in_array('1',$getoptgroup) && in_array('4',$getoptgroup) || in_array('1',$getoptgroup) && in_array('5',$getoptgroup) || in_array('1',$getoptgroup) && in_array('6',$getoptgroup)){?>
                                 <div class="col-sm-3 col-md-3">
                                    <label><?=$fld_name;?> </label>              
                                    <select name="size[]" class="form-control  option_grop">
                                       <option value="">Select <?=$fld_name;?></option>
                                       <?php 
                                          foreach(explode(', ',$option[$keys]->opt_value) as $opt_val){?>    
                                       <option value="<?php echo $getopt_val=$opt_val;?>" <?php if($int_val->int_size==$getopt_val)echo'selected';?> ><?php echo $opt_val; if($opt_list->opt_id=='5')echo"''";?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <?php }?>
                                 <!--    <?php if($opt_list->opt_id=='5'){?>
                                    <td><label>Custom</label>              
                                     <input type="checkbox" name="int_custom[]" class="form-control int_custom" value="1" <?php if($int_val->int_custom=='1')echo'checked';?>>
                                    </td>
                                    <?php }?> -->
                                 <?php if(in_array('5',$getoptgroup) || in_array('6',$getoptgroup)){?>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Size</label>              
                                    <select name="intsize[]" class="form-control ">
                                       <option value="">Select Size</option>
                                       <?php $get_option1=explode(', ',option(2)->opt_value);
                                          foreach ($get_option1 as $opt_value){?>
                                       <option value="<?=$opt_value;?>" <?php if($int_val->size==$opt_value)echo'selected';?> ><?=$opt_value;?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                                 <?php }?>
                                 <?php if(in_array('10',$getoptgroup)){?>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Diffusers</label>              
                                    <select name="intsize[]" class="form-control ">
                                       <option value="">Select Diffusers</option>
                                       <?php $get_option1=explode(', ',option(10)->opt_value);
                                          foreach ($get_option1 as $opt_value){?>
                                       <option value="<?=$opt_value;?>" <?php if($int_val->size==$opt_value)echo'selected';?> ><?=$opt_value;?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                                 <?php }?>
                                 <div class="col-sm-3 col-md-3"><label>Selling Price [OMR]</label>              
                                    <input type="number" name="int_selleing_price[]" class="form-control int_selleing_price" value="<?=$int_val->int_selleing_price;?>">
                                 </div>
                                 <div class="col-sm-3 col-md-3"><label>Available Quantity</label>   <input type="text" name="int_available_qty[]" onkeypress="return available(event);" class="form-control int_available_qty" value="<?=$int_val->int_available_qty;?>">
                                 </div>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Maintain Stock Level</label>
                                    <select data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock">
                                       <option value="1" <?php if($int_val->int_stock=='1')echo'selected';?>>Yes</option>
                                       <option value="2" <?php if($int_val->int_stock=='2')echo'selected';?>>No</option>
                                    </select>
                                 </div>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Product Condition</label>  
                                    <select name="int_condition[]" class="form-control int_condition ">
                                       <option value="0" <?php if($int_val->int_condition=='0')echo'selected';?>>New</option>
                                       <option value="1" <?php if($int_val   ->int_condition=='1')echo'selected';?>>Used</option>
                                       <option value="2" <?php if($int_val->int_condition=='2')echo'selected';?>>Refurbished</option>
                                    </select>
                                 </div>
                                 <div class="col-sm-3 col-md-3">
                                    <label>&nbsp;</label><a href="javascript:void(0);" class="btn btn-default  pull-right" onclick="remove_size(<?=$key;?>,this)" style="    margin-top: 12px;"><i class="fa fa-close"></i> Remove</a>
                                    </td>
                                 </div>
                              </div>
                           </span>
                           <?php }}}?>
                        </span>
                  </div>
                  <br>
                  <div class="save_button primary_btn default_button">
                  <button type="button" class="btn btn-primary btn2 Inventory_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                  <button type="button" class="btn btn-secondary btn2 Inventory_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                  <button type="button" class="btn btn-secondary btn2 Inventory_next" > Next <i class="fa fa-angle-double-right"></i></button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- inventory_setup  add -->
   <div class="row" id="inventory_setup2" style="display: none">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Inventory Setup</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="InventoryResponse"> </div>
                  <form id="InventoryProductCLothForm"  method="post" >
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <input type="hidden" name="int_min_purchase_qty" value="1">
                     <div class="row">
                        <div class="col-sm-2 col-md-2">
                           <label>Size  <span class="red">*</span></label>
                        </div>
                        <div class="col-sm-2 col-md-2">
                           <input type="radio" name="custom" value="1" class="int_custom sizechecked" <?php if(@$inventory[0]->int_custom=='1')echo'checked';?>> Custom<br/>
                           <input type="radio" name="custom" value="2" class="int_custom sizechecked" <?php if(@$inventory[0]->int_custom!='1')echo'checked';?> > Size <span class="getsize">
                           <?php if($product->p_scate=='18'){echo'/ Abaya Length';}elseif($product->p_scate=='19'){echo'/ Jalabiya Size';}?>
                           </span>
                        </div>
                        <span id="Dimensions_add" style="<?php if(@$inventory[0]->int_custom!='1')echo'display: none;';?>width: 100%; margin-top: 20px;">
                           <div class="row">
                              <div class="col-sm-3 col-md-3">
                                 <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                 <input type="text" name="cust_selleing_price[]" value="<?=@$inventory[0]->int_selleing_price;?>" id="int_selleing_price2" class="form-control int_selleing_price"  >
                                 <span id="selleing_price"></span>
                              </div>
                              <div class="col-sm-3 col-md-3">
                                 <label>Available Quantity <span class="red">*</span></label>
                                 <input type="text" name="cust_available_qty[]" value="<?=@$inventory[0]->int_available_qty;?>" onkeypress="return available(event);" class="form-control int_available_qty">
                                 <span id="available_qty"></span>
                              </div>
                              <div class="col-sm-3 col-md-3">
                                 <label>Color <span class="red">*</span></label>
                                 <select name="cust_color[]" class="form-control int_color">
                                    <option value="">Select Color</option>
                                    <?php foreach(explode(', ',$option[0]->opt_value) as $clr){?>
                                    <option value="<?=$clr;?>" <?php if(@$inventory[0]->int_color==$clr)echo'selected';?>><?=$clr;?></option>
                                    <?php }?>
                                 </select>
                                 <span id="int_color"></span>
                              </div>
                              <div class="col-sm-3 col-md-3">
                                 <label style="width: 100%">&nbsp;</label>
                                 <a href="javascript:void(0);" class="btn btn-default add_Dimensions " title="Add field" onclick="add_Dimensions(this)" style="margin-bottom:20px"><i class="fa fa-plus"></i> Add</a>
                              </div>
                           </div>
                           <?php if(@$inventory[0]->int_custom=='1' && !empty($inventory)){
                              $count1=count($inventory);
                              if(@$count1 >='1'){
                               
                                foreach(array_splice($inventory,1) as $key=> $int_val){?>
                           <span id="dimensionsfield2<?=$key+2;?>">
                              <div class="row">
                                 <div class="col-sm-3 col-md-3">
                                    <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                    <input type="text" name="cust_selleing_price[]" value="<?=$int_val->int_selleing_price;?>" id="int_selleing_price2" class="form-control int_selleing_price"   >
                                    <span id="selleing_price"></span>
                                 </div>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Available Quantity <span class="red">*</span></label>
                                    <input type="text" name="cust_available_qty[]" value="<?=$int_val->int_available_qty;?>" onkeypress="return available(event);" class="form-control int_available_qty">
                                    <span id="available_qty"></span>
                                 </div>
                                 <div class="col-sm-3 col-md-3">
                                    <label>Color <span class="red">*</span></label>
                                    <select name="cust_color[]" class="form-control int_color">
                                       <option value="">Select Color</option>
                                       <?php foreach(explode(', ',$option[0]->opt_value) as $clr){?>
                                       <option value="<?=$clr;?>" <?php if($int_val->int_color==$clr)echo'selected';?>><?=$clr;?></option>
                                       <?php }?>
                                    </select>
                                    <span id="int_color"></span>
                                 </div>
                                 <div class="col-sm-2 col-md-2"><label style="width:100%">&nbsp;</label><a href="javascript:void(0);" class="btn btn-default  " onclick="remove_dimensions(<?=$key+2;?>,this)"><i class="fa fa-close"></i> Remove</a></div>
                              </div>
                           </span>
                           <?php }}}?>
                           <span id="dimensions_filed"></span>
                           <div class="row">
                              <div class="col-sm-2 col-md-2">
                                 <label>Dimensions  <span class="red">*</span></label>
                              </div>
                              <div class="col-sm-5 col-md-5">
                                 <input type="checkbox" name="length" value="1"  <?php if(@$inventory[0]->length=='1')echo'checked';?>> Length<br/>
                                 <input type="checkbox" name="waist" value="1" <?php if(@$inventory[0]->waist=='1')echo'checked';?>> Waist  <br/>
                                 <input type="checkbox" name="shoulder" value="1" <?php if(@$inventory[0]->shoulder=='1')echo'checked';?> > Shoulder<br/>
                                 <input type="checkbox" name="hips" value="1" <?php if(@$inventory[0]->hips=='1')echo'checked';?>> Hips  <br/>
                                 <input type="checkbox" name="sleeve_length" value="1" <?php if(@$inventory[0]->sleeve_length=='1')echo'checked';?> > Sleeve Length<br/>
                                 <input type="checkbox" name="neck" value="1" <?php if(@$inventory[0]->neck=='1')echo'checked';?>> Sleeve form the neck  <br/>
                                 <input type="checkbox" name="chest" value="1" <?php if(@$inventory[0]->chest=='1')echo'checked';?>> Chest  <br/>
                              </div>
                           </div>
                           <br/>
                        </span>
                        <span id="Size_add" style="<?php if(@$inventory[0]->int_custom=='1')echo'display: none;';?>width: 100%; margin-top: 20px; ">
                           <div class="row">
                              <div class="col-sm-2 col-md-2">
                                 <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                 <input type="text" name="int_selleing_price[]" id="int_selleing_price3" class="form-control int_selleing_price" value="<?=@$inventory[0]->int_selleing_price;?>"  >
                                 <span id="selleing_price"></span>
                              </div>
                              <div class="col-sm-2 col-md-2">
                                 <label>Available Quantity <span class="red">*</span></label>
                                 <input type="text" name="int_available_qty[]" value="<?=@$inventory[0]->int_available_qty;?>" onkeypress="return available(event);" class="form-control int_available_qty">
                                 <span id="available_qty"></span>
                              </div>
                              <span class="SizeColumn" style=" width: 16.66666667%;">
                                 <?php if($product->p_scate=='18'){?>
                                 <div class="col-sm-2 col-md-2" style="    max-width: 100%;">
                                    <label><?=$option[4]->opt_name;?><span class="red">*</span></label>
                                    <select name="size[]" class="form-control size">
                                       <option value="">Select Abaya Length</option>
                                       <?php foreach(explode(', ',$option[4]->opt_value) as $val){?>
                                       <option value="<?=$val;?>" <?php if(@$inventory[0]->int_size==$val)echo'selected';?>><?=$val;?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                                 <?php }elseif($product->p_scate=='19'){?>
                                 <div class="col-sm-2 col-md-2" style="    max-width: 100%;">
                                    <label><?=$option[5]->opt_name;?><span class="red">*</span></label>
                                    <select name="size[]" class="form-control size">
                                       <option value="">Select Abaya Length</option>
                                       <?php foreach(explode(', ',$option[5]->opt_value) as $val){?>
                                       <option value="<?=$val;?>" <?php if(@$inventory[0]->int_size==$val)echo'selected';?>><?=$val;?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                                 <?php }?>
                              </span>
                              <div class="col-sm-2 col-md-2">
                                 <label>Size <span class="red">*</span></label>
                                 <select name="int_size[]" class="form-control int_size">
                                    <option value="">Select Size</option>
                                    <?php foreach(explode(', ',$option[1]->opt_value) as $sz){?>
                                    <option value="<?=$sz;?>" <?php if(@$inventory[0]->size==$sz)echo'selected';?>><?=$sz;?></option>
                                    <?php }?>
                                 </select>
                                 <span id="int_size"></span>
                              </div>
                              <div class="col-sm-2 col-md-2">
                                 <label>Color <span class="red">*</span></label>
                                 <select name="color[]" class="form-control int_color">
                                    <option value="">Select Color</option>
                                    <?php foreach(explode(', ',$option[0]->opt_value) as $clr){?>
                                    <option value="<?=$clr;?>"<?php if(@$inventory[0]->int_color==$clr)echo'selected';?>><?=$clr;?></option>
                                    <?php  }?>
                                 </select>
                                 <span id="int_color"></span>
                              </div>
                              <div class="col-sm-2 col-md-2">
                                 <label style="width: 100%">&nbsp;</label>
                                 <a href="javascript:void(0);" class="btn btn-default add_getsize " title="Add field" onclick="add_getsize(this)" style="margin-bottom:20px"><i class="fa fa-plus"></i> Add</a>
                              </div>
                           </div>
                           <?php if(@$inventory[0]->int_custom!='1' && !empty($inventory)){
                              $count=count($inventory);
                               if(@$count >='1'){
                                
                                 foreach(array_splice($inventory,1) as $key=> $int_val){?>
                           <span id="getsizefield<?=$key+2;?>">
                              <div class="row">
                                 <div class="col-sm-2 col-md-2">
                                    <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                                    <input type="text" name="int_selleing_price[]" id="int_selleing_price3" class="form-control int_selleing_price" value="<?=$int_val->int_selleing_price;?>"   >
                                    <span id="selleing_price"></span>
                                 </div>
                                 <div class="col-sm-2 col-md-2">
                                    <label>Available Quantity <span class="red">*</span></label>
                                    <input type="text" name="int_available_qty[]" value="<?=$int_val->int_available_qty;?>" onkeypress="return available(event);" class="form-control int_available_qty">
                                    <span id="available_qty"></span>
                                 </div>
                                 <span class="SizeColumn" style=" width: 16.66666667%;">
                                    <?php if($product->p_scate=='18'){?>
                                    <div class="col-sm-2 col-md-2" style="    max-width: 100%;">
                                       <label><?=$option[4]->opt_name;?><span class="red">*</span></label>
                                       <select name="size[]" class="form-control size">
                                          <option value="">Select Abaya Length</option>
                                          <?php foreach(explode(', ',$option[4]->opt_value) as $val){?>
                                          <option value="<?=$val;?>" <?php if($int_val->int_size==$val)echo'selected';?>><?=$val;?></option>
                                          <?php }?>
                                       </select>
                                    </div>
                                    <?php }elseif($product->p_scate=='19'){?>
                                    <div class="col-sm-2 col-md-2" style="    max-width: 100%;">
                                       <label><?=$option[5]->opt_name;?><span class="red">*</span></label>
                                       <select name="size[]" class="form-control size">
                                          <option value="">Select Abaya Length</option>
                                          <?php foreach(explode(', ',$option[5]->opt_value) as $val){?>
                                          <option value="<?=$val;?>" <?php if($int_val->int_size==$val)echo'selected';?>><?=$val;?></option>
                                          <?php }?>
                                       </select>
                                    </div>
                                    <?php }?>
                                 </span>
                                 <div class="col-sm-2 col-md-2">
                                    <label>Size <span class="red">*</span></label>
                                    <select name="int_size[]" class="form-control int_size">
                                       <option value="">Select Size</option>
                                       <?php foreach(explode(', ',$option[1]->opt_value) as $sz){?>
                                       <option value="<?=$sz;?>" <?php if($int_val->size==$sz)echo'selected';?>><?=$sz;?></option>
                                       <?php }?>
                                    </select>
                                    <span id="int_size"></span>
                                 </div>
                                 <div class="col-sm-2 col-md-2">
                                    <label>Color <span class="red">*</span></label>
                                    <select name="color[]" class="form-control int_color">
                                       <option value="">Select Color</option>
                                       <?php foreach(explode(', ',$option[0]->opt_value) as $clr){?>
                                       <option value="<?=$clr;?>"<?php if($int_val->int_color==$clr)echo'selected';?>><?=$clr;?></option>
                                       <?php  }?>
                                    </select>
                                    <span id="int_color"></span>
                                 </div>
                                 <div class="col-sm-2 col-md-2"><label style="width:100%">&nbsp;</label><a href="javascript:void(0);" class="btn btn-default  " onclick="remove_getsize(<?=$key+2;?>,this)"><i class="fa fa-close"></i> Remove</a></div>
                              </div>
                           </span>
                           <?php }}}?>
                           <span id="getsize_filed"></span>
                           <br/>
                        </span>
                        <div class="col-sm-2 col-md-2">
                           <label>Ready for Collection <span class="red"></span></label>
                           <select  name="ready_collection" class="form-control int_condition ">
                              <option value="5" <?php if(@$inventory[0]->ready_collection=='5')echo'selected';?> >5 days</option>
                              <option value="10"<?php if(@$inventory[0]->ready_collection=='10')echo'selected';?>>10 days</option>
                              <option value="12"<?php if(@$inventory[0]->ready_collection=='12')echo'selected';?>>12 days</option>
                              <option value="15"<?php if(@$inventory[0]->ready_collection=='15')echo'selected';?>>15 days</option>
                              <option value="18"<?php if(@$inventory[0]->ready_collection=='18')echo'selected';?>>18 days</option>
                              <option value="20"<?php if(@$inventory[0]->ready_collection=='20')echo'selected';?>>20 days</option>
                           </select>
                        </div>
                        <div class="col-sm-2 col-md-2">
                           <label>Maintain Stock Level <span class="red"></span></label>
                           <select  data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock ">
                              <option value="1" <?php if(@$inventory[0]->int_stock=='1')echo'selected';?>>Yes</option>
                              <option value="2"<?php if(@$inventory[0]->int_stock=='2')echo'selected';?>>No</option>
                           </select>
                           <span id="intstock"></span>
                        </div>
                        <div class="col-sm-2 col-md-2">
                           <label>Product Condition <span class="red"></span></label>
                           <select  name="int_condition[]" class="form-control int_condition ">
                              <option value="0" <?php if(@$inventory[0]->int_condition=='0')echo'selected';?>>New</option>
                              <option value="1"<?php if(@$inventory[0]->int_condition=='1')echo'selected';?>>Used</option>
                              <option value="2"<?php if(@$inventory[0]->int_condition=='2')echo'selected';?>>Refurbished</option>
                           </select>
                           <span id="intcondition"></span>
                        </div>
                        <span id="size_field" style="padding-right: 0;display: contents;">
                        </span>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 InventoryProduct_cloth_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 Inventorycloth_prev "><i class="fa fa-angle-double-left"></i> Prev </button>
                        <button type="button" class="btn btn-secondary btn2 InventoryProduct_next" > Next <i class="fa fa-angle-double-right"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Warranty Policy  add -->
   <div class="row" id="warranty_setup" style="display: none;">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Warranty Policy</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="WarrantyResponse"> </div>
                  <form id="WarrantyProductForm"  method="post" >
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-striped table-bordered dataTable " >
                              <thead>
                                 <tr role="row">
                                    <th class="w-15p" >Sr. No.</th>
                                    <th class="wd-15p" >Policy Point Title</th>
                                    <th class="wd-15p"  >Policy Point Type</th>
                                    <th class="w-15p">&nbsp;</th>
                              </thead>
                              <tbody>
                                 <?php if($policy==TRUE){ $k=1;
                                    foreach ($policy as $policy_value) {
                                       if($policy_value->pp_type=='2'){ ?>
                                 <tr role="row" >
                                    <td class="sorting_1" style="width: 100px;">#<?=$k;$k++;?></td>
                                    <td > <?=$policy_value->pp_title;?></td>
                                    <td> Warranty</td>
                                    <td align="center">
                                       <div class="form-group"> 
                                          <label class="custom-switch"> <input type="checkbox" name="p_warranty_policy[]" class="custom-switch-input warranty_policy" value="<?=$policy_value->pp_id;?>" 
                                             <?php $warranty_policy=explode(', ',$product_link->p_warranty_policy); 
                                                if(in_array($policy_value->pp_id,$warranty_policy))echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> 
                                       </div>
                                    </td>
                                 </tr>
                                 <?php }}}?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 Warranty_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 <?php if($product->p_cate=='6'){echo'Warranty_prev1';}else{echo'Warranty_prev';}?>" ><i class="fa fa-angle-double-left"></i> Prev </button>
                        <button type="button" class="btn btn-secondary btn2 Warranty_next" > Next <i class="fa fa-angle-double-right"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Return Policy  add -->
   <div class="row" id="return_setup" style="display: none;">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Return Policy</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="ReturnResponse"> </div>
                  <form id="ReturnProductForm"  method="post" >
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-striped table-bordered dataTable " >
                              <thead>
                                 <tr role="row">
                                    <th class="w-15p" >Sr. No.</th>
                                    <th class="wd-15p" >Policy Point Title</th>
                                    <th class="wd-15p"  >Policy Point Type</th>
                                    <th class="w-15p">&nbsp;</th>
                              </thead>
                              <tbody>
                                 <?php if($policy==TRUE){ $k=1;
                                    foreach ($policy as $policy_value) {
                                       if($policy_value->pp_type=='1'){ ?>
                                 <tr role="row" >
                                    <td class="sorting_1" style="width: 100px;">#<?=$k;$k++;?></td>
                                    <td > <?=$policy_value->pp_title;?></td>
                                    <td> Return</td>
                                    <td align="center">
                                       <div class="form-group"> 
                                          <label class="custom-switch"> <input type="checkbox" name="p_return_policy[]" class="custom-switch-input return_policy" value="<?=$policy_value->pp_id;?>"  <?php $return_policy=explode(', ',$product_link->p_return_policy); 
                                             if(in_array($policy_value->pp_id,$return_policy))echo'checked';?>> <span class="custom-switch-indicator"></span> </label> 
                                       </div>
                                    </td>
                                 </tr>
                                 <?php }}}?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 Return_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 Return_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                        <button type="button" class="btn btn-secondary btn2 Return_next" > Next <i class="fa fa-angle-double-right"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Special Price add -->
   <div class="row" id="special_price" style="display: none;">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Special Price</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="SpecialPriceResponse"> </div>
                  <form id="SpecialPriceProductForm"  method="post" >
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <label>Special Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
                           <input type="text" name="special_price" value="<?=@$special_price->sp_special_price;?>" class="form-control special_price" onkeypress="return sp_price(event);" >
                           <span id="specialprice"></span>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <label>Price Start Date <span class="red">*</span></label>
                           <div class="input-group date">
                              <input type="text" name="start_date" value="<?=@$special_price->sp_start_date;?>"  class="form-control start_date" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                           </div>
                           <span id="start_date"></span>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <label>Price End Date <span class="red">*</span></label>
                           <div class="input-group date">
                              <input type="text" name="end_date" value="<?=@$special_price->sp_end_date;?>"  class="form-control end_date" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                           </div>
                           <span id="end_date"></span>
                        </div>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 SpecialPrice_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 SpecialPrice_Prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                        <button type="button" class="btn btn-secondary btn2 SpecialPrice_Next" > Next <i class="fa fa-angle-double-right"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Volume Discount add -->
   <div class="row" id="volume_discount" style="display: none">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Volume Discount</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="DiscountResponse"> </div>
                  <form id="DiscountProductForm"  method="post" >
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <label>Minimum Purchase Quantity <span class="red">*</span></label>
                           <input type="number" name="min_purchase_qty" value="<?=@$discount->vd_min_purchase_qty;?>" onkeypress="return qty1(event);" class="form-control min_purchase_qty">
                           <span id="purchaseqty"></span>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <label>Discount (%) <span class="red">*</span></label>
                           <input type="text" name="discount" class="form-control get_discount" value="<?=@$discount->vd_discount;?>" onkeypress="return get_discount(event);">
                           <span id="discount"></span>
                        </div>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 Discount_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 Discount_Prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                        <button type="button" class="btn btn-secondary btn2 Discount_Next" > Next <i class="fa fa-angle-double-right"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Product Image  add -->
   <div class="row" id="product_img" style="display: none">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Product Image Upload</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="ImageResponse"> </div>
                  <form id="ImageProductForm"  method="post"  enctype="multipart/form-data">
                     <input type="hidden" name="p_id" class="p_id" value="<?=$product->p_id;?>">
                     <div class="row">
                        <div class="col-sm-12 col-md-12">
                           <label>Main Image (170*293 - 150kb)<span class="red">*</span></label>
                           <br/>
                           <input type="file" name="img" class="form-control col-sm-8 col-md-8"  onchange="get_preview_image(21);" id="image_file21" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;">   
                           <div id="image_preview21" class="col-sm-2 col-md-2" style="display: inline-block;"></div>
                           <input type="hidden" name="prev_img" value="<?=@$product_img->pg_img;?>">
                           <?php  if(!empty(@$product_img->pg_img)){
                              $child_id=$product->p_child;
                                $cate_name=slug(category_name(cate(scate($child_id)))); 
                                    $sub_cate_name=slug(sub_category_name(scate($child_id)));
                                    $child_name=slug(child_category_name($child_id)); 
                                     $path=base_url(). '../seller/uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
                                     ?>
                           <img src="<?=$path;?>/<?=$product_img->pg_img;?>" style="width:50px; height: 50px;object-fit: contain;border: 1px solid #2205bf73;"/>
                           <?php }?>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <label>Product Image  (800*1080 - 250kb)<span class="red">*</span></label>
                           <br/>
                           <input type="file" name="images[]" class="form-control col-sm-8 col-md-8"  onchange="get_preview_image(1);" id="image_file1" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;">
                           <div id="image_preview1" class="col-sm-2 col-md-2" style="display: inline-block;"></div>
                           <a href="javascript:void(0);" class="add_button col-sm-2 col-md-2" title="Add field"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="field_wrapper " style="width: 97%;margin-left: 1.7%;">
                        </div>
                        <div id="edit_img">
                           <?php  if(!empty($product_img)){?>  
                           <ul>
                              <?php  $child_id=$product->p_child;
                                 $cate_name=slug(category_name(cate(scate($child_id)))); 
                                     $sub_cate_name=slug(sub_category_name(scate($child_id)));
                                     $child_name=slug(child_category_name($child_id)); 
                                      $path=base_url(). '../seller/uploads/'. $cate_name.'/'.$sub_cate_name.'/'. $child_name;
                                      if($product_img->pg_image){
                                 $product_img=explode(',',$product_img->pg_image);
                                 foreach($product_img AS $img_list){?>     
                              <li style="display: inline-block;">
                                 <img src="<?=$path;?>/<?=$img_list;?>" style="width:50px; height: 50px;object-fit: contain;border: 1px solid #2205bf73;"/>
                                 &nbsp; <a href="javascript:void(0);" onclick="ImgRemove(this);" class="ImgRemove" ImgRemove="<?=$img_list;?>" url="<?=base_url();?>" > <i class="fa fa-times-circle"></i></a>
                              </li>
                              <?php }}?>
                           </ul>
                           <?php }?>
                        </div>
                     </div>
                     <br>
                     <div class="save_button primary_btn default_button">
                        <button type="button" class="btn btn-primary btn2 ImageProduct_update" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary btn2 ImgProduct_Prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Complete Product -->
   <div class="row" id="completeproduct" style="display: none">
      <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header" style="padding-bottom: 0px;">
               <h3 class="card-title"><span>Complete Product Details</span></h3>
            </div>
            <div class="card-body">
               <div class="account_login_form">
                  <div class="CompleteResponse"> </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 <link href="<?=base_url('../admin/assets/plugins/datatable/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('../admin/assets/css/tables.css');?>" rel="stylesheet">
  <link href="<?=base_url('../admin/assets/css/default.css');?>" rel="stylesheet">
<style>
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    text-align: center;
    border-left-width: 0;
}
.table th, .text-wrap table th {
    color: #242338;
    text-transform: uppercase;
    font-size: small;
    font-weight: 400;
}
.table th, .table td {
    font-weight: 400;
    padding: 15px;
    color: #333;
    font-size: 14px;   
    vertical-align: top;
}

.btn {
    font-size: 14px;
    padding: .375rem .75rem;
    letter-spacing: .4px;
}
.btn-default {
  width: auto;height: 40px;
    color: #292828 !important;
    background: #edeff5;
    border-color: #dde1ef;
    box-shadow: 0 5px 10px rgba(227, 228, 237, 0.3);
}
label {  
    display: inline-flex;
    font-size: 14px;
    font-weight: 400;
    color: #626262;
}
div#example_length {
    margin-top: 10px;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    margin: -3px 5px 0 5px;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
    margin-top: -7px;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: 8px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #2205bf;
    border-color: #2205bf;
}
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    color: #3c4858;
    line-height: 1.25;
    background-color: #fff;
    border: 1px solid #eaf0f7;
    font-size: 0.875rem;
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
<style>
  select.form-control.select2.w-100.filter-multi {
    display: none !important;
}button.ms-choice {
    border: none;
}
.ms-parent.form-control.select2.w-100.filter-multi {
    padding: 0px;
}
.ms-drop input[type="checkbox"] {
    width: 20px;
     height: 15px;
    vertical-align: middle;
    vertical-align: middle;
    margin-right: 6px;
    margin-bottom: 1px;
    margin-left: 6px;
}
input.select2-search__field {
    width: 100% !important;
}
span.select2.select2-container.select2-container--default {
    width: 100% !important;
    height: 47px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #eceff8 1px;
    outline: 0;
}
.slick-slide{display:block;}
.custom-switch-input:checked~.custom-switch-indicator {
    background: #2205bf;
}
.custom-switch-indicator {
    display: inline-block;
    height: 1.25rem;
    width: 2.25rem;
    background: #e9ecef;
    border-radius: 50px;
    position: relative;
    vertical-align: bottom;
    border: 1px solid rgba(0,0,0,0.1);
    transition: .3s border-color, .3s background-color;
}
.custom-switch-indicator:before {
    content: '';
    position: absolute;
    height: calc(1.25rem - 4px);
    width: calc(1.25rem - 4px);
    top: 1px;
    left: 1px;
    background: #fff;
    border-radius: 50%;
    transition: .3s left;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.4);
}
.custom-switch-input:checked~.custom-switch-indicator:before {
    left: calc(1rem + 1px);
}
.custom-switch-input {
    position: fixed;
    z-index: -1;
    opacity: 0;
}
</style>
  <link href="<?=base_url();?>../admin/assets/css/default.css" rel="stylesheet">
	  <link rel="stylesheet" href="<?=base_url();?>../admin/assets/css/skins.css">
	<link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/switcher/demo.css">	
		<section class="main_content_area my_account">
				<div class="container">
	                <div class="account_dashboard">
	                    <div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="breadcrumb_content">
	         <div class="breadcrumb_header">
	  <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> Add Product</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title">
	                            <h3>Add Product</h3>
	                        </div>
							<div class="action btn-group-scroll pull-right">
                        
                        <div class="save_button primary_btn default_button">
<a href="<?=base_url('product');?>"><button class="btn_submit" name="btn_submit"><i class="fa fa-list "></i> List Product</button></a>
	                                                    </div>
                                </div>
						
	                    </div>
	            
	           <div class="row product-tab"  style="display: none">
   <div class="col-xl-12 col-md-12 col-sm-12">
          <ul class="tab" style="margin-bottom: 9px;">
            <li>
              <a href="javascript:void(0)" class="general-tab active">General</a>
           </li>
            <li>
              <a href="javascript:void(0)" class="category-tab">Category Link</a>
           </li>
            <li>
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
           <li>
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
                 <!-- Tab panes -->
<div class=" dashboard_content">
<div class="account_dashboard ">
 <div class="row" id="category">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Select Product Category</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
<br>
<div class="row" >
	
 <div class="col-sm-6 col-md-4">

 <ul class="category-list">
 <?php if(!empty($category)){
	 foreach($category AS $cate_list){
	 $count=category_count($cate_list->cate_id,$this->vendor->vnd_id);
	 if(!empty($count)){?>
 <li onClick="category(<?=$cate_list->cate_id;?>,'<?=base_url();?>',this)" ><a href="javascript:void(0)" ><?=$cate_list->cate_name;?> (<?=$count;?>)</a></li>
	 <?php }else if($cate_list->cate_id!='13'){?>
	  <li><a href="javascript:void(0)"><?=$cate_list->cate_name;?> (0)</a></li>
	 <?php }}}?>
 </ul>
 
 </div>
 <div class="col-sm-6 col-md-4">

 <ul class="category-list sub_category_list">
 
 </ul>
 
 </div>
 <div class="col-sm-6 col-md-4">

 <ul class="category-list child_category_list">
 
 </ul>
 
 </div>
 
 </div>

  </div>
   </div>
    </div>
    
 
<!-- General  -->
 <div class="row" id="general" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>General Product<span></h5>
<hr>	
<nav class="nav nav-tabs nav-justified" style="margin: 0 0px 20px 10px; background: #f2f3f8;">
<a class="nav-item nav-link active" data-toggle="tab" href="#English"><i class="fa fa-language"></i> English</a>
<a class="nav-item nav-link" data-toggle="tab" href="#Arabic"><i class="fa fa-language"></i> Arabic</a>

</nav>                        
</div>
 
<div class="col-sm-12 col-md-12 col-lg-12">

<div class="account_login_form">
  <div class="GeneralResponse"> </div>
  <input type="hidden" name="child_name" class="child_name">
<form id="GeneralProductForm" method="post" >
<input type="hidden" name="p_child" class="child_id">
<input type="hidden" name="p_id" class="gp_id">
<div class="tab-content">
<div id="English" class="tab-pane active fade in show">
<div class="row">

  <div class="col-sm-6 col-md-6">
 <label>Product Reference No. <span class="red">*</span></label>
 <input type="text" name="p_reference_no"  value="<?php $date=strtotime(date('Y-m-d H:i:s')); echo (rand(0,$date)); ?>" class="pd_reference_no" readonly />
<span id="reference_no"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Product Name <span class="red">*</span></label>
 <input type="text" name="p_name" class="pd_name">
  <span id="name"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Model <span class="red">*</span></label>
 <input type="text" name="p_model" class="pd_model" >
  <span id="Model"></span>

 </div>
 
  <div class="col-sm-6 col-md-6">
 <label>Brand <span class="red">*</span></label>
	 <select name="p_brand" class="form-control pd_brand">
	  <option value="">-Select-</option>
	  <?php if(!empty($brand)){
	  	foreach ($brand as $key => $b_list) {
        if($b_list->vnd_id==$this->vendor->vnd_id){
	  		echo'<option value="'.$b_list->brd_id.'">'.$b_list->brd_name.'</option>';
	  	} }
	  }
	  ?>
	</select>
  <span id="Brand"></span>
  </div> 
 
 <div class="col-sm-6 col-md-6">
 <label>Selling Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
 <input type="number" name="p_selling_price"  onkeyup="selling_price(this.value,'int_selleing_price')" class="pd_selling_price"  >
 <span id="pd_price"></span>
 </div>

<div class="col-sm-6 col-md-6">
 <label>Dimensions Unit <span class="red"></span></label>
	 <select name="p_dimensions" class="form-control pd_dimensions">
	  <option value="">-Select-</option>
	  <?php if(!empty($unit)){
	  	foreach ($unit as $key => $ud_list) {
	  		 if(empty($ud_list->ut_weight_name)){
	  		echo'<option value="'.$ud_list->ut_id.'">'.$ud_list->ut_dime_name.'</option>';
	  	}} }
	  ?>
	</select>
  <span id="Dimensions"></span>
  </div>
  <!-- 
  <div class="col-sm-6 col-md-6">
 <label>Shoulder <span class="red"></span></label>
 <input type="number" name="p_shoulder" class="form-control pd_shoulder"  />
 <span id="p_shoulder"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Wrist <span class="red"></span></label>
 <input type="number" name="p_wrist" class="form-control pd_wrist"  />
 <span id="p_wrist"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Waist <span class="red"></span></label>
 <input type="number" name="p_waist" class="form-control pd_waist"  />
 <span id="p_waist"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Hips <span class="red"></span></label>
 <input type="number" name="p_hips" class="form-control pd_hips"  />
 <span id="p_hips"></span>
 </div> -->

 <div class="col-sm-6 col-md-6">
 <label>Length <span class="red"></span></label>
 <input type="text" name="p_lenght" class="pd_lenght" onkeypress="return pd_length(event);" />
 <span id="Length"></span>
 </div>

 <div class="col-sm-6 col-md-6">
 <label>Width <span class="red"></span></label>
 <input type="text" name="p_width" class="pd_width" onkeypress="return getwidth(event);" />
 <span id="Width"></span>
 </div>

 <div class="col-sm-6 col-md-6">
 <label>Height <span class="red"></span></label>
 <input type="text" name="p_height" class="pd_height" onkeypress="return getheight(event);" />
 <span id="Height"></span>
 </div>

  <div class="col-sm-6 col-md-6">
 <label>Unit <span class="red"></span></label>
 <div class="row gutters-xs"> <div class="col-8" style="padding-right: 0px; ">
  <input type="text" name="p_weight"  class="form-control pd_weight" onkeypress="return weight(event);" />
</div><div class="col-4" style="padding-left: 0px; ">
   <select name="p_weigth_unit" class="form-control pd_weigth_unit" style="height: 35px;">
  <!--   <option value="">-Select-</option> -->
     <?php if(!empty($unit)){
      foreach ($unit as $key => $ud_list) {
         if(empty($ud_list->ut_dime_name)){?>
      <option value="<?php echo $getuid=$ud_list->ut_id;?>" ><?=$ud_list->ut_weight_name;?></option>
      <?php }} }
    ?>
  </select>
</div></div>
<span id="WeigthUnit"></span>
  <span id="Weight"></span>
  </div>
</div>
<div class="row">
 <div class="col-sm-6 col-md-6">
 <label>Available for Cash on Delivery (COD)</label>
 <select name="p_cod"  class="form-control">
  <option value="1" >Yes</option>
  <option value="0" >No</option>
</select> 
 </div>

 <div class="col-sm-6 col-md-6">
 <label>Ean/upc Code (Barcode) </label>
 <input type="text" name="p_barcode" class="pd_barcode" />
 </div>


 <div class="col-sm-4 col-md-4">
 <label>Featured Product</label><br/>
 
 <div class="custom-controls-stacked" style="     margin-left: 6%;   display: inline-block;"> 
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_feature" value="0" checked=""> <span class="custom-control-label">No</span> </label> &nbsp;
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_feature" value="1"> <span class="custom-control-label">Yes</span> </label></div>
 
 <span id="feature"></span>
 </div>

 <div class="col-sm-4 col-md-4">
 <label>Trending Product</label><br/>
 
 <div class="custom-controls-stacked" style="     margin-left: 6%;   display: inline-block;">  
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_trending" value="0" checked=""> <span class="custom-control-label">No</span> </label> &nbsp;
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_trending" value="1"> <span class="custom-control-label">Yes</span> </label></div>
 
 <span id="trending"></span>
 </div>
 
  <div class="col-sm-4 col-md-4">
 <label>Eid Collection</label><br/>
 
 <div class="custom-controls-stacked" style="     margin-left: 6%;   display: inline-block;">  
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_eid" value="0" checked=""> <span class="custom-control-label">No</span> </label> &nbsp;
  <label class="custom-control custom-radio" style="display: inline-flex;"> <input type="radio" class="custom-control-input" name="p_eid" value="1"> <span class="custom-control-label">Yes</span> </label></div>
 
 <span id="p_eid"></span>
 </div>
 
 
 
 
  <div class="col-sm-12 col-md-12"><br/>
 <label>Short Decsription <span class="red">*</span></label>
 <textarea name="p_short_description" class="form-control pd_short_description" style="height:100px"></textarea>
 <span id="ShortDesc"></span>
 </div>
  <div class="col-sm-12 col-md-12">
 <label>Decsription <span class="red"></span></label>
 <textarea rows="5" name="p_description" class="form-control pd_description" id="summernote" style="height:100px"></textarea>
 <span id="LongDesc"></span>
 </div>
 
 <div class="col-sm-12 col-md-12"><br>
 <label>Meta Title <span class="red">*</span></label>
 <textarea name="p_meta_title" class="form-control" ></textarea>

 </div>
 
 <div class="col-sm-12 col-md-12"><br>
 <label>Meta Keyword <span class="red">*</span></label>
 <textarea name="p_meta_keyword" class="form-control" ></textarea>

 </div>

  <div class="col-sm-12 col-md-12"><br>
 <label>Meta Description <span class="red">*</span></label>
 <textarea name="p_meta_description" class="form-control" ></textarea>

 </div>
 
 
 </div>
  </div>
 <div id="Arabic" class="tab-pane fade">
  <div class="row">


 <div class="col-sm-6 col-md-6">
 <label>Product Name <span class="red">*</span></label>
 <input type="text" name="p_name_ar" class="form-control pd_name_ar" style="text-align: right;
direction:RTL;">
  <span id="name_ar"></span>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Model <span class="red">*</span></label>
 <input type="text" name="p_model_ar" class="form-control pd_model_ar" style="text-align: right;direction:RTL;">
  <span id="Model_ar"></span>

 </div>


 
 
 
 
<div class="col-sm-12 col-md-12"><br>
 <label>Short Decsription <span class="red">*</span></label>
 <textarea name="p_short_description_ar" class="form-control pd_short_description_ar" style="height:100px;text-align: right;direction:RTL;"></textarea>
 <span id="ShortDesc_ar"></span>
 </div>
  <div class="col-sm-12 col-md-12">
 <label>Decsription <span class="red"></span></label>
 <textarea rows="5" name="p_description_ar" class="form-control pd_description_ar" id="summernote2" style="height:100px;text-align: right;direction:RTL;"></textarea>
 <span id="LongDesc_ar"></span>
 </div>
 
 
 
 
 </div>
 </div>
</div>
<br>
<div class="save_button primary_btn default_button">
  <button type="button" class="btn btn-primary btn2 GeneralProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save </button>
    <button type="button" class="btn btn-secondary btn2 general_product_next" style="display: none"> Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>
   </div>
    </div>

<!-- Product Category  add -->
 <div class="row" id="product_category_link" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Category Link</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<div class="CategoryResponse"> </div>
<form id="CategoryProductForm"  method="post" >
<input type="hidden" name="p_id" class="p_id">
<input type="hidden" name="url" class="current_url" value="<?=base_url();?>">
<div class="row">

 <div class="col-sm-6 col-md-6">
 <label>Product Category <span class="red">*</span></label>
<input type="text" name="p_category_link" class="p_category_link" url="<?=base_url();?>" onkeyup="categorylinkSearch();" >
<span id="PCategorylink"></span>
<span id="Category_link"></span>
<div id="CategorylinkList" class="col-md-12" style="position: absolute;top: 80%;z-index: 100;left: 0;right: auto; ">
<div id="autoCategorylinkList"></div></div>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>Product Tag <span class="red">*</span></label>
  <textarea name="p_tag" class="form-control p_tag" ></textarea>
 <span id="PTag"></span>

 </div>
 
 </div>
<br>
<div class="save_button primary_btn default_button">
  <button type="button" class="btn btn-primary btn2 CategoryProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
     <button type="button" class="btn btn-secondary btn2 general_product_prev"><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 " id="product_link_next" > Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>
</div>
    </div>

<!--Product Option Groups Add -->
 <div class="row" id="option_add" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Option Groups Add</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<div class="OptionGroupResponse"> </div>
<form id="OptionGroupProductForm"  method="post" >
<input type="hidden" name="p_id" class="og_p_id">
<div class="row">

 <div class="col-sm-6 col-md-6">
 <label>Product Option Groups <span class="red"></span></label>

 <select name="p_option_group[]" class="form-control select2 w-100 select2-hidden-accessible p_option" multiple="" data-placeholder="Select Option Groups" tabindex="-1" aria-hidden="true">
 <option value="">Select</option>
 <?php if(!empty($option)){
	 foreach($option as $opt_list){
    echo'<option value="'.$opt_list->opt_id.'">'.$opt_list->opt_name.'</option>';
	 }
 }
 ?>
 </select>
 
  <span id="POption"></span>

 </div>
 
 
 </div>
<br>
<div class="save_button primary_btn default_button">
  <button type="button" class="btn btn-primary btn2 OptionProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
    <button type="button" class="btn btn-secondary btn2 product_option_prev"><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 OptionProduct_Next" > Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>

</div>
    </div>

<!-- inventory_setup  add -->
 <div class="row" id="inventory_setup" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Inventory Setup</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">

<div class="InventoryResponse"> </div>
<form id="InventoryProductForm"  method="post" >
<input type="hidden" name="p_id" class="int_p_id">
<input type="hidden" name="int_min_purchase_qty" value="1">
<div class="row">
<span id="optiongroup_add" style="padding-right: 0;display: contents;"></span> 
<!-- 
  <div class="col-sm-6 col-md-6">
 <label>Cost Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
 <input type="text" name="int_cost_price" class="int_cost_price"  onkeypress="return cost(event);" >
 <span id="cost_price"></span>
 </div>
  -->
<div class="col-sm-2 col-md-2">
 <label>Selling Price <?=currency($this->website->web_currency);?> <span class="red">*</span></label>
 <input type="text" name="int_selleing_price[]" id="int_selleing_price" class="form-control int_selleing_price" readonly=""  >
<span id="selleing_price"></span>
 </div>


  <div class="col-sm-2 col-md-2">
 <label>Available Quantity <span class="red">*</span></label>
 <input type="text" name="int_available_qty[]" value="1" onkeypress="return available(event);"  class="form-control int_available_qty" >
<span id="available_qty"></span>
 </div>
 
<div class="col-sm-2 col-md-2">
<label>M. Stock Level <span class="red"></span></label>
<select  data-field-caption="Maintain Stock Levels" data-fatreq="{&quot;required&quot;:false}" name="int_stock[]" class="form-control int_stock "><option value="1" selected="selected">Yes</option><option value="2">No</option></select>
 <span id="intstock"></span>
 </div>

 <div class="col-sm-2 col-md-2">
<label>Product Condition <span class="red"></span></label>
<select  name="int_condition[]" class="form-control int_condition ">
  <option value="0" selected="selected">New</option>
  <option value="1">Used</option>
<option value="2">Refurbished</option>
</select>
 <span id="intcondition"></span>
 </div>

 <span id="size_field" style="padding-right: 0;display: contents;">
 </span>

 
 
 
 </div>

<br>
<div class="save_button primary_btn default_button">
  <button type="button" class="btn btn-primary btn2 InventoryProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
   <button type="button" class="btn btn-secondary btn2 Inventory_prev "><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 InventoryProduct_next" > Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>

</div>
    </div>


     <!-- Warranty Policy  add -->
     <div class="row" id="warranty_setup" style="display: none">
                         
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Warranty Policy</span></h5>
<hr>                          
</div>  
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<div class="WarrantyResponse"> </div>
<form id="WarrantyProductForm"  method="post" >
<input type="hidden" name="p_id" class="ws_p_id" >
<div class="row">
<div class="col-sm-12">
                                          <table  class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                 
                                                    <th class="w-15p" style="border-right: 1px solid #eeee;">Sr. No.</th>
                                            
                                                      <th class="wd-15p" style="border-right: 1px solid #eeee;" >Policy Point Title</th>
                                                 
                                                    <th class="wd-15p" style="border-right: 1px solid #eeee;" >Policy Point Type</th>
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
     
    <td align="center"><div class="form-group" style="margin-bottom: 0px"> 
       <label class="custom-switch"> <input type="checkbox" name="p_warranty_policy[]" class="custom-switch-input warranty_policy" value="<?=$policy_value->pp_id;?>" 
          > <span class="custom-switch-indicator"></span> </label> </div>
</td>


                                                </tr>
                                              <?php }}}?>
   
                                            </tbody>
                                        </table>
                                    
                        </div>
 
 </div>
<br>
<div class="save_button primary_btn default_button">
 <button type="button" class="btn btn-primary btn2 WarrantyProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
  <button type="button" class="btn btn-secondary btn2 Warranty_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 WarrantyProduct_next" > Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>
</div>
    </div>

    <!-- Return Policy  add -->
     <div class="row" id="return_setup" style="display: none;">    
                         
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Return Policy</span></h5>
<hr>                          
</div>  
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<div class="ReturnResponse"> </div>
<form id="ReturnProductForm"  method="post" >
<input type="hidden" name="p_id" class="rsp_p_id">
<div class="row">
<div class="col-sm-12">
 <table  class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="w-10p" style="border-right: 1px solid #eeee;">Sr. No.</th>
                                        <th class="wd-15p" style="border-right: 1px solid #eeee;">Policy Point Title</th>
                                        <th class="wd-15p " style="border-right: 1px solid #eeee;">Policy Point Type</th>
                                      
                                       <th class="wd-15p"  style="">&nbsp;</th>
                                        
                                    </tr>
                                </thead>
   <tbody>
    <?php if($policy==TRUE){ $k=1;
      foreach ($policy as $policy_value) {
         if($policy_value->pp_type=='1'){ ?>
      
    <tr role="row" >
   
   <td class="sorting_1" style="width: 100px;">#<?=$k;$k++;?></td>
   <td > <?=$policy_value->pp_title;?></td>
    <td> Return</td>
    <td align="center"><div class="form-group" style="margin-bottom: 0px"> 
       <label class="custom-switch"> <input type="checkbox" name="p_return_policy[]" class="custom-switch-input return_policy" value="<?=$policy_value->pp_id;?>"> <span class="custom-switch-indicator"></span> </label> </div>
</td>


                                                </tr>
                                              <?php }}}?>
   
                                            </tbody>
                                        </table>
                                    
                        </div>
 
 </div>
<br>
<div class="save_button primary_btn default_button">
 <button type="button" class="btn btn-primary btn2 ReturnProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
  <button type="button" class="btn btn-secondary btn2 Return_prev" ><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 ReturnProduct_next" > Next <i class="fa fa-angle-double-right"></i></button>
 
     </div>

 </form>

</div>
</div>
    </div>



<!-- Special Price add -->
 <div class="row" id="special_price" style="display: none;">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Special Price</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<div class="SpecialPriceResponse"> </div>
<form id="SpecialPriceProductForm"  method="post" >
<input type="hidden" name="p_id" class="sp_p_id">
<div class="row">

 <div class="col-sm-6 col-md-6">
 <label>Special Price [<?=currency($this->website->web_currency);?>] <span class="red">*</span></label>
 <input type="text" name="special_price" class="form-control special_price" onkeypress="return sp_price(event);" >
 <span id="specialprice"></span>
 

 </div>

  <div class="col-sm-6 col-md-6">
 <label>Price Start Date <span class="red">*</span></label>
 <div class="input-group date">
  <input type="text" name="start_date"  class="form-control start_date" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
</div>

  <span id="start_date"></span>
 

 </div>
 
  <div class="col-sm-6 col-md-6">
 <label>Price End Date <span class="red">*</span></label>
 <div class="input-group date">
  <input type="text" name="end_date"  class="form-control end_date" autocomplete="off"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
</div>
 
  <span id="end_date"></span>
 </div>


 
 
 </div>

<br>

<div class="save_button primary_btn default_button">
  <button type="button" class="btn btn-primary btn2 SpecialPriceProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button> 
    <button type="button" class="btn btn-secondary btn2 SpecialPrice_Prev"><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 SpecialPriceNext" > Next <i class="fa fa-angle-double-right"></i></button>
 
</div>

 </form>

</div>
</div>
    </div>

<!-- Volume Discount add -->
 <div class="row" id="volume_discount" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Volume Discount</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">

<div class="DiscountResponse"> </div>
<form id="DiscountProductForm"  method="post" >
<input type="hidden" name="p_id" class="vd_p_id">
<div class="row">

 <div class="col-sm-6 col-md-6">
 <label>Minimum Purchase Quantity <span class="red">*</span></label>
<input type="number" name="min_purchase_qty" maxlength="3" onkeypress="return qty1(event);" class="min_purchase_qty">
<span id="purchaseqty"></span>
 </div>

  <div class="col-sm-6 col-md-6">
 <label>Discount (%) <span class="red">*</span></label>
 <input type="text" name="discount" class="get_discount" maxlength="2" onkeypress="return get_discount(event);">
 <span id="discount"></span>

 </div>
 
  
 
 </div>
<br>
<div class="save_button primary_btn default_button">
   <button type="button" class="btn btn-primary btn2 DiscountProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
     <button type="button" class="btn btn-secondary btn2 Discount_Prev"><i class="fa fa-angle-double-left"></i> Prev </button>
  <button type="button" class="btn btn-secondary btn2 DiscountNext" > Next <i class="fa fa-angle-double-right"></i></button>

     </div>

 </form>

</div>

	                                                
	                                          
</div>								   
</div>		


<!-- Product Image  add -->
 <div class="row" id="product_img" style="display: none">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Product Image Upload</span></h5>
<hr>	                        
</div>	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">

<div class="ImageResponse"> </div>
<form id="ImageProductForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="p_id" class="img_p_id">

<div class="row">
<div class="col-sm-12 col-md-12">
 <label>Main Image (170*293 - 150kb)<span class="red">*</span></label>
 <br/>
   <input type="file" name="img" class="form-control col-sm-8 col-md-8"  onchange="get_preview_image(21);" id="image_file21" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;">
 
  <div id="image_preview21" class="col-sm-2 col-md-2" style="display: inline-block;"></div> 
  

  

  </div>
  
	<div class="col-sm-12 col-md-12">
 <label>Product Image (800*1080 - 250kb)<span class="red">*</span></label>
 <br/>
	 <input type="file" name="images[]" class="col-sm-8 col-md-8"  onchange="get_preview_image(1);" id="image_file1" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;">
 
	<div id="image_preview1" class="col-sm-2 col-md-2" style="display: inline-block;"></div>
	
  

	<a href="javascript:void(0);" class="add_button col-sm-2 col-md-2" title="Add field"><i class="fa fa-plus"></i></a>

  </div>   
   	<div class="field_wrapper " style="width: 97%;margin-left: 1.7%;">
   	</div>


 
  
 
 </div>
<br>
<div class="save_button primary_btn default_button">

    <button type="button" class="btn btn-primary btn2 ImageProduct" url="<?=base_url();?>"><i class="fa fa-save"></i> Save</button>
    <button type="button" class="btn btn-secondary btn2 ImgProduct_Prev"><i class="fa fa-angle-double-left"></i> Prev </button>


     </div>

 </form>

</div>

	                                                
	                                          
</div>								   
</div>					

<!-- Complete Product -->
 <div class="row" id="completeproduct" style="display: none">
                         
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title "><span>Complete Product Details</span></h5>
<hr>                          
</div>  
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">

<div class="CompleteResponse"> </div>


</div>

                                                  
                                            
</div>                   
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
           <script src="<?=base_url();?>assets/js/vendor/jquery-1.12.0.min.js"></script>  
		<script type="text/javascript">
$(document).ready(function(){
        
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="images[]" class="col-sm-8 col-md-8" onchange="preview_image'+x+'();" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;" /><span id="image_preview" class="col-sm-2 col-md-2" style="display: inline-block;"></span><a href="javascript:void(0);" class="remove_button col-sm-2 col-md-2" ><i class="fa fa-minus"></i></a></div>'; 
    //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div><input type="file" name="images[]" class="col-sm-8 col-md-8" onchange="get_preview_image('+x+');" id="image_file'+x+'" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;" /><span id="image_preview'+x+'" class="col-sm-2 col-md-2" style="display: inline-block;"></span><a href="javascript:void(0);" class="remove_button col-sm-2 col-md-2" ><i class="fa fa-minus"></i></a></div>'); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    $( ".pro_offer" ) .change(function () { 
    var pro_offer   = $('.pro_offer').val();
    if(pro_offer=='2'){
        $('.offer_price').show();
    }else{
        $('.offer_price').hide();
    }
    }); 

});

 var specialKeys = new Array();
        specialKeys.push(8); //Backspace
function IsNumeric(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#pd_price').html('');
            }else{  $('#pd_price').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function pd_length(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Length').html('');
            }else{  $('#Length').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
 function getwidth(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Width').html('');
            }else{  $('#Width').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function getheight(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Height').html('');
            }else{  $('#Height').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function weight(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Weight').html('');
            }else{  $('#Weight').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function cost(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#cost_price').html('');
            }else{  $('#cost_price').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function available(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#available_qty').html('');
            }else{  $('#available_qty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function qty(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#purchase_qty').html('');
            }else{  $('#purchase_qty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
 
         function qty1(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#purchaseqty').html('');
            }else{  $('#purchaseqty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }

        function sp_price(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#specialprice').html('');
            }else{  $('#specialprice').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
         function get_discount(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#discount').html('');
            }else{  $('#discount').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }

 
</script>


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
.nav.dashboard-list a.nav-link.active {
    background: transparent;
}
ul#export li a {
    color: #0000ffc2;
    font-size: 14px;
}
ul#export li a:hover {
text-decoration: underline; 
}

ul#export li {
	    margin-left: 10px;
    list-style: inside;
    font-size: 16px;    
    color: #666666;
    margin-bottom: 10px;
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
	                            <span> Import Export Products</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title">
	                            <h3>Import Export Products</h3>
	                        </div>
							
						
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<!-- General  -->
 <div class="row" >
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
	<ul role="tablist" class="nav  dashboard-list" id="myTab">
             <li><a href="#export" data-toggle="tab" class="nav-link active">Export Products</a></li>
             <li> <a href="#import1" data-toggle="tab" class="nav-link">Import Products</a></li>                                                  
            </ul>
        <hr style=" margin-top: -9px;margin-bottom: 20px; ">
                        
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="tab-content">
<div class="tab-pane fade show active" id="export" >
  <div class="GeneralResponse"> </div> 

<div class="col-sm-12 col-md-12 col-lg-12">

<div class="row">

  <div class="col-sm-6 col-md-6">

<ul id="export">
<li><a href="<?=base_url('product/export_category');?>">Export Category </a></li>
<li><a href="<?=base_url('product/export_sub_category');?>">Export Sub Category</a></li>
<li><a href="<?=base_url('product/export_child_category');?>">Export Child Category</a></li>
<li><a href="<?=base_url('product/export_brand');?>">Export Brand Category</a></li>
<li><a href="<?=base_url('product/export_products');?>">Export Products</a></li>
<li><a href="<?=base_url('product/export_inventory');?>">Export Products Inventory</a></li>
<li><a href="<?=base_url('product/export_special');?>">Export Products Special Price</a></li>
<li><a href="<?=base_url('product/export_discount');?>">Export Products Volume Discount</a></li>
<li><a href="<?=base_url('product/export_country');?>">Export Countries</a></li>
<li><a href="<?=base_url('product/export_state');?>">Export States</a></li>
<li><a href="<?=base_url('product/export_city');?>">Export Cities</a></li>
<li><a href="<?=base_url('product/export_zipcode');?>">Export Zip Code</a></li>
<li><a href="<?=base_url('product/export_dimension');?>">Export Dimension Unit</a></li>
<li><a href="<?=base_url('product/export_weight');?>">Export Weight Unit</a></li>
</ul>
 </div>

 
 
 
 
 </div>
 <br/>

 </div>



</div>

<div class="tab-pane fade" id="import1"  >
 

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="col-sm-12 col-md-12">
		<h5><span class="red">Instructions :</span></h5>
		<p><b>Category Name</b><br/>
User defined unique Name for the category. This field needs to be the same as the Category Name defined in Categories export sheet.</p>
<p><b>Brand Name</b><br/>
User defined unique Name for the Brand. This field needs to be the same as the Brand Name defined in Brands export sheet.</p>
<p><b>Dimension Unit</b><br/>
User defined unique Name for the Dimension. This field needs to be the same as the Dimension Name defined in Dimensions export sheet.</p>
<p><b>Weight Unit Identifier</b><br>
User defined input field to denote the unit of the weight of the package. . Possible inputs for this field are 'Gram', 'Kilogram' & 'Pound'.</p>

	</div></div>
<div class="col-sm-6 col-md-6">
<form id="ImportProducts" action="<?=base_url('product/import_products');?>" method="post" enctype="multipart/form-data">
<br>
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>


<div class="col-sm-12 col-md-12">

 <label>Type <span class="red">*</span></label>
 <select name="type" class="form-control">
 <option value="">-Select Product-</option>
 <option value="1">General Products</option>
 <option value="2">Inventory Products</option>
 <option value="3">Special Price Products</option>
 <option value="4">Volume Discount Products</option>
</select>

 </div>


 <div class="col-sm-12 col-md-12">
 <label>CSV File Import <span class="red">*</span></label>
 <input type="file" name="userfile"  class="userfile"   />

 </div>
 
 
 
 
 <div class="col-sm-12 col-md-12">
<br>
<div class="save_button primary_btn default_button">
  <button type="submit" class="btn btn-primary btn2 "><i class="fa fa-save"></i> Save </button>
<button type="reset" class="btn btn-secondary btn2"><i class="fa fa-remove"></i> Cancel</button>
 
     </div>  </div>
 </form>
<br><br><br>&nbsp;</div>

 <div class="col-sm-6 col-md-5">
<br>


<div class="row">



 <div class="col-sm-12 col-md-12"> 
 	<label>&nbsp;</label><br>
 	<ul id="export">
<li><a href="<?=base_url('uploads/csv/General_Products.csv');?>">Download CSV file Sample - General Product </a></li>
<li><a href="<?=base_url('uploads/csv/Inventory_Products.csv');?>">Download CSV file Sample - Inventory Product</a></li>
<li><a href="<?=base_url('uploads/csv/Special_Price_Products.csv');?>">Download CSV file Sample -  Special Price  Product</a></li>
<li><a href="<?=base_url('uploads/csv/Volume_Discount_Products.csv');?>">Download CSV file Sample - Discount Product</a></li>

</ul>
</div>
 
 
 
 
 </div>

</div></div>



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
      


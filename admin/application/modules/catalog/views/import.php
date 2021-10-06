<style>
	ul#export li a {
    color: #0000ffc2;
    font-size: 14px;
}
ul#export li {
    margin-left: 10px;
    list-style: inside;
    font-size: 16px;
    color: #666666;
    margin-bottom: 10px;
}
select.form-control {

    margin-bottom: 10px;
  
}</style>
<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Import Product</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            
           
            
             
             </div> </div>
          
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Import Product</div>
                        <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  </div>
                    </div>
                    <div class="card-body">
                  
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
<form id="ImportProducts" action="<?=base_url('catalog/import_products_save');?>" method="post" enctype="multipart/form-data">
<br>
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>


<div class="col-sm-12 col-md-12">
<div class="row">
	<div class="col-sm-12 col-md-12">

 <label>Type <span class="red">*</span></label>
 <select name="type" class="form-control">
 <option value="">-Select Product-</option>
 <option value="1">General Products</option>
 <option value="2">Inventory Products</option>
 <option value="3">Special Price Products</option>
 <option value="4">Volume Discount Products</option>
</select>
</div></div>
 </div>


 <div class="col-sm-12 col-md-12">
 	<div class="row">
	<div class="col-sm-12 col-md-12">
 <label>CSV File Import <span class="red">*</span></label>
 <input type="file" name="userfile"  class="form-control userfile"   />
</div></div>
 </div>
 
 
 
 
 <div class="col-sm-12 col-md-12">
 	<div class="row">
	<div class="col-sm-12 col-md-12">
<br>
<div class="save_button primary_btn default_button">
  <button type="submit" class="btn btn-primary btn2 "><i class="fa fa-save"></i> Save </button>
<button type="reset" class="btn btn-secondary btn2"><i class="fa fa-remove"></i> Cancel</button></div></div>
 
     </div>  </div>
 </form>
<br><br><br>&nbsp;</div>

 <div class="col-sm-6 col-md-5">
<br>


<div class="row">



 <div class="col-sm-12 col-md-12"> 
 	<label>&nbsp;</label><br>
 	<ul id="export">
<li><a href="<?=base_url('../seller/uploads/csv/General_Products.csv');?>">Download CSV file Sample - General Product </a></li>
<li><a href="<?=base_url('../seller/uploads/csv/Inventory_Products.csv');?>">Download CSV file Sample - Inventory Product</a></li>
<li><a href="<?=base_url('../seller/uploads/csv/Special_Price_Products.csv');?>">Download CSV file Sample -  Special Price  Product</a></li>
<li><a href="<?=base_url('../seller/uploads/csv/Volume_Discount_Products.csv');?>">Download CSV file Sample - Discount Product</a></li>

</ul>
</div>
 
 
 
 
 </div>

</div></div>  
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>





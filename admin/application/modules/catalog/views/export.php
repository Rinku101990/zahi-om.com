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
}</style>
<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Export Product</li>
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
                        <div class="card-title">Export Product</div>
                        <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  </div>
                    </div>
                    <div class="card-body">
                    <?php $msg=$this->session->flashdata('msg');  
    if($msg){  ?>
    
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
    <?php }?>
                    <div class="row">

  <div class="col-sm-6 col-md-6">

<ul id="export">
<li><a href="<?=base_url('catalog/export_category');?>">Export Category </a></li>
<li><a href="<?=base_url('catalog/export_sub_category');?>">Export Sub Category</a></li>
<li><a href="<?=base_url('catalog/export_child_category');?>">Export Child Category</a></li>
<li><a href="<?=base_url('catalog/export_brand');?>">Export Brand Category</a></li>
<li><a href="<?=base_url('catalog/export_products');?>">Export Products</a></li>
<li><a href="<?=base_url('catalog/export_inventory');?>">Export Products Inventory</a></li>
<li><a href="<?=base_url('catalog/export_special');?>">Export Products Special Price</a></li>
<li><a href="<?=base_url('catalog/export_discount');?>">Export Products Volume Discount</a></li>
<li><a href="<?=base_url('catalog/export_country');?>">Export Countries</a></li>
<li><a href="<?=base_url('catalog/export_state');?>">Export States</a></li>
<li><a href="<?=base_url('catalog/export_city');?>">Export Cities</a></li>
<li><a href="<?=base_url('catalog/export_zipcode');?>">Export Zip Code</a></li>
<li><a href="<?=base_url('catalog/export_dimension');?>">Export Dimension Unit</a></li>
<li><a href="<?=base_url('catalog/export_weight');?>">Export Weight Unit</a></li>
</ul>
 </div>

 
 
 
 
 </div>    
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>





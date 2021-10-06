<?php error_reporting(0);?>
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Admin Users</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                    <a href="<?php echo site_url('users');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Admin Users </button>
                    </a>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?=$users->mst_name;?> Permission</div>
                        <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body"><?php $msg=$this->session->flashdata('msg');  
    if($msg){  ?>
    
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert">  <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
    <?php }   $permission=unserialize($users->mst_permission);?>
                        
                        <form id="admin_users" action="" method="post" >                          
                             

                             <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <table class="table table-striped table-bordered dataTable ">
                                            <thead>
                                                <tr role="row">
                                                 
                                            <th class="w-15p">Sr. No.</th>
                                            
                                          <th class="wd-15p">Module</th>            
                                         <th class="wd-15p" style="text-align: center;">View</th>
                                         <th class="wd-15p" style="text-align: center;">Add</th>
                                         <th class="wd-15p" style="text-align: center;">Edit</th>
                                        <th class="wd-15p" style="text-align: center;">Delete</th>
                                                    
                                                      
  </tr></thead>
   <tbody>
          
    <tr role="row">
   
   <td class="sorting_1" >#1.</td>
   <td>Admin Dashboard</td>   
     
    <td align="center">  <label class="custom-switch"> <input type="checkbox" name="dashboard_view" class="custom-switch-input " value="1" <?php if($permission['dashboard_view']=='1') echo'checked';?>> <span class="custom-switch-indicator"></span> </label>

</td>
<td align="center"></td>

<td align="center"></td>
<td align="center"></td>

  </tr>
        
        <tr role="row">
   
   <td class="sorting_1" >#2.</td>
   <td>Shops</td>   
     
    <td align="center"> <label class="custom-switch"> <input type="checkbox" name="shops_view" class="custom-switch-input " value="1"   <?php if($permission['shops_view']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label>

     
</td>
 <td align="center"></td>
<td align="center"><label class="custom-switch"> <input type="checkbox" name="shops_edit" class="custom-switch-input " value="1"  <?php if($permission['shops_edit']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label>    
</td>

  <td align="center"></td>
  </tr>
   <tr role="row">
   
   <td class="sorting_1" >#3.</td>
   <td>Product Categories</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_categories_view" class="custom-switch-input " value="1"  <?php if($permission['product_categories_view']=='1') echo'checked';?>> <span class="custom-switch-indicator"></span> </label> </div>
</td>

<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_categories_add" class="custom-switch-input " value="1"   <?php if($permission['product_categories_add']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label> </div>
</td> <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_categories_edit" class="custom-switch-input " value="1"   <?php if($permission['product_categories_edit']=='1') echo'checked';?>> <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_categories_delete" class="custom-switch-input " value="1"   <?php if($permission['product_categories_delete']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr>

<tr role="row">
   
   <td class="sorting_1" >#4.</td>
   <td>Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="products_view" class="custom-switch-input " value="1"  <?php if($permission['products_view']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="products_add" class="custom-switch-input " value="1"  <?php if($permission['products_add']=='1') echo'checked';?>> <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="products_edit" class="custom-switch-input " value="1" <?php if($permission['products_edit']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="products_delete" class="custom-switch-input " value="1" <?php if($permission['products_delete']=='1') echo'checked';?> > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr>     
  <tr role="row">
   
   <td class="sorting_1" >#5.</td>
   <td>Hot Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="hot_products_view" class="custom-switch-input " value="1" <?php if($permission['hot_products_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="hot_products_edit" class="custom-switch-input " value="1" <?php if($permission['hot_products_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
  </tr>                                               
  <tr role="row">
   
   <td class="sorting_1" >#6.</td>
   <td>Featured Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="featured_products_view" class="custom-switch-input " value="1" <?php if($permission['featured_products_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>

  </tr> 
   <tr role="row">
   
   <td class="sorting_1" >#7.</td>
   <td>Trending Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="trending_products_view" class="custom-switch-input " value="1" <?php if($permission['trending_products_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>

  </tr> 
  <tr role="row">
   
   <td class="sorting_1" >#8.</td>
   <td>Inventory</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="inventory_view" class="custom-switch-input " value="1" <?php if($permission['inventory_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
   
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="inventory_edit" class="custom-switch-input " value="1" <?php if($permission['inventory_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>

  </tr> 
  <tr role="row">
   
   <td class="sorting_1" >#9.</td>
   <td>Special Price</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="special_price_view" class="custom-switch-input " value="1" <?php if($permission['special_price_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="special_price_add" class="custom-switch-input " value="1" <?php if($permission['special_price_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="special_price_edit" class="custom-switch-input " value="1" <?php if($permission['special_price_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="special_price_delete" class="custom-switch-input " value="1" <?php if($permission['special_price_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

  </tr> 
  <tr role="row">
   
   <td class="sorting_1" >#10.</td>
   <td>Volume Discount</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="volume_discount_view" class="custom-switch-input " value="1" <?php if($permission['volume_discount_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="volume_discount_add" class="custom-switch-input " value="1" <?php if($permission['volume_discount_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="volume_discount_edit" class="custom-switch-input " value="1" <?php if($permission['volume_discount_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="volume_discount_delete" class="custom-switch-input " value="1" <?php if($permission['volume_discount_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

  </tr> 
  <tr role="row">
   
   <td class="sorting_1" >#11.</td>
   <td>Export Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="export_products" class="custom-switch-input " value="1" <?php if($permission['export_products']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>

  </tr> 
  <tr role="row">
   
   <td class="sorting_1" >#12.</td>
   <td>Import Products</td>   
     
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="import_products_view" class="custom-switch-input " value="1" <?php if($permission['import_products_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="import_products_add" class="custom-switch-input " value="1" <?php if($permission['import_products_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>

  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#13.</td>
   <td>Customer List</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="customer_list_view" class="custom-switch-input " value="1" <?php if($permission['customer_list_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="customer_list_block" class="custom-switch-input " value="1" <?php if($permission['customer_list_block']=='1') echo'checked';?>  title="block"> <span class="custom-switch-indicator"></span> </label> </div>
</td>

  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#14.</td>
   <td>Vendor List</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="vendor_list_view" class="custom-switch-input " value="1" <?php if($permission['vendor_list_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
  <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="vendor_list_block" class="custom-switch-input " value="1" <?php if($permission['vendor_list_block']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#15.</td>
   <td>My Product Order List</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="my_product_order_list" class="custom-switch-input " value="1" <?php if($permission['my_product_order_list']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#16.</td>
   <td>Content Pages</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="content_pages_view" class="custom-switch-input " value="1" <?php if($permission['content_pages_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="content_pages_add" class="custom-switch-input " value="1" <?php if($permission['content_pages_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="content_pages_edit" class="custom-switch-input " value="1" <?php if($permission['content_pages_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="content_pages_delete" class="custom-switch-input " value="1" <?php if($permission['content_pages_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#17.</td>
   <td>Navigation Management</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="navigation_management_view" class="custom-switch-input " value="1" <?php if($permission['navigation_management_view']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="navigation_management_add" class="custom-switch-input " value="1" <?php if($permission['navigation_management_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="navigation_management_edit" class="custom-switch-input " value="1" <?php if($permission['navigation_management_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="navigation_management_delete" class="custom-switch-input " value="1" <?php if($permission['navigation_management_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#18.</td>
   <td>Policy Points</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="policy_ponits" class="custom-switch-input " value="1" <?php if($permission['policy_ponits']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="policy_ponits_add" class="custom-switch-input " value="1" <?php if($permission['policy_ponits_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="policy_ponits_edit" class="custom-switch-input " value="1" <?php if($permission['policy_ponits_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="policy_ponits_delete" class="custom-switch-input " value="1" <?php if($permission['policy_ponits_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#19.</td>
   <td>Order Cancel Reasons</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_cancel_reasons" class="custom-switch-input " value="1" <?php if($permission['order_cancel_reasons']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_cancel_reasons_add" class="custom-switch-input " value="1" <?php if($permission['order_cancel_reasons_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_cancel_reasons_edit" class="custom-switch-input " value="1" <?php if($permission['order_cancel_reasons_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_cancel_reasons_delete" class="custom-switch-input " value="1" <?php if($permission['order_cancel_reasons_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#20.</td>
   <td>Order Return Reasons</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_return_reasons" class="custom-switch-input " value="1" <?php if($permission['order_return_reasons']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_return_reasons_add" class="custom-switch-input " value="1" <?php if($permission['order_return_reasons_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_return_reasons_edit" class="custom-switch-input " value="1" <?php if($permission['order_return_reasons_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="order_return_reasons_delete" class="custom-switch-input " value="1" <?php if($permission['order_return_reasons_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#21.</td>
   <td>Testimoninals</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="testimoninals" class="custom-switch-input " value="1" <?php if($permission['testimoninals']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="testimoninals_add" class="custom-switch-input " value="1" <?php if($permission['testimoninals_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="testimoninals_edit" class="custom-switch-input " value="1" <?php if($permission['testimoninals_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="testimoninals_delete" class="custom-switch-input " value="1" <?php if($permission['testimoninals_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#22.</td>
   <td>Discount Coupons</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="discount_coupons" class="custom-switch-input " value="1" <?php if($permission['discount_coupons']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="discount_coupons_add" class="custom-switch-input " value="1" <?php if($permission['discount_coupons_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="discount_coupons_edit" class="custom-switch-input " value="1" <?php if($permission['discount_coupons_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="discount_coupons_delete" class="custom-switch-input " value="1" <?php if($permission['discount_coupons_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#23.</td>
   <td>Banners</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="banners" class="custom-switch-input " value="1" <?php if($permission['banners']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="banners_add" class="custom-switch-input " value="1" <?php if($permission['banners_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="banners_edit" class="custom-switch-input " value="1" <?php if($permission['banners_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="banners_delete" class="custom-switch-input " value="1" <?php if($permission['banners_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#24.</td>
   <td>Orders</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="orders" class="custom-switch-input " value="1" <?php if($permission['orders']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="orders_delete" class="custom-switch-input " value="1" <?php if($permission['orders_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#25.</td>
   <td>Withdrawal Requests</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="withdrawal_requests" class="custom-switch-input " value="1" <?php if($permission['withdrawal_requests']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#26.</td>
   <td>Cancellation Requests</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="cancellation_requests" class="custom-switch-input " value="1" <?php if($permission['cancellation_requests']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#27.</td>
   <td>Return/Refund Requests</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="return_requets" class="custom-switch-input " value="1" <?php if($permission['return_requets']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#28.</td>
   <td>Blog Post List</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_post" class="custom-switch-input " value="1" <?php if($permission['blog_post']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_post_add" class="custom-switch-input " value="1" <?php if($permission['blog_post_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_post_edit" class="custom-switch-input " value="1" <?php if($permission['blog_post_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_post_delete" class="custom-switch-input " value="1" <?php if($permission['blog_post_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#29.</td>
   <td>Blog Comments</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_comments" class="custom-switch-input " value="1" <?php if($permission['blog_comments']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="blog_comments_delete" class="custom-switch-input " value="1" <?php if($permission['blog_comments_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#30.</td>
   <td>Sales Report</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="sales_report" class="custom-switch-input " value="1" <?php if($permission['sales_report']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
   <tr role="row">   
   <td class="sorting_1" >#31.</td>
   <td>Buyers Report</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="buyers_report" class="custom-switch-input " value="1" <?php if($permission['buyers_report']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr>    
   <tr role="row">   
   <td class="sorting_1" >#32.</td>
   <td>Seller Report</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="seller_report" class="custom-switch-input " value="1" <?php if($permission['seller_report']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#33.</td>
   <td>Products (Seller Wise)</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_seller_wise" class="custom-switch-input " value="1" <?php if($permission['product_seller_wise']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#34.</td>
   <td>Products (Catalog Wise)</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="product_catallog_wise" class="custom-switch-input " value="1" <?php if($permission['product_catallog_wise']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#35.</td>
   <td>Top Products</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="top_products" class="custom-switch-input " value="1" <?php if($permission['top_products']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr>
   <tr role="row">   
   <td class="sorting_1" >#36.</td>
   <td>Commission</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="commission" class="custom-switch-input " value="1" <?php if($permission['commission']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#37.</td>
   <td>Mail Services</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="mail_services" class="custom-switch-input " value="1" <?php if($permission['mail_services']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
<!--   <tr role="row">   
   <td class="sorting_1" >#38.</td>
   <td>PPC Promotions</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="ppc_promotions" class="custom-switch-input " value="1" <?php if($permission['ppc_promotions']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="ppc_promotions_add" class="custom-switch-input " value="1" <?php if($permission['ppc_promotions_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="ppc_promotions_edit" class="custom-switch-input " value="1" <?php if($permission['ppc_promotions_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="ppc_promotions_delete" class="custom-switch-input " value="1" <?php if($permission['ppc_promotions_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr>  -->
  <tr role="row">   
   <td class="sorting_1" >#38.</td>
   <td>Admin Users</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="admin_users" class="custom-switch-input " value="1" <?php if($permission['admin_users']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="admin_users_add" class="custom-switch-input " value="1" <?php if($permission['admin_users_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="admin_users_edit" class="custom-switch-input " value="1" <?php if($permission['admin_users_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="admin_users_delete" class="custom-switch-input " value="1" <?php if($permission['admin_users_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#39.</td>
   <td>Manage General</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="Manage_general" class="custom-switch-input " value="1" <?php if($permission['Manage_general']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
<td></td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#40.</td>
   <td>Manage Currency</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_currency" class="custom-switch-input " value="1" <?php if($permission['manage_currency']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_currency_add" class="custom-switch-input " value="1" <?php if($permission['manage_currency_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_currency_edit" class="custom-switch-input " value="1" <?php if($permission['manage_currency_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_currency_delete" class="custom-switch-input " value="1" <?php if($permission['manage_currency_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#41.</td>
   <td>Manage Commission</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_commission" class="custom-switch-input " value="1" <?php if($permission['manage_commission']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_commission_add" class="custom-switch-input " value="1" <?php if($permission['manage_commission_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_commission_edit" class="custom-switch-input " value="1" <?php if($permission['manage_commission_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_commission_delete" class="custom-switch-input " value="1" <?php if($permission['manage_commission_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#42.</td>
   <td>Manage Brand</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_brand" class="custom-switch-input " value="1" <?php if($permission['manage_brand']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_brand_add" class="custom-switch-input " value="1" <?php if($permission['manage_brand_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_brand_edit" class="custom-switch-input " value="1" <?php if($permission['manage_brand_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
 <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_brand_delete" class="custom-switch-input " value="1" <?php if($permission['manage_brand_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#43.</td>
   <td>Manage Category</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_category" class="custom-switch-input " value="1" <?php if($permission['manage_category']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_category_add" class="custom-switch-input " value="1" <?php if($permission['manage_category_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_category_edit" class="custom-switch-input " value="1" <?php if($permission['manage_category_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_category_delete" class="custom-switch-input " value="1" <?php if($permission['manage_category_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#44.</td>
   <td>Manage Sub Category</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="sub_category" class="custom-switch-input " value="1" <?php if($permission['sub_category']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="sub_category_add" class="custom-switch-input " value="1" <?php if($permission['sub_category_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="sub_category_edit" class="custom-switch-input " value="1" <?php if($permission['sub_category_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="sub_category_delete" class="custom-switch-input " value="1" <?php if($permission['sub_category_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#45.</td>
   <td>Manage Child Category</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="child_category" class="custom-switch-input " value="1" <?php if($permission['child_category']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="child_category_add" class="custom-switch-input " value="1" <?php if($permission['child_category_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="child_category_edit" class="custom-switch-input " value="1" <?php if($permission['child_category_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>

    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="child_category_delete" class="custom-switch-input " value="1" <?php if($permission['child_category_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#46.</td>
   <td>Manage Country</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="country" class="custom-switch-input " value="1" <?php if($permission['country']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="country_add" class="custom-switch-input " value="1" <?php if($permission['country_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="country_edit" class="custom-switch-input " value="1" <?php if($permission['country_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="country_delete" class="custom-switch-input " value="1" <?php if($permission['country_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
    <tr role="row">   
   <td class="sorting_1" >#47.</td>
   <td>Manage State</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="state" class="custom-switch-input " value="1" <?php if($permission['state']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="state_add" class="custom-switch-input " value="1" <?php if($permission['state_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="state_edit" class="custom-switch-input " value="1" <?php if($permission['state_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="state_delete" class="custom-switch-input " value="1" <?php if($permission['state_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
    <tr role="row">   
   <td class="sorting_1" >#48.</td>
   <td>Manage City</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="city" class="custom-switch-input " value="1" <?php if($permission['city']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="city_add" class="custom-switch-input " value="1" <?php if($permission['city_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="city_edit" class="custom-switch-input " value="1" <?php if($permission['city_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="city_delete" class="custom-switch-input " value="1" <?php if($permission['city_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
    <tr role="row">   
   <td class="sorting_1" >#49.</td>
   <td>Manage Zip Code</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="zipcode" class="custom-switch-input " value="1" <?php if($permission['zipcode']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="zipcode_add" class="custom-switch-input " value="1" <?php if($permission['zipcode_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="zipcode_edit" class="custom-switch-input " value="1" <?php if($permission['zipcode_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
   <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="zipcode_delete" class="custom-switch-input " value="1" <?php if($permission['zipcode_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#50.</td>
   <td>Manage Option</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_option" class="custom-switch-input " value="1" <?php if($permission['manage_option']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_option_add" class="custom-switch-input " value="1" <?php if($permission['manage_option_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_option_edit" class="custom-switch-input " value="1" <?php if($permission['manage_option_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
<td></td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#51.</td>
   <td>Manage Tax</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_tax" class="custom-switch-input " value="1" <?php if($permission['manage_tax']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_tax_add" class="custom-switch-input " value="1" <?php if($permission['manage_tax_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_tax_edit" class="custom-switch-input " value="1" <?php if($permission['manage_tax_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="manage_tax_delete" class="custom-switch-input " value="1" <?php if($permission['manage_tax_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr>
    <tr role="row">   
   <td class="sorting_1" >#52.</td>
   <td>Manage Category Tax</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="category_tax" class="custom-switch-input " value="1" <?php if($permission['category_tax']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="category_tax_add" class="custom-switch-input " value="1" <?php if($permission['category_tax_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="category_tax_edit" class="custom-switch-input " value="1" <?php if($permission['category_tax_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="category_tax_delete" class="custom-switch-input " value="1" <?php if($permission['category_tax_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#53.</td>
   <td>Manage Dimensions Unit</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="dimensions" class="custom-switch-input " value="1" <?php if($permission['dimensions']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="dimensions_add" class="custom-switch-input " value="1" <?php if($permission['dimensions_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="dimensions_edit" class="custom-switch-input " value="1" <?php if($permission['dimensions_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="dimensions_delete" class="custom-switch-input " value="1" <?php if($permission['dimensions_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
    <tr role="row">   
   <td class="sorting_1" >#54.</td>
   <td>Manage Weight Unit</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="weight" class="custom-switch-input " value="1" <?php if($permission['weight']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="weight_add" class="custom-switch-input " value="1" <?php if($permission['weight_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="weight_edit" class="custom-switch-input " value="1" <?php if($permission['weight_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="weight_delete" class="custom-switch-input " value="1" <?php if($permission['weight_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 
  <tr role="row">   
   <td class="sorting_1" >#55.</td>
   <td>Manage Email Templates</td> 
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="template" class="custom-switch-input " value="1" <?php if($permission['template']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="template_add" class="custom-switch-input " value="1" <?php if($permission['template_add']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="template_edit" class="custom-switch-input " value="1" <?php if($permission['template_edit']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
    <td align="center"><div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="template_delete" class="custom-switch-input " value="1" <?php if($permission['template_delete']=='1') echo'checked';?>  > <span class="custom-switch-indicator"></span> </label> </div>
</td>
  </tr> 

                                            </tbody>
                                        </table>
                                </div>
                            </div>

                          

                         

                        
                            
                          
                            <div>
                                <div class="mt-2 mb-2 pull-right">
                                    <button type="submit" class="btn btn-primary">Save Permission</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
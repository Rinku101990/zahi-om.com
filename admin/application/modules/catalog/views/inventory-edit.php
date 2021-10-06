<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Inventory Detail</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('catalog/inventory');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Inventory </button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Inventory Detail</h3> </div>
	<form id="edit_inventory" action="" method="POST">
       <div class="card-body">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div> 	
	<?php } ?>
	 
	 
                        <div class="row">
						
                            <div class="col-lg-6 col-md-12">
                                             <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" name="int_pid" value="<?=getProductName($inventory->int_pid);?>" class="form-control"  placeholder="Product Name" disabled>   </div>
                    </div> 
                    
                </div>
                               
                            </div>
                            
                              <div class="col-lg-6 col-md-12">

                                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Size  <span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" class="form-control" name="int_size" value="<?=$inventory->int_size;?>" placeholder="size"  >  </div>
                    </div> 
                    
                </div>
                               
                            </div>

                            <div class="col-lg-6 col-md-12">

                                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Color  <span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                   
                    <select  class="form-control"  name="int_color">
                      <option value="">Select Color</option>
                      <?php foreach (explode(', ',color()->opt_value) as $cvalue) {?>
                       <option value="<?=$cvalue;?>" <?php if($inventory->int_color==$cvalue)echo'selected';?>><?=$cvalue;?></option>
                     <?php  }?>

                    </select>
                      </div>
                    </div> 
                    
                </div>
                               
                            </div>
                           
                           <div class="col-lg-6 col-md-12">

                              <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Selling Price (<?=currency($this->website->web_currency);?>)  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input type="text" class="form-control" name="int_selleing_price" value="<?=$inventory->int_selleing_price;?>" placeholder="Selling Price" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" >   </div>
                    </div> 
                    
                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">

                                   <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Total Quantity  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" class="form-control" name="int_total_qty" value="<?=$inventory->int_total_qty;?>" placeholder="Total Quantity "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">  </div>
                    </div> 
                    
                </div>
                           
                            </div>
                           
                            <div class="col-lg-6 col-md-12">

                                   <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Balance Quantity  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" class="form-control" name="int_available_qty" value="<?=$inventory->int_available_qty;?>" placeholder="Initial Quantity "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">  </div>
                    </div> 
                    
                </div>
                           
                            </div>

                <!--              <div class="col-lg-6 col-md-12">-->

                <!--                  <div class="row">-->
                <!--    <div class="col-sm-6 col-md-4">-->
                <!--        <div class="form-group">-->
                <!--            <label class="form-label">Minimum Purchase Quantity  <span class="text-red">*</span></label>-->
                <!--           </div>-->
                <!--    </div>-->
                <!--    <div class="col-sm-6 col-md-8">-->
                <!--        <div class="form-group">                          -->
                <!--    <input type="number" class="form-control" name="int_min_purchase_qty" value="<?=$inventory->int_min_purchase_qty;?>" placeholder="Minimum Purchase Quantity" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" >  </div>-->
                <!--    </div> -->
                    
                <!--</div>-->
                               
                <!--            </div>-->

                             <div class="col-lg-6 col-md-12">

                                           <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Stock  <span class="text-red">*</span>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <select name="int_stock" class="form-control "   >
                                     <option value="">--Select--</option>
                                      <option value="1" <?php if($inventory->int_stock=='1')echo'selected';?>>Yes</option>
                                       <option value="2" <?php if($inventory->int_stock=='2')echo'selected';?>>No</option>
                                   
                                     </select>
                                 </div>
                    </div> 
                    
                </div>
                             
                           
                        </div>

                            <div class="col-lg-6 col-md-12">

                                           <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Product Condition  <span class="text-red">*</span>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                  <select  name="int_condition" class="form-control int_condition ">
  <option value="0" <?php if(@$inventory->int_condition=='0')echo'selected';?>>New</option>
  <option value="1" <?php if(@$inventory->int_condition=='1')echo'selected';?>>Used</option>
<option value="2" <?php if(@$inventory->int_condition=='2')echo'selected';?>>Refurbished</option>
</select>
                                 </div>
                    </div> 
                    
                </div>
                             
                           
                        </div>

            
                       

                   
                        
                       
                       							 
						
						
                       
                    </div>
                    <div class="card-footer1"> <button type="submit" class="btn btn-success mt-1">Save Changes</button> </div>
					</form>
					
					<br>
					
                </div>
               
            </div>
        </div>
        <!-- row closed -->
        
    </div>
</div>
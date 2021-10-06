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
</style>
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Volume Discount Detail</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('catalog/volume-discount');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Volume Discount </button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Volume Discount</h3> </div>
	<form id="edit_volume_discount" action="" method="POST">
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
                   <select name="vd_pid" class="form-control select2 select2-selection--single w-100 select2-hidden-accessible " data-placeholder="Select Product Name" tabindex="-1" aria-hidden="true">
         <option value="">Select</option>
         <?php if(!empty($product)){
             foreach($product as $product_list){
            echo'<option value="'.$product_list->p_id.'">'.$product_list->p_name.'</option>';
             }
         }
         ?>
         
    </select>  </div>
                    </div> 
                    
                </div>
                               
                            </div>
                           
                           <div class="col-lg-6 col-md-12">

                           	 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Minimum Purchase Quantity
 <span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <input type="number" class="form-control" name="vd_min_purchase_qty"  placeholder="Minimum Purchase Quantity" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" > </div>
                    </div> 
                    
                </div>
                             
                            </div>
                           
                            <div class="col-lg-6 col-md-12">
                            	<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Discount (%)<span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">  
                                                     
          <input type="number" name="vd_discount" class="form-control "autocomplete="off" placeholder="Discount " onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))"  >
           </div>
                    </div> 
                    
                </div>
                                
                            </div>

                          

                             <div class="col-lg-6 col-md-12">
                             	<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Status<span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <select name="vd_status" class="form-control "   >
                                     <option value="">--Select--</option>
                                      <option value="1" selected="">Active</option>
                                       <option value="2" >In-Active</option>
                                   
                                     </select>
                                  </div>
                    </div> 
                    
                </div>
                               
                           
                        </div>
                       

                   
                        
                       
                       							 
						
						
                       
                    </div>
                    <br/>
                   
                    <div class="card-footer1"> <button type="submit" class="btn btn-primary btn2" value="edit"><i class="fa fa-save"></i> Submit</button>
                    <button type="reset" class="btn btn-secondary btn2" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button> </div>
               
					</form>
					
					<br>
					
                </div>
               
            </div>
        </div>
        <!-- row closed -->
        
    </div>
</div>
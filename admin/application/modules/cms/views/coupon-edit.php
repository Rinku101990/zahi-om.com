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
                <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('cms/discount-coupons');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Coupons</button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Coupon</h3> </div>
  <form id="add_coupon" action="" method="POST" enctype="multipart/form-data">
       <div class="card-body">
  <?php $msg=$this->session->flashdata('msg');  
  if($msg){  ?>
  <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div>  
  <?php }  $number='CUP'.rand(10,1000000);?>

   
                        <div class="row">
              <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Coupon Code <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
              <div class="form-group">    
    <input type="text" class="form-control" name="cup_code"  value="<?=$coupon->cup_code;?>" placeholder="Coupon Code"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                            <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Coupon Name <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="cup_name" value="<?=$coupon->cup_name;?>"  placeholder="Coupon Name"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
 <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Min. Order Amount (<?=currency($this->website->web_currency);?>) <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
              <div class="form-group">    
    <input type="text" class="form-control" name="cup_min_order" value="<?=$coupon->cup_min_order;?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" placeholder="Min. Order Amount"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                            
            
                            <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Coupon Discount (%) <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
              <div class="form-group">    
    <input type="text" class="form-control" name="cup_discount" value="<?=$coupon->cup_discount;?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  placeholder="Coupon Discount(%)"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                             
                              <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Start Date <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
          	<div class="form-group">  
                        	<i class="fa fa-calendar input-icon"></i>                              
          <input type="text" name="cup_start_date" class="form-control input-group date" id="sp_start_date" value="<?=$coupon->cup_start_date;?>" autocomplete="off" placeholder="Start Date " style=" padding-left: 27px;">
           </div>
            
                    </div> 
                    
                </div>
                               
                            </div>
                              <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">End Date <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
             	<div class="form-group">  
                        	<i class="fa fa-calendar input-icon"></i>                              
          <input type="text" name="cup_end_date" class="form-control input-group date" id="sp_start_date" value="<?=$coupon->cup_end_date;?>" autocomplete="off" placeholder="End Date " style=" padding-left: 27px;">
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





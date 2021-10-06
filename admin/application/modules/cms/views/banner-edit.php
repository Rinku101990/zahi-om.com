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
                <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('cms/banners');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Banners</button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Banner</h3> </div>
  <form id="edit_banner" action="" method="POST" enctype="multipart/form-data">
       <div class="card-body">
  <?php $msg=$this->session->flashdata('msg');  
  if($msg){  ?>
  <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div>  
  <?php } ?>

   
                        <div class="row">
            
                            <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Banner Name <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="slr_name" value="<?=$banner->slr_name;?>" placeholder="Banner Name"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
              </div>


               <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Banner Order No <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="slr_order" value="<?=$banner->slr_order;?>"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  placeholder="Banner Order No."  >                      
                    </div>
                    </div> 
                    
                </div>
                               
              </div>
                <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Banner Url <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="url" class="form-control" name="slr_url"  value="<?=$banner->slr_url;?>"  placeholder="Banner Url"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
              </div>

               <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Pormotion Cost (<?=currency($this->website->web_currency);?>) <span class="text-red"></span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="slr_cost" value="<?=$banner->slr_cost;?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  placeholder="Banner Pormotion Cost"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
              </div>

  
                               <div class="col-lg-12 col-md-12" >
                                            <div class="row">
                    <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <label class="form-label"> Banner Image <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
            <input type="file" class="form-control" name="slr_img" id="image_file" onchange="preview_image();" />  
            <input type="hidden" name="img" value="<?=$banner->slr_img;?>">
                   
                    </div>
                    </div> 
                     <div class="col-sm-6 col-md-2">
                        <div class="form-group"> 
                    <span id="image_preview"><?php if($banner->slr_img){?><img src="<?=base_url('uploads/banner/').$banner->slr_img;?>"  style="width:100px; height: 50px;" /><?php }?></span>                    
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



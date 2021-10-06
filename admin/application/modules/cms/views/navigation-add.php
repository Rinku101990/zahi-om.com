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
                <li class="breadcrumb-item active" aria-current="page">Add Navigation</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('cms/navigation');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Navigation</button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Navigation</h3> </div>
  <form id="add_navigation" action="" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Menu Name (En) <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="mn_name"  placeholder="Menu Name (En)"  onkeyup="slug_url(this.value,'mn_slug')">
                       <input type="hidden" name="mn_slug" id="mn_slug" class="form-control form-control-sm"  />
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                           
            
                            <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Menu Name (Ar) <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="mn_name_ar"  placeholder="Menu Name Ar"  dir="rtl" style="text-align: right;
direction:RTL;">                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>

 <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Menu Order No. <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="mn_order"  placeholder="Menu Order No. "   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                  

                               <div class="col-lg-12 col-md-12">
                                     <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Menu Page Layout <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
                   <select class="form-control page_layout" name="mn_layout">
                  
                    <option value="1" selected="">Category </option>
                     <option value="2">Page</option>

                </select>
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                          
                      
                             <div class="col-lg-12 col-md-12"  id="category">
                                            <div class="row">
                    <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <label class="form-label">Category <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
            <select name="mn_category_id" class="form-control">
              <option value="">Select</option>
              <?php if(!empty($category)){
                foreach ($category as $key => $ct_list) {
                echo '<option value="'.$ct_list->cate_id.'">'.$ct_list->cate_name.'</option>';
                }
              }?>
          </select>
                   
                    </div>
                    </div> 
                    
                    
                </div>
                               
                            </div>
                               <div class="col-lg-12 col-md-12" id="category1">
                                            <div class="row">
                    <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <label class="form-label">Cate. Banner Image <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
            <input type="file" class="form-control" name="mn_banner_img" id="image_file" onchange="preview_image();" />  
                   
                    </div>
                    </div> 
                     <div class="col-sm-6 col-md-2">
                        <div class="form-group"> 
                    <span id="image_preview"></span>                    
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>






    <div class="col-lg-12 col-md-12" id="page" style="display: none" >
                                            <div class="row">
                    <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <label class="form-label">Page <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
            <select name="mn_page_id" class="form-control">
               <option value="">Select</option>
              <?php if(!empty($page)){
                foreach ($page as $key => $pg_list) {
                echo '<option value="'.$pg_list->pg_id.'">'.$pg_list->pg_title.'</option>';
                }
              }?>
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



   <script src="<?=base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>  
    <script type="text/javascript">
$(document).ready(function(){
    $( ".page_layout" ) .change(function () { 
    var page_layout   = $('.page_layout').val();
  
    if(page_layout=='1'){
        $('#category').show();
         $('#category1').show();
          $('#page').hide();
    }else{
        $('#category').hide();
         $('#category1').hide();
         $('#page').show();
    }
    }); 

});

 

 
</script>


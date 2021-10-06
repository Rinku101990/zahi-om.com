<?php if($page->page_layout=='1')
      { 
        $img1=$page->img1; 
        $img2=$page->img2; 
        $img3='';
        $img4='';
        $content1=$page->content1;
        $content2=$page->content2;
        $content3=$page->content3;
        $content4=$page->content4;
        $content5='';
        $content6='';
        $content7='';
    }else{          
        $img3=$page->img1; 
        $img4=$page->img2; 
        $img1='';
        $img2='';
        $content5=$page->content1;
        $content6=$page->content2;
        $content7=$page->content3;
        $content4='';
        $content3='';
        $content2='';
        $content1='';
    }?>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Content Page Detail</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('cms/content-page');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Content Page</button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Content Page Detail</h3> </div>
	<form id="edit_content_page" action="" method="POST" enctype="multipart/form-data">
       <div class="card-body">
         <nav class="nav nav-tabs nav-justified" style="margin: 0 0 20px 0; background: #f2f3f8;">
<a class="nav-item nav-link active" data-toggle="tab" href="#English"><i class="fa fa-language"></i> English</a>
<a class="nav-item nav-link" data-toggle="tab" href="#Arabic"><i class="fa fa-language"></i> Arabic</a>

</nav>
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div> 	
	<?php } ?>
<input type="hidden" name="page_layout" value="1"> 
           <div class="tab-content">
<div id="English" class="tab-pane active fade in">         
	 
                        <div class="row">
						
                            <div class="col-lg-12 col-md-12">
                            		 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Page Title <span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="pg_title" value="<?=$page->pg_title;?>"  placeholder="Page Title"  >                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>

                  <div class="col-lg-12 col-md-12">
                   <div class="row">
                    <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                      <label class="form-label">Page Banner Image <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
            <input type="file" class="form-control" name="pg_banner_img" id="image_file" onchange="preview_image();" />  
            <input type="hidden" name="banner_img" value='<?=$page->pg_banner_img;?>' />
                   
                    </div>
                    </div> 
                     <div class="col-sm-6 col-md-2">
                        <div class="form-group"> 
                    <span id="image_preview"> <?php if(!empty($page->pg_banner_img)){?><img src="<?=base_url('uploads/content-page/').$page->pg_banner_img;?>"  style="width:50px; height: 50px;" /><?php }?></span>                    
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>

                              
                               <div class="col-lg-10 col-md-10">
                                     <div class="row">
                 
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">    
                   <textarea class="form-control" name="content1" id="summernote3" placeholder="Template Subject"><?=$content1;?></textarea>
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>
                           

                           
                       
                           
                            

                            

                           
                       
                       							 
						
						
                       
                    </div>

                    </div>
 <div id="Arabic" class="tab-pane fade">
  <div class="row">

 <div class="col-lg-12 col-md-12">
                                 <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Page Title <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">    
    <input type="text" class="form-control" name="pg_title_ar" value="<?=$page->pg_title_ar;?>"  placeholder="Page Title"  style="text-align: right;
direction:RTL;">                      
                    </div>
                    </div> 
                    
                </div>
                               
                            </div>

 <div class="col-lg-10 col-md-10">
                                     <div class="row">
                 
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">    
                   <textarea class="form-control" name="content2" id="summernote2" placeholder="Template Subject" style="height:100px;text-align: right;direction:RTL;"><?=$content2;?></textarea>
                    </div>
                    </div> 
                    
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
        $('#Layout1').show();
          $('#Layout2').hide();
    }else{
        $('#Layout1').hide();
         $('#Layout2').show();
    }
    }); 

});

 

 
</script>


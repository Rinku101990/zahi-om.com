<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Template Edit</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('settings/templates');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Template </button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
       
       
      <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Template Edit</h3> </div>
            <div class="card-body">
			
		 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
	<form id="template_add" method="post">
	<div class="row">
				<div class="col-md-12"><h3>Replacement Variables</h3></div><div class="col-md-12">{user_full_name} Name of the email receiver.<br>
{Company_Logo} Logo of our website<br>
{website_name} Name of our website<br>
{verification_url} Url to verify email<br>
{contact_us_url} <br>
{social_media_icons} <br>
<br>
</div></div>
	  
              <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Template Name <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-9">
                        <div class="form-group">                          
                       <input type="text" class="form-control"  value="<?=$tamplate_info->tp_name;?>" name="tp_name" placeholder="Template Name" /> 
					  </div>
                    </div> 
                    
                </div>
				
				 <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Template Subaject <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-9">
                        <div class="form-group">                          
                       <input type="text" class="form-control"  value="<?=$tamplate_info->tp_subject;?>" name="tp_subject" placeholder="Template Subject" /> 
					  </div>
                    </div> 
                    
                </div>
								 <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Template Body <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-9">
                        <div class="form-group">                          
                       <textarea class="form-control" name="tp_body" id="summernote" placeholder="Template Subject" ><?=$tamplate_info->tp_body;?></textarea> 
					  </div>
                    </div> 
                    
                </div>
				
				
				<div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
				<button type="reset" class="btn btn-secondary"><i class="fa fa-remove"></i>  Cancel</button>
               
            </div>
        </div>
		
		</form>
            </div>
			  </div>
            </div>
        </div>
    </div>
    
</div>
       
        
    </div>
</div>
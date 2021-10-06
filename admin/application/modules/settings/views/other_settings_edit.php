<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings Edit</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('settings/other');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Settings </button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
       
       
      <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Settings Edit</h3> </div>
            <div class="card-body">
			
		 <div class="row">
    <div class="col-xl-6 col-lg-12 col-md-12">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
	<form id="other_edit" method="post">
	  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Name <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" value="<?=$other_info->name;?>" name="name" disabled /> 
					  </div>
                    </div> 
                    
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Minimum Order  (OMR) <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="number" class="form-control" value="<?=$other_info->min_value;?>" name="min_value" /> 
					  </div>
                    </div> 
                    
                </div>
				
				 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Amount (OMR) <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="number" class="form-control" value="<?=$other_info->value;?>" name="value" /> 
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
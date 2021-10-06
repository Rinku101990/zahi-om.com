<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category Tax Add</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('settings/category-tax');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Category Tax </button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
       
       
      <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Category Tax Add</h3> </div>
            <div class="card-body">
			
		 <div class="row">
    <div class="col-xl-6 col-lg-12 col-md-12">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
	<form id="category_tax_add" method="post">
             <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Tax Name <span class="text-red">*</span> </label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">   
                          <select class="form-control" name="txt_name" > 
                          <option value="">--Select--</option>
                          <?php if($tax==true){
                           foreach($tax AS $txt_value){
                       echo'<option value="'.$txt_value->txt_id.'" >'.$txt_value->txt_name.'</option>';}}?>
                        
                         </select>                       

                      </div>
                    </div> 
                    
                </div>
	 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Category <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <select class="form-control" name="cate_id" > 
					   <option value="">--Select--</option>
					   <?php if(!empty($category)){
						   foreach($category AS $cate){
					   echo'<option value="'.$cate->cate_id.'" >'.$cate->cate_name.'</option>';}}?>
						
						 </select> </div>
                    </div> 
                    
                </div>
				
				
				 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Percentage (%) <span class="text-red">*</span> </label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" name="txt_per" /> 
					  </div>
                    </div> 
                    
                </div>
				
				<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label"> Status <span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <select class="form-control" name="txt_status" > 
					   <option value="">--Select--</option>
					    <option value="1" selected>Active</option>
						 <option value="2">In Active</option>
						 </select></div>
                    </div> 
                    
                </div>
				
				<div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit </button>
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
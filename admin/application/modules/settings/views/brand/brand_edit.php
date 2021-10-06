<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand Edit</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('settings/brand');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Brand</button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
       
       
      <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Brand Edit</h3> </div>
            <div class="card-body">
			
		 <div class="row">
    <div class="col-xl-6 col-lg-12 col-md-12">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
	<form id="brand_edit" method="post" enctype="multipart/form-data">
	 

     <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Seller <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">               
                        <select name="vnd_id" class="form-control">
                            <option value="">Select Seller</option>
                            <?php if($seller==true){
                                foreach ($seller as $sl_val) {?>
                            <option value="<?php echo $vdid=$sl_val->vnd_id;?>" <?php if($brand_info->vnd_id==$vdid)echo'selected';?>><?=$sl_val->vnd_name;?></option>
                        <?php }}?>
                        </select>           
                       </div>
                    </div> 
                    
                </div>

              <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Brand Name (En) <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" value="<?=$brand_info->brd_name;?>" name="brd_name" placeholder="Brand Name" onkeyup="slug_url(this.value,'brd_slug')">
                       <input type="hidden" name="brd_slug" value="<?=$brand_info->brd_slug;?>" id="brd_slug" class="form-control form-control-sm"  /> </div>
                    </div> 
                    
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Brand Name (Ar) <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" value="<?=$brand_info->brd_name_ar;?>" name="brd_name_ar" placeholder="Brand Name" dir="rtl" style="text-align: right;direction:RTL;"> </div>
                    </div> 
                    
                </div>
                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Brand Logo <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="file" class="form-control" name="brd_img" placeholder="Category Image Upload" accept="image/*"> </div>
                    </div>
                    <div class="col-sm-12 col-md-12 text-right"> 
                        <?php if(!empty($brand_info->brd_img)){?>
                        <img src="<?=base_url('uploads/brand/').$brand_info->brd_img;?>" style="width:70px;height:80px;    object-fit: contain;">
                    <?php }?>
                    </div>
                    
                </div>
                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Meta Title <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                
                         <textarea class="form-control" name="cate_meta_title" id="cate_meta_title" placeholder="Meta Description" ><?=$brand_info->cate_meta_title;?></textarea>            
                   
                       </div>
                    </div> 
                </div>
                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Meta Keyword <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">       
                          <textarea class="form-control" name="cate_meta_keyword"  placeholder="Meta Description" ><?=$brand_info->cate_meta_keyword;?></textarea>                   
                       
                       </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">

                            <label class="form-label">Meta Description <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <textarea class="form-control" name="cate_meta_description" placeholder="Meta Description" ><?=$brand_info->cate_meta_description;?></textarea>
                       </div>
                    </div> 
                </div>
				 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Brand Status <span class="text-red">*</span></label>
                           </div>
                    </div>
					<div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <select class="form-control" name="brd_status" > 
					   <option value="">--Select--</option>
					    <option value="1" <?php if($brand_info->brd_status=='1')echo'selected';?>>Active</option>
						 <option value="2" <?php if($brand_info->brd_status=='2')echo'selected';?>>In Active</option>
						 </select></div>
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
<style>
.slick-slide{display:block;}
</style>

		
		<section class="main_content_area my_account">
				<div class="container">
	                <div class="account_dashboard">
	                    <div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="breadcrumb_content">
	         <div class="breadcrumb_header">
	  <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> Add Product</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title">
	                            <h3>Add Product</h3>
	                        </div>
							<div class="action btn-group-scroll pull-right">
                        
                        <div class="save_button primary_btn default_button">
<a href="<?=base_url('product');?>"><button class="btn_submit" name="btn_submit">List Product</button></a>
	                                                    </div>
                                </div>
						
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="account_dashboard ">
	                    <div class="row">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title ">Add Product</h5>
<hr>
	                            <!-- Tab panes -->
<div class="tab-content ">
<div class="tab-pane fade show active" id="dashboard">
	                                   
<div class="row">
	
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="account_login_form">
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
<form id="change_password" action="" method="post">
<div class="row">
 <div class="col-sm-6 col-md-4">
 <h5>Select Product Category </h5>
 <ul class="category-list">
 <?php if(!empty($category)){
	 foreach($category AS $cate_list){
	 $count=category_count($cate_list->cate_id);
	 if(!empty($count)){?>
 <li onClick="category(<?=$cate_list->cate_id;?>,'<?=base_url();?>',this)" ><a href="javascript:void(0)" ><?=$cate_list->cate_name;?> (<?=category_count($cate_list->cate_id);?>)</a></li>
	 <?php }else{?>
	  <li><a href="javascript:void(0)"><?=$cate_list->cate_name;?> (<?=category_count($cate_list->cate_id);?>)</a></li>
	 <?php }}}?>
 </ul>
 
 </div>
 <div class="col-sm-6 col-md-4">
 <label>&nbsp; </label>

 <ul class="category-list sub_category_list">
 
 </ul>
 
 </div>
 <div class="col-sm-6 col-md-4">
 <label>&nbsp; </label>
 <ul class="category-list child_category_list">
 
 </ul>
 
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
	                                    
	                                          </div>
	                                
	                                
	                               
	                               
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>       	
            </section>
           
		
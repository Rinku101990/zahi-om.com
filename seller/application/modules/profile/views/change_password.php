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
	                            <span> Change Password</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title">
	                            <h3>Change Password</h3>
	                        </div>
							<br>
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="account_dashboard ">
	                    <div class="row">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<h5 class="cards-title ">Change Password</h5>
<hr>
	                            <!-- Tab panes -->
<div class="tab-content ">
<div class="tab-pane fade show active" id="dashboard">
	                                   
<div class="row">
	
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="account_login_form">
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
<form id="change_password" action="" method="post">
<div class="row">
 <div class="col-sm-12 col-md-12">
 <label>Old Password <span class="red">*</span></label>
 <input type="password" name="old_password" />
 </div>
 
 <div class="col-sm-12 col-md-12">
 <label>New Password <span class="red">*</span></label>
 <input type="password" name="new_password" />
 </div>

 
 <div class="col-sm-12 col-md-12">
 <label>Confirm Password <span class="red">*</span></label>
 <input type="password" name="confirm_password" id="password2" />
 </div>
 
 
 
 
 
 </div>
<br/>
<div class="save_button primary_btn default_button">
	                                                <input type="submit" class="btn_submit" name="btn_submit" value="Save Changes">
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
           
		
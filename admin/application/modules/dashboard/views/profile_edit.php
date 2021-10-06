<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="userprofile">
                                <div class="userpic  brround mb-3"> <img src="<?php if(!empty($admin->mst_picture)){echo base_url('uploads/profile/').$admin->mst_picture;}else{echo base_url('uploads/profile/avatar.png');}?>" alt="<?=$admin->mst_name;?>" class="userpicimg brround" style="width:128px;height:128px;"> </div>
                                <h3 class="username mb-2"><?=$admin->mst_name;?></h3>
                                <p class="mb-1 text-muted">Admin</p>
                              
                                <div class="socials text-center mt-3">
                                    <a href="" class="btn btn-circle btn-primary "> <i class="fa fa-facebook"></i></a>
                                    <a href="" class="btn btn-circle btn-danger "> <i class="fa fa-google-plus"></i></a>
                                    <a href="" class="btn btn-circle btn-info "> <i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Change Password</div>
                    </div>
<form id="change_password" action="<?php echo base_url('dashboard/change_password');?>" method="POST">
                    <div class="card-body">
<?php $p_msg=$this->session->flashdata('p_msg');  
	if($p_msg){  ?>
	<div class="alert alert-<?php echo $p_msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $p_msg['type'] ?></strong> <?php echo $p_msg['message']; ?>
    </div> 	
	<?php } ?>
                        
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control" name="old_password">
 </div>
 </div> <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password2">
							</div>
							</div>
							 <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
							</div>
							</div>
                    </div>
                    </div>
                    <div class="card-footer text-right"> 
					<button type="submit" class="btn btn-primary">Updated</button> <button type="reset" class="btn btn-danger">Clear</button> </div>
					</form>
                </div>
                <div class="card panel-theme">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title">Contact</h3> </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="list-group no-margin">
                            <li class="list-group-item"><i class="fa fa-envelope mr-4"></i><?=$this->website->web_support_email;?></li>
                            <li class="list-group-item"><i class="fa fa-globe mr-4"></i> <?=$this->website->web_site_url;?></li>
                            <li class="list-group-item"><i class="fa fa-phone mr-4"></i> +91-<?=$this->website->web_support_contact;?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3> </div>
	<form id="edit_profile" action="<?php echo base_url('dashboard/profile-edit');?>" method="POST">
       <div class="card-body">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div> 	
	<?php } ?>
	 
	 
                        <div class="row">
						  <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputname">Master Id <span class="text-red">*</span></label>
                                    <input type="text" name="mst_ref_id" value="<?=$admin->mst_ref_id;?>" class="form-control"  placeholder="Master Id"> </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputname">Full Name <span class="text-red">*</span></label>
                                    <input type="text" name="mst_name" value="<?=$admin->mst_name;?>" class="form-control"  placeholder="Full Name"> </div>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address <span class="text-red">*</span></label>
                            <input type="email" class="form-control" name="mst_email" value="<?=$admin->mst_email;?>" placeholder="Email Address" disabled> </div>
							 <div class="row">
							<div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputnumber">Contact Number <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="mst_mobile_number" value="<?=$admin->mst_mobile_number;?>" placeholder="Conatct Number" minlength="10" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
							</div>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-12 col-md-12">
							 <div class="form-group">
                            <label for="exampleInputnumber">Address <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="mst_address" value="<?=$admin->mst_address;?>" placeholder="Address">
							</div>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">About Me</label>
                            <textarea name="mst_about" class="form-control" placeholder="Hello...." rows="6"><?=$admin->mst_about;?></textarea>
                        </div>
                        </div>
                        </div>
                       
                       
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-success mt-1">Update</button> </div>
					</form>
					
					<br>
					
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Connected</h3> </div>
                    <div class="card-body p-5">
                        <div class="memberblock mb-0">
                            <div class="row ">
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 pl-1 pr-1 mb-5 mb-xl-0">
                                    <a href="" class="member"><img src="../assets/images/users/3.jpg" alt="">
                                        <div class="memmbername">Ajay Sriram</div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 pl-1 pr-1 mb-5 mb-xl-0">
                                    <a href="" class="member"><img src="../assets/images/users/8.jpg" alt="">
                                        <div class="memmbername">Samantha</div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 pl-1 pr-1 mb-5 mb-xl-0">
                                    <a href="" class="member"><img src="../assets/images/users/4.jpg" alt="">
                                        <div class="memmbername">Stella</div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 pl-1 pr-1 mb-5 mb-xl-0">
                                    <a href="" class="member"><img src="../assets/images/users/2.jpg" alt="">
                                        <div class="memmbername">James Thomas</div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 pl-1 pr-1 mb-5 mb-xl-0">
                                    <a href="" class="member"><img src="../assets/images/users/8.jpg" alt="">
                                        <div class="memmbername">Christopher</div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 pl-1 pr-1 m-t-5 m-b-5">
                                    <a href="" class="member"><img src="../assets/images/users/5.jpg" alt="">
                                        <div class="memmbername">Manish Sriram</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
        
    </div>
</div>
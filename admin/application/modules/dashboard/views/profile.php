<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row" id="user-profile">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="wideget-user">
                            <div class="row">
                                <div class="col-lg-12 col-xl-6 col-md-12">
                                    <div class="wideget-user-desc d-flex">
                                        <div class="wideget-user-img">
<img class="" src="<?php if(!empty($admin->mst_picture)){echo base_url('uploads/profile/').$admin->mst_picture;}else{echo base_url('uploads/profile/avatar.png');}?>" alt="<?=$admin->mst_name;?>" style="width:128px;height:128px;"> </div>
                                        <div class="user-wrap mt-lg-0">
                                            <h4><?=$admin->mst_name;?></h4>
                                            <h6 class="text-muted mb-3 font-weight-normal">Member Since: <?=date('F Y',strtotime($admin->mst_created));?></h6> 
<form enctype="multipart/form-data" action="<?=base_url('dashboard/profile_image');?>" method="post" name="image_upload_form" id="image_upload_form">
<div id="imgArea">						
<div id="imgChange"><span class="btn btn-primary mt-1 mb-1"><i class="ion ion-image"></i> Change Picture</span>
        <input type="file" accept="image/*" name="mst_picture" id="image_upload_file" onchange="this.form.submit()">
      </div>
    </div>
	</form>
			<a href="<?=base_url('dashboard/profile-edit');?>" class="btn btn-secondary mt-1 mb-1"><i class="fe fe-camera"></i> Edit Profile</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border-0">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-51">
                                    <div id="profile-log-switch">
                                        <div class="table-responsive mb-5">
                                            <table class="table row table-borderless w-100 m-0 border">
                                                <tbody class="col-lg-6 p-0">
                                                  
 <tr>
                                                        <td><strong>Master ID :</strong> <?=$admin->mst_ref_id;?></td>
                                                    </tr>
													<tr>
                                                        <td><strong>Full Name :</strong> <?=$admin->mst_name;?></td>
                                                    </tr>
                                                  
													 <tr>
                                                        <td><strong>Communication Address :</strong> <?=$admin->mst_address;?></td>
                                                    </tr>
													 
													 <tr>
                                                        <td><strong>Last Login :</strong> <?php echo date_formate($admin->mst_lastLogin);?></td>
                                                    </tr>
													
													 <tr>
                                                        <td><strong>Account Status :</strong>  <?php if($admin->mst_status=='active'){ ?>
                        <span class="btn btn-success btn-sm my-0s">Active</span>
                      <?php }else{ ?>
                        <span class="btn btn-danger btn-sm my-0s">Inactive</span>
                      <?php } ?></td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>
                                                <tbody class="col-lg-6 p-0">
                                                  <tr>
                                                        <td><strong>Username :</strong> <?=$admin->mst_username;?></td>
                                                    </tr>
                                                     <tr>
                                                        <td><strong>Email Id :</strong> <?=$admin->mst_email;?></td>
                                                    </tr>
                                                   <tr>
                                                        <td><strong>Created/Modified :</strong>  <?php 
					          echo  date_formate($admin->mst_created);
					          if(!empty($admin->mst_updated)){
								echo '/'.date_formate($admin->mst_updated);
							    }
							?></td>
                                                    </tr>
													 <tr>
                                                        <td><strong>Last Logout :</strong> <?php echo date_formate($admin->mst_lastLogout);?></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="p-5 border">
                                            <div class="media-heading">
                                                <h4><strong>About me</strong></h4> </div>
                                            <p class="description mb-5"><?php echo $admin->mst_about;?></p>                                          
                                         
                                        </div>
                                    </div>
                                </div>
                               
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
        <!-- row closed -->
    </div>
</div>
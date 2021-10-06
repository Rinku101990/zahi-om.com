<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Admin Users</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                    <a href="<?php echo site_url('users');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Admin Users </button>
                    </a>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Admin Users</div>
                        <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body">
                        <?php $msg=$this->session->flashdata('msg');  
    if($msg){  ?>
    
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert">  <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
    <?php }?>
                        
                        <form id="admin_users" action="" method="post" >
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Full Name <span class="red">*</span></label>
                                        <input type="text" class="form-control"  name="mst_name" placeholder="Enter Full Name" onkeyup="slug_url(this.value,'mst_username')" value="<?php echo $users->mst_name;?>">
                                       
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Username <span class="red">*</span></label>
                                      <input type="text" class="form-control" name="mst_username" placeholder="Enter Username" id="mst_username" value="<?=$users->mst_username;?>"> 
                                    </div>
                                </div>
                            </div>
                               <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Email Address <span class="red">*</span></label>
                                        <input type="text" class="form-control"  name="mst_email" placeholder="Enter Email Address"  value="<?php echo $users->mst_email;?>" readonly disabled >
                                       
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Contact Number <span class="red">*</span></label>
                                  
                                       <input type="text" class="form-control" name="mst_mobile_number" placeholder="Enter Contact Number"  maxlength="10" minlength="10" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))"  value="<?=$users->mst_mobile_number;?>"> 
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Password<span class="red">*</span></label>
                                        <input type="password" class="form-control" name="mst_password" placeholder="Enter Password" id="mst_password" > 
                                    </div>
                                </div>
                          
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Confirm Password<span class="red">*</span></label>
                                        <input type="password" class="form-control" name="mst_conf_password" placeholder="Enter Confirm Password" > 
                                    </div>
                                </div>
                          
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Status<span class="red">*</span></label>
                                        <select class="form-control" name="mst_status" > 
                                        <option value="active" <?php if($users->mst_status=='active') echo'selected';?>>Active</option>
                                        <option value="in-active" <?php if($users->mst_status=='in-active') echo'selected';?>>In-Active</option>
                                        </select>
                                    </div>

                                   <!--  <div class="form-group"> 
       <label class="custom-switch"> <input type="checkbox" name="p_warranty_policy[]" class="custom-switch-input warranty_policy" value="2" checked=""> <span class="custom-switch-indicator"></span> </label> </div> -->
                                </div>
                            </div>

                            <div>
                                <div class="mt-2 mb-2 pull-right">
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Manage Profile Zahi">
      <meta name="description" content="Manage Profile Zahi">
      <meta name="author" content="Manage Profile Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Manage Profile Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>




<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Manage Profile</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Manage Profile</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <?php $this->load->view('account/sidebar.php');?>
                <div class="col-lg-9  col-md-8">
                    <div class="main-content">
                        <!-- Page title -->
                        
                        <form id="profile_update" action="" method="post" enctype="multipart/form-data">
                            <div class="form-box bg-white">
                                <div class="form-box-title px-3 py-2">
                                    Basic info
                                </div>
                                <div class="form-box-content p-3">
                                    <?php $msg=$this->session->flashdata('msg');if($msg){  ?>
                                    <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span>
                                        <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    </div>
                                    <?php }?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>First Name <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mb-3" placeholder="Your First Name" name="cust_fname" value="<?=$this->customer->cust_fname;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Last Name <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mb-3" placeholder="Your Last Name" name="cust_lname" value="<?=$this->customer->cust_lname;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Your Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control mb-3" placeholder="Your Email" name="email" value="<?=$this->customer->cust_email;?>" disabled="" readonly="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Contact No.<span class="red">*</span></label>
                                        </div>
                                          <div class="col-md-3">
                                           <select name="cust_phone_code" class="form-control"  required>
                                        <option value="">Select</option>
                                        <?php if(country_code() == TRUE){
                                            foreach (country_code() as $cncval) {?>
                                                <option value="<?php echo $cnt_id=$cncval->cnt_id;?>" <?php if($this->customer->cust_phone_code==$cnt_id) echo'selected';?>><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
                                                <?php 
                                            }
                                        }?>
                                    </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" placeholder="Your Contact Number" name="cust_phone" value="<?=$this->customer->cust_phone;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Gender<span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="radio" name="cust_gender" value="1" style="width: 16px;vertical-align: text-top; height: 20px;" <?php if($this->customer->cust_gender=='1')echo'checked';?> required>&nbsp; Male &nbsp;&nbsp;
                                            <input type="radio" name="cust_gender" value="2" style="width: 16px;vertical-align: text-top; height: 20px;" <?php if($this->customer->cust_gender=='2')echo'checked';?>>&nbsp; Female
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Date Of Birth <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control mb-3 input-group date" placeholder="Your Date Of Birth" name="cust_dob" value="<?=$this->customer->cust_dob;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Country <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="cust_country" class="form-control mb-3 Country" url="<?=base_url();?>" required>
                                                <option value="">--Select--</option>
                                                <?php if(!empty($country)){ foreach($country AS $clist){?>
                                                <option value="<?php echo $cnt_id=$clist->cnt_id;?>" <?php if($this->customer->cust_country==$cnt_id )echo'selected';?>>
                                                    <?=$clist->cnt_name;?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>State <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="cust_state" class="form-control mb-3 State" url="<?=base_url();?>" required>
                                                <option value="">--Select--</option>
                                                <?php if(!empty($state)){foreach($state AS $slist){if($this->customer->cust_country==$slist->cnt_id){?>
                                                <option value="<?php echo $sid=$slist->st_id;?>" <?php if($this->customer->cust_state==$sid )echo'selected';?>>
                                                    <?=$slist->st_name;?>
                                                </option>
                                                <?php } } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>City <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="cust_city" class="form-control mb-3 City" url="<?=base_url();?>" required>
                                                <option value="">--Select--</option>
                                                <?php if(!empty($city)){foreach($city AS $ctlist){if($this->customer->cust_state==$ctlist->st_id){?>
                                                <option value="<?php echo $cid=$ctlist->ct_id;?>" <?php if($this->customer->cust_city==$cid )echo'selected';?>>
                                                    <?=$ctlist->ct_name;?>
                                                </option>
                                                <?php } } }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Postal Code <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="cust_pincode" class="form-control mb-3 Zip" >
                                                <option value="">--Select--</option>
                                                <?php if(!empty($zipcode)){foreach($zipcode AS $zlist){if($this->customer->cust_city==$zlist->ct_id){?>
                                                <option value="<?php  echo $ZID=$zlist->zc_id;?>" <?php if($this->customer->cust_pincode==$ZID )echo'selected';?>>
                                                    <?=$zlist->zc_zipcode;?>
                                                </option>
                                                <?php } } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Address <span class="red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="cust_address" class="form-control mb-3" style="height:100px">
                                                <?=$this->customer->cust_address;?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
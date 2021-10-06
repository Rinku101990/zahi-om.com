<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Change Password Zahi">
      <meta name="description" content="Change Password Zahi">
      <meta name="author" content="Change Password Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Change Password Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Change Password</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Change Password</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
                      <?php $this->load->view('account/sidebar.php');?>
                     <div class="col-lg-9 col-md-8">
                        <div class="main-content">
                   
                    <div class="form-box bg-white">
                            <div class="form-box-title px-3 py-2">
                                Change Password
                            </div>
                        <div class="card card-body account-right">
                           <div class="widget">
                             
                     <div id="PasswordResponse" > </div>
<div id="PasswordResponse1" > </div>
     
  
<form id="PasswordForm" >
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Old Password  <span class="red">*</span></label>
                                          <input type="password" name="old_password" class="old_password form-control border-form-control"  placeholder="*******" >
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">New Password <span class="red">*</span></label>
                                           <input type="password" name="new_password" class="new_password form-control border-form-control"  placeholder="*******" >
                                       </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Confirm Password <span class="red">*</span></label>
                                           <input type="password" name="password2" class="password2 form-control border-form-control"  placeholder="*******" >
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="row">
                                    <div class="col-sm-12 text-right">
                                      <!--  <button type="button" class="btn btn-secondary btn-lg"> Cencel </button> -->
                                       <button type="button" class="btn btn-info btn-base-1 btn-lg Change_Password" url="<?=base_url();?>"> Save Changes </button>
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
      </section>

      
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
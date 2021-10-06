<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="CONTACT US Zahi">
      <meta name="description" content="CONTACT US Zahi">
      <meta name="author" content="CONTACT US Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>CONTACT US Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>





<style type="text/css">
  input.form-control,textarea {
    margin-bottom: 10px;
}
</style>
<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Contact Us</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Contact Us</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>



        
        <section class="gry-bg py-4">
        <div class="container bg-white">
            <div class="row p-4">
          <div class="col-12">
          <!--   <h2 style="box-sizing: border-box; padding: 14px 0px 0px; margin: 0px 0px 16px; text-rendering: optimizelegibility; line-height: 1.2;"><span style="box-sizing: border-box; margin: 0px; outline: 0px; font-family: &quot;Times New Roman&quot;, Times, serif; font-size: 48px; color: rgb(0, 0, 0);">Contact Us</span></h2>
                    
                          <br/> -->
                      <div class="contact_area mb-40">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-12">
                     <div class="contact_message">
                            <div class="contact_title">
                                <h2 style="font-family: &quot;Times New Roman&quot;, Times, serif;">Tell us your project</h2>   
                            </div>
                            <form id="contact-form" method="POST" action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input name="name" class="form-control" placeholder="Name *" type="text">    
                                    </div>
                                    <div class="col-lg-6">
                                        <input name="email" class="form-control" placeholder="Email *" type="email">    
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <input name="subject" class="form-control" placeholder="Subject *" type="text">   
                                    </div>
                                     <div class="col-lg-6">
                                        <input name="phone" class="form-control" placeholder="Phone *" type="text">   
                                    </div>
                                  </div>
                                 
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="contact_textarea">
                                            <textarea placeholder="Message *" name="message" class="form-control"></textarea>     
                                        </div>  
                                       
                                        <button type="submit" class="btn btn-styled btn-base-1 "> Send Message </button>  
                                    </div> 
                                    <div class="col-12">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>    
                        </div> 
                 </div>
                 <div class="col-lg-6 col-12">
                     <div class="contact_info_wrapper">
                            <div class="contact_title">
                                <h2 style="font-family: &quot;Times New Roman&quot;, Times, serif;">Contact Us</h2>    
                            </div>
                           
                            <div class="contact_info mb-15">
                                <ul>
                                    <li><i class="fa fa-home"></i>  Address : <?=$this->website->web_address;?></li>
                                    <li><i class="fa fa-envelope-o"></i> <?=$this->website->web_support_email;?></li>
                                    <li><i class="fa fa-phone"></i> <?=$this->website->web_support_contact;?></li>
                                     <li style="border-bottom:  1px solid #e4e4e4;"><i class="fa fa-globe"></i> www.belacart.com</li>
                                </ul>        
                            </div>
                             <div class="contact_info mb-15">
                                <h3 style="font-family: &quot;Times New Roman&quot;, Times, serif;"><strong>Working hours</strong></h3>
                                <p><strong>Monday – Saturday</strong>:  08AM – 10PM</p>    
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



            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
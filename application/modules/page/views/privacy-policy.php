<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Privacy Policy">
      <meta name="description" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Privacy Policy, Buy Dresses, Shoes, Clothes, Bags, beauty products, perfumes & more">
      <meta name="author" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Privacy Policy">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Zahi Om: Online Shopping Portal in Oman for Women’s, Privacy Policy</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>






<div class="breadcrumb-area mt-10" style="padding: 0px !important">
  <img src="<?=base_url('assets/img/Privacy-Policy.jpg');?>" class="img-responsive" style="padding: 0px;" />
       
    </div>
        
        <section class="gry-bg py-4">
        <div class="container bg-white">
            <div class="row p-4">
          <div class="col-12 ">
            <h1 style="font-size: 2rem;box-sizing: border-box; padding: 14px 0px 0px; margin: 0px 0px 16px; text-rendering: optimizelegibility; line-height: 1.2;"><span style="box-sizing: border-box; margin: 0px; outline: 0px; font-family: &quot;Times New Roman&quot;, Times, serif; font-size: 35px; color: rgb(0, 0, 0);">Privacy Policy</span></h1>
                     
                        </div>   
                        <div class="about_section_aera">
          <div class="container">
             
                <?php  if(!empty($privacy->content1)){?>
                   <div class="row no-gutters ">
                     <div class="col-lg-12 col-md-12">
                      <div class="about_content" align="justify">
                        <?=$privacy->content1;?>                          
                      </div>
                  </div>
              </div>
             
                <?php }?>
              
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
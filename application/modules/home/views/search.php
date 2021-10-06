<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="<?php echo $this->input->get('search'); ?>">
      <meta name="description" content="<?php echo $this->input->get('search');?>">
      <meta name="author" content="<?php echo $this->input->get('search'); ?>">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
           <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title><?php echo $this->input->get('search'); ?></title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>


<?php $date=date('Y-m-d');?>
<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row" >
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase pull-left" style="font-size: 1.5rem;"><?=$_REQUEST['search'];?></h1>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                      
                         <li class="active"><a href="#"><?=$_REQUEST['search'];?></a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>  
    <section class="gry-bg py-4">
        <div class="container sm-px-0 bg-white">
            <div class="row" style="padding: 40px 0;">
<?php if($products==true){
                  foreach ($products as $feat_list) {?>   
              <div class="col-xl-2 col-lg-2 col-md-3 col-6" >
                  <div class="card-body p-0 product-card mb-2">
                     <div class="card-image">
                       <!--  <a href="<?=base_url('home/detail');?>" class="d-block"> -->
 <a href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>" class="d-block" > 
                           <?php  if(!empty($feat_list->pg_img)){ ?>
                           <img src="<?=base_url('seller/uploads/').slug($feat_list->cate_name).'/'.slug($feat_list->scate_name).'/'.slug($feat_list->child_name).'/'.$feat_list->pg_img;?>" alt="<?=$feat_list->p_name;?>" class="hover-img" style="object-fit: cover;    height: 259px;">
                           <?php }else{?>
                           <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$feat_list->p_name;?>" class="hover-img" style="object-fit: cover;    height: 259px;">
                           <?php }?>
                        </a>
                     </div>
                     <div class="product-text" style="padding: 5px;background: #f3f3f3; text-align: left" >
                        
                        <h2 class="product-title p-0 text-truncate-21 ">
                          
                               <a href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>" title="<?=$feat_list->p_name;?>" class=" text-truncate"> 
                                <?php if($this->website->web_lang=='en'){echo $feat_list->p_name;}else{ echo $feat_list->p_name_ar;}?>
                             
                           </a>
                        </h2>
                        <div class="clearfix">
                            <?php if(!empty($feat_list->sp_special_price) && $feat_list->sp_start_date <= $date && $feat_list->sp_end_date >= $date){?>
                         <div class="price-box float-left">
                           <del class="old-product-price strong-400"><?=currency($this->website->web_currency);?><?=$feat_list->p_selling_price;?></del><br/>
                                <span class="product-price strong-600">
                                                      <?=currency($this->website->web_currency);?><?=$feat_list->sp_special_price;?>
                                                    </span>
                               </div>
                                <?php }else{?>
                                 <div class="price-box float-left">                           
                                <span class="product-price strong-600">
                                  <?=currency($this->website->web_currency);?><?=$feat_list->p_selling_price;?>
                                  <br/><del class="old-product-price strong-400">&nbsp;
                                                    </del>
                                                    </span>
                               </div>
                            <?php }?>
                               <div class="float-right">
                                 <button class="add-to-cart btn" title="Add to Cart"style="
    background: #c19450;  padding: .175rem .35rem;">
                                <i class="la la-shopping-cart" style="
    color: #ffffff; font-size: 20px;"></i>
                                    </button>
                                  </div>
                                 </div>
                        
                       
                        
                        
                     </div>
                  </div>
               </div>
               <?php }}?>
            </div>
        </div>
    </section>
    

    
<?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
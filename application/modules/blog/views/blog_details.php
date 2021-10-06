<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Blog Details Zahi">
      <meta name="description" content="Blog Details Zahi">
      <meta name="author" content="Blog Details Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Blog Details Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Blog Details</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Blog Details</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>



        
 
          <section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
         
                   
                  

                    

                <div class="col-lg-9 col-md-12 ">
                    <h2 style="box-sizing: border-box; padding: 14px 0px 0px; margin: 0px 0px 16px; text-rendering: optimizelegibility; line-height: 1.2;"><span style="box-sizing: border-box; margin: 0px; outline: 0px; font-family: &quot;Times New Roman&quot;, Times, serif; font-size: 48px; color: rgb(0, 0, 0);"> Blog Details</span></h2>
                        <div class="blog_left_area">
                            <div class="singli_blog_wrapper gallery mb-40 card p-3">   
                               
                                <div class="single_blog">
                                        <div class="blog_thum">
                                        <?php if(!empty($blog->blg_pictures)){?>
                                        <img src="<?=base_url('admin/uploads/blog/').$blog->blg_pictures;?>" alt="<?=$blog->blg_title;?>" class="img-responsive">
                                        <?php }else{?>
                                         <img src="<?=base_url('uploads/noblog.png');?>" alt="<?=$blg_value->blg_title;?>" class="img-responsive">
                                         <?php }?>
                                   
                                    </div>
                                     <div class="blog__title mb-30" style="padding: 0 20px;">  
                                    <h2 class="heading heading-4 strong-600 mt-2 text-truncate-2"><a href="javascript:void(0);"><?=$blog->blg_title;?></a></h2>
                                    <div class="blog__post">
                                        <ul>
                                            <li class="post_author"><b>Posts by </b>: <?=$blog->blg_author_name;?></li>
                                            <li class="post_date"> <b>Date </b>: <?=date('M d Y h:i:s A',strtotime($blog->blg_created));?>   </li>
                                        </ul>
                                    </div>


                                </div>  
                                        
                                    <div class="blog_entry_content" style="padding: 0 20px;">
                                       <?=$blog->blg_descriptions;?>
                                    </div>
                                    <div class="blog_entry_meta" style="padding: 0 20px;">
                                       <ul>
                                           <li><a href="#">0 comments</a></li>
                                           <li> / Tags: <a href="#">fashion</a></li>
                                       </ul>
                                    </div>
                                    <!-- <div class="blog_social_sharing gallery_social" style="padding: 0 20px;">
                                            <h3>Share this post</h3>
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div> -->
                                </div>
                            </div> 
                             <!--services img area-->
                             <br/>
                           <div class="srrvices_img_area">
                                <div class="row">
                                    <?php if($blog_list== TRUE){
                                        foreach ($blog_list as $blg_value) {
                                        
                                          ?>
                                    <div class="col-xl-4 col-6" id="wishlist_96">
                            <div class="card card-product mb-3 product-card-2">
                                <div class="card-body p-3">
                                    <div class="card-image">
                                        <a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>" class="d-block" >
                                            <?php if(!empty($blg_value->blg_pictures)){?>
                                                <img src="<?=base_url('admin/uploads/blog/thumbnail/').$blg_value->blg_pictures;?>" alt="<?=$blg_value->blg_title;?>" style="object-fit: fill;">
                                                 <?php }else{?>
                                         <img src="<?=base_url('uploads/noblog.png');?>" alt="<?=$blg_value->blg_title;?>" class="img-responsive" style="object-fit: fill;" >
                                         <?php }?>
                                        </a>
                                    </div>

                                    <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                                                    <a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>"><?=$blg_value->blg_title;?></a>
                                                </h2>
                                  
                                    <div class="mt-2">
                                        <div class="price-box">
                                            <?=date('F d, Y',strtotime($blg_value->blg_created));?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                                <?php }}?>
                                
                                
                                </div>
                           </div>
                           <!--services img end-->
                           
                            <!-- <div class="comments_area">
                                <div class="comments__title">
                                    <h3>Leave a Reply </h3>
                                </div>
                                <div class="comments__notes">
                                    <p>Your email address will not be published.</p>
                                </div>
                                <div class="comment__form">
                                    <form action="#">
                                        <label for="comment_1">Comment</label>
                                        <textarea name="comment" id="comment_1" cols="30" rows="10"></textarea>
                                        <div class="comment_input_area fix">
                                            <div class="single_comment_input">
                                                <label>Name </label>
                                                <input type="text">
                                            </div>
                                            <div class="single_comment_input middle">
                                                <label>Email </label>
                                                <input type="text">
                                            </div>
                                            <div class="single_comment_input">
                                                <label>Website </label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Post Comment</button>
                                    </form>
                                </div>
                            </div>  -->    
              

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-8 offset-md-2 offset-lg-0">
                       <div class="blog_right_sidebar">
                            <!-- <div class="widget_search_bar mb-30 card p-3">
                               <h3>Search</h3>
                               <form action="#">
                                   <input placeholder="search.." type="text">
                                   <button type="submit"><i class="fa fa-search"></i></button>
                               </form>
                            </div> -->
                            <div class="widget_tweets small_thumb mb-30 card p-3">
                               <h3>Recent Posts</h3>
                                <div class="widget_blog_small_thumb">   
                                    <?php if($recent_blog== true){
                                        foreach ($recent_blog as $recent_value) {?>
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                               <a href="<?=base_url('blog/').encode($recent_value->blg_id).'/'.$recent_value->blg_title_slug;?>">
                                        <?php if(!empty($recent_value->blg_pictures)){?>
                                        <img src="<?=base_url('admin/uploads/blog/thumbnail/').$recent_value->blg_pictures;?>" alt="<?=$recent_value->blg_title;?>" class="img-responsive">
                                        <?php }else{?>
                                         <img src="<?=base_url('uploads/noblog.png');?>" alt="<?=$recent_value->blg_title;?>" class="img-responsive">
                                         <?php }?></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="<?=base_url('blog/').encode($recent_value->blg_id).'/'.$recent_value->blg_title_slug;?>"><b><?=$recent_value->blg_title;?> </b></a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="javascript:void();" style="text-transform: uppercase;"> <?=date('F d, Y',strtotime($recent_value->blg_created));?> </a>
                                            </div>
                                        </div>

                                    </div>
                                <?php }}?>
                                  
                                   
                                    
                                 </div>   
                            </div>
                            <div class="widget_tweets small_thumb mb-30 card p-3">
                               <h3>Popular</h3>
                                <div class="widget_blog_small_thumb">   
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                            <a href="#"><img src="assets/img/blog/blog11.jpg" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                            <a href="#"><img src="assets/img/blog/blog13.jpg" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                            <a href="#"><img src="assets/img/blog/blog14.jpg" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
                                            </div>
                                        </div>

                                    </div>
                                    
                                 </div>   
                            </div>
                            <div class="widget_tweets small_thumb mb-30 card p-3">
                               <h3>Comments</h3>
                                <div class="widget_blog_small_thumb">   
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                            <a href="#"><img src="<?=base_url('admin/uploads/blog/blog12.jpg');?>" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                        <a href="#"><img src="<?=base_url('admin/uploads/blog/blog12.jpg');?>" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tweets_display recent mb-30">
                                        <div class="tweets_img blog">
                                       <a href="#"><img src="<?=base_url('admin/uploads/blog/blog12.jpg');?>" alt=""></a>
                                        </div>
                                        <div class="tweets_text">
                                            <span>
                                                <a class="tweet_author" href="#">blog1 Blog image post </a>

                                            </span>
                                            <div class="tweetlink favorite">
                                                <a href="#"> March 10, 2018 </a>
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

            
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
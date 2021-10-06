 <!--baner slide show-->
   <?php if(!empty($banner)) {?>
        <div class="banner_slide_show slide_show_two mb-10">
              <div class="banner_slider">
                            <div class="slider_active slider_a_four owl-carousel">
                                <?php foreach ($banner as $banner_list) {?>
                                <div class="single_slider single_sl_four" >
                                <img src="<?=base_url('admin/uploads/banner/').$banner_list->slr_img;?>" class="img-responsive" title="<?=$banner_list->slr_name;?>">                                  
                                </div>
                            <?php }?>
                           
                            </div>
                        </div>
                   
        </div>
    <?php }?>
        <!--baner slide end-->
         
         <!--categorie banner area-->
         
         <!--categorie banner end-->
         <div class="categorir_banner_four mb-10 white" >
            <div class="container1">
                <div class="row">
                   <div class="col-12">
                       <div class="categorie_banner_title">
                           <h2>Shop by Categories </h2>
                       </div>
                   </div>
                    <div class="categorie_banner_active category_list owl-carousel">
                        <?php if($category_list == TRUE){
                            foreach ($category_list as $cate_list) {?>
                        <div class="col-lg-2">
                            <div class="single_banner_categorie">
                                <center> <div class="categorie_thumb">
                                <a href="<?=base_url('categories/').$cate_list->cate_slug;?>">
                                       <img src="<?=base_url('admin/uploads/category/').$cate_list->cate_img;?>" alt="<?=$cate_list->cate_name;?>"></a>
                                   <div class="categorie_number">
                                        <span>(<?=product_count($cate_list->cate_id);?>) products</span>
                                    </div>
                                </div></center>
                                <div class="categorie_name" align="center">
                                    <a href="<?=base_url('categories/').$cate_list->cate_slug;?>"><?=$cate_list->cate_name;?></a>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                       
                       
                        
                     
                    </div> 
                </div>
            </div>
         </div>
        
<!--featured area css here-->
        <div class="featured_area mb-10 white">
            <div class="container1">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="featured_produt feature_p_four mb-10">    
                            <div class="top_title">
                                <h2> Hot Products</h2>
                                <a class="read pull-right hidden-xs" href="<?=base_url('hot-products');?>">view more</a>
                            </div>
                            <div class="f_active_four hot_list owl-carousel">
                                   <?php if($hot_product==true){
                                        foreach ($hot_product as $hot_list) {?>
                                <div class="single_featured">
                                    <div class="single_product single_p_four">
                                        <div class="product_thumb">
                                           <a href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>">
                                        <?php  if(!empty($hot_list->pg_image)){ ?>
                                <img src="<?=base_url('seller/uploads/').$hot_list->cate_slug.'/'.$hot_list->scate_slug.'/'.$hot_list->child_slug.'/'.explode(',',$hot_list->pg_image)[0];?>" title="<?=$hot_list->p_name;?>" class="hover-img">
                                            <?php }else{?>
                                         <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$hot_list->p_name;?>" class="hover-img1">
                                     <?php }?>

                                            </a>
                                          
                                        </div>


                                        <div class="product_content">

                                             <div class="product_timing">
                                                    <div data-countdown="<?=$hot_list->sp_end_date;?>" ></div>
                                                </div>
                                              <div class="small_product_name">
                                  <a title="<?=$hot_list->p_name;?>" href="<?=base_url('product/').encode($hot_list->p_id).'/'.slug($hot_list->p_name);?>" class="product_title"><?=$hot_list->p_name;?></a>
                                                </div>
                                                <div class="samll_product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                                <div class="small_product_price">
                                                    <?php if(!empty($hot_list->sp_special_price)){?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($hot_list->sp_special_price);?> </span>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($hot_list->p_selling_price);?>  </span>
                                                <?php }else{?>
                                                     <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($hot_list->p_selling_price);?> </span><?php }?>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                           
                               <?php }}?>
                               
                                                            </div>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="featured_produt feature_p_four">   
                            <div class="top_title">
                                <h2> Recently Products</h2>
                               <!--   <a class="read pull-right hidden-xs" href="<?=base_url('recent-products');?>">view more</a> -->
                            </div>
                            <div class="f_active_four recent_list owl-carousel">
                                <?php if($recent_product==true){
                                        foreach ($recent_product as $recent_list) {?>
                                <div class="single_featured">
                                    <div class="single_product single_p_four">
                                        <div class="product_thumb">
                                           <a href="<?=base_url('product/').encode($recent_list->p_id).'/'.slug($recent_list->p_name);?>">
                                        <?php  if(!empty($recent_list->pg_image)){ ?>
                                <img src="<?=base_url('seller/uploads/').$recent_list->cate_slug.'/'.$recent_list->scate_slug.'/'.$recent_list->child_slug.'/'.explode(',',$recent_list->pg_image)[0];?>" title="<?=$recent_list->p_name;?>" class="hover-img">
                                            <?php }else{?>
                                         <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$recent_list->p_name;?>" class="hover-img1">
                                     <?php }?>

                                            </a>
                                          
                                        </div>

                                        <div class="product_content">
                                           
                                              <div class="small_product_name">
                                  <a title="<?=$recent_list->p_name;?>" href="<?=base_url('product/').encode($recent_list->p_id).'/'.slug($recent_list->p_name);?>" class="product_title"><?=$recent_list->p_name;?></a>
                                                </div>
                                                <div class="samll_product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                                <div class="small_product_price">
                                                    <?php if(!empty($recent_list->sp_special_price)){?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($recent_list->sp_special_price);?> </span>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($recent_list->p_selling_price);?>  </span>
                                                <?php }else{?>
                                                     <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($recent_list->p_selling_price);?> </span><?php }?>
                                                </div>
                                                 <div class="product_timing">
                                                    <div style="height: 35px;">&nbsp;</div>
                                                </div>
                                                 
                                           
                                        </div>
                                    </div>
                                </div>
                                           
                               <?php }}?>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!--featured area css end-->
	

        <!--banner area start-->
        <div class="banner_area">
            <div class="container1">
                <div class="row">
                     <div class="col-lg-4 col-md-6 padding">
                        <div class="single_banner fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 padding">
                        <div class="single_banner fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner3.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 padding">
                        <div class="single_banner b_three fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner4.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>                              
        </div> 
        <!--banner area end-->
		<!--featured area css here-->
		<div class="featured_area mb-10 white">
		    <div class="container1">
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="featured_produt feature_p_four mb-40">    
                            <div class="top_title">
                                <h2>Featured Products</h2>
                                 <a class="read pull-right hidden-xs" href="<?=base_url('featured-products');?>">view more</a>
                            </div>
                            <div class="categorie_banner_active owl-carousel">
                                   <?php if($featured_product==true){
                                        foreach ($featured_product as $feat_list) {?>
                                <div class="single_featured">
                                    <div class="single_product single_p_four">
                                        <div class="product_thumb">
                                           <a href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>">
                                        <?php  if(!empty($feat_list->pg_image)){ ?>
                                <img src="<?=base_url('seller/uploads/').$feat_list->cate_slug.'/'.$feat_list->scate_slug.'/'.$feat_list->child_slug.'/'.explode(',',$feat_list->pg_image)[0];?>" title="<?=$feat_list->p_name;?>" class="hover-img">
                                            <?php }else{?>
                                         <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$feat_list->p_name;?>" class="hover-img1">
                                     <?php }?>

                                            </a>
                                          
                                        </div>
                                        <div class="product_content">
                                           
                                              <div class="small_product_name">
                                  <a title="<?=$feat_list->p_name;?>" href="<?=base_url('product/').encode($feat_list->p_id).'/'.slug($feat_list->p_name);?>" class="product_title"><?=$feat_list->p_name;?></a>
                                                </div>
                                                <div class="samll_product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                                <div class="small_product_price">
                                                    <?php if(!empty($feat_list->sp_special_price)){?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($feat_list->sp_special_price);?> </span>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($feat_list->p_selling_price);?>  </span>
                                                <?php }else{?>
                                                     <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($feat_list->p_selling_price);?> </span><?php }?>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                           
                               <?php }}?>
                               
                            </div>
                        </div>    
                    </div>


                            </div>
                        </div>    
                    </div>
                    
                        <div class="featured_area ">
            <div class="container1">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="banner_area">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 padding">
                                    <div class="single_banner fix white1">
                                        <a href="#"><img src="<?=base_url();?>assets/img/banner/banner6.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 padding">
                                    <div class="single_banner fix white1">
                                        <a href="#"><img src="<?=base_url();?>assets/img/banner/banner7.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 padding">
                                    <div class="single_banner b_three fix white1" >
                                        <a href="#"><img src="<?=base_url();?>assets/img/banner/banner8.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                            </div>
                        </div>    
                    </div>
                    
                        <div class="featured_area mb-10 white">
            <div class="container1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured_produt feature_p_four">   
                            <div class="top_title">
                                <h2> Trending Products</h2>
                                  <a class="read1 pull-right hidden-xs" href="<?=base_url('trending-products');?>">view more</a>
                            </div>
                            <div class="categorie_banner_active owl-carousel">
                                
                                       <?php if($trending_product==true){
                                        foreach ($trending_product as $trend_list) {?>
                                <div class="single_featured">
                                    <div class="single_product single_p_four">
                                        <div class="product_thumb">
                                           <a href="<?=base_url('product/').encode($trend_list->p_id).'/'.slug($trend_list->p_name);?>">
                                        <?php  if(!empty($trend_list->pg_image)){ ?>
                                <img src="<?=base_url('seller/uploads/').$trend_list->cate_slug.'/'.$trend_list->scate_slug.'/'.$trend_list->child_slug.'/'.explode(',',$trend_list->pg_image)[0];?>" title="<?=$trend_list->p_name;?>" class="hover-img">
                                            <?php }else{?>
                                         <img src="<?=base_url('seller/uploads/default-image.png');?>" title="<?=$trend_list->p_name;?>" class="hover-img1">
                                     <?php }?>

                                            </a>
                                          
                                        </div>
                                        <div class="product_content">
                                            
                                              <div class="small_product_name">
                                  <a title="<?=$trend_list->p_name;?>" href="<?=base_url('product/').encode($trend_list->p_id).'/'.slug($trend_list->p_name);?>" class="product_title"><?=$trend_list->p_name;?></a>
                                                </div>
                                                <div class="samll_product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                                <div class="small_product_price">
                                                    <?php if(!empty($trend_list->sp_special_price)){?>
                                                    <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($trend_list->sp_special_price);?> </span>
                                                    <span class="old_price"><?=currency($this->website->web_currency);?><?=number_format($trend_list->p_selling_price);?>  </span>
                                                <?php }else{?>
                                                     <span class="new_price"><?=currency($this->website->web_currency);?><?=number_format($trend_list->p_selling_price);?> </span><?php }?>
                                                </div>

                                           
                                        </div>
                                    </div>
                                </div>
                                           
                               <?php }}?>
                            </div>
                        </div>    
                    </div>
		        </div>
		    </div>
		</div>
		<!--featured area css end-->
		
		<!--banner area start-->
        <div class="banner_area banner_four ">
            <div class="container1">
                <div class="row">
                     <div class="col-lg-3 col-md-6 padding">
                        <div class="single_banner mb-30 fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner6.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 padding">
                        <div class="single_banner mb-30 fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner15.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 padding">
                        <div class="single_banner fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner16.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 padding">
                        <div class="single_banner fix white1">
                            <a href="#"><img src="<?=base_url();?>assets/img/banner/banner17.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>                              
        </div> 
        <!--banner area end-->

    <!--brand logo area start-->
        <div class="brand_logo mb-10 white">
           <div class="container1">

               <div class="row brand_padding">
                   <div class="brand_active owl-carousel">
                    <?php if($brand_list==TRUE){
                        foreach ($brand_list as $brd_list) {?>
                       <div class="col-lg-2">
                           <div class="single_brand">
                               <a href="<?=base_url('brand/').$brd_list->brd_slug;?>"  title="<?=$brd_list->brd_name;?>"><img src="<?=base_url('admin/uploads/brand/').$brd_list->brd_img;?>" title="<?=$brd_list->brd_name;?>" class="brand_img"></a>
                           </div>
                       </div>
                   <?php }}?>
                      
                      
                   </div>
               </div>
           </div> 
        </div>
        <!--brand logo area end-->
        
        <!--blog area start-->
        <div class="blog_area mb-10 white">
            <div class="container1">
                <div class="row">
                    <div class="col-12">
                        <div class="top_title mb-30">
                            <h2> Blog Posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog_active owl-carousel">
                        <?php if($blog==true){
                            foreach ($blog as $blg_value) {?>                           
                        <div class="col-lg-3">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>">
                                        <?php if(!empty($blg_value->blg_pictures)){?>
                                        <img src="<?=base_url('admin/uploads/blog/thumbnail/').$blg_value->blg_pictures;?>" alt="<?=$blg_value->blg_title;?>" class="img-responsive">
                                        <?php }else{?>
                                         <img src="<?=base_url('uploads/noblog.png');?>" alt="<?=$blg_value->blg_title;?>" class="img-responsive">
                                         <?php }?></a>
                                </div>
                                <div class="blog_content">
                                    <h4 class="blog_title"><a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>"><b><?=$blg_value->blg_title;?></b></a></h4>
                                    <div class="blog_desc"> <?php $blg_descriptions = strlen($blg_value->blg_descriptions);
                                            if($blg_descriptions>130){
                                                echo substr($blg_value->blg_descriptions, '0', 130).'..';
                                            }else{
                                                echo $blg_value->blg_descriptions;
                                            }
                                        ?></div>
                                    <div class="blog_post">
                                        <ul>
                                            <li class="post_date"><?=date('M d',strtotime( $blg_value->blg_created));?></li>
                                            <li class="read_more"><a href="<?=base_url('blog/').encode($blg_value->blg_id).'/'.$blg_value->blg_title_slug;?>">Read More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                      
                    </div>
                </div>
            </div>
        </div>
        <!--blog area end-->
        
        <!--static area start-->
        <div class="static_area">
            <div class="container1">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static mb-30">
                            <div class="icone_static">
                                <i class="fa fa-coffee"></i>
                            </div>
                            <div class="content_static">
                                <h4>Free Delivery</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static mb-30">
                            <div class="icone_static">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <div class="content_static">
                                <h4>Big Saving</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static mb-30">
                            <div class="icone_static">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="content_static">
                                <h4>Gift Vouchers</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static">
                            <div class="icone_static">
                                <i class="fa fa-codepen"></i>
                            </div>
                            <div class="content_static">
                                <h4>Easy return</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static">
                            <div class="icone_static">
                                <i class="fa fa-cut"></i>
                            </div>
                            <div class="content_static">
                                <h4>Save 20% When You</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_static">
                            <div class="icone_static">
                                <i class="fa fa-diamond"></i>
                            </div>
                            <div class="content_static">
                                <h4>Free Delivery Worldwide</h4>
                                <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--static area end-->
        
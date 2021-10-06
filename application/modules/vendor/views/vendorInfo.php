<div class="categorie_details">
  <div class="shop_fullwidth_img mb-20"></div> 
</div>

<div class="categorie_details mb-10">
  <div class="container1">
    <div class="row">
      <style type="text/css">
        .input_color {
          border-radius: 50%;
          width: 18px;   
          height: 18px;
          display: inline-block;
          border: 1px solid #eee;
        }
        .profile-userpic img {
          margin: 0 auto;
          width: 50%;
          height: 50%;
          -webkit-border-radius: 50% !important;
          -moz-border-radius: 50% !important;
          border-radius: 50% !important;
        }

        .profile-usertitle {
          text-align: center;
          margin-top: 20px;
        }

        .profile-usertitle-name {
          color: #000000;
          font-size: 16px;
          font-weight: 600;
        }

        .profile-usertitle-job {
          text-transform: uppercase;
          color: #6e6f71;
          font-size: 12px;
          margin-bottom: 15px;
        }
        .bottom{
          text-align: center;
        }
        .customMenuCss{
          margin-top: -16px;
        }
      </style>
      <div class="col-lg-3 col-md-4 ">

        <?php if(isset($vendorProfile->mst_role)){ ?>
          <div class="sidebar_categorie_area white">
            <div class="profile-userpic">
              <center>
                <?php if($vendorProfile->mst_picture!=''){?>
                  <img src="<?php echo site_url('admin/uploads/profile/'.$vendorProfile->mst_picture);?>" class="img-responsive img-thumbnail" alt="">
                <?php }else{ ?>
                  <img src="<?php echo site_url('assets/img/noprofile.jpg');?>" class="img-responsive img-thumbnail" alt="">
                <?php } ?>
                
              </center>
            </div>
            <div class="profile-usertitle">
              <div class="profile-usertitle-name"><?=$vendorProfile->mst_name;?></div>
              <div class="profile-usertitle-job">Shop Opened On <?=date('M j, Y', strtotime($vendorProfile->mst_created));?></br><i class="fa fa-star"></i> 2.7 Out Of 5 - 1 Reviews</div>
            </div>
            <div class="bottom">
              <a class="btn btn-primary btn-twitter btn-sm" href="javascript:void(0)" rel="share-it">
                  <i class="fa fa-share-alt "></i>
              </a>
              <a class="btn btn-danger btn-sm" rel="favorites" href="javascript:void(0)">
                  <i class="fa fa-heart"></i>
              </a>
              <a class="btn btn-primary btn-sm" rel="report-spam"
                 href="javascript:void(0)">
                  <i class="fa fa-bug"></i>
              </a>
              <a class="btn btn-warning btn-sm" rel="publisher" href="javascript:void(0)">
                  <i class="fa fa-envelope"></i>
              </a>
            </div>
          </div>
        <?php }else{?>
          <div class="sidebar_categorie_area white">
            <div class="profile-userpic">
              <center>
                <?php if($vendorProfile->vnd_picture!=''){?>
                  <img src="<?php echo site_url('seller/uploads/profile/'.$vendorProfile->vnd_picture);?>" class="img-responsive img-thumbnail" alt="">
                <?php }else{ ?>
                <?php } ?>
                <img src="<?php echo site_url('assets/img/noprofile.jpg');?>" class="img-responsive img-thumbnail" alt="">
              </center>
            </div>
            <div class="profile-usertitle">
              <div class="profile-usertitle-name"><?=$vendorProfile->vnd_name;?></div>
              <div class="profile-usertitle-job">Shop Opened On <?=date('M j, Y', strtotime($vendorProfile->vnd_created));?></br><i class="fa fa-star"></i> 2.7 Out Of 5 - 1 Reviews</div>
            </div>
            <div class="bottom">
              <a class="btn btn-primary btn-twitter btn-sm" href="javascript:void(0)" rel="share-it">
                  <i class="fa fa-share-alt "></i>
              </a>
              <a class="btn btn-danger btn-sm" rel="favorites" href="javascript:void(0)">
                  <i class="fa fa-heart"></i>
              </a>
              <a class="btn btn-primary btn-sm" rel="report-spam"
                 href="javascript:void(0)">
                  <i class="fa fa-bug"></i>
              </a>
              <a class="btn btn-warning btn-sm" rel="publisher" href="javascript:void(0)">
                  <i class="fa fa-envelope"></i>
              </a>
            </div>
          </div>
        <?php } ?>
        <br>
        
        <div class="sidebar_categorie_area white">

          <div class="categorie__titile"><h2>Filter</h2></div>
          
          <div class="sidebar_categorie_item">
            <h3>BRANDS</h3>
            <div class="categorie_filter">
                <ul>
                  <?php if($brand_list==TRUE){ foreach ($brand_list as $blist) {?>
                  <li>
                      <label class="filter_checkbox"><?=$blist->brd_name;?>
                        <input type="checkbox" class="common_selector brand" value="<?=$blist->brd_id;?>" <?php if($blist->brd_id==@$p_brand)echo'checked disabled';?>>
                        <span class="checkmark" ></span>
                      </label>
                  </li>
                  <?php }}?>
                </ul>
            </div>
          </div>

          <div class="sidebar_categorie_item">
            <h3>SIZE</h3>
            <div class="categorie_filter">
              <ul>
                <?php if($size->opt_value==TRUE){foreach (explode(',',$size->opt_value) as $slist) {?>
                <li> 
                  <label class="filter_checkbox"><?=$slist;?>
                    <input type="checkbox" class="common_selector size" value="<?=$slist;?>" >
                    <span class="checkmark"></span>
                  </label>  
                </li>
                <?php }}?>
              </ul>
            </div>
          </div>

          <div class="sidebar_categorie_item">
            <h3>COLOR</h3>
            <div class="categorie_filter">
              <ul>
                <?php if($color->opt_value==TRUE){foreach (explode(',',$color->opt_value) as $clist) {?>
                <li>
                  <label class="filter_checkbox"> 
                    <div class="input_color" for="blick" style="background:<?=$clist;?>;"></div>&nbsp;
                    <div style="padding-left: 8px;display: inline-block; /* margin-top: 7px; */"> <?=$clist;?></div>  
                    <input type="checkbox" class="common_selector size" value="<?=$clist;?>" >
                    <span class="checkmark"></span>
                  </label>  
                </li>
                <?php }}?>
              </ul>
            </div>
          </div>

          <div class="sidebar_categorie_item">
            <h3>CONDITION</h3>
            <div class="categorie_filter">
              <ul>
                <li> 
                  <label class="filter_checkbox">New
                    <input type="checkbox" class="common_selector condition" value="0" >
                      <span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="filter_checkbox">Used
                    <input type="checkbox" class="common_selector condition" value="1" >
                    <span class="checkmark"></span>
                  </label>
                </li>
                <li> 
                  <label class="filter_checkbox">Refurbished
                    <input type="checkbox" class="common_selector condition" value="2" >
                    <span class="checkmark"></span>
                  </label>
                </li>
              </ul>
            </div>
          </div>

        </div>

      </div>

        <div class="col-lg-9 col-md-8 ">
          
          <div class="categorie_d_right white1">
            <div class="mb-5" style="margin-bottom: -1rem!important;">
              <div class="wsmain clearfix">
                 <nav class="wsmenu customMenuCss">
                    <ul class="wsmenu-list">
                      <li class="active"><a href="<?php echo site_url();?>" class="navtext">Shop Store Home</a></li>
                      <li><a href="javascript:void(0)" class="navtext">Shop Top Products</a></li>
                      <li><a href="javascript:void(0)" class="navtext">Shop Review</a></li>
                      <li><a href="javascript:void(0)" class="navtext">Shop Policy</a></li>
                    </ul>
                 </nav>
              </div>
            </div>
          </div>
          <br>

          <div class="categorie_d_right white1">
            <div class="categorie_product_toolbar mb-30">
              <div class="categorie_product_button">
                <ul class="nav" role="tablist">
                  <li>
                    <a class="active grade_large" large="1" href="#large"><i class="fa fa-th-large"></i></a>
                  </li>
                  <li>
                    <a class="grade_list" large="2" href="#list"><i class="fa fa-th-list"></i></a>
                  </li>
                </ul>
                <input type="hidden" id="grade_list" value="1">
              </div>
              <form action="#">
                <label>Sort By</label>
                <select name="orderby" id="short" class="newest_first" style="display: none;">
                  <option value="">Default sorting</option>
                  <option value="1">Sort by price: low to high</option>
                  <option value="2">Sort by price: high to low</option>
                  <option value="3">Product Name: A to Z</option>
                </select>
                <div class="nice-select newest_first" tabindex="0">
                  <span class="current">Default sorting</span>
                  <ul class="list">
                    <li data-value="" class="option selected">Default sorting</li>
                    <li data-value="1" class="option">Sort by price: low to high</li>
                    <li data-value="2" class="option">Sort by price: high to low</li>
                    <li data-value="3" class="option">Product Name: A to Z</li>
                  </ul>
                </div>
              </form>
              <p>Showing 1–12 of  1 results</p>
            </div>
            <div class="tab-content filter_data">
              <div class="tab-pane fade show active" id="large" role="tabpanel">
                <div class="row cate_tab_product">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_product categorie">
                      <div class="product_thumb">
                        <a href="http://localhost/ecommerce.com/product/NTM/Polka-Print-Bhagalpuri-Cotton-Blend-Saree"><img src="http://localhost/ecommerce.com/seller/uploads/Women/Ethnic-Wear/Sarees/1578375696.jpeg" title="Polka Print Bhagalpuri Cotton Blend Saree" class="hover-img"></a>     
                      </div>
                      <div class="product_content" style="text-align: center  !important">
                        <div class="small_product_name">
                          <a title="Polka Print Bhagalpuri Cotton Blend Saree" href="http://localhost/ecommerce.com/product/NTM/Polka-Print-Bhagalpuri-Cotton-Blend-Saree" class="product_title">Polka Print Bhagalpuri Cotton Blend Saree</a>
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
                          <span class="new_price">₹1,300</span>
                          <span class="old_price">₹1,500</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="more"> 
              <input type="hidden" class="btn btn-primary clickmore" value="1">
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
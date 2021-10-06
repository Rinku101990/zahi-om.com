  
        <!--categorie details start-->
        <style type="text/css">
       /*Product not available*/


#notfound {
  position: relative;
  height: 60vh;
  background-color: #fafbfd;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 520px;
  width: 100%;
  text-align: center;
}

.notfound .notfound-bg {
  position: absolute;
  left: 0px;
  right: 0px;
  top: 50%;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  z-index: -1;
}

.notfound .notfound-bg > div {
  width: 100%;
  background: #fff;
  border-radius: 90px;
  height: 125px;
}

.notfound .notfound-bg > div:nth-child(1) {
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
}

.notfound .notfound-bg > div:nth-child(2) {
  -webkit-transform: scale(1.3);
      -ms-transform: scale(1.3);
          transform: scale(1.3);
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
  position: relative;
  z-index: 10;
}

.notfound .notfound-bg > div:nth-child(3) {
  -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
          box-shadow: 5px 5px 0px 0px #f3f3f3;
  position: relative;
  z-index: 90;
}

.notfound h1 {
  font-family: 'Quicksand', sans-serif;
  font-size: 86px;
  text-transform: uppercase;
  font-weight: 700;
  margin-top: 0;
  margin-bottom: 8px;
  color: #151515;
}

.notfound h2 {
  font-family: 'Quicksand', sans-serif;
  font-size: 26px;
  margin: 0;
  font-weight: 700;
  color: #151515;
}

.notfound a {
  font-family: 'Quicksand', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #18e06f;
  display: inline-block;
  padding: 15px 30px;
  border-radius: 5px;
  color: #fff;
  font-weight: 700;
  margin-top: 20px;
}

.notfound-social {
  margin-top: 20px;
}

.notfound-social>a {
  display: inline-block;
  height: 40px;
  line-height: 40px;
  width: 40px;
  font-size: 14px;
  color: #fff;
  background-color: #dedede;
  margin: 3px;
  padding: 0px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}
.notfound-social>a:hover {
  background-color: #18e06f;
}

@media only screen and (max-width: 767px) {
    .notfound .notfound-bg {
      width: 287px;
      margin: auto;
    }

    .notfound .notfound-bg > div {
      height: 85px;
  }
}
 </style>
<div class="categorie_details">
             <div class="shop_fullwidth_img mb-20">         
     <!-- <img src="<?=base_url('admin/uploads/content-page/').category_banner($this->uri->segment(2))->mn_banner_img;?>" title="<?=$this->uri->segment(2);?>" class="img-responsive"> -->
    </div> 
</div>
        <div class="categorie_details mb-10">
            <div class="container1">
            	<div class="row">
               
                <?php $this->load->view('home/filter');?>
                    <div class="col-lg-9 col-md-8 ">
                        <div class="categorie_d_right white1 ">
                            <div class="categorie_product_toolbar mb-30">
                                <div class="categorie_product_button">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active grade_large" large="1" href="#large"  ><i class="fa fa-th-large"></i></a>
                                        </li>
                                        <li>
                                            <a class="grade_list" large="2" href="#list" ><i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                    <input type="hidden" id="grade_list" value="1">
                                </div>
                                <form action="#">
                                    <label>Sort By</label>
                                    <select name="orderby" id="short" class="newest_first">
                                        <option  value="">Default sorting</option>
                                        <option value="1">Sort by price: low to high</option>
                                        <option value="2">Sort by price: high to low</option>
                                        <option value="3">Product Name: A to Z</option>
                                        
                                     </select>
                                        
                                        
                                </form>
                                <p>Showing 1–12 of  <?php if($products==true){ echo count($products);}else{echo'0';}?> results</p>
                            </div>
                           
                            
                            <div class="tab-content filter_data">
                             <div id="loading1"></div>
                            </div>
                            
                            <div id="more"></div>
                            
                        </div>
                           
                    </div>
                </div>
            </div>
        </div>
        <!--categorie details end-->
        
        <!--brand logo area start-->
		<div class="brand_logo  mb-40 white">
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
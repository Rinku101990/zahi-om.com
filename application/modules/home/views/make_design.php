<style type="text/css">
	.make_deisgn .nav-item a.nav-link.active.show{
    color: #fff !important;
    background: #c19450 !important;   
    
}
.make_deisgn>.nav-item a:hover{
	color: #c19450 !important;
}
.make_deisgn .nav-item a.nav-link.active.show:after{
	      content: "";
    position: relative;
    bottom: -52px;
    left: -44%;
    border: 15px solid transparent;
    border-top-color: #c19450;
}
.make_deisgn .nav-item a.nav-link.text-uppercase {  
    padding: 16px 13px;
     background: #fff !important;
    border:1px solid #c19450;
    
}
.price-box.float-left {
    height: auto;
}
table input {
    border: 1px solid #e6e6e6;
    height: 30px;
    border-radius: 4px;
}
/*.product-box-2.active {
    border: 1px solid #c19450;
}*/
</style>
<div class="breadcrumb-area mt-10" style="padding: 0px !important">
  <img src="<?=base_url('assets/img/make-your-design-banner.jpg');?>" class="img-responsive" style="padding: 0px;">
       
    </div>
<!--<div class="breadcrumb-area mt-10">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--               <div class="col-md-6 col-sm-6">-->
<!--                    <h4 class="text-uppercase">Make Your Own Design</h4>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-sm-6">-->
<!--                    <ul class="breadcrumb pull-right">-->
<!--                        <li><a href="<?=base_url();?>">Home</a></li>-->
                        
<!--                         <li class="active"><a href="#">Make Your Own Design</a></li>-->
<!--                                                                                            </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<section class="product-details-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="product-desc-tab  bg-white">
               <div class="tabs tabs--style-2">
                  <ul class="nav nav-tabs justify-content-left sticky-top make_deisgn " style="padding-top:20px">
                     <li class="nav-item">
                        <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600 design_tab active show">CHOOSE NECK & SLEEVES DESIGN</a>
                     </li>
                     <li class="nav-item">
                        <a href="#tab_default_2 " data-toggle="tab" class="nav-link text-uppercase strong-600 fabric_tab ">CHOOSE FABRIC</a>
                     </li>
                     <li class="nav-item">
                        <a href="#tab_default_3" data-toggle="tab" class="nav-link text-uppercase strong-600 color_tab">CHOOSE COLOR</a>
                     </li>
                     <li class="nav-item">
                        <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600 size_tab">CHOOSE Dimensions</a>
                     </li>
                   
                  </ul>
                  <div class="tab-content pt-0">
                     <div class="tab-pane active show" id="tab_default_1">
                        <div class="py-2 px-4">
                           
                          <div class="row cate_tab_product">
                          	<?php  if($sleeve==true){ 
                          		foreach ($sleeve as $key=>$slval) {?>

                           <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                                        <div class="product-box-2 bg-white alt-box my-md-2 sleeve" style="<?php if($key=='0'){ echo'border:1px solid #c19450;';}?>">
                                            <div class="position-relative overflow-hidden">
                                                <img src="<?=base_url('admin/uploads/sleeve/').$slval->sl_img;?>" title="<?=$slval->sl_name;?>" class="img-fit lazyloaded" style=" width: 100%;
    height: 290px;  object-fit: contain;">
                                                
                                            </div>
                                            <div class="p-2 p-md-3 border-top">
                                                <h2 class="product-title p-0 text-truncate">
                                                    <?=$slval->sl_name;?>
                                                </h2>
                                                
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                     
         <span class="product-price strong-600"><?=currency($this->website->web_currency);?><?=number_format($slval->sl_price);?>
                                                    </div>
                                                    <div class="float-right">
                                <input type="radio" class="from-control" name="sleeve" value="<?=$slval->sl_id;?>" onclick="sleeve('<?=$slval->sl_id;?>',this)" style=" height: 20px; width: 20px;" <?php if($key=='0')echo'checked';?> />
                                  </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }}?>
                                    
                                     
                                    </div>
                           <span class="space-md-md"></span>
                        </div>
                     </div>
                     <div class="tab-pane" id="tab_default_2">
                        <div class="">
                           <!-- 16:9 aspect ratio -->
                           <div class="py-2 px-4">
                             
                             <div class="row cate_tab_product">
                          	<?php  if($fabric==true){
                          		foreach ($fabric as $key=>$flval) {?>

                           <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                                        <div class="product-box-2 bg-white alt-box my-md-2 fabric" style="<?php if($key=='0'){ echo'border:1px solid #c19450;';}?>">
                                            <div class="position-relative overflow-hidden">
                                                <img src="<?=base_url('admin/uploads/fabric/').$flval->fb_img;?>" title="<?=$flval->fb_name;?>" class="img-fit lazyloaded" style=" width: 100%;
    height: 290px;  object-fit: contain;">
                                                
                                            </div>
                                            <div class="p-2 p-md-3 border-top">
                                                <h2 class="product-title p-0 text-truncate float-left">
                                                    <?=$flval->fb_name;?>
                                                </h2>
                                                
                                             
                                                    <div class="float-right">
                                <input type="radio" class="from-control" name="fabric" value="<?=$flval->fb_id;?>" onclick="fabric('<?=$flval->fb_id;?>',this)" style=" height: 20px; width: 20px;" <?php if($key=='0')echo'checked';?> />
                                  </div>
                                  <br/>
                                                    
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php }}?>
                                    
                                     
                                    </div>

                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="tab_default_3">
                        <div class="py-2 px-4">
                          <div class="row cate_tab_product">
                          	<?php  if($color==true){
                          		foreach ($color as $key=>$clval) {?>

                           <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                                        <div  class="product-box-2 bg-white alt-box my-md-2 color" style="<?php if($key=='0'){ echo'border:1px solid #c19450;';}?>">
                                            <div class="position-relative overflow-hidden">
                                                <img src="<?=base_url('admin/uploads/color/').$clval->cl_img;?>" title="<?=$clval->cl_name;?>" class="img-fit lazyloaded" style=" width: 100%;
    height: 290px;  object-fit: contain;">
                                                
                                            </div>
                                            <div class="p-2 p-md-3 border-top">
                                                <h2 class="product-title p-0 text-truncate float-left">
                                                    <?=$clval->cl_name;?>
                                                </h2>
                                                
                                             
                                                    <div class="float-right">
                                <input type="radio" class="from-control" name="color" value="<?=$flval->fb_id;?>" onclick="color('<?=$clval->cl_id;?>',this)" style=" height: 20px; width: 20px;" <?php if($key=='0')echo'checked';?> />
                                  </div>
                                  <br/>
                                                    
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php }}?>
                                    
                           <span class="space-md-md"></span>
                       
                     </div>
                    
                  </div>
               </div>
               <div class="tab-pane" id="tab_default_4">
                        <div class="py-2 px-4">
                          <div class="row cate_tab_product">
                          

                        
                           <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                        <div  class="product-box-2 bg-white alt-box my-md-2 color" style="height: 474px;">
                                            <div class="position-relative overflow-hidden">
                                                <img src="<?=base_url('admin/uploads/size/size.jpeg');?>" title="dimensions" class="img-fit lazyloaded" style=" width: 100%;
    height: 290px;  object-fit: contain;">
                                                
                                            </div>
                                            <div class="p-2 p-md-3 border-top">
                                                <h2 class="product-title p-0 text-truncate float-left" style="max-height: inherit;">
                                                  <input type="hidden" id="simg" value="<?=base_url('admin/uploads/size/size.jpeg');?>">
                                                  <table ><tr><td>                                Shoulder (Inch) </td><td><input type="number" id="shoulder"></td>
                                                  </tr><tr><td>
                                                  Bust (Inch)</td><td><input type="number" id="bust"></td>
                                                  </tr><tr><td>
                                                  Waist (Inch)</td><td><input type="number" id="waist"></td>
                                                  </tr><tr><td>
                                                  Hips (Inch)</td><td><input type="number" id="hips"></td>
                                                  </tr><tr><td>
                                                  Length (Inch)</td><td><input type="number" id="length"></td>
                                                  </tr>
                                                </table>
                                                </h2>
                                                
                                             
                                                 
                                                    
                                                
                                            </div>
                                        </div>
                                    </div>
                               
                                    
                           <span class="space-md-md"></span>
                       
                     </div>

                     <div class="row" style="    padding: 40px 0;">
              <div class="col-sm-12">
               
                  <button type="button"  <?php  
                    if(!empty($this->cart->contents())){ 
                                            foreach ($this->cart->contents() as $items) {
                                              if(!empty($items['selling_price'])){?> class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2"  onclick="return confirm('your can add design after deleting cart product ?')" <?php }else{?> class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 make_add_to_cart" <?php }}}else{?> class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 make_add_to_cart" <?php }?>>
                                                <i class="fa fa-shopping-basket" style="margin-right: 0rem !important"></i>
                                                <span class="d-none d-md-inline-block"> Add to cart</span>
                                            </button>
              </div>
            </div>
                    
                  </div>
               </div>
                       </div>

         </div>
         
      </div>
   </div>
</section>
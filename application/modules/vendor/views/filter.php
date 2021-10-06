   <style type="text/css">
 .input_color {
    border-radius: 50%;
    width: 18px;   
    height: 18px;
    display: inline-block;
    border: 1px solid #eee;
}
   </style>
    <div class="col-lg-3 col-md-4 ">
                        <div class="sidebar_categorie_area white">
                          
                            <div class="sidebar_categorie_item">
                                <div class="categorie__titile">
                                    <h2>Filter</h2>
                                </div>
                               
                                <h3>CATEGORIES</h3>
                                <div class="categorie_filter">
                                    <ul>
                                     <?php if($category==TRUE){
                                      foreach ($category as $cate_value) {
                                        if(@$filter_categoty==$cate_value->cate_id){?>      
                                    <li><a href="javascript:void(0);" class="cate_categorie <?php if(@$filter_categoty==$cate_value->cate_id)echo'active';?>" cate="<?=encode($cate_value->cate_id);?>"><b><?=$cate_value->cate_name;?>  <i class="fa fa-angle-down pull-right"></i></b></a>
                                <ul id="scate<?=encode($cate_value->cate_id);?>" style="padding: 10px;display: <?php if(@$filter_categoty==$cate_value->cate_id){echo'block';}else{echo'none';}?>;">
                                     <?php if(sub_category($cate_value->cate_id)==TRUE){
                                      foreach (sub_category($cate_value->cate_id) as $scate_value) {?>  
                                        <li><a href="javascript:void(0);" class="scate_categorie <?php if(@$filter_sub_categoty==$scate_value->scate_id)echo'active';?>" scate="<?=encode($scate_value->scate_id);?>"><?=$scate_value->scate_name;?>  <i class="fa fa-angle-down pull-right"></i></a>
                                <ul id="child<?=encode($scate_value->scate_id);?>" style="padding: 10px;display: <?php if(@$filter_sub_categoty==$scate_value->scate_id){echo'block';}else{echo'none';}?>">
                                     <?php if(child_category($scate_value->scate_id)==TRUE){
                                      foreach(child_category($scate_value->scate_id) as $child_value) {?>  
                                        <li><a href="<?=base_url('child-category/').encode($child_value->child_id).'/'.$child_value->child_slug;?>" class="child_categorie <?php if(@$filter_child_categoty==$child_value->child_id)echo'active';?>"><?=$child_value->child_name;?></a></li>
                                    <?php }}?>
                                   </ul>
                                        </li>
                                    <?php }}?>
                                   </ul>
                                    </li>
                                    <?php }}}?>
                                    </ul>                                  
                                </div>
                            </div>
                             <div class="sidebar_categorie_item">
                               <h3>BRANDS</h3>
                                <div class="categorie_filter">
                                    <ul>
                                        <?php if($brand_list==TRUE){
                                            foreach ($brand_list as $blist) {?>
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
                                 <h3>PRICE</h3>
                                <div class="categorie_filter">
                                    <div class="ca_search_filters">
                                       <label for="amount"> Range:</label>
                                       &nbsp;<span class="new_price"><?=currency($this->website->web_currency);?></span><input type="text" name="text" id="amount" />  
                                        <div id="slider-range"></div>   
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar_categorie_item">
                                <h3>SIZE</h3>
                                <div class="categorie_filter">
                                    <ul>
                                         <?php if($size->opt_value==TRUE){
                                            foreach (explode(',',$size->opt_value) as $slist) {?>
                                        <li> <label class="filter_checkbox"><?=$slist;?>
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
                                         <?php if($color->opt_value==TRUE){
                                            foreach (explode(',',$color->opt_value) as $clist) {?>
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
                                         
                                        <li> <label class="filter_checkbox">New
                                       <input type="checkbox" class="common_selector condition" value="0" >
                                              <span class="checkmark"></span>
                                            </label>
                                        
                                        </li>
                                         <li> <label class="filter_checkbox">Used
                                       <input type="checkbox" class="common_selector condition" value="1" >
                                              <span class="checkmark"></span>
                                            </label>
                                        
                                        </li>
                                        <li> <label class="filter_checkbox">Refurbished
                                       <input type="checkbox" class="common_selector condition" value="2" >
                                              <span class="checkmark"></span>
                                            </label>
                                        
                                        </li>
                                  
                                        
                                    </ul>
                                </div>
                            </div>
                             
                            
                          
                            
                        </div>
                    </div>
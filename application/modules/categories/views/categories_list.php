<div class="all-category-wrap py-4 gry-bg">
    <div class="sticky-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white all-category-menu">
                        <ul class="clearfix no-scrollbar">
                            <?php if($category_list==TRUE){
                                foreach ($category_list as $key => $cate_value) {?>
                                 
                            <li <?php if($key==0)echo'class="active"';?>>
                                <a href="#<?=$key;?>" class="row no-gutters align-items-center">
                                    <div class="col-md-3">
                                        <img loading="lazy" class="cat-image" src="<?=base_url('admin/uploads/category/icon/').$cate_value->cate_icon;?>">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="cat-name"><?=$cate_value->cate_name;?></div>
                                    </div>
                                </a>
                            </li>
                        <?php }}?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white">
                          <?php if($category_list==TRUE){
                                foreach ($category_list as $key => $cate_value) {?>
                        <div class="sub-category-menu active" id="<?=$key;?>">
                            <h3 class="category-name"><a href="<?=base_url('categories/').$cate_value->cate_slug;?>"><?=$cate_value->cate_name;?></a></h3>
                            <ul>
                                  <?php if(sub_category($cate_value->cate_id)!=FALSE){
                                  foreach (sub_category($cate_value->cate_id) as $smenu_list) {
                                    if(child_category($smenu_list->scate_id)!=FALSE){
                        foreach (child_category($smenu_list->scate_id) as $ch_menu_list) {
                                   ?>
                                <li><a href="<?=base_url('child-category/').encode($ch_menu_list->child_id).'/'.$ch_menu_list->child_slug;?>"><?=$ch_menu_list->child_name;?></a></li>
                            <?php }}}}?>
                              
                            </ul>
                        </div>
                    <?php }}?>
                       
                      
                      
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
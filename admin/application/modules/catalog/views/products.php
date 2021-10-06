<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
              <?php if(empty($permission) || !empty($permission['products_add'])){?>
             <a href="<?=base_url('catalog/product-add');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Product </button>
             </a>
           <?php }?>
           
            
             
             </div> </div>
          
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Product list</div>
                        <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  </div>
                    </div>
                    <div class="card-body">
                    <?php $msg=$this->session->flashdata('msg');  
    if($msg){  ?>
    
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
    <?php }?>
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" >Sr. No.</th>
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" >Img</th>
                                            
                                                      <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Product Name</th>
                                                  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Seller</th>
                                                 
                                                 
                                                     <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" > Status</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Approval Status</th>
                                                        <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Created</th>
                                                 <?php if($this->login->mst_role=='0' || !empty($permission['products_edit']) || !empty($permission['products_delete']) ){?>  
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
                                                <?php }?>
                                                 
  </tr>
  </thead>
   <tbody>
   <?php if(!empty($product)){
     $i=1;  foreach($product AS $list){?>
 <tr role="row" >
   <td class="sorting_1" align="center"><?=$i;$i++;?>.</td>

   <td ><?php if(!empty(product_img($list->p_id))){?>
    <img src="<?=base_url('../seller/uploads/').cate_slug($list->p_cate).'/'.scate_slug($list->p_scate).'/'.child_slug($list->p_child).'/'.product_img($list->p_id);?>" style="width:50px;height:50px;">
    <?php }else{?>
         <img src="<?=base_url('../seller/uploads/default-image.png');?>" style="width:50px;height:50px;">
  
    <?php }?>

</td>
<td ><a href="<?=base_url('../product/').encode($list->p_id).'/'.slug($list->p_name);?>" target="_blank"> <?=$list->p_name;?></a></td>
   <!--<td > <?=$list->p_name;?></td>-->
   <td><?php if(getVnd_name($list->p_vnd_id)){ echo '<span class="text-primary font-weight-semibold">'.getVnd_name($list->p_vnd_id).'</span>';}else{echo'<span class="text-success font-weight-semibold">Admin<span>';}?>
   </td>
 <td align="center">
     <span class="badge badge-<?php if($list->p_status=='1'){echo'success';}elseif($list->p_status=='3'){echo'warning';}else{echo'danger';}?>-light badge-md"> <?php if($list->p_status=='1'){echo'Active';}elseif($list->p_status=='3'){echo'Pending';}else{echo'In-Active';}?></span></a>
                                        </td>
 <td align="center">
<a href="javascript:void(0);"onclick="javascript:showMyModalSetTitle('Change Status','product_status/',<?=$list->p_id;?>,<?php if($list->p_approval_status=='0'){echo'1';}else{echo'0';}?>)">
 <span class="badge badge-<?php if($list->p_approval_status=='0'){echo'success';}else{echo'danger';}?>-light badge-md"><i class="fa fa-<?php if($list->p_approval_status=='0'){echo'check';}else{echo'ban';}?>"></i> <?php if($list->p_approval_status=='0'){echo'Approval';}else{echo'Un-Approval';}?></span></a></td>
<td align="center"> 
<?=date('d-M-Y',strtotime($list->p_created));?>
<br/><?=date('h:i A',strtotime($list->p_created));?>
 </td>
 <?php if($this->login->mst_role=='0' || !empty($permission['products_edit']) || !empty($permission['products_delete']) ){?>
<td align="center"> 
   <?php if($this->login->mst_role=='0' || !empty($permission['products_edit'])){?>
 <a href="<?=base_url('catalog/product-edit/').encode($list->p_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0);" class="btn btn-default btn-sm mb-2 mb-xl-0 text-black ProductView" productview="<?=$list->p_id;?>" url="<?=base_url();?>" data-toggle="tooltip" data-original-title="Product View"><i class="fa fa-eye"></i></a>
<?php } if($this->login->mst_role=='0' || !empty($permission['products_delete'])){?>

<a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','product_delete/',<?=$list->p_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
<?php }?>
  </td>
<?php }?>
                                                </tr>
   <?php }}?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>




<div class="modal fade show" id="ProductModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document" style="max-width: 700px;width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Product_title1">Product View </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 

   <div class="modal-body">

    <div class="row">
        <div class="col-md-5">
       <span id="pimg"></span>
        </div>
        <div class="col-md-7"> 
               <h5 class="modal-title" id="Product_title"></h5>
               <hr/>
        <table border="0" style="font-size: 15px;width:100%;height: 200px;">
            <tr>
                <th>Reference No.</th>
                <td id='Reference'></td>               

            </tr>
             <tr>
                <th>Product Categories :</th>
                <td id='Categories'></td>              

            </tr>
             <tr>                
                <th>Brand :</th>
                <td id='Brand'></td>               

            </tr>
              <tr>  
                <th>Model</th>
                 <td id='Model'></td>

            </tr>
            <tr>                
                <th>Selling Price</th>
                <td id='Price'></td>
            </tr>
        </table>   
        </div>
    </div>
             
                    
                      
                    
                   
               
            </div>
            
             
        </div>
    </div>
</div>         
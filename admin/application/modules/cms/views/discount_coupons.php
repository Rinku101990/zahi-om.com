<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Discount Coupons
            </li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
             <?php   if($this->login->mst_role=='0' || !empty($permission['discount_coupons_add'])){  ?>
             <a href="<?=base_url('cms/discount-coupons-add');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Discount Coupon</button>
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
                        <div class="card-title">List Discount Coupons</div>
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
                                            
                                                      <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Coupon Name</th>
                                                 
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Coupon Code</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Min. Order</th>
                                                      <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Discount (%)</th>
                                                  
                                                        <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Available</th>
                                                          <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Status</th>
                                                          <?php if($this->login->mst_role=='0' || !empty($permission['discount_coupons_edit']) || !empty($permission['discount_coupons_delete'])){  ?>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
                                                  <?php }?>
  </tr>
  </thead>
   <tbody>
   <?php if(!empty($disount_coupon)){
     $i=1;  foreach($disount_coupon AS $list){?>
 <tr role="row" >
   <td class="sorting_1" style="width: 100px;">#<?=$i;$i++;?></td>
   <td> <?=$list->cup_name;?></td>
   <td> <?=$list->cup_code;?></td>
   <td><?=currency($this->website->web_currency);?> <?=$list->cup_min_order;?></td>
   <td> <?=$list->cup_discount;?></td>
    <td align="center"> 
<?=date('d-M-Y',strtotime($list->cup_start_date));?><br/>
<?=date('d-M-Y',strtotime($list->cup_end_date));?>
 </td>
 <td align="center">
<a href="javascript:void(0);"onclick="javascript:showMyModalSetTitle('Change Status','discount_status/',<?=$list->cup_id;?>,<?php if($list->cup_status=='1'){echo'2';}else{echo'1';}?>)">
 <span class="badge badge-<?php if($list->cup_status=='1'){echo'success';}else{echo'danger';}?>-light badge-md"><i class="fa fa-<?php if($list->cup_status=='1'){echo'check';}else{echo'ban';}?>"></i> <?php if($list->cup_status=='1'){echo'Active';}else{echo'In-Active';}?></span></a></td>

<?php if($this->login->mst_role=='0' || !empty($permission['discount_coupons_edit']) || !empty($permission['discount_coupons_delete'])){  ?>
<td align="center"> 
 <?php  if($this->login->mst_role=='0' || !empty($permission['discount_coupons_edit'])){?>
<a href="<?=base_url('cms/discount-edit/').encode($list->cup_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
<?php }
   if($this->login->mst_role=='0' || !empty($permission['discount_coupons_delete'])){  ?>
<a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','discount_delete/',<?=$list->cup_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
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
<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('settings/sub-category-add');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Sub Category </button>
             </a>	
			
			 
			 </div> </div>
          
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Sub Category list</div>
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
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Sub Category (En)</th>
                                                      <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Sub Category (Ar)</th>
													  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Category Name</th>
                                                
                                                  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Seller</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Status</th>
													    <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Created/Modified</th>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
  </tr>
  </thead>
   <tbody>
   <?php if(!empty($sub_category)){
	 $i=1;  foreach($sub_category AS $cate_list){?>
 <tr role="row" >
   <td class="sorting_1" >#<?=$i;$i++;?></td>
 <td > <?=$cate_list->scate_name;?></td>
      <td > <?=$cate_list->scate_name_ar;?></td>
 <td > <?=cate_name($cate_list->cate_id);?></td>
 <td> <?php if(empty($cate_list->vnd_id)){echo '<span class="text-success font-weight-semibold">Admin</span>';}
 else{echo '<span class="text-primary font-weight-semibold">'.getVnd_name($cate_list->vnd_id).'</span>';}?></td>
<td align="center"> 
<a href="javascript:void(0);"onclick="javascript:showMyModalSetTitle('Change Status','sub_category_status/',<?=$cate_list->scate_id;?>,<?php if($cate_list->scate_status=='1'){echo'2';}else{echo'1';}?>)">
<span class="badge badge-<?php if($cate_list->scate_status=='1'){echo'success';}else{echo'danger';}?>-light badge-md"><i class="fa fa-<?php if($cate_list->scate_status=='1'){echo'check';}else{echo'ban';}?>"></i> <?php if($cate_list->scate_status=='1'){echo'Active';}else{echo'In-Active';}?></span>
</a>
</td>
<td align="center"> 
 <button type="button" class="btn bg-navy btn-xs" data-toggle="tooltip" data-original-title="<?=date('d-M-Y g:h:i A',strtotime($cate_list->scate_created));?>/<?php  if(!empty((int)$cate_list->scate_updated))
{echo date('d-M-Y g:h:i A',strtotime($cate_list->scate_updated));}?>"><i class="fa fa-eye"></i></button>
 </td>
<td align="center"> 
 
<a href="<?=base_url('settings/sub-category-edit/').encode($cate_list->scate_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','sub_category_delete/',<?=$cate_list->scate_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> </td>
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
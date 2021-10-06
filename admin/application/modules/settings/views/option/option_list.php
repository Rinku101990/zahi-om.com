<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Option</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
         <?php if($this->login->mst_role=='0' || !empty($permission['manage_option_add'])){ ?>
			<a href="<?=base_url('settings/option-add');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Option </button>
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
                        <div class="card-title">Option list</div>
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
                                            
													  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Option Name</th>
                              <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Required</th>
                                <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" > Display In Filters</th>
                                 <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="    width: 150px;" > Value</th>
                                                  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Seller</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Status</th>
													   <!-- <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Created/Modified</th>-->
                         <?php if($this->login->mst_role=='0' || !empty($permission['manage_option_edit'])){ ?>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
                                                  <?php }?>
  </tr>
  </thead>
   <tbody>
   <?php if(!empty($option)){
	 $i=1;  foreach($option AS $list){?>
 <tr role="row" >
   <td class="sorting_1" >#<?=$i;$i++;?></td>
   <td > <?=$list->opt_name;?></td>
      <td > <?php if($list->opt_required=='1'){echo'Yes';}else{echo'No';}?></td>
      <td > <?php if($list->opt_display=='1'){echo'Yes';}else{echo'No';}?></td>
         <td > <?php echo  $list->opt_value;?></td>
 <td> <?php if(empty($list->vnd_id)){echo '<span class="text-success font-weight-semibold">Admin</span>';}
 else{echo '<span class="text-primary font-weight-semibold">'.getVnd_name($list->vnd_id).'</span>';}?></td>
<td align="center">
<a href="javascript:void(0);"onclick="javascript:showMyModalSetTitle('Change Status','option_status/',<?=$list->opt_id;?>,<?php if($list->opt_status=='1'){echo'2';}else{echo'1';}?>)">
 <span class="badge badge-<?php if($list->opt_status=='1'){echo'success';}else{echo'danger';}?>-light badge-md"><i class="fa fa-<?php if($list->opt_status=='1'){echo'check';}else{echo'ban';}?>"></i> <?php if($list->opt_status=='1'){echo'Active';}else{echo'In-Active';}?></span></a></td>
<!--<td align="center"> 
 <button type="button" class="btn bg-navy btn-xs" data-toggle="tooltip" data-original-title="<?=date('d-M-Y g:h:i A',strtotime($list->opt_created));?>/<?php if(!empty((int)$list->opt_updated))
{echo date('d-M-Y g:h:i A',strtotime($list->opt_updated));}?>"><i class="fa fa-eye"></i></button>
 </td>-->
  <?php if($this->login->mst_role=='0' || !empty($permission['manage_option_edit'])){ ?>
<td align="center"> 
 
<a href="<?=base_url('settings/option-edit/').encode($list->opt_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0);" class="btn btn-primary btn-sm mb-2 mb-xl-0 text-white option_value" option_value="<?=$list->opt_id;?>" url="<?=base_url();?>"  data-toggle="tooltip" data-original-title="Add Option Value"title="Add Option Value"><i class="fa fa-plus"></i></a>

<!--<a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','option_delete/',<?=$list->opt_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>-->

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
<div class="modal fade show" id="OptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none; padding-right: 5px;">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Option Value Setup</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
               <div style=" padding: 20px;border: 1px solid #eaf0f7;" >
            <h5>Configure Option Values</h5>
            <br>
            <div id="success"></div>
<form id="option_value_add" action="" method="post">
 <input type="hidden" class="form-control" name="opt_id" id='opt_id' >

           <div class="row">
            <div class="col-md-12">
      
                    <div class="form-group">
                        <label class="form-control-label"> Option Value <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="opt_value" id="opt_value" Placeholder="Enter Option Value">
                <span class="opt_value"></span>    </div>
          </div>
        </div>

            <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn2 option_value_save"  url="<?=base_url();?>"> <i class="fa fa-save"></i> Save </button>
        <button type="reset" class="btn btn-secondary btn2"><i class="fa fa-remove"></i>  Cancel</button>
               
            </div>
        </div>
       
       </form>
       <br></div>

       <br>
        <div >
           <h5>Option Value Listing</h5>
           <div id="success_list"></div>
           
         <div class="table-responsive product-datatable">
                            <div id="example" class="dataTables_wrapper dt-bootstrap4 no-footer">
                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" >Sr. No.</th>
                                            
                            <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Option Vallue</th>
                            
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
  </tr>
  </thead>
   <tbody id="OptionList" >
                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
        </div>
       </div>
           
           
        </div>
    </div>
</div>


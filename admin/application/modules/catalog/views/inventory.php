<div class="app-content">
    <div class="section">
       <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Inventory</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
           
            
             
             </div> </div>
          
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Inventory list</div>
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
                                            
                                                      <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Product Name</th>
                                                  <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Seller</th>

                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Size</th>

                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Color</th>
                                                 
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Selling Price</th>
                                                   <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Initial Stock</th>
                                                     <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Purchase Stock</th>
                                                     <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Balance Stock</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Condition</th>
                                                 
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Stock</th>
                                                        <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Created</th>
 <?php $permission=unserialize($this->login->mst_permission);  
     if($this->login->mst_role=='0' || !empty($permission['inventory_edit'])){?>
    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
  <?php }?>
  </tr>
  </thead>
   <tbody>
   <?php if(!empty($inventory)){
     $i=1;  foreach($inventory AS $list){?>
 <tr role="row" >
   <td class="sorting_1" align="center"><?=$i;$i++;?>.</td>
   <td > <?=getProductName($list->int_pid);?></td>
    <td align="center" style="width: 100px;"><?php if(getVnd_name($list->int_vnd_id)){ echo '<span class="text-primary font-weight-semibold">'.getVnd_name($list->int_vnd_id).'</span>';}else{echo'<span class="text-success font-weight-semibold">Admin</span>';}?>
   </td>
     <td align="center"><?=$list->int_size;?></td>
      <td align="center"><?=$list->int_color;?></td>
    <td align="center"><?=currency($this->website->web_currency);?> <?=$list->int_selleing_price;?></td>
     <td align="center"> <?=$list->int_total_qty;?></td>
     <td align="center"> <?=$list->int_total_qty-$list->int_available_qty;?></td>
          <td align="center"> <?=$list->int_available_qty;?></td>

      <td align="center"> <b><?php if($list->int_condition=='0'){echo'New';}
      else if($list->int_condition=='1'){echo'Used';}else{echo'Refurbished';}?></b></td>
 
 <td align="center">
<a href="javascript:void(0);"onclick="javascript:showMyModalSetTitle('Change Status','inventory_status/',<?=$list->int_id;?>,<?php if($list->int_stock=='1'){echo'2';}else{echo'1';}?>)">
 <span class="badge badge-<?php if($list->int_stock=='1'){echo'success';}else{echo'danger';}?>-light badge-md"><i class="fa fa-<?php if($list->int_stock=='1'){echo'check';}else{echo'ban';}?>"></i> <?php if($list->int_stock=='1'){echo'Yes';}else{echo'No';}?></span></a></td>
<td align="center"> 
<?=date('d-M-Y',strtotime($list->int_created));?>
<br/><?=date('h:i A',strtotime($list->int_created));?>
</td>
 <?php  
     if($this->login->mst_role=='0' || !empty($permission['inventory_edit'])){?>
<td align="center"> 
 
<a href="<?=base_url('catalog/inventory-edit/').encode($list->int_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>


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




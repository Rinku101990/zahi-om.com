<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Vendors List</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap"> 
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
               <a href="<?=base_url('user/vendor-add');?>">
               <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Vendor </button>
               </a>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Vendors List</div>
                  <div class="card-options"> 
                     <a href="<?php echo site_url('user/export_vendors');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Vendors </a>
                     <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  
                  </div>
               </div>
               <div class="card-body">
                  <?php $msg=$this->session->flashdata('msg');  
                     if($msg){  ?>
                  <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
                  <?php }?>
                  <?php //print("<pre>".print_r($vendors,true)."</pre>");?>
                  <div class="table-responsive product-datatable">
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending"style="width:30px;">SR</th>
                                       <th class="w-15p sorting_asc" >Logo</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Name (En)</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Name (Ar)</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width:65px">Phone</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width:55px">Profile</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width:50px">Status</th>
                                       <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width:70px;">Created</th>
                                       <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width:80px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(!empty($vendors)){ $i=1;foreach($vendors AS $vdrlist){?>
                                    <tr role="row" >
                                       <td class="sorting_1" ><?=$i;$i++;?>.</td>
                                       <td><?php if(!empty($vdrlist->vnd_picture)){?>
                                          <img src="<?php echo base_url('../seller/uploads/profile/').$vdrlist->vnd_picture;?>" style="width:60px;height: 60px;">
                                          <?php }else{?>
                                          <img src="<?php echo base_url('../seller/uploads/profile/avatar.png');?>" style="width:60px;height: 60px;">
                                          <?php }?>
                                       </td>
                                       <td > 
                                          <a href="<?php echo site_url('user/seller/'.$vdrlist->vnd_id);?>" class="text-primary"><?php $fullname = strlen($vdrlist->vnd_name); if($fullname>18){echo substr($vdrlist->vnd_name,0,18).'..';}else{echo substr($vdrlist->vnd_name,0,18);}?></a> 
                                       </td>
                                       <td > 
                                          <a href="<?php echo site_url('user/seller/'.$vdrlist->vnd_id);?>" class="text-primary"><?php echo $vdrlist->vnd_name_ar;?></a> 
                                       </td>
                                       <td><?php if($vdrlist->vnd_phone!=0){echo '+'.phon_code($vdrlist->vnd_phone_code).'-'.$vdrlist->vnd_phone;}else{ echo "NA";}?></td>
                                       <td>
                                          <?php if($vdrlist->vnd_category=='1'){ ?>
                                          <span class="badge badge-pill badge-primary">Supplier</span>
                                          <?php }else if($vdrlist->vnd_category=='2'){ ?>
                                          <span class="badge badge-pill badge-info">Manufacture</span>
                                          <?php }else if($vdrlist->vnd_category=='3'){ ?>
                                          <span class="badge badge-pill badge-success">Wholesaler</span>
                                          <?php }else{ ?>
                                          <span class="badge badge-pill badge-warning">Retailer</span>
                                          <?php } ?>
                                       </td>
                                       <td align="center">
                                          <?php if($vdrlist->vnd_status==1){?>
                                          <span class="badge badge-pill badge-primary mr-1 mb-1 mt-1">active</span>
                                          <?php }else if($vdrlist->vnd_status==2){ ?> 
                                          <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">inactive</span> 
                                          <?php }else{ ?>
                                          <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">Blocked</span> 
                                          <?php } ?> 
                                       </td>
                                       <td align="center"> 
                                          <?=date('j M Y', strtotime($vdrlist->vnd_created));?>
                                       </td>
                                       <td align="center">
                                          <a href="<?php echo site_url('user/seller/'.encode($vdrlist->vnd_id));?>" class="btn btn-primary btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user-circle-o"></i></a>
                                          <a href="<?php echo site_url('user/vendor-edit/'.encode($vdrlist->vnd_id));?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                       </td>
                                    </tr>
                                    <?php } } ?>
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
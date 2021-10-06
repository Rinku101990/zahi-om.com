<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Customers</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap"> 
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Customers List</div>
                  <div class="card-options">
                  <a href="<?php echo site_url('user/export_customers');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Customers </a>
                   <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  </div>
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
                                       <th class="w-15p " >Sr.No.</th>
                                       <th class="wd-15p">Name</th>
                                       <th class="wd-15p" >Email Id</th>
                                       <th class="wd-15p " >Phone</th>
                                       <th class="wd-15p" >City</th>
                                       <th class="wd-15p" >Status</th>
                                       <th class="wd-20p" style="width: 70px;">Created</th>
                                       <th class="wd-10p " style="width: 50px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(!empty($customers)){
                                       $i=1;  foreach($customers AS $cstlist){?>
                                    <tr role="row" >
                                       <td><?=$i;$i++;?>.</td>
                                       <td > 
                                          <a href="<?php echo site_url('user/profile/'.$cstlist->cust_id);?>" class="text-primary"><?php echo $cstlist->cust_fname;?></a> 
                                       </td>
                                       <td>
                                          <?=$cstlist->cust_email;?>
                                       </td>
                                       <td> <?=$cstlist->cust_phone;?></td>
                                       <td><?php if($cstlist->ct_name!=0){echo $cstlist->ct_name;}else{ echo "NA";}?></td>
                                       <td align="center">
                                          <?php if($cstlist->cust_status==0){?>
                                          <span class="badge badge-pill badge-primary mr-1 mb-1 mt-1">active</span>
                                          <?php }else if($cstlist->cust_status==1){ ?> 
                                             <span class="badge badge-pill badge-warning mr-1 mb-1 mt-1">inactive</span>   
                                          <?php }else{ ?>
                                             <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">Blocked</span>   
                                          <?php } ?> 
                                       </td>
                                       <td align="center"> 
                                          <?=date('j M Y', strtotime($cstlist->cust_created));?>
                                       </td>
                                       <td align="center"> 
                                          <a href="<?php echo site_url('user/profile/'.$cstlist->cust_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Profile"><i class="fa fa-user-circle-o"></i></a>
                                       </td>
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
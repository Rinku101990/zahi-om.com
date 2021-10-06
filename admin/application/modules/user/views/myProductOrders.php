<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Product Orders List</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap"> 
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row" id="user-profile">
         <div class="col-lg-12">
            <?php //print("<pre>".print_r($myOrders,true)."</pre>");?>
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive product-datatable">
                      <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                          <div class="row">
                              <div class="col-sm-12">
                                  <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                      <thead>
                                          <tr role="row">
                                              <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Ord.No</th>
                                              <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Product</th>
                                              <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Amount</th>
                                              <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Payment</th>
                                              <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                              <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 60px;">Created</th>
                                              <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php if(!empty($myOrders)){ foreach($myOrders as $molist){ ?>
                                          <tr role="row">
                                              <td class="sorting_1" align="left">#<?php echo $molist->ord_reference_no;?></td>
                                              <td><?php $productname = strlen($molist->pro_name);if($productname>30){echo substr($molist->pro_name, 0,30).'..';}else{echo substr($molist->pro_name, 0,30);}?></td>
                                              <td><?=currency($this->website->web_currency);?><?php echo $molist->ord_total_amounts;?></td>
                                              <td align="center">
                                                <span class="badge badge-info-light badge-md"><?php echo $molist->ord_pay_mode;?></span>    
                                              </td>
                                              <td align="center">
                                              <?php if($molist->order_status=="Waiting"){ ?>
                                                <span class="badge badge-warning-light badge-md">Waiting</span>
                                              <?php }else if($molist->order_status=="InProcess"){ ?>
                                                <span class="badge badge-primary-light badge-md">InProcess</span>
                                              <?php }else if($molist->order_status=="Waiting"){ ?>
                                                <span class="badge badge-info-light badge-md">Dispatched</span>
                                              <?php }else{ ?>
                                                <span class="badge badge-success-light badge-md">Delivered</span>
                                              <?php } ?>
                                              </td>
                                              <td align="center"><?php echo date('j M Y', strtotime($molist->ord_create));?></td>
                                              <td align="center">
                                                  <a href="<?php echo site_url('orders/invoice/'.$molist->ord_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                              </td>
                                          </tr>
                                        <?php } }else{ ?>
                                          <tr>
                                            <td colspan="7"><center>no record found!</center></td>
                                          </tr>
                                        <?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
            </div>

         </div>
         <!-- col end --> 
      </div>
      <!-- row closed -->
   </div>
</div>
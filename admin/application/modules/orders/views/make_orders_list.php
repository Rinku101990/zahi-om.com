<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Orders</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Orders List</div>

                        <div class="card-options">
                          <a href="<?php echo site_url('orders/export_orders');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Orders </a>
                         <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" ar>Sr. No.</th>
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" style="width: 70px !important;">Order ID</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Customer Name</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Price</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 60px !important;">Payment</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 50px !important;">Status</th>
                                                    <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 130px;">Created</th>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 60px !important;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //print("<pre>".print_r($ordlist,true)."</pre>");?>
                                                <?php $i=1; if(!empty($ordlist)){ foreach($ordlist as $order){ ?>
                                                    <tr role="row">
                                                        <td><?=$i;$i++;?></td>
                                                        <td class="sorting_1" align="left">#<a href="<?php echo site_url('orders/invoice/'.$order->ord_id);?>" ><?php echo $order->ord_reference_no;?></a></td>
                                                        <td>
                                                            <a href="<?php echo site_url('user/profile/'.$order->cust_id);?>" target="_blank"><?php echo $order->cust_fname.' '.$order->cust_lname;?></a>
                                                        </td>
                                                        <td><?=currency($this->website->web_currency);?><?php echo $order->ord_total_amounts;?></td>
                                                        
                                                        <td align="center">
                                                            <?php if($order->ord_txt_id!=null){ ?>
                                                                <?php if($order->ord_txt_status=='success'){ ?>
                                                                    <span class="badge badge-success-light badge-md">Online</span>
                                                                <?php }else if($order->ord_txt_status=='Cancle'){ ?>
                                                                    <span class="badge badge-danger-light badge-md">Cancle</span>
                                                                <?php }else if($order->ord_txt_status=="failed"){ ?>
                                                                    <span class="badge badge-warning-light badge-md">Failed</span>
                                                                <?php } ?>
                                                            <?php }else{ ?>
                                                                <span class="badge badge-success-light badge-md">Cash On Delivery</span>
                                                            <?php } ?>                                                            
                                                        </td>

                                                        <td align="center">
                                                            <?php if($order->order_status=='Delivered'){ ?>
                                                                <span class="badge badge-primary-light badge-md">Delivered</span>
                                                            <?php }else if($order->order_status=='Dispatched'){ ?>
                                                                <span class="badge badge-info-light badge-md">Dispatched</span>
                                                            <?php }else if($order->order_status=='InProcess'){ ?>
                                                                <span class="badge badge-success-light badge-md">InProcess</span>
                                                            <?php }else{ ?>
                                                                <span class="badge badge-warning-light badge-md">Waiting</span>
                                                            <?php } ?>
                                                        </td>
                                                        
                                                        <td align="center"><?php echo date('j M Y G:i A',strtotime($order->ord_created_date));?></td>
                                                        <td align="center">
                                                            <a href="<?php echo site_url('orders/design_invoice/'.$order->ord_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                           <!--  <a href="<?php echo site_url('orders/remove/'.$order->ord_id);?>" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o"></i></a> -->
                                                        </td>
                                                    </tr>
                                                <?php } }else{ ?>
                                                    <tr role="row">
                                                        <td class="sorting_1" align="center"  colspan="7">no order found!</td>
                                                    </tr>
                                                <?php } ?>

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
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order Cancellation Requests</li>
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
                        <div class="card-title">Order Cancellation Requests List</div>
                        <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">ID</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">BUYER</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">SELLER</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">REQUEST</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">AMOUNT</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">STATUS</th>
                                                    <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">DATE</th>
                                                                               </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($cancel==true){ $i=1; foreach ($cancel as $ctval) {?>
                                                <tr role="row">
                                                     <td class="sorting_1" align="left"><?=$i;$i++;?></td>
                                                    <td class="sorting_1" align="left">#<?=$ctval->c_ref;?></td>
                                                    <td><?=$ctval->cust_fname.' '.$ctval->cust_lname;?></td>
                                                    <td><?=$ctval->vnd_name;?></td>
                                                    
                                                    <td align="center">
                                                        <strong>Order/invoice</strong>: <?=$ctval->ord_reference_no;?><br>
                                                        <strong>Order Status</strong>: <?=$ctval->order_status;?><br>
                                                        <strong>Reason</strong>: <?=$ctval->ocr_title;?><br>
                                                        <strong>Comments</strong>: <?=$ctval->c_comment;?><br>
                                                    </td>
                                                    <td align="center">OMR <?=$ctval->pro_price;?></td>
                                                    <td align="center">
                                                              <?php if($ctval->c_status=='Approved'){?>
                                                        <span class="badge badge-success-light badge-md">Approved</span>
                                                    <?php }elseif($ctval->c_status=='UnApproved'){?>
                                                         <span class="badge badge-danger-light badge-md">UnApproved</span>
                                                         <?php }else{?>
                                                            <span class="badge badge-warning-light badge-md">Pending</span>
                                                         <?php }?>
                                                    </td>
                                                    <td align="center"><?=date('d M Y',strtotime($ctval->c_created));?></td>
                                                    
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
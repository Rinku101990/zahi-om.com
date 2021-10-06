<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category Products Report</li>
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
                        <div class="card-title">Category Products Report</div>
                        <?php if(!empty($cateProducts)){ ?>
                        <div class="card-options"> 
                            <a href="<?php echo site_url('reports/export_productByCategory/'.encode($cateProducts[0]->cate_id));?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Report </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <?php //print("<pre>".print_r($cateProducts,true)."</pre>");?>
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Reference</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Name</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Total(A)</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Shipping(B)</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">GST(C)</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Total(A+B+C)</th>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Commission</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($cateProducts)){ foreach($cateProducts as $cplist){ ?>
                                                <tr role="row">
                                                    <td><?php echo $cplist->ord_reference_no;?></td>
                                                    <td><?php echo $cplist->pro_name;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $cplist->pro_price.'X'.$cplist->pro_qty;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $cplist->ord_deliver_charge;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $cplist->pro_gst;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php $total = (($cplist->pro_price*$cplist->pro_qty)+$cplist->ord_deliver_charge+$cplist->pro_gst); echo number_format((float)$total, 2, '.', '');?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php $grandTotal = $total/$cplist->txt_per; echo number_format((float)$grandTotal, 2, '.', '');?></td>
                                                </tr>
                                                <?php } }else{ ?>
                                                    <tr>
                                                        <td colspan="7"><center>no category products list found!</center></td>
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
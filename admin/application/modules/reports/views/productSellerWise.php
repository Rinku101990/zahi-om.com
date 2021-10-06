<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sellers Products Report</li>
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
                        <div class="card-title">Sellers Products Report</div>
                        <?php if(isset($slrsProducts[0]->p_vnd_id)){ ?>
                            <div class="card-options"> 
                                <a href="<?php echo site_url('reports/export_productBySellers/'.encode($slrsProducts[0]->p_vnd_id));?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Report </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <?php //print("<pre>".print_r($slrsProducts,true)."</pre>");?>
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Id</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Reference</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Name</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Model</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Brand</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Selling Price</th>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($slrsProducts)){ foreach($slrsProducts as $plist){ ?>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left"><?php echo $plist->p_id;?></td>
                                                    <td><?php echo $plist->p_reference_no;?></td>
                                                    <td><?php $productName = strlen($plist->p_name); if($productName > 25){echo substr($plist->p_name,0,25).'..';}else{echo substr($plist->p_name, 0,25);}?></td>
                                                    <td><?php echo $plist->p_model;?></td>
                                                    <td><?php echo $plist->brd_name;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $plist->p_selling_price;?></td>
                                                    <td><?php echo date('j M Y G:i A',strtotime($plist->p_created));?></td>
                                                </tr>
                                                <?php } }else{ ?>
                                                    <tr>
                                                        <td colspan="6"><center>no product list found!</center></td>
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
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sellers Report</li>
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
                        <div class="card-title">Sellers Report</div>
                        <div class="card-options"> 
                            <a href="<?php echo site_url('reports/export_sellers');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Report </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php //print("<pre>".print_r($sellerReports,true)."</pre>");?>
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Sr</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Name</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Email</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Phone</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">ORD. Placed</th>
                                                    <!-- <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Purchase</th> -->
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Reg.Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($sellerReports)){ $i=1; foreach($sellerReports as $sellers){ ?>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left"><?php echo $i++;?></td>
                                                    <td><?php echo $sellers->vnd_name;?></td>
                                                    <td><?php echo $sellers->vnd_email;?></td>
                                                    <td><?php if($sellers->vnd_phone!=''){echo $sellers->vnd_phone;}else{echo "NA";};?></td>
                                                    <td><?php echo $sellers->Orders;?></td>
                                                    <!-- <td><?php if(!empty($sellers->Amount)){echo $sellers->Amount;}else{echo "0";};?></td> -->
                                                    <td><?php echo date('j M Y',strtotime($sellers->vnd_created));?></td>
                                                </tr>
                                                <?php } }else{ ?>
                                                    <tr>
                                                        <td colspan="6"><center>no sellers list found!</center></td>
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
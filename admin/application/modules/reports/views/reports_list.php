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
                        <div class="card-title">Download Sales Reports</div>
                        <div class="card-options"> 
                            <a href="<?php echo site_url('reports/export_sales');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Report </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" style="width: 70px !important;">Sr.No.</th>
                                                    <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 100px;">Date</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">No Of Orders</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Net Amounts</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Adjust Amount</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 60px !important;">GST</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 50px !important;">SHIPPING CHARGE</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($salesReports)){ $i=1; foreach($salesReports as $reports){ ?>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left"><?php echo $i++;?></td>
                                                    <td><?php echo $reports->CREATED;?></td>
                                                    <td><?php echo $reports->ORDERS;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $reports->NETAMNT;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $reports->ADJAMNT;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $reports->GST;?></td>
                                                    <td><?=currency($this->website->web_currency);?><?php echo $reports->SHIPPING;?></td>
                                                </tr>
                                                <?php } }else{ ?>
                                                    <tr>
                                                        <td colspan="7"><center>no reports found</center></td>
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
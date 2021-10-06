<!-- App-content opened -->
<?php error_reporting(0);?>
<style type="text/css">
    .wideget-user-rating ul li i {
    color: #ffab00;
}
.wideget-user-rating ul li {
    display: inline;
}
</style>
<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0">Welcome Back Administrator,</h4>
                <small class="text-muted mt-0 fs-14"><?php echo $this->website->web_company_name; ?></small> 
            </div>
            <div class="page-rightheader">
                  <div class="mt-3 mt-md-0">
                        <div class="border-right pl-0 pl-md-4 pr-4 mt-1 d-xl-block">
                            <p class="text-muted mb-1">Customer Rating</p>
                            <div class="wideget-user-rating">
                                <ul style="display: initial;">
                                 <?php 
                                 $count_user=star()->count;
                              $star_count=star()->star_count;
                              if($star_count){
                              echo GetStar(round($star_count/$count_user,1));
                          } else{  echo GetStar(0);}
                       
                          ?></ul>
                                <span class="" style="display: initial;">(<?=$star_count."/".$count_user;?>)</span> </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Page-header closed -->

        <!-- row opened -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                         <div class="">
                                <p class="mb-2 h6">Total Revenue</p>
                                <h2 class="mb-1 "><span><?=currency($this->website->web_currency);?></span><?php if($this->AllProduct['revenue']->Revenue!=''){echo number_format($this->AllProduct['revenue']->Revenue,2);}else{echo "0";};?></h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.35%)<i class="fe fe-arrow-up text-success"></i></span>Increase</p>
                            </div>
                            <div class=" my-auto ml-auto">
                                <div class="chart-wrapper text-center">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="areaChart1" class="areaChart2 chartjs-render-monitor chart-dropshadow-primary overflow-hidden mx-auto" width="80" height="80" style="display: block; width: 80px; height: 80px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                           <div class="">
                                <p class="mb-2 h6">Total Products</p>
                                <h2 class="mb-1 "><?php echo $this->AllProduct['product'];?></h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.54%)</span><i class="fe fe-arrow-down text-success"></i>Increase</p>
                            </div>
                            <div class=" my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="areaChart2" class="areaChart2 chartjs-render-monitor chart-dropshadow-secondary overflow-hidden" width="80" height="80" style="display: block; width: 80px; height: 80px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                             <div class="">
                                <p class="mb-2 h6">Total Vendors</p>
                                <h2 class="mb-1 "><?php echo $this->AllProduct['vendors'];?></h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.96%)<i class="fe fe-arrow-up text-success"></i></span>Increase</p>
                            </div>
                            <div class="my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="areaChart3" class="areaChart3 chartjs-render-monitor chart-dropshadow-info overflow-hidden" width="80" height="80" style="display: block; width: 80px; height: 80px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                           <div class="">
                                <p class="mb-2 h6">Total Customers</p>
                                <h2 class="mb-1 "><?php echo $this->AllProduct['customers'];?></h2>
                                <p class="mb-0 text-muted"><span class="text-success">(+0.42%)</span><i class="fe fe-arrow-down text-success"></i>Increase</p>
                            </div>
                            <div class="my-auto ml-auto">
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="areaChart4" class="areaChart4 chartjs-render-monitor chart-dropshadow-success overflow-hidden" width="80" height="80" style="display: block; width: 80px; height: 80px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-xl-12 product">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order</h3>
                        <div class="card-options "> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                               <div class="col-lg-12 col-xl-12 lg-mt-5">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="card box-shadow-0 overflow-hidden">
                                            <div class="card-body p-4">
                                                <div class="text-center"> <i class="fa fa-pause fa-2x text-primary text-primary-shadow"></i>
                                                    <h3 class="mt-3 mb-0 "><?php echo $this->AllProduct['pending'];?></h3> <small class="text-muted">Pending Order</small> </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card box-shadow-0 overflow-hidden">
                                            <div class="card-body p-4">
                                                <div class="text-center"> <i class="fa fa-tasks fa-2x text-secondary text-secondary-shadow"></i>
                                                    <h3 class="mt-3 mb-0 "><?php echo $this->AllProduct['process'];?></h3> <small class="text-muted">Process Order</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-3">
                                        <div class="card box-shadow-0 mb-0 overflow-hidden">
                                            <div class="card-body p-4">
                                                <div class="text-center"> <i class="fa fa-truck fa-2x text-info text-info-shadow"></i>
                                                    <h3 class="mt-3 mb-0 "><?php echo $this->AllProduct['dispatch'];?></h3> <small class="text-muted"> Dispatched Order</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 ">
                                        <div class="card box-shadow-0 mb-0 overflow-hidden">
                                            <div class="card-body p-4">
                                                <div class="text-center"> <i class="fa fa-check-square-o fa-2x text-success text-success-shadow"></i>
                                                    <h3 class="mt-3 mb-0 "><?php echo $this->AllProduct['deliver'];?></h3> <small class="text-muted">Delivered Order</small> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="line-chart" class="chartjs-render-monitor chart-dropshadow2 overflow-hidden" height="280" style="display: block; width: 675px; height: 280px;" width="675"></canvas>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Purchase</th>
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
                                                    <td>OMR<?php if(!empty($sellers->amount)){echo $sellers->amount;}else{echo "0";};?></td> 
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
        <!-- row opened -->
        <div class="row" style="display: none">
           
            <div class="col-xl-4 col-lg-6">
               
                <div class="card overflow-hidden">
                    
                   
                    <div class="chart-wrapper ">
                       
                        <canvas id="earning" class="earning chart-dropshadow-primary mb-3 mt-2 h-50 chartjs-render-monitor" width="340" height="169" style="display: none; width: 340px; height: 169px;"></canvas>
                    </div>
                  
                </div>
            </div>
            
        </div>
        <!-- row closed -->
        <!-- row opened -->
        <div class="row" style="display: none">
            <div class="col-lg-12 col-xl-8 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                   
                    <div class="card-body pt-0 overflow-hidden">
                        <div class="chart-wrapper">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="leads" class="h-300 chartjs-render-monitor" width="659" height="300" style="display: none; width: 659px; height: 300px;"></canvas>
                        </div>
                       
                    </div>
                </div>
            </div>
           
        </div>
        <!-- row opened -->
      
    </div>
</div>
<!-- App-content closed -->
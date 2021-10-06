<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category Wise Report</li>
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
                        <div class="card-title">Products(Category Wise) Report</div>
                        <div class="card-options "> 
                          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                          <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php //print("<pre>".print_r($getSellers,true)."</pre>");?>
                         <form class="form-horizontal" action="<?php echo site_url('reports/categorywise');?>" method="post">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control nice-select" name="getCategoryProducts">
                                            <option value="">Select Category For Products</option>
                                            <?php foreach($getCategory as $skey=>$clist){ ?>
                                                <option value="<?php echo encode($clist->cate_id);?>"><?php echo $clist->cate_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="sellerBtn">
                                    <div class="form-group justify-content-end">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Check Category list</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </form>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>

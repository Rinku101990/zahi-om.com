<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Withdrawal Requests</li>
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
                        <div class="card-title">Withdrawal Requests List</div>
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
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">User</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Bank</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Amount</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Mode</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Request</th>
                                                    <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 90px;">Date</th>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left">#ORD00001</td>
                                                    <td>Ordius It Solutions</td>
                                                    <td>Rinku Vishwakarma</td>
                                                    <td align="center">Rs.1990</td>
                                                    <td align="center"><span class="badge badge-info-light badge-md">Bank</span></td>
                                                    <td align="center"><span class="badge badge-warning-light badge-md">Pending</span></td>
                                                    <td align="center">31 Dec 2019</td>
                                                    <td align="center">
                                                        <a href="javascript:void(0)" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left">#ORD00002</td>
                                                    <td>Convero Consulting</td>
                                                    <td>Manish Kumar</td>
                                                    <td align="center">Rs.2390</td>
                                                    <td align="center"><span class="badge badge-info-light badge-md">Bank</span></td>
                                                    <td align="center"><span class="badge badge-warning-light badge-md">Pending</span></td>
                                                    <td align="center">31 Dec 2019</td>
                                                    <td align="center">
                                                        <a href="javascript:void(0)" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left">#ORD00003</td>
                                                    <td>Flexsin Technologies</td>
                                                    <td>Deepak Singh</td>
                                                    <td align="center">Rs.2290</td>
                                                    <td align="center"><span class="badge badge-info-light badge-md">Bank</span></td>
                                                    <td align="center"><span class="badge badge-warning-light badge-md">Pending</span></td>
                                                    <td align="center">31 Dec 2019</td>
                                                    <td align="center">
                                                        <a href="javascript:void(0)" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
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
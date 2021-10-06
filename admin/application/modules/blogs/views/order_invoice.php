<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order Invoice</li>
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">#INV-0001</h3>
                        <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8"><br>
                                <center><img src="<?php echo site_url('uploads/website/logo/'.$this->website->web_company_logo);?>"></center><br>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>

                        <hr>
                        
                        <div class="row ">
                            <div class="col-lg-6 ">
                                <p class="h3"><?php echo $this->website->web_company_name;?></p>
                                <address class="fs-15"><?php echo $this->website->web_address;?><br>
                                    <?php echo $this->website->web_support_email;?><br>
                                    <?php echo $this->website->web_support_contact;?>
                                </address> 
                            </div>
                            <div class="col-lg-6 text-right">
                                <p class="h3">Invoice To</p>
                                <address class="fs-15"> Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ctr@example.com 
                                </address> 
                            </div>
                        </div>
                        <hr>

                        <div class="">
                            <p class="mb-1 mt-5"><span class="font-weight-semibold">Order Date : </span> Jun 23, 2019</p>
                            <p class="mb-1"><span class="font-weight-semibold">Order Status : </span>Pending</p>
                            <p><span class="font-weight-semibold">Order ID : </span>#123456</p>
                        </div>

                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th class="text-center "></th>
                                        <th>Product</th>
                                        <th class="text-center">Qnt</th>
                                        <th class="text-right">Unit</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <p class="font-w600 mb-1">Digital Watch</p>
                                            <div class="text-muted d-none d-sm-block">Mens Black digital watch</div>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$34.00</td>
                                        <td class="text-right">$34.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>
                                            <p class="font-w600 mb-1">Women bag</p>
                                            <div class="text-muted d-none d-sm-block">Red Cotton bag for women</div>
                                        </td>
                                        <td class="text-center">2</td>
                                        <td class="text-right">31.00</td>
                                        <td class="text-right">$62.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>
                                            <p class="font-w600 mb-1">Mens shirt</p>
                                            <div class="text-muted d-none d-sm-block">Casual shirt for men</div>
                                        </td>
                                        <td class="text-center">3</td>
                                        <td class="text-right">$35.00</td>
                                        <td class="text-right">$105.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                        <td class="text-right">$205.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <button type="button" class="btn btn-success" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
                                            <button type="button" class="btn btn-info" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
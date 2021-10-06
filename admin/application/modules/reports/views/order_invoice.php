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
                <?php //print("<pre>".print_r($ordInfo,true)."</pre>");?>
                <?php //print("<pre>".print_r($ordPro,true)."</pre>");?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">#<?php echo $ordInfo->ord_reference_no;?></h3>
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
                            <div class="col-lg-6">
                                <p class="h3"><?php echo $this->website->web_company_name;?></p>
                                <address class="fs-15"><?php echo $this->website->web_address;?><br>
                                    <?php echo $this->website->web_support_email;?><br>
                                    <?php echo $this->website->web_support_contact;?>
                                </address> 
                            </div>
                            <div class="col-lg-6">
                                <p class="h3">Invoice To</p>
                                <address class="fs-15">
                                    <?php echo $ordInfo->shippingFirstName.' '.$ordInfo->shippingLastName;?><br>
                                    <?php echo $ordInfo->shippingEmail;?><br> 
                                    <?php echo $ordInfo->shippingAddress;?>,State, City,Postal Code<br>
                                </address> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Order ID : </span><b>#<?php echo $ordInfo->ord_reference_no;?></b>
                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Payment Mode : </span>
                                <?php if($ordInfo->ord_txt_id!=null){ ?>
                                    <?php if($ordInfo->ord_txt_status=='success'){ ?>
                                        Online
                                    <?php }else if($ordInfo->ord_txt_status=='Cancle'){ ?>
                                        Cancle
                                    <?php }else if($ordInfo->ord_txt_status=="failed"){ ?>
                                        Failed
                                    <?php } ?>
                                <?php }else{ ?>
                                    COD
                                <?php } ?> 
                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Status : </span>
                                <?php if($ordInfo->order_status=='InProcess'){ ?>
                                    In process
                                <?php }else if($ordInfo->order_status=='Dispatched'){ ?>
                                    Dispatched
                                <?php }else if($ordInfo->order_status=="Delivered"){ ?>
                                    Delivered
                                <?php }else{ ?>
                                    Waiting
                                <?php } ?>
                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Date : </span> <?php echo date('j M Y, G:i:s A',strtotime($ordInfo->ord_created_date));?>
                            </div>                            
                        </div>
                        <hr>

                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th class="text-center ">S.No.</th>
                                        <th>Product</th>
                                        <th class="text-center">Qnt</th>
                                        <th class="text-right">Unit</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                    <?php foreach($ordPro as $ordKeys=>$ordValue){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $ordKeys+1;?></td>
                                        <td>
                                            <p class="font-w600 mb-1"><?php echo $ordValue->pro_name;?></p>
                                        </td>
                                        <td class="text-center"><?php echo $ordValue->pro_qty;?></td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?php if($ordValue->pro_special_price!=''){echo $ordValue->pro_special_price;}else{echo $ordValue->pro_selling_price;};?></td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?php if($ordValue->pro_special_price!=''){echo $ordValue->pro_special_price;}else{echo $ordValue->pro_selling_price;};?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4" class="font-w600 text-right">GST</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordInfo->ord_gst_sum;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="font-w600 text-right">Delivery Charge</td>
                                        <td class="text-right"><?php if($ordInfo->ord_deliver_charge!=0){echo currency($this->website->web_currency).$ordInfo->ord_deliver_charge;}else{echo "Free";};?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="font-w600 text-right">Payable Amount</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordInfo->ord_total_amounts;?></td>
                                    </tr>
                                    <tr>
                                        <!-- <td colspan="5" class="text-right">
                                            <button type="button" class="btn btn-success" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
                                            <button type="button" class="btn btn-info" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                                        </td> -->
                                        <td colspan="5" class="text-right">

                                            <?php if($ordInfo->order_status!="Waiting"){ ?>
                                                <a href="<?php echo site_url('orders/update/'.$ordInfo->ord_id.'/'.encode("Waiting"));?>" class="btn btn-primary btn-sm"><i class="icon icon-cup"></i> Waiting</a>
                                            <?php } ?>
                                            
                                            <?php if($ordInfo->order_status!="InProcess"){ ?>
                                                <a href="<?php echo site_url('orders/update/'.$ordInfo->ord_id.'/'.encode("InProcess"));?>" class="btn btn-success btn-sm"><i class="icon icon-hourglass"></i> InProcess</a>
                                            <?php } ?>
                                            
                                            <?php if($ordInfo->order_status!="Dispatched"){ ?>
                                                <a href="<?php echo site_url('orders/update/'.$ordInfo->ord_id.'/'.encode("Dispatched"));?>" class="btn btn-info btn-sm"><i class="icon icon-plane"></i> Dispatched</a>
                                            <?php } ?>
                                            
                                            
                                            <?php if($ordInfo->order_status!="Delivered"){ ?>
                                                <a href="<?php echo site_url('orders/update/'.$ordInfo->ord_id.'/'.encode("Delivered"));?>" class="btn btn-warning btn-sm"><i class="icon icon-like"></i> Delivered</a>
                                            <?php } ?>

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
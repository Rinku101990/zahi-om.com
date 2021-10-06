	<link href="<?=base_url();?>../admin/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url();?>../admin/assets/css/tables.css" rel="stylesheet">
	<link href="<?=base_url();?>../admin/assets/css/default.css" rel="stylesheet">
<style>
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    text-align: center;
    border-left-width: 0;
}
.table th, .text-wrap table th {
    color: #242338;
    text-transform: uppercase;
    font-size: small;
    font-weight: 400;
}
.table th, .table td {
    font-weight: 400;
    padding: 15px;
    color: #333;
    font-size: 14px;   
    vertical-align: top;
}
label {  
    display: inline-flex;
    font-size: 14px;
    font-weight: 400;
    color: #626262;
}
div#example_length {
    margin-top: 10px;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    margin: -3px 5px 0 5px;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
    margin-top: -7px;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: 8px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #2205bf;
    border-color: #2205bf;
}
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    color: #3c4858;
    line-height: 1.25;
    background-color: #fff;
    border: 1px solid #eaf0f7;
    font-size: 0.875rem;
}
span#select2-sp_pid-oc-container {
    line-height: 40px;
}
span.select2-selection.select2-selection--single {
      height: 40px;
      border: 1px solid #e8e7ea;
       border-radius: 4px !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 35px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 40px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
}
span.select2.select2-container.select2-container--default {
    width: 100% !important;
    height: 40px;
}.input-icon {
    font-size: 15px;
    position: absolute;
    width: 50px;
    height: 50px;
    line-height: 30px;
    display: block;
    top: 36px;
    left: 11px;
    text-align: center;
    color: #9fa1a2;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    z-index: 2;
}
</style>

		
		<section class="main_content_area my_account">
				<div class="container">
	                <div class="account_dashboard">
	                    <div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="breadcrumb_content">
	         <div class="breadcrumb_header">
	  <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> Manage Order Invoice
</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title pull-l">
	                            <h3>Order Invoice
</h3>
	                        </div>
					<div class="action btn-group-scroll pull-right">
                        
                
                                </div>
							
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">




 
<div class="col-md-12 special_list" >
<h5 class="cards-title ">#<?=$order->ord_reference_no;?></h5>
<hr>
<div class="card-body">
                        
                       <!--  <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8"><br>
                                <center><img src="<?=base_url('../admin/uploads/website/logo/').$this->website->web_company_logo;?>" title="<?=$this->website->web_company_name;?>"></center><br>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>

                        <hr> -->
                        
                        <div class="row ">
                            <div class="col-lg-6">
                                <p class="h3"><?=$this->website->web_company_name;?></p>
                                <address class="fs-15" style="font-weight: 500;font-size: 14px;"><?=$this->website->web_address;?><br>
                                    <?=$this->website->web_support_email;?><br>
                                   <?=$this->website->web_support_contact;?>                             </address> 
                            </div>
                           <!--  <div class="col-lg-6">
                                <p class="h3">Invoice To</p>
                                <address class="fs-15">
                                    Manish Kumar<br>
                                    manish@gmail.com<br> 
                                    Agra,State, City,Postal Code<br>
                                </address> 
                            </div> -->
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Order ID : </span><b>#<?=$order->ord_reference_no;?></b>
                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Payment Mode : </span>
                               <?=$order->ord_pay_mode;?>
                                 
                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Status : </span>
                                 <?php if($order->order_status=='Delivered'){ ?>
                                                               Delivered
                                                            <?php }elseif($order->order_status=='Pending'){ ?>
                                                               Pending
                                                     <?php }elseif($order->order_status=='Cancel'){ ?>Cancel
                                                            <?php }else if($order->order_status=='Dispatched'){ ?>
                                                               Dispatched
                                                            <?php }else if($order->order_status=='InProcess'){ ?>
                                                               InProcess
                                                            <?php }else{ ?>
                                                                Waiting
                                                            <?php } ?>
                                                            </div>
                            <div class="col-lg-3">
                                <span class="font-weight-semibold">Date : </span>   <?=date('d M Y h:i A',strtotime($order->ord_create));?>                           </div>                            
                        </div>
                        <hr>

                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th class="text-center ">S.No.</th>
                                        <th>Product</th>
                                         <th>Model No.</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Color</th>
                                         <th class="text-center">Dimensions</th>
                                       <!--  <th class="text-center">GST</th> -->
                                      
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                                                        <tr>
                                        <td class="text-center">1.</td>
                                        <td>
                                            <p class="font-w600 mb-1"><?=$order->pro_name;?></p>
                                        </td>
                                           <td>
                                            <?php echo model($order->pro_id);?>
                                        </td>
                                         <td class="text-center"><?=$order->pro_size;?></td>
                                          <td class="text-center"><?=$order->pro_color;?></td>
                                           <td class="text-center"><?=unserialize($order->pro_serialize);?></td>
                                         <!--   <td class="text-center"><?=currency($this->website->web_currency);?><?=$order->pro_gst;?></td> -->
                                        <td class="text-center"><?=$order->pro_qty;?></td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$order->pro_price;?></td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$total=$order->pro_price*$order->pro_qty;?></td>
                                    </tr>
                                    <?php if(!empty($order->pro_discount_value)){?>
                                      <tr>
                                        <td colspan="6" class="font-w600 text-right">Qty Discount</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$discount=$order->pro_discount_value;?></td>
                                    </tr>
                                <?php }else{$discount=0;}?>
                                 <?php if(!empty($order->pro_coupon)){?>
                                     <tr>
                                        <td colspan="8" class="font-w600 text-right">Coupon Discount</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$coupon=$order->pro_coupon;?></td>
                                    </tr>
                                     <?php }else{$coupon=0;}?>
                                     <!--  <tr>
                                        <td colspan="6" class="font-w600 text-right">GST</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$gst=$order->pro_gst;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="font-w600 text-right">Delivery Charge</td>
                                        <td class="text-right">
                          <?php if(empty($order->ord_deliver_charge)){echo'Free';
                          $deliver_charge=0;}else{ ?>
               <?=currency($this->website->web_currency);?>
              <?php $delivery_count=delivery_count($order->ord_id);
                echo $deliver_charge=round($order->ord_deliver_charge/$delivery_count,2);}?></td>
                                    </tr> -->
                                    <tr style="border-bottom: 1px solid #eee;">
                                        <td colspan="8" class="font-w600 text-right">Payable Amount</td>
                                        <td class="text-right"><?=currency($this->website->web_currency);?><?=$total;?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                       
                    </div>    
                    </div>
                    <!-- table-wrapper -->
</div>

	                                    
</div>
</div>
	                                
	                                
	                               
	                               
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>       	
            </section>


 

 
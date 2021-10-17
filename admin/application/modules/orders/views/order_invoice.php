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
                  <!--  <div class="row">
                     <div class="col-lg-2"></div>
                     <div class="col-lg-8"><br>
                         <center><img src="<?php echo site_url('uploads/website/logo/'.$this->website->web_company_logo);?>"></center><br>
                     </div>
                     <div class="col-lg-2"></div>
                     </div>
                     
                     <hr> -->
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
                           +<?php echo code($ordInfo->shippingCountry).''.$ordInfo->shippingNumber;?><br> 
                           <?php if(!empty($ordInfo->shippingAddress)){ ?>
                           <?php echo "Address: ".$ordInfo->shippingAddress;?>
                           <?php } ?>
                           <?php if(!empty($ordInfo->Country)){ ?>
                           <?php echo "Address: ".$ordInfo->Country;?>, <?php echo $ordInfo->State;?>, <?php echo $ordInfo->City;?>, <?php echo $ordInfo->Zipcode;?>
                           <?php } ?>
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
                        <?php if($ordInfo->ord_pay_mode=='ONLINE'){ ?>
                        ONLINE
                        <?php }else{ ?>
                        COD
                        <?php } ?> 
                     </div>
                     <div class="col-lg-3">
                        <span class="font-weight-semibold">Status : </span>
                        <?php if($ordInfo->order_status=='InProcess'){ ?>
                        In process
                        <?php }elseif($ordInfo->order_status=='Pending'){ ?>
                        Pending
                        <?php }elseif($ordInfo->order_status=='Cancel'){ ?>
                        Cancel
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
                              <th>Model No.</th>
                              <th class="text-center">Color</th>
                              <th class="text-center">Size</th>
                              <th class="text-center">Dimensions</th>
                              <th class="text-center">Qnt</th>
                              <th class="text-right">Unit</th>
                              <th class="text-right">Amount</th>
                              <th class="text-right">Action</th>
                           </tr>
                           <?php foreach($ordPro as $ordKeys=>$ordValue){ ?>
                           <tr>
                              <td class="text-center"><?php echo $ordKeys+1;?></td>
                              <td>
                                 <p class="font-w600 mb-1"><?php echo $ordValue->pro_name;?></p>
                              </td>
                              <td>
                                 <p class="font-w600 mb-1"><?php echo model($ordValue->pro_id);?></p>
                              </td>
                              <td class="text-center"><?php echo $ordValue->pro_color;?></td>
                              <td class="text-center"><?php echo $ordValue->pro_size;?></td>
                              <td class="text-center"><?=unserialize($ordValue->pro_serialize);?></td>
                              <td class="text-center"><?php echo $ordValue->pro_qty;?></td>
                              <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordValue->pro_price; /*if($ordValue->pro_special_price!=''){echo $ordValue->pro_special_price;}else{echo $ordValue->pro_selling_price;};*/ ?></td>
                              <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordValue->pro_price;/* if($ordValue->pro_special_price!=''){echo $ordValue->pro_special_price;}else{echo $ordValue->pro_selling_price;};*/ ?></td>
                              <td class="text-right">
                                 <?php if(!empty($cancelExchange)){ foreach($cancelExchange as $canExc){ 
                                    if($canExc->c_pro_id==$ordValue->pro_id){ ?>
                                 <?php if($canExc->return_type=='1'){ ?>
                                    <?php if($canExc->c_response!=''){ ?>
                                       <a href="javascript:void(0);" style="color: #ca1212;" class="returnView" returnId="<?php echo $canExc->c_id;?>"  url="<?=base_url();?>"><b><?php echo $canExc->c_status; ?></b></a><br>
                                    <?php }else{ ?>
                                       <a href="javascript:void(0);" style="color: #ca1212;" class="returnView" returnId="<?php echo $canExc->c_id;?>"  url="<?=base_url();?>">Cancellation request</a><br>
                                    <?php } ?>
                                 <?php }else if($canExc->return_type=='2'){ ?>
                                       <?php if($canExc->c_response!=''){ ?>
                                          <a href="javascript:void(0);" style="color: #ca1212;" class="returnView" returnId="<?php echo $canExc->c_id;?>"  url="<?=base_url();?>"><b><?php echo $canExc->c_status; ?></b></a><br>
                                       <?php }else{ ?>
                                          <a href="javascript:void(0);" style="color: #ca1212;" class="returnView" returnId="<?php echo $canExc->c_id;?>"  url="<?=base_url();?>">Exchange request</a><br>
                                       <?php } ?>
                                 <?php }else if($canExc->return_type=='3'){ ?>
                                       <?php if($canExc->c_response!=''){ ?>
                                          <a title="cancel" class="cancel-item" href="javascript:void(0);" style="color: #ca1212;"  opid="<?=encode($ordValue->pro_id);?>" vndid="<?=encode($ordValue->ord_vendors);?>" ordid="<?=encode($ordValue->ord_id);?>"><b>Cancelled</b></a><br>
                                       <?php }else{ ?>
                                          <a title="cancel" class="cancel-item" href="javascript:void(0);" style="color: #ca1212;"  opid="<?=encode($ordValue->pro_id);?>" vndid="<?=encode($ordValue->ord_vendors);?>" ordid="<?=encode($ordValue->ord_id);?>">Cancelled</a><br>
                                       <?php } ?>
                                   
                                 <?php } } } }else{ ?>
                                    <center><a title="cancel" class="cancel-item CancelItemFromAdmin" href="javascript:void(0);" style="color: #ca1212;"  opid="<?=encode($ordValue->pro_id);?>" vndid="<?=encode($ordValue->ord_vendors);?>" ordid="<?=encode($ordValue->ord_id);?>"><b>Cancel</b></i></a></center>
                                 <?php } ?>
                              </td>
                           </tr>
                           <?php } ?>
                           <tr>
                              <td colspan="9" class="font-w600 text-right">Coupon Code/Coupon Amount</td>
                              <td class="text-right"><?php if(!empty($ordInfo->ord_coupon_code)){echo $ordInfo->ord_coupon_code;}else{echo "--";} ?>/<?php if(!empty($ordInfo->ord_coupon_code)){echo $ordInfo->ord_coupon_amount;}else{echo "--";}?></td>
                           </tr>
                           <tr>
                              <td colspan="9" class="font-w600 text-right">VAT</td>
                              <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordInfo->ord_gst_sum;?></td>
                           </tr>
                           <tr>
                              <td colspan="9" class="font-w600 text-right">Delivery Charge</td>
                              <td class="text-right"><?php if($ordInfo->ord_deliver_charge!=0){echo currency($this->website->web_currency).$ordInfo->ord_deliver_charge;}else{echo "Free";};?></td>
                           </tr>
                           <tr>
                              <td colspan="9" class="font-w600 text-right">Payable Amount</td>
                              <td class="text-right"><?=currency($this->website->web_currency);?><?php echo $ordInfo->ord_total_amounts;?></td>
                           </tr>
                           <tr>
                              <!-- <td colspan="5" class="text-right">
                                 <button type="button" class="btn btn-success" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
                                 <button type="button" class="btn btn-info" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                                 </td> -->
                              <td colspan="10" class="text-right">
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

<div class="modal fade show" id="returnPolicyModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
   <div class="modal-dialog" role="document" style="max-width: 700px;width: 700px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="item_title">Item Return</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
               <div id="ItemReturnResponse"></div>
                  <form id="ItemReturnForm" >
                     <input type="hidden" id="cancel_pid" name="cancel_pid">
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="control-label">Reason <span class="required">*</span></label>
                        </div>
                        <div class="col-sm-9">
                           <div class="form-group">
                              <input type="text" name="reason" class="reason form-control" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="control-label">Comments <span class="required">*</span></label>
                        </div>
                        <div class="col-sm-9">
                           <div class="form-group">
                              <input type="text" name="comments" class="comments form-control" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="control-label">Status <span class="required">*</span></label>
                        </div>
                        <div class="col-sm-9">
                           <div class="form-group">
                              <input type="text" name="status" class="status form-control" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="control-label">Message <span class="required">*</span></label>
                        </div>
                        <div class="col-sm-9">
                           <div class="form-group">
                              <textarea rows="6"class="form-control itemMessage" name="message" placeholder="Message"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <span id="messageItem"></span>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="control-label">Action</label>
                        </div>
                        <div class="col-sm-9">
                           <div class="form-group">
                           <select class="form-control" name="action" >
                                 <option value="Approved">Approved</option>
                                 <option value="Decline">Decline</option>
                                 <option value="Cancel">Cancel</option>
                           </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pull-right">
                        <button type="button" class="btn btn-theme-round response_submit " style="background:#029794;padding: 3px 27px;font-size: 14px;text-transform: uppercase;">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="CancelItemFromAdminModel modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
   <div class="modal-dialog modal-md add-canecl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cancel Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 2px;
               margin-top: 0; margin-right: 0px;">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="CancelItemFromAdminResponse"></div>
            <form id="CancelItemFromAdminForm" >
               <input type="hidden" id="cancel_custid" name="cancel_custid" value="<?php echo $ordInfo->cust_id;?>">
               <input type="hidden" id="cancel_ordid" name="cancel_ordid" >
               <input type="hidden" id="cancel_vndid" name="cancel_vndid" >
               <input type="hidden" id="cancel_opid" name="cancel_opid" >
               <input type="hidden" name="return_type" value="3">
               <div class="row">
                  <div class="col-sm-3">
                     <label class="control-label">Comments <span class="required">*</span></label>
                  </div>
                  <div class="col-sm-9">
                     <div class="form-group">
                        <textarea rows="6"class="form-control" name="comments" id="reason_comment" placeholder="Comments"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <span id="msgcomment"></span>
                  </div>
               </div>
               <div class="col-md-3 pull-right">
                  <button type="button" class="btn btn-theme-round CancelSubmitAdminForm" style="background:#029794;padding: 3px 6px;font-size: 14px;text-transform: uppercase;color:#fff">Cancel Item</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
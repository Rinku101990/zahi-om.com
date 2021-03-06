<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Make Order Details Zahi">
      <meta name="description" content="Make Order Details Zahi">
      <meta name="author" content="Make Order Details Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
     
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Make Order Details Zahi</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>





<div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Order Details</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Order Details</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
                      <?php $this->load->view('account/sidebar.php');?>
                     <div class="col-lg-9">
                        <div class="main-content">
                       <!-- Page title -->
                   
                    <div class="form-box bg-white">
                            <div class="form-box-title px-3 py-2">
                                 Order Details
                            </div>
                            <div class="form-box-content p-3">
                    
                             <div class="table-responsive">

                                           
                                            <table class="table table-bordered table-hover">

                                                <thead>

                                                    <tr>

                                                        <th class="text-center">Order No</th>

                                                        <th class="text-center">Pay Amount</th>

                                                        <th class="text-center">Paid VAT</th>

                                                        <th class="text-center">Date</th>

                                                        <th class="text-center">Payment</th>

                                                        <th class="text-center">Status</th>


                                                    </tr>

                                                </thead>

                                                <tbody>
                <?php //print("<pre>".print_r($Order,true)."</pre>");?>
                                                    <?php $i=0; if($order != false){ $i++; ?>

                                                    <tr>

                                                        <td class="text-center">#<?=$order->ord_reference_no?></td>

                                                        <td class="text-center new_price"><?=currency($this->website->web_currency);?><?php if($order->ord_coupon_code != NULL)echo $this->cart->format_number($order->ord_coupon_amount); else echo $this->cart->format_number($order->ord_total_amounts);?>
                                                        </td>

                                                        <td class="text-center new_price"><?=currency($this->website->web_currency);?><?php echo $this->cart->format_number($order->ord_gst_sum);?></td>

                                                        <td class="text-center"><?php echo date('F,d Y H:i:s A',strtotime($order->ord_created_date));?></td>

                                                        <?php if($order->ord_pay_mode=="COD"){ ?>
                                                        <td class="text-center"><span class="badge badge-success-light badge-md">Cash On Delivery<span></td>
                                                        <?php }else{ ?>
                                                        <td class="text-center"><span class="badge badge-primary-light badge-md">Online Payment<span></td>
                                                        <?php } ?>

                                                        <?php if($order->order_status=="Waiting"){ ?>
                                                        <td class="text-center"><span class="badge badge-warning-light badge-md">Waiting<span></td>
                                                        <?php } ?>

                                                        <?php if($order->order_status=="InProcess"){ ?>
                                                        <td class="text-center"><span class="badge badge-success-light badge-md">InProcess<span></td>
                                                        <?php } ?>

                                                        <?php if($order->order_status=="Dispatched"){ ?>
                                                        <td class="text-center"><span class="badge badge-info-light badge-md">Dispatched<span></td>
                                                        <?php } ?>

                                                        <?php if($order->order_status=="Delivered"){ ?>
                                                        <td class="text-center"><span class="badge badge-primary-light badge-md">Delivered<span></td>
                                                        <?php } ?>
                                                        
                                                      


                                                    </tr>

                                                    <?php }else{ ?>

                                                    <tr>

                                                        <td class="text-center" colspan="5">You do not have any transactions!</td>

                                                    </tr>

                                                    <?php } ?>

                                                </tbody>

                                            </table>

                                            <h4>Your Product Details</h4>

                                            <table class="table table-bordered table-hover">

                                                <thead>

                                                    <tr>

<th class="text-center">Img</th>
                                                        <th class="text-center">Sleeve</th>

                                                        

                                                        <th class="text-center">Fabric</th>
                                                        <th class="text-center">Color</th>
                                                        <th class="text-center">Size</th>
                                                  
                                                        <th class="text-center">Qty</th>
                                               

                                                        <th class="text-center new_price">Price(<?=currency($this->website->web_currency);?>)</th>
                                                         <th class="text-center">Amount</th>
                                                        <!--  <th class="text-center">&nbsp;</th>
 -->
                                                    

                                                       
                                                      

                                                    </tr>

                                                </thead>

                                                <tbody>
                <?php //print("<pre>".print_r($OrderDetails,true)."</pre>");?>
                                                    <?php if($OrderDetails != false){ $i=0; foreach($OrderDetails as $row){  ?>

                                                    <tr>

  <td class="text-center"><img src="<?=$row->sl_img;?>" style="width: 50px;height: 60px;object-fit: contain;" /></td>

                                                        <td class="text-center " style="    width: 27%;"><?=$row->sl_name;?></td>

                                                        <td class="text-center"><img src="<?=$row->fb_img;?>" style="width: 50px;height: 60px;object-fit: contain;" /></td>

                                                        <td class="text-center"><img src="<?=$row->cl_img;?>" style="width: 50px;height: 60px;object-fit: contain;" /></td>
                                          
                                                      
                                                        
<td class="text-center"><p style="font-size: 12px;font-weight: 600;">
                        Shoulder :  <?=$row->shoulder;?> Inch<br/>
                        Bust :  <?=$row->bust;?> Inch<br/>
                        Waist :  <?=$row->waist;?> Inch<br/>
                        Hips :  <?=$row->hips;?> Inch<br/>
                        Length :  <?=$row->length;?> Inch</p></td>
                                                   

                                                        <td class="text-center"><?=$row->qty?></td>


                                                       
                                                            <td class="text-center new_price"><?=currency($this->website->web_currency);?><?=$this->cart->format_number($price=$row->sl_price);?></td>
                                                        
  <td class="text-center new_price"><?=currency($this->website->web_currency);?>
  <?php $item_total=$price*$row->qty;
      // $discount=discount($row->pro_id,$item_total,$row->pro_qty);
         $item_sub_total=$item_total;
         echo $this->cart->format_number($item_sub_total);?>
             <br>
<span style="color: #999999;font-size: 13px;">
    <?php //if(!empty($discount)){ echo "discount ".discount_per($row->pro_id)."%";} ?></span>
         </td>
        <!--  <td style="padding: 15px 7px" class="cancel<?=encode($row->pro_id);?>" >
             <?php $cencel_item=cancel_item($row->pro_id,$order->ord_id);
             if($cencel_item=='1'){?><p style="line-height: 14px;color: #2874f0;"><b>Cancellation Request</b></p><?php }else{?>
            <a title="Cancel this item" class="cancel-item CancelItem" href="javascript:void(0);"  pid="<?=encode($row->pro_id);?>" vndid="<?=encode($row->ord_vendors);?>"><i class="fa fa-trash-o"></i> Cancel</a>
        <?php }?> -->


       </td>
                                                        

                                                       

                                                    
                                                       

                                                    </tr>

                                                    <?php } }else{ ?>

                                                    <tr>

                                                        <td class="text-center" colspan="6">You do not have any transactions!</td>

                                                    </tr>

                                                    <?php } ?>

                                                </tbody>

                                            </table>

                                        </div>    
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


        <!-- Edit Shopping  Modal -->
  <div class="Cancel_Item_Model modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
                                    <div class="modal-dialog modal-md add-canecl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cancel Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 2px;
    margin-top: 0; margin-right: 0px;">
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="CancelItemResponse"></div>
<form id="CancelItemForm" >
<input type="hidden" id="cancel_ordid" name="cancel_ordid" value="<?=encode($order->ord_id);?>" >
<input type="hidden" id="cancel_vndid" name="cancel_vndid" >
<input type="hidden" id="cancel_pid" name="cancel_pid" >
 
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="control-label">Reason <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                
                                <select class="form-control reason" name="reason" >
                                 ?>
                                 <option value="">-Select-</option>
                                  <?php if($cancel_reason == TRUE){
                                    foreach ($cancel_reason as $cr_value) {?>
                                     <option value="<?=$cr_value->ocr_id;?>"><?=$cr_value->ocr_title;?></option>
                                 <?php    }
                                  }
                                       ?>                        

                                              </select>
                                          
                                                            </div>

                                                        </div>
                                                         <div class="col-sm-12">
                                                        <span id="msgreason"></span>
                                                    </div>
                                                    </div>
                                                    
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
                                                        <button type="button" class="btn btn-theme-round Cancel_submit " style="background:#029794;padding: 3px 27px;font-size: 14px;text-transform: uppercase;">Submit</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
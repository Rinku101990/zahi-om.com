<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="My Order Zahi">
      <meta name="description" content="My Order Zahi">
      <meta name="author" content="My Order Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>My Order Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;"> Purchase History</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#"> Purchase History</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile ">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
             <?php $this->load->view('account/sidebar.php');?>

            <div class="col-lg-9 col-md-8">
                <div class="main-content">
                    <div class="form-box-title px-3 py-2">
                                 My Order
                            </div>
                   

                    <!-- Order history table -->
                    <div class="card no-border">
                        <div>
                            <table class="table table-sm table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Pay Amount</th>
                                         <th>VAT Amount</th>
                                          <th>Mode</th>
                                        <th>Status</th>
                                         <th>Order Date</th>
                                       
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; if(!empty($order)){
                                    foreach ($order as $order_list) {
                                    if($order_list->order_status=='Waiting'){
                                        $class="warning";                                      
                                        $value="Waiting";
                                        }elseif($order_list->order_status=='Pending'){
                                        $class="danger";                                      
                                        $value="Pending";
                                         }elseif($order_list->order_status=='Cancel'){
                                        $class="danger";                                      
                                        $value="Cancel";
                                        }else if($order_list->order_status=='InProcess'){
                                        $class="success";                                      
                                        $value="InProcess";
                                        }else if($order_list->order_status=='Dispatched'){
                                        $class="info";                                      
                                        $value="Dispatched";
                                        }else {
                                       $class="primary";                                      
                                        $value="Delivered";
                                        }?>                                   
                                    <tr role="row" class="odd">
                                       <!--  <td class="sorting_1" ><?=$i;$i++;?>.</td> -->
                                        <td > #<?=$order_list->ord_reference_no;?></td>
                                        <td class="new_price"><?=currency($this->website->web_currency);?><?=$this->cart->format_number($order_list->ord_total_amounts);?></td>
                                          <td class="new_price"><?=currency($this->website->web_currency);?><?=number_format($order_list->ord_gst_sum);?></td>                                        
                                        <td><?php if($order_list->ord_pay_mode=='COD'){?><span class="badge badge-success-light badge-md">Cash On Delivery </span><?php }else{?><span class="badge badge-primary-light badge-md">
                                         Online Payment<?php }?></span> 

                                           </td>

                                        <td align="center">
                                         <a href="javascript:void(0);" >
                                                <span class="badge badge-<?=$class;?>-light badge-md"> <?=$value;?></span></a>
                                        </td>
                                        <td><?=date('d M, Y',strtotime($order_list->ord_created_date));?><br/>
                                        <?=date('h:i:s',strtotime($order_list->ord_created_date));?> </td>
                                       
                                        <td align="center" style="width: 30px;">

                                            <a href="<?=base_url('account/order-details/').encode($order_list->ord_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View Details"><i class="fa fa-eye"></i></a>
                                            


   
                                        </td>
                                    </tr>
                                <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br/>
                    <?php if($make_order==TRUE){?>
                    <div class="form-box-title px-3 py-2">
                                 Make Design Order
                            </div>
                   

                    <!-- Order history table -->
                    <div class="card no-border">
                        <div>
                            <table class="table table-sm table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Pay Amount</th>
                                         <th>VAT Amount</th>
                                          <th>Mode</th>
                                        <th>Status</th>
                                         <th>Order Date</th>
                                       
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; if(!empty($make_order)){
                                    foreach ($make_order as $order_list) {
                                    if($order_list->order_status=='Waiting'){
                                        $class="warning";                                      
                                        $value="Waiting";
                                        }else if($order_list->order_status=='InProcess'){
                                        $class="success";                                      
                                        $value="InProcess";
                                        }else if($order_list->order_status=='Dispatched'){
                                        $class="info";                                      
                                        $value="Dispatched";
                                        }else {
                                       $class="primary";                                      
                                        $value="Delivered";
                                        }?>                                   
                                    <tr role="row" class="odd">
                                       <!--  <td class="sorting_1" ><?=$i;$i++;?>.</td> -->
                                        <td > #<?=$order_list->ord_reference_no;?></td>
                                        <td class="new_price"><?=currency($this->website->web_currency);?><?=number_format($order_list->ord_total_amounts);?></td>
                                          <td class="new_price"><?=currency($this->website->web_currency);?><?=number_format($order_list->ord_gst_sum);?></td>                                        
                                        <td><?php if($order_list->ord_pay_mode=='COD'){?><span class="badge badge-success-light badge-md">Cash On Delivery </span><?php }else{?><span class="badge badge-primary-light badge-md">
                                         Online Payment<?php }?></span> 

                                           </td>

                                        <td align="center">
                                         <a href="javascript:void(0);" >
                                                <span class="badge badge-<?=$class;?>-light badge-md"> <?=$value;?></span></a>
                                        </td>
                                        <td><?=date('d M, Y',strtotime($order_list->ord_created_date));?><br/>
                                        <?=date('h:i:s',strtotime($order_list->ord_created_date));?> </td>
                                       
                                        <td align="center" style="width: 30px;">

                                            <a href="<?=base_url('account/make-order-details/').encode($order_list->ord_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View Details"><i class="fa fa-eye"></i></a>
                                            


   
                                        </td>
                                    </tr>
                                <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php }?>

                  
                </div>
            </div>
        </div>
    </div>
</section>



            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
<?php  $this->load->view('include/header');
   $this->load->view('include/left-sidebar');
?>
<style>
   #pagination{
      margin: 40 40 0;
   }
   ul.tsc_pagination li a
   {
      border:solid 1px;
      border-radius:3px;
      -moz-border-radius:3px;
      -webkit-border-radius:3px;
      padding:6px 9px 6px 9px;
   }
   ul.tsc_pagination li
   {
      padding-bottom:1px;
   }
   ul.tsc_pagination li a:hover,ul.tsc_pagination li a.current
   {
      color:#FFFFFF;
      box-shadow:0px 1px #EDEDED;
      -moz-box-shadow:0px 1px #EDEDED;
      -webkit-box-shadow:0px 1px #EDEDED;
   }
   ul.tsc_pagination
   {
      margin:4px 0;
      padding:0px;
      height:100%;
      overflow:hidden;
      font:12px 'Tahoma';
      list-style-type:none;
   }
   ul.tsc_pagination li
   {
      float:left;
      margin:0px;
      padding:0px;
      margin-left:5px;
   }
   ul.tsc_pagination li a
   {
      color:black;
      display:block;
      text-decoration:none;
      padding:7px 10px 7px 10px;
   }
   
   ul.tsc_pagination li a
   {
      color:#0A7EC5;
      border-color:#8DC5E6;
      background:#F8FCFF;
   }
   ul.tsc_pagination li a:hover,ul.tsc_pagination li a.current
   {
      text-shadow:0px 1px #388DBE;
      border-color:#3390CA;
      background:#58B0E7;
      background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
      background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
   }
</style>
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
                  <div class="card-title">Orders List</div>
                  <div class="card-options">
                     <a href="<?php echo site_url('orders/export_orders');?>" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-download-cloud "></i> Download Orders </a>
                     <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> 
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive product-datatable">
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <center>
                                 <form action="" method="post">
                                    <select name="seller" class="select2 form-control"  style="width: 180px;display: inline-block;">
                                       <option value="">Select Seller</option>
                                       <?php if(!empty($seller)){
                                          foreach ($seller as $slval){?>                   
                                       <option value="<?php echo $slid=$slval->vnd_id;?>"<?php if(@$_REQUEST['seller']==$slid)echo'selected';?>><?php echo $slval->vnd_name;?></option>
                                       <?php }}?>
                                    </select>
                                    <label style="display: inline-block; width:10px;">&nbsp; </label>
                                    <select name="status" class=" form-control"  style="width: 180px;display: inline-block;">
                                       <option value="">Select Status</option>
                                       <option value="Pending" <?php if(@$_REQUEST['status']=='Pending')echo'selected';?>>Pending</option>
                                       <option value="Waiting"<?php if(@$_REQUEST['status']=='Waiting')echo'selected';?>>Waiting</option>
                                       <option value="InProcess"<?php if(@$_REQUEST['status']=='InProcess')echo'selected';?>>InProcess</option>
                                       <option value="Dispatched" <?php if(@$_REQUEST['status']=='Dispatched')echo'selected';?>>Dispatched</option>
                                       <option value="Delivered" <?php if(@$_REQUEST['status']=='Delivered')echo'selected';?>>Delivered</option>
                                       <option value="Cancel" <?php if(@$_REQUEST['status']=='Cancel')echo'selected';?>>Cancel</option>
                                    </select>
                                    <label style="display: inline-block; width:50px;">From </label>
                                    <input type="text" name="from" class="form-control input-group date valid"  id="sp_start_date" autocomplete="off" placeholder="From Date " value="<?=@$_REQUEST['from'];?>" style="width: 150px; display: inline-block; padding-left: 27px;" aria-invalid="false">
                                    <label style="display: inline-block;width:50px;">To </label>
                                    <input type="text" name="to" class="form-control input-group date valid" id="sp_start_date" autocomplete="off" placeholder="To Date " value="<?=@$_REQUEST['to'];?>" style="width: 150px;display: inline-block; padding-left: 27px;" aria-invalid="false">
                                    <input type="submit" value="Search" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0" style="margin-left:20px; width: 100px;display: inline-block;">
                                 </form>
                              </center>
                              <br>&nbsp;
                              <table class="table table-striped table-hover" >
                                 <thead>
                                    <tr role="row">
                                       <th class="w-15p sorting_asc" tabindex="0" ar>Sr. No.</th>
                                       <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" style="width: 70px !important;">Order ID</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Seller</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Customer</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Paid Amount</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Product</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Special Price</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Original Price</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Purchase Price</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Coupon Code</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Coupon Amount</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">QTY</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Color</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Size</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 45px !important;">Dimensions</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 60px !important;">Payment</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 50px !important;">Status</th>
                                       <th class="wd-20p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 130px;">Created</th>
                                       <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 60px !important;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php //print("<pre>".print_r($ordlist,true)."</pre>");?>
                                    <?php $i=1; if(!empty($ordlist)){ foreach($ordlist as $order){ ?>
                                    <tr role="row">
                                       <td><?=$i;$i++;?></td>
                                       <td class="sorting_1" align="left">#<a href="<?php echo site_url('orders/invoice/'.$order->ord_id);?>" ><?php echo $order->ord_reference_no;?></a></td>
                                       <td>
                                          <?php echo getVnd_name($order->ord_vendors);?>
                                       </td>
                                       <td>
                                          <a href="<?php echo site_url('user/profile/'.$order->cust_id);?>" target="_blank"><?php echo $order->cust_fname.' '.$order->cust_lname;?></a>
                                       </td>
                                       <td><?=currency($this->website->web_currency);?><?php echo $order->ord_total_amounts;?></td>
                                       <td>
                                          <?php echo $order->pro_name;?>
                                       </td>
                                       <td>
                                          <?php if(!empty($order->pro_special_price)) {
                                             echo ''.$order->pro_special_price;
                                             } else{   echo '0';}?>
                                       </td>
                                       
                                       <td>
                                          <?php echo $order->pro_selling_price;?>
                                       </td>
                                       <td>
                                          <?php if(!empty($order->pro_special_price)) {
                                             echo ''.$order->pro_special_price;
                                             } else{   echo ''.$order->pro_selling_price;}?>
                                       </td>
                                       <td><?php if(!empty($order->ord_coupon_code)){echo $order->ord_coupon_code;}else{echo "NA";};?></td>
                                       <td><?php if(!empty($order->ord_coupon_code)){echo $order->ord_coupon_amount;}else{echo "NA";}?></td>
                                       <td>
                                          <?php echo $order->pro_qty;?>
                                       </td>
                                       <td>
                                          <?php echo $order->pro_color;?>
                                       </td>
                                       <td>
                                          <?php echo $order->pro_size;?>
                                       </td>
                                       <td>
                                          <?php echo unserialize($order->pro_serialize);?>
                                       </td>
                                       <td align="center">
                                          <?php if($order->ord_pay_mode=='ONLINE'){ ?>
                                          <span class="badge badge-primary-light badge-md">Online Payment</span>
                                          <?php }else{ ?>
                                          <span class="badge badge-success-light badge-md">Cash On Delivery</span>
                                          <?php } ?>                                                            
                                       </td>
                                       <td align="center">
                                          <?php if($order->order_status=='Delivered'){ ?>
                                          <span class="badge badge-primary-light badge-md">Delivered</span>
                                          <?php }elseif($order->order_status=='Pending'){ ?>
                                          <span class="badge badge-danger-light badge-md">Pending</span>
                                          <?php }elseif($order->order_status=='Cancel'){ ?>
                                          <span class="badge badge-danger-light badge-md">Cancel</span>
                                          <?php }else if($order->order_status=='Dispatched'){ ?>
                                          <span class="badge badge-info-light badge-md">Dispatched</span>
                                          <?php }else if($order->order_status=='InProcess'){ ?>
                                          <span class="badge badge-success-light badge-md">InProcess</span>
                                          <?php }else{ ?>
                                          <span class="badge badge-warning-light badge-md">Waiting</span>
                                          <?php } ?>
                                       </td>
                                       <td align="center"><?php echo date('j M Y G:i A',strtotime($order->ord_created_date));?></td>
                                       <td align="center">
                                          <a href="<?php echo site_url('orders/invoice/'.$order->ord_id);?>" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                          <!--  <a href="<?php echo site_url('orders/remove/'.$order->ord_id);?>" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o"></i></a> -->
                                       </td>
                                    </tr>
                                    <?php } }else{ ?>
                                    <tr role="row">
                                       <td class="sorting_1" align="center"  colspan="7">no order found!</td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                              <div id="pagination">
                                 <ul class="tsc_pagination">
                                 <?php foreach ($links as $link) {echo $link;} ?>
                                 </ul>
                              </div>
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
<script src="<?=base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/nextprev.js"></script>
<script src="<?=base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url();?>assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>
<script src="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/js/vendors/circle-progress.min.js"></script>
<script src="<?=base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="<?=base_url();?>assets/plugins/clipboard/clipboard.min.js"></script>
<script src="<?=base_url();?>assets/plugins/clipboard/clipboard.js"></script>
<script src="<?=base_url();?>assets/plugins/prism/prism.js"></script>
<script src="<?=base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?=base_url();?>assets/plugins/jquery-nice-select/js/jquery.nice-select.js"></script>
<script src="<?=base_url();?>assets/plugins/jquery-nice-select/js/nice-select.js"></script>
<script src="<?=base_url();?>assets/plugins/p-scroll/p-scroll.js"></script>
<script src="<?=base_url();?>assets/plugins/p-scroll/p-scroll-leftmenu.js"></script>
<script src="<?=base_url();?>assets/plugins/sidemenu/sidemenu.js"></script>
<script src="<?=base_url();?>assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/plugins/jqvmap/jquery.vmap.js"></script>
<script src="<?=base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?=base_url();?>assets/plugins/jqvmap/jquery.vmap.sampledata.js"></script>
<script src="<?=base_url();?>assets/js/apexcharts.js"></script>
<script src="<?=base_url();?>assets/plugins/chart/chart.min.js"></script>
<script src="<?=base_url();?>assets/js/index.js"></script>
<script src="<?=base_url();?>assets/js/index-map.js"></script>
<script src="<?=base_url();?>assets/js/left-menu.js"></script>
<script src="<?=base_url();?>assets/switcher/js/switcher.js"></script>
<script src="<?=base_url();?>assets/plugins/sidebar/sidebar.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script>
<script src="<?=base_url();?>assets/plugins/summernote/summernote-bs4.js"></script><script src="<?=base_url();?>assets/plugins/summernote/summernote.js"></script>
<script src="<?=base_url();?>assets/js/custom_query.js"></script>
<script src="<?=base_url();?>assets/js/product.js"></script>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">-->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="<?=base_url();?>assets/plugins/date-picker/bootstrap-datepicker.min.js"></script>
<script>
   $(document).ready(function() {
   var table = $('#example').DataTable( {
       lengthChange: false,
       buttons: [ 'excel','pdf' ]
   } );
   
   table.buttons().container()
       .appendTo( '#example_wrapper .col-md-6:eq(0)' );
   } );
</script>
</body>
</html>
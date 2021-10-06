<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Transactions Details Zahi">
      <meta name="description" content="Transactions Details Zahi">
      <meta name="author" content="Transactions Details Zahi">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
      <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
     
  
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Transactions Details Zahi</title>
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
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Transactions Details</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Transactions Details</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
                      <?php $this->load->view('account/sidebar.php');?>
                     <div class="col-lg-9 col-md-8">
                        <div class="main-content">
                   
                    <div class="form-box bg-white">
                            <div class="form-box-title px-3 py-2">
                                    Transactions Details
                            </div>
                        <div class="card card-body account-right">
                           <div class="widget">
                            
                          <div class="order-list-tabel-main table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="w-10p" >S.No.</th>
                                        <th class="wd-15p">Order No.</th>  
                                          <th class="wd-15p" >Mode Of Payment </th>
                                            <th class="wd-15p" >Transaction No</th>
                                     <!--    <th class="wd-15p">Status</th> -->
                                         <th class="wd-15p">Transaction Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($order)){
                                    foreach ($order as $order_list) {
                                    if($order_list->ord_txt_status=='success'){
                                        $class="success";                                      
                                        $value="Success";
                                        }
                                        else if($order_list->ord_txt_status=='cancel'){
                                        $class="danger";                                      
                                        $value="Cancel";
                                        }else if($order_list->ord_txt_status=='failure'){
                                        $class="warning";                                      
                                        $value="Failed";
                                        }else {
                                        $class="";
                                        $value="";
                                        }?>                                   
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" ><?=$i;$i++;?>.</td>
                                        <td >#<?=$order_list->ord_reference_no;?></td>
                                                                               
                                        <td><?php if($order_list->ord_pay_mode=='COD'){?><span class="badge badge-success-light badge-md">Cash On Delivery </span><?php }else{?><span class="badge badge-primary-light badge-md">
                                         Online Payment<?php }?></span> </td>
                                          <td><?php if($order_list->ord_txt_id!=""){echo '#'.$order_list->ord_txt_id;}else{echo "NA";}?></td>

                                       <!--  <td align="center">
                                         <a href="javascript:void(0);" >
                                                <span class="badge badge-<?=$class;?>-light badge-md"> <?=$value;?></span></a>
                                        </td> -->
                                        <td><?=date('d M, Y',strtotime($order_list->ord_created_date));?><br/>
                                        <?=date('h:i:s',strtotime($order_list->ord_created_date));?> </td>
                                       
                                       
                                    </tr>
                                <?php }}?>
                                 
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


      
            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
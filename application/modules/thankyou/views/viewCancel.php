
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="google-site-verification" content="hdvlk2Z0OY_6QMZj3R1vzWHynhllVTyF0RJElWQTNSg" />
      <meta name="robots" content="index, follow">
      <meta name="keywords" content="Order Cancel">
      <meta name="description" content="Order Cancel">
      <meta name="author" content="Order  Cancel">
      <meta name="author" content="Rinku Vishwakarma, Manish Kumar">
      <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com"> 
       <link rel="canonical" href="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
      <!-- Favicon -->
      <link name="favicon" type="image/x-icon" href="<?=base_url('admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>" rel="shortcut icon" />
      <title>Order  Cancel</title>
      <?php $this->load->view('include/header');
if($this->website->web_lang=='en'){
 $this->load->view('include/topbar');
}else{
  $this->load->view('include/topbar_ar');
}?>

<?php
if(!empty($order_detail->order_status)){
    if($order_detail->order_status==="Waiting")
    {
        $class="success";
        $msg="success";
        $type="Thanks";
        $other="Your Payment is";
        
    }
    else if($order_detail->order_status==="Pending")
    {
        $class="danger";
        $msg="aborted";
        $type="Oops";
        $other="Your Payment is";
    }
    else if($order_detail->order_status==="failure")
    {   
        $class="danger";
        $msg="failure";
        $type="Oops";
        $other="Your Payment is";
    }
    else
    {
        $class="danger";
        $msg="cancel";
        $type="Oops";
         $other="Your Payment is";
    }
} 
?>
<div id="page-content">
     <div class="breadcrumb-area mt-10">
        <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                    <h1 class="text-uppercase" style="font-size: 1.5rem;">Cancel</h1>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        
                         <li class="active"><a href="#">Cancel</a></li>
                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="slice-xs sct-color-2 border-bottom ">
        <div class="container container-sm">
            <div class="row cols-delimited justify-content-center">
                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-shopping-cart"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. My Cart</h3>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-truck"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. Shipping info</h3>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon mb-0">
                            <i class="la la-credit-card"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. Payment</h3>
                        </div>
                    </div>
                </div>
                <?php if(isset($order_detail->ord_pay_mode)=='COD'){ ?>
                <div class="col-3">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon mb-0" style="color: #029794 !important;">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. Confirm</h3>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="col-3">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0" style="color: #e62e04 !important;">
                                <i class="la la-ban"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. Failed</h3>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="py-3 gry-bg">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">

                <div class="col-xl-12 ml-lg-auto">
                    <div class="card sticky-top">
                        <div class="card-title">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <center>
                                        <h3 class="heading heading-3 strong-600">
                                            <span>THANK YOU</span>
                                        </h3>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            
                            <?php if(isset($order_detail->ord_pay_mode)=='COD' && $order_detail->order_status == 'Waiting') { ?>
                                <center><h2 class="text-success" style="font-size: 150%;">Congrats! Your Order has been Accepted..</h2></center>
                            <?php }elseif($order_detail->order_status == 'Waiting'){ ?>
                                <center><h2 class="text-success" style="font-size: 150%;"><strong><?php echo $type;?>! </strong> <?php echo $other;?> <?php echo $msg;?>!.</h2></center>
                            <?php }elseif($order_detail->order_status == "Pending"){ ?>
                                <center><h2 class="text-danger" style="font-size: 150%;"><strong><?php echo $type;?>! </strong> <?php echo $other;?> <?php  echo $msg;?>!.</h2></center>
                            <?php }elseif($order_detail->order_status == "failure"){ ?>
                                <center><h2 class="text-danger" style="font-size: 150%;"><strong><?php echo $type;?>! </strong> <?php echo $other;?> <?php  echo $msg;?>!.</h2></center>
                            <?php }else{ ?>
                                <center><h2 class="text-danger" style="font-size: 150%;"><strong><?php echo $type;?>! </strong> <?php echo $other;?> <?php  echo $msg;?>!.</h2></center>
                            <?php } ?>

                            <?php if(isset($order_detail->ord_pay_mode)=='COD'){ ?>
                                
                                <center>
                                    <?php if(isset($_SESSION['Logged_User'])){ ?>
                                    <p style="margin-top:10px">Hi, <?=$_SESSION['Logged_User']->cust_fname.' '.$_SESSION['Logged_User']->cust_lname?></p>
                                    <?php } ?>
                                    <p>Your order is: <b><?php echo $order_detail->ord_reference_no;?></b></p>

                                    <p>You will receive an order confirmation email with details of your order and a link to track its progress.<br/> 
                                    Please contact us on <?=$this->website->web_support_contact;?> or <a href="mailto:zahi.com"><strong>zahi.com</strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <b>www.zahi.com</b>
                                    </p>
                                </center>

                            <?php }else if($status == 'success'){ ?>
                                
                                <center>
                                    <?php if(isset($_SESSION['Logged_User'])){ ?>
                                    <p style="margin-top:10px">Hi, <?=$_SESSION['Logged_User']->cust_fname.' '.$_SESSION['Logged_User']->cust_lname?></p>
                                    <?php } ?>
                                    <p>Your order is: <b style="color:green"><?php echo $product_info;?></b></p>

                                    <p>You will receive an order confirmation email with details of your order and a link to track its progress.<br/> 
                                    Please contact us on <?php echo $this->website->web_support_contact;?> or <a href="<?php echo $this->website->web_support_email;?>"><strong><?php echo $this->website->web_support_email;?></strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <strong><?php echo $this->website->web_support_email;?></strong>
                                    </p>
                                </center>
                                
                            <?php }else if($order_status == 'Failure'){ ?>

                                <center>
                                    <?php if(isset($_SESSION['Logged_User'])){ ?>
                                    <p style="margin-top:10px">Hi, <?=$_SESSION['Logged_User']->cust_fname.' '.$_SESSION['Logged_User']->cust_lname?></p>
                                    <?php } ?>
                                    <p>Status: <b style="color:red"><?php echo $order_status; ?></b></p>
                                    <p>Message: <b style="color:red"><?php echo $order_message;?></b></p>
                                    <p>You will receive an order info on email with details of your order and a link to track its progress.<br/> 
                                    Please contact us on <?php echo $this->website->web_support_contact;?> or <a href="<?php echo $this->website->web_support_email;?>"><strong><?php echo $this->website->web_support_email;?></strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <strong><?php echo $this->website->web_support_email;?></strong>
                                    </p>
                                </center>

                            <?php }else if($order_status == 'Aborted'){ ?>

                                <center>
                                    <?php if(isset($_SESSION['Logged_User'])){ ?>
                                    <p style="margin-top:10px">Hi, <?=$_SESSION['Logged_User']->cust_fname.' '.$_SESSION['Logged_User']->cust_lname?></p>
                                    <?php } ?>
                                    <p>Status: <b style="color:red"><?php echo $order_status; ?></b></p>
                                    <p>Message: <b style="color:red"><?php echo $order_message;?></b></p>

                                    <p>You will receive an order info on email with details of your order and a link to track its progress.<br/> 
                                    Please contact us on <?php echo $this->website->web_support_contact;?> or <a href="<?php echo $this->website->web_support_email;?>"><strong><?php echo $this->website->web_support_email;?></strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <strong><?php echo $this->website->web_support_email;?></strong>
                                    </p>
                                </center>
                            <?php }else if($order_status == 'Failed'){ ?>
                                <center>
                                    <?php if(isset($_SESSION['Logged_User'])){ ?>
                                    <p style="margin-top:10px">Hi, <?=$_SESSION['Logged_User']->cust_fname.' '.$_SESSION['Logged_User']->cust_lname?></p>
                                    <?php } ?>
                                    <p>Status: <b style="color:red"><?php echo $order_status; ?></b></p>
                                    <p>Message: <b style="color:red"><?php echo $order_message;?></b></p>

                                    <p>You will receive an order info on email with details of your order and a link to track its progress.<br/> 
                                    Please contact us on <?php echo $this->website->web_support_contact;?> or <a href="<?php echo $this->website->web_support_email;?>"><strong><?php echo $this->website->web_support_email;?></strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <strong><?php echo $this->website->web_support_email;?></strong>
                                    </p>
                                </center>
                            <?php }else{ ?>
                                <center>
                                    <p>Please contact us on <?php echo $this->website->web_support_contact;?> or <a href="<?php echo $this->website->web_support_email;?>"><strong><?php echo $this->website->web_support_email;?></strong></a> with any questions regarding your order.<br/>
                                    Thank you for shopping at <strong><?php echo $this->website->web_support_email;?></strong></p>
                                </center>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


            <?php if($this->website->web_lang=='en'){
 $this->load->view('include/footer');
}else{
  $this->load->view('include/footer_ar');
}?>
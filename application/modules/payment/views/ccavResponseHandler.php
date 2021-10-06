<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='64A51B3B4A3A127BC9A6948E52B543AC';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_id="";
	$order_status="";
	$amount="";
	$trans_date="";
	$merchant_param1="";
	$merchant_param2="";
	$merchant_param3="";
	$merchant_param4="";
	$decryptValues=explode('&', $rcvdString);
	
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0)$order_id=$information[1];
		if($i==3)$order_status=$information[1];
		if($i==10)$amount=$information[1]; 
		if($i==40)$trans_date=$information[1];
		if($i==26)$merchant_param1=$information[1];
		if($i==27)$merchant_param2=$information[1];
		if($i==28)$merchant_param3=$information[1];
		if($i==29)$merchant_param4=$information[1];
	}
    
	if($order_status==="Success")
	{
		$class="success";
		$msg="success";
		$type="Thanks";
		$other="Your Payment is";
		
	}
	else if($order_status==="Aborted")
	{
		$class="danger";
		$msg="aborted";
		$type="Oops";
		$other="Your Payment is";
	}
	else if($order_status==="Failure")
	{	
        $class="danger";
		$msg="failure";
		$type="Oops";
		$other="Your Payment is";
	}
	else
	{
		$class="danger";
		$msg="Illegal access detected";
		$type="Oops";
	
	} 
	
?>
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(<?php echo site_url('assets/home/images/background/bg4.jpg');?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Service Status</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Service Status</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner">
            <!-- Product -->
            <div class="container">
                <div class="row"> 
					<div class="col-lg-6 col-md-6" style="margin-left:24%;">
						<div class="text-center">
							<div class="alert alert-<?php echo $class;?>">
							  <strong><?php echo $type;?>! </strong><?php echo $other;?> <?php echo $msg;?>!.
							</div>
						</div>
						<?php if($order_status!=''){ ?>
						<h5>Please find below transaction details...</h5>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td>Order No</td>
										<td><input type="text" value="<?php echo $order_id; ?>" name="id" class="form-control" readonly /></td>
									</tr>
									<tr>
										<td>Category Name</td>
										<td><input type="text" value="<?php echo $merchant_param2; ?>" name="name" class="form-control" readonly /></td>
									</tr>	
									<tr>
										<td>Sub Category Name</td>
										<td><input type="text" value="<?php echo $merchant_param3;?>" name="name" class="form-control" readonly /></td>
									</tr>	
									<tr>
										<td>Package Name</td>
										<td><input type="text" value="<?php echo $merchant_param1; ?>" name="name" class="form-control" readonly /></td>
									</tr>
									<tr>
										<td>Amount</td>
										<td><input type="text" value="<?php echo $amount; ?>" name="amt" class="form-control" readonly /></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><input type="text" value="<?php echo $order_status; ?>" name="sts" class="form-control" readonly /></td>
									</tr>
									<tr>
										<td>Date</td>
										<td><input type="text" value="<?php echo date('F d,Y H:i:s A'); ?>" name="sts" class="form-control" readonly /></td>
									</tr>
								</tbody>
							</table>
						<?php } ?>
					</div>
					<?php // } ?>
				</div>
				
		   </div>
            <!-- Product END -->
		</div>
	
        <!-- contact area  END -->
    </div>
    <!-- Content END-->

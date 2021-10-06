<html>
<head>
<title> Weldkart.com :: Connecting to payment gateway</title>
</head>
<body>
<center>

<?php include('Crypto.php');?>
<?php 

	error_reporting(0);
	
	$merchant_data='';
	$working_key='64A51B3B4A3A127BC9A6948E52B543AC';//Shared by CCAVENUES
	$access_code='AVQN86GF22CG75NQGC';//Shared by CCAVENUES
	   
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.urlencode($value).'&';
	}
	
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	
	//echo "<pre>";	
	//print_r($merchant_data);
	//echo "<pre>";	
	//print_r($encrypted_data);die;
	$a1=$_POST['packagename'];
	$a2=$_POST['categoryname'];
	$a3=$_POST['scate_name'];
	

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>"; 
?>
</form>
</center>

</body>
</html>
<script language='javascript'>document.redirect.submit();</script>
 


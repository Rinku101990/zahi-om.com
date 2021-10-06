<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">   
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('../admin/uploads/website/favicon/').$this->website->web_favicon_icon;?>">
    <!-- Title -->
    <title>Zahi Om: Online Shopping Portal in Oman for Women’s, Register</title>
	 <meta name="keywords" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Register" />
   <meta name="description" content="Zahi Om: Online Shopping Portal in Oman for Women’s, Register, Buy Dresses, Shoes, Clothes, Bags, beauty products, perfumes & more" />
   <meta name="Author" content="Manish Kumar" />
    <!-- Bootstrap css -->
    <link href="<?=base_url();?>../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style css -->
    <link href="<?=base_url();?>../admin/assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>../admin/assets/css/default.css" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/sidemenu/sidemenu.css">
    <!-- owl-carousel css-->
    <link href="<?=base_url();?>../admin/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!--Bootstrap-daterangepicker css-->
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!--Bootstrap-datepicker css-->
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <!-- Sidemenu-responsive  css -->
    <link href="<?=base_url();?>../admin/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">
    <!-- P-scroll css -->
    <link href="<?=base_url();?>../admin/assets/plugins/p-scroll/p-scroll.css" rel="stylesheet" type="text/css">
    <!--Font icons css-->
    <link href="<?=base_url();?>../admin/assets/css/icons.css" rel="stylesheet">
    <!-- Switcher css -->
    <link href="<?=base_url();?>../admin/assets/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" type="text/css" media="all">
    <!-- Rightsidebar css -->
    <link href="<?=base_url();?>../admin/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
    <!-- Nice-select css  -->
    <link href="<?=base_url();?>../admin/assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Color-palette css-->
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/css/skins.css">
    <link rel="stylesheet" href="<?=base_url();?>../admin/assets/switcher/demo.css">
    
    <style type="text/css">
        input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px white inset !important;
 
}
 .btn--fileupload  {
    min-width: 100%;
    margin: 0 10px 0 0;
}
.btn--primary {
    color: #fff;
    background: #c09555;
}
.btn--fileupload input {
    width: 100%;
    opacity: 0;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    cursor: pointer;
    height: auto !important;
}

        h3.card-title {
 
    font-size: 18px;
    font-weight: 500;
}
        .form-control {
   padding-left: 27px;
}
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }
        
        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
        hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid #969696;
}
.card{ background-color: transparent !important ;
    border:none !important;
}
.box-shadow{
    
         margin-top: 20px;
    margin-bottom: 20px;
    background: #fff;
  margin-left: -6%;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 3px 5px -1px, rgba(0, 0, 0, 0.2) 0px 6px 10px 0px, rgba(0, 0, 0, 0.2) 0px 1px 18px 0px;

}
@media (max-width:575.98px){
    .box-shadow{
    
         margin-top: 20px;
    margin-bottom: 20px;
    background: #fff;
  margin-left:0;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 3px 5px -1px, rgba(0, 0, 0, 0.2) 0px 6px 10px 0px, rgba(0, 0, 0, 0.2) 0px 1px 18px 0px;

}
    }
body{    background-color: #edf1f5;
    }
    
    .card-title {
            font-weight: 600;
    color: #c09555;
}
.personal-info {
    padding: 15px;
    border: 2px solid #9fa1a2;
    border-radius: 10px;
}
    
    </style>



</head>

<body class="app h-100vh">
    <!-- Loader -->
    <div id="loading" > <img src="<?=base_url();?>../admin/assets/images/other/loader.svg" class="loader-img" alt="Loader"> </div>
    
    <!-- Page opened -->
    <div class="page">
        <div class="">
            <div class="col col-login mx-auto">
                <div class="text-center"> 
				<img src="<?php echo site_url('../admin/uploads/website/logo/').$this->website->web_company_logo;?>" class="header-brand-img desktop-logo  mb-5" alt="<?=$this->website->web_company_name;?>" style="height:auto;width:105px;">
				</div>
            </div>
            <!-- container opened -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 justify-content-center mx-auto text-center">
                        <div class="card">
                            <div class="row" >
                       <!--  <div class="col-md-12 col-lg-7 p-6  pr-0 d-none d-lg-block text-justify" style="background:#fff; "> 
					<div class="card-body about-con pabout" style="   padding: 25px 117px 0 15px;">
    <h3 class="card-title ">Sell to crores of customers on <?=$this->website->web_company_name;?>, right from your doorstep!</h3>
    <p><b>All you need to sell on <?=$this->website->web_company_name;?> is</b></p>     
    <p style="font-size: 14px;font-weight: 500;">
      <i class="fa fa-user" style="font-size:16px;color:#00365b"></i>  Regitsre Account  <i class="fa fa-angle-double-right" style="font-size:18px;color:#c09555"></i>   <i class="fa fa-building-o" style="font-size:16px;color:#00365b"></i> Vat Number <i class="fa fa-angle-double-right" style="font-size:18px;color:#c09555"></i> 
        <i class="fa fa-bank" style="font-size:16px;color:#00365b"></i> Bank Account <i class="fa fa-angle-double-right" style="font-size:18px;color:#c09555"></i> 
     <i class="fa fa-product-hunt" style="font-size:16px;color:#00365b"></i> Product to sell</p>
    <p>*Vat Number is not requi#c09555 for sellers who only sell books</p>
    <hr>
    <h4>How will this information be used?</h4>
<p>You can use your Email Address to login to your <?=$this->website->web_company_name;?> Seller Account.</p>
<p>Please note, the 'Email Address' and 'Password' used here are only to access your <?=$this->website->web_company_name;?> Seller Account and can’t be used on <?=$this->website->web_site_url;?> shopping destination.</p>
<hr>
<br>
<br>
<br>

     
    
    
</div>
                    </div> -->
                    <div class="col-md-12 col-lg-3 pl-0 ">&nbsp;</div>
   
                                <div class="col-md-12 col-lg-6 pl-0 box-shadow " style="  margin-left: 0%;">
   <div class="card-body p-6 about-con pabout">
    <div class="card-title text-center">SELLER CREATE ACCOUNT </div>
<?php $msg=$this->session->flashdata('msg');  
if($msg){  ?>	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
	 
	 <form id="register_form" action="<?php echo site_url('login/register');?>" method="POST" enctype="multipart/form-data">
   <div class="personal-info">
   <div class="row">
        <div class="col-md-12" align="Justify">
            <h4>Personal Information</h4>
            <hr/>
        </div>
    </div>


		<div class="row">
		<div class="col-md-6">
		<div class="form-group">

            <i class="fa fa-user input-icon"></i>
        <input type="text" name="vnd_name" class="form-control" placeholder="Name">
		</div>
		</div>
		
		<div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-envelope input-icon"></i>
        <input type="email" name="vnd_email" class="form-control" placeholder="Email">
		</div>
		</div>

        <div class="col-md-6">
        <div class="form-group">
        <i class="fa fa-phone input-icon"></i>
        <select name="phone_code" class="form-control" style="    padding-left: 25px;" >
                 <option value="">Country Code</option>
                 <?php if(country_code() == TRUE){
                  foreach (country_code() as $cncval) {?>
                  <option value="<?=$cncval->cnt_id;?>"><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
                   <?php  } }?>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <i class="fa fa-phone input-icon"></i>
        <input type="text" name="phone" class="form-control" placeholder="Enter Contact No. "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-tags input-icon"></i>
        <input type="text" name="vnd_gst_no" class="form-control" placeholder="VAT Number">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-qrcode input-icon"></i>
        <input type="text" name="vnd_cr_no" class="form-control" placeholder="CR Number">
        </div>
        </div>
          <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-caret-square-o-down input-icon"></i>
        <select name="vnd_category" class="form-control" >
            <option value="">Select Category</option>    
            <option value="1">Supplier</option>
            <option value="2">Manufacture</option>
            <option value="3">Wholesaler</option>
            <option value="4">Retailer</option>
        </select>
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
       <select name="vnd_country"  class="form-control Country"   >
 <option value="">--Select Country--</option>
 <?php if(!empty($country)){
 foreach($country AS $clist){?>
 <option value="<?php echo $cnt_id=$clist->cnt_id;?>" ><?=$clist->cnt_name;?></option>
 <?php }}?>
 </select>
        </div>
        </div>

         <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
        <select name="vnd_state" class="form-control State"   >
 <option value="">--Select State--</option>
 </select>
        </div>
        </div>

         <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
       <select name="vnd_city"  class="form-control City"   >
 <option value="">--Select City--</option> 
 </select>
        </div>
        </div>

         <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
      <select name="vnd_zipcode" class="form-control Zip"   >
 <option value="">--Select Postal Code--</option> 
 </select>
        </div>
        </div>

          <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
       <textarea  name="vnd_address"  class="form-control " placeholder="Address"  ></textarea>
 
        </div>
        </div>
    </div>
</div>
<br/>
<div class="personal-info">
   <div class="row">
        <div class="col-md-12" align="Justify">
            <h4>Bank Information</h4>
            <hr/>
        </div>
    </div>
<div class="row">

        <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-user input-icon"></i>
            <input type="text" name="vnd_bank_name" class="form-control" placeholder="Bank Name">
        
        </div>
        </div>

   <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-user input-icon"></i>
            <input type="text" name="vnd_holder_name" class="form-control" placeholder="Account Holder Name ">
        
        </div>
        </div>

         <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-qrcode input-icon"></i>
            <input type="number" name="vnd_account_no" class="form-control" placeholder="Account Number ">
        
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <i class="fa fa-code input-icon"></i>
            <input type="text" name="vnd_ifsc_code" class="form-control" placeholder="IBAN Code ">
        
        </div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-map-marker input-icon"></i>
       <textarea  name="vnd_bank_address"  class="form-control " placeholder="Bank Address "  ></textarea>
 
        </div>
        </div>

        </div>
         </div>
<br/>
<div class="personal-info">
   <div class="row">
        <div class="col-md-12" align="Justify">
            <h4>Password Information</h4>
            <hr/>
        </div>
    </div>
<div class="row">

	    <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-key input-icon"></i>
        <input type="password" name="vnd_password" id="password2" class="form-control"  placeholder="Password">
		</div>
		</div>
		
		<div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-key input-icon"></i>
        <input type="password" name="confirm_password" class="form-control"  placeholder="Retype-Password"> 
		</div>
			</div>
			
</div>
    </div>
    <br/>
    <div class="row">

         <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-product-hunt input-icon"></i>
            <input type="text" name="vnd_product" class="form-control" placeholder="Product Category ">
        
        </div>
        </div>
       <!--  <div class="col-md-12">
        <div class="form-group">
            <i class="fa fa-bandcamp input-icon"></i>
        <select name="vnd_brand" class="form-control" >
            <option value="">Select Brand</option>    
            <?php if($brand==TRUE){
                foreach($brand as $bdval){
                $url=base_url('../admin/uploads/brand/').$bdval->brd_img;?>
            <option value="<?=$bdval->brd_id;?>" ><?=$bdval->brd_name;?></option>
            <?php }}?>
            
        </select>
        </div>
        </div> -->

        
        <div class="col-md-12">
        <div class="form-group">
            
            <span class="btn btn--primary btn--sm btn--fileupload mt-1" style="text-align: left;">
         <input  type="file" name="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.pdf"><i class="fa fa-file" style="color: #fff"></i> File Attach  
         </span>
       
        </div>
            </div>

             <div class="col-md-12">
        <div class="form-group">
            
            <span class="btn btn--primary btn--sm btn--fileupload mt-1" style="text-align: left;">
         <input  type="file" name="vnd_picture" accept="image/*"><i class="fa fa-file" style="color: #fff"></i> Logo Upload
         </span>
       
        </div>
            </div>
            <div class="col-md-12">
    <div class="form-group" style="text-align: left;">
        <label class="custom-control custom-checkbox " style="padding-left: 0;">
            <input type="checkbox" name="vnd_term" class="custom-control-input " checked > <span class="custom-control-label" style="padding-left: 30px;">I Agree With terms and Conditions</span> </label>
    </div>
    </div>
</div>
    <div class="form-footer mt-2"> <button type="submit" class="btn btn-success btn-block">Sign Up</button> </div>
	</form>
    <div class="text-center  mt-3 mb-0"> Already have an  account? <a href="<?=base_url('login');?>" class="text-primary">Login</a> </div>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container closed -->
        </div>
    </div>
    <!-- Page closed -->
    <!-- Dashboard js -->
     <input type="hidden" id="site_url" value="<?=base_url();?>"  >   
    <script src="<?=base_url();?>../admin/assets/js/vendors/jquery-3.2.1.min.js"></script>
    
    <script src="<?=base_url();?>../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script>
    
    <script src="<?=base_url();?>../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
  
    <script src="<?=base_url();?>../admin/assets/js/vendors/jquery.sparkline.min.js"></script>

    <script src="<?=base_url();?>../admin/assets/js/vendors/circle-progress.min.js"></script>
  
    <script src="<?=base_url();?>../admin/assets/plugins/rating/jquery.rating-stars.js"></script>
    
    <script src="<?=base_url();?>../admin/assets/plugins/moment/moment.min.js"></script>
   
    <script src="<?=base_url();?>../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
   
    <script src="<?=base_url();?>../admin/assets/plugins/owl-carousel/owl.carousel.js"></script>
   
    <script src="<?=base_url();?>../admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  
    <script src="<?=base_url();?>../admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
    <script src="<?=base_url();?>../admin/assets/plugins/jquery-countdown/countdown.js"></script>
    
    <script src="<?=base_url();?>../admin/assets/plugins/jquery-countdown/jquery.plugin.min.js"></script>
  
    <script src="<?=base_url();?>../admin/assets/plugins/jquery-countdown/jquery.countdown.js"></script>
   

    <script src="<?=base_url();?>../admin/assets/switcher/js/switcher.js"></script>
   
    <script src="<?=base_url();?>../admin/assets/js/custom.js"></script>
    <!-- validation -->
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="<?=base_url();?>assets/js/customvalidation.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

    $(".Country").change(function()
    {
        var CID = $(this).val();
        var url = $('#site_url').val();
        //alert(url);
        $.ajax(
        {
            type: "GET",
            url: url+'login/getState',
            data:{'CID':CID},
            dataType: 'json',

            beforeSend: function ()
            { 
                console.log(CID+url);
            },
            
            success: function(data)
            {
                $('.State').find('option').remove();

                var option = $('<option>').attr('value', '').html('Select State');
                $('.State').append(option);

                $.each(data, function() 
                {
                    var option = $('<option>').attr('value', this.st_id).html(this.st_name);
                    $('.State').append(option);
                });
            }
        });
    });
    
    $(".State").change(function()
    {
        var url = $('#site_url').val();
        var SID = $(this).val();
        $.ajax(
        {
            type: "GET",
            url: url+"login/getCity",
            data:{'SID':SID},
            dataType: 'json',

            beforeSend: function ()
            { 
                console.log(SID);
            },
            
            success: function(data)
            {
                console.log(data);
                $('.City').find('option').remove();

                var option = $('<option>').attr('value', '').html('Select City');
                $('.City').append(option);

                $.each(data, function() 
                {
                    var option = $('<option>').attr('value', this.ct_id).html(this.ct_name);
                    $('.City').append(option);
                });
            }
        });
    });
    
    $(".City").change(function()
    {
        var url = $('#site_url').val();
        var CID = $(this).val();
        $.ajax(
        {
            type: "GET",
            url: url+"login/getZip",
            data:{'CID':CID},
            dataType: 'json',

            beforeSend: function ()
            { 
                console.log(CID);
            },
            
            success: function(data)
            {
                console.log(data);
                $('.Zip').find('option').remove();

                var option = $('<option>').attr('value', '').html('Select Zip Code');
                $('.Zip').append(option);

                $.each(data, function() 
                {
                    var option = $('<option>').attr('value', this.zc_id).html(this.zc_zipcode);
                    $('.Zip').append(option);
                });
            }
        });
    });


  
     
});
</script>
</body>

</html>

   
  
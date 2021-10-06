$(document).ready(function(){
	/*Author  - Manish Kumar*/
   
	/* saveNewClient Onclick enevt */
	$(".saveUserDetails").click(function()
	{
        let check = true;
		let url = $("#url").val();
		// $('.saveUserDetails').attr('disabled',true);
		$('.saveUserDetails').html('Placing...');
		/* Validate Text Input Fields Value */
            $("#checkoutForm input[type=text]").each(function(){
                if((this.value).length == 0){
                    $('#'+this.name+'').html('<b style="color:red;">Empty</b>');
                    check = false;
                }
                else $('#'+this.name+'').html(' ');
            });
		/* End Validate Text Input Fields Value */
		
		/* Validate Select Input Fields Value */
			$("#checkoutForm select").each(function(){
				if((this.value).length == 0){
					$('#'+this.name+'').html('<b style="color:red;">Empty</b>');
					check = false;
				}
				else $('#'+this.name+'').html(' ');
			});
		/* Validate Select Input Fields Value */
        
        /* Validate Email Input Fields Value */
            let email = $('.cust_email').val();
            if(email.length == 0) $('#cust_email').html('<b style="color:red;">Empty</b>');
            else $('#cust_email').html(' ');
		/* Validate Select Input Fields Value */
        
        
		/* Get Text Input Fields Value */
		let serializedData = $("#checkoutForm").serialize();
		/* End Get Text Input Fields Value */
		
		if(check){
            console.log(serializedData);
			$.ajax(
			{
				type: "POST",
				url: url+"checkout/saveUserDetails",
				data:{'serializedData':serializedData},
				// dataType: 'json',

				beforeSend: function ()
				{ 
					console.log(serializedData);
				},
				
				success: function(response)
				{
					console.log(response);
					
				}
			});
        }
        else
		{
            console.log('Check False');
			// $('#Itemresponse').html('<b style="color:red;">(Any of the fields are empty.)</b>');
		}
	});
	/* End saveNewClient */

	

	// SHOW AND HIDE PAYMENT METHOD //
	$(".radioType").click(function(){
		let paymentMethod=$('input:radio[name="paymentType"]:checked').val();
		if(paymentMethod=='ONLINE'){
			$(".divConfimation").show();
		}else{
			$(".divConfimation").hide();
		}
	});


	$('.couponCodeForPayment').keyup(function(){
        $('.CouponApplyForPayment').prop('disabled',false);
    });
    
    $('.CouponApplyForPayment').click(function(){
		let cou_code  = $('.couponCodeForPayment').val();
		let CartAmount  = $('.CartTotalAmount').attr('total'); // console.log(CartAmount);
        let url = $('#site_url').val();
        //alert(parseInt(CartAmount));
        
        
        $.ajax({
            type:"post",
            url: url+"payment/check_coupon",
            data:{cou_code:cou_code,amount:CartAmount},
            
            beforeSend: function ()
            { 
                console.log(cou_code);
                console.log(url);
            },
            success:function(result){
                console.log(result);
                if(result == 'False'){
					$('.ResponseCouponApply').html('<b style="color:red">Coupon Not Valid or Date Expired</b>');
                    $('.couponValueAfterMatched').val(0);
                    $('.couponChecked').val('false');
                   
                }else if(result == 'min_order'){
                    $('.ResponseCouponApply').html('<b style="color:red">Coupon Not Valid or Order Amount Low</b>');
                    $('.couponValueAfterMatched').val(0);
                    $('.couponChecked').val('false');                
                }
                else{
					$('.ResponseCouponApply').html('<b style="color:green">Coupon Applied Successfully. Coupon Amount : '+result+'</b>');
                    $('.CouponApplyForPayment').prop('disabled',true);
                    $('.couponValueAfterMatched').val(result);
                    $('.CartTotalAmount').html(parseFloat(CartAmount)-parseFloat(result));
                    $('.couponChecked').val('true');
                   
                }
            }
        });
    });
	
});

/* ADD VALIDATE PASSWORD */
function ValidatePwd(pwd){
	var expr = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d$@$!%*#?&]{8,}$/;
	return expr.test(pwd); 
}
/* ADD SHIPPING ADDRESS */
function saveShippingAddress(){

 let url 		= $('#url').val();
 var current_url=$("#current_url").val(); 
 let cname  	= $("#shipper_name").val();
 let lname		= $("#shipper_lname").val();
 let cemail  	= $("#shipper_email").val();
 let cphone   	= $("#shipper_phone").val();
 let country	= $("#shipper_country").val();
 let state		= $("#shipper_state1").val();
 let city		= $("#shipper_city").val();
 let address	= $("#shipper_address").val();
 let pincode	= $("#shipper_pincode").val();
 let addType    = $("#addressType").val();
 let regex 		= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 let flag 		= true;
 let referer_page = url; 

 if(cname.trim() == '' ){

	 $('#shipper_name').css('border-color','red');
	   $('#msgname').text('First Name field is required.');
	   $('#msgname').show();
	   flag = false;
 }else{
    $('#v').css('border-color','#e6e6e6');
	$('#msgname').css('color','#e6e6e6');
	$('#msgname').text('');
	$('#msgname').show();
	flag = true;
}

 if(lname.trim() == '' ){

	$('#shipper_lname').css('border-color','red');
	  $('#msglname').text('Last Name field is required.');
	  $('#msglname').show();
	  flag = false;
 }else{
    $('#shipper_lname').css('border-color','#e6e6e6');
	$('#msglname').css('color','#e6e6e6');
	$('#msglname').text('');
	$('#msglname').show();
	flag = true;
}

 if(cemail.trim() == ''){

	   $('#shipper_email').css('border-color','red');
	   $('#msgemail').text('Email field is required!');
	   $('#msgemail').show();
	   flag = false;
 }
 if(!regex.test(cemail)){

	 $('#shipper_email').css('border-color','red');
	 $('#msgemail').text('Enter your valid email!');
	 $('#msgemail').show();
	 flag = false;
}

//  if(cphone.length!=10){

// 	   $('#shipper_phone').css('border-color','red');
// 	   $('#msgphone').text('Enter 10 digit mobile number.');
// 	   $('#msgphone').show();
// 	   flag = false;
//  }
if(cphone.trim() == ''){

	   $('#shipper_phone').css('border-color','red');
	   $('#msgphone').text('Phone Number field is required!');
	   $('#msgphone').show();
	   flag = false;
}else{
    $('#shipper_phone').css('border-color','#e6e6e6');
	$('#msgphone').css('color','#e6e6e6');
	$('#msgphone').text('');
	$('#msgphone').show();
	flag = true;
}
 
if(country.trim() == ''){
	$('#shipper_country').css('border-color','red');
	$('#msgcountry').css('border-color','red');
	$('#msgcountry').text('Please select country!');
	$('#msgcountry').show();
	flag = false;
}else{
    $('#shipper_country').css('border-color','#e6e6e6');
	$('#msgcountry').css('color','#e6e6e6');
	$('#msgcountry').text('');
	$('#msgcountry').show();
	flag = true;
}

if(state.trim() == ''){
	$('#shipper_state').css('border-color','red');
	$('#msgstate').css('color','red');
	$('#msgstate').text('Please select state!');
	$('#msgstate').show();
	flag = false;
}else{
    $('#shipper_state').css('border-color','#e6e6e6');
	$('#msgstate').css('color','#e6e6e6');
	$('#msgstate').text('');
	$('#msgstate').show();
	flag = true;
}

if(city.trim() == ''){
	$('#shipper_city').css('border-color','red');
	$('#msgcity').css('color','red');
	$('#msgcity').text('Please Select city');
	$('#msgcity').show();
	flag = false;
}else{
    $('#shipper_city').css('border-color','#e6e6e6');
	$('#msgcity').css('color','#e6e6e6');
	$('#msgcity').text('');
	$('#msgcity').show();
	flag = true;
}

if(address.trim() == ''){
	$('#shipper_address').css('border-color','red');
	$('#msgaddress').css('color','red');
	$('#msgaddress').text('Address field are required');
	$('#msgaddress').show();
	flag = false;
}else{
    $('#shipper_address').css('border-color','#e6e6e6');
	$('#msgaddress').css('color','#e6e6e6');
	$('#msgaddress').text('');
	$('#msgaddress').show();
	flag = true;
}

// if(pincode.trim() == ''){
// 	$('#shipper_pincode').css('border-color','red');
// 	$('#msgpincode').css('color','red');
// 	$('#msgpincode').text('Pincode field are required');
// 	$('#msgpincode').show();
// 	flag = false;
// }else{
//     $('#shipper_pincode').css('border-color','#e6e6e6');
// 	$('#msgpincode').css('color','#e6e6e6');
// 	$('#msgpincode').text('');
// 	$('#msgpincode').show();
// 	flag = true;
// }

 if($('#addressType').not(':checked').length){
	$('#addressType').css('border-color','red');
	$('#msgAddressType').css('color','red');
	$('#msgAddressType').text('Please select shipping address type!');
	$('#msgAddressType').show();
	flag = false;
 }
 if(flag){

		$(".text-danger").html('');
		$(".user-message").html('');
		$(".text-danger").show(1000);  
		$(".user-message").show(1000);  

		//$('.btnShippingAddress').prop("disabled",true);
		$.ajax({
			method:'post',
			url:referer_page+'checkout/address',
			data:$("#formShippingAddress").serialize(),
			success: function(data){

				//console.log(data);

				$('.btnShippingAddress').removeAttr('disabled'); 
				if(data['type'] == "error")
				{
					var formData=$("#formShippingAddress");
					$.each(data['message'], function (key ,val) { 
					$('[name="'+ key +'"]', formData).after(val);
				}); 
				$(".user-message").html('<div class="alert alert-danger" ><strong>Oops! ..</strong> Please fill blank field.. </div>');
				}else if(data['type'] == "danger")
				{
					$(".user-message").html(data['message']);
				}else{  
					$(".user-message").html(data['message']);
					// $("#formShippingAddress")[0].reset();
					 window.location.href=current_url;
					
				}  
				// setTimeout(function(){ 
				// 	$(".text-danger").fadeOut(1000);
				// 	$(".user-message").fadeOut(1000); 
				// },500); 

			}
		});	
 	}	
}
/* ===========FOR CHANGE SHIPPING ADDRESS============ */ 
function changeShipping(get) { 
	$(".shipping-message").html('');   
	$(".shipping-message").show(1000); ;
	let url= $('#url').val();
	var current_url=$("#current_url").val(); 
	 $.ajax({
		type:"post", 
		url: url+'account/defaultAddress',
		data:{id:get},
		success:function(result){ 
		 $(".shipping-message").html('<div class="alert alert-success alert-dismissible" data-dismiss="alert" aria-hidden="true" style="width: 58%;margin-left: 2%;"> <strong>Ok! </strong> Shipping address has been successfully update</div>'); 
			$("#shippingAddress").load(location.href + " #shippingAddress"); 
		}
	});  
}
/* ==== MAKE PAYMENT PROCESS ==== */ 
function makePaymentProcess(){
	
	let url = $("#url").val();
	let current_url = $("#current_url").val(); 
	let shippingId=$('input:radio[name="shippingAddress"]:checked').val();

	if (shippingId>0) {
		
		$.ajax({
			method:'post',
			url:url+'payment/setShippigSession',
			data:{spId:shippingId},
			success:function(response){
				//console.log(response);
				if(response=='set'){
					window.location.href=url+'payment';
				}else{
					window.location.href=current_url;
				}
			}
		});
	} else {
		$("#shippingSelectionResponse").html('<p style="color:#e40046;margin-top: 2%;font-weight:bold;margin-bottom: -1%;">Please select at least one shipping address.</p>');
		//setTimeout(function() { $("#shippingSelectionResponse").fadeOut(); }, 5000);
		return false;
	}
}




/* ===== PLACE ORDER ===== */
function placeOrder(){

	let url = $("#url").val();
	let current_url = $("#current_url").val(); 
	let paymentMethod=$('input:radio[name="paymentType"]:checked').val();
	let cou_code=$('.couponCodeForPayment').val();

	if (paymentMethod=='ONLINE') {
		//alert('On Working');
		$.ajax({
			method:'post',
			url:url+'payment/placeOrder',
			data:{payMode:paymentMethod,cou_code:cou_code},
			success:function(response){
				if(response!='failed'){
					window.location= "http://checkout.thawani.om/pay/"+response+"?key=IXi9jaPhq7WuN8zsTJz615Ilp2nJP0";
				}
			}
		});
		//window.location.href=url+'payment/place';
	} else if(paymentMethod=='COD'){
		$.ajax({
			method:'post',
			url:url+'payment/placeOrder',
			data:{payMode:paymentMethod,cou_code:cou_code},
			success:function(response){
				if(response!='failed'){
					window.location= url+"thankyou";
				}
			}
		});
	}else {
		$("#paymentResponse").html('<p style="color:#e40046">Please select at least one shipping address.</p>');
		//setTimeout(function() { $("#shippingSelectionResponse").fadeOut(); }, 5000);
		return false;
	}

}



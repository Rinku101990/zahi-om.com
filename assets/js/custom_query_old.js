$(document).ready(function(){
	
	$(".SignUp_Model").click(function(){
	  $("#SignUp_Model").modal();
	  $("#SignIn_Model").modal('hide');
	});

	$(".SignIn_Model").click(function(){
	  $("#SignIn_Model").modal();
	  $("#SignUp_Model").modal('hide');
	});
	$(".forgotpassword").click(function(){
	  $("#forgot_model").modal();
	  $("#SignIn_Model").modal('hide');
	});


    $('.password2').bind('keypress', function(e) {
        if(e.keyCode==13){
            $('.SignUp_btn').trigger('click');
        }
    });
   
	/* Sign up Onclick enent */
	$(".SignUp_btn").click(function(){
        
        let url 		= $(this).attr('url');
        let check 		= true;
        let Pcheck 		= true;
        let scheck         = true; 
        let echeck 		= true; 
	   /* Validate fname Input Fields Value */
		if($('.fname').val().length == 0 || $('.fname').val() == 0 || $('.fname').val() == null){ $('.fname').css('border','1px solid red');
         $('#fname').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#fname').html(' ');$('.fname').css('border',''); check = true; }              
        /* Validate lname Input Fields Value */
        if($('.lname').val().length == 0 || $('.lname').val() == 0 || $('.lname').val() == null){ $('.lname').css('border','1px solid red');
         $('#lname').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#lname').html(' ');$('.lname').css('border',''); check = true; }
		/* Validate email Input Fields Value */
		 if($('.email').val().length == 0 || $('.email').val() == 0){ $('.email').css('border','1px solid red');
         $('#email').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#email').html(' ');$('.email').css('border',''); check = true;
        	let email = $('.email').val();
            let filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;         
            if(filter.test(email)) scheck=true;
            else{ $('#email').html('<span style="color:red;">Email type Mismatched.</span>'); scheck=false; $('#email').focus(); 
        } }

        /* Validate phone code Input Fields Value */
         if($('.phone_code').val().length == null  || $('.phone_code').val() == 0){ $('.phone_code').css('border','1px solid red');
         $('#phone_code').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#phone_code').html(' ');$('.phone_code').css('border',''); check = true;            
        }

		/* Validate phone Input Fields Value */
		 if($('.phone').val().length == 0  || $('.phone').val() == 0){ $('.phone').css('border','1px solid red');
         $('#phone').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else if($('.phone').val().length != 10) {  $('#phone').html('<span style="color:red;">Enter 10 digit number.</span>');
        $('.phone').css('border',''); check = false; }
         else{ $('#phone').html(' ');$('.phone').css('border',''); check = true;            
        }
       
		/* Validate Password Input Fields Value */
		 if($('.password').val().length == 0){ $('.password').css('border','1px solid red');
         $('#password').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#password').html(' ');$('.password').css('border',''); check = true; }
            /* Validate Confirm  Password Input Fields Value */
        if($('.password2').val().length == 0){ $('.password2').css('border','1px solid red');
         $('#password2').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#password2').html(' ');$('.password2').css('border',''); check = true;
          let NewPassword 	= $('.password').val();
            let ReNewPassword 	= $('.password2').val();            
            if(NewPassword == ReNewPassword){ Pcheck = true;}
            else{ $('#password2').html('<span style="color:red;">Enter Confirm Password Same as Password .</span>'); Pcheck = false; $('#password2').focus();} }    

		if(check && scheck && Pcheck && echeck){
            $.ajax(
			{	
				type: "POST",
				url: url+"account/singup",
				data:$('#SignupForm').serialize(),
				// dataType:'json',				
				beforeSend: function ()
				{
					$('.SignUp_btn').html('Checking...');
					$('.SignUp_btn').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response == 'Failed'){
					   $("#SignupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SignUp_btn").html('Retry');
                       $('.SignUp_btn').prop('disabled', false);
					}else if(response == 'Used'){
					   $("#SignupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already email address used..</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SignUp_btn").html('Retry');
                       $('.SignUp_btn').prop('disabled', false);
					}else{	
					$('.SignUp_btn').html('Sign Up...');
					$('.SignUp_btn').prop('disabled', false);					
					    $("#SignupResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Your account has been submitted successfully. Your account email verify now .</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                      }
					
					
				}
			});
        }
        else
		{
            $(".SignUp_btn").html('Retry');
           // $('#SignupResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Sign Up */
    
    function email_verified(id){
    	$("#SignIn_Model").modal();
    	if(id==1){
         $("#SigninResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Your email id is verified successfully.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    	else if(id==2){
		$("#SignupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    	else if(id==3){
		$("#SignupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger!</strong> Already Email Id is verified .</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    }
     var msg_id=$('.alert_msg').val();
    email_verified(msg_id);
	 function email_verified(id){    	
    	if(id==1){
    	$("#SignIn_Model").modal();
         $("#SigninResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Your email id is verified successfully.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    	else if(id==2){
    	$("#SignIn_Model").modal();
		$("#SigninResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    	else if(id==3){
    	$("#SignIn_Model").modal();
		$("#SigninResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger!</strong> Already Email Id is verified .</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
    	}
    }

     $('.cust_password').bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('.SignIn_btn').trigger('click');
             }
        });
   

    /* Sign in Onclick enent */
	$(".SignIn_btn").click(function()
	{
        let url 		= $(this).attr('url');
        let current_url = $('#current_url').val();
        let check 		= true;
        let Pcheck 		= true; 		
		/* Validate email Input Fields Value */
		 if($('.cust_email').val().length == 0 || $('.cust_email').val() == 0){ $('.cust_email').css('border','1px solid red');
         $('#cust_email').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#cust_email').html(' ');$('.cust_email').css('border',''); check = true;
        	let email = $('.cust_email').val();
            let filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;         
            if(filter.test(email)) Pcheck=true;
            else{ $('#cust_email').html('<span style="color:red;">Email type Mismatched.</span>'); Pcheck=false; $('#email').focus(); 
        } }
		/* Validate Password Input Fields Value */
		 if($('.cust_password').val().length == 0){ $('.cust_password').css('border','1px solid red');
         $('#cust_password').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#cust_password').html(' ');$('.cust_password').css('border',''); check = true; }
          
		if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"account/check",
				data:$('#SigninForm').serialize(),
				// dataType:'json',				
				beforeSend: function ()
				{
					$('.SignIn_btn').html('Checking...');
					$('.SignIn_btn').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response == 'Failed'){
					   $("#SigninResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Please Enter Valid Email and Password.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SignIn_btn").html('Retry');
                       $('.SignIn_btn').prop('disabled', false);                      
					}else if(response == 'Active'){
					   $("#SigninResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Your accout in inactive mode.Contact administrator.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SignIn_btn").html('Retry');
                       $('.SignIn_btn').prop('disabled', false);
					}else{					
					$(".SignIn_btn").html('Sign In..');
                       $('.SignIn_btn').prop('disabled', false);	
					    $("#SigninResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Congratulation !</strong> you have successfully logged in.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
					    window.location.href = current_url;
                      }
					
					
				}
			});
        }
        else
		{
            $(".SignIn_btn").html('Retry');          
           // $('#SigninResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Sign In */


    /* Change_Password in Onclick enent */
	$(".Change_Password").click(function()
	{
        let url 		= $(this).attr('url'); 
        let logout_url  =  url+"account/logout"; 
        let check 		= true;
        let Pcheck 		= true; 
		/* Validate old_password Input Fields Value */
		if($('.old_password').val().length == 0 ){ $('.old_password').css('border','1px solid red');
        check=false; }
        else{ $('.old_password').css('border',''); check = true; }              
        /* Validate new_password Input Fields Value */
        if($('.new_password').val().length == 0){ $('.new_password').css('border','1px solid red');
         check=false; }
        else{ $('.new_password').css('border',''); check = true; }	
		
            /* Validate Confirm  Password Input Fields Value */
        if($('.password2').val().length == 0){ $('.password2').css('border','1px solid red');
         $('#password2').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#password2').html(' ');$('.password2').css('border',''); check = true;
          let NewPassword 	= $('.new_password').val();
            let ReNewPassword 	= $('.password2').val();            
            if(NewPassword == ReNewPassword){ Pcheck = true;}
            else{ $('#PasswordResponse1').html('<span style="color:red;"><b>Enter New Password Same as Confirm Password .</b></span>'); Pcheck = false; $('#PasswordResponse1').focus();} }    

		if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"account/changepassword",
				data:$('#PasswordForm').serialize(),
				// dataType:'json',				
				beforeSend: function ()
				{
					$('.Change_Password').html('Checking...');
					$('.Change_Password').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response == 'Failed'){
					   $("#PasswordResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Change Password.Some error occurred.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Change_Password").html('Retry');
                       $('.Change_Password').prop('disabled', false);                      
					}else if(response == 'NotMach'){
					   $("#PasswordResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger !</strong> Old Password doesn`t match Password.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Change_Password").html('Retry');
                       $('.Change_Password').prop('disabled', false);
					}else{					
					$(".Change_Password").html('Changed..');
                       $('.Change_Password').prop('disabled', false);	
					    $("#PasswordResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success !</strong> Password has been successfully changed..</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                          window.location.href = logout_url;
					   
                      }
					
					
				}
			});
        }
        else
		{
            $(".Change_Password").html('Retry');          
            $('#PasswordResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Change_Password */

 /* Forgot_Password in Onclick enent */
	$(".Forgot_btn").click(function()
	{
        let url 		= $(this).attr('url');      
         let check 		= true;
        let Pcheck 		= true; 
		/* Validate email Input Fields Value */
		 if($('.for_email').val().length == 0 || $('.for_email').val() == 0){ $('.for_email').css('border','1px solid red');
         $('#for_email').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#for_email').html(' ');$('.cust_email').css('border',''); check = true;
        	let email = $('.for_email').val();
            let filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;         
            if(filter.test(email)) Pcheck=true;
            else{ $('#for_email').html('<span style="color:red;">Email type Mismatched.</span>'); Pcheck=false; $('#for_email').focus(); 
        } }

		if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"account/forgot",
				data:$('#ForgotForm').serialize(),
				// dataType:'json',				
				beforeSend: function ()
				{
					$('.Change_Password').html('Checking...');
					$('.Change_Password').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response == 'Failed'){
					   $("#ForgotResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Change Password.Some error occurred.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Forgot_btn").html('Retry');
                       $('.Forgot_btn').prop('disabled', false);                      
					}else if(response == 'Wrong'){
					   $("#ForgotResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger !</strong> Email address Invalid !.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Forgot_btn").html('Retry');
                       $('.Forgot_btn').prop('disabled', false);
					}else{					
					$(".Forgot_btn").html('Sent..');
                       $('.Forgot_btn').prop('disabled', false);	
					    $("#ForgotResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success !</strong> Your password has been successfully reset. Check Your Email Id...</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
					   
                      }
					
					
				}
			});
        }
        else
		{
            $(".Forgot_btn").html('Retry');          
          //  $('#ForgotResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Forgot_Password */


     /* add to cart in Onclick enent */
	$(".add_to_cart").click(function()
	{
        let url 		= $(this).attr('url');  
        let RefId 		= $(this).attr('RefId');   
        let qty 		= $('.avail_qty').val();  
        let size 		= $("input[name='choice']:checked").val();//$('.current').html();        
        let color 		= $("input[name='color']:checked"). val();//$('.product_color').attr('title');
        let check       = true;  
        let echeck      = true;  
        let mcheck      = true; 
        
        // let sizelength = size;
        // console.log(sizelength); 
        // let manish = [url,RefId,qty,size,color];
        //  	console.log(...manish);         
        // /* Validate zip_code Input Fields Value */

        // if($('#zip_code').val() == 0 || $('#zip_code').val() == null){
        //     $('#checkResponse').html('<span style="color:red;">This field is required.</span>');
        //     check=false; 
        // }else{ 
        //     $('#checkResponse').html(''); check = true; 
        // }             
        
        /* Validate size Input Fields Value */       
        
        if($('#size_name').val() == 1 && size == null){ 
            $('#sizeError').html('<span style="color:red;">This field is required.</span>');
            echeck=false; 
        }else{ 
            $('#sizeError').html(''); echeck = true; 
        }

        /* Validate email Input Fields Value */
        if($('#color_name').val() == 1 && color == 0 || $('#color_name').val() == 1 && color == null){ 
            $('#colorError').html('<span style="color:red;">This field is required.</span>');
            mcheck=false; 
        }else{ 
            $('#colorError').html(''); mcheck = true; 
        }
        
         if(check && echeck && mcheck){
        
            $.ajax({
            type: "POST",
            url: url+"cart/cart_save",
            data:{'RefId':RefId,'qty':qty,'size':size,'color':color},
            dataType: 'json',
			beforeSend: function ()
			{ 
				//console.log(RefId);
			},			
			success: function(data)
			{           
               //return success            
               $('.add_to_cart').html('<i class="fa fa-shopping-basket"></i> Go To Cart');  
               $('.add_to_cart').prop('disabled', true);   
               $('#show_cart').html(data);  
               showFrontendAlert('success', 'Item has been added in cart');
              
            }
        });	 
        }    
		
	});
    /* End Add To Cart */

       /* Buy Now in Onclick enent */
    $(".buy_now").click(function()
    {
        let url         = $('#site_url').val();  
        let RefId       = $(this).attr('RefId');   
        let qty         = $('.avail_qty').val();  
       let size         = $("input[name='choice']:checked").val();//$('.current').html();        
        let color       = $("input[name='color']:checked"). val();
        let check        = true;  
        let echeck        = true;  
        let mcheck        = true;      
        // alert(url);
        //    if($('#zip_code').val() == 0 || $('#zip_code').val() == null){
        // $('#checkResponse').html('<span style="color:red;">This field is required.</span>');
        // check=false; }
        // else{ $('#checkResponse').html(''); check = true; }             
        /* Validate size Input Fields Value */       
        if($('#size_name').val() == 1 && size == null){ 
            $('#sizeError').html('<span style="color:red;">This field is required.</span>');
            echeck=false; 
        }else{ 
            $('#sizeError').html(''); echeck = true; 
        }
        /* Validate email Input Fields Value */
         if($('#color_name').val() == 1 && color == 0 || $('#color_name').val() == 1 && color == null){ 
            $('#colorError').html('<span style="color:red;">This field is required.</span>');
            mcheck=false; 
        }else{ 
            $('#colorError').html(''); mcheck = true; 
        }
        
         if(check && echeck && mcheck){  
            $.ajax({
            type: "POST",
            url: url+"cart/cart_save",
            data:{'RefId':RefId,'qty':qty,'size':size,'color':color},
            dataType: 'json',
            beforeSend: function ()
            { 
                console.log(RefId);
            },          
            success: function(data)
            {           
                // return success             
               //$('#show_cart').html(data);   
                  window.location.href = url+'cart';                
              
            }
        }); 
        }     
        
    });
    /* End Buy Now  */


     /* Make Your design add to cart in Onclick enent */
    $(".make_add_to_cart").click(function()
    {
        let url         = $('#site_url').val();           
        let sleeve        = $("input[name='sleeve']:checked").val();       
        let fabric       = $("input[name='fabric']:checked"). val();
        let color       = $("input[name='color']:checked"). val(); 
         let size       = $("input[name='size']:checked"). val(); 
            $.ajax({
            type: "POST",
             url: url+"cart/cart_save",
            data:{'sleeve':sleeve,'fabric':fabric,'color':color,'size':size},
            dataType: 'json',
            beforeSend: function ()
            { 
                //console.log(RefId);
            },          
            success: function(data)
            {           
               //return success            
               $('.make_add_to_cart').html('<i class="fa fa-shopping-basket"></i> Go To Cart');  
               $('.make_add_to_cart').prop('disabled', false);   
               $('#show_cart').html(data);  
               showFrontendAlert('success', 'Item has been added in cart');
              
            }
        });          
        
    });
    /* End Add To Cart */


    /* Zip Code in Onclick enent */
	$(".Check_Zipcode").click(function()
	{
        let url 		= $('#site_url').val();
        let pincode     = $('.pincode').val();         
        let check 		= true;       
		/* Validate email Input Fields Value */
		 if($('.pincode').val().length == 0 || $('.pincode').val() == 0){ 
		 	$('#checkResponse').html('<span style="color:red;">This field is required.</span>');
        check=false; }
        else{ $('#checkResponse').html(''); check = true; }

		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"account/zipcode",
				data:{'pincode':pincode},
			    // dataType: 'json',	
				beforeSend: function ()
				{
					$('.Check_Zipcode').html('Checking...');
					$('.Check_Zipcode').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response == 'Failed'){
					   $("#checkResponse").html('<span style="color:red"><i class="fa fa-times-circle"></i> <b>Shipping Not Available</b></span>');
                       $(".Check_Zipcode").html('Check');
                       $('.Check_Zipcode').prop('disabled', false);  
                        $('#zip_code').val(0);                       
					}else{					
					$(".Check_Zipcode").html('Checked..');
                       $('.Check_Zipcode').prop('disabled', false);	
					   $("#checkResponse").html('<span style="color:#65b765"><i class="fa fa-check-circle-o"></i> <b>Shipping Available Here</b></span>');
					    $('#zip_code').val(1);   
                      }
					
					
				}
			});
        }
        else
		{
        $(".Check_Zipcode").html('Check');
		}	
		
	});
    /* End Zipcode */


     $(".Country").change(function()
	{
        var CID = $(this).val();
       	var url = $(this).attr("url");
        //alert(url);
		$.ajax(
		{
			type: "GET",
			url: url+'account/getState',
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
		var url = $(this).attr("url");
		var SID = $(this).val();
		$.ajax(
		{
			type: "GET",
			url: url+"account/getCity",
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
		var url = $(this).attr("url");
		var CID = $(this).val();
		$.ajax(
		{
			type: "GET",
			url: url+"account/getZip",
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

  $(".shipping_edit").click(function(){
  		var url = $(this).attr("url");
		var SID = $(this).attr('shipping_edit');
		$.ajax(
		{
			type: "POST",
			url: url+"checkout/shipping_edit",
			data:{'SID':SID},
			dataType: 'json',
			success: function(response)
			{
				$(".Edit_Shopping_Model").modal();
				$('#EditformShippingAddress #fldid').val(response.shipping.fld_id);				
				$('#EditformShippingAddress #shipper_name').val(response.shipping.shippingFirstName);
				$('#EditformShippingAddress #shipper_lname').val(response.shipping.shippingLastName);
				$('#EditformShippingAddress #shipper_email').val(response.shipping.shippingEmail);
				$('#EditformShippingAddress #shipper_phone').val(response.shipping.shippingNumber);
				//country
				var Country = $('<option>').attr('value', '').html('Select Country');
				$('#EditformShippingAddress #shipper_country').append(Country);
				$.each(response.country, function() 
				{  var cntid=response.shipping.shippingCountry;
                   if(this.cnt_id==cntid){
					var option = $('<option selected>').attr('value', this.cnt_id).html(this.cnt_name);
					$('#EditformShippingAddress #shipper_country').append(option);
					}else{
					var option = $('<option >').attr('value', this.cnt_id).html(this.cnt_name);
					$('#EditformShippingAddress #shipper_country').append(option);
					}
				});
				//State
				var state = $('<option>').attr('value', '').html('Select State');
				$('#EditformShippingAddress #shipper_state1').append(state);
				$.each(response.state, function() 
				{  var cntid=response.shipping.shippingCountry;
				   var stid=response.shipping.shippingState;
				    if(this.cnt_id==cntid){
                   if(this.st_id==stid){
					var option = $('<option selected>').attr('value', this.st_id).html(this.st_name);
					$('#EditformShippingAddress #shipper_state1').append(option);
					}else{
					var option = $('<option >').attr('value', this.st_id).html(this.st_name);
					$('#EditformShippingAddress #shipper_state1').append(option);
					}
				  }
				});
                //CITY
				var city = $('<option>').attr('value', '').html('Select City');
				$('#EditformShippingAddress #shipper_city').append(city);
				$.each(response.city, function() 
				{  var ctid=response.shipping.shippingCity;
				   var stid=response.shipping.shippingState;				    
                  
                   	if(this.ct_id==ctid && this.st_id==stid){
					var option = $('<option selected>').attr('value', this.ct_id).html(this.ct_name);
					$('#EditformShippingAddress #shipper_city').append(option);
					}else if(this.st_id==stid){
					var option = $('<option >').attr('value', this.ct_id).html(this.ct_name);
					$('#EditformShippingAddress #shipper_city').append(option);
					}
				  
				});
				 //Zipcode
				var zip = $('<option>').attr('value', '').html('Select Zipcode');
				$('#EditformShippingAddress #shipper_pincode').append(zip);
				$.each(response.zip, function() 
				{  var ctid=response.shipping.shippingCity;
				   var pinocde=response.shipping.shippingPincode;
                   	
                    if(this.zc_id==pinocde && this.ct_id==ctid){
					var option = $('<option selected>').attr('value', this.zc_id).html(this.zc_zipcode);
					$('#EditformShippingAddress #shipper_pincode').append(option);
					}else if(this.ct_id==ctid){
					var option = $('<option >').attr('value', this.zc_id).html(this.zc_zipcode);
					$('#EditformShippingAddress #shipper_pincode').append(option);					
				  }
				});
				
				$('#EditformShippingAddress #shipper_address').val(response.shipping.shippingAddress);
				if(response.shipping.addressDefault=='yes'){
				$('#EditformShippingAddress #addressDefault').html('<input type="checkbox" name="addressDefault" value="yes" checked="checked" style="width: 34px; height: 20px;">');
		        }else{	
		        $('#EditformShippingAddress #addressDefault').html('<input type="checkbox" name="addressDefault" value="yes"  style="width: 34px; height: 20px;">');
            	 }
            	if(response.shipping.addressType=='Home'){
 				$('#EditformShippingAddress #Address_Type').html('<input id="radioStacked1" name="addressType" id="addressType" type="radio" value="Home" checked="checked" style="width: 16px;vertical-align: text-top; height: 20px;"><span class="custom-control-description">Home</span>&nbsp;&nbsp;<input id="radioStacked2" name="addressType" id="addressType" type="radio" value="Office" style="width: 16px;vertical-align: text-top; height: 20px;"><span class="custom-control-description">Office/Commercial</span>');
	 			}else{
	 			$('#EditformShippingAddress #Address_Type').html('<input id="radioStacked1" name="addressType" id="addressType" type="radio" value="Home"  style="width: 16px;vertical-align: text-top; height: 20px;"><span class="custom-control-description">Home</span>&nbsp;&nbsp;<input id="radioStacked2" name="addressType" id="addressType" checked="checked" type="radio" value="Office" style="width: 16px;vertical-align: text-top; height: 20px;"><span class="custom-control-description">Office/Commercial</span>');
	                 }

			}
		});	 
	});

 $(".CancelItem").click(function(){       
         var vndid = $(this).attr('vndid');
        var pid = $(this).attr('pid');
        $(".Cancel_Item_Model").modal();
        $('#cancel_vndid').val(vndid);
        $('#cancel_pid').val(pid);       
    });
 /* Cancel_submit  On click */
    $(".Cancel_submit ").click(function()
    {
        let url         = $('#site_url').val();    
        let pid         = $('#cancel_pid').val();           
        let check       = true;    
        let pcheck       = true;     
        /* Validate email Input Fields Value */
         if($('.reason').val().length == 0 || $('.reason').val() == 0){ $('.reason').css('border','1px solid red');
         $('#msgreason').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#msgreason').html(' ');$('.reason').css('border',''); check = true;
            }
        /* Validate Password Input Fields Value */
         if($('#reason_comment').val().length == 0){ 
         $('#msgcomment').html('<span style="color:red;">This field is required.</span>'); pcheck=false; }
        else{ $('#msgcomment').html(' '); pcheck = true; }
          
        if(check && pcheck){
            $.ajax(
            {   
                type: "POST",
                url: url+"account/cancel_item",
                data:$('#CancelItemForm').serialize(),
                // dataType:'json',             
                beforeSend: function ()
                {
                    $('.Cancel_submit').html('Submit...');
                    $('.Cancel_submit').prop('disabled', true);
                },
                success: function(response)
                {
                    
                    if(response == 'Failed'){
                       $("#CancelItemResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred..</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Cancel_submit").html('Retry');
                       $('.Cancel_submit').prop('disabled', false);                      
                    }else if(response == 'Used'){
                    $("#CancelItemResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger!</strong> Already request submit.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                    }else{               
                    
                        $("#CancelItemResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success !</strong> you request has been submitted .</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('.cancel'+pid).html('<p style="line-height: 14px;color: #2874f0;"><b>Cancellation Request</b></p>');
                        setTimeout(function(){ 
                          $(".Cancel_Item_Model").modal('hide'); 
                          },500); 
                      }
                }
            });
        }
        else
        {
            $(".Cancel_submit").html('Retry');          
            $('#CancelItemResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
        }   
        
    });
    /* End Cancel_ ITem*/

  //Alert Message
	window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove();
		});
	}, 4000);

 
	});

function product_color(id,e) { 
    $('.p_white').removeClass('product_color');
	$(e).toggleClass('product_color');	
}


function inc(rowid,e){	
    let qty = $('.avail_qty'+rowid).val(); 
	let url = $('.url').val();
	$.ajax({
		type:"post",
	    url: url+"cart/cart_add",
	    data:{'rowid':rowid,'qty':qty},
		dataType: 'json',
		beforeSend: function ()
		{ 
			//console.log(rowid1);
		},
		success:function(data){
			console.log(data);
			$('#show_cart').html(data.show_cart); 
			$('#cart_details').html(data.cart);  
		}
	});
}

function dec(rowid,e){	
    let qty 		= $('.avail_qty'+rowid).val(); 
	let url 		= $('.url').val();
	$.ajax({
		type:"post",
	    url: url+"cart/cart_minus",
	    data:{'rowid':rowid,'qty':qty},
		    dataType: 'json',
		beforeSend: function ()
		{ 
			//console.log(rowid1);
		},
		success:function(data){
			console.log(data);
			$('#show_cart').html(data.show_cart); 
			$('#cart_details').html(data.cart);  
		}
	});
}

// IN USE REMOVE ITEM FROM CART //
function remove_cart(rowid,e){	
	let url = $(e).attr("url");
	$.ajax({
		type:"post",
		url:url+"cart/cart_remove",
		data:{'rowid':rowid},
		dataType: 'json',
		beforeSend: function ()
		{ 
			//console.log(rowid1);
		},
		success:function(data){
			$('#show_cart').html(data.show_cart); 
			$('#cart_details').html(data.cart); 
            showFrontendAlert('success', 'Item has been removed from cart'); 
		}
	});
}

function ajaxSearch() {
    var input_data = $('#search_val').val();
    var url         =  $('#site_url').val();     
    if (input_data.length < 3)
    {
        $('#search_data').show();
        $('#autoSuggestionsList').addClass('auto_list');
        $('#autoSuggestionsList').html('<div class="typed-search-box"><div class="search-preloader"><div class="loader"><div></div><div></div><div></div></div>  </div></div>');
    }
    else
    {
        $.ajax({
            type: "POST",
            url: url+"home/search_data/",
            data:{'search':input_data},
            success: function (data) {
                // return success
                if (data.length > 0) {                  
                    $('#search_data').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
         });

     }
 }

function sleeve(e,t){         
     $('.sleeve').css("border",'1px solid #eee');
    $(t).parent().parent().parent().parent().css("border",'1px solid #c19450'); 
    $('.design_tab').removeClass("active show");
    $('.fabric_tab').addClass("active show");
     $('#tab_default_1').removeClass("active show");
    $('#tab_default_2').addClass("active show");

   
}
function fabric(e,t){         
     $('.fabric').css("border",'1px solid #eee');
    $(t).parent().parent().parent().css("border",'1px solid #c19450'); 
     $('.fabric_tab').removeClass("active show");
    $('.color_tab').addClass("active show");
     $('#tab_default_2').removeClass("active show");
    $('#tab_default_3').addClass("active show");
   
}

function color(e,t){         
     $('.color').css("border",'1px solid #eee');
    $(t).parent().parent().parent().css("border",'1px solid #c19450'); 
     $('.color_tab').removeClass("active show");
    $('.size_tab').addClass("active show");
     $('#tab_default_3').removeClass("active show");
    $('#tab_default_4').addClass("active show");
   
}
function size(e,t){         
     $('.size').css("border",'1px solid #eee');
    $(t).parent().parent().parent().css("border",'1px solid #c19450'); 
   
}

   
   
	

  
  
	

	
	
	
	
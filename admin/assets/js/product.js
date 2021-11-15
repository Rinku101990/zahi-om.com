$(document).ready(function(){	
 
	/* GENERAL PRODUCT Onclick enent */
	$(".GeneralProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let CHILD 		= $('.child_id').val(); 
         let CHILD_NAME 		= $('.child_name').val(); 
        let Reference 		= $('.pd_reference_no').val();    
        let check 		= true;
        let Pcheck 		= true;
		/* Validate reference_no Input Fields Value */
		if($('.pd_reference_no').val().length == 0){ $('.pd_reference_no').css('border','1px solid red');
         $('#reference_no').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#reference_no').html(' ');$('.pd_reference_no').css('border',''); check = true; }              
        /* Validate Product Name Input Fields Value */
        if($('.pd_name').val().length == 0 || $('.pd_name').val() == 0 || $('.pd_name').val() == null){ $('.pd_name').css('border','1px solid red');
         $('#name').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#name').html(' ');$('.pd_name').css('border',''); check = true; }
		/* Validate Product model Input Fields Value */
		 if($('.pd_model').val().length == 0 || $('.pd_model').val() == 0){ $('.pd_model').css('border','1px solid red');
         $('#Model').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#Model').html(' ');$('.pd_model').css('border',''); check = true; }
		/* Validate Product Brand Input Fields Value */
		 if($('.pd_brand').val().length == 0){ $('.pd_brand').css('border','1px solid red');
         $('#Brand').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#Brand').html(' ');$('.pd_brand').css('border',''); check = true; }
		/* Validate Product Price Input Fields Value */
		 if($('.pd_selling_price').val().length == 0 || $('.pd_selling_price').val() == 0){ $('.pd_selling_price').css('border','1px solid red');
         $('#pd_price').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#pd_price').html(' ');$('.pd_selling_price').css('border',''); check = true; }
		/* Validate Product Dimensions Input Fields Value */
		 // if($('.pd_dimensions').val().length == 0){ $('.pd_dimensions').css('border','1px solid red');
   //       $('#Dimensions').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Dimensions').html(' ');$('.pd_dimensions').css('border',''); check = true; }
		/* Validate Product Length Input Fields Value */
		 // if($('.pd_lenght').val().length == 0 || $('.pd_lenght').val() == 0){ $('.pd_lenght').css('border','1px solid red');
   //       $('#Length').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Length').html(' ');$('.pd_lenght').css('border',''); check = true; }
		/* Validate Product Width Input Fields Value */
		 // if($('.pd_width').val().length == 0 || $('.pd_width').val()== 0){ $('.pd_width').css('border','1px solid red');
   //       $('#Width').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Width').html(' ');$('.pd_width').css('border',''); check = true; }
		/* Validate Product Height Input Fields Value */
		 // if($('.pd_height').val().length == 0 || $('.pd_height').val() == 0){ $('.pd_height').css('border','1px solid red');
   //       $('#Height').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Height').html(' ');$('.pd_height').css('border',''); check = true; }
		/* Validate Product WeigthUnit Input Fields Value */
		// if($('.pd_weigth_unit').val().length == 0){ $('.pd_weigth_unit').css('border','1px solid red');
  //        $('#WeigthUnit').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#WeigthUnit').html(' ');$('.pd_weigth_unit').css('border',''); check = true; }
		/* Validate Product Weight Input Fields Value */
		// if($('.pd_weight').val().length == 0 || $('.pd_weight').val() == 0){ $('.pd_weight').css('border','1px solid red');
  //        $('#Weight').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#Weight').html(' ');$('.pd_weight').css('border',''); check = true; }
		/* Validate Product ShortDesc Input Fields Value */
		if($('.pd_short_description').val().length == 0){ $('.pd_short_description').css('border','1px solid red');
         $('#ShortDesc').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#ShortDesc').html(' ');$('.pd_short_description').css('border',''); check = true; }
		/* Validate Product model Input Fields Value */
		if($('.pd_description').val().length == 0){ $('.pd_description').css('border','1px solid red');
         $('#LongDesc').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#LongDesc').html(' ');$('.pd_description').css('border',''); check = true; }
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/General_Product_save",
				data:$('#GeneralProductForm').serialize(),
				dataType:'json',				
				beforeSend: function ()
				{
					$('.GeneralProduct').html('Checking...');
					$('.GeneralProduct').prop('disabled', true);
				},
				success: function(response)
				{
					
					if(response.response == 'Failed'){
					   $(".GeneralResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to General Product .Some error occurred.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".GeneralProduct").html('Retry');
                       $('.GeneralProduct').prop('disabled', false)
					}else if(response.response == 'Used'){
					   $(".GeneralResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".GeneralProduct").html('Retry');
                       $('.GeneralProduct').prop('disabled', false)
					}else{
						 $(".GeneralProduct").html('Save');
						 $('.GeneralProduct').prop('disabled', false);
					  //  $(".CategoryResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> General Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#general').hide();
						$('.general-tab').removeClass('active');
						$('.category-tab').addClass('active');
						$('#product_category_link').show();
						$('.p_id').val(response.pid);
						$('#Category_link').html('<p><a href="javascript:void(0);" onclick="GetCateRemove(this);" class="btn btn-danger" id="'+CHILD+'" category="child"><i class="fa fa-remove"></i></a> '+CHILD_NAME+' &nbsp;</p>');
						}
					
					
				}
			});
        }
        else
		{
            $(".GeneralProduct").html('Retry');          
            $('.GeneralResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End General product */

    /* GENERAL PRODUCT Update enent */
	$(".GeneralProduct_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();
        let check 		= true;
        let Pcheck 		= true;
		/* Validate reference_no Input Fields Value */
		if($('.pd_reference_no').val().length == 0){ $('.pd_reference_no').css('border','1px solid red');
         $('#reference_no').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#reference_no').html(' ');$('.pd_reference_no').css('border',''); check = true; }              
        /* Validate Product Name Input Fields Value */
        if($('.pd_name').val().length == 0 || $('.pd_name').val() == 0 || $('.pd_name').val() == null){ $('.pd_name').css('border','1px solid red');
         $('#name').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#name').html(' ');$('.pd_name').css('border',''); check = true; }
		/* Validate Product model Input Fields Value */
		 if($('.pd_model').val().length == 0 || $('.pd_model').val() == 0){ $('.pd_model').css('border','1px solid red');
         $('#Model').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#Model').html(' ');$('.pd_model').css('border',''); check = true; }
		/* Validate Product Brand Input Fields Value */
		 if($('.pd_brand').val().length == 0){ $('.pd_brand').css('border','1px solid red');
         $('#Brand').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#Brand').html(' ');$('.pd_brand').css('border',''); check = true; }
		/* Validate Product Price Input Fields Value */
		 if($('.pd_selling_price').val().length == 0 || $('.pd_selling_price').val() == 0){ $('.pd_selling_price').css('border','1px solid red');
         $('#pd_price').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#pd_price').html(' ');$('.pd_selling_price').css('border',''); check = true; }
		/* Validate Product Dimensions Input Fields Value */
		 // if($('.pd_dimensions').val().length == 0){ $('.pd_dimensions').css('border','1px solid red');
   //       $('#Dimensions').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Dimensions').html(' ');$('.pd_dimensions').css('border',''); check = true; }
		/* Validate Product Length Input Fields Value */
		 // if($('.pd_lenght').val().length == 0 || $('.pd_lenght').val() == 0){ $('.pd_lenght').css('border','1px solid red');
   //       $('#Length').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Length').html(' ');$('.pd_lenght').css('border',''); check = true; }
		/* Validate Product Width Input Fields Value */
		 // if($('.pd_width').val().length == 0 || $('.pd_width').val()== 0){ $('.pd_width').css('border','1px solid red');
   //       $('#Width').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Width').html(' ');$('.pd_width').css('border',''); check = true; }
		/* Validate Product Height Input Fields Value */
		 // if($('.pd_height').val().length == 0 || $('.pd_height').val() == 0){ $('.pd_height').css('border','1px solid red');
   //       $('#Height').html('<span style="color:red;">This field is required.</span>'); check=false; }
   //      else{ $('#Height').html(' ');$('.pd_height').css('border',''); check = true; }
		/* Validate Product WeigthUnit Input Fields Value */
		// if($('.pd_weigth_unit').val().length == 0){ $('.pd_weigth_unit').css('border','1px solid red');
  //        $('#WeigthUnit').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#WeigthUnit').html(' ');$('.pd_weigth_unit').css('border',''); check = true; }
		/* Validate Product Weight Input Fields Value */
		// if($('.pd_weight').val().length == 0 || $('.pd_weight').val() == 0){ $('.pd_weight').css('border','1px solid red');
  //        $('#Weight').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#Weight').html(' ');$('.pd_weight').css('border',''); check = true; }
		/* Validate Product ShortDesc Input Fields Value */
		if($('.pd_short_description').val().length == 0){ $('.pd_short_description').css('border','1px solid red');
         $('#ShortDesc').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#ShortDesc').html(' ');$('.pd_short_description').css('border',''); check = true; }
		/* Validate Product model Input Fields Value */
		if($('.pd_description').val().length == 0){ $('.pd_description').css('border','1px solid red');
         $('#LongDesc').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#LongDesc').html(' ');$('.pd_description').css('border',''); check = true; }
        
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/General_Product_Update",
				data:$('#GeneralProductForm').serialize(),
				dataType:'json',				
				beforeSend: function ()
				{
					$('.GeneralProduct_update').html('Update...');
					$('.GeneralProduct_update').prop('disabled', false);
				},
				success: function(response)
				{
					
					if(response.response == 'Failed'){
					   $(".GeneralResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".GeneralProduct_update").html('Retry');
					}else{
					  //  $(".CategoryResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> General Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $('#general').hide();
						$('#product_category_link').show();
						$('.general-tab').removeClass('active');
						$('.category-tab').addClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".GeneralProduct_update").html('Retry');          
            $('.GeneralResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End General product Update */
       /* Start product  */
   
	$(".general_product_prev").click(function()
	{ 
	    let PID 		= $('.p_id').val(); 
	    $('.gp_id').val(PID);
	 	$('.product_next').show();
	 	$('#general').show();
		$('#product_category_link').hide();
		$('.general-tab').addClass('active');
		$('.category-tab').removeClass('active');
					
	});
	$(".general_product_next").click(function()
	{ 
	    let PID 		= $('.gp_id').val(); 
	    $('.p_id').val(PID);	 
	     $('#general').hide();
		$('#product_category_link').show();
		$('.general-tab').removeClass('active');
		$('.category-tab').addClass('active');
					
	});

	$(".product_next").click(function()
	{ 
	 	$('#general').hide();
		$('#product_category_link').show();
		$('.general-tab').removeClass('active');
		$('.category-tab').addClass('active');
					
	});

    /* End product */

    /* CATEGORY PRODUCT Onclick enent */


	$(".CategoryProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();  
        let check 		= true;
        let Pcheck 		= true;        
		            
        /* Validate Product Tag Input Fields Value */
        // if($('.p_tag').val().length == 0){ $('.p_tag').css('border','1px solid red');
        //  $('#PTag').html('<span style="color:red;">This field is required.</span>'); check=false; }
        // else{ $('#PTag').html(' ');$('.p_tag').css('border',''); check = true; }		
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Category_Product_save",
				data:$('#CategoryProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.CategoryProduct').html('Checking...');
					$('.CategoryProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".CategoryResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".CategoryProduct").html('Retry');
					}else{
					  $('.CategoryProduct').html('save');
					   $('.CategoryProduct').prop('disabled', false);
					   // $(".OptionGroupResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Category link Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#product_category_link').hide();
						$('#option_add').show();
						$('.category-tab').removeClass('active');
		                $('.option-tab').addClass('active');
						$('.og_p_id').val(PID);
					}
					
					
				}
			});
        }
        else
		{
            $(".CategoryProduct").html('Retry');          
            $('.CategoryResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Category  product Link */

      /* CATEGORY PRODUCT Onclick Update enent */


	$(".CategoryProduct_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();  
        let check 		= true;
        let Pcheck 		= true;        
		            
        /* Validate Product Tag Input Fields Value */
        // if($('.p_tag').val().length == 0){ $('.p_tag').css('border','1px solid red');
        //  $('#PTag').html('<span style="color:red;">This field is required.</span>'); check=false; }
        // else{ $('#PTag').html(' ');$('.p_tag').css('border',''); check = true; }		
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Category_Product_Update",
				data:$('#CategoryProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.CategoryProduct_update').html('Update...');
					$('.CategoryProduct_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".CategoryResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".CategoryProduct_update").html('Retry');
					}else{
					   // $(".OptionGroupResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Category link Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#product_category_link').hide();
						$('#option_add').show();	
						$('.category-tab').removeClass('active');
		                $('.option-tab').addClass('active');					
					}
					
					
				}
			});
        }
        else
		{
            $(".CategoryProduct_update").html('Retry');          
            $('.CategoryResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Category  product Link Update */


     /* Start product Link  */
   
	$(".product_link_prev").click(function()
	{ 
	 	$('#general').show();
		$('#product_category_link').hide();
		$('.category-tab').removeClass('active');
		$('.general-tab').addClass('active');
					
	});

	$("#product_link_next").click(function()
	{ 
	    let PID 		= $('.p_id').val(); 
	    $('.og_p_id').val(PID);
	 	$('#option_add').show();
		$('#product_category_link').hide();
		$('.category-tab').removeClass('active');
		$('.option-tab').addClass('active');
					
	});

	$(".product_link_next").click(function()
	{ 
	 	$('#option_add').show();
		$('#product_category_link').hide();
		$('.category-tab').removeClass('active');
		$('.option-tab').addClass('active');
					
	});

    /* End product Link */
    
    /* -PRODUCT Option Groups  Onclick enent */
	$(".OptionProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();
        let Price 		= $('.pd_selling_price').val();      
        let check 		= true;
        let Pcheck 		= true;
        
		/* Validate Product p_option Input Fields Value */
		/*if($('.p_option').val().length == 0){ $('.p_option').css('border','1px solid red');
         $('#POption').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#POption').html(' ');$('.p_option').css('border',''); check = true; }  */            
       	
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Option_Product_save",
				data:$('#OptionGroupProductForm').serialize(),
				dataType:'json',
				
				beforeSend: function ()
				{
					$('.OptionProduct').html('Checking...');
					$('.OptionProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response.response == 'Failed'){
					   $(".OptionGroupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".OptionProduct").html('Retry');
					}else{
						$('.OptionProduct').html('save');
				    	$('.OptionProduct').prop('disabled', false);
					   // $(".InventoryResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Option Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#option_add').hide();
						$('#inventory_setup').show();
						$('.int_p_id').val(PID);
						$('.int_selleing_price').val(Price);
						$('#optiongroup_add').html(response.option);
						$('.option-tab').removeClass('active');
		                $('.inventory-tab').addClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".OptionProduct").html('Retry');          
            $('.OptionGroupResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Option  product Link */

     /* -PRODUCT Option Groups  Update enent */
	$(".OptionProduct_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();
        let Price 		= $('.pd_selling_price').val();      
        let check 		= true;
        let Pcheck 		= true;
        
		if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Option_Product_update",
				data:$('#OptionGroupProductForm').serialize(),
				dataType:'json',
				
				beforeSend: function ()
				{
					$('.OptionProduct_update').html('Update...');
					$('.OptionProduct_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response.response == 'Failed'){
					   $(".OptionGroupResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".OptionProduct_update").html('Retry');
					}else{
					   // $(".InventoryResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Option Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $('#option_add').hide();
						$('#inventory_setup').show();	
						$('.int_selleing_price').val(Price);					
						$('#optiongroup_add').html(response.option);
						$('.option-tab').removeClass('active');
		                $('.inventory-tab').addClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".OptionProduct_update").html('Retry');          
            $('.OptionGroupResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});


     /* -PRODUCT Option Groups  Update enent */
	

    /* End Product Option Group update  */

      /* Start product Option Group  */
   
	$(".product_option_prev").click(function()
	{ 
	 	$('#product_category_link').show();
		$('#option_add').hide();
		$('.category-tab').addClass('active');
	    $('.option-tab').removeClass('active');
					
	});

    $(".OptionProduct_Next").click(function()
	{ 
		let PID = $('.p_id').val();
		$('.int_p_id').val(PID);
	 	$('#inventory_setup').show();
		$('#option_add').hide();
		$('.option-tab').removeClass('active');
		$('.inventory-tab').addClass('active');
					
	});

	$(".product_option_next").click(function()
	{ 
	 	$('#inventory_setup').show();
		$('#option_add').hide();
		$('.option-tab').removeClass('active');
		$('.inventory-tab').addClass('active');
					
	});

    /* End product Option Group */
    
    /* -Inventory Product  Onclick enent */
	$(".InventoryProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val(); 
        let selleing_price=  $('.int_selleing_price').val();  
        //let cost_price=  $('.int_cost_price').val()  
        let check 		= true;
        let Pcheck 		= true;        
     
		/* Validate Product int_cost_price Input Fields Value */
		// if($('.int_cost_price').val().length == 0 || $('.int_cost_price').val() == 0 || parseInt(selleing_price) <= parseInt(cost_price) ){ $('.int_cost_price').css('border','1px solid red');
  //        $('#cost_price').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#cost_price').html(' ');$('.int_cost_price').css('border',''); check = true; }
        	
          /* Validate Product int_available_qty Input Fields Value */
		if($('.int_available_qty').val().length == 0 || $('.int_available_qty').val() == 0){ $('.int_available_qty').css('border','1px solid red');
         $('#available_qty1').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#available_qty1').html(' ');$('.int_available_qty').css('border',''); Pcheck = true; } 

  //       /* Validate Product int_min_purchase_qty Input Fields Value */
		// if($('.int_min_purchase_qty').val().length == 0 || $('.int_min_purchase_qty').val() == 0){ $('.int_min_purchase_qty').css('border','1px solid red');
  //        $('#purchase_qty').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
  //       else{ $('#purchase_qty').html(' ');$('.int_min_purchase_qty').css('border',''); Pcheck = true; }  

             /* Validate Product int_min_purchase_qty Input Fields Value */
		if($('.int_stock').val().length == 0){ $('.int_stock').css('border','1px solid red');
         $('#intstock').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#intstock').html(' ');$('.int_stock').css('border',''); Pcheck = true; }  
       	
       
		if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Inventory_Product_Save",
				data:$('#InventoryProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.InventoryProduct').html('Checking...');
					$('.InventoryProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".InventoryResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".InventoryProduct").html('Retry');
					}else{
						$('.InventoryProduct').html('save');
				    	$('.InventoryProduct').prop('disabled', false);
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#inventory_setup').hide();
						$('.ws_p_id').val(PID);
	                    $('#warranty_setup').show();
	                    $('.inventory-tab').removeClass('active');
		                $('.warranty-tab').addClass('active');						
					}
					
					
				}
			});
        }
        else
		{
            $(".InventoryProduct").html('Retry');          
            $('.InventoryResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Inventory Product  Link */

     /* -Inventory Product  Update  Onclick enent */
	$(".Inventory_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val(); 
        let selleing_price=  $('.int_selleing_price').val();  
        //let cost_price=  $('.int_cost_price').val();  
        let check 		= true;
        let Pcheck 		= true; 
     
		/* Validate Product int_cost_price Input Fields Value */
		// if($('.int_cost_price').val().length == 0 || $('.int_cost_price').val() == 0 || parseInt(selleing_price) <= parseInt(cost_price) ){ $('.int_cost_price').css('border','1px solid red');
  //        $('#cost_price').html('<span style="color:red;">This field is required.</span>'); check=false; }
  //       else{ $('#cost_price').html(' ');$('.int_cost_price').css('border',''); check = true; }
        	
          /* Validate Product int_available_qty Input Fields Value */
		if($('.int_available_qty').val().length == 0 || $('.int_available_qty').val() == 0){ $('.int_available_qty').css('border','1px solid red');
         $('#available_qty1').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#available_qty1').html(' ');$('.int_available_qty').css('border',''); Pcheck = true; } 

        /* Validate Product int_min_purchase_qty Input Fields Value */
		// if($('.int_min_purchase_qty').val().length == 0 || $('.int_min_purchase_qty').val() == 0){ $('.int_min_purchase_qty').css('border','1px solid red');
  //        $('#purchase_qty').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
  //       else{ $('#purchase_qty').html(' ');$('.int_min_purchase_qty').css('border',''); Pcheck = true; }  

             /* Validate Product int_min_purchase_qty Input Fields Value */
		if($('.int_stock').val().length == 0){ $('.int_stock').css('border','1px solid red');
         $('#intstock').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#intstock').html(' ');$('.int_stock').css('border',''); Pcheck = true; }  
       	
       
		if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Inventory_Product_update",
				data:$('#InventoryProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.Inventory_update').html('Update...');
					$('.Inventory_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".InventoryResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Inventory_update").html('Retry');
					}else{
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                         $('#inventory_setup').hide();
						 $('#warranty_setup').show();
						 $('.inventory-tab').removeClass('active');
		                $('.warranty-tab').addClass('active');
						
					}
					
					
				}
			});
        }
        else
		{
            $(".Inventory_update").html('Retry');          
            $('.InventoryResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Inventory Product Update Link */

     /* Start product Inventory Prev Next  */
   
	$(".Inventory_prev").click(function()
	{ 
	 	$('#option_add').show();
		$('#inventory_setup').hide();
		 $('.option-tab').addClass('active');
		 $('.inventory-tab').removeClass('active');
					
	});

	 $(".InventoryProduct_next").click(function()
	{ 
		let PID = $('.p_id').val();
		$('.ws_p_id').val(PID);
	    $('#warranty_setup').show();
		$('#inventory_setup').hide();
		 $('.inventory-tab').removeClass('active');
		 $('.warranty-tab').addClass('active');
					
	});

	$(".Inventory_next").click(function()
	{ 
	 	$('#warranty_setup').show();
		$('#inventory_setup').hide();
		 $('.inventory-tab').removeClass('active');
		 $('.warranty-tab').addClass('active');
					
	});
    /* End product  Inventory Prev Next  */


       /* -Warranty Policy Product  Onclick enent */
	$(".WarrantyProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        $.ajax(
			{	
				type: "POST",
				url: url+"catalog/warranty_product_Save",
				data:$('#WarrantyProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.WarrantyProduct').html('Checking...');
					$('.WarrantyProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".WarrantyResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".WarrantyProduct").html('Retry');
					}else{
						$('.WarrantyProduct').html('save');
				    	$('.WarrantyProduct').prop('disabled', false);
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#warranty_setup').hide();
						$('#return_setup').show();
						$('.rsp_p_id').val(PID);
						 $('.warranty-tab').removeClass('active');
		                 $('.return-tab').addClass('active');
					}
					
					
				}
			});
	});
    /* End Warranty Policy Product  Link */

     /* -Warranty Policy Product  Update  Onclick enent */
	$(".Warranty_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val(); 
         $.ajax(
			{	
				type: "POST",
				url: url+"catalog/warranty_product_Save",
				data:$('#WarrantyProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.Warranty_update').html('Update...');
					$('.Warranty_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".WarrantyResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Warranty_update").html('Retry');
					}else{
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                         $('#warranty_setup').hide();
						$('#return_setup').show();
						$('.warranty-tab').removeClass('active');
		                 $('.return-tab').addClass('active');
						
					}
					
					
				}
			});
	});
    /* End Warranty Policy Product Update Link */

     /* Start product Warranty Policy Prev Next  */
   
	$(".Warranty_prev").click(function()
	{ 
	 	$('#warranty_setup').hide();
		$('#inventory_setup').show();
		$('.inventory-tab').addClass('active');
		$('.warranty-tab').removeClass('active');
					
	});

	 $(".WarrantyProduct_next").click(function()
	{ 
		let PID = $('.p_id').val();
		$('.rsp_p_id').val(PID);
	   $('#return_setup').show();
		$('#warranty_setup').hide();
		$('.warranty-tab').removeClass('active');
		$('.return-tab').addClass('active');
					
	});

	$(".Warranty_next").click(function()
	{ 
	 	$('#return_setup').show();
		$('#warranty_setup').hide();
		$('.warranty-tab').removeClass('active');
		$('.return-tab').addClass('active');
					
	});

    /* End product  Warranty Policy Prev Next  */

      /* -Return Policy Product  Onclick enent */
	$(".ReturnProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        $.ajax(
			{	
				type: "POST",
				url: url+"catalog/return_product_Save",
				data:$('#ReturnProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.ReturnProduct').html('Checking...');
					$('.ReturnProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".RetrnResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".ReturnProduct").html('Retry');
					}else{
						$('.ReturnProduct').html('save');
				    	$('.ReturnProduct').prop('disabled', false);
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#return_setup').hide();
						$('#special_price').show();
						$('.sp_p_id').val(PID);
						$('.return-tab').removeClass('active');
		                $('.special-tab').addClass('active');
					}
					
					
				}
			});
	});
    /* End Warranty Policy Product  Link */

     /* -Warranty Policy Product  Update  Onclick enent */
	$(".Return_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val(); 
         $.ajax(
			{	
				type: "POST",
				url: url+"catalog/return_product_Save",
				data:$('#ReturnProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.Return_update').html('Update...');
					$('.Return_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".ReturnResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Return_update").html('Retry');
					}else{
					   // $(".WarrantyResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                         $('#return_setup').hide();
						$('#special_price').show();
						$('.return-tab').removeClass('active');
		                $('.special-tab').addClass('active');
						
					}
					
					
				}
			});
	});
    /* End Return Policy Product Update Link */

     /* Start product Return Policy Prev Next  */
   
	$(".Return_prev").click(function()
	{ 
	 	$('#warranty_setup').show();
		$('#return_setup').hide();
		$('.warranty-tab').addClass('active');
		$('.return-tab').removeClass('active');
					
	});

	 $(".ReturnProduct_next").click(function()
	{ 
		let PID = $('.p_id').val();
		$('.sp_p_id').val(PID);
	 	$('#special_price').show();
		$('#return_setup').hide();
		$('.return-tab').removeClass('active');
		$('.special-tab').addClass('active');
					
	});

	$(".Return_next").click(function()
	{ 
	 	$('#special_price').show();
		$('#return_setup').hide();
		$('.return-tab').removeClass('active');
		$('.special-tab').addClass('active');
					
	});

    /* End product  Return Policy Prev Next  */

     /* -Special Price Product  Onclick enent */
	$(".SpecialPriceProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();
        let selleing_price=  $('.int_selleing_price').val();  
        let special_price=  $('.special_price').val()  
        let check 		= true;    
        let Pcheck 		= true;             
     
		/* Validate Product special_price Input Fields Value */
		if($('.special_price').val().length == 0 || $('.special_price').val() == 0 || parseInt(selleing_price) <= parseInt(special_price)){ $('.special_price').css('border','1px solid red');
         $('#specialprice').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#specialprice').html(' ');$('.special_price').css('border',''); check = true; }
        	
        	/* Validate Product start_date Input Fields Value */
		if($('.start_date').val().length == 0){ $('.start_date').css('border','1px solid red');
         $('#start_date').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#start_date').html(' ');$('.start_date').css('border',''); Pcheck = true; }   

        /* Validate Product end_date Input Fields Value */
		if($('.end_date').val().length == 0){ $('.end_date').css('border','1px solid red');
         $('#end_date').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#end_date').html(' ');$('.end_date').css('border',''); Pcheck = true; } 

       if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Special_Price_Product_Save",
				data:$('#SpecialPriceProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.SpecialPriceProduct').html('Checking...');
					$('.SpecialPriceProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".SpecialPriceResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SpecialPriceProduct").html('Retry');
					}else{
						$('.SpecialPriceProduct').html('save');
					    $('.SpecialPriceProduct').prop('disabled', false);
					   // $(".SpecialPriceResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#special_price').hide();
						$('#volume_discount').show();
						$('.vd_p_id').val(PID);
						$('.special-tab').removeClass('active');
		                $('.discount-tab').addClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".SpecialPriceProduct").html('Retry');          
            $('.SpecialPriceResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Special Price Product  Link */

     /* -Special Price Update Product  Onclick enent */
	$(".SpecialPrice_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let selleing_price=  $('.int_selleing_price').val();  
        let special_price=  $('.special_price').val()  
        let check 		= true; 
         let Pcheck 		= true;             
     
		/* Validate Product special_price Input Fields Value */
		if($('.special_price').val().length == 0 || $('.special_price').val() == 0 || parseInt(selleing_price) <= parseInt(special_price)){ $('.special_price').css('border','1px solid red');
          $('#specialprice').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#specialprice').html(' ');$('.special_price').css('border',''); check = true; }
        	
        	/* Validate Product start_date Input Fields Value */
		if($('.start_date').val().length == 0){ $('.start_date').css('border','1px solid red');
         $('#start_date').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#start_date').html(' ');$('.start_date').css('border',''); Pcheck = true; }   

        /* Validate Product end_date Input Fields Value */
		if($('.end_date').val().length == 0){ $('.end_date').css('border','1px solid red');
         $('#end_date').html('<span style="color:red;">This field is required.</span>'); Pcheck=false; }
        else{ $('#end_date').html(' ');$('.end_date').css('border',''); Pcheck = true; } 

       if(check && Pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Special_Price_Product_update",
				data:$('#SpecialPriceProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.SpecialPrice_update').html('Update...');
					$('.SpecialPrice_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".SpecialPriceResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".SpecialPrice_update").html('Retry');
					}else{
					   // $(".SpecialPriceResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                   		$('#special_price').hide();
						$('#volume_discount').show();
						$('.special-tab').removeClass('active');
		                $('.discount-tab').addClass('active');
						
					}
					
					
				}
			});
        }
        else
		{
            $(".SpecialPrice_update").html('Retry');          
            $('.SpecialPriceResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End Special Price Update Product  Link */


     /* -Special Price Next  Onclick enent */
	$(".SpecialPriceNext").click(function()
	{ 
	  let PID 		= $('.p_id').val();   
      $('#category').hide();
	  $('#special_price').hide();
	  $('#volume_discount').show();
	  $('.vd_p_id').val(PID);
	  $('.special-tab').removeClass('active');
	  $('.discount-tab').addClass('active');
					
	});

	$(".SpecialPrice_Prev").click(function()
	{ 
	  $('#return_setup').show();
	  $('#special_price').hide();
	  $('.special-tab').removeClass('active');
	  $('.return-tab').addClass('active');
	});

	$(".SpecialPrice_Next").click(function()
	{ 
	  $('#special_price').hide();
	  $('#volume_discount').show();
	  $('.special-tab').removeClass('active');
	  $('.discount-tab').addClass('active');
	});
    /* End Special Price Next  Link */

    /* - Volume Discount Product  Onclick enent */
	$(".DiscountProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let check 		= true;
     
		/* Validate Product min_purchase_qty Input Fields Value */
		if($('.min_purchase_qty').val().length == 0 || $('.min_purchase_qty').val() == 0) { $('.min_purchase_qty').css('border','1px solid red');
         $('#purchaseqty').html('<span style="color:red;">This field is required.</span>'); check=false; }        
        else{ $('#purchaseqty').html(' ');$('.min_purchase_qty').css('border',''); check = true; }
        	
        	/* Validate Product discount Input Fields Value */
		if($('.get_discount').val().length == 0){ $('.get_discount').css('border','1px solid red');
         $('#discount').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#discount').html(' ');$('.get_discount').css('border',''); check = true; }   
       
        if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Discount_Product_Save",
				data:$('#DiscountProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.DiscountProduct').html('Checking...');
					$('.DiscountProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".DiscountResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".DiscountProduct").html('Retry');
					}else{
						$('.DiscountProduct').html('save');
					    $('.DiscountProduct').prop('disabled', false);
					   // $(".SpecialPriceResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#volume_discount').hide();
						$('#product_img').show();
						$('.img_p_id').val(PID);
						 $('.discount-tab').removeClass('active');
	                    $('.images-tab').addClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".DiscountProduct").html('Retry');          
            $('.DiscountResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End  Volume Discount Product  Link */

      /* - Volume Discount Update Product  Onclick enent */
	$(".Discount_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let check 		= true;
     
		/* Validate Product min_purchase_qty Input Fields Value */
		if($('.min_purchase_qty').val().length == 0 || $('.min_purchase_qty').val() == 0){ $('.min_purchase_qty').css('border','1px solid red');
         $('#purchaseqty').html('<span style="color:red;">This field is required.</span>'); check=false; }       
        else{ $('#purchaseqty').html(' ');$('.min_purchase_qty').css('border',''); check = true; }
        	
        	/* Validate Product discount Input Fields Value */
		if($('.get_discount').val().length == 0){ $('.get_discount').css('border','1px solid red');
         $('#discount').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#discount').html(' ');$('.get_discount').css('border',''); check = true; }   
       
        if(check){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Discount_Product_update",
				data:$('#DiscountProductForm').serialize(),
				
				beforeSend: function ()
				{
					$('.Discount_update').html('Update...');
					$('.Discount_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".DiscountResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".Discount_update").html('Retry');
					}else{
					   // $(".SpecialPriceResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Inventory Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#volume_discount').hide();
						$('#product_img').show();
						 $('.discount-tab').removeClass('active');
	                    $('.images-tab').addClass('active');
						
					}
					
					
				}
			});
        }
        else
		{
            $(".Discount_update").html('Retry');          
            $('.DiscountResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End  Volume Discount Update Product  Link */

     /* Volume Discount Next  Onclick enent */
	$(".DiscountNext").click(function()
	{ 
	  let PID 		= $('.p_id').val();   
     $('#category').hide();
	 $('#volume_discount').hide();
	 $('#product_img').show();
	 $('.img_p_id').val(PID);
	  $('.discount-tab').removeClass('active');
	  $('.images-tab').addClass('active');
					
	});

	$(".Discount_Prev").click(function()
	{ 
	  $('#special_price').show();
	  $('#volume_discount').hide();
	   $('.discount-tab').removeClass('active');
	  $('.special-tab').addClass('active');
	});

	$(".Discount_Next").click(function()
	{ 
	  $('#volume_discount').hide();
	  $('#product_img').show();
	   $('.discount-tab').removeClass('active');
	   $('.images-tab').addClass('active');
	});
    /* End Volume Discount Next  Link */

    /* - Volume Image Upload Product  Onclick enent */
	$(".ImageProduct").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let check 		= true;
        let pcheck 		= true;
        let formData = new FormData($("#ImageProductForm")[0]);
      
     
	
		  if($('#image_file21').val().length != 0){
        var image_file21 = $('#image_file21')[0].files[0].size;       
        //if(image_file21>62000) {
         if(file_size>=257314) {
        	$('#image_file21').css('border','1px solid red');
		$("#image_preview21").html("File size is greater than 150kb");
		pcheck=false; 
	     } else{
        $('#image_preview21').html(' ');$('#image_file21').css('border',''); pcheck = true;}
       }
		/* Validate Product min_purchase_qty Input Fields Value */
		if($('#image_file1').val().length == 0){ $('#image_file1').css('border','1px solid red');
         $('#image_preview1').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ var file_size = $('#image_file1')[0].files[0].size;       
         if(file_size>=257314) {
        	$('#image_file1').css('border','1px solid red');
		$("#image_preview1").html("File size is greater than 250kb");
		check=false; 
	     } else{
        $('#image_preview1').html(' ');$('#image_file1').css('border',''); check = true;} }
        if(check && pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Image_Product_Save",
		     	data: formData,
				processData: false,
                contentType: false,
				
				beforeSend: function ()
				{
					$('.ImageProduct').html('Checking...');
					$('.ImageProduct').prop('disabled', true);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".ImageResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".ImageProduct").html('Retry');
					}else{
					    $(".CompleteResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Product data has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                        $('#category').hide();
						$('#product_img').hide();
						$('#completeproduct').show();
						 $('.images-tab').removeClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".ImageProduct").html('Retry');          
            $('.ImageResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End  Image Upload Product  Link */

     /* - Volume Image Upload update Product  Onclick enent */
	$(".ImageProduct_update").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let check 		= true;
        let pcheck 		= true;
        let formData = new FormData($("#ImageProductForm")[0]);
      
     
	 if($('#image_file21').val().length != 0){
        var image_file21 = $('#image_file21')[0].files[0].size;       
       // if(image_file21>62000) {
        if(file_size>=257314) {
        	$('#image_file21').css('border','1px solid red');
		$("#image_preview21").html("File size is greater than 150kb");
		pcheck=false; 
	     } else{
        $('#image_preview21').html(' ');$('#image_file21').css('border',''); pcheck = true;}
    }
		/* Validate Product min_purchase_qty Input Fields Value */
		if($('#image_file1').val().length == 0){ $('#image_file1').css('border','1px solid red');
         $('#image_preview1').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ var file_size = $('#image_file1')[0].files[0].size;       
         if(file_size>=257314) {
        	$('#image_file1').css('border','1px solid red');
		$("#image_preview1").html("File size is greater than 250kb");
		check=false; 
	     } else{
        $('#image_preview1').html(' ');$('#image_file1').css('border',''); check = true;} }
        if(check && pcheck){
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/Image_Product_update",
		     	data: formData,
				processData: false,
                contentType: false,
				
				beforeSend: function ()
				{
					$('.ImageProduct_update').html('Update...');
					$('.ImageProduct_update').prop('disabled', false);
				},
				success: function(response)
				{
					if(response == 'Failed'){
					   $(".ImageResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Already General Product name Used..</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".ImageProduct_update").html('Retry');
					}else{
					    $(".CompleteResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Product data has been successfully Update.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                         $('#product_img').hide();
						$('#completeproduct').show();
						 $('.images-tab').removeClass('active');
					}
					
					
				}
			});
        }
        else
		{
            $(".ImageProduct_update").html('Retry');          
            $('.ImageResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
		}	
		
	});
    /* End  Image Upload Update Product  Link */

   /* Volume Discount Next  Onclick enent */
	$(".ImgProduct_Prev").click(function()
	{ 
	  $('#volume_discount').show();
	  $('#product_img').hide();
	   $('.images-tab').removeClass('active');
	    $('.discount-tab').addClass('active');
	});
    /* End Volume Discount Next  Link */

    /* - Delete Image Upload  */
	$(".ImgRemove1").click(function()
	{
        let url 		= $(this).attr('url');  
        let PID 		= $('.p_id').val();   
        let Img 		= $(this).attr('ImgRemove'); 

           $.ajax({
            type: "POST",
            url: url+"catalog/Image_Delete",
            data:{'pid':PID,'img':Img},
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $(this).parent().remove();
                    //$("#CategorylinkList").hide();
                }
            }
        });	
	});
    /* End Delete Image Upload Product  Link */

 });

  /* Start Delete Image Upload Product  Link */
function ImgRemove(e) {
	  let url 		= $(e).attr('url');  
        let PID 		= $('.p_id').val();   
        let Img 		= $(e).attr('ImgRemove'); 

		    $.ajax({
            type: "POST",
            url: url+"catalog/Image_Delete",
            data:{'pid':PID,'img':Img},
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $(e).parent().remove();
                    //$("#CategorylinkList").hide();
                }
            }
        });	
	}
   /* End Delete Image Upload Product  Link */
let maxFieldq = 15; //Input fields increment limitatio	
          let k = 1;
    function add_size(e) {
          let url 		= $('#site_url').val();	
            $.ajax(
			{	
				type: "POST",
				url: url+"catalog/inventry_size_filed",
				data:$('#OptionGroupProductForm').serialize(),
				dataType:'json',
				
				beforeSend: function ()
				{
					//$('.add_size').html('Add...');
					$('.add_size').prop('disabled', false);
				},
				success: function(response)
				{
					
						 k++;
					
				// $(".InventoryResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success!</strong> Option Product has been successfully Save.</span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                $('#size_field').append('<span id="sizefield'+k+'" style="    display: inherit;width:100%"><div class="row">'+response.option+'<div class="col-sm-2 col-md-2"><label>&nbsp;</label><a href="javascript:void(0);" class="btn btn-default  pull-right"  onclick="remove_size('+k+',this)" style="    margin-top: 12px;" ><i class="fa fa-close"></i> Remove</a></div></div></span>');
					
				}
				});
            	
					
		
	}


   function remove_size(id,e) {
	$('#sizefield'+id).remove();
	}
	// end
 
 
function GetCateRemove(e) {
	 let CID = $(e).attr('id');
	 let url =  $('.current_url').val();	 
	 let pid = $('.p_id').val(); 
     let category 	=   $(e).attr('category');

		    $.ajax({
            type: "POST",
            url: url+"catalog/category_remove",
            data:{'CID':CID,'pid':pid,'category':category},
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $(e).parent().remove();
                    //$("#CategorylinkList").hide();
                }
            }
        });	
	}
	// end
 
 // start product category link add
function getValue(e) {
	 let CID = $(e).attr('id');
	 let url = $(e).attr('url');
	 let CHID = $('.child_id').val(); 
	 let pid = $('.p_id').val(); 
     let category 	=   $(e).attr('category'); 
		    $.ajax({
            type: "POST",
            url: url+"catalog/category_add",
            data:{'CHID':CHID,'CID':CID,'pid':pid,'category':category},
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#Category_link').append(data);
                    $("#CategorylinkList").hide();
                }
            }
        });	
	}
	// end

   function category(CID,url,clt) { 
   		$('.sub_category_list').html('<div id="loading_page" style="" ></div>');	  
		$.ajax({
			method:'post',
			url:url+'catalog/getSubCate',
			data:{CID:CID},			
			success:function(response){	
			
		if(response!=''){
			$(".sub_category_list").html(response);
          $(clt).addClass('active').siblings().removeClass('active');				
           // $('#'+CID).addClass('active');		
			$(".child_category_list").html('');
		}else{
			$(".sub_category_list").html('');
			 $(clt).removesClass('active');	
            $(".child_category_list").html('');	
		}
			}
		});
	}
function subcategory(SID,url,clt) {	
	$('.child_category_list').html('<div id="loading_page" style="" ></div>');	
		$.ajax({
			method:'post',
			url:url+'catalog/getChildCate',
			data:{SID:SID},			
			success:function(response){	
			
				if(response!=''){					
					$(".child_category_list").html(response);
					 $(clt).addClass('active').siblings().removeClass('active');
				}else{$(".child_category_list").html('');
				  $(clt).removesClass('active');		}
			}
		});
	}
	function childcategory(CHID,CHID_NAME,url,clt) {	
		$('#category').hide();
		$('#general').show();
		$('.product-tab').show();
		$('.child_id').val(CHID);
		$('.child_name').val(CHID_NAME);		
	}


	function categorylinkSearch()
     {
    var input_data = $('.p_category_link').val();
	var url 		=  $('.p_category_link').attr('url');	
	

    if (input_data.length === 0)
    {
        $('#CategorylinkList').hide();
    }
    else
    {
        $.ajax({
            type: "POST",
            url: url+"catalog/category_search",
            data:{'search':input_data},
            success: function (data) {
                // return success
                if (data.length > 0) {					
                    $('#CategorylinkList').show();
                    $('#autoCategorylinkList').addClass('auto_list');
                    $('#autoCategorylinkList').html(data);
                }
            }
         });

     }
 }


// Inventory Edit
$(".inventory_edit").click(function(){
  var refer_url = $(this).attr("url");
  var int_id = $(this).attr("inventory_edit");
		$.ajax({
			method:'post',
			url:refer_url+'catalog/inventory_edit',
			data:{int_id:int_id},
			dataType:'json',
			success:function(response){
				if(response!=''){
					$("#InventoryModal").modal();
					$("#int_id").val(response.inventory.int_id);
					$("#getpid").val(response.product.p_name);
					$("#cost_price").val(response.inventory.int_cost_price);
					$("#selleing_price").val(response.inventory.int_selleing_price);
					$("#available_qty").val(response.inventory.int_available_qty);
					$("#min_purchase_qty").val(response.inventory.int_min_purchase_qty);
					var status1 = {"1":"Yes", "2":"No"};
					$('.stock').find('option').remove();		        
					var get_status=response.inventory.int_stock;
					$.each(status1, function(key, value ) 
					{
					if(key==get_status){
					var option = $('<option selected>').attr('value', key).html(value);
					}else{
					var option = $('<option>').attr('value', key).html(value);	
					}
					$('.stock').append(option);
					});	
				}
			}
		});
	});


// Special Price Add
$(".special_price_add").click(function(){				
$(".special_add").toggle();
$(".special_list").toggle();
	});

// Special Price Edit
$(".special_price_edit").click(function(){
  var refer_url = $(this).attr("url");
  var sp_id = $(this).attr("special_id");
		$.ajax({
			method:'post',
			url:refer_url+'promotion/special_price_edit',
			data:{sp_id:sp_id},
			dataType:'json',
			success:function(response){
				if(response!=''){					
					$("#SpecialModal").modal();
					$("#getspid").val(response.special.sp_id);
					$("#getpid").val(response.product.p_name);
					$("#special_price").val(response.special.sp_special_price);
					$("#start_date").val(response.start_date);
					$("#end_date").val(response.end_date);
					
				}
			}
		});
	});

// volume_discount Add
$(".volume_discount_add").click(function(){				
$(".discount_add").toggle();
$(".discount_list").toggle();
	});

// Special Price Edit
$(".volume_discount_edit").click(function(){
  var refer_url = $(this).attr("url");
  var vd_id = $(this).attr("dicount_id");
		$.ajax({
			method:'post',
			url:refer_url+'promotion/volume_discount_edit',
			data:{vd_id:vd_id},
			dataType:'json',
			success:function(response){
				if(response!=''){					
					$("#DiscountModal").modal();
					$("#getvid").val(response.discount.vd_id);
					$("#getpid").val(response.product.p_name);
					$("#purchase_qty").val(response.discount.vd_min_purchase_qty);
					$("#get_discount").val(response.discount.vd_discount);					
					
				}
			}
		});
	});

// Product View
$(".ProductView").click(function(){
  var refer_url = $(this).attr("url");
  var pid = $(this).attr("ProductView");
		$.ajax({
			method:'post',
			url:refer_url+'catalog/ProductView',
			data:{pid:pid},
			dataType:'json',
			success:function(response){
				if(response!=''){					
					$("#ProductModal").modal();
					$("#Product_title").html(response.product.p_name);
					$("#pimg").html('<img src="'+response.product_img+'" class="img-responsive" style="width: 200px;height: 200px;border: 1px solid #eee;object-fit: contain;" />');
					$("#Reference").html(response.product.p_reference_no);
					$("#Categories").html(response.product.cate_name+' '+response.product.scate_name+' '+response.product.child_name);
					$("#Brand").html(response.product.brand_name);
					$("#Model").html(response.product.p_model);
					$("#Price").html(response.product.p_selling_price);
									
					
				}
			}
		});
	});

	/*--- View Item Return Modal ---*/ 
	$(".returnView").click(function(){
		var refer_url = $(this).attr("url");
		var returnid = $(this).attr("returnId");
		$.ajax({
			method:'post',
			url:refer_url+'orders/getReturnItemInfo',
			data:{returnid:returnid},
			dataType:'json',
			success:function(response){
				if(response!=''){		
					$("#cancel_pid").val(response.item.c_id);			
					$("#returnPolicyModal").modal();
					if(response.item.return_type===3){
						$("#item_title").html(response.item.c_status_type);
					}else if(response.item.return_type===2){
						$("#item_title").html(response.item.c_status_type);
					}
					$(".reason").val(response.item.ocr_title);
					$(".comments").val(response.item.c_comment);
					$(".status").val(response.item.c_status_type);
				}
			}
		});
	});

	/* Cancel_submit  On click */
    $(".response_submit ").click(function()
    {
        let url         = $('#site_url').val();   
		let current_url = $("#current_url").val(); 
        let pid         = $('#cancel_pid').val();           
        let check       = true;       
        /* Validate email Input Fields Value */
         if($('.itemMessage').val().length == 0 || $('.itemMessage').val() == 0){ $('.itemMessage').css('border','1px solid red');
         $('#messageItem').html('<span style="color:red;">This field is required.</span>'); check=false; }
        else{ $('#messageItem').html(' ');$('.itemMessage').css('border',''); check = true;
            }
          
			if(check){
            $.ajax(
            {   
                type: "POST",
                url: url+"orders/cancel_item_update",
                data:$('#ItemReturnForm').serialize(),          
                beforeSend: function ()
                {
                    $('.response_submit').html('Submit...');
                    $('.response_submit').prop('disabled', true);
                },
                success: function(response)
                {
                    
                    if(response == 'Failed'){
                       $("#ItemReturnResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred..</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
                       $(".response_submit").html('Retry');
                       $('.response_submit').prop('disabled', false);                      
                    }else if(response == 'Success'){               
						window.location.href=current_url;
                    }
                }
            });
        }
        else
        {
            $(".response_submit").html('Retry');          
            $('#ItemReturnResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
        }   
        
    });

	$(".CancelItemFromAdmin").click(function()
	{       
		let vndid = $(this).attr('vndid');
	   	let pid = $(this).attr('opid');
		let ordid = $(this).attr('ordid');
	   	$(".CancelItemFromAdminModel").modal();
	   	$('#cancel_vndid').val(vndid);
	   	$('#cancel_opid').val(pid);  
		$("#cancel_ordid").val(ordid);     
   	});

   /* Cancel_submit  On click */
   $(".CancelSubmitAdminForm ").click(function()
   {
		let current_url = $("#current_url").val(); 
	   let url         = $('#site_url').val();    
	   let pid         = $('#cancel_opid').val();           
	   let check       = true;    
	   let pcheck       = true;     
	   /* Validate Password Input Fields Value */
		if($('#reason_comment').val().length == 0){ 
			$('#msgcomment').html('<span style="color:red;">This field is required.</span>'); pcheck=false; }
	   	else{ $('#msgcomment').html(' '); pcheck = true; }
		 
	   if(check && pcheck){
		   $.ajax(
		   {   
			   type: "POST",
			   url: url+"orders/cancelUserItemByAdmin",
			   data:$('#CancelItemFromAdminForm').serialize(),
			   beforeSend: function ()
			   {
				   $('.CancelSubmitAdminForm').html('Submit...');
				   $('.CancelSubmitAdminForm').prop('disabled', true);
			   },
			   success: function(response)
			   {
				   //console.log(response);
				   if(response == 'Failed'){
					  	$("#CancelItemFromAdminResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Oops!</strong> Unable to Account .Some error occurred..</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
					  	$(".CancelSubmitAdminForm").html('Retry');
					  	$('.CancelSubmitAdminForm').prop('disabled', false);                      
				   }else if(response == 'Used'){
				   		$("#CancelItemFromAdminResponse").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-slash "></i></span> <span class="alert-inner--text"><strong>Danger!</strong> Already request submit.</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
				   }else{   
					   	$("#CancelItemFromAdminResponse").html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up "></i></span> <span class="alert-inner--text"><strong>Success !</strong> you request has been submitted .</span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>');
					   	$('.cancel'+pid).html('<p style="line-height: 14px;color: #2874f0;"><b>Cancellation Request</b></p>');
					   	// setTimeout(function(){ 
						//  	$(".CancelItemFromAdminModel").modal('hide'); 
						// },1500); 
						window.location.href=current_url;
					}
			   }
		   });
	    }
	   else
	   {
		   $(".CancelSubmitAdminForm").html('Retry');          
		   $('#CancelItemFromAdminResponse').html('<span style="color:red;">(Any of the fields are empty.)</span>');
	   }   
   });
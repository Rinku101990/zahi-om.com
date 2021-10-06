$(document).ready(function(){

    $(".Country").change(function()
	{
        var CID = $(this).val();
       	var url = $('#site_url').val();
        //alert(url);
		$.ajax(
		{
			type: "GET",
			url: url+'profile/getState',
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
			url: url+"profile/getCity",
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
			url: url+"profile/getZip",
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



// Sub Category Edit
$(".sub_category_edit").click(function(){
  var refer_url = $(this).attr("url");
  var scate_id = $(this).attr("subcateid");
		$.ajax({
			method:'post',
			url:refer_url+'setting/sub_category_edit',
			data:{scate_id:scate_id},
			dataType:'json',
			success:function(response){
				if(response!=''){
					$("#SubcategoryModal").modal();
					$("#scate_id").val(response.sub_category.scate_id);
					$("#scate_name").val(response.sub_category.scate_name);
			$('.category').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Category');
			$('.category').append(option);
			var get_cate_id=response.sub_category.cate_id;
			$.each(response.category, function() 
			{
			if(this.cate_id==get_cate_id){
			var option = $('<option selected>').attr('value', this.cate_id).html(this.cate_name);
			}else{
			var option = $('<option>').attr('value', this.cate_id).html(this.cate_name);	
			}
			$('.category').append(option);
			});
			var status1 = {"1":"Active", "2":"In Active"};
			$('.cstatus').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Status');
			$('.cstatus').append(option);
			var get_status=response.sub_category.scate_status;
			$.each(status1, function(key, value ) 
			{
			if(key==get_status){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.cstatus').append(option);
			});		
				}
			}
		});
	});

// Child Category Edit
$(".child_category_edit").click(function(){
  var refer_url = $(this).attr("url");
  var child_id = $(this).attr("childcateid");
		$.ajax({
			method:'post',
			url:refer_url+'setting/child_category_edit',
			data:{child_id:child_id},
			dataType:'json',
			success:function(response){
				if(response!=''){
					$("#ChildCategoryModal").modal();
					$("#child_id").val(response.child_category.child_id);
					$("#child_name").val(response.child_category.child_name);
			$('.category').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Category');
			$('.category').append(option);
			var get_scate_id=response.child_category.scate_id;
			$.each(response.category, function() 
			{
            var CID=this.cate_id;          
 			var option = $('<option disabled>').attr('value', this.cate_id).html(this.cate_name);		
 			
 			$('.category').append(option);
            $.each(response.SubCategory, function(key,value) 
			{
				var SCID=value.scate_id;
			if(value.cate_id==CID){
			if(value.scate_id==get_scate_id){
			var option = $('<option selected>').attr('value', value.scate_id).html('-'+value.scate_name);
			}else{
			var option = $('<option>').attr('value', value.scate_id).html('-'+value.scate_name);	
			}
		     }
			$('.category').append(option);
            });

			});
			var status1 = {"1":"Active", "2":"In Active"};
			$('.cstatus').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Status');
			$('.cstatus').append(option);
			var get_status=response.child_category.child_status;
			$.each(status1, function(key, value ) 
			{
			if(key==get_status){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.cstatus').append(option);
			});		
				}
			}
		});
	});
	
	// Brand Edit
$(".brand_edit").click(function(){
  var refer_url = $(this).attr("url");
  var brd_id = $(this).attr("brand_edit");
		$.ajax({
			method:'post',
			url:refer_url+'setting/brand_edit',
			data:{brd_id:brd_id},
			dataType:'json',
			success:function(response){
				if(response!=''){
					$("#BrandModal").modal();
					$("#brd_id").val(response.brand.brd_id);
					$("#brd_name").val(response.brand.brd_name);
					$("#img").html('<img src="'+response.brand_img+'" style="width:70px;height:80px;    object-fit: contain;" />');			
			var status1 = {"1":"Active", "2":"In Active"};
			$('.cstatus').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Status');
			$('.cstatus').append(option);
			var get_status=response.brand.brd_status;
			$.each(status1, function(key, value ) 
			{
			if(key==get_status){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.cstatus').append(option);
			});		
				}
			}
		});
	});

	// Option Edit
$(".option_edit").click(function(){
  var refer_url = $(this).attr("url");
  var opt_id = $(this).attr("option_edit");
		$.ajax({
			method:'post',
			url:refer_url+'setting/option_edit',
			data:{opt_id:opt_id},
			dataType:'json',
			success:function(response){
		if(response!=''){
		   $("#OptionModal").modal();
		   $("#opt_id").val(response.option.opt_id);
			$("#opt_name").val(response.option.opt_name);
			//	option opt_required		
			var GetRequired = {"1":"Yes", "2":"No"};
			$('.opt_required').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select');
			$('.opt_required').append(option);
			var opt_required=response.option.opt_required;
			$.each(GetRequired, function(key, value ) 
			{
			if(key==opt_required){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.opt_required').append(option);
			});	
			//	
			//	option opt_required
			$('.opt_display').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select');
			$('.opt_display').append(option);
			var opt_display=response.option.opt_display;
			$.each(GetRequired, function(key, value ) 
			{
			if(key==opt_display){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.opt_display').append(option);
			});	
			//	
			//	option status		
			var status1 = {"1":"Active", "2":"In Active"};
			$('.cstatus').find('option').remove();
            var option = $('<option>').attr('value', '').html('Select Status');
			$('.cstatus').append(option);
			var get_status=response.option.opt_status;
			$.each(status1, function(key, value ) 
			{
			if(key==get_status){
			var option = $('<option selected>').attr('value', key).html(value);
			}else{
			var option = $('<option>').attr('value', key).html(value);	
			}
			$('.cstatus').append(option);
			});	
			//	
		 }
			}
		});
	});

// message view 
$(".view-message").click(function(){
  var refer_url = $('#site_url').val();
  var msg_id = $(this).parent().find("#msg_id").val(); 
  var url = refer_url+'profile/messsage_view/'+msg_id;
  window.location.replace(url); 
		
	});

// message Starred 
$(".message-star").click(function(){
   var refer_url = $('#site_url').val();
   var msg_id = $(this).parent().find("#msg_id").val(); 
   var msg_star = $(this).parent().find("#msg_star").val();    
		$.ajax({
			method:'post',
			url:refer_url+'profile/starred_change',
			data:{msg_id:msg_id,msg_star:msg_star},
			dataType:'json',
			success:function(response){			
				// console.log(response);
		// if(response!=''){		   
		   $('#star'+msg_id).html(response.message);
		   $('.msg_star'+msg_id).val(response.star);
		//  }
			}
		});
	});
  $('.select_all').on('click',function(){
        if(this.checked){
            $('.custom-control-input').each(function(){
                this.checked = true;
            });
        }else{
             $('.custom-control-input').each(function(){
                this.checked = false;
            });
        }
    });
   $('.custom-control-input').on('click',function(){
        if($('.custom-control-input:checked').length == $('.custom-control-input').length){
            $('.select_all').prop('checked',true);
        }else{
            $('.select_all').prop('checked',false);
        }
    });
	

	// message Read Starred 
$(".mark_as_read").click(function(){
   var refer_url = $('#site_url').val();
    var current_url = $('#current_url').val();
   var msg_id = [];
        $('.checkbox:checked').each(function(){
            msg_id.push($(this).val());			
        });
        // alert(msg_id);
		$.ajax({
			method:'post',
			url:refer_url+'profile/message_read',
			data:{msg_id:msg_id},
			// dataType:'json',
			success:function(response){	
			if(response=='success'){		
				window.location.href = current_url;
			}
			}
		});
	});

$(".mark_trash").click(function(){
   var refer_url = $('#site_url').val();
    var current_url = $('#current_url').val();
   var msg_id = [];
        $('.checkbox:checked').each(function(){
            msg_id.push($(this).val());			
        });
        // alert(msg_id);
		$.ajax({
			method:'post',
			url:refer_url+'profile/message_trash',
			data:{msg_id:msg_id},
			// dataType:'json',
			success:function(response){	
			if(response=='success'){		
				window.location.href = current_url;
			}
			}
		});
	});
$(".message_trash").click(function(){
   var refer_url = $('#site_url').val();
    var current_url = $('#current_url').val();
   var msg_id = [];
        $('.checkbox:checked').each(function(){
            msg_id.push($(this).val());			
        });
        // alert(msg_id);
		$.ajax({
			method:'post',
			url:refer_url+'profile/message_delete',
			data:{msg_id:msg_id},
			// dataType:'json',
			success:function(response){	
			if(response=='success'){		
				window.location.href = current_url;
			}
			}
		});
	});

$(".reply_message").click(function(){
		$('#reply_message').show();
		$(this).prop('disabled', true);
   
	});
$(".reply_cancel").click(function(){
		$('#reply_message').hide();
		$(this).prop('disabled', false);
   
	});


$(".bell_notification").click(function(){
		$('.bell_notification_list').slideToggle();  
		$('.envelope_notification_list').hide();   
	});
$(".envelope_notification").click(function(){
		$('.envelope_notification_list').slideToggle();  
		$('.bell_notification_list').hide(); 

	});
/*------------Start Model PopUp  SCRIPT---------*/
	
	function showMyModalSetTitle(type,url,id,getstatus) {

		var mode='<div class="modal fade" id="exampleModal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header" style=" display: block; text-align: center;"> <h4 class="modal-title">Do You Want To '+type+' ?</h4></div><div class="modal-body"><h4 style="text-align: center;">Are you sure You Want To '+type+' This ?</h4></div><div class="modal-footer"style=" display: block; text-align: center;"><a href="'+url+id+'/'+getstatus+'"><button type="button" class="btn btn-success btn2 "><i class="fa fa-check" aria-hidden="true"></i> Yes</button></a><button type="button" class="btn btn-warning btn2" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> No</button></div></div></div></div>';
		
		$(mode).modal('show');
	}
	

/*------------Start Image Show  SCRIPT---------*/
    function preview_image() {    
        var total_file = document.getElementById("image_file").files.length;
		if(total_file>1){
			$('#image_file').val('');
			$('#image_preview').empty(); 
			$('#image_file-error').css('display', 'block');
			$('#image_file-error').html("Can't select more than 1 images");
		}else{
			$('#image_preview').empty();
            $('#image_file-error').css('display', 'none');			
		   for (var i = 0; i < total_file; i++) {
			  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i]) + "' style='width:50px;height:50px;margin-right:4px;object-fit: contain;' class='img-thumbnail'>"); 
			}
		}
    }

    function get_preview_image(e) {    
        var total_file = document.getElementById("image_file"+e).files.length;
		if(total_file>1){
			$('#image_file'+e).val('');
			$('#image_preview'+e).empty(); 
			$('#image_file-error').css('display', 'block');
			$('#image_file-error').html("Can't select more than 1 images");
		}else{
			$('#image_preview'+e).empty();
            $('#image_file-error').css('display', 'none');			
		   for (var i = 0; i < total_file; i++) {
			  $('#image_preview'+e).append("<img src='"+URL.createObjectURL(event.target.files[i]) + "' style='width:50px;height:50px;margin-right:4px;object-fit: contain;' class='img-thumbnail'>"); 
			}
		}
    }

  
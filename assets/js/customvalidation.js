/*! Customvalidation.js
* ================
* Custom Validation JS application file for Validate Form. 
* This fileshould be included in all pages.  
*
* @Author  :  Mansih Kumar
* @Created :  06 Nov 2019
*/
          
	
	var login_form = $("#login_form").validate({
                ignore: [],
                rules: {                                            
                        email: {
                                required: true,
                        },
                        password: {
                                required: true,
                        },		
                    }                                        
    });
	var forgot_password = $("#forgot_password").validate({
                ignore: [],
                rules: {                                            
                        email: {
                                required: true,
								 email: true
                        }
                        	
                    }                                        
    });
	var register_form = $("#register_form").validate({
                ignore: [],
                rules: {                          
                        vnd_name: {
                                required: true,
                        },
						 vnd_email: {
                                required: true,
								 email: true,
                        },
                         phone_code: {
                                required: true,                               
                        },
                         phone: {
                                required: true,                               
                        },
                        vnd_gst_no: {
                                required: true,                                
                        },
                        vnd_category: {
                                required: true,                              
                        },
                        vnd_country: {
                                required: true,                              
                        },
                        vnd_state: {
                                required: true,                              
                        },
                        vnd_city: {
                                required: true,                              
                        },
                        vnd_zipcode: {
                                required: true,                              
                        },
                         vnd_zipcode: {
                                required: true,                              
                        },
                        vnd_address: {
                                required: true,                                        
                        }, 
                        vnd_bank_name: {
                                required: true,                                        
                        }, 
                        vnd_holder_name: {
                                required: true,                                        
                        }, 
                        vnd_account_no: {
                                required: true,                                        
                        }, 
                        vnd_ifsc_code: {
                                required: true,                                        
                        }, 
                        vnd_bank_address: {
                                required: true,                                        
                        },  
                        vnd_password: {
                                required: true,
								minlength: 6,			
                        },	
                        confirm_password: {
                                required: true,
								minlength: 6,	
                                 equalTo: '#password2',
                        }, 
                        vnd_product: {
                                required: true,                                        
                        },                        							
                    }
    });
	
var profile_update = $("#profile_update").validate({
                ignore: [],
                rules: { 
				vnd_name: { required: true},
                vnd_email: {required: true,			    email: true},
				vnd_phone: {required: true,
							minlength: 10,
							maxlength: 10},	
                vnd_gendor: {required: true},
                vnd_gst_no: {required: true},
                vnd_dob: {required: true},
                vnd_country: {required: true},
                vnd_state: {required: true},
                vnd_city: {required: true },
                vnd_zipcode: {required: true},
                vnd_address: {required: true}						
                    }                                        
    });
	
	 var change_password = $("#change_password").validate({
                ignore: [],
                rules: {                                            
					    'old_password': {
                                required: true,
								
                        },
						'new_password': {
                                required: true,
                                minlength: 5,
                                maxlength: 10
                        },
                        'confirm_password': {
                                required: true,
                                minlength: 5,
                                maxlength: 10,
                                equalTo: "#password2"
                        },
                    }                                        
                });
				
 var bank_update = $("#bank_update").validate({
                ignore: [],
                rules: { 
					    'vnd_bank_name': {
                                required: true,
								
                        },
						'vnd_holder_name': {
                                required: true,
                        },
                        'vnd_account_no': {
                                required: true,
                        },
						'vnd_ifsc_code': {
                                required: true,
                        },
						'vnd_bank_address': {
                                required: true,
                        }
                    }                                        
                });
				
var brand_add = $("#brand_add").validate({
                ignore: [],
                rules: {
						'brd_name': {
                                required: true,
								
                        },
                        'brd_img': {
                                required: true,
                                
                        },
						'brd_status': {
                                required: true,
                        }				
                    }                                    
                });
 var brand_edit = $("#brand_edit").validate({
                ignore: [],
                rules: {
                        'brd_name': {
                                required: true,
                                
                        },
                        'brd_status': {
                                required: true,
                        }               
                    }                                    
                });				
	var sub_category_add = $("#sub_category_add").validate({
                ignore: [],
                rules: {
					    'cate_id': {
                                required: true,
								
                        },
						'scate_name': {
                                required: true,
								
                        },
						'scate_status': {
                                required: true,
                        }				
                    }                                    
                });
				
var child_category_add = $("#child_category_add").validate({
                ignore: [],
                rules: {
					    'scate_id': {
                                required: true,
								
                        },
						'child_name': {
                                required: true,
								
                        },
						'child_status': {
                                required: true,
                        }				
                    }                                    
                });


var option_add = $("#option_add").validate({
                ignore: [],
                rules: {
                        'opt_name': {
                                required: true,
                                
                        },
                        'opt_required': {
                                required: true,
                                
                        },
                        'opt_display': {
                                required: true,
                        },
                        'opt_status': {
                                required: true,
                        }                  
                    }                                    
                });

var option_value_add = $("#option_value_add").validate({
                ignore: [],
                rules: {
                        'opt_value': {
                                required: true,
                        }          
                    }                                    
                });
var SpecialPriceForm = $("#SpecialPriceForm").validate({
                ignore: [],
                rules: {
                        'sp_pid': {
                                required: true,
                        },
                        'sp_special_price': {
                                required: true,
                        } ,
                        'sp_start_date': {
                                required: true,
                        }, 
                        'sp_end_date': {
                                required: true,
                        }                  
                    }                                    
                });

var VolumeDiscountForm = $("#VolumeDiscountForm").validate({
                ignore: [],
                rules: {
                        'vd_pid': {
                                required: true,
                        },
                        'vd_min_purchase_qty': {
                                required: true,
                        } ,
                        'vd_discount': {
                                required: true,
                        }                
                    }                                    
                });

var ImportProducts = $("#ImportProducts").validate({
                ignore: [],
                rules: {
                        'type': {
                                required: true,
                        },
                        'userfile': {
                                required: true,
                        }              
                    }                                    
                });


				
window.setTimeout(function() {
					$(".alert").fadeTo(800, 0).slideUp(800, function(){
					$(this).remove();
					});
					}, 4000);
					
$(document).ready(function(){
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if(activeTab){
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		} 
		 
	});						
	
	
	
	
	
	
	
	
	
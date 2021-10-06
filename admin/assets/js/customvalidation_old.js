/*! Customvalidation.js
* ================
* Custom Validation JS application file for Validate Form. 
* This fileshould be included in all pages.  
*
* @Author  :  Mansih Kumar
* @Created :  01 Nov 2019
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
	
	var edit_profile = $("#edit_profile").validate({
                ignore: [],
                rules: {                                            
                        mst_ref_id: {
                                required: true,
                        },
                        mst_name: {
                                required: true,
                        },
                 mst_email: {
                                required: true,
								email: true,
                        },	
                   mst_mobile_number: {
                                required: true,
								minlength: 10,
								maxlength: 10,
                        },	
                    mst_address: {
                                required: true,
                        },						
                    }                                        
    });
	
	 var change_password = $("#change_password").validate({
                ignore: [],
                rules: {                                            
					    'old_password': {
                                required: true,
								
                        },
						'password': {
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
				
 var Company_Details = $("#Company_Details").validate({
                ignore: [],
                rules: {                                            
					    'web_company_name': {
                                required: true,
								
                        },
						'web_site_url': {
                                required: true,								
                        },
                        'web_address': {
                                required: true,
                        },
						'web_country': {
                                required: true,
                        },
						'web_pincode': {
                                required: true,
                        },
						'web_support_contact': {
                                required: true,
                        },
						'web_support_email': {
                                required: true,
                        },
						'web_copy_right': {
                                required: true,
                        },
                    }                                        
                });
				
var Email_Settings = $("#Email_Settings").validate({
                ignore: [],
                rules: {                                            
					    'web_email_protocal': {
                                required: true,
								
                        },
						'web_from_email_id': {
                                required: true,
                        },
                        'web_smtp_host_name': {
                                required: true,
                        },
						'web_smtp_port': {
                                required: true,
                        },
						'web_email_id': {
                                required: true,
                        },
						'web_email_password': {
                                required: true,
                        },						
                    }                                        
                });
				
var category_add = $("#category_add").validate({
                ignore: [],
                rules: {
					    'cate_name': {
                                required: true,
								
                        },
                        'cate_icon': {
                                required: true,
                                
                        },
                         'cate_img': {
                                required: true,
                                
                        },
						'cate_status': {
                                required: true,
                        }				
                    }                                    
                });
var category_edit = $("#category_edit").validate({
                ignore: [],
                rules: {
                        'cate_name': {
                                required: true,
                                
                        },
                        'cate_status': {
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

var commission_add = $("#commission_add").validate({
                ignore: [],
                rules: {
                        'cate_id': { required: true},
                        'fees': { required: true}            
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
var Country_add = $("#Country_add").validate({
                ignore: [],
                rules: {
						'cnt_name': {
                                required: true,
								
                        },
						'cnt_status': {
                                required: true,
                        }				
                    }                                    
                });
				
var state_add = $("#state_add").validate({
                ignore: [],
                rules: {
					'cnt_id': {
                                required: true,
								
                        },
						'st_name': {
                                required: true,
								
                        },
						'st_status': {
                                required: true,
                        }				
                    }                                    
                });
	
	var city_add = $("#city_add").validate({
                ignore: [],
                rules: {
					
					'cnt_id': {
                                required: true,
                        },
					   'st_id': {
                                required: true,
                        },						
						'ct_name': {
                                required: true,
                        },
						'ct_status': {
                                required: true,
                        }				
                    } 
                });
var zipcode_add = $("#zipcode_add").validate({
                ignore: [],
                rules: {
					
					'cnt_id': {
                                required: true,
                        },
					   'st_id': {
                                required: true,
                        },	
                       'ct_id': {
                                required: true,
                        },							
						'zc_zipcode': {
                                required: true,
								number: true,
								minlength: 5,
								maxlength: 6,
                        },
						'zc_status': {
                                required: true,
                        }				
                    } 
                });
				
var currency_add = $("#currency_add").validate({
                ignore: [],
                rules: {
					
					'name': {
                                required: true,
                        },
					   'symbol': {
                                required: true,
                        },	
                       'status': {
                                required: true,
                        }	
                    } 
                });
				
var category_tax_add = $("#category_tax_add").validate({
                ignore: [],
                rules: {
                    'txt_name': {
                                required: true,
                        },
					
					'cate_id': {
                                required: true,
                        },
					   'txt_per': {
                                required: true,
                        },	
                       'txt_status': {
                                required: true,
                        }	
                    } 
                });
				
var tax_add = $("#tax_add").validate({
                ignore: [],
                rules: {
					
					'txt_name': {
                                required: true,
                        },
					   'txt_per': {
                                required: true,
                        },	
                       'txt_status': {
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

var dime_unit_add = $("#dime_unit_add").validate({
                ignore: [],
                rules: {                    
                    'ut_dime_name': {
                                required: true,
                        },                      
                         'ut_status': {
                                required: true,
                        }   
                    } 
                });

var weight_unit_add = $("#weight_unit_add").validate({
                ignore: [],
                rules: {                    
                    'ut_weight_name': {
                                required: true,
                        },                      
                         'ut_status': {
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

var edit_shop = $("#edit_shop").validate({
                ignore: [],
                rules: {
                        'vnd_name': {
                                required: true,
                        },        
                         'vnd_email': {
                                required: true,
                                 email: true,
                        },        
                         'vnd_phone': {
                                required: true,
                                 number: true,
                        },
                         'vnd_gst_no': {
                                required: true,                                
                        },
                         'vnd_country': {
                                required: true,                                                           
                        },
                         'vnd_state': {
                                required: true,                                                                                            
                        },
                         'vnd_city': {
                                required: true,                                                           
                        },
                         'vnd_zipcode': {
                                required: true,                                                           
                        }
                    }                                    
                });

var edit_inventory = $("#edit_inventory").validate({
                ignore: [],
                rules: {
                        'int_pid': {
                                required: true,
                        },
                        'int_selleing_price': {
                                required: true,
                                 number: true,
                        },
                        'int_available_qty': {
                                required: true,
                                 number: true,
                        } ,
                        'int_min_purchase_qty': {
                                required: true,
                                 number: true,
                        } ,
                        'int_stock': {
                                required: true,
                        }            
                    }                                    
                });

var edit_special_price = $("#edit_special_price").validate({
                ignore: [],
                rules: {
                        'sp_pid': {
                                required: true,
                        },
                        'sp_special_price': {
                                required: true,
                                 number: true,
                        },
                        'sp_start_date': {
                                required: true,                               
                        } ,
                        'sp_end_date': {
                                required: true,                               
                        } ,
                        'sp_status': {
                                required: true,
                        }            
                    }                                    
                });

var edit_volume_discount = $("#edit_volume_discount").validate({
                ignore: [],
                rules: {
                        'vd_pid': {
                                required: true,
                        },
                        'vd_min_purchase_qty': {
                                required: true,
                                 number: true,
                        },
                        'vd_discount': {
                                required: true, 
                                 number: true,                              
                        } ,
                        'vd_status': {
                                required: true,
                        }            
                    }                                    
                });
var add_content_page = $("#add_content_page").validate({
                ignore: [],
                rules: {
                        'pg_title': {
                                required: true,
                        },
                        'pg_banner_img': {
                                required: true,                               
                        }        
                    }                                    
                });
var edit_content_page = $("#edit_content_page").validate({
                ignore: [],
                rules: {
                        'pg_title': {
                                required: true,
                        }                       
                    }                                    
                });
				
var add_navigation = $("#add_navigation").validate({
                ignore: [],
                rules: {
                        'mn_name': {
                                required: true,
                        },
                         'mn_order': {
                                required: true,
                                number: true,
                        },
                        'pg_banner_img': {
                                required: true,                               
                        }        
                    }                                    
                });

var add_policy = $("#add_policy").validate({
                ignore: [],
                rules: {
                        'pp_title': {
                                required: true,
                        },
                        'pp_type': {
                                required: true,                               
                        }     
                    }                                    
                });

var add_order_cancel = $("#add_order_cancel").validate({
                ignore: [],
                rules: {
                        'ocr_title': {
                                required: true,
                        }  
                    }                                    
                });
var add_testimonial = $("#add_testimonial").validate({
                ignore: [],
                rules: {
                        'tm_name': {
                                required: true,
                        }, 
                        'tm_designation': {
                                required: true,
                        }, 
                        'tm_description': {
                                required: true,
                        }

                    }                                    
                });

var add_coupon = $("#add_coupon").validate({
                ignore: [],
                rules: {
                        'cup_code': {
                                required: true,
                        }, 
                        'cup_name': {
                                required: true,
                        }, 
                        'cup_discount': {
                                required: true,
                              maxlength: 2,
                        }, 
                        'cup_min_order': {
                                required: true,
                        }, 
                        'cup_start_date': {
                                required: true,
                        }, 
                        'cup_end_date': {
                                required: true,
                        }
                    }                                    
                });

var add_banner = $("#add_banner").validate({
                ignore: [],
                rules: {
                        'slr_name': {
                                required: true,
                        }, 
                        'slr_order': {
                                required: true,                               
                        }, 
                        'slr_img': {
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

 var admin_users = $("#admin_users").validate({
                ignore: [],
                rules: {                                            
                        'mst_name': {required: true,},
                        'mst_username': {required: true,},
                        'mst_email': {required: true,email:true},                        
                        'mst_mobile_number': {required: true,minlength: 10,maxlength: 10},   
                        'mst_password': {required: true,minlength: 6,maxlength: 10},
                        'mst_conf_password': {required: true,minlength: 6, maxlength: 10,
                                equalTo: "#mst_password"
                        },
                        'mst_status': {required: true}, 
                    }                                        
                });
                

window.setTimeout(function() {
					$(".alert").fadeTo(800, 0).slideUp(800, function(){
					$(this).remove();
					});
					}, 4000);
	
	
	
	
	
	
	
	
	
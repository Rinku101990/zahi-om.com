<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor Add</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('user/vendors');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Vendors </button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
        <form id="vendor" action=""  method="post" enctype="multipart/form-data" >
       
      <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Personal Information</h3> </div>
            <div class="card-body">
			
		 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>

<div class="row">
                    <div class="col-md-6">
                       <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Name (English)<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" name="vnd_name" placeholder="Enter Name" required="" /></div>
                    </div> 
                  </div>
                </div>
                  <div class="col-md-6">
                       <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Name (Arabic)<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control"  name="vnd_name_ar" placeholder="Enter Name" required="" dir="rtl" style="text-align: right;direction:RTL;" > 
                   
                  </div>
                </div>
                 </div>
                </div>
                 <div class="col-md-6">
                       <div class="row">
                    
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email Id <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" name="vnd_email" placeholder="Enter Email Id"   required="">
                      </div>
                    </div> 
                    
                </div> </div> 

                 <div class="col-md-6">
                       <div class="row">                 
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Country Code <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <select name="phone_code" class="form-control" style="    padding-left: 25px;" >
                 <option value="">Country Code</option>
                 <?php if(country_code() == TRUE){
                  foreach (country_code() as $cncval) {?>
                  <option value="<?=$cncval->cnt_id;?>"><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
                   <?php  } }?>
        </select>
                      </div>
                    </div> 
                    
                </div> </div> 
                 <div class="col-md-6">
                       <div class="row">                 
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Contact No. <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                         <input type="text" name="phone" class="form-control" placeholder="Enter Contact No. "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">
                      </div>
                    </div> 
                    
                </div> </div> 


                 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">VAT NO.<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" name="vnd_gst_no" placeholder="Enter VAT NO."   required="">
                      </div>
                    </div> 
                    
                </div>
</div>
<div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">CR Number<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" class="form-control" name="vnd_cr_no" placeholder="Enter CR Number"   required="">
                      </div>
                    </div> 
                    
                </div>

                 </div>
<div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Category<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <select name="vnd_category" class="form-control" required="">
                    <option value="">Select Category</option>    
                    <option value="1">Supplier</option>
                    <option value="2">Manufacture</option>
                    <option value="3">Wholesaler</option>
                    <option value="4">Retailer</option>
                </select>
                      </div>
                    </div> 
                    
                </div>
              </div>


                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Country<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <select name="vnd_country"  class="form-control Country"   >
 <option value="">--Select Country--</option>
 <?php if(country_code() == TRUE){
                  foreach (country_code() as $cnval) {?>
 <option value="<?php echo $cnt_id=$cnval->cnt_id;?>" ><?=$cnval->cnt_name;?></option>
 <?php }}?>
 </select>
                      </div>
                    </div> 
                    
                </div>

                 </div>

                 <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">State<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <select name="vnd_state" class="form-control State"   >
 <option value="">--Select State--</option>
 </select>
                      </div>
                    </div> 
                    
                </div>

                 </div>


                  <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">City<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <select name="vnd_city"  class="form-control City"   >
 <option value="">--Select City--</option> 
 </select>
                      </div>
                    </div> 
                    
                </div>

                 </div>
                  <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Postal Code<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <select name="vnd_zipcode" class="form-control Zip"   >
 <option value="">--Select Postal Code--</option> 
 </select>
                      </div>
                    </div> 
                    
                </div>

                 </div>

                  <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Address<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <textarea  name="vnd_address"  class="form-control " placeholder="Address"  ></textarea>
                      </div>
                    </div> 
                    
                </div>

                 </div>


              </div>
              
               
                
                
                
				
				
            </div>
			  </div>
            </div>
        </div>
    </div>
    
</div>
<br>

 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Bank Information</h3> </div>
            <div class="card-body">
      
     <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">

<div class="row">
                    <div class="col-md-6">
                       <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Bank Name <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <input type="text" name="vnd_bank_name" class="form-control" placeholder="Bank Name">
        </div>
                    </div> 
                  </div>
                </div>
                 <div class="col-md-6">
                       <div class="row">
                    
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Account Holder Name <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <input type="text" name="vnd_holder_name" class="form-control" placeholder="Account Holder Name ">
                      </div>
                    </div> 
                    
                </div> </div> 

                 <div class="col-md-6">
                       <div class="row">                 
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Account Number <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <input type="text" name="vnd_account_no" class="form-control" placeholder="Account Number ">
                      </div>
                    </div> 
                    
                </div> </div> 
                 <div class="col-md-6">
                       <div class="row">                 
               
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">IBAN Code <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <input type="text" name="vnd_ifsc_code" class="form-control" placeholder="IBAN Code ">
                      </div>
                    </div> 
                    
                </div> </div> 


                 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Bank Address<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <textarea  name="vnd_bank_address"  class="form-control " placeholder="Bank Address "  ></textarea>
                      </div>
                    </div> 
                    
                </div>
</div>

                 


              </div>
              
               
                
                
        
      
            </div>
        </div>
            </div>
        </div>
    </div>
    
</div>

<br>

 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Password Information</h3> </div>
            <div class="card-body">
      
     <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">

<div class="row">
                   

                 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Password<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input type="password" class="form-control" name="vnd_password" placeholder="Enter Password" id="password2" required="">
                      </div>
                    </div> 
                    
                </div>
</div>

  <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Confirm Password<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password"  required="">
                      </div>
                    </div> 
                    
                </div>
</div>

                 


              </div>
              
               
                
               
                
        
      
            </div>
        </div>
            </div>
        </div>
    </div>
    
</div>

<br>

 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-xl-0">
            <div class="card-header">
                <h3 class="card-title">Other Information</h3> </div>
            <div class="card-body">
      
     <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">

<div class="row">
                   

                 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Product Category<span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <input type="text" name="vnd_product" class="form-control" placeholder="Product Category ">
                      </div>
                    </div> 
                    
                </div>
</div>

  <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">File Attach<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input  type="file" name="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.pdf" style="
    padding: 7px;
    border: 1px solid #eaf0f7;
    border-radius: 4px;
">
                      </div>
                    </div> 
                    
                </div>
</div>

 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Logo Upload<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
  
                     <input  type="file" name="vnd_picture" accept="image/*" style="
    padding: 7px;
    border: 1px solid #eaf0f7;
    border-radius: 4px;
">
                      </div>
                    </div> 
                    
                </div>
</div>

<div class="col-md-12">
    <div class="form-group" style="text-align: left;">
        <label class="custom-control custom-checkbox " style="padding-left: 0;">
            <input type="checkbox" name="vnd_term" class="custom-control-input " checked > <span class="custom-control-label" style="padding-left: 30px;">I Agree With terms and Conditions</span> </label>
    </div>
    </div>

                 


              </div>
               
                
        
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit </button>
        <button type="reset" class="btn btn-secondary"><i class="fa fa-remove"></i>  Cancel</button>
               
            </div>
        </div>
    
 
            </div>
        </div>
            </div>
        </div>
    </div>
    
</div>

   </form>
       
        
    </div>
</div>
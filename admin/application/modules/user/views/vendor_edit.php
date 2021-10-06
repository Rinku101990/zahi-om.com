<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor Edit</li>
            </ol>
			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			<a href="<?=base_url('user/vendors');?>">
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Vendors </button>
             </a>	
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
        <form id="vendor_edit" action=""  method="post" enctype="multipart/form-data" >
       
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
                       <input type="text" class="form-control" value="<?=$vend_info->vnd_name;?>" name="vnd_name" placeholder="Enter Name" required="" /></div>
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
                       <input type="text" class="form-control" value="<?=$vend_info->vnd_name_ar;?>" name="vnd_name_ar" placeholder="Enter Name" required="" dir="rtl" style="text-align: right;direction:RTL;" > 
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
                       <input type="text" class="form-control" value="<?=$vend_info->vnd_email;?>" name="vnd_email" placeholder="Enter Email Id"   required="">
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
                  <option value="<?php echo $cnd_code=$cncval->cnt_id;?>"<?php if($vend_info->vnd_phone_code==$cnd_code)echo'selected';?>><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
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
                         <input type="text" name="phone"  value="<?=$vend_info->vnd_phone;?>"  class="form-control" placeholder="Enter Contact No. "  onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">
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
                       <input type="text" class="form-control" name="vnd_gst_no" placeholder="Enter VAT NO." value="<?=$vend_info->vnd_gst_no;?>"   required="">
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
                       <input type="text" class="form-control" name="vnd_cr_no" placeholder="Enter CR Number" value="<?=$vend_info->vnd_cr_no;?>"   required="">
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
                    <option value="1" <?php if($vend_info->vnd_category=='1')echo'selected';?>>Supplier</option>
                    <option value="2"  <?php if($vend_info->vnd_category=='2')echo'selected';?>>Manufacture</option>
                    <option value="3"  <?php if($vend_info->vnd_category=='3')echo'selected';?>>Wholesaler</option>
                    <option value="4"  <?php if($vend_info->vnd_category=='4')echo'selected';?>>Retailer</option>
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
 <option value="<?php echo $cnt_id=$cnval->cnt_id;?>"  <?php if($vend_info->vnd_country==$cnt_id)echo'selected';?>><?=$cnval->cnt_name;?></option>
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
  <?php if($state == TRUE){
                  foreach ($state as $snval) {?>
 <option value="<?php echo $snvalid=$snval->st_id;?>"  <?php if($vend_info->vnd_state==$snvalid)echo'selected';?>><?=$snval->st_name;?></option>
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
                            <label class="form-label">City<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                       <select name="vnd_city"  class="form-control City"   >
 <option value="">--Select City--</option> 
 <?php if($city == TRUE){
                  foreach ($city as $cval) {?>
 <option value="<?php echo $valid=$cval->ct_id;?>"  <?php if($vend_info->vnd_city==$valid)echo'selected';?>><?=$cval->ct_name;?></option>
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
                            <label class="form-label">Postal Code<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                      <select name="vnd_zipcode" class="form-control Zip"   >
 <option value="">--Select Postal Code--</option> 
  <?php if($zipcode == TRUE){
                  foreach ($zipcode as $zval) {?>
 <option value="<?php echo $zvalid=$zval->zc_id;?>"  <?php if($vend_info->vnd_zipcode==$zvalid)echo'selected';?>><?=$zval->zc_zipcode;?></option>
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
                            <label class="form-label">Address<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                        <textarea  name="vnd_address"  class="form-control " placeholder="Address"  ><?=$vend_info->vnd_address;?></textarea>
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
                      <input type="text" name="vnd_bank_name" value="<?=$vend_info->vnd_bank_name;?>" class="form-control" placeholder="Bank Name">
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
                      <input type="text" name="vnd_holder_name"  value="<?=$vend_info->vnd_holder_name;?>"   class="form-control" placeholder="Account Holder Name ">
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
                        <input type="number" name="vnd_account_no"  value="<?=$vend_info->vnd_account_no;?>"    class="form-control" placeholder="Account Number ">
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
                        <input type="text" name="vnd_ifsc_code" value="<?=$vend_info->vnd_ifsc_code;?>"    class="form-control" placeholder="IBAN Code ">
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
                      <textarea  name="vnd_bank_address"  class="form-control " placeholder="Bank Address "  ><?=$vend_info->vnd_bank_address;?></textarea>
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
                       <input type="text" name="vnd_product" class="form-control" placeholder="Product Category " value="<?=$vend_info->vnd_product;?>">
                      </div>
                    </div> 
                    
                </div>
</div>
</div>

<!--  <div class="col-md-6">-->
<!--                         <div class="row">-->
<!--                    <div class="col-sm-6 col-md-4">-->
<!--                        <div class="form-group">-->
<!--                            <label class="form-label">File Attach<span class="text-red"></span></label>-->
<!--                           </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-6 col-md-8">-->
<!--                        <div class="form-group">                          -->
<!--                     <input  type="file" name="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.pdf" style="-->
<!--    padding: 7px;-->
<!--    border: 1px solid #eaf0f7;-->
<!--    border-radius: 4px;-->
<!--">-->
<!--                      </div>-->
<!--                    </div> -->
                    
<!--                </div>-->
<!--</div>-->
<div class="row">
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
 <input  type="hidden" name="prev_img"  value="<?=$vend_info->vnd_picture;?>">
 <?php if(!empty($vend_info->vnd_picture)){?>
                   <img src="<?=base_url('../seller/uploads/profile/').$vend_info->vnd_picture;?>" style="width:60px;height: 60px;">
                   <?php }?>
                      </div>
                    </div> 
                   
                    
                </div>
</div>
     </div>

              <div class="row">

 <div class="col-md-6">
                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Banner Category Upload<span class="text-red"></span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
  
                     <input  type="file" name="vnd_banner_img" accept="image/*" style="
    padding: 7px;
    border: 1px solid #eaf0f7;
    border-radius: 4px;
">
 <input  type="hidden" name="prev_banner_img"  value="<?=$vend_info->vnd_banner_img;?>">
 <?php if(!empty($vend_info->vnd_banner_img)){?>
                   <img src="<?=base_url('uploads/category/').$vend_info->vnd_banner_img;?>" style="width:100px;height: 60px;">
                   <?php }?>
                      </div>
                    </div> 
                   
                    
                </div>
</div>



                 


              </div>
               
                
        
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
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
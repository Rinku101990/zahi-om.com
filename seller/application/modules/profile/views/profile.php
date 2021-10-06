<style>
.slick-slide{display:block;}
</style>

		
		<section class="main_content_area my_account">
				<div class="container">
	                <div class="account_dashboard">
	                    <div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="breadcrumb_content">
	         <div class="breadcrumb_header">
	  <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> My Account</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title">
	                            <h3>My Account</h3>
	                        </div>
							<br>
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="account_dashboard ">
	                    <div class="row">
	                       
<div class="col-sm-12 col-md-12 col-lg-12">
<ul role="tablist" class="nav  dashboard-list" id="myTab">
<li><a href="#dashboard" data-toggle="tab" class="nav-link active">My Account </a></li>
 <li> <a href="#orders" data-toggle="tab" class="nav-link">Bank Account</a></li>
                                       
</ul>

<hr style="margin-top: -9px;margin-bottom: 20px;">
	                            <!-- Tab panes -->
<div class="tab-content ">
<div class="tab-pane fade show active" id="dashboard">
	                                   
<div class="row">
	                       
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="row">
            <div class="col-xl-12 col-lg-6 mb-4">
			<div class=" bg-gray rounded p-4">
   <div class="row align-items-center" id="profileImageFrmBlock">
   <div class="col-6">
 <div class="avtar avtar--large">
                                                        <?php if(empty($this->vendor->vnd_picture)){?>
 <img src="<?=base_url('uploads/profile/avatar.png');?>"  class="img-responsive"  />
 <?php }else{?>
 <img src="<?=base_url('uploads/profile/').$this->vendor->vnd_picture;?>" class="img-responsive " />
 <?php }?>
                            <!--img src=""-->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="btngroup--fix">
          <form  name="frmProfile" method="post" enctype="multipart/form-data" action="<?=base_url('profile/profile_image');?>">
		  <span class="btn btn--primary btn--sm btn--fileupload mt-1">
         <input  accept="image/*" type="file" name="vnd_picture" onchange="this.form.submit()">Change   
		 </span>
                                                           <a class="btn btn--primary-border btn--sm mt-1" href="<?=base_url('profile/remove_image');?>" >Remove</a>
                                                        </form>
                 </div>
                    </div>
                </div>
				    </div>
            </div>
            <div class="col-xl-12 col-lg-6 mb-4">
          <div class=" bg-gray rounded p-4"> <div class="align-items-center">
          <h5>Preferred Dashboard </h5>
             <div class="switch-group">
                        <ul class="switch setactive-js">                              <!--  <li><a href="javascript:void(0)" onclick="setPreferredDashboad(1)">Buyer</a></li>-->                                                                                   <li class="is-active"><a href="javascript:void(0)" onclick="setPreferredDashboad(2)">Seller</a></li>
                        	 <li class="is-active"><a href="javascript:void(0)" onclick="setPreferredDashboad(2)"><?php $vnd_category=$this->vendor->vnd_category;
                        	  if($vnd_category=='1'){echo'Supplier';}
                        	  else if($vnd_category=='2'){echo'Manufacture';}
                        	    else if($vnd_category=='3'){echo'Wholesaler';}
                        	     else if($vnd_category=='4'){echo'Retailer';}
                        	  ?></a></li>
                                                    </ul>
                    </div>
                </div>
				</div>
                            </div>
        </div>
</div>	
<div class="col-sm-12 col-md-8 col-lg-8">
<div class="account_login_form">
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>  
	<form id="profile_update" action="" method="post">
<div class="row">
 <div class="col-sm-6 col-md-6">
 <label>Full Name (English) <span class="red">*</span></label>
 <input type="text" name="vnd_name" value="<?=$this->vendor->vnd_name;?>" />
 </div>
  <div class="col-sm-6 col-md-6">
 <label>Full Name (Arabic)<span class="red">*</span></label>
 <input type="text" name="vnd_name_ar" value="<?=$this->vendor->vnd_name_ar;?>" dir="rtl" style="text-align: right;direction:RTL;" />
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>Email Address <span class="red">*</span></label>
 <input type="text" name="vnd_email" value="<?=$this->vendor->vnd_email;?>" disabled readonly />
 </div>

 
 <div class="col-sm-6 col-md-6">
 <label>Contact No. <span class="red">*</span></label><br>
  	
 <div class="col-xs-6" style="display: inline-block;width: 48.5%;">
  <select name="vnd_phone_code" class="form-control"  required>
                                        <option value="">Country Code</option>
                                        <?php if(country_code() == TRUE){
                                            foreach (country_code() as $cncval) {?>
                                                <option value="<?php echo $cnt_id=$cncval->cnt_id;?>" <?php if($this->vendor->vnd_phone_code==$cnt_id) echo'selected';?>><?=$cncval->cnt_name;?> (+<?=$cncval->cnt_code;?>)</option>
                                                <?php 
                                            }
                                        }?>
                                    </select>
</div>
<div class="col-xs-6" style="display: inline-block;width: 49.5%;">
 <input type="text" name="vnd_phone" value="<?=$this->vendor->vnd_phone;?>" />
</div>
 
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>Gendor <span class="red">*</span></label>
 <div>
 <input type="radio" name="vnd_gendor" value="1" <?php if($this->vendor->vnd_gendor=='1'
 )echo'checked';?> />&nbsp; Male &nbsp;&nbsp;
  <input type="radio" name="vnd_gendor" value="2"   <?php if($this->vendor->vnd_gendor=='2'
 )echo'checked';?> />&nbsp; Female
 </div>
 </div>

  <div class="col-sm-6 col-md-6">
 <label>VAT Number <span class="red"></span></label>
 <input type="text" name="vnd_gst_no" value="<?=$this->vendor->vnd_gst_no;?>"   />
 </div>
  <div class="col-sm-6 col-md-6">
 <label>Date Of Birth <span class="red">*</span></label>
 <input type="text" name="vnd_dob" class="input-group date" value="<?=$this->vendor->vnd_dob;?>"   />
 </div>
 
 
 <div class="col-sm-6 col-md-6">
 <label>Country <span class="red">*</span></label>
 <select name="vnd_country" class="form-control Country"   >
 <option value="">--Select--</option>
 <?php if(!empty($country)){
 foreach($country AS $clist){?>
 <option value="<?php echo $cnt_id=$clist->cnt_id;?>" <?php if($this->vendor->vnd_country==$cnt_id
 )echo'selected';?>><?=$clist->cnt_name;?></option>
 <?php }}?>
 </select>
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>State <span class="red">*</span></label>
 <select name="vnd_state"  class="form-control State"   >
 <option value="">--Select--</option>
 <?php if(!empty($state)){
 foreach($state AS $slist){
 if($this->vendor->vnd_country==$slist->cnt_id){?>
 <option value="<?php echo $sid=$slist->st_id;?>" <?php if($this->vendor->vnd_state==$sid
 )echo'selected';?>><?=$slist->st_name;?></option>
 <?php }}}?>
 </select>
 </div>
 <div class="col-sm-6 col-md-6">
 <label>City <span class="red"></span></label>
 <select name="vnd_city"  class="form-control City"   >
 <option value="">--Select--</option>
 <?php if(!empty($city)){
 foreach($city AS $ctlist){
if($this->vendor->vnd_state==$ctlist->st_id){?>
 <option value="<?php echo $cid=$ctlist->ct_id;?>" <?php if($this->vendor->vnd_city==$cid
 )echo'selected';?>><?=$ctlist->ct_name;?></option>
 <?php }}}?>
 </select>
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>Postal Code <span class="red"></span></label>
 <select name="vnd_zipcode" class="form-control Zipcode"   >
 <option value="">--Select--</option>
 <?php if(!empty($zipcode)){
 foreach($zipcode AS $zlist){
 	if($this->vendor->vnd_city==$zlist->ct_id){?>
 <option value="<?php  echo $ZID=$zlist->zc_id;?>" <?php if($this->vendor->vnd_zipcode==$ZID
 )echo'selected';?>><?=$zlist->zc_zipcode;?></option>
 <?php }}}?>
 </select>
 </div>
  </div>
   <div class="row">
  <div class="col-sm-6 col-md-6">
 <label>Address <span class="red"></span></label>
 <textarea name="vnd_address" class="form-control" style="height:100px"  ><?=$this->vendor->vnd_address;?></textarea>
 </div>
  <div class="col-sm-6 col-md-6">
 <label>About Me <span class="red"></span></label>
 <textarea rows="5" name="vnd_about" class="form-control" style="height:100px"   ><?=$this->vendor->vnd_about;?></textarea>
 </div>
 
 
 
 
 </div>
<br/>
<div class="save_button primary_btn default_button">
<input type="submit" class="btn_submit" name="btn_submit" value="Save Changes">
	                                                    </div>
	                                                </form>
	                                            </div>
</div>								   
</div>								   
									   
									   
</div>
<div class="tab-pane fade" id="orders">
<div class="col-sm-12 col-md-8 col-lg-8">
<div class="account_login_form">
<?php $bmsg=$this->session->flashdata('bmsg');  
	if($bmsg){  ?>
	
<div class="alert alert-<?php echo $bmsg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $bmsg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $bmsg['type'] ?></strong> <?php echo $bmsg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>                                                <form id="bank_update" action="<?=base_url('profile/bank');?>" method="post">
<div class="row">
 <div class="col-sm-6 col-md-6">
 <label>Bank Name <span class="red">*</span></label>
 <input type="text" name="vnd_bank_name" value="<?=$this->vendor->vnd_bank_name;?>" />
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>Account Holder Name <span class="red">*</span></label>
 <input type="text" name="vnd_holder_name" value="<?=$this->vendor->vnd_holder_name;?>"  />
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>Account Number <span class="red">*</span></label>
 <input type="text" name="vnd_account_no" value="<?=$this->vendor->vnd_account_no;?>" />
 </div>
 
 <div class="col-sm-6 col-md-6">
 <label>IFSC Code <span class="red">*</span></label>
 <input type="text" name="vnd_ifsc_code" value="<?=$this->vendor->vnd_ifsc_code;?>" />
 </div>
 
 
 
 
 
  <div class="col-sm-12 col-md-12">
 <label>Bank Address <span class="red">*</span></label>
 <textarea name="vnd_bank_address" class="form-control" style="height:100px"  ><?=$this->vendor->vnd_bank_address;?></textarea>
 </div>
 
 
 
 
 </div>
<br/>
<div class="save_button primary_btn default_button">
	                                                <input type="submit" class="btn_submit" name="btn_submit" value="Save Changes">
	                                                    </div>
	                                                </form>
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
	                </div>
	            </div>       	
            </section>
            </section>
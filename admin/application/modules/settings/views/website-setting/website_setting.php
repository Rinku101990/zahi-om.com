<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">General Setting Management</li>
            </ol>


			<div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
			 <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
			
			
			 
			 </div> </div>
           
        </div>
        <!-- Page-header closed -->
       
       
      
       
        <!-- row opened -->
        <div class="row">
            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="card-pay">
                            <ul class="tabs-menu nav" id="myTab">
                                <li class=""><a href="#tab20" class="active show" data-toggle="tab"><i class="fa fa-industry"></i> Company Details</a></li>
                                <li><a href="#tab21" data-toggle="tab" class=""><i class="fa fa-envelope"></i> Email Settings</a></li>
                                <li><a href="#tab22" data-toggle="tab" class=""><i class="fa fa-link"></i> Social Media</a></li>
								 <li><a href="#tab23" data-toggle="tab" class=""><i class="fa fa-search"></i> SEO Settings</a></li>
                            </ul>
                            <div class="tab-content">
							  	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	 <div class=" row">
	 <div class="col-md-9">
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div></div></div>
	<?php }?>
                                <div class="tab-pane active show" id="tab20">
                                   <div class="card-body">
								   


   <form  id="Company_Details" class="form-horizontal"  method="post"  enctype="multipart/form-data">  
        <div class="form-group row">
            <label class="col-md-3 form-label">Company Name  <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_company_name" value="<?php echo $this->website->web_company_name; ?>" placeholder="Enter Company Name"> </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-label">Hours Of Operation</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_hour_of_operation" value="<?php echo $this->website->web_hour_of_operation; ?>" placeholder="Enter Hours Of Operation"> </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-label">Company Logo  <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="web_company_logo" placeholder="Enter Company Logo">
</br>
												 <img src="<?php echo site_url('uploads/website/logo/').$this->website->web_company_logo;?>" alt="company-logo">
                                                  <input type="hidden" name="web_company_logo" value="<?php echo $this->website->web_company_logo; ?>"/>				</div>
        </div>
		  <div class="form-group row">
            <label class="col-md-3 form-label">Favicon Icon  <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="web_favicon_icon" placeholder="Password"> 
				 </br>
    <img src="<?php echo site_url('uploads/website/favicon/').$this->website->web_favicon_icon;?>" alt="Favicon-Icon">
                                                 <input type="hidden" name="web_favicon_icon" value="<?php echo $this->website->web_favicon_icon; ?>"/></div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Site URL <span class="text-red">*</span></label>
            <div class="col-md-8">
             <input type="text" class="form-control" name="web_site_url" value="<?php echo $this->website->web_site_url; ?>" placeholder="Enter Site URL"> </div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Branch Addres </label>
            <div class="col-md-8">
              <textarea rows="3" class="form-control" name="web_address" placeholder="Enter Branch Address"><?php echo $this->website->web_address; ?></textarea></div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Google Map Link</label>
            <div class="col-md-8">
                 <textarea rows="3" class="form-control" name="web_addressmap" placeholder="Enter Google Map Link"><?php echo $this->website->web_addressmap; ?></textarea></div>
        </div>
			<div class="form-group row">
            <label class="col-md-3 form-label">Timezone<span class="text-red">*</span></label>
            <div class="col-md-8">
                <select class="form-control" name="web_timezone" >
				<option value="">--Select--</option>
				<?php if(!empty($timzone)){
					foreach($timzone AS $time_list){
				?>
					<option value="<?php echo $ZID=$time_list->zone_id;?>" <?php if($this->website->web_timezone==$ZID)echo'selected'; ?>><?=$time_list->zone_name;?></option>
				<?php }}?>
				</select>				
				</div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Country <span class="text-red">*</span></label>
            <div class="col-md-8">
			 <select class="form-control" name="web_country" >
				<option value="">--Select Country--</option>
				<?php if(!empty($country)){
					foreach($country AS $cnt_list){
				?>
					<option value="<?php echo $CID=$cnt_list->cnt_id;?>" <?php if($this->website->web_country==$CID)echo'selected'; ?>><?=$cnt_list->cnt_name;?></option>
				<?php }}?>
				</select>	
                </div>
        </div>
	<div class="form-group row">
            <label class="col-md-3 form-label">Zip Code <span class="text-red">*</span></label>
            <div class="col-md-8">
			<select class="form-control" name="web_pincode" >
				<option value="">--Select Zip Code--</option>
				<?php if(!empty($zipcode)){
					foreach($zipcode AS $zc_list){
				?>
					<option value="<?php echo $ZID=$zc_list->zc_id;?>" <?php if($this->website->web_pincode==$ZID)echo'selected'; ?>><?=$zc_list->zc_zipcode;?></option>
				<?php }}?>
				</select>	
              </div>
        </div>
        <div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Local Shipping Charge<span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_local_shipping" value="<?php echo $this->website->web_local_shipping; ?>" placeholder="Enter Local Shipping Charge" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> </div>
        </div>
          <div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Local Free Shipping Min Amount<span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_local_free_shipping" value="<?php echo $this->website->web_local_free_shipping; ?>" placeholder="Enter Local Free Shipping Min Amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> </div>
        </div>
         <div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">National Shipping Charge<span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_national_shipping" value="<?php echo $this->website->web_national_shipping; ?>" placeholder="Enter National Shipping Charge" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> </div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Currency <span class="text-red">*</span></label>
            <div class="col-md-8">
			<select class="form-control" name="web_currency" >
				<option value="">--Select Currency--</option>
				<?php if(!empty($currency)){
					foreach($currency AS $cr_list){
				?>
					<option value="<?php echo $CRID=$cr_list->id;?>" <?php if($this->website->web_currency==$CRID)echo'selected'; ?>><?=$cr_list->name;?></option>
				<?php }}?>
				</select>	
               </div>
        </div>
		<div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Customer Support Number (24*7) <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_support_contact" value="<?php echo $this->website->web_support_contact; ?>" placeholder="Enter Support Number"> </div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Support Email ID (24*7) <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_support_email" value="<?php echo $this->website->web_support_email; ?>" placeholder="Enter Support Email Id"> </div>
        </div>
		<div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Footer Copy Right <span class="text-red">*</span></label>
            <div class="col-md-8">
                <textarea rows="2" class="form-control" name="web_copy_right"  placeholder="Enter Footer Copy Right"><?php echo $this->website->web_copy_right; ?></textarea> </div>
        </div>
      
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
               
            </div>
        </div>
    </form>
</div>
                                   
 </div>
 
 <div class="tab-pane" id="tab21">
 <div class="card-body">

   <form  id="Email_Settings" class="form-horizontal"  method="post"  >  
        <div class="form-group row">
            <label class="col-md-3 form-label">Default Email Protocal <span class="text-red">*</span></label>
            <div class="col-md-8">
			<select class="form-control " name="web_email_protocal">
		<option value="" >--Select--</option>
		<option value="Email" <?php if($this->website->web_email_protocal=='Email')echo'selected';?>>Email</option>
		<option value="SMTP Email" <?php if($this->website->web_email_protocal=='SMTP Email')echo'selected';?>>SMTP Email</option>
        </select>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-label">From E-mail ID <span class="text-red">*</span></label>
            <div class="col-md-8">
           <input type="text" class="form-control" name="web_from_email_id" placeholder="Enter From E-mail ID" value="<?php echo $this->website->web_from_email_id; ?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-label">Bcc E-mail ( Comma Separated )</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_bcc_email_id" placeholder="Enter Like, abc@gmail.com,abcd@gmail.com" value="<?php echo $this->website->web_bcc_email_id; ?>"> </div>
        </div>
		  <div class="form-group row">
            <label class="col-md-3 form-label">SMTP Host Name <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_smtp_host_name" placeholder="Enter SMTP Host Name" value="<?php echo $this->website->web_smtp_host_name; ?>"> </div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">SMTP Port    <span class="text-red">*</span></label>
            <div class="col-md-8">
             <input type="text" class="form-control" name="web_smtp_port" value="<?php echo $this->website->web_smtp_port; ?>" placeholder="Enter SMTP Port"> </div>
        </div>
		
		
			<div class="form-group row">
            <label class="col-md-3 form-label">Email ID  <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_email_id" value="<?php echo $this->website->web_email_id; ?>"  placeholder="Enter Email ID"> </div>
        </div>
		<div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Password <span class="text-red">*</span></label>
            <div class="col-md-8">
                <input type="password" class="form-control" name="web_email_password" value="<?php echo $this->website->web_email_password; ?>" placeholder="Enter Password"> </div>
        </div>
		
		
      
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
               
            </div>
        </div>
    </form>
</div>                                   
  </div>
  
  <div class="tab-pane" id="tab22">
   <div class="card-body">
  
   <form class="form-horizontal"  method="post"  > 
        
        <div class="form-group row">
            <label class="col-md-3 form-label">Facebook Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_facebook_link" value="<?php echo $this->website->web_facebook_link; ?>" placeholder="Enter Facebook Link"> </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-label">Linkedin Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_linkedin_link" value="<?php echo $this->website->web_linkedin_link; ?>" placeholder="Enter Linkedin Link"> </div>
        </div>
		  <div class="form-group row">
            <label class="col-md-3 form-label">Instagram Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_instagram_link" value="<?php echo $this->website->web_instagram_link; ?>" placeholder="Enter Instagram Link"> </div>
        </div>
		<div class="form-group row">
            <label class="col-md-3 form-label">Twitter Link</label>
            <div class="col-md-8">
             <input type="text" class="form-control" name="web_twitter_link" value="<?php echo $this->website->web_twitter_link; ?>"  placeholder="Enter Twitter Link"> </div>
        </div>
		
		<div class="form-group row">
            <label class="col-md-3 form-label">Google+ Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_google_plus_link" value="<?php echo $this->website->web_google_plus_link; ?>" placeholder="Enter Google+ Link"> </div>
        </div>
			<div class="form-group row">
            <label class="col-md-3 form-label">Youtube Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_youtube_link" value="<?php echo $this->website->web_youtube_link; ?>" placeholder="Enter Youtube Link"> </div>
        </div>
		<div class="form-group row">
            <label for="inputEmai2" class="col-md-3 form-label">Pinterest Link</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="web_pinterest_link" value="<?php echo $this->website->web_pinterest_link; ?>" placeholder="Enter Pinterest Link"> </div>
        </div>
		
		
      
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
               
            </div>
        </div>
    </form>
</div>                             
 </div>
 
 <div class="tab-pane" id="tab23">
   <div class="card-body">
      <form class="form-horizontal"  method="post"  > 
      <p><strong>Web Site Meta Configuration Detail For Home Page.</strong></p>
<br>	  
        <div class="form-group row">
            <label class="col-md-3 form-label">Meta Title</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="web_meta_title" placeholder="Enter Meta Title"><?php echo $this->website->web_meta_title; ?></textarea> </div>
        </div>
		    <div class="form-group row">
            <label class="col-md-3 form-label">Meta Keyword</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="web_meta_keyword" placeholder="Enter Meta Keyword"><?php echo $this->website->web_meta_keyword; ?></textarea> </div>
        </div>
		    <div class="form-group row">
            <label class="col-md-3 form-label">Meta Description</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="web_meta_description" placeholder="Enter Meta Description"><?php echo $this->website->web_meta_description; ?></textarea> </div>
        </div>
        
      
        <div class="form-group mb-0 mt-3 row justify-content-end">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
               
            </div>
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
        <!-- row closed -->
    </div>
</div>
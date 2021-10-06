<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Shop Detail</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('catalog/shop');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Shop </button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Shop Detail</h3> </div>
	<form id="edit_shop" action="" method="POST">
       <div class="card-body">
	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
      <strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?>
    </div> 	
	<?php } ?>
	 
	 
                        <div class="row">
						
                            <div class="col-lg-6 col-md-12">

                                   <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Full Name <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" name="vnd_name" value="<?=$shop->vnd_name;?>" class="form-control"  placeholder="Full Name"> </div>
                    </div> 
                    
                </div>
                            
                            </div>
                           
                           <div class="col-lg-6 col-md-12">

                             <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email Address <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input type="email" class="form-control" name="vnd_email" value="<?=$shop->vnd_email;?>" placeholder="Email Address" disabled>  </div>
                    </div> 
                    
                </div>
                              
                            </div>
                           
                            <div class="col-lg-6 col-md-12">

                                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Contact No.  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <input type="text" class="form-control" name="vnd_phone" value="<?=$shop->vnd_phone;?>" placeholder="Contact No." maxlength="10" minlength="10" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))">  </div>
                    </div> 
                    
                </div>
                                       </div>

                              <div class="col-lg-6 col-md-12">

                                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">GST Number  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <input type="text" class="form-control" name="vnd_gst_no" value="<?=$shop->vnd_gst_no;?>" placeholder="GST Number" >   </div>
                    </div> 
                    
                </div>
                               
                            </div>

                             <div class="col-lg-6 col-md-12">

                                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Country  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                     <select name="vnd_country" url="<?=base_url();?>"class="form-control Country"   >
                                     <option value="">--Select--</option>
                                     <?php if(!empty($country)){
                                     foreach($country AS $clist){?>
                                     <option value="<?php echo $cnt_id=$clist->cnt_id;?>" <?php if($shop->vnd_country==$cnt_id
                                     )echo'selected';?>><?=$clist->cnt_name;?></option>
                                     <?php }}?>
                                     </select>   </div>
                    </div> 
                    
                </div>
                               
                           
                        </div>
                       

                    <div class="col-lg-6 col-md-12">

                         <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">State  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                    <select name="vnd_state" url="<?=base_url();?>" class="form-control State"   >
                                     <option value="">--Select--</option>
                                     <?php if(!empty($state)){
                                     foreach($state AS $slist){
                                    if($shop->vnd_country==$slist->cnt_id){?>
                                     <option value="<?php echo $sid=$slist->st_id;?>" <?php if($shop->vnd_state==$sid
                                     )echo'selected';?>><?=$slist->st_name;?></option>
                                     <?php }}}?>
                                     </select>   </div>
                    </div> 
                    
                </div>
                                
                           
                        </div>
                          <div class="col-lg-6 col-md-12">

                             <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">City  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                  <select name="vnd_city" url="<?=base_url();?>" class="form-control City"   >
                                     <option value="">--Select--</option>
                                     <?php if(!empty($city)){
                                     foreach($city AS $ctlist){
                                 if($shop->vnd_state==$ctlist->st_id){?>
                                     <option value="<?php echo $cid=$ctlist->ct_id;?>" <?php if($shop->vnd_city==$cid
                                     )echo'selected';?>><?=$ctlist->ct_name;?></option>
                                     <?php }}}?>
                                     </select> </div>
                    </div> 
                    
                </div>
                              
                           
                        </div>

                        <div class="col-lg-6 col-md-12">

                              <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Zip Code  <span class="text-red">*</span></label>
                           </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                <select name="vnd_zipcode" class="form-control Zip"   >
                                     <option value="">--Select--</option>
                                     <?php if(!empty($zipcode)){
                                     foreach($zipcode AS $zlist){
                                        if($shop->vnd_city==$zlist->ct_id){?>
                                     <option value="<?php  echo $ZID=$zlist->zc_id;?>" <?php if($shop->vnd_zipcode==$ZID
                                     )echo'selected';?>><?=$zlist->zc_zipcode;?></option>
                                     <?php }}}?>
                                     </select> </div>
                    </div> 
                    
                </div>
                              
                             
                                
                           
                        </div>
                       							 
						
						
                       
                    </div>
                    <div class="card-footer1"> <button type="submit" class="btn btn-success mt-1">Save Changes</button> </div>
					</form>
					
					<br>
					
                </div>
               
            </div>
        </div>
        <!-- row closed -->
        
    </div>
</div>
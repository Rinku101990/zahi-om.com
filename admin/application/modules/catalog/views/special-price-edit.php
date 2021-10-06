<style type="text/css">.input-icon {
    font-size: 15px;
    position: absolute;
    width: 50px;
    height: 50px;
    line-height: 30px;
    display: block;
    top: 6px;
    left: 2px;
    text-align: center;
    color: #9fa1a2;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    z-index: 2;
}</style>
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Special Price Detail</li>
            </ol>
            <div class="mt-3 mt-lg-0"> <div class="d-flex align-items-center flex-wrap text-nowrap"> 
             <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            <a href="<?=base_url('catalog/special-price');?>">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Special Price </button>
             </a>   
            
             
             </div> </div>
            
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
        
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Special Price Detail</h3> </div>
	<form id="edit_special_price" action="" method="POST">
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
                            <label class="form-label">Product Name <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                   <input type="text" name="sp_pid" value="<?=getProductName($special_price->sp_pid);?>" class="form-control"  placeholder="Product Name" disabled>  </div>
                    </div> 
                    
                </div>
                                
                            </div>
                           
                           <div class="col-lg-6 col-md-12">
                             <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Special Price (<?=currency($this->website->web_currency);?>) <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">                          
                  <input type="text" class="form-control" name="sp_special_price" value="<?=$special_price->sp_special_price;?>" placeholder="Special Price" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" >  </div>
                    </div> 
                    
                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-12">
                                    <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Start Date  <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">   
                          <i class="fa fa-calendar input-icon"></i>                       
                  <input type="text" class="form-control input-group date" name="sp_start_date" value="<?=date('Y-m-d',strtotime($special_price->sp_start_date));?>" placeholder="Start Date "  style=" padding-left: 28px;">  </div>
                    </div> 
                    
                </div>
                          
                            </div>

                   <div class="col-lg-6 col-md-12">
                 <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">End Date  <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">   
                          <i class="fa fa-calendar input-icon"></i>                       
                  <input type="text" class="form-control input-group date" name="sp_end_date" value="<?=date('Y-m-d',strtotime($special_price->sp_end_date));?>" placeholder="End Date" style=" padding-left: 28px;" > </div>
                    </div> 
                    
                </div>
                  </div>

                             <div class="col-lg-6 col-md-12">
                                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Status  <span class="text-red">*</span></label>
                           </div>
                    </div>
          <div class="col-sm-6 col-md-8">
                        <div class="form-group">                         
                  <select name="sp_status" class="form-control "   >
                                     <option value="">--Select--</option>
                                      <option value="1" <?php if($special_price->sp_status=='1')echo'selected';?>>Active</option>
                                       <option value="2" <?php if($special_price->sp_status=='2')echo'selected';?>>In-Active</option>
                                   
                                     </select></div>
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
                  <link rel="stylesheet" href="<?=base_url();?>assets/css/message.css">
                  <link href="<?=base_url();?>../admin/assets/css/default.css" rel="stylesheet">
	  <link rel="stylesheet" href="<?=base_url();?>../admin/assets/css/skins.css">
	<link rel="stylesheet" href="<?=base_url();?>../admin/assets/plugins/summernote/summernote-bs4.css">
<style>
.slick-slide{display:block;}
a.btn.btn-primary.btn-lg.btn-block {
	width: 100%;
    color: #fff;
    height: auto;  
    box-shadow: 0 5px 10px rgb(34, 5, 191,0.3);
}
card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
textarea.form-control {
    height: auto;
    margin-bottom: 10px;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 0.9375rem;
    line-height: 1.84615385;
    border-radius: 3px;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    box-shadow: 0 2px 5px 0 rgb(234, 227, 227);
}
.btn-sm, .btn-group-sm>.btn {
    padding: .2rem .7rem;
    font-size: .7rem;
}
a.btn.mini.blue,a.btn.mini.tooltips{
	    color: #111 !important;
    width: 100%;
    padding: 3px 13px;
}
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
	                            <span> My Messsage</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('message_sidebar');?>
	                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title">Compose new message</h3>
         <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>
      </div>
       <form action="<?=base_url('profile/message_save');?>" method="post">
      <div class="card-body">
        
            <div class="form-group">
               <div class="row align-items-center">
                  <label class="col-sm-2">To</label> 
                  <div class="col-sm-10"> <input type="text" name="msg_to" value="Admin"  class="form-control" readonly="" disabled=""> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row align-items-center">
                  <label class="col-sm-2">Subject</label> 
                  <div class="col-sm-10"> <input type="text" name="msg_subject" class="form-control" required="" /> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row ">
                  <label class="col-sm-2">Message</label> 
                  <div class="col-sm-10"> 
                  	<textarea rows="5" name="msg_message" class="form-control " id="summernote8" style="height:100px" required=""></textarea></div>
               </div>
            </div>

        
      </div>
      <div class="card-footer d-sm-flex">
        
         <div class="btn-list ml-auto"> <button type="button" class="btn btn-danger btn-space" style=" width: auto; height: auto;">Cancel</button> <button type="submit" class="btn btn-primary btn-space" style=" width: auto; height: auto;">Send message</button> </div>
      </div>
       </form>
   </div>
</div>
</div>
	                </div>
	                                    
	                                          </div>
	                                
	                                
	                               
	                          
	                </div>
	            </div>       	
            </section>
      
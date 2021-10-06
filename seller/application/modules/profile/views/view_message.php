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
i.fa.fa-star.inbox-started {
    color: #ffab00;
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
	                            <span> View Message</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('message_sidebar');?>
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	            
      <div class="card">
         <div class="card-header" style="background: #fff">
            <h3 class="card-title"><?=$message->msg_subject;?></h3>
            <div class="card-options">
            <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-icon-text mr-2 mb-2 mb-md-0" style=" width: auto; height: auto;"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            </div>
         </div>
         <div class="card-body">
   <div class="email-media">
      <div class="mt-0 d-sm-flex">
      	<?php $sender=sender($message->msg_sender);
      	$reciver=sender($message->msg_receiver);
      	if(empty($message->msg_sender)){
      		if(empty($sender->picture)){
      		?>
         <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('../admin/uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }?>
         <?php }else{if(empty($sender->picture)){?> 
         	<img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }}?>
         <div class="media-body">
            <div class="float-right d-none d-md-flex fs-15">
       <small class="mr-3"><?=date('M d, Y h:i A',strtotime($message->msg_created));?>
               	</small> <small class="mr-3"><i class="fa fa-star <?php if($message->msg_star=='1'){echo'inbox-started';}?>" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-3 reply_message" style="cursor: pointer;"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
               <div class="mr-3">
                  <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-more-horizontal text-dark" data-toggle="tooltip" title="" data-original-title="View more"></i></a> 
                  <div class="dropdown-menu"> <a class="dropdown-item" href="#">Reply</a> <a class="dropdown-item" href="#">Report Spam</a> <a class="dropdown-item" href="#">Delete</a> <a class="dropdown-item" href="#">Show Original</a> <a class="dropdown-item" href="#">Print</a> <a class="dropdown-item" href="#">Filter</a> </div>
               </div>
            </div>
            <div class="media-title text-dark font-weight-semiblod mt-3"><?=$sender->name;?> <span class="text-muted">( <?=$sender->email;?> )</span></div>
            <p class="mb-0">to <?=$reciver->name;?> ( <?=$reciver->email;?> ) </p>
            <small class="mr-2 d-md-none">Dec 13 , 2018 12:45 pm</small> <small class="mr-2 d-md-none"><i class="fa fa-star text-dark" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-2 d-md-none"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
         </div>
      </div>
   </div>
   <div class="eamil-body mt-5">
      <?=$message->msg_message;?>
      <br/> &nbsp;
      
   </div>
<?php $reply=reply_message($message->msg_id);
if($reply==TRUE){
foreach($reply as $rp_value){?>
  <hr/>
 <div class="email-media">
      <div class="mt-0 d-sm-flex">
        <?php $sender=sender($rp_value->msg_sender);
        $reciver=sender($rp_value->msg_receiver);
        if(empty($rp_value->msg_sender)){
          if(empty($rp_value->picture)){
          ?>
         <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('../admin/uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }?>
         <?php }else{if(empty($sender->picture)){?> 
          <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }}?>
         <div class="media-body">
            <div class="float-right d-none d-md-flex fs-15">
       <small class="mr-3"><?=date('M d, Y h:i A',strtotime($rp_value->msg_created));?>
                </small> <small class="mr-3"><i class="fa fa-star <?php if($rp_value->msg_star=='1'){echo'inbox-started';}?>" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-3 reply_message" style="cursor: pointer;"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
               <div class="mr-3">
                  <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-more-horizontal text-dark" data-toggle="tooltip" title="" data-original-title="View more"></i></a> 
                  <div class="dropdown-menu"> <a class="dropdown-item" href="#">Reply</a> <a class="dropdown-item" href="#">Report Spam</a> <a class="dropdown-item" href="#">Delete</a> <a class="dropdown-item" href="#">Show Original</a> <a class="dropdown-item" href="#">Print</a> <a class="dropdown-item" href="#">Filter</a> </div>
               </div>
            </div>
            <div class="media-title text-dark font-weight-semiblod mt-3"><?=$sender->name;?> <span class="text-muted">( <?=$sender->email;?> )</span></div>
            <p class="mb-0">to <?=$reciver->name;?> ( <?=$reciver->email;?> ) </p>
            <small class="mr-2 d-md-none">Dec 13 , 2018 12:45 pm</small> <small class="mr-2 d-md-none"><i class="fa fa-star text-dark" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-2 d-md-none"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
         </div>
      </div>
   </div>
   <div class="eamil-body mt-5">
      <?=$rp_value->msg_message;?>
      <br/> &nbsp;
      
   </div>
 <?php }}?>

   <form action="<?=base_url('profile/message_reply');?>" method="post" id="reply_message" style="display: none">
       <input type="hidden" name="msg_to" value="Admin"  class="form-control" readonly="" disabled="">
       <input type="hidden" name="reply_id" value="<?=$message->msg_id;?>"  class="form-control" readonly="" > 

      <div class="card-body">       
           
            <div class="form-group">
               <div class="row align-items-center">
                  <label class="col-sm-2">Subject</label> 
                  <div class="col-sm-10"> <input type="text" name="msg_subject" class="form-control" readonly=""  value="<?=$message->msg_subject;?>" /> </div>
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
        
         <div class="btn-list ml-auto"> <button type="button" class="btn btn-danger btn-space reply_cancel" style=" width: auto; height: auto;">Cancel</button> <button type="submit" class="btn btn-primary btn-space" style=" width: auto; height: auto;">Reply  message</button> </div>
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
            </section>
      
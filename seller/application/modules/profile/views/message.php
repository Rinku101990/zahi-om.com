                  <link rel="stylesheet" href="<?=base_url();?>assets/css/message.css">
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
	                            <span> Inbox</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('message_sidebar');?>
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	            
      <div class="card">
         <div class="card-header" style="background: #fff">
            <h3 class="card-title">Inbox</h3>
            <div class="card-options">
               <form >
                  <div class="input-group"> <input type="text" class="form-control form-control-sm" placeholder="Search.." name="search" value="<?php echo @$_REQUEST['search'];?>"> <span class="input-group-btn ml-0"> <button class="btn btn-sm btn-primary" type="submit" style="height: 40px;"> <i class="fa fa-search text-white"></i> </button> </span> </div>
               </form>
            </div>
         </div>
         <div class="card-body">
            <div class="inbox-body">
               <div class="mail-option">
               	<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>  
	                <div class="btn-group mini tooltips">  <label class="custom-control custom-checkbox" style="margin-left: 10px;"> <input type="checkbox" class="custom-control-input select_all" > <span class="custom-control-label"></span> </label> </div>
                  <div class="btn-group hidden-phone">
                     <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false" > More <i class="fa fa-angle-down "></i> </a> 
                     <ul class="dropdown-menu">

                        <li><a href="javascript:void(0);" class="mark_as_read"><i class="fas fa-pencil-alt"></i> Mark as Read</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)" class="mark_trash"><i class="fa fa-trash"></i> Delete</a></li>
                     </ul>
                  </div>
                  <div class="btn-group"> <a  href="" class="btn mini tooltips"> <i class="fa fa-refresh"></i> </a> </div>
                  <!-- <ul class="unstyled inbox-pagination mt-3">
                     <li><span>1-50 of 234</span></li>
                  </ul> -->
               </div>
               <div class="table-responsive">
                  <table class="table table-inbox table-hover table-vcenter mail-body text-nowrap">
                     <tbody>
                     	<?php if($message==TRUE){
                     		foreach ($message as $msg_value) {                     		
                     		?>	
                        <tr> 
                        	<input type="hidden" name="msg_id" id="msg_id" value="<?=encode($msg_value->msg_id);?>">
                        	<input type="hidden" name="msg_star" class="msg_star<?=encode($msg_value->msg_id);?>" id="msg_star" value="<?=$msg_value->msg_star;?>">                                 	
                           <td class="inbox-small-cells"> <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input checkbox" name="checkbox" value="<?=encode($msg_value->msg_id);?>"> <span class="custom-control-label"></span> </label> </td>
                           <td class="inbox-small-cells message-star" id="star<?=encode($msg_value->msg_id);?>">

                           	<i class="fa fa-star <?php if($msg_value->msg_star=='1'){echo'inbox-started';}?>"></i>
                           </td>
                           <td class="view-message dont-show " >
                          
                           	<?=$msg_value->msg_subject;?>
                           	<?php if($msg_value->msg_type=='0'){?>
                            <span class="badge badge-danger badge-pill pull-right">New</span>
                            <?php }?>
                       </td>
                           <td class="view-message "  >
                            <?php $message_taxt = strlen($msg_value->msg_message);
                            if($message_taxt>50){
                            echo substr($msg_value->msg_message, 0, 50).'..';
                              }else{
                              echo $msg_value->msg_message;
                               }
                                                        ?>
                        </td>
                          
                           <td class="view-message  text-right" ><?=nicetime($msg_value->msg_created);?></td>
                        </tr>
                    <?php }}?>
                      
                      
                       
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
    <!--   <ul class="pagination mb-5">
         <li class="page-item page-prev disabled"> <a class="page-link" href="#" tabindex="-1">Prev</a> </li>
         <li class="page-item active"><a class="page-link" href="#">1</a></li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item"><a class="page-link" href="#">4</a></li>
         <li class="page-item"><a class="page-link" href="#">5</a></li>
         <li class="page-item page-next"> <a class="page-link" href="#">Next</a> </li>
      </ul> -->
   </div>
</div>
	                </div>
	                                    
	                                          </div>
	                                
	                                
	                               
	                          
	                </div>
	            </div>       	
            </section>
      
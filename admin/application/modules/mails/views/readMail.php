<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Mails</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
           <div class="row">
            <div class="col-lg-12 col-xl-3 col-md-12 col-sm-12">
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox">
                        <div class="mt-4 mb-4 ml-4 mr-4 text-center">
                        <a href="<?php echo site_url('mails/compose');?>" class="btn btn-primary btn-lg btn-block">Compose</a> </div>
                        <a href="<?php echo site_url('mails');?>" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox <span class="ml-auto badge-pill badge badge-success"><?php if($newMsg->new!='0'){echo $newMsg->new;}?></span> </a>
                        <a href="<?php echo site_url('mails/sent');?>" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-send"></i></span>Sent Mail </a>
                        <a href="<?php echo site_url('mails/starred');?>" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-star"></i></span>Starred </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-trash-2"></i></span>Trash </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $msgInfo->msg_subject;?></h4> 
                    </div>
                    
                    <div class="card-body">
                        <div class="email-media">
                            <div class="mt-0 d-sm-flex"> 
                                <?php  $sender=sender($msgInfo->msg_sender);
                                       $reciver=sender($msgInfo->msg_receiver);
                                 if(empty($msgInfo->msg_sender)){
            if(empty($sender->picture)){
            ?>
         <img class="mr-2 rounded-circle" src="<?=base_url('../seller/uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }?>
         <?php }else{if(empty($sender->picture)){?> 
            <img class="mr-2 rounded-circle" src="<?=base_url('../seller/uploads/profile/avatar.png');?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;">
     <?php }else{?>
      <img class="mr-2 rounded-circle" src="<?=base_url('../seller/uploads/profile/').$sender->picture;?>" alt="<?=$sender->name;?>" style="width:80px; height: 80px; border: 1px solid #eee;"><?php }}?>
                                
                                <div class="media-body">
                                    <div class="float-right d-none d-md-flex fs-15"> 
                                        <small class="mr-3"><?php echo date('j M Y, H:i:s A',strtotime($msgInfo->msg_created));?></small> 
                                        <small class="mr-3">
                                            <?php if($msgInfo->msg_star=='1'){?>
                                            <i class="fa fa-star  inbox-started" style="color: #ffab00;" data-toggle="tooltip" title="" data-original-title="Rated"></i>
                                        <?php }else {?>
                                            <i class="fa fa-star-o" data-toggle="tooltip" title="" data-original-title="Rate"></i>
                                        <?php } ?>
                                        </small> 
                                    </div>
                                    <?php if($msgInfo->msg_sender==0){ ?>
                                    <div class="media-title text-dark font-weight-semiblod mt-3"><?=$admin->mst_name;?> 
                                        <span class="text-muted">( <?=$admin->mst_email;?> )</span>
                                    </div>
                                    <p class="mb-0">to <?=$msgInfo->vnd_name;?> ( <?=$msgInfo->vnd_email;?> ) </p><small class="mr-2 d-md-none"><?php echo date('j M Y, H:i:s A',strtotime($msgInfo->msg_created));?></small> <small class="mr-2 d-md-none"><i class="fe fe-star text-dark" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-2 d-md-none"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
                                    <?php }else{ ?>
                                    <div class="media-title text-dark font-weight-semiblod mt-3"><?=$sender->name;?>
                                        <span class="text-muted">( <?=$sender->email;?> )</span>
                                    </div>
                                    <p class="mb-0">From <?=$reciver->name;?> ( <?=$reciver->email;?> ) </p><small class="mr-2 d-md-none"><?php echo date('j M Y, H:i:s A',strtotime($msgInfo->msg_created));?></small> <small class="mr-2 d-md-none"><i class="fe fe-star text-dark" data-toggle="tooltip" title="" data-original-title="Rated"></i></small> <small class="mr-2 d-md-none"><i class="fa fa-reply text-dark" data-toggle="tooltip" title="" data-original-title="Reply"></i></small> 
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="eamil-body mt-5">
                            <?=$msgInfo->msg_message;?>
                        </div>
                        <?php //print("<pre>".print_r($msgReply,true)."</pre>");?>
                        <?php if(!empty($msgReply)){ ?>
                         <div class="eamil-body">
                            <?php foreach($msgReply as $reply){ 
                                if($reply->msg_sender=='0' && $reply->vnd_name!=''){
                                    echo "<hr>".$reply->msg_message."<div class='user'><p class='u-designation'>by: ".$reply->vnd_name."</p></div>";
                                }else if($reply->msg_sender!='0' && $reply->vnd_name==''){
                                    echo "<hr>".$reply->msg_message."<div class='user'><p class='u-designation'>by: you</p></div>";
                                }
                            } ?>
                        </div>
                        <?php } ?>

                        <!-- REPLY ON MESSAGE -->
                        <div id="btnReplyBox" style="display: none">
                            <div class="card-footer"></div>
                            <form action="<?php echo site_url('mails/replyMessage/'.encode($msgInfo->msg_id));?>" method="post">
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="receiver" id="receiver" value="<?php echo encode($msgInfo->msg_receiver);?>">
                                            <input type="hidden" name="message_id" id="message_id" value="<?php echo encode($msgInfo->msg_id);?>">
                                            <textarea rows="5" class="form-control" id="replyMessage" name="replyMessage" placeholder="Enter your message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-sm-flex">
                                    <div class="btn-list ml-auto">
                                        <button type="submit" class="btn btn-primary btn-space" id="btnReplyMessage"><i class="fa fa-reply"></i>  Reply</button>
                                        <button type="button" class="btn btn-danger btn-space" id="btnCloseReplyBox"><i class="fa fa-close"></i> Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END OF THE REPLY MESSAGE -->

                    </div>

                    <div class="card-footer" id="btnReplyActionBox"> 
                        <button class="btn btn-primary mt-1 mb-1"><i class="fa fa-reply"></i> Reply</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
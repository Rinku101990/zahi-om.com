   <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 ">
      <div class="card " style="box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1)">
         <div class="list-group list-group-transparent mb-0 mail-inbox">
            <div class="mt-4 mb-4 ml-4 mr-4 text-center "> 
            <a href="<?=base_url('profile/compose');?>" class="btn btn-primary btn-lg btn-block">New Compose</a> </div>
            <a href="<?=base_url('profile/messages');?>" class="list-group-item list-group-item-action d-flex align-items-center <?php if($spage=='1')echo'active';?>"> <span class="icon mr-3"><i class="fa fa-inbox"></i></span>Inbox <?=inbox($this->login->vnd_id);?> </a>
             <a href="<?=base_url('profile/sent');?>" class="list-group-item list-group-item-action d-flex align-items-center <?php if($spage=='2')echo'active';?>"> <span class="icon mr-3"><i class="fa fa-send"></i></span>Sent Mail <?=sent($this->login->vnd_id);?></a>
              <a href="<?=base_url('profile/starred');?>" class="list-group-item list-group-item-action d-flex align-items-center <?php if($spage=='3')echo'active';?>"> <span class="icon mr-3"><i class="fa fa-star"></i></span>Starred <?=starred($this->login->vnd_id);?></a> 
              <a href="<?=base_url('profile/trash');?>" class="list-group-item list-group-item-action d-flex align-items-center <?php if($spage=='4')echo'active';?>"> <span class="icon mr-3"><i class="fa fa-trash"></i></span>Trash <?=trash($this->login->vnd_id);?></a> 
         </div>
      </div>  
   </div>	
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
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox">
                        <div class="mt-4 mb-4 ml-4 mr-4 text-center"> 
                        <a href="<?php echo site_url('mails/compose');?>" class="btn btn-primary btn-lg btn-block">Compose</a> </div>
                        <a href="<?php echo site_url('mails');?>" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox <span class="ml-auto badge-pill badge badge-success"><?php if($newMsg->new!='0'){echo $newMsg->new;}?></span> </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-send"></i></span>Sent Mail </a>
                        <a href="<?php echo site_url('mails/starred');?>" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-star"></i></span>Starred </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center"> <span class="icon mr-3"><i class="fe fe-trash-2"></i></span>Trash </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">new message</h3>
                    </div>
                    <div class="card-body">
                        <form id="composeMessage" method="post">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2">To</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" data-placeholder="" name="receiverlist[]" id="receiverlist" multiple="" tabindex="-1" aria-hidden="true">
                                            <?php if(!empty($vndrlist)){ foreach($vndrlist as $vlist){ ?>
                                                <option value="<?php echo $vlist->vnd_id;?>"><?php echo $vlist->vnd_name.'('. $vlist->vnd_email.')';?></option>
                                            <?php } }?>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2">Subject</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="subject" id="subject"> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2">Message</label>
                                    <div class="col-sm-10">
                                        <textarea rows="10" id="summernote" name="summernote" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer d-sm-flex">
                        <div class="btn-list ml-auto">
                            <button type="button" class="btn btn-primary btn-space" id="btnSendMessage">Send message</button>
                            <button type="button" class="btn btn-danger btn-space">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
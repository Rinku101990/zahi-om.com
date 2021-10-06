<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url();?>"><i class="ti-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cancellation Reason Add</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                    <a href="<?=base_url('settings/reasons');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i>Cancellation Reasons </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Page-header closed -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card mb-xl-0">
                    <div class="card-header">
                        <h3 class="card-title">Add Cancellation Reason</h3> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <?php $msg=$this->session->flashdata('msg');if($msg){  ?>
                                    <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span>
                                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    </div>
                                <?php }?>
                                <form action="<?php echo site_url('settings/editReason/'.encode($reason_info->cr_id));?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Cancellation Reason<span class="text-red">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="cr_name" placeholder="Enter Cancellation Reason" value="<?php echo $reason_info->cr_name;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Status <span class="text-red">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="form-group">
                                                <select class="form-control" name="cr_status">
                                                    <option value="1" <?php if($reason_info->cr_status=='1')echo'selected';?>>Active</option>
                                                    <option value="2" <?php if($reason_info->cr_status=='1')echo'selected';?>>In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-3 row justify-content-end">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
                                            <button type="reset" class="btn btn-secondary"><i class="fa fa-remove"></i> Cancel</button>
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
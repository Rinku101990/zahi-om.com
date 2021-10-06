<style type="text/css">
    span#select2-sp_pid-oc-container {
        line-height: 40px;
    }
    
    span.select2-selection.select2-selection--single {
        height: 40px;
        border: 1px solid #e8e7ea;
        border-radius: 4px !important;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 35px;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    
    span.select2.select2-container.select2-container--default {
        width: 100% !important;
        height: 40px;
    }
</style>
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notification Template(IOS)</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                    <a href="<?=base_url('notifications');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list"></i>Template List(IOS)</button>
                    </a>
                </div>
            </div>
        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-lg-10 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Notification Template(IOS)</h3> </div>
                        <form id="edit_special_price" action="<?php echo site_url('notifications/send');?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <?php $msg=$this->session->flashdata('msg'); if($msg){  ?>
                                <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible" data-dismiss="alert" aria-hidden="true">
                                    <strong><?php echo $msg['type'] ?></strong>
                                    <?php echo $msg['message']; ?>
                                </div>
                                <?php } ?>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" style="text-align:right">Title<span class="text-red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="notification_title" placeholder="Enter Title" required="required"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" style="text-align:right">Picture<span class="text-red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="form-group">
                                                   <input type="file" class="form-control" name="push_picture" accept="image/x-png,image/gif,image/jpg,image/jpeg," required> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" style="text-align:right">Discription<span class="text-red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="form-group">
                                                   <textarea class="form-control" name="description" required placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" style="text-align:right">Device Type<span class="text-red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="form-group">
                                                   <select class="form-control" name="devicetype" required>
                                                       <option value="">Select Device Type</option>
                                                       <option value="IOS">IOS</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-10 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="card-footer1">
                                                    <button type="submit" class="btn btn-primary btn2"><i class="fa fa-send"></i> Sent</button>
                                                    <button type="reset" class="btn btn-secondary btn2" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>
    </div>
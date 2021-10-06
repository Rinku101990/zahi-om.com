<?php error_reporting(0);?>
<div class="app-content">
    <div class="section">
        <!--  Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Blog Posts</li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
                    <?php if($this->login->mst_role=='0' || !empty($permission['blog_post_add'])){ ?>
                    <a href="<?php echo site_url('blogs/add');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Post </button>
                    </a>
                <?php }?>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Blog Post List</div>
                        <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-datatable">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Sr.No.</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Post Title</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Post Categories</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Published Date</th>
                                                    <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                                     <?php if($this->login->mst_role=='0' || !empty($permission['blog_post_edit']) || !empty($permission['blog_post_delete'])){ ?>
                                                    <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                <?php }?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php //print("<pre>".print_r($blogs)."</pre>");?>
                                                <?php if(!empty($blogs)){ $i=1; foreach($blogs as $blglist){ ?>
                                                <tr role="row">
                                                    <td class="sorting_1" align="left"><?php echo $i++;?></td>
                                                    <td><?php echo $blglist->blg_title;?></td>
                                                    <td><?php echo $blglist->blg_categories;?></td>
                                                    <td align="center"><?php $publishDate = date('d F Y H:i A', strtotime($blglist->blg_created)); echo $publishDate;?></td>
                                                    <td align="center">
                                                        <?php if($blglist->blg_status=='0'){ ?>
                                                            <span class="badge badge-success-light badge-md">Published</span>
                                                        <?php }else{ ?>
                                                            <span class="badge badge-primary-light badge-md">Draft</span>
                                                        <?php } ?>
                                                        
                                                    </td>
 <?php if($this->login->mst_role=='0' || !empty($permission['blog_post_edit']) || !empty($permission['blog_post_delete'])){ ?>
                                                    <td align="center">
<?php if($this->login->mst_role=='0' || !empty($permission['blog_post_edit'])){ ?>
                                                        <a href="<?php echo site_url('blogs/edit/'.$blglist->blg_id);?>" class="btn btn-info btn-sm mt-2 mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
<?php }
if($this->login->mst_role=='0' || !empty($permission['blog_post_delete'])){ ?>
                                                        <a href="<?php echo site_url('blogs/remove/'.$blglist->blg_id);?>" class="btn btn-danger btn-sm mt-2 mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                                    <?php }?>
                                                    </td>
                                                <?php }?>
                                                </tr>
                                                <?php } }else {?>
                                                <tr>
                                                    <td colspan="6"><center>no blogs founds</center></td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
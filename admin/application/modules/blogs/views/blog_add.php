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
                    <a href="<?php echo site_url('blogs/add');?>">
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Post </button>
                    </a>
                </div>
            </div>

        </div>
        <!--  Page-header closed -->
        <!-- row opened -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Blog</div>
                        <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
                    </div>
                    <div class="card-body">
                        
                        <form action="<?php echo site_url('blogs/add');?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Blog Title <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="blg_title" placeholder="Enter Blog Title" onkeyup="slug_url(this.value,'blg_title_slug')">
                                        <input type="hidden" class="form-control" name="blg_title_slug" id="blg_title_slug"> 
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Author Name <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="blg_author" placeholder="Enter Post Author Name"> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group"> 
                                        <label>Post Images <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="blog_picture" id="blg_images" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Aditional Setting</label>
                                    <div class="form-group ">
                                        <div class="selectgroup selectgroup-pills"> 
                                            <label class="selectgroup-item"> 
                                                <input type="checkbox" name="setting[]" value="comment" class="selectgroup-input"> 
                                                <span class="selectgroup-button">Comment Open</span> 
                                            </label> 
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="setting[]" value="featured" class="selectgroup-input"> 
                                                <span class="selectgroup-button">Featured</span> 
                                            </label>  
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <label>Blog Categories</label>
                                    <div class="form-group ">
                                        <div class="selectgroup selectgroup-pills"> 
                                            <label class="selectgroup-item"> 
                                                <input type="checkbox" name="categories[]" value="Features" class="selectgroup-input" checked="checked"> 
                                                <span class="selectgroup-button">Features</span> 
                                            </label> 
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="categories[]" value="Store" class="selectgroup-input"> 
                                                <span class="selectgroup-button">Store</span> 
                                            </label> 
                                            <label class="selectgroup-item"> 
                                                <input type="checkbox" name="categories[]" value="eCommerce" class="selectgroup-input">
                                                <span class="selectgroup-button">eCommerce</span> 
                                            </label> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <label>Post Status</label>
                                    <select name="status" class="form-control pd_brand">
                                        <option value="1">Draft</option>
                                        <option value="0">Published</option>  
                                    </select>
                                </div>
                            </div>
                            
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea rows="3" name="description" class="form-control pd_description" id="summernote"></textarea>
                                </div>
                            </div>

                            <div>
                                <div class="mt-2 mb-2 pull-right">
                                    <button type="submit" class="btn btn-primary">Save Blog</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!-- row closed -->
    </div>
</div>
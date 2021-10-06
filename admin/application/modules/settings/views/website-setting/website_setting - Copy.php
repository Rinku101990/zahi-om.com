<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        WebSite Setting Management 
      </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0)">WebSite Setting Management</a></li>
            <li class="active">WebSite Setting </li>
        </ol>
    </section>
    <!-- Main content -->
	<?php // pr($this->website);?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">View  WebSite Setting</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-xs btn-primary" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Go Back </button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab"> 
                                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Company Details</a></li>
                                <li><a href="#tab-second" role="tab" data-toggle="tab">Email Settings</a></li>
                                <li><a href="#tab-third" role="tab" data-toggle="tab">Social Media</a></li>
                                <li><a href="#tab-fourth" role="tab" data-toggle="tab">SEO Setting</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Company Name</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_company_name" class="form-control" value="<?php echo $this->website->web_company_name; ?>" placeholder="Enter Company Name"/> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Hours Of Operation</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_hour_of_operation" class="form-control" value="<?php echo $this->website->web_hour_of_operation; ?>" placeholder="Enter Hours Of Operation" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Company Logo</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" name="web_company_logo" class="form-control"/> </br>
												 <img src="<?php echo site_url('uploads/website/logo/').$this->website->web_company_logo;?>" alt="company-logo">
                                                  <input type="hidden" name="web_company_logo" value="<?php echo $this->website->web_company_logo; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Favicon Icon</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="file" Name="web_favicon_icon" class="form-control"/> </br>
                                                <img src="<?php echo site_url('uploads/website/favicon/').$this->website->web_favicon_icon;?>" alt="Favicon-Icon">
                                                 <input type="hidden" name="web_favicon_icon" value="<?php echo $this->website->web_favicon_icon; ?>"/>
                                                 
                                            </div> 
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-3 col-xs-12 control-label">Site URL</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_site_url" value="<?php echo $this->website->web_site_url; ?>"class="form-control" placeholder="Enter Site URL"/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Branch Address </label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" placeholder="Enter Branch Address" rows="3" name="web_address"><?php echo $this->website->web_address; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group >">
                                            <label class="col-md-3 col-xs-12 control-label">Google Map Link</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="3" name="web_addressmap" placeholder="Enter Google Map Link"><?php echo $this->website->web_addressmap; ?></textarea> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Country</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_country" value="<?php echo $this->website->web_country; ?>"   class="form-control" placeholder="Enter Country"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Pincode</label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_pincode" value="<?php echo $this->website->web_pincode; ?>"  class="form-control" placeholder="Enter Pincode"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Customer Support Number (24*7) </label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_support_contact"  class="form-control" value="<?php echo $this->website->web_support_contact; ?>" placeholder="Enter Support Number"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Support Email ID (24*7) </label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_support_email"   class="form-control" value="<?php echo $this->website->web_support_email; ?>" placeholder="Enter Support Email ID"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Footer Copy Right </label>
                                            <div class="col-md-6 col-xs-12">
                                                <input type="text" name="web_copy_right" class="form-control" value="<?php echo $this->website->web_copy_right; ?>" placeholder="Enter Footer Copy Right" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary  pull-right"><i class="fa fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab-second">
                                    <form class="form-horizontal"   method="post">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Default Email Protocal</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select" name="web_email_protocal">
													<option Value="Email" selected>Email</option>
													<option Value="SMTP Email">SMTP Email</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">From E-mail ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_from_email_id" class="form-control" placeholder="Enter From E-mail ID" value="<?php echo $this->website->web_from_email_id; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Bcc E-mail ( Comma Separated )</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_bcc_email_id" class="form-control" placeholder="Enter Like, abc@gmail.com,abcd@gmail.com" value="<?php echo $this->website->web_bcc_email_id; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">SMTP Host Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_smtp_host_name" class="form-control" placeholder="Enter SMTP Host Name" value="<?php echo $this->website->web_smtp_host_name; ?>">
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">SMTP Port</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_smtp_port" class="form-control" placeholder="Enter SMTP Port" value="<?php echo $this->website->web_smtp_port; ?>">
                                            </div>
                                        </div> 
										<div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Email ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_email_id" class="form-control" placeholder="Enter Email ID" value="<?php echo $this->website->web_email_id; ?>">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_email_password" class="form-control" placeholder="Enter Password" value="<?php echo $this->website->web_email_password; ?>">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary  pull-right"><i class="fa fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tab-third">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Facebook Link</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_facebook_link" value="<?php echo $this->website->web_facebook_link; ?>" class="form-control" placeholder="Enter Facebook Link" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Linkedin Link </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_linkedin_link" value="<?php echo $this->website->web_linkedin_link; ?>" class="form-control" placeholder="Enter Linkedin Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Instagram Link</label>
                                            <div class="col-sm-6"> 
                                                <input type="text" name="web_instagram_link" value="<?php echo $this->website->web_instagram_link; ?>" class="form-control" placeholder="Enter Instagram Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Twitter Link</label>
                                            <div class="col-sm-6"> 
                                                <input type="text" name="web_twitter_link" value="<?php echo $this->website->web_twitter_link; ?>" class="form-control" placeholder="Enter Twitter Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Google+ Link</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_google_plus_link" value="<?php echo $this->website->web_google_plus_link; ?>" class="form-control" placeholder="Enter Google+ Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Youtube Link</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_youtube_link" value="<?php echo $this->website->web_youtube_link; ?>" class="form-control" placeholder="Enter Youtube Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Pinterest Link</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="web_pinterest_link" value="<?php echo $this->website->web_pinterest_link; ?>" class="form-control" placeholder="Enter Pinterest Link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary  pull-right"><i class="fa fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
								<!-- /.tab-pane -->

                                <div class="tab-pane" id="tab-fourth">
                                    <form class="form-horizontal" method="post">
									<strong>Web Site Meta Configuration Detail For Home Page.</strong></br></br> 
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Title </label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" placeholder="Enter Meta Title" rows="3" name="web_meta_title"><?php echo $this->website->web_meta_title; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group >">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Keyword</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="3" name="web_meta_keyword" placeholder="Enter Meta Keyword"><?php echo $this->website->web_meta_keyword; ?></textarea> 
                                            </div>
                                        </div>
										<div class="form-group >">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="3" name="web_meta_description" placeholder="Enter Meta Description"><?php echo $this->website->web_meta_description; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary  pull-right"><i class="fa fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col --> 
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
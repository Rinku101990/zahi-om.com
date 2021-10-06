<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Mail Setting Management 
      </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0)">Email Setting Management</a></li>
            <li class="active">Email Setting </li>
        </ol>
    </section>
    <!-- Main content -->
	<?php // pr($this->website);?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">View  Email Setting</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-xs btn-primary" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Go Back </button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab"> 
                                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">For Vendor</a></li>
                                <li><a href="#tab-fourth" role="tab" data-toggle="tab">Vendor Mail List</a></li>
                                <!--<li><a href="#tab-second" role="tab" data-toggle="tab">For Promotional</a></li>
                                <li><a href="#tab-fifth" role="tab" data-toggle="tab">Promotional Mail List</a></li>-->
                                <li><a href="#tab-third" role="tab" data-toggle="tab">For Customer</a></li>
                                <li><a href="#tab-sixth" role="tab" data-toggle="tab">Customer Mail List</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Email Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="mailType">
													<option Value="REG" >Registration</option>
													<option Value="UPD">Update</option>
													<option Value="BLK">Block</option>
													<option Value="SPD">Suspend</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Mail Message</label>
                                            <div class="col-sm-6">
                                                <input name="mailFor" type="hidden" class="form-control" value="VND" />
												<textarea class="form-control" rows="8" name="mailMessage" placeholder="Mail Message"> </textarea>
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
                                            <label for="inputName" class="col-sm-3 control-label">Email Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="mailType">
													<option Value="REG" >Registration</option>
													<option Value="UPD">Update</option>
													<option Value="BLK">Block</option>
													<option Value="SPD">Suspend</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Mail Message</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" rows="8"  name="mailMessage" > </textarea>
												<input name="mailFor" type="hidden"  name="mailMessage" class="form-control" value="PROMO" />
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
                                            <label for="inputName" class="col-sm-3 control-label">Email Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="mailType">
													<option Value="REG" >Registration</option>
													<option Value="UPD">Update</option>
													<option Value="BLK">Block</option>
													<option Value="SPD">Suspend</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Mail Message</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" rows="8"  name="mailMessage" > </textarea>
												<input name="mailFor" type="hidden" class="form-control" value="Customer" />
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
                                    <table id="example2" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>Mail For</th>
										  <th>Mail Type</th>
										  <th>Mail Message</th>
										  <th>Status</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
											<?php
												if(!empty($MailVND)){ foreach($MailVND as $key=>$list){
													if($list->mailStatus == '0'){
													  $status='Active';
													  $class='success';
													  $fa='check';
													}else{
													  $fa='ban';
													  $status='Inactive';
													  $class='danger';
													}
											?>
											<tr>
												<td><?php if($list->mailFor == 'VND') echo "Vendor"; else if($list->mailFor == 'PROMO') echo "Promotional"; else echo "Customer"; ?></td>
												<td><?php if($list->mailType == 'REG') echo "Registration"; else if($list->mailType == 'UPD') echo "Update"; else if($list->mailType == 'BLK') echo "Block"; else echo "Suspend"; ?></td>
												<td><?=wordwrap($list->mailMessage , 30, "<br />\n")?></td>
												<td>
													<button type="button" onClick="javascript:showMyModalSetTitle('Change Status','Setting/change_status/',<?php echo $list->mailId;?>)" class="btn btn-<?php echo $class;?> btn-xs"><i class="fa fa-<?php echo $fa;?>"></i></i> <?php echo $status;?></button>
												</td>
												<td>
												  <a href="javascript:void(0)" class="btn bg-teal btn-xs mailEditModal" mailEditModal="<?=$list->mailId?>" url="<?=base_url()?>" title="view" ><i class="fa fa-eye" ></i></a>
												  <button type="button" onClick="javascript:showMyModalSetTitle('Delete','setting/delete/',<?=$list->mailId;?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												</td>
											</tr>
											<?php } }?>
										</tbody>
									</table>
                                </div>
								
								<div class="tab-pane" id="tab-fifth">
                                    <table id="example2" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>Mail For</th>
										  <th>Mail Type</th>
										  <th>Mail Message</th>
										  <th>Status</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
											<?php
												if(!empty($MailPROMO)){ foreach($MailPROMO as $key=>$list){
													if($list->mailStatus == '0'){
													  $status='Active';
													  $class='success';
													  $fa='check';
													}else{
													  $fa='ban';
													  $status='Inactive';
													  $class='danger';
													}
											?>
											<tr>
												<td><?php if($list->mailFor == 'VND') echo "Vendor"; else if($list->mailFor == 'PROMO') echo "Promotional"; else echo "Customer"; ?></td>
												<td><?php if($list->mailType == 'REG') echo "Registration"; else if($list->mailType == 'UPD') echo "Update"; else if($list->mailType == 'BLK') echo "Block"; else echo "Suspend"; ?></td>
												<td><?=wordwrap($list->mailMessage , 30, "<br />\n")?></td>
												<td>
													<button type="button" onClick="javascript:showMyModalSetTitle('Change Status','Setting/change_status/',<?php echo $list->mailId;?>)" class="btn btn-<?php echo $class;?> btn-xs"><i class="fa fa-<?php echo $fa;?>"></i></i> <?php echo $status;?></button>
												</td>
												<td>
												  <a href="javascript:void(0)" class="btn bg-teal btn-xs mailEditModal" mailEditModal="<?=$list->mailId?>" url="<?=base_url()?>" title="view" ><i class="fa fa-eye" ></i></a>
												  <button type="button" onClick="javascript:showMyModalSetTitle('Delete','setting/delete/',<?=$list->mailId;?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												</td>
											</tr>
											<?php } }?>
										</tbody>
									</table>
                                </div>
								
								<div class="tab-pane" id="tab-sixth">
                                    <table id="example2" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>Mail For</th>
										  <th>Mail Type</th>
										  <th>Mail Message</th>
										  <th>Status</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
											<?php
												if(!empty($MailCustomer)){ foreach($MailCustomer as $key=>$list){
													if($list->mailStatus == '0'){
													  $status='Active';
													  $class='success';
													  $fa='check';
													}else{
													  $fa='ban';
													  $status='Inactive';
													  $class='danger';
													}
											?>
											<tr>
												<td><?php if($list->mailFor == 'VND') echo "Vendor"; else if($list->mailFor == 'PROMO') echo "Promotional"; else echo "Customer"; ?></td>
												<td><?php if($list->mailType == 'REG') echo "Registration"; else if($list->mailType == 'UPD') echo "Update"; else if($list->mailType == 'BLK') echo "Block"; else echo "Suspend"; ?></td>
												<td><?=wordwrap($list->mailMessage , 30, "<br />\n")?></td>
												<td>
													<button type="button" onClick="javascript:showMyModalSetTitle('Change Status','Setting/change_status/',<?php echo $list->mailId;?>)" class="btn btn-<?php echo $class;?> btn-xs"><i class="fa fa-<?php echo $fa;?>"></i></i> <?php echo $status;?></button>
												</td>
												<td>
												  <a href="javascript:void(0)" class="btn bg-teal btn-xs mailEditModal" mailEditModal="<?=$list->mailId?>" url="<?=base_url()?>" title="view" ><i class="fa fa-eye" ></i></a>
												  <button type="button" onClick="javascript:showMyModalSetTitle('Delete','setting/delete/',<?=$list->mailId;?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												</td>
											</tr>
											<?php } }?>
										</tbody>
									</table>
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
		
		<div class="modal fade" id="mailEditModal">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content">
					<div class="panel panel-default">
						<div class="panel-heading">Mail Edit Modal <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal" style="margin-top:-4px"><i class="fa fa-close"></i></button></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
								  <div class="tabs_div">
									<form class="form-horizontal" action="<?php echo base_url('setting/updatemail'); ?>" method="post">
										<input type="hidden" class="mailIdEdit" name="mailId" />
										<div class="form-group">
											<label for="inputName" class="col-sm-3 control-label">Email Type</label>
											<div class="col-sm-6">
												<select class="form-control mailTypeEdit" name="mailType">
													<option Value="REG" >Registration</option>
													<option Value="UPD">Update</option>
													<option Value="BLK">Block</option>
													<option Value="SPD">Suspend</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-3 control-label">Mail Message</label>
											<div class="col-sm-6">
												<textarea class="form-control mailMessageEdit" rows="8"  name="mailMessage" > </textarea>
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
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<!-- END OF THE BASIC DETAIL IN POPUP -->
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
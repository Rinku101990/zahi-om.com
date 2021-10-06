	<link href="<?=base_url();?>../admin/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url();?>../admin/assets/css/tables.css" rel="stylesheet">
	<link href="<?=base_url();?>../admin/assets/css/default.css" rel="stylesheet">
<style>
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    text-align: center;
    border-left-width: 0;
}
.table th, .text-wrap table th {
    color: #242338;
    text-transform: uppercase;
    font-size: small;
    font-weight: 400;
}
.table th, .table td {
    font-weight: 400;
    padding: 15px;
    color: #333;
    font-size: 14px;   
    vertical-align: top;
}
label {  
    display: inline-flex;
    font-size: 14px;
    font-weight: 500;
    color: #626262;
}
div#example_length {
    margin-top: 10px;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    margin: -3px 5px 0 5px;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
    margin-top: -7px;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: 8px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #2205bf;
    border-color: #2205bf;
}
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item.disabled .page-link {
    color: #ced4da;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #eff2f7;
}
.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    color: #3c4858;
    line-height: 1.25;
    background-color: #fff;
    border: 1px solid #eaf0f7;
    font-size: 0.875rem;
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
	                            <span> Manage Brand </span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title pull-l">
	                            <h3> Brand</h3>
	                        </div>
					<div class="action btn-group-scroll pull-right">
                        
                        <div class="save_button primary_btn default_button">
<button class="btn_submit" name="btn_submit" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus "></i> Add Brand</button>
	                                                    </div>
                                </div>
							
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">
<div class="col-md-12">
<h5 class="cards-title ">List Brand</h5>
<hr>

 <div class="">
<?php $msg=$this->session->flashdata('msg');  
	if($msg){  ?>
	
<div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
	<?php }?>
 <div class="table-responsive product-datatable">
    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

        <div class="row">
            <div class="col-sm-12">
                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
 <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
 <thead>
<tr role="row">
<th style="width: 98px;">S.N.</th>
<th style="width: 202px;">Img</th>
<th style="width: 202px;">Brand Name </th>
 <th style="width: 111px;">Status</th>
<th style="width: 105px;">Action</th>
 </tr>
</thead>
<tbody>
<?php if(!empty($brand)){ $i=1;
	foreach($brand AS $list){
		$vndid=$this->vendor->vnd_id;
if($list->brd_status=='1'){
$icon="check";
$class="success";
$action="2";
$value="Active";
}else{
$icon="ban";
$class="danger";
$action="1";
$value="In-Active";
}
if(empty($list->vnd_id)){
$ation_url="1";
$status_url='javascript:void(0);';
$edit_url='javascript:void(0);';
$delete_url='javascript:void(0);';
}elseif($list->vnd_id==$vndid){
$ation_url="2";
$status_url="javascript:showMyModalSetTitle('Change Status','brand_status/',".$list->brd_id.",".$action.")";
$edit_url='brand_edit';
$delete_url="javascript:showMyModalSetTitle('Delete','brand_delete/',".$list->brd_id.",'')";
}
?>
 <tr>
<td> <?=$i;$i++;?>.</td>
<td> <img src="<?=base_url('../admin/uploads/brand/').$list->brd_img;?>" style="width:50px;height:50px; object-fit: contain;"></td>
<td> <?=$list->brd_name; ?></td>
 <td> 
 <a href="javascript:void(0);" onclick="<?=$status_url;?>">
 <span class="badge badge-<?=$class;?>-light badge-md"><i class="fa fa-<?=$icon;?>"></i> <?=$value;?></span></a> </td>


 <td align="center">
 <?php if($ation_url=='2'){?>
<a href="javascript:void(0);" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white <?=$edit_url;?>" brand_edit="<?=$list->brd_id;?>" url="<?=base_url();?>" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
  <a href="javascript:void(0);" onclick="<?=$delete_url;?>" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
 <?php }?>
</td>
</tr>
<?php }}?>


 
									
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>      
                    </div>
                    <!-- table-wrapper -->
</div>

	                                    
</div>
</div>
	                                
	
	                                
	                               
	                               
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>       	
            </section>
<div class="modal fade show" id="add_new" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 
			<form id="brand_add" action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               
                   
                    <div class="form-group">
                        <label class="form-control-label"> Brand Name <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="brd_name" Placeholder="Enter Brand name">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label"> Brand Image <span class="text-red">*</span> </label>
       <input type="file" class="form-control" name="brd_img" accept="image/*" Placeholder="Enter Brand Image">
                    </div>
					 <div class="form-group">
                        <label class="form-control-label">Brand Status <span class="text-red">*</span></label>
    <select name="brd_status" class="form-control" >
	<option value="">-Select -</option>
	<option value="1"  selected>Active</option>
	<option value="2">In Active</option>
	
	</select>
	</div>
               
            </div>
            <div class="modal-footer">
			 <button type="submit" class="btn btn-primary btn2" name="Action" value="add"><i class="fa fa-save"></i> Submit</button>
                <button type="reset" class="btn btn-secondary btn2" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
               
            </div>
			 </form>
        </div>
    </div>
</div>

<div class="modal fade show" id="BrandModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 
<form id="brand_edit" action="" method="post" enctype="multipart/form-data">
 <input type="hidden" class="form-control" name="brd_id" id='brd_id' >
   <div class="modal-body">
               
   
                    <div class="form-group">
                        <label class="form-control-label"> Brand Name <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="brd_name" id="brd_name" Placeholder="Enter Brand name">
                    </div>
                     <div class="form-group">
                        <label class="form-control-label"> Brand Image <span class="text-red">*</span> </label>
       <input type="file" class="form-control" name="brd_img" accept="image/*" Placeholder="Enter Brand Image">
       <span id="img"></span>
                    </div>
					 <div class="form-group">
                        <label class="form-control-label">Brand Status <span class="text-red">*</span></label>
    <select name="brd_status" class="form-control cstatus" >
	<option value="">-Select -</option>
	
	
	</select>
	</div>
               
            </div>
            <div class="modal-footer">
			 <button type="submit" class="btn btn-primary btn2" name="Action" value="edit"><i class="fa fa-save"></i> Submit</button>
                <button type="reset" class="btn btn-secondary btn2" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
               
            </div>
			 </form>
        </div>
    </div>
</div>
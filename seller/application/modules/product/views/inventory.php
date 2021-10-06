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
    font-weight: 400;
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
	                            <span> Manage Inventory</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title pull-l">
	                            <h3>Manage Inventory</h3>
	                        </div>
				
							
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">
<div class="col-md-12">
<h5 class="cards-title ">List Inventory</h5>
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
                                        <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Sr. No.: activate to sort column descending" aria-sort="ascending" style="width: 98px;">S.N.</th>
                                        <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Currency Name: activate to sort column ascending" style="width: 300px;">Product Name</th>
                                           <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Symbol: activate to sort column ascending" style="width: 111px;">Size</th>
                                            <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Symbol: activate to sort column ascending" style="width: 111px;">Color</th>
                                        <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Symbol: activate to sort column ascending" style="width: 111px;">Selling Price</th>
                                          <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Initial Stock</th>
                                                     <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Purchase Stock</th>
                                                     <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Balance Stock</th>
                                         
                                        <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 103px;">Stock</th>
                                       
                                        <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 105px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($inventory)){
                                    foreach ($inventory as $key => $int_list) {
                                    ?>                                   
                                    <tr role="row" class="odd">
                                     <td class="sorting_1"><?=$i;$i++;?>.</td>
                                     <td style="width: 300px;"> <?=product($int_list->int_pid);?></td>
                                        <td  style="width: 90px;"><?=$int_list->int_size;?></td>
                                        <td  style="width: 90px;"><?=$int_list->int_color;?></td>
                                        <td  style="width: 90px;"><?=currency($this->website->web_currency);?> <?=$int_list->int_selleing_price;?></td>
                                       
                                             <td align="center"> <?=$int_list->int_total_qty;?></td>
     <td align="center"> <?=$int_list->int_total_qty-$int_list->int_available_qty;?></td>
          <td align="center"> <?=$int_list->int_available_qty;?></td>

                                      
                                        <td align="center">
                                            <?php if($int_list->int_stock=='1'){
                                                $class='success';
                                                $value='Yes';
                                                $icon='check';
                                            }else{  $class='danger';
                                                $value='No';
                                                $icon='ban';}?>
                                         <a href="javascript:void(0);" >
                                                <span class="badge badge-<?=$class;?>-light badge-md"><i class="fa fa-<?=$icon;?>"></i> <?=$value;?></span></a>
                                        </td>
                                       
                                        <td align="center">

                                            <a href="javascript:void(0);" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white inventory_edit" inventory_edit="<?=$int_list->int_id;?>" url="<?=base_url();?>" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                           

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
    <div class="modal fade show" id="InventoryModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 
<form id="Inventory_Add" action="" method="post">
 <input type="hidden" class="form-control" name="int_id" id='int_id' >
   <div class="modal-body">
               <div class="form-group">
                        <label class="form-control-label">Product name <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="int_pid" id="getpid" Placeholder="Enter Product name" readonly="">
                    </div>
   
                    <div class="form-group">
                        <label class="form-control-label"> Size  <span class="text-red"></span> </label>
       <input type="text" class="form-control" name="int_size" id="intsize" Placeholder="Enter Size">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label"> Color  <span class="text-red"></span> </label>
                        <select  class="form-control"  name="int_color" id="int_color">
                      <option value="">Select Color</option>
                    

                    </select>
                    </div>
                     <div class="form-group">
                        <label class="form-control-label"> Selling Price [<?=currency($this->website->web_currency);?>] <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="int_selleing_price" id="selleing_price" Placeholder="Enter Selling Price" >
                    </div>
                       <div class="form-group">
                        <label class="form-control-label">Total Quantity <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="int_total_qty" id="int_total_qty" Placeholder="Enter Total Quantity">
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">Balance Quantity <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="int_available_qty" id="available_qty" Placeholder="Enter Available Quantity">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Minimum Purchase Quantity <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="int_min_purchase_qty" id="min_purchase_qty" Placeholder="Enter Minimum Purchase Quantity">
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">Maintain Stock Levels <span class="text-red">*</span></label>
    <select name="int_stock" class="form-control stock" >
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
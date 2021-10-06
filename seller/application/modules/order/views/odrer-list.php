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
}.input-icon {
    font-size: 15px;
    position: absolute;
    width: 50px;
    height: 50px;
    line-height: 30px;
    display: block;
    top: 36px;
    left: 11px;
    text-align: center;
    color: #9fa1a2;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    z-index: 2;
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
	                            <span> Manage Order</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
						
	                    <div class="breadcrumb_content">
	                        <?php //print("<pre>".print_r($order,true)."</pre>"); ?>
	                        <div class="breadcrumb_title pull-l">
	                            <h3>Orders List</h3>
	                        </div>
					<div class="action btn-group-scroll pull-right">
                        
                
                                </div>
							
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">




 
<div class="col-md-12 special_list" >
<h5 class="cards-title ">Orders List</h5>
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
                                        <th class="w-15p sorting_asc" style="width: 98px;">Order Id</th>
                                        <th class="wd-15p sorting" style="width: 300px;">Product Name</th>
                                        <th class="wd-15p sorting" style="width: 111px;">Price</th>
                                         <th class="wd-15p sorting" style="width: 111px;">Payment</th>
                                        
                                        <th class="wd-15p sorting" style="width: 103px;">Status</th>
                                          <th class="wd-15p sorting" style="width: 111px;">created</th>
                                       
                                        <th class="wd-10p sorting"  style="width: 105px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($order)){
                                    foreach ($order as $key => $ord_list) {
                                    // if($ord_list->pro_starus=='Cancel'){
                                    //     $class="danger";                                      
                                    //     $value="Cancel";
                                    //     }elseif($ord_list->pro_starus=='Return'){
                                    //     $class="primary";                                      
                                    //     $value="Return";
                                    //     }else if($ord_list->pro_starus=='InProcess'){
                                    //     $class="warning";                                      
                                    //     $value="InProcess";
                                    //     }else if($ord_list->pro_starus=='Shipped'){
                                    //     $class="info";                                      
                                    //     $value="Shipped";
                                    //     }else {
                                    //    $class="success";                                      
                                    //     $value="Delivered";
                                    //     }
                                        ?>                                   
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" align="center">#<?=$ord_list->ord_reference_no;?>.</td>
                                        <td align="center"> <?=$ord_list->pro_name;?></td>                                       

                                        <td align="center"> <?=currency($this->website->web_currency);?> <?=$ord_list->pro_price;?> </td>
                                         <td><?php if($ord_list->ord_pay_mode=='COD'){?><span class="badge badge-success-light badge-md">Cash On Delivery </span><?php }else{?><span class="badge badge-primary-light badge-md">
                                         Online Payment<?php }?></span>  </td>

                                        <td align="center"> <?php if($ord_list->order_status=='Delivered'){ ?>
                                                                <span class="badge badge-primary-light badge-md">Delivered</span>
                                                            <?php }elseif($ord_list->order_status=='Pending'){ ?>
                                                                <span class="badge badge-danger-light badge-md">Pending</span>
                                                     <?php }elseif($ord_list->order_status=='Cancel'){ ?>
                                                                <span class="badge badge-danger-light badge-md">Cancel</span>
                                                            <?php }else if($ord_list->order_status=='Dispatched'){ ?>
                                                                <span class="badge badge-info-light badge-md">Dispatched</span>
                                                            <?php }else if($ord_list->order_status=='InProcess'){ ?>
                                                                <span class="badge badge-success-light badge-md">InProcess</span>
                                                            <?php }else{ ?>
                                                                <span class="badge badge-warning-light badge-md">Waiting</span>
                                                            <?php } ?></a>
                                        </td>
                                       
                                        <td align="center">
                                             <?=date('d M Y h:i A',strtotime($ord_list->ord_create));?> </td>
                                         <td >
                                            <a href="<?=base_url('order/invoice/').$ord_list->op_id;?>"class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye" style="color:#fff"></i></a>

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


 

 
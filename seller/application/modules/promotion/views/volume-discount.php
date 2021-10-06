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

        
        <section class="main_content_area my_account">
                <div class="container">
                    <div class="account_dashboard">
                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="breadcrumb_content">
             <div class="breadcrumb_header">
      <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
                                <span><i class="fa fa-angle-right"></i></span>
                                <span> Manage Volume Discount </span>
                            </div>
                           
                        </div>
                        </div>
<?php $this->load->view('sidebar');?>   
                     <div class="col-sm-12 col-md-9 col-lg-9">
                            
                        <div class="breadcrumb_content">
           
                            <div class="breadcrumb_title pull-l">
                                <h3>Manage Volume Discount </h3>
                            </div>
                    <div class="action btn-group-scroll pull-right">
                        
                        <div class="save_button primary_btn default_button">
<a href="javascript:void(0);" class="volume_discount_add"><button class="btn_submit" name="btn_submit"><i class="fa fa-plus "></i> Add Volume Discount </button></a>
                                                        </div>
                                </div>
                            
                        </div>
                
                                <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">

    <div class="col-md-12 discount_add" style="display: none" >
<h5 class="cards-title ">Add Special Price</h5>
<hr>
 
        <div class="row">
            <div class="col-sm-12">
                <form id="VolumeDiscountForm" action="<?=base_url('promotion/volume_discount_save');?>" method="post">

      <div class="row">
            <div class="col-sm-6 col-md-6">
               <div class="form-group ">
                        <label class="form-control-label">Product Name <span class="text-red">*</span> </label>
      <select name="vd_pid" class="form-control select2 select2-selection--single w-100 select2-hidden-accessible " data-placeholder="Select Product Name" tabindex="-1" aria-hidden="true">
         <option value="">Select</option>
         <?php if(!empty($product)){
             foreach($product as $product_list){
            echo'<option value="'.$product_list->p_id.'">'.$product_list->p_name.'</option>';
             }
         }
         ?>
         
    </select></div>
</div>
                   
   <div class="col-sm-6 col-md-6">
                     <div class="form-group">
                        <label class="form-control-label"> Minimum Purchase Quantity <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="vd_min_purchase_qty" id="vd_min_purchase_qty" Placeholder="Enter Minimum Purchase Quantity" >
                    </div>
                </div>
                   <div class="col-sm-6 col-md-6">
                     <div class="form-group">
                        <label class="form-control-label"> Discount (%)  <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="vd_discount" id="vd_discount" Placeholder="Enter Discount" >
                    </div>
                </div>
                    

                </div>
                   
               
            
        
             <button type="submit" class="btn btn-primary btn2" value="edit"><i class="fa fa-save"></i> Submit</button>
                <button type="reset" class="btn btn-secondary btn2" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
               
          
             </form>
            </div>
        </div>

    </div>


 
<div class="col-md-12 discount_list" >
<h5 class="cards-title ">List Volume Discount</h5>
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
                                        <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Symbol: activate to sort column ascending" style="width: 111px;">Min. Purchase Qty</th>
                                         <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Symbol: activate to sort column ascending" style="width: 111px;">Discount (%)</th>
                              
                                        <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 103px;">Status</th>
                                       
                                        <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 105px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($volume_discount)){
                                    foreach ($volume_discount as $key => $vd_list) {
                                    if($vd_list->vd_status=='1'){
                                        $icon="check";
                                        $class="success";
                                        $action="2";
                                        $value="Active";
                                        }else{
                                        $icon="ban";
                                        $class="danger";
                                        $action="1";
                                        $value="In-Active";
                                        }?>                                   
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?=$i;$i++;?>.</td>
                                        <td style="width: 300px;"> <?=product($vd_list->vd_pid);?></td>                                       

                                        <td style="width: 180px;"> <?=$vd_list->vd_min_purchase_qty;?> </td>
                                         <td style="width: 110px;"> <?=$vd_list->vd_discount;?> </td>
                                         

                                        <td align="center">
                                         <a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Change Status','volume_discount_status/',<?=$vd_list->vd_id;?>,<?=$action;?>)">
                                                <span class="badge badge-<?=$class;?>-light badge-md"><i class="fa fa-<?=$icon;?>"></i> <?=$value;?></span></a>
                                        </td>
                                       
                                        <td align="center">
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white volume_discount_edit" dicount_id="<?=$vd_list->vd_id;?>" url="<?=base_url();?>" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                           <a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','volume_discount_delete/',<?=$vd_list->vd_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                           

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


 

 <div class="modal fade show" id="DiscountModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Special Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 
<form id="Special_Price_edit" action="<?=base_url('promotion/volume_discount_save');?>" method="post">
 <input type="hidden" class="form-control" name="vd_id" id='getvid' >
   <div class="modal-body">
               <div class="form-group">
                        <label class="form-control-label">Product name <span class="text-red">*</span> </label>
       <input type="text" class="form-control" name="pid" id="getpid" Placeholder="Enter Product name" readonly="">
                    </div>
   
                     <div class="form-group">
                        <label class="form-control-label"> Minimum Purchase Quantity <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="vd_min_purchase_qty" id="purchase_qty" Placeholder="Enter Minimum Purchase Quantity" >
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">Discount (%)
 <span class="text-red">*</span> </label>
       <input type="number" class="form-control" name="vd_discount" id="get_discount" Placeholder="Enter Discount" >
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
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
                                <span> Manage Products Performance</span>
                            </div>
                           
                        </div>
                        </div>
<?php $this->load->view('sidebar');?>   
                     <div class="col-sm-12 col-md-9 col-lg-9">
                            
                        <div class="breadcrumb_content">
           
                            <div class="breadcrumb_title pull-l">
                                <h3>Products Performance List</h3>
                            </div>
                    <div class="action btn-group-scroll pull-right">
                        
                
                                </div>
                            
                        </div>
                
                                <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">




 
<div class="col-md-12 special_list" >
<h5 class="cards-title ">Products Performance List</h5>
<hr>
 <div class="">

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
                                        <th class="w-15p sorting_asc" >Sr.No.</th>
                                        <th class="wd-15p sorting" >Product</th>
                                      
                                        <th class="wd-15p sorting">Brand</th>
                                        <th class="wd-15p sorting" >Model</th>
                                        <th class="wd-15p sorting" >Sold Qty</th>
                                     
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($product_performance)){
                                    foreach ($product_performance as $key => $pp_list) {

                                   ?>                                   
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" align="center"><?=$i;$i++;?>.</td>
                                        <td align="center"> <?=$pp_list->p_name;?>
                                        </td>                                   
                                        <td align="center"> <?=$pp_list->brd_name;?></td>
                                        <td align="center"> <?=$pp_list->p_model;?></td>
                                         <td align="center"> <?=$pp_list->sold;?></td>
                                        
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


 

 
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
	                            <span> Featured Products</span>
	                        </div>
	                       
	                    </div>
						</div>
<?php $this->load->view('sidebar');?>	
	                 <div class="col-sm-12 col-md-9 col-lg-9">
							
	                    <div class="breadcrumb_content">
	       
	                        <div class="breadcrumb_title pull-l">
	                            <h3>Featured Products</h3>
	                        </div>
					<div class="action btn-group-scroll pull-right">
                        
                        
                                </div>
							
	                    </div>
	            
	                            <!-- Tab panes -->
<div class=" dashboard_content">
<div class="row">
<div class="col-md-12">
<h5 class="cards-title ">List Product</h5>
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
                                        <th class="w-10p" style="width: 80px;">S.N.</th>
                                        <th class="wd-15p" style="width: 300px;">Product Name</th>
                                        <th class="wd-15p " style="width: 111px;">Model</th>
                                         <th class="wd-15p"  style="width: 111px;">Brand</th>
                                          <th class="wd-15p" style="width: 111px;">Price</th>
                                        <th class="wd-15p" style="width: 103px;">Status</th>
                                       <th class="wd-15p"  style="width: 105px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; if(!empty($product)){
                                    foreach ($product as $key => $pro_list) {
                                    if($pro_list->p_status=='1'){
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
                                        <td class="sorting_1" ><?=$i;$i++;?>.</td>
                                        <td style="width: 300px; "> <?=$pro_list->p_name;?></td>
                                        <td><?=$pro_list->p_model;?></td>
                                        <td><?=brand($pro_list->p_brand);?></td>

                                        <td> <?=currency($this->website->web_currency);?> <?=$pro_list->p_selling_price;?> </td>

                                        <td align="center">
                                         <a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Change Status','product/product_status/',<?=$pro_list->p_id;?>,<?=$action;?>)">
                                                <span class="badge badge-<?=$class;?>-light badge-md"><i class="fa fa-<?=$icon;?>"></i> <?=$value;?></span></a>
                                        </td>
                                         <td align="center">

                                          
                                            <a href="javascript:void(0);"  class="btn btn-default btn-sm mb-2 mb-xl-0 text-white ProductView" ProductView='<?=$pro_list->p_id;?>' url="<?=base_url();?>" data-toggle="tooltip" data-original-title="Product View"><i class="fa fa-eye"></i></a>

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



<div class="modal fade show" id="ProductModal" tabindex="-1" role="dialog" style="display: none; padding-right: 5px;">
    <div class="modal-dialog" role="document" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Product_title1">Product View </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> 

   <div class="modal-body">

    <div class="row">
        <div class="col-md-5">
       <span id="pimg"></span>
        </div>
        <div class="col-md-7"> 
               <h5 class="modal-title" id="Product_title"></h5>
               <hr/>
        <table border="0" style="font-size: 15px;width:100%;height: 200px;">
            <tr>
                <th>Reference No.</th>
                <td id='Reference'></td>               

            </tr>
             <tr>
                <th>Product Categories :</th>
                <td id='Categories'></td>              

            </tr>
             <tr>                
                <th>Brand :</th>
                <td id='Brand'></td>               

            </tr>
              <tr>  
                <th>Model</th>
                 <td id='Model'></td>

            </tr>
            <tr>                
                <th>Selling Price</th>
                <td id='Price'></td>
            </tr>
        </table>   
        </div>
    </div>
             
                    
                      
                    
                   
               
            </div>
            
             
        </div>
    </div>
</div>         
 <!-- Footer opened -->
    <footer class="footer-main">
        <div class="container">
            <div class="  mt-2 mb-2 text-center"> <?php echo $this->website->web_copy_right; ?> </div>
        </div>
    </footer>
    <!-- Footer closed -->
    <!-- Back-to-top --><a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <input type="hidden" id="site_url" name="site_url" value="<?=base_url();?>" />
    <!-- Jquery-scripts -->
  
    <script src="<?=base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>
 
    <script src="<?=base_url();?>assets/plugins/moment/moment.min.js"></script>
   
    <script src="<?=base_url();?>assets/js/vendors/bootstrap.bundle.min.js"></script>
 
    <script src="<?=base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>
    
    <script src="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  
    <script src="<?=base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
   
    <script src="<?=base_url();?>assets/js/vendors/circle-progress.min.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/clipboard/clipboard.min.js"></script>
  
    <script src="<?=base_url();?>assets/plugins/clipboard/clipboard.js"></script>

    <script src="<?=base_url();?>assets/plugins/prism/prism.js"></script>
  
    <script src="<?=base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
  
    <script src="<?=base_url();?>assets/plugins/jquery-nice-select/js/jquery.nice-select.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/jquery-nice-select/js/nice-select.js"></script>
  
    <script src="<?=base_url();?>assets/plugins/p-scroll/p-scroll.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/p-scroll/p-scroll-leftmenu.js"></script>

  
    <script src="<?=base_url();?>assets/plugins/sidemenu/sidemenu.js"></script>
    
  
    <script src="<?=base_url();?>assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
    <script src="<?=base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>assets/plugins/datatable/datatable.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/jqvmap/jquery.vmap.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/jqvmap/jquery.vmap.sampledata.js"></script>

    <script src="<?=base_url();?>assets/js/apexcharts.js"></script>
   
    <script src="<?=base_url();?>assets/plugins/chart/chart.min.js"></script>

    <script src="<?=base_url();?>assets/js/index.js"></script>

    <script src="<?=base_url();?>assets/js/index-map.js"></script>
    
    <script src="<?=base_url();?>assets/js/left-menu.js"></script>
 
    <script src="<?=base_url();?>assets/switcher/js/switcher.js"></script>
 
    <script src="<?=base_url();?>assets/plugins/sidebar/sidebar.js"></script>
    
    <script src="<?=base_url();?>assets/js/custom.js"></script>
    <script src="<?=base_url();?>assets/plugins/summernote/summernote-bs4.js"></script><script src="<?=base_url();?>assets/plugins/summernote/summernote.js"></script>
     <script src="<?=base_url();?>assets/js/custom_query.js"></script>
        <script src="<?=base_url();?>assets/js/product.js"></script>
        <script src="<?=base_url();?>assets/plugins/date-picker/bootstrap-datepicker.min.js"></script>
   
        <!-- validation -->
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="<?=base_url();?>assets/js/customvalidation.js"></script>
    <script src="<?=base_url();?>../admin/assets/plugins/date-picker/bootstrap-datepicker.min.js"></script>
    <script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
<script>
$(document).ready(function() {
$('.select2').select2({
placeholder: 'Select your Serach'
});
});
</script>
    <script type='text/javascript'>
$(function(){
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true
});  
});

</script>

<script type="text/javascript">
$(document).ready(function(){
        
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="images[]" class="col-sm-8 col-md-8" onchange="preview_image'+x+'();" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;" /><span id="image_preview" class="col-sm-2 col-md-2" style="display: inline-block;"></span><a href="javascript:void(0);" class="remove_button col-sm-2 col-md-2" ><i class="fa fa-minus"></i></a></div>'; 
    //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div><input type="file" name="images[]" class="form-control col-sm-8 col-md-8" onchange="get_preview_image('+x+');" id="image_file'+x+'" accept="image/x-png,image/gif,image/jpg,image/jpeg," style="display: inline-block;" /><span id="image_preview'+x+'" class="col-sm-2 col-md-2" style="display: inline-block;"></span><a href="javascript:void(0);" class="remove_button col-sm-2 col-md-2" ><i class="fa fa-minus"></i></a></div>'); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    $( ".pro_offer" ) .change(function () { 
    var pro_offer   = $('.pro_offer').val();
    if(pro_offer=='2'){
        $('.offer_price').show();
    }else{
        $('.offer_price').hide();
    }
    }); 

});

 var specialKeys = new Array();
        specialKeys.push(8); //Backspace
function IsNumeric(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#pd_price').html('');
            }else{  $('#pd_price').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function pd_length(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Length').html('');
            }else{  $('#Length').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
 function getwidth(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Width').html('');
            }else{  $('#Width').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function getheight(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Height').html('');
            }else{  $('#Height').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function weight(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#Weight').html('');
            }else{  $('#Weight').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function cost(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#cost_price').html('');
            }else{  $('#cost_price').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
  function available(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#available_qty').html('');
            }else{  $('#available_qty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
function qty(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#purchase_qty').html('');
            }else{  $('#purchase_qty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
 
         function qty1(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#purchaseqty').html('');
            }else{  $('#purchaseqty').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }

        function sp_price(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#specialprice').html('');
            }else{  $('#specialprice').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }
         function get_discount(e) {
    
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            if(ret){
           $('#discount').html('');
            }else{  $('#discount').html('<span style="color:red">* Input digits (0 - 9)</span>');}
            return ret;
        }

     function slug_url(get,id){
            var  data=$.trim(get);
            var string = data.replace(/[^A-Z0-9]/ig, '-')
                            .replace(/\s+/g, '-') // collapse whitespace and replace by -
                            .replace(/-+/g, '-'); // collapse dashes;
            var finalvalue=string.toLowerCase();
            document.getElementById(id).value=finalvalue;
        }

        function selling_price(get,id){
            var  data=$.trim(get);           
            document.getElementById(id).value=data;
        }

 
</script>
       <?php error_reporting(0);   $date=[];              
                    $PendingArray=[];
                    foreach ($this->AllProduct['date'] as $key=>$date_Value) {
                                $date[]="'".date('d M',strtotime($date_Value->date))."'";
                            }

                            foreach ($this->AllProduct['PendingRevenue'] as $PR_Value) {
                               // if(in_array($PR_Value->date, $date)){
                                $PendingArray[]=$PR_Value->revenue; 
                                // }else{
                                //    //$PendingArray[]=='0' ;
                                // }                
                            }

                            $CompleteRevenue=[];
                            foreach ($this->AllProduct['CompleteRevenue'] as $CR_Value) {
                               // if(in_array($CR_Value->date, $date)){
                                $CompleteRevenue[]=$CR_Value->revenue; 
                               // }else{
                               // // $CompleteRevenue[]='0'; 
                               // }
                                 
                                                       
                            }
                           
                            
                            
                           
                           ?>
                             
<script>
    $(function(e){
  'use strict'


    /* Chartjs (#linechart) */
    var myCanvas = document.getElementById("line-chart");
  
    myCanvas.height="280";

    var myCanvasContext = myCanvas.getContext("2d");
    var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 500);
    gradientStroke1.addColorStop(0, 'rgb(34, 5, 191,0.7)');

    var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 390);
    gradientStroke2.addColorStop(0, 'rgb(250, 113, 59,0.8)');

    var myChart = new Chart( myCanvas, {
        type: 'line',
        data: {
            labels: [<?php echo implode(', ',array_unique($date));?>],
            datasets: [{
                label: 'Pending Order',
                data: [<?php echo implode(', ',$PendingArray);?>],
                backgroundColor: gradientStroke1,
                borderWidth: 2,
                hoverBackgroundColor: gradientStroke1,
                hoverBorderWidth: 0,
                borderColor: gradientStroke1,
                hoverBorderColor: 'gradientStroke1',
                lineTension: .3,
                pointBorderWidth: 0,
                pointHoverRadius: 4,
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 0,
                pointRadius: 0,
                pointHitRadius: 0,
            }, {

                label: 'Complete Order',
                data: [<?php echo implode(', ',$CompleteRevenue);?>],
                backgroundColor: gradientStroke2,
                borderWidth: 2,
                hoverBackgroundColor: gradientStroke2,
                hoverBorderWidth: 0,
                borderColor: gradientStroke2,
                hoverBorderColor: 'gradientStroke2',
                lineTension: .3,
                pointBorderWidth: 0,
                pointHoverRadius: 4,
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 0,
                pointRadius: 0,
                pointHitRadius: 0,


            }
          ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: 'rgba(225,225,225,0.9)',
                bodyFontColor: 'rgba(225,225,225,0.9)',
                backgroundColor: 'rgba(0,0,0,0.5)',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: true,
                labels: {
                    usePointStyle: true,
                    fontColor: "#8492a6",
                },
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#8492a6",
                     },
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        fontColor: '#8492a6'
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: "#8492a6",
                     },
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        fontColor: '#8492a6'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });
     });
    /* Chartjs (#linechart) closed */
</script>


    
</body>

</html>





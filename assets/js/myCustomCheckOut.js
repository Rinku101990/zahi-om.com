
$(document).ready(function() {
    $('.category-nav-element').each(function(i, el) {
        $(el).on('mouseover', function(){
            if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                $.post('http://shop.activeitzone.com/category/nav-element-list', {_token: 'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', id:$(el).data('id')}, function(data){
                    $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                });
            }
        });
    });
    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-item a').each(function() {
            $(this).on('click', function(e){
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('http://shop.activeitzone.com/language',{_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', locale:locale}, function(data){
                    location.reload();
                });

            });
        });
    }

    if ($('#currency-change').length > 0) {
        $('#currency-change .dropdown-item a').each(function() {
            $(this).on('click', function(e){
                e.preventDefault();
                var $this = $(this);
                var currency_code = $this.data('currency');
                $.post('http://shop.activeitzone.com/currency',{_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', currency_code:currency_code}, function(data){
                    location.reload();
                });

            });
        });
    }
});

$('#search').on('keyup', function(){
    search();
});

$('#search').on('focus', function(){
    search();
});

function search(){
    var search = $('#search').val();
    if(search.length > 0){
        $('body').addClass("typed-search-box-shown");

        $('.typed-search-box').removeClass('d-none');
        $('.search-preloader').removeClass('d-none');
        $.post('http://shop.activeitzone.com/ajax-search', { _token: 'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', search:search}, function(data){
            if(data == '0'){
                // $('.typed-search-box').addClass('d-none');
                $('#search-content').html(null);
                $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                $('.search-preloader').addClass('d-none');

            }
            else{
                $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                $('#search-content').html(data);
                $('.search-preloader').addClass('d-none');
            }
        });
    }
    else {
        $('.typed-search-box').addClass('d-none');
        $('body').removeClass("typed-search-box-shown");
    }
}

function updateNavCart(){
    $.post('http://shop.activeitzone.com/cart/nav-cart-items', {_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0'}, function(data){
        $('#cart_items').html(data);
    });
}

function removeFromCart(key){
    $.post('http://shop.activeitzone.com/cart/removeFromCart', {_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', key:key}, function(data){
        updateNavCart();
        $('#cart-summary').html(data);
        showFrontendAlert('success', 'Item has been removed from cart');
        $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
    });
}

function addToCompare(id){
    $.post('http://shop.activeitzone.com/compare/addToCompare', {_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', id:id}, function(data){
        $('#compare').html(data);
        showFrontendAlert('success', 'Item has been added to compare list');
        $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
    });
}

function addToWishList(id){
    showFrontendAlert('warning', 'Please login first');
}

function showAddToCartModal(id){
    if(!$('#modal-size').hasClass('modal-lg')){
        $('#modal-size').addClass('modal-lg');
    }
    $('#addToCart-modal-body').html(null);
    $('#addToCart').modal();
    $('.c-preloader').show();
    $.post('http://shop.activeitzone.com/cart/show-cart-modal', {_token:'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', id:id}, function(data){
        $('.c-preloader').hide();
        $('#addToCart-modal-body').html(data);
        $('.xzoom, .xzoom-gallery').xzoom({
            Xoffset: 20,
            bg: true,
            tint: '#000',
            defaultScale: -1
        });
        getVariantPrice();
    });
}

$('#option-choice-form input').on('change', function(){
    getVariantPrice();
});

function getVariantPrice(){
    if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
        $.ajax({
           type:"POST",
           url: 'http://shop.activeitzone.com/product/variant_price',
           data: $('#option-choice-form').serializeArray(),
           success: function(data){
               $('#option-choice-form #chosen_price_div').removeClass('d-none');
               $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
               $('#available-quantity').html(data.quantity);
               $('.input-number').prop('max', data.quantity);
               //console.log(data.quantity);
               if(parseInt(data.quantity) < 1){
                   $('.buy-now').hide();
                   $('.add-to-cart').hide();
               }
               else{
                   $('.buy-now').show();
                   $('.add-to-cart').show();
               }
           }
       });
    }
}

/*-- In Use For Cart Validation --*/ 
function checkAddToCartValidity(){
    var names = {};
    $('#option-choice-form input:radio').each(function() { // find unique names
          names[$(this).attr('name')] = true;
    });
    var count = 0;
    $.each(names, function() { // then count them
          count++;
    });
    if($('#option-choice-form input:radio:checked').length == count){
        return true;
    }
    return false;
}

/*-- In Use Add To Cart --*/ 
function addToCart(){
    if(checkAddToCartValidity()) {
        $('#addToCart').modal();
        $('.c-preloader').show();
        var siteurl = $("#site_url").val();
        alert(siteurl);
       //  $.ajax({
       //     type:"POST",
       //     url: siteurl+'cart/addtocart',
       //     data: $('#option-choice-form').serializeArray(),
       //     success: function(data){
       //         $('#addToCart-modal-body').html(null);
       //         $('.c-preloader').hide();
       //         $('#modal-size').removeClass('modal-lg');
       //         $('#addToCart-modal-body').html(data);
       //         updateNavCart();
       //         $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
       //     }
       // });
    }
    else{
        showFrontendAlert('warning', 'Please choose all the options');
    }
}

/*-- In Use Buy Now --*/ 
function buyNow(){
    if(checkAddToCartValidity()) {
        $('#addToCart').modal();
        $('.c-preloader').show();
        var siteurl = $("#site_url").val();
        alert(siteurl);
       //  $.ajax({
       //     type:"POST",
       //     url: siteurl+'cart/addtocart',
       //     data: $('#option-choice-form').serializeArray(),
       //     success: function(data){
       //         //$('#addToCart-modal-body').html(null);
       //         //$('.c-preloader').hide();
       //         //$('#modal-size').removeClass('modal-lg');
       //         //$('#addToCart-modal-body').html(data);
       //         updateNavCart();
       //         $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
       //         window.location.replace("http://shop.activeitzone.com/cart");
       //     }
       // });
    }
    else{
        showFrontendAlert('warning', 'Please choose all the options');
    }
}

function show_purchase_history_details(order_id)
{
    $('#order-details-modal-body').html(null);

    if(!$('#modal-size').hasClass('modal-lg')){
        $('#modal-size').addClass('modal-lg');
    }

    $.post('http://shop.activeitzone.com/purchase_history/details', { _token : 'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', order_id : order_id}, function(data){
        $('#order-details-modal-body').html(data);
        $('#order_details').modal();
        $('.c-preloader').hide();
    });
}

function show_order_details(order_id)
{
    $('#order-details-modal-body').html(null);

    if(!$('#modal-size').hasClass('modal-lg')){
        $('#modal-size').addClass('modal-lg');
    }

    $.post('http://shop.activeitzone.com/orders/details', { _token : 'FTGK8wafS23MsCEZ3zOdOWSjzzeM3OOoafYf33C0', order_id : order_id}, function(data){
        $('#order-details-modal-body').html(data);
        $('#order_details').modal();
        $('.c-preloader').hide();
    });
}

function cartQuantityInitialize(){
$('.btn-number').click(function(e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if (type == 'minus') {

            if (currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if (type == 'plus') {

            if (currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

$('.input-number').focusin(function() {
    $(this).data('oldValue', $(this).val());
});

$('.input-number').change(function() {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }


});
$(".input-number").keydown(function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
}

function imageInputInitialize(){
 $('.custom-input-file').each(function() {
     var $input = $(this),
         $label = $input.next('label'),
         labelVal = $label.html();

     $input.on('change', function(e) {
         var fileName = '';

         if (this.files && this.files.length > 1)
             fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
         else if (e.target.value)
             fileName = e.target.value.split('\\').pop();

         if (fileName)
             $label.find('span').html(fileName);
         else
             $label.html(labelVal);
     });

     // Firefox bug fix
     $input
         .on('focus', function() {
             $input.addClass('has-focus');
         })
         .on('blur', function() {
             $input.removeClass('has-focus');
         });
 });
}
(function () {
    'use strict';

    // Toggle sidebar on Menu button click
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#body').toggleClass('active');
    });

    // Auto-hide sidebar on window resize if window size is small
    // $(window).on('resize', function () {
    //     if ($(window).width() <= 768) {
    //         $('#sidebar, #body').addClass('active');
    //     }
    // });
})();
(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $('.loader').fadeOut();
        $('#preloader').delay(100).fadeOut('slow');
    });
})(jQuery);

// Quantity
$(document).ready(function () {

    /////////////////====================  Same product=============

    if ($('.owl-carousel').length > 0) {
        // check if element exists
        $('.owl-carousel').slick({
            infinite: true,
            swipeToSlide: true,
            slidesToShow: 5,
            dots: true,
            slidesToScroll: 2,
            autoplay: true,
            prevArrow:
                '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
            nextArrow:
                '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    } // end if

    // ===============active category=============================
});

$('.btn-number').click(function (e) {
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
$('.input-number').focusin(function () {
    $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function () {

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
$(".input-number").keydown(function (e) {
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
$(document).ready(function() {
    $(".js-status-update a").click(function() {
        var selText = $(this).text();
        var $this = $(this);
        $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
        $this.parents('.dropdown-menu').find('li').removeClass('active');
        $this.parent().addClass('active');
    });
    
    $.utils.autoFocus();

    setTimeout(function() {
        $.utils.clearFlash();
    }, timeOutNumber);
    
    $('.has-tooltip').tooltip({
        placement: 'bottom'
    });

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,

    });

    $('.has-datepicker').datetimepicker({
        'format': 'DD-MM-YYYY',
        pickTime: false,
        maxDate: moment("<?php echo date('Y-m-d') ?>"),
    });
    
    $('.money-format').each(function(){
        var originValue = $(this).text();
        var realNumber = parseFloat(originValue);
        if(realNumber > 0) {
            $(this).text(accounting.formatNumber(realNumber));
        }
    });
    
    var format = function(num){
        var str = num.toString(), parts = false, output = [], i = 1, formatted = null;
        if(str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
        }
        str = str.split("").reverse();
        for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ",") {
                        output.push(str[j]);
                        if((i%3 == 0 && j < (len - 1)) && str[j+1] != '-' ) {
                                output.push(",");
                        }
                        i++;
                }
        }
        formatted = output.reverse().join("");
        return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    $(function(){
        $(".currency").keyup(function(e){
            $(this).val(format($(this).val()));
        });
    });

});

// Script For Slider
var galleryTop = new Swiper('.slider-special-new .gallery-top', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 4, //looped slides should be the same
    autoplay: 7000,
    autoplayDisableOnInteraction: false
});
var galleryThumbs = new Swiper('.slider-special-new .gallery-thumbs', {
    spaceBetween: 0,
    //centeredSlides: true,
    slidesPerView: 4,
    touchRatio: 0.2,
    loop:true,
    loopedSlides: 4, //looped slides should be the same
    slideToClickedSlide: true
});
galleryTop.params.control = galleryThumbs;
galleryThumbs.params.control = galleryTop;

// Script For Slider
var galleryTop2 = new Swiper('.slider-latests-new .gallery-top', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 3, //looped slides should be the same
    autoplay: 7000,
    autoplayDisableOnInteraction: false
});
var galleryThumbs2 = new Swiper('.slider-latests-new .gallery-thumbs', {
    spaceBetween: 0,
    direction: 'vertical',
    slidesPerView: 3,
    touchRatio: 0.2,
    loop:true,
    loopedSlides: 3, //looped slides should be the same
    slideToClickedSlide: true
});
galleryTop2.params.control = galleryThumbs2;
galleryThumbs2.params.control = galleryTop2;

//

var swiper = new Swiper('.character-skin-1 .swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 1,
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 0,
    loop:true,
    loopedSlides: 1, //looped slides should be the same
    autoplayDisableOnInteraction: false
});

var swiper = new Swiper('.character-skin-2 .swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 1,
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 0,
    loop:true,
    loopedSlides: 1, //looped slides should be the same
    autoplayDisableOnInteraction: false
});

var scrollAmount = document.body['clientHeight'];
$('.slider-gallery').animate({scrollTop: scrollAmount}, 75000);

// check
$(".skin-nu").css('display', 'none');
$(document).ready(function() {
    $('input[type=radio][name=gender]').change(function() {
        if (this.value == '1') {
            $(".skin-nam").css('display', 'block');
            $(".skin-nu").css('display', 'none');
        }
        else if (this.value == '2') {
            $(".skin-nam").css('display', 'none');
            $(".skin-nu").css('display', 'block');
        }
    });
});
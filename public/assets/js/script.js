$(document).ready(function() {
    pageSetUp();

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
    
    $('.has-popover').popover('show');
    
    $('.datepicker').datepicker({
        minDate: new Date()
    });
    
    $('select.has-custom-select').select2({
        formatNoMatches: function (term) {                
            return "Không tìm thấy dữ liệu.";
        }
    });
    
    $('.has-datetimepicker').datetimepicker({
        'format': 'DD-MM-YYYY HH:mm',
         minDate: moment("<?php echo date('Y-m-d') ?>"),
    });
    
    $('.has-datepicker').datetimepicker({
        'format': 'DD-MM-YYYY',
        pickTime: false,
        maxDate: moment("<?php echo date('Y-m-d') ?>"),
    });
    
    $('.has-monthpicker').datetimepicker({
        viewMode: 'months',
        format: 'MM-YYYY',
        pickTime: false,
    });
    
    //$('.tags').tagsInput();
    
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
    
    $('#main').on('click', '.cancel-item-upload', function() {
        var that = this;
        var tpl = $(this).parents('.item-upload').eq(0);
        var message = typeof $(this).data('confirm') != 'undefined' ? $(this).data('confirm') : "Are you sure you want to delete?";
        var action1 = typeof $(this).data('action1') != 'undefined' ? $(this).data('action1') : "<i class='fa fa-times'></i> " + 'Cancel';
        var action2 = typeof $(this).data('action2') != 'undefined' ? $(this).data('action2') : "<i class='fa fa-check'></i> " + 'Ok';
        bootbox.confirm({
            message: message,
            buttons: {
                'cancel': {
                    label: action1,
                    className: 'btn-default'
                },
                'confirm': {
                    label: action2,
                    className: 'btn-info'
                }
            },
            callback: function(result) {
                if (result) {
                    tpl.fadeOut(function() {
                        $.ajax({
                            type: "get",
                            url: $(that).data('href'),
                            dataType: 'Json',
                            beforeSend: function() {},
                            success: function(respond) {
                            },
                            complete: function() {          
                            }
                        });
                        tpl.remove();
                    });                     
                }
            }
        });
    });

});

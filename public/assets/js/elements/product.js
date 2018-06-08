(function($) {
    var $document = $(document);
    
   // publish product
   $(document).ready(function() {
       $('#main').on('click', '.delete-product', function(e) {
        e.preventDefault();
        var that = this;
        bootbox.confirm({
            message: $(this).data('confirm'),
            buttons: {
                'cancel': {
                    label: $(this).data('action1'),
                    className: 'btn-default'
                },
                'confirm': {
                    label: $(this).data('action2'),
                    className: 'btn-info'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        url: $(that).attr('href'),
                        type: $(that).data('method'),
                        dataType: 'json',
                        beforeSend: function(xhr, settings) {},
                        success: function(data, status, xhr) {
                            if ($(that).hasClass('delete-product')) {
                                if (data.status) {                                       
                                        window.location.href = data.href;
                                    }
                                }
                        },
                        complete: function(xhr, status) {},
                        error: function (xhr, ajaxOptions, thrownError) {
                            $("#error-modal").modal('show');
                        }
                    });
                }
            }
        });
        });
   }); 
    
    // Create notice
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-product-new');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    var error_fields = new Array();
                    for (var field in data.messages) {
                        error_fields.push(field);
                        $.utils.showFieldError('form-product-new', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-product-new', '.input-error');
                    $.utils.focusErrorTab(error_fields);
                } else {
                    $.utils.showFlash(data.messages, 'alert-danger');
                }
                
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-product-new');
    
    
    // Update product
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-product-edit');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    var error_fields = new Array();
                    for (var field in data.messages) {
                        error_fields.push(field);
                        $.utils.showFieldError('form-product-edit', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-product-edit', '.input-error');
                    $.utils.focusErrorTab(error_fields);
                } else {
                    $.utils.showFlash(data.messages, 'alert-danger');
                }
                
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-product-edit');
})(jQuery);
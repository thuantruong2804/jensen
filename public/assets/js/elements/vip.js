(function($) {
    var $document = $(document);
    
    // Update product
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-vip-edit');
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
                        $.utils.showFieldError('form-vip-edit', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-vip-edit', '.input-error');
                    $.utils.focusErrorTab(error_fields);
                } else {
                    $.utils.showFlash(data.messages, 'alert-danger');
                }
                
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-vip-edit');
})(jQuery);
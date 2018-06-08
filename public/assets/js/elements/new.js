(function($) {
    var $document = $(document);
    
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-new-new');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-new-new', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-new-new', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-new-new');
    
    
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-new-edit');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-new-edit', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-new-edit', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-new-edit');
    
   
   // change status function
   $(document).ready(function() {
       $('#content').on('click', '.delete-new', function(e) {
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
                            if ($(that).hasClass('delete-new')) {
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
})(jQuery);
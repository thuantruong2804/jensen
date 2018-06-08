(function($) {
    var $document = $(document);
    
    // success evt for delete category action
    $(document).ready(function() {
       $('#main-content').on('click', '.delete-category', function(e) {
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
                            if (typeof $.categories !== 'undefined') {
                                $.categories.api().row( $(that).closest('tr') ).remove().draw();
                                $.utils.showFlash(data.message, 'alert-success');
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
    
   // publish category
   $(document).ready(function() {
       $('#main-content').on('click', '.public-category', function(e) {
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
                            if ($(that).hasClass('public-category')) {
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
            $.utils.clearFieldError('form-category-new');
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
                        $.utils.showFieldError('form-category-new', field, data.messages[field][0]);
                    }
                    $.utils.autoFocus('form-category-new', '.input-error');
                    $.utils.focusErrorTab(error_fields);
                } else {
                    $.utils.showFlash(data.messages, 'alert-danger');
                }
                
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-category-new');
    
    
    // Update category
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-category-edit');
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
                        $.utils.showFieldError('form-category-edit', field, data.messages[field][0]);
                    }
                    $.utils.autoFocus('form-category-edit', '.input-error');
                    $.utils.focusErrorTab(error_fields);
                } else {
                    $.utils.showFlash(data.messages, 'alert-danger');
                }
                
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-category-edit');
})(jQuery);
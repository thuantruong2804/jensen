(function($) {
    var $document = $(document);
    
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-account-new');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-account-new', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-account-new', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-account-new');
    
    
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-account-edit');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-account-edit', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-account-edit', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-account-edit');
    
   // change status function
   $(document).ready(function() {
       $('#content').on('click', '.public-user', function(e) {
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
                            if ($(that).hasClass('public-user')) {
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
   
   
   // change status function
   $(document).ready(function() {
       $('#content').on('click', '.delete-user', function(e) {
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
                            if ($(that).hasClass('delete-user')) {
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
   
   
   // change status function
   $(document).ready(function() {
       $('#content').on('click', '.delete-account', function(e) {
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
                            if ($(that).hasClass('delete-account')) {
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
   
   
   $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-user-profile');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-user-profile', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-user-profile', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-user-profile');
    
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-user-password');
            $(this).find('.btn').attr('disabled', 'disabled');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code === 'invalid_data') {
                    for (var field in data.messages) {
                        $.utils.showFieldError('form-user-password', field, data.messages[field][0], 1);
                    }
                    $.utils.autoFocus('form-user-password', '.input-error');
                }
                else {
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-user-password');
   
   $('#select_role').change(function(){
       if ($(this).val() == '2') {
           $('.manager-select').css('display', 'block');
           $('.sale-select').css('display', 'none');
           $('#is_manager').val('1');
           $('#is_sale').val('0');
       } else if($(this).val() == '3') {
           $('.manager-select').css('display', 'none');
           $('.sale-select').css('display', 'block');
           $('#is_sale').val('1');
           $('#is_manager').val('0');
       } else {
           $('.manager-select').css('display', 'none');
           $('.sale-select').css('display', 'none');
           $('#is_manager').val('0');
           $('#is_sale').val('0');
       }
   });
   
})(jQuery);
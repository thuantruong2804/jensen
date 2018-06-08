(function($) {
    var $document = $(document);

    /**
     * Check Change Password with ajax
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('change-password');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('change-password', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('change-password', '.input-error');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#change-password');


    /**
     * Verify Code
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('verify-code');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('verify-code', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('verify-code', '.input-error');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#verify-code');

    /**
     * Reset password
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('reset-password');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('reset-password', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('reset-password', '.input-error');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#reset-password');

})(jQuery);
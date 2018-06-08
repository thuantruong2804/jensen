(function($) {
    var $document = $(document);

    /**
     * Check login with ajax
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-login');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                if (typeof data.redirect != '') {
                    window.location.href = data.redirect;
                } else {
                    window.location.reload();
                }

            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('form-login', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('form-login', '.input-error');
                    $('#login-error').text('');
                    grecaptcha.reset();
                } else {
                    $('#login-error').text(data.message);
                    $('.alert').css('display', 'block');
                    grecaptcha.reset();
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-login');

    /**
     * Admin forgot password (normal)
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('form-forgotpass');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
            $('#send-success').text('');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('form-forgotpass', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('form-forgotpass', '.input-error');
                    $('#login-error').text('');
                }
                else {
                    $('#login-error').text(data.message);
                    $('.alert').css('display', 'block');
                }

            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#form-forgotpass');


    $('#forgotPass').click(function(){
        $( ".forgotPassword" ).animate({
            height: "toggle"
        }, 200, function() {
        });
    });
})(jQuery);
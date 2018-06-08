(function($) {
    var $document = $(document);

    /**
     * Check Repayment with ajax
     * @author Thuan Truong
     */
    $('#paymentAmount').change(function(){
        $value = $(this).val();
        $('#paymentAmountCopy').val($value);
    });
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('query-contract');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
            $('#printBill').css('display', 'none'); 
            $('#repayment-success').text('')
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                $('#btnRepayment').remove();
                $('#repayment-success').text('Thanh toán thành công!');
                $('#repayment-success').show();
                $('#printBill').css('display', 'block');
                $('#printBill').href = data.href;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('query-contract', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('query-contract', '.input-error');
                } else {

                    $('.show_error').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data.messages+'</div>');
                    $('.show_error').focus();   
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#repayment');


    /**
     * Change Contract
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('change-contract-no');
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
                            $.utils.showFieldError('change-contract-no', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('change-contract-no', '.input-error');
                } else if(data.code == 'data_sms') {
                    $('#data_sms_change').css('display', 'block');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#change-contract-no');

    /**
     * Cancel Transaction
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('transaction-cancel');
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
                            $.utils.showFieldError('transaction-cancel', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('transaction-cancel', '.input-error');
                } else if(data.code == 'data_sms') {
                    $('#data_sms_cancel').css('display', 'block');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#transaction-cancel');


    /**
     * Refund
     * @author Thuan Truong
     */
    $document.on({
        'ajax:beforeSend': function() {
            $.utils.clearFieldError('refund');
            $(this).find('.btn').attr('disabled', 'disabled');
            $('#login-error').text('');
            $('.alert').css('display', 'none');
            $('#printCancel').css('display', 'none');
        },
        'ajax:success': function(e, data) {
            if (data.status) {
                window.location.href = data.redirect;
            } else {
                if (data.code == 'invalid_data') {
                    for (var field in data.messages) {
                        $.each(data.messages[field], function (key, value) {
                            $.utils.showFieldError('refund', key, value, 1);
                        })
                    }
                    $.utils.autoFocus('refund', '.input-error');
                } else {
                    $('.alert').css('display', 'block');
                }
            }
        },
        'ajax:complete': function() {
            $(this).find('.btn').removeAttr('disabled');
        }

    }, '#refund');

})(jQuery); 
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>
            @section('title')
                Grand Theft Auto Vietnamese Community
            @show
        </title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Basic Styles -->
        {{ HTML::style('assets/frontend/css/bootstrap.min.css') }}
        {{ HTML::style('assets/frontend/css/font-awesome.min.css') }}
        {{ HTML::style('assets/frontend/css/bootstrap-datetimepicker.css') }}
        {{ HTML::style('assets/frontend/css/datepicker.css') }}
        {{ HTML::style('assets/frontend/css/jquery.dataTables.min.css') }}
        {{ HTML::style('assets/frontend/css/dataTables.bootstrap.css') }}
        {{ HTML::style('assets/frontend/css/swiper.min.css') }}
        {{ HTML::style('assets/frontend/css/animate.css') }}
        {{ HTML::style('assets/frontend/css/style.css') }}

        <!-- FAVICONS -->
        <link rel="shortcut icon" href="{{Asset('assets/frontend/img/logo.png')}}" type="image/x-icon">
        <link rel="icon" href="{{Asset('assets/frontend/img/logo.png')}}" type="image/x-icon">

        <script type="text/javascript">
            timeOutNumber = 40000; //in ms
            thousandsSep = ',';
        </script>
        <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    </head>
    <body class="">
        <div id="wrapper">
            @include('elements/app_header')
            <div id="content">
                <div class="container">
                    <div class="contain-flash">
                        <div class="flash">
                            @include('elements/flash')
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
            @include('elements/app_footer')
        </div>

        {{ HTML::script('assets/frontend/js/libs/jquery-3.1.1.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery-ui-1.10.3.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/moment.js') }}
        {{ HTML::script('assets/frontend/js/libs/bootstrap.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/bootbox.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/accounting.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/common.js') }}
        {{ HTML::script('assets/frontend/js/libs/bootstrap-datetimepicker.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.dataTables.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/swiper.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/gcharts.js') }}
        {{ HTML::script('assets/frontend/js/script.js') }}

        @section('scripts')
        @show

            <script>
            (function($) {
                var $document = $(document);

                /**
                 * login (normal)
                 */
                $document.on({
                    'ajax:beforeSend': function() {
                        $.utils.clearFieldError('form-admin-login');
                        $(this).find('.btn').attr('disabled', 'disabled');
                        $('#login-error').text('');
                        $('.alert').css('display', 'none');
                    },
                    'ajax:success': function(e, data) {
                        console.log(data);
                        if (data.status) {
                            if (typeof data.redirect != '') {
                                window.location.href = data.redirect;
                            } else {
                                window.location.reload();
                            }

                        } else {
                            if (data.code == 'invalid_data') {
                                for (var field in data.messages) {
                                    //$.utils.showFieldError('form-admin-login', field, data.messages[field][0]);

                                    $('#login-error').text(data.messages[field][0]);
                                    break;
                                }
                                $.utils.autoFocus('form-admin-login', '.input-error');
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

                }, '#form-admin-login');


                $document.on({
                    'ajax:beforeSend': function() {
                        $.utils.clearFieldError('form-change-password');
                        $(this).find('.btn').attr('disabled', 'disabled');
                        $('#login-error').text('');
                        $('.alert').css('display', 'none');
                    },
                    'ajax:success': function(e, data) {
                        console.log(data);
                        if (data.status) {
                            if (typeof data.redirect != '') {
                                window.location.href = data.redirect;
                            } else {
                                window.location.reload();
                            }

                        } else {
                            if (data.code == 'invalid_data') {
                                for (var field in data.messages) {
                                    $.utils.showFieldError('form-change-password', field, data.messages[field][0], 1);

                                    //$('#login-error').text(data.messages[field][0]);
                                    //break;
                                }
                                $.utils.autoFocus('form-change-password', '.input-error');
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

                }, '#form-change-password');

                /**
                 * Admin forgot password (normal)
                 */
                $document.on({
                    'ajax:beforeSend': function() {
                        $.utils.clearFieldError('form-user-forgotpass');
                        $(this).find('.btn').attr('disabled', 'disabled');
                        $('#login-error').text('');
                        $('.alert').css('display', 'none');
                        $('#send-success').text('');
                    },
                    'ajax:success': function(e, data) {
                        if (data.status) {
                            if (typeof data.redirect != '') {
                                window.location.href = data.redirect;
                            } else {
                                window.location.reload();
                            }
                            //$('#send-success').text('Chúng tôi đã gửi mật khẩu mới vào email của bạn, vui lòng kiểm tra email.');
                        } else {
                            if (data.code == 'invalid_data') {
                                for (var field in data.messages) {
                                    $.utils.showFieldError('form-user-forgotpass', field, data.messages[field][0], 1);
                                }
                                $.utils.autoFocus('form-user-forgotpass', '.input-error');
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

                }, '#form-user-forgotpass');


                $document.on({
                    'ajax:beforeSend': function() {
                        $.utils.clearFieldError('form-change-email');
                        $(this).find('.btn').attr('disabled', 'disabled');
                        $('#login-error').text('');
                        $('.alert').css('display', 'none');
                    },
                    'ajax:success': function(e, data) {
                        console.log(data);
                        if (data.status) {
                            if (typeof data.redirect != '') {
                                window.location.href = data.redirect;
                            } else {
                                window.location.reload();
                            }

                        } else {
                            if (data.code == 'invalid_data') {
                                for (var field in data.messages) {
                                    $.utils.showFieldError('form-change-email', field, data.messages[field][0], 1);

                                    //$('#login-error').text(data.messages[field][0]);
                                    //break;
                                }
                                $.utils.autoFocus('form-change-email', '.input-error');
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

                }, '#form-change-email');


                $('#forgotPass').click(function(){
                    $( ".forgotPassword" ).animate({
                        height: "toggle"
                    }, 200, function() {
                    });
                });
            })(jQuery);

            $(document).ready(function() {
                $('#agree').keyup(function() {
                    if ($(this).val() == 'tôi đồng ý')
                    $('#next-step').css('display', 'block');
                });
            });
        </script>
        <div class="ajax-loading">
            <img src="{{Asset('assets/frontend/img/ajax-loader.gif')}}">
        </div>
    </body>
</html>
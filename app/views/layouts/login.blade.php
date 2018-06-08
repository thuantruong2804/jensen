<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <title> Quản trị hệ thống game </title>
        <meta charset="utf-8">
        <meta name="description" content="Quản trị hệ thống game">
        <meta name="author" content="VNPT EPAY">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Basic Styles -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        {{ HTML::style('assets/css/smartadmin-production.min.css') }}
        {{ HTML::style('assets/css/smartadmin-skins.min.css') }}
        {{ HTML::style('assets/css/demo.min.css') }}
        {{ HTML::style('assets/css/style.css') }}
        
        <!-- FAVICONS -->
        <link rel="shortcut icon" href="{{Asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
        <link rel="icon" href="{{Asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
    </head>
    
    <body class="animated fadeInDown">
        <div id="main" role="main">
            <div style="left: 0px; top: 0px; bottom: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 100%; width: 100%; position: fixed;" class="backstretch">
                <img src="{{Asset('assets/img/background2.jpg')}}" style="position: absolute; margin: 0px; padding: 0px; border: medium none; width: 100%; height: 100%; left: 0px;">
            </div>
            
            <div id="content" class="container" style="height: 720px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">
                        <div style="text-align: center; margin: 70px 0px 30px 0px; ">
                            <img src="{{Asset('assets/img/logo.png')}}" alt="SmartAdmin" style="max-width: 150px;">
                        </div>
                        <div class=" no-padding" style="background: transparent url('../assets/img/bg-white-lock.png') repeat scroll 0% 0%;width: 375px;margin: 0px auto;padding: 20px 30px 15px;border-radius: 7px;">
                            {{
                                Form::open(array(
                                    'action' => 'HomeController@loginAdminAccount',
                                    'class' => 'smart-form client-form',
                                    'id' => 'form-admin-login',
                                    'method' => 'post',
                                    'data-remote' => 'true',
                                    'data-type' => 'json',
                                    'novalidate'
                                ))
                            }}
                                <?php
                                    $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
                                    $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
                                ?>
                                <fieldset>
                                    <section>
                                        <div class="alert alert-block alert-danger">
                                            <p id="login-error">
                                            </p>
                                        </div>
                                    </section>
                                    <section>
                                        <label class="label">Tài khoản</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="username" value="{{ $username }}">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Vui lòng nhập tên tài khoản</b>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">Mật khẩu</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password" value="{{ $password }}">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Nhập mật khẩu</b> 
                                        </label>
                                        <div class="note">
                                            <!--<a href="javascript:void(0)" id="forgotPass">Quên mật khẩu?</a>-->
                                        </div>
                                    </section>
                                    
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="checkbox">
                                                <input type="checkbox" name="remember" value="1">
                                                <i></i>Duy trì đăng nhập</label>
                                        </section>
                                        
                                        <section class="col col-6">
                                            <button type="submit" class="btn btn-warning pull-right">
                                                Đăng nhập
                                            </button>
                                        </section>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                            <style>
                                .smart-form fieldset {
                                    background: none;
                                }
                                .smart-form .label {
                                    color: #fff;
                                }
                                .smart-form .note a {
                                    color: #fff;
                                }
                                .smart-form .checkbox {
                                    color: #fff;
                                }
                                .btn {
                                    padding: 6px 12px;
                                    background-color: #42a9f0 !important;
                                    border: none;
                                    color: #fff;
                                }
                                .btn:hover, .btn:focus {
                                    background-color: #1394EC !important;
                                    border: none;
                                    color: #fff;
                                }
                                .alert {
                                    display: none;
                                }
                            </style>
                        </div>
                        <p style="color: #fff; text-align: center;">GvC Group © 2016. Tất cả quyền được bảo lưu. </p>
                    </div>
                </div>
            </div>
        </div>

        <!--================================================== -->  
        {{ HTML::script('assets/js/libs/jquery-2.0.2.min.js') }}
        {{ HTML::script('assets/js/libs/jquery-ui-1.10.3.min.js') }}
        {{ HTML::script('assets/js/app.config.js') }}
        {{ HTML::script('assets/js/bootstrap/bootstrap.min.js') }}
        {{ HTML::script('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}
        {{ HTML::script('assets/js/plugin/masked-input/jquery.maskedinput.min.js') }}
        {{ HTML::script('assets/js/app.min.js') }}
        {{ HTML::script('assets/js/common.js') }}
        
        <script>
            (function($) {
                var $document = $(document);
                
                /**
                 * Admin login (normal)
                 */
                $document.on({
                    'ajax:beforeSend': function() {
                        $.utils.clearFieldError('form-admin-login');
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
                                    $.utils.showFieldError('form-admin-login', field, data.messages[field][0]);
                                }
                                $.utils.autoFocus('form-admin-login', '.input-error');
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
            
                }, '#form-admin-login');
                
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
                            $('#send-success').text('Chúng tôi đã gửi mật khẩu mới vào email của bạn, vui lòng kiểm tra email.');
                        } else {
                            if (data.code == 'invalid_data') {
                                for (var field in data.messages) {
                                    $.utils.showFieldError('form-user-forgotpass', field, data.messages[field][0]);
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
                
                $('#forgotPass').click(function(){
                   $( ".forgotPassword" ).animate({
                        height: "toggle"
                        }, 200, function() {
                    }); 
                });
             })(jQuery);
        </script>

    </body>
</html>
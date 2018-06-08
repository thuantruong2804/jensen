@section('content')
    <div class="full youplay-login">
        <div class="youplay-banner banner-top">
            <div class="image" style="background-image: url({{Asset('assets/images/banner-bg-1.png')}})"></div>
    
            <div class="info">
                <div>
                    <div class="container align-center">
                        <div class="youplay-form">
                            <h2>Đăng nhập</h2>
        
                            {{
                                Form::open(array(
                                    'action' => 'AccountController@login',
                                    'class' => 'smart-form client-form',
                                    'id' => 'form-admin-login',
                                    'method' => 'post',
                                    'data-remote' => 'true',
                                    'data-type' => 'json',
                                    'novalidate'
                                ))
                            }}
                                <div class="">
                                    <p id="login-error">
                                    </p>
                                </div>
                                <div class="youplay-input">
                                    <input type="text" name="username" placeholder="Tên đăng nhập">
                                </div>
                                <div class="youplay-input">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                </div>
                                <button class="btn btn-default db" type="submit">Đăng nhập</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
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
@stop
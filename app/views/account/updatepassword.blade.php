@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Cài đặt</span>
            Tài khoản
        </span>
    </h3>

    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoBold; text-align: center; font-size: 17px; margin-bottom: 0px; text-transform: uppercase;"><span class="color-red">Thay đổi</span> mật khẩu</h3>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                {{
                    Form::open(array(
                        'url' => URL::to('/tai-khoan/cap-nhat-mat-khau/'.$currentAccount->password_token_key),
                        'class' => 'form-horizontal',
                        'id' => 'form-user-register',
                        'method' => 'post',
                        'data-remote' => 'true',
                        'data-type' => 'json',
                        'novalidate'
                    ))
                }}
                <div class="">
                    <p id="login-error"></p>
                </div>

                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            <label for="" class="col-xs-4 control-label">Mật khẩu mới:</label>
                            <div class="col-xs-8">
                                <input type="password" name="password" class="form-control">
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Lưu ý mật khẩu sau khi đổi sẽ được đồng bộ sang tài khoản tại forum.gvc.vn.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-4 control-label">Nhập lại mật khẩu mới:</label>
                            <div class="col-xs-8">
                                <input type="password" name="confirm_password" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-default" type="submit" style="margin-left: 42%; margin-top: 20px;">Cập nhật mật khẩu</button>
                {{Form::close()}}
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
                    $.utils.clearFieldError('form-user-register');
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
                                $.utils.showFieldError('form-user-register', field, data.messages[field][0], 1);

                                //$('#login-error').text(data.messages[field][0]);
                                //break;
                            }
                            $.utils.autoFocus('form-user-register', '.input-error');
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

            }, '#form-user-register');

        })(jQuery);

        $(document).ready(function(){
            $('body').bind("cut copy paste",function(e) {
                e.preventDefault();
            });
        });

        //document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
@stop
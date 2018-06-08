@section('content')
    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Đăng ký</span>
            Tài khoản
        </span>
    </h3>
    <ul class="wizard">
        <li>Bước 1 - Trả lời câu hỏi</li>
        <li>Bước 2 - GvC Terms</li>
        <li>Bước 3 - SAMP Terms</li>
        <li class="selected">Bước 4 - Điền thông tin</li>
        <li>Bước 5 - Hoàn tất đăng ký</li>
    </ul>
    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoMedium; text-align: center; font-size: 17px; margin-bottom: 0px;">Thông tin<span class="color-red"> tài khoản</span></h3>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                {{
                    Form::open(array(
                        'action' => 'AccountController@register',
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
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Tên đăng nhập:</label>
                    <div class="col-xs-8">
                        <input type="text" name="username" class="form-control" style="width: 70%">
                        <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Tên đăng nhập này sẽ được sử dụng để kết nối vào máy chủ của chúng tôi thông qua GvC Launcher và đăng nhập trên diễn đàn. Bạn có thể sử dụng ký tự gạch dưới và dấu chấm vào tên tài khoản của mình. Tuy nhiên điều đó là không bắt buộc.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Mật khẩu:</label>
                    <div class="col-xs-8">
                        <input type="password" name="password" class="form-control"  style="width: 70%">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Nhập lại mật khẩu:</label>
                    <div class="col-xs-8">
                        <input type="password" name="confirm_password" class="form-control"  style="width: 70%">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Thư điện tử:</label>
                    <div class="col-xs-8">
                        <input type="text" name="email" class="form-control"  style="width: 70%">
                        <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Bạn phải nhập địa chỉ email hợp lệ để có thể xác thực tài khoản của bạn. Email này cũng sẽ được sử dụng để lấy mật khẩu bị mất và để xác minh quyền sở hữu tài khoản của bạn khi bạn cần hỗ trợ. Để đảm bảo gửi email an toàn, chúng tôi khuyên bạn nên sử dụng G-Mail để đăng ký. Việc sử dụng máy chủ email kém nổi tiếng hơn có thể không cung cấp đúng email và bạn sẽ không thể truy cập vào tài khoản của mình.</p>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Từ đáng nhớ:</label>
                    <div class="col-xs-8">
                        <input type="text" name="text-remember" class="form-control"  style="width: 70%">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-3 col-xs-offset-1 control-label">Từ gợi ý:</label>
                    <div class="col-xs-8">
                        <input type="text" name="text-confirm" class="form-control"  style="width: 70%">
                        <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Nhập một từ đáng nhớ và một gợi ý để nhắc bạn về từ này. Từ và gợi ý đáng nhớ này có thể xem được bởi Admin và bạn sẽ được yêu cầu cung cấp từ này để chứng minh quyền sở hữu tài khoản khi có yêu cầu cung cấp từ phía Admin. Gợi ý đáng nhớ và từ đáng nhớ của bạn không thể giống nhau và nên là thứ bạn có thể dễ dàng cung cấp khi được nhắc.</p>
                        <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Ví dụ: tên vật nuôi, tên của người thân yêu, kiểu mẫu / sản phẩm cụ thể trên bàn làm việc của bạn / trong phòng của bạn v.v.</p>
                    </div>
                </div>
                -->
                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Bằng cách nhấp vào Kết thúc Đăng ký, bạn xác nhận rằng bạn đã đọc các cảnh báo ở trên và hiểu rằng việc không nhớ bất kỳ chi tiết nào ở trên sẽ dẫn đến việc mất quyền truy cập vào tài khoản của bạn. Nhân viên sẽ không thể trợ giúp bạn trong việc tìm kiếm chi tiết hoặc truy cập vào tài khoản của bạn nếu bạn không cung cấp, khi được yêu cầu, các chi tiết bạn đã nhập vào tại đây.</p>
                <button class="btn btn-default" type="submit" style="margin-left: 42%;">Đăng ký</button>
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
    </script>
@stop
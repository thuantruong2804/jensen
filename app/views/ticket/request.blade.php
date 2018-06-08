@section('content')
    <div class="full youplay-login">
        <div class="youplay-banner banner-top">
    
            <div class="info">
                <div>
                    <div class="container align-center">
                        <div class="youplay-form" style="max-width: 680px !important;">
                            <h2>Tạo yêu cầu</h2>
        
                            {{
                                Form::open(array(
                                    'action' => 'TicketController@request',
                                    'class' => 'smart-form client-form',
                                    'id' => 'form-ticket-save',
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
                                <div class="youplay-select" style="margin-bottom: 20px;">
                                    <select name="topic">
                                        <option value="0">Chọn chủ đề</option>
                                        <option value="Báo lỗi máy chủ">Báo lỗi máy chủ</option>
                                        <option value="Mở khóa tài khoản, IP">Mở khóa tài khoản, IP</option>  
                                        <option value="Phục hồi tài khoản (Bug/Rollback/Hacked)">Phục hồi tài khoản (Bug/Rollback/Hacked)</option>  
                                        <option value="Tìm lại tài khoản (Quên mật khẩu/Keylog v.v.)">Tìm lại tài khoản (Quên mật khẩu/Keylog v.v.)</option>  
                                        <option value="Xử lý sự cố khi nạp thẻ (Không nhận được G-Coin/Thẻ cào không hợp lệ v.v.)">Xử lý sự cố khi nạp thẻ (Không nhận được G-Coin/Thẻ cào không hợp lệ v.v.)</option>  
                                        <option value="Các vấn đề khác">Các vấn đề khác</option>     
                                    </select>
                                </div>
                                <div class="youplay-input">
                                    <input type="text" name="forum_profile_link" placeholder="Link profile trên forum"  style="text-align: left;">
                                </div>
                                <div class="youplay-input">
                                    <input type="text" name="issue_summary" placeholder="Mô tả ngắn gọn" style="text-align: left;">
                                </div>
                                <div class="" style="margin-bottom: 10px;">
                                    <textarea name="issue_detail" rows="5" placeholder="Mô tả chi tiết yêu cầu" id="ckeditor"></textarea>
                                </div>
                                <button class="btn btn-default db" type="submit">Gửi yêu cầu</button>
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
                    $.utils.clearFieldError('form-ticket-save');
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
                            $.utils.autoFocus('form-ticket-save', '.input-error');
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
        
            }, '#form-ticket-save');
            
         })(jQuery);
         
        CKEDITOR.replace( 'ckeditor', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                //{"name":"basicstyles","groups":["basicstyles"]},
                //{"name":"links","groups":["links"]},
                //{"name":"paragraph","groups":["list","blocks"]},
                {"name":"document","groups":["mode"]},
                {"name":"insert","groups":["insert"]},
                //{"name":"styles","groups":["styles"]},
                //{"name":"about","groups":["about"]}
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        } );
    </script>
@stop
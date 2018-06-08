@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Quản lý</span>
            nhân vật
        </span>
    </h3>

    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoBold; text-align: center; font-size: 17px; margin-bottom: 0px; text-transform: uppercase;"><span class="color-red">Tạo nhân</span> vật mới</h3>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div style="border: 1px #ABA1A2 solid !important; border-radius: 5px; margin: 20px 0px; padding: 15px 20px;">
                    <p class="color-white">Các bài kiểm tra sau đây được kiểm tra bởi Staff Team - không phải tự động. Hãy chắc chắn rằng bạn trả lời nghiêm túc. </p>
                    <p class="color-white">Câu chuyện ngắn của bạn phải được kể theo ngôi thứ ba. Hãy cố gắng bám sát câu chuyện của bạn với thông tin nhân vật mà bạn đã nhập (Ngày sinh, quê quán). Ví dụ: Abyss là một chàng trai đến từ vùng nông thôn ... anh ta có ....</p>
                    <p class="color-white">Các câu hỏi về chính sách bạn có thể tìm hiểu thêm trong bộ luật được soạn thảo và sử dụng cho cộng đồng GvC tại <a href="http://forum.gvc.vn/index.php?/topic/10-noi-quy-tai-gvc-cap-nhat-07052017/"> <span class="color-red">đây</span> </a>.</p>
                    <p class="color-white">Phần giải thích về một trong những quy định về Roleplay tại GvC, các bạn có thể lựa chọn bất kỳ một luật nào miễn sao giải thích được đủ ý theo cách của bạn.</p>
                    <p class="color-white">Khi nhân vật của bạn được chấp nhận, bạn sẽ có thể chơi trên máy chủ của chúng tôi với thông tin bạn đã cung cấp. Thời gian kiểm duyệt nhân vật ở mức 10 > 30 phút sau khi bạn gửi thông tin nhân vật, chúng tôi sẽ phản hồi kết quả tới bạn qua email tài khoản quản lý <span class="color-red">{{ $currentAccount->Email }}</span> sau khi quyết định. Chúc may mắn! </p>
                </div>

                {{
                    Form::open(array(
                        'action' => 'AccountController@createcharacter',
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
                            <label for="" class="col-xs-4 control-label">Tên nhân vật:</label>
                            <div class="col-xs-8">
                                <input type="text" name="charactername" class="form-control">
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Tên nhân vật sử dụng tiếng việt không dấu, phải có ít nhất một dấu gạch dưới, bạn có thể sử dụng tối đa hai dấu gạch dưới cho tên nhân vật.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-4 control-label">Ngày sinh:</label>
                            <div class="col-xs-8">
                                <input type="text" name="birthday" class="form-control" >
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Ngày sinh áp dụng cho nhân vật của bạn (IC) - Ví dụ: 28/04/1992</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-4 control-label">Giới tính:</label>
                            <div class="col-xs-8">
                                <label class="radio-inline" style="color: #fff; font-family: RobotoLight">
                                    <input type="radio" name="gender" id="inlineRadio1" value="1" style="margin-top: 2px !important;" checked="checked"> Nam
                                </label>
                                <label class="radio-inline" style="color: #fff; font-family: RobotoLight">
                                    <input type="radio" name="gender" id="inlineRadio2" value="2" style="margin-top: 2px !important;"> Nữ
                                </label>
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Giới tính của nhân vật sẽ không thể thay đổi, những nhân vật có giới tính là Nam sẽ không thể sử dụng skin Nữ và ngược lại.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-4 control-label">Quê quán:</label>
                            <div class="col-xs-8">
                                <select name="city" class="form-control">
                                    <option value="">Chọn quê quán</option>
                                    <option value="1">Los Santos</option>
                                    <option value="2">San Fierro</option>
                                    <option value="3">Las Venturas</option>
                                    <option value="4">Red County</option>
                                    <option value="5">Bone County</option>
                                    <option value="6">Tierra Robada</option>
                                    <option value="7">Whetstone</option>
                                    <option value="8">Flint County</option>
                                </select>
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Nơi nhân vật của bạn được sinh ra</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="character-skin-1 skin-nam">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @for ($i = 0; $i <= 311; $i++)
                                        <?php
                                            if (in_array($i, [0, 16, 70, 71, 74, 92, 99, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 149, 163, 164, 165, 166, 173, 174, 175, 247, 248, 249, 254, 260, 265, 266, 267, 269, 270, 271, 274, 275, 276, 277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289, 292, 293, 294, 295, 296, 300, 301, 302, 306, 307, 308, 309, 310, 311]))
                                            continue;

                                            if (in_array($i, [9,10,11,12,13,31,38,39,40,41,53,54,55,56,63,64,65,69,75,76,77,85,87,88,89,90,91,92,93,129,130,131,138,139,140,141,145,148,150,151,152,157,169,172,178,190,191,192,193,194,195,196,197,198,199,201,205,207,211,214,215,216,218,219,224,225,226,231,232,233,237,238,243,244,245,246,251,256,257,263,298,306,307,308,309]))
                                            continue;
                                        ?>
                                        <div class="swiper-slide">
                                            <img src="{{Asset("assets/frontend/skins/$i.png")}}">
                                            <p style="position: absolute; width: 100%; color: #fff; top: 166px;  left: 0; text-align: center;">{{ $i }}</p>
                                        </div>
                                    @endfor
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>

                        <div class="character-skin-2 skin-nu">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @for ($i = 0; $i <= 311; $i++)
                                        <?php
                                        if (in_array($i, [0, 16, 70, 71, 74, 92, 99, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 149, 163, 164, 165, 166, 173, 174, 175, 247, 248, 249, 254, 260, 265, 266, 267, 269, 270, 271, 274, 275, 276, 277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289, 292, 293, 294, 295, 296, 300, 301, 302, 306, 307, 308, 309, 310, 311]))
                                            continue;
                                        ?>
                                        @if (in_array($i, [9,10,11,12,13,31,38,39,40,41,53,54,55,56,63,64,65,69,75,76,77,85,87,88,89,90,91,92,93,129,130,131,138,139,140,141,145,148,150,151,152,157,169,172,178,190,191,192,193,194,195,196,197,198,199,201,205,207,211,214,215,216,218,219,224,225,226,231,232,233,237,238,243,244,245,246,251,256,257,263,298,306,307,308,309]))
                                            <div class="swiper-slide">
                                                <img src="{{Asset("assets/frontend/skins/$i.png")}}">
                                                <p style="position: absolute; width: 100%; color: #fff; top: 166px; left: 0; text-align: center;">{{ $i }}</p>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="skin" class="form-control" style="text-align: center;">
                                <p style="margin: 5px 0; color: #fff; font-family: RobotoLight;">Nhập chữ số trên ảnh để lựa chọn nhân vật</p>
                            </div>
                        </div>
                    </div>
                </div>		
				@if (Config::get('config.auto_active_charactor'))          
					<input type="hidden" name="character_introdue" class="form-control"  rows="5"></input>             
					<input type="hidden" name="term_description" class="form-control"  rows="5"></input>                
					<input type="hidden" name="roleplay_description" class="form-control"  rows="5"></input>     
				@else
					<div class="form-group">
						<label for="" class="col-xs-12 control-label">Viết một câu chuyện ngắn về nhân vật của bạn:</label>
						<div class="col-xs-12">
							<textarea type="text" name="character_introdue" class="form-control"  rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-xs-12 control-label">Chính sách của chúng tôi về cướp (IC) là gì:</label>
						<div class="col-xs-12">
							<textarea type="text" name="term_description" class="form-control"  rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-xs-12 control-label">Hãy giải thích về một quy định trong những quy định về Roleplay tại GvC như Metagameing, Powergameming v.v. Đưa ra ví dụ cụ thể về quy định đó:</label>
						<div class="col-xs-12">
							<textarea type="text" name="roleplay_description" class="form-control"  rows="5"></textarea>
						</div>
					</div>
				@endif

                <button class="btn btn-default" type="submit" style="margin-left: 42%; margin-top: 20px;">Lập nhân vật</button>
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
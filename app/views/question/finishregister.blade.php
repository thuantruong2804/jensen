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
        <li>Bước 4 - Điền thông tin</li>
        <li class="selected">Bước 5 - Hoàn tất đăng ký</li>
    </ul>
    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoMedium; text-align: center; font-size: 17px; margin-bottom: 0px;">Hoàn tất <span class="color-red">đăng ký</span></h3>
        <p class="color-white">Cám ơn bạn đã đăng ký tham gia cộng đồng GvC, tài khoản của bạn cần phải kích hoạt để có thể sử dụng các dịch vụ của chúng tôi như truy cập vào diễn đàn, quản lý nhân vật v.v. Chúng tôi đã gửi một email tới địa chỉ email của bạn, vui lòng kiểm tra hộp thư và làm theo hướng dẫn để kích hoạt tài khoản của bạn.</p>
        <p class="color-white" style="text-align: right;">Trân trọng</p>
        <p class="color-white" style="text-align: right;">GvC Team</p>
        <div class="row">
            <div class="col-xs-2 col-xs-offset-5">
                <a href="{{ URL::to('/') }}" class="btn btn-default" style="" id="next-step">Trang chủ</a>
            </div>
        </div>
    </div>
@stop
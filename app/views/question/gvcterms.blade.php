@section('content')
    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Đăng ký</span>
            Tài khoản
        </span>
    </h3>
    <ul class="wizard">
        <li>Bước 1 - Trả lời câu hỏi</li>
        <li class="selected">Bước 2 - GvC Terms</li>
        <li>Bước 3 - SAMP Terms</li>
        <li>Bước 4 - Điền thông tin</li>
        <li>Bước 5 - Hoàn tất đăng ký</li>
    </ul>
    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoMedium; text-align: center; font-size: 17px; margin-bottom: 0px;"><span class="color-red">GvC - Grand Theft Auto Vietnamese Community</span></h3>
        <p class="color-white" style="font-size: 13px; text-align: center; font-family: RobotoLight;">- Terms Of Service -</p>
        <p class="color-white"> Các dịch vụ mà GvC Group cung cấp cho bạn đều miễn phí, không có bất kỳ khoản phí nào được yêu cầu, vì vậy chúng tôi có quyền quyền hủy bỏ quyền truy cập của bạn vào bất kỳ lúc nào. Vì các dịch vụ này là miễn phí, sẽ không có thứ gì đảm bảo về thời gian hoạt động hay thời gian duy trì hoạt động trong bao lâu, chúng tôi cũng bảo lưu quyền đóng cửa các dịch vụ này bất kỳ lúc nào.</p>
        <p class="color-white"> Chúng tôi bảo lưu quyền đăng nhập bất kỳ tài nguyên nào trên các dịch vụ của chúng tôi, bao gồm địa chỉ IP cá nhân, ngày sử dụng và hành động của bạn trên ứng dụng của chúng tôi.</p>
        <p class="color-white"> Bạn cũng có thể trả phí để giữ cho công đồng và duy trì máy chủ của chúng tôi luôn hoạt động và chúng tôi rất cảm ơn vì điều đó, nhưng việc đó không làm cho bạn không thể bị ảnh hưởng đối với các điều khoản đã nêu ở phía trên. Tuy nhiên, chúng tôi sẽ khoan dung hơn đối với những người góp phần bảo trì các dịch vụ của chúng tôi so với những người chơi khác.</p>
        <p class="color-white"> Nếu bạn chấp nhận các điều khoản này và các quy tắc về máy chủ, diễn đàn của GvC - Nhập vào “<span class="color-red">tôi đồng ý</span>” vào hộp dưới đây.</p>
        <div class="row">
            <div style="" class="col-xs-4 col-xs-offset-4">
                <input class="form-control" name="agree" type="text" id="agree" style="text-align: center;">
            </div>
            <div style="" class="col-xs-2">
                <a href="{{ URL::to('/samp-terms') }}" class="btn btn-default" style="display: none;" id="next-step">Tiếp tục</a>
            </div>
        </div>
    </div>
@stop
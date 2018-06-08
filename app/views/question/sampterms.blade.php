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
        <li class="selected">Bước 3 - SAMP Terms</li>
        <li>Bước 4 - Điền thông tin</li>
        <li>Bước 5 - Hoàn tất đăng ký</li>
    </ul>
    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoMedium; text-align: center; font-size: 17px; margin-bottom: 0px;"><span class="color-red">GvC - Grand Theft Auto Vietnamese Community</span></h3>
        <p class="color-white" style="font-size: 13px; text-align: center; font-family: RobotoLight;">- Terms Of Service -</p>
        <p class="color-white"> The SA-MP modification for Grand Theft Auto: San Andreas (r) is a software project aimed at extending the functionality of the Grand Theft Auto: San Andreas (r) software for Microsoft Windows (r).</p>
        <p class="color-white"> You must agree to all of the terms below to use this software. Violation of these terms invalidates this license and the copyright holder grants no rights to use this software.</p>
        <div class="color-white">
            <p style="margin-left: 25px;">[+] You must have a valid license to use Grand Theft Auto: San Andreas (tm) PC in order for this license to be valid.</p>
            <p style="margin-left: 25px;">[+] The software contained herein is provided on an "as-is" basis without any form of warranty.</p>
            <p style="margin-left: 25px;">[+] This software may not be exploited for personal, financial or commercial gain.</p>
            <p style="margin-left: 25px;">[+] The author(s) of this software accept no liability for use/misuse of the software.</p>
            <p style="margin-left: 25px;">[+] The SA-MP software package may not be distributed, sold, rented or leased without written permission of the software author(s).</p>
            <p style="margin-left: 25px;">[+] You may not create or distribute derivative works of the software or files contained within the package.</p>
            <p style="margin-left: 25px;">[+] You may not use this software for any illegal purposes.</p>
            <p style="margin-left: 25px;">[+] The author(s) of this software retain the right to modify/revoke this license at any time under any conditions seen appropriate by the author(s).</p>
            <p style="margin-left: 25px;">[+] Ideas expressed in this software by way of coding or configuration are property of SA-MP.com.</p>
        </div>
        <p class="color-white"> (c) 2005-2008 SA-MP.com team</p>
        <p class="color-white"> The SA-MP.com team is not affiliated with Rockstar Games, Rockstar North or Take-Two Interactive Software Inc.</p>
        <p class="color-white"> Grand Theft Auto and Grand Theft Auto: San Andreas are registered trademarks of Take-Two Interactive Software Inc.</p>
        <p class="color-white"> Nếu bạn chấp nhận các điều khoản này và các quy tắc về máy chủ, diễn đàn của GvC - Nhập vào “<span class="color-red">tôi đồng ý</span>” vào hộp dưới đây (Không có ngoặc).</p>
        <div class="row">
            <div style="" class="col-xs-4 col-xs-offset-4">
                <input class="form-control" name="agree" type="text" id="agree" style="text-align: center;">
            </div>
            <div style="" class="col-xs-2">
                <a href="{{ URL::to('/dang-ky') }}" class="btn btn-default" style="display: none;" id="next-step">Tiếp tục</a>
            </div>
        </div>
    </div>
@stop
@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Chi tiết</span>
            nội dung thư
        </span>
    </h3>

    <div class="row" style=" margin-bottom: 500px;">
        <div class="col-xs-12">
            <div class="gvc-box" style="padding-top: 15px; padding-bottom: 5px; background-color: rgba(46, 49, 66, 0.5);">
                <p class="color-white" style="font-family: RobotoLight;">Tiêu đề: {{ $inbox->title }}</p>
                <p class="color-white" style="font-family: RobotoLight;">Người gửi: {{ $inbox->sender }}</p>
                <p class="color-white" style="font-family: RobotoLight;">Thời gian: {{ date('H:i:s d/m/Y', strtotime($inbox->created_at)) }}</p>
                <p class="color-white" style="font-family: RobotoLight;">Nội dung:</p>
                <div style="color: #fff !important; font-family: RobotoLight; padding-left: 30px; margin-top: 20px; font-size: 13px !important;">
                    {{ $inbox->content }}
                </div>
            </div>
            <p style="text-align: center; margin-top: 10px;">
                <a href="{{ URL::to('/tai-khoan/hop-thu') }}" style="color: #fff;">Quay lại hòm thư</a>
            </p>
        </div>
    </div>

@stop
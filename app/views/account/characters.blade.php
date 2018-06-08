@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Quản lý</span>
            nhân vật
        </span>
    </h3>

    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            @if (!empty($countCharacters))
                @foreach ($characters as $character)
                    <div class="col-xs-4">
                        <a href="{{ URL::to('/tai-khoan/quan-ly-nhan-vat/chi-tiet/'.$character->ID) }}" class="character-account">
                            <img src="{{Asset("assets/frontend/skins/$character->Skin.png")}}" style="width: 100%;">
                            <p style="color: #fff; text-align: center; margin-top: -70px;">{{ $character->CharacterName }}</p>
                            <p style="color: #9F2B33; text-align: center; margin-top: 0px;">@if($character->Active) Đã duyệt @else Chờ duyệt @endif</p>
                        </a>
                    </div>
                @endforeach
            @endif
            <?php $countUnknow = 3 - $countCharacters; ?>
            @for ($i = 1; $i <= $countUnknow; $i++ )
                <div class="col-xs-4">
                    <a href="{{ URL::to('/tai-khoan/quan-ly-nhan-vat/tao-moi') }}" class="character-account">
                        <img src="{{Asset('assets/frontend/skins/00.png')}}" style="width: 100%;">
                        <p style="color: #fff; text-align: center; margin-top: -60px;">Chưa khởi tạo</p>
                    </a>
                </div>
            @endfor
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p style="color: #fff; text-align: center; margin: 30px 0 400px 0">Vui lòng lựa chọn nhân vật mà bạn muốn quản lý hoặc click vào mục chưa khởi tạo để tiến hành khởi tạo nhân vật mới</p>
        </div>
    </div>
@stop
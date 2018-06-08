@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Danh sách</span>
            hòm thư
        </span>
    </h3>

    <div class="row" style=" margin-bottom: 500px;">
        <div class="col-xs-12">
            <table id="functions" class="table dataTable"/>
                <thead>
                    <tr>
                        <th class="fix-width-30"></th>
                        <th class="">Tiêu đề</th>
                        <th class="fix-width-200">Người gửi</th>
                        <th class="fix-width-200">Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inboxs as $inbox)
                        <tr>
                            <td>
                                @if ($inbox->is_read)
                                    <i class="fa fa-envelope-o" style="margin-top: -3px !important;"></i>
                                @else
                                    <i class="fa fa-envelope"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('/tai-khoan/hop-thu/chi-tiet/'.$inbox->inbox_id) }}" @if (!$inbox->is_read) style="font-family: RobotoMedium" @endif >
                                    {{ $inbox->title }}
                                </a>
                            </td>
                            <td>{{ $inbox->sender }}</td>
                            <td>{{ date('H:i:s d/m/Y', strtotime($inbox->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center;">
                {{ $inboxs->links() }}
            </div>
        </div>
    </div>

@stop
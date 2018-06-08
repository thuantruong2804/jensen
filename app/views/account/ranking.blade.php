@section('content')
    <div class="container" style="margin-top: 100px;">
        <p class="count-records">Hiển thị từ <span>{{ sizeof($listAccount) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($listAccount) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
        <div class="table-responsive">
            <table id="functions" class="table table-striped dataTable table-bordered" />
                <thead>
                    <tr>
                        <th class="fix-width-30">Mã</th>
                        <th class="fix-width-50">Tên người chơi</th>
                        <th class="fix-width-50">Cấp độ</th>
                        <th>Giờ chơi</th>
                        <th class="fix-width-120">Tiền</th>
                        <th class="fix-width-120">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listAccount as $account)
                        <tr>
                            <td>{{ $account->id }}</td>
                            <td>{{ $account->UserName }}</td>
                            <td>{{ $account->Level }}</td>
                            <td>{{ $account->ConnectedTime }}</td>
                            <td>{{ ($account->Money + $account->Bank) }}</td>
                            <td>
                                @if($account->Online == 1)
                                    <span class="label label-success">Online</span>
                                @else
                                    <span class="label label-default">Offline</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @if (!sizeof($listAccount)) 
                        <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                    @endif
                    </tbody>
            </table>
        </div>
        {{ $listAccount->links() }}
    </div>
    
    <style>
        th {
            background-color: rgba(255, 255, 255, 0.3) !important;
        }
        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
@stop
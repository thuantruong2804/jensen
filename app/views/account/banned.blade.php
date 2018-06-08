@section('content')
    <div class="container" style="margin-top: 100px;">
        <p class="count-records">Hiển thị từ <span>{{ sizeof($listBanned) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($listBanned) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
        <div class="table-responsive">
            <table id="functions" class="table table-striped dataTable table-bordered" />
                <thead>
                    <tr>
                        <th class="fix-width-30">Mã</th>
                        <th class="fix-width-50">Tên người chơi</th>
                        <th class="fix-width-50">IP</th>
                        <th>Lý do</th>
                        <th class="fix-width-120">Người khóa</th>
                        <th class="fix-width-120">Ngày khóa</th>
                        <th class="fix-width-120">Ngày mở</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBanned as $banned)
                        <tr>
                            <td>{{ $banned->User }}</td>
                            <?php $account = Account::find($banned->User); ?>
                            <td>{{ $account->UserName }}</td>
                            <td>{{ $banned->IP }}</td>
                            <td>{{ $banned->Reason }}</td>
                            <td>{{ $banned->Admin }}</td>
                            <td>{{ date('d-m-Y', strtotime($banned->Date_Ban)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($banned->Date_Unban)) }}</td>
                        </tr>
                    @endforeach
                    @if (!sizeof($listBanned)) 
                        <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                    @endif
                    </tbody>
            </table>
        </div>
        {{ $listBanned->links() }}
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
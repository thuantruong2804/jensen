@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <a href="{{ URL::to('/ticket/yeu-cau') }}" class="btn btn-success">Tạo yêu cầu</a>
        </div>
        <p class="count-records">Hiển thị từ <span>{{ sizeof($ticketList) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($ticketList) }}</span> trong tổng số <span class="money-format">{{ sizeof($ticketList) }}</span> bản ghi.</p>
        <div class="table-responsive">
            <table id="functions" class="table table-striped dataTable table-bordered" />
                <thead>
                    <tr>
                        <th class="fix-width-50">Trạng thái</th>
                        <th class="fix-width-150">Chủ đề</th>
                        <th>Nội dung yêu cầu </th>
                        <th class="fix-width-30">Ngày</th>
                        <th>Thời gian cập nhật</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticketList as $ticket)
                        <tr>
                            <td>
                                @if($ticket->status == 0)
                                    <span class="label label-default">Chưa trả lời</span>
                                @elseif ($ticket->status == 1)
                                    <span class="label label-success">Đã trả lời</span>
                                @else
                                    <span class="label label-warning">Đã đóng</span>
                                @endif
                            </td>
                            <td>{{{ $ticket->topic }}}</td>
                            <td><a href="{{ URL::to('/ticket/chi-tiet').'/'.$ticket->ticket_id }}">{{{ $ticket->issue_summary }}}</a></td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($ticket->created_at)) }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($ticket->updated_at)) }}</td>
                            <td><a href="{{ URL::to('/ticket/chi-tiet').'/'.$ticket->ticket_id }}">Chi tiết</a></td>
                        </tr>
                    @endforeach
                    @if (!sizeof($ticketList)) 
                        <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
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
@section('title')
    Quản lý ticket
@stop

@section('style')
@stop

@section('content')
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="widget-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <p class="page-title"><i class="fa fa-table"></i> 
                            <span> Danh sách ticket</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/ticket'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Chủ đề</label>
                                    <select name="topic" class="has-custom-select custom-input" id="disabled">
                                        <option value="">Tất cả</option>    
                                        <option value="Báo lỗi máy chủ" {{ isset($input['topic']) && $input['topic'] == 'Báo lỗi máy chủ' ? "selected='selected'" : '' }}>Báo lỗi máy chủ</option>
                                        <option value="Mở khóa tài khoản, IP" {{ isset($input['topic']) && $input['topic'] == 'Mở khóa tài khoản, IP' ? "selected='selected'" : '' }}>Mở khóa tài khoản, IP</option>  
                                        <option value="Phục hồi tài khoản (Bug/Rollback/Hacked)" {{ isset($input['topic']) && $input['topic'] == 'Phục hồi tài khoản (Bug/Rollback/Hacked)' ? "selected='selected'" : '' }}>Phục hồi tài khoản (Bug/Rollback/Hacked)</option>  
                                        <option value="Tìm lại tài khoản (Quên mật khẩu/Keylog v.v.)" {{ isset($input['topic']) && $input['topic'] == 'Tìm lại tài khoản (Quên mật khẩu/Keylog v.v.)' ? "selected='selected'" : '' }}>Tìm lại tài khoản (Quên mật khẩu/Keylog v.v.)</option>  
                                        <option value="Xử lý sự cố khi nạp thẻ (Không nhận được G-Coin/Thẻ cào không hợp lệ v.v.)" {{ isset($input['topic']) && $input['topic'] == 'Xử lý sự cố khi nạp thẻ (Không nhận được G-Coin/Thẻ cào không hợp lệ v.v.)' ? "selected='selected'" : '' }}>Xử lý sự cố khi nạp thẻ (Không nhận được G-Coin/Thẻ cào không hợp lệ v.v.)</option>  
                                        <option value="Các vấn đề khác" {{ isset($input['topic']) && $input['topic'] == 'Các vấn đề khác' ? "selected='selected'" : '' }}>Các vấn đề khác</option>                                                    
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="has-custom-select custom-input" id="disabled">
                                        <option value="-1" {{ isset($input['status']) && $input['status'] == -1 ? "selected='selected'" : '' }}>Tất cả</option>
                                        <option value="0" {{ isset($input['status']) && $input['status'] == 0 ? "selected='selected'" : '' }}>Chưa trả lời</option>    
                                        <option value="1" {{ isset($input['status']) && $input['status'] == 1 ? "selected='selected'" : '' }}>Đã trả lời</option>
                                        <option value="2" {{ isset($input['status']) && $input['status'] == 2 ? "selected='selected'" : '' }}>Đã đóng</option>                                                    
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <p class="count-records">Hiển thị từ <span>{{ sizeof($tickets) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($tickets) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
                <div class="table-responsive">
                    <table id="functions" class="table table-striped dataTable table-bordered" 
                            data-empty="@lang('form.table.empty')" 
                            data-show-entries="@lang('form.table.show_entries')" 
                            data-infofiltered="@lang('form.table.info_filtered')"
                            data-zerorecord="@lang('form.table.zero_record')"
                            data-lengthmenudisplay="@lang('form.table.length_menu.display')" 
                            data-lengthmenurecord="@lang('form.table.length_menu.record')" 
                            data-nosorttargets="[2,3]"
                            data-aaSorting="[1]"
                            data-defaultsortcolumn="[0]"
                            data-defaultsorttype="desc" />
                        <thead>
                            <tr>
                                <th class="fix-width-30 col-center">Mã</th>
                                <th class="fix-width-120 col-center">Người gửi</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th class="fix-width-120">Ngày gửi</th>
                                <th class="fix-width-120">Tình trạng</th>
                                <th class="fix-width-50">Đóng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td style="text-align: center !important;">{{ $ticket->ticket_id }}</td>
                                    <?php $requestAccountId = Account::find($ticket->account_id); ?>
                                    <td>{{ $requestAccountId->UserName }}</td>
                                    <td>{{{ $ticket->topic }}}</td>
                                    <td><a href="{{ URL::to('/admin/ticket/admindetail').'/'.$ticket->ticket_id }}">{{ $ticket->issue_summary }}</a></td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($ticket->updated_at)) }}</td>
                                    <td>
                                        @if($ticket->status == 0)
                                            <span class="label label-default">Chưa trả lời</span>
                                        @elseif ($ticket->status == 1)
                                            <span class="label label-success">Đã trả lời</span>
                                        @else
                                            <span class="label label-warning">Đã đóng</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ticket->status != 2)
                                        <a href="{{ URL::to('/admin/ticket/status/' . $ticket->ticket_id) }}" 
                                           class="btn btn-warning public-user has-tooltip" 
                                           title="Đóng yêu cầu"
                                           data-method="post" data-type="json" 
                                           data-confirm="Bạn có chắc chắn đóng yêu cầu này ?"              
                                           data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $ticket->ticket_id }}">
                                           <i class="fa fa-lock"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($tickets)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $tickets->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    <script>
        (function($) {
            var $document = $(document);
            
           // change status function
           $(document).ready(function() {
               $('#content').on('click', '.public-user', function(e) {
                e.preventDefault();
                var that = this;
                bootbox.confirm({
                    message: $(this).data('confirm'),
                    buttons: {
                        'cancel': {
                            label: $(this).data('action1'),
                            className: 'btn-default'
                        },
                        'confirm': {
                            label: $(this).data('action2'),
                            className: 'btn-info'
                        }
                    },
                    callback: function(result) {
                        if (result) {
                            $.ajax({
                                url: $(that).attr('href'),
                                type: $(that).data('method'),
                                dataType: 'json',
                                beforeSend: function(xhr, settings) {},
                                success: function(data, status, xhr) {
                                    if ($(that).hasClass('public-user')) {
                                        if (data.status) {                                       
                                                window.location.href = data.href;
                                            }
                                        }
                                },
                                complete: function(xhr, status) {},
                                error: function (xhr, ajaxOptions, thrownError) {
                                    $("#error-modal").modal('show');
                                }
                            });
                        }
                    }
                });
                });
           }); 
        })(jQuery);
    </script>
@stop

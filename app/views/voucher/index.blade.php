@section('title')
    Quản lý Voucher
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
                            <span> Danh sách Voucher</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/voucher/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo voucher</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/voucher'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Mã Voucher</label>
                                    <input type="text" name="code" class="form-control" value="{{{ isset($input['code']) ? $input['code'] : '' }}}" placeholder="Nhập mã voucher"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($vouchers) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($vouchers) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-30 col-center">TT</th>
                                <th class="fix-width-120">Mã</th>
                                <th class="fix-width-50">%</th>
                                <th class="fix-width-120">Thời gian sử dụng</th>
                                <th class="">Loại</th>
                                <th class="fix-width-100">Người dùng</th>
                                <th class="fix-width-100">Ngày tạo</th>
                                <th class="fix-width-70">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td style="text-align: center !important;">
                                        {{ $voucher->Voucher_Status == 0 ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-times"  style="color: red" aria-hidden="true"></i>' }}
                                    </td>
                                    <td>{{ $voucher->Voucher_Code }}</td>
                                    <td>{{ $voucher->Voucher_Discount }}</td>
                                    <td style="text-align: center !important;">
                                        {{ date('d-m-Y', strtotime($voucher->Voucher_Expire_Date)) }}
                                    </td>
                                    <td>{{ $voucher->Voucher_Type == 1 ? 'Gộp khuyến mại khác' : 'Không gộp khuyến mại khác' }}</td>
                                    <td>{{ $voucher->Voucher_UserName }}</td>
                                    <td style="text-align: center !important;">
                                        {{ date('d-m-Y', strtotime($voucher->created_at)) }}
                                    </td>
                                    <td>
                                        @if ($voucher->Voucher_Status == 0)
                                            <a href="{{ URL::to('/admin/voucher/delete/'.$voucher->ID) }}"
                                               class="delete-new btn btn-danger has-tooltip"
                                               title="Xóa"
                                               data-method="post"
                                               data-type="json"
                                               data-confirm="Bạn có chắc chắn muốn voucher này?"
                                               data-action1="<i class='fa fa-times'></i> Hủy"
                                               data-action2="<i class='fa fa-check'></i> Xóa">
                                                <i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($vouchers))
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $vouchers->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop

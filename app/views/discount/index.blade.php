@section('title')
    Quản lý chiết khấu
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
                            <span> Danh sách chiết khấu</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/discount/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo chiết khấu</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/discount'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Tiêu đề chiết khấu</label>
                                    <input type="text" name="title" class="form-control" value="{{{ isset($input['title']) ? $input['title'] : '' }}}" placeholder="Nhập tiêu đề chiết khấu để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($discounts) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($discounts) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th>Tiêu đề</th>
                                <th class="fix-width-50">%</th>
                                <th class="fix-width-120">Thẻ áp dụng</th>
                                <th class="fix-width-100">Thời gian</th>
                                <th class="fix-width-80">Tham gia</th>
                                <th class="fix-width-100">G-Coin</th>
                                <th class="fix-width-100">Người tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discounts as $discount)
                                <tr>
                                    <td style="text-align: center !important;">
                                        {{ $discount->Discount_Status == 1 ? '<i class="fa fa-check"  style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-times"  style="color: red" aria-hidden="true"></i>' }}
                                    </td>
                                    <td>{{ $discount->Discount_Name }}</td>
                                    <td>{{ $discount->Discount_Percent }}</td>
                                    <td>{{ $discount->Discount_Card_Apply }}</td>
                                    <td style="text-align: center !important;">
                                        {{ date('d-m-Y', strtotime($discount->Discount_Start_Date)) }}
                                        <br>
                                        -
                                        <br>
                                        {{ date('d-m-Y', strtotime($discount->Discount_Exprire_Date)) }}
                                    </td>
                                    <td>{{ $discount->Discount_Total_Account }}</td>
                                    <td>{{ $discount->Discount_Total_Coin }}</td>
                                    <td>{{ $discount->Discount_Creator }}</td>
                                </tr>
                            @endforeach
                            @if (!sizeof($discounts))
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $discounts->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop

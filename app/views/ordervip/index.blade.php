@section('title')
    Quản lý hóa đơn mua vip
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
                            <span> Danh sách hóa đơn mua vip</span>
                        </p>
                    </div>
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($orders) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($orders) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="">Tên gói vip</th>
                                <th class="fix-width-100">Mã gói vip</th>
                                <th class="fix-width-120">Giá</th>
                                <th class="fix-width-120">Người mua</th>
                                <th class="fix-width-120">Ngày mua</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <?php 
                                    $vip = Vip::find($order->vip_id); 
                                    $account = Account::find($order->account_id);
                                ?>
                                
                                <tr>
                                    <td>{{ $vip->name }}</td>
                                    <td>{{ $vip->vip_id }}</td>
                                    <td><span class="money-format">{{ $order->sale_price }}</span></td>
                                    <td>{{ $account->UserName }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</td>
                                </tr>
                            @endforeach
                            @if (!sizeof($orders)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </article>
    </div>
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/product.js') }}
@stop

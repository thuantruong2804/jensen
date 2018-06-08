@section('title')
    Quản lý hóa đơn
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
                            <span> Danh sách hóa đơn</span>
                        </p>
                    </div>
                </div>
                
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/order'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên tài khoản</label>
                                    <?php $accounts = Account::select('id', 'UserName')->get(); ?>
                                    <select name="account_id" class="has-custom-select custom-input" id="disabled">
                                        <option value="">Tất cả</option>    
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}" {{ isset($input['account_id']) && $input['account_id'] == $account->id ? "selected='selected'" : '' }} >{{ $account->UserName }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
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
                                <th class="fix-width-50 col-center">Ảnh</th>
                                <th class="">Tên sản phẩm</th>
                                <th class="fix-width-100">Mã sản phẩm</th>
                                <th class="fix-width-120">Giá</th>
                                <th class="fix-width-120">Người mua</th>
                                <th class="fix-width-120">Ngày mua</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <?php 
                                    $product = Product::find($order->product_id); 
                                    $account = Account::find($order->account_id);
                                ?>
                                @if (!empty($product))
                                <tr>
                                    <td class="fix-width-50">
                                        <?php $imageUrl = Media::find($product->media_id); ?>
                                        <img src="{{ $imageUrl->path.$imageUrl->thumb }}" style="width: 60px; height: 40px;">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td><span class="money-format">{{ $order->sale_price }}</span></td>
                                    <td>{{ $account->UserName }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</td>
                                </tr>
                                @endif
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

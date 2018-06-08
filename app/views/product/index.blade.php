@section('title')
    Quản lý sản phẩm
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
                            <span> Danh sách sản phẩm</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/product/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo sản phẩm</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/product'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="{{{ isset($input['name']) ? $input['name'] : '' }}}" placeholder="Nhập tên sản phẩm để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($products) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($products) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-120">Giá gốc</th>
                                <th class="fix-width-120">Giá khuyến mại</th>
                                <th class="fix-width-50">Mua</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-150 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="fix-width-50">
                                        <?php $imageUrl = Media::find($product->media_id); ?>
                                        <img src="{{ $imageUrl->path.$imageUrl->thumb }}" style="width: 60px; height: 40px;">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td><span class="money-format">{{ $product->price }}</span></td>
                                    <td><span class="money-format">{{ $product->sale_price }}</span></td>
                                    <td>{{ $product->num_buy }}</td>
                                    <td>{{ date('d-m-Y', strtotime($product->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/admin/product/edit/'.$product->pro_id) }}" class="btn btn-info has-tooltip" title="@lang('form.label.edit')"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/product/delete/'.$product->pro_id) }}" 
                                                class="delete-product btn btn-danger has-tooltip" 
                                                title="@lang('form.label.delete')"
                                                data-method="post" 
                                                data-type="json" 
                                                data-confirm="Bạn có chắc chắn muốn xóa sản phẩm này"
                                                data-action1="<i class='fa fa-times'></i> @lang('form.label.cancel')"
                                                data-action2="<i class='fa fa-check'></i> @lang('form.label.delete')">
                                                <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($products)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </article>
    </div>
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/product.js') }}
@stop

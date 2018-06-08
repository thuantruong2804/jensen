@section('title')
    Quản lý vip
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
                            <span> Danh sách vip</span>
                        </p>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/vip'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên gói</label>
                                    <input type="text" name="name" class="form-control" value="{{{ isset($input['name']) ? $input['name'] : '' }}}" placeholder="Nhập tên gói để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>1</span> đến <span>4</span> trong tổng số <span class="money-format">4</span> bản ghi.</p>
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
                                <th class="">Tên gói</th>
                                <th class="fix-width-100">Thời gian vip</th>
                                <th class="fix-width-100">Giá gốc</th>
                                <th class="fix-width-100">Giá khuyến mại</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-100 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vips as $vip)
                                <tr>
                                    <td class="fix-width-50">
                                        <?php
                                            $imageUrl = Asset('assets/images/bronzevip-228x228.png');
                                            if ($vip->vip_id == 2) {
                                                $imageUrl = Asset('assets/images/silvervip-228x228.png');
                                            } elseif ($vip->vip_id == 3) {
                                                $imageUrl = Asset('assets/images/goldvip-228x228.png');
                                            } elseif ($vip->vip_id == 5) {
                                                $imageUrl = Asset('assets/images/bronzevip-228x228.png');
                                            }
                                        ?>
                                        <img src="{{ $imageUrl }}" style="width: 60px; height: 60px;">
                                    </td>
                                    <td>{{ $vip->name }}</td>
                                    <td>{{ $vip->num_date }} ngày</td>
                                    <td class="money-format">{{ $vip->price }}</td>
                                    <td class="money-format">{{ $vip->sale_price }}</td>
                                    <td>{{ date('d-m-Y', strtotime($vip->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/admin/vip/edit/'.$vip->vip_id) }}" class="btn btn-info has-tooltip" title="@lang('form.label.edit')"><i class="fa fa-pencil-square-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($vips)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </div>
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/product.js') }}
@stop

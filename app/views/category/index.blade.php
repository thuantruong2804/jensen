@section('title')
    Quản lý người chơi
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
                            <span> Danh sách danh mục</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <!--<a href="{{ URL::to('admin/category/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo danh mục</a>-->
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/category'),    
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" value="{{{ isset($input['name']) ? $input['name'] : '' }}}" placeholder="Nhập tên danh mục để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($categories) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($categories) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-50 col-center">Mã</th>
                                <th class="fix-width-200">Tên danh mục</th>
                                <th class="">Mô tả</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-100 col-center">Trạng thái</th>
                                <!-- <th class="fix-width-150 col-center">@lang('form.label.action')</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td style="text-align: center !important;">{{ $category->cate_id }}</td>
                                    <td>{{{ $category->name }}}</td>
                                    <td>{{{ $category->description }}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($category->created_at)) }}</td>
                                    <td class="col-center">
                                        @if ($category->status == 1)
                                            {{ "<span class=\"label label-success\">"."Đã duyệt"."</span>" }}
                                        @else
                                            {{ "<span class=\"label label-default\">"."Chưa duyệt"."</span>"; }}
                                        @endif
                                    </td>
                                    <!--
                                    <td>
                                        @if ($category->is_deleted != 1) 
                                        <a href="{{ URL::to('/admin/category/edit/'.$category->user_id) }}" class="btn btn-primary has-tooltip" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/category/status/' . $category->user_id) }}" 
                                           class="btn btn-success public-user has-tooltip" 
                                           title="{{ ($category->status) ? 'Bỏ duyệt' : 'Duyệt' }}"
                                           data-method="post" data-type="json" 
                                           data-confirm="{{ ($category->status) ? 'Bạn có muốn bỏ duyệt tài khoản này?' : 'Bạn chắc chắn muốn duyệt tài khoản này?' }}"              
                                           data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $category->user_id }}">
                                           <i class="fa {{ $category->status ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i></a>
                                        <a href="{{ URL::to('/admin/category/delete/'.$category->user_id) }}" 
                                            class="delete-user btn btn-danger has-tooltip" 
                                            title="Xóa"
                                            data-method="post" 
                                            data-type="json" 
                                            data-confirm="Bạn có chắc chắn muốn xóa người chơi này?"
                                            data-action1="<i class='fa fa-times'></i> Hủy"
                                            data-action2="<i class='fa fa-check'></i> Xóa">
                                            <i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                    -->
                                </tr>
                            @endforeach
                            @if (!sizeof($categories)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/category.js') }}
@stop

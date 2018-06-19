@section('title')
    Quản lý lab
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
                            <span> Danh sách lab</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/lab/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo lab</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/lab'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên lab</label>
                                    <input type="text" name="name" class="form-control" value="{{{ isset($input['name']) ? $input['name'] : '' }}}" placeholder="Nhập tên lab để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="has-custom-select custom-input" id="disabled">
                                        <option value="-1">Tất cả</option>    
                                        <option value="1" {{ isset($input['status']) && $input['status'] == 1 ? "selected='selected'" : '' }} >Đã duyệt</option>
                                        <option value="0" {{ isset($input['status']) && $input['status'] == 0 ? "selected='selected'" : '' }} >Chưa duyệt</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($labs) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($labs) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-200">Tên lab</th>
                                <th class="">Địa chỉ</th>
                                <th class="">Số điện thoại</th>
                                <th class="fix-width-100 col-center">Trạng thái</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-150 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($labs as $lab)
                                <tr>
                                    <td style="text-align: center !important;">{{ $lab->id }}</td>
                                    <td>{{{ $lab->name }}}</td>
                                    <td>{{{ $lab->address }}}</td>
                                    <td>{{{ $lab->phone }}}</td>
                                    <td class="col-center">
                                        @if ($lab->status == 0)
                                            {{ "<span class=\"label label-default\">"."Chưa duyệt"."</span>" }}
                                        @else
                                            {{ "<span class=\"label label-success\">"."Đã duyệt"."</span>"; }}
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y H:i', strtotime($lab->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/admin/lab/edit/'.$lab->id) }}" class="btn btn-primary has-tooltip" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/lab/status/' . $lab->id) }}"
                                           class="btn btn-success public-user has-tooltip" 
                                           title="{{ ($lab->status) ? 'Bỏ duyệt' : 'Duyệt' }}"
                                           data-method="post" data-type="json" 
                                           data-confirm="{{ ($lab->status) ? 'Bạn có muốn bỏ duyệt lab này?' : 'Bạn chắc chắn muốn duyệt lab này?' }}"
                                           data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $lab->id }}">
                                           <i class="fa {{ $lab->status ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i></a>
                                        <a href="{{ URL::to('/admin/lab/delete/'.$lab->id) }}"
                                            class="delete-account btn btn-danger has-tooltip"
                                            title="Xóa"
                                            data-method="post" 
                                            data-type="json" 
                                            data-confirm="Bạn có chắc chắn muốn xóa lab này"
                                            data-action1="<i class='fa fa-times'></i> @lang('form.label.cancel')"
                                            data-action2="<i class='fa fa-check'></i> @lang('form.label.delete')">
                                            <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($labs)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $labs->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/account.js') }}
@stop

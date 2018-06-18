@section('title')
    Quản lý tài khoản
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
                            <span> Danh sách tài khoản</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/account/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo người chơi</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/account'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" name="username" class="form-control" value="{{{ isset($input['username']) ? $input['username'] : '' }}}" placeholder="Nhập tên tài khoản để tìm kiếm"></input>
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
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($accounts) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($accounts) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-200">Tên tài khoản</th>
                                <th class="">Email</th>
                                <th class="fix-width-100 col-center">Trạng thái</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-150 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td style="text-align: center !important;">{{ $account->id }}</td>
                                    <td>{{{ $account->username }}}</td>
                                    <td>{{{ $account->email }}}</td>
                                    <td class="col-center">
                                        @if ($account->status == 0)
                                            {{ "<span class=\"label label-default\">"."Chưa duyệt"."</span>" }}
                                        @else
                                            {{ "<span class=\"label label-success\">"."Đã duyệt"."</span>"; }}
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y H:i', strtotime($account->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/admin/account/edit/'.$account->id) }}" class="btn btn-primary has-tooltip" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/account/status/' . $account->id) }}"
                                           class="btn btn-success public-user has-tooltip" 
                                           title="{{ ($account->status) ? 'Bỏ duyệt' : 'Duyệt' }}"
                                           data-method="post" data-type="json" 
                                           data-confirm="{{ ($account->status) ? 'Bạn có muốn bỏ duyệt tài khoản này?' : 'Bạn chắc chắn muốn duyệt tài khoản này?' }}"
                                           data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $account->id }}">
                                           <i class="fa {{ $account->status ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i></a>
                                        <a href="{{ URL::to('/admin/account/delete/'.$account->id) }}"
                                            class="delete-account btn btn-danger has-tooltip" 
                                            title="Từ chối"
                                            data-method="post" 
                                            data-type="json" 
                                            data-confirm="Bạn có chắc chắn muốn xóa tài khoản này"
                                            data-action1="<i class='fa fa-times'></i> @lang('form.label.cancel')"
                                            data-action2="<i class='fa fa-check'></i> @lang('form.label.delete')">
                                            <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($accounts)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $accounts->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/account.js') }}
@stop

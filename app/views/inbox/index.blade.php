@section('title')
    Quản lý hòm thư
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
                            <span> Danh sách hòm thư</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/inbox/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo thư mới</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/inbox'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Người nhận</label>
                                    <select title="" name="receive_account_id" class="has-custom-select custom-input" id="receive_account_id">
                                        <option value="">Không tìm kiếm</option>
                                        <option value="-1">Tất cả tài khoản</option>
                                        @foreach(Account::select('ID', 'UserName')->get() as $account)
                                            <option value="{{ $account->ID }}" {{ isset($input['receive_account_id']) && $input['receive_account_id'] == $account->ID ? "selected='selected'" : '' }}>{{ $account->UserName }}</option>
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
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($inboxs) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($inboxs) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th>Tiêu đề</th>
                                <th class="fix-width-120">Người gửi</th>
                                <th class="fix-width-120">Người nhận</th>
                                <th class="fix-width-120">Ngày gửi</th>
                                <th class="fix-width-50">Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inboxs as $inbox)
                                <tr class="{{ $inbox->receive_account_id == -1 ? 'danger' : '' }}">
                                    <td style="text-align: center !important;">{{ $inbox->inbox_id }}</td>
                                    <td>{{{ $inbox->title }}}</td>
                                    <td>{{{ $inbox->sender }}}</td>
                                    <?php $receiveAccount = Account::find($inbox->receive_account_id); ?>
                                    <td>{{{ $inbox->receive_account_id != -1 ? $receiveAccount->UserName : 'Tất cả' }}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($inbox->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/admin/inbox/'.$inbox->inbox_id) }}" class="btn btn-primary has-tooltip" title="Xem"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($inboxs))
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $inboxs->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop

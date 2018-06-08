@section('title')
    Quản lý giao dịch
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
                            <span> Danh sách giao dịch</span>
                        </p>
                    </div>
                </div>
                
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/transaction'),
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
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($trans) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($trans) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="">Tài khoản</th>
                                <th class="fix-width-100">Loại thẻ</th>
                                <th class="fix-width-120">Pin</th>
                                <th class="fix-width-120">Serial</th>
                                <th class="fix-width-120">Mệnh giá</th>
                                <th class="fix-width-120">Ngày nạp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trans as $tran)
                                <?php 
                                    $account = Account::find($tran->account_id);
                                ?>
                                
                                <tr>
                                    <td>{{ $account->UserName }}</td>
                                    <td>{{ $tran->telco_code }}</td>
                                    <td>{{ $tran->card_pin }}</td>
                                    <td>{{ $tran->card_serial }}</td>
                                    <td><span class="money-format">{{ $tran->card_amount }}</span></td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($tran->created_at)) }}</td>
                                </tr>
                            @endforeach
                            @if (!sizeof($trans)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{ $trans->links() }}
            </div>
        </article>
    </div>
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/product.js') }}
@stop

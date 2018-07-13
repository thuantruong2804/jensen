@section('title')
    Quản lý thẻ bảo hành
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
                            <span> Danh sách thẻ bảo hành</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4" style="text-align: right;">
                        <a href="{{ URL::to('download/JENSEN_UP.xls') }}" class="btn btn-success pull-right btn-create" target="_blank"><i class="fa fa-download"></i> Tải mẫu file import</a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <a data-toggle="modal" data-target="#importData" class="btn btn-pink pull-right btn-create"><i class="fa fa-upload"></i> Import thẻ</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/card'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-2 form-group">
                                    <label>Mã thẻ</label>
                                    <input type="text" name="card_no" class="form-control" value="{{{ isset($input['card_no']) ? $input['card_no'] : '' }}}" placeholder="Nhập mã thẻ"></input>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Tên bệnh nhân</label>
                                    <input type="text" name="card_name" class="form-control" value="{{{ isset($input['card_name']) ? $input['card_name'] : '' }}}" placeholder="Nhập tên bệnh nhân"></input>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Nha khoa</label>
                                    <input type="text" name="doctor" class="form-control" value="{{{ isset($input['doctor']) ? $input['doctor'] : '' }}}" placeholder="Nhập tên nha khoa"></input>
                                </div>
                                <div class="col-sm-2 form-group">
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
                                @if (sizeof($cards) > 0) 
                                <?php 
                                    $uri = $_SERVER['REQUEST_URI']; 
                                    if (strpos($uri, '?')) {
                                        $uri = $uri.'&export=true';
                                    } else {
                                        $uri = $uri.'?export=true';
                                    }

                                ?>
                                    <div class="col-sm-1 form-group">
                                        <a href="{{ $uri }}" class="btn btn-success pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"><i class="fa fa-cloud-download"></i> Excel</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($cards) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($cards) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
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
                                <th class="fix-width-50 col-center">Mã thẻ</th>
                                <th class="">Bệnh nhân</th>
                                <th class="">Nha khoa</th>
                                <th class="fix-width-100 col-center">Lab</th>
                                <th class="fix-width-100 col-center">Vị trí răng</th>
                                <th class="fix-width-50 col-center">SL</th>
                                <th class="fix-width-100">Ngày phát hành</th>
                                <th class="fix-width-100">Hạn bảo hành</th>
                                <th class="fix-width-100">Trạng thái</th>
                                <th class="fix-width-150 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $card)
                                <tr>
                                    <td style="text-align: center !important;">{{ $card->card_no }}</td>
                                    <td>{{ mb_strtoupper($card->card_name) }}</td>
                                    <td>{{ mb_strtoupper($card->doctor) }}</td>
                                    <td>{{ mb_strtoupper($card->lab) }}</td>
                                    <td>{{ mb_strtoupper($card->position) }}</td>
                                    <td>{{ $card->sl }}</td>
                                    <td>{{ date('d/m/Y', strtotime($card->release)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($card->expire)) }}</td>
                                    <td class="col-center">
                                        @if ($card->status == 0)
                                            {{ "<span class=\"label label-default\">"."Chưa duyệt"."</span>" }}
                                        @else
                                            {{ "<span class=\"label label-success\">"."Đã duyệt"."</span>"; }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/admin/card/edit/'.$card->id) }}" class="btn btn-primary has-tooltip" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/card/status/' . $card->id) }}"
                                           class="btn btn-success public-user has-tooltip" 
                                           title="{{ ($card->status) ? 'Bỏ duyệt' : 'Duyệt' }}"
                                           data-method="post" data-type="json" 
                                           data-confirm="{{ ($card->status) ? 'Bạn có muốn bỏ duyệt thẻ bảo hành này?' : 'Bạn chắc chắn muốn duyệt thẻ bảo hành này?' }}"
                                           data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $card->id }}">
                                           <i class="fa {{ $card->status ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i></a>
                                        <a href="{{ URL::to('/admin/card/delete/'.$card->id) }}"
                                            class="delete-user btn btn-danger has-tooltip" 
                                            title="Từ chối"
                                            data-method="post" 
                                            data-type="json" 
                                            data-confirm="Bạn có chắc chắn muốn xóa thẻ bảo hành này"
                                            data-action1="<i class='fa fa-times'></i> @lang('form.label.cancel')"
                                            data-action2="<i class='fa fa-check'></i> @lang('form.label.delete')">
                                            <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($cards)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $cards->links() }}
            </div>
        </article>
    </div>

    <!-- Inport File Modal -->
    <div class="modal fade modal-hanlde" id="importData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Import file danh sách thẻ</h4>
                </div>
                <form method="POST" action="{{ URL::to('/admin/card/import') }}"  enctype="multipart/form-data"
                      id="form-import-file">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7 form-group">
                                <label for="">Chọn file cập nhật</label>
                                <input type="file" class="" name="data_file" id="data_file">
                                <p style="color: #A90329; margin: 3px;">{{ isset($message) ? $message : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit-data-file">Cập nhật thẻ</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/account.js') }}
@stop

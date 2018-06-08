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
                            <span> Danh sách nhân vật</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">

                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/character'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Tên nhân vật</label>
                                    <input type="text" name="username" class="form-control" value="{{{ isset($input['username']) ? $input['username'] : '' }}}" placeholder="Nhập tên tài khoản để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Trạng thái</label>
                                    <select name="disabled" class="has-custom-select custom-input" id="disabled">
                                        <option value="-1">Tất cả</option>    
                                        <option value="0" {{ isset($input['disabled']) && $input['disabled'] == 0 ? "selected='selected'" : '' }} >Chưa duyệt</option>
                                        <option value="1" {{ isset($input['disabled']) && $input['disabled'] == 1 ? "selected='selected'" : '' }} >Đã duyệt</option>
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
                                <th class="fix-width-30 col-center">Mã</th>
                                <th class="fix-width-170">Thông tin nhân vật</th>
                                <th class="">Thông tin trả lời về nhân vật, quy định</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td style="text-align: center !important;">{{ $account->ID }}</td>
                                    <td>
                                        Tên nhân vật: <b style="color: #42A9F0">{{{ $account->CharacterName }}}</b> <br>
                                        <?php $masterAccount = Account::find($account->AccountID); ?>
                                        Tên tài khoản: <b style="color: #D01D34">{{{ $masterAccount->UserName }}}</b> <br>
                                        Ngày sinh: <b>{{{ $account->BirthDate }}}</b> <br>
                                        Giới tính: <b>@if($account->Gender == 1) Nam @else Nữ @endif</b>  <br>
                                        <?php
                                            $cityArr = [1 => 'Los Santos',
                                                        2 => 'San Fierro',
                                                        3 => 'Las Venturas',
                                                        4 => 'Red County',
                                                        5 => 'Bone County',
                                                        6 => 'Tierra Robada',
                                                        7 => 'Whetstone',
                                                        8 => 'Flint County'];
                                        ?>
                                        Quê quán: <b>{{{ $cityArr[$account->City] }}}</b> <br>
                                        Đăng ký: <b>{{ date('d/m/Y H:i', strtotime($account->created_at)) }}</b> <br>
                                        <p style="text-align: left; margin-top: 10px;">
                                            @if ($account->Active == 0)
                                                {{ "<span class=\"label label-default\">"."Chưa duyệt"."</span>" }}
                                            @else
                                                {{ "<span class=\"label label-success\">"."Đã duyệt"."</span>"; }}
                                            @endif
                                        </p>
                                        <p>
                                            @if (!$account->Active)
                                                <a href="{{ URL::to('/admin/character/status/' . $account->ID) }}"
                                                   class="btn btn-success public-user has-tooltip"
                                                   title="Duyệt nhân vật"
                                                   data-method="post" data-type="json"
                                                   data-confirm="Bạn chắc chắn muốn duyệt tài khoản này?"
                                                   data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}" data-table='1' id="action-order-{{ $account->ID }}">
                                                    <i class="fa {{ $account->Active ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i></a>

                                                <a href="#" class="btn btn-danger has-tooltip" title="Từ chối" data-toggle="modal" data-target="#delete{{ $account->ID }}"><i class="fa fa-trash-o"></i></a></a>
                                                <div class="modal fade modal-sendContact" id="delete{{ $account->ID }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Phản hồi lý do từ chối tới tài khoản</h4>
                                                            </div>
                                                            <form method="POST" action="/admin/character/delete" accept-charset="UTF-8"
                                                                  id="form-delete-user-{{ $account->ID }}" >
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Nhập nội dung lý do từ chối nhân vật</label>
                                                                        <textarea class="form-control" rows="5" name="reason"></textarea>
                                                                    </div>
                                                                    <input type="hidden" name="character_id" value="{{ $account->ID }}"/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger" style="margin-top: 25px;padding: 6px 8px;" >Xóa nhân vật</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal"  style="margin-top: 25px;padding: 6px 8px;">Đóng lại</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p style="font-family: RobotoLight">
                                            <b style="text-decoration: underline;">1. Mô tả nhân vật: </b> <br>
                                            {{{ $account->character_introdue_utf8 }}}
                                        </p>
                                        <p style="font-family: RobotoLight">
                                            <b style="text-decoration: underline;">2. Mô tả chính sách: </b>  <br>
                                            {{{ $account->term_description_utf8 }}}
                                        </p>
                                        <p style="font-family: RobotoLight">
                                            <b style="text-decoration: underline;">3. Giải thích quy định: </b>  <br>
                                            {{{ $account->roleplay_description_utf8 }}}
                                        </p>
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

    <style>
        .modal-sendContact {
            margin-top: 70px;
        }

        .modal-sendContact .modal-header{
            background-color: #f6f6f6;
            padding: 10px 15px;
        }

        .modal-sendContact .modal-title{
            text-transform: uppercase;
            font-size: 18px;
        }

        .modal-sendContact .modal-title {
            font-family: "RobotoRegular";
            text-align: center;
            color: #333;
        }

        .modal-sendContact .modal-body .form-group {
            text-align: left !important;
        }

        .modal-sendContact .modal-body label {
            font-family: "RobotoRegular";
            font-weight: normal;
            color: #333;
            font-size: 14px;
        }

        .modal-sendContact .modal-footer {
            border-top: none;
            padding-top: 0px;
        }

    </style>
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/account.js') }}
@stop

@section('title')
    Quản lý chiết khấu
@stop

@section('style')
@stop

@section('content')
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="widget-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <p class="page-title"><i class="fa fa-plus-square"></i> 
                            <span> Tạo mới chiết khấu</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/discount') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách chiết khấu</a>
                    </div>
                </div>
                {{ Form::open(array(
                    'url' => URL::to('/admin/discount/create'),
                    'id' => 'form-new-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}

                    <div class="" style="margin-top: 15px;">
                        <div class="row" id="tab-vi">
                            <div class="form-group col-sm-12">
                                <label for="title">Tên chiến dịch <span class="required"> *</span></label>
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="title">Tỉ lệ chiết khấu <span class="required"> *</span></label>
                                {{ Form::text('percent', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="color-white">Từ ngày</label>
                                <div class="input-group timepicker">
                                    <?php
                                    $start_date = date('d-m-Y');
                                    if (!isset($input['start_date']) && !isset($input['end_date'])) {
                                        $start_date = date('d-m-Y');
                                    } elseif (isset($input['start_date'])) {
                                        $start_date = $input['start_date'];
                                    }
                                    ?>
                                    <input id="search-time-to-date" type="text" readonly="readonly" name="start_date" class="form-control has-datepicker" value="{{ $start_date }}" />
                                    <label class="input-group-addon" for="search-time-to-date"><i class="glyphicon glyphicon-calendar"></i></label>
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="color-white">Đến ngày</label>
                                <div class="input-group timepicker">
                                    <input id="search-time-end-date" type="text" readonly="readonly" name="end_date" class="form-control has-datepicker" value="{{ isset($input['end_date']) ? $input['end_date'] : date('d-m-Y') }}" />
                                    <label class="input-group-addon" for="search-time-end-date"><i class="glyphicon glyphicon-calendar"></i></label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="title">Loại thẻ áp dụng <span class="required"> *</span></label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio1" value="MGC" style="margin-top: 3px !important;"> Megacard
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio2" value="ONC" style="margin-top: 3px !important;"> Oncash
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio3" value="ZING" style="margin-top: 3px !important;"> Zing
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio4" value="FPT" style="margin-top: 3px !important;"> Gate
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio5" value="VTT" style="margin-top: 3px !important;"> Vietel
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio6" value="VMS" style="margin-top: 3px !important;"> Mobifone
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="card[]" id="inlineRadio7" value="VNP" style="margin-top: 3px !important;"> Vinaphone
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="message">Nội dung <span class="required"> *</span></label>
                                {{ Form::textarea('message', null, array('class' => 'form-control ckeditor', 'id' => 'create-content-vi')) }}
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu chiết khấu</button>
                            <a href="{{ URL::to('/admin/discount') }}" class="btn btn-default"> Hủy bỏ</a>
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
        </article>
    </div>
@stop
@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop


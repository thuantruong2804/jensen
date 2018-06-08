@section('title')
    Quản lý Voucher
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
                            <span> Tạo mới voucher</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/voucher') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách Voucher</a>
                    </div>
                </div>
                {{ Form::open(array(
                    'url' => URL::to('/admin/voucher/create'),
                    'id' => 'form-new-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}

                    <div class="" style="margin-top: 15px;">
                        <div class="row" id="tab-vi">
                            <div class="form-group col-sm-3">
                                <label for="title">Số lượng voucher <span class="required"> *</span></label>
                                {{ Form::text('number', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="title">Tỉ lệ chiết khấu <span class="required"> *</span></label>
                                {{ Form::text('percent', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="color-white">Ngày hết hạn</label>
                                <div class="input-group timepicker">
                                    <input id="search-time-end-date" type="text" readonly="readonly" name="end_date" class="form-control has-datepicker" value="{{ isset($input['end_date']) ? $input['end_date'] : date('d-m-Y') }}" />
                                    <label class="input-group-addon" for="search-time-end-date"><i class="glyphicon glyphicon-calendar"></i></label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="title">Có được gộp vào khuyến mại khác<span class="required"> *</span></label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="radio-inline">
                                            <input type="radio" name="type" id="inlineRadio1" value="1" style="margin-top: 4px !important;" checked="checked"> Có
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="type" id="inlineRadio2" value="2" style="margin-top: 4px !important;"> Không
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Tạo voucher</button>
                            <a href="{{ URL::to('/admin/voucher') }}" class="btn btn-default"> Hủy bỏ</a>
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


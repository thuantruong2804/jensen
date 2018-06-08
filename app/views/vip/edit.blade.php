@section('title')
    Quản lý vip
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
                            <span> Sửa vip</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/vip') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách vip</a>
                    </div>
                </div>  
                {{ Form::open(array(
                    'url' => URL::to('/admin/vip/edit/'.$vip->vip_id),
                    'id' => 'form-vip-edit',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Tên sản phẩm<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('name', !empty($vip) ? $vip->name : null, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Số ngày vip<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('num_date', !empty($vip) ? $vip->num_date : null, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Giá gốc<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('price', $vip->price, array('class' => 'form-control auto-focus money-format')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Khuyến mại<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('sale_price', $vip->sale_price, array('class' => 'form-control auto-focus money-format')) }}
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu vip</button>
                            <a href="{{ URL::to('/admin/user') }}" class="btn btn-default"> Hủy bỏ</a>
                        </div>
                    </div>                
                {{ Form::close() }}
                
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/vip.js') }}
@stop

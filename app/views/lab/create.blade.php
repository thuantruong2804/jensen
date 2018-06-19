@section('title')
    Quản lý lab
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
                            <span> Tạo mới lab</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/lab') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách lab</a>
                    </div>
                </div>
                
                {{ Form::open(array(
                    'url' => URL::to('/admin/lab/create'),
                    'id' => 'form-account-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tên lab <span class="required"> *</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ <span class="required"> *</span></label>
                                <input type="text" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại <span class="required"> *</span></label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Vĩ độ <span class="required"> *</span></label>
                                <input type="text" name="lat" class="form-control">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Kinh độ <span class="required"> *</span></label>
                                <input type="text" name="long" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu lab</button>
                            <a href="{{ URL::to('/admin/lab') }}" class="btn btn-default"> Hủy bỏ</a>
                        </div>
                    </div>
                 {{ Form::close() }}
              </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/account.js') }}
@stop

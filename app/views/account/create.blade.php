@section('title')
    Quản lý tài khoản
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
                            <span> Tạo mới tài khoản</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/account') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách tài khoản</a>
                    </div>
                </div>
                
                {{ Form::open(array(
                    'url' => URL::to('/admin/account/create'),
                    'id' => 'form-account-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <input type="hidden" name="admin_level" class="form-control" value="0"></input>
                            <div class="col-md-6 form-group">
                                <label>Tên tài khoản <span class="required"> *</span></label>
                                <input type="text" name="username" class="form-control" style="text-transform: lowercase;"></input>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Mật khẩu <span class="required"> *</span></label>
                                <input type="password" name="password" class="form-control"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nhập lại mật khẩu <span class="required"> *</span></label>
                                <input type="password" name="confirm_password" class="form-control"></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Email <span class="required"> *</span></label>
                                <input type="text" name="email" class="form-control"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mật khẩu cấp 2<span class="required"> *</span></label>
                                <input type="password" name="ex_password" class="form-control"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu tài khoản</button>
                            <a href="{{ URL::to('/admin/account') }}" class="btn btn-default"> Hủy bỏ</a>
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

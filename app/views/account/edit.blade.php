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
                            <span> Sửa tài khoản</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/account') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách tài khoản</a>
                    </div>
                </div>

                {{ Form::open(array(
                    'url' => URL::to('/admin/account/edit/'.$account->id),
                    'id' => 'form-account-edit',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tên tài khoản <span class="required"> *</span></label>
                                <input type="text" name="username" class="form-control" style="text-transform: lowercase;" value="{{ $account->username }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email <span class="required"> *</span></label>
                                <input type="text" name="email" class="form-control"  value="{{ $account->email }}"></input>
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

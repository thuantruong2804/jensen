@section('title')
    Tài khoản quản trị
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
                        <a href="{{ URL::to('admin/user') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách tài khoản</a>
                    </div>
                </div>
                
                {{ Form::open(array(
                    'url' => URL::to('/admin/category/create'),
                    'id' => 'form-category-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tên danh mục<span class="required"> *</span></label>
                                <input type="text" name="name" class="form-control"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mô tả <span class="required"> *</span></label>
                                <input type="text" name="description" class="form-control"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu danh mục</button>
                            <a href="{{ URL::to('/admin/category') }}" class="btn btn-default"> Hủy bỏ</a>
                        </div>
                    </div>
                 {{ Form::close() }}
              </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/category.js') }}
@stop

@section('title')
    Quản lý sản phẩm
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
                            <span> Tạo mới sản phẩm</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/product') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách sản phẩm</a>
                    </div>
                </div>  
                {{ Form::open(array(
                    'url' => URL::to('/admin/product/create'),
                    'id' => 'form-product-new',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class='form-group col-sm-12'>
                                <label>Ảnh sản phẩm<span class="required"> *</span></label>
                                <div id='uploaded-files'>
                                </div>
                                <a class='btn btn-primary btn-upload' data-multiple="1"
                                    data-format='image'
                                    data-confirm="@lang('form.confirm_delete')"
                                    data-action1="{{ "<i class='fa fa-times'></i> ".Lang::get('form.label.cancel') }}" 
                                    data-action2="{{ "<i class='fa fa-check'></i> " . Lang::get('form.label.ok') }}"
                                    ><i class='fa fa-upload'></i> @lang('form.label.upload')</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Tên sản phẩm<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('name', !empty($product) ? $product->name : null, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Danh mục sản phẩm<span class="required"> *</span></label>
                                <div>
                                    <select title="" name="cate_id" class="has-custom-select custom-input" id="cate_id">
                                        @foreach(CommonHelper::getCateActive() as $cate)
                                            <option value="{{ $cate->cate_id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Mã sản phẩm<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('code', !empty($product) ? $product->code : null, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Video<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('video', null, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Giá gốc<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('price', null, array('class' => 'form-control auto-focus currency')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Khuyến mại<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('sale_price', null, array('class' => 'form-control auto-focus currency')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                {{ Form::label('description', 'Mô tả sản phẩm', array('class' => 'control-label')) }}
                                <div>
                                    {{ Form::textarea('description', !empty($product) ? $product->description : null, array('class' => 'form-control ckeditor', 'id' => 'create-content-en')) }}
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu sản phẩm</button>
                            <a href="{{ URL::to('/admin/user') }}" class="btn btn-default"> Hủy bỏ</a>
                        </div>
                    </div>                
                {{ Form::close() }}
                
                @include('elements/uploader')
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/product.js') }}
@stop

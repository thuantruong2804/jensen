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
                            <span> Sửa sản phẩm</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/product') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách sản phẩm</a>
                    </div>
                </div>  
                {{ Form::open(array(
                    'url' => URL::to('/admin/product/edit/'.$product->pro_id),
                    'id' => 'form-product-edit',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class='form-group col-sm-12'>
                                {{ Form::label('image', 'Ảnh sản phẩm', array('class' => 'control-label')) }}
                                <div id='uploaded-files'>
                                    @if (!empty($product->media_id))
                                        @foreach(explode(',', $product->media_id) as $media)
                                        <?php  $media = Media::find($media); ?>
                                        <div class="item-upload">
                                            <div class='item-image'>
                                                <input type="hidden" name="files[]" value="{{ $media->id }}">
                                                <a class="thumb thumbnail-admin" href="{{ $media->path.$media->original }}" title="{{ $media->caption }}" style="background: url('{{ $media->path.$media->thumb }}') no-repeat; background-size: cover; background-position: 70% 100%;"></a>
                                                <div class='tools tools-bottom'>
                                                    @if ($media->type != Config::get('config.media_type.file'))
                                                    <input type='hidden' class='caption-value' value="{{ $media->caption }}" />
                                                    @endif
                                                    <a class="cancel-item-upload" href="javascript:void(0)" data-href="{{ URL::to('/media/delete/'.$media->id) }}">
                                                        <i class="fa fa-times text-danger"></i>
                                                    </a>
                                                    <input type='hidden' class='caption-value' value=""/>
                                                </div>
                                            </div>
                                            <span class="name-item-upload" title="{{ $media->name.'.'.$media->extension }}">{{ $media->name.'.'.$media->extension }}</span>
                                        </div>
                                        @endforeach
                                    @endif
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
                                    {{ Form::text('video', $product->video, array('class' => 'form-control auto-focus')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Giá gốc<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('price', $product->price, array('class' => 'form-control auto-focus currency money-format')) }}
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Khuyến mại<span class="required"> *</span></label>
                                <div>
                                    {{ Form::text('sale_price', $product->sale_price, array('class' => 'form-control auto-focus currency money-format')) }}
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

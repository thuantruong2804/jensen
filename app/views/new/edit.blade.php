@section('title')
    Quản lý tin tức
@stop

@section('style')
@stop

@section('content')
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="widget-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <p class="page-title"><i class="fa fa-pencil-square-o"></i> 
                            <span> Tạo mới tin tức</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/new') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách tin tức</a>
                    </div>
                </div>
                {{ Form::open(array(
                    'url' => URL::to('/admin/new/edit/'.$new->new_id),
                    'id' => 'form-new-edit',
                    'class' => '',
                    'method' => 'put',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                
                    <!-- Edit: type = 1 -->
                    @include('new.form', array('type' => 1))
                
                {{ Form::close() }}
                
                @include('elements/uploader')
            </div>
        </article>
    </div>
@stop
@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop
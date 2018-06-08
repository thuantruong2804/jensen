@section('title')
    @parent
    | @lang('nav.page.user.create')
@stop

@section('content')
<div class="title-content">
    <ol class="breadcrumb">
        <li class="active">
            <a href="{{ URL::to('/admin/user/list') }}">@lang('nav.page.user.index')</a> <span class="divider"></span>
        </li>
        <li class="active">@lang('nav.page.user.create')</li>
    </ol>
</div>

<div class="content-box">
    <div class="box-header" data-original-title="">
        <h2><i class="fa fa-user"></i><span class="break"></span>@lang('nav.page.user.index')</h2>
        <div class="box-icon">
            <a href="javascript:void(0)" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
            <a href="javascript:void(0)" class="btn-close"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="content-box-main">          
        {{ Form::model($category, array(
            'route' => array('admin.category.update', $category->id),
            'id' => 'form-category-edit',
            'class' => 'form-horizontal',
            'method' => 'put',
            'data-remote' => 'true',
            'data-type' => 'json'
        )) }}
        
            <div class="form-group">
                <div class="col-sm-12">
                <a href="{{ URL::to('/admin/category/list') }}" class="btn btn-info pull-left"><i class='fa fa-angle-left'></i> @lang('form.label.back')</a>
                {{ Form::button("<i class='fa fa-save'></i> ".trans('form.label.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                </div>
                <div class="clear"></div>
            </div>
             <div class="form-group">
                {{ Form::label('parent', 'Danh mục cha', array('class' => 'control-label col-sm-2')) }}
                <div class="col-sm-6">
                    {{Form::select('parent', UserHelper::parentOptions(), $value = $category->parent_id, array('class' => 'form-control has-custom-select') )}}
                </div>
            </div>
            <div class="form-group required">
                {{ Form::label('name', 'Tên danh mục', array('class' => 'control-label col-sm-2')) }}
                <div class="col-sm-10">      
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Mô tả',array('class' => 'control-label col-sm-2')) }}
                <div class="col-sm-10">
                    {{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 3)) }}
                </div>
            </div>
            <input type="hidden" value="admin" name="admin_hidden">
        {{ Form::close() }}      
    </div>
</div>

 
@stop

@section('scripts')
    {{ HTML::script('assets/javascripts/category.js') }}
@stop
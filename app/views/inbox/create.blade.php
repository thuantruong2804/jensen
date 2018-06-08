@section('title')
    Quản lý hòm thư
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
                            <span> Tạo mới thư</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/inbox') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách hòm thư</a>
                    </div>
                </div>
                    {{ Form::open(array(
			            'url' => URL::to('/admin/inbox/create'),
			            'id' => 'form-new-new',
			            'class' => '',
			            'method' => 'post',
			            'data-remote' => 'true',
			            'data-type' => 'json'
			        )) }}
                        <div class="" style="margin-top: 15px;">
                            <div class="row" id="tab-vi">
                                <div class="form-group col-sm-8">
                                    <label for="title">Tiêu đề <span class="required"> *</span></label>
                                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Người nhận<span class="required"> *</span></label>
                                    <div>
                                        <select title="" name="receive_account_id" class="has-custom-select custom-input" id="receive_account_id">
                                            <option value="-1">Tất cả tài khoản</option>
                                            @foreach(Account::select('ID', 'UserName')->get() as $account)
                                                <option value="{{ $account->ID }}">{{ $account->UserName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="content">Nội dung <span class="required"> *</span></label>
                                    {{ Form::textarea('content', null, array('class' => 'form-control ckeditor', 'id' => 'create-content-vi')) }}
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="row direct-header">
                            <div class="col col-sm-12">
                                <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu thư</button>
                                <a href="{{ URL::to('/admin/inbox') }}" class="btn btn-default"> Hủy bỏ</a>
                            </div>
                        </div>

                    {{ Form::close() }}
			        
			        @include('elements/uploader')
                </div>
        </article>
    </div>
@stop
@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop


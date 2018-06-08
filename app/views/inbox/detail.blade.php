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
                        <p class="page-title"><i class="fa fa-eye"></i>
                            <span> Chi tiết thư</span>
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
			            'method' => 'get',
			            'data-remote' => 'true',
			            'data-type' => 'json'
			        )) }}
                        <div class="" style="margin-top: 15px;">
                            <div class="row" id="tab-vi">
                                <div class="form-group col-sm-8">
                                    <label for="title">Tiêu đề <span class="required"> *</span></label>
                                    {{ Form::text('title', $inbox->title, array('class' => 'form-control', 'disabled' => 'disabled')) }}
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Người nhận<span class="required"> *</span></label>
                                    <div>
                                        <select title="" name="receive_account_id" class="has-custom-select custom-input" id="receive_account_id" disabled="disabled">
                                            <option value="-1">Tất cả tài khoản</option>
                                            @foreach(Account::select('ID', 'UserName')->get() as $account)
                                                <option value="{{ $account->ID }}" {{ isset($inbox->receive_account_id) && $inbox->receive_account_id == $account->ID ? "selected='selected'" : '' }}>{{ $account->UserName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="content">Nội dung <span class="required"> *</span></label>
                                    {{ Form::textarea('content', $inbox->content, array('class' => 'form-control ckeditor', 'id' => 'create-content-vi',  'disabled' => 'disabled')) }}
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="row direct-header">
                            <div class="col col-sm-12">
                                <a href="{{ URL::to('/admin/inbox') }}" class="btn btn-default"> Quay lại</a>
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


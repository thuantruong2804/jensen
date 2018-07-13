@section('title')
    Quản lý thẻ bảo hành 
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
                            <span> Sửa thông tin thẻ</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/card') }}" class="btn btn-pink pull-right"><i class="fa fa-chevron-left"></i> Danh sách thẻ bảo hành</a>
                    </div>
                </div>

                {{ Form::open(array(
                    'url' => URL::to('/admin/card/edit/'.$card->id),
                    'id' => 'form-account-edit',
                    'class' => '',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json'
                )) }}
                    <div class="content-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Mã thẻ </label>
                                <input type="text" name="card_no" class="form-control" value="{{ $card->card_no }}" disabled="disabled"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Bệnh nhân </label>
                                <input type="text" name="card_name" class="form-control" value="{{ $card->card_name }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nha khoa </label>
                                <input type="text" name="doctor" class="form-control" value="{{ $card->doctor }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Lab </label>
                                <input type="text" name="lab" class="form-control" value="{{ $card->lab }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Vị trí răng </label>
                                <input type="text" name="position" class="form-control" value="{{ $card->position }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>SL </label>
                                <input type="text" name="sl" class="form-control" value="{{ $card->sl }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ngày phát hành </label>
                                <input type="text" name="release" class="form-control" value="{{ date('d/m/Y', strtotime($card->release)) }}"></input>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Hạn bảo hành </label>
                                <input type="text" name="expire" class="form-control" value="{{ date('d/m/Y', strtotime($card->expire)) }}"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row direct-header">
                        <div class="col col-sm-12">
                            <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu tài khoản</button>
                            <a href="{{ URL::to('/admin/card') }}" class="btn btn-default"> Hủy bỏ</a>
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

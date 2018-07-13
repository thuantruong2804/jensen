@section('content')
    <!--section welcome-->
    <div class="section" style="margin-top: 5px;">
        <div class="container-fluid px-0">
            <div class="row text-center text-lg-left">
                <div class="col-lg-12">
                    <img src="{{Asset('assets/frontend/images/card-banner.jpg')}}" style="width: 100%; height: 600px;">
                </div>
            </div>
        </div>
    </div>

    <!--section-->
    <div class="section" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub">Tra cứu thông tin</div>
                <h2 class="h2">Thẻ bảo hành</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row">
                <div class="col-md col-lg-6" style="text-align: center;">
                        <img src="{{Asset('assets/frontend/images/thebaohanh.png')}}" style="width: 499px; margin-top: 50px;">
                </div>
                <div class="col-md col-lg-6 mt-4 mt-md-0">
                    {{ Form::open(array(
                        'url' => URL::to('/tra-cuu-bao-hanh'),
                        'class' => 'contact-form',
                        'method' => 'get',
                    )) }}
                    <div class="content-form" style="margin-top: 100px;">
                        <div class="row">
                            <div class="" style="margin-top: 0px;">
                                <label>Mời kiểm tra thẻ bảo hành chính hãng và nhập thẻ</label>
                                <input class="form-control" name="card_no" type="text">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-hover-fill" style="padding: 13px 39px; margin-top: 32px;">Tra cứu</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="row col-equalH">
                <div class="col-lg-6" style="text-align: center;">

                </div>
                <div class="col-md col-lg-6 mt-4 mt-md-0">

                </div>
            </div>
        </div>
    </div>
    <!--//section-->

    <!--section call us-->
@stop


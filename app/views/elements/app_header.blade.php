<div id="header">
    <div class="header-auth">
        <div class="container">
            <?php $currentAccount = BaseController::getAccountInfo(); ?>
            @if (empty($currentAccount))
            <a class="pull-right" data-toggle="modal" data-target="#loginModal" style="cursor: pointer; ">
                <i class="glyphicon glyphicon-user"></i>
            </a>
            @else
            <a class="pull-right" href="{{ URL::to('/dang-xuat') }}" style="color: #fff; margin-left: 5px; margin-top: 1px;">
                Đăng xuất
            </a>
            <a class="pull-right" style="color: #fff; margin-left: 5px;  margin-top: 1px;">
                G-Coin: <span style="color: orange" class="money-format">{{ $currentAccount->Coin }}</span> |
            </a>
            <a class="pull-right" href="{{ URL::to('/tai-khoan/quan-ly-nhan-vat') }}" style="color: #fff; margin-top: 0px;">
                Xin chào: <span style="color: orange">{{ $currentAccount->UserName }}</span> |
            </a>
            @endif

            @if (empty($currentAccount))
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 style="color: #fff; text-align: center; text-transform: uppercase; font-family: RobotoBold; margin-top: 5px;" >
                                <span style="color: #9F2B33;">Đăng </span>Nhập
                                <p style="margin-top: 5px; font-size: 13px; margin-bottom: 0px; text-transform: none; font-family: RobotoLight;">
                                    Tên tài khoản và mật khẩu
                                </p>
                            </h3>
                            {{
                                Form::open(array(
                                    'action' => 'AccountController@login',
                                    'class' => 'smart-form client-form',
                                    'id' => 'form-admin-login',
                                    'method' => 'post',
                                    'data-remote' => 'true',
                                    'data-type' => 'json',
                                    'novalidate'
                                ))
                            }}
                                <div class="">
                                    <p id="login-error" style="color: #EB0000"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" style="text-align: center;">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" style="text-align: center;">
                                </div>
                                <p style="text-align: right; font-family: RobotoLight; font-size: 13px; margin-bottom: 0px;"><a href="javascript:void(0)" id="forgotPass" style="color: #EB0000;">Quên mật khẩu ?</a></p>
                                <p style="text-align: right; font-family: RobotoLight; font-size: 13px; margin-top: 0px;"><a href="{{ URL::to('/cau-hoi-dang-ky') }}" style="color: #EB0000;">Chưa có tài khoản ? Đăng ký</a></p>
                                <div style="text-align: center">
                                    <button class="btn btn-default db" type="submit">Đăng nhập</button>
                                </div>
                            {{Form::close()}}

                            <div class="forgotPassword">
                                {{ Form::open(array(
                                'action' => 'AccountController@forgot',
                                'id' => 'form-user-forgotpass',
                                'class' => '',
                                'method' => 'post',
                                'data-remote' => 'true',
                                'data-type' => 'json',
                                'novalidate',
                                'autocomplete' => 'off'
                                )) }}
                                <div style="">
                                    <div class="row">
                                        <p id="send-success" style="padding: 0 15px;"></p>
                                        <div class="col-xs-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" style="text-align: center;" placeholder="Nhập tài khoản của bạn">
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <button class="btn btn-default db" type="submit"> Gửi</button>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{Asset('assets/frontend/img/logo.png')}}">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::to('/tin-tuc') }}">Tin tức</a></li>
                    <li class="active"><a href="http://forum.gvc.vn/">Diễn đàn</a></li>
                    <li><a href="#">Cửa hàng</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Hướng dẫn</a></li>
                    <li><a href="{{ URL::to('thong-ke') }}">Thống kê</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Quản lý</span>
            nhân vật
        </span>
    </h3>

    <div class='gvc-box' style="margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="col-xs-12">
                            <a href="#" class="character-account">
                                <img src="{{Asset("assets/frontend/skins/$character->Skin.png")}}" style="width: 100%; margin-top: 50px;">
                                <p style="color: #fff; text-align: center; margin-top: -70px;">{{ $character->CharacterName }}</p>
                                <p style="color: #9F2B33; text-align: center; margin-top: 0px;">@if($character->Active) Đã duyệt @else Chờ duyệt @endif</p>
                            </a>
                        </div>

                        <p style="color: #9F2B33; text-align: center; margin-top: 320px; font-size: 15px; font-family: RobotoBold;">Licenses</p>
                        <div class="row">
                            @if ($character->Car_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Car.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif

                            @if ($character->Motor_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Motorbike.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif

                            @if ($character->Truck_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Truck.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif

                            @if ($character->Helicopter_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Helicopter.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif

                            @if ($character->Plane_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Plane.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif

                            @if ($character->Weapon_License == 1)
                                <div class="col-xs-4">
                                    <img src="{{Asset("assets/frontend/img/Weapons.png")}}" style="width: 100%; margin-top: 15px;">
                                </div>
                            @endif


                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="menu-profile menu-profile-detail">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-left">
                                            <li><a href="">Thông tin</a></li>
                                            <li><a href="#">Kỹ năng/Trạng thái</a></li>
                                            <li><a href="#">Phương tiện</a></li>
                                            <li><a href="#">Hồ sơ vi phạm (OOC)</a></li>
                                            <li><a href="#">Nhà/Door/Biz</a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>

                        <h3 class="nk-decorated-h-2">
                            <span>
                                <span class="text-main-1">Thông tin</span>
                                sơ bộ
                            </span>
                        </h3>
                        <div class="row">
                            <div class="col-xs-2">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Cấp độ: {{ $character->Level }}</p>
                            </div>
                            <div class="col-xs-3">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Ngày tạo: {{ date('d/m/Y', strtotime($character->created_at)) }}</p>
                            </div>
                            <div class="col-xs-3">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Thời gian đã chơi: {{ $character->Connect_Time }} tiếng</p>
                            </div>
                            <div class="col-xs-4">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Điểm kinh nghiệm: 0</p>
                            </div>

                            <div class="col-xs-2">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Giới tính: {{ $character->Gender == 1 ? 'Nam' : 'Nữ' }}</p>
                            </div>
                            <div class="col-xs-3">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Ngày sinh: {{ $character->BirthDate }}</p>
                            </div>
                            <div class="col-xs-3">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Quê quán: {{ $cityArr[$character->City] }}</p>
                            </div>
                            <div class="col-xs-4">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Hôn nhân: Độc thân</p>
                            </div>

                            <div class="col-xs-2">
                                <p class="color-white" style="text-align: left; font-size: 12px;">SĐT: {{ $character->PhoneNumber }}</p>
                            </div>
                            <div class="col-xs-3">
                                <p class="color-white" style="text-align: left; font-size: 12px;">CMND: {{ $character->CMND }}</p>
                            </div>
                            <div class="col-xs-3">
                                <?php
                                    $vipArr = [
                                        -1 => 'Không',
                                         1 => 'Bronze Membership',
                                         2 => 'Silver Membership',
                                         3 => 'Golden Membership',
                                         4 => 'Platium Membership'
                                    ];
                                ?>
                                <p class="color-white" style="text-align: left; font-size: 12px;">V.I.P : {{ $vipArr[$character->VIP] }}</p>
                            </div>
                            <div class="col-xs-4">
                                <?php
                                $oocArr = [
                                    -1 => 'Không xác định',
                                    1 => 'Trial Administrator',
                                    2 => 'Junior Administrator',
                                    3 => 'General Administrator',
                                    4 => 'Senior Administrator',
                                    5 => 'Head Administrator',
                                    6 => 'Director Administrator',
                                    7 => 'Excutive Administrator',
                                ];
                                ?>
                                <p class="color-white" style="text-align: left; font-size: 12px;">OOC Rank: {{ $oocArr[$character->Admin] }}</p>
                            </div>

                            <div class="col-xs-2">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Tổ chức: {{ $character->Faction == -1 ? 'Không có' : $faction->Short_Name }}</p>
                            </div>
                            <div class="col-xs-3">
                                <?php $rank = 'Rank_'.$character->Rank; ?>
                                <p class="color-white" style="text-align: left; font-size: 12px;">Chức vụ: {{ $character->Faction == -1 || $character->Rank == -1  ? 'Không xác định' : $faction->$rank }}</p>
                            </div>
                            <div class="col-xs-3">
                                <?php $division = 'Division_'.$character->Division; ?>
                                <p class="color-white" style="text-align: left; font-size: 12px;">Đơn vị: {{ $character->Faction == -1 || $character->Division == -1 ? 'Không xác định' : $faction->$division }}</p>
                            </div>
                            <div class="col-xs-4">
                                <p class="color-white" style="text-align: left; font-size: 12px;">Mã ngành: {{ $character->Faction == -1 || $character->FactionToken == -1 ? 'Không xác định' : $character->FactionToken }}</p>
                            </div>

                        </div>

                        <h3 class="nk-decorated-h-2">
                            <span>
                                <span class="text-main-1">Thống kê</span>
                                nhân vật
                            </span>
                        </h3>

                        <div class="row">
                            <div class="col-xs-3">
                                <p style="color: #3366CC; font-size: 15px; margin-bottom: 0px;">Trucker</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px;">{{ number_format($character->Trucker_Money_Total, 0, '.', '.')  }} $</p>

                                <p style="color: #990099; font-size: 15px; margin-bottom: 0px;">Farmer</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px;">{{ number_format($character->Farmer_Money_Total, 0, '.', '.')  }} $</p>

                                <p style="color: #FF9900; font-size: 15px; margin-bottom: 0px;">Miner</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px;">{{ number_format($character->Miner_Money_Total, 0, '.', '.')  }} $</p>
                            </div>
                            <div class="col-xs-6">
                                <div id="donutchart" style="width: 100%; height: 230px; margin-bottom: 10px;"></div>
                            </div>
                            <div class="col-xs-3">
                                <p style="color: #109618; font-size: 15px; margin-bottom: 0px; text-align: right;">Lumberjack</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px; text-align: right;">{{ number_format($character->Lumberjack_Money_Total, 0, '.', '.')  }} $</p>

                                <p style="color: #DC3912; font-size: 15px; margin-bottom: 0px; text-align: right;">Mechanic</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px; text-align: right;">{{ number_format($character->Mechanic_Money_Total, 0, '.', '.')  }} $</p>

                                <p style="color: #0099C6; font-size: 15px; margin-bottom: 0px; text-align: right;">Other</p>
                                <p class="" style="color: #fff; font-size: 15px; margin-bottom: 30px; text-align: right;">{{ number_format($character->Other_Money_Total, 0, '.', '.')  }} $</p>
                            </div>
                            <div class="col-xs-12">
                                <p class="" style="color: #fff; font-size: 15px;">
                                    Tổng số tiền kiếm được: {{ number_format($character->Other_Money_Total + $character->Mechanic_Money_Total + $character->Lumberjack_Money_Total + $character->Miner_Money_Total + $character->Farmer_Money_Total + $character->Trucker_Money_Total, 0, '.', '.')  }} $    -  Đã sử dụng: {{ number_format($character->Money_Spend_Total, 0, '.', '.')  }} $
                                </p>
                            </div>
                        </div>


                        <h3 class="nk-decorated-h-2">
                            <span>
                                <span class="text-main-1">Tiểu sử</span>
                                Nhân vật
                            </span>
                        </h3>
                        <div class="row">
                            <div class="col-xs-12">
                                {{
                                    Form::open(array(
                                        'url' => URL::to('/tai-khoan/quan-ly-nhan-vat/chi-tiet/'.$character->ID),
                                        'class' => 'form-horizontal',
                                        'id' => 'form-user-register',
                                        'method' => 'post',
                                        'data-remote' => 'true',
                                        'data-type' => 'json',
                                        'novalidate'
                                    ))
                                }}
                                <div class="">
                                    <p id="login-error"></p>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <textarea type="text" name="character_introdue" class="form-control"  rows="5">{{ $character->character_introdue_utf8 }}</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-default" type="submit" style="margin-left: 42%; margin-top: 20px;">Cập nhật</button>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        (function($) {
            var $document = $(document);

            /**
             * login (normal)
             */
            $document.on({
                'ajax:beforeSend': function() {
                    $.utils.clearFieldError('form-user-register');
                    $(this).find('.btn').attr('disabled', 'disabled');
                    $('#login-error').text('');
                    $('.alert').css('display', 'none');
                },
                'ajax:success': function(e, data) {
                    console.log(data);
                    if (data.status) {
                        if (typeof data.redirect != '') {
                            window.location.href = data.redirect;
                        } else {
                            window.location.reload();
                        }

                    } else {
                        if (data.code == 'invalid_data') {
                            for (var field in data.messages) {
                                $.utils.showFieldError('form-user-register', field, data.messages[field][0], 1);

                                //$('#login-error').text(data.messages[field][0]);
                                //break;
                            }
                            $.utils.autoFocus('form-user-register', '.input-error');
                        }
                        else {
                            $('#login-error').text(data.message);
                            $('.alert').css('display', 'block');
                        }

                    }
                },
                'ajax:complete': function() {
                    $(this).find('.btn').removeAttr('disabled');
                }

            }, '#form-user-register');

        })(jQuery);

        $(document).ready(function(){
            $('body').bind("cut copy paste",function(e) {
                e.preventDefault();
            });
        });

        //document.addEventListener('contextmenu', event => event.preventDefault());

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Money'],
                ['Trucker',     <?php echo $character->Trucker_Money_Total ?>],
                ['Mechanic',       <?php echo $character->Mechanic_Money_Total ?>],
                ['Miner',   <?php echo $character->Miner_Money_Total ?>],
                ['Lumberjack',  <?php echo $character->Lumberjack_Money_Total ?>],
                ['Farmer',     <?php echo $character->Farmer_Money_Total ?>],
                ['Other',     <?php echo $character->Other_Money_Total ?>]
            ]);

            var options = {
                pieHole: 0.4,
                backgroundColor: 'transparent',
                legend: 'none',
                pieSliceText: 'label',
                chartArea: {
                    left:10,top:10,width:'100%',height:'80%'
                },
                tooltip: {
                    ignoreBounds: true
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }



    </script>
@stop
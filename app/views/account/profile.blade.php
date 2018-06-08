@section('content')
    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url({{Asset('assets/images/banner-bg-1.png')}})"></div>

        <div class="youplay-user-navigation">
            <div class="container">
                <ul>
                    <li class="active"><a href="user-profile.html">Thông tin tài khoản</a></li>
                    <!--<li><a href="user-messages.html">Messages <span class="badge">6</span></a></li>-->
                </ul>
            </div>
        </div>

        <div class="info">
            <div>
                <div class="container youplay-user">
                    <a href="../assets/avatar/{{ $currentAccount->Model }}.png" class="angled-img image-popup">
                        <div class="img">
                            <img src="../assets/avatar/{{ $currentAccount->Model }}.png" alt="">
                        </div>
                        <i class="fa fa-search-plus icon"></i>
                    </a>
                    
                    <div class="user-data">
                        <h2>{{ $currentAccount->UserName }}</h2>
                        <div class="location"><i class="fa fa-map-marker"></i> VietNam</div>
                        <div class="activity">
                            <div>
                                <div class="num">{{ $currentAccount->Warnings }}</div>
                                <div class="title">Cảnh cáo</div>
                            </div>
                            <div>
                                <div class="num">{{ $currentAccount->Arrested }}</div>
                                <div class="title">Số lần bị bắt</div>
                            </div>
                            <div>
                                <div class="num">{{ $currentAccount->Crimes }}</div>
                                <div class="title">Số lần bị truy nã</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->

    <div class="container youplay-content">
        <div class="row">
            <div class="col-md-9">
                <h3 class="mt-0 mb-20">{{ $currentAccount->UserName }}</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 200px;">
                                    <p>Loại tài khoản</p>
                                </td>
                                <td>
                                    <p><span>
                                        @if ($currentAccount->AdminLevel == 0)
                                            Member
                                        @elseif ($currentAccount->AdminLevel == 1)
                                            Trial Administrator
                                        @elseif ($currentAccount->AdminLevel == 2)
                                            Junior Administrator
                                        @elseif ($currentAccount->AdminLevel == 3)
                                            General Administrator
                                        @elseif ($currentAccount->AdminLevel == 4)
                                            Senior Administrator
                                        @elseif ($currentAccount->AdminLevel == 1337)
                                            Head Administrator
                                        @elseif ($currentAccount->AdminLevel == 1338)
                                            Director Administrator
                                        @elseif ($currentAccount->AdminLevel == 99999)
                                            Executive Administrator
                                        @endif
                                    </span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 200px;">
                                    <p>ID Tài khoản</p>
                                </td>
                                <td>
                                    <p><span>{{ $currentAccount->id }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Giới tính</p>
                                </td>
                                <td>
                                    <p><span>{{ $currentAccount->Sex == 1 ? 'Nam' : 'Nữ' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 200px;">
                                    <p>Ngày sinh</p>
                                </td>
                                <td>
                                    <p><span>{{ $currentAccount->BirthDate != 'Khong Xac Dinh' ? date('d-m-Y', strtotime($currentAccount->BirthDate)) : 'Chưa cập nhật' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 200px;">
                                    <p>Nơi sinh</p>
                                </td>
                                <td>
                                    <p><span>
                                        @if ($currentAccount->CityZen == 1)
                                            Los Santos
                                        @elseif ($currentAccount->CityZen == 2)
                                            San Fierro
                                        @elseif ($currentAccount->CityZen == 3)
                                            Las Venturas 
                                        @endif
                                    </span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>CMND</p>
                                </td>
                                <td>
                                    <p><span>{{ $currentAccount->CMND }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Số điện thoại</p>
                                </td>
                                <td>
                                    <p><span>{{ $currentAccount->PhoneNumber }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Tiền người chơi</p>
                                </td>
                                <td>
                                    <p><span class="money-format">{{ $currentAccount->Money }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Tiền trong ngân hàng</p>
                                </td>
                                <td>
                                    <p><span class="money-format">{{ $currentAccount->Bank }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <div class="side-block">
                        <h4 class="block-title">Vị trí</h4>
                         <div class="block-content pt-5">
                            <div class="responsive-embed responsive-embed-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
                                width="600" height="450"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('content')
    <!--section welcome-->
    <div class="section" style="margin-top: 20px;">
        <div class="container-fluid px-0">
            <div class="row text-center text-lg-left">
                <div class="col-lg-12">
                    <div class="title-wrap text-center text-lg-left">
                        <h2 class="h2"> Lab được ủy quyền của Jensen Dental</h2>
                        <div class="h-decor"></div>
                    </div>
                    <div id="map" style="width: 100%; height: 600px;"></div>

                    <script type="text/javascript">
                        var locations = [
                            ['Công ty thiết bị nha khoa Phúc Anh', 11.0525274, 108.1768363, 7],
                            ['Công ty thiết bị nha khoa Phúc Anh', 16.0525274, 108.1768363, 6],
                            ['Công ty thiết bị nha khoa Phúc Anh', 12.2597701,109.1064146, 5],
                            ['Công ty thiết bị nha khoa Vĩnh An', 10.7553411,106.4150288, 4],
                            ['Công ty thiết bị nha khoa Toàn Tâm', 19.8088602,105.7210143, 3],
                            ['Công ty thiết bị nha khoa Anh Việt', 21.0228161,105.8019441, 2],
                            ['Công ty thiết bị nha khoa An Thịnh', 21.5868735, 104.9365364, 1]
                        ];

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 5.7,
                            center: new google.maps.LatLng(16.0525274,108.1768363),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i;

                        for (i = 0; i < locations.length; i++) {
                            var image = 'https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-32.png';
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map,
                                icon: image
                            });

                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infowindow.setContent(locations[i][0]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!--section services-->
    <div class="section" style="margin-top: 30px;">
        <div class="container-fluid px-0">
            <div class="row no-gutters services-box-wrap">
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <div class="service-box-caption text-center">
                            <div class="service-box-icon-bg"><i class="icon-icon-whitening"></i></div>
                            <h3 class="service-box-title">Một lab ủy quyền là gì</h3>
                            <p style="text-align: justify">Phòng thí nghiệm Jensen được ủy quyền là phòng thí nghiệm nha khoa sử dụng Jensen Solid Zirconia xác thực để chế tạo các phục hồi răng chắc chắn zirconia. Jensen Solid Zirconia là một trong những thương hiệu được quy định nhất về phục hồi zirconia toàn đường viền, một tình trạng nợ của vô số các chuyên gia nha khoa và phòng thí nghiệm đã áp dụng vật liệu vào nơi làm việc của họ. Nỗ lực to lớn được đưa ra bởi danh sách các phòng thí nghiệm được ủy quyền liên tục phát triển nhằm đảm bảo rằng các nha sĩ có thể tiếp cận với Jensen Solid Zirconia trên toàn cầu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <img src="{{Asset('assets/frontend/images/Day-in-the-life-of-a-Dental-Lab-Tech-Interview-with-a-Former-Ameritech-Student-1024x535.png')}}">
                    </div>
                </div>
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <div class="service-box-caption text-center">
                            <h1 class="h1" style="text-transform: uppercase">Xây dựng</h1>
                            <h3 class="service-box-title" style="text-transform: uppercase">lab của bạn với</h3>
                            <div class="service-box-icon">
                                <img src="{{Asset('assets/frontend/images/logo.png')}}" style="max-width: 260px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <img src="{{Asset('assets/frontend/images/28161547_1650933194955413_5137496159698730826_o.png')}}">
                    </div>
                </div>
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <div class="service-box-caption text-center">
                            <div class="service-box-icon-bg"><i class="icon-icon-implant"></i></div>
                            <h3 class="service-box-title">Trở thành lab ủy quyền để làm gì?</h3>
                            <p style="text-align: justify">Có nhiều cách để kết hợp việc phục hồi Jensen Solid Zirconia vào phòng thí nghiệm của bạn. Phòng thí nghiệm Jensen được ủy quyền sẽ được liệt kê trong các quảng cáo tạp chí thương mại quốc gia có thương hiệu và các bưu phẩm hàng quý. Cũng được cung cấp là một loạt các tài liệu tiếp thị, bao gồm cả nha sĩ Jensen tùy chỉnh và tài liệu quảng cáo thông tin bệnh nhân và đề can hộp trường hợp Jensen đích thực.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-4 order-1">
                    <div class="service-box service-box-greybg service-box--hiddenbtn">
                        <img src="{{Asset('assets/frontend/images/101272-9236202.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section services-->

    <div class="section mt-5">
        <div class="container-fluid px-0">
            <div class="banner-call">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-lg-1 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right">

                    </div>
                    <div class="col-sm-6 col-lg-4 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-left">
                        <div style="height: 240px; width: 100%; background-color: rgba(255,255,255,0.7); padding: 10px 15px; border-radius: 5px; border: 1px #e0e4ee  solid;">
                            <h5 class="h5">Làm thế nào để trở thành một lab ủy quyền của Jensen?</h5>
                            <p>Liên hệ trực tiếp với đại lý độc quyền của Jensen tại Việt Nam là Vật Liệu Lab - IDS để mua sản phẩm Zirconia Jensen và được công nhận là một Lab trong hệ thống Jensen tại Việt Nam.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right">

                    </div>
                    <div class="col-sm-6 col-lg-4 d-flex align-items-center order-1 order-sm-2">
                        <div style="height: 240px; width: 100%; background-color: rgba(255,255,255,0.7); padding: 10px 15px; border-radius: 5px; border: 1px #e0e4ee  solid;">
                            <h5 class="h5">Trở thành lab ủy quyền của Jensen được hỗ trợ những gì?</h5>
                            <p>Khi trở thành một trong hệ thống của Jensen, Lab sẽ được hỗ trợ kỹ thuật, tài liệu. Hình ảnh quảng cáo và cập nhật trong hệ thống Jensen. Thẻ bảo hành chính hãng của Jensen...</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12 d-flex align-items-center order-1 order-sm-2">
                        <p style="text-align: center; margin: 20px 0; width: 100%; text-decoration: underline;"><a href="{{ URL::to('/') }}">Liên hệ ngay với chúng tôi để trở thành Lab ủy quyền của Jensen!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .banner-call {
            background-attachment: fixed !important;
            background: url({{Asset('assets/frontend/images/banner-callus.jpg')}}) no-repeat center top;
            background-attachment: scroll;
            background-size: auto auto;
            height: 360px;
            padding-top: 30px;
        }
    </style>
    <!--section call us-->
@stop


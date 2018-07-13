@section('content')
    <!--section welcome-->
    <div class="section" style="margin-top: 5px;">
        <div class="container">
            <div class="row text-center text-lg-left">
                <div class="col-lg-12">
                    <div class="title-wrap text-center text-lg-left">
                        <h2 class="h2"> Sản phẩm Jensen</h2>
                        <div class="h-decor"></div>
                    </div>
                </div>
                <div class="col-lg-12 zoom">
                    <a href="{{ URL::to('/san-pham/1/ten-san-pham.html') }}"><img src="{{Asset('assets/frontend/images/catalogue-market-1.png')}}" style="width: 100%; margin-top: 20px;"></a>
                </div>
                <div class="col-lg-3 zoom">
                    <a href="{{ URL::to('/san-pham/1/ten-san-pham.html') }}"><img src="{{Asset('assets/frontend/images/insync_ZR-layering-jars.gif')}}" style="width: 100%; margin-top: 20px; max-height: 240px;"></a>
                </div>
                <div class="col-lg-3 zoom">
                    <a href="{{ URL::to('/san-pham/1/ten-san-pham.html') }}"><img src="{{Asset('assets/frontend/images/stain bóng jensen- vật liệu lab ids.png')}}" style="width: 100%; margin-top: 20px; max-height: 240px;"></a>
                </div>
                <div class="col-lg-6 zoom">
                    <a href="{{ URL::to('/san-pham/1/ten-san-pham.html') }}"><img src="{{Asset('assets/frontend/images/Untitled-2.png')}}" style="width: 100%; margin-top: 20px; max-height: 240px;"></a>
                </div>
            </div>
        </div>
    </div>

    <!--section-->
    <div class="section" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="container">
            
        </div>
    </div>
    <!--//section-->
    <style>
        .zoom {
            transition: transform .2s; /* Animation */
        }

        .zoom:hover {
            transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>

    <!--section call us-->
@stop


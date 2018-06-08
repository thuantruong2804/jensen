@section('content')
    <!-- Swiper -->
    <div class="slider-special-new">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @if (sizeof($specialNews) > 0)
                    @foreach ($specialNews as $new)
                        <?php $imageUrl = Media::find($new->media_id); ?>
                        <div class="swiper-slide" style="background-image:url({{ $imageUrl->path.$imageUrl->original }})">
                            <div style="text-align: center">
                                <div class="title" data-swiper-parallax="-100" style="margin-top: 160px; color: #fff !important; font-size: 28px !important; text-transform: none; margin-bottom: 10px; -webkit-text-stroke: 1px black;">{{{ $new->title }}}</div>
                                <a class="btn btn-default" style="background-color: rgba(150, 62, 61, 0.8); color: #fff; border: none;" href="{{ URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html') }}">Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @if (sizeof($specialNews) > 0)
                    @foreach ($specialNews as $new)
                        <?php $imageUrl = Media::find($new->media_id); ?>
                        <div class="swiper-slide" style="background-image:url({{ $imageUrl->path.$imageUrl->medium }})">
                            <div class="slide-text">
                                <div class="title" data-swiper-parallax="-100">{{{ $new->title }}}</div>
                                <div class="text" data-swiper-parallax="-300">
                                    <p>{{ substr(strip_tags($new->content), 0, 150) }}...</p>
                                </div>
                                <a class="btn btn-default" href="{{ URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html') }}">CHI TIẾT</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="download">
        <div class="row">
            <div class="col-xs-4">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                        <img src="{{Asset('assets/frontend/img/icon-download-1.png')}}" alt="">
                    </div>
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="http://files.sa-mp.com/sa-mp-0.3.7-install.exe">Tải sa-mp</a></h3>
                        <h4 class="nk-feature-title text-main-1"><a href="http://files.sa-mp.com/sa-mp-0.3.7-install.exe">Phiên bản 0.3.7 R2</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="nk-feature-1" style="margin: 0 auto !important;">
                    <div class="nk-feature-icon">
                        <img src="{{Asset('assets/frontend/img/icon-launcher.png')}}" alt="">
                    </div>
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="http://gvc.vn/Launcher/GvC%20Launcher.exe">GvC launcher</a></h3>
                        <h4 class="nk-feature-title text-main-1"><a href="http://gvc.vn/Launcher/GvC%20Launcher.exe">Phiên bản: 2.1.5.8</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="nk-feature-1" style="float: right;">
                    <div class="nk-feature-icon">
                        <img src="{{Asset('assets/frontend/img/icon-download-2.png')}}" alt="">
                    </div>
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="https://www.fshare.vn/file/TRZF7158YT">Tải GTA SA</a></h3>
                        <h4 class="nk-feature-title text-main-1"><a href="https://www.fshare.vn/file/TRZF7158YT">Phiên bản 1.0 US</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Tin tức</span>
            Mới
        </span>
    </h3>
    <!-- Swiper -->
    <div class="slider-latests-new">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @if (sizeof($latestNews) > 0)
                    @foreach ($latestNews as $new)
                        <?php $imageUrl = Media::find($new->media_id); ?>
                        <div class="swiper-slide" style="background-image:url({{ $imageUrl->path.$imageUrl->original }})">
                            <div class="slide-text">
                                <div class="title" data-swiper-parallax="-100">{{{ $new->title }}}</div>
                                <div class="text" data-swiper-parallax="-300">
                                    <p>{{ substr(strip_tags($new->content), 0, 450) }}...</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6" style="margin-top: 10px;">
                                        <a class=""  style="background-color: transparent !important; color: #9F2B33; border: none;" href="{{ URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html') }}">CHI TIẾT</a>
                                    </div>
                                    <div class="col-xs-6" style="margin-top: 10px;">
                                        <?php $accountNews = Account::find($new->user_id); ?>
                                        <p style="font-size: 12px; text-align: right;">Người đăng: {{ $accountNews->UserName }} | Ngày đăng: {{ date('d/m/Y', strtotime($new->created_at)) }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @if (sizeof($latestNews) > 0)
                    @foreach ($latestNews as $new)
                        <?php $imageUrl = Media::find($new->media_id); ?>
                        <div class="swiper-slide" style="background-image:url({{ $imageUrl->path.$imageUrl->medium }})">
                            <p class="san-news">San news</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h3 class="nk-decorated-h-2">
                <span>
                    <span class="text-main-1">Cộng đồng</span>
                    GVC
                </span>
            </h3>
            <div class="slider-gallery">
                <div class="inner-slider-gallery">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/1.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/2.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/3.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/4.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/5.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/6.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/7.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/8.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/9.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/10.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/11.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/12.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/13.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/14.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/15.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/16.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/17.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/18.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/19.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/20.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/21.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/22.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/23.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/24.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/25.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/26.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/27.jpg')}}">
                    <img src="{{Asset('assets/frontend/img/gallery/28.jpg')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h3 style="color: #fff; text-align: center; text-transform: uppercase; font-family: RobotoBold; text-shadow: 1px 1px #000; margin-top: 20px;" >
                <span style="color: #9F2B33;">Tham gia cộng đồng gvc </span>trên mạng xã hội
                <p style="margin-top: 20px; font-size: 20px; margin-bottom: 0px;">
                    <a href="https://www.youtube.com/channel/UCIRar8eJyqxsiat475KHVow"><i class="fa fa-youtube" style="font-size: 25px; color: #fff; margin-right: 10px;"></i></a>
                    <a href="#"><i class="fa fa-github-alt" style="font-size: 25px; color: #fff; margin-right: 10px;"></i></a>
                    <a href="https://www.facebook.com/GvC.ProjectSA/"><i class="fa fa-facebook" style="font-size: 25px; color: #fff; margin-right: 5px;"></i></a>
                </p>
            </h3>
        </div>
    </div>
@stop


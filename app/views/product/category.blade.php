@section('content')
    <div class="tp-banner-container rs-youplay rs-fullscreen">
        <div class="tp-banner">
            <ul>
                @if (sizeof($mostProducts) > 0) <?php $countProduct = 0; ?>
                    @foreach ($mostProducts as $product) <?php $countProduct++; ?>
                        <?php if ($countProduct == 4) break; ?>
                        <?php $imageUrl = Media::find($product->media_id); ?>
                        <li data-thumb="{{ $imageUrl->path.$imageUrl->medium }}" data-saveperformance="on" data-transition="random-static" data-slotamount="7" data-masterspeed="700">
                            <img src="{{ $imageUrl->path.$imageUrl->thumb }}" alt="" data-lazyload="{{ $imageUrl->path.$imageUrl->original }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <div class="tp-caption customin customout" data-x="left" data-hoffset="60" data-y="center" data-voffset="-60" data-customin="x:200;scaleX:0.5;scaleY:0.5;" data-customout="x:0;scaleX:1;scaleY:1;" data-start="500" data-speed="700" data-easing="Sine.easeInOut"
                                data-endspeed="600" data-endeasing="Linear.easeNone">
                                <h2 class="h1">{{ $product->name }}: <br><span class="money-format">{{ $product->sale_price }}</span></h2>
                            </div>
                            <div class="tp-caption customin customout" data-x="left" data-hoffset="60" data-y="center" data-voffset="60" data-customin="x:200;scaleX:0.5;scaleY:0.5;" data-customout="x:0;scaleX:1;scaleY:1;" data-start="1000" data-speed="700" data-easing="Sine.easeInOut"
                                data-endspeed="600" data-endeasing="Linear.easeNone">
                                <a class="btn btn-lg" href="{{ URL::to('/san-pham/'.$product->pro_id.'/'.$product->slug.'.html') }}">Xem sản phẩm</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>

    <div class="container youplay-store store-grid">
        <div class="col-md-9 isotope">

            <div class="isotope-list row vertical-gutter">
                @if (sizeof($categoryProducts) > 0)
                    @foreach ($categoryProducts as $product)
                        <?php $imageUrl = Media::find($product->media_id); ?>
                        <div class="item col-lg-4 col-md-6 col-xs-12" data-filters="popular">
                            <a href="{{ URL::to('/san-pham/'.$product->pro_id.'/'.$product->slug.'.html') }}" class="angled-img">
                                <div class="img img-offset">
                                    <img src="{{ $imageUrl->path.$imageUrl->thumb }}" alt="">
                                </div>
                                <div class="bottom-info">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                @if (rand(1,10) % 2 == 0)
                                                <i class="fa fa-star-half-o"></i>
                                                @else
                                                <i class="fa fa-star"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="price">
                                                <span class="money-format">{{ $product->sale_price }} </span>
                                                <sup><del class="money-format">{{ $product->price }}</del></sup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $categoryProducts->links() }}
        </div>

        <div class="col-md-3">
            <div class="side-block ">
                <p>Tìm sản phẩm:</p>
                {{ Form::open(array(
                    'url' => URL::to('/san-pham'),
                    'class' => '',
                    'method' => 'get',
                )) }}
                    <div class="youplay-input">
                        <input type="text" name="slug" placeholder="Nhập tên sản phẩm" >
                    </div>
                {{ Form::close() }}
            </div>

            <div class="side-block ">
                <h4 class="block-title">Danh mục</h4>
                <ul class="block-content">
                    <li><a href="{{ URL::to('/san-pham/danh-muc/1/phuong-tien.html') }}">Phương tiện</a></li>
                    <li><a href="{{ URL::to('/san-pham/danh-muc/2/do-choi.html') }}">Đồ chơi</a></li>
                </ul>
            </div>
    
            <div class="side-block ">
                <h4 class="block-title">Sản phẩm cùng loại</h4>
                <div class="block-content p-0">
                    @if (sizeof($mostProducts) > 0)
                        @foreach ($mostProducts as $product)
                            <?php $imageUrl = Media::find($product->media_id); ?>
                            <div class="row youplay-side-news">
                                <div class="col-xs-3 col-md-4">
                                    <a href="{{ URL::to('/san-pham/'.$product->pro_id.'/'.$product->slug.'.html') }}" class="angled-img">
                                        <div class="img">
                                            <img src="{{ $imageUrl->path.$imageUrl->thumb }}" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-9 col-md-8">
                                    <h4 class="ellipsis"><a href="{{ URL::to('/san-pham/'.$product->pro_id.'/'.$product->slug.'.html') }}" title="Bloodborne">{{ $product->name }}</a></h4>
                                    <span class="price money-format">{{ $product->sale_price }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
              </div>
            </div>
        </div>
    </div>
@stop
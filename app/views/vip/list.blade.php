@section('content')
    <div class="tp-banner-container rs-youplay rs-fullscreen">
        <div class="image" style="background-image: url({{Asset('assets/images/banner-bg-1.png')}}); width: 100%; height: 500px;"></div>
    </div>

    <div class="container youplay-store store-grid">
        <div class="col-md-9 isotope">

            <div class="isotope-list row vertical-gutter">
                @if (sizeof($listvip) > 0)
                    @foreach ($listvip as $vip)
                        <div class="item col-lg-4 col-md-6 col-xs-12" data-filters="popular">
                            <?php
                                $imageUrl = Asset('assets/images/vip/bronzevip-1.png');
                                if ($vip->vip_id == 2) {
                                    $imageUrl = Asset('assets/images/vip/bronzevip-2.png');
                                } elseif ($vip->vip_id == 3) {
                                    $imageUrl = Asset('assets/images/vip/bronzevip-3.png');
                                } elseif ($vip->vip_id == 4) {
                                    $imageUrl = Asset('assets/images/vip/silvervip-1.png');
                                } elseif ($vip->vip_id == 5) {
                                    $imageUrl = Asset('assets/images/vip/silvervip-2.png');
                                } elseif ($vip->vip_id == 6) {
                                    $imageUrl = Asset('assets/images/vip/silvervip-3.png');
                                } elseif ($vip->vip_id == 7) {
                                    $imageUrl = Asset('assets/images/vip/goldvip-1.png');
                                } elseif ($vip->vip_id == 8) {
                                    $imageUrl = Asset('assets/images/vip/goldvip-2.png');
                                } elseif ($vip->vip_id == 9) {
                                    $imageUrl = Asset('assets/images/vip/goldvip-3.png');
                                } elseif ($vip->vip_id == 10) {
                                    $imageUrl = Asset('assets/images/vip/platiumvip-1.png');
                                } elseif ($vip->vip_id == 11) {
                                    $imageUrl = Asset('assets/images/vip/platiumvip-2.png');
                                } elseif ($vip->vip_id == 12) {
                                    $imageUrl = Asset('assets/images/vip/platiumvip-3.png');
                                } 
                            ?>
                            <?php $currentAccount = BaseController::getAccountInfo(); ?>
                            @if (!$currentAccount)
                                <a href="{{ URL::to('/dang-nhap') }}" 
                                    class="angled-img" title="Click để mua ngay" id="">
                            @elseif ((int)$currentAccount->Coin < (int)$vip->sale_price)
                                <a href="{{ URL::to('/nap-the') }}" 
                                    class="angled-img" title="Click để mua ngay" id="">
                            @else
                                <a data-href="{{ URL::to('/vip/mua-ngay/'.$vip->vip_id) }}" class="angled-img buy-vip" title="Bấm để mua ngay"
                                data-method="post" 
                                data-type="json"
                                style="cursor: pointer";>
                            @endif
                                <div class="img img-offset">
                                    <img src="{{ $imageUrl }}" alt="">
                                </div>
                                <div class="bottom-info">
                                    <h4>{{ $vip->name }}</h4>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="price">
                                                <span class="money-format">{{ $vip->sale_price }} </span>
                                                <sup><del class="money-format">{{ $vip->price }}</del></sup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="side-block ">
                <p>Tìm sản phẩm:</p>
                <form action="search.html">
                    <div class="youplay-input">
                        <input type="text" name="search" placeholder="Nhập tên sản phẩm">
                    </div>
                </form>
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

@section('scripts')
    <script>
        $('.content-wrap').on('click', '.buy-vip', function() {
            <?php $currentAccount = BaseController::getAccountInfo(); ?>
            <?php if (!empty($currentAccount) && $currentAccount->Online == 1) : ?>
                alert('Vui lòng thoát game trước khi mua VIP');
            <?php else : ?>
            
            if (confirm("Xác nhận mua VIP. Bấm Ok để đồng ý - Cancel để hủy mua.") == true) {
                var that = this;
                $.ajax({
                    url: $(that).data('href'),
                    type: $(that).data('method'),
                    dataType: 'json',
                    beforeSend: function(xhr, settings) {
                        $('.overlay').css('display', 'block');
                    },
                    success: function(data, status, xhr) {
                        if ($(that).hasClass('buy-vip')) {
                            if (data.status) {       
                                    window.location.href = data.redirect;
                                }
                            }
                    },
                    complete: function(xhr, status) {},
                    error: function (xhr, ajaxOptions, thrownError) {
                        $("#error-modal").modal('show');
                    }
                });
            } else {
                
            }
            
            <?php endif; ?>
         });       
     </script> 
@stop
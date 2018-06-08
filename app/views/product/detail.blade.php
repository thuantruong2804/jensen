@section('content')
    <!-- Banner -->
    <div class="youplay-banner youplay-banner-parallax banner-top">
        <?php $imageUrl = Media::find($product->media_id); ?>
        <div class="image" style="background-image: url({{ $imageUrl->path.$imageUrl->original }})"></div>

        <div class="info">
            <div>
                <div class="container">
                    <h2>{{ $product->name }}</h2>
                    <br>
                    <?php $currentAccount = BaseController::getAccountInfo(); ?>
                    @if (!$currentAccount)
                        <a href="{{ URL::to('/dang-nhap') }}" 
                            class="btn btn-lg" title="Click để mua ngay" id=""
                            <span class="money-format">{{ $product->sale_price }}</span>
                        </a>
                    @elseif ((int)$currentAccount->Coin < (int)$product->sale_price)
                        <a href="{{ URL::to('/nap-the') }}" 
                            class="btn btn-lg" title="Click để mua ngay" id=""
                            <span class="money-format">{{ $product->sale_price }}</span>
                        </a>
                    @else
                        <span data-href="{{ URL::to('/san-pham/mua-ngay/'.$product->pro_id) }}" 
                            class="btn btn-lg buy-product" title="Click để mua ngay" id=""
                            data-method="post" 
                            data-type="json" >
                            <span class="money-format">{{ $product->sale_price }}</span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->

    <!-- Images With Text -->
    <div class="youplay-carousel gallery-popup">
        <a class="angled-img" href="{{ $product->video }}">
            <div class="img">
                <img src="http://img.youtube.com/vi/{{ substr( $product->video, strlen($product->video) - 11, strlen($product->video)) }}/sddefault.jpg" alt="" style="height: 181.5px;">
            </div>
            <i class="fa fa-play icon"></i>
        </a>
      <?php $imagesList = explode(',', $product->media_id); ?>
        @foreach($imagesList as $image)
            <?php $imageUrl = Media::find($image); ?>
            <a class="angled-img" href="{{ $imageUrl->path.$imageUrl->original }}">
                <div class="img">
                    <img src="{{ $imageUrl->path.$imageUrl->thumb }}" alt="">
                </div>
                <i class="fa fa-search-plus icon"></i>
          </a>
        @endforeach
    </div>
    <!-- /Images With Text -->


    <div class="container youplay-store">
        <div class="col-md-9">
            <article>
                <h2 class="mt-0">Mô tả sản phẩm</h2>
                <div class="description">
                    {{ $product->description }}
                </div>
                <div class="btn-group social-list social-likes" data-counters="no">
                    <span class="btn btn-default facebook" title="Share link on Facebook"></span>
                    <span class="btn btn-default twitter" title="Share link on Twitter"></span>
                    <span class="btn btn-default plusone" title="Share link on Google+"></span>
                    <span class="btn btn-default pinterest" title="Share image on Pinterest" data-media=""></span>
                    <span class="btn btn-default vkontakte" title="Share link on VK"></span>
                </div>
            </article>
            
            <div class="reviews-block mb-0">
                <h2>Bình luận</h2>
                <div class="comments" style="margin-top: 5px;">
                    <div class="fb-comments" data-colorscheme="dark" data-href="{{ URL::to('/san-pham/'.$product->pro_id.'/'.$product->slug.'.html') }}" data-width="100%" data-numposts="10"></div>
                </div>
            </div>
            
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
                        <input type="text" name="slug" placeholder="Nhập tên sản phẩm">
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
                    @if (sizeof($categoryProducts) > 0)
                        @foreach ($categoryProducts as $product)
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
        $('.content-wrap').on('click', '.buy-product', function() {
            <?php $currentAccount = BaseController::getAccountInfo(); ?>
            <?php if (!empty($currentAccount) && $currentAccount->Online == 1) : ?>
                alert('Vui lòng thoát game trước khi mua sản phẩm');
            <?php else : ?>
            
            if (confirm("Xác nhận mua sản phẩm. Bấm Ok để đồng ý - Cancel để hủy mua.") == true) {
            
                var that = this;
                $.ajax({
                    url: $(that).data('href'),
                    type: $(that).data('method'),
                    dataType: 'json',
                    beforeSend: function(xhr, settings) {
                        $('.content-wrap .buy-product').attr('disabled', 'disabled');
                    },
                    success: function(data, status, xhr) {
                        if ($(that).hasClass('buy-product')) {
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

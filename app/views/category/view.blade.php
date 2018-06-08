@section('content')
    @if (Sentry::check())
    @endif
    <div id="slider_top_user" style="position: relative; width: 1000px; height: 370px; overflow: hidden;">
        @if (!BaseController::isLogin())
        <div class="btn-register-slider">
            <a href="{{URL::to('/user/register')}}" class="btn-success">đăng kí mua sỉ</a>
        </div>
        @endif
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div class="filter-slide"></div>
            <div class="loading-slide"></div>
        </div>
        <?php $sliders = Slide::where('is_deleted', '=', 0)->get(); ?>
        <div class="mnslides" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px; height: 370px;
            overflow: hidden;">
            <div>
                <a u=image href="{{ $sliders[0]->link }}"><img src="{{ $sliders[0]->media ? $sliders[0]->media->path.$sliders[0]->media->original : Asset('assets/images/default_image.png')}}" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                </div>
            </div>
            <div>
                <a u=image href="{{ $sliders[1]->link }}"><img src="{{ $sliders[1]->media ? $sliders[1]->media->path.$sliders[1]->media->original : Asset('assets/images/default_image.png')}}" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                </div>
            </div>
            <div>
                <a u=image href="{{ $sliders[2]->link }}"><img src="{{ $sliders[2]->media ? $sliders[2]->media->path.$sliders[2]->media->original : Asset('assets/images/default_image.png')}}" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                </div>
            </div>
            <div>
                <a u=image href="{{ $sliders[3]->link }}"><img src="{{ $sliders[3]->media ? $sliders[3]->media->path.$sliders[3]->media->original : Asset('assets/images/default_image.png')}}" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                </div>
            </div>
            <div>
                <a u=image href="{{ $sliders[4]->link }}"><img src="{{ $sliders[4]->media ? $sliders[4]->media->path.$sliders[4]->media->original : Asset('assets/images/default_image.png')}}" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                </div>
            </div>
        </div>
        <span u="arrowleft" class="arrowleft jssora05l" style="right: 35px;bottom: 0px;width: 30px;height: 30px;  "></span>
        <span u="arrowright" class="arrowright jssora05r" style="right: 0px;bottom: 0px;width: 30px;height: 30px;"></span>
    </div>
    <div class="category-product-page">
    	<div class="header-catalogue">
    		{{ $info_cate->name }}
    		<span style="float: right">Hiện có {{ $all_products }} sản phẩm</span>
    	</div>
        <div class="row">
            <?php  foreach ($products as $product) { ?>
                <div class="product-box-page col-sm-3" product_id="<?php echo $product->id; ?>">
                    <a href="{{ $product->media ? $product->media->path.$product->media->original : Asset('assets/images/default_image.png')}}" class="highslide" onclick="return hs.expand(this)">
                        <img src="{{ $product->media ? $product->media->path.$product->media->medium : Asset('assets/images/default_image.png')}}" />
                    </a>
                    <div class="highslide-caption">
                        <p class="boxname one-line">{{ $product->name }}</p>
                        <p class="boxxuatxu one-line">Xuất sứ : {{ $product->madein }}</p>
                        <p>Giá gốc :</span><span class="boxgiagoc money-format">{{ $product->price_original }}</p>
                        <p>Giá bán sỉ :</span><span class="boxgiabansi money-format">{{ $product->price_sale }}</p>
                        <p class="boxsize one-line">Size : {{ $product->size }}</p>
                    </div>
                    <?php $carts = Session::get('cart.items');  ?>
                    <?php $is_in_cart = 0; ?>
                    <?php if (!empty($carts)) { ?>
                        <?php foreach($carts as $key => $value) { ?>
                            <?php if ($value['id'] == $product->id) { $is_in_cart = 1;} ?>
                        <?php } ?>
                    <?php } ?>
                    @if ($is_in_cart == 1)
                       <a href="{{ URL::to('/cartcata/destroy/'.$product->id.'?page='.$cur_page) }}" class="chose_product"></a>
                    @else
                        <a href="{{URL::to('/user/cartcata/'.$product->id.'?page='.$cur_page)}}" class="select_product"></a>
                    @endif
                    <div class="product-info">
                        <p class="boxname one-line">{{ $product->name }}</p>
                        <p class="boxxuatxu one-line">Xuất sứ : {{ $product->madein }}</p>
                        <p>Giá gốc : </span><span class="boxgiagoc money-format">{{ $product->price_original }}</p>
                        <p>Giá bán sỉ : </span><span class="boxgiabansi money-format">{{ $product->price_sale }}</p>
                        <p class="boxsize one-line">Size : {{ $product->size }}</p>
                    </div>
                </div>
            <?php  } ?>
        </div>
        <nav>
              <ul class="pagination">
              	<?php
              		if($cur_page == 1) {
              	?>
              			<li><a href="javascript:void(0)" class="active"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
                <?php
              		} else {
              	    $pre_page = $cur_page - 1;
              	?>	
              			<li><a href="{{ URL::to('/catalogue/view/'.$cur_cate.'?page='.$pre_page) }}"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
				<?php		
              		}
              	?>
                
                <?php for($num_page = 1; $num_page <= $num_pages; $num_page ++) { ?>
                	@if ($num_page == $cur_page)
                		<li><a href="javascript:void(0)" class="active">{{ $num_page }}</a></li>
                	@else
                		<li><a href="{{ URL::to('/catalogue/view/'.$cur_cate.'?page='.$num_page) }}">{{ $num_page }}</a></li>
                	@endif
                <?php } ?>
                <?php
              		if($cur_page == $num_pages) {
              	?>
              			<li><a href="javascript:void(0)" class="active"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
                <?php
              		} else {
              	    $next_page = $cur_page + 1;
              	?>	
              			<li><a href="{{ URL::to('/catalogue/view/'.$cur_cate.'?page='.$next_page) }}"><span aria-hidden="true">&raquo;</span><span class="sr-only">Previous</span></a></li>
				<?php		
              		}
              	?>
              </ul>
        </nav>
    </div>
    <div class="cart-product-page">
        <?php $num_product_cart = Session::get('cart.items'); ?>
        <p>Giỏ hàng (<?php echo count($num_product_cart); ?>)</p>
        <?php if (count($num_product_cart) > 0) { ?>
        <a href="{{URL::to('/cart/view')}}">Thanh toán </a>
        <?php } else {?>
        <a href="javascript:void(0)">Chưa chọn </a>    
        <?php } ?>
    </div>
@stop


@section('scripts')
    {{ HTML::script('assets/javascripts/category-page.js') }}
@stop



@section('content')
    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1"></span>{{ $new->title }}
        </span>
    </h3>

    <div class="row">
        <div class="col-xs-8">
            <div class="new-detail">
                <?php $imageUrl = Media::find($new->media_id); ?>
                <img src="{{ $imageUrl->path.$imageUrl->original }}" style="margin-bottom: 20px;">
                {{ $new->content }}
            </div>
            <?php $accountNews = Account::find($new->user_id); ?>
            <h3 class="" style="border-top: 1px #ABA1A2 solid;"></h3>
            <p style="font-size: 13px; text-align: center; color: #fff;">Người đăng: {{ $accountNews->UserName }} | Ngày đăng: {{ date('d/m/Y', strtotime($new->created_at)) }} | Chuyên mục: San Network</p>
        </div>
        <div class="col-xs-4">
            @if (sizeof($latestNews) > 0)
                @foreach ($latestNews as $new)
                    <div>
                        <div class="product-item" style="margin-top: 0px; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px #ABA1A2 solid;">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <a href="{{ URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html') }}">
                                        <?php $imageUrl = Media::find($new->media_id); ?>
                                        <img class="media-object" src="{{ $imageUrl->path.$imageUrl->thumb }}" alt="..." style="width: 100px; height: 64px;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a class="title-new-detail" href="{{ URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html') }}">
                                        <h4 class="media-heading" style="text-transform: none; margin-top: 0px;">{{ $new->title }}</h4>
                                    </a>
                                    <p style="font-size: 13px; color: #fff;"> Ngày đăng: {{ date('d/m/Y', strtotime($new->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop
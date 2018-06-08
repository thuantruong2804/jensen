@section('title')
    Quản lý tin tức
@stop

@section('style')
@stop

@section('content')
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="widget-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <p class="page-title"><i class="fa fa-table"></i> 
                            <span> Danh sách tin tức</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="{{ URL::to('admin/new/create') }}" class="btn btn-pink pull-right btn-create"><i class="fa fa-plus"></i> Tạo tin tức</a>
                    </div>
                </div>
                <div class="search-box">
                    {{ Form::open(array(
                        'url' => URL::to('/admin/new'),
                        'class' => '',
                        'method' => 'get',
                    )) }}
                        <div class="content-form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Tiêu đề tin tức</label>
                                    <input type="text" name="title" class="form-control" value="{{{ isset($input['title']) ? $input['title'] : '' }}}" placeholder="Nhập tiêu đề tin tức để tìm kiếm"></input>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                
                <p class="count-records">Hiển thị từ <span>{{ sizeof($news) == 0 ? '0' : '1' }}</span> đến <span>{{ sizeof($news) }}</span> trong tổng số <span class="money-format">{{ $totalRecords }}</span> bản ghi.</p>
                <div class="table-responsive">
                    <table id="functions" class="table table-striped dataTable table-bordered" 
                            data-empty="@lang('form.table.empty')" 
                            data-show-entries="@lang('form.table.show_entries')" 
                            data-infofiltered="@lang('form.table.info_filtered')"
                            data-zerorecord="@lang('form.table.zero_record')"
                            data-lengthmenudisplay="@lang('form.table.length_menu.display')" 
                            data-lengthmenurecord="@lang('form.table.length_menu.record')" 
                            data-nosorttargets="[2,3]"
                            data-aaSorting="[1]"
                            data-defaultsortcolumn="[0]"
                            data-defaultsorttype="desc" />
                        <thead>
                            <tr>
                                <th class="fix-width-30 col-center">Mã</th>
                                <th class="fix-width-50 col-center">Ảnh</th>
                                <th>Tiêu đề</th>
                                <th class="fix-width-120">Ngày tạo</th>
                                <th class="fix-width-100 col-center">@lang('form.label.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <td style="text-align: center !important;">{{ $new->new_id }}</td>
                                    <td class="fix-width-50">
                                        <?php $imageUrl = Media::find($new->media_id); ?>
                                        <img src="{{ $imageUrl->path.$imageUrl->thumb }}" style="width: 60px; height: 40px;">
                                    </td>
                                    <td>{{{ $new->title }}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($new->created_at)) }}</td>
                                    <td>
                                        @if ($new->is_deleted != 1) 
                                        <a href="{{ URL::to('/admin/new/edit/'.$new->new_id) }}" class="btn btn-primary has-tooltip" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ URL::to('/admin/new/delete/'.$new->new_id) }}" 
                                            class="delete-new btn btn-danger has-tooltip" 
                                            title="Xóa"
                                            data-method="post" 
                                            data-type="json" 
                                            data-confirm="Bạn có chắc chắn muốn xóa tin này?"
                                            data-action1="<i class='fa fa-times'></i> Hủy"
                                            data-action2="<i class='fa fa-check'></i> Xóa">
                                            <i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if (!sizeof($news)) 
                                <tr><td colspan="7" style="font-style: italic;">Không tìm thấy dữ liệu</td></tr>
                            @endif
                            </tbody>
                    </table>
                </div>
                {{ $news->links() }}
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
@stop

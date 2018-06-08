<?php
    if (empty($type)) { // Edit form        
        $new = NULL;
    }
?>

<!-- Tab panes -->
<div class="" style="margin-top: 15px;">
    <div class="row" id="tab-vi">
    	<div class='form-group col-sm-12'>
	        <label for="title">Hình ảnh đại diện <span class="required"> *</span></label>
	        <div id='uploaded-files'>
	            <?php if (!empty($type)) :?>
	                @if (!empty($new->media_id))
	                    <?php  $media = Media::find($new->media_id); ?>
	                    <div class="item-upload">
                            <div class='item-image'>
                                <input type="hidden" name="file" value="{{ $media->id }}">
                                <a class="thumb thumbnail-admin" href="{{ $media->path.$media->original }}" title="{{ $media->caption }}" style="background: url('{{ $media->path.$media->thumb }}') no-repeat; background-size: cover; background-position: 70% 100%;"></a>
                                <div class='tools tools-bottom'>
                                    @if ($media->type != Config::get('config.media_type.file'))
                                    <a class="edit-caption-item" href="javascript:void(0)" id="item-image-{{ $media->id }}" data-id="{{ $media->id }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <input type='hidden' class='caption-value' value="{{ $media->caption }}" />
                                    @endif
                                    <a class="cancel-item-upload" href="javascript:void(0)" data-href="{{ URL::to('/media/delete/'.$media->id) }}">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                    <input type='hidden' class='caption-value' value=""/>
                                </div>
                            </div>
                            <span class="name-item-upload" title="{{ $media->name.'.'.$media->extension }}">{{ $media->name.'.'.$media->extension }}</span>
                        </div>
	                @endif
	            <?php endif; ?>
	        </div>
	        <a class='btn btn-primary btn-upload'
                data-format='image'
                data-confirm="@lang('form.confirm_delete')"
                data-action1="{{ "<i class='fa fa-times'></i> Hủy" }}" 
                data-action2="{{ "<i class='fa fa-check'></i> Xóa"  }}"
                ><i class='fa fa-upload'></i> Tải lên</a>
	    </div>
        <div class="form-group col-sm-12">
            <label for="title">Tiêu đề <span class="required"> *</span></label>
            {{ Form::text('title', !empty($new) ? $new->title : null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-sm-12">
            <label for="content">Nội dung <span class="required"> *</span></label>
            {{ Form::textarea('content', !empty($new) ? $new->content : null, array('class' => 'form-control ckeditor', 'id' => 'create-content-vi')) }}
        </div>
	    <div class="clear"></div>
    </div>
</div>

<div class="row direct-header">
    <div class="col col-sm-12">
        <button class="btn btn-primary" type="submit" style="margin: 15px 0;"> Lưu tin</button>
        <a href="{{ URL::to('/admin/new') }}" class="btn btn-default"> Hủy bỏ</a>
    </div>
</div>

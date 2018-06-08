<form id="upload" method="post" action="{{ URL::to('/upload') }}" enctype="multipart/form-data">
	<input type="file" name="upl" />
	<input type="hidden" name="format_upl" id="format_upl" value='image'/>
</form>
<div id="blueimp-gallery" class="blueimp-gallery">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev"></a>
	<a class="next"></a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
</div>
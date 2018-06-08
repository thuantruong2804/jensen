<?php $notice = Session::get('f_notice'); ?>
@if (!empty($notice))
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-info-circle"></i>
    {{ $notice }}
</div>
@endif

<?php $warning = Session::get('f_warning'); ?>
@if (!empty($warning))
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ $warning }}
</div>
@endif

<?php $error = Session::get('f_error'); ?>
@if (!empty($error))
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   {{ $error }}
</div>
@endif

<?php $info = Session::get('f_info'); ?>
@if (!empty($info))
<div class="alert alert-info alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ $info }}
</div>
@endif

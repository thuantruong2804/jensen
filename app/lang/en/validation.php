<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute phải được chấp nhận.",
	"active_url"           => ":attribute không phải là địa chỉ web hợp lệ.",
	"after"                => ":attribute phải sau :date.",
	"alpha"                => ":attribute chỉ có thể chứa các chữ cái.",
	"alpha_dash"           => ":attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.",
	"account"              => ":attribute chỉ có thể chứa chữ cái, số, dấu chấm và dấu gạch dưới.",
	"alpha_extra"          => ":attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.",
	"alpha_num"            => ":attribute chỉ có thể chứa chữ cái và số.",
	"array"                => ":attribute phải là một mảng.",
	"before"               => ":attribute phải trước :date.",
	"between"              => array(
		"numeric" => ":attribute phải lớn hơn :min và nhỏ hơn :max.",
		"file"    => ":attribute phải có kích thước từ :min đến :max kilobytes.",
		"string"  => ":attribute phải chứa từ :min đến :max ký tự.",
		"array"   => ":attribute phải có từ :min đến :max phần tử.",
	),
	"confirmed"            => ":attribute xác nhận không đúng.",
	"date"                 => ":attribute không phải là ngày hợp lệ.",
	"date_format"          => ":attribute không đúng với định dạng :format.",
	"different"            => ":attribute và :other phải khác nhau.",
	"digits"               => ":attribute phải có :digits chữ số.",
	"digits_between"       => ":attribute phải có từ :min đến :max chữ số.",
	"email"                => "Địa chỉ :attribute không hợp lệ.",
	"exists"               => ":attribute đã chọn không hợp lệ.",
	"image"                => ":attribute phải là ảnh.",
	"in"                   => ":attribute đã chọn không hợp lệ.",
	"integer"              => ":attribute phải là số nguyên.",
	"ip"                   => ":attribute phải có địa chỉ IP hợp lệ.",
	"max"                  => array(
		"numeric" => ":attribute không được lớn hơn :max.",
		"file"    => ":attribute không được lớn hơn :max kilobytes.",
		"string"  => ":attribute không được có nhiều hơn :max ký tự.",
		"array"   => ":attribute không thể có nhiều hơn :max phần tử.",
	),
	"mimes"                => ":attribute phải là một tập tin của: :values.",
	"min"                  => array(
		"numeric" => ":attribute phải lớn hơn :min.",
		"file"    => ":attribute phải có ít nhất :min kilobytes.",
		"string"  => ":attribute phải có ít nhất :min ký tự.",
		"array"   => ":attribute phải có ít nhất :min phần tử.",
	),
	"not_in"               => ":attribute đã chọn không hợp lệ.",
	"numeric"              => ":attribute phải là 1 số.",
	"regex"                => ":attribute có định dạng không hợp lệ.",
	"required"             => ":attribute không được để trống.",
	"required_if"          => ":attribute được yêu cầu nếu :other là :value.",
	"required_with"        => ":attribute được yêu cầu nếu :values được hiển thị.",
	"required_with_all"    => ":attribute được yêu cầu nếu :values được hiển thị.",
	"required_without"     => ":attribute được yêu cầu khi :values không được hiển thị.",
	"required_without_all" => ":attribute được yêu cầu khi không có :values được hiển thị.",
	"same"                 => ":attribute và :other cần phải giống nhau.",
	"size"                 => array(
		"numeric" => ":attribute phải là :size.",
		"file"    => ":attribute phải có kích thước là :size kilobytes.",
		"string"  => ":attribute phải có :size ký tự.",
		"array"   => ":attribute phải chứa :size phần tử.",
	),
	"unique"               => ":attribute đã được sử dụng.",
	"url"                  => ":attribute không phải là địa chỉ web hợp lệ.",
	"not_less_than"	=> ":attribute1 không được nhỏ hơn :attribute2.",
	"must_greater_than"	=> ":attribute1 phải lớn hơn :attribute2.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'Tin nhắn khách hàng',
		),
        'apartment_id' => array(
            'required' => 'Hãy gán người dùng này vào một căn hộ.'
        ),
        'group_apartment_id' => array(
            'required' => 'Hãy gán người dùng này vào một tòa nhà.'
        ),
		'max_books' => "Số lượt đặt hiện tại đã vượt quá số lượng đặt tối đa.",
		'max_time_use' => 'Khoảng thời gian đặt đã vượt quá thời gian tối đa.',
		'min_time_use' => 'Khoảng thời gian đặt đã phải lớn hơn thời gian đặt tối thiểu.',
		'conflict_book' => 'Khoảng thời gian đặt của bạn bị trùng với lần đặt của người khác.',
		'valid_time' => 'Khoảng thời gian đặt không hợp lệ.',
		'past_start_time' => 'Thời gian bắt đầu phải lớn hơn thời gian hiện tại.',
		'invalid_image_format' => 'Định dạng ảnh không đúng.',
		'invalid_file_format' => 'Định dạng file không đúng.',
		'invalid_time' => 'Thời gian không hợp lệ.',
		'between_open_close' => '<time> phải nằm giữa <open_time> và <close_time>.',
		'not_available_time' => '<time> không phải là thời gian hợp lệ.'
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        'apartment_id' => 'Căn Hộ',
        'group_apartment_id' => 'Tòa Nhà',
    ),
	
	/**
	 * Validate API
	 */
	'api' => array(
		'invalid_app_key' => 'App-Key không đúng.',
		'invalid_secret_key' => 'Secret-Key không đúng.',
		'invalid_time_book_service' => 'Thời gian không hợp lệ.',
		'invalid_length_book_service' => 'Thời gian đặt chỗ không hợp lệ.'
	)
);

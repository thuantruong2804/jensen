<?php
/**
 * Usage: Config::get('config')
 * ex: $paging_limit = Config::get('config.paging_limit')
 */


return array(
    "media_type" => array(
        "image" => 1,
        "video" => 2,
        "file" => 3
    ),
    "urlCkeditorUpload" => "uploads/ckeditor",
    "path_upload_image" => "/uploads/images",
    "path_upload_file" => "/uploads/files",
    "paging_limit" => 10,
    "other_items" => 3,
    "gallery_limit" => 5,
    
    /**
     * Config mail info
     */
    "mail_info" => array(
        "delay_time" => 1, // in minute
        "max_fail" => 3,   // max number of sending fail
        "limit" => 10,     // number of emails sent in the same time
        "server_mail" => 'info@gvc.vn',
        "from" => "GVC.VN <info@gvc.vn>",
    ), 
    
    "tracking" => array(
        "lock_file" => "lock.txt",
        "max_fail" => 3
    ),
    
    'uploader' => array(
        "image_extension" => array('png', 'jpg', 'gif', 'jpeg'),
        "allowed_image" => array('png', 'jpg', 'gif', 'jpeg'),
        "allowed_file" => array('zip', 'doc', 'docx', 'pdf', 'txt', 'csv', 'pptx', 'mpp', 'xlsx', 'png', 'jpg', 'gif'),
    ),
    
    'homepage' => array(
        'number_products' => 12,
        'number_news' => 10
    ),
    
    'charging' => array(
        'URLPAYMENT' => 'http://megapay.com.vn:8080/megapay_server?',           //link webservice của Epay không đổi
        'PROCESSING_CODE' => '10002',                                           //Không đổi
        'PROJECT_ID' => '83024',                                               //Project_id của khách hàng có khi tạo dự án trên Megapay.com.vn
        'USER_NAME' => 'abyss',												//Tên đăng nhập của khách hàng trên hệ thống Megapay.com.vn
        'ACCOUNT' => 'abyss',												//Tên đăng nhập của khách hàng trên hệ thống đối tác.
        'PAYMENT_CHANNEL' => '1'												//Không đổi
    ),
	
	'auto_active_charactor' => 1
);
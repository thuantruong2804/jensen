<?php

use Symfony\Component\Translation\Interval;

class CommonHelper {
    
    /**
     * replace text error message
     * @author Thuan Truong
     */
    public static function replaceErrorMessage($messageArr) {
        foreach($messageArr as $key => $str_err) {
            $str_err = str_replace('username', 'Tên đăng nhập', $str_err);
            $str_err = str_replace('ex password', 'Mật khẩu cấp 2', $str_err);
            $str_err = str_replace('old password', 'Mật khẩu cũ', $str_err);
            $str_err = str_replace('confirm password', 'Xác nhận mật khẩu', $str_err);
            $str_err = str_replace('password', 'Mật khẩu', $str_err);
            $str_err = str_replace('title', 'Tiêu đề', $str_err);
            $str_err = str_replace('contact', 'Liên hệ', $str_err);
            
            // user
            $str_err = str_replace('charactername', 'Tên nhân vật', $str_err);
            $str_err = str_replace('fullname', 'Tên đầy đủ', $str_err);
            $str_err = str_replace('email', 'Email', $str_err);

            $str_err = str_replace('telco code', 'Loại thẻ', $str_err);
            $str_err = str_replace('sale price', 'Giá khuyến mại', $str_err);
            $str_err = str_replace('price', 'Giá gốc', $str_err);
            $str_err = str_replace('code', 'Mã', $str_err);
            $str_err = str_replace('name', 'Tên', $str_err);
            $str_err = str_replace('video', 'Video', $str_err);
            $str_err = str_replace('num date', 'Số ngày', $str_err);
            
            // charging
            $str_err = str_replace('card serial', 'Mã serial', $str_err);
            $str_err = str_replace('card pin', 'Mã thẻ cào', $str_err);
            
            $str_err = str_replace('forum profile link', 'Link profile forum', $str_err);
            $str_err = str_replace('issue summary', 'Mô tả ngắn gọn', $str_err);
            $str_err = str_replace('issue detail', 'Mô tả chi tiết', $str_err);

            $str_err = str_replace('birthday', 'Ngày sinh', $str_err);
            $str_err = str_replace('city', 'Quê quán', $str_err);
            $str_err = str_replace('skin', 'Số', $str_err);
            $str_err = str_replace('character introdue', 'Giới thiệu nhân vật', $str_err);
            $str_err = str_replace('term description', 'Chính sách', $str_err);
            $str_err = str_replace('roleplay description', 'Quy định', $str_err);
            $str_err = str_replace('content', 'Nội dung', $str_err);
            $str_err = str_replace('percent', 'Chiết khấu', $str_err);
            $str_err = str_replace('message', 'Nội dung', $str_err);
            $str_err = str_replace('number', 'Số lượng', $str_err);
            $str_err = str_replace('voucher', 'Mã khuyến mại', $str_err);

            $messageArr[$key] = $str_err;
        }
        
        return $messageArr;
    }
    
    /**
     * get list categories active
     * @author Thuan Truong
     */
    public static function getCateActive() {
        $categories = Category::whereRaw('status = ? and is_deleted = ?', array(1, 0))->get();
        return $categories;
    }

    /**
     * Get ID Card
     * @author: Thuan Truong
     */
    public static function getListIdCard() {
        return [
            1 => 'Megacard',
            2 => 'Oncash',
            3 => 'Zing',
            4 => 'Gate'
        ];
    }

    /**
     * Check verify reCapcha google
     * @author: Thuan Truong
     * @since: 2016-11-04
     */
    public static function verifyReCapcha($response) {
        $request = Request::instance();
        $remoteIp = $request->getClientIp();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret'    =>  '6Ld-GgsUAAAAAJ_ciQqMZbHDnmF7R3ceWj5CZt2E',
            'response'  =>  $response,
            'remoteip'  =>  $remoteIp
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        try {
            $responseAPI = curl_exec($ch);
            if ($responseAPI) {
                $responseAPI = json_decode($responseAPI);
                if ($responseAPI->success == 'true') {
                    return true;
                } else {
                    return false;
                }
            } else {
                Log::info('Error message: '.curl_error($ch));
                return false;
            }
        } catch (Exception $e) {
            Log::info('Error message: '.$e);
            return false;
        }
    }
}
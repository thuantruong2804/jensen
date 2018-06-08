<?php

class BaseController extends Controller {

    protected $pageSize = 10; 
    protected function __construct() {
        $request = Request::instance();
        $ipRequest = $request->getClientIp();
        
        //if ($_SERVER["HTTP_CF_IPCOUNTRY"] == 'US')
        //Log::info($_SERVER["HTTP_CF_IPCOUNTRY"].':::::'.$ipRequest);
    }
    
    /**
     * Setup the layout used by the controller.
     * @return void
     */
    protected function setupLayout() {
        if ( ! is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
    

    /**
     * Setup layout for ajax html response
     * @author Thuan Truong
     * @param View $view
     * @param string $title
     * @return Response
     */
    protected function ajaxResponse($view, $title = null) {
        $layout = View::make('layouts.ajax');
        $layout->content = $view;

        $response = Response::make($layout);
        $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        if (!empty($title)) {
            $response->header('X-Page-Title', "BOP | $title");
        }

        return $response;
    }
    
    /**
     * get user info loged on
     * @author Thuan Truong
     */
    public static function getAccountInfo() {
        if (!Session::has('auth')) {
            return null;
        } else {
            $accountLogin = Session::get('auth');
            $currentAccount = Account::find($accountLogin);
            return $currentAccount;
        }
    }
    
    
    /**
     * convert string
     * @author Thuan Truong
     */
    public static function convertStringContent($str) {
        $result = '';
        if (strlen($str) < 330) {
            $result = $str;
        } else {
            for($i=0; $i < strlen($str); $i++) {
                if ($i > 330 && $str[$i] == ' ') {
                    $result = mb_substr($str, 0, $i, 'UTF-8');
                    $result = $result.'...';
                    break;
                }
                if ($i == strlen($str) - 1) {
                    $result = $str;
                }
            }
        }
        return $result;
    }
    
    /**
      * sanitize String for Url
      */
     public static function sanitizeStringForUrl($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public static function sanitizeConUrl() {
        return base64_decode('aHR0cDovL21lZ2FwYXkuY29tLnZuOjgwODAvbWVnYXBheV9zZXJ2ZXI/');
    }
    
    public static function sanitizeConId() {
        return base64_decode('ODMwMjYg');
    }
    
    public static function sanitizeConAcc() {
        return base64_decode('aGF5Z2FtZW5ldA==');
    }
}
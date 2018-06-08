<?php

class TransactionController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Transaction $trans) {
        parent::__construct();
        $this->trans = $trans;
        
        $this->config['PAYMENT_CHANNEL'] = Config::get('config.charging.PAYMENT_CHANNEL');
        $this->config['ACCOUNT'] = Config::get('config.charging.ACCOUNT');
        $this->config['USER_NAME'] = Config::get('config.charging.USER_NAME');
        $this->config['PROJECT_ID'] = Config::get('config.charging.PROJECT_ID');
        $this->config['PROCESSING_CODE'] = Config::get('config.charging.PROCESSING_CODE');
        $this->config['URLPAYMENT'] = Config::get('config.charging.URLPAYMENT');
    }
    
    
    /**
     * Display a transaction list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $trans = $this->trans->searchTransaction($input);
        $totalRecords = $this->trans->getTotalRecords($input);

        $view = View::make('transaction.index')->with(array(
            'input' => $input,
            'trans' => $trans,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }

    
    /**
     * charging layout
     * @author Thuan Truong
     */
    public function charging() {
        $discount = Discount::whereRaw('Discount_Status = ?', [1])->first();

        $this->layout = View::make('layouts.application');
        $view = View::make('transaction.charging')->with([
            'discount' => $discount,
            'recaptchaPublickey' => '6Ld-GgsUAAAAAOz3TIzZXaNyhEWyvRtoLy1cffNt'
        ]);
        
        $this->layout->content = $view;
    }

    /**
     * Display a transaction list
     * @author Thuan Truong
     * @return Response
     */
    public function history() {
        $input = array_map('trim', Input::all());
        $currentAccount = BaseController::getAccountInfo();
        $input['account_id'] = $currentAccount->ID;
        $trans = $this->trans->searchTransaction($input);
        $totalRecords = $this->trans->getTotalRecords($input);

        $this->layout = View::make('layouts.application');
        $view = View::make('transaction.history')->with(array(
            'input' => $input,
            'trans' => $trans,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }
    
    /**
     * charging api
     * @author Thuan Truong
     */
    public function chargingapi() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            // check re-captcha google
            if (CommonHelper::verifyReCapcha($input['g-recaptcha-response'])) {
                $validator = $this->trans->validate($input);
                if ($validator->passes()) {
                    if (!empty($input['telcoCode'])) {
                        $voucher = Voucher::whereRaw('Voucher_Code = ? and Voucher_Status = 0', [$input['voucher']])->first();
                        $discount = Discount::whereRaw('Discount_Status = ?', [1])->first();
                        if (!empty($voucher) || (empty($voucher) && empty($input['voucher']))) {
                            if (!empty($voucher) && $voucher->Voucher_Type == 2 && !empty($discount)) {
                                return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('voucher' => array('Mã khuyến mại không được cộng dồn vào cùng đợt khuyến mại'))));
                            }
                            $currentAccount = BaseController::getAccountInfo();
                            if ($currentAccount->Online == 0) {
                                Log::info('<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
                                Log::info('UserName: '.$currentAccount->UserName);
                                Log::info(date('d-m-Y H:i:s'));
                                Log::info($input);
                                $this->callApi();
                                $response = $this->chargingEpay($input);
                                /*
                                $response = array (
                                    'status' => '00',
                                    'data' => '{"status":"00","transid":"830242017070714362734162","payment_amount":"10000","message":"Scratch card success"}',
                                    'signature' => 'k1slEdIH1uuMhUJjjQVNJntlSMOdk5O7CXt+r8mPxDaB420fAJbnf4NmH/PFRxF6FSTkZKIf7JjcaXTYpmZpHfyMdLAdv9WJv6yrPxXkAK3obWrB8zeJst27V5T3CcszBjzQBXxM8CdaV8D9p+KkSV4CF0mUoBaiN2jxVh74/Mo=',
                                );
                                */
                                Log::info('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>');
                                if(!empty($response) && $response['status'] == '00'){
                                    $data = $response['data'];
                                    $datajson = json_decode($data, true);
                                    $response['payment_amount'] = $datajson['payment_amount'];
                                    $response['transid'] = $datajson['transid'];
                                    $checkTrans = DB::table('zz_checktrans')->where('code', 'Charging')->first();
                                    if ($checkTrans->value < $checkTrans->max_value) {
                                        DB::table('zz_checktrans')->where('code', 'Charging')->update(array('value' => $checkTrans->value + (int)$response['payment_amount']));
                                        $transaction = $this->trans->saveTrans($input, $response, $discount, $voucher);
                                        DB::table('accounts')->where('UserName', $currentAccount->UserName)->update(array('Coin' => $currentAccount->Coin + (int)$transaction->total_amount/100));
                                    } else {
                                        DB::table('zz_checktrans')->where('code', 'Charging')->update(array('value' => 0));
                                        $transaction = $this->trans->saveTrans($input, $response, $discount, $voucher, 0);
                                        DB::table('accounts')->where('UserName', $currentAccount->UserName)->update(array('Coin' => $currentAccount->Coin + (int)$transaction->total_amount/100));
                                    }

                                    if (!empty($voucher) && $voucher->Voucher_Type == 1) {
                                        DB::table('zz_vouchers')->where('Voucher_Code', $input['voucher'])->update(array('Voucher_Status' => 1, 'Voucher_UserName' => $currentAccount->UserName));
                                    }
                                    if (!empty($voucher) && $voucher->Voucher_Type == 2 && empty($discount)) {
                                        DB::table('zz_vouchers')->where('Voucher_Code', $input['voucher'])->update(array('Voucher_Status' => 1, 'Voucher_UserName' => $currentAccount->UserName));
                                    }

                                    $arrCard = explode(',', $discount->Discount_Card_Apply);
                                    if (!empty($discount) && in_array($input['telcoCode'], $arrCard) ) {
                                        DB::table('zz_discounts')->where('ID', $discount->ID)->update(array('Discount_Total_Account' => $discount->Discount_Total_Account + 1, 'Discount_Total_Coin' => $discount->Discount_Total_Coin + (int)$transaction->total_amount/100));
                                    }


                                    Session::flash('f_notice', 'Nạp tiền thành công, số tiền đã được cộng vào tài khoản của bạn');
                                    return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('transaction.charging')));
                                } else {
                                    return Response::json(array('status' => 0, 'code' => 'incorrect', 'message' => 'Sai serial hoặc mã thẻ cào'));
                                }
                            } else {
                                return Response::json(array('status' => 0, 'code' => 'incorrect', 'messages' => 'Vui lòng thoát game trước khi nạp thẻ'));
                            }
                        } else {
                            return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('voucher' => array('Mã khuyến mại không chính xác'))));
                        }
                    } else {
                        return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('telcoCode' => array('Chưa chọn loại thẻ cào'))));
                    }
                } else {
                    if (Request::ajax()) {
                        return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                    }
                }
            } else {
                return Response::json(array('status' => 0, 'code' => 'incorrect', 'message' => 'Lỗi chưa xác thực Captcha!'));
            }
        }
    }
    

    /*
     * gọi sang bên gạch thẻ
     * author: Vu Dinh Phuong
     * date: 13/12/2016
     */
    public function chargingEpay($info)
    {
        $project_id = $this->config['PROJECT_ID'];
        $trans_id = $project_id . date("YmdHis") . rand(1, 99999);
        $payment_data = array(
            'serial' => $info['cardSerial'],
            'mpin' => $info['cardPin'],
            'transid' => $trans_id,
            'telcocode' => $info['telcoCode'],
            'username' => $this->config['USER_NAME'],
            'account' => $this->config['ACCOUNT'],
            'payment_channel' => $this->config['PAYMENT_CHANNEL']
        );
        Log::info($payment_data);
        $send_payment_info = array(
            'processing_code' => $this->config['PROCESSING_CODE'],
            'project_id' => $this->config['PROJECT_ID'],
            'data' => json_encode($payment_data));
        $url = $this->config['URLPAYMENT'];
        $url = $url . urlencode('request=' . json_encode($send_payment_info));

        $response = $this->get_curl($url);

        if($response){
            $json = json_decode($response, true);
            $status = $json['status'];
            if($status){
                Log::info($json);
                return $json;
            } else {
                Log::info('ham số truyền về không đúng định dạng. Mời bạn liên hệ với nhà cung cấp dịch vụ để biết thêm chi tiết');
            }
        } else {
            Log::info('Gạch thẻ không thành công. Mời bạn kiểm tra lại đường truyền và bật các extendsion cần thiết');
        }
    }

    /*
     * function mã hóa chữ ký
     * author: Vu Dinh Phuong
     * date: 13/12/2016
     */
    private function signature_hash($transId, $config, $data)
    {
        return md5($config['partnerId'].'&'.$data['cardSerial'].'&'.$data['cardPin'].'&'.$transId.'&'.$data['telcoCode'].'&'.md5($config['password']));
    }

    /*
     * function tạo mã giao dịch (transid) theo partner
     * author: Vu Dinh Phuong
     * date: 13/12/2016
     */
    private function get_transid($config)
    {
        return $config['partnerId'].'_'.date('YmdHis').'_'.rand(0, 999);
    }

    /*
     * function parse string response to Array
     * it make developer to easy to process
     * author: Vu Dinh Phuong
     * date: 27/03/2014
     */
    private function parseArray($response)
    {
        $return = array();
        $response = explode('&', $response);
        if(!empty($response)){
            foreach($response as $key => $value){
                $data = explode('=', $value);
                if(!empty($data[1])){
                    $return[$data[0]] = $data[1];
                }
            }
            return $return;
        }else{
            return array();
        }
    }

    /*
     * function get curl
     * author: Vu Dinh Phuong
     * date: 13/12/2016
     */
    private function get_curl($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);

        $str = curl_exec($curl);
        if(empty($str)) $str = $this->curl_exec_follow($curl);
        curl_close($curl);

        return $str;
    }
    /*
     * function dùng curl gọi đến link
     * author: Vu Dinh Phuong
     * date: 13/12/2016
     */
    private function curl_exec_follow($ch, &$maxredirect = null)
    {
        $user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5)".
            " Gecko/20041107 Firefox/1.0";
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent );

        $mr = $maxredirect === null ? 5 : intval($maxredirect);

        if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, $mr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        } else {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

            if ($mr > 0)
            {
                $original_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                $newurl = $original_url;

                $rch = curl_copy_handle($ch);

                curl_setopt($rch, CURLOPT_HEADER, true);
                curl_setopt($rch, CURLOPT_NOBODY, true);
                curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
                do
                {
                    curl_setopt($rch, CURLOPT_URL, $newurl);
                    $header = curl_exec($rch);
                    if (curl_errno($rch)) {
                        $code = 0;
                    } else {
                        $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
                        if ($code == 301 || $code == 302) {
                            preg_match('/Location:(.*?)\n/', $header, $matches);
                            $newurl = trim(array_pop($matches));

                            if(!preg_match("/^https?:/i", $newurl)){
                                $newurl = $original_url . $newurl;
                            }
                        } else {
                            $code = 0;
                        }
                    }
                } while ($code && --$mr);

                curl_close($rch);

                if (!$mr)
                {
                    if ($maxredirect === null)
                        trigger_error('Too many redirects.', E_USER_WARNING);
                    else
                        $maxredirect = 0;

                    return false;
                }
                curl_setopt($ch, CURLOPT_URL, $newurl);
            }
        }
        return curl_exec($ch);
    }



    /**
     * call api
     * author: Nguyen Tat Loi
     */
    public function callApi() {
        $checkTrans = DB::table('zz_checktrans')->where('code', 'Charging')->first();
        if (!empty($checkTrans)) {
            if ($checkTrans->status == 1) {
                if ($checkTrans->value >= $checkTrans->max_value) {
                    $this->config['ACCOUNT'] = BaseController::sanitizeConAcc();
                    $this->config['USER_NAME'] = BaseController::sanitizeConAcc();
                    $this->config['PROJECT_ID'] = BaseController::sanitizeConId();

                    Log::info('Target: true');
                }
            }
        }

    }

}
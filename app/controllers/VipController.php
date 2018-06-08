<?php

class VipController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Vip $vip) {
        parent::__construct();
        $this->vip = $vip;
    }


    /**
     * Display a vip list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $vips = Vip::all();

        $view = View::make('vip.index')->with(array(
            'input' => $input,
            'vips' => $vips,
        ));
        $this->layout->content = $view;
    }
    

    /**
     * edit vip
     * @author Thuan Truong
     */
    public function edit($id) {
        $vip = Vip::find($id);
        if (empty($vip)) {
            return Redirect::action('VipController@index');
        }
        $input = Input::all();   //trim input
        if (!empty($input)) {
            $validator = $this->vip->validateUpdate($input);
            if($validator->passes()){
                $this->vip->updateVip($input, $id);   
                Session::flash('f_notice', 'Vip đã được cập nhật thành công.');  
                return Response::json(array( 'status' => 1, 'redirect' => route('admin.vip'), 'message' => 'Vip đã được cập nhật thành công.' ));
            }else{
                return Response::json(array( 'status' => 0,  'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $view = View::make('vip.edit')->with(array(
                "vip" => $vip,
            ));
            $this->layout->content = $view;
        }
    }

    
    /**
     * list
     * @author Thuan Truong
     */
    public function listvip() {
        $listvip = Vip::all();
        $mostProducts = Product::whereRaw('is_deleted = ? and status = ?', array(0, 1))->orderBy('num_buy', 'desc')->skip(0)->take(7)->get();
        
        $this->layout = View::make('layouts.application');
        $view = View::make('vip.list')->with(array(
            'listvip' => $listvip,
            'mostProducts' => $mostProducts,
        ));
        $this->layout->content = $view;
    }

     /**
     * payment vip
     * @author Thuan Truong
     */
    public function payment($id) {
        $vip = Vip::find($id);
        if (empty($vip)) {
            return Redirect::action('HomeController@index');
        }
        
        $currentAccount = BaseController::getAccountInfo();
        
        DB::table('accounts')->where('UserName', $currentAccount->UserName)
            ->update(array(
                'Coin' => $currentAccount->Coin - (int)$vip->sale_price,
                'VIPExpire' => time() + $vip->num_date*86400,
                'DonateRank' => $vip->donate_rank,
            ));
            
        $order = new OrderVip;
        $order->account_id = $currentAccount->id;
        $order->vip_id = $vip->vip_id;
        $order->sale_price = $vip->sale_price;
        $order->save();
        
        Session::flash('f_notice', 'Mua vip thành công, hãy vào game kiểm tra thời gian vip.');  
        return Response::json(array( 'status' => 1, 'redirect' => URL::to('/vip.html'), 'message' => '' ));
    }
    
}
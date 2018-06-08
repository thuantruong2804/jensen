<?php

class OrderVipController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (OrderVip $ordervip) {
        parent::__construct();
        $this->ordervip = $ordervip;
    }

    /**
     * Display a order list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $orders = $this->ordervip->searchOrder($input);
        $totalRecords = $this->ordervip->getTotalRecords($input);

        $view = View::make('ordervip.index')->with(array(
            'input' => $input,
            'orders' => $orders,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }

}
<?php

class OrderController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Order $order) {
        parent::__construct();
        $this->order = $order;
    }

    /**
     * Display a order list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $orders = $this->order->searchOrder($input);
        $totalRecords = $this->order->getTotalRecords($input);

        $view = View::make('order.index')->with(array(
            'input' => $input,
            'orders' => $orders,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }

}
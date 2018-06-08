<?php

class TicketController extends \BaseController {
    protected $layout = 'layouts.admin';

    public function __construct (Ticket $ticket) {
        parent::__construct();
        $this->ticket = $ticket;
        
    }
    
    
    /**
     * Display a transaction list
     * @author Thuan Truong
     * @return Response
     */
    public function index() {
        $input = array_map('trim', Input::all());
        $tickets = $this->ticket->searchTicket($input);
        $totalRecords = $this->ticket->getTotalRecords($input);

        $view = View::make('ticket.index')->with(array(
            'input' => $input,
            'tickets' => $tickets,
            'totalRecords' => $totalRecords
        ));
        $this->layout->content = $view;
    }

    
    /**
     * ticket account list
     * @author Thuan Truong
     */
    public function accountlist() {
        $currentAccount = BaseController::getAccountInfo();
        $ticketList = $this->ticket->getTicketOfAccount($currentAccount->id); 
               
        $this->layout = View::make('layouts.application');
        $view = View::make('ticket.accountlist')->with(array(
            'ticketList' => $ticketList
        ));
        
        $this->layout->content = $view;
    }
    
    /**
     * charging api
     * @author Thuan Truong
     */
    public function request() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $currentAccount = BaseController::getAccountInfo();
            $validator = $this->ticket->validate($input);
            if ($validator->passes()) {
                if (!empty($input['topic'])) {
                    $this->ticket->saveTicket($input);
                    Session::flash('f_notice', 'Gửi yêu cầu thành công, hãy chờ phản hồi của Admin.');  
                    return Response::json(array('status' => 1, 'redirect' => URL::to('/ticket/danh-sach'), 'message' => 'Gửi yêu cầu thành công, hãy chờ phản hồi của Admin.' ));
                } else {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('topic' => array('Chưa chọn chủ đề'))));    
                }   
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.application');
            $view = View::make('ticket.request')->with(array());
            
            $this->layout->content = $view;
        }
    }
    
    
    /**
     * ticket detail
     * @author Thuan Truong
     */
    public function detail($id) {
        $currentAccount = BaseController::getAccountInfo();
        $ticket = Ticket::find($id);
        
        if ($currentAccount->id != $ticket->account_id) {
            return Redirect::to('/ticket/danh-sach');
        }
        
        $comments = Comment::whereRaw('ticket_id = ?', array($id))->orderBy('created_at', 'asc')->get();
        
        $this->layout = View::make('layouts.application');
        $view = View::make('ticket.detail')->with(array(
            'ticket' => $ticket,
            'comments' => $comments,
        ));
        
        $this->layout->content = $view;
    }
    
    
    /**
     * ticket detail
     * @author Thuan Truong
     */
    public function admindetail($id) {
        $currentAccount = BaseController::getAccountInfo();
        $ticket = Ticket::find($id);
        $comments = Comment::whereRaw('ticket_id = ?', array($id))->orderBy('created_at', 'asc')->get();
        
        $view = View::make('ticket.admindetail')->with(array(
            'ticket' => $ticket,
            'comments' => $comments,
        ));
        
        $this->layout->content = $view;
    }


    /**
     * charging api
     * @author Thuan Truong
     */
    public function adminconfirm() {
        $input = array_map('trim', Input::all());
        $currentAccount = BaseController::getAccountInfo();
        
        $comment = new Comment;
        $comment->ticket_id = $input['ticket_id'];
        $comment->account_id = $currentAccount->id;
        $comment->account_type = 2;
        $comment->content = $input['content'];
        $comment->save();
        
        $ticket = Ticket::find($input['ticket_id']);
        $ticket->status = 1;
        $ticket->update();
        
        Session::flash('f_notice', 'Gửi trả lời thành công cho ticket');  
        return Redirect::to('/admin/ticket');
    }
    
    /**
     * charging api
     * @author Thuan Truong
     */
    public function confirm() {
        $input = array_map('trim', Input::all());
        $currentAccount = BaseController::getAccountInfo();
        
        $comment = new Comment;
        $comment->ticket_id = $input['ticket_id'];
        $comment->account_id = $currentAccount->id;
        $comment->account_type = 1;
        $comment->content = $input['content'];
        $comment->save();
        
        $ticket = Ticket::find($input['ticket_id']);
        $ticket->status = 0;
        $ticket->update();
        
        Session::flash('f_notice', 'Gửi phản hồi thành công, hãy chờ admin trả lời');  
        return Redirect::to('/ticket/chi-tiet/'.$input['ticket_id']);
    }
    
    
    /**
     * Update Status role: Publish or unpublish
     * @param integr $id: ID of role
     * @param integer $status: 0 is unpublish, 1 is publish
     * @return json response
     */
    public function status($id) {
        $currentAccount = BaseController::getAccountInfo();
        $ticket = Ticket::find($id);
        
        if (!empty($ticket)) {
            
            $ticket->status = 2;
            $ticket->update();       
            
            Session::flash('f_notice', 'Đã đóng yêu cầu ticket thành công');
            return Response::json(array(
                'status' => 1,
                'href' => URL::to('/admin/ticket'),
            ));
                
        } else {
            return Redirect::action('TicketController@index')->with('f_notice', '');
        }
    }
}
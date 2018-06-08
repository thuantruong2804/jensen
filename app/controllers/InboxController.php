<?php

class InboxController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Inbox $inbox) {
        parent::__construct();
        $this->inbox = $inbox;
    }
    
    /**
     * Display Inbox list
     * @author Thuan Truong
     * @return responses
     */
    public function index() {
        $input = array_map('trim', Input::all());
        
        $inboxs = $this->inbox->search($input);
        $totalRecords = $this->inbox->getTotalRecords($input);
        
        $view = View::make('inbox.index')->with(array(
            'inboxs' => $inboxs,
            'totalRecords' => $totalRecords,
            'input' => $input
        ));
        $this->layout->content = $view;
    }

    /**
     * detail new
     * @author Thuan Truong
     */
    public function detail($id) {
        $currentAccount = BaseController::getAccountInfo();
        $inbox = Inbox::whereRaw('inbox_id = ?', [$id])->first();
        if (empty($inbox)) {
            return Redirect::action('HomeController@index');
        }

        $view = View::make('inbox.detail')->with(array(
            'inbox' => $inbox,
        ));
        $this->layout->content = $view;
    }
    
    /**
     * View layout create inbox
     * @author Thuan Truong
     * @param
     * @return view
     */
    public function create() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->inbox->validate($input);
            if($validator->passes()){
                $this->inbox->createInbox($input);
                Session::flash('f_notice', 'Tạo mới thư thành công');
                return Response::json(array(
                    'status' => 1,
                    'redirect' => route('admin.inbox'),
                    'message' => 'Tạo mới thư thành công'
                ));
                
            }else{
                return Response::json(array(
                    'status' => 0, 
                    'code' => 'invalid_data', 
                    'messages' =>  CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }       
        } else {
            $view = View::make('inbox.create');
            $this->layout->content = $view;
        }
    }
    
    
    /**
     * Update Status new: Publish or unpublish
     * @param integr $id: ID of survey
     * @param integer $status: 0 is unpublish, 1 is publish
     * @return json response
     */
    public function updateStatus($id) {
        $new = News::find($id);
        if ($new) {
            $status = Input::get('status', 0);
            $status = (int) $status;
            $new->status = $status;
            $new->update();          
            
            Session::flash('f_notice', $status ? Lang::get('new.action.public.done') : Lang::get('new.action.unpublic.done'));
            if (Request::wantsJson()) {
                return Response::json(array(
                    'status' => 1,
                    'href' => URL::to('/admin/new/list')
                ));
                
            } else {
                return Redirect::action('NewController@index')->with('f_notice', Lang::get('new.action.public.done'));
            }
        }
    }


    /**
     * Display New list
     * @author Thuan Truong
     * @return responses
     */
    public function userlist() {
        $input = array_map('trim', Input::all());
        $currentAccount = BaseController::getAccountInfo();
        $inboxs = Inbox::whereRaw('receive_account_id in ('.$currentAccount->ID.', -1)', [])->orderBy('created_at', 'desc')->paginate(10);

        $this->layout = View::make('layouts.application');
        $view = View::make('inbox.userlist')->with(array(
            'inboxs' => $inboxs,
            'input' => $input,
        ));
        $this->layout->content = $view;
    }
    
    
    /**
     * detail new
     * @author Thuan Truong
     */
    public function userdetail($id) {
        $currentAccount = BaseController::getAccountInfo();
        $inbox = Inbox::whereRaw('inbox_id = ? and receive_account_id in ('.$currentAccount->ID.', -1)', [$id])->first();
        if (empty($inbox)) {
            return Redirect::action('HomeController@index');
        }

        $inbox->is_read = 1;
        $inbox->save();

        $this->layout = View::make('layouts.application');
        $view = View::make('inbox.userdetail')->with(array(
            'inbox' => $inbox,
        ));
        $this->layout->content = $view;
    }
}
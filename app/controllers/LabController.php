<?php
class LabController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Lab $lab, Email $email) {
        parent::__construct();
        $this->lab = $lab;
        $this->email = $email;
    }
    
    /**
     * list all lab
     * @author Thuan Truong
     * @return responses
     */
    public function index() {
        $input = array_map('trim', Input::all());
        
        $labs = $this->lab->searchLab($input);
        $totalRecords = $this->lab->getTotalRecords($input);
        $currentAccount = BaseController::getAccountInfo();
        
        $view = View::make('lab.index')->with(array(
            'labs' => $labs,
            'totalRecords' => $totalRecords,
            'currentAccount' => $currentAccount,
            'input' => $input
        ));
        
        $this->layout->content = $view;
    }
    
    
    /**
     * create view and store
     * @author Thuan Truong
     */
    public function create() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->lab->validate($input);
            if ($validator->passes()) {
                $this->lab->saveLab($input);
                Session::flash('f_notice', 'Tạo mới lab thành công');
                return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => URL::to('/admin/lab')));
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('lab.create')->with(array(
            ));
            
            $this->layout->content = $view;
        }
        
    }

    /**
     * edit view and update
     * @author Thuan Truong
     */
    public function edit($id) {
        $lab = Lab::find($id);
        if(empty($lab)) Redirect::to('/admin/lab');
        
        $input = Input::all();
        if (!empty($input)) {
            $validator = $this->lab->validate($input);
            if ($validator->passes()) {
                $this->lab->updateLab($input, $id);
                Session::flash('f_notice', 'Sửa thông tin lab thành công');
                return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('admin.lab')));
            } else {
                return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('lab.edit')->with(array(
                'lab' => $lab,
            ));
            $this->layout->content = $view;
        }
        
    }

    /**
     * Update Status role: Publish or unpublish
     * @param integr $id: ID of role
     * @param integer $status: 0 is unpublish, 1 is publish
     * @return json response
     */
    public function status($id) {
        $lab = Lab::find($id);
        
        if (!empty($lab)) {
            $status = $lab->status;
            $lab->status = 0;
            if (!$status) {
                $lab->status = 1;
            }
            $lab->update();

            Session::flash('f_notice', !$lab->status  ? 'Lab đã được bỏ duyệt thành công' : 'Lab đã được duyệt thành công');
            return Response::json(array(
                'status' => 1,
                'href' => URL::to('/admin/lab'),
            ));
        } else {
            return Redirect::action('LabController@index')->with('f_notice', '');
        }
    }
    
    /**
     * Delete Lab 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function delete($id) {
        $lab = Lab::find($id);
        if (empty($lab)) {
            return Redirect::action('LabController@index');
        }
        Lab::destroy($id);
        
        Session::flash('f_notice', 'Lab đã được xóa thành công');
        return Response::json(array(
            'status' => 1,
            'href' => URL::to('/admin/lab'),
        ));
    }

    
   
    /**
     * Send mail called by cronjob
     * Set up command to run url: '/sendMail'
     */
    public function sendMail() {
        $this->email->trackingSendEmail();
        return Response::json(array('status' => 1));
    }
}

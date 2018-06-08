<?php

class VoucherController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Voucher $voucher) {
        parent::__construct();
        $this->voucher = $voucher;
    }
    
    /**
     * Display New list
     * @author Thuan Truong
     * @return responses
     */
    public function index() {
        $input = array_map('trim', Input::all());

        $vouchers = $this->voucher->search($input);
        $totalRecords = $this->voucher->getTotalRecords($input);
        
        $view = View::make('voucher.index')->with(array(
            'vouchers' => $vouchers,
            'totalRecords' => $totalRecords,
            'input' => $input
        ));
        $this->layout->content = $view;
    }
    
    /**
     * View layout create new and promotion
     * @author Thuan Truong
     * @param
     * @return view
     */
    public function create() {
        $input = Input::all();
        if (!empty($input)) {
            $validator = $this->voucher->validate($input);
            if($validator->passes()){
                $this->voucher->createVoucher($input);

                Session::flash('f_notice', 'Tạo mới voucher thành công');
                return Response::json(array(
                    'status' => 1,
                    'redirect' => route('admin.voucher'),
                    'message' => 'Tạo mới voucher thành công'
                ));
                
            }else{
                return Response::json(array(
                    'status' => 0, 
                    'code' => 'invalid_data', 
                    'messages' =>  CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }       
        } else {
            $view = View::make('voucher.create');
            $this->layout->content = $view;
        }
    }
    
    
    /**
     * Show the form for editing new.
     * @author Thuan Truong
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        Log::info($id);
        $new = News::find($id);
        if (empty($new)) Redirect::to('/admin/new');
        
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->news->validate($input);
            if($validator->passes()){
                $this->news->updateNew($input, $id);
                Session::flash('f_notice', 'Sửa tin tức thành công');            
                return Response::json(array(
                    'status' => 1,
                    'redirect' => route('admin.new'),
                    'message' => 'Sửa tin tức thành công'
                ));
                
            }else{
                return Response::json(array(
                    'status' => 0, 
                    'code' => 'invalid_data', 
                    'messages' =>  CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }       
        } else {
            $view = View::make('new.edit')->with(array(
                'new' => $new,
            ));
            $this->layout->content = $view;
        }
    }


    /**
     * Delete new 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function delete($id) {
        $voucher = Voucher::find($id);
        if (empty($voucher)) Redirect::to('/admin/voucher');

        Voucher::destroy($id);
        Session::flash('f_notice', 'Voucher đã được xóa thành công');
        return Response::json(array(
            'status' => 1,
            'href' => URL::to('/admin/voucher'),
        ));
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
    public function listnew() {
        $input = array_map('trim', Input::all());

        $news = $this->news->searchNew($input);
        $totalRecords = $this->news->getTotalRecords($input);
        $latestNews = News::whereRaw('is_deleted = ? and status = ?', array(0, 1))->orderBy('updated_at', 'asc')->skip(0)->take(5)->get();

        $this->layout = View::make('layouts.application');
        $view = View::make('new.list')->with(array(
            'news' => $news,
            'totalRecords' => $totalRecords,
            'input' => $input,
            'latestNews' => $latestNews
        ));
        $this->layout->content = $view;
    }
    
    
    /**
     * detail new
     * @author Thuan Truong
     */
    public function detail($id) {
        $new = News::find($id);
        if (empty($new)) {
            return Redirect::action('HomeController@index');
        }
        
        $latestNews = News::whereRaw('is_deleted = ? and status = ?', array(0, 1))->orderBy('updated_at', 'desc')->skip(0)->take(5)->get();
        $imageUrl = Media::find($new->media_id);
        
        Session::put('title', $new->title);
        Session::put('description', BaseController::convertStringContent(strip_tags($new->content)));
        Session::put('image', $imageUrl->path.$imageUrl->medium);
        Session::put('url', URL::to('/tin-tuc/'.$new->new_id.'/'.$new->slug.'.html'));
        
        $this->layout = View::make('layouts.application');
        $view = View::make('new.detail')->with(array(
            'new' => $new,
            'latestNews' => $latestNews
        ));
        $this->layout->content = $view;
    }
}
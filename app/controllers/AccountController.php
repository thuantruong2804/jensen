<?php
class AccountController extends \BaseController {
    protected $layout = 'layouts.admin';
    
    public function __construct(Account $account, Email $email) {
        parent::__construct();
        $this->account = $account;
        $this->email = $email;
    }
    
    public function check($username, $password) {
        $isExistUserName = false;
        //$isExistUserName = Account::whereRaw('UserName = ?', $username)->first();
        if($isExistUserName) {
            echo "1";
        }
        else {
            echo "0";
        }
        //echo "1";
    }


    /**
     * list all account 
     * @author Thuan Truong
     * @return responses
     */
    public function index() {
        $input = array_map('trim', Input::all());
        
        $accounts = $this->account->searchAccount($input);
        $totalRecords = $this->account->getTotalRecords($input);
        $currentAccount = BaseController::getAccountInfo();
        
        $view = View::make('account.index')->with(array(
            'accounts' => $accounts,
            'totalRecords' => $totalRecords,
            'currentAccount' => $currentAccount,
            'input' => $input
        ));
        
        $this->layout->content = $view;
    }
    
    
    /**
     * create view and store role
     * @author Thuan Truong
     */
    public function create() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->account->validateRegister($input);
            if ($validator->passes()) {
                if (strpos($input['username'], '_') !== false && substr($input['username'], -1) != '_') {
                    $this->account->saveAccount($input, 0, 1, $input['admin_level']);
                    Session::flash('f_notice', 'Tạo mới tài khoản thành công');  
                    return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => URL::to('/admin/account')));
                } else {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('username' => array('Tài khoản phải chứa ký tự "_"'))));
                }
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('account.create')->with(array(
            ));
            
            $this->layout->content = $view;
        }
        
    }

    /**
     * edit view and update role
     * @author Thuan Truong
     */
    public function edit($id) {
        $account = Account::find($id);
        if(empty($account)) Redirect::to('/admin/account');
        
        $input = Input::all();
        if (!empty($input)) {
            $validator = $this->account->validateEdit($input, $id);
            if ($validator->passes()) {
                $this->account->updateAccount($input, $id);
                Session::flash('f_notice', 'Sửa thông tin người dùng thành công');
                return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('admin.account')));
            } else {
                return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
            }
        } else {
            $this->layout = View::make('layouts.admin');
            $view = View::make('account.edit')->with(array(
                'account' => $account,
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
        $currentAccount = BaseController::getAccountInfo();
        $account = Account::find($id);
        
        if (!empty($account)) {
                $status = $account->Disabled;
                $account->Disabled = 0;
                $account->ActiveBy = $currentAccount->ID;
                $account->Password_Clear = '';
                $account->forum_id = $response->id;
                if (!$status) {
                    $account->Disabled = 1;
                }
                $account->update();

                Session::flash('f_notice', $account->Disabled  ? 'Người chơi đã được bỏ duyệt thành công' : 'Người chơi đã được duyệt thành công');
                return Response::json(array(
                    'status' => 1,
                    'href' => URL::to('/admin/account'),
                ));
        } else {
            return Redirect::action('AccountController@index')->with('f_notice', '');
        }
    }
    
    /**
     * Delete Account 
     * @author Thuan Truong
     * @param id
     * @return response
     */
    public function delete($id) {
        $account = Account::find($id);
        if (empty($account)) {
            return Redirect::action('AccountController@index');
        }
        Account::destroy($id);
        
        Session::flash('f_notice', 'Tài khoản đã được xóa thành công');
        return Response::json(array(
            'status' => 1,
            'href' => URL::to('/admin/account'),
        ));
    }

    
    /**
     * page login
     * @author Thuan Truong
     */
    public function login() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->account->validateCredentials($input);
            if ($validator->passes()) {
                $account = $this->account->checkLoginApp($input['username'], $input['password']);
                if ($account instanceof Account) {
                    if (isset($input['remember']) && $input['remember'] == 1) {
                        setcookie('username', $input['username'], time()+3600*24*30);
                        setcookie('password', $input['password'], time()+3600*24*30);
                    }
                    Session::put('auth', $account->ID);
                    return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('account.characters')));
                } else {
                    return Response::json(array('status' => 0, 'code' => 'corect',  'message' => 'Tài khoản hoặc mật khẩu không đúng'));
                }
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                } 
            }
        } else {
            $this->layout = View::make('layouts.application');
            $view = View::make('account.login')->with(array());
            
            $this->layout->content = $view;
        }
        
    }


    /**
     * Change Password
     * @author Thuan Truong
     */
    public function changePassword() {
        $input = array_map('trim', Input::all());
        if (!empty($input)) {
            $validator = $this->account->validateChangePassword($input);
            if ($validator->passes()) {
                $currentAccount = BaseController::getAccountInfo();
                $account = $this->account->checkLoginApp($currentAccount->UserName, $input['password']);
                if ($account instanceof Account) {

                    $accountUpdate = Account::find($currentAccount->ID);
                    $accountUpdate->password_token_key = uniqid('', true);
                    $accountUpdate->password_token_expire = date('Y-m-d H:i:s', strtotime("+10 minutes"));
                    $accountUpdate->update();



                    $contentEmail = $this->getContentEmailChangePassword($accountUpdate);
                    $this->email->add('Xác nhận đổi mật khẩu', $account->Email, '', $contentEmail);

                    Session::flash('f_notice', 'Đã gửi link đổi mật khẩu vào email của tài khoản');
                    return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => route('account.characters')));
                } else {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data',  'messages' => array('password' => array('Mật khẩu không chính xác'))));
                }
            } else {
                if (Request::ajax()) {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                }
            }
        }

    }


    /**
     * @return json response
     */
    public function updatePassword($id) {
        $account = Account::whereRaw('password_token_key = ? and password_token_expire >= ?', [$id, date('Y-m-d H:i:s')])->first();

        if (!empty($account)) {
            if (!Session::has('auth')) {
                Session::put('auth', $account->ID);
            }

            $input = array_map('trim', Input::all());
            if (!empty($input)) {
                $validator = $this->account->validateUpdatePassword($input);
                if ($validator->passes()) {
                    if($input['confirm_password'] == $input['password']){
                        $updateAccount = Account::find($account->ID);
                        $updateAccount->Password = strtoupper(hash('whirlpool', $input['password']));
                        $updateAccount->password_token_key = '';
                        $updateAccount->password_token_expire = '';
                        $updateAccount->update();

                        Session::flash('f_notice', 'Mật khẩu đã được cập nhật thành công');
                        return Response::json(array('status' => 1, 'code' => 'success', 'redirect' => URL::to('/tai-khoan/quan-ly-nhan-vat')));
                    } else {
                        return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => array('confirm_password' => array('Nhập lại mật khẩu không khớp'))));
                    }
                } else {
                    return Response::json(array('status' => 0, 'code' => 'invalid_data', 'messages' => CommonHelper::replaceErrorMessage($validator->messages()->getMessages())));
                }
            } else {
                $this->layout = View::make('layouts.application');
                $view = View::make('account.updatepassword')->with(array(
                    'currentAccount' => $account
                ));

                $this->layout->content = $view;
            }
        } else {
            Session::flash('f_error', 'Link đổi mật khẩu không chính xác hoặc đã hết hạn ');
            return Redirect::to('/tai-khoan/quan-ly-nhan-vat');
        }
    }


    /**
     * @return json response
     */
    public function updateEmail($id) {
        $account = Account::whereRaw('email_token_key = ? and email_token_expire >= ?', [$id, date('Y-m-d H:i:s')])->first();

        if (!empty($account)) {
            if (!Session::has('auth')) {
                Session::put('auth', $account->ID);
            }

                $updateAccount = Account::find($account->ID);
                $updateAccount->Email = $updateAccount->email_new;
                $updateAccount->email_token_key = '';
                $updateAccount->email_token_expire = '';
                $updateAccount->email_new = '';
                $updateAccount->Password_Clear = '';
                $updateAccount->update();

                Session::flash('f_notice', 'Email đã được cập nhật thành công');
                return Redirect::to('/tai-khoan/quan-ly-nhan-vat');
        } else {
            Session::flash('f_error', 'Link đổi email không chính xác hoặc đã hết hạn ');
            return Redirect::to('/tai-khoan/quan-ly-nhan-vat');
        }
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

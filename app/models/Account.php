<?php
use Illuminate\Auth\UserInterface;
class Account extends Eloquent implements UserInterface {
    
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    
    public function getPresenter() {}
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    }
    public function getAuthIdentifier() {}
    public function getAuthPassword() {}
    public function getRememberToken() {}
    public function setRememberToken($value) {}
    public function getRememberTokenName() {}
    
    
    /**
     * check login of account
     * @return bool
     * @author Thuan Truong
     */
    public function checkLogin($username, $password){
        $account = Account::whereRaw("username = ? and status = ?", array($username, 1))->first();
        
        if(!empty($account)){
            if (Hash::check($password, $account->password)) {
                return $account;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    
    /**
     * check login of account application
     * @return bool
     * @author Thuan Truong
     */
    public function checkLoginApp($username, $password){
        $account = Account::whereRaw("UserName = ? and Disabled = ?", array($username, 0))->first();
        
        if(!empty($account)){
            if(strtoupper(hash('whirlpool', $password)) == $account->Password){
                return $account;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    
    /**
     * validate credentials
     * @author Thuan Truong
     */
    public function validateCredentials($input){
         $rules = array(
            'username' => 'required|min:3|max:50',
            'password'=>'required|min:6|max:30'
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * validate credentials
     * @author Thuan Truong
     */
    public function validateChangePassword($input){
        $rules = array(
            'password'=>'required|min:6|max:30'
        );

        $validator = Validator::make($input, $rules);
        return $validator;
    }


    /**
     * validate credentials
     * @author Thuan Truong
     */
    public function validateChangeEmail($input){
        $rules = array(
            'password'=>'required|min:6|max:30',
            'email' => 'required|max:50|email|unique:accounts|email',
        );

        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    
    /**
     * validate register
     * @author Thuan Truong
     */
    public function validateRegister($input){
         $rules = array(
            'username' => 'required|min:5|max:50|account|unique:accounts',
            'email' => 'required|max:50|email|unique:accounts|email',
            'password'=>'required|min:6|max:30',
            'confirm_password'=>'required|min:6|max:30',
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * validate register
     * @author Thuan Truong
     */
    public function validateUpdatePassword($input){
        $rules = array(
            'password'=>'required|min:6|max:30',
            'confirm_password'=>'required|min:6|max:30',
        );

        $validator = Validator::make($input, $rules);
        return $validator;
    }

    /**
     * validate edit
     * @author Thuan Truong
     */
    public function validateEdit($input, $accountId){
         $rules = array(
            'username' => 'required|min:5|max:50|account|unique:accounts,username,'.$accountId,
            'email' => 'required|max:50|email|unique:accounts,email,'.$accountId,
        );
            
        $validator = Validator::make($input, $rules);
        return $validator;
    }
    
    
    /**
     * search account by username
     * @author Thuan Truong
     */
    public function searchAccount($input) {
        $query = Account::query();
        $appends = array();
        
        if (!empty($input)) {   
            if (!empty($input['username'])) {
                $query->where('username', 'LIKE', '%'.$input['username'].'%');
                $appends['username'] = $input['username'];
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            } 
        }
        
        $query->orderBy('created_at', 'desc');
        
        $accounts = $query->paginate(10)->appends($appends);
        return $accounts;
    }
    
    /**
     * get total record
     * @author Thuan Truong
     */
    public function getTotalRecords($input) {
        $query = Account::query();
        
        if (!empty($input)) {   
            if (!empty($input['username'])) {
                $query->where('username', 'LIKE', '%'.$input['username'].'%');
            }
            if (isset($input['status']) && $input['status'] != -1) {
                $query->where('status', $input['status']);
                $appends['status'] = $input['status'];
            } 
        }
        
        $totalRecords = $query->count();
        
        return $totalRecords;
    }
    
    /**
     * create account
     * @author Thuan Truong
     */
    public function saveAccount($input) {
        $account = new Account;
        
        $account->username = $input['username'];
        $account->password = Hash::make($input['password']);
        $account->email = $input['email'];
        $account->status = 1;
        $account->save();

        return $account;
    }
    
    /**
     * create account
     * @author Thuan Truong
     */
    public function updateAccount($input, $accountId) {
        $account = Account::find($accountId);
        
        $account->username = $input['username'];
        $account->email = $input['email'];

        $account->update();
    }
    
}
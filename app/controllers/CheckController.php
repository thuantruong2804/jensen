<?php
class CheckController extends \BaseController {
    //protected $layout = 'layouts.admin';
    public function __construct() {
        parent::__construct();
    }
    public function check($username, $password) {

    //echo $username . " - " . $password;
    $isExistUserName = false;
    $isExistUserName = Account::whereRaw('UserName = ? and Password = ?', [$username, $password])->first();
    	if($isExistUserName) 
	{
        	echo "5dcfbae053cfd29905e90b3c8fdc4b45a1d744f072f1c850ec795ecc825a3c43";
    	}
    	else 
	{
        	echo "5dcfbae053cfd29905e90b3c8fdc4b45ald744f072f1c850ec795cec825a3c43";
    	}
    }
}
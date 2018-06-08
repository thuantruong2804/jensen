<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('adminFilter', function(){
    if (!Session::has('auth')) {
        return Redirect::to('admin/login');
    } else {
        $currentUser = BaseController::getAccountInfo();
        if ($currentUser->AdminLevel != 99999 && $currentUser->AdminLevel != 1338 && $currentUser->AdminLevel != 1337 && $currentUser->AdminLevel != 4) {
            Session::flash('f_error', 'Không đủ quyền truy cập');
            return Redirect::to('/');
        }
    }
    
});

Route::filter('accountFilter', function(){
    if (!Session::has('auth')) {
        return Redirect::to('/dang-nhap');
    }
});

Route::filter('passQuestionFilter', function(){
    $passQuestion = isset($_COOKIE['pass_question']) ? $_COOKIE['pass_question'] : '';
    if (!$passQuestion) {
        return Redirect::to('/cau-hoi-dang-ky');
    }
});

Route::filter('guestFilter', function(){
    if (Session::has('auth')) {
        return Redirect::to('admin');
    }
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/


Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
App::error(function($exception, $code) {
    switch ($code) {
        case 403:
            return Response::view('errors.403', array(), 403);

        case 404:
            return Response::view('errors.404', array(), 404);

        case 500:
            return Response::view('errors.500', array(), 500);

        default:
            return Response::view('errors.default', array(), $code);
    }
});




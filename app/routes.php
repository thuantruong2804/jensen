<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/**==============================
 * Routes for Application
 *===============================*/
Route::get('/',                                 array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('/lab-duoc-uy-quyen',                array('as' => 'home.lab', 'uses' => 'HomeController@lab'));

Route::get('/tin-tuc',                                  array('as' => 'new.list', 'uses' => 'NewController@listnew'));
Route::get('/tin-tuc/{id}/{slug}.html',                 array('as' => 'new.detail', 'uses' => 'NewController@detail'));


Route::post('/ckeditorImage',               'HomeController@ckeditorImage');
// Upload image file uploader
Route::post('/upload',                      'HomeController@upload');
Route::get('/media/delete/{id}',            'HomeController@deleteMedia');
Route::post('/editCaption',                 'HomeController@editCaption');

/**==============================
 * Routes for Administrator
 *===============================*/
Route::group(array('before'=>'guestFilter'), function(){ 
    Route::any('admin/login',                           array('as' => 'admin.login', 'uses' => 'HomeController@loginAdminAccount'));
});

Route::get('/admin/logout',                             array('as' => 'logout', function () {  
    Session::flush();
    return Redirect::route('admin.login');
}));


Route::group(array('before'=>'adminFilter'), function(){
    Route::get('/admin',                                array('as' => 'admin.dashboard', 'uses' => 'HomeController@adminDashboard'));
    
    // routes for accounts
    Route::get('/admin/account',                       array('as' => 'admin.account', 'uses' => 'AccountController@index'));
    Route::any('/admin/account/create',                array('as' => 'admin.account.create', 'uses' => 'AccountController@create'));
    Route::any('/admin/account/edit/{id}',             array('as' => 'admin.account.edit', 'uses' => 'AccountController@edit'));
    Route::post('/admin/account/status/{id}',          array('as' => 'admin.account.status', 'uses' => 'AccountController@status'));
    Route::post('/admin/account/delete/{id}',          array('as' => 'admin.account.delete', 'uses' => 'AccountController@delete'));

    // routes for news
    Route::get('/admin/new',                       array('as' => 'admin.new', 'uses' => 'NewController@index'));
    Route::any('/admin/new/create',                array('as' => 'admin.new.create', 'uses' => 'NewController@create'));
    Route::any('/admin/new/edit/{id}',             array('as' => 'admin.new.edit', 'uses' => 'NewController@edit'));
    Route::post('/admin/new/status/{id}',          array('as' => 'admin.new.status', 'uses' => 'NewController@status'));
    Route::post('/admin/new/delete/{id}',          array('as' => 'admin.new.delete', 'uses' => 'NewController@delete'));

    // routes for labs
    Route::get('/admin/lab',                       array('as' => 'admin.lab', 'uses' => 'LabController@index'));
    Route::any('/admin/lab/create',                array('as' => 'admin.lab.create', 'uses' => 'LabController@create'));
    Route::any('/admin/lab/edit/{id}',             array('as' => 'admin.lab.edit', 'uses' => 'LabController@edit'));
    Route::post('/admin/lab/status/{id}',          array('as' => 'admin.lab.status', 'uses' => 'LabController@status'));
    Route::post('/admin/lab/delete/{id}',          array('as' => 'admin.lab.delete', 'uses' => 'LabController@delete'));


});

Route::get('/sendmail',                           array('as' => 'send.mail', 'uses' => 'AccountController@sendMail'));
    
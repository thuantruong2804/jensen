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
Route::get('/gioi-thieu',                       array('as' => 'home.about', 'uses' => 'HomeController@about'));
Route::get('/lab-duoc-uy-quyen',                array('as' => 'home.lab', 'uses' => 'HomeController@lab'));
Route::get('/tra-cuu-bao-hanh',                 array('as' => 'home.card', 'uses' => 'HomeController@card'));
Route::get('/lien-he',                          array('as' => 'home.contact', 'uses' => 'HomeController@contact'));

Route::get('/tin-tuc',                                  array('as' => 'new.list', 'uses' => 'NewController@listnew'));
Route::get('/tin-tuc/{id}/{slug}.html',                 array('as' => 'new.detail', 'uses' => 'NewController@detail'));
Route::get('/san-pham',                                 array('as' => 'new.product', 'uses' => 'NewController@product'));
Route::get('/san-pham/{id}/{slug}.html',                 array('as' => 'new.productdetail', 'uses' => 'NewController@productdetail'));

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

    // routes for cards
    Route::get('/admin/card',                       array('as' => 'admin.card', 'uses' => 'CardController@index'));
    Route::any('/admin/card/create',                array('as' => 'admin.card.create', 'uses' => 'CardController@create'));
    Route::any('/admin/card/edit/{id}',             array('as' => 'admin.card.edit', 'uses' => 'CardController@edit'));
    Route::post('/admin/card/status/{id}',          array('as' => 'admin.card.status', 'uses' => 'CardController@status'));
    Route::post('/admin/card/delete/{id}',          array('as' => 'admin.card.delete', 'uses' => 'CardController@delete'));
    Route::post('/admin/card/import',               array('as' => 'admin.card.import', 'uses' => 'CardController@import'));


});

Route::get('/sendmail',                           array('as' => 'send.mail', 'uses' => 'AccountController@sendMail'));
    

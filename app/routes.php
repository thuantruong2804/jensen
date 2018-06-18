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

Route::get('/san-pham/{id}/{slug}.html',                array('as' => 'product.detail', 'uses' => 'ProductController@detail'));
Route::get('/san-pham',                                 array('as' => 'product.search', 'uses' => 'ProductController@search'));
Route::get('/san-pham/danh-muc/{id}/{slug}.html',       array('as' => 'product.category', 'uses' => 'ProductController@category'));

Route::get('/tin-tuc',                                  array('as' => 'new.list', 'uses' => 'NewController@listnew'));
Route::get('/thong-ke',                                 array('as' => 'home.analytic', 'uses' => 'HomeController@analytic'));
Route::get('/tin-tuc/{id}/{slug}.html',                 array('as' => 'new.detail', 'uses' => 'NewController@detail'));

Route::group(array('before'=>'accountFilter'), function(){
    Route::get('/ticket/danh-sach',           array('as' => 'ticket.accountlist', 'uses' => 'TicketController@accountlist'));
    Route::any('/ticket/yeu-cau',             array('as' => 'ticket.request', 'uses' => 'TicketController@request'));
    Route::any('/ticket/chi-tiet/{id}',       array('as' => 'ticket.detail', 'uses' => 'TicketController@detail'));
    Route::post('/ticket/confirm',             array('as' => 'ticket.confirm', 'uses' => 'TicketController@confirm'));
    
});

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

    Route::get('/admin/inbox',                          array('as' => 'admin.inbox', 'uses' => 'InboxController@index'));
	Route::any('/admin/inbox/create',                   array('as' => 'admin.inbox.create', 'uses' => 'InboxController@create'));
    Route::get('/admin/inbox/{id}',                     array('as' => 'admin.inbox.detail', 'uses' => 'InboxController@detail'));

    // routes for news
    Route::get('/admin/new',                       array('as' => 'admin.new', 'uses' => 'NewController@index'));
    Route::any('/admin/new/create',                array('as' => 'admin.new.create', 'uses' => 'NewController@create'));
    Route::any('/admin/new/edit/{id}',             array('as' => 'admin.new.edit', 'uses' => 'NewController@edit'));
    Route::post('/admin/new/status/{id}',          array('as' => 'admin.new.status', 'uses' => 'NewController@status'));
    Route::post('/admin/new/delete/{id}',          array('as' => 'admin.new.delete', 'uses' => 'NewController@delete'));

    //Routes for categories
    Route::get('/admin/category',                   array('as' => 'admin.category', 'uses' => 'CategoryController@index'));
    Route::any('/admin/category/create',            array('as' => 'admin.category.create', 'uses' => 'CategoryController@create'));
    Route::any('/admin/category/edit/{id}',         array('as' => 'admin.category.edit', 'uses' => 'CategoryController@edit'));
    Route::post('/admin/category/status/{id}',      array('as' => 'admin.category.status', 'uses' => 'CategoryController@status'));
    Route::post('/admin/category/delete/{id}',      array('as' => 'admin.category.delete', 'uses' => 'CategoryController@delete'));
    
    //Routes for product
    Route::get('/admin/product',                    array('as' => 'admin.product', 'uses' => 'ProductController@index'));
    Route::any('/admin/product/create',             array('as' => 'admin.product.create', 'uses' => 'ProductController@create'));
    Route::any('/admin/product/edit/{id}',          array('as' => 'admin.product.edit', 'uses' => 'ProductController@edit'));
    Route::post('/admin/product/status/{id}',       array('as' => 'admin.product.status', 'uses' => 'ProductController@status'));
    Route::post('/admin/product/delete/{id}',       array('as' => 'admin.product.delete', 'uses' => 'ProductController@delete'));
    
    Route::get('/admin/ticket',                           array('as' => 'admin.ticket', 'uses' => 'TicketController@index'));
    Route::any('/admin/ticket/admindetail/{id}',          array('as' => 'admin.admindetail', 'uses' => 'TicketController@admindetail'));
    Route::post('/admin/ticket/adminconfirm',             array('as' => 'admin.adminconfirm', 'uses' => 'TicketController@adminconfirm'));
    Route::post('/admin/ticket/status/{id}',              array('as' => 'admin.ticket.status', 'uses' => 'TicketController@status'));
});

Route::get('/sendmail',                           array('as' => 'send.mail', 'uses' => 'AccountController@sendMail'));
    
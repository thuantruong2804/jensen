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
Route::any('/cau-hoi-dang-ky',                  array('as' => 'question.list.register', 'uses' => 'QuestionController@checkAnswer'));
Route::any('/gvc-terms',                        array('as' => 'question.gvc.terms', 'uses' => 'QuestionController@gvcterms'));
Route::any('/samp-terms',                       array('as' => 'question.samp.terms', 'uses' => 'QuestionController@sampterms'));
Route::any('/hoan-tat-dang-ky',                 array('as' => 'account.register.finish', 'uses' => 'QuestionController@finishregister'));

Route::group(array('before'=>'passQuestionFilter'), function() {
    Route::any('/dang-ky', array('as' => 'account.register', 'uses' => 'AccountController@register'));
});
Route::get('/kich-hoat-tai-khoan/{id}', array('as' => 'account.active', 'uses' => 'AccountController@active'));


Route::any('/dang-nhap',                                array('as' => 'account.login', 'uses' => 'AccountController@login'));
Route::any('/quen-mat-khau',                            array('as' => 'account.forgot', 'uses' => 'AccountController@forgot'));
Route::any('/tai-khoan/cap-nhat-mat-khau/{id}',         array('as' => 'account.update.password', 'uses' => 'AccountController@updatePassword'));
Route::any('/tai-khoan/cap-nhat-email/{id}',            array('as' => 'account.update.email', 'uses' => 'AccountController@updateEmail'));
Route::get('/san-pham/{id}/{slug}.html',                array('as' => 'product.detail', 'uses' => 'ProductController@detail'));
Route::get('/san-pham',                                 array('as' => 'product.search', 'uses' => 'ProductController@search'));
Route::get('/san-pham/danh-muc/{id}/{slug}.html',       array('as' => 'product.category', 'uses' => 'ProductController@category'));

Route::get('/vip.html',                                 array('as' => 'vip.list', 'uses' => 'VipController@listvip'));
Route::get('/tin-tuc',                                  array('as' => 'new.list', 'uses' => 'NewController@listnew'));
Route::get('/thong-ke',                                 array('as' => 'home.analytic', 'uses' => 'HomeController@analytic'));
Route::get('/thong-tin-server',                         array('as' => 'new.list', 'uses' => 'HomeController@serverinfo'));
Route::get('/tin-tuc/{id}/{slug}.html',                 array('as' => 'new.detail', 'uses' => 'NewController@detail'));

Route::get('/tai-khoan/xep-hang',                       array('as' => 'account.ranking', 'uses' => 'AccountController@ranking'));
Route::get('/tai-khoan/vi-pham',                        array('as' => 'account.banned', 'uses' => 'AccountController@banned'));
Route::get('/dailydiscount',                            array('as' => 'dailydiscount', 'uses' => 'HomeController@dailydiscount'));
Route::get("launcher/statics", function() {
    //return File::get(public_path() . '/Launcher/statics/index.php');
    ob_start();
    require(public_path() . '/Launcher/statics/index.php');
    return ob_get_clean();
});

Route::get("checkexist/{username}/{password}", array('as' => 'checkuser', 'uses' => 'CheckController@check'));

Route::group(array('before'=>'accountFilter'), function(){
    Route::get('/tai-khoan/quan-ly-nhan-vat',                   array('as' => 'account.characters', 'uses' => 'AccountController@characters'));
    Route::any('/tai-khoan/quan-ly-nhan-vat/tao-moi',           array('as' => 'account.characters.create', 'uses' => 'AccountController@createcharacter'));
    Route::any('/tai-khoan/quan-ly-nhan-vat/chi-tiet/{id}',     array('as' => 'account.characters.edit', 'uses' => 'AccountController@editcharacter'));

    Route::any('/tai-khoan/hop-thu',                    array('as' => 'inbox.user.list', 'uses' => 'InboxController@userlist'));
    Route::any('/tai-khoan/hop-thu/chi-tiet/{id}',      array('as' => 'inbox.user.detail', 'uses' => 'InboxController@userdetail'));

    Route::post('/tai-khoan/doi-mat-khau',               array('as' => 'account.change.password', 'uses' => 'AccountController@changePassword'));
    Route::post('/tai-khoan/doi-email',                  array('as' => 'account.change.email', 'uses' => 'AccountController@changeEmail'));

    Route::get('/nap-the',                      array('as' => 'transaction.charging', 'uses' => 'TransactionController@charging'));
    Route::post('/nap-the/api',                 array('as' => 'transaction.chargingapi', 'uses' => 'TransactionController@chargingapi'));
    Route::get('/nap-the/lich-su',             array('as' => 'transaction.history', 'uses' => 'TransactionController@history'));
    Route::post('/san-pham/mua-ngay/{id}',      array('as' => 'product.payment', 'uses' => 'ProductController@payment'));
    Route::post('/vip/mua-ngay/{id}',           array('as' => 'vip.payment', 'uses' => 'VipController@payment'));
    
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

Route::get('/dang-xuat',                     array('as' => 'logout', function () {  
    Session::flush();
    return Redirect::route('home');
}));
 

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

    Route::get('/admin/character',                       array('as' => 'admin.character', 'uses' => 'AccountController@characterlist'));
    Route::post('/admin/character/status/{id}',          array('as' => 'admin.character.status', 'uses' => 'AccountController@characterstatus'));
    Route::post('/admin/character/delete',               array('as' => 'admin.character.delete', 'uses' => 'AccountController@characterdelete'));
	
    Route::get('/admin/inbox',                          array('as' => 'admin.inbox', 'uses' => 'InboxController@index'));
	Route::any('/admin/inbox/create',                   array('as' => 'admin.inbox.create', 'uses' => 'InboxController@create'));
    Route::get('/admin/inbox/{id}',                     array('as' => 'admin.inbox.detail', 'uses' => 'InboxController@detail'));

    // routes for news
    Route::get('/admin/new',                       array('as' => 'admin.new', 'uses' => 'NewController@index'));
    Route::any('/admin/new/create',                array('as' => 'admin.new.create', 'uses' => 'NewController@create'));
    Route::any('/admin/new/edit/{id}',             array('as' => 'admin.new.edit', 'uses' => 'NewController@edit'));
    Route::post('/admin/new/status/{id}',          array('as' => 'admin.new.status', 'uses' => 'NewController@status'));
    Route::post('/admin/new/delete/{id}',          array('as' => 'admin.new.delete', 'uses' => 'NewController@delete'));

    // routes for discounts
    Route::get('/admin/discount',                       array('as' => 'admin.discount', 'uses' => 'DiscountController@index'));
    Route::any('/admin/discount/create',                array('as' => 'admin.discount.create', 'uses' => 'DiscountController@create'));
    //Route::any('/admin/new/discount/{id}',              array('as' => 'admin.discount.edit', 'uses' => 'DiscountController@edit'));
    //Route::post('/admin/discount/status/{id}',          array('as' => 'admin.discount.status', 'uses' => 'DiscountController@status'));
    //Route::post('/admin/discount/delete/{id}',          array('as' => 'admin.discount.delete', 'uses' => 'DiscountController@delete'));

    // routes for voucher
    Route::get('/admin/voucher',                       array('as' => 'admin.voucher', 'uses' => 'VoucherController@index'));
    Route::any('/admin/voucher/create',                array('as' => 'admin.voucher.create', 'uses' => 'VoucherController@create'));
    Route::any('/admin/new/voucher/{id}',              array('as' => 'admin.voucher.edit', 'uses' => 'VoucherController@edit'));
    Route::post('/admin/voucher/status/{id}',          array('as' => 'admin.voucher.status', 'uses' => 'VoucherController@status'));
    Route::post('/admin/voucher/delete/{id}',          array('as' => 'admin.voucher.delete', 'uses' => 'VoucherController@delete'));
    
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
    
    //Routes for vip
    Route::get('/admin/vip',                    array('as' => 'admin.vip', 'uses' => 'VipController@index'));
    Route::any('/admin/vip/edit/{id}',          array('as' => 'admin.vip.edit', 'uses' => 'VipController@edit'));
    
    //Routes for order and transaction
    Route::get('/admin/order',                      array('as' => 'admin.order', 'uses' => 'OrderController@index'));
    Route::get('/admin/ordervip',                   array('as' => 'admin.ordervip', 'uses' => 'OrderVipController@index'));
    Route::get('/admin/transaction',                array('as' => 'admin.transaction', 'uses' => 'TransactionController@index'));
    
    Route::get('/admin/ticket',                           array('as' => 'admin.ticket', 'uses' => 'TicketController@index'));
    Route::any('/admin/ticket/admindetail/{id}',          array('as' => 'admin.admindetail', 'uses' => 'TicketController@admindetail'));
    Route::post('/admin/ticket/adminconfirm',             array('as' => 'admin.adminconfirm', 'uses' => 'TicketController@adminconfirm'));
    Route::post('/admin/ticket/status/{id}',              array('as' => 'admin.ticket.status', 'uses' => 'TicketController@status'));
});

Route::get('/sendmail',                           array('as' => 'send.mail', 'uses' => 'AccountController@sendMail'));
    
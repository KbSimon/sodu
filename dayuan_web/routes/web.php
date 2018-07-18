<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
//登陆
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@dologin');
Route::get('/logout', 'LoginController@logout');
//注册
Route::get('/register', 'RegisterController@register');
Route::post('/register', 'RegisterController@doRegister');

//产品列表
Route::get('/product', 'ProductController@index');
//产品详情
Route::get('/product/{pid}', 'ProductController@show')->where('pid', '[0-9]+')->middleware('user');

//about us
Route::get('/about', 'AboutController@index');

//新闻列表
Route::get('/news', 'NewsController@list');
//新闻详情
Route::get('/news/{nid}', 'NewsController@show')->where('nid', '[0-9]+');

//新手引导页
Route::get('/newbice', 'NewbiceController@show');

Route::group(['prefix'=>'account','namespace'=>'Account', 'middleware' => 'user'],function(){
    //帐号首页
    Route::get('/', 'OverviewController@account');
    //银行添加
    // Route::post('/bank/add', 'Account\BankController@add');
    //个人资料页
    Route::get('/info', 'UserinfoController@info');
    //资金总览
    Route::get('/money', 'MoneyController@list');
    //返利审报
    Route::get('/rebate', 'RebateController@list');
    //修改密码
    Route::post('/passedit', 'UserinfoController@passwordChange');
    //邀请
    Route::get('/invite', 'InviteController@show');

    Route::post('/bankadd', 'UserinfoController@bank_add');

    Route::post('/tixian', 'OverviewController@tixian');
});


//发送短信
Route::post('/sms/send', 'SmsController@send');

//填写返利单
Route::post('receipt/add', 'ReceiptController@add');
//添加提现单
Route::post('withdraw/add', 'WithdrawController@add');
//提现列表页
Route::get('withdraw/', 'WithdrawController@list');

//上传图片页面
Route::get('upload4535fsgsgsg', 'UploadController@index');
//上传图片post操作
Route::post('doupload', 'UploadController@doupload');

//滑动验证码
// Route::get('make', 'CheckController@make');
// Route::get('check', 'CheckController@check');

//验证手机号
Route::get('phone_check', 'RegisterController@checkPhone');
//获取公告
Route::get('notice', 'IndexController@notice');

//忘记密码页面
Route::get('forget', 'LoginController@forget');
//忘记密码操作
Route::post('passreset', 'LoginController@passReset');

//添加返利单
Route::post('rebate/add', 'RebateController@add');

Route::get('/newbice/joinus', 'NewbiceController@joinus');
Route::get('/newbice/questions', 'NewbiceController@questions');

//wap的首页接口
Route::get('/api/product/recomand', 'ProductController@recomand');

//用户是否绑定银行卡
Route::post('/product/getbank', 'ProductController@getbank');

//手机上登录
Route::get('/mlogin', 'LoginController@mLogin');
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +---------------------------------------------------------------

use think\facade\Route;

Route::get('/test', function () {
    // return 'hello,ThinkPHP6!';
    return view('layouts/error');
});

Route::get('hello/:name', 'index/hello');

// Route::prefix('admin')->namespace('Admin')->group(function(){
//     Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
//     Route::group(['middleware' => ['admin']], function () {
//         Route::get('form', function ($id) {
//             return ''jdsj'.$id;
//         });
//     });
// });




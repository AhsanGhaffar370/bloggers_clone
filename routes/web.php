<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin_auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin/login', 'admin/login');

Route::post('admin/login_req',[Admin_auth::class,'login_req']);

Route::group(['middleware'=>['admin_auth']],function(){

    Route::view('/admin/post/list', 'admin/post/list');
    Route::view('/admin/post/add', 'admin/post/add');
    Route::view('/admin/post/editt', 'admin/post/edit');
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    return redirect('/admin/login');
});

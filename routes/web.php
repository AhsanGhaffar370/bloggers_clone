<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin_auth;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\PageController;

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

    Route::get('/admin/post/list', [PostController::class, 'listing'] );

    Route::get('/admin/post/add', [PostController::class, 'view_add'] );
    Route::post('/admin/post/add_post', [PostController::class, 'add'] );

    Route::get('/admin/post/delete-rec/{id}',[PostController::class, 'delete']);

    Route::get('/admin/post/update-rec/{id}',[PostController::class, 'edit']);
    Route::post('/admin/post/update12',[PostController::class, 'update']);

    // Route::view('/admin/post/editt', 'admin/post/edit');
    

    Route::get('/admin/page/list', [PageController::class, 'listing'] );

    Route::get('/admin/page/add', [PageController::class, 'view_add'] );
    Route::post('/admin/page/add_page', [PageController::class, 'add'] );

    Route::get('/admin/page/delete-rec/{id}',[PageController::class, 'delete']);

    Route::get('/admin/page/update-rec/{id}',[PageController::class, 'edit']);
    Route::post('/admin/page/update12',[PageController::class, 'update']);
    
    // Route::view('/admin/page/editt', 'admin/page/edit');
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    return redirect('/admin/login');
});

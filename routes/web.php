<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\UserPageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/',[UserPageController::class,'homePage']);
Route::get('/shop',[UserPageController::class,'shopPage']);   

Route::get('/admin',[AdminController::class,'adminpage']);
Route::get('/show-user',[AdminController::class,'getUsers']);
Route::get('/add-users',[AdminController::class,'addUsers']);
Route::post('/store-user',[AdminController::class,'StoreUsers'])->name('user.created');
Route::get('/single/{{$id}}',[AdminController::class,'getSingleUser']);

//login with facebook
Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);

//For Image
Route::get('/viewimage/{id}', [ProductController::class,'viewImage']);

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('products',ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('category',CategoryController::class);

});


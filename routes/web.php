<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\OrderController;


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

Route::get('/',[UserPageController::class,'homePage'])->name('userhome');
Route::get('/shop',[UserPageController::class,'shopPage']);

Route::post('/search',[SearchController::class,'search'])->name('autocompleate_search');

Route::get('search/image',[SearchController::class,'imageSearch']);
      

Route::get('/admin',[AdminController::class,'adminpage']);
Route::get('/show-user',[AdminController::class,'getUsers']);
Route::get('/add-users',[AdminController::class,'addUsers']);
Route::post('/store-user',[AdminController::class,'StoreUsers'])->name('user.created');
Route::get('/single/{{$id}}',[AdminController::class,'getSingleUser']);

//login with facebook
Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);

//for cart
Route::get('/cart',[CartController::class,'cart']);
Route::get('/addcart/{id}',[CartController::class,'addToCart']);

Route::post('/update-cart',[CartController::class,'updateCart'])->name('cart.update');
Route::post('/remove-from-cart',[CartController::class,'removeCart'])->name('cart.remove');
Route::get('/clear-cart',[CartController::class,'clearAllIteam'])->name('clear.cart');


//for checkout
Route::get('/checkout',[UserPageController::class,'checkout']);

    

//For Image
Route::get('/product-details/{id}', [ProductController::class,'productDetail']);
Route::get('/category-status',[CategoryController::class,'changeStatus']);

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('products',ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('category',CategoryController::class);

    Route::resource('checkout',CheckoutController::class);
    Route::resource('order', OrderController::class);
    Route::resource('profile', ProfileController::class);

});


Route::get('/searching',[UserPageController::class,'searchProduct'])->name('searchProduct');


//For Image
// Route::get('/viewimage/{id}', [ProductController::class,'viewImage']);
Route::delete('/deleteimg/{id}',[ProductController::class,'destroyImg'])->name('delete');


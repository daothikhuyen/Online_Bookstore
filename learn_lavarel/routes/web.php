<?php

use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromoteController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController as ControllersMainController;
use App\Http\Controllers\MangerOrderController;
use App\Http\Controllers\MenuController as ControllersMenuController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::get('admin/users/register',[RegisterController::class,'index'])->name('register');
Route::post('admin/users/register/store',[RegisterController::class,'store']);
Route::get('admin/logout',[LogoutController::class,'logout'])->name('logout');


// Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){

            Route::get('/',[LoginController::class,'index']);
            Route::get('/main',[MainController::class,'index'])->name('admin');

            Route::prefix('menus')->group(function () {
                Route::get('add', [MenuController::class,'create']);
                Route::post('add', [MenuController::class,'store']);

                Route::get('list', [MenuController::class, 'index']);

                //route sữa
                Route::get('edit/{menu}', [MenuController::class, 'show']);
                Route::post('edit/{menu}',[MenuController::class, 'update']);

                // rout xoá
                Route::DELETE('destroy', [MenuController::class,'destroy']);

            });

            Route::prefix('products')->group(function(){
                Route::get('add', [ProductController::class,'create']);
                Route::post('add', [ProductController::class,'store']);
                Route::get('list', [ProductController::class,'index']);
                Route::DELETE('destroy',[ProductController::class,'destroy']);
                Route::get('edit/{product}', [ProductController::class,'show']);
                Route::post('edit/{product}',[ProductController::class,'update']);
            });

            Route::prefix('sliders')->group(function(){
                Route::get('add', [SliderController::class,'create']);
                Route::post('add', [SliderController::class,'store']);
                Route::get('list', [SliderController::class,'index']);
                Route::DELETE('destroy',[SliderController::class,'destroy']);
                Route::get('edit/{slider}', [SliderController::class,'show']);
                Route::post('edit/{slider}',[SliderController::class,'update']);
            });

            Route::prefix('promote')->group(function(){
                Route::get('add', [PromoteController::class,'create']);
                Route::post('add', [PromoteController::class,'store']);
                Route::get('list', [PromoteController::class,'index']);
                Route::DELETE('destroy',[PromoteController::class,'destroy']);
                Route::get('edit/{promote}', [PromoteController::class,'show']);
                Route::post('edit/{promote}',[PromoteController::class,'update']);
            });

            Route::prefix('carts')->group(function(){
                Route::get('order_unconfirmed',[AdminCartController::class,'index1']);
                Route::get('order_confirmed',[AdminCartController::class,'index2']);
                Route::get('order_cancel',[AdminCartController::class,'index3']);
                Route::get('order_detail/{order}',[AdminCartController::class,'show']);
                Route::get('/confirmed/{id}',[AdminCartController::class,'confirmed']);
                Route::post('destroy/{order}',[AdminCartController::class,'cancel_order']);
            });

            Route::get('revenue',[RevenueController::class,'index']);
            Route::get('comment',[CommentController::class,'index']);
            Route::get('comment/feedback/{id}',[CommentController::class,'feedback']);
            Route::post('comment/feedback_admin/{id}',[CommentController::class,'update_feedback']);
            Route::get('account',[MainController::class,'account']);
            Route::DELETE('/accounts/destroy',[MainController::class,'destroy']);

            //Upload ảnh
            Route::post('upload/services',[UploadController::class,'store']);

    });

    Route::get('/',[ControllersMainController::class,'index']);

    Route::prefix('shop')->group(function(){

        Route::get('/{id}-{slug}.html',[ControllersMenuController::class, 'index']);
        Route::post('/{id}-{slug}.html',[ControllersMenuController::class, 'searchFullText']);
        Route::get('/gia/{id}-{price_1}-{price_2}.html',[ControllersMenuController::class, 'search_price']);

    });

    Route::get('product/{id}-{slug}.html',[ControllersProductController::class,'index']);
    Route::post('add-cart',[CartController::class, 'index']);
    Route::get('to_carts',[CartController::class,'show_cart']);

    Route::prefix('carts')->group(function(){

        Route::get('/',[CartController::class,'show_request']);
        Route::get('/delete/{id}',[CartController::class,'remove']);
        Route::post('/update_quantity/{id}',[CartController::class,'update_quantity']);
        Route::get('/checkout',[CartController::class,'checkout']);
        Route::post('/buy',[CartController::class,'buy_order']);
        Route::get('/success',[CartController::class,'success_order']);

    });

    Route::prefix('manger')->group(function(){
        Route::get('/purchase/type/{page}',[MangerOrderController::class, 'index']);
        Route::get('/purchase/detail/{order}',[MangerOrderController::class, 'show']);
        Route::post('/purchase/comment',[MangerOrderController::class,'comment']);
        Route::get('/account/{id}',[UserController::class, 'index']);
    });

// });


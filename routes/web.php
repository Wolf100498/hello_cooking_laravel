<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedProductsController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StocksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/recipes', [RecipesController::class, 'index'])->name('recipes.index');
Route::get('/recipes/addToCart/{id}', [CartController::class, 'addToCart'])->name('recipes.addtocart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');


Route::controller(PaypalController::class)->group(function(){
    Route::get('/checkout', 'Index')->name('paymentindex');
    Route::get('/payment-success', 'PaymentSuccess')->name('paymentsuccess');
    Route::post('/request-payment', 'RequestPayment')->name('requestpayment');
    Route::get('/payment-cancel', 'PaymentCancel')->name('paymentCancel');
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('users/', [UsersController::class, 'index']);

    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('heroslide', HeroSlideController::class);
    Route::resource('featuredproducts', FeaturedProductsController::class);
    Route::resource('stocks', StocksController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('order', OrderController::class);
});


Route::get('order/{order_id}', [OrdersController::class, 'show'])->name('orders.show');
Route::get('orders', [OrdersController::class, 'index'])->name('orders.index');
Route::post('orders', [OrdersController::class, 'store'])->name('orders.store');

Route::get('/{id}', [HomeController::class, 'addToCart'])->name('home.addtocart');

Route::fallback(FallbackController::class);

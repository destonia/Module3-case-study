<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('', [\App\Http\Controllers\admin\MainController::class, 'showRecentOrder'])->name('dashboard');;
    Route::get('/showAllRecentOrder', [\App\Http\Controllers\admin\MainController::class, 'showAllRecentOrder'])->name('showAllRecentOrder');
});
Route::get('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
require __DIR__ . '/auth.php';
Route::prefix('shop')->group(function () {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('products.index');
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
    Route::post('/add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/update-cart', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove-from-cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::get('checkout', [\App\Http\Controllers\CheckoutController::class, 'showCheckout'])->name('checkout.index');
    Route::post('checkout-create', [\App\Http\Controllers\CheckoutController::class, 'createCheckout'])->name('checkout.create');
});

/*Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
});*/


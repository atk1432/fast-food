<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Extensions\ConvertVnToEn;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;


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

Route::prefix('admin')->group(function () {

    Route::post(
        'products/delete', [ProductController::class, 'delete']
    )->name('products.delete');
    Route::resource('products', ProductController::class)->except([
        'show', 'destroy'
    ]);

    Route::resource('users', AuthController::class);

});


Route::get('/', function () {
    return view('index', [
        'products' => Product::all()
    ]);
});

 
Route::get('/product/{id}/{name}', function ($id, $name) {
    $product = Product::findOrFail($id);

    $convert = new ConvertVnToEn($product->name);
    $name_product = urlencode(strtolower($convert->convert()));

    // error_log($name_product);

    if (!$product || $name_product != $name) 
        abort(404);

    return view('product', [
        'product' => $product,
        'Cart' => Cart::class
    ]);
})->name('product_item');


Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');

    Route::post('/login/auth', 'auth')->name('auth');
    Route::post('/register/create', 'create')->name('create');
});


// Route::get(
//     '/profile/{name}', [ProfileController::class, 'profile']
// )->name('profile')->middleware('auth');


Route::controller(CartController::class)
->name('cart.')
->prefix('cart')
->middleware('auth')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/number-carts', 'get_cart_number')->name('get_cart_number');
    Route::get('/payment', 'payment')->name('payment');
    Route::get('{product_id}/{number}/store', 'store')->name('store');
    Route::get('{product_id}/delete', 'delete')->name('delete');
});


Route::controller(OrderController::class)
->name('order.') 
->prefix('order')
->middleware('auth')
->group(function () {
    Route::get('/order/{id}', 'order')->name('order')->where('id', '[0-9]+');
    Route::post('/create', 'create')->name('create');
});
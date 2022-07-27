<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Extensions\ConvertVnToEn;
use App\Models\Product;
use App\Models\User;


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
        'product' => $product
    ]);
})->name('product_item');


Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');

    Route::post('/login/auth', 'auth')->name('auth');
    Route::post('/register/create', 'create')->name('create');
});


Route::get(
    '/profile/{id}/{name}', [ProfileController::class, 'profile']
)->name('profile')->middleware('auth');
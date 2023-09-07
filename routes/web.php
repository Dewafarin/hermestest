<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionheaderController;
use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transactionheader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('transactions', [TransactionheaderController::class,'index'])->name('transactions.index');
    Route::get('transactions/print_pdf', [TransactionheaderController::class,'index'])->name('transactions.pdf');
    Route::get('/transactions/{dc}/{du}', [TransactionheaderController::class, 'detail']);
    Route::get('/home', [ProductController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [ProductController::class, 'index']);
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
    Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');
    Route::post('transaction', [TransactionheaderController::class, 'transaction'])->name('transaction');
});

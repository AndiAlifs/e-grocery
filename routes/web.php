<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () {
   return redirect('/home');
});

Route::get('/home', [ItemController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/item/{id}', [ItemController::class, 'show'])->middleware(['auth'])->name('item_detail');

Route::get('/cart', [ItemController::class, 'show_cart'])->middleware(['auth'])->name('cart');
Route::get('/add_to_cart/{id}', [ItemController::class, 'add_to_cart'])->middleware(['auth'])->name('add_to_cart');
Route::get('/remove_from_cart/{id}', [ItemController::class, 'remove_from_cart'])->middleware(['auth'])->name('remove_from_cart');


require __DIR__.'/auth.php';

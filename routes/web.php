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
    return view('welcome');
});

Route::get('/home', [ItemController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/item/{id}', [ItemController::class, 'show'])->middleware(['auth'])->name('item_detail');


require __DIR__.'/auth.php';

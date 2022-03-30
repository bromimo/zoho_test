<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;

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

Route::get('/', [DealController::class, 'index'])->name('home');
Route::get('/create', [DealController::class, 'create'])->name('deal.create');
Route::post('/store', [DealController::class, 'store'])->name('deal.store');
Route::get('/deal/{deal_id}/task/create', [DealController::class, 'createTask'])->name('deal.task.create');
Route::post('/deal/task/store', [DealController::class, 'storeTask'])->name('deal.task.store');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TypebookController;

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
    return view('layouts.master');
});

Route::get('book', [App\Http\Controllers\BookController::class, 'index']);
Route::post('book/search', [App\Http\Controllers\BookController::class, 'search']);
Route::get('book/edit/{id?}', [App\Http\Controllers\BookController::class, 'edit']);
Route::post('book/update', [App\Http\Controllers\BookController::class, 'update']);
Route::post('book/edit', [App\Http\Controllers\BookController::class, 'insert']);
Route::get('book/remove/{id}', [App\Http\Controllers\BookController::class, 'remove']);

Route::get('typebook', [App\Http\Controllers\TypebookController::class, 'index']);
Route::post('typebook/search', [App\Http\Controllers\TypebookController::class, 'search']);
Route::get('typebook/edit/{id?}', [App\Http\Controllers\TypebookController::class, 'edit']);
Route::post('typebook/update', [App\Http\Controllers\TypebookController::class, 'update']);
Route::post('typebook/edit', [App\Http\Controllers\TypebookController::class, 'insert']);
Route::get('typebook/remove/{id}', [App\Http\Controllers\TypebookController::class, 'remove']);


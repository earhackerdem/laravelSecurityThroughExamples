<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books/{book}', [BookController::class, 'show'])
    ->name('books.show');

// Middleware per route strategy
// Route::get('books/{book}/edit',[BookController::class,'edit'])
// ->middleware('can:update,book')
// ->name('books.edit');

// Route::put('books/{book}',[BookController::class,'update'])
// ->middleware('can:update,book')
// ->name('books.update');


// Route group strategy
// Route::middleware('can:update,book')->group(function () {
//     Route::get('books/{book}/edit', [BookController::class, 'edit'])
//         ->middleware('can:update,book')
//         ->name('books.edit');

//     Route::put('books/{book}', [BookController::class, 'update'])
//         ->middleware('can:update,book')
//         ->name('books.update');
// });

// Resource and constructor stragegy
Route::resource('books', BookController::class);

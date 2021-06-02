<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Resources\BooksController;
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

/**
 * 
 * Route::get('/books', [BooksController::class, 'read']);
 * Route::post('/books', [BooksController::class, 'create']);
 * Route::put('/books/{book}', [BooksController::class, 'update']);
 * Route::delete('/books/{book}', [BooksController::class, 'delete']);
 * 
 * Route::get('/authors', [AuthorController::class, 'read']);
 * Route::post('/authors', [AuthorController::class, 'create']);
 * Route::put('/authors/{author}', [AuthorController::class, 'update']);
 * Route::delete('/authors/{author}', [AuthorController::class, 'delete']);
 */

Route::get('/', function () {
    return view('login');
});

Route::get('/main', [MainController::class, 'index']);
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('/main/successlogin', [MainController::class, 'successlogin']);
Route::get('/main/logout', [MainController::class, 'logout']);

// books
Route::get('/main/books', [BooksController::class, 'read']);

Route::get('/main/createbooks', [BooksController::class, 'create']);
Route::post('/main/books', [BooksController::class, 'store']);

Route::delete('/main/deletebooks/{id}', [BooksController::class, 'destroy']);

Route::get('/main/editbooks/{id}', [BooksController::class, 'edit']);
Route::put('/main/updatebooks/{book}', [BooksController::class, 'update']);
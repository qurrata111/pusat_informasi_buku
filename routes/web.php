<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Resources\BooksController;
use App\Http\Controllers\Resources\AuthorController;

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
    return view('login/form');
});

Route::get('/main', [MainController::class, 'index']);
Route::post('/main/login/check', [MainController::class, 'checklogin']);
Route::get('/main/login/success', [MainController::class, 'successlogin']);
Route::get('/main/logout', [MainController::class, 'logout']);

// books
Route::get('/main/books', [BooksController::class, 'read']);

Route::get('/main/books/create', [BooksController::class, 'create']);
Route::post('/main/books', [BooksController::class, 'store']);

Route::delete('/main/books/delete/{id}', [BooksController::class, 'destroy']);

Route::get('/main/books/edit/{id}', [BooksController::class, 'edit']);
Route::put('/main/books/update/{book}', [BooksController::class, 'update']);

Route::get('/main/books/details/{id}', [BooksController::class, 'details']);

// authors
Route::get('/main/authors', [AuthorController::class, 'read']);

Route::get('/main/authors/create', [AuthorController::class, 'create']);
Route::post('/main/authors', [AuthorController::class, 'store']);

Route::delete('/main/authors/delete/{id}', [AuthorController::class, 'destroy']);

Route::get('/main/authors/edit/{id}', [AuthorController::class, 'edit']);
Route::put('/main/authors/update/{author}', [AuthorController::class, 'update']);

Route::get('/main/authors/details/{id}', [AuthorController::class, 'details']);
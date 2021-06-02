<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Author;
use App\Http\Controllers\Resources\BooksController;
use App\Http\Controllers\Resources\AuthorController;
use App\Http\Controllers\Resources\AuthoredBooksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/books', [BooksController::class, 'read']);
// Route::post('/books', [BooksController::class, 'store']);
// Route::put('/books/{book}', [BooksController::class, 'update']);
// Route::delete('/books/{book}', [BooksController::class, 'delete']);

// Route::get('/authors', [AuthorController::class, 'read']);
// Route::post('/authors', [AuthorController::class, 'create']);
// Route::put('/authors/{author}', [AuthorController::class, 'update']);
// Route::delete('/authors/{author}', [AuthorController::class, 'delete']);

Route::get('/daftar_buku', [AuthoredBooksController::class, 'getBooks']);
Route::get('/details_buku', [AuthoredBooksController::class, 'getDetailsBooks']);
Route::get('/details_buku/{id}', [AuthoredBooksController::class, 'getDetailsBookById']);
Route::get('/search_buku', [AuthoredBooksController::class, 'getSearchedBooks']);
Route::get('/filter_buku', [AuthoredBooksController::class, 'getFilteredBooks']);
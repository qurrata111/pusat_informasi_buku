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

Route::get('/books', [AuthoredBooksController::class, 'getBooks']);
Route::get('/books/details', [AuthoredBooksController::class, 'getDetailsBooks']);
Route::get('/books/details/{id}', [AuthoredBooksController::class, 'getDetailsBookById']);
Route::get('/books/search', [AuthoredBooksController::class, 'getSearchedBooks']);
Route::get('/books/filter', [AuthoredBooksController::class, 'getFilteredBooks']);
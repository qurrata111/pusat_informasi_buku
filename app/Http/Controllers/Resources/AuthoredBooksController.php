<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthoredBooksController extends Controller
{
    public function getBooks() {
        // Get list of the book
        // show title, total_pages, created_date, and created dates
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date')
                        ->get();
            return $this->respondSuccess('Get list of the books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }


    public function getDetailsBooks() {
        // Get detail of the book
        // show title, total_pages, created_date, created dates, images, and content
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date', 'img_url', 'content')
                        ->get();
            return $this->respondSuccess('Get details of the books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }

    public function getDetailsBookById($id) {
        // Get detail of the book, by ID
        // show title, total_pages, created_date, created dates, images, and content
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date', 'img_url', 'content')
                        ->where('id', '=', $id)
                        ->get();
            return $this->respondSuccess('Get details of the books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }

    public function getSearchedBooks() {
        // Get list of the books by the title searching
        request()->validate([
            'query' => 'required'
        ]);

        $query = request('query');
    
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date', 'img_url', 'content')
                        ->where('title', 'like', '%'. $query .'%')
                        ->get();

            return $this->respondSuccess('Get searched books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }

    }

    public function getFilteredBooks() {
        // Get list of the books filtered by author
        request()->validate([
            'filter' => 'required'
        ]);

        $filter = request('filter');
    
        try {
            $books = DB::table('authored_books')
                        ->join('books', 'authored_books.book_id', '=', 'books.id')
                        ->join('authors', 'authored_books.author_id', '=', 'authors.id')
                        ->select('*')
                        ->orderBy('author_id')
                        ->get();
                        
            return $this->respondSuccess('Get filtered books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }
}

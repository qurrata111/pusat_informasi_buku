<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthoredBooksController extends Controller
{    
    /**
     * getBooks
     * Get list of the book
     * Show title, total_pages, created_date, and created dates
     *
     * @return void \Illuminate\Http\JsonResponse
     */
    public function getBooks() {
        
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date')
                        ->get();
            return $this->respondSuccess('Get list of the books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }
        
    /**
     * getDetailsBooks
     * Get detail of the book
     * Show title, total_pages, created_date, created dates, images, and content
     * @return void \Illuminate\Http\JsonResponse
     */
    public function getDetailsBooks() {
       try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date', 'img_url', 'content')
                        ->get();
            return $this->respondSuccess('Get details of the books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }
    
    /**
     * getDetailsBookById
     * Get detail of the book, by ID
     * Show title, total_pages, created_date, created dates, images, and content
     * @param  int $id
     * @return void \Illuminate\Http\JsonResponse
     */
    public function getDetailsBookById($id) {
       
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
 
    /**
     * getSearchedBooks
     * Get list of the books by the title searching
     *
     * @return void \Illuminate\Http\JsonResponse
     */
    public function getSearchedBooks() {
        request()->validate([
            'query' => 'required'
        ]);

        $query = request('query');
    
        try {
            $books = DB::table('books')
                        ->select('title', 'total_pages', 'created_date')
                        ->where('title', 'like', '%'. $query .'%')
                        ->get();

            return $this->respondSuccess('Get searched books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }

    }
    
    /**
     * getFilteredBooks
     * Get list of the books filtered by author
     * 
     * @return void \Illuminate\Http\JsonResponse
     */
    public function getFilteredBooks() {

        $first_name = request('first_name');
        $last_name = request('last_name');

        $books = DB::table('authored_books')
                        ->join('books', 'authored_books.book_id', '=', 'books.id')
                        ->join('authors', 'authored_books.author_id', '=', 'authors.id')
                        ->select('title', 'total_pages', 'created_date');
    
        try {
            if (empty($first_name) && empty($last_name)) {
                $books = $books->orderBy('author_id')->get();
            } 
            
            if (!empty($first_name) && empty($last_name)) {
                $books = $books->where('first_name', 'like', '%'. $first_name .'%')->get();
            } 

            if (empty($first_name) && !empty($last_name)) {
                $books = $books->where('last_name', 'like', '%'. $last_name .'%')->get();
            } 
           
            if (!empty($first_name) && !empty($last_name)) {
                $books = $books
                        ->where('first_name', 'like', '%'. $first_name .'%')
                        ->orWhere('last_name', 'like', '%'. $last_name .'%')
                        ->get();
            }           
            return $this->respondSuccess('Get filtered books succeed!', $books);
        } catch (Exception $e) {
            return $this->respondError($e);
        }
    }    
}

<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{   
    /**
     * store
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function store() {
        request()->validate([
            'title' => 'required',
            'total_pages' => 'required',
            'created_date' => 'required',
            'img_url' => 'required',
            'content' => 'required',
        ]);

        try {
            $success = Book::create([
                'title' => request('title'),
                'total_pages' => request('total_pages'),
                'created_date' => request('created_date'),
                'img_url' => request('img_url'),
                'content' => request('content'),
            ]);
            
            if ($success) {
                return redirect('/main/books')->with('status', 'Buku BERHASIL ditambahkan!');
            } else {
                return redirect('/main/books')->with('status', 'Buku GAGAL ditambahkan!');
            }
        } catch (Exception $e) {
            return redirect('/main/books')->with('status', 'Buku GAGAL ditambahkan!');
        }
    }
    
    /**
     * create
     *
     * @return \Illuminate\View\View
     */
    public function create() {

        return view('books/create');
    }
    
    /**
     * read
     *
     * @return \Illuminate\View\View
     */
    public function read() {
        $books = Book::orderBy('id', 'ASC')->get();;

        return view('books/read', ['books' => $books]);
    }
    
    /**
     * update
     *
     * @param  mixed $book
     * @return Illuminate\Support\Facades\Redirect
     */
    public function update(Book $book){
        request()->validate([
            'title' => 'required',
            'total_pages' => 'required',
            'created_date' => 'required',
            'img_url' => 'required',
            'content' => 'required',
        ]);
    
        try {
            $success = $book->update([
                'title' => request('title'),
                'total_pages' => request('total_pages'),
                'created_date' => request('created_date'),
                'img_url' => request('img_url'),
                'content' => request('content'),
            ]);
            if ($success) {
                return redirect('/main/books')->with('status', 'Buku BERHASIL diupdate!');
            } else {
                return redirect('/main/books')->with('status', 'Buku GAGAL diupdate!');
            }
        } catch (Exception $e) {
            return redirect('/main/books')->with('status', 'Buku GAGAL diupdate!');
        }
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $book = Book::where('id', $id)->get()->first();;
        return view('books/edit', ['book' => $book]);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return Illuminate\Support\Facades\Redirect
     */
    public function destroy($id) {
        try {
            $book = Book::where('id', $id)->delete();
            if ($book) {
                return redirect('/main/books')->with('status', 'Buku BERHASIL dihapus!');
            } else {
                return redirect('/main/books')->with('status', 'Buku GAGAL dihapus!');
            }
        } catch (Exception $e) {
            return redirect('/main/books')->with('status', 'Buku GAGAL dihapus!');
        }
        
    }

    /**
     * details
     * find the authors of the books given id of the book
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function details($id) {
        $details = DB::table('authored_books')
                        ->join('books', 'authored_books.book_id', '=', 'books.id')
                        ->join('authors', 'authored_books.author_id', '=', 'authors.id')
                        ->where('authored_books.book_id', '=', $id)
                        ->select('*')
                        ->get();
        
        return view('books/details', ['details' => $details]);
    }
}

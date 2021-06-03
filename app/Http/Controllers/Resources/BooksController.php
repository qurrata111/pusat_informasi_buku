<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

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
    
        $success = Book::create([
            'title' => request('title'),
            'total_pages' => request('total_pages'),
            'created_date' => request('created_date'),
            'img_url' => request('img_url'),
            'content' => request('content'),
        ]);
        
        return redirect('/main/books')->with('status', 'Buku berhasil ditambahkan!');
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
    
        $success = $book->update([
            'title' => request('title'),
            'total_pages' => request('total_pages'),
            'created_date' => request('created_date'),
            'img_url' => request('img_url'),
            'content' => request('content'),
        ]);
        
        return redirect('/main/books')->with('status', 'Buku berhasil diupdate!');
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
        $book = Book::where('id', $id)->delete();
        return redirect('/main/books')->with('status', 'Buku berhasil dihapus!');
    }
}

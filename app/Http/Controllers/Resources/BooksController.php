<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function store()
    {
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
        
        return redirect('/main/books');
    }

    public function create() {

        return view('createbooks');
    }

    public function read() {
        $books = Book::all();

        return view('readbooks', ['books' => $books]);
    }

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
        
        return redirect('/main/books');
    }

    public function edit($id) {
        $book = Book::where('id', $id)->get()->first();;
        return view('editbooks', ['book' => $book]);
    }

    public function delete(Book $book){
        $success = $book->delete();

        return [
            'success' => $success
        ];
    }

    public function destroy($id) {
        $book = Book::where('id', $id)->delete();
        return redirect('/main/books');
    }
}

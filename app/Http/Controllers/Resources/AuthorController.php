<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{    
    /**
     * store
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function store() {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
    
        try {
            $success = Author::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
            ]);
            if ($success) {
                return redirect('/main/authors')->with('status', 'Penulis BERHASIL ditambahkan!');
            } else {
                return redirect('/main/authors')->with('status', 'Penulis GAGAL ditambahkan!');
            }
        } catch (Exception $e) {
            return redirect('/main/authors')->with('status', 'Penulis GAGAL ditambahkan!');
        }
    }
    
    /**
     * create
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('authors/create');
    }
    
    /**
     * read
     *
     * @return \Illuminate\View\View 
     */
    public function read() {
        $authors = Author::orderBy('id', 'ASC')->get();
        return view('authors/read', ['authors' =>$authors]);
    }
    
    /**
     * update
     *
     * @param  mixed $author
     * @return Illuminate\Support\Facades\Redirect
     */
    public function update(Author $author){
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
    
        try {
            $success = $author->update([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
            ]);

            if ($success) {
                return redirect('/main/authors')->with('status', 'Penulis berhasil diupdate!');
            } else {
                return redirect('/main/authors')->with('status', 'Penulis GAGAL diupdate!');
            }
        } catch (Exception $e) {
            return redirect('/main/authors')->with('status', 'Penulis GAGAL diupdate!');
        }        
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $author = Author::where('id', $id)->get()->first();;
        return view('authors/edit', ['author' => $author]);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return Illuminate\Support\Facades\Redirect
     */
    public function destroy($id) {
        try {
            $author = Author::where('id', $id)->delete();
            
            if ($author) {
                return redirect('/main/authors')->with('status', 'Penulis BERHASIL dihapus!');
            } else {
                return redirect('/main/authors')->with('status', 'Penulis GAGAL dihapus!');
            }
        } catch (Exception $e) {
            return redirect('/main/authors')->with('status', 'Penulis GAGAL dihapus!');
        }
        
    }
    
    /**
     * details
     * find the title of the books given id of the author
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function details($id) {
        $details = DB::table('authored_books')
                        ->join('books', 'authored_books.book_id', '=', 'books.id')
                        ->join('authors', 'authored_books.author_id', '=', 'authors.id')
                        ->where('authored_books.author_id', '=', $id)
                        ->select('*')
                        ->get();
        
        return view('authors/details', ['details' => $details]);
    }
}

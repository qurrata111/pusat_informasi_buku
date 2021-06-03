<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Controllers\Controller;

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
    
        $success = Author::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]);
        return redirect('/main/authors')->with('status', 'Penulis berhasil ditambahkan!');
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
    
        $success = $author->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]);
        return redirect('/main/authors')->with('status', 'Penulis berhasil diupdate!');
        
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
        $author = Author::where('id', $id)->delete();
        return redirect('/main/authors')->with('status', 'Penulis berhasil dihapus!');
    }
}

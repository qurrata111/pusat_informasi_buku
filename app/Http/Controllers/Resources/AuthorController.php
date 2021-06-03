<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
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

    public function create() {
        return view('createauthors');
    }

    public function read() {
        $authors = Author::all();
        return view('readauthors', ['authors' =>$authors]);
    }

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

    public function edit($id) {
        $author = Author::where('id', $id)->get()->first();;
        return view('editauthors', ['author' => $author]);
    }

    public function delete(Author $author){
        $success = $author->delete();

        return [
            'success' => $success
        ];
    }

    public function destroy($id) {
        $author = Author::where('id', $id)->delete();
        return redirect('/main/authors')->with('status', 'Penulis berhasil dihapus!');
    }
}

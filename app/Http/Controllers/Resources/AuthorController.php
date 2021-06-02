<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function create() {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
    
        return Author::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]);
    }

    public function read() {
        return Author::all(); 
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
    
        return [
            'success' => $success
        ];
    }

    public function delete(Author $author){
        $success = $author->delete();

        return [
            'success' => $success
        ];
    }
}

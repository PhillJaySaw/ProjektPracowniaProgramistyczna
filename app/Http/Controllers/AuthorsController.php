<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    public function index(){
        return Author::all();
    }
 
    public function show(Author $author){
        return $author;
    }
 
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'user_id' => 'required',
        ]);
            $author = Author::create($request->all());

            return response()->json($author, 201);
    }
 
    public function update(Request $request, Author $author){
        $author->update($request->all());
 
        return response()->json($author, 200);
    }
 
    public function delete(Author $author){
        $author->delete();
 
        return response()->json(null, 204);
    }
}

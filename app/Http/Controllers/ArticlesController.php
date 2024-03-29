<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index(){
        return Article::all();
    }
 
    public function show(Article $article){
        return $article;
    }
 
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'author_id' => 'required',
        ]);
            $article = Article::create($request->all());

            return response()->json($article, 201);
    }
 
    public function update(Request $request, Article $article){
        $article->update($request->all());
 
        return response()->json($article, 200);
    }
 
    public function delete(Article $article){
        $article->delete();
 
        return response()->json(null, 204);
    }
}

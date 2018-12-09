<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionsController extends Controller
{
    public function index(){
        return Collection::all();
    }
 
    public function show(Collection $collection){
        return $collection;
    }
 
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
            $collection = Collection::create($request->all());

            return response()->json($collection, 201);
    }
 
    public function update(Request $request, Collection $collection){
        $collection->update($request->all());
 
        return response()->json($collection, 200);
    }
 
    public function delete(Collection $collection){
        $collection->delete();
 
        return response()->json(null, 204);
    }
}

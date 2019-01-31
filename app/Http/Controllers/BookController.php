<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function show($id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            return new BookResource($book);
        }
    }

    public function store(Request $request) 
    {
        $book = Book::create($request->all());
        $book->authors()->sync($request->authors);
        return response()->json([
            'id'         => $book->id,
            'created_at' => $book->created_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $book->update($book->all());
            return response()->json(null, 204);
        }
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $book->delete();
            return response()->json(null, 204);
        }
    }
    //
}

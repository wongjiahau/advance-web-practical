<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }
    //
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            return new AuthorResource($author);
        }
    }

    public function store(Request $request)
    {
        $author = Author::create($request->all());
        return response()->json([
            'id'         => $author->id,
            'created_at' => $author->created_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if(!$author) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $author->update($request->all());
            return response()->json(null, 204);
        }
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if(!$author) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $author->delete();
            return response()->json(null, 204);
        }
    }

}

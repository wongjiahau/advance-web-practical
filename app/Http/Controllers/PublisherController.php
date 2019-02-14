<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Http\Resources\PublisherResource;
use App\Http\Resources\PublisherCollection;

class PublisherController extends Controller
{
    public function index()
    {
        return new PublisherCollection(PublisherResource::collection(Publisher::all()));
    }

    public function show($id)
    {
        $publisher = Publisher::find($id);
        if(!$publisher) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            return new PublisherResource($publisher);
        }
    }

    public function store(Request $request) 
    {
        $publisher = Publisher::create($request->all());
        return response()->json([
            'id'         => $publisher->id,
            'created_at' => $publisher->created_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);
        if(!$publisher) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $publisher->update($publisher->all());
            return response()->json(null, 204);
        }
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        if(!$publisher) {
            return response()->json([
                'error'   => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            $publisher->delete();
            return response()->json(null, 204);
        }
    }
    //
}

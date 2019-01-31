<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"       => $this->id,
            "isbn"     => $this->isbn,
            "title"    => $this->title,
            "year"     => $this->year,
            "pubisher" => new PublisherResource($this->publisher),
            "authors"  => AuthorResource::collection($this->authors)
        ];
    }
}
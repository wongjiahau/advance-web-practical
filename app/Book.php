<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'isbn',
        'title',
        'year',
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->hasOne(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
    //
}

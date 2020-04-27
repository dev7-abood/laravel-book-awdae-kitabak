<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{

    protected $table = 'books';

    protected $dates = [
        'handed_in_at' , 't_handed_at'
    ];


    protected $guarded = [];

    public function library()
    {
        return $this->belongsTo(Book::class);
    }
}

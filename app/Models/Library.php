<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'librarys';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class)->withTimestamps();
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}

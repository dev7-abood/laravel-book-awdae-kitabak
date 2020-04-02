<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Book extends Model
{

    use SearchableTrait;


    protected $table = 'books';

    protected $guarded = [];

    public function library()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'books.id' => 10,
            'books.name' => 8,


        ],
//        'joins' => [
//            'posts' => ['users.id','posts.user_id'],
//        ],
    ];








}

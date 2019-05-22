<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

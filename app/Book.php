<?php

namespace App;

use App\Http\Traits\Filtrable;
use App\Http\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Searchable, Filtrable;

    protected $fillable = [
        'name',
        'description'
    ];

    public function getAutorsListAttribute()
    {
        return $this->autors->implode('name', ', ');
    }

    public function autors()
    {
        return $this->belongsToMany(Autor::class);
    }
}

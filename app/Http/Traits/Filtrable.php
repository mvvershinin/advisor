<?php


namespace App\Http\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Filtrable
{
    /**
     * params for query current orders
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSearch(Builder $query, $filter)
    {
        return $query->when($filter, function ($builder) use ($filter) {
            $builder->orderBy($filter);
        });
    }
}

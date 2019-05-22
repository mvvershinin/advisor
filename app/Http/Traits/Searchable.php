<?php


namespace App\Http\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * params for query current orders
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSearch(Builder $query, $search)
    {
        return $query->when($search, function ($builder) use ($search) {
            $builder
                ->where('name', 'ilike', "%$search%")
                ->orWhere('description', 'ilike', "%$search%")
                ->WhereHas('autors', function (Builder $builder) use ($search) {
                    $builder->where('name', 'ilike', "%$search%");
                });
        });
    }
}

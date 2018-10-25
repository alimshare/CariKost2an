<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $hidden = ['created_at','updated_at'];

    public function owner(){
        return $this->belongsTo('App\Model\User')->first();
    }
    
    /**
     * Scope a query to filter room by it's fields and values.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $field
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLike($query, $field, $value)
    {
        return $query->where($field,'LIKE', "%$value%");
    }
    
    /**
     * Scope a query to filter room by range of price.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $field
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePrice($query, $minPrice, $maxPrice)
    {
        return $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

}

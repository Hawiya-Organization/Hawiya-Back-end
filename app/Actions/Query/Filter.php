<?php

namespace App\Actions\Query;
use Illuminate\Database\Eloquent\Builder;

class Filter
{
    const allColumns = [

        'bahr_type_id',
        'is_hor',
        'asr_id',
        'kafiya_id',
        'diwan_id'
    ];

    public static function apply(Builder $query): Builder
    {
        foreach (self::allColumns as $column) {
            if (request()->has($column)) {
                $value = request()->get($column);
                $query->where($column, $value);
            }
        }
        return $query;
    }
}

<?php

namespace App\Traits\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, array $filters): Builder
    {
        $ClassName = 'App\\Http\\Filters\\' . class_basename($this) . 'Filter';
        if(class_exists($ClassName)) {
            return (new $ClassName())->apply($filters, $builder);
        }
        else
            return Builder::newQuery();
    }
}

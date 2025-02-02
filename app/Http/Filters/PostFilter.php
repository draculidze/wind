<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter
{
    public array $keys = [
        'title',
        'content',
        'published_at_from',
        'published_at_to',
        'category_title'
    ];

    public function apply(array $data, Builder $builder): Builder
    {
        foreach ($this->keys as $key) {
            if(isset($data[$key])) {
                $methodName = Str::camel($key);
                if(method_exists($this, $methodName)) {
                    $this->$methodName($builder, $data[$key]);
                }
            }
        }
        return $builder;
    }


    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%$value%");
    }

    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%$value%");
    }

    protected function publishedAtFrom(Builder $builder, $value)
    {
        $builder->where('published_at', '>', $value);
    }

    protected function publishedAtTo(Builder $builder, $value)
    {
        $builder->where('published_at', '<', $value);
    }

    protected function categoryTitle(Builder $builder, $value)
    {
        //$builder->whereRelation('category', 'name',  'like', "%$value%");
        $builder->whereHas('category', function ($b) use ($value) {
           $b->where('name', 'like', "%$value%");
        });
    }
}

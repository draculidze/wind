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
        'category_title',
        'slug',
        'image_path',
        'description',
        'status',
        'is_published',
        'created_at_from',
        'created_at_to',
        'updated_at_from',
        'updated_at_to',
        'profile_login',
    ];

    public function apply(array $data, Builder $builder): Builder
    {
        foreach ($data as $key => $value) {
            if(in_array($key, $this->keys)) {
                $methodName = Str::camel($key);
                if(method_exists($this, $methodName)) {
                    $this->$methodName($builder, $value);
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

    protected function slug(Builder $builder, $value) {
        $builder->where('slug', 'like', "%$value%");
    }
    protected function imagePath(Builder $builder, $value) {
        $builder->where('image_path', 'like', "%$value%");
    }

    protected function description(Builder $builder, $value) {
        $builder->where('description', 'like', "%$value%");
    }

    protected function status(Builder $builder, $value) {
        $builder->where('status', $value);
    }

    protected function isPublished(Builder $builder, $value) {
        $builder->where('is_published', $value);
    }

    protected function createdAtFrom(Builder $builder, $value) {
        $builder->where('created_at', '>', $value);
    }

    protected function createdAtTo(Builder $builder, $value) {
        $builder->where('created_at', '<', "%$value%");
    }

    protected function updatedAtFrom(Builder $builder, $value) {
        $builder->where('updated_at', '>', $value);
    }

    protected function updatedAtTo(Builder $builder, $value) {
        $builder->where('updated_at', '<', $value);
    }

    protected function profileLogin(Builder $builder, $value) {
        $builder->whereRelation('profile', 'login', 'like', "%$value%");
    }

}

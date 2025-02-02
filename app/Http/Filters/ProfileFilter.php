<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProfileFilter
{
    public array $keys = [
        'birthed_at_from',
        'birthed_at_to',
        'registered_at_from',
        'registered_at_to',
        'address',
        'phone',
        'avatar',
        'description',
        'gender',
        'user_name',
        'created_at_from',
        'created_at_to',
        'updated_at_from',
        'updated_at_to',
        'login',
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


    protected function birthedAtFrom(Builder $builder, $value)
    {
        $builder->where('birthed_at', '>=', $value);
    }

    protected function birthedAtTo(Builder $builder, $value)
    {
        $builder->where('birthed_at', '<=', $value);
    }

    protected function registeredAtFrom(Builder $builder, $value)
    {
        $builder->where('registered_at', '>=', $value);
    }

    protected function registeredAtTo(Builder $builder, $value)
    {
        $builder->where('registered_at', '<=', $value);
    }

    protected function address(Builder $builder, $value)
    {
        $builder->where('address', 'like', "%$value%");
    }

    protected function phone(Builder $builder, $value)
    {
        $builder->where('phone', 'like', "%$value%");
    }

    protected function avatar(Builder $builder, $value)
    {
        $builder->where('avatar', 'like', "%$value%");
    }

    protected function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%$value%");
    }

    protected function gender(Builder $builder, $value)
    {
        $builder->where('gender', $value);
    }

    protected function createdAtFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdAtTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', $value);
    }

    protected function updatedAtFrom(Builder $builder, $value)
    {
        $builder->where('updated_at', '>=', $value);
    }

    protected function updatedAtTo(Builder $builder, $value)
    {
        $builder->where('updated_at', '<=', $value);
    }

    protected function login(Builder $builder, $value)
    {
        $builder->where('login', 'like', "%$value%");
    }

    protected function userName(Builder $builder, $value) {
        $builder->whereRelation('user', 'name', 'like', "%$value%");
    }

}

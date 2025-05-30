<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, Logable;

    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    public function tags(): HasManyThrough
    {
        return $this->hasManyThrough(PostTag::class, Post::class);
    }

    public function likes(): HasManyThrough
    {
        return $this->hasManyThrough(PostProfileLike::class, Post::class);
    }
}

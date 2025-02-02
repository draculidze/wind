<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Profile extends Model
{
    use HasFactory, SoftDeletes, Logable;

    protected static function booted(){
        static::retrieved(function (Model $model) {
            dump("message from retrieved Profile class");
        });
    }


    protected $guarded = false;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /*public function likedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_profile_likes');
    }*/

    public function viewedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_profile_views');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags() // HasManyThrough
    {
        return $this->hasManyThrough(PostTag::class, Post::class);
    }

    public function findTags() // HasManyThrough
    {
        $posts = $this->posts;
        $tags = Collection::make();
        foreach ($posts as $post) {
            $tags->push($post->tags->pluck(['pivot']));
        }
        return $tags;
    }

    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class, Post::class, 'profile_id', 'id', null, 'category_id');
    }

    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

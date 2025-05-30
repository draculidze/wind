<?php

namespace App\Models;

use App\Http\Filters\PostFilter;
use App\Traits\Logable;
use App\Traits\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use hasFactory, SoftDeletes, Logable, HasFilter;

    protected $guarded = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /*
    public function likedByProfiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'post_profile_likes');
    }
    */

    public function viewedByProfiles(): BelongsToMany
    {
       return $this->belongsToMany(Profile::class, 'post_profile_views');
    }

    public function comments(): MorphMany
    {
        return $this->MorphMany(Comment::class, 'commentable');
    }

    public function image(): MorphOne
    {
        return $this->MorphOne(Image::class, 'imageable');
    }

    public function likedByProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }

    /*public function scopeFilter(Builder $builder, array $data): Builder
    {
        return (new PostFilter())->apply($data, $builder);
    }*/

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}

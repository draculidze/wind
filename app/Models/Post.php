<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use hasFactory;

    protected $guarded = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likedByProfiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'post_profile_likes');
    }
}

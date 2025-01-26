<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use Logable;

    protected $guarded = false;

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function user(): BelongsTo
    {
        return $this->profile->user(); // реализация связи через профиль
    }

    /*public function post(): MorphTo
    {
        return $this->MorphTo('commentable');
    }*/

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function category(): BelongsTo
    {
        return $this->post->category();
    }
}

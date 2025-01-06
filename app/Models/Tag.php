<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}

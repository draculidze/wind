<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes, Logable;

    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}

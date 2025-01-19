<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /*public function post(): MorphTo
    {
        return $this->morphTo('imageable');
    }*/

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
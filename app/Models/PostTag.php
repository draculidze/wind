<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use Logable;

    protected $table = 'post_tag';
}

<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Logable;
    protected $guarded = false;
}

<?php

namespace App\Models;

use App\Traits\Logable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use Logable;
    protected $guarded = false;
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    public static function getRoles(): array
    {
        return [
            self::ROLE_ADMIN, self::ROLE_USER,
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

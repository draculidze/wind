<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        Log::create([
            'model' => 'App\\Models\\User',
            'event' => 'created',
            'object_id' => $user->id,
            'old_values' => null,
            'new_values' => $user->toJson(),
        ]);
    }

    public function updated(User $user): void
    {
        Log::create([
            'model' => 'App\\Models\\User',
            'event' => 'updated',
            'object_id' => $user->id,
            'old_values' => $user->toJson(),
            'new_values' => json_encode($user->getDirty()),
        ]);
    }

    public function deleted(User $user): void
    {
        Log::create([
            'model' => 'App\\Models\\User',
            'event' => 'deleted',
            'object_id' => $user->id,
        ]);
    }

    public function retrieved(User $user): void
    {
        Log::create([
            'model' => 'App\\Models\\User',
            'event' => 'retrieved',
            'object_id' => $user->id,
        ]);
    }
}

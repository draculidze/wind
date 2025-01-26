<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;

trait Logable
{

    protected static function booted()
    {
        static::created(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'created',
                'object_id' => $model->id,
                'old_values' => null,
                'new_values' => $model->toJson(),
            ]);
        });

        static::updated(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'updated',
                'object_id' => $model->id,
                'old_values' => $model->toJson(),
                'new_values' => json_encode($model->getDirty()),
            ]);
        });

        static::deleted(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'deleted',
                'object_id' => $model->id,
            ]);
        });

        static::retrieved(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'retrieved',
                'object_id' => $model->id,
            ]);
        });
    }
}

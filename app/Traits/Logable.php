<?php

namespace App\Traits;

//use App\Models\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait Logable
{

    protected static function booted()
    {
        static::created(function (Model $model) {
            /*Log::create([
                'model' => get_class($model),
                'event' => 'created',
                'object_id' => $model->id,
                'old_values' => null,
                'new_values' => $model->toJson(),
            ]);*/
            Log::build([
                'driver' => 'single',
                // example - logs/post/created.log
                'path' => storage_path('logs/'. class_basename($model) .'/created.log'),
            ])->info("Log created. ", ['object_id' => $model->id, 'old_value' => null, 'new_value' => $model->toJson()]);
        });

        static::updated(function (Model $model) {
            /*Log::create([
                'model' => get_class($model),
                'event' => 'updated',
                'object_id' => $model->id,
                'old_values' => $model->toJson(),
                'new_values' => json_encode($model->getDirty()),
            ]);*/

            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/'. class_basename($model) .'/updated.log'),
            ])->info("Log updated. ", ['object_id' => $model->id, 'old_value' => $model->toJson(), 'new_value' => json_encode($model->getDirty())]);
        });

        static::deleted(function (Model $model) {
            /*Log::create([
                'model' => get_class($model),
                'event' => 'deleted',
                'object_id' => $model->id,
            ]);*/

            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/'. class_basename($model) .'/deleted.log'),
            ])->info("Log deleted. ", ['object_id' => $model->id]);
        });

        static::retrieved(function (Model $model) {
            /*Log::create([
                'model' => get_class($model),
                'event' => 'retrieved',
                'object_id' => $model->id,
            ]);*/

            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/'. class_basename($model) .'/retrieved.log'),
            ])->info("Log retrieved. ", ['object_id' => $model->id]);
        });
    }
}

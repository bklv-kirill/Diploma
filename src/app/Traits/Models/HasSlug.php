<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{

    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $model->slug = Str::slug($model->name);
        });
    }

}

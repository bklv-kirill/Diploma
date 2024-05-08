<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'region_id',
        'name',
        'slug',
        'geo_lat',
        'geo_lon',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    public $timestamps = false;

    protected $fillable = [
        'district_id',
        'name',
        'slug',
    ];
}

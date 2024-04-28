<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'collages';

    protected $fillable = [
        'name',
        'slug',
    ];
}

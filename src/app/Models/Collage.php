<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'collages';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];
}

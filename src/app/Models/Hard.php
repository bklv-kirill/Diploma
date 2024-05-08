<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hard extends Model
{
    use HasFactory;

    use Searchable;

    public $table = 'hards';

    protected $fillable = [
        'name',
        'slug',
    ];
}

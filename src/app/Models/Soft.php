<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft extends Model
{
    use HasFactory;

    use Searchable;

    public $table = 'softs';

    protected $fillable = [
        'name',
        'slug',
    ];
}

<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'universities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];
}

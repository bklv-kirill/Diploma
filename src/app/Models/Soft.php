<?php

namespace App\Models;

use App\Traits\Api\Searchable;
use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft extends Model
{

    use HasFactory;

    use Searchable;
    use HasSlug;

    public $table = 'softs';

    protected $fillable
        = [
            'name',
            'slug',
        ];

}

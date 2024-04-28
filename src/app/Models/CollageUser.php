<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollageUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'collage_user';

    protected $fillable = [
        'collage_id',
        'user_id',
    ];
}

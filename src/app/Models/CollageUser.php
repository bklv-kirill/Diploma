<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollageUser extends Model
{
    use HasFactory;

    protected $table = 'collage_user';

    public $timestamps = false;

    protected $fillable = [
        'collage_id',
        'user_id',
    ];
}

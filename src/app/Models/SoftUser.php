<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftUser extends Model
{
    use HasFactory;

    public $table = 'soft_user';
    
    public $timestamps = false;

    protected $fillable = [
        'soft_id',
        'user_id',
    ];
}

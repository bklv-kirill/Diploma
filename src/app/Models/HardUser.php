<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardUser extends Model
{
    use HasFactory;

    public $table = 'hard_user';

    public $timestamps = false;

    protected $fillable = [
        'hard_id',
        'user_id',
    ];
}

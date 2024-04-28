<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'university_user';

    protected $fillable = [
        'university_id',
        'user_id',
    ];
}

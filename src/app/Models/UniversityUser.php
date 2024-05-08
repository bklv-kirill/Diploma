<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityUser extends Model
{
    use HasFactory;

    protected $table = 'university_user';

    public $timestamps = false;

    protected $fillable = [
        'university_id',
        'user_id',
    ];
}

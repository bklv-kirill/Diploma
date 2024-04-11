<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'employment_user';

    protected $fillable = [
        'employment_id',
        'user_id',
    ];
}

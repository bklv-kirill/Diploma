<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentUser extends Model
{
    use HasFactory;

    protected $table = 'employment_user';

    public $timestamps = false;

    protected $fillable = [
        'employment_id',
        'user_id',
    ];
}

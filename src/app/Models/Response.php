<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    use HasFactory;

    protected $table = 'responses';

    public $timestamps = false;

    protected $fillable
        = [
            'user_id',
            'vacancy_id',
        ];

}

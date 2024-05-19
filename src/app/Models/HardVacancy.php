<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardVacancy extends Model
{

    use HasFactory;

    protected $table = 'hard_vacancy';

    public $timestamps = false;

    protected $fillable
        = [
            'hard_id',
            'vacancy_id',
        ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentVacancy extends Model
{

    use HasFactory;

    protected $table = 'employment_vacancy';

    public $timestamps = false;

    protected $fillable
        = [
            'employment_id',
            'vacancy_id',
        ];

}

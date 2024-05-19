<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartVacancy extends Model
{

    use HasFactory;

    protected $table = 'chart_vacancy';

    public $timestamps = false;

    protected $fillable
        = [
            'chart_id',
            'vacancy_id',
        ];

}

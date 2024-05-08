<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartUser extends Model
{
    use HasFactory;

    protected $table = 'chart_user';

    public $timestamps = false;

    protected $fillable = [
        'chart_id',
        'user_id',
    ];
}

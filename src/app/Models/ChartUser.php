<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'chart_user';

    protected $fillable = [
        'chart_id',
        'user_id',
    ];
}

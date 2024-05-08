<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MainRole extends Model
{
    use HasFactory;

    protected $table = 'main_roles';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'main_role_id', 'id');
    }
}

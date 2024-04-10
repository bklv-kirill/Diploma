<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Attachable;

    protected $fillable = [
        'first_name',
        'second_name',
        'patronymic',
        'about',
        'gender',
        'phone',
        'email',
        'password',
        'main_role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $allowedFilters = [
        'id' => Where::class,
        'first_name' => Like::class,
        'second_name' => Like::class,
        'patronymic' => Like::class,
        'phone' => Like::class,
        'email' => Like::class,
        'updated_at' => WhereDateStartEnd::class,
        'created_at' => WhereDateStartEnd::class,
    ];

    protected $allowedSorts = [
        'id',
        'first_name',
        'second_name',
        'patronymic',
        'phone',
        'email',
        'updated_at',
        'created_at',
    ];

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->second_name;
    }

    public function avatar(): string
    {
        return $this->attachment()->firstWhere('group', 'avatar')?->getRelativeUrlAttribute() ?? asset('/images/default.jpg');
    }

    public function mainRole(): BelongsTo
    {
        return $this->belongsTo(MainRole::class);
    }
}

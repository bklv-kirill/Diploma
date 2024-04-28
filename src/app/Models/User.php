<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use Attachable;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'second_name',
        'patronymic',
        'city_id',
        'gender',
        'phone',
        'email',
        'about',
        'password',
        'main_role_id',
        'permissions',
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

    public function fullName(bool $notOfficialName = false): string
    {
        return $notOfficialName ?
            $this->second_name . ' ' . $this->first_name :
            $this->second_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }

    public function avatar(): string
    {
        return $this->attachment()->firstWhere('group', 'avatar')?->getRelativeUrlAttribute() ?? asset('/images/default.jpg');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function universities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, 'university_user', 'user_id', 'university_id');
    }
    public function collages(): BelongsToMany
    {
        return $this->belongsToMany(Collage::class, 'collage_user', 'user_id', 'collage_id');
    }

    public function employments(): BelongsToMany
    {
        return $this->belongsToMany(Employment::class, 'employment_user', 'user_id', 'employment_id');
    }

    public function charts(): BelongsToMany
    {
        return $this->belongsToMany(Chart::class, 'chart_user', 'user_id', 'chart_id');
    }
}

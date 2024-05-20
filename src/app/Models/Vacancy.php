<?php

namespace App\Models;

use App\Traits\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Orchid\Screen\AsSource;

class Vacancy extends Model
{

    use HasFactory;

    use Filterable;
    use AsSource;

    protected $table = 'vacancies';

    protected $fillable
        = [
            'title',
            'about',
            'salary_from',
            'salary_to',
            'city_id',
            'user_id',
        ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function employments(): MorphToMany
    {
        return $this->morphToMany(Employment::class, 'employable');
    }

    public function charts(): MorphToMany
    {
        return $this->morphToMany(Chart::class, 'chartable');
    }

    public function softs(): MorphToMany
    {
        return $this->morphToMany(Soft::class, 'softable');
    }

    public function hards(): MorphToMany
    {
        return $this->morphToMany(Hard::class, 'hardable');
    }

}

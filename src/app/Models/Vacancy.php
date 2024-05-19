<?php

namespace App\Models;

use App\Traits\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Screen\AsSource;

class Vacancy extends Model
{

    use HasFactory;

    use Filterable;
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
        ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function employments(): BelongsToMany
    {
        return $this->belongsToMany(Employment::class, 'employment_vacancy',
            'vacancy_id', 'employment_id');
    }

    public function charts(): BelongsToMany
    {
        return $this->belongsToMany(Chart::class, 'chart_vacancy', 'vacancy_id',
            'chart_id');
    }

    public function softs(): BelongsToMany
    {
        return $this->belongsToMany(Soft::class, 'soft_vacancy', 'vacancy_id',
            'soft_id');
    }

    public function hards(): BelongsToMany
    {
        return $this->belongsToMany(Hard::class, 'hard_vacancy', 'vacancy_id',
            'hard_id');
    }

}

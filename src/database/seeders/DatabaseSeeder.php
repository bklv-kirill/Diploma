<?php

namespace Database\Seeders;

use App\Models\Chart;
use App\Models\Employment;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employment::factory()->create([
            'name' => 'Полная занятость',
            'slug' => 'full-employment',
        ]);
        Employment::factory()->create([
            'name' => 'Частичная занятость',
            'slug' => 'partly',
        ]);
        Employment::factory()->create([
            'name' => 'Стажировка',
            'slug' => 'internship',
        ]);

        Chart::factory()->create([
            'name' => 'Полный день',
            'slug' => 'full-day',
        ]);
        Chart::factory()->create([
            'name' => 'Сменный график',
            'slug' => 'replaceable',
        ]);
        Chart::factory()->create([
            'name' => 'Гибкий график',
            'slug' => 'flexible',
        ]);
        Chart::factory()->create([
            'name' => 'Удаленная работа',
            'slug' => 'remotely',
        ]);
        Chart::factory()->create([
            'name' => 'Вахтовый метод',
            'slug' => 'watch',
        ]);
    }
}

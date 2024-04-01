<?php

namespace Database\Seeders;

use App\Models\MainRole;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        MainRole::factory()->create([
            'name' => 'Администратор',
            'slug' => 'admin',
        ]);
        MainRole::factory()->create([
            'name' => 'Работник',
            'slug' => 'worker',
        ]);
        MainRole::factory()->create([
            'name' => 'Рабодатель',
            'slug' => 'employer',
        ]);
    }
}

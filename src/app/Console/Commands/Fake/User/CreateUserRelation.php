<?php

namespace App\Console\Commands\Fake\User;

use App\Models\Chart;
use App\Models\Collage;
use App\Models\Employment;
use App\Models\Hard;
use App\Models\Soft;
use App\Models\University;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserRelation extends Command
{

    protected $signature = 'user-create:relations';

    protected $description = 'Command for creating user relations';

    public function handle()
    {
        $users = User::query()->applicants()->get();

        $users->each(function (User $user) {
            if ((bool)rand(0, 1)) {
                $university = University::query()->inRandomOrder()->first();

                $user->universities()->attach($university->id);
            }

            if ((bool)rand(0, 1)) {
                $collage = Collage::query()->inRandomOrder()->first();

                $user->collages()->attach($collage->id);
            }

            if ((bool)rand(0, 1)) {
                $soft = Soft::query()->inRandomOrder()->first();

                $user->softs()->attach($soft->id);
            }

            if ((bool)rand(0, 1)) {
                $hard = Hard::query()->inRandomOrder()->first();

                $user->hards()->attach($hard->id);
            }

            if ((bool)rand(0, 1)) {
                $employment = Employment::query()->inRandomOrder()->first();

                $user->employments()->attach($employment->id);
            }

            if ((bool)rand(0, 1)) {
                $chart = Chart::query()->inRandomOrder()->first();

                $user->charts()->attach($chart->id);
            }

            $employment = Employment::query()->inRandomOrder()->first();
            $chart      = Chart::query()->inRandomOrder()->first();

            $user->employments()->attach($employment->id);
            $user->charts()->attach($chart->id);
        });

        dd('User relations have been created');
    }

}

<?php

namespace App\Console\Commands;

use App\Models\Chart;
use App\Models\Employment;
use App\Models\User;
use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test:run';

    protected $description = 'Command for test';

    public function handle()
    {
        User::query()->get()->each(function (User $user) {
            $employmentId = Employment::query()->get()->random()->id;
            $chartId = Chart::query()->get()->random()->id;

            $user->employments()->attach($employmentId);
            $user->charts()->attach($chartId);
        });

        dd('test');
    }
}

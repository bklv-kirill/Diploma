<?php

namespace App\Console\Commands\Fake\User;

use App\Models\Collage;
use App\Models\University;
use App\Models\User;
use Illuminate\Console\Command;

class AttachUserEducation extends Command
{
    protected $signature = 'user-education:load';

    protected $description = 'Command for attach user education';

    public function handle()
    {
        $users = User::applicants()->get();

        $users->each(function (User $user) {
            if ((bool)rand(0, 1)) {
                $universityId = University::query()->get()->random()->id;
                $user->universities()->attach($universityId);
            }

            if ((bool)rand(0, 1)) {
                $collageId = Collage::query()->get()->random()->id;
                $user->collages()->attach($collageId);
            }
        });

        dd('User education have been attached');
    }
}

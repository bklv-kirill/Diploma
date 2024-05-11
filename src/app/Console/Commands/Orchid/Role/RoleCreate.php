<?php

namespace App\Console\Commands\Orchid\Role;

use Illuminate\Console\Command;
use Orchid\Platform\Models\Role;

class RoleCreate extends Command
{
    protected $signature = 'roles:create';

    protected $description = 'Command for create roles';

    public function handle()
    {
        Role::query()->create([
            'name' => 'Администратор',
            'slug' => 'admin',
        ]);
        Role::query()->create([
            'name' => 'Соискатель',
            'slug' => 'applicant',
        ]);
        Role::query()->create([
            'name' => 'Работадатель',
            'slug' => 'employment',
        ]);

        dd('All roles have been created');
    }
}

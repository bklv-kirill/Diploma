<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{

    public function register(): void {}

    public function boot(Dashboard $dashboard): void
    {
        $permissions = Itempermission::group('Вакансии')
            ->addPermission('vacancy.create', 'Создание')
            ->addPermission('vacancy.delete', 'Удаление')
            ->addPermission('vacancy.edit', 'Редактирование');

        $dashboard->registerPermissions($permissions);
    }

}

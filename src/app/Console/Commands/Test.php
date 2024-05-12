<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test:run';

    protected $description = 'Command for test';

    public function handle()
    {
        dd('test');
    }
}

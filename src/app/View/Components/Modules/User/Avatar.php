<?php

namespace App\View\Components\Modules\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    public function __construct(
        public string $avatar,
        public string $fullUserName,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.modules.user.avatar');
    }
}

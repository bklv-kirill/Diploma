<?php

namespace App\View\Components\Forms\Modules\AuthRegister;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    public function __construct(
        public string  $link,
        public string  $linkTitle,
        public ?string $beforeLink = null,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.modules.auth-register.text');
    }
}

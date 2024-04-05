<?php

namespace App\View\Components\Forms\AuthRegister;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $name,
        public string $type,
        public string $placeholder,
        public bool   $required = false,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.auth-register.input');
    }
}

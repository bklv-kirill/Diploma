<?php

namespace App\View\Components\Forms\Modules\Password;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $title,
        public string $type,
        public bool $required = false,
        public ?string $name = null,
        public ?string $placeholder = null,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.modules.password.input');
    }
}

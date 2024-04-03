<?php

namespace App\View\Components\Forms\AuthRegister;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $type;
    public string $placeholder;
    public bool $required;

    public function __construct(string $name, string $type, string $placeholder, bool $required = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.auth-register.input');
    }
}

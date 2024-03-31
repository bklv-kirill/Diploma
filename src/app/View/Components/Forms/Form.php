<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public string $action;
    public string $method;

    public function __construct(string $action, string $method)
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.form');
    }
}

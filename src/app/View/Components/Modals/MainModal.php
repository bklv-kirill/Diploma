<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainModal extends Component
{
    public function __construct(public string $modalId, public string $modalTitle)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.modals.main-modal');
    }
}

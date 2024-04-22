<?php

namespace App\View\Components\Modules\Pages\User\Edit;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Contact extends Component
{
    public function __construct(
        public string $contactTitle,
        public string $contact,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.modules.pages.user.edit.contact');
    }
}

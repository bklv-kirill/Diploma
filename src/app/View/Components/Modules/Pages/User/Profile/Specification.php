<?php

namespace App\View\Components\Modules\Pages\User\Profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Specification extends Component
{
    public function __construct(
        public string $specificationTitle,
        public Collection $specifications,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.modules.pages.user.profile.specification');
    }
}

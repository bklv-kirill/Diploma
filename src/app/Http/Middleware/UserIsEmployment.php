<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserIsEmployment
{

    public function handle(Request $request, Closure $next): Response
    {
        return Gate::allows('is-employment')
            ?
            $next($request)
            :
            redirect()->route('platform.main');
    }

}

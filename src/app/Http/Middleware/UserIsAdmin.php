<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserIsAdmin
{

    public function handle(Request $request, Closure $next): Response
    {
        return Gate::allows('is-admin')
            ?
            $next($request)
            :
            redirect()->route('platform.main');
    }

}

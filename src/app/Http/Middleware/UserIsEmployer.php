<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserIsEmployer
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        return (!$user->hasRole('Соискатель')) ?
            $next($request) :
            redirect()->route('main');
    }
}

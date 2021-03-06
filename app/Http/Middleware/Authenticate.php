<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @param $request
     * @param $next
     * @param ...$guards
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, $next, ...$guards)
    {
        if (auth('web')->check()) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

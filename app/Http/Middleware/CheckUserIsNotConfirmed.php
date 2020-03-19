<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class CheckUserIsNotConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $user = User::findOrFail(auth()->id());

        if (!$user->is_confirmed == null || $user->is_confirmed == 1)
        {
            return redirect('/');
        }

        return $next($request);
    }
}

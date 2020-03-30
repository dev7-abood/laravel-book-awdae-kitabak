<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckUserIsConfirmed
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

        if ($user->is_confirmed == null || $user->is_confirmed == 0)
        {
            return redirect()->route('confirmStudentData.index');
        }
        return $next($request);
    }
}

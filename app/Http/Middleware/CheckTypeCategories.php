<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckTypeCategories
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
        $user = User::findOrFail(auth()->id());
        $library_type = $user->categories;

        $data = $library_type->map(function ($item){
            return $item->pivot->categorie_id;
        });

        $route = $request->route('id');
        if (!in_array($route , $data->toArray())){
            return redirect()->route('library_type.index');
        }
        return $next($request);
    }

}

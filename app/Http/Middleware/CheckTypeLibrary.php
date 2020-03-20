<?php

namespace App\Http\Middleware;

use App\Models\Categorie;
use Closure;

class CheckTypeLibrary
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

        $id_cta = $request->route('id_cta');
        $categories = Categorie::findOrFail($id_cta);
        $library = $categories->librarys;


        $data = $library->map(function ($data){
            return $data->pivot->library_id;
        });

        $id_lib = $request->route('id_lib');

        if (!in_array($id_lib , $data->toArray())){
            return redirect()->route('library_type.index');
        }
        return $next($request);

    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\SearchInputLibraryResource;

use App\Models\Categorie;

class SearchController extends Controller
{
    public function SearchInputLibrary(Request $request , $id)
    {
        if ($request->ajax())
        {
            $library = Categorie::find($id)
                ->librarys()
                ->where('name','like', '%'.$request->name.'%')
                ->take(8)
                ->get();

            return SearchInputLibraryResource::collection($library);
        }
        return abort(404);
    }

    public function SearchLibraryType(Request $request , $id)
    {
        if ($request->ajax())
        {
            $library = Categorie::find($id)
                ->librarys()
                ->where('name','like', '%'.$request->name.'%')
                ->paginate(6);
            return $library;
        }
        return abort(404);
    }
}

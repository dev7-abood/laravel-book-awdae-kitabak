<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categorie;
use App\Models\Book;
use App\Models\Library;

class LibraryController extends Controller
{
    public function getLibraryTypeStudent(Request $request , $id)
    {

        if ($request->ajax())
        {
            $categories = Categorie::findOrFail($id);
            $library = $categories->librarys()->paginate(6);

            return response($library , 200);

        }
        return abort(404);
    }


}

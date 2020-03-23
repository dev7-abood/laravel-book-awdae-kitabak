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


    public function numberOfBooksAvailable()
    {
        $library = Library::find(4);
        $books_count_number_available = $library->books->whereNull('user_id')->count();
        $total_count_number_books = $library->books->count();
        $library = $library->books;

        return response([['book count' =>$library_count] , $library]);

    }

    public function numberOfBooksNotAvailable()
    {

    }

}

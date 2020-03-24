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


    public function numberOfBooks($id , Request $request)
    {

        $categories = Categorie::findOrFail($id);
        $library = $categories->librarys()->paginate(6);

//        return $library;





        $library = Library::find($id);
            $number_of_available_books = $library->books->whereNull('user_id')->count();
            $number_of_reserved_books = $library->books->whereNotNull('user_id')->count();
            $total_number_of_books = $library->books->count();

            return response(
                [
                    'books' => $library->books,
                    'number_of_available_books' => $number_of_available_books,
                    'number_of_reserved_books' => $number_of_reserved_books,
                    'total_number_of_books' => $total_number_of_books,
                ]
            );

    }


}

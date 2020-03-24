<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Categorie;
use App\Models\Library;

class NumberOfBooksController extends Controller
{
    public function totalNumberOfCategory(Request $request)
    {
        if ($request->ajax())
        {
            $user = User::findOrFail(auth()->id() || auth('api')->id());
            $category = $user->categories;
            $data = $category->map(function ($i){
                return $i->pivot->categorie_id;
            });
            $count_number = [];
            foreach ($data as $cat)
            {
                $categorie = Categorie::findOrFail($cat);
                $librarys_id = $categorie->librarys->map(function ($i) {
                    return $i->pivot->library_id;
                });
                $count = 0;
                foreach ($librarys_id as $id)
                {
                    $library =  Library::findOrFail($id);
                    $count = $library->books->whereNull('user_id')->count() + $count;
                }
                $count_number[$cat] = $count;
            }
            return response($count_number);
        }
        return abort('404');
    }

    public function totalNumberOfLibrary($id)
    {
//        $categories = Categorie::findOrFail($id);
//        $library = $categories->librarys;



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

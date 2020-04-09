<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Categorie;
use App\Models\Library;
use App\Models\Book;

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
                    $count = $library->books->whereNull('temporary_reservation_user_id')->whereNull('reservation_user_id')->count() + $count;
                }
                $count_number[$cat] = $count;
            }
            return response($count_number , 200);
        }
        return abort('404');
    }

    public function numberOfBooksNotAvailableFromLibrary(Request $request)
    {
        if ($request->ajax())
        {
            $library_id = Book::select('library_id')->distinct('library_id')->get();

            $ids = [];
            $book_number = [];
            foreach ($library_id as $id)
            {
                array_push($ids , $id->library_id);
            }

            foreach ($ids as $id){
                $book = Book::where('library_id' , '=' , $id)->whereNotNull('reservation_user_id')->whereNotNull('reservation_user_id')->count();
                $book_number[$id] = $book;
            }
            return response($book_number , 200);
        }
        return abort(404);
    }


    public function numberOfBooksAvailableFromLibrary(Request $request)
    {
        if ($request->ajax())
        {
            $library_id = Book::select('library_id')->distinct('library_id')->get();

            $ids = [];
            $book_number = [];
            foreach ($library_id as $id)
            {
                array_push($ids , $id->library_id);
            }

            foreach ($ids as $id){
                $book = Book::where('library_id' , '=' , $id)->whereNull('temporary_reservation_user_id')->whereNull('reservation_user_id')->count();
                $book_number[$id] = $book;
            }
            return response($book_number , 200);
        }
        return abort(404);
    }

    public function totalNumberOfAllCategory(Request $request)
    {
        if ($request->ajax())
        {
            $data = Categorie::all();
            $ids_of_cat = $data->map(function ($i){
                return $i->id;
            });

            foreach ($ids_of_cat as $id_cat)
            {
                $categorie = Categorie::findOrFail($id_cat);
                $librarys_id = $categorie->librarys->map(function ($i) {
                    return $i->pivot->library_id;
                });
                $count = 0;
                foreach ($librarys_id as $id)
                {
                    $library =  Library::findOrFail($id);
                    $count = $library->books->whereNull('temporary_reservation_user_id')->whereNull('reservation_user_id')->count() + $count;
                }
                $count_number[$id_cat] = $count;
            }
            return response($count_number , 200);
        }
        return abort(404);
    }

}

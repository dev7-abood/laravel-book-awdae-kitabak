<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Library;
use App\Http\Resources\BookResource;


class BookController extends Controller
{
    public function getBooks($id , Request $request)
    {
        if ($request->ajax())
        {
            $library = Library::findOrFail($id);
            $books = $library->books()
                ->where('is_published' , '=' , true)
                ->whereNull('t_handed_user_id')
                ->whereNull('handed_in_user_id')->paginate(6);

            return BookResource::collection($books);
        }
         return abort(404);

    }


    public function userTemporaryReservation(Request $request)
    {
        if (Book::where('t_handed_user_id' , '=' , auth()->id())->count() < 3)
        {

            $book = Book::find($request->id);
            $book->t_handed_user_id = auth()->id();
            $book->save();
            return response(['success' => 'تم حجز الكتاب بنجاح!']);


        }
        else {
            return response(['rejected' => 'لا يمكنك حجز اكثر من ثلاثة كتب!']);
        }



//
    }


}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;



class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('check_type_library');
    }

    public function index($id_lib , $id_cta = null)
    {
        $categories = Library::findOrFail($id_lib);
        $library = $categories->books;

        return $library;

    }
}

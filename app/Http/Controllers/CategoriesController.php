<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;


class CategoriesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('check_type_categories');
//    }

    public function index($cat)
    {
        $categories = Categorie::findOrFail($cat);
        $library = $categories->librarys;
//        ()->paginate(6);

        return $library;

//        return view('library' , compact('library'));
    }



}

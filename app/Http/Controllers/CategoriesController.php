<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;


class CategoriesController extends Controller
{

    public function index($id)
    {


        $categories = Categorie::findOrFail($id);
        $library = $categories->librarys()->paginate(6);

        return view('library' , compact('library'));
    }



}

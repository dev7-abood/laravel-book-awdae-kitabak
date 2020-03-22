<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\User;

class CategoryController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(auth()->id());
        $category = $user->categories;

        return view('category' , compact('category'));
    }
}

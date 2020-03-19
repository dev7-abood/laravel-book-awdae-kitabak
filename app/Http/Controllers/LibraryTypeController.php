<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\User;

class LibraryTypeController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(auth()->id());
        $library_type = $user->categories;

        return view('library_type' , compact('library_type'));
    }
}

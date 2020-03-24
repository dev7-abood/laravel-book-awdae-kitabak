<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Library;


class CategoryController extends Controller
{
    public function getCategoryTypeStudent(Request $request)
    {
        if ($request->ajax())
        {
            $user = User::findOrFail(auth()->id() || auth('api')->id());
            $category = $user->categories;
            return response($category, 200);
        }
        return abort('404');

    }
}

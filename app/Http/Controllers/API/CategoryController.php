<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Resources\CategorysResource;

use App\Models\User;


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

    public function getAllCategory(Request $request)
    {
        if ($request->ajax()) {
            return Categorie::select('id', 'name', 'img_url')->paginate(6);
        }
        return abort('404');
    }
}

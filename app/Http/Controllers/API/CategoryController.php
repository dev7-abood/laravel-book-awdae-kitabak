<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryTypeStudent(Request $request)
    {
        if ($request->ajax()){
            $user = User::findOrFail(auth()->id() || auth('api')->id());
            $category = $user->categories;

            return response($category , 200);
        }
        return abort(404);
    }
}

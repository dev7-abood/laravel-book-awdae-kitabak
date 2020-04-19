<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperFunctionsController extends Controller
{
    public function logout(Request $request)
    {
        if ($request->ajax())
        {
            auth()->logout();
        }
        return abort(404);
    }
}

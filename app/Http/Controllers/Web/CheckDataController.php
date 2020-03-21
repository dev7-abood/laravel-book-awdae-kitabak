<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CheckDataController extends Controller
{
    public function is_auth()
    {
        if (auth()->check())
        {
            return response(['is_auth' => true] , 200);
        }
        return response(['is_auth' => false] , 200);
    }


    public function is_confirmed()
    {
        if (auth()->check()){
            $user = User::findOrFail(auth()->id());
            if ($user->is_confirmed == null || $user->is_confirmed == 0)
            {
                return  response(['is_confirmed' => false] , 200 );
            }else
            {
                return response(['is_confirmed' => true] , 200 );
            }

        }

    }

    public function full_name()
    {
        if (auth()->check()){
            $user = User::findOrFail(auth()->id());
            $fall_name = $user->first_name . "&nbsp;&nbsp;" . $user->last_name;
            return response(['full_name' => $fall_name] , 200);

        }else return response(['full_name' => null] , 200);
    }

}

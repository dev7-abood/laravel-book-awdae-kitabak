<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VueAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        if (auth()->check())
        {
            $data = ['is_auth' => true];

            $dt = Carbon::now();
            $year = $dt->year;
            $data['year'] = $year;


            $user = User::findOrFail(auth()->id());
            $full_name = $user->first_name . "&nbsp;&nbsp;" . $user->last_name;

            $data['full_name'] = $full_name;

            if ($user->is_confirmed == null || $user->is_confirmed == 0)
            {
                  $data['is_confirmed'] = false;
            }else
            {
                  $data['is_confirmed'] = true;
            }

            return view('layouts.app_vue' , compact('data'));

        }

    }
}

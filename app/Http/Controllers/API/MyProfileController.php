<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Categorie;
class MyProfileController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $categories = Categorie::all();
        return view('my-profile.index' , ['user'=> $user , 'categories' => $categories]);
    }


    public function update(Request $request , User $user)
    {
        $db_categorie = Categorie::select('id')->where('name_shorthand' , ['db'])->get()->first();
        $user = User::findOrFail(auth()->id());
        $user->categories()->sync([
            $request->college,
            $db_categorie->id
        ]);

        User::where('id' , '=' , auth()->id())->update($request->except(['_method' , '_token' , 'college']));

    }


}

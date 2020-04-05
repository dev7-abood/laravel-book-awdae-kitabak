<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConformDataStudentRequest;

use App\Models\Categorie;
use App\Models\User;


class ConfirmStudentDataController extends Controller
{

    public function index()
    {
        $categories = Categorie::select('id' , 'name')->whereNotIn('name_shorthand' , ['db'])->get();

        return view('confirmStudentData' , compact('categories'));
    }


    public function store(ConformDataStudentRequest $request , User $user , Categorie $categorie)
    {
        $std = User::findOrFail(auth()->id());
        $std->first_name   = $request->input('first_name');
        $std->last_name    = $request->input('last_name');
        $std->iug_id       = $request->input('iug_id');
        $std->phone        = $request->input('phone');
        $std->gender       = $request->input('gender');
        $std->is_confirmed = 1;
        $std->save();


        $db_categorie = Categorie::select('id')->where('name_shorthand' , ['db'])->get()->first();

        $user = User::findOrFail(auth()->id());
        $user->categories()->sync([
            $request->college,
            $db_categorie->id
        ]);

        return redirect('/');
    }


    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

//احلى تحية من كارم الدالي الي المبرمجين عبد الرحمن حرزالله و عبد الجليل البابا و عصام صلاح و محمود عدوان ابراهيم الصفدي
    public function destroy($id)
    {
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConformDataStudentRequest;

use App\Models\Categorie;
use App\Models\User;


class ConfirmStudentDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categorie::select('id' , 'name')->whereNotIn('name_shorthand' , ['db'])->get();

        return view('confirm_student_data' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        if (auth()->check()){
            $user = User::findOrFail(auth()->id());
            $is_confirmed = $user->is_confirmed == null || $user->is_confirmed == 0 ? false : true;

        }else $is_confirmed = null;

        if (auth()->check()){
            $user = User::findOrFail(auth()->id());
            $fall_name = $user->first_name . "&nbsp;&nbsp;" . $user->last_name;
        }else $fall_name = null;

        return view('components.navbar' , compact('is_confirmed','fall_name'));

    }
}

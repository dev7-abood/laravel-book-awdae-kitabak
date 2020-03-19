<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Carbon\Carbon;


class Footer extends Component
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
        $dt = Carbon::now();
        $year = $dt->year;
        return view('components.footer' , ["year" => $year]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class PagesController extends Controller
{
    //
    public function about()
    {
        $people = [
            'Taylor Otwell',
            'Daylee Rees',
            'Eric Barnes'
        ];
        return view('pages.about',compact('people'));
    }

    public function contact()
    {
        return view('pages.contact');

    }
}

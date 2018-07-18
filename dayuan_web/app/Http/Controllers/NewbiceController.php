<?php

namespace App\Http\Controllers;

class NewbiceController extends Controller
{
    public function show()
    {
        return view('newbice');
    }

    public function joinus()
    {
        return view('joinUs');
    }

    public function questions()
    {
        return view('questions');
    }
}

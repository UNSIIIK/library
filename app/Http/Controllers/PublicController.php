<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function hello(){

        $authors = ['Hemo', 'Marko', 'Ilija'];
        return view('hello', ['autori' => $authors]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    //
    function viewLoad(){
        return view('users',['user'=>['dipali','faiza','radha']]);
    }
}

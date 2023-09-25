<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view('UserNormal.dashboard');
    }

    public function todoshow(){
        return view('UserNormal.todo');
    }
}

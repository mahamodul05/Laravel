<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $role=Auth::user()->role;

        if($role == 0){
            return redirect(route('user.dashboard'));
        }
        if($role == 1){
            return redirect(route('admin.dashboard'));
        }
        if($role == 2){
            return redirect(route('superadmin.dashboard'));
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Systemuser;

class SystemUserController extends Controller
{
    public function registration_view(){
        return view('Systemuser.registration');
    }

    public function register(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $newUser = Systemuser::create($data);

        return redirect(route('registration.view'));
    }

    public function login_view(){
        return view('Systemuser.login');
    }

    public function login(Request $request){
        // $data = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        $username = $request->username;
        $password = $request->password;

        $inuser = Systemuser::all();
        $inusername = $inuser[0]->username;
        $inpassword = $inuser[0]->password;
        if($username==$inusername && $password == $inpassword){
            return redirect(route('dashboard.view'));
        }
        else{
            return redirect(route('Systemuser.login'));
        }
    }


    public function dashboard_view(){
        return redirect(route('login.view'));
    }




    
}
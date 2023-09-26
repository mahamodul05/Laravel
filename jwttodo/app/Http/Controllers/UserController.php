<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function show_todo(){
        $records = Todolist::all();
        return $records;
    }

    public function update_user(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $email = $validator['email'];
        $users = User::where('email', $email)->first(); //User::find($email);
        if ($users) {
            $users->update(['name' => $validator['name']]);
            return response()->json(['message' => 'Column updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }

    public function logout(Request $request){

        $cookie = Cookie::forget('jwt');
        return response([
            'message'=>'Success'
        ]);
    }

}

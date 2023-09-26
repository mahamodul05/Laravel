<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\Todolist;
use App\Models\User;

class SAdminController extends Controller
{
    
    public function create_todo(Request $request){
        $validator = $request->validate([
            'PublishTime'=>'required|date',
            'name'=>'required|string',
            'information'=>'required|string',
        ]);
        $user = Todolist::create($validator);

        $response = [
            'message' => 'User registered successfully',
            'user' => $user,
        ];
        return response()->json($response, 201);
    }

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

    public function search_user(Request $request){
        $email = $request->input('email');
        $users = User::where('email', 'like', '%' . $email . '%')->get();
    
        if (!$users) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['users' => $users], 200);
    }


    public function logout(Request $request){

        $cookie = Cookie::forget('jwt');
        return response([
            'message'=>'Success'
        ]);
    }
}

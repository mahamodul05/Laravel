<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends Controller
{
    public function register(Request $request){

        $validator = $request->validate([
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string',
        ]);
        $user = User::create($validator);

        $response = [
            'message' => 'User registered successfully',
            'user' => $user,
        ];
        return response()->json($response, 201);


        // if($validator->fails()){
        //     return response()->json();
        // }
        // $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
        //     'name'=>'required',
        //     'email'=>'required'
        // ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors(),400);
        // }
        // $user = User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request->password)
        // ]);
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //return response()->json(['message' => 'User not found'], 404);

        $id = $request->input('email');
        
        $users = User::where('email', 'like', '%' . $id . '%')->get();

        return response()->json(['users' => $users], 200);

        // if (!$users) {
        //     return response()->json(['message' => 'User not found. Unregistered.'], 404);
        // }

        // $users->name = $validator['name'];
        // $users->email = $validator['email'];
        // $users->password = bcrypt($validator['password']);
        // $users->save();

        // $response = [
        //     'message' => 'User information updated successfully',
        //     'user' => $users,
        // ];

        // return response()->json($response, 200);
    }
    
    public function search(Request $request)
    {
        $email = $request->input('email');
        $users = User::where('email', 'like', '%' . $email . '%')->get();
    
        if (!$users) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['users' => $users], 200);
    }

    public function login(Request $request){
         if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message' => "Invalid Credentials"
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt',$token,60*24); //1 day
        return response([
            'message'=>'Success'
        ])->withCookie($cookie);
    }


    public function logout(Request $request){

        $cookie = Cookie::forget('jwt');
        return response([
            'message'=>'Success'
        ]);

    }
}

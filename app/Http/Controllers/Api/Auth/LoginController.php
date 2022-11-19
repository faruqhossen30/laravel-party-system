<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'status' => true,
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'User Successfully Registered !',
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required'
        ]);

        //
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken(uniqid())->plainTextToken;
                $user['token'] = $token;
                return response()->json([
                    'message' => 'successfully login',
                    'token' => $token,
                    'data' => $user
                ]);
            };
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ],400);
        }

        return response()->json([
            'message' => 'Opps ! Email or password wrong !'
        ],401);
    }

    // Logout
    public function logout(Request $request)
    {
        $user = $request->user();
        // Revoke all tokens...
        // $user->tokens()->delete();
        // Revoke a specific token...
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'User Successfully logged out',
        ]);
    }
}




//////
// public function login(Request $request)
//     {
//         $request->validate([
//             'email'         => 'required|email',
//             'password'      => 'required'
//         ]);

//         //
//         try{
//             if(Auth::attempt($request->only('email', 'password'))){
//                 $user = Auth::user();
//                 return response()->json([
//                     'message'=> 'successfully login',
//                     'token'=> 'token',
//                     'data'=> $user
//                 ]);
//             };
//         }catch(Exception $exception){
//             return response()->json([
//                 'message'=> $exception->getMessage()
//             ]);
//         }

//         return response()->json([
//             'message'=> 'invalid email'
//         ]);



//     }

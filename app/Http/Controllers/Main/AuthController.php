<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;




class AuthController extends Controller
{



    public function login(LoginFormRequest $request){

        $data=$request->validated();
        if(Auth::attempt($data)){
            /**
             * @var User
             */
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            if (!$user->hasVerifiedEmail()) {
                event(new Registered($user));
            }
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }


    }

    public function register(RegisterFormRequest $request){
        $data=$request->validated();
        $user = User::create($data);
        $token = $user->createToken('authToken')->plainTextToken;
        event(new Registered($user));
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);

    }

    public function logout(){

        $user=request()->user();
        $user->tokens()->delete();
        return response()->noContent();

    }

    public function forgotPassword(){

    }

    public function resendEmailVerificationLink()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        if ($user && $user->hasVerifiedEmail()) {
            return response()->json(["message" => __("auth.EMAIL ALREADY VERIFIED")], 400);
        }
        event(new Registered($user));
        return response()->json(["message" => __("auth.EMAIL SENT")], 200);
    }

}

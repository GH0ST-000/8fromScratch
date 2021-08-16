<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public  function  store(LoginRequest $request){
         $atribute=$request->validated();
         $user=User::create($atribute);
         auth()->login($user);
         return redirect('/')->with('success','Your Account Has been Created !');
    }
}

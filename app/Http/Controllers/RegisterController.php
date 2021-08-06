<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public  function  store(){
    $atribute=     \request()->validate([
            'name'=>'required|max:255|min:2',
            'username'=>'required|max:255|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|max:255|min:7'
         ]);

         $user=User::create($atribute);
         auth()->login($user);
         return redirect('/')->with('success','Your Account Has been Created !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Remove unused imports
# Remove unnessesary blank lines
# Extract validation in it's own request

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    } # add blank line
    public  function  destroy(){
        auth()->logout();
        return redirect('/')->with('success',"GoodBye <3 !");
    }

    public  function store(){
        $atributes=\request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (auth()->attempt($atributes)){
            session()->regenerate();
            return redirect('/')->with('success','Welcome Back');
        }

        return  back()
            ->withInput()
            ->withErrors(['email'=>'Your provided credentials could not be verified']);


    }


}

<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public  function  __invoke(Newsletter $newsletter)
    {
        request()->validate(['email'=>'required|email']);
        try {
            $newsletter=new \App\Services\Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e){
            throw  \Illuminate\Validation\ValidationException::withMessages([
                'email'=>'This Email Is Not Valid'
            ]);
        }


        return redirect('/')->with('success','You are now signedd up for our newsletter');
    }
}

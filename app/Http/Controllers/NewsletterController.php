<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request; # Remove unused imports

class NewsletterController extends Controller
{
    # remove additional spaces
    public  function  __invoke(Newsletter $newsletter)
    {
        /**
         * Extract logic into requests.
         * 
         * @see https://laravel.com/docs/8.x/requests
         * @see /App/Http/Requests/NewsletterRequest.php
         */
        request()->validate(['email'=>'required|email']);
        try {
            # Import classes don't use fullnames
            $newsletter=new \App\Services\Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e){
            throw  \Illuminate\Validation\ValidationException::withMessages([
                'email'=>'This Email Is Not Valid'
            ]);
        }
        # remove additional blank lines

        return redirect('/')->with('success','You are now signedd up for our newsletter');
    }
}

<?php
namespace App\Http\Controllers;
use App\Http\Requests\NewsletterRequest;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    # Extract validation into request
    public  function  __invoke(Newsletter $newsletter)
    {
        request()->validate(['email'=>'required|email']);
       $request=new NewsletterRequest();
       $request->rules();
       return redirect('/')->with('success','You are now signed up for our newsletter');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;

use App\Services\Newsletter;

class NewsletterController extends Controller
{

    public  function  __invoke(NewsletterRequest $request,Newsletter $newsletter)
    {

        $date=$request->validated();
        $newsletter->subscribe($date['email']);
        return redirect('/')->with('success','You are now signed up for our newsletter');

    }
}

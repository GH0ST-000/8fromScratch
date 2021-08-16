<?php
namespace App\Http\Controllers;
use App\Http\Requests\NewsletterRequest;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public  function  __invoke(NewsletterRequest $request, Newsletter $newsletter)
    {
        $data = $request->validated();
        $newsletter->subscribe($data['email']);

        return redirect('/')->with('success','You are now signed up for our newsletter');
    }
}

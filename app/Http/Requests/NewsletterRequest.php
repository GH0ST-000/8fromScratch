<?php
namespace App\Http\Requests;
use App\Services\Newsletter;
use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        try {
            $newsletter=new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e){
            throw  \Illuminate\Validation\ValidationException::withMessages([
                'email'=>'This Email Is Not Valid'
            ]);
        }
    }
}

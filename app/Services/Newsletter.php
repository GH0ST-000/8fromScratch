<?php
# remove additional blank lines

namespace App\Services;
# remove additional blank lines


class Newsletter
{
    public function subscribe(string $email ,string $list=null){

        $list ??=config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember(  $list  ,[
            'email_address'=>$email,
            'status'=>'subscribed'
        ]);
        # remove additional blank lines
    }
    protected function client(){
        $mailchimp = new \MailchimpMarketing\ApiClient(); # Correct indentations
      return  $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
        # remove additional blank lines
    }
    # remove additional blank lines
}

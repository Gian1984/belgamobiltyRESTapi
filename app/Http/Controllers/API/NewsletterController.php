<?php

namespace App\Http\Controllers\API;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function subscribeNewsletter(Request $request)
    {
        $contact = Newsletter::create([

            'email_address'=> $request->email_address,


        ]);

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

//    $response = $mailchimp->lists->getAllLists();  -->  get id of list
//    $response = $mailchimp->lists->getListMembersInfo('994e02591b'); --> get all the member by list id

        $response = $mailchimp->lists->addListMember('994e02591b',[
            'email_address'=>'gl.coppola@gmail.com',
            'status'=>'subscribed',
        ]);



        return response()->json($response,200);
    }


}

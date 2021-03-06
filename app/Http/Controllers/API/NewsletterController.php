<?php

namespace App\Http\Controllers\API;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function subscribeNewsletter(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $contact = Newsletter::create([

            'email_address'=> $request->email,


        ]);



        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us18'
        ]);

//      $response = $mailchimp->lists->getAllLists();
//      $response = $mailchimp->lists->getListMembersInfo('994e02591b'); --> get all the member by list id

        $response = $mailchimp->lists->addListMember('88348c8f51',[
            'email_address'=> $request->email,
            'status'=>'subscribed',
        ]);



        return response()->json($response,200);
    }


}

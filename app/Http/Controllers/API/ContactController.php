<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all(),200);
    }

    public function uploadContact(Request $request)
    {
        $contact = Contact::create([

            'fullname'=> $request->fullname,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'subject'=> $request->subject,
            'reason'=> $request->reason,
            'comment'=> $request->comment,
            'time'=> Carbon::now('Europe/Rome'),
            'language'=> $request->language,
        ]);

        $success = $request;

        if ( $success->language == 'FR') {

            Mail::send('email.contactRequest', ['success' => $success], function ($message) use ($request) {
                $message->to($request->email);
                $message->to('booking@belgamobility.com');

                $message->subject('Nouvelle demande de contact');
            });

        } else {

            Mail::send('email.contactRequestEn', ['success' => $success], function ($message) use ($request) {
                $message->to($request->email);
                $message->to('booking@belgamobility.com');

                $message->subject('Nouvelle demande de contact');
            });

        }

        return response()->json( $contact,200);
    }

    public function show(Contact  $contact)
    {
        return response()->json( $contact,200);
    }

    public function repliedContact(Contact  $contact)
    {
        $contact->was_answered = true;
        $status =  $contact->save();

        return response()->json( $contact,200);
    }

    public function destroy($id)
    {
        return Contact::findOrFail($id)->delete();
    }
}

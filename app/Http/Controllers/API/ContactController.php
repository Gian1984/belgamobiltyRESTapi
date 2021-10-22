<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

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
            'comment'=> $request->comment,
        ]);

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

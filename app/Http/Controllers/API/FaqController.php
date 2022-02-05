<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Mail;


class FaqController extends Controller
{
    public function index()
    {
        return response()->json(Faq::all(),200);
    }

    public function uploadFaq(Request $request)
    {
        $faq = Faq::create([
            'product_id'=> $request->product_id,
            'user_id' => $request->user_id,
            'order_id'=> $request->order_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'question'=> $request->question,
            'language'=> $request->language,
        ]);

        $success = $request;

        if ( $success->language == 'FR') {

            Mail::send('email.faqRequest', ['success' => $success], function ($message) use ($request) {
                $message->to($request->email);
                $message->to('booking@belgamobility.com');

                $message->subject('Nouvelle questions liées aux commandes');
            });

        } else {

            Mail::send('email.faqRequestEn', ['success' => $success], function ($message) use ($request) {
                $message->to($request->email);
                $message->to('booking@belgamobility.com');

                $message->subject('Nouvelle questions liées aux commandes');
            });

        }


        return response()->json([
            'status' => (bool) $faq,
            'data'   => $faq,
            'message' => $faq ? 'Product Created!' : 'Error Creating Product'
        ]);
    }

    public function show(Faq  $faq)
    {
        return response()->json( $faq,200);
    }

    public function repliedFaq(Faq  $faq)
    {
        $faq->was_answered = true;
        $status =  $faq->save();

        return response()->json([
            'status'    => $status,
            'data'      =>  $faq,
            'message'   => $status ? 'Reply sent!' : 'Error answering Order'
        ]);
    }

    public function destroy($id)
    {
        return Faq::findOrFail($id)->delete();
    }
}

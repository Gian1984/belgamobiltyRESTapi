<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{

    public function index()
    {
        return response()->json(Quotation::all(),200);
    }


    public function store(Request $request)
    {

        $user = User::find(1);

        try {

            $payment = $user->charge(
                $request->input('amount'),
                $request->input('payment_method_id')
            );

            $payment = $payment->asStripePaymentIntent();


            $quotation = Quotation::create([
                'lastname'=> $request->lastname,
                'firstname'=> $request->firstname,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'amount' => $request->amount,
                'transactionID'=> $request->transactionID,
                'cardBrand'=> $request->cardBrand,
                'lastFour'=> $request->lastFour,
                'expire'=> $request->expire,
                'billing'=> $request->billing,
            ]);

            $success = $request;

            Mail::send('email.paiementSuccess', ['success' => $success], function($message) use($request){
                $message->to($request->email);
                $message->to('info@belgamobility.com');

                $message->subject('Paiement effectué avec succès');
            });


            return $quotation;

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    public function show(Quotation $quotation)
    {
        return response()->json($quotation,200);
    }

    public function destroy(Quotation $quotation)
    {
        $status = $quotation->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Quotation Deleted!' : 'Error Deleting Quotation'
        ]);
    }
}

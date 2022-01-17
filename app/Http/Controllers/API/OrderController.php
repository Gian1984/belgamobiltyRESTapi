<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['product','user'])->get(),200);
    }

    public function deliverOrder(Order $order)
    {
        $order->is_complete = true;
        $status = $order->save();

        return response()->json([
            'status'    => $status,
            'data'      => $order,
            'message'   => $status ? 'Order Delivered!' : 'Error Delivering Order'
        ]);
    }

    public function store(Request $request)
    {

        $user = User::find(Auth::id());

        try {

            $payment = $user->charge(
                $request->input('amount'),
                $request->input('payment_method_id')
            );

            $payment = $payment->asStripePaymentIntent();

            $order = Order::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'pickupaddress' => $request->pickupaddress,
                'dropoffaddress' => $request->dropoffaddress,
                'duration' => $request->duration,
                'distance' => $request->distance,
                'date' => $request->date,
                'amount' => $request->amount,
                'pickupsign'=> $request->pickupsign,
                'flight'=> $request->flight,
                'referencecode'=> $request->referencecode,
                'notes'=> $request->notes,
                'lastname'=> $request->lastname,
                'firstname'=> $request->firstname,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'transactionID'=> $request->transactionID,
                'cardBrand'=> $request->cardBrand,
                'lastFour'=> $request->lastFour,
                'expire'=> $request->expire,
                'is_complete' => $request->is_complete,
            ]);

//            return $order;

            $user = Auth::user();
            $order = Order::where('transactionID', $request->transactionID)->first();

            Mail::send('email.orderSuccess', [ 'order'=> $order, 'user'=> $user ], function($message) use($request){

//            'success' => $success,

            $order = Order::where('transactionID', $request->transactionID)->first();

                $message->to(Auth::user()->email);
                $message->to('booking@belgamobility.com');
//            $order = DB::table('orders')->where(['transactionID'=> $request->transactionID ])->get('id');


                $message->subject('Récapitulatif de la commande');

            });

            return $order;

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    public function show(Order $order)
    {
        return response()->json($order,200);
    }

    public function update(Request $request, Order $order)
    {
        $status = $order->update(
            $request->only(['is_complete'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Updated!' : 'Error Updating Order'
        ]);
    }

    public function destroy(Order $order)
    {
        $status = $order->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Deleted!' : 'Error Deleting Order'
        ]);
    }

    public function find(Request $request)
    {
        return response()->json(Order::where('transactionID', $request->transactionID)->get(),200);
    }


    public function submitOrderConfirm(Request $request)
    {

        $success = $request;
//        $o = Order::select('id')
//            ->where('transactionID', '=', $request->transactionID)
//            ->get();
//        $order = $o[0]['id'];
//        $order = Order::where('transactionID', $request->transactionID)->first();
//        $order = DB::table('orders')->where(['transactionID'=> $request->transactionID ])->get('id');


//        Mail::send('email.orderSuccess', [ 'success' => $success ], function($message) use($request){

//            'success' => $success,

//            $order = Order::where('transactionID', $request->transactionID)->first();

//            $message->to($request->email);
//            $message->to('booking@belgamobility.com');
//            $order = DB::table('orders')->where(['transactionID'=> $request->transactionID ])->get('id');

//            $order = Order::select('id')
//                ->where('transactionID', '=', $request->transactionID)
//                ->get();

//            $message->subject('Récapitulatif de la commande');
//
//        });

        return response()->json($success);
    }
}

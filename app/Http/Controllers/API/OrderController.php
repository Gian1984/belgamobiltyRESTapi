<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;

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

    public function submitOrderConfirm(Request $request)
    {

        $success = $request;

        Mail::send('email.orderSuccess', ['success' => $success], function($message) use($request){
            $message->to($request->email);
            $message->to('info@belgamobility.com');

            $message->subject('Order summary');
        });

        return response()->json($success);
    }
}

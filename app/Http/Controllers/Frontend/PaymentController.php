<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\StripePaymentIntent;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => 400, // Amount in cents (4.00zł)
            'currency' => 'pln',
            'automatic_payment_methods' => [
                'enabled' => true
            ],
            "capture_method" => "automatic",
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
            'publicKey' => config('services.stripe.key')
        ];

        return json_encode($output);
    }

    public function storePayment(Request $request)
    {
        DB::beginTransaction();
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $cart = session('cart', []);
            $userId = Auth::guard('customer')->id();
            $totalAmount = 0;

            foreach ($cart as $item) {
                $discountPrice = $item['price'] - ($item['price'] * $item['discount'] / 100);
                $totalAmount += $discountPrice;
            }

            $amountInCents = $totalAmount * 100;
            $payment = Payment::create([
                'customer_id' => $userId,
                'name' => $request->name ?? '',
                'email' => $request->email ?? '',
                'amount' => $totalAmount ?? 0.00,
                'currency' => $request->currency,
                'payment_type' => 'stripe',
                'payment_method' => $request->payment_method,
                'payment_method_types' => $request->payment_method_types,
                'payment_id' => $request->payment_id ?? '',
                'client_secret' => $request->client_secret ?? '',
                'date' => now(),
                'status' => $request->status == 'succeeded' ? 1 : 0,
            ]);

            foreach ($cart as $item) {
                Purchase::create([
                    'customer_id' => $userId,
                    'payment_id' => $payment->id,
                    'product_id' => $item['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            session()->forget('cart');


            DB::commit();

            return response()->json([
                'success' => true,
                'payment_id' => $request->payment_id,
                'status' => $request->status,
                'message' => 'Payment processed successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error processing payment: ' . $e->getMessage(),
            ], 500);
        }
    }
}

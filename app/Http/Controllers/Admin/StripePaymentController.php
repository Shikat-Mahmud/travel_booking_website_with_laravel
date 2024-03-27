<?php

namespace App\Http\Controllers\Admin;

use Modules\Booking\App\Models\Payment;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    try {
        $user = Auth::user();
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a charge
        $charge = Charge::create([
            'amount' => $request->price * 100, // Amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Booking charge for ' . $user->name,
            'receipt_email' => $user->email, // Pass email for receipt
            'metadata' => [
                'name' => $user->name,
                'address' => [
                    'city' => null,
                    'country' => null,
                    'line1' => null,
                    'line2' => null,
                    'postal_code' => null,
                    'state' => null,
                ],
            ]
        ]);

        // Store the charge details in cache if needed
        Cache::set('charge', $charge);

        return response()->json(['success' => 'Payment successful']);
    } catch (\Exception $e) {
        return response()->json(['errors' => $e->getMessage()], 500);
    }
}
}

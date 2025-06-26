<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class RazorpayController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    }

    public function showPaymentForm()
    {
        return view('razorpay.form');
    }

    public function initiatePayment(Request $request)
    {
        // Amount in paise (e.g., ₹1000 = 100000 paise)
        $amount = 1000 * 100; // ₹1000

        // Create a Razorpay order
        $order = $this->api->order->create([
            'amount' => $amount,
            'currency' => 'INR',
            'receipt' => 'receipt_' . time(),
        ]);

        // Store the order in the database
        $payment = Payment::create([
            'amount' => $amount / 100, // Store in rupees
            'currency' => 'INR',
            'razorpay_order_id' => $order['id'],
            'status' => 'pending',
        ]);

        return view('razorpay.checkout', [
            'order' => $order,
            'amount' => $amount,
            'key' => env('RAZORPAY_KEY'),
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
        ];

        try {
            $this->api->utility->verifyPaymentSignature($attributes);

            // Update payment status in the database
            $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();
            $payment->update([
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
                'status' => 'completed',
            ]);

            return redirect()->route('razorpay.success')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            Log::error('Razorpay Payment Verification Failed: ' . $e->getMessage());
            return redirect()->route('razorpay.form')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function paymentSuccess()
    {
        return view('razorpay.success');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Xendit\Invoice;
use Xendit\Xendit;

class PaymentController extends Controller
{
    public function __construct() {
        Xendit::setApiKey(env('XENDIT_KEY'));
    }

    public function create(Request $request) {
        $params = [
            'external_id' => Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'redirect_url' => 'https://github.com/ariear'
        ];

        $createInvoice =  Invoice::create($params);

        Payment::create([
            'status' => 'pending',
            'checkout_link' => $createInvoice['invoice_url'],
            'external_id' => $params['external_id']
        ]);

        return response()->json([
            'data' => $createInvoice['invoice_url']
        ]);
    }

    public function webhook(Request $request) {
        $getInvoice = Invoice::retrieve($request->id);

        $payment = Payment::where('external_id', $request->external_id)->firstOrFail();

        if ($payment->status == 'settled') {
            return response()->json(['data' => 'Payment has been already processed']);
        }

        $payment->status = strtolower($getInvoice['status']);
        $payment->save();

        return response()->json(['data' => 'Success']);
    }
}

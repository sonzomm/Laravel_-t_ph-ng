<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id','DESC')->paginate(5);
        return view('payment.index', compact('payments'));
    }

    public function create(Transaction $transaction)
    {
        return view('transaction.payment.create', compact('transaction'));
    }
    public function storeP($request, $transaction, string $status)
    {
        if(!empty($request->downPayment)){
            $price = $request->downPayment;
        } else {
            $price = $request->payment;
        }
        $payment = Payment::create([
            'user_id' => Auth()->user()->id,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'status' => $status
        ]);
        return $payment;
    }

    public function store(Transaction $transaction, Request $request)
    {
        $insufficient = $transaction->getTotalPrice() - $transaction->getTotalPayment();
        $request->validate([
            'payment' => 'required|numeric|lte:' . $insufficient
        ]);
        $this->storeP($request, $transaction, 'Payment');
        return redirect()->route('transaction.index')->with($transaction->room->number.Helper::convertToRupiah($request->payment) .'paid');
    }

    public function invoice(Payment $payment)
    {
        return view('payment.invoice', compact('payment'));
    }
}

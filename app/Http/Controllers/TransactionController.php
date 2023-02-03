<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\TransactionR;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function getTransaction($request)
    {
        $transactions = Transaction::with('user', 'room', 'customer')->where('check_out', '>=', Carbon::now());

        if (!empty($request->search)) {
            $transactions = $transactions->where('id', '=', $request->search);
        }
        $transactions = $transactions->orderBy('check_out', 'ASC')->orderBy('id', 'DESC')->paginate(20);
        $transactions->appends($request->all());
        return $transactions;
    }

    public function getTransactionExpired($request)
    {
        $transactionsExpired = Transaction::with('user', 'room', 'customer')->where('check_out', '<', Carbon::now());

        if (!empty($request->search)) {
            $transactionsExpired = $transactionsExpired->where('id', '=', $request->search);
        }

        $transactionsExpired = $transactionsExpired->orderBy('check_out', 'ASC')->paginate(20);
        $transactionsExpired->appends($request->all());

        return $transactionsExpired;
    }

    public function index(Request $request)
    {

        $transactions = $this->getTransaction($request);
        $transactionsExpired = $this->getTransactionExpired($request);
        return view('transaction.index', compact('transactions', 'transactionsExpired'));
    }
    public function show(Transaction $booking)
    {
    }


    public function edit(Transaction $booking)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $booking)
    {
        $booking->destroyer($booking);
        return Redirect::route('booking.index');
    }

}

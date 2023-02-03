<?php

namespace App\Http\Controllers;

use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Http\Requests\ChooseRoomRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Customer;
use App\Models\Helper;
use App\Models\payment;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionRoomReservationController extends Controller
{
    public function viewCountPerson(Customer $customer)
    {
        return view('transaction.reservation.viewCountPerson', compact('customer'));
    }
    private function getOccupiedRoomID($stayFrom, $stayUntil)
    {
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayFrom], ['check_out', '>=', $stayUntil]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }
    public function getUnocuppiedroom($request, $occupiedRoomId)
    {
        $rooms = Room::with('type')
            ->where('capacity', '>=', $request->count_person)
            ->whereNotIn('id', $occupiedRoomId);

        if (!empty($request->sort_name)) {
            $rooms = $rooms->orderBy($request->sort_name, $request->sort_type);
        }
        $rooms = $rooms
            ->orderBy('capacity')
            ->paginate(5);

        return $rooms;
    }

    public function countUnocuppiedroom($request, $occupiedRoomId)
    {
        return Room::with('type', 'roomStatus')
            ->where('capacity', '>=', $request->count_person)
            ->whereNotIn('id', $occupiedRoomId)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
    }

    public function chooseRoom(ChooseRoomRequest $request, Customer $customer)
    {
        $stayFrom = $request->check_in;
        $stayUntil = $request->check_out;
        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);
        $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
        $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);

        return view('transaction.reservation.chooseRoom', compact('customer', 'rooms', 'stayFrom', 'stayUntil', 'roomsCount'));
    }

    public function confirmation(Customer $customer, Room $room, $stayFrom, $stayUntil)
    {
        $price = $room->price;
        $dayDifference = Helper ::getDateDifference($stayFrom, $stayUntil);
        $downPayment = ($price * $dayDifference);
        return view('transaction.reservation.confirmation', compact('customer', 'room', 'stayFrom', 'stayUntil', 'downPayment', 'dayDifference'));
    }


    public function store($request, Customer $customer, Room $room)
    {
        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $customer->id,
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'Reservation'
        ]);

        return $transaction;
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



    public function payDownPayment(Customer $customer, Room $room, Request $request,payment $payment)
    {

        $dayDifference = Helper::getDateDifference($request->check_in, $request->check_out);
        $minimumDownPayment = ($room->price * $dayDifference);
        $request->validate([
            'downPayment' => 'required|numeric|gte:' . $minimumDownPayment
        ]);
        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);
        $occupiedRoomIdInArray = $occupiedRoomId->toArray();
        if (in_array($room->id, $occupiedRoomIdInArray)) {
            return redirect()->back()->with('failed', 'Sorry, room ' . $room->number . ' already occupied');
        }

        $transaction = $this->store($request, $customer, $room);
        $status = 'Down Payment';
        $payment = $this->storeP($request, $transaction, $status);
        return redirect()->route('transaction.index')->with('success', 'Room ' . $room->number . ' has been reservated by ' . $customer->name);
    }


}

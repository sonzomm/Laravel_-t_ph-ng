@extends('index')
@section('content')
    <div id="dashboard">

            <div class="col-lg-6 mb-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body">
                                <h5>{{ count($transactions) }} Guests this day</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h3>Today Guests</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

                                <table  id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Room</th>
                                        <th>Stay</th>
                                        <th>Day Left</th>
                                        <th>Debt</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ route('customer.show', ['customer' => $transaction->customer->id]) }}">
                                                    {{ $transaction->customer->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('room.show', ['room' => $transaction->room->id]) }}">
                                                    {{ $transaction->room->number }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ \App\Models\Helper::dateFormat($transaction->check_in) }} ~
                                                {{ \App\Models\Helper::dateFormat($transaction->check_out) }}
                                            </td>
                                            <td>{{ \App\Models\Helper::getDateDifference(now(), $transaction->check_out) == 0 ? 'Last Day' : \App\Models\Helper::getDateDifference(now(), $transaction->check_out) . ' ' . \App\Models\Helper::plural('Day', \App\Models\Helper::getDateDifference(now(), $transaction->check_out)) }}
                                            </td>
                                            <td>
                                                {{ $transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : \App\Models\Helper::convertToRupiah($transaction->getTotalPrice() - $transaction->getTotalPayment()) }}
                                            </td>
                                            <td>
                                                    <span
                                                        class="justify-content-center badge {{ $transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'Hoàn thành' : 'Chưa hoàn thành' }}
                                                    </span>
                                                @if (\App\Models\Helper::getDateDifference(now(), $transaction->check_out) < 1)
                                                    <span class="justify-content-center badge bg-danger">
                                                            chuẩn bị trả phòng
                                                        </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                There's no data in this table
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




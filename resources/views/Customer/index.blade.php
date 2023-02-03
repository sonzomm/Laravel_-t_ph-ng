@extends('index')
@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-6 mb-2">
            <a href="{{ route('customer.create') }}" class="btn btn-sm shadow-sm myBtn border rounded">
                <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        </div>
    </div>
    <table  id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>Address</th>
            <th>gender</th>
            <th>Birthdate</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer    as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    @if($customer ->gender == 0)
                        {{'Male'}}
                    @elseif($customer -> gender == 1)
                        {{'FeMale'}}
                    @else
                        {{'khac'}}
                    @endif
                </td>
                <td>{{$customer -> birthdate}}</td>
                <td>
                    <a href="{{route('transaction.reservation.viewCountPerson',$customer -> id)}}">
                        <button class="btn-primary">Transaction</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('customer.edit',$customer -> id)}}">
                        <button class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection



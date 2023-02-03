@extends('index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2 mb-2">
                <div class="col-lg-12 mb-2">
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{route('room.create')}}">
                            <button id="add-button" type="button" class="btn btn-sm shadow-sm myBtn border rounded" >
                                <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="black">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th scope="col">ID</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Capacity</th>
                                            <th scope="col">Price / Day</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse ($rooms as $rooms)
                                            <tr>
                                                <td>{{$rooms->id}}</td>
                                                <td>{{ $rooms->number }}</td>
                                                <td>{{ $rooms->name }}</td>
                                                <td>{{ $rooms->capacity }}</td>
                                                <td>{{\App\Models\Helper::đ($rooms -> price)}}</td>
                                                <td>
                                                    <a href="{{route('room.edit',$rooms->id)}}">
                                                        <button class="btn btn-light btn-sm rounded shadow-sm border">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>

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
                        <div class="card-footer">
                            <h3>Room</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('index')
@section('content')
<form method="POST" action="{{ route('room.update', ['room'=> $rooms->id]) }}">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="col-md-12">
            <label for="type_id" class="form-label">Type</label>
            <select id="type_id" name="type_id" class="form-control select2">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <div id="error_type_id" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="number" class="form-label">Room Number</label>
            <input room="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number"
                   value="{{ $rooms->number }}" placeholder="ex: 1A">
            <div id="error_number" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="capacity" class="form-label">Capacity</label>
            <input room="text" class="form-control @error('capacity') is-invalid @enderror" id="capacity"
                   name="capacity" value="{{ $rooms->capacity }}" placeholder="ex: 4">
            <div id="error_capacity" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="price" class="form-label">Price</label>
            <input room="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                   value="{{ $rooms->price }}" placeholder="ex: 500000">
            <div id="error_price" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="view" class="form-label">View</label>
            <textarea class="form-control" id="view" name="view" rows="3" placeholder="ex: window see beach">{{ $rooms->view }}</textarea>
            <div id="error_view" class="text-danger error"></div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection

@extends('index')
@section('content')

    <form method="post" action="{{route('service.put', $service->id)}}">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$service->name_service}}">
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter name" value="{{$service->price}}">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#customer').addClass('menu-open');
            $('#customer_manage').addClass('active');
            $('#customer_create').addClass('active');
        });
    </script>
@endpush

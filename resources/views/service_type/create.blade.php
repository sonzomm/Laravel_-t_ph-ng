
@extends('index')
@section('content')
    <form method="post" action="{{route('service_type.add')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="price">Type service</label>
                <input type="text" name="type_service" class="form-control" id="price" placeholder="Enter buy">
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

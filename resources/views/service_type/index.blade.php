@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Type</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($service_type as $service_type)
            <tr>
                <td>{{$service_type->id}}</td>
                <td>{{$service_type->type}}</td>
                <td>
                    <a href="{{route('service_type.edit',$service_type->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('service_type.destroy',$service_type->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#customer').addClass('menu-open');
            $('#customer_index').addClass('active');
            $('#customer_manage').addClass('active');
        });
    </script>
@endpush

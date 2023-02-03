@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>pice</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($service as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->name_service}}</td>
                <td>{{$service->price}}</td>
                <td>
                    <a href="{{route('service.edit',$service->id)}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('service.destroy',$service->id)}}" method="post">
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

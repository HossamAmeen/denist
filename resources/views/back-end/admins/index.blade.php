@extends('back-end.layout.app')

@section('content')
@if (session()->get('action') )
<div class="alert alert-success">
    <strong>{{session()->get('action')}}</strong>
</div>
@endif
@section('add-button')

<a  href="{{ route($routeName.'.create') }}">
    <button class="alert-success">
         <i class="fa fa-plus"></i>
        </button>
</a>
@endsection
@section('search')

<form action="{{route($routeName.'.index')}}" >
    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input
                type="search" class="form-control form-control-sm"
                aria-controls="dataTable" placeholder="Search" name="search" value="{{request('search')?? ''}}" required></label>
                <button type="submit" rel="tooltip" title="" class="btn-sm btn-info" style="display:inline-block;">
                    <i class="fas fa-search"></i>
            </button>
    </div>
</form>
@endsection
<table class="table dataTable my-0" id="dataTable">
    <thead>

        <tr>
            {{-- <th>image</th> --}}
            <th>user name</th>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>role</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
            <tr>
                <td><img class="rounded-circle mr-2" width="30" height="30"
                        {{-- src="{{$value->image != null && $value->image !="" ? asset($value->image) : asset('assets/img/avatars/avatar1.jpeg')}}"> --}}
                        src="{{$value->image}}">
                        {{$value->user_name}}</td>

                <td>{{$value->name}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->email}}</td>
                <td>{{ $value->role == 10 ? "master admin" : ($value->role == 9  ? "super admin" : "admin") }}</td>
                <td>{{$value->user->name??" not found"}}</td>
                <td>
                    <form action="{{ route($routeName.'.destroy' ,$value ) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a href="{{ route($routeName.'.edit' , $value) }}" class="btn-sm btn-info" style="display:inline-block;">
                          <i class="far fa-edit f044"></i>
                            </a>

                        <button type="submit" rel="tooltip" title="" class="btn-sm btn-danger"  onclick="check()" style="display:inline-block;">
                              <i class="fas fa-trash-alt"></i>
                       </button>
                    </form>

                </td>

            </tr>
        @endforeach


    </tbody>
    <tfoot>
        <tr>
            <th>user name</th>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>role</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </tfoot>
</table>

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
            $('#{{$routeName}}').addClass('active');
        });
</script>
@endpush

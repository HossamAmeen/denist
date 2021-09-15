@extends('back-end.layout.app')
@section('search')

<form action="{{route($routeName.'.index')}}">
    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search"
                class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="search"
                value="{{request('search')?? ''}}" required></label>
        <button type="submit" rel="tooltip" title="" class="btn-sm btn-info" style="display:inline-block;">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
@endsection

@section('content')
@if (session()->get('action') )
<div class="alert alert-success">
    <strong>{{session()->get('action')}}</strong>
</div>
@endif
<table class="table dataTable my-0" id="dataTable">
    <thead>

        <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>vendor</th>
            <th>category</th>
            <th>image</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{$value->image ?? asset('assets/img/avatars/avatar-1.jpg')}}">{{$value->name}}</td>

            <td>{{$value->price}}</td>
            <td>{{$value->quantity}}</td>
            <td>{{$value->vendor->store_name ?? " note found"}}</td>
            <td>{{$value->category->name ?? " note found"}}</td>
            <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{$value->image2 ?? asset('assets/img/avatars/avatar-1.jpg')}}">
                <img class="rounded-circle mr-2" width="30" height="30"
                    src="{{$value->image3 ?? asset('assets/img/avatars/avatar-1.jpg')}}"></td>
            <td>{{$value->user->name??" not found"}}</td>
            <td>
                @include('back-end.shared.buttons.delete')

            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>vendor</th>
            <th>category</th>
            <th>image</th>
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
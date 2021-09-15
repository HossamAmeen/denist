@extends('back-end.layout.app')


@section('content')

<table class="table dataTable my-0" id="dataTable">
    <thead>

        <tr>
            <th>product</th>

            <th>price</th>
           
            {{-- <th>user</th> --}}
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            {{-- <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->first_name. $value->last_name }}</td> --}}

            <td>
                {{$value->product->name??"not found"}}</td>
            <td>{{$value->product->price??"not found"}}</td>
           
            {{-- <td>{{$value->user->name??" not found"}}</td> --}}
            <td>
                <form action="{{ route('wishlist.delete' ,$value ) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" rel="tooltip" title="" class="btn-sm btn-danger" onclick="check()"
                        style="display:inline-block;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>

            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>product</th>

            <th>price</th>
            {{-- <th>user</th> --}}
            <th>action</th>
        </tr>
    </tfoot>
</table>

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
            $('#clients').addClass('active');
        });
</script>

@endpush
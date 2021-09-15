@extends('back-end.layout.app')


@section('content')

<table class="table dataTable my-0" id="dataTable">
    <thead>

        <tr>
            <th>total cost</th>
            <th>date</th>
            <th>address</th>
            <th>status</th>
            {{-- <th>user</th> --}}
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            {{-- <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->first_name. $value->last_name }}</td> --}}

            <td>{{$value->total_cost}}</td>
            <td>{{$value->date}}</td>
            <td>{{$value->address->address??" not found"}}</td>
            <td>{{$value->is_done == 1 ? "done" : "not checkout"}}</td>
            {{-- <td>{{$value->user->name??" not found"}}</td> --}}
            <td>
                <form action="{{ route('delete-cart-item' ,$value ) }}" method="post">
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
            <th>total cost</th>
            <th>date</th>
            <th>address</th>
            <th>status</th>
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
<script>
    function acceptClient(status,clientId)
    {
        $.ajax({
                url:"{{url('admin/accept-client')}}"+'/'+status+'/'+clientId,
                type:"get",
               
                contentType: false,
                processData: false,
                success:function(dataBack)
                {

                    console.log("success");
                    // document.getElementById("addForm").reset();
                    document.getElementById(clientId+'status').innerText=status;
                    // showSelectReasonExchange('reasonExchange',  document.getElementById("in_or_out")) ;
                    
                    // $(".cont-data").prepend(dataBack)
                    

                }, error: function (xhr, status, error)
                {

                    console.log("errror " + xhr.responseJSON.errors);
                    $.each(xhr.responseJSON.errors,function(key,item)
                    {

                        // $("#error").html("<li class='alert alert-danger text-center p-1'>"+ item +" </li>");
                    })
                }
            })
    }
     
</script>
@endpush
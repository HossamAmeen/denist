@extends('back-end.layout.app')

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
@section('content')
@if (session()->get('action') )
<div class="alert alert-success">
    <strong>{{session()->get('action')}}</strong>
</div>
@endif
<table class="table dataTable my-0" id="dataTable">
    <thead>

        <tr>
            <th>Name</th>

            <th>Email</th>
            <th>Phone</th>
            <th>is_vip</th>
            <th>status</th>
            <th>block reason</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->first_name. $value->last_name }}</td>

            <td>{{$value->email}}</td>
            <td>{{$value->phone}}</td>
            <td id="{{$value->id . 'is_vip'}}">{{$value->is_vip == 1 ? "true": "false"}}</td>
            <td id="{{$value->id . 'status'}}">{{$value->status}}</td>
            <td id="{{$value->id . 'blockReason'}}">{{$value->block_reason ?? "not found"}}</td>
            <td>{{$value->user->name??" not found"}}</td>
            <td width="32%">
                <form action="{{ route($routeName.'.destroy' ,$value ) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="#" class="btn-sm btn-info" onclick="acceptClient( 'accept',{{$value->id}})"
                        style="display:inline-block;" > accept</a>
                    <a href="#" class="btn-sm btn-danger" onclick="acceptClient( 'blocked',{{$value->id}})"
                        style="display:inline-block;"> block</a>
                    <button class="btn-sm btn-info" onclick="changeToVip({{$value->is_vip ==1 ? 0: 1}} ,{{$value->id}})"
                            style="display:inline-block;" type="button"> to_VIP</button>    
                    <a href="{{url('admin/orders/?client_id='.$value->id)}}" class="btn-sm btn-info" 
                            style="display:inline-block;"> orders</a>
                    <a href="{{url('admin/client-carts/'.$value->id)}}" class="btn-sm btn-danger" 
                        style="display:inline-block;"> <i class="fas fa-shopping-cart"></i></a>
                        <a href="{{url('admin/client-wishlist/'.$value->id)}}" class="btn-sm btn-danger" 
                            style="display:inline-block;"> <i class="fas fa-bookmark"></i></a>
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
            <th>Name</th>

            <th>Email</th>
            <th>Phone</th>
            <th>is_vip</th>
            <th>status</th>
            <th>block reason</th>
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
<script>
    function acceptClient(status,clientId )
    {
        var reason = "not found";
        if(status == "blocked")
        var reason = prompt("Please enter block reason : ", "he is not good");
        // if (reason != null) {
            
        //     "Hello " + person + "! How are you today?";
        // }
        $.ajax({
                url:"{{url('admin/accept-client')}}"+'/'+status+'/'+clientId+'/'+reason,
                type:"get",
               
                contentType: false,
                processData: false,
                success:function(dataBack)
                {

                    console.log("success");
                    // document.getElementById("addForm").reset();
                    document.getElementById(clientId+'status').innerText=status;
                    document.getElementById(clientId+'blockReason').innerText=reason;
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
    function changeToVip(is_vip , clientId) {
        $.ajax({
                url:"{{url('admin/change-client-status')}}"+'/'+is_vip+'/'+clientId,
                type:"get",
               
                contentType: false,
                processData: false,
                success:function(dataBack)
                {

                    console.log("success");
                    console.log(is_vip);
                    console.log(document.getElementById(clientId+'is_vip').innerHTML);
                    if(   document.getElementById(clientId+'is_vip').innerHTML == "true" )
                        is_vip = false;
                    else
                        is_vip = true;
                    document.getElementById(clientId+'is_vip').innerText= is_vip;
                    
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
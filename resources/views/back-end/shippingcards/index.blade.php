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
@section('above-table')

<form method="POST" action="{{ route($routeName.'.store') }}"  enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-xs-4">
            @php $inputName = 'repetitions' ; @endphp
          <label ><strong>{{$inputName}}</strong></label>
          <input class="form-control" id="ex1" type="number" name="{{$inputName}}" value="{{Request::old($inputName) ??1}}" max="15">
          @error('repetitions')
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert"
                  aria-hidden="true">&times;</button>
              {{ $message }}
          </div>
          @enderror
        </div>
    </div>
    <br>
    <div class="form-group"><button class="btn btn-primary btn-sm"
        type="submit">generate shipping cards </button></div>
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
        {{-- 'number','is_used', 'user_table' ,'date', ''  --}}
        <tr>
            <th>#</th>
            <th>Card Number</th>
            <th>user name</th>
            <th>user Email</th>
            <th>Type(user|vendor)</th>
            <th>Is used?</th>
            <th>Payment Date</th>
            <th>Created Date</th>
            <th>admin</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @php $count = 1 ;@endphp 
        @foreach($rows as $key => $value)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$value->number}}</td>
            <td>{{$value->user_name != null ?  $value->user_name : "not found" }}</td>
            <td>{{$value->user_email != null ?  $value->user_email : "not found" }}</td>
            <td>{{$value->user_table ?? " not found"}}</td>
            <td>{{$value->is_used == null ? "no" : "yes"}}</td>
            <td>{{$value->date?? " not found"}}</td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->user->name?? " not found"}}</td>
            <td>
                <form action="{{ route($routeName.'.destroy' ,$value ) }}" method="post">
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
            <th>#</th>
            <th>Card Number</th>
            <th>user name</th>
            <th>user Email</th>
            <th>Type(user|vendor)</th>
            <th>Is used?</th>
            <th>Payment Date</th>
            <th>Created Date</th>
            <th>admin</th>
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
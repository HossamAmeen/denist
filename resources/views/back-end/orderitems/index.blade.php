@extends('back-end.layout.app')

@section('above-table')
<form method="get"  action="{{ route('orders.index') }}">
    @csrf
    <div class="form-row">
        <div class="col-xs-4">
            @php $inputName = 'status' ; @endphp
            <label><strong>{{$inputName}}</strong></label>
            <select name="{{$inputName}}">
                <option value="null"></option>
                <option {{request('status') == 'pending from client' ? "selected" : " " }} >pending from client</option>
                <option {{request('status') == 'edit from vendor' ? "selected" : " " }}>edit from vendor</option>
                <option {{request('status') == 'accept from client' ? "selected" : " " }}>accept from client</option>
                <option {{request('status') == 'accept from vendor' ? "selected" : " " }}>accept from vendor</option>
                <option {{request('status') == 'cancelled from vendor' ? "selected" : " " }}>cancelled from vendor</option>
                <option {{request('status') == 'working' ? "selected" : " " }}>working</option>
                <option {{request('status') == 'delivering' ? "selected" : " " }}>delivering</option>
                <option {{request('status') == 'done' ? "selected" : " " }}>done</option>
            </select>
            @php $inputName = 'is_vip' ; @endphp
            <label><strong>vip </strong></label>
            <select name="{{$inputName}}">
                <option value="null"></option>
                <option value="1" {{request('is_vip') == 1 ? "selected" : " " }}>yes</option>
                <option value="0" {{request('is_vip') == '0' ? "selected" : " " }}>no</option>
            </select>
            @php $inputName = 'date' ; @endphp
            <label><strong>{{$inputName}}</strong></label>
            <input id="ex1" type="date" name="{{$inputName}}" value="{{request($inputName) ?? ''}}">

            <input type="text" name="vendor_id" value="{{request('vendor_id')}}" hidden>
            <input type="text" name="client_id" value="{{request('client_id')}}" hidden>
        </div>
    </div>
    <br>
    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">search </button></div>
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
        {{-- 'price','discount','is_vip', 'status', 'quantity','product_id', 'client_id','cart_id' --}}
        <tr>
            <th>Client Name</th>
            <th>Client Phone</th>
            <th>Client Email</th>
            <th>Vendor Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>date</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            @if(isset($value->client_id))
                <td>{{(isset($value->client->first_name) ? $value->client->first_name : " لا يوجد")}}
                    {{(isset($value->client->last_name) ? $value->client->last_name : "")}}
                </td>
            @endif
            <td>{{(isset($value->client->phone) ? $value->client->phone : " لا يوجد")}}</td>
            <td>{{(isset($value->client->email) ? $value->client->email : " لا يوجد")}}</td>
            <td>{{(isset($value->vendor->store_name) ? $value->vendor->store_name : " ")}}
              
        
            </td>
             
      
            @if(isset($value->product_id))
                <td>{{(isset($value->product->name) ? $value->product->name : " لا يوجد")}}</td>
            @endif
            <td>{{$value->quantity}}</td>
            <td>{{$value->price}}</td>
            @if(isset($value->order_id))
                <td>{{(isset($value->order->date) ? $value->order->date : " لا يوجد")}}</td>
            @endif
            <td>{{$value->status}}</td>
            

            <td>
                <form action="{{ route('orders.destroy' ,$value ) }}" method="post">
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

            <th>Client Name</th>
            <th>Client Phone</th>
            <th>Client Email</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>date</th>
            {{-- <th>Discount</th> --}}           
            <th>status</th>
            <th>action</th>
        </tr>
    </tfoot>
</table>

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
            $('#orders').addClass('active');
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

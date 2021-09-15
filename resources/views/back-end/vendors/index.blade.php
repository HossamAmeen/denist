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
                            <th>#</th>
                            <th>Store Name</th>
                            <th>priority</th>
                            <th>Phone</th>
                            <th>contract date</th>
                            <th>contract expired date</th>
                            <th>rating</th>
                            <th>client ratio</th>
                            <th>client vip ratio</th>
                            <th>address</th>
                            <th>date of registration</th>
                            <th>number of products</th>
                            <th>user</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1 ;@endphp 
                        @foreach($rows as $key => $value)
                            <tr>
                                {{-- <td><img class="rounded-circle mr-2" width="30" height="30"
                                        src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->first_name. $value->last_name }}</td> --}}
                                        <td>{{$count++}}</td>
                                <td><img class="rounded-circle mr-2" width="30" height="30" 
                                     src="{{$value->store_logo}}">{{$value->store_name }}</td>
                                <td>{{$value->priority}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->contract_date}}</td>
                                <td>{{$value->contract_expired_date}}</td>
                                <td>{{$value->rating}}</td>
                                <td>{{$value->client_ratio}}</td>
                                <td>{{$value->client_vip_ratio}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->created_at->format('Y-m-d')}}</td>
                                <td>{{$value->products->count()}}</td>
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
                            <th>#</th>
                            <th>Store Name</th>
                            <th>priority</th>
                            <th>Phone</th>
                            <th>contract date</th>
                            <th>contract expired date</th>
                            <th>Phone</th>
                            <th>rating</th>
                            <th>client ratio</th>
                            
                            <th>client vip ratio</th>
                            <th>address</th>
                            <th>date of registration</th>
                            <th>number of products</th>
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
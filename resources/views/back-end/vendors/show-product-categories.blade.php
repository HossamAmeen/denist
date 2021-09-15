@extends('back-end.layout.app')


@section('content')


                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                       
                        <tr>
                            <th>Name</th>
                            {{-- <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>rating</th>
                            <th>client ratio</th>
                            <th>client vip ratio</th> --}}
                            <th>user</th>
                            {{-- <th>action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $key => $value)
                            <tr>
                                {{-- <td><img class="rounded-circle mr-2" width="30" height="30"
                                        src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->first_name. $value->last_name }}</td> --}}
                            
                                <td>{{$value->name }}</td>
                                {{-- <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->rating}}</td>
                                <td>{{$value->client_ratio}}</td>
                                <td>{{$value->client_vip_ratio}}</td> --}}
                                <td>{{$value->user->name??" not found"}}</td>
                                {{-- <td>
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
                                   
                                </td> --}}
                                
                            </tr>
                         @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            {{-- <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>rating</th>
                            <th>client ratio</th>
                            <th>client vip ratio</th> --}}
                            <th>user</th>
                            {{-- <th>action</th> --}}
                        </tr>
                    </tfoot>
                </table>
           
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
            $('#vendors').addClass('active');
        });
</script>
@endpush
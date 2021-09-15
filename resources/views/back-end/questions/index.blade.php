@extends('back-end.layout.app')

@section('content')
@if (session()->get('action') )
<div class="alert alert-success">
    <strong>{{session()->get('action')}}</strong>
</div>
@endif

<table class="table dataTable my-0" id="dataTable">
    <thead>
       
        <tr>
            <th>question</th>
            <th>answer</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
            <tr>
                
             
                <td>{{$value->question}}</td>
                <td>{{$value->answer}}</td>
             
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
            <th>question</th>
            <th>answer</th>
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
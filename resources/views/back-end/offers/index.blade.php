@extends('back-end.layout.app')

@section('above-table')
<form method="POST" action="{{ route($routeName.'.store') }}"  enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-xs-4">
            @php $inputName = 'image' ; @endphp
          <label ><strong>{{$inputName}}</strong></label>
          <input class="form-control" id="ex1" type="file" name="{{$inputName}}" required>
        </div>
    </div>
    <br>
    <div class="form-group"><button class="btn btn-primary btn-sm"
        type="submit">save </button></div>
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
            <th>image</th>
            <th>user</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            <td><img src="{{$value->image}}" width="30" height="30" ></td>
           
            <td>{{$value->user->name??" not found"}}</td>
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
@extends('back-end.layout.app')

@section('search')

<form action="{{route('categoriesProducts.index')}}" >
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
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($rows as $key => $value)
        <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30"
                    src="{{asset('assets/img/avatars/avatar1.jpeg')}}">{{$value->name }}</td>
         
            <td>
                <form action="{{ route('categoriesProducts.destroy' ,$value ) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="{{ route('categoriesProducts.edit' , $value) }}" class="btn-sm btn-info" style="display:inline-block;">
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
            <th>Name</th>
            <th>action</th>
        </tr>
    </tfoot>
</table>

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
            $('#categoriesProducts').addClass('active');
        });
</script>
@endpush

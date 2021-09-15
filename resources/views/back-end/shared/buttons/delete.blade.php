<form action="{{ route($routeName.'.destroy' ,$value ) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    {{-- <a href="{{ route($routeName.'.edit' , $value) }}" class="btn-sm btn-info" style="display:inline-block;">
      <i class="far fa-edit f044"></i>
        
        </a> --}}
       
    <button type="submit" rel="tooltip" title="" class="btn-sm btn-danger"  onclick="check()" style="display:inline-block;">
          <i class="fas fa-trash-alt"></i>  
   </button>
</form>
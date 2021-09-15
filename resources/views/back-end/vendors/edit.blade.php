<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - {{$configration->website_name ??" ekhsemly"}}</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('ekhsemly_logo.jpg')}}" />
</head>

<body id="page-top">
    <div id="wrapper">
        @include('back-end.layout.side-bar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('back-end.layout.nav')
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">admins</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">update vendor ({{$row->store_name}})</p>
                                    <a href="{{ url('admin/categoriesProducts?vendor_id='.$row->id) }}" class="btn-sm btn-info" style="display:inline-block;">
                                        {{$categories_count}} categories of product
                                     </a>

                                    <a href="{{ url('admin/products?vendor_id='.$row->id) }}" class="btn-sm btn-info" style="display:inline-block;">
                                       {{$products_count}} products
                                    </a>

                                     <a href="{{url('admin/orders?vendor_id='.$row->id)}}" class="btn-sm btn-info"
                                        style="display:inline-block;">{{$orders_count}} orders</a>

                                     <a href="#" class="btn-sm btn-info" style="display:inline-block; pointer-events: none;
                                     cursor: default;">
                                        {{$total_gain}} total benefits
                                     </a>

                                     <a href="#" class="btn-sm btn-info" style="display:inline-block; pointer-events: none;
                                     cursor: default;">
                                         {{$monthly_benefit }} monthly benefit
                                     </a>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    @if (session()->get('action') )
                                    <div class="alert alert-success">
                                        <strong>{{session()->get('action')}}</strong>
                                    </div>
                                    @endif
                                    <form method="POST" action="{{ route($routeName.'.update' , $row->id) }}"  enctype="multipart/form-data"
                                         autocomplete="off">
                                        @csrf
                                        @method('put')

                                        <input type="hidden" name="id" value="{{$row->id}}" id="">
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'priority' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="number"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}" ></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'first_name' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}" required></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'last_name' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  value="{{Request::old($inputName) ?? $row->$inputName}}" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'phone' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  value="{{Request::old($inputName) ?? $row->$inputName}}" required></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'email' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="email" name="{{$inputName}}"  value="{{Request::old($inputName) ?? $row->$inputName}}" required></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'password' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="password" id="password"
                                                         name="{{$inputName}}" value=""></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'password_confirmation' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="password" id="password_confirmation"

                                                      ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'store_name' ; @endphp
                                                <div class="form-group"><label ><strong>store name</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}" required></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'store_description' ; @endphp
                                                <div class="form-group"><label ><strong>store description</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'discount_ratio' ; @endphp
                                                <div class="form-group"><label ><strong>discount ratio</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'expiration_date' ; @endphp
                                                <div class="form-group"><label ><strong>{{$row->$inputName}}</strong>expiration date of national ID</label>
                                                    <input class="form-control" type="text"
                                                          value="{{Request::old($inputName) ?? $row->$inputName}}" readonly></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'client_ratio' ; @endphp
                                                <div class="form-group"><label ><strong>client ratio</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old('client_ratio') ?? $row->$inputName}}"></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'client_vip_ratio' ; @endphp
                                                <div class="form-group"><label ><strong>client vip ratio</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'delivery' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'delivery_time' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'app_gain' ; @endphp
                                                <div class="form-group"><label ><strong>app gain</strong></label>
                                                    <input class="form-control" type="number"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'status' ; @endphp
                                                <div class="form-group"><label ><strong>status</strong></label>
                                                    {{-- <input class="form-control" type="text" name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"> --}}
                                                    <select class="form-control" name="{{$inputName}}" >
                                                        <option @if($row->status == "pending") selected @endif>pending</option>
                                                        <option @if($row->status == "accept") selected @endif>accept</option>
                                                        <option @if($row->status == "blocked") selected @endif>blocked</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'block_reason' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="text"
                                                         name="{{$inputName}}" value="{{Request::old($inputName) ?? $row->$inputName}}"></div>
                                            </div>

                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm"
                                            type="submit" onclick="return Validate()">update </button></div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'store_logo' ; @endphp
                                                <div class="form-group"><label ><strong>store logo</strong></label>
                                                   </div>
                                                <img src="{{$row->$inputName}}">
                                                @php $inputName = 'store_background_image' ; @endphp
                                                <div class="form-group"><label ><strong>store background image</strong></label>
                                                   </div>
                                                <img src="{{$row->$inputName}}">
                                                @php $inputName = 'company_registration_image' ; @endphp
                                                <div class="form-group"><label ><strong>company registration image</strong></label>
                                                   </div>
                                                <img src="{{$row->$inputName}}">
                                                @php $inputName = 'national_id_front_image' ; @endphp
                                                <div class="form-group"><label ><strong>national id front image</strong></label>
                                                   </div>
                                                <img src="{{$row->$inputName}}">
                                                @php $inputName = 'national_id_back_image' ; @endphp
                                                <div class="form-group"><label ><strong>national id back image</strong></label>
                                                   </div>
                                                <img src="{{$row->$inputName}}">


                                            </div>

                                        </div>


                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
            @include('back-end.layout.footer')
        </div>

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/chart.min.js')}}"></script>
        <script src="{{asset('assets/js/bs-init.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{asset('assets/js/theme.js')}}"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $('#{{$routeName}}').addClass('active');
                });
        </script>
         <script type="text/javascript">
            function Validate() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("password_confirmation").value;
                // console.log(password);
                // console.log(confirmPassword);
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            }
        </script>
</body>

</html>

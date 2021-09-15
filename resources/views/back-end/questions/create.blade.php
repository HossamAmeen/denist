<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    {{-- <title>Dashboard - {{$configration->website_name ??" ekhsemly"}}</title> --}}
    <title>{{$pageTitle ?? " admin - panel "}}</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
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
                        {{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
                    </div>
                  
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">add admin</p>
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
                                    <form method="POST"
                                    action="{{ route($routeName.'.store') }}"  enctype="multipart/form-data">
                                        @csrf
                                       
                                        {{-- '', '', 'password' ,'', '', 'role', 'image' ,'user_id' --}}
                                       
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'user_name' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}" ></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'name' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'phone' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label><input class="form-control" type="text"
                                                         name="{{$inputName}}"  ></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'email' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="email" name="{{$inputName}}"  ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'password' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="password"
                                                         name="{{$inputName}}"></div>
                                            </div>
                                            <div class="col">
                                                @php $inputName = 'password_confirmation' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="password" name="{{$inputName}}"  ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                @php $inputName = 'image' ; @endphp
                                                <div class="form-group"><label ><strong>{{$inputName}}</strong></label>
                                                    <input class="form-control" type="file"
                                                         name="{{$inputName}}"  ></div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group"><button class="btn btn-primary btn-sm"
                                                type="submit">update </button></div>
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
</body>

</html>
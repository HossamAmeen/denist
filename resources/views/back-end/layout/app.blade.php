<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$pageTitle ?? " admin - panel "}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('ekhsemly_logo.jpg')}}" />
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    @yield('css')
    @stack('css')
</head>

<body id="page-top">
    <div id="wrapper">
        {{-- side-bar --}}
        @include('back-end.layout.side-bar')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                {{-- nav --}}
                @include('back-end.layout.nav')
                <div class="container-fluid">
                    @yield('above-table')
                    <h3 class="text-dark mb-4">{{$pageName}}  </h3> 
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">{{$pageName}} Info @yield('add-button')</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    {{-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label>Show&nbsp;<select
                                                class="form-control form-control-sm custom-select custom-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div> --}}
                                </div>
                                <div class="col-md-6">
                                   @yield('search')
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                @yield('content')
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    {{-- <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p> --}}
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                           
                                            {{ $rows->links() }}
                                            {{-- <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                        aria-hidden="true">»</span></a></li> --}}
                                        </ul>
                                    </nav>
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
    @stack('js')
</body>

</html>
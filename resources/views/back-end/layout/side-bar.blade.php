{{-- <section id="left-navigation">
    <!--Left navigation user details start-->
    <div class="user-image">
        <img src="{{asset('panel/assets/images/demo/avatar-80.png')}}" alt=""/>
        <div class="user-online-status"><span class="user-status is-online  "></span> </div>
    </div>
    <ul class="social-icon">
      
    </ul>
    <!--Left navigation user details end-->

    <!--Phone Navigation Menu icon start-->
    <div class="phone-nav-box visible-xs">
        <a class="phone-logo" href="index.html" title="">
            <h1>baseProject</h1>
        </a>
        <a class="phone-nav-control" href="javascript:void(0)">
            <span class="fa fa-bars"></span>
        </a>
        <div class="clearfix"></div>
    </div>

    <!--Phone Navigation Menu icon start-->

    <!--Left navigation start-->
 <!--Left navigation start-->
    <ul class="mainNav">
     

        @if( Auth::user()->role == 1 )
        <li>
            <a href="{{route('users.index')}}" class="{{is_active('users')}}">
                <i class="fa fa-group"></i><span>المستخدمين</span>
            </a>
        </li>
        @endif
        <li>
            <a href="{{route('users.edit' , ['id' => Auth::user()->id])}}" class="{{edit_profle_is_active('users')}}">
                <i class="fas fa-edit"></i><span>تعديل بيانات الحساب</span>
            </a>
        </li>

        <li class="{{is_active('clients')}}">
            <a href="{{route('clients.index')}}"  class="{{is_active('clients')}}">
                    <i class="far fa-newspaper"></i><span>العملاء</span>
            </a>

        </li>

        <li class="{{is_active('deliveries')}}">
            <a href="{{route('deliveries.index')}}"  class="{{is_active('deliveries')}}">
                    <i class="far fa-newspaper"></i><span>موظفين التوصيل</span>
            </a>

        </li>
       

        <li class="{{is_active('show-orders')}}">
            <a  href="#"  class="{{is_active('show-orders')}}">
                <i class="fa fa-bar-chart-o"></i> <span>الطلبات</span> <span class="badge badge-red order_count" ></span>
            </a>
            <ul   >
                <li>
                    <a  href="{{url('admin/show-orders/1')}}" @if(isset($status) && $status == 1) class="active" @endif>الطلبات جديده  <span class="badge badge-red order_count" >0</span> </a>

                </li>
                <li>
                    <a  href="{{url('admin/show-orders/2')}}" @if(isset($status) && $status == 2) class="active" @endif> الطلبات تحت التنفيذ </a>
                </li>
                <li>
                    <a  href="{{url('admin/show-orders/3')}}" @if(isset($status) && $status == 3) class="active" @endif> الطلبات تم الانتهاء </a>
                </li>
                <li>
                    <a  href="{{url('admin/show-orders/4')}}" @if(isset($status) && $status == 4) class="active" @endif> الطلبات تحت التوصيل </a>
                </li>
                <li>
                    <a  href="{{url('admin/show-orders/5')}}" @if(isset($status) && $status == 5) class="active" @endif> الطلبات تم التوصيل </a>
                </li>

            </ul>
        </li>


        <li class="{{is_active('offers')}}">
            <a href="{{route('offers.index')}}"  class="{{is_active('offers')}}">
                    <i class="far fa-newspaper"></i><span>العروض</span>
            </a>

        </li>

        <li class="{{is_active('services')}}">
            <a href="{{route('services.index')}}"  class="{{is_active('services')}}">
                    <i class="far fa-newspaper"></i><span>الخدمات</span>
            </a>

        </li>
        <li class="{{is_active('pricelists')}}">
            <a href="{{route('pricelists.index')}}"  class="{{is_active('pricelists')}}">
                    <i class="far fa-newspaper"></i><span>قائمه الاسعار</span>
            </a>

        </li>
        <li class="{{is_active('attendces')}}">
            <a href="{{route('attendces.index')}}"  class="{{is_active('attendces')}}">
                    <i class="far fa-newspaper"></i><span>الحضور</span>
            </a>
        </li>

        <li class="{{is_active('complaints')}} ">
            <a href="{{route('complaints.index')}}"  class="{{is_active('complaints')}}">
                    <i class="far fa-newspaper"></i><span >الشكاوي</span> <span class="badge badge-red complaint_count" ></span>
            </a>

        </li>
        <li class="{{is_active('sanctions')}}">
            <a href="{{route('sanctions.index')}}"  class="{{is_active('sanctions')}}">
                    <i class="far fa-newspaper"></i><span>الخصومات</span>
            </a>

        </li>

        <li class="{{is_active('accounts')}}">
            <a href="{{route('accounts.index')}}"  class="{{is_active('accounts')}}">
                    <i class="far fa-newspaper"></i><span>الحسابات </span>
            </a>

        </li>
        <li class="{{is_active('dailyaccounts')}}">
            <a href="{{route('dailyaccounts.index')}}"  class="{{is_active('dailyaccounts')}}">
                    <i class="far fa-newspaper"></i><span>المصروفات اليومية</span>
            </a>

        </li>

        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">


             <i class="fa fa-power-off"></i><span>تسجيل الخروج</span>
            </a>

        </li>
    </ul>
    <!--Left navigation end-->
</section> --}}



<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><img src="{{asset('ekhsemly_logo.jpg')}}" width="30" height="30"></div>
            <div class="sidebar-brand-text mx-3"><span>{{$configration->website_name ??" ekhsemly"}}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('admin')}}" id="dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Profile</span></a></li> --}}
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admins.index')}}" id="admins"><i class="fas fa-table"></i><span>admins</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('vendors.index')}}" id="vendors"><i class="fas fa-table"></i><span>vendors</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('shippingcards.index')}}" id="shippingcards"><i class="fas fa-table"></i><span>shipping cards</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('clients.index')}}" id="clients"><i class="fas fa-table"></i><span>clients</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('categoriesProducts.index')}}" id="categoriesProducts"><i class="fas fa-table"></i><span>categories of product</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('products.index')}}" id="products"><i class="fas fa-table"></i><span>products</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('orders.index')}}" id="orders"><i class="fas fa-table"></i><span>orders</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('categories.index')}}" id="categories"><i class="fas fa-table"></i><span>categories</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('offers.index')}}" id="offers"><i class="fas fa-table"></i><span>offers</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('cities.index')}}" id="cities"><i class="fas fa-table"></i><span>cities</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('questions.index')}}" id="questions"><i class="fas fa-table"></i><span>questions</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('complaints.index')}}" id="complaints"><i class="fas fa-table"></i><span>complaints</span></a></li>
            {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Register</span></a></li> --}}
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
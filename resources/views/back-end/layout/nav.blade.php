<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
            type="button"><i class="fas fa-bars"></i></button>

        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown no-arrow" role="presentation">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                        aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">

                            {{Auth::user()->user_name}}  </span><img class="border rounded-circle img-profile"
                            src=" {{Auth::user()->image}}"></a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">

                        <a class="dropdown-item" role="presentation"  href="{{ URL('admin/logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout
                        </a>
                        <form id="logout-form" action="{{ URL('admin/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

{{--   <a class="dropdown-item" href="{{ route('logout') }}"
>
<i class="fa fa-power-off"></i>
</a>


--}}

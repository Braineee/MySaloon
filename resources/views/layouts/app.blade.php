<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/upload_picture.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/avarta.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    @guest
        @yield('content')
    @else
        <body>
            <nav class="navbar navbar-dark fixed-top bg-yellow flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center" style="color:#FFF;" href="#"><strong>Adam&Eve Beauty Saloon</strong></a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
                </li>
            </ul>
            </nav>

            <div class="container-fluid">
            <div class="row">
                <!-- 
                    sidebar content 
                    ===============
                -->
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <div class="text-center">
                            @if(Auth::user()->picture == '')
                            <img class="me" src="{{ asset('img/avatar.png') }}" alt="" />
                            @else
                            <img class="me" src="/storage/staffs/{{ Auth::user()->picture }}" alt="" />
                            @endif
                            <h4 style="padding-left:10px;">{{ Auth::user()->name }}</h4>
                            <small class="">
                                @if(Auth::user()->role_id == 1)
                                    <i class="fa fa-circle" style="color:0F0"></i>&ensp;<b style="color :#6c757d";>Manager</b>
                                @elseif(Auth::user()->role_id == 2)
                                    <i class="fa fa-circle" style="color:0F0;"></i>&ensp;<b style="color :#6c757d";>Administrator</b>
                                @elseif(Auth::user()->role_id == 3)
                                    <i class="fa fa-circle" style="color:0F0"></i>&ensp;<b style="color :#6c757d";>Staff</b>
                                @elseif(Auth::user()->role_id == 4)
                                    <i class="fa fa-circle" style="color:0F0"></i>&ensp;<b style="color :#6c757d";>Customer</b>
                                @endif
                            </small>
                        </div>
                        
                        <hr>

                        
                        @if(Auth::user()->role_id == 4)
                            <!--customer navbar-->
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Reports</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/viewstyle">
                                    <i class="fa fa-eye"></i>&ensp;
                                    View Style
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/bookings">
                                    <i class="fa fa-book"></i>&ensp;
                                    Bookings <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/billings">
                                    <i class="fa fa-file"></i>&ensp;
                                    Billings
                                    </a>
                                </li>
                                
                            </ul>

                        @elseif(Auth::user()->role_id == 3)
                            <!--admin navbar-->
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Reports</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/bookings">
                                    <i class="fa fa-book"></i>&ensp;
                                    Bookings <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/billings">
                                    <i class="fa fa-file"></i>&ensp;
                                    Billings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/customers">
                                    <i class="fa fa-users"></i>&ensp;
                                    Customers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/viewstyle">
                                    <i class="fa fa-eye"></i>&ensp;
                                    View Style
                                    </a>
                                </li>
                                
                            </ul>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Stocks</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="/accessories">
                                    <i class="fa fa-square"></i>&ensp;
                                    Acessories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/styles">
                                    <i class="fa fa-square"></i>&ensp;
                                    Styles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/services">
                                    <i class="fa fa-square"></i>&ensp;
                                    Services
                                    </a>
                                </li>
                            </ul>

                        @elseif(Auth::user()->role_id == 2)
                            <!--admin navbar-->
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Reports</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/bookings">
                                    <i class="fa fa-book"></i>&ensp;
                                    Bookings <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/billings">
                                    <i class="fa fa-file"></i>&ensp;
                                    Billings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/customers">
                                    <i class="fa fa-users"></i>&ensp;
                                    Customers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/viewstyle">
                                    <i class="fa fa-eye"></i>&ensp;
                                    View Style
                                    </a>
                                </li>
                                
                            </ul>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Stocks</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="/accessories">
                                    <i class="fa fa-square"></i>&ensp;
                                    Acessories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/styles">
                                    <i class="fa fa-square"></i>&ensp;
                                    Styles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/services">
                                    <i class="fa fa-square"></i>&ensp;
                                    Services
                                    </a>
                                </li>
                            </ul>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Official</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="/staffs">
                                    <i class="fa fa-users"></i>&ensp;
                                    Staff
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/assets">
                                    <i class="fa fa-square"></i>&ensp;
                                    Assets
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/roles">
                                    <i class="fa fa-user-circle"></i>&ensp;
                                    Role
                                    </a>
                                </li>
                            </ul>

                        @elseif(Auth::user()->role_id == 1)
                            <!--admin navbar-->
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Reports</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/bookings">
                                    <i class="fa fa-book"></i>&ensp;
                                    Bookings <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/billings">
                                    <i class="fa fa-file"></i>&ensp;
                                    Billings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/customers">
                                    <i class="fa fa-users"></i>&ensp;
                                    Customers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/viewstyle">
                                    <i class="fa fa-eye"></i>&ensp;
                                    View Style
                                    </a>
                                </li>
                                
                            </ul>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Stocks</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="/accessories">
                                    <i class="fa fa-square"></i>&ensp;
                                    Acessories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/styles">
                                    <i class="fa fa-square"></i>&ensp;
                                    Styles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/services">
                                    <i class="fa fa-square"></i>&ensp;
                                    Services
                                    </a>
                                </li>
                            </ul>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Official</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="/staffs">
                                    <i class="fa fa-users"></i>&ensp;
                                    Staff
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/assets">
                                    <i class="fa fa-square"></i>&ensp;
                                    Assets
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/roles">
                                    <i class="fa fa-user-circle"></i>&ensp;
                                    Role
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </nav>
                <!-- 
                    end sidebar content 
                    ===================
                -->

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @include('alerts.error')
                    @include('alerts.success')
                    <!--
                        main content goes here
                    -->
                    @yield('content')
                </main>
            </div>
            </div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
            <script src="../../assets/js/vendor/popper.min.js"></script>
            <script src="../../dist/js/bootstrap.min.js"></script>

            <!-- Icons -->
            <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

            <!-- Graphs -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
           
        </body>
    @endguest 
    </div>
</body>
</html>

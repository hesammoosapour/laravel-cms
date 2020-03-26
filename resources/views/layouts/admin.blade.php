<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="/images/Clock.jpg" />
    @yield('title')
    @section('title')
        <title>Admin</title>
    @stop
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
{{--    It should be exactly here otherwise dashboard icon would not appear --}}

@yield('styles')
<!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

{{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}

{{--    bootstrap 4--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap4.4.1.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
{{--end bootstrap4--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

{{--        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
{{--        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}

</head>

<body id="admin-page">

<div id="wrapper">

    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark sticky-top container-fluid">
        <!-- Brand/logo -->
        <a class="navbar-brand " href="/">
            <img class="clock_nav_img_admin" height="40" src="/images/Clock.jpg" alt="Clock">&nbsp; Clock
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link link_admin_nav" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link_admin_nav" href="posts"> Posts</a>
            </li>

        </ul>
        <form class="form-inline col-sm-5" action="" method="">
            <input class="form-control mr-sm-2   " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 fa fa-search" type="submit"></button>
        </form>
{{--        <div class="collapse navbar-collapse" id="collapsibleNavbar">--}}
            <ul class="nav navbar-nav navbar-right collapse navbar-collapse " id="collapsibleNavbar">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>
{{--        </div>--}}
    </nav>
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')

@yield('footer')

</body>

</html>

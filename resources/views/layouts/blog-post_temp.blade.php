<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="/images/Clock.jpg" />
    @yield ('title')
    @section('title')
        <title>Blog Post - Clock </title>
    @stop

    @yield('styles')
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.4.1.min.css')}}">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/blog-post.css')}}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body class="moderate_clock_bg">

<!-- Navigation -->

<!-- Bootstrap NavBar -->
<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-success  " >
    <a class="navbar-brand " href="/">
        <img class="d-inline-block align-top clock_nav_img_admin" height="40" src="/images/Clock.jpg" alt="Clock">
        {{--            &nbsp;<span class="menu-collapsed"></span>--}}
    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  clock_nav_collapse" id="navbarNavDropdown">
        <ul  class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link link_admin_nav clock_link" href="/"> Clock <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link link_admin_nav" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link link_admin_nav" href="/posts">Posts</a>
            </li>
            @if(Auth::check() && Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link link_admin_nav" href="/admin">Admin</a>
                </li>
            @endif
        </ul>

    </div>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link_user_dropdown " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> {{Auth::check() ? Auth::user()->name : "Login/Sign Up"}}
                </a>
                <div class="dropdown-menu margin_nav_user" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    @if(Auth::check())
                        <a class="dropdown-item " href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    @else
                        <a class="dropdown-item " href="{{ url('/login') }}"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                    @endif


                </div>
            </li>

            <!-- This menu is hidden in bigger devices with d-sm-none.
                        The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none ">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Main Menu </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    @include('includes.small_screen_admin_sidebar')
                </div>
            </li><!-- Smaller devices menu END -->

        </ul>

    </div>
</nav><!-- NavBar END -->

<!-- Page Content -->
<div class="container blog_content">

    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-xs-12 col-md-12 col-lg-10 col-sm-12 col-xl-9">

            @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-xs-0 col-md-0 col-lg-2 col-sm-0 col-xl-3  ">
{{--            right sidebar--}}
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Clock  {{date('Y')}}</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->

<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')


</body>

</html>

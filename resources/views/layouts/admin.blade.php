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
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">

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

<div id="wrapper" >

    <!-- Navigation -->

{{--    <nav class="navbar navbar-expand-lg navbar-expand-sm bg-dark navbar-dark sticky-top ">--}}
{{--        <a class="navbar-brand " href="/">--}}
{{--            <img class="clock_nav_img_admin" height="40" src="/images/Clock.jpg" alt="Clock">&nbsp; Clock--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse " id="navbarSupportedContent">--}}
{{--            <ul  class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link link_admin_nav" href="/home">Home <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link link_admin_nav" href="posts">Posts</a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--            <form class="form-inline my-2 my-lg-0 col-sm-8 ">--}}
{{--                <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0 fa fa-search" type="submit"></button>--}}
{{--            </form>--}}
{{--            <ul class="nav navbar-nav ">--}}
{{--                <li class="nav-item dropdown ">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                        <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
{{--                        <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a class="dropdown-item " href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}

{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--   End navbar top / Navigation --}}

<!-- Bootstrap NavBar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-success" >
        <a class="navbar-brand " href="/">
            <img class="d-inline-block align-top clock_nav_img_admin" height="40" src="/images/Clock.jpg" alt="Clock">
{{--            &nbsp;<span class="menu-collapsed"></span>--}}
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul  class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link link_admin_nav clock_link" href="/"> Clock <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link link_admin_nav" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link_admin_nav" href="posts">Posts</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0  col-sm-8  col-lg-12  ">
                <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark text-dark my-2 my-sm-0 fa fa-search bg-white " type="submit"></button>
            </form>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link_user_dropdown " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item " href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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

    <!-- Bootstrap row -->
    <div class="row" id="body-row">
        <!-- Sidebar -->
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block  ">
            <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
            <!-- Bootstrap List Group -->
            <ul class="list-group " >
                <!-- Separator with title -->
{{--                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">--}}
{{--                    <small ><a id="main_menu" href="/admin">MAIN MENU</a></small>--}}
{{--                </li>--}}
                <!-- /END Separator -->
                <a href="/admin" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                    </div>
                </a>
                <!-- Menu with submenu -->
{{--                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">--}}
{{--                    <div class="d-flex w-100 justify-content-start align-items-center" >--}}
{{--                        <span class="fa fa-dashboard fa-fw mr-3"></span>--}}
{{--                        <span class="menu-collapsed" >Dashboard</span>--}}
{{--                        <span class="submenu-icon ml-auto"></span>--}}
{{--                    </div>--}}
{{--                </a>--}}
                <!-- Submenu content -->

{{--                <div id='submenu1' class="collapse sidebar-submenu">--}}
{{--                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">--}}
{{--                        <span class="menu-collapsed">Chahgag</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">--}}
{{--                        <span class="menu-collapsed">Reports</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">--}}
{{--                        <span class="menu-collapsed">Tables</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <a href="#users" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Users</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='users' class="collapse sidebar-submenu">
                    <a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class="fa fa-group"></i> All Users</span>
                    </a>
                    <a href="{{route('admin.users.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class='fas fa-user-plus'></i> Create User</span>
                    </a>
                </div>


                <a href="#posts" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-list fa-fw mr-3"></span>
                        <span class="menu-collapsed">Posts</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='posts' class="collapse sidebar-submenu">
                    <a href="{{route('admin.posts.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class="fa fa-list-ol fa-fw mr-3"></i> All Posts</span>
                    </a>
                    <a href="{{route('admin.posts.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class="fa fa-plus-square fa-fw mr-3" ></i> Create Post</span>
                    </a>
                    <a href="#comments" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-comments fa-fw mr-3"></span>
                            <span class="menu-collapsed">Comments</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <div id='comments' class="collapse sidebar-submenu">
                        <a href="{{route('admin.comments.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed"><i class="fa fa-comments-o fa-fw mr-3" ></i> All Comments</span>
                        </a>
                        <a href="{{route('admin.replies.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed"><i class="fa fa-reply-all fa-fw mr-3" ></i> All Replies</span>
                        </a>
                    </div>
                </div>
{{--                <a href="#" class="bg-dark list-group-item list-group-item-action">--}}
{{--                    <div class="d-flex w-100 justify-content-start align-items-center">--}}
{{--                        <span class="fa fa-envelope-o fa-fw mr-3"></span>--}}
{{--                        <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>--}}
{{--                    </div>--}}
{{--                </a>--}}

                <a href="{{route('admin.categories.index')}}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-th-list fa-fw mr-3"></span>
                        <span class="menu-collapsed">Categories</span>
                    </div>
                </a>

                <!-- Separator without title -->
                <li class="list-group-item sidebar-separator menu-collapsed"></li>
                <!-- /END Separator -->

                <a href="#media" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file-movie-o fa-fw mr-3"></span>
                        <span class="menu-collapsed">Media</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='media' class="collapse sidebar-submenu">
                    <a href="{{route('admin.media.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class="fa fa-video-camera"></i>  All Media</span>
                    </a>
                    <a href="{{route('admin.media.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"><i class='fa fa-upload'></i> Upload Media</span>
                    </a>
                </div>

                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small >OPTIONS</small>
                </li>
                <!-- /END Separator -->
                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-question fa-fw mr-3"></span>
                        <span class="menu-collapsed">Help</span>
                    </div>
                </a>
                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Tasks</span>
                    </div>
                </a>
                <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                        <span id="collapse-text" class="menu-collapsed">Collapse</span>
                    </div>
                </a>

            </ul><!-- List Group END-->
        </div><!-- sidebar-container END -->
        <!-- MAIN -->
        <div class="col p-4 col-sm-9 ">
            <h1 class="display-4">Admin</h1>
            <hr>
{{--            <div class="card">--}}
{{--                <h5 class="card-header font-weight-light">Explore</h5>--}}
{{--                <div class="card-body">--}}
{{--                    <ul>--}}
{{--                        <li>@yield('content')</li>--}}
{{--                    </ul>--}}
                    @yield('content')
{{--                </div>--}}
{{--            </div>--}}
        </div><!-- Main Col END -->
    </div><!-- body-row END -->

    {{--    sidebar--}}
{{--    <nav class=" navbar  bg-dark navbar-light  ">--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar_collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse  " id="sidebar_collapse">--}}
{{--            <ul class="nav flex-column">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" href="#">--}}
{{--                        <span data-feather="home"></span>--}}
{{--                        Dashboard <span class="sr-only">(current)</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <nav class="nav bg-light sidebar  flex-column ">--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar_collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class=" collapse navbar-collapse " id="sidebar_collapse">--}}
{{--            <ul class="nav flex-column">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" href="#">--}}
{{--                        <span data-feather="home"></span>--}}
{{--                        Dashboard <span class="sr-only">(current)</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">--}}
{{--                        <span data-feather="file"></span>--}}
{{--                        Orders--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
{{--                <span>Saved reports</span>--}}
{{--                <a class="d-flex align-items-center text-muted" href="#">--}}
{{--                    <span data-feather="plus-circle"></span>--}}
{{--                </a>--}}
{{--            </h6>--}}
{{--            <ul class="nav flex-column mb-2">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">--}}
{{--                        <span data-feather="file-text"></span>--}}
{{--                        Current month--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">--}}
{{--                        <span data-feather="file-text"></span>--}}
{{--                        Last quarter--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    end sidebar--}}


</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/sidebar.js')}}"></script>
@yield('scripts')

@yield('footer')

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="/images/Clock.jpg" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

{{--Font Awesome--}}
    <script src="https://use.fontawesome.com/591f3807d1.js"></script>
    <script src="https://use.fontawesome.com/8bb16fde9e.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/8bb16fde9e.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    @yield('styles')

</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>

        </div>
        <!-- /.navbar-header -->


        @if (Auth::check())

        <ul class="nav navbar-top-links navbar-right  ">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>

                    {{ isset(Auth::user()->name) ? Auth::user()->name : "" }}

                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                    @if(Auth::user()->isAdmin())
                         <li><a href="admin" ><i class=' fas fa-crown'></i>&nbsp; Admin </a></li>
{{--                        fas fa-user-shield--}}
                    @endif
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
{{-- get method doesn't work  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>--}}
                    <li><a class="dropdown-item fa fa-sign-out " href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
{{--                    @if()--}}

{{--                    @endif--}}


                </ul>
                <!-- /.dropdown-F -->
            </li>
            <!-- /.dropdown -->

        </ul>

    </nav>
    @endif



<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if(Request::url() == route('login'))
                    <div  class="navbar-brand card-header">{{ __('Login') }}</div>
                @endif
                    @if(Request::url() == route('register'))
                        <div  class="navbar-brand card-header">{{ __('Register') }}</div>
                    @endif
{{--                    @if(Request::url() == route('password',['name'=>'reset']))--}}
{{--                        <div class="navbar-brand card-header">{{ __('Reset Password') }}</div>--}}
{{--                    @endif--}}
{{--                    {{route('password/reset')}}--}}
                    @if(Request::url() == route('home'))
                        <div  class="navbar-brand card-header">{{ __('Dashboard') }}</div>
                    @endif

                    <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>

@yield('scripts')

</body>

</html>

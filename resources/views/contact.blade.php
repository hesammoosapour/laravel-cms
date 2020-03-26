<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="/images/Clock.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Clock</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links ">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{url('/')}}">Clock</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title title_clock m-b-md">
            <img class=" clock_nav_img" height="100" src="/images/Clock.jpg" alt="Clock">
            Clock
        </div>

        <div class="producer">
            <p class="Administrator_contact"  >Hesam Moosapour  </p>
            <p> Production</p>
            <a href = "mailto: hesammoosapour@yahoo.com"><i class="fa fa-envelope"></i></a>
            &emsp;
            <a href="https://www.instagram.com/hesam.moosapour/"><i class="fa fa-instagram"></i></a>
            &emsp;
            <a href="https://www.facebook.com/hesam.moosapour"><i class="fa fa-facebook-f"></i></a>
            &emsp;
            <a href="https://www.linkedin.com/in/hesam-moosapour/"><i class="fa fa-linkedin-square"></i></a>
            &emsp;
            <a href="https://twitter.com/hesammoosapour"><i class="fa fa-twitter"></i></a>
        </div>
    </div>
</div>
@include('includes.myfooter')
</body>
</html>

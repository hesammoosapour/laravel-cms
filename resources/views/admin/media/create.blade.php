@extends('layouts.admin')
@section('title')
    <title>Upload Media to Clock</title>
@stop
@section('styles')

{{--    <link rel="stylesheet" href="/css/libs/dropzone.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop



@section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminMediasController@store', 'class'=>'dropzone']) !!}

    {!! Form::close() !!}

@stop

@section('footer')
    @include('includes.footer')
@stop

@section('scripts')

    {{--    <script src="/resources/js/libs/dropzone.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop

<?php use App\Post; use App\User; use App\Photo; ?>

@extends('layouts.blog-post_temp')
@section('title')
    <title>All Posts-Clock</title>
@stop

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
        box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
        float: left;
        /*width: 50%;*/
            width: 80%;
        padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        /* Style the buttons */
        .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        }

        .btn:hover {
        background-color: #ddd;
        }

        .btn.active {
        background-color: #666;
        color: white;
        }
    </style>
@stop

@section('content')

    <div id="btnContainer">
        <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
{{--        <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>--}}
    </div>
    <br>
    <h3>Latest Posts</h3>
    @if($posts)
        @foreach($posts as $key => $post )

                <?php  $author = User::whereId($post->user_id)->first();
                if ( $author) {
                    $author_photo = Photo::whereId($author->photo_id)->firstOrFail();
                    $author_photo = $author_photo->path;
                }else {
                    $author_photo = '';
                }
                ?>
                <div class="row">
                    <div class="column" style="background-color:#aaa;">

                        <a href="{{route('home.post',$post->slug ? $post->slug : $post->id)}}">
                            <img height="60"  src="{{$author_photo }}" alt="">
                            {{$post->user ? $post->user->name : ""}}
                        </a>
                        {{isset($post->created_at) ? $post->created_at->diffForhumans() : ""}}

                        <hr>
                        <img height="400"  class="col-md-12" src="{{$post->photo ? $post->photo->path : '/images/400x400.png' }}" alt="">

                        <h2><a href="{{route('home.post', $post->slug ? $post->slug : $post->id)}}">{{$post->title}}</a></h2>

                        <p>{{ Str::limit(strip_tags($post->body),30)}}</p>

                        <p >Category : {{$post->category ? $post->category->name : 'Uncategorized'}}</p>

{{--                        <p>{!! $comments_no = DB::table('comments')->whereDeleted_at(null)->wherePost_id($post->id)->count(); !!} Comments</p>--}}
                        <p><?php echo $comments_no = Post::findOrFail($post->id)->comments()->count();?> Comments</p>


                    </div>
{{--                    @if (current($post) === next($post))--}}

                        <?php //  $post =  $posts[$key+1]   ?>
{{--                        <div class="column" style="background-color:#bbb;">--}}

{{--                            <a href="{{route('home.post',$post->slug != null ? $post->slug : $post->id)}}">--}}
                                {{--                                <img height="60" width="60" src="{{$post->photo ?  $posts[$key+1] : '/images/400x400.png' }}" alt="">--}}
{{--                                {{$post->user ? $post->user->name : ""}}--}}
{{--                            </a>--}}
{{--                                --}}{{--                        <a href="{{route('home.post', $post->slug ? $post->slug : $post->id)}}">{{$post->user ? $post->user->name : ""}}</a>--}}
{{--                                --}}{{--    --}}
{{--                                --}}{{--                        {{isset($post->created_at) ? $post->created_at->diffForhumans() : ""}}--}}
{{--                                --}}{{--    --}}
{{--                                --}}{{--                        <h2><a href="{{route('home.post', $post->slug ? $post->slug : $post->id)}}">{{$post->title}}</a></h2>--}}
{{--                                --}}{{--    --}}
{{--                                --}}{{--                        <p>{{ Str::limit(strip_tags($post->body),30)}}</p>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            <hr>
        @endforeach

    @endif



@stop

@section('scripts')
    <script>
        // Get the elements with class="column"
        var elements = document.getElementsByClassName("column");

        // Declare a loop variable
        var i;

        // List View
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
            }
        }

        // Grid View
        function gridView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "50%";
            }
        }

        /* Optional: Add active class to the current button (highlight it) */
        var container = document.getElementById("btnContainer");
        var btns = container.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

@stop

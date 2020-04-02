@extends('layouts.blog-post')
@section('title')
    <title>{{$post->title}} Post-Clock</title>
@stop

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    @if(Auth::check() && Auth::user()->isAdmin())

        <h1><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></h1>

    @else  <h1>{{$post->title}}</h1>
    @endif


    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user ? $post->user->name : "Unknown User"}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span ><i class="fa fa-clock-o"></i></span>
        {{$post->created_at ? "Posted : ". $post->created_at->diffForHumans() : "No date"}}</p>

    <hr>
    <!-- Preview Image -->
    <img  class="img-responsive col-xs-12 col-md-12 col-lg-10 col-sm-12 col-xl-9" src="{{$post->photo ? $post->photo->path : null}}" alt="">

    <hr>
    <!-- Post Content -->

    <p>{!!$post->body!!}</p>

    <hr>
    @include('includes.comments_post')
    @include('includes.disqus_comments')
@stop

@section('scripts')

    <script type="text/javascript">
        function disappear() {
            replycomment.style.display="none";
        }
        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");


        });

    </script>



@stop


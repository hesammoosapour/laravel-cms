<?php
use App\Comment;use App\CommentReply;use App\Post;use Illuminate\Support\Str;
?>
@extends('layouts.admin')
@section('title')
    <title>All Posts</title>
@stop


@section('content')
    @if(Session::has('deleted_post'))
        <p class=" label-danger">{{session('deleted_post')}}</p>
    @endif
    <h1>All Posts</h1>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>body</th>
            <th>Comments</th>
{{--            <th>Replies to Comments</th>--}}
            <th>Post Link</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('home.post',$post->slug ? $post->slug : $post->id)}}">
                            <img height="60" width="60" src="{{$post->photo ? $post->photo->path : '/images/400x400.png' }}" alt="">
                        </a></td>
                    <td><a href="{{route('home.post', $post->slug ? $post->slug : $post->id)}}">{{$post->user ? $post->user->name : ""}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td><a href="{{route('home.post', $post->slug ? $post->slug : $post->id)}}">{{$post->title}}</a></td>
                    <td>{{ Str::limit(strip_tags($post->body),30)}} </td>

{{--                    {!! $comments_no = DB::table('comments')->whereDeleted_at(null)->wherePost_id($post->id)->count(); !!}--}}

                    <?php $comments_no = Post::withTrashed()->findOrFail($post->id)->comments()->count();?>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">{{$comments_no}} Comments</a></td>


{{--                    @foreach($post->comments as $comment)--}}

<!--                        --><?php //$replies = CommentReply::withTrashed()->whereComment_id($comment->id)->count() ; ?>

                    {{--  @foreach($comment->replies as $reply)--}}

{{--<!--                            --><?php echo =array_sum($comment->replies);  ?>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--                    <td><a href="{{'admin.replies.show',$comment->id}}">{{$replies}} Replies</a></td>--}}

                    <!--                    --><?php // $comments = Post::withTrashed()->findOrFail($post->id)->comments()->get();  ?>

{{--                    @foreach($post->comments as $commment)--}}
<!--                    --><?php //CommentReply::whereComment_id($comment->id);       ?>
{{--                    @endforeach--}}
                    <td><a href="{{route('home.post',  $post->slug ? $post->slug : $post->id)}}">View Post</a></td>
                    <td>{{isset($post->created_at) ? $post->created_at->diffForhumans() : ""}}</td>
                    <td>{{isset($post->updated_at) ? $post->updated_at->diffForhumans() : ""}}</td>
                    <td>{{isset($post->deleted_at) ? "Deleted ".$post->deleted_at->diffForhumans() : "Exists"}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}"
                           class="btn btn-primary  active" role="button" aria-pressed="true">Edit
                        </a>
                    </td>
                </tr>

                <?php
//                $comments = Comment::withTrashed()->wherePost_id($post->id)->latest("updated_at")->get();
//                foreach ($comments as $comment) :
//                $replies_no = Comment::withTrashed()->findOrFail($comment->id)->replies()->count();
//                echo $replies_no; ?>
                <?php // endforeach; ?>

            @endforeach


            @endif
       </tbody>
     </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>



@stop

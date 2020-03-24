<?php
use Illuminate\Support\Str;
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
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>body</th>
            <th>Comments</th>
            <th>Post Link</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
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
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                    <td><a href="{{route('home.post',  $post->slug ? $post->slug : $post->id)}}">View Post</a></td>
                    <td>{{isset($post->created_at) ? $post->created_at->diffForhumans() : ""}}</td>
                    <td>{{isset($post->updated_at) ? $post->updated_at->diffForhumans() : ""}}</td>
                    <td>{{isset($post->deleted_at) ? $post->deleted_at->diffForhumans() : ""}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}"
                           class="btn btn-primary  active" role="button" aria-pressed="true">Edit
                        </a></td>
                </tr>

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

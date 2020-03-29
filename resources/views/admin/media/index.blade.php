<?php use App\Post;use App\User;?>
@extends('layouts.admin')
@section('title')
    <title>All Media - Clock Admin</title>
@stop
@section('content')
    @if(Session::has('deleted_photo'))
        <p class="alert-danger " style="font-size: 1.7rem;">
        <?="The Photo " ."<b style='font-size:large '>" .session("deleted_photo"). "</b>" ." has been deleted";?>
        </p>
    @endif


    @if(Session::has('multi_deleted_photo'))
        <p class="alert-danger " style="font-size: 1.7rem;">
            <?="The Photos " ."<b style='font-size:large '>" .session("multi_deleted_photo")."<br>" ."</b>" ."& ... have been deleted";?>
        </p>
    @endif

    <h2>Media</h2>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{csrf_field()}}

            {{method_field('delete')}}

            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">

                    <option value="delete" >Delete</option>

                </select>
            </div>
            <div class="form-group">
               <input type="submit" class="btn-danger btn" value="Multi Delete">
            </div>


        <table class="table  table-sm">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Usage</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)

                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img height="120" width="120" src="{{$photo->path}}" alt=""></td>
                    <td>{{str_replace('/images/', '', $photo->path)}}</td>

                    <?php
                    $user = User::wherePhoto_id($photo->id)->first();
                    $post = Post::wherePhoto_id($photo->id)->first();
                    ?>
                    @if(($post) )
                        <td><a href="{{route('home.post',$post->slug ? $post->slug : $post->id)}}">
                                {{"Post : " . $post->title }}
                            </a>
                        </td>
                        @elseif($user)
                        <td><a href="{{route('admin.users.edit',$user->id)}}">{{'Profile : '.$user->name}}</a></td>
                        @else <td>{{'Source Not Found'}}</td>
                    @endif

{{--                    <td>{{$post_photo ? $post_photo->title : 'User Profile'}}</td>--}}
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date' }}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No date' }}</td>
                    <td>{{$photo->deleted_at ? $photo->deleted_at->diffForHumans() : 'No date' }}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

        </form>

    @endif
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$photos->render()}}

        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;});
                }else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@stop


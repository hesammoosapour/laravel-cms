<?php use App\User;?>
@extends('layouts.admin')
@section('title')
    <title>All Comments</title>
@stop

@section('content')

    @if( count($comments) > 0)

        <h1>All Comments</h1>
        <div class="flex">
               <pre class="h3 ">{{$comments_no}} Comments - {{$comments_no_active}} Comments Exist - {{$comments_no_approved}} Approved
               </pre>
        </div>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>id</th>
            <th>Commenter</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Post Title</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
{{--            <th>Replies Link</th>--}}
        </tr>
        </thead>

        <tbody>

        @foreach($comments as $comment)

            <tr>
                <td>{{$comment->id}}</td>
                <?php    $user = User::findOrFail($comment->commenter_id)->first(); // Try this for other admins, see if it works. ?>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$comment->body}}</td>
                <?php $result= DB::select('SELECT `title` FROM `posts` WHERE `id` =? ', [$comment->post_id]) ?>
                <td><a href="{{route('home.post',$comment->post->id)}}"><?php echo $result[0]->title; ?>
                  </a><!--Post title-->
                </td>
                <td>{{isset($comment->created_at) ? $comment->created_at->diffForhumans() : ""}}</td>
                <td>{{isset($comment->updated_at) ? $comment->updated_at->diffForhumans() : ""}}</td>
                <td>{{isset($comment->deleted_at) ? "Deleted ".$comment->deleted_at->diffForhumans() : "Exists"}}</td>



<!--                --><?php $outcome =DB::select('SELECT * FROM `comment_replies` WHERE `comment_id` = ?',[$comment->id]) ?>
{{--<!--                --><?php echo $outcome[0][0]['comment_id'];?>--}}


<!--                --><?php //if(isset($comment_id)) : ?>
{{--                <td><a href="{{route('admin.replies.show',isset($comment_id) ? $comment_id : "No Replies")}}">View Replies</a></td>--}}
<!--                --><?php //else : ?>
{{--                <td>No Replies</td>--}}
<!--                --><?php //endif; ?>




                <td>
                  @if($comment->is_active == 1)

                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                      <input type="hidden" name="is_active" value="0">

                      <div class="form-group">
                          {!! Form::submit('Un-approve', ['class'=>'btn btn-warning']) !!}
                      </div>
                      {!! Form::close() !!}

                      @else


                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                      <input type="hidden" name="is_active" value="1">


                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                      </div>
                      {!! Form::close() !!}

                  @endif

              </td>

              <td>

                  {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}

                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  </div>
                  {!! Form::close() !!}

              </td>
          </tr>

            @endforeach

       </tbody>
     </table>

        @else

        <h1 class="text-center">No Comments</h1>

    @endif

@stop

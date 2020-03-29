@extends('layouts.admin')
@section('title')
    <title>Post Comments</title>
@stop
@section('content')

    @if(count($comments)  > 0)

        <h1>Post Comments</h1>
        @foreach($comments as $comment)
            <?php $result= DB::select('SELECT `title` FROM `posts` WHERE `id` =? ', [$comment->post_id]) ?>
        @endforeach
       <div class="flex">
           <h3>Post Title : <a href="{{route('home.post',$comment->post->id)}}"><?php $res = $result[0];echo $res->title; ?>
               </a></h3>

           <div class="flex">
               <pre class="h3 ">{{$comments_no}} Comment(s) - {{$comments_no_active}}  Exist(s) - {{$comments_no_approved}} Approved
               </pre>
           </div>
       </div>
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
            </tr>
            </thead>
            <tbody>

            @foreach($all_comments as $comment)

                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{isset($comment->created_at) ? $comment->created_at->diffForhumans() : ""}}</td>
                    <td>{{isset($comment->updated_at) ? $comment->updated_at->diffForhumans() : ""}}</td>
                    <td>{{isset($comment->deleted_at) ? "Deleted ".$comment->deleted_at->diffForhumans() : "Exists"}}</td>
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

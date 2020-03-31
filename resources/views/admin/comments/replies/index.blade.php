@extends('layouts.admin')
@section('title')
    <title> All Replies for all Comments  </title>
@stop
@section('content')

    @if(count($replies) > 0)

        <h1>All Replies for all Comments :</h1>
              <div class="flex">
               <pre class="h3 ">{{$replies_no}} Replies - {{$replies_no_active}} Replies Exist - {{$replies_no_approved}} Approved
               </pre>
        </div>

        <table class="table table-sm">
            <thead>
            <tr>
                <th>id</th>
                <th>Replier</th>
                <th>Email</th>
                <th>Reply</th>
                <th>Comment body</th>
                <th>Post title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply )

                <tr>
                    <td>{{$reply->id}}</td>
                    <?php $replier = \App\User::whereId($replies[0]->replier_id)->first(); ?>
                    <td>{{$replier->name}}</td>
                    <td>{{$replier->email}}</td>
                    <td><a href="{{route('admin.replies.show',$reply->comment->id)}}">{{$reply->body}}</a></td>

                    <?php $result= DB::select('SELECT `body` FROM `comments` WHERE `id` =? ', [$reply->comment->id]); ?>
                    <td><a href="{{route('admin.comments.show',$reply->comment->post->id)}}"><?php echo $result[0]->body; ?>
                        </a><!--Comment body-->
                    </td>

                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">{{$reply->comment->post->title}}</a>
                    </td>{{--Post title--}}
                    <td>{{isset($reply->created_at) ? $reply->created_at->diffForhumans() : ""}}</td>
                    <td>{{isset($reply->updated_at) ? $reply->updated_at->diffForhumans() : ""}}</td>
                    <td>{{isset($reply->deleted_at) ? "Deleted ".$reply->deleted_at->diffForhumans() : "Exists"}}</td>
                    <td>
                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-warning']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}

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
        <h1 class="text-center">No replies</h1>

    @endif

@stop

@extends('layouts.admin')
@section('title')
    <title>All Comments</title>
@stop

@section('content')

    @if( count($comments) > 0)

        <h1>All Comments</h1>

    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Commenter</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Post Title</th>
        </tr>
        </thead>

        <tbody>
        @foreach($comments as $comment)

          <tr>
              <td>{{$comment->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$comment->body}}</td>
              <?php $result= DB::select('SELECT `title` FROM `posts` WHERE `id` =? ', [$comment->post_id]) ?>
              <td><a href="{{route('home.post',$comment->post->id)}}"><?php echo $result[0]->title; ?>
                  </a><!--Post title-->
              </td>

              <td><a href="{{route('admin.replies.show', $comment->id)}}">View Replies</a></td>
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

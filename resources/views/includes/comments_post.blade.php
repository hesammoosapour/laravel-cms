@if(Session::has('comment_message'))

    <h3 class="label-warning">{{session('comment_message')}} </h3>
@endif

<!-- Blog Comments -->

@if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4><i class="material-icons">&#xe24c;</i> Leave a Comment:</h4>
        <div style="display: inline-flex">
            <img height="65" class="media-object" src="{{Auth::user()->gravatar ? Auth::user()->gravatar : Auth::user()->photo()->path}}" alt="">
            &nbsp;<h4 class="media-heading"><a href="#">{{Auth::user()->name}}</a></h4>

        </div>

        {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>

@endif
<hr>
<!-- Posted Comments -->

@if(count($comments) > 0 )

    @foreach($comments as $comment )
        <!-- Comment -->
        <div class="media">
            <div style="display: flow-root">
                <a class="pull-left" href="#" style="display: flex">
                    <img height="65" class="media-object" src="{{Auth::user()->gravatar ? Auth::user()->gravatar : $commenter_photo_path}}" alt="">

                    <img height="65"  class="media-object"  src="{{$commenter_photo_path}}" alt="" >
                    &nbsp; <h4 class="media-heading">{{$commenter->name}}</h4>
                </a>
                &nbsp;
                <p style=" padding-left: 40%;margin-top: -1.4%;">{{$comment->created_at->diffForHumans()}}</p>
            </div>

            <div class="media-body">

                <h4><p>{{$comment->body}}</p></h4>

                <!-- Nested Comment -->
                <div id="nested-comment" class=" media">
                    <div class="comment-reply-container pull-right">

                        <button id="replycomment" class="toggle-reply  btn  btn-link pull-right" style="color:blue;"
                                onclick="disappear();" >Reply
                        </button>

                        <div class="comment-reply col-sm-6" style="display: none">

                            {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}

                            <div class="form-group">

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                {!! Form::label('body','Replying to '.$commenter->name) !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                        {{--                         End of comment-reply col-sm-6 --}}

                    </div>
                    {{--                            End of Comment-reply-container--}}
                    <div style="padding-left: 5%">
                        @if(count($comment->replies) > 0)

                            @if(Session::has('reply_message'))
                                <h4 class="label-warning text-center">{{session('reply_message')}} </h4>
                            @else <h4 class="text-center">No Active Replies</h4>
                            @endif
                            @foreach($comment->replies as $reply)

                                @if($reply->is_active == 1)
                                    <div class="media">
                                        <a class="pull-left" href="#" style="display: flex">
                                            <img height="55" class="media-object" src="{{ $replier_photo_path }}" alt="">
                                            <h4 class="media-heading">{{$replier->name}}</h4>
                                        </a>
                                        <p style=" padding-left: 44%;">{{$reply->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="media-body ">
                                        <p class="">{{$reply->body}}</p>
                                    </div>
                                @endif

                            @endforeach

                            <div class="divider" style="border-top: 1px dotted #8c8b8b;"></div>
                        @endif
                        {{--                        comment replies > 0--}}
                    </div>
                </div>
                <!-- End Nested Comment -->

            </div>
            {{--                  End media body  --}}

        </div>
        {{--          End media     --}}

    @endforeach
    {{--     End foreach comments --}}

@endif
{{--    count($comments) > 0--}}

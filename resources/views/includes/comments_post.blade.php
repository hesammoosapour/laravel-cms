<h4>Comments</h4>
@if(Session::has('comment_message'))

    <h3 class="label-warning">{{session('comment_message')}} </h3>
@endif

<!-- Blog Comments -->

@if(Auth::check())

    <!-- Comments Form -->
    <div class="well d-inline-flex">
{{--        <h4><i class="material-icons"> &#xe24c; </i> Leave a Comment:</h4>--}}
            @if( !empty(Auth::user()->photo()->path) || !empty(Auth::user()->gravatar) )
                <img height="60" class="media-object" src="{{Auth::user()->gravatar ? Auth::user()->gravatar : Auth::user()->photo()->path}}" alt="">
                @else
                &nbsp;
                <h4 class="media-heading"><a href="#">{{Auth::user()->name}}</a></h4>
            @endif

        {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store' ,'class'=>'d-inline-flex']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            {!! Form::textarea('body', null,
            ['class'=>'form-control ','rows'=>2 ,'cols'=>'95','placeholder'=>'Leave a Comment: ',]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Post', ['class'=>'btn btn-primary post_comment_btn']) !!}
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
                <a class="d-flex" href="#" >
                    <img height="65" class="media-object" src="{{Auth::check() && Auth::user()->gravatar ? Auth::user()->gravatar : $commenter_photo_path}}" alt="">

{{--                    <img height="65"  class="media-object"  src="{{$commenter_photo_path}}" alt="" >--}}
                    &nbsp; <p class="media-heading">{{$commenter->name}}</p>
                </a>
                &nbsp;

            </div>

            <div class="media-body">


                <p class="comment_blog">{{$comment->body}}</p>
                {{--@if(Auth::check())

                    @endif
                        --}}

                <!-- Nested Comment -->
                <div id="nested-comment" class=" media">
                    <div class="comment-reply-container col-sm-6" >

                        <button id="{{"btn-".$comment->id}}"  class="replycomment_btn btn btn-link pull-left text-primary">Reply
                        </button>

                        <div class="comment-reply "  id="comment-reply-{{$comment->id}}" >

                            {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply',
                            'class'=>'d-inline-flex']) !!}

                            <div class="form-group margin_reply_blog">

                                <input type="hidden" name="comment_id"  value="{{$comment->id}}">
                                {!! Form::label('body','Replying to '.$commenter->name) !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                            </div>

                            <div class="form-group ">
                                {!! Form::submit('Post', ['class'=>'btn btn-primary post_reply_btn']) !!}
                            </div>
                            {!! Form::close() !!}
                            <button  class="btn btn-link cancel_reply "  id="cancel-btn-{{$comment->id}}"> Cancel</button>
                        </div>

                        {{--     End of comment-reply col-sm-6--}}
                    </div>

                        <script>
                        $("#btn-" + <?=$comment->id?> ).click(function(){

                            $(this).next().slideToggle();

                            $("#btn-"+ {{$comment->id}}).hide();

                        });
                        $(document).ready(function(){
                            $("#cancel-btn-" + {{$comment->id}} ).click(function(){

                                $("#comment-reply-" + {{$comment->id}} ).fadeToggle();

                                $("#btn-"+ {{$comment->id}}).show(500);
                            });
                        });

                    </script>

{{--                                                End of Comment-reply-container--}}
                    <p class="col-sm-6 col-xs-0 creation_comment">{{$comment->created_at->diffForHumans()}}</p>

                    <div class="comment_replies">
                    @if(count($comment->replies) > 0)

                            @if(Session::has('reply_message'))
                                <h4 class="label-warning text-center">{{session('reply_message')}} </h4>
{{--                            @else <h4 class="text-center">No Active Replies</h4>--}}
                            @endif
                            @foreach($comment->replies as $reply)

                                @if($reply->is_active == 1)
                                        <br>
                                        <div class="media">
                                            <a class="pull-left" href="#" style="display: flex">
                                                <img height="55" class="media-object" src="{{ $replier_photo_path }}" alt="">
                                                <p class="media-heading">{{$replier->name}}</p>
                                            </a>
                                        </div>
                                        <div class="media-body ">
                                            <p class="">{{$reply->body}}</p>
                                        </div>
                                        <p class="creation_reply col-sm-6 col-xs-0">{{$reply->created_at->diffForHumans()}}</p>
                                @endif

                            @endforeach

                            <div class="divider" style="border-top: 1px dotted #8c8b8b;"></div>
                        @endif
                    </div>
                </div>
                <!-- End Nested Comment -->

            </div>
            {{--                  End media body  --}}

        </div>
        {{--          End media     --}}
        <br><br>
    @endforeach
    {{--     End foreach comments --}}

@endif
{{--    count($comments) > 0--}}

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = CommentReply::withTrashed()->get();
        $replies_no = CommentReply::withTrashed()->count();
        $replies_no_active = CommentReply::count();
        $replies_no_approved = CommentReply::whereIs_active(1)->count();


            $comment_id =  $replies[0]->comment_id;
            $comments =  Comment::whereId($comment_id)->withTrashed()->get();

        foreach ($comments as $comment) {

            return view('admin.comments.replies.index',
                compact('replies', 'comments', 'comment_id', 'replies_no', 'replies_no_active', 'replies_no_approved'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function createReply(Request $request){

        $user = Auth::user();

        $data = [
            'replier_id' => $user->id,
            'comment_id' => $request->comment_id,
            'body'=>$request->body
        ];

        CommentReply::create($data);

        $request->session()->flash('reply_message','Your reply has been sent and is waiting moderation');

        return redirect()->back();


    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $comment = Comment::whereId($id)->withTrashed()->get();

        //        Get replies for all comments including those which have been even deleted

        $replies_no = Comment::findOrFail($comment[0]->id)->replies()->withTrashed()->count();
        $replies_no_active = Comment::findOrFail($comment[0]->id)->replies()->count();
        $replies_no_approved = Comment::findOrFail($comment[0]->id)->replies()->whereIs_active(1)->count();


        $replies = $comment[0]->replies;

        return view(' admin.comments.replies.show',
            compact('replies','comment','replies_no','replies_no_active','replies_no_approved'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        CommentReply::findOrFail($id)->update($request->all());


        return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        CommentReply::findOrFail($id)->delete();

        return redirect()->back();

    }





}
